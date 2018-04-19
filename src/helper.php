<?php

if (! function_exists('__')) {
    /**
     * Translate the given message.
     *
     * @param  string  $key
     * @param  string  $locale
     * @param  bool  $fallback
     * @return string|array
     * @throws \Exception
     */
    function __($key, $locale = null, $fallback = true)
    {
        return \Phplib\Translate::getInstance()->get($key, $locale, $fallback);
    }
}

if (! function_exists('trans')) {
    /**
     * Translate the given message.
     *
     * @param  string  $key
     * @param  string  $locale
     * @param  bool  $fallback
     * @return string|array
     * @throws \Exception
     */
    function trans($key, $locale = null, $fallback = true)
    {
        return \Phplib\Translate::getInstance()->get($key, $locale, $fallback);
    }
}