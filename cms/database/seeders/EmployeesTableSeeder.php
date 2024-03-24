<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'fullName' => 'Vũ Bá Thắng',
            'address' => 'Thường Tín - Hà Nội',
            'phone' => '0378481575',
            'position' => 'Sinh viên',
            'avatar' => null,
            'departmentId' => 1
        ]);
        Employee::create([
            'fullName' => 'Trịnh Phương Huyền',
            'address' => 'Cầu Giấy - Hà Nội',
            'phone' => '0345678911',
            'position' => 'Sinh viên',
            'avatar' => null,
            'departmentId' => 2
        ]);
        Employee::create([
            'fullName' => 'Nguyễn Duy Hoàng',
            'address' => 'Đông Anh - Hà Nội',
            'phone' => '0123456789',
            'position' => 'Sinh viên',
            'avatar' => null,
            'departmentId' => 6
        ]);
    }
}
