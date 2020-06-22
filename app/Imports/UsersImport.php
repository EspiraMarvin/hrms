<?php

namespace App\Imports;

use App\Employee;
use App\User;
use App\Role;
use DateTime;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

//class UsersImport implements ToModel, withHeadingRow
class UsersImport implements ToCollection, withHeadingRow
{
    use Importable;
    /**
     * @param Collection $rows
     * @return void
     * @throws \Exception
     */

    public function collection(Collection $rows){
    foreach ($rows as $row)
    {

        $user = User::create([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => bcrypt($row['password']),
        ]);

        $roleId = 2;
        $role = Role::where('role', $row['role'])->first();
        if ($role) {
            $roleId = $role->id;
        }
        $user->roles()->attach($roleId);

        $supervisorId = '';
        $supervisor = User::where('name', $row['supervisor'])->first();
        if ($supervisor) {
            $supervisorId = $supervisor->id;
        }
        $user->supervisedBy()->attach($supervisorId);
//        $user->supervisor()->attach($supervisorId);

        Employee::create([
            'department_id' => $row['department_id'],
            'photo' => $row['photo'],
            'code' => $row['code'],
            'pf_number' => $row['pf_number'],
            'status' => $row['status'],
            'gender' => $row['gender'],
            'kra_pin' => $row['kra_pin'],
            'duty_station' => $row['duty_station'],
            'employment_type' => $row['employment_type'],
            'salary' => $row['salary'],
            'account_number' => $row['account_number'],
            'bank_name' => $row['bank_name'],
            'name' => $user->name,
            'user_id' => $user->id,
        ]);

    }

    }

}
