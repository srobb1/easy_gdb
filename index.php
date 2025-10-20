<?php
$uri = $_SERVER['REQUEST_URI']; // e.g. "/bats/index.php"
$parts = explode('/', trim($uri, '/')); 
$group = $parts[0];


$conf_path='/var/www/html/'.$group.'/'.$group.'_data/egdb_conf/';
?>
<?php include_once "$conf_path/easyGDB_conf.php"?>
<?php include_once realpath("header.php");?>

      <?php include_once realpath("$custom_text_path/welcome_text.php");?>

<?php include_once realpath("$easy_gdb_path/footer.php");?>
