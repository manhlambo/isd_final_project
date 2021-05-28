<?php

namespace App\Exports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{

    public function headings():array
    {
        return [
            "ID",
            "ID Người dùng",            
            "Ngày sinh",          
            "Số điện thoại",            
            "Thêm vào",
            "Cập nhật"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }
}
