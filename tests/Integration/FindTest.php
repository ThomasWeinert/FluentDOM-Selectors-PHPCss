<?php

namespace FluentDOM\PhpCss {

  require_once(__DIR__.'/../../vendor/autoload.php');

  class FindTest extends \PHPUnit_Framework_TestCase {

    public function testFindSpanInPFilterByAClassAddAClass() {
      $xml =
        '<html>
          <head>
            <title>Examples: FluentDOM\QueryCss::find()</title>
          </head>
          <body>
            <p><span>Hello</span>, how are you?</p>
            <p>Me? I\'m <span class="mark">good</span>.</p>
          </body>
        </html>';

      $this->assertXmlStringEqualsXmlString(
        '<html>
          <head>
            <title>Examples: FluentDOM\QueryCss::find()</title>
          </head>
          <body>
            <p><span>Hello</span>, how are you?</p>
            <p>Me? I\'m <span class="mark red">good</span>.</p>
          </body>
        </html>',
        \FluentDOM::QueryCss($xml)
          ->find('p')
          ->find('span')
          ->filter('.mark')
          ->addClass('red')
      );
    }

    public function testFindSpanInPFilterByAClassAddAClassInHtmlMode() {
      $html =
        '<body>
            <p><span>Hello</span>, how are you?</p>
            <p>Me? I\'m <span class="mark">good</span>.</p>
          </body>';

      $result = \FluentDOM::QueryCss($html, 'text/html')
          ->find('p')
          ->find('span')
          ->filter('.mark')
          ->addClass('red');

      $this->assertXmlStringEqualsXmlString(
        '<html>
          <body>
            <p><span>Hello</span>, how are you?</p>
            <p>Me? I\'m <span class="mark red">good</span>.</p>
          </body>
        </html>',
        $result->document->saveXML()
      );
    }
  }
}
