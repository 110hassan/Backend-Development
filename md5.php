<?php
$md5 = "Not computed";
if ( isset($_GET['encode']) ) {
    $md5 = hash('md5', $_GET['encode']);
}
?>
<!DOCTYPE html>
<head><title>Charles Severance MD5</title> 
<style>
    body {
        font-family: sans-serif;
    }
</style>
</head>
<body>
<h1>MD5 Maker</h1>
<p>MD5: <?= htmlentities($md5); ?></p>
<form>
<input type="text" name="encode" size="40" />
<input type="submit" value="Compute MD5"/>
</form>

<ul>
    <li>
        <a href="md5.php">Reset</a>
    </li>    
    <li>
        <a href="index.php">Back to Cracking</a>
    </li>    
</ul>
</body>
</html>