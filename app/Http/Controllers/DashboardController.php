<?php

namespace App\Http\Controllers;

use App\Mail\StudentFoundMail;
use App\Models\Student;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public $student;
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
    public function downloadPDF(Student $student)
    {
        // $student = Session::get('student');

        // Address Validations
        // $address = $request->validate([
        //     'address' => 'required',
        //     'box'=>'required',
        //     'location'=>'required'
        // ]);
        // $address['student'] = $student->cert_no;



        $pdf = PDF::loadView('student', compact('student'));
        return $pdf->download($student->fname . ' ' . $student->lname.'.pdf');

    }
}
