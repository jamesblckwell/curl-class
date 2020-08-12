# curl-class

A general purpose Curl class written in PHP

## General Syntax

    Curl::request(method, url, options, body);

### Parameter Types

Parameter | Type | Notes
----------|------|-------
method | string |
url | string |
options | array | See [here](https://www.php.net/manual/en/function.curl-setopt.php) for a list of option values, should be in this general syntax: [option_name => option_value]
body | array |
