<?php

use Atone\Transporter\Train;

class TrainTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Train
     */
    protected $train;

    protected $trip = [
        "departure"         => "Madrid",
        "arrival"           => "Barcelona",
        "Transportation"    => "Train"
    ];

    protected $extraInfo = [
        "Transportation_number" => "78A",
        "Seat" => "45B"
    ];

    public function setUp(){
        $this->train = new Train($this->trip['departure'], $this->trip['arrival'], $this->extraInfo);
    }

    public function testGetExplanation()
    {
        $message = $this->train->getExplanation();
        $this->assertTrue(strlen($message) > 0);
        $this->assertContains('take train', strtolower($message));
        if (isset($this->extraInfo['Seat'])) {
            $this->assertContains('sit in', strtolower($message));
        }
    }
}
