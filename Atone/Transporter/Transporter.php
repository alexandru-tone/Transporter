<?php

namespace Atone\Transporter;


class Transporter
{
    /**
     * @var array|mixed
     */
    private $decoded = [];

    /**
     * Transporter constructor.
     * @param $jsonFile
     */
    public function __construct($jsonFile)
    {
        $json = file_get_contents($jsonFile);
        $this->decoded = json_decode($json, true);
    }

    public function dispatch()
    {
        $sorted = $this->sort();
        $this->tell($sorted);
    }

    /**
     * @return array
     */
    private function sort()
    {
        $result = $this->getStartingAndDepartures();
        $startingPoint = $result['startingPoint'];
        $decodedDepartures = $result['decodedDepartures'];
        $firstCity = $startingPoint;
        $startingPoint = $decodedDepartures[array_shift($startingPoint)];
        $result = [];
        $result[] = $this->decoded[$startingPoint['id']];
        unset($decodedDepartures[array_shift($firstCity)]);
        while ($count = count($decodedDepartures)) {
            $result[] = $this->decoded[$decodedDepartures[$startingPoint['arrival']]['id']];
            $temp = $decodedDepartures[$startingPoint['arrival']];
            unset($decodedDepartures[$startingPoint['arrival']]);
            $startingPoint = $temp;
        }
        return $result;
    }

    /**
     * @return array
     */
    private function getStartingAndDepartures()
    {
        $result = [
            'startingPoint' => [],
            'decodedDepartures' => []
        ];
        $decodedDepartures = [];
        $decodedArrivals = [];
        $departure = AbstractTransport::DEPARTURE;
        $arrival = AbstractTransport::ARRIVAL;
        foreach($this->decoded as $key => $val) {
            $decodedDepartures[$val[$departure]]['id'] = $key;
            $decodedDepartures[$val[$departure]][$arrival] = $val[$arrival];
            $decodedArrivals[$val[$arrival]] = $val[$departure];
        }
        $startingPoint = array_diff(array_keys($decodedDepartures), array_keys($decodedArrivals));
        $result['startingPoint'] = $startingPoint;
        $result['decodedDepartures'] = $decodedDepartures;
        return $result;
    }

    /**
     * @param array $sorted
     */
    private function tell(array $sorted)
    {
        foreach ($sorted as $boardingCard) {
            $className = $boardingCard[AbstractTransport::TRANSP];
            if (!in_array($className, ['Bus', 'Plane', 'Train'])) {
                continue;
            }
            $className = "Atone\Transporter\\" . $className;
            /** @var TransportInterface $transport */
            $transport = new $className(
                $boardingCard[AbstractTransport::DEPARTURE],
                $boardingCard[AbstractTransport::ARRIVAL],
                $boardingCard);
            $transport->explain();
        }
        echo "You have arrived at your final destination. \n";
    }
}