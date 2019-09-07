<?php

namespace bbo51dog\tax;

use pocketmine\Server;
use pocketmine\scheduler\Task;
use onebone\economyapi\EconomyAPI;

class TaxTask extends Task{

    /** @var int */
    private $amount;

    /** @var int */
    private $min;

    /** @var string[] */
    private $time;

    /**
     * @param int $amount
     * @param int $min
     * @param string[] $time
     */
    public function __construct(int $amount, int $min, array $time){
        $this->amount = $amount;
        $this->min = $min;
        $this->time = $time;
    }

    public function onRun(int $tick){
        if(!in_array(date("H:i"), $this->time)){
            return;
        }
        $eco = EconomyAPI::getInstance();
        foreach($eco->getAllMoney() as $name => $money){
            if($this->min > $money){
                continue;
            }
            $eco->reduceMoney($name, $this->amount);
        }
        $search = ["%min", "%amount", "%unit"];
        $replace = [$this->min, $this->amount, $eco->getMonetaryUnit()];
        $message = str_replace($search, $replace, Main::COLLECT_TAX_MESSAGE);
        Server::getInstance()->broadcastMessage($message);
    }
}