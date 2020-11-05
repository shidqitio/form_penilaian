<?php

namespace App\Imports;

use App\User;
use App\UserRole;
use App\Imports\UserImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $u = User::create([
                'name' => $row[1],
                'nip' => $row[2],
                'email' => $row[3],
                'password' => bcrypt($row[4]),
            ]);
            if ($u->id != null) {
                UserRole::create(['user_id' => $u->id, 'role_id' => $row['5']]);
            }
        }
    }
}
