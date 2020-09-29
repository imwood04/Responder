<?php
declare(strict_types=1);

namespace Imwood04\Respond;

use Imwood04\Respond\Commands\responder;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    /**
     * @var Main
     */
    private static $instance;

    public $prefix = "§bResponder §4=> §r";

    public $command = [];

    public function onEnable() {
        self::$instance = $this;
    }

    public static function getInstance() {
        return self::$instance;
    }

    public function onCommands(){
        $this->getServer()->getCommandMap()->register('responder', new responder());
    }

}