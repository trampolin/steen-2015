<?php function getHome() { ?>
	<div id="current_video">
		<iframe width="100%" height="100%" src="//www.youtube.com/embed/h6ilv5udZ08" frameborder="0" allowfullscreen=""></iframe>
	</div>

	<div id="featured_videos">
		<div id="video-1" class="featured_video"><iframe width="100%" height="100%" src="//www.youtube.com/embed/S-EJNmlUfwQ" frameborder="0" allowfullscreen=""></iframe></div>
		<div id="video-2" class="featured_video"><iframe width="100%" height="100%" src="//www.youtube.com/embed/xE3Zh24O-7Q" frameborder="0" allowfullscreen=""></iframe></div>
		<div id="video-3" class="featured_video"><iframe width="100%" height="100%" src="//www.youtube.com/embed/cX_aineGzLY" frameborder="0" allowfullscreen=""></iframe></div>
	</div>

	<div style="clear: both"></div>

	<div id="upcoming_gigs">
		Die nächsten Gigs
	</div>

	<div class="content_box_container">

		<div id="instagram_wall" class="content_box">

		</div>

		<script type="text/javascript">
			$('#instagram_wall').instagramLite({
				clientID: 'dd33442b9c334365a10d3393df4a3fdd',
				username: 'steenband',
				limit: 1,
				list: false,
				urls: true
			});
		</script>
		<!--div id="cd_box" class="content_box">
			<a href="http://steen.bigcartel.com/" target="_blank"><img src="assets/img/impuls_der_zeit.jpg"></a>
		</div-->

		<div id="last_news" class="last_news content_box">
			news
		</div>
	</div>

<?php }