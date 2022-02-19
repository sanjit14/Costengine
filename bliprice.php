<?php
require_once 'library/config.php';
require_once "library/database.php";
require_once "library/functions.php";
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$pricing = NULL;
$qty=$catid=2;
$l=$w=$opacityreq=$mount=$motorized=$powertype=$controltype=0;
if(isset($_POST["catid"]) && ($_POST["catid"] != NULL)) $catid = $_POST["catid"];
if(isset($_POST["pid"]) && ($_POST["pid"] != NULL)) $pid = $_POST["pid"];
if(isset($_POST["qty"]) && ($_POST["qty"] != NULL)) $qty = $_POST["qty"];
if(isset($_POST["wlength"]) && ($_POST["wlength"] != NULL)) $l = $_POST["wlength"];
if(isset($_POST["wwidth"]) && ($_POST["wwidth"] != NULL)) $w = $_POST["wwidth"];
if(isset($_POST["opacityreq"]) && ($_POST["opacityreq"] != NULL)) $opacityreq = $_POST["opacityreq"];
if(isset($_POST["mount"]) && ($_POST["mount"] != NULL)) $mount = $_POST["mount"];
if(isset($_POST["motorized"]) && ($_POST["motorized"] != NULL)) $motorized = $_POST["motorized"];
if(isset($_POST["powertype"]) && ($_POST["powertype"] != NULL)) $powertype = $_POST["powertype"];
if(isset($_POST["controltype"]) && ($_POST["controltype"] != NULL)) $controltype = $_POST["controltype"];


//Product Detail
$pinfo = getproductdetail($pid);
$pclist = getproductcolours($pinfo["pd_id"]);
$fbinfo = getproductfabric($pinfo["pd_id"]);
$acrtandwtlist = getaddlcomprtandwt();
for($i=0;$i<count($acrtandwtlist);$i++)
{
    $acrtandwt = explode("', '",$acrtandwtlist[$i]);
    if($i==1) {$s = $acrtandwt[0]; $sw = $acrtandwt[1];}
    if($i==5) {$iw = $acrtandwt[0]; $iww = $acrtandwt[1];}
    if($i==6) {$ow = $acrtandwt[0]; $oww = $acrtandwt[1];}
    if($i==7) {$lb = $acrtandwt[0]; $lbw = $acrtandwt[1];}
    if($i==8) {$ld = $acrtandwt[0]; $ldw = $acrtandwt[1];}
    if($i==9) {$ls = $acrtandwt[0]; $lsw = $acrtandwt[1];}
    if(($i==15) && ($catid == 2)) {$wpr = $acrtandwt[0]; $wpw = $acrtandwt[1];}
    if(($i==16) && ($catid == 2)) {$hpr = $acrtandwt[0]; $hpw = $acrtandwt[1];}
}
//echo rand()."<br>"."Product is ".$cat."<br>"."Type is ".$typ."<br>"."Qty = ".$qty."<br>"."Number of Curtains = ".$nc."<br>"."Length = ".$l."<br>"."Width = ".$w."<br>"."Opacity Requirement = ".$opacityreq."<br>"."Mount = ".$mount."<br>"."Motorized = ".$motorized."<br>"."cf = ".$cf."<br>"."o = ".$o."<br>"."ws = ".$ws."<br>"."fr = ".$fr."<br>"."fw = ".$fw."<br>"."vr = ".$vr."<br>"."lg = ".$lg."<br>"."s = ".$s."<br>"."lc = ".$lc."<br>"."ct = ".$ct."<br>"."cw = ".$cw."<br>"."iw = ".$iw."<br>"."ow = ".$ow."<br>";
if($catid == 2) $pricing = getblindsprice($pid,$pinfo["pd_sc"],$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$pinfo["pd_cf"],$pinfo['pd_o'],$pinfo['pd_ws'],$fbinfo['fabricrate'],$fbinfo['pdf_fw'],$pinfo['pd_unit_wt'],$pinfo['pd_pkg_wt'],$pinfo['pd_va_rt'],$s,$iw,$ow,$lb,$ld,$ls,$wpr,$hpr,$sw,$iww,$oww,$lbw,$ldw,$lsw,$wpw,$hpw);
echo $pricing["TotalPrice (Rs.)"];
/*foreach($pricing as $key => $value) {
    echo "<br>".$key.": ".$value;
  }*/

/*$courierinfo = getcouriercalculations();
echo "<br><br>"."Courier Calculations";
foreach($courierinfo as $key => $value) {
  echo "<br>".$key.": ".$value;
}*/
?>