<?php

function getConfig($config_file_location) {
    $b_config_file = file($config_file_location);
    $b_config = array();
    foreach($b_config_file as $option) {
        $o = explode(" ", trim($option));
        $b_config[$o[0]] = $o[1];

    }
    return $b_config;
}

function saveConfig($config, $config_file_location) {
    $config_str = "";

    $props = array_keys($config);
    foreach($props as $p) {
        $config_str = $config_str . $p . " " . $config[$p] . "\n";
    }
    #echo $config_str;
    file_put_contents($config_file_location, $config_str);
}