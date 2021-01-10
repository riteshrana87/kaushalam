<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\SmtpInformationController::class, 'smtpInformationForm'])->name('smtp.form');
Route::post('save-smtp-infp', [App\Http\Controllers\SmtpInformationController::class, 'saveSmtpInfp'])->name('smtpinfo');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'updateSmtpInfo'])->name('smtp.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('send-mail', [App\Http\Controllers\SendMailController::class, 'sendMailData'])->name('send.mail');
Route::get('send-mail', [App\Http\Controllers\SendMailController::class, 'sendMailForm'])->name('send.mail');


