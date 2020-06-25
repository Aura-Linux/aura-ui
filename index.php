<html lang="en">
    <head>
        <title>Aura Management Interface</title>
    </head>
    <body>
        <?php
        require "./basilisk_config.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST["launchLinux"])) {
                // Super unsafe change this
                $output = exec($_POST["launchLinux"] . " > /dev/null &");
                echo $output;
                echo "<p>OK.</p>";
                echo "<a href=\"index.php\" >Back to Main Menu</a>";
            } else {
                $config = getConfig();
                //$config["screen"] =
                var_dump($_POST["screen"]);
                echo "<hr /> <h1>Updated. Please restart your system!</h1>";
            }
        } else {
        ?>
            <h1>Aura Management Interface</h1>
            <hr />
            <?php
            $config = getConfig();
            $resolution = explode("/", $config["screen"]);
            ?>
            <h2>Launch X11 Application</h2>
            <form action="index.php" method="post">
                <input type="hidden" id="launchLinux" name="launchLinux" value="DISPLAY=127.0.0.1:1 xlogo">
                <input type="submit" value="Launch XLogo">
            </form>
            <p>Note: Make sure to start MacX beforehand! (Found in Macintosh HD)</p>
            <hr />
            <h2>Settings</h2>
            <form action="index.php" method="post">
                Resolution: <input type="text" name="screen" value="<?php echo $resolution[1] . "x" . $resolution[2] ?>"><br>
                <input type="submit" value="Update Settings">
            </form>
            <p style="color: red">Public Beta 3 - For evaluation purposes only.</p>
        <?php
        }
        ?>
    </body>
</html>

