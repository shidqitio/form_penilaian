<?php

namespace App\Exports;

use App\form_feedback;
use App\form_mra;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class FeedbackUpbjjExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(String $search = null)
    {
        $this->search = $search;
    }
    public function view(): View
    {
        $id_upbjj = Auth::user()->id_upbjj;
        $wilayah = DB::SELECT('select upbjj.upbjj from users inner join upbjj on users.id_upbjj = upbjj.id_upbjj 
        where users.id_upbjj = ' . $id_upbjj . '');

        foreach ($wilayah as $wilayah) {
            $daerah = $wilayah->upbjj;
        }
        return view('feedback.table', [
            'feedback' => form_feedback::get()->where('masa_ujian', $this->search)->where('upbjj', $daerah)
        ]);
    }
}
