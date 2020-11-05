<?php

namespace Genert\BBCode\Parser;

final class BBCodeParser extends Parser
{
    protected $parsers = [
        'quote3' => [
            'pattern' => '/\[QUOTE="(.*?)"\](.*?)\[\/QUOTE\]/is',
            'replace' => '<div class="quoted">$1<blockquote class="blockquote">$2</blockquote></div>',
            'content' => '$2'
        ],

        'quote2' => [
            'pattern' => '/\[quote\](.*?)\[\/quote\]/is',
            'replace' => '<div class="quoted"><blockquote class="blockquote">$1</blockquote></div>',
            'content' => '$1'
        ],
        'quote' => [
            'pattern' => '/\[quote=(.*?)\](.*?)\[\/quote\]/is',
            'replace' => '<div class="quoted">$1<blockquote class="blockquote">$2</blockquote></div>',
            'content' => '$2'
        ],
        'h1' => [
            'pattern' => '/\[h1\](.*?)\[\/h1\]/is',
            'replace' => '<h1>$1</h1>',
            'content' => '$1'
        ],
        'h2' => [
            'pattern' => '/\[h2\](.*?)\[\/h2\]/is',
            'replace' => '<h2>$1</h2>',
            'content' => '$1'
        ],
        'h3' => [
            'pattern' => '/\[h3\](.*?)\[\/h3\]/is',
            'replace' => '<h3>$1</h3>',
            'content' => '$1'
        ],
        'h4' => [
            'pattern' => '/\[h4\](.*?)\[\/h4\]/is',
            'replace' => '<h4>$1</h4>',
            'content' => '$1'
        ],
        'h5' => [
            'pattern' => '/\[h5\](.*?)\[\/h5\]/is',
            'replace' => '<h5>$1</h5>',
            'content' => '$1'
        ],
        'h6' => [
            'pattern' => '/\[h6\](.*?)\[\/h6\]/is',
            'replace' => '<h6>$1</h6>',
            'content' => '$1'
        ],
        'bold' => [
            'pattern' => '/\[b\](.*?)\[\/b\]/is',
            'replace' => '<b>$1</b>',
            'content' => '$1'
        ],
        'italic' => [
            'pattern' => '/\[i\](.*?)\[\/i\]/is',
            'replace' => '<i>$1</i>',
            'content' => '$1'
        ],
        'underline' => [
            'pattern' => '/\[u\](.*?)\[\/u\]/is',
            'replace' => '<u>$1</u>',
            'content' => '$1'
        ],
        'strikethrough' => [
            'pattern' => '/\[s\](.*?)\[\/s\]/is',
            'replace' => '<s>$1</s>',
            'content' => '$1'
        ],
        'link' => [
            'pattern' => '/\[url\](.*?)\[\/url\]/is',
            'replace' => '<a href="$1">$1</a>',
            'content' => '$1'
        ],
        'namedlink' => [
            'pattern' => '/\[url\=(.*?)\](.*?)\[\/url\]/is',
            'replace' => '<a href="$1">$2</a>',
            'content' => '$2'
        ],
        'color' => [
            'pattern' => '/\[color\=(.*?)\](.*?)\[\/color\]/is',
            'replace' => '<span style="color: $1">$2</span>',
            'content' => '$2'
        ],
        'size' => [
            'pattern' => '/\[size\=(.*?)\](.*?)\[\/size]/is',
            'replace' => '<h$1>$2</h$1>',
            'content' => '$2'
            ],
        'image' => [
            'pattern' => '/\[img\](.*?)\[\/img\]/is',
            'replace' => '<img src="$1">',
            'content' => '$1'
        ],
        'orderedlistnumerical' => [
            'pattern' => '/\[list=1\](.*?)\[\/list\]/is',
            'replace' => '<ol>$1</ol>',
            'content' => '$1'
        ],
        'orderedlistalpha' => [
            'pattern' => '/\[list=a\](.*?)\[\/list\]/is',
            'replace' => '<ol type="a">$1</ol>',
            'content' => '$1'
        ],
        'unorderedlist' => [
            'pattern' => '/\[list\](.*?)\[\/list\]/is',
            'replace' => '<ul>$1</ul>',
            'content' => '$1'
        ],
        'listitem' => [
            'pattern' => '/\[\*\](.*)/',
            'replace' => '<li>$1</li>',
            'content' => '$1'
        ],
        'code' => [
            'pattern' => '/\[code\](.*?)\[\/code\]/is',
            'replace' => '<code>$1</code>',
            'content' => '$1'
        ],
        'youtube' => [
            'pattern' => '/\[youtube\](.*?)\[\/youtube\]/is',
            'replace' => '<iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/$1" frameborder="0" allowfullscreen></iframe>',
            'content' => '$1'
        ],
        'sub' => [
            'pattern' => '/\[sub\](.*?)\[\/sub\]/is',
            'replace' => '<sub>$1</sub>',
            'content' => '$1'
        ],
        'sup' => [
            'pattern' => '/\[sup\](.*?)\[\/sup\]/is',
            'replace' => '<sup>$1</sup>',
            'content' => '$1'
        ],
        'small' => [
            'pattern' => '/\[small\](.*?)\[\/small\]/is',
            'replace' => '<small>$1</small>',
            'content' => '$1'
        ],
        'table' => [
            'pattern' => '/\[table\](.*?)\[\/table\]/is',
            'replace' => '<table>$1</table>',
            'content' => '$1',
        ],
        'table-row' => [
            'pattern' => '/\[tr\](.*?)\[\/tr\]/is',
            'replace' => '<tr>$1</tr>',
            'content' => '$1',
        ],
        'table-data' => [
            'pattern' => '/\[td\](.*?)\[\/td\]/is',
            'replace' => '<td>$1</td>',
            'content' => '$1',
        ],
        'center' => [
            'pattern' => '/\[center\](.*?)\[\/center\]/is',
            'replace' => '<div class="text-center">$1</div>',
            'content' => '$1',
        ],
        'left' => [
            'pattern' => '/\[left\](.*?)\[\/left\]/is',
            'replace' => '<div class="text-left">$1</div>',
            'content' => '$1',
        ]
    ];

    public function stripTags(string $source): string
    {
        foreach ($this->parsers as $name => $parser) {
            $source = $this->searchAndReplace($parser['pattern'] . 'i', $parser['content'], $source);
        }

        return $source;
    }

    public function parse(string $source, $caseInsensitive = null): string
    {
        $caseInsensitive = $caseInsensitive === self::CASE_INSENSITIVE ? true : false;

        foreach ($this->parsers as $name => $parser) {
            $pattern = ($caseInsensitive) ? $parser['pattern'] . 'i' : $parser['pattern'];

            $source = $this->searchAndReplace($pattern, $parser['replace'], $source);
        }

        return $source;
    }
}
