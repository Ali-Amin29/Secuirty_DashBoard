<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\User_CompanyController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\RoomController;
use App\Models\Attendance;
use App\Models\Room;
use App\Models\User_company;
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

Route::resource('rooms', RoomController::class);
Route::resource('attend', AttendanceController::class);
Route::resource('comming', User_CompanyController::class);
Route::delete('destroyall/{id}', [RoomController::class,'destroyall'])->name('rooms.destroyall');




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/qr', function () {
    return view('Qr_page');
});

Route::get('/qr2', function () {
    return view('Qr_page2');
});


Route::get('/table', function () {
    return view('layouts.master');
});


Route::post('Scans', [ScanController::class, 'Scan'])->name('Scans');


Route::get('/dash', function () {

    $wordlist = count(User_company::get());
    $room1Attend = Room::find(5)->Attend;
    $room1Exist = Room::find(5)->exists;

    $allComming = $room1Attend + $room1Exist;
    return view('DashBoard.index',compact('wordlist', 'room1Attend','room1Exist','allComming'));
})->name('dashboard');









Route::get('/table', function () {
    return view('table');
});