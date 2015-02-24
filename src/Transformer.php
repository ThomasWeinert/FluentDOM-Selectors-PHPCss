<?php

namespace FluentDOM\PhpCss {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use PhpCss\Ast\Visitor\Xpath;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $isDocumentContext = FALSE, $isHtml = FALSE) {
      return \PhpCss::toXpath(
        $selector,
        $isDocumentContext
          ? Xpath::OPTION_USE_CONTEXT_SELF
          : Xpath::OPTION_USE_CONTEXT_DOCUMENT
      );
    }
  }
}