<?php
$error = false;
$md5 = false;
$code = "";
if ( isset($_GET['code']) ) {
    $code = $_GET['code'];
    if ( strlen($code) != 4 ) {
        $error = "Input must be exactly 4 characters";
    } else if ( ! is_numeric($code) ) {
        $error = "Input must be numeric";
    } else {
        $md5 = hash('md5', $code);
    }
}
?>
<!DOCTYPE html>
<head><title>Charles Severance PIN Code</title>
<style>
    body {
        font-family: sans-serif;
    }
</style>
</head>
<body>
<h1>MD5 PIN Maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>
<form>
<input type="text" name="code" value="<?= htmlentities($code) ?>"/>
<input type="submit" value="Compute MD5 for PIN"/>
</form>
<ul>

    <li>
        <a href="makecode.php">Reset this page</a>
    </li>
    <li>
    <a href="index.php">Back to Cracking</a>
    </li>    

</ul>
</body>
</html>