<?php

namespace bbo51dog\tax\task;

use pocketmine\Server;
use pocketmine\scheduler\Task;
use onebone\economyapi\EconomyAPI;

class TaxTask extends Task{

    /** @var int */
    private $amount;

    /** @var int */
    private $min;

    /** @var int[] */
    private $time;

    /**
     * @param int $amount
     * @param int $min
     * @param int[] $time
     */
    public function __construct(int $amount, int $min, array $time){
        $this->amount = $amount;
        $this->min = $min;
        $this->time = $time;
    }

    public function onRun(int $tick){
        if(!in_array(date("Hi"), $this->time)){
            return;
        }
        $eco = EconomyAPI::getInstance();
        foreach($eco->getAllMoney() as $name => $money){
            if($this->min > $money){
                return;
            }
            $eco->reduceMoney($name, $this->amount);
            Server::getInstance()->broadcastMessage(Main::COLLECT_TAX_MESSAGE);
        }
    }
}