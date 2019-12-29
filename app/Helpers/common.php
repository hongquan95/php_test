<?php

if (! function_exists('array_only')) {
/**
 * Array only.
 *
 * @return string
 */
function array_only($array, $keys)
{
    return array_intersect_key($array, array_flip((array) $keys));
}
}
