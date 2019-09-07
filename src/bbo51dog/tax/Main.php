<?php

namespace bbo51dog\tax;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{

    /** @var string */
    public const PREFIX = "§l§e[§bTaxSystem§e]§r";

    /** @var string */
    public const COLLECT_TAX_MESSAGE = Main::PREFIX."§a所持金%min以上のプレイヤーから税金%unit%amountを徴収しました";

    public function onEnable(){
        $this->saveResource("Config.yml");
        $config = new Config($this->getDataFolder()."Config.yml", Config::YAML);
        $config_data = $config->getAll();
        $task = new TaxTask($config_data["amount"], $config_data["min"], $config_data["time"]);
        $this->getScheduler()->scheduleRepeatingTask($task, 1200);
    }
}