<?php

namespace App\Exports;

use App\form_pemantau;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class PemantauExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $email = Auth::user()->email;
        $email_login = DB::SELECT('select email from users where email = "' . $email . '" ');

        foreach ($email_login as $emaillog) {
            $login = $emaillog->email;
        }
        return view('pemantauan.table', [
            'pemantau' => form_pemantau::get()->where('email', $login)
        ]);
    }
}
