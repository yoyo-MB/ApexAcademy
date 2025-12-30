<?php

return [
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    'secret' => env('NOCAPTCHA_SECRET'),
    'version' => 'v2', // or 'v3'
    'lang' => app()->getLocale(), // or 'ar'
];
