<?php

declare(strict_types=1);

namespace Responder;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class Broadcast extends Task{

    /** @var Server */
    private $server;

    public function __construct(Server $server){
        $this->server = $server;
    }

    public function onRun(int $currentTick) : void{
        $this->server->broadcastMessage("[Responder] I've run on tick " . $currentTick);
    }
}