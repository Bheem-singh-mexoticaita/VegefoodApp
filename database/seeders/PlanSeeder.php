<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
  
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'BasicProduct', 
                'slug' => 'BasicProduct', 
                'stripe_plan' => 'price_1MPKhtSAZ2vN03OwmbzKewcC', 
                'price' => 10, 
                'description' => 'BasicProduct'
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium', 
                'stripe_plan' => 'price_1MPIojSAZ2vN03OwPn2wgRld', 
                'price' => 100, 
                'description' => 'Premium'
            ]
        ];
  
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}