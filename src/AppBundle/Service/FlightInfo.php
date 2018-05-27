<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 27/05/18
 * Time: 13:05
 */

namespace AppBundle\Service;


class FlightInfo
{
    /**
     * @var string
     */
    private $_unit;

    /**
     * FlightInfo constructor.
     * @param string $_unit
     */
    public function __construct($_unit)
    {
        $this->_unit = $_unit;
    }

    /**
     * Distance calculation between latitude/longitude based on Harnive's formula
     * http://www.codecodex.com/wiki/Calculate_Distance_Between_Two_Points_on_a_Globe#PHP
     *
     * @param float $latitudeFrom  Departure
     * @param float $longitudeFrom Departure
     * @param float $latitudeTo    Arrival
     * @param float $longitudeTo   Arrival
     *
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this->_unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }

        return $d;
    }

    public function getTime()
    {


    }
}