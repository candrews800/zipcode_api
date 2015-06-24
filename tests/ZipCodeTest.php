<?php

class ZipCodeTest extends TestCase {

    public function testGetNearbyZipcodes()
    {
        $zip = App\Zipcode::get(33024);

        $this->assertEquals($zip->city, 'Hollywood');
    }

    public function testSearchZipcodes(){
        $zips = App\Zipcode::search('Hollywood, FL');

        $foundZip = false;

        foreach($zips as $zip){
            if($zip->zipcode == 33024){
                $foundZip = true;
            }
        }

        $this->assertTrue($foundZip);
    }

    public function testNearbyZipcodes(){
        $zip = App\Zipcode::get(33024);
        $nearbyZips = $zip->getNearbyZipcodes(25);

        $this->assertContains(33328, $nearbyZips);

    }

}
