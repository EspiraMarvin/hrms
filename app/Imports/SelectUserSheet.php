<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SelectUserSheet implements WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        // TODO: Implement sheets() method.
        return [
          0 => new UsersImport()
        ];
    }
}
