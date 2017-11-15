<?php
if(session_id() == '') {
    session_start();
}
$orgnick = $_SESSION['userName'];
   

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$orgnick= $_SESSION['userName'];

$sql="SELECT * FROM org_profile WHERE org_username='$orgnick'";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);


$avatar= $row['org_avatar'];
$_SESSION['orgID']=$row['org_proid'];
$orgID= $_SESSION['orgID'];
//echo $_SESSION['orgID'];

/**
 * config.php
 *
 * Author: pixelcave
 *
 * Global configuration file
 *
 */

// Include Template class
require 'classes/Template.php';

// Create a new Template Object
$one                               = new Template('UmmahFund', '0.1(alpha)', '../assets'); // Name, version and assets folder's name

// Global Meta Data
$one->author                       = 'UmmahFund';
$one->robots                       = 'noindex, nofollow';
$one->title                        = 'Ummah Fund - An app for Ummah';
$one->description                  = 'UmmahFund - Where Donation make easy!';

// Global Included Files (eg useful for adding different sidebars or headers per page)
$one->inc_side_overlay             = 'base_side_overlay.php';
$one->inc_sidebar                  = 'base_sidebar.php';
$one->inc_header                   = 'base_header_dashboard_org.php';

// Global Color Theme
$one->theme                        = '';       // '' for default theme or 'amethyst', 'city', 'flat', 'modern', 'smooth'

// Global Cookies
$one->cookies                      = false;    // True: Remembers active color theme between pages (when set through color theme list), False: Disables cookies

// Global Body Background Image
$one->body_bg                      = '';       // eg 'assets/img/photos/photo10@2x.jpg' Useful for login/lockscreen pages

// Global Header Options
$one->l_header_fixed               = true;     // True: Fixed Header, False: Static Header

// Global Sidebar Options
$one->l_sidebar_position           = 'left';   // 'left': Left Sidebar and right Side Overlay, 'right': Flipped position
$one->l_sidebar_mini               = true;    // True: Mini Sidebar Mode (> 991px), False: Disable mini mode
$one->l_sidebar_visible_desktop    = true;     // True: Visible Sidebar (> 991px), False: Hidden Sidebar (> 991px)
$one->l_sidebar_visible_mobile     = false;    // True: Visible Sidebar (< 992px), False: Hidden Sidebar (< 992px)

// Global Side Overlay Options
$one->l_side_overlay_hoverable     = false;    // True: Side Overlay hover mode (> 991px), False: Disable hover mode
$one->l_side_overlay_visible       = false;    // True: Visible Side Overlay, False: Hidden Side Overlay

// Global Sidebar and Side Overlay Custom Scrolling
$one->l_side_scroll                = true;     // True: Enable custom scrolling (> 991px), False: Disable it (native scrolling)

// Global Active Page (it will get compared with the url of each menu link to make the link active and set up main menu accordingly)
$one->main_nav_active              = basename($_SERVER['PHP_SELF']);

// Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps, for more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key)
$one->google_maps_api_key          = '';

// Global Main Menu
$one->main_nav                     = array(
    array(
        'name'  => '<span class="sidebar-mini-hide">Dashboard</span>',
        'icon'  => 'fa fa-align-justify',
        'url'   => 'base_pages_profile_org_debut.php'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide">Message</span>',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Send message</span>',
        'icon'  => 'fa fa-edit',
        'url'   => '../org_base/base_pages_inbox.php'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Message</span>',
        'icon'  => 'si si-envelope',
        'url'   => '../org_base/base_pages_inbox.php'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Profile</span>',
        'type'  => 'heading'
    ),
    
      array(
        'name'  => '<span class="sidebar-mini-hide">Organization profile</span>',
        'icon'  => 'fa fa-group',
        'url'   => " /uf/uf/org_base/base_pages_profile_org.php?Uasd4453279M896bhNJndasdsM8222najGyhkbnA0092jNMqweuiHqweqweashhdj=$orgID"
    ),
    
 
     array(
        'name'  => '<span class="sidebar-mini-hide">Run campaign</span>',
        'icon'  => 'fa fa-handshake-o',
        'url'   => 'base_pages_campaign.php'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide">Settings</span>',
        'type'  => 'heading'
    ),
      array(
        'name'  => '<span class="sidebar-mini-hide">Verification</span>',
        'icon'  => 'fa fa-check-square',
        'url'   => 'base_pages_verification.php'
    ),
       array(
        'name'  => '<span class="sidebar-mini-hide">Marketing</span>',
        'icon'  => 'fa fa-check-square',
        'url'   => 'base_pages_marketing.php'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide">Profile settings</span>',
        'icon'  => 'si si-wrench',
        'sub'   => array(
            array(
                'name'  => 'General Settings',
                'url'   => 'base_pages_general_set.php'
            ),
            array(
                'name'  => 'Gateway settings',
                'url'   => 'base_pages_gateway.php'
            ),
            array(
                'name'  => 'Volunteer management',
                'url'   => 'base_pages_vol_reach.php'
            ),
           array(
                'name'  => 'Reset password',
                'url'   => 'base_pages_security.php'
            ),
      
        )
    ),
  
  

    
    
);