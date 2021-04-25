<?php
require __DIR__.'/../vendor/autoload.php';

$html = <<<'HTML'
<html>
  <body>
    <a href="#example">Example</a>
    <p>
      <a href="#example-2">Example <i>2</i></a>
    </p>
  </body>
</html>
HTML;
$links = [];

$document = FluentDOM::load($html, 'text/html');
foreach ($document->querySelectorAll('a[href]') as $a) {
  $links[] = [
    'caption' => (string)$a,
    'href' => $a['href']
  ];
}

var_dump($links);
