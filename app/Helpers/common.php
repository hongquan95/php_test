<?php

if (! function_exists('array_only')) {
/**
 * Array only.
 *
 * @return array
 */
function array_only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }
}
if (! function_exists('get_params_from_query')) {
/**
 * Array only.
 *
 * @return array
 */
function get_params_from_query($keys)
    {
        $res = [];
        foreach ($keys as $key) {
            $res[$key] = filter_input(INPUT_GET, $key);
        }
        return $res;
    }
}

if (! function_exists('get_relative_path')) {
    /**
     * Array only.
     *
     * @return string
     */
    function get_relative_path($path)
    {
        return "/public/$path";
    }
}

if (! function_exists('return_json')) {
    /**
     * Return json format.
     *
     * @return string
     */
    function return_json($data, $masterKey = null)
    {
        header('Content-type: application/json');
        if (! empty($masterKey)) {
            $data = is_null($data) ? [] : $data;
            $response[$masterKey] = $data;
            echo json_encode($response);
        } else {
            echo json_encode($data);
        }
    }
}
