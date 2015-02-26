<?php

namespace FluentDOM\PhpCss {

  \FluentDOM::registerXpathTransformer(
    function() {
      return new Transformer();
    }
  );
}