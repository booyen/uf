<?php
session_start();
require_once  'init.php';

if(isset($_GET['orgid'], $_GET['rating'])){

	$orgid = (int)$_GET['orgid'];
	$rating = (int)$_GET['rating'];


	if(in_array($rating, [1, 2, 3, 4, 5])){

		$exists = $db->query("SELECT org_proid FROM org_profile WHERE org_proid = {$orgid}");

		if($exists){
			$db->query("INSERT INTO um_rating (org_proid, rating) VALUES ({$orgid}, {$rating})");
		}
	}
	header('Location: http://localhost/uf/uf/org_base/base_pages_profile_org.php?Uasd4453279M896bhNJndasdsM8222najGyhkbnA0092jNMqweuiHqweqweashhdj=' . $orgid);
}