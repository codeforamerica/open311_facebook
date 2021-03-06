<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<?=link_tag('css/reset.css')?>
<?=link_tag('css/style.css')?>
<?=link_tag('css/'.$this->session->userdata('medium').'.css')?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
/* PHP-JS constants hack */
var CITY_LAT = "<?=CITY_LAT?>";
var CITY_LONG = "<?=CITY_LONG?>";
var CITY_NAME = "<?=CITY_NAME?>";
var STATE_ABBR = "<?=STATE_ABBR?>";
</script>
<script src="<?=site_url('js/script.js')?>" type="text/javascript"></script>
<script src="<?=site_url('js/map.js')?>" type="text/javascript"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title><?=PROJECT_NAME?></title>
</head>
<body onload="initialize()">
<div id="content">
<? if($this->session->userdata('medium') == 'web'): ?>
<header class="clearfix">
	<h1 id="project_name"><?=PROJECT_NAME?></h1>
	<h2 id="city_name"><?=CITY_NAME?></h2>
</header>
<? endif; ?>
<div id="main">

