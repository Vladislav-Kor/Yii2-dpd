<?php
/**
 * @author Vladislav
 *
 * @email corchagin.vlad2005@yandex.ru
 *
 * @create date 2022-08-11 10:14:38
 *
 * @modify date 2022-08-11 10:14:38
 *
 * @desc [description]
 */

declare(strict_types=1);

namespace app\repositories\dpdMaps;

use app\dto\dpdMaps\DpdMapsDto;
use app\entities\dpdMaps\DpdMapsCityBase;
use app\entities\dpdMaps\DpdMapsCityCode;
use app\entities\dpdMaps\DpdMapsCityName;
use app\entities\dpdMaps\DpdMapsRegionName;
use app\repositories\Hydrator;

class DpdMapsCityRepository
{
    /**
     * @var Hydrator
     */
    private $hydrator;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }


    /**
     * Определение города по его имени
     */
    public function findCity(string $request): array
    {
        $mass = \Yii::$app->cache->get('cities');
        if (!$mass) {
            $arRequest = [];
            $city = [];
            // делаем функцию по поиску ключа города в DPD передавая город
            $client = new \SoapClient(\Yii::$app->params['dpd_server'].'geography2?wsdl');
            $city['auth'] = [
                'clientNumber' => \Yii::$app->params['dpd_login'],
                'clientKey' => \Yii::$app->params['dpd_key'],
            ];
            $arRequest['request'] = $city; // помещаем наш масив авторизации в масив запроса request
            $ret = $client->getCitiesCashPay($arRequest); // обращаемся к функции getCitiesCashPay  и получаем список городов
            // функция отвечает за преобразования объекта в масив
            $mass = $this->stdToArray($ret); // вызываем эту самую функцию для того чтобы можно было перебрать масив
            \Yii::$app->cache->set('cities', $mass, 82000);
        }
        $res = [];
        foreach ($mass as $list) {
            foreach ($list as $item) {
                if (preg_match('!^'.mb_strtolower($request).'!', mb_strtolower($item['cityName']))) {
                    $tmp = [];
                    $tmp['id'] = (int) $item['cityId'];
                    $tmp['name'] = $item['countryName'].' / '.$item['regionName'].' / '.$item['abbreviation'].' '.$item['cityName'];
                    $res[] = $tmp;
                }
            }
        }

        return $res;
    }
    
    /**
     * функция отвечает за преобразования объекта в масив
     *
     * @param $obj $obj [explicite description]
     *
     * @return void
     */
    function stdToArray($obj)
    {
        $rc = (array) $obj;
        foreach ($rc as $key => $item) {
            $rc[$key] = (array) $item;
            foreach ($rc[$key] as $keys => $items) {
                $rc[$key][$keys] = (array) $items;
            }
        }

        return $rc;
    }
}
