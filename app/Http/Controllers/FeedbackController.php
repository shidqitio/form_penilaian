<?php

namespace App\Http\Controllers;

use App\masa;
use App\upbjj;
use App\form_feedback;
use PDF;
use App\bertugas_sebagai;
use Illuminate\Http\Request;
use App\Exports\FeedbackExport;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
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
        return view('feedback.index')->with(compact('upbjj', 'masa', 'bertugas_sebagai', 'lampiran', 'panduan', 'uas', 'manual'));
    }


    public function store(Request $request)
    {

        $feedback = new form_feedback;
        $feedback->nama = $request->nama;
        $feedback->tempat_ujian = $request->tempat_ujian;
        $feedback->lokasi_ujian = $request->lokasi_ujian;
        $feedback->bertugas_sebagai = $request->bertugas_sebagai;
        $feedback->upbjj = $request->upbjj;
        $feedback->masa_ujian = $request->masa_ujian;
        $feedback->tanggal_mulai_observasi = $request->tanggal_mulai_observasi;
        $feedback->tanggal_akhir_observasi = $request->tanggal_akhir_observasi;
        $feedback->lokasi1 = $request->lokasi1;
        $feedback->aspek1 = $request->aspek1;
        $feedback->praktikbaik1 = $request->praktikbaik1;
        $feedback->temuan1 = $request->temuan1;
        $feedback->saran1 = $request->saran1;
        $feedback->lokasi2 = $request->lokasi2;
        $feedback->aspek2 = $request->aspek2;
        $feedback->praktikbaik2 = $request->praktikbaik2;
        $feedback->temuan2 = $request->temuan2;
        $feedback->saran2 = $request->saran2;
        $feedback->lokasi3 = $request->lokasi3;
        $feedback->aspek3 = $request->aspek3;
        $feedback->praktikbaik3 = $request->praktikbaik3;
        $feedback->temuan3 = $request->temuan3;
        $feedback->saran3 = $request->saran3;

        $feedback->save();

        $feedback = DB::Select('select * from form_feedback ORDER BY no DESC limit 1');
        $pdf = PDF::loadView('feedback.pdf', compact('feedback'));

        Mail::send(['text' => 'feedback.email'], ['nama' => $request->nama, Auth::user()->email], function ($message) use ($request, $pdf) {
            $message->to(Auth::user()->email, $request->nama)
                ->subject('Thankyou for your participation');
            $message->from('sekrelp2mp@gmail.com', 'Sekretariat LPPMP');
            $message->attachData($pdf->output(), $request->nama . '.pdf');
        });


        Alert::success('Berhasil', 'Terimakasih Atas Partisipasinya');

        if (auth()->user()->hasRole('pemantau')) {
            return redirect('/pemantau');
        }

        if (auth()->user()->hasRole('pjtu')) {
            return redirect('/pjtu');
        }
        return redirect('/login');
    }

    public function laporanfeedback()
    {
        $masa = DB::SELECT('Select * from masa');
        return view('admin.laporanfeedback')->with(compact('masa'));
    }
}
