<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 14:38
*/
declare(strict_types=1);

namespace app\services\dpdMaps;

use PriceRepository;
use app\entities\dpdMaps\DpdMapsCityCode;

final class PriceService
{
    /**
     * @var PriceRepository
     */
    private $repo;

    public function __construct(PriceRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * getPrice.
     *
     * @param DpdMapsCityCode|int    $cityid
     * @param float|ProductWeightBox $weight
     *
     * @throws \SoapFault
     */
    public function getPrice($cityid,$weight): DeliverySum
    {
        // Делаю проверку передоваемых значений и отправляю их
        if ($cityid instanceof DpdMapsCityCode) {
            if ($weight instanceof ProductWeightBox) {
                return $this->repo->getPrice(
                    $cityid,
                    \Yii::$app->params['dpd_login'],
                    \Yii::$app->params['dpd_key'],
                    $weight
                );
            }

            return $this->repo->getPrice(
                $cityid,
                \Yii::$app->params['dpd_login'],
                \Yii::$app->params['dpd_key'],
                new ProductWeightBox($weight)
            );
        }

        if ($weight instanceof ProductWeightBox) {
            return $this->repo->getPrice(
                new DpdMapsCityCode($cityid),
                \Yii::$app->params['dpd_login'],
                \Yii::$app->params['dpd_key'],
                $weight
            );
        }

        return $this->repo->getPrice(
            new DpdMapsCityCode($cityid),
            \Yii::$app->params['dpd_login'],
            \Yii::$app->params['dpd_key'],
            new ProductWeightBox($weight)
        );
    }

}