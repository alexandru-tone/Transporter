<?php

namespace Atone\Transporter;


abstract class AbstractTransport implements TransportInterface
{
    const DEPARTURE             = "departure",
        ARRIVAL                 = "arrival",
        TRANSP          = "Transportation",
        TRANSP_NUM   = "Transportation_number",
        SEAT                    = "Seat",
        GATE                    = "Gate",
        BAGGAGE                 = "Baggage";

    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    /**
     * AbstractTransport constructor.
     * @param string $departure
     * @param string $arrival
     */
    public function __construct(string $departure, string $arrival)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
    }

}