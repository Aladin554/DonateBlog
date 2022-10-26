<?php
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DonateController;
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
Route::prefix('admin')->group(function (){

    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
    
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    
    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');
    
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
    
    
    });

    // slider
    Route::prefix('slider')->group(function(){

        Route::get('/view', [SliderController::class, 'SliderView'])->name('slider');
        
        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    
        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    
        Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    
        Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
        
        
        });


        //About

        Route::prefix('about')->group(function(){

            Route::get('/view', [AboutController::class, 'AboutView'])->name('about');
            
            Route::post('/store', [AboutController::class, 'AboutStore'])->name('about.store');
        
            Route::get('/edit/{id}', [AboutController::class, 'AboutEdit'])->name('about.edit');
        
            Route::post('/update', [AboutController::class, 'AboutUpdate'])->name('about.update');
        
            Route::get('/delete/{id}', [AboutController::class, 'AboutDelete'])->name('about.delete');
            
            
            });



        //Service

        Route::prefix('service')->group(function(){

            Route::get('/view', [ServiceController::class, 'ServiceView'])->name('service');
            
            Route::post('/store', [ServiceController::class, 'ServiceStore'])->name('service.store');
        
            Route::get('/edit/{id}', [ServiceController::class, 'ServiceEdit'])->name('service.edit');
        
            Route::post('/update', [ServiceController::class, 'ServiceUpdate'])->name('service.update');
        
            Route::get('/delete/{id}', [ServiceController::class, 'ServiceDelete'])->name('service.delete');
            
            
            });


            // Donate
    Route::prefix('donate')->group(function(){

        Route::get('/view', [DonateController::class, 'DonateView'])->name('donate');
        
        Route::post('/store', [DonateController::class, 'DonateStore'])->name('donate.store');
    
        Route::get('/edit/{id}', [DonateController::class, 'DonateEdit'])->name('donate.edit');
    
        Route::post('/update', [DonateController::class, 'DonateUpdate'])->name('donate.update');
    
        Route::get('/delete/{id}', [DonateController::class, 'DonateDelete'])->name('donate.delete');
        
        
        });






Route::get('/', function () {
    return view('fontend.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
