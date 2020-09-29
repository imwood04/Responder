<?php
declare(strict_types=1);
namespace Imwood04\Responder;

use imwood04\Respond\responses\fly;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class re extends PluginBase
{

    private static $instance;

    public function onEnable() {
        self::$instance = $this;
    }

    public static function getInstance() {
        return self::$instance;
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool{
        $respond = $command->getName();
        if ($respond === "respond") {
            $sender->sendMessage("Hi!");
            return true;
        }
        return false;
    }

    public function onCommands()
    {
        $this->getServer()->getCommandMap()->register('fly', new fly($this));

    }
}