<?php

include __DIR__ . '/vendor/autoload.php';

use Command\TicketMessage;
use Discord\Discord;
use Discord\Parts\Interactions\Command\Command;
use Discord\WebSockets\Intents;


$discord = new Discord([
    'token' => 'Token',
    'intents' => Intents::getDefaultIntents()
]);

$discord->on('ready', function (Discord $discord) {
    global $discord;
    echo "GET READY FOR THE FIGHT SOLDIER", PHP_EOL;

    $discord->application->commands->save(
        new Command($discord, [
            'name' => 'ticketmessage',
            'description' => 'ADMINS | Send the message for tickets',
            'default_member_permissions' => 0x00000008 // Administrator permission code;
        ])
    );

    $discord->listenCommand("ticketmessage", TicketMessage::new($discord)->Action());
});



$discord->run();
