<!DOCTYPE html>
<head><title>Charles Severance MD5 Cracker</title>
<style>
    body {
        font-family: sans-serif;
    }
</style>
</head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and 
check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
error_reporting(E_ALL ^ E_WARNING); 
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "abcdefghijklmnopqrstuvwxyz";
    $pin = "0123456789";
    $show = 15;    //15 attempts

    // Outer loop to go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($pin); $i++ ) {
        $digit1 = $pin[$i];   // The first of two characters

        // Our inner loop. Note the use of new variables
        // $j and $ch2 
        for($j=0; $j<strlen($pin); $j++ ) {
            $digit2 = $pin[$j]; // Our second character



            for($k=0; $k<strlen($pin); $k++){
                $digit3 = $pin[$k];  //our third character


                for($l=0; $l<strlen($pin); $l++){
                    $digit4 = $pin[$l];  //our fourth character


                    // Concatenate the two characters together to 
                    // form the "possible" pre-hash text
                    $try = $digit1.$digit2.$digit3.$digit4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }

                    $count++;


                }
            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Total Checks: ";
    print $count;
    print "\n";
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>PIN: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" value="<?= $md5 ?>" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">Make an MD5 PIN</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>