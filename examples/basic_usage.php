<?php
require __DIR__.'/../vendor/autoload.php';

use Hidehalo\Nanoid\Client;

$nano = new Client();
$size = 5;
//Random bytes that is the performance killer,
//open a PR if you have more fast and secure implements plz!
printf("%s\n", str_repeat('-', 64));
$start = microtime(true);
random_bytes($size);
$end = microtime(true);
$delta = ($end - $start) * 1e3;
printf("Generate random bytes used: %.6f ms ...\n", $delta);

$id = $nano->generateId($size);
printf("%s\n", str_repeat('-', 64));
printf("That is nanoid.id: %s\n", $id);
printf("%s\n", str_repeat('-', 64));

$id = $nano->generateId($size, Client::MODE_DYNAMIC);
printf("That is more safer nanoid.id: %s\n", $id);
printf("%s\n", str_repeat('-', 64));
