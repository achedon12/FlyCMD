<?php

namespace achedon12\flyCMD\Commands;

use achedon12\flyCMD\Fly;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

class flyCMD extends Command implements PluginOwned {

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("use.fly")){
                if($sender->isFlying()){
                    $sender->setFlying(false);
                    $sender->setAllowFlight(false);
                }else{
                    $sender->setFlying(true);
                    $sender->setAllowFlight(true);
                }

            }else{
                $sender->sendMessage("You don't have the permission to use this command");
            }
        }else{
            $sender->sendMessage("Please run this command in game");
        }
    }

    public function getOwningPlugin() : Plugin{
        return Fly::getInstance();
    }
}