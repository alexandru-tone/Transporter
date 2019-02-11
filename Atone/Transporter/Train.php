<?php

namespace Atone\Transporter;


class Train extends AbstractSeatedTransport
{
    public function explain()
    {
        echo $this->getExplanation();
    }

    public function getExplanation()
    {
        $explanation = sprintf("Take train %s from %s to %s. Sit in %s. \n",
            $this->transportationNumber,
            $this->departure,
            $this->arrival,
            $this->seat);
        return $explanation;
    }
}