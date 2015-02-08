<?php function getMenu($site,$user) { ?>
	<div id="menu">
		<div id="menu_container">
			<div class="menu_item"><a href="?p=home">Home</a></div>
			<?php if($site == "admin") : ?>
				<?php if ($user->isUserLoggedIn()) : ?>
					<div class="menu_item"><a href="?p=admin">Admin</a></div>
				<?php endif; ?>
			<?php else: ?>
				<div class="menu_item"><a class="anchor-link" rel="" id="anchor-band" href="#band">Band</a></div>
				<div class="menu_item"><a class="anchor-link" rel="" id="anchor-shop" href="#shop">Shop</a></div>
			<?php endif; ?>
		</div>

		<?php if($site == "admin") : ?>
			<?php if ($user->isUserLoggedIn()) : ?>
				<div id="admin_menu_container">
					<div class="menu_item"><a href="?p=admin&m=venues">Venues</a></div>
					<div class="menu_item"><a href="?p=admin&m=gigs">Gigs</a></div>
					<div class="menu_item"><a href="?p=admin&m=videos">Videos</a></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>

<?php } ?>