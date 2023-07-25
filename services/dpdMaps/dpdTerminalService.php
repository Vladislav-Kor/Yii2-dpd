<?php
/*
 * @author hexman84 <hexman@live.ru>
 * Date: 12.08.2022
 * Time: 18:03
*/
declare(strict_types=1);

namespace app\services\dpdMaps;

use app\dto\dpdMaps\DpdMapsTerminalDto;
use app\entities\dpdMaps\DpdMapsTerminal;
use app\entities\dpdMaps\DpdMapsTerminalId;
use app\entities\product\ProductHeightBox;
use app\entities\product\ProductLengthBox;
use app\entities\product\ProductWidthBox;
use app\repositories\dpdMaps\DpdMapsTerminalRepository;
use app\repositories\dpdMaps\TerminalRepository;

final class dpdTerminalService
{
    /**
     * @var DpdMapsTerminalRepository
     */
    private $dpdTerminalRepo;
    /**
     * @var TerminalRepository
     */
    private $terminalRepo;

    /**
     * __construct.
     */
    public function __construct(TerminalRepository $terminalRepo, DpdMapsTerminalRepository $dpdTerminalRepo)
    {
        $this->dpdTerminalRepo = $dpdTerminalRepo;
        $this->terminalRepo = $terminalRepo;
    }

    /**
     * getTerminalById.
     *
     * @param DpdMapsTerminalId|int $id
     */
    public function getTerminalById($id): DpdMapsTerminal
    {
        if ($id instanceof DpdMapsTerminalId) {
            return $this->terminalRepo->getTerminalById($id);
        }

        return $this->terminalRepo->getTerminalById(new DpdMapsTerminalId($id));
    }

}
