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

Route::get('/', function () {
    return view('vendor.backpack.base.auth.login');
});
Route::get('/forbidden', function () {
    return view('salahHakAkses');
});
// Route::get('/profil','Admin\JuzController');

Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/guru/dashboard','AdminController@dashboard');
Route::get('/siswa/dashboard','AdminController@dashboard');

Route::post('/', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');


Auth::routes();

// Route::get('/dashboard', 'AdminController@index');
// Route::get('/dataguru', 'AdminController@dataguru');
// Route::get('/datasiswa', 'AdminController@datasiswa');
// Route::get('/detail-guru', 'AdminController@detail_guru');
// Route::get('/tambah-guru', 'AdminController@tambah_guru');
// Route::get('/ubah-guru', 'AdminController@ubah_guru');
// Route::get('/detail-siswa','AdminController@detail_siswa');
// Route::get('/tambah-siswa','AdminController@tambah_siswa');
// Route::get('/ubah-siswa', 'AdminController@ubah_siswa');
// Route::get('/daftar-juz','AdminController@daftar_juz');
// Route::get('/input','AdminController@input');
// Route::get('/program-hafalan','AdminController@program_hafalan');
// Route::get('history','AdminController@history');
// Route::get('/guru', 'GuruController@guru');
// Route::get('/input-hafalan-guru', 'GuruController@input_hafalan_guru');   
// Route::get('/program-hafalan-guru', 'GuruController@program_hafalan_guru');   
// Route::get('/history-guru', 'GuruController@history_guru');
// Route::get('/index-siswa', 'SiswaController@index_siswa');
// Route::get('/tabel-hasil', 'SiswaController@tabel_hasil');

// Route::get('/admin/input-hafalan', 'HafalanController@input');
// Route::post('/hafalan/tambah', 'Admin\HafalanCrudController@tambahHafalan');

    // Route::GET('/hafalan/create','Admin\HafalanCrudController@create');
    // Route::GET('/hafalan','Admin\HafalanCrudController@index');
    // Route::POST('/hafalan','Admin\HafalanCrudController@store');

Route::group(['prefix' => 'admin', 'middleware' => 'leveladmin' ], function()
{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('guru', 'Admin\GuruCrudController');
    Route::DELETE('/guru/{id}','Admin\GuruCrudController@destroy');
    CRUD::resource('siswa', 'Admin\SiswaCrudController');
    Route::DELETE('/siswa/{id}','Admin\SiswaCrudController@destroy');
    // CRUD::resource('juz', 'Admin\Daftar_surahCrudController');
    CRUD::resource('hafalan', 'Admin\HafalanCrudController');
    CRUD::resource('pencapaian', 'Admin\PencapaianCrudController');
    CRUD::resource('history', 'Admin\HistoryCrudController');
    CRUD::resource('laporan', 'Admin\LaporanCrudController');
    Route::get('laporan/{bulan}/{tahun}', 'Admin\LaporanCrudController@index');

    // CRUD::resource('/pencapaian/{NIS}/history', 'Admin\HistoryCrudController');    

    Route::GET('/pencapaian/{NIS}/history', 'Admin\HistoryCrudController@index');
    Route::GET('/pencapaian/{NIS}/history/tahun={tahun}', 'Admin\HistoryCrudController@index');
    Route::GET('/pencapaian/{NIS}/history/{id}/edit', 'Admin\HistoryCrudController@edit');
    Route::PUT('/pencapaian/{NIS}/history/{history}', 'Admin\HistoryCrudController@update');
    Route::get('/pencapaian/{NIS}/history/{id}', 'Admin\HistoryCrudController@hapus');



    // Route::GET('/hafalan/create','Admin\HafalanCrudController@create');
    // Route::GET('/hafalan','Admin\HafalanCrudController@index');
    // Route::POST('/hafalan','Admin\HafalanCrudController@store');
    
  // [...] other routes
});


Route::group(['prefix' => 'guru','middleware' => 'levelguru'], function(){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             

	CRUD::resource('hafalan', 'Guru\HafalanGuruCrudController');
    CRUD::resource('pencapaian', 'Guru\PencapaianGuruCrudController');
    CRUD::resource('history', 'Guru\HistoryGuruCrudController');
    CRUD::resource('laporan', 'Guru\LaporanGuruCrudController');
    Route::get('laporan/{bulan}/{tahun}', 'Guru\LaporanGuruCrudController@index');

    Route::GET('/pencapaian/{NIS}/history', 'Guru\HistoryGuruCrudController@index');
    Route::GET('/pencapaian/{NIS}/history/tahun={tahun}', 'Guru\HistoryGuruCrudController@index');
    Route::GET('/pencapaian/{NIS}/history/{id}/edit', 'Guru\HistoryGuruCrudController@edit');
    Route::PUT('/pencapaian/{NIS}/history/{history}', 'Guru\HistoryGuruCrudController@update');
    Route::get('/pencapaian/{NIS}/history/{id}', 'Guru\HistoryGuruCrudController@hapus');

    
    // Route::GET('/hafalan/create','Guru\HafalanGuruCrudController@index');
    // Route::POST('/hafalan/create','Guru\HafalanGuruCrudController@store');
});

Route::group(['prefix' => 'siswa','middleware' => 'levelsiswa'], function()
{

    
    CRUD::resource('history', 'Siswa\PencapaianSiswaCrudController');
    Route::GET('/dashboard/tahun={tahun}', 'AdminController@dashboard');
    

});