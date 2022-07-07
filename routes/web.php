<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModifController;
use App\Models\Enterprise;
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

//Routes d'authentification
Auth::routes();

//Route d'acceuil (AUTH obligatoire)
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/search', [HomeController::class, 'searchPost'])->name('search.post')->middleware('auth');
Route::get('/search/{result}', [HomeController::class, 'searchGet'])->name('search.get')->middleware('auth');

Route::post('/search-college', [HomeController::class, 'searchCollegePost'])->name('searchCollege.post')->middleware('auth');
Route::get('/search-college/{result}', [HomeController::class, 'searchCollegeGet'])->name('searchCollege.get')->middleware('auth');

Route::get('/modification', [ModifController::class, 'viewAdd'])->name('modif.get')->middleware('auth');

Route::get('modifier/{id}', [ModifController::class, 'modifEnterprise'])->name('modifEnterprise.get')->middleware('auth');
Route::post('modifier/{id}', [ModifController::class, 'postModifEnterprise'])->name('modifEnterprise.post')->middleware('auth');

Route::get('modifier-college/{id}', [ModifController::class, 'modifCollege'])->name('modifCollege.get')->middleware('auth');
Route::post('modifier-college/{id}', [ModifController::class, 'postModifCollege'])->name('modifCollege.post')->middleware('auth');

Route::get('devis/{id}', [EnterpriseController::class, 'devisGet'])->name('devis.get')->middleware('auth');
Route::post('devis/{id}', [EnterpriseController::class, 'devisPost'])->name('devis.post')->middleware('auth');

Route::get('/college/{id}', [CollegeController::class, 'collegeView'])->name('college.get')->middleware('auth');

Route::get('/entreprise/{id}', [EnterpriseController::class, 'enterpriseView'])->name('entre.get')->middleware('auth');




