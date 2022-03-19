<?php

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $safeColorNames = array(
            'black', 'maroon', 'green', 'navy', 'olive',
            'purple', 'teal', 'lime', 'blue', 'silver',
            'gray', 'yellow', 'fuchsia', 'aqua', 'white'
        );

        // foreach($safeColorNames as $key=> $safeColorName){
        //     Color::insert([
        //         'name' => $safeColorName,
        //         'value' => $safeColorName,
        //     ]);
        // }
        for ($i = 0; $i < count($safeColorNames); $i++) {
            Color::insert([
                'name' =>  $safeColorNames[$i],
                'value' => $safeColorNames[$i],
            ]);
        }
    }
}
