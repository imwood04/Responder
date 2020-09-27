<?php

declare(strict_types=1);

namespace Responder;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    public function onLoad()  : void{
        $this->getLogger()->info(TextFormat::WHITE . "I've been loaded!");
    }
    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents(new ChatRespond($this), $this);
        $this->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this->getServer()), 120);
        $this->getLogger()->info(TextFormat::DARK_GREEN . "Chat Responder Enabled!");
    }
    public function onDisable() : void{
        $this->getLogger()->info(TextFormat::DARK_RED . "Chat Responder Disabled!");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch($command->getName()){
            case "Respond":
                $sender->sendMessage("This Responded to your message " . $sender->getName() . "!");

                return true;
            default:
                return false;
        }
    }
}
