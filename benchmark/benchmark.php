<?php
require __DIR__.'/../vendor/autoload.php';

use Hidehalo\Nanoid\Client;

$nano = new Client();
$loop = 1e5;
$alphabet = 'abcdefghijklmnopqrstuvwxyz';
$counter = [];

$timeStated = microtime(true);
for ($i = 0; $i < $loop; $i++) {
    $alpha = $nano->formattedId($alphabet, 1);
    !isset($counter[$alpha]) and $counter[$alpha] = 0;
    isset($counter[$alpha]) and $counter[$alpha]++;
}
$timeFinished = microtime(true);
$deltaTime = $timeFinished - $timeStated;

ksort($counter);
printf("Total time used: %.3f ms\n", 1e3 * $deltaTime);
printf("AVG time used: %.3f ms\n", 1e3 * $deltaTime/$loop);
echo "Result:".PHP_EOL;
print_r($counter);
