<?php

return [
    '_encodeURIComponent' => function($fail, $succeed, $input) {
        try {
            if (!mb_check_encoding($input, 'UTF-8')) return $fail(new \Exception("URI malformed"));
            return $succeed(rawurlencode($input));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_decodeURIComponent' => function($fail, $succeed, $input) {
        try {
            $decoded = rawurldecode($input);
            if (!mb_check_encoding($decoded, 'UTF-8')) return $fail(new \Exception("URI malformed"));
            return $succeed($decoded);
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_encodeFormURLComponent' => function($fail, $succeed, $input) {
        try {
            if (!mb_check_encoding($input, 'UTF-8')) return $fail(new \Exception("URI malformed"));
            return $succeed(str_replace('%20', '+', rawurlencode($input)));
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_decodeFormURLComponent' => function($fail, $succeed, $input) {
        try {
            $decoded = rawurldecode(str_replace('+', ' ', $input));
            if (!mb_check_encoding($decoded, 'UTF-8')) return $fail(new \Exception("URI malformed"));
            return $succeed($decoded);
        } catch (\Throwable $e) {
            return $fail($e);
        }
    },

    '_encodeURI' => function($fail, $succeed, $input) {
        try {
            if (!mb_check_encoding($input, 'UTF-8')) return $fail(new \Exception("URI malformed"));
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
            $decoded = rawurldecode($input);
            if (!mb_check_encoding($decoded, 'UTF-8')) return $fail(new \Exception("URI malformed"));
            return $succeed($decoded);
        } catch (\Throwable $e) {
            return $fail($e);
        }
    }
];
