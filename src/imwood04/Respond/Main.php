<?php
declare(strict_types=1);
namespace Imwood04\Responder;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase{

    private static $instance;

    public function onEnable() {
        self::$instance = $this;
    }

    public static function getInstance() {
        return self::$instance;
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