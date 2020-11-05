<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Alert;
use App\masa;
use App\upbjj;
use App\panduan_uas;
use App\form_pemantau;
use App\galeri_pemantau;
use App\panduan_lampiran;
use Illuminate\Http\Request;
use App\Exports\PemantauExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PemantauanController extends Controller
{

    public function index()
    {
        $upbjj = upbjj::all();
        $masa = masa::all();
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('pemantauan.index')->with(compact('upbjj', 'masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    // public function hlmdepan()
    // {

    //     $lampiran = DB::SELECT('select * from panduan_lampiran');
    //     $panduan = DB::SELECT('select * from panduan');
    //     $uas = DB::SELECT('select * from panduan_uas');
    //     $manual = DB::SELECT('select * from panduan_manual');
    //     $masa = DB::SELECT('Select * from masa');
    //     return view('role.pemantau')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
    // }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',


        ]);
    }

    public function store(Request $request)
    {

        $pemantauan = new form_pemantau;
        $pemantauan->nama = Auth::user()->name;
        $pemantauan->nip = Auth::user()->nip;
        $pemantauan->email = Auth::user()->email;
        $pemantauan->tempat_ujian = $request->tempat_ujian;
        $pemantauan->lokasi_ujian = $request->lokasi_ujian;
        $pemantauan->upbjj = $request->upbjj;
        $pemantauan->masa_ujian = $request->masa_ujian;
        $pemantauan->tanggal_ujian = $request->tanggal_ujian;
        $pemantauan->select1 = $request->select1;
        $pemantauan->select2 = $request->select2;
        $pemantauan->select3 = $request->select3;
        $pemantauan->select4 = $request->select4;
        $pemantauan->select5 = $request->select5;
        $pemantauan->select6 = $request->select6;
        $pemantauan->select7 = $request->select7;
        $pemantauan->select8 = $request->select8;
        $pemantauan->pesan1 = $request->pesan1;
        $pemantauan->select9 = $request->selec9;
        $pemantauan->pesan2 = $request->pesan2;
        $pemantauan->select10 = $request->select10;
        $pemantauan->pesan3 = $request->pesan3;
        $pemantauan->select11 = $request->select11;
        $pemantauan->pesan4 = $request->pesan4;
        $pemantauan->select12 = $request->select12;
        $pemantauan->select13 = $request->select13;
        $pemantauan->select14 = $request->select14;
        $pemantauan->pesan5 = $request->pesan5;
        $pemantauan->select15 = $request->select15;
        $pemantauan->pesan6 = $request->pesan6;
        $pemantauan->select16 = $request->select16;
        $pemantauan->pesan7 = $request->pesan7;
        $pemantauan->select17 = $request->select17;
        $pemantauan->select18 = $request->select18;
        $pemantauan->pesan8 = $request->pesan8;
        $pemantauan->select19 = $request->select19;
        $pemantauan->pesan9 = $request->pesan9;
        $pemantauan->select20 = $request->select20;
        $pemantauan->pesan10 = $request->pesan10;
        $pemantauan->select21 = $request->select21;
        $pemantauan->pesan11 = $request->pesan11;
        $pemantauan->select22 = $request->select22;
        $pemantauan->pesan12 = $request->pesan12;
        $pemantauan->select23 = $request->select23;
        $pemantauan->pesan13 = $request->pesan13;
        $pemantauan->pesan14 = $request->pesan14;
        $pemantauan->select24 = $request->select24;
        $pemantauan->pesan15 = $request->pesan15;
        $pemantauan->pesan16 = $request->pesan16;
        $pemantauan->select25 = $request->select25;
        $pemantauan->pesan17 = $request->pesan17;
        $pemantauan->pesan18 = $request->pesan18;
        $pemantauan->select26 = $request->select26;
        $pemantauan->pesan19 = $request->pesan19;
        $pemantauan->select27 = $request->select27;
        $pemantauan->pesan20 = $request->pesan20;
        $pemantauan->select28 = $request->select28;
        $pemantauan->select29 = $request->select29;
        $pemantauan->pesan21 = $request->pesan21;
        $pemantauan->select30 = $request->select30;
        $pemantauan->select31 = $request->select31;
        $pemantauan->pesan22 = $request->pesan22;
        $pemantauan->pesan23 = $request->pesan23;
        $pemantauan->pesan24 = $request->pesan24;
        $pemantauan->pesan25 = $request->pesan25;
        $pemantauan->pesan26 = $request->pesan26;
        $pemantauan->pesan27 = $request->pesan27;
        $pemantauan->pesan28 = $request->pesan28;
        $pemantauan->pesan29 = $request->pesan29;
        $pemantauan->pesan30 = $request->pesan30;
        $pemantauan->pesan31 = $request->pesan31;
        $pemantauan->pesan32 = $request->pesan32;
        $pemantauan->pesan33 = $request->pesan33;
        $pemantauan->pesan34 = $request->pesan34;
        $pemantauan->pesan35 = $request->pesan35;
        $pemantauan->pesan36 = $request->pesan36;
        $pemantauan->pesan37 = $request->pesan37;
        $pemantauan->pesan38 = $request->pesan38;
        $pemantauan->pesan39 = $request->pesan39;
        $pemantauan->pesan40 = $request->pesan40;
        $pemantauan->pesan41 = $request->pesan41;
        $pemantauan->pesan42 = $request->pesan42;
        $pemantauan->pesan43 = $request->pesan43;
        $pemantauan->pesan44 = $request->pesan44;
        $pemantauan->pesan45 = $request->pesan45;
        $pemantauan->pesan46 = $request->pesan46;
        $pemantauan->pesan47 = $request->pesan47;
        $pemantauan->pesan48 = $request->pesan48;
        $pemantauan->pesan49 = $request->pesan49;
        $pemantauan->pesan50 = $request->pesan50;
        $pemantauan->pesan51 = $request->pesan51;
        $pemantauan->pesan52 = $request->pesan52;
        $pemantauan->pesan53 = $request->pesan53;
        $pemantauan->pesan54 = $request->pesan54;
        $pemantauan->pesan55 = $request->pesan55;

        $pemantauan->save();

        $pemantau = DB::Select('select * from form_pemantau ORDER BY no DESC limit 1');

        $no = DB::Select('select no from form_pemantau ORDER BY no DESC LIMIT 1 ');

        $pdf = PDF::loadView('pemantauan.pdf', compact('pemantau'));

        foreach ($no as $no) {
            $no = (int) $no->no;
        }

        // $pdf = PDF::loadView('pemantauan.pdf', function($pemantau) use ($request, $pemantauan) {
        //     $pemantau = DB::table('form_pemantau')->where('id',$request->id)->first;
        // })->setPaper('a4', 'landscape');

        $filename = Auth::user()->name .  $request->tanggal_ujian . '.pdf';

        Storage::put('public/pdf/' . $filename, $pdf->output());


        DB::table('form_pemantau')
            ->where('no', $no)  // find your user by their email
            ->limit(1)  // optional - to ensure only one record is updated.
            ->update(array('pdf' => $filename));  // update the record in the DB.    



        Mail::send(['text' => 'pemantauan.email'], ['nama' => Auth::user()->name, Auth::user()->email], function ($message) use ($request, $pdf) {
            $message->to(Auth::user()->email, Auth::user()->name)
                ->subject('Thankyou for your participation');
            $message->from('sekrelp2mp@gmail.com', 'Sekretariat LPPMP');
            $message->attachData($pdf->output(), Auth::user()->name . '.pdf');
        });


        Alert::success('Berhasil', 'Data Berhasil di Input');

        //  return $pdf->download('invoice.pdf');
        return redirect(route('pemantauan.uploadfoto'));
    }

    public function downloadpdf($no)
    {
        $pdf = DB::table('form_pemantau')->where('no', $no)->get();

        foreach ($pdf as $pdf)
            $name = $pdf->nama .  $pdf->tanggal_ujian . '.pdf';
        $filename = storage_path() . '/app/public/pdf/' . $pdf->nama . $pdf->tanggal_ujian . '.pdf'; {
            if (file_exists($filename)) {

                return response()->download(storage_path() . '/app/public/pdf/' . $name, $name, [], 'inline');
            } else {
                Alert::success('Berhasil', 'Data Tidak Ada yang Didownload');
                return redirect('/pemantau');
            }
        }
    }

    public function tampiluploadfoto()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('pemantauan.uploadfoto')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function uploadfoto(Request $request)
    {
        $request->validate([
            'fotolokasi' => 'image|mimes:jpeg,png,jpg|max:10000000',
            'fotopelaksanaan' => 'image|mimes:jpeg,png,jpg|max:10000000',
            'fotopemusnahan' => 'image|mimes:jpeg,png,jpg|max:10000000'
        ]);

        $upload = new galeri_pemantau;
        $upload->foto_lokasi = $request->foto_lokasi;
        $upload->foto_pelaksanaan = $request->foto_pelaksanaan;
        $upload->foto_pemusnahan = $request->foto_pemusnahan;

        if ($request->hasFile('fotolokasi')) {
            $file = $request->file('fotolokasi');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('image/fotolokasi', $filename);
            $upload->foto_lokasi = $filename;
        }
        if (isset($filename)) {
            $upload->foto_lokasi = $filename;
        } else {
            $upload->foto_lokasi = '';
        }

        if ($request->hasFile('fotopelaksanaan')) {
            $file = $request->file('fotopelaksanaan');
            $extension = $file->getClientOriginalName();
            $filename2 = time() . '.' . $extension;
            $file->move('image/fotopelaksanaan', $filename2);
            $upload->foto_pelaksanaan = $filename2;
        }
        if (isset($filename2)) {
            $upload->foto_pelaksanaan = $filename2;
        } else {
            $upload->foto_pelaksanaan = '';
        }

        if ($request->hasFile('fotopemusnahan')) {
            $file = $request->file('fotopemusnahan');
            $extension = $file->getClientOriginalName();
            $filename3 = time() . '.' . $extension;
            $file->move('image/fotopemusnahan', $filename3);
            $upload->foto_pemusnahan = $filename3;
        }
        if (isset($filename3)) {
            $upload->foto_pemusnahan = $filename3;
        } else {
            $upload->foto_pemusnahan = '';
        }

        $upload->save();
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        Alert::success('Berhasil', 'Terimakasih Atas Partisipasinya');
        return redirect('/pemantau')->with(compact('masa', 'lampiran', 'panduan', 'uas', 'manual'));
    }

    public function downloadexcel()
    {
        return Excel::download(new PemantauExport(), 'Report Pemantau Excel.xls');
    }

    public function hlmsurattugas()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('pemantauan.surattugas')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
    }

    public function searchsurattugas(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $tugas = DB::SELECT('select * from panduan_lampiran');
                $panduan = DB::SELECT('select * from panduan');
                $manual = DB::SELECT('select * from panduan_manual');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $masa = DB::SELECT('Select * from masa');
                $search = $request->get('search');
                $result = panduan_lampiran::where('masa_ujian', $search)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('pemantauan.hasilsurattugas', compact('panduan', 'manual', 'lampiran', 'tugas', 'masa', 'search', 'result'));
            }
        }
    }

    public function hlmpanduanuas()
    {
        $masa = DB::SELECT('Select * from masa');
        $lampiran = DB::SELECT('select * from panduan_lampiran');
        $panduan = DB::SELECT('select * from panduan');
        $uas = DB::SELECT('select * from panduan_uas');
        $manual = DB::SELECT('select * from panduan_manual');
        return view('pemantauan.panduanuas')->with(compact('lampiran', 'panduan', 'uas', 'manual', 'masa'));
    }

    public function searchpanduanuas(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            if ($request->has('tampil')) {
                $panduan = DB::SELECT('select * from panduan');
                $manual = DB::SELECT('select * from panduan_manual');
                $lampiran = DB::SELECT('select * from panduan_lampiran');
                $uas = DB::SELECT('select * from panduan_uas');
                $masa = DB::SELECT('Select * from masa');
                $search = $request->get('search');
                $result = panduan_uas::where('masa_ujian', $search)->paginate(10);
                if (count($result)) {
                    Alert::Success('Berhasil', 'Data Berhasil Ditambahkan');
                }
                return view('pemantauan.hasilpanduanuas', compact('uas', 'masa', 'search', 'result', 'panduan', 'manual', 'lampiran'));
            }
        }
    }
}
