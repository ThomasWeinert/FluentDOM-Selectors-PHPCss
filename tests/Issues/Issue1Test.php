<?php

namespace FluentDOM\PhpCss {

  use PHPUnit\Framework\TestCase;

  require_once __DIR__ . '/../../vendor/autoload.php';

  class Issue1Test extends TestCase {

    public function testIsMatchingContextNodeExpectingTrue() {
      $this->assertTrue(
        \FluentDOM::QueryCss('<div><span></span></div>', 'html-fragment')->is('div')
      );
    }

    public function testIsMatchingContextNodeExpectingFalse() {
      $this->assertFalse(
        \FluentDOM::QueryCss('<div><span></span></div>', 'html-fragment')->is('span')
      );
    }
  }
}