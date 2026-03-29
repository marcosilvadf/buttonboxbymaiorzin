<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\ModsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RepportModController;
use Illuminate\Support\Facades\Route;
use App\Models\Mod;

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

Route::get('/', function () {
    return view('main.index');
})->name('index');

Route::get('/dashboard',[ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/perfil/configuracao', [ProfileController::class, 'config'])->name('profile.config');
    Route::get('/perfil/delete', [ProfileController::class, 'delete'])->name('profile.delete');

    Route::get('pagamento', [PlanController::class, 'payment'])->name('payment');
});

Route::get('plano', [PlanController::class, 'index'])->name('plan');

Route::prefix('/mercado-pago')->group(function() {
    Route::get('sucesso', [MercadoPagoController::class, 'success'])->name('mpsuccess');
    Route::get('falha', [MercadoPagoController::class, 'failure'])->name('mpfailed');
    Route::get('pendente', [MercadoPagoController::class, 'pending'])->name('mppending');
});

Route::prefix('mods')->group(function() {
    Route::get('/', [ModsController::class, 'index'])->name('mods.index');
    Route::get('/m/{slug}', [ModsController::class, 'show'])->name('mods.show');
    Route::get('/filtro', [ModsController::class, 'filter'])->name('mods.filter');

    Route::middleware('auth')->group(function () {
        Route::get('cadastrar', [ModsController::class, 'create'])->name('mods.create');
        Route::post('cadastrar', [ModsController::class, 'store'])->name('mods.store');
        
        Route::get('editar/{mod}', [ModsController::class, 'edit'])->name('mods.edit');
        Route::patch('editar/{mod}', [ModsController::class, 'update'])->name('mods.update');

        Route::delete('deletar/{mod}', [ModsController::class, 'destroy'])->name('mods.delete');

        Route::get('gerenciar', [ModsController::class, 'manager'])->name('mods.manager');
    });
});

Route::prefix('reportar-mods')->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/denunciados', [RepportModController::class, 'index'])->name('repport.index');

        Route::get('/denunciar/{mod}', [RepportModController::class, 'create'])->name('repport.create');
        Route::post('/denunciar/{mod}', [RepportModController::class, 'store'])->name('repport.store');
        
        Route::delete('/deletar/{repportMod}', [RepportModController::class, 'destroy'])->name('repport.delete');
    });
});

Route::prefix('posts')->group(function() {
    Route::get('/button-box-ets2-gratis-app-dashboard', function() {
        return view('posts.free_version');
    })->name('version.free');

    Route::get('/button-box-ets2-pro', function() {
        return view('posts.pro_version');
    })->name('version.pro');
});

Route::prefix('rating')->group(function() {
    Route::middleware('auth')->group(function () {
        Route::post('/', [RatingController::class, 'rating']);
    }); 
});

Route::get('/sitemap.xml', function () {

    $mods = Mod::all();

    return response()->view('sitemap', compact('mods'))
        ->header('Content-Type', 'text/xml');

});

require __DIR__.'/auth.php';
