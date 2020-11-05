<?php

namespace App\Exports;

use App\form_feedback;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class FeedbackExport implements FromView
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
        return view('feedback.table', [
            'feedback' => form_feedback::get()->where('masa_ujian', $this->search)
        ]);
    }
}
