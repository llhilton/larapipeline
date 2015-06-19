<?php
/**
 * Created by PhpStorm.
 * User: Lisa
 * Date: 6/5/2015
 * Time: 11:13 AM
 */

use Illuminate\Database\Seeder;


class CountriesTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('countries')->delete();

        $countries= array(
            ['id'=> 1, 'country'=> 'Iraq', 'slug'=>'iraq', 'region'=>'MENA-Iraq','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 2, 'country'=> 'MENA Regional', 'slug'=>'mena-regional','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 3, 'country'=> 'Egypt','slug'=>'egypt', 'region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 4, 'country'=> 'Yemen', 'slug'=>'yemen','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 5, 'country'=> 'Oman', 'slug'=>'oman','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 6, 'country'=> 'Lebanon', 'slug'=>'lebanon','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 7, 'country'=> 'Jordan', 'slug'=>'jordan','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 8, 'country'=> 'Turkey', 'slug'=>'turkey','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 9, 'country'=> 'Libya', 'slug'=>'libya','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 10, 'country'=> 'Morocco', 'slug'=>'morocco','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 11, 'country'=> 'Philippines', 'slug'=>'philippines','region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 12, 'country'=> 'Indonesia','slug'=>'indonesia', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 13, 'country'=> 'Malaysia','slug'=>'malaysia', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 14, 'country'=> 'SEA Regional','slug'=>'sea-regional', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 15, 'country'=> 'SSA Regional','slug'=>'ssa-regional', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 16, 'country'=> 'Kenya','slug'=>'kenya', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 17, 'country'=> 'Uganda', 'slug'=>'uganda','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 18, 'country'=> 'Ebola Regional', 'slug'=>'ebola-regional','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 19, 'country'=> 'Cote dIvoire', 'slug'=>'cote-divoire','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 20, 'country'=> 'Afghanistan','slug'=>'afghanistan', 'region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 21, 'country'=> 'Pakistan', 'slug'=>'pakistan','region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 22, 'country'=> 'India', 'slug'=>'india','region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 23, 'country'=> 'Bangladesh','slug'=>'bangladesh', 'region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 24, 'country'=> 'Ukraine','slug'=>'ukraine', 'region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 25, 'country'=> 'Global', 'slug'=>'global','region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 26, 'country'=> 'Azerbaijan','slug'=>'azerbaijan', 'region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 27, 'country'=> 'Cambodia','slug'=>'cambodia', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 28, 'country'=> 'China','slug'=>'china', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 29, 'country'=> 'South Korea','slug'=>'south-korea', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 30, 'country'=> 'Taiwan','slug'=>'taiwan', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 31, 'country'=> 'Thailand', 'slug'=>'thailand','region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 32, 'country'=> 'Vietnam', 'slug'=>'vietnam','region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 33, 'country'=> 'Israel','slug'=>'israel', 'region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 34, 'country'=> 'Brazil', 'slug'=>'brazil','region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 35, 'country'=> 'Argentina', 'slug'=>'argentina','region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 36, 'country'=> 'Mexico','slug'=>'mexico', 'region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 37, 'country'=> 'Canada','slug'=>'canada', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 38, 'country'=> 'Netherlands','slug'=>'netherlands', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 39, 'country'=> 'Nigeria','slug'=>'nigeria', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 40, 'country'=> 'Algeria', 'slug'=>'algeria','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 41, 'country'=> 'Mongolia', 'slug'=>'mongolia','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 42, 'country'=> 'Russia','slug'=>'russia', 'region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 43, 'country'=> 'United States','slug'=>'united-states', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 44, 'country'=> 'Somalia','slug'=>'somalia', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 45, 'country'=> 'United Kingdom','slug'=>'united-kingdom', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 46, 'country'=> 'Bolivia','slug'=>'bolivia', 'region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 47, 'country'=> 'Gabon','slug'=>'gabon', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 48, 'country'=> 'Sri Lanka', 'slug'=>'sri-lanka','region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 49, 'country'=> 'Tunisia', 'slug'=>'tunisia','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 50, 'country'=> 'Uzbekistan','slug'=>'uzbekistan', 'region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 51, 'country'=> 'Laos', 'slug'=>'laus','region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 52, 'country'=> 'Chad','slug'=>'chad', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 53, 'country'=> 'Mali','slug'=>'mali', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 54, 'country'=> 'Namibia','slug'=>'namibia', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 55, 'country'=> 'Zambia', 'slug'=>'zambia','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 56, 'country'=> 'Ethiopia', 'slug'=>'ethiopia','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 57, 'country'=> 'Kuwait','slug'=>'kuwait', 'region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 58, 'country'=> 'Peru', 'slug'=>'peru','region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 59, 'country'=> 'Switzerland', 'slug'=>'switzerland','region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 60, 'country'=> 'Armenia', 'slug'=>'armenia','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 61, 'country'=> 'Kazakhstan','slug'=>'kazakhstan', 'region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 62, 'country'=> 'Kyrgyzstan', 'slug'=>'kyrgyzstan','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 63, 'country'=> 'Tajikistan', 'slug'=>'tajikistan','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 64, 'country'=> 'Georgia', 'slug'=>'georgia','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 65, 'country'=> 'Italy','slug'=>'italy', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 66, 'country'=> 'South Africa','slug'=>'south-africa', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 67, 'country'=> 'United Arab Emirates', 'slug'=>'uae','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 68, 'country'=> 'Guinea','slug'=>'guinea', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 69, 'country'=> 'Liberia','slug'=>'liberia', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 70, 'country'=> 'Senegal','slug'=>'senegal', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 71, 'country'=> 'Sierra Leone', 'slug'=>'sierra-leone','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 72, 'country'=> 'Congo (Kinshasa)','slug'=>'drc', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 73, 'country'=> 'Qatar', 'slug'=>'qatar','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 74, 'country'=> 'Singapore', 'slug'=>'singapore','region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 75, 'country'=> 'Belgium','slug'=>'belgium', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 76, 'country'=> 'Colombia','slug'=>'columbia', 'region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 77, 'country'=> 'Guatemala','slug'=>'guatemala', 'region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 78, 'country'=> 'Turkmenistan', 'slug'=>'turkmenistan','region'=>'FSU','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 79, 'country'=> 'Burundi', 'slug'=>'burundi','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 80, 'country'=> 'Cameroon','slug'=>'cameroon', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 81, 'country'=> 'Ghana','slug'=>'ghana', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 82, 'country'=> 'Mozambique','slug'=>'mozambique', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 83, 'country'=> 'Seychelles','slug'=>'seychelles', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 84, 'country'=> 'Tanzania','slug'=>'tanzania', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 85, 'country'=> 'Palestine', 'slug'=>'palestine','region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 86, 'country'=> 'Saudi Arabia','slug'=>'saudi-arabia', 'region'=>'MENA','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 87, 'country'=> 'Barbados','slug'=>'barbados', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 88, 'country'=> 'Paraguay','slug'=>'paraguay', 'region'=>'Latin America','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 89, 'country'=> 'Papua New Guinea','slug'=>'papua-new-guinea', 'region'=>'Southeast Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 90, 'country'=> 'Denmark','slug'=>'denmark', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 91, 'country'=> 'SA Regional','slug'=>'sa-regional', 'region'=>'South Asia','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 93, 'country'=> 'Djibouti','slug'=>'djibouti', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 94, 'country'=> 'France','slug'=>'france', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 95, 'country'=> 'Australia','slug'=>'australia', 'region'=>'Global','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 96, 'country'=> 'Gambia', 'slug'=>'gambia','region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 97, 'country'=> 'Zimbabwe','slug'=>'zimbabwe', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

            ['id'=> 102, 'country'=> 'Nigeria','slug'=>'nigeria', 'region'=>'Sub-Saharan Africa','created_at'=>new Datetime, 'updated_at'=> new Datetime],

        );

        // Uncomment the below to run the seeder
        DB::table('countries')->insert($countries);
    }

}