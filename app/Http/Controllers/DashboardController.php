<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Address;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\RequestHelper;
use App\Mail\StudentFoundMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    private $helper;

    public function __construct(RequestHelper $helper)
    {
        $this->helper = $helper;
    }

    // Helper Functions
    public function validations()
    {
        return [
            'name' => 'required',
            'box' => 'required',
            'location' => 'required',
        ];
    }
    //
    public function dashboard(Request $request)
    {
        $results = null;
        $query = $request->get('query');
        if ($query) {
            $results = Student::search($query)
                ->query(function ($builder) use ($query) {
                    $builder
                        ->with('program', 'program.program_run_type', 'program.program_type')
                        ->where('cert_no', $query)
                        ->orWhere('regno', $query);
                })->first();
            if ($results->count()) {
                Alert::success('Success', 'Student Record found');
                Mail::to(auth()->user()->email)->send(new StudentFoundMail);
                // Session::put('student', $results[0]);

            } else {
                Alert::error('Failed', 'Student does not exist');
            }
        }

        // $this->student
        return view('dashboard', [
            'student' => $results,
        ]);

    }
    public function downloadPDF(Student $student, Request $request)
    {
        // $student = Session::get('student');

        // Address Validations
        $address = $request->only([
            'name',
            'box',
            'location',
        ]);
        $address['student'] = $student->cert_no;

        $validate = Validator::make($address, $this->validations());
        if ($validate->fails()) {
            return $this->helper->failResponse($validate->errors()->first());
        }
        // dd($address);
        Address::create($address);

        $pdf = PDF::loadView('student', compact('student', 'address'));
        return $pdf->download($student->fname . ' ' . $student->lname . '.pdf');

    }
}
