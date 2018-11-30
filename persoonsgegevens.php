<?php
require_once 'inc/package.inc.php';
require_once 'inc/config.php';

$query='SELECT PersonID, FullName, PhoneNumber, EmailAddress FROM people';

if(isset($_SESSION['logged_in'])){

}

$view='views/persoonsgegevens.php';
$sectionActive='Cart';
require_once $template;