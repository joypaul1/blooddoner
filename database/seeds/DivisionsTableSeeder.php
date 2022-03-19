<?php

use Illuminate\Database\Seeder;
use App\Models\Division;
class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::insert([
            [
                "id"=> 1,
                "name"=> "Dhaka"
            ],
            [
                "id"=> 2,
                "name"=> "Barishal"
            ],
            [
                "id"=> 3,
                "name"=> "Chattogram"
            ],
            [
                "id"=> 4,
                "name"=> "Khulna"
            ],
            [
                "id"=> 5,
                "name"=> "Mymensingh"
            ],
            [
                "id"=> 6,
                "name"=> "Rajshahi"
            ],
            [
                "id"=> 7,
                "name"=> "Rangpur"
            ],
            [
                "id"=> 8,
                "name"=> "Sylhet"
            ],
        ]);
    }
}
