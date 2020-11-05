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


use Illuminate\Http\Request;

Route::get('/', function ($guard = null) {
	if (Auth::guard($guard == 'admin')->check()) {
		return redirect('/admin');
	} elseif (Auth::guard($guard == 'adminupbjj')->check()) {
		return redirect('/adminupbjj');
	} elseif (Auth::guard($guard == 'unit')->check()) {
		return redirect('/unit');
	} elseif (Auth::guard($guard == 'pemantau')->check()) {
		return redirect('/pemantau');
	} elseif (Auth::guard($guard == 'upbjj')->check()) {
		return redirect('/upbjj');
	} elseif (Auth::guard($guard == 'pjtu')->check()) {
		return redirect('/pjtu');
	}
})->middleware('auth');

// Route untuk user yang baru register
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
	Route::get('/', function () {
		$data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
		return view('home', $data);
	});
	Route::post('upgrade', function (Request $request) {
		if ($request->ajax()) {
			$msg['success'] = 'false';
			$user = \App\User::find($request->id);
			if ($user)
				$user->putRole($request->level);
			$msg['success'] = 'true';

			return response()
				->json($msg);
		}
	});
});
// Route untuk user admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
	Route::get('/', function () {
		$data['users'] = \App\User::whereDoesntHave('roles')->get();
		$users = DB::Select('SELECT users.id, users.name, users.nip,users.email, roles.role_name FROM users INNER JOIN role_user on users.id = role_user.user_id 
		INNER JOIN roles on role_user.role_id = roles.id');
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		return view('layouts.starter_admin', $data)->with(compact('lampiran', 'panduan', 'uas', 'manual', 'users'));
	});
});

// Route untuk user adminupbjj
Route::group(['prefix' => 'adminupbjj', 'middleware' => ['auth', 'role:adminupbjj']], function () {
	Route::get('/', 'AdminUPBJJController@index', function () {
		$data['users'] = \App\User::whereDoesntHave('roles')->get();
		return view('adminupbjj.index', $data);
	});
});

// Route untuk user unit
Route::group(['prefix' => 'unit', 'middleware' => ['auth', 'role:unit']], function () {
	Route::get('/', function () {
		$data['users'] = \App\User::whereDoesntHave('roles')->get();
		return view('unitfront.starter_unit', $data);
	});
});

// Route untuk user pemantau
Route::group(['prefix' => 'pemantau', 'middleware' => ['auth', 'role:pemantau']], function () {
	Route::get('/', function () {
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		$pdf = DB::SELECT('select * from form_pemantau where email = "' . Auth::user()->email . '"');
		return view('layoutfront.starter_pemantau')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'pdf'));
	});
});

// Route untuk user upbjj
Route::group(['prefix' => 'upbjj', 'middleware' => ['auth', 'role:upbjj']], function () {
	Route::get('/',  function () {
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		return view('upbjjfront.starter_upbjj')->with(compact('lampiran', 'panduan', 'uas', 'manual'));
	});
});

// Route untuk user pjtu
Route::group(['prefix' => 'pjtu', 'middleware' => ['auth', 'role:pjtu']], function () {
	Route::get('/', function () {
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		return view('pjtufront.starter_pjtu')->with(compact('lampiran', 'panduan', 'uas', 'manual'));
	});
});

Auth::routes();


//Route Form
Route::get('pemantauan', 'PemantauanController@index')->name('pemantauan.index');
Route::post('pemantauan', 'PemantauanController@create')->name('pemantauan.create');
Route::post('pemantauan.store', 'PemantauanController@store')->name('pemantauan.store');
Route::get('pemantauan.uploadfoto', 'PemantauanController@tampiluploadfoto')->name('pemantauan.uploadfoto');
Route::post('pemantauan.uploadfoto', 'PemantauanController@uploadfoto')->name('pemantauan.uploadfoto');

Route::get('PJTUPJLU', 'PJTUPJLUController@index')->name('PJTUPJLU.index');
Route::post('PJTUPJLU.store', 'PJTUPJLUController@store')->name('PJTUPJLU.store');
Route::get('PJTUPJLU.uploadfoto', 'PJTUPJLUController@tampiluploadfoto')->name('PJTUPJLU.uploadfoto');
Route::post('PJTUPJLU.uploadfoto', 'PJTUPJLUController@uploadfoto')->name('PJTUPJLU.uploadfoto');

Route::get('feedback', 'FeedbackController@index')->name('feedback.index');
Route::post('feedback.store', 'FeedbackController@store')->name('feedback.store');

Route::get('mra', 'MRAController@index')->name('mra.index');
Route::post('mra.store', 'MRAController@store')->name('mra.store');

Route::get('evaluasi', 'EvaluasiController@index')->name('evaluasi.index');
Route::post('evaluasi.store', 'EvaluasiController@store')->name('evaluasi.store');

//create user
Route::get('/createusers', 'AdminController@create')->name('createuser');
Route::post('/user', 'AdminController@storeusers')->name('user');


//Excel
Route::post('/user/import_excel', 'AdminController@import_excel')->name('import_excel');

Route::get('/upbjj/excel', 'AdminUPBJJController@excel_upbjj')->name('upbjj.excel');
Route::get('/pjtu/excel', 'PJTUPJLUController@excel_pjtu')->name('pjtu.excel');
Route::get('/evaluasi/excel', 'EvaluasiController@excel_evaluasi')->name('evaluasi.excel');
Route::get('/upbjjperwil/excel', 'UPBJJController@excel_upbjjperwil')->name('upbjjperwil.excel');


//Laporan Admin
Route::get('/admin/evaluasichart', 'AdminController@chartevaluasi')->name('evaluasichartadmin');
Route::get('/admin/feedbackchart', 'AdminController@chartfeedback')->name('feedbackchartadmin');
Route::get('/admin/laporan', 'AdminController@laporan')->name('laporanadmin');
Route::get('/admin/laporanupbjj', 'AdminUPBJJController@laporanupbjj')->name('laporanupbjjadmin');
Route::get('/admin/laporanpjtu', 'PJTUPJLUController@laporanpjtu')->name('laporanpjtuadmin');
Route::get('/admin/laporanfeedback', 'FeedbackController@laporanfeedback')->name('laporanfeedback');
Route::get('/admin/laporanevaluasi', 'EvaluasiController@laporanevaluasi')->name('laporanevaluasi');
Route::get('/admin/searchpemantau', 'AdminController@searchpemantau')->name('searchpemantauadmin');
Route::get('/admin/searchfeedback', 'AdminController@searchfeedback')->name('searchfeedbackadmin');
Route::get('/admin/searchevaluasi', 'AdminController@searchevaluasi')->name('searchevaluasiadmin');
Route::get('/admin/searchpjtu', 'AdminController@searchpjtu')->name('searchpjtuadmin');
Route::get('/admin/searchadmupbjj', 'AdminController@searchadmupbjj')->name('searchadmupbjjadmin');

//Laporan Unit
Route::get('/unit/charts', 'UnitController@chart')->name('charts');
Route::get('/unit/laporanpemantau', 'UnitController@laporanpemantau')->name('laporanpemantau');
Route::get('/unit/laporanupbjj', 'UnitController@laporanupbjj')->name('laporanupbjj');
Route::get('/unit/laporanpjtu', 'UnitController@laporanpjtu')->name('laporanpjtu');
Route::get('/unit/laporanfeedback', 'UnitController@laporanfeedback')->name('laporanfeedback');
Route::get('/unit/laporanevaluasi', 'UnitController@laporanevaluasi')->name('laporanevaluasi');

Route::get('/unit/searchpemantau', 'UnitController@searchunitpemantau')->name('searchpemantauunit');
Route::get('/unit/searchupbjj', 'UnitController@searchunitupbjj')->name('searchupbjj');
Route::get('/unit/searchpjtu', 'UnitController@searchunitpjtu')->name('searchpjtu');
Route::get('/unit/searchfeedback', 'UnitController@searchunitfeedback')->name('searchfeedback');
Route::get('/unit/searchevaluasi', 'UnitController@searchunitevaluasi')->name('searchevaluasi');

//laporan upbjj
Route::get('/upbjj/laporanuser', 'UPBJJController@laporanuser')->name('upbjj.laporanuser');
Route::get('/upbjj/laporanfeedbackupbjj', 'UPBJJController@laporanfeedbackupbjj')->name('upbjj.laporanfeedback');
Route::get('/upbjj/searchpemantauupbjj', 'UPBJJController@searchpemantauupbjj')->name('searchpemantauupbjj');
Route::get('/upbjj/searchfeedbackupbjj', 'UPBJJController@searchfeedbackupbjj')->name('searchfeedbackupbjj');
Route::get('/upbjj/chartfeedback', 'UPBJJController@chartfeedback')->name('chartfeedback');
Route::get('/upbjj/searchsurattugas', 'UPBJJController@searchsurattugas')->name('searchsurattugasupbjj');
Route::get('/upbjj/surattugas', 'UPBJJController@hlmsurattugas')->name('surattugasupbjj');
Route::get('/upbjj/panduanuas', 'UPBJJController@panduanuas')->name('panduanuasupbjj');
Route::get('/upbjj/searchpanduanuas', 'UPBJJController@searchpanduanuas')->name('searchpanduanuasupbjj');

//PJTU
Route::get('/pjtu/surattugas', 'PJTUPJLUController@surattugaspjtu')->name('surattugaspjtu');
Route::get('/pjtu/searchsurattugas', 'PJTUPJLUController@searchsurattugaspjtu')->name('searchsurattugaspjtu');
Route::get('/pjtu/panduanuas', 'PJTUPJLUController@panduanuaspjtu')->name('panduanuaspjtu');
Route::get('/pjtu/searchpanduanuas', 'PJTUPJLUController@searchpanduanuaspjtu')->name('searchpanduanuaspjtu');

//upload
Route::get('admin/uploadsurat', 'AdminController@upload')->name('uploadsurat');
Route::post('/surattugas', 'AdminController@tambahsurattugas')->name('surattugasadmin');
Route::post('/surattugas/update/{id}', 'AdminController@updatelampiran')->name('surattugasupdate');
Route::get('/jadwal/destroy/{id}', 'AdminController@destroysurattugas')->name('jadwaldelete');
Route::post('/panduan/update/{id}', 'AdminController@updatepanduan')->name('panduanupdate');
Route::post('/uas/update/{id}', 'AdminController@updateuas')->name('uasupdate');
Route::post('/manual/update/{id}', 'AdminController@updatemanual')->name('manualupdate');
Route::get('/admin/addsurattugas', 'AdminController@surattugas')->name('addsurattugasadmin');

//masa ujian
Route::get('/admin/masaujian', 'AdminController@masa')->name('masaujian');
Route::get('/masa/hapus/{id}', 'AdminController@hapusmasa')->name('deletmasa');
Route::post('/tambahmasa', 'AdminController@tambahmasa')->name('tambahmasa');

//download
Route::get('/download/surattugas/{id}', 'AdminController@surattugaspdf')->name('downloadsurattugas');
Route::get('/download/panduan/{id}', 'AdminController@panduanpemantauan')->name('downloadpanduan');
Route::get('/download/uas/{id}', 'AdminController@panduanuas')->name('downloaduas');
Route::get('/download/manual/{id}', 'AdminController@panduanmanual')->name('downloadmanual');

//pemantau
Route::get('/download/excelpemantau', 'PemantauanController@downloadexcel')->name('downlodexcelpemantau');
Route::get('/pemantau/surattugas', 'PemantauanController@hlmsurattugas')->name('surattugaspemantau');
Route::get('/pemantau/searchsurattugas', 'PemantauanController@searchsurattugas')->name('searchsurattugaspemantau');
Route::get('/pemantau/panduanuas', 'PemantauanController@hlmpanduanuas')->name('panduanuaspemantau');
Route::get('/pemantau/searchpanduanuas', 'PemantauanController@searchpanduanuas')->name('searchpanduanuaspemantau');

//download PDF
Route::get('/download/pdf/{id}', 'PemantauanController@downloadpdf')->name('downloadpdf');
