<?php
require_once './classes/class.Syntaxo.php';
$HIGHLIGHT = new SyntaxHighlight();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Syntaxo - Syntax Highlighter Test with PHP</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php
        echo '<h1>HTML + CSS + JS</h1>';
        echo $HIGHLIGHT->process('
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
</html>');

        echo '<h1>CSS</h1>';
        echo $HIGHLIGHT->process('
/* ********************* *
 *  W3C 5 Selectors CSS
 * ********************* */

// 5.2.1 Grouping
h1, h2, h3 { font-family: sans-serif }

// 5.3 Universal selector
*[lang=fr] and [lang=fr] are equivalent.
// *.warning and .warning are equivalent.
*#myid and #myid are equivalent. 
    
// 5.4 Type selectors
h1 { font-family: sans-serif }

// 5.5 Descendant selectors
h1 { color: red }

// 5.6 Child selectors
body > P { line-height: 1.3 }

// 5.7 Adjacent sibling selectors
h1.opener + h2 { margin-top: -5mm; }

// 5.8 Attribute selectors
[class*="coco"] {
    color:inherit;
}

*[lang|="en"] { color : red }
*[lang=fr] { display : none }

a[rel~="copyright"] {}
a[rel^="copyright"] {}
a[rel*="copyright"] {}

span[class=example] { color: blue; }
    
[input="checkbox"] {
    color:inherit;
}

// 5.8.3 Class selectors
*.pastoral { color: green }  /* all elements with class~=pastoral */
h1.chapter1 { text-align: center }

.pre_count-c-c-22, .code_snippet-c {

    font:inherit;
    color:inherit;
}

.pre, 
.code {
    font:inherit;
    color:inherit;
}

// 5.9 ID selectors
h1#chapter1 { text-align: center }
*#pastoral { color: green }  /* all elements with class~=pastoral */

// HEX colors
#p1 {background-color: #ff0000;}   /* red */
#p2 {background-color: #00ff00;}   /* green */
#p3 {background-color: #0000ff;}   /* blue */ 

// RGB colors
.p1 {background-color: rgb(255, 0, 0);}   /* red with opacity */
.p2 {background-color: rgb(0, 255, 0);}   /* green with opacity */
.p3 {background-color: rgb(0, 0, 255);}   /* blue with opacity */ 

// RGBA colors
input[type="checkbox"].p1 {background-color: rgba(255, 0, 0, 0.3);}   /* red with opacity */
input[type="checkbox"].p2 {background-color: rgba(0, 255, 0, 0.3);}   /* green with opacity */
input[type="checkbox"].p3 {background-color: rgba(0, 0, 255, 0.3);}   /* blue with opacity */ 

// HSL colors
input[type="checkbox"]#p1 {background-color: hsl(120, 100%, 50%);}   /* green */
input[type="checkbox"]#p2 {background-color: hsl(120, 100%, 75%);}   /* light green */
input[type="checkbox"]#p3 {background-color: hsl(120, 100%, 25%);}   /* dark green */
input[type="checkbox"]#p4 {background-color: hsl(120, 60%, 70%);}    /* pastel green */ 

// HSLA colors
#p1 {background-color: hsla(120, 100%, 50%, 0.3);}   /* green with opacity */
#p2 {background-color: hsla(120, 100%, 75%, 0.3);}   /* light green with opacity */
#p3 {background-color: hsla(120, 100%, 25%, 0.3);}   /* dark green with opacity */
#p4 {background-color: hsla(120, 60%, 70%, 0.3);}    /* pastel green with opacity */ 
');

        echo '<h1>CSS Selectors Level 3</h1>';
        echo $HIGHLIGHT->process('
/* ********************* *
 *  Selectors
 *  Pseudo-Classes
 * ********************* */
 
*                       // any elements Universal selector 2
E                       // an element of type E Type selector 1
E F                     // an F element descendant of an E element Descendant combinator 1
E > F                   // an F element child of an E element Child combinator 2
E + F                   // an F element immediately preceded by an E element Adjacent sibling combinator 2
E ~ F
E:root                  // an E element, root of the document Structural pseudo-classes 3
E:nth-child(n)          // an E element, the n-th child of its parent Structural pseudo-classes 3
E:nth-last-child(n)     // an E element, the n-th child of its parent, counting from the last one Structural pseudo-classes 3
E:nth-of-type(n)        // an E element, the n-th sibling of its type Structural pseudo-classes 3
E:nth-last-of-type(n)   // an E element, the n-th sibling of its type, counting from the last one Structural pseudo-classes 3
E:first-child           // an E element, first child of its parent Structural pseudo-classes 2
E:last-child            // an E element, last child of its parent Structural pseudo-classes 3
E:first-of-type         // an E element, first sibling of its type Structural pseudo-classes 3
E:last-of-type          // an E element, last sibling of its type Structural pseudo-classes 3
E:only-child            // an E element, only child of its parent Structural pseudo-classes 3
E:only-of-type          // an E element, only sibling of its type Structural pseudo-classes 3
E:empty                 // an E element that has no children (including text nodes) Structural pseudo-classes 3
E:link
E:visited               // an E element being the source anchor of a hyperlink of which the target is not yet visited (:link) or already visited (:visited) The link pseudo-classes 1
E:active
E:hover
E:focus                 // an E element during certain user actions The user action pseudo-classes 1 and 2
E:target                // an E element being the target of the referring URI The target pseudo-class 3
E:not(s)                // an E element that does not match simple selector s Negation pseudo-class 3
E:lang(fr)              // an element of type E in language "fr" (the document language specifies how language is determined) The :lang() pseudo-class 2
E:enabled
E:disabled              // a user interface element E which is enabled or disabled The UI element states pseudo-classes 3
E:checked               // a user interface element E which is checked (for instance a radio-button or checkbox) The UI element states pseudo-classes 3
E::first-line           // the first formatted line of an E element The ::first-line pseudo-element 1
E::first-letter         // the first formatted letter of an E element The ::first-letter pseudo-element 1
E::before               // generated content before an E element The ::before pseudo-element 2
E::after                // generated content after an E element The ::after pseudo-element 2
E.warning               // an E element whose class is "warning" (the document language specifies how class is determined). Class selectors 1
E#myid                  // an E element with ID equal to "myid". ID selectors 1
E[foo]                  // an E element with a "foo" attribute Attribute selectors 2
E[foo="bar"]            // an E element whose "foo" attribute value is exactly equal to "bar" Attribute selectors 2
E[foo~="bar"]           // an E element whose "foo" attribute value is a list of whitespace-separated values, one of which is exactly equal to "bar" Attribute selectors 2
E[foo^="bar"]           // an E element whose "foo" attribute value begins exactly with the string "bar" Attribute selectors 3
E[foo$="bar"]           // an E element whose "foo" attribute value ends exactly with the string "bar" Attribute selectors 3
E[foo*="bar"]           // an E element whose "foo" attribute value contains the substring "bar" Attribute selectors 3
E[foo|="en"]            // an E element whose "foo" attribute has a hyphen-separated list of values beginning (from the left) with "en" Attribute selectors 2
');

        echo '<h1>LESS</h1>';
        echo $HIGHLIGHT->process('
// LESS
// Variables
@nice-blue: #5B83AD;
@light-blue: @nice-blue + #111;

#header {
    color: @light-blue;
}

// Less
// Mixins
.bordered {
    border-top: dotted 1px black;
    border-bottom: solid 2px black;
}

#menu a {
    color: #111;
    .bordered;
}

.post a {
  color: red;
  .bordered;
}

// Nested Rules
#header {
  color: black;
  .navigation {
    font-size: 12px;
  }
  .logo {
    width: 300px;
  }
}

// Nested Directives and Bubbling
.screen-color {
  @media screen {
    color: green;
    @media (min-width: 768px) {
      color: red;
    }
  }
  @media tv {
    color: black;
  }
}

.gradient-auto (@color: #000, @coef: 5%) {

    /*Farben aufhellen*/
    @lighten: lighten(@color, @coef);
    @darken: darken(@color, @coef);

    /*Wenn nichts geht normale hintegrund farbe*/
    background: @color; /* Old browsers */

    background-image: -moz-linear-gradient(top, @lighten 0%, @darken 100%); /* Firefox 3.6+ */
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,@lighten), color-stop(100%,@darken)); /* Chrome, Safari 4+ */
    background-image: -webkit-linear-gradient(top, @lighten 0%,@darken 100%); /* CHROME 10+, SAFARI 5.1+ */
    background-image: -o-linear-gradient(top, @lighten 0%,@darken 100%); /* Opera 11.10+ */
    background-image: -ms-linear-gradient(top, @lighten 0%,@darken 100%); /* ie 10+ */
    background-image: linear-gradient(to bottom, @lighten 0%,@darken 100%); /* w3c */

    /*Internet Explorer unterstüzung*/
    .ie5x {
        filter: ~"progid:DXImageTransform.Microsoft.Gradient(startColor=\'#2F2727\', endColor=\'#1a82f7\')"; /* IE 5 or later */
    }
    
    .ie6, 
    .ie7 {
        background: transparent;
        filter: ~"progid:DXImageTransform.Microsoft.gradient(start=@{startColor}, end=@{endColor}, GradientType=0)"; /* IE 6-7 */
    }
    .ie8, 
    .ie9 {
        background: transparent;
        -ms-filter: ~"progid:DXImageTransform.Microsoft.gradient(start=@{startColor}, end=@{endColor})"; /* IE 9 */
    } 
}');

        echo '<h1>SASS</h1>';
        echo $HIGHLIGHT->process('
// Variables
$font-stack: Helvetica, sans-serif;
$primary-color: #333;

body {
  font: 100% $font-stack;
  color: $primary-color;
}

// Nesting
nav {
  ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  li { display: inline-block; }

  a {
    display: block;
    padding: 6px 12px;
    text-decoration: none;
  }
}

// Import
@import \'reset\';

body {
  font: 100% Helvetica, sans-serif;
  background-color: #efefef;
}

// Mixins
@mixin border-radius($radius) {
  -webkit-border-radius: $radius;
     -moz-border-radius: $radius;
      -ms-border-radius: $radius;
          border-radius: $radius;
}

.box { @include border-radius(10px); }

// Extend/Inheritance
.message {
  border: 1px solid #ccc;
  padding: 10px;
  color: #333;
}

.success {
  @extend .message;
  border-color: green;
}

.error {
  @extend .message;
  border-color: red;
}

.warning {
  @extend .message;
  border-color: yellow;
}
');

        echo '<h1>JavaScript</h1>';
        echo $HIGHLIGHT->process('
function dateiauswahl(evt) {
    
    var reader = "Hallo";
    var reader = \'\';
    var f = \'\';
    var files = evt.target.files;

    // Auslesen der gespeicherten Dateien durch Schleife.
    for (var i=0; i < files.length; i++) {
                    
        f = files[i];
                    
        // Nur weitermachen, wenn Dateien Bilder sind.
        if (!f.type.match(\'image.*\')) {
                        
            continue;
        }

        reader = new FileReader(); // Lege neues Filereader-Objekt an

        // Dateiinformationen auslesen.
        reader.onload = (function (theFile) {
                        
            return function (e) {
                            
                // Thumbnail erstellen
                var span = document.createElement(\'div\');
                            
                span.innerHTML = [\'<img class="thumb" src="\' + e.target.result + \'" title="\' + theFile.name + \'"/>\'].join(\'\');
                            
                document.getElementById(\'list\').insertBefore(span, null);
            };
                        
        })(f);

        // Dateipfad aus Datei erzeugen.
        reader.readAsDataURL(f);
     }
}
    document.write("Dateiauswahl");  
    // Auf neue Auswahl reagieren und gegebenenfalls Funktion dateiauswahl neu ausführen.
    document.getElementById(\'files\').addEventListener(\'change\', dateiauswahl, false);   
');

        echo '<h1>PHP</h1>';
        echo $HIGHLIGHT->process('
            
namespace \Scripts;

require \'inc/class.php\';
require_once \'inc/class.php\';
include_once \'inc/class.php\';
include \'inc/class.php\';

// Example inline comment
function theme_include($file) {

    $file = strip_tags(trim(htmlentities($file, ENT_QUOTES, "UTF-8")));
    
    $theme_folder = Config::meta(\'theme\');
    $base = PATH . \'themes\' . DS . $theme_folder . DS;

    /**
     * Example multiline comment
     * Another comment
     */
    if(is_readable($path = $base . ltrim($file, DS) . EXT)) {
        return $path;
    }
    else
    {
        return false;
    }
    
    $GALO = new Config::meta(); // Instanzieren
    $GALO->tako(\'theme\');
    
    return true;

}');

        echo '<h1>MySQL</h1>';
        echo $HIGHLIGHT->process('
SELECT
    postId, created, keyword, title, teaser
FROM 
    pn_blog_posts
WHERE 
    keyword = \'hello-world\' 
AND
    status >= 2
ORDER 
   BY 
    created 
DESC');

        echo '<h1>Perl</h1>';
        echo $HIGHLIGHT->process('
Def * locate(string index = "") {

    int start = 0, stop = 0;
    index = trim(index, "\t\n\r /");
    
    if(index.empty()) return this;

    // Descent into the tree
    Def * d = this;
    do {
        stop = index.find_first_of("/", start);
        string name = index.substr(start, stop - start);
        start = stop + 1;
        d = d->children[name];
    } 
    while(stop != string::npos && d);

    return d;
}');
        ?>

    </body>
</html>