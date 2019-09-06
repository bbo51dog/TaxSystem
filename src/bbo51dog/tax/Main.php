<?php

namespace bbo51dog\tax;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
    public function onEnable(){
        $this->saveResource(Text::CONFIG_NAME);
        $config = new Config($this->getDataFolder().Text::CONFIG_NAME, Config::YAML);
    }
}