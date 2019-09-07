<?php

namespace bbo51dog\tax\task;

use pocketmine\scheduler\Task;

class TaxTask extends Task{

    /** @var int */
    private $amount;

    /** @var int */
    private $miin;

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
    
    }
}