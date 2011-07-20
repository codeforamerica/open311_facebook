<?=doctype()?>
<html>
<head>
<?=link_tag('css/reset.css')?>
<?=link_tag('css/one-page.css')?>
<?=link_tag('css/custom.css')?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?=site_url('js/script.js')?>" type="text/javascript"></script>
<script src="<?=site_url('js/map.js')?>" type="text/javascript"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title><?=PROJECT_NAME?></title>
</head>
<body onload="initialize()">
<div id="content">
<header class="clearfix">
	<h1 id="project_name"><?=PROJECT_NAME?></h1>
	<h2 id="city_name"><?=CITY_NAME?></h2>
</header>
<div id="main">

