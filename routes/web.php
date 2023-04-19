<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\logs;
use App\Http\Controllers\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [logs::class, 'login']);

Route::post('loginRequest', [logs::class, 'loginRequest']);

    Route::get('dashboard', [Admin::class, 'index']);

    Route::get('addNewAdmin', [Admin::class, 'addAdminScreen']);

    Route::post('addAdmin', [Admin::class, 'addAdmin']);

    Route::get('viewAdmins', [Admin::class, 'viewAdmins']);

    Route::get('addNewCandidate', [Admin::class, 'addCandidateScreen']);

    Route::post('addCandidate', [Admin::class, 'addCandidate']);

    Route::get('viewCandidate', [Admin::class, 'viewCandidate']);

    Route::get('addNewElection', [Admin::class, 'addElectionScreen']);

    Route::post('addElection', [Admin::class, 'addElection']);

    Route::get('viewElections', [Admin::class, 'viewElections']);

    Route::get('viewElection/{id}', [Admin::class, 'viewElection']);

    Route::get('endElection/{id}', [Admin::class, 'endElection']);

    Route::get('calcResult', [Admin::class, 'calcResultScreen']);

    Route::get('calcResult/{id}', [Admin::class, 'calcResult']);

    Route::get('logout', [admin::class, 'logout']);

Route::get('register',[Member::class,'registerScreen']);

Route::post('registerNewUser',[Member::class,'register']);

Route::get('home',[Member::class,'homeScreen']);

Route::get('newElection',[Member::class,'newElectionScreen']);

Route::get('results',[Member::class,'results']);

Route::get('vote/{id}',[Member::class,'voteScreen']);

Route::get('voteForCan/{id}',[Member::class,'vote']);
