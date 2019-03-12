<?php

namespace Atone\Transporter;


abstract class AbstractSeatedTransport extends AbstractTransport
{
    /**
     * @var string
     */
    protected $transportationNumber;

    /**
     * @var string
     */
    protected $seat;

    /**
     * AbstractSeatedTransport constructor.
     * @param string $departure
     * @param string $arrival
     * @param array $extraInfo
     */
    public function __construct(string $departure, string $arrival, array $extraInfo)
    {
        parent::__construct($departure, $arrival);
        $this->transportationNumber = isset($extraInfo[AbstractTransport::TRANSP_NUM])
            ? $extraInfo[AbstractTransport::TRANSP_NUM]
            : '';
        $this->seat = isset($extraInfo[AbstractTransport::SEAT]) ? $extraInfo[AbstractTransport::SEAT] : '';
    }
}