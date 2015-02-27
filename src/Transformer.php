<?php

namespace FluentDOM\PhpCss {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use PhpCss\Ast\Visitor\Xpath;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $isDocumentContext = FALSE, $isHtml = FALSE) {
      $options = 0;
      if ($isDocumentContext) {
        $options |= Xpath::OPTION_USE_DOCUMENT_CONTEXT;
      }
      if (!$isHtml) {
        $options |= Xpath::OPTION_EXPLICT_NAMESPACES;
      }
      $result = \PhpCss::toXpath($selector, $options);
      return $result;
    }
  }
}