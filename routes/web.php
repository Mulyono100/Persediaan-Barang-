<?php

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



Route::get('/login', 'AuthController@login');
Route::post('/postLogin', 'AuthController@postlogin');
Route::group(['middleware' => ['auth', 'CheckRole:1']], function () {
    Route::get('/DashboardPegawai', 'PegawaiController@index');

    // temukan stock barang
    Route::get('/temukanbarang', 'PegawaiController@temukan');

    Route::get('/PermintaanPegawai', 'PegawaiController@permintaan');
    Route::get('/TambahPermintaanPegawai', 'PegawaiController@tambahpermintaan');
    Route::post('/TambahPermintaan', 'PegawaiController@tambah');
    // detail permintaan
    Route::get('/permintaanpegawai/detail/{id}', 'PegawaiController@detail');
    // laporan permintaan
    Route::get('/laporanpermintaan', 'PegawaiController@laporanpermintaan');
    Route::post('/cetaklaporanpermintaan', 'PegawaiController@cetaklaporan');

    // Produksi
    Route::get('/simpanproduksi', 'ProduksiController@index');
    Route::get('/tambahproduksipegawai', 'ProduksiController@tambahproduksi');
    Route::post('/produksi/tambah', 'ProduksiController@simpan');
    Route::get('/laporanpegawai', 'ProduksiController@laporan');
    Route::post('/cetaklaporanproduksi', 'ProduksiController@cetaklaporanproduksi');

    // mencoba
    Route::post('/produksi/tambah/mencoba', 'ProduksiController@mencoba');
    Route::get('/detailproduksi/{id}', 'ProduksiController@detailproduksi');
});
Route::group(['middleware' => ['auth', 'CheckRole:2']], function () {
    // Dashboard
    Route::get('/DashboardGudang', 'GudangController@index');
    // Barang
    Route::get('/barang', 'BarangController@index');
    Route::get('/tambahbarang', 'BarangController@tambahbarang');
    Route::post('/barang/tambah', 'BarangController@tambah');
    Route::get('/ubah/barang/{id}', 'BarangController@ubah');
    Route::post('/ubahbarang/{id}', 'BarangController@ubahbarang');
    Route::get('/barang/{id}/hapus', 'BarangController@hapus');
    // Laporan Barang
    Route::get('/laporanbarang', 'BarangController@laporan');
    // Barang masuk
    Route::get('/tambahbarangmasuk', 'BarangmasukController@tambahbarangmasuk');
    Route::post('/tambahmasuk', 'BarangmasukController@tambahmasuk');



    // kelola pemesanan
    Route::get('/kelolapemesanan', 'PemesananController@index');

    // Permintaan
    Route::get('/permintaan', 'PermintaanController@index');
    Route::get('/prosespermintaan', 'PermintaanController@prosespermintaan');
    // Laporan
    Route::get('/laporanpermintaangudang', 'PermintaanController@laporanpermintaangudang');
    Route::post('/cetaklaporanbarangpermintaangudang', 'PermintaanCOntroller@cetaklaporanbarangpermintaangudang');

    // Update Permintaan
    Route::get('/permintaan/update/{id}', 'PermintaanController@update');
    Route::post('/update/{id}', 'PermintaanController@ubah');
    Route::get('/detailpermintaan/pegawai/{id}', 'PermintaanController@detailpermintaanpegawai');
    // Barang masuk
    Route::get('/barangmasuk', 'BarangmasukController@index');
    Route::get('/barangmasuk/detail/{id}', 'BarangmasukController@detail');
    Route::get('/barangmasuk/{id}/hapus', 'BarangmasukController@hapus');
    // Laporan barang masuk
    Route::get('/laporanbarangmasuk', 'BarangmasukController@laporan');
    Route::post('/cetaklaporanbarangmasuk', 'BarangmasukController@cetaklaporan');

    // Barang Keluar
    Route::get('/barangkeluar', 'BarangkeluarController@index');
    Route::get('/barangkeluar/detail/{id}', 'BarangkeluarController@detail');
    Route::get('/laporanbarangkeluar', 'BarangkeluarController@laporan');
    Route::post('/cetaklaporanbarangkeluar', 'BarangkeluarController@cetaklaporanbarangkeluar');
    // Pemesanan
    Route::get('/pemesanan', 'PemesananController@index');
    Route::get('/tambahpemesanan', 'PemesananController@tambah');
    Route::post('/pemesanantambah', 'PemesananController@tambahpemesanan');
    Route::get('/pemesanan/ubah/{id}', 'PemesananController@ubah');
    Route::post('/pemesananubah/{id}', 'PemesananController@ubahpemesanan');
    Route::get('/pemesanan/{id}/hapus', 'PemesananController@hapus');
    Route::get('/detailpesanan/{id}', 'PemesananController@detail');
    Route::get('/laporanpemesanan', 'PemesananController@laporan');
    Route::post('/cetaklaporanpemesanan', 'PemesananController@laporanpemesanan');
    // Produksi
    Route::get('/kelolaproduksi', 'ProduksiController@indexgudang');
    Route::get('/laporanproduksi', 'ProduksiController@laporangudang');
    Route::post('/cetaklaporanproduksipegawai', 'ProduksiController@cetaklaporanproduksipegawai');
    Route::get('/detailproduksipegawai/{id}', 'ProduksiController@detailproduksipegawai');
});
Route::group(['middleware' => ['auth', 'CheckRole:3']], function () {
    Route::get('/dashboardmanajer', 'ManajerController@index');
    Route::get('/laporanbarangmanajer', 'ManajerController@laporanbarang');
    Route::get('/laporanpermintaanmanajer', 'ManajerController@laporanpermintaan');
    route::post('/laporanpermintaandetail', 'ManajerController@laporanpermintaandetail');
    Route::get('/laporanproduksipegawai', 'ManajerController@laporanproduksi');
    Route::post('/laporanproduksidetail', 'ManajerController@laporanproduksidetail');
    Route::get('/laporanpemesananpegawai', 'ManajerController@laporanpemesanan');
    Route::post('/laporanpemesanandetail', 'ManajerController@laporanpemesanandetail');
    Route::get('/laporanbarangmasukpegawai', 'ManajerController@laporanbarangmasuk');
    Route::post('/laporanbarangmasukpegawaidetail', 'ManajerController@laporanbarangmasukdetail');
    Route::get('/laporanbarangkeluarpegawai', 'ManajerController@laporanbarangkeluar');
    Route::post('/laporanbarangkeluarpegawaidetail', 'ManajerController@laporanbarangkeluardetail');
});