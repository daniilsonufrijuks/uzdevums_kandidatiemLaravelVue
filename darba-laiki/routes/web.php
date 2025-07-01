<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return Inertia::render('Index');
})->name('home');


Route::get('/employeesget', [EmployeeController::class, 'getemployees']);


Route::get('/user', function ( ) {

    $userID = request()->query('id'); // Extract 'id' from query parameters
    if (!$userID) {
        abort(400, 'userID ID is required');
    }
    return Inertia::render('Employee', [
        'userID' => $userID,
    ]);
})->name('user');
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
