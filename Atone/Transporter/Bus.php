<?php

namespace Atone\Transporter;


class Bus extends AbstractTransport
{
    public function explain()
    {
        echo $this->getExplanation();
    }

    public function getExplanation()
    {
        $explanation =  sprintf("Take the airport bus from %s to %s. No seat assignment. \n",
            $this->departure,
            $this->arrival);
        return $explanation;
    }
}