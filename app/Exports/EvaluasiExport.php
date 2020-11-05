<?php

namespace App\Exports;

use App\form_evaluasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class EvaluasiExport implements FromView
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
        return view('evaluasi.table', [
            'evaluasi' => form_evaluasi::get()->where('masa_ujian', $this->search)
        ]);
    }
}
