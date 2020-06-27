<html lang="en">
<head>
    <title>Aura - System Information</title>
</head>
<body>
<center>
    <img src="static/aura-centre-white.png" width="768" height="295"  alt="Aura Logo"/><br />
    <a href="/">Back to Home</a>
    <hr /> <br />
    <p><b>Aura Build String:</b><br /> <span><?php $file = file_get_contents('/aura-build-info'); echo $file; ?></span></p>
    <p><b>CPU:</b> <?php $file = file('/proc/cpuinfo'); echo substr($file[4], 13); ?></p>
    <p><b>Mem:</b> <?php exec("free -mtlh", $output); echo explode("M", substr($output[5], 7))[0]; ?>M</p>

</center>
</body>
</html>