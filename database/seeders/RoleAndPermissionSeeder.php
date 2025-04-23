<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            // Project Permissions
            'create project',
            'view projects',
            'assign users to project',

            // User Management
            'create user',
            'edit user',
            'delete user',
            'assign role',

            // Time Tracking
            'submit time entry',
            'view time entries',

            // Reports
            'submit report',
            'view reports',
            'approve report',
            'flag report',

            // Dashboard
            'view dashboard',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and their permissions
        $roles = [
            'admin' => [
                'create project',
                'view projects',
                'assign users to project',
                'create user',
                'edit user',
                'delete user',
                'assign role',
                'view dashboard',
            ],

            'manager' => [
                'view projects',
                'assign users to project',
                'view time entries',
                'view reports',
                'approve report',
                'flag report',
                'view dashboard',
            ],

            'worker' => [
                'submit time entry',
                'view time entries',
                'submit report',
                'view reports',
                'view dashboard',
            ],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($perms);
        }
    }
}
