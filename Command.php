<?php

namespace Command;

use Discord\Discord;
use Discord\Parts\Interactions\Interaction;

abstract class Command
{
    protected $discord;

    public function __construct(Discord $discord)
    {
        $this->discord = $discord;
    }
    public static function new(Discord $discord): self
    {
        return new static($discord);
    }
    public abstract function __Action(Interaction $interaction);
    public abstract function Action();
}
