<?php

namespace Imwood04\Commands;

use Imwood04\Main;
use pocketmine\Player;
use pocketmine\command;
use pocketmine\command\CommandSender;

class Responder extends command\Command {
    private $main;
    public function __construct(Main $main)
    {
        parent::__construct("fly");
        $this->setPermission("fly.command.fly");
        $this->setDescription("Fly Command");
        $this->setPermissionMessage("§bResponder §4=> §f§c§cYou do not have Perms to use this command1");
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
                    $sender->sendMessage($this->main->prefix . "§aFlight Activated");
                    $sender->setAllowFlight(true);
                } else {
                    unset($this->main->command[array_search($name, $this->main->command)]);
                    $player = $sender->getPlayer();
                    $sender->sendMessage($this->main->prefix . "§cFlying Deactivated");
                    $sender->setAllowFlight(false);
                    $sender->setFlying(false);
                }
            }
        }
    }
}