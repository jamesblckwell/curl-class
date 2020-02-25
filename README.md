# curl-class

A general purpose Curl class written in PHP

## General Syntax

    Curl::get(url, options);

    Curl::post(url, options, body);

    Curl::patch(url, options, body);

### Param Types

Parameter | Type | Notes
----------|------|-------
url | string |
options | array | See https://www.php.net/manual/en/function.curl-setopt.php for a list of option values
body | array |
