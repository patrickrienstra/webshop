<?php
    session_start();

    // define('DBHOST','localhost');
    // define('DBNAME','');
    // define('DBUSER','');
    // define('DBPASS','');

    // //database credentials
    define('DBHOST','localhost');
    define('DBNAME','wideworldimporters');
    define('DBUSER','webuser');
    define('DBPASS','zPlv47aZ6N2bAyJL');
try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    $_SESSION['e']='Error 101: PDO_exception';
}

?>
