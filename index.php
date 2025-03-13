<?php

include __DIR__.'/vendor/autoload.php';

$alchemist_token = $_ENV["DISCORD_TOKEN"];
$alchemist = new Crow\Alchemist\Controllers\BotController($alchemist_token);
