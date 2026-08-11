<?php
$str = rawurldecode("%ED%B0%80");
var_dump(mb_check_encoding($str, 'UTF-8'));
