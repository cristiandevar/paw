<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'users_list']);
        Permission::create(['name' => 'products_list']);
        Permission::create(['name' => 'shopps_list']);
        
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_admin->givePermissionTo('users_list');

        $rol_seller = Role::create(['name' => 'seller']);
        $rol_seller->givePermissionTo('products_list');

        $rol_client = Role::create(['name' => 'client']);
        $rol_client->givePermissionTo('shopps_list');
        // Roles
        // $rol_admin = Role::create(['name' => 'admin']);
        // $rol_seller = Role::create(['name' => 'seller']);
        // $rol_client = Role::create(['name' => 'client']);
        
        // // Permisos para cada Rol
        // Permission::create(['name' => 'users_list'])->assignRole($rol_admin);
        // Permission::create(['name' => 'products_list'])->assignRole($rol_seller);
        // Permission::create(['name' => 'shopps_list'])->assignRole($rol_client);
        
        // //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor, 
        // //$rol_cliente]);
    }
}
