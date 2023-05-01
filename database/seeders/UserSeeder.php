<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleMain = Role::where('name', 'medico')->first();

        $user = User::firstOrCreate(
            [
                'email'         => 'anonimo@esteve.com',
                'name'          => 'ARIANA LOPEZ LOPEZ',
                'old'           => true
            ]
        );

        $user->assignRole([$roleMain->id]);
    }
}
