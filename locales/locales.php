<?php
if (isset($_GET["lang"])) {
    setcookie("lang", $_GET["lang"], time() + (3600 * 24 * 365));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_COOKIE["lang"]) && $_COOKIE["lang"] == "en") {
    require_once (dirname(__FILE__) . '/en.php');

} else {
    require_once (dirname(__FILE__) . '/fr.php');
}