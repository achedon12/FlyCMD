<?php

namespace achedon12\flyCMD;

use achedon12\flyCMD\Commands\flyCMD;
use pocketmine\plugin\PluginBase;

class Fly extends PluginBase{

    protected function onEnable() : void{
        $this->getServer()->getCommandMap()->registerAll('Commands',[
           new flyCMD("fly","fly","/fly")
        ]);
        $this->getLogger()->info("FlyCMD enable");
    }

    protected function onDisable() : void{
        $this->getLogger()->info("FlyCMD disable");
    }
}