<?php

namespace bbo51dog\tax;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
    public function onEnable(){
        $this->saveResource("Config.yml");
        $config = new Config($this->getDataFolder()."Config.yml", Config::YAML);
        $config_data = $config->getAll();
        $task = new TaxTask($config_data["amount"], $config_data["min"], $config_data["time"]);
        $this->getScheduler()->scheduleRepeatingTask($task, 1200);
    }
}