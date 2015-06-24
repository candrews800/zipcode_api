<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class RouteTest extends TestCase {

    use WithoutMiddleware;

    public function testGet()
    {
        $url = '/get/33024';

        $response = $this->call('GET', $url);
        $this->assertEquals(200, $response->status());
        $this->assertRegExp('/"data":/', $response->getContent());


        $this->visit($url)
            ->seeJson(['zipcode' => 33024]);
    }

    /**
     * @depends testGet
     */
    public function testGetWithInvalid(){
        $response = $this->call('GET', '/get/33024123');

        $this->assertEquals(404, $response->status());
        $this->assertRegExp('/"error":/', $response->getContent());
    }

    /**
     * @depends testGet
     */
    public function testGetWithNearby(){
        $url = '/get/33024?embed=near:15';

        $this->visit($url)
            ->seeJson(['zipcode' => 33328]);
    }


    public function testNearby(){
        $url = '/near/33024/15';

        $response = $this->call('GET', $url);
        $this->assertEquals(200, $response->status());
        $this->assertRegExp('/"data":/', $response->getContent());

        $this->visit($url)
            ->see(33328);
    }

    /**
     * @depends testNearby
     */
    public function testNearbyWithDetails(){
        $url = '/near/33024/15?details=true';

        $this->visit($url)
            ->seeJson(['city' => 'FORT LAUDERDALE']);
    }


    public function testLocationSearch(){
        $url = '/find/Hollywood, FL';

        $response = $this->call('GET', $url);
        $this->assertEquals(200, $response->status());
        $this->assertRegExp('/"data":/', $response->getContent());

        $this->visit($url)
            ->see(33024);
    }

    /**
     * @depends testLocationSearch
     */
    public function testLocationSearchWithInvalid(){
        $url = '/find/this wont be found';

        $response = $this->call('GET', $url);
        $this->assertEquals(404, $response->status());
        $this->assertRegExp('/"error":/', $response->getContent());
    }

}
