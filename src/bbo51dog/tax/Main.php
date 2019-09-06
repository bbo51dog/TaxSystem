<?php

namespace bbo51dog\tax;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
    public function onEnable(){
        $this->saveResource("Config.yml");
        $this->saveResource("Text.yml");
        $config = new Config($this->getDataFolder()."Config.yml", Config::YAML);
        $text = new Config($this->getDataFolder()."Text.yml", Config::YAML);
        $this->getScheduler()->scheduleRepeatingTask(new TaxTask(), 1200);
    }
}