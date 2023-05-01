<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [ 'name' => 'admin', 'readable_name' => 'Administrador', 'short_name' => 'admin'  ],
            [ 'name' => 'medico', 'readable_name' => 'Médico', 'short_name' => 'ME' ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
