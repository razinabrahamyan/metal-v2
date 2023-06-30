<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email = 'smnned@gmail.com';
        $admin->name = 'Eduard Simonyan';
        $admin->password = bcrypt('?sZt2wU7&4J^-Kt9azdSgU');
        $admin->save();
    }
}
