<?php
$tests = [
    rawurlencode("\xDC\x00"),
    rawurlencode("https://purescript.org"),
    rawurlencode("abc ABC"),
    str_replace('%20', '+', rawurlencode("abc ABC")),
    rawurldecode("https%3A%2F%2Fpurescript.org"),
    rawurldecode("https%3A%2F%2Fpurescript.org?search+query"),
    rawurldecode(str_replace('+', ' ', "https%3A%2F%2Fpurescript.org?search+query"))
];
foreach($tests as $t) {
    echo $t . "\n";
}
