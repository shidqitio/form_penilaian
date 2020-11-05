<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\masa;
use App\upbjj;
use App\form_pjtu;
use App\galeri_pjtu;
use App\panduan_uas;
use App\panduan_lampiran;
use App\Exports\PJTUExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PJTUPJLUController extends Controller
{
    public function index()
    {
        $upbjj = upbjj::all();
        $masa = masa::all();
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        $masa = DB::SELECT('Select * from masa');
        return view('PJTUPJLU.index')->with(compact('upbjj', 'masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function store(Request $request)
    {

        $pjtu = new form_pjtu;
        $pjtu->nama = $request->nama;
        $pjtu->tempat_ujian = $request->tempat_ujian;
        $pjtu->lokasi_ujian = $request->lokasi_ujian;
        $pjtu->upbjj = $request->upbjj;
        $pjtu->masa_ujian = $request->masa_ujian;
        $pjtu->tanggal_ujian = $request->tanggal_ujian;
        $pjtu->select1 = $request->select1;
        $pjtu->select2 = $request->select2;
        $pjtu->select3 = $request->select3;
        $pjtu->select4 = $request->select4;
        $pjtu->select5 = $request->select5;
        $pjtu->select6 = $request->select6;
        $pjtu->select7 = $request->select7;
        $pjtu->select8 = $request->select8;
        $pjtu->select9 = $request->select9;
        $pjtu->select10 = $request->select10;
        $pjtu->select11 = $request->select11;
        $pjtu->select12 = $request->select12;

        $pjtu->save();

        $pjtu = DB::Select('select * from form_pjtu ORDER BY no DESC limit 1');
        $pdf = PDF::loadView('PJTUPJLU.pdf', compact('pjtu'));

        Mail::send(['text' => 'PJTUPJLU.email'], ['nama' => $request->nama, Auth::user()->email], function ($message) use ($request, $pdf) {
            $message->to(Auth::user()->email, $request->nama)
                ->subject('Thankyou for your participation');
            $message->from('sekrelp2mp@gmail.com', 'Sekretariat LPPMP');
            $message->attachData($pdf->output(), $request->nama . '.pdf');
        });

        Alert::success('Berhasil', 'Data Berhasil di Input');
        return redirect(route('PJTUPJLU.uploadfoto'));
    }

    function excel_pjtu()
    {
        return Excel::download(new PJTUExport, 'Report PJTU PJLU Excel.xls');
    }

    public function laporanpjtu()
    {
        $masa = DB::SELECT('select * from masa');
        return view('admin.laporanpjtu')->with(compact('masa'));
    }

    public function tampiluploadfoto()
    {
        return view('PJTUPJLU.uploadfoto');
    }

    public function uploadfoto(Request $request)
    {
        $upload = new galeri_pjtu;
        $upload->foto_persiapan_uas = $request->foto_persiapan_uas;
        $upload->foto_pelaksanaan_uas = $request->foto_pelaksanaan_uas;
        $upload->foto_lokasi_uas = $request->foto_lokasi_uas;

        if ($request->hasFile('fotopersiapanuas')) {
            $file = $request->file('fotopersiapanuas');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('image/fotopersiapanuas', $filename);
            $upload->foto_persiapan_uas = $filename;
        }

        if (isset($filename)) {
            $upload->foto_persiapan_uas = $filename;
        } else {
            $upload->foto_persiapan_uas = '';
        }

        if ($request->hasFile('fotopelaksanaanuas')) {
            $file = $request->file('fotopelaksanaanuas');
            $extension = $file->getClientOriginalName();
            $filename2 = time() . '.' . $extension;
            $file->move('image/fotopelaksanaanuas', $filename2);
            $upload->foto_pelaksanaan_uas = $filename2;
        }

        if (isset($filename2)) {
            $upload->foto_pelaksanaan_uas = $filename2;
        } else {
            $upload->foto_pelaksanaan_uas = '';
        }

        if ($request->hasFile('fotolokasiuas')) {
            $file = $request->file('fotolokasiuas');
            $extension = $file->getClientOriginalName();
            $filename3 = time() . '.' . $extension;
            $file->move('image/fotolokasiuas', $filename3);
            $upload->foto_lokasi_uas = $filename3;
        }

        if (isset($filename3)) {
            $upload->foto_lokasi_uas = $filename3;
        } else {
            $upload->foto_lokasi_uas = '';
        }

        $upload->save();
        Alert::success('Berhasil', 'Terimakasih Atas Partisipasinya');
        return redirect('/');
    }

    public function surattugaspjtu()
    {
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        $masa = DB::SELECT('Select * from masa');
        return view('PJTUPJLU.surattugaspjtu')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

     public function searchsurattugaspjtu(Request $request)
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
                return view('PJTUPJLU.hasilsurattugaspjtu', compact('lampiran', 'tugas', 'masa', 'search', 'result', 'manual', 'panduan', 'uas'));
            }
        }
    }

    public function panduanuaspjtu()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('PJTUPJLU.panduanuaspjtu')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function searchpanduanuaspjtu(Request $request)
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
                return view('PJTUPJLU.hasilpanduanuaspjtu', compact('uas', 'masa', 'search', 'result', 'lampiran', 'panduan', 'manual'));
            }
        }
    }

}
