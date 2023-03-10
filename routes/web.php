<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/take/appointment', [AppointmentController::class, 'takeAppointment'])->name('takeAppointment');
Route::post('/search/chember', [AppointmentController::class, 'userSearchChember'])->name('userSearchChember');
Route::post('/search/slot', [AppointmentController::class, 'userSearchSlot'])->name('userSearchSlot');
Route::post('/add/appointment', [AppointmentController::class, 'userCreateAppointment'])->name('userCreateAppointment');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {


    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {
        /*Employee */
        Route::get('/employee/page', [EmployeeController::class, 'index'])->name('employeePage');
        Route::post('/add/employee', [EmployeeController::class, 'create'])->name('addEmployee');
        Route::get('/role/page', [RoleController::class, 'index'])->name('rolePage');
        Route::post('/add/role', [RoleController::class, 'create'])->name('addRole');
        /*end employee */

        /*Chember */
        Route::get('/chember/page', [ChemberController::class, 'index'])->name('chemberPage');
        Route::post('/add/chember', [ChemberController::class, 'create'])->name('addChember');
        Route::get('/chember/list', [ChemberController::class, 'show'])->name('chemberList');
        /*end Chember */

        /*Schedule */
        Route::get('/schedule/page', [ScheduleController::class, 'index'])->name('schedulePage');
        Route::post('/add/schedule', [ScheduleController::class, 'create'])->name('addSchedule');
        Route::get('/schedule/list', [ScheduleController::class, 'show'])->name('scheduleList');

        Route::get('/special/page', [SpecialController::class, 'index'])->name('specialPage');
        Route::post('/add/special/schedule', [SpecialController::class, 'create'])->name('addSpecialSchedule');
        Route::get('/special/schedule/list', [SpecialController::class, 'show'])->name('specialScheduleList');
        /*end Schedule */

        /*Appointment */
        Route::get('/appointment/page', [AppointmentController::class, 'index'])->name('appointmentPage');
        Route::post('/search/schedule', [AppointmentController::class, 'searchSchedule'])->name('searchSchedule');
        Route::post('/search/chember', [AppointmentController::class, 'searchChember'])->name('searchChember');
        Route::post('/search/slot', [AppointmentController::class, 'searchSlot'])->name('searchSlot');
        Route::post('/add/appointment', [AppointmentController::class, 'create'])->name('addAppointment');
        Route::get('/appintment/list', [AppointmentController::class, 'show'])->name('appointmentList');
        Route::post('/cancel/appointment', [AppointmentController::class, 'cancelAppointment'])->name('cancelAppointment');
        Route::get('/cancelled/appintment/list', [AppointmentController::class, 'cancelledAppointment'])->name('cancelledAppointment');
        Route::post('/pay/visit', [AppointmentController::class, 'payVisit'])->name('payVisit');
        /*end Appointment */

        /*Add Patient Report*/
        Route::get('/addReport/page', [PatientController::class, 'index'])->name('viewAddReport');
        Route::get('/addReportImage/page/{id}', [ReportController::class, 'addReportView'])->name('addReportView');
        Route::post('/addReportImage/page', [ReportController::class, 'saveMultipleReport'])->name('saveMultipleReportImage');
        Route::get('/addReportImage/details/{id}', [ReportController::class, 'patientReportDetails'])->name('patientReportDetails');

        /*end Patient Report */

        

    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {

     

        

    });
});

require __DIR__ . '/auth.php';
