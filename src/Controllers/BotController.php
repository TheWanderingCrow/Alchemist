<?php
namespace Crow\Alchemist\Controllers;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class BotController {
  private $bot;
  private $logger;

  /**
  * @param string $token Discord Token
  */
  function __construct(string $token) {
    $this->logger = new Logger('BotController Log');
    $this->logger->pushHandler(new StreamHandler('logs/bot.log', Level::Info));
    $this->bot = new Discord([
      'token' => $token,
      'intents' => Intents::getDefaultIntents()
    ]);

    $this->bot->on('init', function (Discord $discord) {
      $this->logger->info("{$this->bot->username} is ready!");
    });

    $this->bot->run();
  }
}
