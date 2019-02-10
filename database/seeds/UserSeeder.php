<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\User::find(1)) {
            factory(\App\User::class)->create([
                'name'     => 'Super Admin',
                'email'    => 'admin@nht.com',
                'phone'    => null,
                'password' => 'admin',
                'status'   => 1
            ]);
        }  

        if (!\App\User::find(2)) {
            factory(\App\User::class)->create([
                'name'     => 'Tuấn Anh',
                'email'    => 'tuananh@nht.com',
                'phone'    => '0965053583',
                'password' => 'tuananh',
                'status'   => 1
            ]);
        }

        if (!\App\Repositories\Roles\Role::find(1)) {
            factory(App\Repositories\Roles\Role::class)->create([
                'name' => 'Super admin',
                'slug' => 'superadmin',
                'permissions' => [
                    'admin.super-admin' => true
                ]
            ]);
        }

        if (!DB::table('role_users')->where('user_id', 1)->where('role_id', 1)->first()) {
            DB::table('role_users')->insert(['user_id' => 1, 'role_id' => 1]);
        }

        if (!DB::table('role_users')->where('user_id', 2)->where('role_id', 1)->first()) {
            DB::table('role_users')->insert(['user_id' => 2, 'role_id' => 1]);
        }
    }
}
