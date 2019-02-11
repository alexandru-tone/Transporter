<?php

namespace Atone\Transporter;


abstract class AbstractTransport implements TransportInterface
{
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