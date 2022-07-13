<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        Student::create([
            'name'=>'Rohit Sarma',
            'is_complate'=>false
        ]);

        Student::create([
            'name'=>'Virat Kohli',
            'is_complate'=>false
        ]);
    }
}
