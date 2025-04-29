<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super_admin',
            'operation_manager',
            'site_manager',
            'worker',
        ];

        $permissions = [
            //Users
            'show_users',
            'show_user',
            'add_user',
            'edit_user',
            'request_delete_user',
            'delete_user',

            // Projects
            'show_projects',
            'show_project',
            'add_project',
            'edit_project',
            'delete_project',
            'assign_project_user',

            // Reports
            'show_reports',
            'show_report',
            'add_report',
            'edit_report',
            'edit_report_status',
            'delete_report',

            // Time Entries
            'show_time_entries',
            'show_time_entry',
            'add_time_entry',
            'edit_time_entry',
            'delete_time_entry',
        ];

        $role_permissions = [
            'operation_manager' => [
                'show_users',
                'show_user',
                'add_user',
                'edit_user',
                'request_delete_user',
                'show_projects',
                'show_project',
                'add_project',
                'edit_project',
                'delete_project',
                'assign_project_user',
                'show_reports',
                'show_report',
                'edit_report_status',
                'show_time_entries',
                'show_time_entry',
                'edit_time_entry',
                'delete_time_entry',
            ],
            'site_manager' => [
                'show_users',
                'show_user',
                'add_user',
                'edit_user',
                'request_delete_user',
                'show_projects',
                'show_project',
                'assign_project_user',
                'show_reports',
                'show_report',
                'show_time_entries',
                'show_time_entry',
            ],
            'worker' => [
                'show_projects',
                'show_project',
                'show_report',
                'add_report',
                'edit_report',
                'edit_report_status',
                'delete_report',
                'show_time_entry',
                'add_time_entry',
            ],
        ];


        foreach ($roles as $key => $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        foreach ($permissions as $key => $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }


    }
}
