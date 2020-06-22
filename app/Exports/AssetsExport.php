<?php


namespace App\Exports;
use App\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;;

class AssetsExport implements FromCollection, withMapping, WithHeadings, WithColumnFormatting
{

    public function collection()
    {
        return Asset::all();

    }

    public function map($asset): array
    {
        return [
            $asset->id,
            $asset->asset,
            $asset->serial_number,
//            $asset->description
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Asset',
            'Serial Number',
//            'Description'
        ];
    }

    /**
     * @inheritDoc
     */
    public function columnFormats(): array
    {
        // TODO: Implement columnFormats() method.
        return [
//            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @inheritDoc
     */

}
