<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] = $value;
}

// gets the url query params and returns it as an array
function getQueryParams()
{
    $request = parse_url($_SERVER['REQUEST_URI']);
    $query = isset($request['query']) ? $request['query'] : null;
    if ($query !== null) {
        parse_str($query, $queryParams);
        return $queryParams;
    } else {
        return null;
    }
}
