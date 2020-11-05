<?php

namespace App\Http\Controllers;

use App\Exports\UPBJJExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AdminUPBJJController extends Controller
{
    public function index()
    {
        $users = DB::Select('SELECT users.id, users.name, users.nip,users.email, roles.role_name FROM 
        users INNER JOIN role_user on users.id = role_user.user_id 
        INNER JOIN roles on role_user.role_id = roles.id where role_user.role_id = 3 ');
        //var_dump($users);exit();
        return view('adminupbjj.index')->with(compact('users'));
    }

    function excel_upbjj()
    {
        return Excel::download(new UPBJJExport, 'Report UPBJJ Excel.xls');
    }

    public function laporanupbjj()
    {
        $masa = DB::SELECT('Select * from masa');
        return view('admin.laporanupbjj')->with(compact('masa'));
    }
}
