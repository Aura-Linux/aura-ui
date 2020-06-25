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

function saveConfig(): void {
    
}