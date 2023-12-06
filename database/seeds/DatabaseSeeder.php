<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TheLoaiTableSeeder::class);
        $this->call(LoaiTinTableSeeder::class);
        $this->call(TinTucTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
