<?php

namespace App\Http\Controllers;

use App\Helpers\RequestHelper;
use App\Models\Address;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

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
        // RAW DATABASE QUERY using INNER JOIN
        $lequery = DB::table('students_db')
            ->join('prog_db', 'prog_db.progid', '=', 'students_db.progid')
            ->join('prog_runtypes', 'prog_runtypes.runtype', '=', 'prog_db.runtype')
            ->join('prog_types', 'prog_types.type', '=', 'prog_db.progtype')
            ->select('students_db.*', 'prog_db.long_name', 'prog_runtypes.comment', 'prog_types.comment')
            ->where('studid', '000000000002070')
            ->first();

        $query = $request->get('query');
        if ($query) {
            $results = Student::search($query)
                ->query(function ($builder) use ($query) {
                    $builder
                        ->with('program', 'program.program_run_type', 'program.program_type')
                        ->where('cert_no', $query)
                        ->orWhere('regno', $query);
                })->first();
            dd($results);
            if ($results->count()) {
                Alert::success('Success', 'Student Record found');
                // Mail::to(auth()->user()->email)->send(new StudentFoundMail);
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
        $address['student'] = $student->regno;

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
