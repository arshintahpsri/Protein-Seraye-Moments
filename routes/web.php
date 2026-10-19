<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/layanan', 'pages.services')->name('services');
Route::view('/booking', 'pages.booking')->name('booking');
Route::view('/portofolio', 'pages.portfolio')->name('portfolio');
Route::view('/portal', 'pages.portal')->name('portal');

// "About & Pillars" mengarah ke bagian pilar di halaman Home.
Route::redirect('/tentang', '/#pilar')->name('about');
