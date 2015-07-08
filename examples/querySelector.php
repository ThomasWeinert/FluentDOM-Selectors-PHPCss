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

echo 'Iterate over list items:', "\n";
foreach ($document->querySelectorAll('li') as $li) {
  var_dump((string)$li);
}

echo 'Fetch second list item in an ul:', "\n";
var_dump(
  $document->querySelector('ul li:nth-child(2)')->textContent
);

/*
Expected Output:

Iterate over list items:
string(3) "one"
string(3) "two"
string(5) "three"
Fetch second list item in an ul:
string(3) "two"
*/