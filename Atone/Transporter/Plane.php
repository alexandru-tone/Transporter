<?php

namespace Atone\Transporter;


class Plane extends AbstractSeatedTransport
{
    /**
     * @var string
     */
    private $gate;

    /**
     * @var string
     */
    private $baggage;

    /**
     * Plane constructor.
     * @param string $departure
     * @param string $arrival
     * @param array $extraInfo
     */
    public function __construct(string $departure, string $arrival, array $extraInfo)
    {
        parent::__construct($departure, $arrival, $extraInfo);
        $this->gate = isset($extraInfo[AbstractTransport::GATE]) ? $extraInfo[AbstractTransport::GATE] : '';
        $this->baggage = isset($extraInfo[AbstractTransport::BAGGAGE]) ? $extraInfo[AbstractTransport::BAGGAGE] : '';
    }

    public function explain()
    {
        $explanation = sprintf("From %s take flight %s to %s. Gate %s, seat %s. Baggage will we automatically transferred from your last leg. ",
            $this->departure,
            $this->transportationNumber,
            $this->arrival,
            $this->gate,
            $this->seat
        );
        if (strlen($this->baggage)) {
            $explanation = sprintf("%s Baggage drop at ticket counter %s.", $explanation,$this->baggage);
        }
        echo $explanation . "\n";
    }
}