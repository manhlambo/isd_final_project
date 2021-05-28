<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{

    public function headings():array
    {
        return [
            "ID",
            "Họ và tên",
            "Ngày sinh",
            "Giới tính",
            "Tên phụ huynh",
            "Địa chỉ email",
            "Số điện thoại",
            "Mã lớp học",
            "Thêm vào",
            "Cập nhật"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }
}
