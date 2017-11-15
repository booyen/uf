<?php
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
$one->author                       = 'UmmahTroopers';
$one->robots                       = 'noindex, nofollow';
$one->title                        = 'Ummah Fund - An app for Ummah';
$one->description                  = 'UmmahFund - Where Donation make easy!';

// Global Included Files (eg useful for adding different sidebars or headers per page)
$one->inc_side_overlay             = 'base_side_overlay.php';
$one->inc_sidebar                  = 'base_sidebar.php';
$one->inc_header                   = 'base_header.php';

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
$one->l_sidebar_mini               = false;    // True: Mini Sidebar Mode (> 991px), False: Disable mini mode
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
        'url'   => 'base_pages_profile.php'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide">Search</span>',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Search to donate</span>',
        'icon'  => 'fa fa-search',
        'url'   => 'frontend_search.php'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Message</span>',
        'icon'  => 'si si-envelope',
        'url'   => 'base_pages_dashboard.php'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">User profile</span>',
        'type'  => 'heading'
    ),
    
      array(
        'name'  => '<span class="sidebar-mini-hide">My profile</span>',
        'icon'  => 'si si-user',
        'url'   => 'base_pages_dashboard.php'
    ),
    
     array(
        'name'  => '<span class="sidebar-mini-hide">Favorite Organization</span>',
        'icon'  => 'si si-heart',
        'url'   => 'base_pages_dashboard.php'
    ),
    
     array(
        'name'  => '<span class="sidebar-mini-hide">History</span>',
        'icon'  => 'fa fa-history',
        'url'   => 'base_pages_dashboard.php'
    ),

     array(
        'name'  => '<span class="sidebar-mini-hide">Summary</span>',
        'icon'  => 'fa fa-book',
        'url'   => 'base_pages_dashboard.php'
    ),
      array(
        'name'  => '<span class="sidebar-mini-hide">Settings</span>',
        'type'  => 'heading'
    ),
    
    array(
        'name'  => '<span class="sidebar-mini-hide">Profile settings</span>',
        'icon'  => 'si si-wrench',
        'sub'   => array(
            array(
                'name'  => 'Basic information',
                'url'   => 'base_comp_images.php'
            ),
            array(
                'name'  => 'Volunteer settings',
                'url'   => 'base_comp_charts.php'
            ),
            array(
                'name'  => 'Skill settings',
                'url'   => 'base_comp_chartjs_v2.php'
            ),
            array(
                'name'  => 'Change password',
                'url'   => 'base_comp_chartjs_v2.php'
            ),
                       
            
        )
    ),
  
    array(
        'name'  => '<span class="sidebar-mini-hide">Helpdesk</span>',
        'type'  => 'heading'
    ),
   array(
        'name'  => '<span class="sidebar-mini-hide">FAQ</span>',
        'icon'  => 'fa fa-question',
        'sub'   => array(
            array(
                'name'  => 'General FAQ',
                'url'   => 'base_comp_images.php'
            ),
            array(
                'name'  => 'User guide',
                'url'   => 'base_comp_charts.php'
            ),
            array(
                'name'  => 'Documentation',
                'url'   => 'base_comp_chartjs_v2.php'
            ),
            array(
                'name'  => 'News',
                'url'   => 'base_comp_chartjs_v2.php'
            ),
            array(
                'name'  => 'Contact developer',
                'url'   => 'base_comp_chartjs_v2.php'
            ),              
            
        )
    ),

    
    
);