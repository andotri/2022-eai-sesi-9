<?php

require ('vendor/autoload.php');

use Goutte\Client;

$client = new Client();

// Static extraction
$url = 'https://scele.cs.ui.ac.id/';
$crawler = $client->request('GET', $url);

$response = $crawler->filterXPath('//*[@id="site-news-forum"]/h2');
echo "Contoh static extraction: $url<br>";
echo $response->text();
echo '<br>';
echo '<br>';

// Dynamic extraction
$url = 'https://symfony.com/blog/';
$crawler = $client->request('GET', $url);

$crawler->filter('h2 > a')->each(function ($node) {
    echo $node->text() . '<br>';
});
