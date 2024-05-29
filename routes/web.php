<?php
  
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\Auth\AuthController;
  use App\Http\Controllers\ProjectController;


  Route::get('/', [ProjectController::class, 'home'])->name('projects.welcome');
  
  // Authentication Routes
  Route::get('login', [AuthController::class, 'index'])->name('login');
  Route::post('login', [AuthController::class, 'postLogin'])->name('login.post'); 
  
  // Registration Routes
  Route::get('registration', [AuthController::class, 'registration'])->name('register');
  Route::post('registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
  
  // Dashboard Route
  Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
  // Dashboard Route
Route::post('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

  
  // Logout Route
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  


  Route::resource('projects', ProjectController::class);