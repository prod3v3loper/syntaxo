<?php

namespace syntax;

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
class Syntaxo {

    // Add options
    public $args = array();

    /**
     * 
     * @param array $args
     */
    public function __construct(array $args = array()) {
        // Handle options
        $this->args = $args;
    }

        /**
     * 
     * @param array $args
     */
    public function getStyle() {
        return '<style>' . file_get_contents('css/style.css') . '</style>';
    }

    /**
     * 
     * @param type $text
     */
    public function process($text) {

        $regexp = array(
            // Punctuations
//            '/([\^\(\)\+\~\`\[\]\{\}\?\,<>]+)/'
//            => '<span class="p">\\1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // COMMENTS
            "/(&lt;\!\-\-[[:space:]]*.*[[:space:]]*\-\-&gt;)/isU"               // HTML
            => '<span class="c">\\1</span>',
            "/(\/\/.*\n+)/isU"                                                  // JavaScript
            => '<span class="c">\\1</span>',
            "/(?<!\w)((\/\*\s*|\*\s*)([^\[|\#]*)(\*\/)?)/i"                     // CSS
            => '<span class="c">\\1</span>',
//            "#(\/\*+.*\*+\/+)+#i"                                             // CSS
//            => '<span class="c">\\1</span>',
//            "#(\*+)(?!.*?)#i"                                                 // CSS
//            => '<span class="c">\\1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // HTML
            "/(&lt;+[\/?a-zA-Z]+[[:space:]]*.*?&gt;+)/i"                        // Tags
            => '<span class="h">$1</span>',
            '/(&lt;+(link)+[[:space:]]*.*\/?&gt;+)/i'                           // link tag
            => '<span class="hL">$1</span>',
            '/(&lt;+(meta)+[[:space:]]*.*\/?&gt;+)/i'                           // meta tag
            => '<span class="hM">$1</span>',
            '/(&lt;+(\/?style)+[[:space:]]*.*&gt;+)/i'                          // style tag
            => '<span class="hS">$1</span>',
            "/(&lt;+(\/*script)+[[:space:]]*.*&gt;+)/i"                         // script tag
            => '<span class="hJS">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // ALL STRINGS
            '/(\w+)([\$|&circ;|\^|&tilde;|\~|\*|\|]*\=+)(&quot;.*quot;|&apos;.*apos;|\'.*\')/isU'
            => '<span class="p">\\1</span>'
            . '<span class="p">\\2</span>'
            . '<span class="p">\\3</span>'
            . '<span class="p">\\4</span>',
            '/(&quot;.*quot;|&apos;.*apos;|\'.*\')/isU'
            => '<span class="s">\\1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // CSS
            '/(\#[\w|\d|\-|_]+)(?!&quot;|\')/i'                                 // ID
            => '<span class="hID">$1</span>',
            "/(\.[\w|\d|\-|_]+)/i"                                              // Class
            => '<span class="hCLASS">$1</span>',
            "/(?<!\w)((\-)(webkit|moz|o|ms|filter)+(\-))/i"                     // Filter
            => '<span class="hKIT">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // ALL COLORS
            "/((0x|\#)([a-f0-9]+))(?=[a-f0-9]*)(?![e-z])/i"                     // HEX
            => '<span class="n">$1</span>',
            "/((rgb|rgba|argb|hsl|hsla|hsv|hsva)\(\d+,\d+,\d+,?\d*?\))/i"       // RGB|ARGB|HSL|HSV
            => '<span class="hCOLOR">$1</span>'
            . '<span class="hCOLOR">$2</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // ALL NUMBERS
            "/(?<!\w|#|\-)((\d+\.+\d+)(pt|pc|in|px|em|cm|mm|rem|ms|s|deg|grad|rad|turn|\%)*)/i" // Numbers with commata
            => '<span class="n">$1</span>',
            "/(?<!\w|#|\-)((\d+\.?\d?)(pt|pc|in|px|em|cm|mm|rem|ms|s|deg|grad|rad|turn|\%)*)/i" // Numbers without commata
            => '<span class="n">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // LESS @vars 
            "/((\=?\@\{?)+(\w|_|\-|\-&gt;)+)/i"
            => '<span class="in">$1</span>',
            // LESS Mixin
//            '/(\.[\w|\d\-|_]+)(\()(.*)(\))/i'
//            => '<span class="lessMIX">$1</span>'
//            . '<span class="lessMIX">$2</span>'
//            . '$3'
//            . '<span class="lessMIX">$4</span>',
            // LESS Misc Functions
            "/(?<!\w|\$|\%|\@)(color|image-size|image-width|image-height|convert|
                data-uri|default|unit|get-unit|svg-gradient)(?=\()(?!\w|\=|\:)/"
            => '<span class="lessMi">$1</span>',
            // LESS String Functions
            "/(?<!\w|\$|\%|\@)(escape|e|%|replace|length|extract)(?=\()(?!\w|\=|\:)/"
            => '<span class="lessS">$1</span>',
            // LESS Math Functions
            "/(?<!\w|\$|\%|\@)(ceil|floor|percentage|round|sqrt|abs|sin|asin|cos|acos|
                tan|atan|pi|pow|mod|min|max)(?=\()(?!\w|\=|\:)/"
            => '<span class="lessMa">$1</span>',
            // LESS Type Functions
            "/(?<!\w|\$|\%|\@)(isnumber|isstring|iscolor|iskeyword|isurl|ispixel|isem|
                ispercentage|isunit|isruleset)(?=\()(?!\w|\=|\:)/"
            => '<span class="lessT">$1</span>',
            // LESS Color Channel Functions
            "/(?<!\w|\$|\%|\@)(hue|saturation|lightness|hsvhue|hsvsaturation|hsvvalue|
                red|green|blue|alpha|luma|luminance)(?=\()(?!\w|\=|\:)/"
            => '<span class="lessC">$1</span>',
            // LESS
            "/(?<!\w|\$|\%|\@)(when)(?!\w|\=)/"
            => '<span class="lessW">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // ALL KEYWORDS (PHP-JS-PERL)
            "/(?<!\w|\$|\%|\@|\/|\[|\.|<|&lt;|-|\/\/|\:)(&amp;&amp;|and|or|xor|for|do|while|foreach|as|
                    return|die|exit|if|then|else|elseif|try|throw|catch|finally|class|function|
                    string|array|object|resource|var|bool|boolean|int|integer|float|double|
                    real|string|array|global|const|static|public|private|protected|
                    published|extends|switch|true|false|null|void|this|self|struct|
                    char|signed|unsigned|short|long|public|continue)+(?!\w|\=|\*|\.|\~|\|<|&gt;)/x"
            => '<span class="kALL">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // ALL MEDIA TYPS
            "/(?<!\w|\$|\%|\@|\/|\[|\.|<)(all|print|screen|speech|aural|braille|embossed|
                    handheld|projection|tty|tv)(?!\w|\=|\*|\.|\~|&tilde;|\|<)/x"
            => '<span class="static">\\1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // PHP String-Functions
            "/(?<!\w|\$|\%|\@|\/|<|&lt;|\:)(addcslashes|addslashes|bin2hex|chop|chr|chunk_​split|
                    convert_​cyr_​string|convert_​uudecode|convert_​uuencode|count_​chars|crc32|
                    crypt|echo|explode|fprintf|get_​html_​translation_​table|hebrev|hebrevc|
                    hex2bin|html_​entity_​decode|htmlentities|htmlspecialchars_​decode|
                    htmlspecialchars|implode|join|lcfirst|levenshtein|localeconv|ltrim|
                    md5_​file|md5|metaphone|money_​format|nl_​langinfo|nl2br|number_​format|
                    ord|parse_​str|print|printf|quoted_​printable_​decode|quoted_​printable_​encode|
                    quotemeta|rtrim|setlocale|sha1_​file|sha1|similar_​text|soundex|sprintf|
                    sscanf|str_​getcsv|str_​ireplace|str_​pad|str_​repeat|str_​replace|str_​rot13|
                    str_​shuffle|str_​split|str_​word_​count|strcasecmp|strchr|strcmp|strcoll|
                    strcspn|strip_​tags|stripcslashes|stripos|stripslashes|stristr|
                    strlen|strnatcasecmp|strnatcmp|strncasecmp|strncmp|strpbrk|strpos|strrchr|strrev|
                    strripos|strrpos|strspn|strstr|strtok|strtolower|strtoupper|strtr|substr_​compare|
                    substr_​count|substr_​replace|substr|trim|ucfirst|ucwords|vfprintf|vprintf|vsprintf|
                    wordwrap)(?!\w|\=|\*|\.|\~|&tilde;)/x"
            => '<span class="kPHP">$1</span>',
            // PHP Funktionen zur Behandlung von Variablen
            "/(?<!\w|\$|\%|\@|\/|<|&lt;|\:)(boolval|debug_​zval_​dump|doubleval|empty|floatval|
                    get_​defined_​vars|get_​resource_​type|gettype|import_​request_​variables|intval|
                    is_​array|is_​bool|is_​callable|is_​double|is_​float|is_​int|is_​integer|is_​long|
                    is_​null|is_​numeric|is_​object|is_​real|is_​resource|is_​scalar|is_​string|isset|
                    print_​r|serialize|settype|strval|unserialize|unset|var_​dump|var_​export)(?!\w|\=|\*|\.|\~|&tilde;)/x"
            => '<span class="kPHP">$1</span>',
            // PHP PCRE-Funktionen
            "/(?<!\w|\$|\%|\@|\/|<|&lt;)(preg_​filter|preg_​grep|preg_​last_​error|preg_​match_​all|preg_​match|
                    preg_​quote|preg_​replace_​callback_​array|preg_​replace_​callback|preg_​replace|preg_​split)(?!\w|\=|\*|\.|\~|&tilde;)/x"
            => '<span class="kPHP">$1</span>',
//            // PHP Dateisystem
//            "/(?<!\w|\$|\%|\@|\/|<|&lt;)(basename|chgrp|chmod|chown|clearstatcache|copy|delete|dirname|
//                    disk_​free_​space|disk_​total_​space|diskfreespace|fclose|feof|fflush|fgetc|fgetcsv|
//                    fgets|fgetss|file_​exists|file_​get_​contents|file_​put_​contents|file|fileatime|
//                    filectime|filegroup|fileinode|filemtime|fileowner|fileperms|filesize|filetype|
//                    flock|fnmatch|fopen|fpassthru|fputcsv|fputs|fread|fscanf|fseek|fstat|ftell|
//                    ftruncate|fwrite|glob|is_​dir|is_​executable|is_​file|is_​readable|is_​uploaded_​file|
//                    is_​writable|is_​writeable|lchgrp|lchown|link|linkinfo|lstat|mkdir|move_​uploaded_​file|
//                    parse_​ini_​file|parse_​ini_​string|pathinfo|pclose|popen|readfile|readlink|realpath_​cache_​get|
//                    realpath_​cache_​size|realpath|rename|rewind|rmdir|set_​file_​buffer|stat|symlink|tempnam|
//                    tmpfile|touch|umask|unlink)+(?!\w|\=|\*|\.|\~|&tilde;)/x"
//            => '<span class="kPHP">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // PHP/Perl Vars: $var, %var
            '/(?<!\w)((\$|\%)+(_|\-|\-&gt;|\w)+)(?!\w)/i'
            => '<span class="v">$1</span>',
            // PHP static functions | CSS 
            '/(?<!\w|\d|\[|\-)([\$?a-z|\-]*)([\:|\:\:]+)([a-z0-9|\#|\s|\-]+)/i'
            => '<span style="color:#DEB887;">\\1</span>'
            . '<span class="static">\\2</span>'
            . '<span class="static">\\3</span>',
            // PHP JS PERL backreferences
            "/(?<!\w|\$|\%|\@)(new|require|require_once|include|include_once|return)(?!\w|\=)/"
            => '<span class="kPHPback">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // JS JavaScript
            "/(?<!\w|\$|\%|\@|\.)(Array|Boolean|DOM|Date|Math|navigator|Number|namespace|
                RegExp|screen|String|window)(?!\w|\=)/"                                     // JS OBJECTS
            => '<span class="kJS">$1</span>',
            // JS Keywords
            "/(?<!\w|\$|\%|\@)(document)(?=\.|<)(?!\w|\=)/"
            => '<span class="kALL">$1</span>',
            // JavaScript + variable +
            "/(\'+.*\+\.?.*\+.*\')/i"
            => '<span style="color:#999;">$1</span>',
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            // Ein Buchstabe alleinstehend
//            "/(?<= |\(|\!)([a-z]{0,1})(?= |\.|\)|<|\=|\+)/i"
//            => '<span style="color: #ff0;">$1</span>',
            /////////////////////////////////
            // BOOLSCHE
            // Keywords Bools false null usw.
            "/(?<!\w|\$|\%|\@)(null|false|delete)(?!\w|\=)/i"
            => '<span class="boolfalses">$1</span>',
            // Keywords Bools true
            "/(?<!\w|\$|\%|\@)(true)(?!\w|\=)/i"
            => '<span class="booltrues">$1</span>',
            // Alles in Eckigen Klammern
            "/((\[+)([a-z|\=|\||\*]+)(\]+))/i"
            => '<span style="color:red;">$2</span>'
            . '<span style="color:grey;">$3</span>'
            . '<span style="color:red;">$4</span>',
            // ALLES Großgeschriebenes
            '/(?<!\w|>|\#|\$)([A-Z_0-9]{2,})(?!\w)/x'
            => '<span class="d">$1</span>'
        );

        $textMasked = htmlspecialchars($text);
//        $textTabs = str_replace(array("\t", "   ","    "), '&nbsp;&nbsp;&nbsp;&nbsp;', $textMasked);
//        $textSpaces = str_replace(array("\s", " "), '&nbsp;', $textTabs);
        $textReplaced = preg_replace(array_keys($regexp), array_values($regexp), $textMasked);
        $sourceCodeExplode = explode("\n", str_replace(array("\r\n", "\r", "<br\s*/?>"), "\n", $textReplaced));
        
        return $this->output($sourceCodeExplode);
    }
    
    /**
     * 
     * @param type $sourceCodeExplode
     */
    public function output($sourceCodeExplode) {
        
        // Start consecutive line number at 0
        $lineCount = 0;
        $output = '';
        $formatedCode = '';
        
        $formatedCode .= '<div class="code" id="code" style="max-height:300px;">';

        // Edit every line
        foreach ($sourceCodeExplode as $codeLine) {

            // Continuous line number
            $formatedCode .= '<div class="linecount noselect"> ' . $lineCount . ' </div>';

            // nowrap prevents the line break of the code
            $formatedCode .= '<div nowrap class="linecode' . $lineCount . '" id="linecode' . $lineCount . '" onclick="copyANDpaste( \'linecode' . $lineCount . '\' );"> ' . $codeLine . ' </div>';

            $lineCount++; // counting
        }

        $formatedCode .= '</div>';

        $output .= '<code><pre>';
        $output .= $formatedCode;
        $output .= '</pre></code>';
        
        return $output;
    }

}
