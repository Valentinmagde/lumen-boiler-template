<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'title' => 'Superadmin'],
            ['id' => 2, 'title' => 'admin'],
            ['id' => 3, 'title' => 'agency'],
        ];
        DB::table('roles')->insert($roles);
    }
}