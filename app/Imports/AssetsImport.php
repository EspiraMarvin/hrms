<?php

namespace App\Imports;

use App\Asset;
use DateTime;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AssetsImport implements ToCollection, withHeadingRow
{
    /**
     * @param Collection $rows
     * @return void
     * @throws \Exception
     */

    public function collection(Collection $rows){
        foreach ($rows as $row)
        {

            Asset::create([
                'asset'         => $row['asset'],
                'serial_number' => $row['serial_number'],
                'description'   => $row['description']

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
