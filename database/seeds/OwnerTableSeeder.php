<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $m_owner = Role::query()->where('name', 'owner')->first();
        $s_admin = Role::query()->where('name', 'super-admin')->first();

        // attach role

        $ownerUser = User::query()->where('email', 'owner@gmail.com')->first();
        $ownerUser->attachRole($m_owner);
//        if(!$ownerUser->hasRole('owner')) {
//            $ownerUser->attachRole($m_owner);
//        }

        $adminUser = User::query()->where('email', 'super.admin@gmail.com')->first();
        $adminUser->attachRole($s_admin);
//        if(!$adminUser->hasRole('super-admin')) {
//            $adminUser->attachRole($s_admin);
//        }
    }
}
