<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use Chart;
use Session;
use App\Masa;
use \App\User;
use App\panduan;
use App\form_mra;
use App\UserRole;
use App\form_pjtu;
use App\panduan_uas;
use App\form_evaluasi;
use App\form_feedback;
use App\form_pemantau;
use App\panduan_manual;
use App\panduan_lampiran;
use App\Exports\PJTUExport;
use App\Imports\UserImport;
use App\Exports\UPBJJExport;
use Illuminate\Http\Request;
use App\Charts\EvaluasiChart;
use App\Exports\ReportExport;
use App\Charts\PemantauanChart;
use App\Charts\UpbjjChart;
use App\Charts\PjtuChart;
use App\Exports\EvaluasiExport;
use App\Exports\FeedbackExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use ConsoleTVs\Charts\Classes\C3\Chart as C3Chart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart as ChartjsChart;


class AdminController extends Controller
{
	public function index()
	{
		$users = DB::Select('SELECT users.id, users.name, users.nip,users.email, roles.role_name FROM users INNER JOIN role_user on users.id = role_user.user_id 
		INNER JOIN roles on role_user.role_id = roles.id');
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		return view('role.admin')->with(compact('users', 'lampiran', 'panduan', 'uas', 'manual'));
	}

	public function create()
	{
		$wilayah = DB::SELECT('Select * from upbjj ');
		return view('admin.create')->with(compact('wilayah'));
	}


	public function storeusers(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'nip' => 'required|string',
			'password' => 'required|string|min:6|confirmed'
		]);

		$users = new User;
		$users->name = $request->name;
		$users->email = $request->email;
		$users->nip = $request->nip;
		$users->password = Hash::make($request->password);
		$users->id_upbjj = $request->id_upbjj;
		$users->save();

		if ($users->id != NULL) {
			$role = new UserRole;
			$role->user_id = $users->id;
			$role->role_id = $request->role_id;
			$role->save();
		}

		Alert::success('Berhasil', 'Data Berhasil di Input');
		return redirect('/admin');
	}

	public function laporan()
	{
		$masa = DB::SELECT('Select * from masa');
		return view('admin.laporan')->with(compact('masa'));
	}

	public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand() . $file->getClientOriginalName();

		// upload ke folder file_user di dalam folder public
		$file->move('file_user', $nama_file);

		// import data
		Excel::import(new UserImport, public_path('/file_user/' . $nama_file));

		// notifikasi dengan session
		Session::flash('sukses', 'Data User Berhasil di Import!');

		// alihkan halaman kembali
		return redirect('/admin');
	}



	function searchpemantau(Request $request)
	{
		$method = $request->method();
		if ($request->isMethod('get')) {
			$search = $request->input('search');
			if ($request->has('tampil')) {
				$masa = DB::SELECT('Select * from masa');
				$search = $request->get('search');
				$result = form_pemantau::where('masa_ujian', $search)->paginate(10);
				if (count($result)) {
					Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
				}
				return view('admin.result_pemantau', compact('masa', 'search', 'result'));
			} else if ($request->has('ExportExcel')) {
				return Excel::download(new ReportExport($search), 'Report Pemantau Excel.xls');
			} else if ($request->has('Chart')) {
				$pemantau = DB::SELECT('select  * from form_pemantau where masa_ujian = "' . $search . '"');
				//amplop
				$datayes = DB::Select('Select count(select1) as count from form_pemantau where select1 = "Ya" && masa_ujian = "' . $search . '"');
				$datano = DB::Select('Select count(select1) as count from form_pemantau where select1 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano as $data) {
					$datumno = (int) $data->count;
				}

				foreach ($datayes as $data) {
					$datum = (int) $data->count;
				}
				$charts1 = new PemantauanChart;
				$charts1->labels(['Yes', 'Tidak']);
				$charts1->dataset('Amplop', 'pie', [$datum, $datumno])->backgroundcolor(['red', 'blue']);

				//lju
				$datayes1 = DB::Select('Select count(select2) as count from form_pemantau where select2 = "Ya" && masa_ujian = "' . $search . '"');
				$datano1 = DB::Select('Select count(select2) as count from form_pemantau where select2 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano1 as $data) {
					$datumno1 = (int) $data->count;
				}

				foreach ($datayes1 as $data) {
					$datum1 = (int) $data->count;
				}

				$charts2 = new PemantauanChart;
				$charts2->labels(['Yes', 'Tidak']);
				$charts2->dataset('My dataset', 'pie', [$datum1, $datumno1])->backgroundcolor(['red', 'blue']);

				//BJU
				$datayes3 = DB::Select('Select count(select3) as count from form_pemantau where select3 = "Ya" && masa_ujian = "' . $search . '"');
				$datano3 = DB::Select('Select count(select3) as count from form_pemantau where select3 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano3 as $data) {
					$datumno3 = (int) $data->count;
				}

				foreach ($datayes3 as $data) {
					$datum3 = (int) $data->count;
				}

				$charts3 = new PemantauanChart;
				$charts3->labels(['Yes', 'Tidak']);
				$charts3->dataset('My dataset', 'pie', [$datum3, $datumno3])->backgroundcolor(['red', 'blue']);

				//Daftar Hadir
				$datayes4 = DB::Select('Select count(select4) as count from form_pemantau where select4 = "Ya" && masa_ujian = "' . $search . '"');
				$datano4 = DB::Select('Select count(select4) as count from form_pemantau where select4 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano4 as $data) {
					$datumno4 = (int) $data->count;
				}

				foreach ($datayes4 as $data) {
					$datum4 = (int) $data->count;
				}

				$charts4 = new PemantauanChart;
				$charts4->labels(['Yes', 'Tidak']);
				$charts4->dataset('My dataset', 'pie', [$datum4, $datumno4])->backgroundcolor(['red', 'blue']);

				//KTPU
				$datayes5 = DB::Select('Select count(select5) as count from form_pemantau where select5 = "Ya" && masa_ujian = "' . $search . '"');
				$datano5 = DB::Select('Select count(select5) as count from form_pemantau where select5 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano5 as $data) {
					$datumno5 = (int) $data->count;
				}

				foreach ($datayes5 as $data) {
					$datum5 = (int) $data->count;
				}

				$charts5 = new PemantauanChart;
				$charts5->labels(['Yes', 'Tidak']);
				$charts5->dataset('My dataset', 'pie', [$datum5, $datumno5])->backgroundcolor(['red', 'blue']);

				//berita acara
				$datayes6 = DB::Select('Select count(select6) as count from form_pemantau where select6 = "Ya" && masa_ujian = "' . $search . '"');
				$datano6 = DB::Select('Select count(select6) as count from form_pemantau where select6 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano6 as $data) {
					$datumno6 = (int) $data->count;
				}

				foreach ($datayes6 as $data) {
					$datum6 = (int) $data->count;
				}

				$charts6 = new PemantauanChart;
				$charts6->labels(['Yes', 'Tidak']);
				$charts6->dataset('My dataset', 'pie', [$datum6, $datumno6])->backgroundcolor(['red', 'blue']);

				//2.Kemasan Ujian 
				$datayes7 = DB::Select('Select count(select7) as count from form_pemantau where select7 = "Ya" && masa_ujian = "' . $search . '"');
				$datano7 = DB::Select('Select count(select7) as count from form_pemantau where select7 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano7 as $data) {
					$datumno7 = (int) $data->count;
				}

				foreach ($datayes7 as $data) {
					$datum7 = (int) $data->count;
				}

				$charts7 = new PemantauanChart;
				$charts7->labels(['Yes', 'Tidak']);
				$charts7->dataset('My dataset', 'pie', [$datum7, $datumno7])->backgroundcolor(['red', 'blue']);

				//3.Jumlah dan jenis naskah sesuai dengan rekap?
				$datayes8 = DB::Select('Select count(select8) as count from form_pemantau where select8 = "Ya" && masa_ujian = "' . $search . '"');
				$datano8 = DB::Select('Select count(select8) as count from form_pemantau where select8 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano8 as $data) {
					$datumno8 = (int) $data->count;
				}

				foreach ($datayes8 as $data) {
					$datum8 = (int) $data->count;
				}

				$charts8 = new PemantauanChart;
				$charts8->labels(['Yes', 'Tidak']);
				$charts8->dataset('My dataset', 'pie', [$datum8, $datumno8])->backgroundcolor(['red', 'blue']);

				// 4. Apakah kemasan naskah ujian diterima sesuai dengan jam ujian di setiap ruang ujian? 
				$datayes9 = DB::Select('Select count(select9) as count from form_pemantau where select9 = "Ya" && masa_ujian = "' . $search . '"');
				$datano9 = DB::Select('Select count(select9) as count from form_pemantau where select9 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano9 as $data) {
					$datumno9 = (int) $data->count;
				}

				foreach ($datayes9 as $data) {
					$datum9 = (int) $data->count;
				}

				$charts9 = new PemantauanChart;
				$charts9->labels(['Yes', 'Tidak']);
				$charts9->dataset('My dataset', 'pie', [$datum9, $datumno9])->backgroundcolor(['red', 'blue']);

				// 1. Apakah setiap panitia ujian di lokasi ujian menerima SK Panitia Ujian? (PJTU, PJLU, Pengawas Keliling, Pengawas Ruang, Tenaga administrasi)
				$datayes10 = DB::Select('Select count(select10) as count from form_pemantau where select10 = "Ya" && masa_ujian = "' . $search . '"');
				$datano10 = DB::Select('Select count(select10) as count from form_pemantau where select10 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano10 as $data) {
					$datumno10 = (int) $data->count;
				}

				foreach ($datayes10 as $data) {
					$datum10 = (int) $data->count;
				}

				$charts10 = new PemantauanChart;
				$charts10->labels(['Yes', 'Tidak']);
				$charts10->dataset('My dataset', 'pie', [$datum10, $datumno10])->backgroundcolor(['red', 'blue']);

				//	2. Apakah jumlah panitia memenuhi persyaratan?*
				$datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '"');
				$datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano11 as $data) {
					$datumno11 = (int) $data->count;
				}

				foreach ($datayes11 as $data) {
					$datum11 = (int) $data->count;
				}

				$charts11 = new PemantauanChart;
				$charts11->labels(['Yes', 'Tidak']);
				$charts11->dataset('My dataset', 'pie', [$datum11, $datumno11])->backgroundcolor(['red', 'blue']);

				//	2. Apakah jumlah panitia memenuhi persyaratan?*
				$datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '"');
				$datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano11 as $data) {
					$datumno11 = (int) $data->count;
				}

				foreach ($datayes11 as $data) {
					$datum11 = (int) $data->count;
				}

				$charts11 = new PemantauanChart;
				$charts11->labels(['Yes', 'Tidak']);
				$charts11->dataset('My dataset', 'pie', [$datum11, $datumno11])->backgroundcolor(['red', 'blue']);

				//	2. Apakah jumlah panitia memenuhi persyaratan?*
				$datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '"');
				$datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano11 as $data) {
					$datumno11 = (int) $data->count;
				}

				foreach ($datayes11 as $data) {
					$datum11 = (int) $data->count;
				}

				$charts11 = new PemantauanChart;
				$charts11->labels(['Yes', 'Tidak']);
				$charts11->dataset('My dataset', 'pie', [$datum11, $datumno11])->backgroundcolor(['red', 'blue']);

				//	//	2. Apakah jumlah panitia memenuhi persyaratan?*
				$datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '"');
				$datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano11 as $data) {
					$datumno11 = (int) $data->count;
				}

				foreach ($datayes11 as $data) {
					$datum11 = (int) $data->count;
				}

				$charts11 = new PemantauanChart;
				$charts11->labels(['Yes', 'Tidak']);
				$charts11->dataset('My dataset', 'pie', [$datum11, $datumno11])->backgroundcolor(['red', 'blue']);

				// 3. Apakah panitia direkrut sesuai dengan persyaratan?*

				$datayes12 = DB::Select('Select count(select12) as count from form_pemantau where select12 = "Ya" && masa_ujian = "' . $search . '"');
				$datano12 = DB::Select('Select count(select12) as count from form_pemantau where select12 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano12 as $data) {
					$datumno12 = (int) $data->count;
				}

				foreach ($datayes12 as $data) {
					$datum12 = (int) $data->count;
				}

				$charts12 = new PemantauanChart;
				$charts12->labels(['Yes', 'Tidak']);
				$charts12->dataset('My dataset', 'pie', [$datum12, $datumno12])->backgroundcolor(['red', 'blue']);


				// 4. Apakah pelaksanaan ujian melibatkan aparat keamanan?*

				$datayes13 = DB::Select('Select count(select13) as count from form_pemantau where select13 = "Ya" && masa_ujian = "' . $search . '"');
				$datano13 = DB::Select('Select count(select13) as count from form_pemantau where select13 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano13 as $data) {
					$datumno13 = (int) $data->count;
				}

				foreach ($datayes13 as $data) {
					$datum13 = (int) $data->count;
				}

				$charts13 = new PemantauanChart;
				$charts13->labels(['Yes', 'Tidak']);
				$charts13->dataset('My dataset', 'pie', [$datum13, $datumno13])->backgroundcolor(['red', 'blue']);

				// 1. Apakah sarana-prasarana sesuai dengan persyaratan?*

				$datayes14 = DB::Select('Select count(select14) as count from form_pemantau where select14 = "Ya" && masa_ujian = "' . $search . '"');
				$datano14 = DB::Select('Select count(select14) as count from form_pemantau where select14 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano14 as $data) {
					$datumno14 = (int) $data->count;
				}

				foreach ($datayes14 as $data) {
					$datum14 = (int) $data->count;
				}

				$charts14 = new PemantauanChart;
				$charts14->labels(['Yes', 'Tidak']);
				$charts14->dataset('My dataset', 'pie', [$datum14, $datumno14])->backgroundcolor(['red', 'blue']);

				// 2. Apakah Denah Lokasi Ujian, Tata Tertib, Nomor Ruang, dan Daftar Peserta Ujian ditempel sesuai ketentuan?*

				$datayes15 = DB::Select('Select count(select15) as count from form_pemantau where select15 = "Ya" && masa_ujian = "' . $search . '"');
				$datano15 = DB::Select('Select count(select15) as count from form_pemantau where select15 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano15 as $data) {
					$datumno15 = (int) $data->count;
				}

				foreach ($datayes15 as $data) {
					$datum15 = (int) $data->count;
				}

				$charts15 = new PemantauanChart;
				$charts15->labels(['Yes', 'Tidak']);
				$charts15->dataset('My dataset', 'pie', [$datum15, $datumno15])->backgroundcolor(['red', 'blue']);

				// 3. Apakah jumlah peserta ujian di ruang sesuai dengan persyaratan?*

				$datayes16 = DB::Select('Select count(select16) as count from form_pemantau where select16 = "Ya" && masa_ujian = "' . $search . '"');
				$datano16 = DB::Select('Select count(select16) as count from form_pemantau where select16 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano16 as $data) {
					$datumno16 = (int) $data->count;
				}

				foreach ($datayes16 as $data) {
					$datum16 = (int) $data->count;
				}

				$charts16 = new PemantauanChart;
				$charts16->labels(['Yes', 'Tidak']);
				$charts16->dataset('My dataset', 'pie', [$datum16, $datumno16])->backgroundcolor(['red', 'blue']);

				// 4. Apakah terdapat lokasi ujian yang menggunakan aula atau GOR? Jika ya, lanjutkan ke pertanyaan 5. Jika tidak lanjutkan ke pertanyaan 6*

				$datayes17 = DB::Select('Select count(select17) as count from form_pemantau where select17 = "Ya" && masa_ujian = "' . $search . '"');
				$datano17 = DB::Select('Select count(select17) as count from form_pemantau where select17 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano17 as $data) {
					$datumno17 = (int) $data->count;
				}

				foreach ($datayes17 as $data) {
					$datum17 = (int) $data->count;
				}

				$charts17 = new PemantauanChart;
				$charts17->labels(['Yes', 'Tidak']);
				$charts17->dataset('My dataset', 'pie', [$datum17, $datumno17])->backgroundcolor(['red', 'blue']);

				//5. Apakah penataan peserta ujian di aula/GOR diatur sesuai dengan ketentuan? *

				$datayes18 = DB::Select('Select count(select18) as count from form_pemantau where select18 = "Ya" && masa_ujian = "' . $search . '"');
				$datano18 = DB::Select('Select count(select18) as count from form_pemantau where select18 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano18 as $data) {
					$datumno18 = (int) $data->count;
				}

				foreach ($datayes18 as $data) {
					$datum18 = (int) $data->count;
				}

				$charts18 = new PemantauanChart;
				$charts18->labels(['Yes', 'Tidak']);
				$charts18->dataset('My dataset', 'pie', [$datum18, $datumno18])->backgroundcolor(['red', 'blue']);

				//6. Apakah tersedia ruang khusus (kasus)?*

				$datayes19 = DB::Select('Select count(select19) as count from form_pemantau where select19 = "Ya" && masa_ujian = "' . $search . '"');
				$datano19 = DB::Select('Select count(select19) as count from form_pemantau where select19 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano19 as $data) {
					$datumno19 = (int) $data->count;
				}

				foreach ($datayes19 as $data) {
					$datum19 = (int) $data->count;
				}

				$charts19 = new PemantauanChart;
				$charts19->labels(['Yes', 'Tidak']);
				$charts19->dataset('My dataset', 'pie', [$datum19, $datumno19])->backgroundcolor(['red', 'blue']);

				//7. Apakah tersedia ruang ujian dan sarana untuk ujian listening/speaking/berbicara?*

				$datayes20 = DB::Select('Select count(select20) as count from form_pemantau where select20 = "Ya" && masa_ujian = "' . $search . '"');
				$datano20 = DB::Select('Select count(select20) as count from form_pemantau where select20 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano20 as $data) {
					$datumno20 = (int) $data->count;
				}

				foreach ($datayes20 as $data) {
					$datum20 = (int) $data->count;
				}

				$charts20 = new PemantauanChart;
				$charts20->labels(['Yes', 'Tidak']);
				$charts20->dataset('My dataset', 'pie', [$datum20, $datumno20])->backgroundcolor(['red', 'blue']);

				//8. Apakah pelaksanaan ujian listening/speaking/berbicara sesuai dengan ketentuan?*

				$datayes21 = DB::Select('Select count(select21) as count from form_pemantau where select21 = "Ya" && masa_ujian = "' . $search . '"');
				$datano21 = DB::Select('Select count(select21) as count from form_pemantau where select21 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano21 as $data) {
					$datumno21 = (int) $data->count;
				}

				foreach ($datayes21 as $data) {
					$datum21 = (int) $data->count;
				}

				$charts21 = new PemantauanChart;
				$charts21->labels(['Yes', 'Tidak']);
				$charts21->dataset('My dataset', 'pie', [$datum21, $datumno21])->backgroundcolor(['red', 'blue']);

				//9. Apakah tata tertib ujian dibacakan oleh pengawas ruang setiap jam ujian?*

				$datayes22 = DB::Select('Select count(select22) as count from form_pemantau where select22 = "Ya" && masa_ujian = "' . $search . '"');
				$datano22 = DB::Select('Select count(select22) as count from form_pemantau where select22 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano22 as $data) {
					$datumno22 = (int) $data->count;
				}

				foreach ($datayes22 as $data) {
					$datum22 = (int) $data->count;
				}

				$charts22 = new PemantauanChart;
				$charts22->labels(['Yes', 'Tidak']);
				$charts22->dataset('My dataset', 'pie', [$datum22, $datumno22])->backgroundcolor(['red', 'blue']);

				//10. Apakah ditemukan pelanggaran tata tertib oleh peserta ujian?*

				$datayes23 = DB::Select('Select count(select23) as count from form_pemantau where select23 = "Ya" && masa_ujian = "' . $search . '"');
				$datano23 = DB::Select('Select count(select23) as count from form_pemantau where select23 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano23 as $data) {
					$datumno23 = (int) $data->count;
				}

				foreach ($datayes23 as $data) {
					$datum23 = (int) $data->count;
				}

				$charts23 = new PemantauanChart;
				$charts23->labels(['Yes', 'Tidak']);
				$charts23->dataset('My dataset', 'pie', [$datum23, $datumno23])->backgroundcolor(['red', 'blue']);

				//11. Apakah Pengawas Ruang melaksanakan tugas sesuai dengan fungsinya?*

				$datayes24 = DB::Select('Select count(select24) as count from form_pemantau where select24 = "Ya" && masa_ujian = "' . $search . '"');
				$datano24 = DB::Select('Select count(select24) as count from form_pemantau where select24 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano24 as $data) {
					$datumno24 = (int) $data->count;
				}

				foreach ($datayes24 as $data) {
					$datum24 = (int) $data->count;
				}

				$charts24 = new PemantauanChart;
				$charts24->labels(['Yes', 'Tidak']);
				$charts24->dataset('My dataset', 'pie', [$datum24, $datumno24])->backgroundcolor(['red', 'blue']);

				//	12. Apakah Pengawas Keliling melaksanakan tugas sesuai dengan fungsinya?*

				$datayes25 = DB::Select('Select count(select25) as count from form_pemantau where select25 = "Ya" && masa_ujian = "' . $search . '"');
				$datano25 = DB::Select('Select count(select25) as count from form_pemantau where select25 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano25 as $data) {
					$datumno25 = (int) $data->count;
				}

				foreach ($datayes25 as $data) {
					$datum25 = (int) $data->count;
				}

				$charts25 = new PemantauanChart;
				$charts25->labels(['Yes', 'Tidak']);
				$charts25->dataset('My dataset', 'pie', [$datum25, $datumno25])->backgroundcolor(['red', 'blue']);

				//	13. Apakah permintaan naskah ujian tambahan dan penggandaan naskah ujian sesuai dengan ketentuan?*

				$datayes26 = DB::Select('Select count(select26) as count from form_pemantau where select26 = "Ya" && masa_ujian = "' . $search . '"');
				$datano26 = DB::Select('Select count(select26) as count from form_pemantau where select26 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano26 as $data) {
					$datumno26 = (int) $data->count;
				}

				foreach ($datayes26 as $data) {
					$datum26 = (int) $data->count;
				}

				$charts26 = new PemantauanChart;
				$charts26->labels(['Yes', 'Tidak']);
				$charts26->dataset('My dataset', 'pie', [$datum26, $datumno26])->backgroundcolor(['red', 'blue']);

				// 1. Apakah hasil ujian ditata sesuai dengan ketentuan?

				$datayes27 = DB::Select('Select count(select27) as count from form_pemantau where select27 = "Ya" && masa_ujian = "' . $search . '"');
				$datano27 = DB::Select('Select count(select27) as count from form_pemantau where select27 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano27 as $data) {
					$datumno27 = (int) $data->count;
				}

				foreach ($datayes27 as $data) {
					$datum27 = (int) $data->count;
				}

				$charts27 = new PemantauanChart;
				$charts27->labels(['Yes', 'Tidak']);
				$charts27->dataset('My dataset', 'pie', [$datum27, $datumno27])->backgroundcolor(['red', 'blue']);

				// 2. Apakah hasil ujian dijaga keamanannya dengan baik?*

				$datayes28 = DB::Select('Select count(select28) as count from form_pemantau where select28 = "Ya" && masa_ujian = "' . $search . '"');
				$datano28 = DB::Select('Select count(select28) as count from form_pemantau where select28 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano28 as $data) {
					$datumno28 = (int) $data->count;
				}

				foreach ($datayes28 as $data) {
					$datum28 = (int) $data->count;
				}

				$charts28 = new PemantauanChart;
				$charts28->labels(['Yes', 'Tidak']);
				$charts28->dataset('My dataset', 'pie', [$datum28, $datumno28])->backgroundcolor(['red', 'blue']);

				// 3. Apakah pengiriman hasil ujian dilakukan sesuai ketentuan?*

				$datayes29 = DB::Select('Select count(select29) as count from form_pemantau where select29 = "Ya" && masa_ujian = "' . $search . '"');
				$datano29 = DB::Select('Select count(select29) as count from form_pemantau where select29 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano29 as $data) {
					$datumno29 = (int) $data->count;
				}

				foreach ($datayes29 as $data) {
					$datum29 = (int) $data->count;
				}

				$charts29 = new PemantauanChart;
				$charts29->labels(['Yes', 'Tidak']);
				$charts29->dataset('My dataset', 'pie', [$datum29, $datumno29])->backgroundcolor(['red', 'blue']);

				// 4. Apakah naskah ujian di musnahkan pada jam terakhir? *

				$datayes30 = DB::Select('Select count(select30) as count from form_pemantau where select30 = "Ya" && masa_ujian = "' . $search . '"');
				$datano30 = DB::Select('Select count(select30) as count from form_pemantau where select30 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano30 as $data) {
					$datumno30 = (int) $data->count;
				}

				foreach ($datayes30 as $data) {
					$datum30 = (int) $data->count;
				}

				$charts30 = new PemantauanChart;
				$charts30->labels(['Yes', 'Tidak']);
				$charts30->dataset('My dataset', 'pie', [$datum30, $datumno30])->backgroundcolor(['red', 'blue']);

				// 5. Apakah semua naskah ujian dimusnahkan setiap hari ujian?*

				$datayes31 = DB::Select('Select count(select31) as count from form_pemantau where select31 = "Ya" && masa_ujian = "' . $search . '"');
				$datano31 = DB::Select('Select count(select31) as count from form_pemantau where select31 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano31 as $data) {
					$datumno31 = (int) $data->count;
				}

				foreach ($datayes31 as $data) {
					$datum31 = (int) $data->count;
				}

				$charts31 = new PemantauanChart;
				$charts31->labels(['Yes', 'Tidak']);
				$charts31->dataset('My dataset', 'pie', [$datum31, $datumno31])->backgroundcolor(['red', 'blue']);

				return view('admin.charts', compact(
					'pemantau',
					'charts1',
					'charts2',
					'charts3',
					'charts4',
					'charts5',
					'charts6',
					'charts7',
					'charts8',
					'charts9',
					'charts10',
					'charts11',
					'charts12',
					'charts13',
					'charts14',
					'charts15',
					'charts16',
					'charts17',
					'charts18',
					'charts19',
					'charts20',
					'charts21',
					'charts22',
					'charts23',
					'charts24',
					'charts25',
					'charts26',
					'charts27',
					'charts28',
					'charts29',
					'charts30',
					'charts31'
				));
			}
		}
	}

	function searchfeedback(Request $request)
	{
		$method = $request->method();
		if ($request->isMethod('get')) {
			$search = $request->input('search');
			if ($request->has('tampil')) {
				$masa = DB::SELECT('Select * from masa');
				$search = $request->get('search');
				$result = form_feedback::where('masa_ujian', $search)->paginate(10);
				if (count($result)) {
					Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
				}
				return view('admin.result_feedback', compact('masa', 'search', 'result'));
			} else if ($request->has('ExportExcel')) {
				return Excel::download(new FeedbackExport($search), 'Report Feedback Excel.xls');
			} else if ($request->has('Chart')) {
				$feedback = DB::SELECT('Select * from form_feedback where masa_ujian = "' . $search . '"');
				return view('admin.feedbackchart', compact('feedback'));
			}
		}
	}

	function searchevaluasi(Request $request)
	{
		$method = $request->method();
		if ($request->isMethod('get')) {
			$search = $request->input('search');
			if ($request->has('tampil')) {
				$masa = DB::SELECT('Select * from masa');
				$search = $request->get('search');
				$result = form_evaluasi::where('masa_ujian', $search)->paginate(10);
				if (count($result)) {
					Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
				}
				return view('admin.result_evaluasi', compact('masa', 'search', 'result'));
			} else if ($request->has('ExportExcel')) {
				return Excel::download(new EvaluasiExport($search), 'Report Evaluasi Excel.xls');
			} else if ($request->has('Chart')) {
				$evaluasi = DB::SELECT('Select * from form_evaluasi');

				//1. Petugas memberitahu ke Ka
				$datayes1 = DB::Select('Select count(select1) as count from form_evaluasi where select1 = "Ya" && masa_ujian = "' . $search . '"');
				$datano1 = DB::Select('Select count(select1) as count from form_evaluasi where select1 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano1 as $data) {
					$datumno1 = (int) $data->count;
				}

				foreach ($datayes1 as $data) {
					$datum1 = (int) $data->count;
				}

				$charts1 = new EvaluasiChart;
				$charts1->labels(['Yes', 'Tidak']);
				$charts1->dataset('My dataset', 'pie', [$datum1, $datumno1])->backgroundcolor(['red', 'blue']);

				//2. Petugas meminta perlakuan khusus

				$datayes2 = DB::Select('Select count(select2) as count from form_evaluasi where select2 = "Ya" && masa_ujian = "' . $search . '"');
				$datano2 = DB::Select('Select count(select2) as count from form_evaluasi where select2 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano2 as $data) {
					$datumno2 = (int) $data->count;
				}

				foreach ($datayes2 as $data) {
					$datum2 = (int) $data->count;
				}

				$charts2 = new EvaluasiChart;
				$charts2->labels(['Yes', 'Tidak']);
				$charts2->dataset('My dataset', 'pie', [$datum2, $datumno2])->backgroundcolor(['red', 'blue']);
				//3. Petugas berkoordinasi dengan petugas lain
				$datayes3 = DB::Select('Select count(select3) as count from form_evaluasi where select3 = "Ya" && masa_ujian = "' . $search . '"');
				$datano3 = DB::Select('Select count(select3) as count from form_evaluasi where select3 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano3 as $data) {
					$datumno3 = (int) $data->count;
				}

				foreach ($datayes3 as $data) {
					$datum3 = (int) $data->count;
				}

				$charts3 = new EvaluasiChart;
				$charts3->labels(['Yes', 'Tidak']);
				$charts3->dataset('My dataset', 'pie', [$datum3, $datumno3])->backgroundcolor(['red', 'blue']);
				//4. Petugas Sopan
				$datayes4 = DB::Select('Select count(select4) as count from form_evaluasi where select4 = "Ya" && masa_ujian = "' . $search . '"');
				$datano4 = DB::Select('Select count(select4) as count from form_evaluasi where select4 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano4 as $data) {
					$datumno4 = (int) $data->count;
				}

				foreach ($datayes4 as $data) {
					$datum4 = (int) $data->count;
				}

				$charts4 = new EvaluasiChart;
				$charts4->labels(['Yes', 'Tidak']);
				$charts4->dataset('My dataset', 'pie', [$datum4, $datumno4])->backgroundcolor(['red', 'blue']);
				//5. Petugas sopan berpakaian
				$datayes5 = DB::Select('Select count(select5) as count from form_evaluasi where select5 = "Ya" && masa_ujian = "' . $search . '"');
				$datano5 = DB::Select('Select count(select5) as count from form_evaluasi where select5 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano5 as $data) {
					$datumno5 = (int) $data->count;
				}

				foreach ($datayes5 as $data) {
					$datum5 = (int) $data->count;
				}

				$charts5 = new EvaluasiChart;
				$charts5->labels(['Yes', 'Tidak']);
				$charts5->dataset('My dataset', 'pie', [$datum5, $datumno5])->backgroundcolor(['red', 'blue']);
				//Pengenal
				$datayes6 = DB::Select('Select count(select6) as count from form_evaluasi where select6 = "Ya" && masa_ujian = "' . $search . '"');
				$datano6 = DB::Select('Select count(select6) as count from form_evaluasi where select6 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano6 as $data) {
					$datumno6 = (int) $data->count;
				}

				foreach ($datayes6 as $data) {
					$datum6 = (int) $data->count;
				}

				$charts6 = new EvaluasiChart;
				$charts6->labels(['Yes', 'Tidak']);
				$charts6->dataset('My dataset', 'pie', [$datum6, $datumno6])->backgroundcolor(['red', 'blue']);

				//7. Pemantau membantu petugas
				$datayes7 = DB::Select('Select count(select7) as count from form_evaluasi where select7 = "Ya" && masa_ujian = "' . $search . '"');
				$datano7 = DB::Select('Select count(select7) as count from form_evaluasi where select7 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano7 as $data) {
					$datumno7 = (int) $data->count;
				}

				foreach ($datayes7 as $data) {
					$datum7 = (int) $data->count;
				}

				$charts7 = new EvaluasiChart;
				$charts7->labels(['Yes', 'Tidak']);
				$charts7->dataset('My dataset', 'pie', [$datum7, $datumno7])->backgroundcolor(['red', 'blue']);

				//8. Petugas membantu jaga ketertiban
				$datayes8 = DB::Select('Select count(select8) as count from form_evaluasi where select8 = "Ya" && masa_ujian = "' . $search . '"');
				$datano8 = DB::Select('Select count(select8) as count from form_evaluasi where select8 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano8 as $data) {
					$datumno8 = (int) $data->count;
				}

				foreach ($datayes8 as $data) {
					$datum8 = (int) $data->count;
				}

				$charts8 = new EvaluasiChart;
				$charts8->labels(['Yes', 'Tidak']);
				$charts8->dataset('My dataset', 'pie', [$datum8, $datumno8])->backgroundcolor(['red', 'blue']);

				//9. Pemantau berkoordinasi dengan MRA

				$datayes9 = DB::Select('Select count(select9) as count from form_evaluasi where select9 = "Ya" && masa_ujian = "' . $search . '"');
				$datano9 = DB::Select('Select count(select9) as count from form_evaluasi where select9 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano9 as $data) {
					$datumno9 = (int) $data->count;
				}

				foreach ($datayes9 as $data) {
					$datum9 = (int) $data->count;
				}

				$charts9 = new EvaluasiChart;
				$charts9->labels(['Yes', 'Tidak']);
				$charts9->dataset('My dataset', 'pie', [$datum9, $datumno9])->backgroundcolor(['red', 'blue']);

				//10. Petugas berkoordinasi denga MRA

				$datayes10 = DB::Select('Select count(select10) as count from form_evaluasi where select10 = "Ya" && masa_ujian = "' . $search . '"');
				$datano10 = DB::Select('Select count(select10) as count from form_evaluasi where select10 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano10 as $data) {
					$datumno10 = (int) $data->count;
				}

				foreach ($datayes10 as $data) {
					$datum10 = (int) $data->count;
				}

				$charts10 = new EvaluasiChart;
				$charts10->labels(['Yes', 'Tidak']);
				$charts10->dataset('My dataset', 'pie', [$datum10, $datumno10])->backgroundcolor(['red', 'blue']);

				//11. Petugas memahami prosedur
				$datayes11 = DB::Select('Select count(select11) as count from form_evaluasi where select11 = "Ya" && masa_ujian = "' . $search . '"');
				$datano11 = DB::Select('Select count(select11) as count from form_evaluasi where select11 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano11 as $data) {
					$datumno11 = (int) $data->count;
				}

				foreach ($datayes11 as $data) {
					$datum11 = (int) $data->count;
				}

				$charts11 = new EvaluasiChart;
				$charts11->labels(['Yes', 'Tidak']);
				$charts11->dataset('My dataset', 'pie', [$datum11, $datumno11])->backgroundcolor(['red', 'blue']);

				//12. Ptugas di lokasi saat uas

				$datayes12 = DB::Select('Select count(select12) as count from form_evaluasi where select12 = "Ya" && masa_ujian = "' . $search . '"');
				$datano12 = DB::Select('Select count(select12) as count from form_evaluasi where select12 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano12 as $data) {
					$datumno12 = (int) $data->count;
				}

				foreach ($datayes12 as $data) {
					$datum12 = (int) $data->count;
				}

				$charts12 = new EvaluasiChart;
				$charts12->labels(['Yes', 'Tidak']);
				$charts12->dataset('My dataset', 'pie', [$datum12, $datumno12])->backgroundcolor(['red', 'blue']);

				//13. Petugas melapor k KA

				$datayes13 = DB::Select('Select count(select13) as count from form_evaluasi where select13 = "Ya" && masa_ujian = "' . $search . '"');
				$datano13 = DB::Select('Select count(select13) as count from form_evaluasi where select13 = "Tidak" && masa_ujian = "' . $search . '"');

				foreach ($datano13 as $data) {
					$datumno13 = (int) $data->count;
				}

				foreach ($datayes13 as $data) {
					$datum13 = (int) $data->count;
				}

				$charts13 = new EvaluasiChart;
				$charts13->labels(['Yes', 'Tidak']);
				$charts13->dataset('My dataset', 'pie', [$datum13, $datumno13])->backgroundcolor(['red', 'blue']);

				return view('admin.evaluasichart', compact(
					'evaluasi',
					'charts1',
					'charts2',
					'charts3',
					'charts4',
					'charts5',
					'charts6',
					'charts7',
					'charts8',
					'charts9',
					'charts10',
					'charts11',
					'charts12',
					'charts13'
				));
			}
		}
	}

	function searchpjtu(Request $request)
	{
		$method = $request->method();
		if ($request->isMethod('get')) {
			$search = $request->input('search');
			if ($request->has('tampil')) {
				$masa = DB::SELECT('Select * from masa');
				$search = $request->get('search');
				$result = form_pjtu::where('masa_ujian', $search)->paginate(10);
				if (count($result)) {
					Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
				}
				return view('admin.result_pjtu', compact('masa', 'search', 'result'));
			} else if ($request->has('ExportExcel')) {
				return Excel::download(new PJTUExport($search), 'Report PJTU PJLU Excel.xls');
			} else if ($request->has('Chart')) {
				$pjtu = DB::SELECT('select * from form_pjtu');
				//1.Kemudahan Berkoordinasi
				$databaik1 = DB::Select('Select count(select1) as count from form_pjtu where select1 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang1 = DB::Select('Select count(select1) as count from form_pjtu where select1 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk1 = DB::Select('Select count(select1) as count from form_pjtu where select1 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik1 as $data) {
					$db1 = (int)$data->count;
				}
				foreach ($datasedang1 as $data) {
					$ds1 = (int)$data->count;
				}
				foreach ($databuruk1 as $data) {
					$dbrk1 = (int)$data->count;
				}
				$charts1 = new PjtuChart;
				$charts1->labels(['Baik', 'Sedang', 'Buruk']);
				$charts1->dataset('My dataset', 'pie', [$db1, $ds1, $dbrk1])->backgroundcolor(['red', 'blue', 'yellow']);

				//2.Kecukupan informasi 
				$databaik2 = DB::Select('Select count(select2) as count from form_pjtu where select2 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang2 = DB::Select('Select count(select2) as count from form_pjtu where select2 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk2 = DB::Select('Select count(select2) as count from form_pjtu where select2 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik2 as $data) {
					$db2 = (int)$data->count;
				}
				foreach ($datasedang2 as $data) {
					$ds2 = (int)$data->count;
				}
				foreach ($databuruk2 as $data) {
					$dbrk2 = (int)$data->count;
				}
				$charts2 = new PjtuChart;
				$charts2->labels(['Baik', 'Sedang', 'Buruk']);
				$charts2->dataset('My dataset', 'pie', [$db2, $ds2, $dbrk2])->backgroundcolor(['red', 'blue', 'yellow']);

				//3.Ketersediaan bahan pendukung UAS*
				$databaik3 = DB::Select('Select count(select3) as count from form_pjtu where select3 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang3 = DB::Select('Select count(select3) as count from form_pjtu where select3 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk3 = DB::Select('Select count(select3) as count from form_pjtu where select3 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik3 as $data) {
					$db3 = (int)$data->count;
				}
				foreach ($datasedang3 as $data) {
					$ds3 = (int)$data->count;
				}
				foreach ($databuruk3 as $data) {
					$dbrk3 = (int)$data->count;
				}
				$charts3 = new PjtuChart;
				$charts3->labels(['Baik', 'Sedang', 'Buruk']);
				$charts3->dataset('My dataset', 'pie', [$db3, $ds3, $dbrk3])->backgroundcolor(['red', 'blue', 'yellow']);

				//4.Ketersediaan Naskah*
				$databaik4 = DB::Select('Select count(select4) as count from form_pjtu where select4 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang4 = DB::Select('Select count(select4) as count from form_pjtu where select4 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk4 = DB::Select('Select count(select4) as count from form_pjtu where select4 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik4 as $data) {
					$db4 = (int)$data->count;
				}
				foreach ($datasedang4 as $data) {
					$ds4 = (int)$data->count;
				}
				foreach ($databuruk4 as $data) {
					$dbrk4 = (int)$data->count;
				}
				$charts4 = new PjtuChart;
				$charts4->labels(['Baik', 'Sedang', 'Buruk']);
				$charts4->dataset('My dataset', 'pie', [$db4, $ds4, $dbrk4])->backgroundcolor(['red', 'blue', 'yellow']);

				//5.SaranaPrasarana

				$databaik5 = DB::Select('Select count(select5) as count from form_pjtu where select5 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang5 = DB::Select('Select count(select5) as count from form_pjtu where select5 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk5 = DB::Select('Select count(select5) as count from form_pjtu where select5 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik5 as $data) {
					$db5 = (int)$data->count;
				}
				foreach ($datasedang5 as $data) {
					$ds5 = (int)$data->count;
				}
				foreach ($databuruk5 as $data) {
					$dbrk5 = (int)$data->count;
				}
				$charts5 = new PjtuChart;
				$charts5->labels(['Baik', 'Sedang', 'Buruk']);
				$charts5->dataset('My dataset', 'pie', [$db5, $ds5, $dbrk5])->backgroundcolor(['red', 'blue', 'yellow']);

				//6.Keamanan naskah

				$databaik6 = DB::Select('Select count(select6) as count from form_pjtu where select6 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang6 = DB::Select('Select count(select6) as count from form_pjtu where select6 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk6 = DB::Select('Select count(select6) as count from form_pjtu where select6 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik6 as $data) {
					$db6 = (int)$data->count;
				}
				foreach ($datasedang6 as $data) {
					$ds6 = (int)$data->count;
				}
				foreach ($databuruk6 as $data) {
					$dbrk6 = (int)$data->count;
				}
				$charts6 = new PjtuChart;
				$charts6->labels(['Baik', 'Sedang', 'Buruk']);
				$charts6->dataset('My dataset', 'pie', [$db6, $ds6, $dbrk6])->backgroundcolor(['red', 'blue', 'yellow']);

				//7.Kuantitas 

				$databaik7 = DB::Select('Select count(select7) as count from form_pjtu where select7 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang7 = DB::Select('Select count(select7) as count from form_pjtu where select7 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk7 = DB::Select('Select count(select7) as count from form_pjtu where select7 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik7 as $data) {
					$db7 = (int)$data->count;
				}
				foreach ($datasedang7 as $data) {
					$ds7 = (int)$data->count;
				}
				foreach ($databuruk7 as $data) {
					$dbrk7 = (int)$data->count;
				}
				$charts7 = new PjtuChart;
				$charts7->labels(['Baik', 'Sedang', 'Buruk']);
				$charts7->dataset('My dataset', 'pie', [$db7, $ds7, $dbrk7])->backgroundcolor(['red', 'blue', 'yellow']);

				//2. Kualitas

				$databaik8 = DB::Select('Select count(select8) as count from form_pjtu where select8 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang8 = DB::Select('Select count(select8) as count from form_pjtu where select8 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk8 = DB::Select('Select count(select8) as count from form_pjtu where select8 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik8 as $data) {
					$db8 = (int)$data->count;
				}
				foreach ($datasedang8 as $data) {
					$ds8 = (int)$data->count;
				}
				foreach ($databuruk8 as $data) {
					$dbrk8 = (int)$data->count;
				}
				$charts8 = new PjtuChart;
				$charts8->labels(['Baik', 'Sedang', 'Buruk']);
				$charts8->dataset('My dataset', 'pie', [$db8, $ds8, $dbrk8])->backgroundcolor(['red', 'blue', 'yellow']);

				//Keamanan

				$databaik9 = DB::Select('Select count(select9) as count from form_pjtu where select9 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang9 = DB::Select('Select count(select9) as count from form_pjtu where select9 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk9 = DB::Select('Select count(select9) as count from form_pjtu where select9 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik9 as $data) {
					$db9 = (int)$data->count;
				}
				foreach ($datasedang9 as $data) {
					$ds9 = (int)$data->count;
				}
				foreach ($databuruk9 as $data) {
					$dbrk9 = (int)$data->count;
				}
				$charts9 = new PjtuChart;
				$charts9->labels(['Baik', 'Sedang', 'Buruk']);
				$charts9->dataset('My dataset', 'pie', [$db9, $ds9, $dbrk9])->backgroundcolor(['red', 'blue', 'yellow']);

				//Ketertiban

				$databaik10 = DB::Select('Select count(select10) as count from form_pjtu where select10 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang10 = DB::Select('Select count(select10) as count from form_pjtu where select10 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk10 = DB::Select('Select count(select10) as count from form_pjtu where select10 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik10 as $data) {
					$db10 = (int)$data->count;
				}
				foreach ($datasedang10 as $data) {
					$ds10 = (int)$data->count;
				}
				foreach ($databuruk10 as $data) {
					$dbrk10 = (int)$data->count;
				}
				$charts10 = new PjtuChart;
				$charts10->labels(['Baik', 'Sedang', 'Buruk']);
				$charts10->dataset('My dataset', 'pie', [$db10, $ds10, $dbrk10])->backgroundcolor(['red', 'blue', 'yellow']);

				//11.Kemudahan Pelaksanaan

				$databaik11 = DB::Select('Select count(select11) as count from form_pjtu where select11 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang11 = DB::Select('Select count(select11) as count from form_pjtu where select11 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk11 = DB::Select('Select count(select11) as count from form_pjtu where select11 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik11 as $data) {
					$db11 = (int)$data->count;
				}
				foreach ($datasedang11 as $data) {
					$ds11 = (int)$data->count;
				}
				foreach ($databuruk11 as $data) {
					$dbrk11 = (int)$data->count;
				}
				$charts11 = new PjtuChart;
				$charts11->labels(['Baik', 'Sedang', 'Buruk']);
				$charts11->dataset('My dataset', 'pie', [$db11, $ds11, $dbrk11])->backgroundcolor(['red', 'blue', 'yellow']);

				//2.Memusnahkan

				$databaik12 = DB::Select('Select count(select12) as count from form_pjtu where select12 = "Baik" && masa_ujian = "' . $search . '"');
				$datasedang12 = DB::Select('Select count(select12) as count from form_pjtu where select12 = "Sedang" && masa_ujian = "' . $search . '"');
				$databuruk12 = DB::Select('Select count(select12) as count from form_pjtu where select12 = "Buruk" && masa_ujian = "' . $search . '"');

				foreach ($databaik12 as $data) {
					$db12 = (int)$data->count;
				}
				foreach ($datasedang12 as $data) {
					$ds12 = (int)$data->count;
				}
				foreach ($databuruk12 as $data) {
					$dbrk12 = (int)$data->count;
				}
				$charts12 = new PjtuChart;
				$charts12->labels(['Baik', 'Sedang', 'Buruk']);
				$charts12->dataset('My dataset', 'pie', [$db12, $ds12, $dbrk12])->backgroundcolor(['red', 'blue', 'yellow']);

				return view('admin.pjtuchart', compact(
					'pjtu',
					'charts1',
					'charts2',
					'charts3',
					'charts4',
					'charts5',
					'charts6',
					'charts7',
					'charts8',
					'charts9',
					'charts10',
					'charts11',
					'charts12'
				));
			}
		}
	}


	function searchadmupbjj(Request $request)
	{
		$method = $request->method();
		if ($request->isMethod('get')) {
			$search = $request->input('search');
			if ($request->has('tampil')) {
				$masa = DB::SELECT('Select * from masa');
				$search = $request->get('search');
				$result = form_mra::where('masa_ujian', $search)->paginate(10);
				if (count($result)) {
					Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
				}
				return view('admin.result_upbjj', compact('masa', 'search', 'result'));
			} else if ($request->has('ExportExcel')) {
				return Excel::download(new UPBJJExport($search), 'Report UPBJJ Admin Excel.xls');
			} else if ($request->has('Chart')) {
				$mra = DB::SELECT('select * from form_mra');

				//1. Tingkat Kesulitan Mencetak 
				$datasulit1 = DB::Select('Select count(select1) as count from form_mra where select1 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul1 = DB::Select('Select count(select1) as count from form_mra where select1 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud1 = DB::Select('Select count(select1) as count from form_mra where select1 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah1 = DB::Select('Select count(select1) as count from form_mra where select1 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit1 as $data) {
					$ds1 = (int)$data->count;
				}
				foreach ($datacuksul1 as $data) {
					$dcs1 = (int)$data->count;
				}
				foreach ($datacukmud1 as $data) {
					$dcm1 = (int)$data->count;
				}
				foreach ($datamudah1 as $data) {
					$dm1 = (int)$data->count;
				}

				$charts1 = new UpbjjChart;
				$charts1->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts1->dataset('My dataset', 'pie', [$ds1, $dcs1, $dcm1, $dm1])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//a. LJU/BJU 
				$datasulit2 = DB::Select('Select count(select2) as count from form_mra where select2 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul2 = DB::Select('Select count(select2) as count from form_mra where select2 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud2 = DB::Select('Select count(select2) as count from form_mra where select2 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah2 = DB::Select('Select count(select2) as count from form_mra where select2 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit2 as $data) {
					$ds2 = (int)$data->count;
				}
				foreach ($datacuksul2 as $data) {
					$dcs2 = (int)$data->count;
				}
				foreach ($datacukmud2 as $data) {
					$dcm2 = (int)$data->count;
				}
				foreach ($datamudah2 as $data) {
					$dm2 = (int)$data->count;
				}

				$charts2 = new UpbjjChart;
				$charts2->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts2->dataset('My dataset', 'pie', [$ds2, $dcs2, $dcm2, $dm2])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//b. Tape Recorder 
				$datasulit3 = DB::Select('Select count(select3) as count from form_mra where select3 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul3 = DB::Select('Select count(select3) as count from form_mra where select3 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud3 = DB::Select('Select count(select3) as count from form_mra where select3 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah3 = DB::Select('Select count(select3) as count from form_mra where select3 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit3 as $data) {
					$ds3 = (int)$data->count;
				}
				foreach ($datacuksul3 as $data) {
					$dcs3 = (int)$data->count;
				}
				foreach ($datacukmud3 as $data) {
					$dcm3 = (int)$data->count;
				}
				foreach ($datamudah3 as $data) {
					$dm3 = (int)$data->count;
				}

				$charts3 = new UpbjjChart;
				$charts3->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts3->dataset('My dataset', 'pie', [$ds3, $dcs3, $dcm3, $dm3])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//c. Penguji Lisan 
				$datasulit4 = DB::Select('Select count(select4) as count from form_mra where select4 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul4 = DB::Select('Select count(select4) as count from form_mra where select4 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud4 = DB::Select('Select count(select4) as count from form_mra where select4 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah4 = DB::Select('Select count(select4) as count from form_mra where select4 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit4 as $data) {
					$ds4 = (int)$data->count;
				}
				foreach ($datacuksul4 as $data) {
					$dcs4 = (int)$data->count;
				}
				foreach ($datacukmud4 as $data) {
					$dcm4 = (int)$data->count;
				}
				foreach ($datamudah4 as $data) {
					$dm4 = (int)$data->count;
				}

				$charts4 = new UpbjjChart;
				$charts4->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts4->dataset('My dataset', 'pie', [$ds4, $dcs4, $dcm4, $dm4])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//d. Daftar Hadir 
				$datasulit5 = DB::Select('Select count(select5) as count from form_mra where select5 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul5 = DB::Select('Select count(select5) as count from form_mra where select5 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud5 = DB::Select('Select count(select5) as count from form_mra where select5 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah5 = DB::Select('Select count(select5) as count from form_mra where select5 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit5 as $data) {
					$ds5 = (int)$data->count;
				}
				foreach ($datacuksul5 as $data) {
					$dcs5 = (int)$data->count;
				}
				foreach ($datacukmud5 as $data) {
					$dcm5 = (int)$data->count;
				}
				foreach ($datamudah5 as $data) {
					$dm5 = (int)$data->count;
				}

				$charts5 = new UpbjjChart;
				$charts5->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts5->dataset('My dataset', 'pie', [$ds5, $dcs5, $dcm5, $dm5])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//e. Berita Acara 
				$datasulit6 = DB::Select('Select count(select6) as count from form_mra where select6 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul6 = DB::Select('Select count(select6) as count from form_mra where select6 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud6 = DB::Select('Select count(select6) as count from form_mra where select6 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah6 = DB::Select('Select count(select6) as count from form_mra where select6 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit6 as $data) {
					$ds6 = (int)$data->count;
				}
				foreach ($datacuksul6 as $data) {
					$dcs6 = (int)$data->count;
				}
				foreach ($datacukmud6 as $data) {
					$dcm6 = (int)$data->count;
				}
				foreach ($datamudah6 as $data) {
					$dm6 = (int)$data->count;
				}

				$charts6 = new UpbjjChart;
				$charts6->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts6->dataset('My dataset', 'pie', [$ds6, $dcs6, $dcm6, $dm6])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//f. Denah 
				$datasulit7 = DB::Select('Select count(select7) as count from form_mra where select7 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul7 = DB::Select('Select count(select7) as count from form_mra where select7 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud7 = DB::Select('Select count(select7) as count from form_mra where select7 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah7 = DB::Select('Select count(select7) as count from form_mra where select7 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit7 as $data) {
					$ds7 = (int)$data->count;
				}
				foreach ($datacuksul7 as $data) {
					$dcs7 = (int)$data->count;
				}
				foreach ($datacukmud7 as $data) {
					$dcm7 = (int)$data->count;
				}
				foreach ($datamudah7 as $data) {
					$dm7 = (int)$data->count;
				}

				$charts7 = new UpbjjChart;
				$charts7->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts7->dataset('My dataset', 'pie', [$ds7, $dcs7, $dcm7, $dm7])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//g. Tata Tertib
				$datasulit8 = DB::Select('Select count(select8) as count from form_mra where select8 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul8 = DB::Select('Select count(select8) as count from form_mra where select8 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud8 = DB::Select('Select count(select8) as count from form_mra where select8 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah8 = DB::Select('Select count(select8) as count from form_mra where select8 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit8 as $data) {
					$ds8 = (int)$data->count;
				}
				foreach ($datacuksul8 as $data) {
					$dcs8 = (int)$data->count;
				}
				foreach ($datacukmud8 as $data) {
					$dcm8 = (int)$data->count;
				}
				foreach ($datamudah8 as $data) {
					$dm8 = (int)$data->count;
				}

				$charts8 = new UpbjjChart;
				$charts8->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts8->dataset('My dataset', 'pie', [$ds8, $dcs8, $dcm8, $dm8])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//h. Nyontek
				$datasulit9 = DB::Select('Select count(select9) as count from form_mra where select9 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul9 = DB::Select('Select count(select9) as count from form_mra where select9 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud9 = DB::Select('Select count(select9) as count from form_mra where select9 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah9 = DB::Select('Select count(select9) as count from form_mra where select9 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit9 as $data) {
					$ds9 = (int)$data->count;
				}
				foreach ($datacuksul9 as $data) {
					$dcs9 = (int)$data->count;
				}
				foreach ($datacukmud9 as $data) {
					$dcm9 = (int)$data->count;
				}
				foreach ($datamudah9 as $data) {
					$dm9 = (int)$data->count;
				}

				$charts9 = new UpbjjChart;
				$charts9->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts9->dataset('My dataset', 'pie', [$ds9, $dcs9, $dcm9, $dm9])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//i. Amplop 
				$datasulit10 = DB::Select('Select count(select10) as count from form_mra where select10 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul10 = DB::Select('Select count(select10) as count from form_mra where select10 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud10 = DB::Select('Select count(select10) as count from form_mra where select10 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah10 = DB::Select('Select count(select10) as count from form_mra where select10 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit10 as $data) {
					$ds10 = (int)$data->count;
				}
				foreach ($datacuksul10 as $data) {
					$dcs10 = (int)$data->count;
				}
				foreach ($datacukmud10 as $data) {
					$dcm10 = (int)$data->count;
				}
				foreach ($datamudah10 as $data) {
					$dm10 = (int)$data->count;
				}

				$charts10 = new UpbjjChart;
				$charts10->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts10->dataset('My dataset', 'pie', [$ds10, $dcs10, $dcm10, $dm10])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//j. Karung
				$datasulit11 = DB::Select('Select count(select11) as count from form_mra where select11 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul11 = DB::Select('Select count(select11) as count from form_mra where select11 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud11 = DB::Select('Select count(select11) as count from form_mra where select11 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah11 = DB::Select('Select count(select11) as count from form_mra where select11 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit11 as $data) {
					$ds11 = (int)$data->count;
				}
				foreach ($datacuksul11 as $data) {
					$dcs11 = (int)$data->count;
				}
				foreach ($datacukmud11 as $data) {
					$dcm11 = (int)$data->count;
				}
				foreach ($datamudah11 as $data) {
					$dm11 = (int)$data->count;
				}

				$charts11 = new UpbjjChart;
				$charts11->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts11->dataset('My dataset', 'pie', [$ds11, $dcs11, $dcm11, $dm11])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//k. Box
				$datasulit12 = DB::Select('Select count(select12) as count from form_mra where select12 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul12 = DB::Select('Select count(select12) as count from form_mra where select12 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud12 = DB::Select('Select count(select12) as count from form_mra where select12 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah12 = DB::Select('Select count(select12) as count from form_mra where select12 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit12 as $data) {
					$ds12 = (int)$data->count;
				}
				foreach ($datacuksul12 as $data) {
					$dcs12 = (int)$data->count;
				}
				foreach ($datacukmud12 as $data) {
					$dcm12 = (int)$data->count;
				}
				foreach ($datamudah12 as $data) {
					$dm12 = (int)$data->count;
				}

				$charts12 = new UpbjjChart;
				$charts12->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts12->dataset('My dataset', 'pie', [$ds12, $dcs12, $dcm12, $dm12])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//3.a.Lokasi 
				$datasulit13 = DB::Select('Select count(select13) as count from form_mra where select13 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul13 = DB::Select('Select count(select13) as count from form_mra where select13 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud13 = DB::Select('Select count(select13) as count from form_mra where select13 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah13 = DB::Select('Select count(select13) as count from form_mra where select13 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit13 as $data) {
					$ds13 = (int)$data->count;
				}
				foreach ($datacuksul13 as $data) {
					$dcs13 = (int)$data->count;
				}
				foreach ($datacukmud13 as $data) {
					$dcm13 = (int)$data->count;
				}
				foreach ($datamudah13 as $data) {
					$dm13 = (int)$data->count;
				}

				$charts13 = new UpbjjChart;
				$charts13->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts13->dataset('My dataset', 'pie', [$ds13, $dcs13, $dcm13, $dm13])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//b. Jumlah Ruang
				$datasulit14 = DB::Select('Select count(select14) as count from form_mra where select14 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul14 = DB::Select('Select count(select14) as count from form_mra where select14 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud14 = DB::Select('Select count(select14) as count from form_mra where select14 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah14 = DB::Select('Select count(select14) as count from form_mra where select14 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit14 as $data) {
					$ds14 = (int)$data->count;
				}
				foreach ($datacuksul14 as $data) {
					$dcs14 = (int)$data->count;
				}
				foreach ($datacukmud14 as $data) {
					$dcm14 = (int)$data->count;
				}
				foreach ($datamudah14 as $data) {
					$dm14 = (int)$data->count;
				}

				$charts14 = new UpbjjChart;
				$charts14->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts14->dataset('My dataset', 'pie', [$ds14, $dcs14, $dcm14, $dm14])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//c. Pengawas 
				$datasulit15 = DB::Select('Select count(select15) as count from form_mra where select15 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul15 = DB::Select('Select count(select15) as count from form_mra where select15 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud15 = DB::Select('Select count(select15) as count from form_mra where select15 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah15 = DB::Select('Select count(select15) as count from form_mra where select15 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit15 as $data) {
					$ds15 = (int)$data->count;
				}
				foreach ($datacuksul15 as $data) {
					$dcs15 = (int)$data->count;
				}
				foreach ($datacukmud15 as $data) {
					$dcm15 = (int)$data->count;
				}
				foreach ($datamudah15 as $data) {
					$dm15 = (int)$data->count;
				}

				$charts15 = new UpbjjChart;
				$charts15->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts15->dataset('My dataset', 'pie', [$ds15, $dcs15, $dcm15, $dm15])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//4.a. Panitia Ujian 
				$datasulit16 = DB::Select('Select count(select16) as count from form_mra where select16 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul16 = DB::Select('Select count(select16) as count from form_mra where select16 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud16 = DB::Select('Select count(select16) as count from form_mra where select16 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah16 = DB::Select('Select count(select16) as count from form_mra where select16 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit16 as $data) {
					$ds16 = (int)$data->count;
				}
				foreach ($datacuksul16 as $data) {
					$dcs16 = (int)$data->count;
				}
				foreach ($datacukmud16 as $data) {
					$dcm16 = (int)$data->count;
				}
				foreach ($datamudah16 as $data) {
					$dm16 = (int)$data->count;
				}

				$charts16 = new UpbjjChart;
				$charts16->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts16->dataset('My dataset', 'pie', [$ds16, $dcs16, $dcm16, $dm16])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//b. Penyamaan Persepsi 
				$datasulit17 = DB::Select('Select count(select17) as count from form_mra where select17 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul17 = DB::Select('Select count(select17) as count from form_mra where select17 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud17 = DB::Select('Select count(select17) as count from form_mra where select17 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah17 = DB::Select('Select count(select17) as count from form_mra where select17 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit17 as $data) {
					$ds17 = (int)$data->count;
				}
				foreach ($datacuksul17 as $data) {
					$dcs17 = (int)$data->count;
				}
				foreach ($datacukmud17 as $data) {
					$dcm17 = (int)$data->count;
				}
				foreach ($datamudah17 as $data) {
					$dm17 = (int)$data->count;
				}

				$charts17 = new UpbjjChart;
				$charts17->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts17->dataset('My dataset', 'pie', [$ds17, $dcs17, $dcm17, $dm17])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//5.Tingkat kesulitan distribusi bahan ujian
				$datasulit18 = DB::Select('Select count(select18) as count from form_mra where select18 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul18 = DB::Select('Select count(select18) as count from form_mra where select18 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud18 = DB::Select('Select count(select18) as count from form_mra where select18 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah18 = DB::Select('Select count(select18) as count from form_mra where select18 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit18 as $data) {
					$ds18 = (int)$data->count;
				}
				foreach ($datacuksul18 as $data) {
					$dcs18 = (int)$data->count;
				}
				foreach ($datacukmud18 as $data) {
					$dcm18 = (int)$data->count;
				}
				foreach ($datamudah18 as $data) {
					$dm18 = (int)$data->count;
				}

				$charts18 = new UpbjjChart;
				$charts18->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts18->dataset('My dataset', 'pie', [$ds18, $dcs18, $dcm18, $dm18])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//6.Tingkat kesulitan Penataan Naskah
				$datasulit19 = DB::Select('Select count(select19) as count from form_mra where select19 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul19 = DB::Select('Select count(select19) as count from form_mra where select19 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud19 = DB::Select('Select count(select19) as count from form_mra where select19 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah19 = DB::Select('Select count(select19) as count from form_mra where select19 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit19 as $data) {
					$ds19 = (int)$data->count;
				}
				foreach ($datacuksul19 as $data) {
					$dcs19 = (int)$data->count;
				}
				foreach ($datacukmud19 as $data) {
					$dcm19 = (int)$data->count;
				}
				foreach ($datamudah19 as $data) {
					$dm19 = (int)$data->count;
				}

				$charts19 = new UpbjjChart;
				$charts19->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts19->dataset('My dataset', 'pie', [$ds19, $dcs19, $dcm19, $dm19])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//a. LJU ke utpusat
				$datasulit20 = DB::Select('Select count(select20) as count from form_mra where select20 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul20 = DB::Select('Select count(select20) as count from form_mra where select20 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud20 = DB::Select('Select count(select20) as count from form_mra where select20 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah20 = DB::Select('Select count(select20) as count from form_mra where select20 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit20 as $data) {
					$ds20 = (int)$data->count;
				}
				foreach ($datacuksul20 as $data) {
					$dcs20 = (int)$data->count;
				}
				foreach ($datacukmud20 as $data) {
					$dcm20 = (int)$data->count;
				}
				foreach ($datamudah20 as $data) {
					$dm20 = (int)$data->count;
				}

				$charts20 = new UpbjjChart;
				$charts20->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts20->dataset('My dataset', 'pie', [$ds20, $dcs20, $dcm20, $dm20])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				//b. NJU ke UPBJJ
				$datasulit21 = DB::Select('Select count(select21) as count from form_mra where select21 = "Sulit" && masa_ujian = "' . $search . '"');
				$datacuksul21 = DB::Select('Select count(select21) as count from form_mra where select21 = "Cukup Sulit" && masa_ujian = "' . $search . '"');
				$datacukmud21 = DB::Select('Select count(select21) as count from form_mra where select21 = "Cukup Mudah" && masa_ujian = "' . $search . '"');
				$datamudah21 = DB::Select('Select count(select21) as count from form_mra where select21 = "Mudah" && masa_ujian = "' . $search . '"');

				foreach ($datasulit21 as $data) {
					$ds21 = (int)$data->count;
				}
				foreach ($datacuksul21 as $data) {
					$dcs21 = (int)$data->count;
				}
				foreach ($datacukmud21 as $data) {
					$dcm21 = (int)$data->count;
				}
				foreach ($datamudah21 as $data) {
					$dm21 = (int)$data->count;
				}

				$charts21 = new UpbjjChart;
				$charts21->labels(['Sulit', 'Cukup Sulit', 'Cukup Mudah', 'Mudah']);
				$charts21->dataset('My dataset', 'pie', [$ds21, $dcs21, $dcm21, $dm21])->backgroundcolor(['red', 'blue', 'yellow', 'green']);

				return view('admin.upbjjchart', compact(
					'mra',
					'charts1',
					'charts2',
					'charts3',
					'charts4',
					'charts5',
					'charts6',
					'charts7',
					'charts8',
					'charts9',
					'charts10',
					'charts11',
					'charts12',
					'charts13',
					'charts14',
					'charts15',
					'charts16',
					'charts17',
					'charts18',
					'charts19',
					'charts20',
					'charts21'
				));
			}
		}
	}


	function upload()
	{
		$lampiran = DB::SELECT('select * from panduan_lampiran');
		$panduan = DB::SELECT('select * from panduan');
		$uas = DB::SELECT('select * from panduan_uas');
		$manual = DB::SELECT('select * from panduan_manual');
		$masa = DB::SELECT('select * from masa');
		return view('admin.uploadsurat')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
	}

	public function surattugas()
	{
		$tugas = DB::SELECT('select * from panduan_lampiran');
		$masa = DB::SELECT('select * from masa');
		return view('admin.addsurattugas')->with(compact('tugas', 'masa'));
	}

	public function destroysurattugas($id)
	{
		//hapus file surat tugas
		$tugas = panduan_lampiran::where('id', $id)->first();
		File::delete(storage_path() . '/app/pdf/surattugas/' . $tugas->lampiran);
		Alert::Success('Berhasil', 'Data Berhasil Dihapus');


		//hapus data
		DB::table('panduan_lampiran')->where('id', $id)->delete();

		return redirect('/admin/addsurattugas');
	}

	public function tambahsurattugas(Request $request)
	{

		$panduan = new panduan_lampiran;
		if ($request->hasfile('surattugas')) {
			$filename = $request->file('surattugas')->getClientOriginalName();
			$path = $request->file('surattugas')->storeAs('pdf/surattugas', $filename);
			if (isset($filename)) {
				$panduan->masa_ujian = $request->masa_ujian;
				$panduan->lampiran = $filename;
			} else {
				$panduan->lampiran = '';
			}
			$panduan->save();
			Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
			return redirect('/admin/addsurattugas');
		}
		Alert::Error('Gagal', 'Data Gagal Ditambahkan');
		return redirect('/admin/addsurattugas');
	}


	public function updatelampiran(Request $request, $id)
	{
		if ($request->hasFile('tugas')) {
			//hapus pdf surat tugas
			$lampiran = panduan_lampiran::where('id', $request->id)->first();
			File::delete(storage_path() . '/app/pdf/surattugas/' . $lampiran->lampiran);

			//upload surat tugas
			$filenametext = $request->file('tugas')->getClientOriginalName();
			$filename = $filenametext;
			$path = $request->file('tugas')->storeAs('pdf/surattugas', $filename);

			//database 
			DB::table('panduan_lampiran')->where('id', $request->id)->update([
				'lampiran' => $request->lampiran = $filename
			]);
		}
		return redirect('/admin/uploadsurat');
	}

	public function updatepanduan(Request $request, $id)
	{
		if ($request->hasFile('panduan')) {
			//hapus pdf surat tugas
			$panduan = panduan::where('id', $request->id)->first();
			File::delete(storage_path() . '/app/pdf/panduan/' . $panduan->panduan);

			//upload surat tugas
			$filenametext = $request->file('panduan')->getClientOriginalName();
			$filename = $filenametext;
			$path = $request->file('panduan')->storeAs('pdf/panduan', $filename);

			//database 
			DB::table('panduan')->where('id', $request->id)->update([
				'panduan' => $request->panduan = $filename
			]);
		}
		return redirect('/admin/uploadsurat');
	}

	public function updateuas(Request $request, $id)
	{
		if ($request->hasFile('uas')) {
			//hapus pdf surat tugas
			$uas = panduan_uas::where('id', $request->id)->first();
			File::delete(storage_path() . '/app/pdf/uas/' . $uas->uas);

			//upload surat tugas
			$filenametext = $request->file('uas')->getClientOriginalName();
			$filename = $filenametext;
			$path = $request->file('uas')->storeAs('pdf/uas', $filename);
			$uas->masa_ujian = $request->masa_ujian;

			//database 
			DB::table('panduan_uas')->where('id', $request->id)->update([
				'uas' => $request->uas = $filename
			]);
		}
		return redirect('/admin/uploadsurat');
	}

	public function updatemanual(Request $request, $id)
	{
		if ($request->hasFile('manual')) {
			//hapus pdf surat tugas
			$manual = panduan_manual::where('id', $request->id)->first();
			File::delete(storage_path() . '/app/pdf/manual/' . $manual->manual);

			//upload surat tugas
			$filenametext = $request->file('manual')->getClientOriginalName();
			$filename = $filenametext;
			$path = $request->file('manual')->storeAs('pdf/manual', $filename);

			//database 
			DB::table('panduan_manual')->where('id', $request->id)->update([
				'manual' => $request->manual = $filename
			]);
		}
		return redirect('/admin/uploadsurat');
	}

	public function surattugaspdf($id)
	{
		$lampiran = DB::table('panduan_lampiran')->where('id', $id)->get();
		foreach ($lampiran as $lampiran)
			$filename = storage_path() . '/app/pdf/surattugas/' . $lampiran->lampiran; {
			if (file_exists($filename)) {
				return response()->download(storage_path() . '/app/pdf/surattugas/' . $lampiran->lampiran, $lampiran->lampiran, [], 'inline');
			} else {
				Alert::success('Berhasil', 'Data Tidak Ada yang Didownload');
				return back();
			}
		}
	}

	public function panduanpemantauan($id)
	{
		$panduan = DB::table('panduan')->where('id', $id)->get();
		foreach ($panduan as $panduan)
			$filename = storage_path() . '/app/pdf/panduan/' . $panduan->panduan; {
			if (file_exists($filename)) {
				return response()->download(storage_path() . '/app/pdf/panduan/' . $panduan->panduan, $panduan->panduan, [], 'inline');
			} else {
				Alert::success('Berhasil', 'Data Tidak Ada yang Didownload');
				return back();
			}
		}
	}

	public function panduanuas($id)
	{
		$uas = DB::table('panduan_uas')->where('id', $id)->get();
		foreach ($uas as $uas)
			$filename = storage_path() . '/app/pdf/uas/' . $uas->uas; {
			if (file_exists($filename)) {
				return response()->download(storage_path() . '/app/pdf/uas/' . $uas->uas, $uas->uas, [], 'inline');
			} else {
				Alert::success('Berhasil', 'Data Tidak Ada yang Didownload');
				return back();
			}
		}
	}

	public function panduanmanual($id)
	{
		$manual = DB::table('panduan_manual')->where('id', $id)->get();
		foreach ($manual as $manual)
			$filename = storage_path() . '/app/pdf/manual/' . $manual->manual; {
			if (file_exists($filename)) {
				return response()->download(storage_path() . '/app/pdf/manual/' . $manual->manual, $manual->manual, [], 'inline');
			} else {
				Alert::success('Berhasil', 'Data Tidak Ada yang Didownload');
				return back();
			}
		}
	}



	public function chartfeedback()
	{
	}

	public function chartevaluasi()
	{
	}

	public function masa()
	{

		$masa = DB::SELECT('select * from masa');
		return view('admin.masa')->with(compact('masa'));
	}

	public function hapusmasa($id)
	{
		DB::table('masa')->where('kd_masa', $id)->delete();
		Alert::Success('Berhasil', 'Data Berhasil Dihapus');
		return back();
	}

	public function tambahmasa(Request $request)
	{
		$masa = new Masa;
		$masa->tahun_masa = $request->tambahmasa;
		$masa->save();

		Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
		return redirect('/admin/masaujian');
	}
}
