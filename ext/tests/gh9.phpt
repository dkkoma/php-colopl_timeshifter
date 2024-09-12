--TEST--
Check GitHub PR - #7 (wrong createFromFormat)
--EXTENSIONS--
colopl_timeshifter
--FILE--
<?php

$current = date_create_from_format();
\Colopl\ColoplTimeShifter\register_hook(new DateInterval('P1M'));
$shifted = date_create_from_format('d', '10');
echo $current->diff($shifted)->format('%y-%m-%d %h:%i:%s.%F'), \PHP_EOL;
\Colopl\ColoplTimeShifter\unregister_hook();

?>
--EXPECTF--
0-0-0 %d:%d:%d.000000
