<?php

namespace App\Http\Controllers;

use PDF;
use App\upbjj;
use App\masa;
use App\form_mra;
use App\Exports\UPBJJExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class MRAController extends Controller
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
        return view('mra.index')->with(compact('upbjj', 'masa', 'lampiran', 'panduan', 'uas', 'manual', $upbjj));
    }

    public function store(Request $request)
    {

        $mra = new form_mra;
        $mra->nama = $request->nama;
        $mra->email = Auth::user()->email;
        $mra->upbjj = $request->upbjj;
        $mra->masa_ujian = $request->masa_ujian;
        $mra->select1 = $request->select1;
        $mra->select2 = $request->select2;
        $mra->select3 = $request->select3;
        $mra->select4 = $request->select4;
        $mra->select5 = $request->select5;
        $mra->select6 = $request->select6;
        $mra->select7 = $request->select7;
        $mra->select8 = $request->select8;
        $mra->select9 = $request->select9;
        $mra->select10 = $request->select10;
        $mra->select11 = $request->select11;
        $mra->select12 = $request->select12;
        $mra->select13 = $request->select13;
        $mra->select14 = $request->select14;
        $mra->select15 = $request->select15;
        $mra->select16 = $request->select16;
        $mra->select17 = $request->select17;
        $mra->select18 = $request->select18;
        $mra->select19 = $request->select19;
        $mra->select20 = $request->select20;
        $mra->select21 = $request->select21;

        $mra->save();

        $mra = DB::Select('select * from form_mra ORDER BY no DESC limit 1');
        $pdf = PDF::loadView('mra.pdf', compact('mra'));

        Mail::send(['text' => 'mra.email'], ['nama' => $request->nama, Auth::user()->email], function ($message) use ($request, $pdf) {
            $message->to(Auth::user()->email, $request->nama)
                ->subject('Thankyou for your participation');
            $message->from('sekrelp2mp@gmail.com', 'Sekretariat LPPMP');
            $message->attachData($pdf->output(), $request->nama . '.pdf');
        });

        Alert::success('Terimakasih', 'Data berhasil di Input!');
        return redirect('/upbjj');
    }
}
