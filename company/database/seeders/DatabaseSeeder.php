<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create();

        for($i=1;$i<=50;$i++){
            DB::table('departments')->insert([
                'name' => $faker->company,
                'location' => $faker->city,
              
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);
        }
        for($i=1;$i<=50;$i++){
            DB::table('projects')->insert([
                'name'=>$faker->name(),
                'd_no'=>DB::table('departments')->inRandomOrder()->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for($i=1;$i<=50;$i++){
            DB::table('employees')->insert([
                'gender'=>$faker->randomElement(['male','female','orther']),
                'name'=>$faker->name(),
                'address'=>$faker->address(),
                'dob'=>$faker->date(),
                'D_id'=>DB::table('departments')->inRandomOrder()->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for($i=1;$i<=50;$i++){
            DB::table('dependents')->insert([
                'gender'=>$faker->randomElement(['male','female','orther']),
                'name'=>$faker->name(),
               'relationship'=>$faker->randomElement(['mom','dad','son']),
                'id_em'=>DB::table('employees')->inRandomOrder()->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for($i=1;$i<=50;$i++){
            DB::table('workons')->insert([
                'employee_id'=>DB::table('employees')->inRandomOrder()->value('id'),
                'project_id'=>DB::table('projects')->inRandomOrder()->value('id'),
                'duration'=>$faker->randomFloat(null,10,500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        for($i=1;$i<=50;$i++){
            DB::table('managers')->insert([
                'manager_id'=>DB::table('employees')->inRandomOrder()->value('id'),
                'department_id'=>DB::table('departments')->inRandomOrder()->value('id'),
                'since' => $faker->dateTimeBetween('-30 years', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
