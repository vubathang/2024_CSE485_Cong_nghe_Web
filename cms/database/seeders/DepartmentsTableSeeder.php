<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'departmentName' => 'Đại học Thủy Lợi',
            'address' => 'Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'phonghcth@tlu.edu.vn',
            'phone' => '(024) 3852 2201'
        ]);
        Department::create([
            'departmentName' => 'Phòng đào tạo',
            'address' => 'Tầng 1 - Nhà A4 - Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'daotao@tlu.edu.vn',
            'phone' => '(024) 35631537'
        ]);
        Department::create([
            'departmentName' => 'Phòng chính trị và công tác sinh viên',
            'address' => 'Tầng 1 - Nhà A1 - Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'p7@tlu.edu.vn',
            'phone' => '(024) 35639577'
        ]);
        Department::create([
            'departmentName' => 'Phòng khoa học và công nghệ',
            'address' => 'Phòng 504, 506, 508 - Nhà A1 - Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'khcn@tlu.edu.vn',
            'phone' => '(024) 38534198'
        ]);
        Department::create([
            'departmentName' => 'Phòng hợp tác quốc tế',
            'address' => 'Phòng 103 - Nhà A1 - Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'ico@tlu.edu.vn',
            'phone' => '(024) 38533083'
        ]);
        Department::create([
            'departmentName' => 'Thư viện',
            'address' => 'Tòa nhà A45 - Số 175 Tây sơn - Quận Đống Đa – Thành phố Hà Nội',
            'email' => 'thuvien@tlu.edu.vn',
            'phone' => '(024) 35630971'
        ]);
    }
}
