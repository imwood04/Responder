<?php

declare(strict_types=1);

namespace Imwood04\Responder;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\Listener;

class main extends PluginBase implements Listener {
    public function onEnable(){
        $this->getLogger()->info("Respond Enabled!");

    }
    public function onDisable(){
        $this->getLogger()->info("Respond Disabled!");
    }
    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
        switch ($cmd->getName()){
            case "respond";
             $sender->sendMessage("test works!");
             if($sender instanceof Player){
                 $sender->sendMeassge("Command Works");
             } else {
             $sender->sendMessage("Command sent in Console");
        }
    return true;
    }
}