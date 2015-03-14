<?php
// checking for minimum PHP version
define("ROOT_DIR", ".");
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
	exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	require_once(ROOT_DIR."/libraries/password_compatibility_library.php");
}
require_once("config/db.php");
require_once("view/components/menu.php");
require_once("view/components/header.php");
require_once("view/components/trenner.php" );
require_once("view/components/social.php" );
require_once("view/content/home.php");
require_once("view/content/band.php");
require_once("view/content/shop.php");
require_once("view/content/admin.php");

require_once(ROOT_DIR."/classes/requesthandler/responseTypes.php");
require_once(ROOT_DIR."/classes/database/database.php");
require_once(ROOT_DIR."/classes/interfaces/basicInterface.php");
require_once(ROOT_DIR."/classes/interfaces/venueInterface.php");
require_once(ROOT_DIR."/classes/interfaces/gigInterface.php");
require_once(ROOT_DIR."/classes/interfaces/videoInterface.php");

//require_once("classes/requesthandler/requesthandler.php");

require_once("classes/login/Login.php");

$user = new Login();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php

$site = isset($_GET['p']) ? $_GET['p'] : null;
?>
<head>
	<link rel="stylesheet" href="assets/styles/style.css" />
	<link rel="stylesheet" href="assets/styles/jquery.jgrowl.css" />
	<link rel="stylesheet" href="assets/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="js/instagram-lite/src/css/style.css" />
	<link rel="stylesheet" href="js/FlexSlider-master/flexslider.css" />

	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

    <script src="js/xdate.js" type="text/javascript"></script>
	<script src="js/jquery-2.1.0.js" type="text/javascript"></script>
	<script src="js/jquery.blockUI.js" type="text/javascript"></script>
	<script src="js/yt.pretty.embed.js" type="text/javascript"></script>
	<script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
	<script src="js/jquery.jgrowl.js" type="text/javascript"></script>
	<script src="js/controller.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
	<script src="js/classes/baseEntity.js" type="text/javascript"></script>
	<script src="js/classes/venue.js" type="text/javascript"></script>
	<script src="js/classes/gig.js" type="text/javascript"></script>
	<script src="js/classes/entityCollection.js" type="text/javascript"></script>
	<script src="js/instagram-lite/src/instagramLite.js" type="text/javascript"></script>
	<script src="js/FlexSlider-master/jquery.flexslider.js" type="text/javascript"></script>
	<script src="js/stellar.js-master/jquery.stellar.min.js" type="text/javascript"></script>
	<script src="js/videocontrol.js" type="text/javascript"></script>
</head>
<body>

<!--div style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 100px; background: #eee; z-index: -1" data-stellar-ratio="0.5"></div-->

<a id="top" name="top"></a>
<div id="everything">
	<?php getHeader(); ?>
	<?php getMenu($site,$user); ?>

	<div id="content">
		<?php
			if ($site == "home" || $site == null) {
				getHome();
				getTrenner();
				getBand();
				getTrenner();
				getShop();
			} else if ($site == "admin") {
				getAdmin($user);
			} else {
				?>
					not found
				<?php
			}
		?>
	</div>

	<?php
		getTrenner();
		getSocial();

		if ($user->isUserLoggedIn()) : ?>
			<a href="?p=admin">Admin</a>
			<a href="?p=home&logout">Logout</a>
		<?php endif; ?>
</div>
<div style="display:none" id="messageboxcontainer"></div>
<script type="text/javascript">
	var $root = $('html, body');
	$('.anchor-link').click(function() {
		$root.animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
	//$.stellar();
</script>
</body>
</html>