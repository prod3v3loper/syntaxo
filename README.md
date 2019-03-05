![Language](https://img.shields.io/github/languages/top/prod3v3loper/syntaxo.svg?style=flat "Language")
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/10c8f4a31b8d411389cf9c6d95e0319d)](https://www.codacy.com/app/prod3v3loper/syntaxo?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=prod3v3loper/syntaxo&amp;utm_campaign=Badge_Grade)
[![Packagist Version](https://img.shields.io/packagist/v/prod3v3loper/syntaxo.svg?style=flat "Packigist Version")](https://packagist.org/packages/prod3v3loper/syntaxo "Packigist Version")
[![Build Passing](https://travis-ci.org/prod3v3loper/syntaxo.svg?branch=master "Build passing")](https://travis-ci.org/prod3v3loper/syntaxo "Build passing")
![Repo Siz](https://img.shields.io/github/repo-size/prod3v3loper/syntaxo.svg?style=flat "Repo Size")
![Github Release date](https://img.shields.io/github/release/prod3v3loper/syntaxo.svg?style=flat "Github Release date")
![Packgist PHP Version](https://img.shields.io/packagist/php-v/prod3v3loper/syntaxo.svg?style=flat "Packgist PHP Version")
[![MIT License](https://img.shields.io/packagist/l/prod3v3loper/syntaxo.svg?style=flat "MIT License")](https://github.com/prod3v3loper/syntaxo/blob/master/LICENSE "MIT License")
[![Website](https://img.shields.io/website-up-down-green-red/https/www.tnado.com/open-source-projects-by-prod3v3loper.svg?style=flat "Website")](https://www.tnado.com/open-source-projects-by-prod3v3loper/ "Website")

# SYNTAXO (by Melabuai)

Multi Syntax Highlighter programmed with PHP. Immediately ready for use and can be used anywhere in seconds.
[Theme Page of this Site](https://prod3v3loper.github.io/syntaxo/)

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

## Packagist with Composer

This solution extends the vendor autoloader because it calls the files with certain criteria. The extension allows you to call classes wherever the Autloder is involved.

Download [Composer](https://getcomposer.org/) local or global. Check for more [Tutorial - NetBeans with Composer and Packagist](https://www.tnado.com/blog/netbeans-with-composer-and-packagist-the-php-package-manager/) for this one.

You found the package on [Packigist](https://packagist.org/packages/prod3v3loper/syntaxo).

Add the Syntaxo dependencie to the **composer.json** and set the autoload.
```json
{
    "autoload": {
        "psr-4": { "Syn\\": "src/" }
    },
    "require": {
        "prod3v3loper/syntaxo": ">=1.0"
    },
```

Now run the composer install command with php
```
php composer.phar install
```

`index.php`
```php
require_once __DIR__ . '/vendor/autoload.php';
$HIGHLIGHT = new \Syn\Syntaxo();
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

## Git Install

```
git clone https://github.com/prod3v3loper/syntaxo.git /Users/username/projects/
```

Get per [Git](https://git-scm.com/) or [download](https://github.com/prod3v3loper/syntaxo/archive/master.zip) and use it.

`index.php`
```php
require_once './src/Syntaxo.php';
$HIGHLIGHT = new \Syn\Syntaxo();
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
