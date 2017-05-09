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
    return view('auth.login');
});
Route::get('/forbidden', function () {
    return view('salahHakAkses');
});
<<<<<<< HEAD
=======

>>>>>>> 533e9e9adb055c277fc5e76d67e9aefdb59e3463

Auth::routes();

Route::get('/dashboard', 'AdminController@index');
Route::get('/dataguru', 'AdminController@dataguru');
Route::get('/datasiswa', 'AdminController@datasiswa');
Route::get('/detail-guru', 'AdminController@detail_guru');
Route::get('/tambah-guru', 'AdminController@tambah_guru');
Route::get('/ubah-guru', 'AdminController@ubah_guru');
Route::get('/detail-siswa','AdminController@detail_siswa');
Route::get('/tambah-siswa','AdminController@tambah_siswa');
Route::get('/ubah-siswa', 'AdminController@ubah_siswa');
Route::get('/daftar-juz','AdminController@daftar_juz');
Route::get('/input','AdminController@input');
Route::get('/program-hafalan','AdminController@program_hafalan');
Route::get('history','AdminController@history');
Route::get('/guru', 'GuruController@guru');
Route::get('/input-hafalan-guru', 'GuruController@input_hafalan_guru');   
Route::get('/program-hafalan-guru', 'GuruController@program_hafalan_guru');   
Route::get('/history-guru', 'GuruController@history_guru');
Route::get('/index-siswa', 'SiswaController@index_siswa');
Route::get('/tabel-hasil', 'SiswaController@tabel_hasil');

// Route::get('/admin/input-hafalan', 'HafalanController@input');
// Route::post('/hafalan/tambah', 'Admin\HafalanCrudController@tambahHafalan');

    // Route::GET('/hafalan/create','Admin\HafalanCrudController@create');
    // Route::GET('/hafalan','Admin\HafalanCrudController@index');
    // Route::POST('/hafalan','Admin\HafalanCrudController@store');

Route::group(['prefix' => 'admin', 'middleware' => 'admin' ], function()
{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('guru', 'Admin\GuruCrudController');
    CRUD::resource('siswa', 'Admin\SiswaCrudController');
    // CRUD::resource('juz', 'Admin\Daftar_surahCrudController');
    CRUD::resource('hafalan', 'Admin\HafalanCrudController');
    CRUD::resource('pencapaian', 'Admin\PencapaianCrudController');
    CRUD::resource('history', 'Admin\HistoryCrudController');

    

    Route::GET('/pencapaian/{NIS}/history', 'Admin\HistoryCrudController@index');
    Route::GET('/pencapaian/{NIS}/history/{id}/edit', 'Admin\HistoryCrudController@edit');
    Route::PUT('/pencapaian/{NIS}/history/{history}', 'Admin\HistoryCrudController@update');
    Route::DELETE('/pencapaian/{NIS}/history/{history}', 'Admin\HistoryCrudController@destroy');

    // Route::GET('/hafalan/create','Admin\HafalanCrudController@create');
    // Route::GET('/hafalan','Admin\HafalanCrudController@index');
    // Route::POST('/hafalan','Admin\HafalanCrudController@store');
    
  // [...] other routes
});


Route::group(['prefix' => 'guru'], function()
{

	CRUD::resource('hafalan', 'Guru\HafalanGuruCrudController');
    CRUD::resource('pencapaian', 'Guru\PencapaianGuruCrudController');
    CRUD::resource('history', 'Guru\HistoryGuruCrudController');

    Route::GET('/pencapaian/{id_hafalan}/history', 'Guru\HistoryGuruCrudController@index');
    Route::GET('/pencapaian/{id_hafalan}/history/{id}/edit', 'Guru\HistoryGuruCrudController@edit');
    Route::PUT('/pencapaian/{id_hafalan}/history/{history}', 'Guru\HistoryGuruCrudController@update');
    Route::DELETE('/pencapaian/{id_hafalan}/history/{history}', 'Guru\HistoryGuruCrudController@destroy');

});

Route::group(['prefix' => 'siswa'], function()
{

    
    CRUD::resource('history', 'Siswa\PencapaianSiswaCrudController');
    

});