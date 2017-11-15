<?php require_once('config/main.php');
$data_donation = mysql_query("select * from donate_log");
$data_org=mysql_query("select * from org_profile");
$data_user=mysql_query("select * from um_users");
$data_spk=mysql_query("select * from veri_request");
 ?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_user); ?></h3>
          <p>total users</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="./?page=data_user" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_org); ?></h3>
          <p>Registered Organization</p>
        </div>
        <div class="icon">
          <i class="fa fa-group"></i>
        </div>
        <a href="./?page=data_pembelian" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_spk); ?></h3>
          <p>Request for verification</p>
        </div>
        <div class="icon">
          <i class="fa fa-group"></i>
        </div>
        <a href="./?page=data_teknisi" class="small-box-footer">more Info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo mysql_num_rows($data_donation); ?></h3>
          <p>Donation transaction </p>
        </div>
        <div class="icon">
          <i class="fa fa-file"></i>
        </div>
        <a href="./?page=spk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>