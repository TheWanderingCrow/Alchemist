<?php
namespace Crow\Alchemist\Controllers;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TriliumController {

  private string $endpoint;
  private HttpClientInterface $client;

  /**
  * @param $url string TriliumNext API Endpoint
  */
  public function __construct(string $url) {
    $this->endpoint = $url;
    $this->client = HttpClient::createForBaseUri($this->endpoint, [
      'headers' => [
        'Authorization' => $_ENV['TRILIUM_API_TOKEN']
      ]
    ]);
  }

  /**
  * @param string $note_name name of the note
  * @param string $content content to put in the note
  * @return bool true if note created successfully
  */
  public function create_note(string $note_name, string $content): bool {
    $response = $this->client->request("POST", "/create-note", [
      'json' => [
        'title' => 'Discord QuickNote: '.$note_name,
        'type' => 'text',
        'content' => $content
      ]
    ]);
  }
}
