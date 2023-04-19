<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
//    return view('admin.dashboard');
//});

Route::get('dashboard', [Admin::class, 'index']);

Route::get('addNewAdmin', [Admin::class, 'addAdminScreen']);

Route::post('addAdmin',[Admin::class, 'addAdmin']);

Route::get('viewAdmins', [Admin::class, 'viewAdmins']);

Route::get('addNewCandidate', [Admin::class, 'addCandidateScreen']);

Route::post('addCandidate', [Admin::class, 'addCandidate']);

Route::get('viewCandidate', [Admin::class, 'viewCandidate']);

Route::get('addNewElection', [Admin::class, 'addElectionScreen']);

Route::post('addElection', [Admin::class, 'addElection']);

Route::get('viewElections', [Admin::class, 'viewElections']);

Route::get('viewElection/{id}', [Admin::class, 'viewElection']);

Route::get('endElection/{id}', [Admin::class, 'endElection']);
