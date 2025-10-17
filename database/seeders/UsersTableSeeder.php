<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'type' => 'admin'
        ];

        $this->create($user);

        $company = Company::create([
            'name' => 'test',
            'licensed' => true
        ]);

        $user = [
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company->id,
            'type' => 'manager'
        ];

        $this->create($user);

        $user = [
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company->id,
            'type' => 'user'
        ];

        $this->create($user);
    }

    private function create(array $data)
    {
        User::create($data);
    }
}
