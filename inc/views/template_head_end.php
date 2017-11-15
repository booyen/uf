

<?php

/**
 * template_head_end.php
 *
 * Author: pixelcave
 *
 * (continue) The first block of code used in every page of the template
 *
 * The reason we separated template_head_start.php and template_head_end.php
 * is for enabling us to include between them extra plugin CSS files needed only in
 * specific pages
 *
 */
?>

    <!-- Bootstrap and OneUI CSS framework -->
    <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
    <link rel="stylesheet" id="css-main" href="<?php echo $one->assets_folder; ?>/css/oneui.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script src="../search/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
</script>
    <script src="assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <?php if ($one->theme) { ?>
    <link rel="stylesheet" id="css-theme" href="<?php echo $one->assets_folder; ?>/css/themes/<?php echo $one->theme; ?>.min.css">
    <?php } ?>
 
</head>
<body <?php if ($one->body_bg) { echo ' class="bg-image" style="background-image: url(\'' . $one->body_bg . '\');"'; } ?>>