<?php
if (!function_exists('check_radio')) {
    function check_radio($name, $value, $default = null)
    {
        $old = old($name);
        if (!is_null($default) && empty($old)) return 'checked';
        if ($old == $value) return 'checked';
    }
}

if (!function_exists('check_radio_edit')) {
    function check_radio_edit($status, $value)
    {
        if ($status == $value) return 'checked';
    }
}

if (!function_exists('check_radio_class')) {
    function check_radio_class($status, $value)
    {
        if ($status == $value) {
            return 'primary';
        } else {
            return 'default';
        }
    }
}

if (!function_exists('dl_images')) {
    function dl_images($class, $target, $size)
    {
        if ($size == 'tall') {
            $filename = file_get_contents('http://lorempixel.com/640/480');
        } elseif ($size == 'small') {
            $filename = file_get_contents('http://lorempixel.com/128/128');
        } else {
            $filename = file_get_contents('http://lorempixel.com/640/480');
        }

        $uri = str_random(30) . '.jpg';

        File::put($target . '/' . $uri, $filename);

        $class->url_thumbnail = $uri;

        $class->save();
    }
}