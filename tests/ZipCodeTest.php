<?php

class ZipCodeTest extends TestCase {

    public function testGetZipcode()
    {
        $zip = App\Zipcode::get(33024);
        $this->assertEquals(ucfirst(strtolower($zip->city)), 'Hollywood');
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

    public function testDistanceBetweenZipcodes(){
        $distance = App\Zipcode::distance(33024, 33328);

        $this->assertGreaterThan(5, $distance);
        $this->assertLessThan(10, $distance);
    }

}
