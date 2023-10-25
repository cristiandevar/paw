<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_seller = Role::create(['name' => 'seller']);
        $rol_client = Role::create(['name' => 'client']);
        
        // Permisos para cada Rol
        Permission::create(['name' => 'users_list'])->assignRole($rol_admin);
        Permission::create(['name' => 'products_list'])->assignRole($rol_seller);
        Permission::create(['name' => 'shopps_list'])->assignRole($rol_client);
        
        //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor, 
        //$rol_cliente]);
    }
}
