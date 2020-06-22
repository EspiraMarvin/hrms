<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class EmployeesExport implements FromCollection, withMapping, WithHeadings, WithColumnFormatting
//class EmployeesExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function collection()
    {
        return Employee::all();

//        return Employee::select('id','name')->where('id','>',0)->get();
    }

    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->name,
            $employee->code,
            $employee->pf_number,
            $employee->role,
            $employee->supervisor,
            $employee->department,
            $employee->date_of_joining,
            $employee->duty_station,
            $employee->posted_date,
            $employee->phone_number,
            $employee->emergency_number,
            $employee->employment_type,
            $employee->job_group,
            $employee->gender,
            $employee->salary,
            $employee->status,
            $employee->current_address,
            $employee->permanent_address,
            $employee->kra_pin,
            $employee->bank_name,
            $employee->account_number,
            $employee->pf_status,
            $employee->father_name,
            $employee->qualification,
            $employee->date_of_resignation,
            $employee->notice_period,
            $employee->last_working_day,
//            $employee->created_at,
//            $employee->updated_at,
//            Date::dateTimeToExcel($employee->created_at),
//            Date::dateTimeToExcel($employee->updated_at),

        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Code',
            'PF Num',
            'Role',
            'Supervisor',
            'Department',
            'Date Joined',
            'Duty Station',
            'Posted Date',
            'Phone Number',
            'Emergency Number',
            'Employment Type',
            'Job Group',
            'Gender',
            'Salary',
            'Status',
            'Current Addr',
            'Permanent Addr',
            'KRA Pin',
            'Bank Name',
            'Account Number',
            'Father`s Name',
            'Qualification',
            'Resignation Date',
            'Notice Period',
            'Last Working Day',
//            'Created At',
//            'Updated At',
        ];
    }

    /**
     * @inheritDoc
     */
    public function columnFormats(): array
    {
        return [
//            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @inheritDoc
     */

}
