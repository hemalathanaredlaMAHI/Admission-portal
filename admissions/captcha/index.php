<?php
session_start();
$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$_SESSION['captcha'] = simple_php_captcha( array(
	'min_font_size' => 18,
	'max_font_size' => 28,
	'color' => '#666'
));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Example &raquo; A simple PHP CAPTCHA script</title>
    <style type="text/css">
        pre {
            border: solid 1px #bbb;
            padding: 10px;
            margin: 2em;
        }

        img {
            border: solid 1px #ccc;
            margin: 0 2em;
        }
    </style>
</head>
<body>
   



    <p>
        <?php
        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';

        ?>
    </p>



</body>
</html>