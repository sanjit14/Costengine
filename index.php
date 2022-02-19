<?php
require_once 'library/config.php';
require_once "library/database.php";
require_once "library/functions.php";
require_once "library/odoo-config.php";

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
//require_once('library/ripcord-master/ripcord_client.php');

//$info = ripcord::client('http://172.168.1.234:14551')->start();
//list($url, $db, $username, $password) = array($info['host'], $info['database'], $info['user'], $info['password']);
//$common = ripcord::xmlrpcClient($url);
//$common = ripcord::client($url."/xmlrpc/2/common");
//echo "Hello";
//$common->version();
//$uid = $common->authenticate($db, $username, $password, array());
//echo('UID:');
//require_once "library/odoo-ver-check.php";
//require_once "library/odoo-functions.php";

//if(odooauthenticate()) echo "Authenticated Successfully in Odoo";

$p = "home";
if(isset($_GET['p']) && ($_GET['p'] != NULL))
  $p = $_GET['p'];

//Category
$catid = 1;
$catnm = "";
$catds = "";

$catlist = getcategorylist();
$plist = getproductlist($catid);






$hotels = array("Five Palm Jumeirah, Dubai", 
                "Ritz Carlton, Pune", 
                "Fraser Suites, Doha",
                "The Oberoi, Delhi",
                "Le Meridien, Mahabaleshwar",
                "Taj Exotica Resort & Spa, Maldives",
                "The Niraamaya Retreats, Kerala",
                "Park Hyatt, Hyderabad",
                "Sarova Nairobi, Kenya");

$hotelstxt = array("FIVE Palm Jumeirah Hotel, in Dubai is a luxury lifestyle hotel bringing glitz and glamour to the jet-setting social scene of the city. Modern and clean, this hotel is a uber cool pad for young Turks. Tulio worked extensively with this hotel and developed custom textiles for its restaurants and public areas. The multi-purpose ballroom has been adorned with a massive 30 ft high and 250 ft wide automated curtain to block out the harsh Dubai sun during events.", 
  "This 290 room 5-star hotel boasts a close location to the airport and offers access to business and leisure destinations in downtown Pune. The interiors embrace the local heritage of the city. The drapes and bedding for the spa, dining area, lobby area, and suites were customized by the Tulio team to complement the Art Deco interior style. The grand property is classically inspired and yet relevant, with finely balanced colour themes, extensive space planning, and a clear understanding of detail.", 
  "Located in the heart of Qatar’s capital city, Fraser Suites is perfect for business and leisure travelers alike. Blending twenty-first- century tones with a touch of hospitality, the establishment boasts of experience state-of-the-art architecture. The property consists of 396 rooms and suites ranging from studio apartments to three-bedroom penthouse suites. Our design team worked extensively to fashion soft furnishings that gel well with the overall aesthetics of the hotel. Right from crafting curtains to using different fabrics and stitching techniques to curate bed linen & cushions that give a warm sumptuous character to the rooms.",
   "The Oberoi, New Delhi is an iconic luxury hotel in New Delhi. The hotel has 220 rooms and suites inspired by Lutyens' New Delhi design, with authentic furnishings and handpicked artwork. Curtains, cushions, and bed runners in these rooms are designed with Art Deco and Victorian inspirations greeting guests with understated elegance. Tulips worked on custom appliqués and embroideries for the textiles at this grand hotel. Custom brass hardware was also manufactured for tie-backs in the guest rooms.",
"Sitting cozily in the unblemished and rare evergreen forests in the Western Ghats, Le Meridien Mahabaleshwar is a 122-guest room luxurious hospitality establishment filled with light and peace. Our design team ensured that the creative vision of the architect and the client were externalized. We tapped into our vast textile library to create soft furnishings that were as enchanting to behold as they were soft to touch. We offered a sumptuous range of fabrics that are bathed in cool, vibrant colors and adorned with soothing swirls and stripes.",
"The Award-winning resort is a sublime fusion of luxury and nature nestled amidst one of the largest lagoons in the Maldives. Accommodation is a choice between villas built entirely over water and beach villas. The resort seamlessly extends the magic of the island's blessed natural beauty with its contemporary room design. Our design team's involvement in the project was extensive and encompassed crafting window drapes and aqua-inspired bed linen and cushions that accentuate the comfort and bliss of the room interiors.",
"Tucked away on the banks of the Lake Vembanad, The Niraamaya Retreats is a natural-paradise-transformed-into-a-holiday- heaven. The brief Tulips received from the client was crystal-clear, which was to create soft furnishings that set off the sublime natural profusion of its location. Our expert curtain-makers designed diaphanous silk curtains to dress the windows of cocooning, self-contained luxurious villas. Runners, cushions, bed sets, and panels were embroidered in colorful, traditional paisley and Mandala motifs.",
"Supremely opulent, Park Hyatt Hyderabad is a handsome modern take on traditional Indian architecture. This grand 5-star establishment has 185 guestrooms and 24 suites along with 42 fully-serviced apartments. Our team designed a scheme that drew heavily from Hyderabad's rich Nizami past. We crafted bespoke carpets, cushion covers, upholstery, curtains, and bed runners that complemented the architecture and interior of the grand establishment. Persian motifs, rich textures, and deep colors were used to adorn sumptuous fabrics like velvets and silks.",
"Sarova Hotels and Resorts are one of the biggest names in the hospitality sector of Kenya with its hotels not only situated in the most convenient locations but also represent the very pinnacle of luxuriously appointed accommodation in the East African region. Sarova hotels stand for the ultimate standard in design, comfort, facilities, food, and leisure. Tulips has worked extensively with this chain of hotels and developed custom soft furnishings like curtains, bed linen, etc. for its establishments in Nairobi, Nakuru, and Masai Mara. From vibrant colour schemes to classic designs, the interiors were bedecked with textiles of utmost class and quality.");

$h = 0;
$m = "margin-right:40px;";
$cls = "owl-one";
if(isset($_GET['h']) && ($_GET['h'] != NULL))
{
  $h = $_GET['h'];
  $m = "";
  $cls = "owl-three";
}

$thumbnails = array(array("product1",
                        "product2",
                        "product3",
                        "product4",
                        "product5"),
                  array("five-palm-jumeirah-1",
                        "five-palm-jumeirah-2",
                        "five-palm-jumeirah-3",
                        "five-palm-jumeirah-4",
                        "five-palm-jumeirah-5",
                        "five-palm-jumeirah-6"),
                  array("fraser-suites-1",
                        "fraser-suites-2",
                        "fraser-suites-3",
                        "fraser-suites-4"),
                  array("le-meridien-1",
                        "le-meridien-2",
                        "le-meridien-3"),
                  array("nirmaya-resort-1",
                        "nirmaya-resort-2",
                        "nirmaya-resort-3",
                        "nirmaya-resort-4",
                        "nirmaya-resort-5"),
                  array("oberoi-1",
                        "oberoi-2",
                        "oberoi-3",
                        "oberoi-4"),
                  array("park-hyatt-1",
                        "park-hyatt-2",
                        "park-hyatt-3",
                        "park-hyatt-4",
                        "park-hyatt-5"),
                  array("ritz-carlton-1",
                        "ritz-carlton-2",
                        "ritz-carlton-3",
                        "ritz-carlton-4"),
                  array("sarova-1",
                        "sarova-2",
                        "sarova-3"),
                  array("taj-1.jpg",
                        "taj-2.jpeg",
                        "taj-3.jpg",
                        "taj-4.jpg")
                  );
$category = array("Curtains","Blinds","Curtain Accessories","Collections");
$product = array(array("S1-D1","S1-D2","S1-D3","S2-D3","S4-D1","S4-D3","S4-D4","S4-D5","S5-D1","S5-D2","S6-D1","S9-D1","S15-D3","S16-D2","S16-D5","S17-D4","S18-D1"),
                 array("S1-D1","S1-D2","S1-D3","S4-D1","S4-D3","S4-D4","S4-D5","S5-D1","S5-D2","S6-D1","S9-D1","S15-D3","S16-D2","S16-D5","S17-D4","S17-D10","S18-D1")
                );

$ninarow = 4;
$sizeandspacing = 85;
if(isset($_GET['n']) && ($_GET['n'] != NULL))
{
  $ninarow = $_GET['n'];
}

$flist = array(array("f_nm"=>"","f_ds"=>"","f_img"=>"center1.svg"),
               array("f_nm"=>"","f_ds"=>"","f_img"=>"center2.svg"),
               array("f_nm"=>"","f_ds"=>"","f_img"=>"center3.svg"),
               array("f_nm"=>"","f_ds"=>"","f_img"=>"center4.svg"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "header.php" ?>
  </head>
  <!-- Provide Page Name in data-title and class to use in JavaScript and SCSS files respectively -->

  <body data-title="index" class="index">
    <!--<section class="two-divided-sections">-->
    <link rel="stylesheet" href="productpagesassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="productpagesassets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="productpagesassets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="productpagesassets/css/style.css">
    <link rel="stylesheet" href="productpagesassets/css/plugins/nouislider/nouislider.css">
    <style>
            div.scroll {
                margin:4px, 4px;
                padding:4px;
                height: 740px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
                /* Hide scrollbar for IE, Edge and Firefox */
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
                scroll-behavior: smooth;

            }

             /* Hide scrollbar for Chrome, Safari and Opera */
            div.scroll::-webkit-scrollbar {
                display: none;
            }

            
            div {
                scroll-behavior: smooth;
                overscroll-behavior: contain;

            }
    </style>
            <form class="content" style="margin-left:0px;" id="productdetailsform" name="productdetailsform">
              <div>
                    <label for="catlist">Categories:</label>
                    <select name="catlist" id="catlist" onchange="prodlistdropdown(this.value,<?php echo count($catlist) ?>);setTimeout('', 1000);if(this.value == 1) cur(); if(this.value ==2) bli();" style="width:150px;background-color:white;border:1px solid black;padding:3px;margin-left:40px">
                        <?php for($i=0;$i<count($catlist);$i++) { ?>
                            <option value="<?php echo $catlist[$i]["cat_id"] ?>"><?php echo $catlist[$i]["cat_nm"] ?></option>
                        <?php } ?>
                    </select>
              </div> 
              <div>
                    <label for="catlist">Products:</label>
                    <select name="productlist" id="productlist" onchange="if(catlist.value == 1) cur(); if(catlist.value == 2) bli();" style="width:150px;background-color:white;border:1px solid black;padding:3px;margin-left:40px">
                    <?php for($i=0;$i<count($plist);$i++) { ?>
                            <option value="<?php echo $plist[$i]["p_id"] ?>"><?php echo $plist[$i]["p_cd"] ?></option>
                        <?php } ?>
                    </select>
                        <?php for($i=0;$i<count($catlist);$i++) { ?>
                            <?php if($catlist[$i]["cat_nm"] == "Curtains") { ?>
                                <div id="<?php echo $catlist[$i]["cat_id"] ?>" name="<?php echo $catlist[$i]["cat_nm"] ?>">
                                    <button type="button" class="collapsible">Quantity</button>
                                    <div class="collapsiblecontent">
                                           <input onkeyup="cur()" type="text" id="cur_quantity" name="cur_quantity" style="width:40px;margin-right:40px" min="1" max="10" step="1" data-decimals="0" required value="1">
                                           <label for="cur_pyes">Pair</label>
                                           <input onchange="cur();" type="radio" id="cur_pyes" name="cur_pair" value="Pair" checked>
                                           <label for="cur_pno">Single</label>
                                           <input onchange="cur()" type="radio" id="cur_pno" name="cur_pair" value="Single">
                                    </div>
                                    <button type="button" class="collapsible">Furnishing Unit Dimensions</button>
                                    <div class="collapsiblecontent">
                                           <label for="cur_wlength" style="padding-left:0px">Length</label>
                                           <input onkeyup="cur()" type="text" id="cur_wlength" name="cur_wlength" style="width:40px;vertical-align:middle">
                                           <label for="cur_wwidth">Width</label>
                                           <input onkeyup="cur()" type="text" id="cur_wwidth" name="cur_wwidth" style="width:40px;margin-left:10px">
                                    </div>
                                    <button type="button" class="collapsible">Lining Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="cur_lt_blackout" style="padding-left:0px">Blackout</label>
                                           <input onchange="cur()" type="radio" id="cur_lt_blackout" name="cur_liningtype" value="Blackout" checked="on">
                                           <label for="cur_lt_dimout">Dimout</label>
                                           <input onchange="cur()" type="radio" id="cur_lt_dimout" name="cur_liningtype" value="Dimout">      
                                           <label for="cur_lt_standard">Standard</label>
                                           <input onchange="cur()" type="radio" id="cur_lt_standard" name="cur_liningtype" value="Standard" >                                   
                                    </div>
                                    <button type="button" class="collapsible">Mount Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="cur_wallmount" style="padding-left:0px">Wall Mount</label>
                                           <input onchange="cur()" type="radio" id="cur_wallmount" name="cur_mounttype" value="Wall_Mount">
                                           <label for="cur_ceilingmount">Ceiling Mount</label>
                                           <input onchange="cur()" type="radio" id="cur_ceilingmount" name="cur_mounttype" value="Ceiling_Mount" checked>
                                    </div>
                                    <button type="button" class="collapsible">Hardware Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="cur_motorized" style="padding-left:0px">Motorized</label>
                                           <input onchange="displaymotorizedoptions();setTimeout('', 1000);cur()" type="radio" id="cur_motorized" name="cur_hardwaretype" value="Motorized">
                                           <label for="cur_manual">Manual</label>
                                           <input onchange="displaymotorizedoptions();cur()" type="radio" id="cur_manual" name="cur_hardwaretype" value="Manual" checked>
                                    </div>
                                    <div id="cur_motorizedoptions" class="motorizedoptions" style="visibility:hidden;display:none">
                                        <button type="button" class="collapsible">Power Type</button>
                                        <div class="collapsiblecontent">
                                            <label for="cur_battery" style="padding-left:0px">Battery</label>
                                            <input onchange="cur()" type="radio" id="cur_battery" name="cur_powertype" value="Battery">
                                            <label for="cur_electricwired">Electric Wired</label>
                                            <input onchange="cur()" type="radio" id="cur_electricwired" name="cur_powertype" value="ElectricWired" checked>
                                        </div>
                                        <button type="button" class="collapsible">Control Type</button>
                                        <div class="collapsiblecontent">
                                            <label for="cur_remote" style="padding-left:0px">Remote</label>
                                            <input onchange="cur()" type="radio" id="cur_remote" name="cur_controltype" value="Remote">
                                            <label for="cur_homeautomation">Home Automation</label>
                                            <input onchange="cur()" type="radio" id="cur_homeautomation" name="cur_controltype" value="HomeAutomation" checked>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif($catlist[$i]["cat_nm"] == "Blinds") { ?>
                                <div id="<?php echo $catlist[$i]["cat_id"] ?>" name="<?php echo $catlist[$i]["cat_nm"] ?>" style="visibility:hidden;display:none">
                                        <button type="button" class="collapsible">Quantity</button>
                                    <div class="collapsiblecontent">
                                           <input onkeyup="bli()" type="text" id="bli_quantity" name="bli_quantity" style="width:40px;margin-right:40px" min="1" max="10" step="1" data-decimals="0" required value="1">
                                    </div>
                                    <button type="button" class="collapsible">Furnishing Unit Dimensions</button>
                                    <div class="collapsiblecontent">
                                           <label for="bli_wlength" style="padding-left:0px">Length</label>
                                           <input onkeyup="bli();" type="text" id="bli_wlength" name="bli_wlength" style="width:40px;vertical-align:middle">
                                           <label for="bli_wwidth">Width</label>
                                           <input onkeyup="bli();" type="text" id="bli_wwidth" name="bli_wwidth" style="width:40px;margin-left:10px">
                                    </div>
                                    <button type="button" class="collapsible">Lining Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="bli_lt_blackout" style="padding-left:0px">Blackout</label>
                                           <input onchange="bli();" type="radio" id="bli_lt_blackout" name="bli_liningtype" value="Blackout" checked>
                                           <label for="bli_lt_dimout">Dimout</label>
                                           <input onchange="bli();" type="radio" id="bli_lt_dimout" name="bli_liningtype" value="Dimout">      
                                           <label for="bli_lt_standard">Standard</label>
                                           <input onchange="bli();" type="radio" id="bli_lt_standard" name="bli_liningtype" value="Standard" >                                   
                                    </div>
                                    <button type="button" class="collapsible">Mount Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="bli_wallmount" style="padding-left:0px">Wall Mount</label>
                                           <input onchange="bli();" type="radio" id="bli_wallmount" name="bli_mounttype" value="Wall_Mount">
                                           <label for="bli_ceilingmount">Ceiling Mount</label>
                                           <input onchange="bli();" type="radio" id="bli_ceilingmount" name="bli_mounttype" value="Ceiling_Mount" checked>
                                    </div>
                                    <button type="button" class="collapsible">Hardware Type</button>
                                    <div class="collapsiblecontent">
                                           <label for="bli_motorized" style="padding-left:0px">Motorized</label>
                                           <input onchange="displaymotorizedoptions();setTimeout('', 1000);bli();" type="radio" id="bli_motorized" name="bli_hardwaretype" value="Motorized">
                                           <label for="bli_manual">Manual</label>
                                           <input onchange="displaymotorizedoptions();bli();" type="radio" id="bli_manual" name="bli_hardwaretype" value="Manual" checked>
                                    </div>
                                    <div id="bli_motorizedoptions" class="motorizedoptions" style="visibility:hidden;display:none">
                                        <button type="button" class="collapsible">Power Type</button>
                                        <div class="collapsiblecontent">
                                            <label for="bli_battery" style="padding-left:0px">Battery</label>
                                            <input onchange="bli();" type="radio" id="bli_battery" name="bli_powertype" value="Battery">
                                            <label for="bli_electricwired">Electric Wired</label>
                                            <input onchange="bli();" type="radio" id="bli_electricwired" name="bli_powertype" value="ElectricWired" checked>
                                        </div>
                                        <button type="button" class="collapsible">Control Type</button>
                                        <div class="collapsiblecontent">
                                            <label for="bli_remote" style="padding-left:0px">Remote</label>
                                            <input onchange="bli();" type="radio" id="bli_remote" name="bli_controltype" value="Remote">
                                            <label for="bli_homeautomation">Home Automation</label>
                                            <input onchange="bli();" type="radio" id="bli_homeautomation" name="bli_controltype" value="HomeAutomation" checked>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                </div>
            </form>    
            <div id="productprice" class="product-price" style="margin-top:40px">
                                        &#8377;0  
                                    </div><!-- End .product-price -->




      <link rel="stylesheet" href="./styles/main.css" />

      <script src="./scripts/prodlistdropdown.js"></script>
      <script src="./scripts/cur.js"></script>
      <script src="./scripts/bli.js"></script>
      <script type="text/javascript">
          document.getElementById("productdetailsform").reset();
     </script>
    <?php include "scripts-element.php" ?>
   <!--<script src="./scripts/instafeed2.js"></script>-->
    <!--<script async src="//www.instagram.com/embed.js"></script>-->

  </body>
</html>