<?php

namespace Imwood04\Commands;

use Imwood04\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Fly extends Command {

    private $main;

    public function __construct(Main $main) {
        parent::__construct("fly");
        $this->setPermission("imwood04.fly");
        $this->setDescription("Toggles Flying");
        $this->setPermissionMessage( "§bYou do not have Permission to use this Command");
        $this->main = $main;
    }


    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (!$this->testPermission($sender)) return;
            if (empty($args[0])) {
                $name = $sender->getName();
                if (!in_array($name, $this->main->command)) {
                    $this->main->command[] = $name;
                    $sender->sendMessage($this->main->prefix . "§aFlying Enabled");
                    $sender->setAllowFlight(true);
                } else {
                    unset($this->main->command[array_search($name, $this->main->command)]);
                    $player = $sender->getPlayer();
                    $sender->sendMessage($this->main->prefix . "§cFlying Disabled");
                    $sender->setAllowFlight(false);
                    $sender->setFlying(false);
                }
            }
        }
    }
}