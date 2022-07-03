<?php

namespace App\Http\Controllers;

use App\Mail\StudentFoundMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $results = null;
        // $query = $request->get('query');
        // if ($query) {
        //     $results = Student::search($query)
        //         ->query(function ($builder) {
        //             $builder
        //                 ->with('program', 'program.program_run_type', 'program.program_type');
        //         })
        //         ->where('cert_no', $query)
        //         ->orWhere('regno', $query)
        //         ->get();
        $query = $request->get('query');
        if ($query) {
            $results = Student::search($query)->first();
            // dd($results);
            if ($results->count()) {
                Alert::success('Success', 'Student Record found');
                Mail::to(auth()->user()->email)->send(new StudentFoundMail);
            } else {
                Alert::error('Failed', 'Student does not exist');
            }
        }
// dd($results);
        return view('dashboard', [
            'student' => $results,
        ]);

    }
}
