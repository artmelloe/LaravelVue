<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotepadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Notepad::factory(25)->create();
    }
}
