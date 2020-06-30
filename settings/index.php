<html lang="en">
    <head>
        <title>Aura Management Interface</title>
    </head>
    <body>
        <center>
            <?php
            require "./basilisk_config.php";
            $config_file_location = "/root/.basilisk_ii_prefs";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST["launchLinux"])) {
                    // Super unsafe change this
                    //$output = exec($_POST["launchLinux"] . " > /dev/null &");
                    //echo $output;
                    echo "<p>OK.</p>";
                    echo "<a href=\"/settings\">Back to Settings</a>";
                } else {
                    $config = getConfig($config_file_location);
                    $config["screen"] = "win/" . $_POST["screen_width"] . "/" . $_POST["screen_height"];
                    $config["ramsize"] = $_POST["ramsize"];
                    saveConfig($config, $config_file_location);
                    echo "<hr /> <h1>Updated. Please restart your system!</h1>";
                }
            } else {
            ?>
                <h1>Aura Management Interface</h1>
                <a href="/">Back to Home</a>
                <hr />
                <?php
                $config = getConfig($config_file_location);
                $resolution = explode("/", $config["screen"]);
                ?>
                <!--<h2>Launch X11 Application</h2>
                <form method="post">
                    <input type="hidden" id="launchLinux" name="launchLinux" value="DISPLAY=127.0.0.1:1 xlogo">
                    <input type="submit" value="Launch XLogo">
                </form>
                <p>Note: Make sure to start MacX beforehand! (Found in Macintosh HD)</p>
                <hr /> -->
                <h2>Settings</h2>
                <form method="post">
                    Resolution: <input type="text" name="screen_width" value="<?php echo $resolution[1] ?>">
                    x
                    <input type="text" name="screen_height" value="<?php echo $resolution[2] ?>">
                    <br /><br />
                    RAM: <input type="text" name="ramsize" value="<?php echo $config["ramsize"] ?>"> (bytes)
                    <br /><br />
                    <input type="submit" value="Update Settings">
                </form>
            <?php
            }
            ?>
        </center>
    </body>
</html>

