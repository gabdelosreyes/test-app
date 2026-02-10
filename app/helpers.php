<?php

if (! function_exists('na')) {
    function na($value)
    {
        return filled($value) ? $value : 'N/A';
    }
}
