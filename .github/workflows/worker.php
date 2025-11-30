<?php

$group1 = [
    "https://nc-lotory.kesug.com/niyamitakelasa30sec_browser_trigger.php",
];

$group2 = [
    "https://nc-lotory.kesug.com/niyamitakelasa_browser_trigger.php",
    "https://nc-lotory.kesug.com/ktrx_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_aidudi_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_kemuru_browser_trigger.php"
];

$group3 = [
    "https://nc-lotory.kesug.com/niyamitakelasa_drei_browser_trigger.php",
    "https://nc-lotory.kesug.com/ktrx3_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_aidudi_drei_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_kemuru_drei_browser_trigger.php"
];

$group4 = [
    "https://nc-lotory.kesug.com/niyamitakelasa_funf_browser_trigger.php",
    "https://nc-lotory.kesug.com/ktrx5_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_aidudi_funf_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_kemuru_funf_browser_trigger.php"
];

$group5 = [
    "https://nc-lotory.kesug.com/ktrx10_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_aidudi_zehn_browser_trigger.php",
    "https://nc-lotory.kesug.com/niyamitakelasa_kemuru_zehn_browser_trigger.php"
];

$intervals = [
    'group1' => 28,
    'group2' => 58,
    'group3' => 178,
    'group4' => 298,
    'group5' => 597
];

$lastRun = [
    'group1' => 0,
    'group2' => 0,
    'group3' => 0,
    'group4' => 0,
    'group5' => 0
];

function hitUrls($urls, $label) {
    echo "[" . date("H:i:s") . "] Running $label\n";

    foreach ($urls as $i => $url) {
        $result = @file_get_contents($url);
        $code = $http_response_header[0] ?? "No Response";

        echo "  → Link " . ($i+1) . ": $code\n";
    }
}

echo "24/7 URL Trigger Worker Started...\n";

while (true) {
    $now = time();

    if ($now - $lastRun['group1'] >= $intervals['group1']) {
        hitUrls($group1, "Group 1 (28 sec)");
        $lastRun['group1'] = $now;
    }

    if ($now - $lastRun['group2'] >= $intervals['group2']) {
        hitUrls($group2, "Group 2 (58 sec)");
        $lastRun['group2'] = $now;
    }

    if ($now - $lastRun['group3'] >= $intervals['group3']) {
        hitUrls($group3, "Group 3 (178 sec)");
        $lastRun['group3'] = $now;
    }

    if ($now - $lastRun['group4'] >= $intervals['group4']) {
        hitUrls($group4, "Group 4 (298 sec)");
        $lastRun['group4'] = $now;
    }

    if ($now - $lastRun['group5'] >= $intervals['group5']) {
        hitUrls($group5, "Group 5 (597 sec)");
        $lastRun['group5'] = $now;
    }

    sleep(1);
}
