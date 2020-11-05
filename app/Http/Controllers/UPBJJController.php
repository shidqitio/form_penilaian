<?php

namespace App\Http\Controllers;

use DB;
use App\form_mra;
use App\panduan_uas;
use App\form_feedback;
use App\form_pemantau;
use App\panduan_lampiran;
use Illuminate\Http\Request;
use App\Charts\PemantauanChart;
use App\Exports\UPBJJPERWILExport;
use App\Exports\FeedbackUpbjjExport;
use App\Exports\PemantauUpbjjExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UPBJJController extends Controller
{
    public function index()
    {
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        $masa = DB::SELECT('Select * from masa');
        $upbjj = Auth::getUser();
        return view('role.upbjj')->with(compact('upbjj', 'lampiran', 'panduan', 'uas', 'manual', 'masa'));
    }

    public function laporanuser()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('mra.laporanuser')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
    }

    public function laporanfeedbackupbjj()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('mra.laporanfeedbackupbjj')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
    }

    public function hlmsurattugas()
    {
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        $masa = DB::SELECT('Select * from masa');
        return view('mra.surattugas')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function panduanuas()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('mra.panduanuas')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    function excel_upbjjperwil()
    {
        return Excel::download(new UPBJJPERWILExport, 'Report UPBJJ per Wilayah Excel.xls');
    }

    public function wilayah()
    {
        $id_upbjj = Auth::user()->id_upbjj;
        $wilayah = DB::SELECT('select upbjj.upbjj from users inner join upbjj on users.id_upbjj = upbjj.id_upbjj 
        where users.id_upbjj = ' . $id_upbjj . '');

        foreach ($wilayah as $wilayah) {
            $daerah = $wilayah->upbjj;
        }
        return $daerah;
    }

    public function searchpemantauupbjj(Request $request)
    {
        $id_upbjj = Auth::user()->id_upbjj;
        $wilayah = DB::SELECT('select upbjj.upbjj from users inner join upbjj on users.id_upbjj = upbjj.id_upbjj 
        where users.id_upbjj = ' . $id_upbjj . '');

        foreach ($wilayah as $wilayah) {
            $daerah = $wilayah->upbjj;
        }
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $masa = DB::SELECT('Select * from masa');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $panduan = DB::SELECT('select * from panduan');
                $uas = DB::SELECT('select * from panduan_uas');
                $manual = DB::SELECT('select * from panduan_manual');
                $search = $request->get('search');
                $result = form_pemantau::where('masa_ujian', $search)->where('upbjj', $daerah)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('mra.hasiluser', compact('masa', 'manual', 'lampiran', 'panduan', 'uas', 'search', 'result'));
            } else if ($request->has('ExportExcel')) {
                return Excel::download(new PemantauUpbjjExport($search), 'Report Pemantau Excel.xls');
            } else if ($request->has('Chart')) {
                $masa = DB::SELECT('Select * from masa');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $panduan = DB::SELECT('select * from panduan');
                $uas = DB::SELECT('select * from panduan_uas');
                $manual = DB::SELECT('select * from panduan_manual');
                $pemantau = DB::SELECT('select  * from form_pemantau where masa_ujian = "' . $search . '"');
                //amplop
                $datayes = DB::Select('Select count(select1) as count from form_pemantau where select1 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '" ');
                $datano = DB::Select('Select count(select1) as count from form_pemantau where select1 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes1 = DB::Select('Select count(select2) as count from form_pemantau where select2 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '" ');
                $datano1 = DB::Select('Select count(select2) as count from form_pemantau where select2 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes3 = DB::Select('Select count(select3) as count from form_pemantau where select3 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano3 = DB::Select('Select count(select3) as count from form_pemantau where select3 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes4 = DB::Select('Select count(select4) as count from form_pemantau where select4 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano4 = DB::Select('Select count(select4) as count from form_pemantau where select4 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes5 = DB::Select('Select count(select5) as count from form_pemantau where select5 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano5 = DB::Select('Select count(select5) as count from form_pemantau where select5 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes6 = DB::Select('Select count(select6) as count from form_pemantau where select6 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '" ');
                $datano6 = DB::Select('Select count(select6) as count from form_pemantau where select6 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes7 = DB::Select('Select count(select7) as count from form_pemantau where select7 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano7 = DB::Select('Select count(select7) as count from form_pemantau where select7 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes8 = DB::Select('Select count(select8) as count from form_pemantau where select8 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano8 = DB::Select('Select count(select8) as count from form_pemantau where select8 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes9 = DB::Select('Select count(select9) as count from form_pemantau where select9 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano9 = DB::Select('Select count(select9) as count from form_pemantau where select9 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes10 = DB::Select('Select count(select10) as count from form_pemantau where select10 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano10 = DB::Select('Select count(select10) as count from form_pemantau where select10 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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
                $datayes11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano11 = DB::Select('Select count(select11) as count from form_pemantau where select11 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes12 = DB::Select('Select count(select12) as count from form_pemantau where select12 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano12 = DB::Select('Select count(select12) as count from form_pemantau where select12 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes13 = DB::Select('Select count(select13) as count from form_pemantau where select13 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano13 = DB::Select('Select count(select13) as count from form_pemantau where select13 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes14 = DB::Select('Select count(select14) as count from form_pemantau where select14 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano14 = DB::Select('Select count(select14) as count from form_pemantau where select14 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes15 = DB::Select('Select count(select15) as count from form_pemantau where select15 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano15 = DB::Select('Select count(select15) as count from form_pemantau where select15 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes16 = DB::Select('Select count(select16) as count from form_pemantau where select16 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano16 = DB::Select('Select count(select16) as count from form_pemantau where select16 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes17 = DB::Select('Select count(select17) as count from form_pemantau where select17 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano17 = DB::Select('Select count(select17) as count from form_pemantau where select17 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes18 = DB::Select('Select count(select18) as count from form_pemantau where select18 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano18 = DB::Select('Select count(select18) as count from form_pemantau where select18 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes19 = DB::Select('Select count(select19) as count from form_pemantau where select19 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano19 = DB::Select('Select count(select19) as count from form_pemantau where select19 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes20 = DB::Select('Select count(select20) as count from form_pemantau where select20 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano20 = DB::Select('Select count(select20) as count from form_pemantau where select20 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes21 = DB::Select('Select count(select21) as count from form_pemantau where select21 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano21 = DB::Select('Select count(select21) as count from form_pemantau where select21 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes22 = DB::Select('Select count(select22) as count from form_pemantau where select22 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano22 = DB::Select('Select count(select22) as count from form_pemantau where select22 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes23 = DB::Select('Select count(select23) as count from form_pemantau where select23 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano23 = DB::Select('Select count(select23) as count from form_pemantau where select23 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes24 = DB::Select('Select count(select24) as count from form_pemantau where select24 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano24 = DB::Select('Select count(select24) as count from form_pemantau where select24 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes25 = DB::Select('Select count(select25) as count from form_pemantau where select25 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano25 = DB::Select('Select count(select25) as count from form_pemantau where select25 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes26 = DB::Select('Select count(select26) as count from form_pemantau where select26 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano26 = DB::Select('Select count(select26) as count from form_pemantau where select26 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes27 = DB::Select('Select count(select27) as count from form_pemantau where select27 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano27 = DB::Select('Select count(select27) as count from form_pemantau where select27 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes28 = DB::Select('Select count(select28) as count from form_pemantau where select28 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '" ');
                $datano28 = DB::Select('Select count(select28) as count from form_pemantau where select28 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes29 = DB::Select('Select count(select29) as count from form_pemantau where select29 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano29 = DB::Select('Select count(select29) as count from form_pemantau where select29 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes30 = DB::Select('Select count(select30) as count from form_pemantau where select30 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano30 = DB::Select('Select count(select30) as count from form_pemantau where select30 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

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

                $datayes31 = DB::Select('Select count(select31) as count from form_pemantau where select31 = "Ya" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');
                $datano31 = DB::Select('Select count(select31) as count from form_pemantau where select31 = "Tidak" && masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '"');

                foreach ($datano31 as $data) {
                    $datumno31 = (int) $data->count;
                }

                foreach ($datayes31 as $data) {
                    $datum31 = (int) $data->count;
                }

                $charts31 = new PemantauanChart;
                $charts31->labels(['Yes', 'Tidak']);
                $charts31->dataset('My dataset', 'pie', [$datum31, $datumno31])->backgroundcolor(['red', 'blue']);

                return view('mra.chartpemantau', compact(
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
                    'charts31',
                    'masa',
                    'manual',
                    'lampiran',
                    'panduan',
                    'uas'
                ));
            }
        }
    }

    public function searchfeedbackupbjj(Request $request)
    {
        $id_upbjj = Auth::user()->id_upbjj;
        $wilayah = DB::SELECT('select upbjj.upbjj from users inner join upbjj on users.id_upbjj = upbjj.id_upbjj 
        where users.id_upbjj = ' . $id_upbjj . '');

        foreach ($wilayah as $wilayah) {
            $daerah = $wilayah->upbjj;
        }
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $masa = DB::SELECT('Select * from masa');
                $panduan = DB::SELECT('select * from panduan');
                $uas = DB::SELECT('select * from panduan_uas');
                $manual = DB::SELECT('select * from panduan_manual');
                $search = $request->get('search');
                $result = form_feedback::where('masa_ujian', $search)->where('upbjj', $daerah)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('mra.hasilfeedback', compact('masa', 'lampiran', 'panduan', 'uas', 'manual', 'search', 'result'));
            } else if ($request->has('ExportExcel')) {
                return Excel::download(new FeedbackUpbjjExport($search), 'Report Feedback Excel.xls');
            } else if ($request->has('Chart')) {
                $masa = DB::SELECT('Select * from masa');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $panduan = DB::SELECT('select * from panduan');
                $uas = DB::SELECT('select * from panduan_uas');
                $manual = DB::SELECT('select * from panduan_manual');
                $feedback = DB::SELECT('Select * from form_feedback where masa_ujian = "' . $search . '" && upbjj = "' . $daerah . '" ');
                return view('mra.chartfeedback', compact('feedback', 'masa', 'lampiran', 'panduan', 'uas', 'manual'));
            }
        }
    }




    public function chartfeedback()
    {
        $id_upbjj = Auth::user()->id_upbjj;
        $wilayah = DB::SELECT('select upbjj.upbjj from users inner join upbjj on users.id_upbjj = upbjj.id_upbjj 
        where users.id_upbjj = ' . $id_upbjj . '');

        foreach ($wilayah as $wilayah) {
            $daerah = $wilayah->upbjj;
        }
        $feedback = DB::SELECT('Select * from form_feedback where upbjj = "' . $daerah . '" ');
        return view('mra.chartfeedback', compact('feedback'));
    }

    public function chartevaluasi()
    {
        //
    }

    function searchupbjj(Request $request)
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
                return view('mra.hasiluser', compact('masa', 'search', 'result'));
            } else if ($request->has('ExportExcel')) {
                return Excel::download(new UPBJJPERWILExport($search), 'Report UPBJJ per Wilayah Excel.xls');
            }
        }
    }

    public function searchsurattugas(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $tugas = DB::SELECT('select * from panduan_lampiran');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $masa = DB::SELECT('Select * from masa');
                $panduan = DB::SELECT('select * from panduan');
                $uas = DB::SELECT('select * from panduan_uas');
                $manual = DB::SELECT('select * from panduan_manual');
                $search = $request->get('search');
                $result = panduan_lampiran::where('masa_ujian', $search)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('mra.hasilsurattugas', compact('lampiran', 'tugas', 'masa', 'search', 'result', 'manual', 'panduan', 'uas'));
            }
        }
    }

    public function searchpanduanuas(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $uas = DB::SELECT('select * from panduan_uas');
                $masa = DB::SELECT('Select * from masa');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $panduan = DB::SELECT('select * from panduan');
                $manual = DB::SELECT('select * from panduan_manual');
                $search = $request->get('search');
                $result = panduan_uas::where('masa_ujian', $search)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('mra.hasilpanduanuas', compact('uas', 'masa', 'search', 'result', 'lampiran', 'panduan', 'manual'));
            }
        }
    }
}
