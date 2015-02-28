<?php

namespace FluentDOM\PhpCss {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use PhpCss\Ast\Visitor\Xpath;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $isDocumentContext = FALSE, $isHtml = FALSE) {
      $options = $isDocumentContext ? Xpath::OPTION_USE_CONTEXT_DOCUMENT : XPath::OPTION_USE_CONTEXT_SELF;
      if (!$isHtml) {
        $options |= Xpath::OPTION_EXPLICIT_NAMESPACES;
      }
      $result = \PhpCss::toXpath($selector, $options);
      return $isDocumentContext ? $result : './'.$result;
    }
  }
}