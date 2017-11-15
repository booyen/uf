<?php session_start();?> 
<?php require '../inc/config.php'; require '../inc/frontend_config.php'; ?>
<?php require '../inc/views/template_head_start.php'; ?>
<?php require '../inc/views/template_head_end.php'; ?>
<?php require '../inc/views/base_header_dashboard_frontend.php'; ?>

<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("ummah") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>


<!-- Hero Content -->
<div class="bg-primary-dark">
    <section class="content content-full content-boxed">
        <!-- Section Content -->
        <div class="push-100-t push-50 text-center">
            <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Search</h1>
            <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Search by name,type or anthing related to organization</h2>
        </div>
        <!-- END Section Content -->
    </section>
</div>
<!-- END Hero Content -->

<!-- Search Section -->
<div class="bg-white">
    <section class="content content-full content-boxed">
        <!-- Section Content -->
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form action="frontend_search.php" method="GET">
                    <div class="input-group input-group-lg">
                        <input class="form-control" type="text" placeholder="Search everything.." name="query">
                        <div class="input-group-btn">
                            <button name="btn-search" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Section Content -->
    </section>
</div>
<!-- END Search Section -->

<style>
    .nav-tabs>li,
    .nav-pills>li {
        float: none;
        display: inline-block;
        *display: inline;
        /* for IE7*/
        *zoom: 1;
        /* for IE7*/
    }
</style>
<!-- Page Content -->

 <?php

    if(isset($_GET['btn-search']))
		{      
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM org_profile
            WHERE (`org_fullname` LIKE '%".$query."%') OR
            (`org_username` LIKE '%".$query."%')  
            ") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
   ?>
<div class="content">
    <div class="block">
        <ul class="nav nav-tabs" data-toggle="tabs" style=" text-align:center;">
            <li class="active">
                <a href="#search-organization">Organization</a>
            </li>
            <li>
                <a href="#search-projects">Projects</a>
            </li>

        </ul>
        <div class="block-content tab-content bg-dark">
            <!-- organization -->
            <div class="tab-pane fade fade-up in active" id="search-organization">
                
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th><i class=" text-gray"></i> Organization Name</th>
                           
                        </tr>
                    </thead>
                    <?php
                         if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                $orgid = $results["org_proid"];
                $orgname = $results["org_fullname"];
                $orgnick = $results["org_username"];
                $orgdesc = $results["org_description"];
             
               // echo '<tr><td><a href="/uf/uf/profiler/profiles.php?first='.$firstname.'">'.$firstname.'</a><br /></td></tr>';
                
                
               // echo "<p><h3>".$results['userName']."</h3>".$results['userEmail']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            
             
 ?>
                    <tbody>
                        <tr>
                            <td>
                                <h3 class="h5 font-w600 push-10">
                                   <?php echo '<a class="link-effect" href="/uf/uf/org_base/base_pages_profile_org.php?Uasd4453279M896bhNJndasdsM8222najGyhkbnA0092jNMqweuiHqweqweashhdj='.$orgid.'">'.$orgname.'</a>'; ?>
                                    
                                </h3>
                                <div class="push-10">
                                    <?php // check balik verification, jumlah follower dan jumlah dana yang dikumpulkan ?>
                                    
                                </div>
                                <div class="font-s13 text-muted hidden-xs">
                                    <?php echo $orgdesc ?>
                                </div>
                            </td>
                           
                        </tr>
                                <?php }
       }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
        }
?>
                    </tbody>
                </table>
                
               
    <!-- END Section Content -->
</section>
<!-- END Grid Content -->
        </div>
            
    </div>
</div>
<!-- END Page Content -->

<?php require '../inc/views/frontend_footer.php'; ?>
<?php require '../inc/views/template_footer_start.php'; ?>

<!-- Page JS Code -->
<script>
    jQuery(function() {
        // Init page helpers (Appear + CountTo plugins)
        App.initHelpers(['appear', 'appear-countTo']);
    });
</script>

<?php require '../inc/views/template_footer_end.php'; ?>