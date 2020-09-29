<?php

namespace Imwood04\Commands;

use Imwood04\Main;
use pocketmine\level\Position;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class TpAll extends Command
{

    private $main;

    public function __construct(Main $main)
    {
        parent::__construct("tpall");
        $this->setPermission("imwood04.tpall");
        $this->setDescription("TpAll");
        $this->setPermissionMessage("§bYou do not have Permission to use this Command");
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
                    foreach ($this->getServer()->getOnlinePlayers() as $echo) {
                        $echo->teleport($sender);
                        $echo->sendMessage($this->main->prefix . "§aTping All...");
                    }

                }
            }
        }
    }
}