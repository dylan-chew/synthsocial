<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = "user admin";
        $role_user->description = "A User Admin";
        $role_user->save();

        $role_theme = new Role();
        $role_theme->name = "theme admin";
        $role_theme->description = "Admin that may only have control over themes";
        $role_theme->save();

        $role_post = new Role();
        $role_post->name = "post admin";
        $role_post->description = "Admin that may only have control over posts";
        $role_post->save();

        $role_default = new Role();
        $role_default->name = "default";
        $role_default->description = "default user";
        $role_default->save();
    }
}
