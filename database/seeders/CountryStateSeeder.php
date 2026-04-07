<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
class CountryStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // India
        $india = Country::create([
            'name' => 'India',
            'code' => 'IN'
        ]);

        $indiaStates = [
            'Maharashtra',
            'Gujarat',
            'Delhi',
            'Karnataka',
            'Tamil Nadu',
            'Rajasthan',
            'Uttar Pradesh',
            'Madhya Pradesh',
            'Punjab',
            'Haryana'
        ];

        foreach ($indiaStates as $state) {
            State::create([
                'country_id' => $india->id,
                'name' => $state
            ]);
        }

        // USA
        $usa = Country::create([
            'name' => 'United States',
            'code' => 'US'
        ]);

        $usaStates = [
            'California',
            'Texas',
            'Florida',
            'New York',
            'Illinois',
            'Pennsylvania',
            'Ohio',
            'Georgia',
            'North Carolina',
            'Michigan'
        ];

        foreach ($usaStates as $state) {
            State::create([
                'country_id' => $usa->id,
                'name' => $state
            ]);
        }
    }
}
