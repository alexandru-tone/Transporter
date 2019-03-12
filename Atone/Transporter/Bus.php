<?php

namespace Atone\Transporter;


class Bus extends AbstractTransport
{
    public function explain()
    {
        echo sprintf("Take the airport bus from %s to %s. No seat assignment. \n",
            $this->departure,
            $this->arrival);
    }
}