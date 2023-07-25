<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 15:28
*/
declare(strict_types=1);

namespace app\repositories\dpdMaps;

use app\dto\dpdMaps\DpdMapsTerminalDto;
use app\entities\dpdMaps\DpdMapsCityCode;
use app\entities\dpdMaps\DpdMapsHeight;
use app\entities\dpdMaps\DpdMapsJson;
use app\entities\dpdMaps\DpdMapsLatitude;
use app\entities\dpdMaps\DpdMapsLength;
use app\entities\dpdMaps\DpdMapsLongitude;
use app\entities\dpdMaps\DpdMapsParcelShopType;
use app\entities\dpdMaps\DpdMapsState;
use app\entities\dpdMaps\DpdMapsTerminal;
use app\entities\dpdMaps\DpdMapsTerminalAddress;
use app\entities\dpdMaps\DpdMapsTerminalDescription;
use app\entities\dpdMaps\DpdMapsTerminalId;
use app\entities\dpdMaps\DpdMapsTerminalName;
use app\entities\dpdMaps\DpdMapsWidth;
use app\entities\dpdMaps\DpdMapsWorkTime;
use app\entities\product\ProductHeightBox;
use app\entities\product\ProductLengthBox;
use app\entities\product\ProductWidthBox;
use app\repositories\Hydrator;
use app\repositories\NotFoundException;

class TerminalRepository
{
    /**
     * @var Hydrator
     */
    private $hydrator;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }
    public function getTerminalById(DpdMapsTerminalId $id): DpdMapsTerminal
    {
        $result = \Yii::$app->db->createCommand('SELECT * FROM `dpd_maps_terminal` WHERE `id`=:id')
            ->bindValue(':id', $id->getValue())
            ->queryOne();

        if (!$result) {
            throw new NotFoundException('Нет такого терминала');
        }

        $dto = new DpdMapsTerminalDto();
        $dto->load($result);

        return $this->hydrator->hydrate(DpdMapsTerminal::class, [
            'address' => new DpdMapsTerminalAddress($dto->address),
            'cityCode' => new DpdMapsCityCode($dto->cityCode),
            'description' => new DpdMapsTerminalDescription($dto->description),
            'height' => new DpdMapsHeight($dto->height),
            'id' => new DpdMapsTerminalId($dto->id),
            'length' => new DpdMapsLength($dto->length),
            'name' => new DpdMapsTerminalName($dto->name),
            'parcelShopType' => new DpdMapsParcelShopType($dto->parcelShopType),
            'state' => new DpdMapsState($dto->state),
            'width' => new DpdMapsWidth($dto->width),
            'workTime' => new DpdMapsWorkTime($dto->workTime),
        ]);
    }

}
