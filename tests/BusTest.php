<?php

use Atone\Transporter\Bus;

class BusTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Bus
     */
    protected $bus;

    protected $trip = [
        "departure"         => "Barcelona",
        "arrival"           => "Gerona Airport",
        "Transportation"    => "Bus"
    ];

    public function setUp(){
        $this->bus = new Bus($this->trip['departure'], $this->trip['arrival']);
    }

    public function testGetMessage()
    {
        $message = $this->bus->getExplanation();
        $this->assertTrue(strlen($message) > 0);
    }
}
