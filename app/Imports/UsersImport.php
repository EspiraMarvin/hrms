<?php

namespace App\Imports;

use App\Employee;
use App\User;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

//class UsersImport implements ToModel, withHeadingRow
class UsersImport implements ToCollection, withHeadingRow
{
    /**
     * @param Collection $rows
     * @return void
     */

    public function collection(Collection $rows){
    foreach ($rows as $row)
    {

        $user = User::create([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => bcrypt($row['password']),
        ]);

        Employee::create([
            'photo' => $row['photo'],
            'code' => $row['code'],
            'pf_number' => $row['pf_number'],
            'status' => $row['status'],
            'gender' => $row['gender'],
            'name' => $user->name,
            'user_id' => $user->id,
        ]);
    }
}
//    public function model(array $row)
//    {
//
//    /*    if (!isset($row['name'])) {
//            return null;
//        }*/
//
//        return new User([
//
//            'name'     => $row['name'],
//            'email'    => $row['email'],
//            'password' => bcrypt($row['password']),
//        ]);
//    }
}
