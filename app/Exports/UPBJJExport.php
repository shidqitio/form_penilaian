<?php

namespace App\Exports;
use App\form_mra;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class UPBJJExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function view($id): View
    // {
    //     return view('mra.table', [
    //         'upbjj' => form_mra::get()->where('no',$id)
    //     ]);
    // } CODINGAN IPANG
    public function __construct(String $search = null)
    {
        $this->search = $search;
    }
    
    public function view(): View
    {
        return view('mra.table', [
            'upbjj' => form_mra::get()->where('masa_ujian', $this->search)
        ]);
    }
}