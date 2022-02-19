<?php
$rooturl = "http://".$_SERVER['HTTP_HOST']."/Tulio/";

//ob_start("ob_gzhandler");
error_reporting(E_ALL);

// start the session
session_start();

// database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'db_tulio';

// setting up the web root and server root for
// this shopping cart application
$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'library/config.php'), '', $thisFile);
$srvRoot  = str_replace('library/config.php', '', $thisFile);
$webRoot = $rooturl;

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);

// these are the directories where we will store all
// category and product images
define('CATEGORY_IMAGE_DIR', 'assets/');
define('PRODUCT_IMAGE_DIR',  'assets/');

// some size limitation for the category
// and product images

// all category image width must not 
// exceed 75 pixels
//define('MAX_CATEGORY_IMAGE_WIDTH', 1000);

// do we need to limit the product image width?
// setting this value to 'true' is recommended
//define('LIMIT_PRODUCT_WIDTH',     true);

// maximum width for all product image
//define('MAX_PRODUCT_IMAGE_WIDTH', 1000);

// the width for product thumbnail
//define('THUMBNAIL_WIDTH', 170);


// maximum dimension1 for thumbnail
//define('MAX_THUMBNAIL_DIMENSION1',170);

// maximum dimension2 for thumbnail
//define('MAX_THUMBNAIL_DIMENSION2',198);

// maximum dimension1 for product image
//define('MAX_PRODUCT_IMAGE_DIMENSION1',300);

// maximum dimension2 for product image
//define('MAX_PRODUCT_IMAGE_DIMENSION2',600);

// maximum dimension1 for zoom image
//define('MAX_ZOOM_IMAGE_DIMENSION1',1200);

// maximum dimension2 for zoom image
//define('MAX_ZOOM_IMAGE_DIMENSION2',2700);


//do we need to limit the receipt size
//setting this value to 'true' is receommended
//define('LIMIT_RECEIPT_SIZE', true);

// maximum dimension1 for all receipts
//define('MAX_RECEIPT_IMAGE_DIMENSION1',800);

// maximum dimension2 for all receipts
//define('MAX_RECEIPT_IMAGE_DIMENSION2',400);

//maximum dimension1 for all receipts THUMBNAIL
//define('MAX_RECEIPT_THUMBNAIL_DIMENSION1',200);

//maximum dimension2 for all receipts THUMBNAIL
//define('MAX_RECEIPT_THUMBNAIL_DIMENSION2',100);

// since all page will require a database access
// and the common library is also used by all
// it's logical to load these library here
//require_once 'database.php';
//require_once 'common.php';

// get the shop configuration ( name, addres, etc ), all page need it
//$shopConfig = getShopConfig();
?>
