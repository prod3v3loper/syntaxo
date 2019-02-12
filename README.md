![alt text](https://img.shields.io/badge/build-passing-brightgreen.svg "Build passing")
![alt text](https://img.shields.io/badge/license-CCO-blue.svg "CCO 1.0")

# SYNTAXO (by Melabuai)

Multi Syntax Highlighter programmed with PHP. Immediately ready for use and can be used anywhere in seconds.
[Theme Page of this Site](https://prod3v3loper.github.io/Syntaxo/)

**class.Syntaxo.php**
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

# PREVIEW

![The index.php preview](https://prod3v3loper.github.io/syntaxo/img/syntaxo-multi-syntax-highlighter.png "The index.php preview")

# Contribute

Please [file an issue](https://github.com/prod3v3loper/syntaxo/issues) if you
think something could be improved. Please submit Pull Requests when ever
possible.

# Built with

* [NetBeans](https://netbeans.org/) - NetBeans editor for error-free code

# Authors

* **Samet Tarim** - *All works* - [prod3v3loper](https://www.tnado.com/author/prod3v3loper/)

# License

[MIT](https://github.com/prod3v3loper/syntaxo/blob/master/LICENSE)