<?php

namespace Imwood04\Responder;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase{
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
                 $sender->sendMessage("Command Works");
             } else {
                 $sender->sendMessage("Command sent in Console");
             }
        }
    return true;
    }
}