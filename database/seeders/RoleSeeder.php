<?php

namespace Database\Seeders;

use App\Models\User;
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

        /*
         $role1 = Role::create(['name' => 'admin']);
         $role2 = Role::create(['name' => 'cliente']);
         $role3 = Role::create(['name' => 'taller']);

         Permission::create(['name' => 'admin.dashboard']);
         Permission::create(['name' => 'admin.clientes']);
         Permission::create(['name' => 'admin.prestamos']);
         Permission::create(['name' => 'admin.cobranzas']);*/

       /*  $role1 = Role::find(1);//admin
         $role2 = Role::find(2);//cliente
         $role3 = Role::find(3);//taller

        $per1 = Permission::find(1);//dashboard
        $per2 = Permission::find(2);//clientes
        $per3 = Permission::find(3);//prestamos
        $per4 = Permission::find(4);//cobranzas

        $role1->syncPermissions($per1,$per2,$per3,$per4);*/

        $user = User::find(1);
        $user->assignRole('admin');


    }
}
