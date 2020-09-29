<?php
declare(strict_types=1);

namespace Imwood04;

use Imwood04\Commands\Responder;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public $prefix = "§bResponder §4=> §r";

    public $command = [];

    public function onLoad()
    {
        $this->getLogger()->info("§ePlugin Loading....");
    }

    public function onEnable()
    {
        $this->getLogger()->info("§aPlugin Enabled!");
        $this->onCommands();
    }

    public function onCommands()
    {
        $this->getServer()->getCommandMap()->register('fly', new Responder($this));
    }

    public function onDisable()
    {
        $this->getLogger()->info("§cPlugin Disabled");
    }

}