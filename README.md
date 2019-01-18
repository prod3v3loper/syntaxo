# SYNTAXO

Multi Syntax Highlighter programmed with PHP. Immediately ready for use and can be used anywhere in seconds.

**Size**: 14.76 KiB                                     
**Gzipped**: 4.03 KiB                                                      

- HTML
- CSS - LESS - SASS
- JavaScript
- PHP
- MySQL
- Perl
- ...

# USE

Very easy to use and very easy to modify. All you have to do is to include the file, instantiate the class, and call the method method with the string.

```php
require_once './classes/class.Syntaxo.php';
$HIGHLIGHT = new SyntaxHighlight();
echo $HIGHLIGHT->process('
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Highlight</title>
  </head>
  <body>
    <!-- Content -->
  </body>
</html>
');
```

# REGEX MODIFY

Here's a snippet of Syntaxo regex for comments on each language. And you can modify them as needed and get even better results.

```php
// HTML
"/(&lt;\!\-\-[[:space:]]*.*[[:space:]]*\-\-&gt;)/isU" => '<span class="c">\\1</span>',
// JavaScript
"/(\/\/.*\n+)/isU" => '<span class="c">\\1</span>',
// CSS
"/(?<!\w)((\/\*\s*|\*\s*)([^\[|\#]*)(\*\/)?)/i" => '<span class="c">\\1</span>',
```

![The index.php preview](https://prod3v3loper.github.io/syntaxo/img/syntaxo-multi-syntax-highlighter.png "The index.php preview")