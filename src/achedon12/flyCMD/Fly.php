<?php

namespace achedon12\flyCMD;

use achedon12\flyCMD\Commands\flyCMD;
use pocketmine\event\Listener;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;
use pocketmine\plugin\PluginBase;

class Fly extends PluginBase implements Listener {

    private static Fly $instance;

    protected function onEnable() : void{
        $this->getServer()->getCommandMap()->registerAll('Commands',[
           new flyCMD("fly","fly","/fly")
        ]);
        $this->getLogger()->info("FlyCMD enable");

        self::$instance = $this;

        PermissionManager::getInstance()->addPermission(new Permission("use.fly","fly permission"));
    }

    protected function onDisable() : void{
        $this->getLogger()->info("FlyCMD disable");
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }
}