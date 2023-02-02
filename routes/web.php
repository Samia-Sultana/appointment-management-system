<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        /*Employee */
        Route::get('/employee/page', [EmployeeController::class, 'index'])->name('employeePage');
        Route::post('/add/employee', [EmployeeController::class, 'create'])->name('addEmployee');
        Route::get('/role/page', [RoleController::class, 'index'])->name('rolePage');
        Route::post('/add/role', [RoleController::class, 'create'])->name('addRole');
        /*end employee */

        /*Appointment */
        Route::get('/appointment/page', [AppointmentController::class, 'index'])->name('appointmentPage');
        Route::post('/add/appointment', [AppointmentController::class, 'create'])->name('addAppointment');
        /*end Appointment */
    });
});

require __DIR__ . '/auth.php';
