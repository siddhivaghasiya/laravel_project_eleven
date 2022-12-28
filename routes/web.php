<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\Servicecontroller;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\GellaryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [Homecontroller::class,'index'])->name('home');

Route::get('admin', [Admincontroller::class,'index'])->name('admin');

Route::get('login', [Logincontroller::class,'create'])->name('login');
Route::post('login/loginpost', [Logincontroller::class,'postlogin'])->name('login.post');

//about us

Route::get('about/get', [Aboutcontroller::class,'anydata'])->name('about.anydata');
Route::any('about/singleStatuschange', [Aboutcontroller::class,'SingleStatusChange'])->name('about.Singlestatuschange');
Route::get('about', [Aboutcontroller::class,'index'])->name('about.index');
Route::get('about/add', [Aboutcontroller::class,'create'])->name('about.create');
Route::Post('about/save', [Aboutcontroller::class,'store'])->name('about.store');
Route::get('about/{id}/edit', [Aboutcontroller::class,'edit'])->name('about.edit');
Route::post('about/{id}/saveupdate', [Aboutcontroller::class,'update'])->name('about.update');
Route::any('about/{id}/delete', [Aboutcontroller::class,'delete'])->name('about.delete');

//service

Route::get('service', [Servicecontroller::class,'index'])->name('service.index');
Route::get('service/get', [Servicecontroller::class,'anydata'])->name('service.anydata');
Route::any('service/singleStatuschange', [Servicecontroller::class,'SingleStatusChange'])->name('service.Singlestatuschange');
Route::get('service/add', [Servicecontroller::class,'create'])->name('service.create');
Route::Post('service/save', [Servicecontroller::class,'store'])->name('service.store');
Route::get('service/{id}/edit', [Servicecontroller::class,'edit'])->name('service.edit');
Route::post('service/{id}/saveupdate', [Servicecontroller::class,'update'])->name('service.update');
Route::any('service/{id}/delete', [Servicecontroller::class,'delete'])->name('service.delete');

//testimonial

Route::get('testimonial', [TestimonialController::class,'index'])->name('testimonial.index');
Route::get('testimonial/get', [TestimonialController::class,'anydata'])->name('testimonial.anydata');
Route::any('testimonial/singleStatuschange', [TestimonialController::class,'SingleStatusChange'])->name('testimonial.Singlestatuschange');
Route::get('testimonial/add', [TestimonialController::class,'create'])->name('testimonial.create');
Route::Post('testimonial/save', [TestimonialController::class,'store'])->name('testimonial.store');
Route::get('testimonial/{id}/edit', [TestimonialController::class,'edit'])->name('testimonial.edit');
Route::post('testimonial/{id}/saveupdate', [TestimonialController::class,'update'])->name('testimonial.update');
Route::any('testimonial/{id}/delete', [TestimonialController::class,'delete'])->name('testimonial.delete');

//gellary

Route::get('gellary', [GellaryController::class,'index'])->name('gellary.index');
Route::get('gellary/get', [GellaryController::class,'anydata'])->name('gellary.anydata');
Route::any('gellary/singleStatuschange', [GellaryController::class,'SingleStatusChange'])->name('gellary.Singlestatuschange');
Route::get('gellary/add', [GellaryController::class,'create'])->name('gellary.create');
Route::Post('gellary/save', [GellaryController::class,'store'])->name('gellary.store');
Route::get('gellary/{id}/edit', [GellaryController::class,'edit'])->name('gellary.edit');
Route::post('gellary/{id}/saveupdate', [GellaryController::class,'update'])->name('gellary.update');
Route::any('gellary/{id}/delete', [GellaryController::class,'delete'])->name('gellary.delete');


//content

Route::get('content', [ContentController::class,'index'])->name('content.index');
Route::post('content/{id}/saveupdate', [ContentController::class,'update'])->name('content.update');

//contact

Route::get('contact', [ContactController::class,'index'])->name('contact.index');
Route::get('contact/get', [ContactController::class,'anydata'])->name('contact.anydata');
Route::any('contact/singleStatuschange', [ContactController::class,'SingleStatusChange'])->name('contact.Singlestatuschange');
Route::any('contact/{id}/delete', [ContactController::class,'delete'])->name('contact.delete');
Route::any('contact/{id}/view', [ContactController::class,'view'])->name('contact.view');

//Front

Route::get('contactpage', [Homecontroller::class,'contact'])->name('contactpage.index');
Route::post('contactpage/store', [Homecontroller::class,'contactstore'])->name('contactpage.store');

Route::get('aboutpage', [Homecontroller::class,'about'])->name('aboutpage.index');

Route::get('gellarypage', [Homecontroller::class,'gellary'])->name('gellarypage.index');
Route::get('gellary/single/{id}', [Homecontroller::class,'gellarysingle'])->name('gellary.single');


Route::get('servicepage', [Homecontroller::class,'service'])->name('servicepage.index');
