<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])
         ->name('admin.dashboard');
         //invoices
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create',[InvoiceController::class,'create'])->name('invoices.create');  
    Route::post('/invoices/store',[InvoiceController::class,'store'])->name('invoices.store');
    
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');



    //clients
    Route::resource('clients', ClientController::class);
   
});
Route::middleware(['auth','roles:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])
         ->name('user.dashboard');


}); 
Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::get('invoice/{id}/download', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');



// // Include route files

require __DIR__.'/auth.php';

