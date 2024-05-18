<?php

namespace Command;

use Discord\Builders\MessageBuilder;
use Discord\Parts\Embed\Embed;
use Discord\Parts\Interactions\Interaction;

final class TicketMessage extends Command
{
    public function __Action(Interaction $interaction)
    {
        $discord = $this->discord;
        $message = MessageBuilder::new()
            ->setContent("Sent the message to the channel");
        $embed = new Embed($discord);
        $embed->setDescription("Click the button below to open a new ticket!");
        $embed->setAuthor("New Ticket");
        $embed->setFooter("TheAspectDev | PHP->Journey");
        $interaction->channel->sendEmbed($embed);
        return $interaction->respondWithMessage($message, true);
    }

    public function Action()
    {
        return function (Interaction $interaction) {
            $this->__Action($interaction);
        };
    }
}
