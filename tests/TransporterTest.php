<?php

use Atone\Transporter\Transporter;

class TransporterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Transporter
     */
    protected $transporter;

    public function setUp(){
        $this->transporter = new Atone\Transporter\Transporter('./transports.json');
    }

    public function testSort()
    {
        ob_start();
        $this->transporter->dispatch();
        $message = ob_get_clean();
        $this->assertTrue(strlen($message) > 0);
        $this->assertContains('airport bus', strtolower($message));
    }
}
