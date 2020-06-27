<?php
function getConfig(): array {
    $b_config_file = file(getenv("HOME") . "/.basilisk_ii_prefs");
    $b_config = array();
    foreach($b_config_file as $option) {
        $o = explode(" ", trim($option));
        $b_config[$o[0]] = $o[1];

    }
    return $b_config;
}

function saveConfig($config): void {
    $config_str = "";

    $props = array_keys($config);
    foreach($props as $p) {
        $config_str = $config_str . $p . " " . $config[$p] . "\n";
    }
    #echo $config_str;
    file_put_contents(getenv("HOME") . "/.basilisk_ii_prefs", $config_str);
}