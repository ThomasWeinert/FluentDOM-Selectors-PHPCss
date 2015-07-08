<?php

namespace FluentDOM\PhpCss {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use PhpCss\Ast\Visitor\Xpath;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $contextMode = self::CONTEXT_CHILDREN, $isHtml = FALSE) {
      $map = [
        self::CONTEXT_DOCUMENT => Xpath::OPTION_USE_CONTEXT_DOCUMENT,
        self::CONTEXT_SELF => Xpath::OPTION_USE_CONTEXT_SELF,
        self::CONTEXT_CHILDREN => 0
      ];
      $options = $map[$contextMode];
      $options |= $isHtml
        ? Xpath::OPTION_LOWERCASE_ELEMENTS
        : Xpath::OPTION_EXPLICIT_NAMESPACES;
      $result = \PhpCss::toXpath($selector, $options);
      return $result;
    }
  }
}