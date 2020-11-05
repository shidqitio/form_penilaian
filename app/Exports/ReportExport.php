<?php

namespace App\Exports;

use App\form_pemantau;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class ReportExport implements FromView
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
        return view('pemantauan.table', [
            'pemantau' => form_pemantau::get()->where('masa_ujian', $this->search)
        ]);
    }
}
