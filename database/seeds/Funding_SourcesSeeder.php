<?php
/**
 * Created by PhpStorm.
 * User: Lisa
 * Date: 6/5/2015
 * Time: 11:13 AM
 */

use Illuminate\Database\Seeder;


class Funding_SourcesTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('funding_sources')->delete();

        $funding_sources= array(
            ['id'=> 1, 'fiscal_year'=> '10', 'type_of_funding'=>'program', 'slug'=>'fy10-program', 'funded'=>'2420038.00','spent'=>'2329035.00','obligated'=>'165660.00','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 2, 'fiscal_year'=> '10', 'type_of_funding'=>'impact', 'slug'=>'fy10-impact', 'funded'=>'4140348.00','spent'=>'3387850.00','obligated'=>'478337.00','impact_fee'=>'213554.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 3, 'fiscal_year'=> '11', 'type_of_funding'=>'program', 'slug'=>'fy11-program', 'funded'=>'3021574.00','spent'=>'2358513.00','obligated'=>'495118.00','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 4, 'fiscal_year'=> '11', 'type_of_funding'=>'impact', 'slug'=>'fy11-impact', 'funded'=>'4724824.00','spent'=>'2896401.00','obligated'=>'1269713.00','impact_fee'=>'433848.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 5, 'fiscal_year'=> '12', 'type_of_funding'=>'program', 'slug'=>'fy12-program', 'funded'=>'698993.00','spent'=>'513113.00','obligated'=>'145700.00','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 6, 'fiscal_year'=> '12', 'type_of_funding'=>'impact', 'slug'=>'fy12-impact', 'funded'=>'3687108.00','spent'=>'2332111.00','obligated'=>'907334.00','impact_fee'=>'388402.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 7, 'fiscal_year'=> '12-Iraq', 'type_of_funding'=>'program', 'slug'=>'fy12-Iraq-program', 'funded'=>'963072.00','spent'=>'207543.00','obligated'=>'653682.00','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 8, 'fiscal_year'=> '12-Iraq', 'type_of_funding'=>'impact', 'slug'=>'fy12-Iraq-impact', 'funded'=>'286318.00','spent'=>'46078.00','obligated'=>'203226.00','impact_fee'=>'30677.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 9, 'fiscal_year'=> '13', 'type_of_funding'=>'program', 'slug'=>'fy13-program', 'funded'=>'4042370.00','spent'=>'839569.00','obligated'=>'645545.00','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 10, 'fiscal_year'=> '13', 'type_of_funding'=>'impact', 'slug'=>'fy13-impact', 'funded'=>'4133055.00','spent'=>'949071.00','obligated'=>'866268.00','impact_fee'=>'539094.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 11, 'fiscal_year'=> '14', 'type_of_funding'=>'program', 'slug'=>'fy14-program', 'funded'=>'6961945.00','spent'=>'173164.00','obligated'=>'328547','impact_fee'=>NULL,'created_at'=>new Datetime, 'updated_at'=> new Datetime],
            ['id'=> 12, 'fiscal_year'=> '14', 'type_of_funding'=>'impact', 'slug'=>'fy14-impact', 'funded'=>'7524993.00','spent'=>'305440.00','obligated'=>'983153.00','impact_fee'=>'938664.00','created_at'=>new Datetime, 'updated_at'=> new Datetime],
        );

        // Uncomment the below to run the seeder
        DB::table('funding_sources')->insert($funding_sources);
    }

}