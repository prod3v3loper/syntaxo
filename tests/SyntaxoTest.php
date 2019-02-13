<?php

declare(strict_types = 1);

namespace Syn;

use PHPUnit\Framework\TestCase;

/**
 * Syntaxo
 * 
 * @copyright   (c) 2018, Samet Tarim 
 * @author      Samet Tarim (prod3v3loper)
 * @package     Melabuai
 * @subpackage  Syntaxo
 * @since       1.0
 * @link        https://prod3v3loper.github.io/syntaxo/
 */
class SyntaxoTest extends TestCase {

    public function testAttributeIsArray() {
        $_SYNTAXO = new Syntaxo(array());
        $this->assertIsArray($_SYNTAXO->args);
    }

    public function testHasClassAttribute(): void {
        $this->assertClassHasAttribute(
                'args', Syntaxo::class
        );
    }

    public function testReturnStyleAsString(): void {

        $_SYNTAXO = new Syntaxo();
        $this->assertIsString($_SYNTAXO->getStyle());
    }

    public function testReturnProcessAsString(): void {

        $_SYNTAXO = new Syntaxo();
        $this->assertIsString($_SYNTAXO->process('
<!-- HTML Kommentar -->
<!DOCTYPE html>
<html dir="ltr" class="page-dashboard">

  <head>
  
    <meta charset="utf-8">
    <title>Create New Post</title>
    <link href="/plugins/dashboard/lib/css/shell.css" rel="stylesheet">
    
    <style type="text/css">
    pre, 
    pre::before, 
    pre:hover {
        display:block;
        background-color:#3F3F3F;
        margin:1.5em 0;
        padding:1em;
        font:normal normal 13px/1.4 Consolas,"Andale Mono WT","Andale Mono","Lucida Console","Lucida Sans Typewriter","DejaVu Sans Mono","Bitstream Vera Sans Mono","Liberation Mono","Nimbus Mono L",Monaco,"Courier New",Courier,Monospace;
        color:#E3CEAB;
        overflow:auto;
        white-space:pre;
        word-wrap:normal;
      
        filter: "ms:alwaysHasItsOwnSyntax.For.Stuff()";
    }
    
    .pre, .code {
        font:inherit;
        color:inherit;
    }

    #pre .span-2.N {color:#8CD0D3; background: rgba(255,255,255,0.1); } /* Numbers */
    #pre span.S {color:#CC9385} /* Strings */
    </style>
    
    <script type="text\JavaScript">
    if (!zeichen) {
        zeichen = "0";
    }

    var formatiert = "" + this;
    while (formatiert.length < stellenzahl) {
        formatiert = zeichen + formatiert;
    }
    </script>
    
  </head>
  <body>
    <div class="wrapper">
    <h1>Hallo</h1>
    <p>Willkommen beim Syntax Highlighter</p>
    </div>
    <!-- Test comment -->
  </body>
</html>'));
    }

}
