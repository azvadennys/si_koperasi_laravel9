<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\TbMobilController;
use App\Http\Controllers\TbSupirController;
use App\Http\Controllers\TbTransaksiController;
use App\Http\Controllers\TbUser;
use App\Models\PinjamanModel;
use Illuminate\Support\Facades\Route;

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
    return redirect()->to('/dashboard');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(TbUser::class)->group(function () {
        Route::get('/user', 'index')->name('user.index');
        Route::get('/user/create', 'create')->name('user.create');
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::post('/user/store', 'store')->name('user.store');
        Route::post('/user/update/{id}', 'update')->name('user.update');
        Route::delete('/user/destroy/{id}', 'destroy')->name('user.destroy');
    });
    Route::controller(AnggotaController::class)->group(function () {
        Route::get('/anggota', 'index')->name('anggota.index');
        Route::get('/anggota/create', 'create')->name('anggota.create');
        Route::get('/anggota/edit/{id}', 'edit')->name('anggota.edit');
        Route::post('/anggota/store', 'store')->name('anggota.store');
        Route::post('/anggota/update/{id}', 'update')->name('anggota.update');
        Route::delete('/anggota/destroy/{id}', 'destroy')->name('anggota.destroy');
    });
    // Route::controller(PeriodeController::class)->group(function () {
    //     Route::get('/periode', 'index')->name('periode.index');
    //     Route::get('/periode/create', 'create')->name('periode.create');
    //     Route::get('/periode/edit/{id}', 'edit')->name('periode.edit');
    //     Route::post('/periode/store', 'store')->name('periode.store');
    //     Route::post('/periode/update/{id}', 'update')->name('periode.update');
    //     Route::delete('/periode/destroy/{id}', 'destroy')->name('periode.destroy');
    // });
    Route::controller(SimpananController::class)->group(function () {
        Route::get('/simpanan', 'index')->name('simpanan.index');
        Route::get('/simpanan/detail/{id}', 'show')->name('simpanan.detail');
        Route::get('/simpanan/create', 'create')->name('simpanan.create');
        Route::get('/simpanan/edit/{id}', 'edit')->name('simpanan.edit');
        Route::post('/simpanan/store', 'store')->name('simpanan.store');
        Route::post('/simpanan/update/{id}', 'update')->name('simpanan.update');
        Route::delete('/simpanan/destroy/{id}', 'destroy')->name('simpanan.destroy');

        Route::get('/simpananpokok', 'indexpokok')->name('simpananpokok.index');
        Route::get('/simpananpokok/create', 'createpokok')->name('simpananpokok.create');
        Route::post('/simpananpokok/store', 'storepokok')->name('simpananpokok.store');
        Route::delete('/simpananpokok/destroy/{id}', 'destroypokok')->name('simpananpokok.destroy');


        Route::get('/simpananwajib', 'indexwajib')->name('simpananwajib.index');
        Route::get('/simpananwajib/create', 'createwajib')->name('simpananwajib.create');
        Route::post('/simpananwajib/store', 'storewajib')->name('simpananwajib.store');
        Route::delete('/simpananwajib/destroy/{id}', 'destroywajib')->name('simpananwajib.destroy');


        Route::get('/simpanankhusus', 'indexkhusus')->name('simpanankhusus.index');
        Route::get('/simpanankhusus/create', 'createkhusus')->name('simpanankhusus.create');
        Route::post('/simpanankhusus/store', 'storekhusus')->name('simpanankhusus.store');
        Route::delete('/simpanankhusus/destroy/{id}', 'destroykhusus')->name('simpanankhusus.destroy');
    });
    Route::controller(PeminjamanController::class)->group(function () {
        Route::get('/peminjaman', 'index')->name('peminjaman.index');
        Route::get('/peminjaman/create', 'create')->name('peminjaman.create');
        Route::get('/peminjaman/edit/{id}', 'edit')->name('peminjaman.edit');
        Route::post('/peminjaman/store', 'store')->name('peminjaman.store');
        Route::post('/peminjaman/update/{id}', 'update')->name('peminjaman.update');
        Route::delete('/peminjaman/destroy/{id}', 'destroy')->name('peminjaman.destroy');
        Route::get('/peminjaman/bayar/{id}', 'bayar')->name('peminjaman.bayar');
        Route::post('/peminjaman/bayar/store/{id}', 'bayarstore')->name('peminjaman.bayarstore');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporansimpanan', 'indexsimpanan')->name('laporansimpanan.index');
        Route::get('/laporansimpanan/excel/{id}', 'indexsimpananexcel')->name('laporansimpanan.excel');
        Route::get('/laporanpinjaman', 'indexpinjaman')->name('laporanpinjaman.index');
    });

    // Route::controller(TbMobilController::class)->group(function () {
    //     Route::get('/mobil', 'index')->name('mobil.index');
    //     Route::get('/mobil/create', 'create')->name('mobil.create');
    //     Route::get('/mobil/edit/{id}', 'edit')->name('mobil.edit');
    //     Route::post('/mobil/store', 'store')->name('mobil.store');
    //     Route::post('/mobil/update/{id}', 'update')->name('mobil.update');
    //     Route::delete('/mobil/destroy/{id}', 'destroy')->name('mobil.destroy');
    // });
    // Route::controller(TbSupirController::class)->group(function () {
    //     Route::get('/driver', 'index')->name('supir.index');
    //     Route::get('/driver/create', 'create')->name('supir.create');
    //     Route::get('/driver/edit/{id}', 'edit')->name('supir.edit');
    //     Route::post('/driver/store', 'store')->name('supir.store');
    //     Route::post('/driver/update/{id}', 'update')->name('supir.update');
    //     Route::delete('/driver/destroy/{id}', 'destroy')->name('supir.destroy');
    // });
    // Route::controller(TbTransaksiController::class)->group(function () {
    //     Route::get('/transaksi', 'index')->name('transaksi.index');
    //     Route::get('/transaksi/create', 'create')->name('transaksi.create');
    //     Route::get('/transaksi/edit/{id}', 'edit')->name('transaksi.edit');
    //     Route::post('/transaksi/store', 'store')->name('transaksi.store');
    //     Route::post('/transaksi/update/{id}', 'update')->name('transaksi.update');
    //     Route::post('/transaksi/cetak', 'cetak')->name('transaksi.cetak');
    //     Route::delete('/transaksi/destroy/{id}', 'destroy')->name('transaksi.destroy');
    // });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
