<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Route::middleware('guest')->group(function () {
//     Route::get('/', function () {
//         return view('auth.login');
//     });
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// // })->middleware(['auth'])->name('dashboard');
// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/download/{student}', [DashboardController::class, 'downloadPDF']);
require __DIR__ . '/auth.php';

Route::get('student/{id}', function ($id) {
    $query = DB::select("select `students_db`.*, `prog_db`.`long_name`,`prog_runtypes`.`comment`,`prog_types`.`comment` from `students_db`
    inner join `prog_db` on `prog_db`.`progid` = `students_db`.`progid`
    inner join `prog_runtypes` on `prog_runtypes`.`runtype` = `prog_db`.`runtype`
    inner join `prog_types` on `prog_types`.`type` = `prog_db`.`progtype`
    limit 100 offset 3");
     // $query=DB::table('students_db')
    // ->join('prog_db','prog_db.progid','=','students_db.progid')
    // ->join('prog_runtypes','prog_runtypes.runtype','=','prog_db.runtype')
    // ->join('prog_types','prog_types.type','=','prog_db.progtype')
    // ->select('students_db.*', 'prog_db.long_name','prog_runtypes.comment','prog_types.comment')
    // ->select('students_db.*','prog_types.comment')
    // ->where('studid','000000000002070')
    // ->first();
   
    dd($query);
});
