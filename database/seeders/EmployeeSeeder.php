<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        Employee::create([
            'name'=>'Rohit Sarma',
            'designation'=>'Devloper',
            'city'=>'mumbai'
        ]);

        Employee::create([
            'name'=>'Virat kohli',
            'designation'=>'Manger',
            'city'=>'Bangalore'
        ]);

        Employee::create([
            'name'=>'Ms dhoni',
            'designation'=>'HR',
            'city'=>'Chennai'
        ]);

        Employee::create([
            'name'=>'KL Rahul',
            'designation'=>'designer',
            'city'=>'mumbai'
        ]);

        Employee::create([
            'name'=>'Jasprite Bumrah',
            'designation'=>'engineer',
            'city'=>'punjab'
        ]);

        Employee::create([
            'name'=>'Ravindra Jadeja',
            'designation'=>'Bank manager',
            'city'=>'Gujarat'
        ]);

        Employee::create([
            'name'=>'Mohmad Sami',
            'designation'=>'Police',
            'city'=>'Rajestan'
        ]);

        Employee::create([
            'name'=>'Manish Panday',
            'designation'=>'designer',
            'city'=>'Kolkta'
        ]);

        Employee::create([
            'name'=>'Hadik Pandiya',
            'designation'=>'designer',
            'city'=>'Gujarat'
        ]);

        Employee::create([
            'name'=>'Virendra Sehwag',
            'designation'=>'HR',
            'city'=>'delhi'
        ]);

        Employee::create([
            'name'=>'Shikar Dhawan',
            'designation'=>'Devloper',
            'city'=>'Punjab'
        ]);

        Employee::create([
            'name'=>'Suryakumar yadav',
            'designation'=>'designer',
            'city'=>'mumbai'
        ]);

        Employee::create([
            'name'=>'Rishabh pant',
            'designation'=>'Bank manager',
            'city'=>'Delhi'
        ]);

        Employee::create([
            'name'=>'Shreyas iyer',
            'designation'=>'Bank manager',
            'city'=>'Kolkata'
        ]);

        Employee::create([
            'name'=>'Gautam Gambhir',
            'designation'=>'designer',
            'city'=>'Kolkata'
        ]);

        Employee::create([
            'name'=>'Sachin Tendulkar',
            'designation'=>'Devloper',
            'city'=>'mumbai'
        ]);

        Employee::create([
            'name'=>'Rahul Devide',
            'designation'=>'designer',
            'city'=>'Rajestan'
        ]);

        Employee::create([
            'name'=>'Suresh Raina',
            'designation'=>'Devloper',
            'city'=>'Chennai'
        ]);

        Employee::create([
            'name'=>'Yuraj Singh',
            'designation'=>'engineer',
            'city'=>'mumbai'
        ]);

        Employee::create([
            'name'=>'irfan pathan',
            'designation'=>'engineer',
            'city'=>'Chennai'
        ]);
    }
}
