<?php

function getcategory($catid){
    $sql = "SELECT c.cat_nm, c.cat_ds, c.cat_img1 FROM tbl_category c WHERE c.cat_id =".$catid;
    $result = dbQuery($sql);
  
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $catinfo = array("cat_nm"=>$row["cat_nm"],
                       "cat_ds"=>$row["cat_ds"],
                       "cat_img1"=>$row["cat_img1"]);
      return $catinfo;
    }
    else
      return NULL;
}

function getcategorylist(){
  $sql = "SELECT c.cat_id,c.cat_nm, c.cat_ds, c.cat_img1 
          FROM tbl_category c 
          ORDER BY c.cat_id ASC";
  $result = dbQuery($sql);
  $n = dbNumRows($result);
  if (($result != NULL) && ($n > 0)) 
  {
    for($i=0;$i<$n;$i++)
    {
      // output data of each row
      $row = dbFetchAssoc($result);
      $catlist[$i] = array("cat_id"=>$row["cat_id"],
                          "cat_nm"=>$row["cat_nm"],
                          "cat_ds"=>$row["cat_ds"],
                          "cat_img1"=>$row["cat_img1"]);
    }
    return $catlist;
  }
  else
    return NULL;
}

function getproductdetail($pid)
{
    $sql = "SELECT p.p_cd, p.p_img1, p.p_img2, p.p_img3, p.p_img4, p.p_img5, p.p_img6, p.p_img7,
                 pd.pd_id,pd.pd_sc, pd.pd_nm, pd.pd_ds, pd.pd_ts, pd.pd_tq, pd.pd_am, 
                 pd.pd_de, pd.pd_kw, pd.pd_cf, pd.pd_o, pd.pd_ws, pd.pd_pl, pd.pd_unit_wt, 
                 pd.pd_pkg_wt, pd.pd_va_rt, pd.pd_pr
            FROM tbl_product p, tbl_product_detail pd
            WHERE pd.p_id = p.p_id
            AND p.p_id = ".$pid ;
    $result = dbQuery($sql);
    $n = dbNumRows($result);
    if (($result != NULL) && ($n > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $pinfo = array("p_cd"=>$row["p_cd"],
                     "p_img1"=>$row["p_img1"],
                     "p_img2"=>$row["p_img2"],
                     "p_img3"=>$row["p_img3"],
                     "p_img4"=>$row["p_img4"],
                     "p_img5"=>$row["p_img5"],
                     "p_img6"=>$row["p_img6"],
                     "p_img7"=>$row["p_img7"],
                     "pd_id"=>$row["pd_id"],
                     "pd_sc"=>$row["pd_sc"],
                     "pd_nm"=>$row["pd_nm"],
                     "pd_ds"=>$row["pd_ds"],
                     "pd_ts"=>$row["pd_ts"],
                     "pd_tq"=>$row["pd_tq"],
                     "pd_am"=>$row["pd_am"],
                     "pd_de"=>$row["pd_de"],
                     "pd_kw"=>$row["pd_kw"],
                     "pd_cf"=>$row["pd_cf"],
                     "pd_o"=>$row["pd_o"],
                     "pd_ws"=>$row["pd_ws"],
                     "pd_pl"=>$row["pd_pl"],
                     "pd_unit_wt"=>$row["pd_unit_wt"],
                     "pd_pkg_wt"=>$row["pd_pkg_wt"],
                     "pd_va_rt"=>$row["pd_va_rt"],
                     "pd_pr"=>$row["pd_pr"]
                    );
      return $pinfo;
    }
    else
      return NULL;
}


function getproductlist($catid)
{
    //Product List
    $sql = "SELECT p.p_id, p.p_cd, p.p_img1, p.p_img2,p.p_img3,p.p_img4,p.p_img5,p.p_img6,p.p_img7  
            FROM tbl_product p, tbl_category c
            WHERE p.cat_id = c.cat_id
            AND c.cat_id =".$catid;
    $result = dbQuery($sql);
    $n = dbNumRows($result);
    if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $plist[$i] = array("p_id"=>$row["p_id"],
                               "p_cd"=>$row["p_cd"],
                               "p_img1"=>$row["p_img1"],
                               "p_img2"=>$row["p_img2"],
                               "p_img3"=>$row["p_img3"],
                               "p_img4"=>$row["p_img4"],
                               "p_img5"=>$row["p_img5"],
                               "p_img6"=>$row["p_img6"],
                               "p_img7"=>$row["p_img7"]);
            //echo $pimg1list[$i];
        }
        return $plist;
    }
    else
        return NULL;
}

function getproductfabric($pdid)
{
    $sql = "SELECT pdf.fb_cd, SUM((pdf.pdf_pct/100)*pdf.pdf_rt) AS fabricrate, pdf.pdf_fw
            FROM tbl_product_detail_fabrics pdf
            WHERE pdf.pd_id = ".$pdid;
    $result = dbQuery($sql);
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $fbinfo = array("fb_cd"=>$row["fb_cd"],
                      "fabricrate"=>$row["fabricrate"],
                      "pdf_fw"=>$row["pdf_fw"]);
      return $fbinfo;
    }
    else
      return NULL;
}

function getemployee($eid){
    $sql = "SELECT e.e_nm, e.e_un, e.e_pw 
            FROM tbl_employee e 
            WHERE e.e_id =".$eid;
    $result = dbQuery($sql);
  
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $einfo = array("e_nm"=>$row["e_nm"],"e_un"=>$row["e_un"], "e_pw"=>$row["e_pw"]);
      return $einfo;
    }
    else
      return NULL;
}

function getprojectshortlist($aid)
{
    $sql = "SELECT ps.ps_id, ps.a_id,ps.p_id, ps.pa_id, pa.pa_nm
            FROM tbl_projectshortlist ps, tbl_architect a, tbl_project_area pa
            WHERE ps.pa_id = pa.pa_id
            AND ps.a_id = ".$aid."
            GROUP BY pa.pa_nm
            ORDER BY pa.pa_nm";
    $result = dbQuery($sql);
    $n = dbNumRows($result);
    if (($result != NULL) && ($n > 0)) {
      for($i=0;$i<$n;$i++)
      {
        // output data of each row
        $row = dbFetchAssoc($result);
        $pslist = array("ps_id"=>$row["ps_id"],
                       "p_id"=>$row["p_id"],
                       "pa_id"=>$row["pa_id"],
                       "pa_nm"=>$row["pa_nm"]);
      }
      return $pslist;
    }
    else
      return NULL;
}

function shortlist($aid,$pid)
{
  $sql = "INSERT INTO tbl_project_shortlist
          (a_id,p_id)
          VALUES ($aid,$pid)";
  $result = dbQuery($sql);
}

function associatetoshortlist($aid,$pid,$paid)
{
  $sql = "INSERT INTO tbl_project_shortlist
          (a_id,p_id,pa_id)
          VALUES ($aid,$pid,$paid)";
  $result = dbQuery($sql);
}

function addprojectarea($paid,$pads)
{
  $sql = "INSERT INTO tbl_project_area
          (pa_nm,pa_ds)
          VALUES ($paid,'$pads')";
  $result = dbQuery($sql);
}

function getarchitect($aid){
    $sql = "SELECT a.a_nm, a.a_un, a.a_pw 
            FROM tbl_architect a 
            WHERE a.a_id =".$aid;
    $result = dbQuery($sql);
  
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $ainfo = array("a_nm"=>$row["a_nm"],"a_un"=>$row["a_un"], "a_pw"=>$row["a_pw"]);
      return $ainfo;
    }
    else
      return NULL;
}

function getcolourlist($cid){
    $sql = "SELECT co.c_id, co.c_nm, co.c_no
            FROM tbl_colour co";
    $result = dbQuery($sql);
    $n = dbNumRows($result);  
    if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $clist[$i] = array("c_id"=>$row["c_id"],
                               "c_nm"=>$row["c_nm"],
                               "c_no"=>$row["c_no"]);
        }
        return $clist;
    }
    else
        return NULL;
}

function getproductcolours($pdid)
{
    $sql = "SELECT co.c_id, co.c_nm, pdc.pdc_nm, co.c_no
            FROM tbl_colour co, tbl_product_detail_colours pdc
            WHERE co.c_id = pdc.c_id
            AND pdc.pd_id = ".$pdid;
    $result = dbQuery($sql);
    $n = dbNumRows($result);  
    if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $pclist[$i] = array("c_id"=>$row["c_id"],
                               "c_nm"=>$row["c_nm"],
                               "pdc_nm"=>$row["pdc_nm"],
                               "c_no"=>$row["c_no"]);
        }
        return $pclist;
    }
    else
        return NULL;
}

function getprojectarea($paid)
{
    $sql = "SELECT pa.pa_id, pa.pa_nm, pa.pa_ds
            FROM tbl_project_area pa
            WHERE pa.pa_id = ".$paid;
    $result = dbQuery($sql);
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $painfo = array("pa_id"=>$row["pa_id"],"pa_nm"=>$row["pa_nm"], "pa_ds"=>$row["pa_ds"]);
      return $painfo;
    }
    else
      return NULL;
}

function getprojectarealist()
{
    $sql = "SELECT pa.pa_id, pa.pa_nm, pa.pa_ds
            FROM tbl_project_area pa";
    $result = dbQuery($sql);
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $palist = array("pa_id"=>$row["pa_id"],
                      "pa_nm"=>$row["pa_nm"],
                      "pa_ds"=>$row["pa_ds"]);
      return $palist;
    }
    else
      return NULL;
}

function getfurnishingunit($fuid)
{
    $sql = "SELECT fu.fu_id, fu.fu_nm, fu.fu_ds, fu.fu_l, fu.fu_w
            FROM tbl_furnishing_unit fu
            WHERE fu.fu_id = ".$fuid;
    $result = dbQuery($sql);
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
      $row = dbFetchAssoc($result);
      $fuinfo = array("fu_id"=>$row["fu_id"],"fu_nm"=>$row["fu_nm"], "fu_ds"=>$row["fu_ds"], "fu_l"=>$row["fu_l"], "fu_w"=>$row["fu_w"]);
      return $fuinfo;
    }
    else
      return NULL;
}

function getfurnishingunitslist($paid)
{
    $sql = "SELECT fu.fu_id, fu.fu_nm, fu.fu_ds, fu.fu_l, fu.fu_w
            FROM tbl_furnishing_unit fu
            WHERE fu.pa_id = ".$paid;
    $result = dbQuery($sql);
    $n = dbNumRows($result);  
    if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $fulist[$i] = array("fu_id"=>$row["fu_id"],
                               "fu_nm"=>$row["fu_nm"],
                               "fu_ds"=>$row["fu_ds"],
                               "fu_l"=>$row["fu_l"],
                               "fu_w"=>$row["fu_w"]);
        }
        return $fulist;
    }
    else
        return NULL;
}

function getfurnishingunitproducts($fuid)
{
  $sql = "SELECT fp.fp_id, fp.fu_id, fp.pd_id
          FROM tbl_furnishing_unit_products fp
          WHERE fp.fu_id = ".$fuid;
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
    for($i=0;$i<$n;$i++)
    {
      // output data of each row
      $row = dbFetchAssoc($result);
      $fplist[$i] = array("fp_id"=>$row["fp_id"],
                          "fu_id"=>$row["fu_id"],
                          "pd_id"=>$row["pd_id"]);
    }
    return $fulist;
  }
  else
    return NULL;
}

function getoption($opid)
{
  $sql = "SELECT o.op_id, o.pa_id, o.op_nm, o.op_ds, o.op_pr, o.op_flag
          FROM tbl_option o
          WHERE o.op_id = ".$opid;
  $result = dbQuery($sql);
  if (($result != NULL) && (dbNumRows($result) > 0)) {
  // output data of each row
    $row = dbFetchAssoc($result);
    $oinfo = array("op_id"=>$row["op_id"],
                    "pa_id"=>$row["pa_id"],
                    "op_nm"=>$row["op_nm"],
                    "op_ds"=>$row["op_ds"],
                    "op_pr"=>$row["op_pr"],
                    "op_flag"=>$row["op_flag"]);
    return $oinfo;
  }
  else
    return NULL;
}

function getoptionslist($paid)
{
  $sql = "SELECT o.op_id, o.op_nm, o.op_ds, o.op_pr, o.op_flag
          FROM tbl_option o
          WHERE o.pa_id = ".$paid;
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
      for($i=0;$i<$n;$i++)
      {
          // output data of each row
          $row = dbFetchAssoc($result);
          $olist[$i] = array("op_id"=>$row["fu_id"],
                              "op_nm"=>$row["op_nm"],
                              "op_ds"=>$row["op_ds"],
                              "op_pr"=>$row["op_pr"],
                              "op_flag"=>$row["op_flag"]);
      }
      return $olist;
  }
  else
      return NULL;
}

function getcurtainhardwarerates($motorcode,$remotecode,$trackcode)
{
  $sql = "SELECT ch.ch_id, ch.ch_typ, ch.ch_cd, ch.ch_wt, ch.ch_rt
          FROM tbl_curtain_hardware ch
          WHERE (ch.ch_cd = '$motorcode' AND ch.ch_typ = 'Motor')
          OR (ch.ch_cd = '$remotecode' AND ch.ch_typ = 'Remote')
          OR (ch.ch_cd = '$trackcode' AND ch.ch_typ = 'Track')
          ORDER BY ch.ch_id ASC";
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $chlist[$i]= array("ch_id"=>$row["ch_id"],
                              "ch_typ"=>$row["ch_typ"],
                              "ch_cd"=>$row["ch_cd"],
                              "ch_wt"=>$row["ch_wt"],
                              "ch_rt"=>$row["ch_rt"]);
        }
        return $chlist;
  }
  else
    return NULL;
}

function getblindshardwarerates($motorcode)
{
  $sql = "SELECT bh.bh_id, bh.bh_typ, bh.bh_cd, bh.bh_rt, bh.bh_wt
          FROM tbl_blinds_hardware bh
          WHERE (bh.bh_cd = '$motorcode' AND bh.bh_typ = 'Motor')
          OR (bh.bh_typ IN ('Charger','EveryFeetAbove'))
          ORDER BY bh.bh_id ASC";
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
        for($i=0;$i<$n;$i++)
        {
            // output data of each row
            $row = dbFetchAssoc($result);
            $bhlist[$i]= array("bh_id"=>$row["bh_id"],
                              "bh_typ"=>$row["bh_typ"],
                              "bh_cd"=>$row["bh_cd"],
                              "bh_wt"=>$row["bh_wt"],
                              "bh_rt"=>$row["bh_rt"]);
        }
        return $bhlist;
  }
  else
    return NULL;
}

function curtainsvalueadditionqty($pid,$nc,$l,$w,$cf,$o,$cbm,$csm,$overlap,$numofpanels)
{ //M06 - ladder $pid = 7
  if($pid == 7) $valqty = round((((($l/39.37) * 4) + (($w*$cf)/39.37))/2)*$nc,2); //This formula also applicable for 4
  //M18 - 4 - Jatil $pid = 8
  if($pid == 8) $valqty = round((((($l/39.37) * 4) + (($w*$cf)/39.37))/2)*$nc,2); //Rs. 800/metre
  //S19 - 3 - Bi Pleat - original $cf 2.5 $pid = 10
  if($pid == 10)
  {
      //change curtain fullness to 4.62. For tall one above 160inch change fullness to 5.55. val addn rate Rs. 300/metre
      if(($cf == 2.5) && ($l < 160)) $cf = 5.55;
      elseif ($cf == 2.5) $cf == 4.62;
      if(!$o) $fabricqtyrequired = round_up($numofpanels * (($l+$cbm)/39.37));
      else $fabricqtyrequired = round_up($numofpanels * (($w * $cf)+$overlap +$csm)/39.37);
      $valqty = $farbicqtyrequired;
  }
  //S01 - 6 - Shakha - $pid=13
  if($pid == 13)
  {
    if(!$o) $fabricqtyrequired = round_up($numofpanels * (($l+$cbm)/39.37));
    else $fabricqtyrequired = round_up($numofpanels * (($w * $cf)+$overlap +$csm)/39.37);
    $valqty = $fabricqtyrequired; //$vr = Rs. 800/metre 
  }

  //S14 - 2 - original $cf 2.5 - Micro Pleat $pid = 9
  //change curtain fullness to 3. For tall one above 160inch change fullness to 3.6. val addn rate Rs. 275/metre
  if($pid == 9)
  {
    if(($cf == 2.5) && ($l < 160)) $cf = 3;
    elseif ($cf == 2.5) $cf == 3.6;
    $valqty = $farbicqtyrequired; 
  }
  //S02 - Tri pleat - original $cf 2.5 $pid = 12
  //$cf = 3.25 and above 160 inches $cf = 4, $l = $l*1.283. $vr = Rs. 325/metre
  if($pid == 12)
  {
    if(($cf == 2.5) && ($l < 160)) $cf = 3.25;
    elseif ($cf == 2.5) $cf == 4;
    $l=$l*1.283;
    if(!$o) $fabricqtyrequired = round_up($numofpanels * (($l+$cbm)/39.37));
    else $fabricqtyrequired = round_up($numofpanels * (($w * $cf)+$overlap +$csm)/39.37);
    $valqty = $fabricqtyrequired;
  }

  //S34 - Numo Pleat - original $cf 2.5 $pid = 11
  //$cf = 3 and above 160 inches $cf = 4, $l = $l*1.1667. $vr = Rs. 300/metre
  if($pid == 11) 
  {
    if(($cf == 2.5) && ($l < 160)) $cf = 3;
    elseif ($cf == 2.5) $cf == 4;
    $l=$l*1.1667;
    if(!$o) $fabricqtyrequired = round_up($numofpanels * (($l+$cbm)/39.37));
    else $fabricqtyrequired = round_up($numofpanels * (($w * $cf)+$overlap +$csm)/39.37);
    $valqty = $fabricqtyrequired;
  }
  
  //S29 - 5 - Drizzle
  //if(($pid == ?) && ($catid == 1)) $valqty = (($l*0.28)*(($w*$cf)+16))/144) //whether Converting from sqft to sqm. needed? Rs. 800/sqft  
  //MP26 - 7 -  $pid = 
  //if(($pid == ?) && ($catid == 1)) $valqty = $farbicqtyrequired; //$vr = Rs. 150/metre 
  //M21 - 8 - Pin Tuck $pid = 
  //if(($pid == ?) && ($catid == 1)) $valqty = (($l+$cbm)/39.37)*4; //$vr = Rs. 200/metre
  //M20 - 1 - Twist-Tuck $pid =  
  //if(($pid == ?) && ($catid == 1)) $valqty = (($l+$cbm)/39.37)*4; //$vr = Rs. 300/metre
  //S09 - 9 - $pid = 
  //if(($pid == ?) && ($catid == 1)) $valqty = $farbicqtyrequired; //$vr = Rs. 800/metre
  return $valqty;
}
function blindsvalueadditionqty($pid,$l,$w)
{
  //BLINDS
  //DONE M18 - 4 - Jatil
  {
    if(($pid == 19) && ($catid == 2)) 
    $valqty = round((((($l/39.37) * 2) + (($w)/39.37))),2); //Rs. 800/metre
  }
  //DONE - 2 - original $cf 2.5 - S14 - Micro Pleat
  //if(($pid == 20) && ($catid == 2)) 
  {
    $w = $w * 1.25;
    $valqty = $fabricqtyrequired; //$w = $w*1.25 val addn rate Rs. 275/metre
  }

  //DONE - 3 - Bi Pleat - S19 - original $cf 2.5
  if(($pid == 21) && ($catid == 2))
  {
    $w=$w*1.85;
    $valqty = $fabricqtyrequired; //$w=$w*1.85 . val addn rate Rs. 300/metre
  }

  //DONE - S34 - Numo Pleat 
  //$w = $w * 1.1667, $l = $l*1.1667. $vr = Rs. 350/metre
  if($pid == 22)
  {
    $l=$l*1.1667;
    $w=$w*1.667;
    $fabricqtyrequired = round_up(ceil(($w + $bsm)/$fw) * (($l + $bbm)/39.37));
    $valqty = $fabricqtyrequired;
  }

  //DONE - S02 - Tri pleat - original $cf 2.5
  if(($pid == 23) && ($catid == 2)) 
  {
    $l = $l*1.283;
    $w = $w*1.35;
    $valqty = $fabricqtyrequired; // $vr = Rs. 325/metre
  }

  //DONE - S01 - 6 - Shakha - 
  if(($pid == 24) && ($catid == 2)) 
  {
    $valqty = $fabricqtyrequired; //$vr = Rs. 800/metre 
  }


  //DONE - M20 - 1 - Twist-Tuck
  //if(($pid == ?) && ($catid == 2))
  //{
  //  $valqty = (($l+$bbm)/39.37)*2; //$vr = Rs. 300/metre
  //}

  //DONE - M21 - 8 - Pin Tuck
  //if(($pid == ?) && ($catid == 2)) 
  //{
  //  $valqty = (($l+$cbm)/39.37)*2; //$vr = Rs. 200/metre
  //}

  //BLINDS PENDING
  //DONE - 5 - Drizzle - S29
  //if(($pid == ?) && ($catid == 2)) 
  //{
  //  $valqty = (($l*0.28)*(($w)+$bsm))/144); //whether Converting from sqft to sqm. needed? Rs. 800/sqft
  //}
  //DONE - 7 - MP26 - 
  //if(($pid == ?) && ($catid == 2)) 
  //{
  //  $valqty = $fabricqtyrequired; //$vr = Rs. 150/metre 
  //}
  //DONE - 9 - S09
  //if(($pid == ?) && ($catid == 2)) 
  //{
  //  $valqty = $fabricqtyrequired; //$vr = Rs. 800/metre
  //}
  //DONE - M06 - ladder
  if(($pid == 18) && ($catid == 1)) 
  {
    $valqty = round(((($l/39.37) * 2) + (($w)/39.37)),2); //This formula also applicable for 2
  }
  return $valqty;

}

function fabric1qty($catid,$pid,$nc,$l,$w,$cf)
{
  //M21 - 8
  //if(($pid == ?) && ($catid == 1)) $fb1qty = $fabricrequired; //fabric 1 is the base fabric with base rate
  
  
  //M20 - 1
  //if(($pid == ?) && ($catid == 1)) $fb1qty = $fabricrequired; //fabric 1 is the base fabric with base rate

  
  return $fb1qty;
}

function fabric2qty($catid,$pid,$nc,$l,$w,$cf)
{
  //8
  //if(($pid == ?) && ($catid == 1)) $fb2qty = ($l+$cbm)/39.37; //fabric 2 rate needed 
  //1
  //if(($pid == ?) && ($catid == 1)) $fb2qty = ($l+$cbm)/39.37; //fabric 2 rate needed 
 
  
  return $fb2qty;
}

function fabric3qty($catid,$pid,$nc,$l,$w,$cf)
{
  
  
  return $fb3qty;
}


function getcurtainsprice($pid,$typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$cf,$o,$ws,$pl,$fr,$fw,$uw,$pw,$vr,$bt,$s,$lc,$ct,$cw,$iw,$ow,$lb,$ld,$ls,$jt,$tb,$brsr,$brdr,$brwr,$trabr,$chr,$tbltr,$btw,$sw,$lcw,$ctw,$cww,$iww,$oww,$lbw,$ldw,$lsw,$jtw,$tbw,$brsw,$brdw,$brww,$trabw,$chw,$tbltw)
{
  $bbm = 15;
  if ($w <= 270)
    $bsm = 10;
  else 
    $bsm = 15;

  $cbm = 15;
  $csm = 16;

  $overlap = $nc > 1 ? 12 : 0;
  
  //No of panels
  $np =(($w * $cf)+$overlap+$csm)/$fw;
  $nhp = ($w + $cbm) / $fw;

  $tnp = round($np/2,2);
  $tnpi = (int) $tnp;
  $diff = $tnp - $tnpi;

  $pair = ($w+$overlap+$csm)/2;
  $tnhpi = (int) $nhp;
  $diffh = $nhp - $tnhpi;

  if($diffh <= 0.5) $nhp = $tnhpi + 0.5;
  else $nhp = $tnhpi + 1;

  if($diff <= 0.24) $np = $tnpi * 2;
  elseif ($diff <= 0.69) $np = ($tnpi + 0.5) * 2;
  else $np = ($tnpi + 1)*2;

  if ($o == 0) $numofpanels = $np;
  else $numofpanels = $nhp;

  //Number of curtains consideration
  //$numofpanels = $numofpanels*$nc;

  //AVC Track
  $avctrack = ceil($w/12); //round up needed
  
  //Brackets
  $brackets = $w > 72 ? ceil($w/24):3;
  //Brackets Pricing
  $bracketspricing = $mount ? ($brwr*$brackets) : ($brsr*$brackets);
  //Brackets Weight
  $bracketsweight = $mount ? ($brww*$brackets) : ($brsw*$brackets);

  //Curtainhooks based on pleats (3pinch / american pleat pl = 0)
  // Ripple / Wave pleat pl = 1
  if($pl) $curtainhooks = ceil(($w+$csm)/2);
  else $curtainhooks = $numofpanels*6; //change to 6 from 5;

  //Curtain Tape
  if(!$o) $curtaintape = round_up($numofpanels*1.5);
  else $curtaintape = 0;

  //Lead Chain
  if(!$o) $leadchain = round_up($numofpanels*1.5);
  else $leadchain = 0;

  //$pattifabric = 


  //Overlapper should only be for solid curtain
  //only applicable for pair
  $overlapper = 1;

  //Track Length in meters for Manual Operation
  $tracklength = round($w/39.37, 2);
  //Trackweight in Kg for Manual Operation per meter
  $trackunitweight = 0.547;

  //Upper Fabric
  $upperfabric = ($w * 1)+ $csm;

  //Valance
  $valance = round_up(($w+$csm)/39.37);
  
  //Valance Lining Fabric
  $valanceliningfabric = round_up(($w+$csm)/39.37);

  //$valancestitching = 

  //Weight of Curtain
  $weightofcurtain = round_up((ceil((($w * 1) + $csm) / $fw) * ($l / 39.37) * 2 * 400 / 1000) + 5, 0.5);

    //Curtain
    if(!$o) $fabricqtyrequired = round_up($numofpanels * (($l+$cbm)/39.37));
    else $fabricqtyrequired = round_up($numofpanels * (($w * $cf)+$overlap +$csm)/39.37);

    //Stitching
    $stitchingqty = round($numofpanels,0);


  //Value Addition
  //$valueaddition = ceil($vr*$fabricqtyrequired/39.37);
  $valueadditionqty = curtainsvalueadditionqty($pid,$nc,$l,$w,$cf,$o,$cbm,$csm,$overlap,$numofpanels);
  $valueadditionprice = $valueadditionqty*$vr;
  //Jointer - Anything above 13ft - to cut and send and then use joiner
  //1 for main and 1 for sheer
  $jointers = ($w/12) <= 12? 0: ceil(($w/12)/12) - 1;
  //Baton $nc 
  $baton = $nc;

  //Lining Rate
  if($opacityreq > 1) 
  {
    $lg = $lb; //Blackout
    $liningunitweight = $lbw;
  }

  elseif($opacityreq) 
  {
    $lg = $ld; //Dimout
    $liningunitweight = $ldw;
  }

  else
  {
    $lg = $ls; //Standard
    $liningunitweight = $lsw;
  }
  //Lining weight
  $liningweight = $fabricqtyrequired*$liningunitweight;

   
//Baton Rod Weight - Acrylic. Minimum length must be 3. 
//Residential is only acrylic baton rod. between 6 to 12 feet length use baton. 
//Convert to minimum 1 meter baton size by multiplying with 0.3048
//Baton rod round off to 1 - three size in stock
$batonlength = ((ceil($l/12) < 13) && (ceil($l/12) > 6)) ? ((ceil($l/12)-6)*0.3048) : 0;
if($batonlength < 1) $batonlength = 1;
$batonweight = $batonlength*$btw*$nc;
//Lead Chain weight calculation no rounding needed in terms of available length
$leadchainweight = $leadchain*$lcw;

//Tie Backs applicable only in manual curtains.
//Curtain tie back will be applicable only to manual main curtain and tiebackqty = $nc
//Rate of tie back is Rs. 240 for a single tie back
$tiebeltqty = $tiebacksqty = ($typ == "Solid") ? $nc : 0;
$tiebackweight = $tiebacksqty * $tbw;
$tiebeltweight = $tiebeltqty * $tbltw;

//Corner weight consideration with every main curtain.
//Each curtain will have 2 corner weights. Therefore 4 for a pair
$cornerweightsqty = ($typ == "Solid") ? $nc*2 : 0;
$weightofcornerweights = $cornerweightsqty*$cww;


//1meter fabric is 550g, 1meter lining is 550g, 1meter sheer is 450g
$productweight = ($fabricqtyrequired*$uw); //excludes lining 
$packagingweight = ($fabricqtyrequired+$liningweight)*$pw; //excludes lining
$loadonmotor = $productweight+$liningweight;


$motorweight = 0;
  //Motorized
  if($motorized)
  {
    //Motor calculations
    $motorqty = 1;
    if($loadonmotor <= 35) $load = 0;
    elseif ($loadonmotor <= 65) $load = 1;
    elseif (ceil($loadonmotor/2) <= 35)
    {
      $motorqty = 2;
      $load = 0;
    }
    elseif (ceil($loadonmotor/2) <= 65)
    {
      $motorqty = 2;
      $load = 1;
    }
    elseif (ceil($loadonmotor/3) >= 65)
    {
      $motorqty = ceil($loadonmotor/65);
      $load = 1;
    }
    $motorcode = $load*pow(2,2)+$powertype*pow(2,1)+$controltype*pow(2,0);

    //Remote Calculations
    $remotecode = 0;
    for($i=0,$j=pow(2,2*$i);$i<3;$i++,$j=pow(2,2*$i))
    {
        if($motorqty <= $j) 
        {   
          $remotecode = $i;
          break;
        }
    }

    //Track Calculations
    $temp = ceil($w/39.37);
    if($temp < 2) $temp = 2;
    $trackcode = ($load*pow(2,1)+$pl*pow(2,0))*10+$temp;
    //Motorized Hardware
    $chlist = getcurtainhardwarerates($motorcode,$remotecode,$trackcode);
    $motorweight = $motorqty*$chlist[0]["ch_wt"];
    $trackunitweight = $chlist[1]["ch_wt"];
  }
 $jointersweight = $jointers*$jtw;
 $curtaintapeweight = $curtaintape*$ctw;
 $curtainhooksweight = $curtainhooks*$chw;
 $trackweight = $tracklength*$trackunitweight;

 $inwardfreightweight = ceil($productweight);
 if($motorized) $outwardfreightweight = $productweight+$liningweight+$motorweight+$trackweight+$curtaintapeweight+$weightofcornerweights+$jointersweight+$bracketsweight+$packagingweight;
 else $outwardfreightweight = $productweight+$liningweight+$batonweight+$trackweight+$tiebackweight+$curtaintapeweight+$weightofcornerweights+$jointersweight+$bracketsweight+$packagingweight;
  //Manual Track Calculation (in running feet)
  //Divide window width by 12.
  //Curtain hooks - (main+sheer)(length) multiplied by 7
  //Manual Hardware
  //$manhw = $hwma_rt*$w; 
  
  $pricing = NULL;

  if($motorized)
  {
    $courier = array("Motor Weight (Kg)"=>$motorweight,
                     "Track Weight (Kg)"=>$trackweight,
                     "Main / Sheer Weight (Kg)"=>$productweight,
                     "Lining Weight (Kg)"=>$liningweight,
                     "Curtain Tape Weight (Kg)"=>$curtaintapeweight,
                     "Curtain Hooks Weight (Kg)"=>$curtainhooksweight,
                     "Weight of Corner Weights (Kg)"=>$weightofcornerweights,
                     "Jointers Weight (Kg)"=>$jointersweight,
                     "Brackets Weight (Kg)"=>$bracketsweight,
                     "Packaging Weight (Kg)"=>$packagingweight,
                     "Total Weight (Kg)"=>$outwardfreightweight
                    );

    $quantities = array("NumberofPanels"=>$numofpanels,
                    "Curtain Fullness"=>$cf,
                    "FabricQtyRequired (meters)"=>$fabricqtyrequired,
                    "LeadChainQty (meters)"=>$leadchain,
                    "CurtainTapeQty (meters)"=>$curtaintape,
                    "CornerWeightQty (meters)"=>$cornerweightsqty,
                    "CurtainHooksQty"=>$curtainhooks,
                    "StitchingQty (meters)"=>$stitchingqty,
                    "TrackManualorRomanQty"=>$tracklength,
                    "OverlapperQty"=>$overlapper,
                    "JointersQty (Nos.)"=>$jointers,
                    "BracketsQty"=>$brackets,
                    "NumberofMotors"=>$motorqty);

    $pricing = array("BasePrice (Rs.)"=>$fabricqtyrequired * $fr,
                    "ValueAdditionPrice (Rs.)"=>$valueadditionprice,
                    "LiningPrice (Rs.)"=>$fabricqtyrequired * $lg,
                    "StitchingPrice (Rs.)"=>$stitchingqty * $s,
                    "LeadChainPrice (Rs.)"=>$leadchain*$lc,
                    "CurtainTapePrice (Rs.)"=>$curtaintape*$ct,
                    "CurtainHooksPrice (Rs.)"=>$curtainhooks*$chr,
                    "CornerWeightPrice (Rs.)"=>$cornerweightsqty*$cw,
                    "TrackPrice (Rs.)"=>$chlist[2]["ch_rt"],
                    "JointersPrice (Rs.)"=>$jointers*$jt,
                    "BracketsPrice (Rs.)"=>$bracketspricing,
                    "MotorPrice (Rs.)"=>$chlist[0]["ch_rt"]*$motorqty,
                    "RemotePrice (Rs.)"=>$chlist[1]["ch_rt"],
                    "InwardFreightPrice (Rs.)"=>$inwardfreightweight*$iw,
                    "OutwardFreightPrice (Rs.)"=>$outwardfreightweight*$ow,
                    "TotalPrice (Rs.)"=>($qty*(($fabricqtyrequired * $fr)+($valueadditionprice)+($fabricqtyrequired * $lg)+($stitchingqty*$s)+($leadchain*$lc)+($curtaintape*$ct)+($curtainhooks*$chr)+($cornerweightsqty*$cw)+($baton*$bt)+($inwardfreightweight*$iw)+($outwardfreightweight*$ow)+$bracketspricing+($chlist[0]["ch_rt"]*$motorqty)+($chlist[1]["ch_rt"])+($chlist[2]["ch_rt"])+($jointers*$jt))));
  }
  else
  {
    $courier = array("Track Weight (Kg)"=>$trackweight,
                     "Baton Weight (Kg)"=>$batonweight,
                     "Tie Backs Weight (Kg)"=>$tiebackweight,
                     "Tie Belt Weight (Kg)"=>$tiebeltweight,
                     "Main / Sheer Weight (Kg)"=>$productweight,
                     "Lining Weight (Kg)"=>$liningweight,
                     "Curtain Tape Weight (Kg)"=>$curtaintapeweight,
                     "Curtain Hooks Weight (Kg)"=>$curtainhooksweight,
                     "Weight of Corner Weights (Kg)"=>$weightofcornerweights,
                     "Jointers Weight (Kg)"=>$jointersweight,
                     "Brackets Weight (Kg)"=>$bracketsweight,
                     "Packaging Weight (Kg)"=>$packagingweight,
                     "Total Weight (Kg)"=>$outwardfreightweight
                      );

    $quantities = array("NumberofPanels"=>$numofpanels,
                      "Curtain Fullness"=>$cf,
                      "FabricQtyRequired (meters)"=>$fabricqtyrequired,
                      "LeadChainQty (meters)"=>$leadchain,
                      "CurtainTapeQty (meters)"=>$curtaintape,
                      "CurtainHooksQty"=>$curtainhooks,
                      "CornerWeightQty (meters)"=>$cornerweightsqty,
                      "StitchingQty (meters)"=>$stitchingqty,
                      "TrackManualorRomanQty"=>$tracklength,
                      "TrackAndBracketsSet (meters)"=>$tracklength,
                      "OverlapperQty"=>$overlapper,
                      "JointersQty (Nos.)"=>$jointers,
                      "BracketsQty"=>$brackets,
                        "BatonQty (Nos.)"=>$nc,
                        "TieBacksQty (Nos.)"=>$tiebacksqty,
                        "TieBeltQty"=>$tiebeltqty

                      );

    $pricing = array("BasePrice (Rs.)"=>$fabricqtyrequired * $fr,
                      "ValueAdditionPrice (Rs.)"=>$valueadditionprice,
                      "LiningPrice (Rs.)"=>$fabricqtyrequired*$lg,
                      "StitchingPrice (Rs.)"=>$stitchingqty * $s,
                      "LeadChainPrice (Rs.)"=>$leadchain*$lc,
                      "CurtainTapePrice (Rs.)"=>$curtaintape*$ct,
                      "CurtainHooksPrice (Rs.)"=>$curtainhooks*$chr,
                      "CornerWeightPrice (Rs.)"=>$cornerweightsqty*$cw,
                      "TrackAndBracketSetPrice (Rs.)"=>$tracklength*$trabr,
                      "JointersPrice (Rs.)"=>$jointers*$jt,
                      "BracketsPrice (Rs.)"=>$bracketspricing,
                      "BatonPrice (Rs.)"=>$baton*$bt,
                      "TieBacksPrice (Rs.)"=>$tiebacksqty*$tb,  
                      "TieBeltPrice (Rs.)"=>$tiebeltqty*$tbltr,                  
                      "InwardFreightPrice (Rs.)"=>$inwardfreightweight*$iw,
                      "OutwardFreightPrice (Rs.)"=>$outwardfreightweight*$ow,
                      "TotalPrice (Rs.)"=>round($qty*(($fabricqtyrequired * $fr)+($valueadditionprice)+($fabricqtyrequired * $lg)+($stitchingqty*$s)+($leadchain*$lc)+($curtaintape*$ct)+($cornerweightsqty*$cw)+($curtainhooks*$chr)+($tracklength*$trabr)+($baton*$bt)+($inwardfreightweight*$iw)+($outwardfreightweight*$ow)+($jointers*$jt)),2));      
  }
  //reportcouriercalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$courier);
  //reportquantitycalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$quantities);
  //reportpricingcalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$pricing);

  return $pricing;
}

function getblindsprice($pid,$typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$cf,$o,$ws,$fr,$fw,$uw,$pw,$vr,$s,$iw,$ow,$lb,$ld,$ls,$wpr,$hpr,$sw,$iww,$oww,$lbw,$ldw,$lsw,$wpw,$hpw)
{
  $bbm = 15;
  if ($w <= 270)
    $bsm = 10;
  else 
    $bsm = 15;

  $cbm = 15;
  $csm = 16;
  $overlap = 0;
  //No of panels
  $np =(($w * $cf)+$overlap+$csm)/$fw;
  $nhp = ($w + $cbm) / $fw;

  $tnp = round($np/2,2);
  $tnpi = (int) $tnp;
  $diff = $tnp - $tnpi;

  $pair = ($w+$overlap+$csm)/2;
  $tnhpi = (int) $nhp;
  $diffh = $nhp - $tnhpi;

  if($diffh <= 0.5) $nhp = $tnhpi + 0.5;
  else $nhp = $tnhpi + 1;

  if($diff <= 0.24) $np = $tnpi * 2;
  elseif ($diff <= 0.69) $np = ($tnpi + 0.5) * 2;
  else $np = ($tnpi + 1)*2;

  if ($o = 0) $numofpanels = $np;
  else $numofpanels = $nhp;

  //AVC Track
  $avctrack = ceil($w/12); //round up needed


   //Weight Patti - Blinds - depends on width of blind

  $weightpattilength = $w/39.37; //In meters
  $weightpattiweight = $weightpattilength * $wpw;
   //Hollow Pipe  - Blinds - Each horizontal line in the height of the blind there is a hollow pipe
   //    so if 60 inch blind height / 10 = 6 pipes of width of the blind
   $numberofhollowpipes = ceil($l/10);
   $hollowpipestotallength = ($numberofhollowpipes*$w)/39.37; 
   $hpw;
   $hollowpipesweight = $hollowpipestotallength*$hpw;
   //Roman Blind track manual weight - depends on width of blind
   //Roman blind track motorized weight - 


  //Track Length in meters for Manual Operation
  $tracklength = round($w/39.37, 2);
  //Trackweight in Kg for Manual Operation per meter
  $trackunitweight = 0.547;
  $trackweight = $tracklength*$trackunitweight;

  //Upper Fabric
  //$upperfabric = ($w * 1)+ $csm;

  //Valance
  //$valance = round_up(($w+$csm)/39.37);
  

    //Blind
    $fabricqtyrequired = round_up(ceil(($w + $bsm)/$fw) * (($l + $bbm)/39.37));
    //Stitching Roman Blind
    $stitchingqty = ceil(($l * $w)/144);

  //Value Addition
  $valueadditionqty = blindsvalueadditionqty($pid,$l,$w);
  $valueadditionprice = $valueadditionqty*$vr;

  //Lining Rate
  if($opacityreq > 1) 
  {
    $lg = $lb; //Blackout
    $liningunitweight = $lbw;
  }

  elseif($opacityreq) 
  {
    $lg = $ld; //Dimout
    $liningunitweight = $ldw;
  }

  else
  {
    $lg = $ls; //Standard
    $liningunitweight = $lsw;
  }
  //Lining weight
  $liningweight = $fabricqtyrequired*$liningunitweight;
  //1meter fabric is 550g, 1meter lining is 550g, 1meter sheer is 450g
  $productweight = ($fabricqtyrequired*$uw); //excludes lining 
  $packagingweight = ($fabricqtyrequired+$liningweight)*$pw; //excludes lining
  
 
  //Lining Rate
  if($opacityreq > 1) $lg = $lb; //Blackout
  elseif($opacityreq) $lg = $ld; //Dimout
  else $lg = $ls; //Standard
  $motorweight = 0;
  //Motorized
  if($motorized)
  {
    //Motor calculations    
    $motorcode = $powertype*pow(2,1)+$controltype*pow(2,0);
    $bhlist = getblindshardwarerates($motorcode);
    $motorweight = $bhlist[0]["bh_wt"];
    $everyfeetaboveprice = ($w/12) > 5 ? (ceil($w/12)-5)*$bhlist[2]["bh_rt"] : 0;
  }
  $inwardfreightweight = ceil($productweight);
  if($motorized) $outwardfreightweight = $productweight+$liningweight+$motorweight+$weightpattiweight+$hollowpipesweight+$packagingweight;
  else $outwardfreightweight = $productweight+$liningweight+$trackweight+$weightpattiweight+$hollowpipesweight+$packagingweight;
  //Manual Track Calculation (in running feet)
  //Divide window width by 12.
  //Curtain hooks - (main+sheer)(length) multiplied by 7
  //Manual Hardware
  //$manhw = $hwma_rt*$w; 
  
  $pricing = NULL;

  if($motorized)
  {
    $courier = array("Motor Weight (Kg)"=>$motorweight,
                     "Blinds Weight (Kg)"=>$productweight,
                     "Lining Weight (Kg)"=>$liningweight,
                     "Weight Patti Weight (Kg)"=>$weightpattiweight,
                     "Hollow Pipes Weight (Kg)"=>$hollowpipesweight,
                     "Packaging Weight (Kg)"=>$packagingweight,
                     "Total Weight (Kg)"=>$outwardfreightweight);

    $quantities = array("NumberofPanels"=>$numofpanels,
                        "Curtain Fullness"=>$cf,
                        "FabricQtyRequired (meters)"=>$fabricqtyrequired,
                        "StitchingQty (sqft)"=>$stitchingqty,
                        "Weight Patti (meters)"=>$weightpattilength,
                        "Hollow Pipes (meters)"=>$hollowpipestotallength);

    $pricing = array("BasePrice (Rs.)"=>$fabricqtyrequired * $fr,
                    "ValueAdditionPrice (Rs.)"=>$valueadditionprice,
                    "LiningPrice (Rs.)"=>$fabricqtyrequired * $lg,
                    "StitchingPrice (Rs.)"=>$stitchingqty*$s,
                    "Weight Patti Price (Rs.)"=>$weightpattilength*$wpr,
                    "Hollow Pipes Price (Rs.)"=>$hollowpipestotallength*$hpr,
                    "InwardFreightPrice (Rs.)"=>$inwardfreightweight*$iw,
                    "OutwardFreightPrice (Rs.)"=>$outwardfreightweight*$ow,
                    "MotorPrice (Rs.)"=>$bhlist[0]["bh_rt"],
                    "ChargerPrice (Rs.)"=>$bhlist[1]["bh_rt"],
                    "EveryFeetAbove5Price (Rs.)"=>$everyfeetaboveprice,
                    "TotalPrice (Rs.)"=>round(($qty*(($fabricqtyrequired * $fr)+($valueaddition)+($fabricqtyrequired * $lg)+($stitchingqty*$s)+($weightpattilength*$wpr)+($hollowpipestotallength*$hpr)+($inwardfreightweight*$iw)+($outwardfreightweight*$ow)+($bhlist[0]["bh_rt"])+($bhlist[1]["bh_rt"])+$everyfeetaboveprice)),2));
  }
  else
  {
    $courier = array("Track Weight (Kg)"=>$trackweight,
                      "Blinds Weight (Kg)"=>$productweight,
                      "Lining Weight (Kg)"=>$liningweight,
                      "Weight Patti Weight (Kg)"=>$weightpattiweight,
                      "Hollow Pipes Weight (Kg)"=>$hollowpipesweight, 
                      "Packaging Weight (Kg)"=>$packagingweight,
                      "Total Weight (Kg)"=>$outwardfreightweight);

    $quantities = array("NumberofPanels"=>$numofpanels,
                          "Curtain Fullness"=>$cf,
                          "FabricQtyRequired (meters)"=>$fabricqtyrequired,
                          "StitchingQty (meters)"=>$stitchingqty,
                          "Track (meters)"=>$tracklength,
                          "Weight Patti (meters)"=>$weightpattilength,
                          "Hollow Pipes (meters)"=>$hollowpipestotallength);
    
    $pricing = array("BasePrice (Rs.)"=>$fabricqtyrequired * $fr,
                    "ValueAdditionPrice (Rs.)"=>$valueadditionprice,
                    "LiningPrice (Rs.)"=>$fabricqtyrequired*$lg,
                    "StitchingPrice (Rs.)"=>$stitchingqty*$s,
                    "Track Price (Rs.)"=>0,
                    "Weight Patti Price (Rs.)"=>$weightpattilength*$wpr,
                    "Hollow Pipes Price (Rs.)"=>$hollowpipestotallength*$hpr,
                    "InwardFreightPrice (Rs.)"=>$inwardfreightweight*$iw,
                    "OutwardFreightPrice (Rs.)"=>$outwardfreightweight*$ow,
                    "TotalPrice (Rs.)"=>round(($qty*(($fabricqtyrequired * $fr)+($valueaddition)+($fabricqtyrequired * $lg)+($stitchingqty*$s)+($weightpattilength*$wpr)+($hollowpipestotallength*$hpr)+($inwardfreightweight*$iw)+($outwardfreightweight*$ow) )),2));      

}

  reportblindscouriercalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$courier);
  reportblindsquantitiescalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$quantities);
  reportblindspricingcalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$pricing);

  return $pricing;
}

function getprodprice($catid,$pid,$typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$cf,$o,$ws,$pl,$fr,$fw,$uw,$pw,$vr,$bt,$s,$lc,$ct,$cw,$iw,$ow,$lb,$ld,$ls,$jt,$tb,$brsr,$brdr,$brwr,$trabr,$chr,$tbltr,$btw,$sw,$lcw,$ctw,$cww,$iww,$oww,$lbw,$ldw,$lsw,$jtw,$tbw,$brsw,$brdw,$brww,$trabw,$chw,$tbltw)
{
  $pricing = NULL;

  if($catid == 1)
  {
    $pricing = getcurtainsprice($pid,$typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$cf,$o,$ws,$pl,$fr,$fw,$uw,$pw,$vr,$bt,$s,$lc,$ct,$cw,$iw,$ow,$lb,$ld,$ls,$jt,$tb,$brsr,$brdr,$brwr,$trabr,$chr,$tbltr,$btw,$sw,$lcw,$ctw,$cww,$iww,$oww,$lbw,$ldw,$lsw,$jtw,$tbw,$brsw,$brdw,$brww,$trabw,$chw,$tbltw);
  }
  elseif($catid == 2)
  {
    $pricing = getblindsprice($pid,$typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$cf,$o,$ws,$fr,$fw,$uw,$pw,$vr,$s,$iw,$ow,$lb,$ld,$ls,$wpr,$hpr,$sw,$iww,$oww,$lbw,$ldw,$lsw,$wpw,$hpw);
  }

  return $pricing;
}

function getadditionalcomponents()
{
  $sql = "SELECT ac.ac_id, ac.ac_nm, ac.ac_uom, ac.ac_rt
          FROM tbl_additional_components ac";
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
  for($i=0;$i<$n;$i++)
  {
    // output data of each row
    $row = dbFetchAssoc($result);
    $aclist[$i] = array("ac_id"=>$row["ac_id"],
                     "ac_nm"=>$row["ac_nm"],
                     "ac_uom"=>$row["ac_uom"],
                     "ac_rt"=>$row["ac_rt"]);
  }
  return $aclist;
  }
  else
    return NULL;
}

function getaddlcomprtandwt()
{
  $sql = "SELECT CONCAT_WS(\"', '\",ac.ac_rt,ac.ac_wt) AS ac_rtandwt
          FROM tbl_additional_components ac
          ORDER BY ac.ac_id ASC";
  $result = dbQuery($sql);
  $n = dbNumRows($result);  
  if (($result != NULL) && ($n > 0)) {
  for($i=0;$i<$n;$i++)
  {
    // output data of each row
    $row = dbFetchAssoc($result);
    $acrtandwtlist[$i] = $row["ac_rtandwt"];
  }
  return $acrtandwtlist;
  }
  else
    return NULL;
}

function round_up($val)
{
  $x = (int) $val;
  $diff = $val - $x;
  if($diff <= 0.5) $newval = $x+0.5;
  if($diff > 0.5) $newval = $x+1;
  return $newval;
}
function reportblindscouriercalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS blindscouriercalculations(
          bcc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          bcc_typ ENUM (\"Solid\",\"Sheer\"),
          bcc_qty INT(10),
          bcc_l DECIMAL(10,2),
          bcc_w DECIMAL(10,2),
          bcc_or INT(1),
          bcc_m TINYINT(1),
          bcc_mo TINYINT(1),
          bcc_pt TINYINT(1),
          bcc_ct TINYINT(1),
          bcc_mw DECIMAL(10,2),
          bcc_tw DECIMAL(10,2),
          bcc_pdw DECIMAL(10,2),
          bcc_lw DECIMAL(10,2),
          bcc_wpw DECIMAL(10,2),
          bcc_hpw DECIMAL(10,2),
          bcc_pkw DECIMAL(10,2),
          bcc_tow DECIMAL(10,2))";

  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
    $sql = "INSERT INTO blindscouriercalculations 
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct,bcc_mw,bcc_pdw,bcc_lw,bcc_wpw,bcc_hpw,bcc_pkw,bcc_tow)
            VALUES (".$dataarraystr.")";
}
else
{
    $sql = "INSERT INTO blindscouriercalculations
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct,bcc_tw,bcc_pdw,bcc_lw,bcc_wpw,bcc_hpw,bcc_pkw,bcc_tow)
            VALUES (".$dataarraystr.")";
}

$result = dbQuery($sql);

}

function reportblindsquantitiescalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS blindsquantitiescalculations(
          bcc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          bcc_typ ENUM (\"Solid\",\"Sheer\"),
          bcc_qty INT(10),
          bcc_l DECIMAL(10,2),
          bcc_w DECIMAL(10,2),
          bcc_or INT(1),
          bcc_m TINYINT(1),
          bcc_mo TINYINT(1),
          bcc_pt TINYINT(1),
          bcc_ct TINYINT(1),
          bcc_np DECIMAL(10,2),
          bcc_cf DECIMAL(2,1),
          bcc_fq DECIMAL(10,2),
          bcc_sq DECIMAL(10,2),
          bcc_tq DECIMAL(10,2),
          bcc_wpq DECIMAL(10,2),
          bcc_hpq DECIMAL(10,2))";

  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
    $sql = "INSERT INTO blindsquantitiescalculations 
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct, bcc_np,bcc_cf,bcc_fq,bcc_sq,bcc_wpq,bcc_hpq)
            VALUES (".$dataarraystr.")";
  }
  else
  {
    $sql = "INSERT INTO blindsquantitiescalculations 
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct, bcc_np,bcc_cf,bcc_fq,bcc_sq,bcc_tq,bcc_wpq,bcc_hpq)
            VALUES (".$dataarraystr.")";
  }

  $result = dbQuery($sql);

}

function reportblindspricingcalculations($typ,$qty,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS blindspricingcalculations(
          bcc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          bcc_typ ENUM (\"Solid\",\"Sheer\"),
          bcc_qty INT(10),
          bcc_l DECIMAL(10,2),
          bcc_w DECIMAL(10,2),
          bcc_or INT(1),
          bcc_m TINYINT(1),
          bcc_mo TINYINT(1),
          bcc_pt TINYINT(1),
          bcc_ct TINYINT(1),
          bcc_bsp DECIMAL(10,2),
          bcc_vap DECIMAL(2,1),
          bcc_lp DECIMAL(10,2),
          bcc_sp DECIMAL(10,2),
          bcc_tp DECIMAL(10,2),
          bcc_wpp DECIMAL(10,2),
          bcc_hpp DECIMAL(10,2),
          bcc_ifp DECIMAL(10,2),
          bcc_ofp DECIMAL(10,2),
          bcc_mp DECIMAL(10,2),
          bcc_cp DECIMAL(10,2),
          bcc_efap DECIMAL(10,2),
          bcc_top DECIMAL(10,2))";

  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
    $sql = "INSERT INTO blindspricingcalculations 
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct, bcc_bsp,bcc_vap,bcc_lp,bcc_sp,bcc_wpp,bcc_hpp,bcc_ifp,bcc_ofp,bcc_mp,bcc_cp,bcc_efap,bcc_top)
            VALUES (".$dataarraystr.")";
  }
  else
  {
    $sql = "INSERT INTO blindspricingcalculations 
            (bcc_typ,bcc_qty,bcc_l,bcc_w,bcc_or,bcc_m,bcc_mo,bcc_pt,bcc_ct, bcc_bsp,bcc_vap,bcc_lp,bcc_sp,bcc_tp,bcc_wpp,bcc_hpp,bcc_ifp,bcc_ofp,bcc_top)
            VALUES (".$dataarraystr.")";
  }

  $result = dbQuery($sql);

}

function reportcouriercalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS curtainscouriercalculations(
          cc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          cc_typ ENUM (\"Solid\",\"Sheer\"),
          cc_qty INT(10),
          cc_nc INT(1),
          cc_l DECIMAL(10,2),
          cc_w DECIMAL(10,2),
          cc_or INT(1),
          cc_m TINYINT(1),
          cc_mo TINYINT(1),
          cc_pt TINYINT(1),
          cc_ct TINYINT(1),
          cc_mw DECIMAL(10,2),
          cc_tw DECIMAL(10,2),
          cc_btw DECIMAL(10,2),
          cc_tbw DECIMAL(10,2),
          cc_pdw DECIMAL(10,2),
          cc_lw DECIMAL(10,2),
          cc_ctw DECIMAL(10,2),
          cc_wcw DECIMAL(10,2),
          cc_jw DECIMAL(10,2),
          cc_bw DECIMAL(10,2),
          cc_pkw DECIMAL(10,2),
          cc_tow DECIMAL(10,2))";
  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$nc."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
      $sql = "INSERT INTO curtainscouriercalculations 
              (cc_typ,cc_qty,cc_nc,cc_l,cc_w,cc_or,cc_m,cc_mo,cc_pt,cc_ct,cc_mw,cc_tw,cc_pdw,cc_lw,cc_ctw,cc_wcw,cc_jw,cc_bw,cc_pkw,cc_tow)
              VALUES (".$dataarraystr.")";
  }
  else
  {
      $sql = "INSERT INTO curtainscouriercalculations 
              (cc_typ,cc_qty,cc_nc,cc_l,cc_w,cc_or,cc_m,cc_mo,cc_pt,cc_ct,cc_tw,cc_btw,cc_tbw,cc_pdw,cc_lw,cc_ctw,cc_wcw,cc_jw,cc_bw,cc_pkw,cc_tow)
              VALUES (".$dataarraystr.")";
  }

  $result = dbQuery($sql);
}

function reportquantitycalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS curtainsquantitycalculations(
          qc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          qc_typ ENUM (\"Solid\",\"Sheer\"),
          qc_qty INT(10),
          qc_nc INT(1),
          qc_l DECIMAL(10,2),
          qc_w DECIMAL(10,2),
          qc_or INT(1),
          qc_m TINYINT(1),
          qc_mo TINYINT(1),
          qc_pt TINYINT(1),
          qc_ct TINYINT(1),
          qc_np INT(10),
          qc_cf DECIMAL(2,1),
          qc_fq DECIMAL(10,2),
          qc_lcq DECIMAL(10,2),
          qc_ctq DECIMAL(10,2),
          qc_cwq DECIMAL(10,2),
          qc_chq DECIMAL(10,2),
          qc_sq DECIMAL(10,2),
          qc_tq DECIMAL(10,2),
          qc_trabq DECIMAL(10,2),
          qc_oq DECIMAL(10,2),
          qc_jq DECIMAL(10,2),
          qc_bq DECIMAL(10,2),
          qc_mq DECIMAL(10,2),
          qc_btq DECIMAL(10,2),
          qc_tbq DECIMAL(10,2))";

  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$nc."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
      $sql = "INSERT INTO curtainsquantitycalculations 
              (qc_typ,qc_qty,qc_nc,qc_l,qc_w,qc_or,qc_m,qc_mo,qc_pt,qc_ct, qc_np,qc_cf,qc_fq,qc_lcq,qc_ctq,qc_cwq,qc_chq,qc_sq,qc_tq,qc_oq,qc_jq,qc_bq,qc_mq)
              VALUES (".$dataarraystr.")";
  }
  else
  {
      $sql = "INSERT INTO curtainsquantitycalculations 
              (qc_typ,qc_qty,qc_nc,qc_l,qc_w,qc_or,qc_m,qc_mo,qc_pt,qc_ct, qc_np,qc_cf,qc_fq,qc_lcq,qc_ctq,qc_cwq,qc_chq,qc_sq,qc_tq,qc_trabq,qc_oq,qc_jq,qc_bq,qc_btq,qc_tbq)
              VALUES (".$dataarraystr.")";
  }

  $result = dbQuery($sql);
}

function reportpricingcalculations($typ,$qty,$nc,$l,$w,$opacityreq,$mount,$motorized,$powertype,$controltype,$dataarray)
{
  $sql = "CREATE TABLE IF NOT EXISTS curtainspricingcalculations(
          pc_id iNT(10) AUTO_INCREMENT PRIMARY KEY,
          pc_typ ENUM (\"Solid\",\"Sheer\"),
          pc_qty INT(10),
          pc_nc INT(1),
          pc_l DECIMAL(10,2),
          pc_w DECIMAL(10,2),
          pc_or INT(1),
          pc_m TINYINT(1),
          pc_mo TINYINT(1),
          pc_pt TINYINT(1),
          pc_ct TINYINT(1),

          pc_bsp DECIMAL(10,2),
          pc_vp DECIMAL(10,2),
          pc_lp DECIMAL(10,2),
          pc_sp DECIMAL(10,2),
          pc_lcp DECIMAL(10,2),
          pc_ctp DECIMAL(10,2),
          pc_cwp DECIMAL(10,2),
          pc_trp DECIMAL(10,2),
          pc_trabp DECIMAL(10,2),
          pc_jp DECIMAL(10,2),
          pc_brp DECIMAL(10,2),
          pc_mp DECIMAL(10,2),
          pc_rp DECIMAL(10,2),
          pc_btp DECIMAL(10,2),
          pc_tbp DECIMAL(10,2),
          pc_ifp DECIMAL(10,2),
          pc_ofp DECIMAL(10,2),
          pc_top DECIMAL(10,2))";

  $result = dbQuery($sql);
  $dataarraystr = "'".$typ."','".$qty."','".$nc."','".$l."','".$w."','".$opacityreq."','".$mount."','".$motorized."','".$powertype."','".$controltype."','".implode("','",$dataarray)."'";

  if($motorized)
  {
      $sql = "INSERT INTO curtainspricingcalculations 
              (pc_typ,pc_qty,pc_nc,pc_l,pc_w,pc_or,pc_m,pc_mo,pc_pt,pc_ct, pc_bsp,pc_vp,pc_lp,pc_sp,pc_lcp,pc_ctp,pc_cwp,pc_trp,pc_jp,pc_brp,pc_mp,pc_rp,pc_ifp,pc_ofp,pc_top)
              VALUES (".$dataarraystr.")";
  }
  else
  {
      $sql = "INSERT INTO curtainspricingcalculations 
              (pc_typ,pc_qty,pc_nc,pc_l,pc_w,pc_or,pc_m,pc_mo,pc_pt,pc_ct, pc_bsp,pc_vp,pc_lp,pc_sp,pc_lcp,pc_ctp,pc_cwp,pc_trabp,pc_jp,pc_brp,pc_btp,pc_tbp,pc_ifp,pc_ofp,pc_top)
              VALUES (".$dataarraystr.")";
  }

  $result = dbQuery($sql);
}


function getcouriercalculations()
{
    $sql = "SELECT *
            FROM curtainscouriercalculations cc
            ORDER BY cc.cc_id DESC
            LIMIT 1";
    $result = dbQuery($sql);
    if (($result != NULL) && (dbNumRows($result) > 0)) {
      // output data of each row
        $row = dbFetchAssoc($result);
        $courierinfo = array("MotorWeight"=>$row["cc_mw"],
                            "TrackWeight"=>$row["cc_tw"],
                            "BatonWeight"=>$row["cc_bw"],
                            "TieBacksWeight"=>$row["cc_tbw"],
                            "ProductWeight"=>$row["cc_pdw"],
                            "LiningWeight"=>$row["cc_lw"],
                            "CurtainTapeWeight"=>$row["cc_ctw"],
                            "WeightofCornerWeights"=>$row["cc_wcw"],
                            "JointersWeight"=>$row["cc_jw"],
                            "PackagingMaterialWeight"=>$row["cc_pkw"],
                            "TotalWeight"=>$row["cc_tow"]);
        return $courierinfo;
      }
      else
        return NULL;
}

function appendhtmlreport($reportname,$dataarray)
{

}
?>