<?php
namespace App;

use App\Actions\DatabaseAction;
use App\Actions\GenAction;
use App\Actions\ReadCSVAction;

require_once __DIR__ . '/vendor/autoload.php';

set_time_limit(0);

// Подключаем нужные классы
$read = new ReadCSVAction();
$gen = new GenAction();
$database = new DatabaseAction();

$run = $_GET['run'] ?? '';
if ($run === 'true') {
    $database->create();
    $csv = $read->read('raw_db.csv');
    $msc = microtime(true);
    $count = 0;
    foreach ($csv as $value) {
        $shortsUrls = $gen->genShortUrls(20);
        foreach ($shortsUrls as $url) {
            $check = $database->select($url);
            if (!$check) {
                $database->insert($url, $value);
                $count++;
                break;
            }
        }
    }
    $msc = microtime(true) - $msc;
    echo "<pre>";
    print_r('Execute time: ' . ($msc * 1000) . ' ms');
    echo '<br>';
    print_r('Urls: ' . $count);
    echo "</pre>";
}

$code = $_GET['code'] ?? '';
if (strlen($code) === 6) {
    $user = $database->get_id($code);
    if ($user) {
        print_r('Data found: ' . $user[0]['user_id']);
    } else {
        print_r('Data not found for code: ' . $code);
    }
}
