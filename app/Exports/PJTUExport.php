<?php

namespace App\Exports;
use App\form_pjtu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class PJTUExport implements FromView
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
        return view('PJTUPJLU.table', [
            'pjtu' => form_pjtu::get()->where('masa_ujian', $this->search)
        ]);
    }
}