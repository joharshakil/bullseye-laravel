<?php

use Illuminate\Database\Seeder;
use BullsEye\User;
use BullsEye\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_member = Role::where('name', 'member')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $member = new User();
        $member->name = 'jerry';
        $member->email = 'jerry@example.com';
        $member->password = bcrypt('click123');
        $member->save();



        $member->roles()->attach($role_member);
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('click123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
