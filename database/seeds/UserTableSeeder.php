<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user admin')->first();
        $role_theme = Role::where('name', 'theme admin')->first();
        $role_post = Role::where('name', 'post admin')->first();
        $role_default = Role::where('name', 'default')->first();

        $userDefault = new User();
        $userDefault->name = "Jon Smith";
        $userDefault->email = "jonsmith@mail.com";
        $userDefault->password = bcrypt('password');
        $userDefault->created_at = Carbon::now()->toDateTimeString();
        $userDefault->updated_at = Carbon::now()->toDateTimeString();
        $userDefault->save();
        $userDefault->roles()->attach($role_default);

        $userAdmin = new User();
        $userAdmin->name = "Bob Roberts";
        $userAdmin->email = "useradmin@mail.com";
        $userAdmin->password = bcrypt('password');
        $userAdmin->created_at = Carbon::now()->toDateTimeString();
        $userAdmin->updated_at = Carbon::now()->toDateTimeString();
        $userAdmin->save();
        $userAdmin->roles()->attach($role_user);

        $themeAdmin = new User();
        $themeAdmin->name = "Jane Doe";
        $themeAdmin->email = "themeadmin@mail.com";
        $themeAdmin->password = bcrypt('password');
        $themeAdmin->created_at = Carbon::now()->toDateTimeString();
        $themeAdmin->updated_at = Carbon::now()->toDateTimeString();
        $themeAdmin->save();
        $themeAdmin->roles()->attach($role_theme);

        $postAdmin = new User();
        $postAdmin->name = "Sarah Posts";
        $postAdmin->email = "postadmin@mail.com";
        $postAdmin->password = bcrypt('password');
        $postAdmin->created_at = Carbon::now()->toDateTimeString();
        $postAdmin->updated_at = Carbon::now()->toDateTimeString();
        $postAdmin->save();
        $postAdmin->roles()->attach($role_post);

        $userDefault = new User();
        $userDefault->name = "James User";
        $userDefault->email = "jamesuser@mail.com";
        $userDefault->password = bcrypt('password');
        $userDefault->created_at = Carbon::now()->toDateTimeString();
        $userDefault->updated_at = Carbon::now()->toDateTimeString();
        $userDefault->save();
        $userDefault->roles()->attach($role_default);

//        DB::table('users')->insert([
//            'name' => 'Jon Smith',
//            'email' => 'jon'.'@gmail.com',
//            'password' => bcrypt('password'),
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' => Carbon::now()->toDateTimeString(),
//        ]);
//
//        DB::table('users')->insert([
//            'name' => 'Jim Admin',
//            'email' => 'admin'.'@mysocial.com',
//            'password' => bcrypt('password'),
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' => Carbon::now()->toDateTimeString(),
//        ]);
//
//        DB::table('users')->insert([
//            'name' => 'Joe Theme',
//            'email' => 'theme_admin'.'@mysocial.com',
//            'password' => bcrypt('password'),
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' => Carbon::now()->toDateTimeString(),
//        ]);
//
//        DB::table('users')->insert([
//            'name' => 'Jane Posts',
//            'email' => 'posts_admin'.'@mysocial.com',
//            'password' => bcrypt('password'),
//            'created_at' => Carbon::now()->toDateTimeString(),
//            'updated_at' => Carbon::now()->toDateTimeString(),
//        ]);
    }
}
