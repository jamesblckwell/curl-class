# curl-class

A general purpose Curl class written in PHP

## General Syntax

    Curl::get(url, options);

    Curl::post(url, options, body);

    Curl::patch(url, options, body);

### Param Types

    url -> string
    options -> [
        option_name => option_value
    ]
    body -> array of values
