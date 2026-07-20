<?php

return [
    '_encodeURIComponent' => function($fail, $succeed, $input) {
        try {
            return $succeed(rawurlencode($input));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_decodeURIComponent' => function($fail, $succeed, $input) {
        try {
            return $succeed(rawurldecode($input));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_encodeFormURLComponent' => function($fail, $succeed, $input) {
        try {
            return $succeed(str_replace('%20', '+', rawurlencode($input)));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_decodeFormURLComponent' => function($fail, $succeed, $input) {
        try {
            return $succeed(rawurldecode(str_replace('+', ' ', $input)));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_encodeURI' => function($fail, $succeed, $input) {
        try {
            // Very naive encodeURI for PHP since urlencode/rawurlencode encode everything
            $reserved = [
                '%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')',
                '%3B' => ';', '%2F' => '/', '%3F' => '?', '%3A' => ':', '%40' => '@',
                '%26' => '&', '%3D' => '=', '%2B' => '+', '%24' => '$', '%2C' => ',',
                '%23' => '#', '%5B' => '[', '%5D' => ']'
            ];
            return $succeed(strtr(rawurlencode($input), $reserved));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_decodeURI' => function($fail, $succeed, $input) {
        try {
            return $succeed(rawurldecode($input));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    }
];
