<?php
include __DIR__.'/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$alchemist_token = $_ENV["DISCORD_TOKEN"];
$alchemist = new Crow\Alchemist\Controllers\BotController($alchemist_token);
