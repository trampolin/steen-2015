<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
	require_once("view/components/menu.php");
	require_once("view/components/header.php");
	require_once("view/components/trenner.php" );
	require_once("view/content/home.php");
	require_once("view/content/band.php");
	require_once("view/content/shop.php");

	$site = isset($_GET['p']) ? $_GET['p'] : null;
?>
<head>
	<link rel="stylesheet" href="assets/styles/style.css" />
	<link rel="stylesheet" href="js/instagram-lite/src/css/style.css" />
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<script src="js/jquery-2.1.0.js" type="text/javascript"></script>
	<script src="js/instagram-lite/src/instagramLite.js" type="text/javascript"></script>
</head>
<body>
<a id="top" name="top"></a>
<div id="everything">
	<?php getHeader(); ?>
	<?php getMenu(); ?>

	<div id="content">
		<?php
			if ($site == "home" || $site == null) {
				getHome();
				getTrenner();
				getBand();
				getTrenner();
				getShop();
			} /*else if ($site == "band") {
				getBand();
			} */else {
				?>
					not found
				<?php
			}
		?>
	</div>

	<?php getTrenner(); ?>
</div>
<script type="text/javascript">
	var $root = $('html, body');
	$('.anchor-link').click(function() {
		$root.animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
</script>
</body>
</html>