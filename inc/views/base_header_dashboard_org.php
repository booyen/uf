<?php


/**
 * base_header.php
 *
 * Author: shahril Aidi (UmmahFund)
 *
 * The header of each page (Backend)
 *
 */
?>
 <?php   

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ummah";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$user= $_SESSION['user'];

$sql="SELECT * FROM avatar_user WHERE userID='$user'";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

//$count=mysqli_num_rows($result);

//echo $row['org_fullname'];
$avataruser= $row['user_avatar'];
//echo $row['org_avatar'];
?>

<?php


?>
<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                          <img class="img-avatar" src="../userfiles/avatars/<?php echo $avataruser; ?>">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Profile</li>
                    <li>
                        <a tabindex="-1" href="../org_base/base_pages_inbox.php">
                            <i class="si si-envelope-open pull-right"></i>
                            Inbox
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="../org_base/base_pages_profile_org_debut.php">
                            <i class="si si-user pull-right"></i>
                            Dashboard
                            
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="../org_base/base_pages_general_set.php">
                            <i class="si si-settings pull-right"></i>Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Actions</li>
                    
                    <li>
                        <a tabindex="-1" href="../access_module/logout.php">
                            <i class="si si-logout pull-right"></i>Log out
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>
  
        <li class="visible-xs">
            <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
            <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                <i class="fa fa-search"></i>
            </button>
        </li><!-- 
        <li class="js-header-search header-search">
            <form class="form-horizontal" action="base_pages_search.php" method="post">
                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                    <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                </div>
            </form>
        </li>-->
    </ul>
    <!-- END Header Navigation Left -->
</header>
<!-- END Header -->
