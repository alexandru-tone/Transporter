<?php

use Atone\Transporter\Plane;

class PlaneTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Plane
     */
    protected $plane;

    protected $trip = [
        "departure"         => "Gerona Airport",
        "arrival"           => "Stockholm",
        "Transportation"    => "Plane"
    ];

    protected $extraInfo = [
        "Transportation_number" => "SK455",
          "Seat" => "3A",
          "Gate" => "45B",
          "Baggage" => "344"
    ];

    public function setUp(){
        $this->plane = new Plane($this->trip['departure'], $this->trip['arrival'], $this->extraInfo);
    }

    public function testGetExplanation()
    {
        $message = $this->plane->getExplanation();
        $this->assertTrue(strlen($message) > 0);
        $this->assertContains('take flight', strtolower($message));
        if (isset($this->extraInfo['Baggage'])) {
            $this->assertContains('baggage drop', strtolower($message));
        }
    }
}
