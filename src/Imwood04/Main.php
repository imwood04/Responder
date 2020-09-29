<?php

namespace Imwood04;

use Imwood04\Commands\Fly;
use Imwood04\Commands\TpAll;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    public $prefix = "§bResponder §4» §f";

    public $command = [];

    public function onLoad() {
        $this->getLogger()->info("§ePlugin Loading....");
    }

    public function onEnable()
    {
        $this->getLogger()->info("§aPlugin Activated!");
        $this->onCommands();
    }

    public function onDisable()
    {
        $this->getLogger()->info("§cPlugin Disabled!");
    }

    public function onCommands() {
        $this->getServer()->getCommandMap()->register('fly', new Fly($this));
        $this->getServer()->getCommandMap()->register('tpall', new TpAll($this));
    }

}