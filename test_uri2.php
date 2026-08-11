<?php
$str = "\xED\xB0\x80";
var_dump(mb_check_encoding($str, 'UTF-8'));
