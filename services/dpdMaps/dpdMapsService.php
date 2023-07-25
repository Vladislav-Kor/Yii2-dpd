<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 14:38
*/
declare(strict_types=1);

namespace app\services\dpdMaps;

use app\entities\dpdMaps\DpdMapsCity;
use app\entities\dpdMaps\DpdMapsCityCode;
use app\entities\dpdMaps\DpdMapsCityName;
use app\entities\dpdMaps\DpdMapsLatitude;
use app\entities\dpdMaps\DpdMapsLongitude;
use app\repositories\dpdMaps\CityRepository;
use app\repositories\dpdMaps\DpdMapsCityRepository;
use app\repositories\NotFoundException;

final class dpdMapsService
{
    /**
     * @var CityRepository
     */
    private $cityRepo;
    /**
     * @var DpdMapsCityRepository
     */
    private $mapsRepo;

    public function __construct(CityRepository $cityRepo, DpdMapsCityRepository $mapsRepo)
    {
        $this->cityRepo = $cityRepo;
        $this->mapsRepo = $mapsRepo;
    }

    /**
     * changeName.
     *
     * @param DpdMapsCityName|string $name
     */
    public function findCity($name): void
    {
        if ($name instanceof DpdMapsCityName) {
            $this->mapsRepo->findCity($name->getValue());
        } else {
            $this->mapsRepo->findCity($name);
        }
    }

    /**
     * getCityByCode.
     *
     * @param DpdMapsCityCode|int $code
     */
    public function getCityByCode($code): DpdMapsCity
    {
        if ($code instanceof DpdMapsCityCode) {
            return $this->cityRepo->getCityById($code);
        }

        return $this->cityRepo->getCityById(new DpdMapsCityCode($code));
    }
}
