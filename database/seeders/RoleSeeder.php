<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $role1 = Role::create(['name' => 'admin']);
         $role2 = Role::create(['name' => 'cliente']);
         $role3 = Role::create(['name' => 'taller']);

         Permission::create(['name' => 'admin.dashboard']);
         Permission::create(['name' => 'admin.clientes']);
         Permission::create(['name' => 'admin.prestamos']);
         Permission::create(['name' => 'admin.cobranzas']);



    }
}
