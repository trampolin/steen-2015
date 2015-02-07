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
	</div>

<?php } ?>