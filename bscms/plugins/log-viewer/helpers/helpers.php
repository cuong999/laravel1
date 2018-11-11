<?php

if (!function_exists('log_viewer')) {
    /**
     * Get the LogViewer instance.
     *
     * @return \Bytesoft\LogViewer\Contracts\LogViewer
     * @author ARCANEDEV
     */
    function log_viewer()
    {
        return app('botble::log-viewer');
    }
}

if (!function_exists('log_levels')) {
    /**
     * Get the LogLevels instance.
     *
     * @return \Bytesoft\LogViewer\Contracts\Utilities\LogLevels
     * @author ARCANEDEV
     */
    function log_levels()
    {
        return app('botble::log-viewer.levels');
    }
}

if (!function_exists('log_menu')) {
    /**
     * Get the LogMenu instance.
     *
     * @return \Bytesoft\LogViewer\Contracts\Utilities\LogMenu
     * @author ARCANEDEV
     */
    function log_menu()
    {
        return app('botble::log-viewer.menu');
    }
}

if (!function_exists('log_styler')) {
    /**
     * Get the LogStyler instance.
     *
     * @return \Bytesoft\LogViewer\Contracts\Utilities\LogStyler
     * @author ARCANEDEV
     */
    function log_styler()
    {
        return app('botble::log-viewer.styler');
    }
}

if (!function_exists('extract_date')) {
    /**
     * Extract date from string (format : YYYY-MM-DD).
     *
     * @param  string $string
     *
     * @return string
     * @author ARCANEDEV
     */
    function extract_date($string)
    {
        return preg_replace(
            '/.*(' . REGEX_DATE_PATTERN . ').*/',
            '$1',
            $string
        );
    }
}