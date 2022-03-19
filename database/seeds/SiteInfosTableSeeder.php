<?php

use App\Models\SiteInfo;
use Illuminate\Database\Seeder;

class SiteInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteInfo::create([
            'name' => 'Company'
        ]);
    }
}
