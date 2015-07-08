<?php
require(__DIR__.'/../vendor/autoload.php');

$html = <<<'HTML'
<html>
  <body>
    <ul>
      <li>one</li>
      <li>two</li>
      <li>three</li>
    </ul>
  </body>
</html>
HTML;

$document = new FluentDOM\Document();
$document->loadHTML($html);

foreach ($document->querySelectorAll('li') as $li) {
  var_dump((string)$li);
}

var_dump(
  $document->querySelector('ul li:nth-child(2)')->textContent
);
