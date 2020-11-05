<?php

namespace App\Http\Controllers;

use App\masa;
use App\upbjj;
use App\form_evaluasi;
use App\bertugas_sebagai;
use Alert;
use DB;
use PDF;
use Illuminate\Http\Request;
use App\Exports\EvaluasiExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EvaluasiController extends Controller
{
    public function index()
    {
        $upbjj = upbjj::all();
        $masa = masa::all();
        $bertugas_sebagai = bertugas_sebagai::all();
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        $masa = DB::SELECT('Select * from masa');
        return view('evaluasi.index')->with(compact('upbjj', 'masa', 'bertugas_sebagai', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function store(Request $request)
    {

        $evaluasi = new form_evaluasi;
        $evaluasi->nama = $request->nama;
        $evaluasi->tempat_ujian = $request->tempat_ujian;
        $evaluasi->tugas = $request->tugas;
        $evaluasi->masa_ujian = $request->masa_ujian;
        $evaluasi->upbjj = $request->upbjj;
        $evaluasi->tanggal_ujian = $request->tanggal_ujian;
        $evaluasi->select1 = $request->select1;
        $evaluasi->select2 = $request->select2;
        $evaluasi->select3 = $request->select3;
        $evaluasi->select4 = $request->select4;
        $evaluasi->select5 = $request->select5;
        $evaluasi->select6 = $request->select6;
        $evaluasi->select7 = $request->select7;
        $evaluasi->select8 = $request->select8;
        $evaluasi->select9 = $request->select9;
        $evaluasi->select10 = $request->select10;
        $evaluasi->select11 = $request->select11;
        $evaluasi->select12 = $request->select12;
        $evaluasi->select13 = $request->select13;
        $evaluasi->pesan1 = $request->pesan1;

        $evaluasi->save();

        $evaluasi = DB::Select('select * from form_evaluasi ORDER BY no DESC limit 1');
        $pdf = PDF::loadView('Evaluasi.pdf', compact('evaluasi'));

        Mail::send(['text' => 'evaluasi.email'], ['nama' => $request->nama, Auth::user()->email], function ($message) use ($request, $pdf) {
            $message->to(Auth::user()->email, $request->nama)
                ->subject('Thankyou for your participation');
            $message->from('sekrelp2mp@gmail.com', 'Sekretariat LPPMP');
            $message->attachData($pdf->output(), $request->nama . '.pdf');
        });

        Alert::success('Berhasil', 'Terimakasih Atas Partisipasinya');
        return redirect('/upbjj');
    }

    public function laporanevaluasi()
    {
        $masa = DB::SELECT('Select * from masa');
        return view('admin.laporanevaluasi')->with(compact('masa'));
    }

    function excel_evaluasi()
    {
        return Excel::download(new EvaluasiExport, 'Report Evaluasi Excel.xls');
    }
}
