<?php

namespace Imwood04;

use Imwood04\Commands\Fly;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public $prefix = "§bResponder §4» §f";

    public $command = [];

    public function onLoad()
    {
        $this->getLogger()->info("§ePlugin Loading....");
    }

    public function onEnable()
    {
        $this->getLogger()->info("§aPlugin Activated!");
        $this->onCommands();
    }

    public function onCommands()
    {
        $this->getServer()->getCommandMap()->register('fly', new Fly($this));
    }

    public function onDisable()
    {
        $this->getLogger()->info("§cPlugin Disabled!");
    }

}