<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'thangvb.dev@gmail.com',
            'password' => '$2y$10$Nncv9fpNdfHsu2ksFAwH6.LauQgJ76NE71iLKL3.vvDLr0RHxEE8S',
            'role' => 'admin',
            'employeeId' => 1
        ]);
        User::create([
            'email' => 'huyentp@gmail.com',
            'password' => '$2y$10$Nncv9fpNdfHsu2ksFAwH6.LauQgJ76NE71iLKL3.vvDLr0RHxEE8S',
            'role' => 'admin',
            'employeeId' => 2
        ]);
        User::create([
            'email' => 'hoangnd@gmail.com',
            'password' => '$2y$10$Nncv9fpNdfHsu2ksFAwH6.LauQgJ76NE71iLKL3.vvDLr0RHxEE8S',
            'role' => 'admin',
            'employeeId' => 3
        ]);
        // default password : user@123
    }
}
