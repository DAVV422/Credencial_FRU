<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CredencialController;

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
})->name('inicio');

Route::get('/credencial', [CredencialController::class, 'credenciales'])->name('credencial');

Route::get('/administracion', [CredencialController::class, 'index'])->name('admin');
Route::get('/administracion/crear', [CredencialController::class, 'administrar'])->name('admin-crear');
Route::get('/salir', [CredencialController::class, 'exit'])->name('exit');

Route::post('/new-credentials',[CredencialController::class, 'new_credencial'])
->name('crear_credencial');

Route::post('/update/{id}',[CredencialController::class, 'update'])
->name('editar');

Route::post('/update/{id}',[CredencialController::class, 'update_foto'])
->name('editar-foto');

Route::post('/login_verify',[CredencialController::class, 'verify'])
->name('login-verify');

Route::get('/edit/{id}',[CredencialController::class, 'edit'])
->name('edit');

Route::get('/edit/foto/{id}',[CredencialController::class, 'edit_foto'])
->name('edit-foto');

Route::get('/credencial_new/{id}',[CredencialController::class, 'credencial_nuevo'])
->name('credencial-nuevo');

Route::get('/{id}',[CredencialController::class, 'show'])
->name('credencials');