<?php
require __DIR__.'/../vendor/autoload.php';

use Hidehalo\Nanoid\Client;

$timerStartAt = microtime(true);
$memInit = memory_get_usage(true);

$nano = new Client();
$size = 5;
//Random bytes that is the performance killer,open a PR if you have better implements plz!
printf("%s\n", str_repeat('-', 64));
$start = microtime(true);
random_bytes($size);
$end = microtime(true);
$delta = ($end - $start) * 1e6 * 1e-3;
printf("Generate random bytes used: %.6s ms ...\n", $delta);

//@see https://github.com/ai/nanoid/blob/master/index.js
$start = microtime(true);
$id = $nano->generate($size);
$end = microtime(true);
$delta = ($end - $start) * 1e6 * 1e-3;
printf("%s\n", str_repeat('-', 64));
printf("That is nanoid.id: %s\nGenerated it use time %.6f ms\n", $id, $delta);
printf("%s\n", str_repeat('-', 64));

//@see https://github.com/ai/nanoid/blob/master/format.js
$start = microtime(true);
$id = $nano->generate($size, Client::MODE_DYNAMIC);
// usleep(40);
$end = microtime(true);
$delta = ($end - $start) * 1e6 * 1e-3;
printf("That is more safer nanoid.id: %s\nGenerated it use time %.6f ms\n", $id, $delta);
printf("%s\n", str_repeat('-', 64));