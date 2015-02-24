<?php

namespace FluentDOM\PhpCss {

  use FluentDOM\Xpath\Expression;
  use PhpCss\Ast\Visitor\Xpath;

  class Selector implements Expression {

    private $_expression = '';

    public function __construct($selector, $options = 0) {
      $phpCssOptions = ($options & Expression::CONTEXT_CHILDREN === Expression::CONTEXT_CHILDREN)
        ? Xpath::OPTION_USE_CONTEXT_SELF
        : Xpath::OPTION_USE_CONTEXT_DOCUMENT;
      $this->_expression = \PhpCss::toXpath($selector, $phpCssOptions);
    }

    public function __toString() {
      return $this->_expression;
    }
  }
}