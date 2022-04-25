<?php

use Illuminate\Database\Seeder;
use BullsEye\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_member = new Role();
        $role_member->name = 'member';
        $role_member->description = 'A member User';
        $role_member->save();


        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An admin User';
        $role_admin->save();
    }
}
