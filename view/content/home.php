<?php function getHome() { ?>

	<?php
	$gi = new GigInterface();
	$gigs = $gi->getRows([
        'join' => 'venues on venues.id = gigs.venue_id',
        'limit' => 5,
        'order' => 'date ASC',
        'where' => 'date >= DATE(NOW()) AND active=1']);
	?>

	<div id="current_video" class="flexslider">
		<ul class="slides">
			<li data-thumb="http://img.youtube.com/vi/T2K12PhGDBs/mqdefault.jpg">
				<div id="video-1" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/T2K12PhGDBs?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li>
			<li data-thumb="http://img.youtube.com/vi/gcAp86JsLmQ/mqdefault.jpg">
				<div id="video-2" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/gcAp86JsLmQ?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li>
			<li data-thumb="http://img.youtube.com/vi/h6ilv5udZ08/mqdefault.jpg">
				<div id="video-3" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/h6ilv5udZ08?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li>
			<li data-thumb="http://img.youtube.com/vi/S-EJNmlUfwQ/mqdefault.jpg">
				<div id="video-4" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/S-EJNmlUfwQ?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li>
			<!--li data-thumb="http://img.youtube.com/vi/xE3Zh24O-7Q/mqdefault.jpg">
				<div id="video-5" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/xE3Zh24O-7Q?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li-->
			<!--li data-thumb="http://img.youtube.com/vi/cX_aineGzLY/mqdefault.jpg">
				<div id="video-6" class="video-slide">
					<iframe width="100%" height="100%" src="//www.youtube.com/embed/cX_aineGzLY?enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</li-->
		</ul>
	</div>

	<div style="clear: both"></div>

    <div id="upcoming_gigs">

	</div>

	<script type="text/javascript">
		var venueCollection = new EntityCollection(<?= json_encode($gigs->data); ?>,Gig,'Nächste Gigs:');
		$('#upcoming_gigs').append(venueCollection.render(true));
	</script>



	<!--div class="content_box_container"-->

		<!--div id="instagram_wall" class="content_box">

		</div-->

		<script type="text/javascript">


			$(window).load(function() {
				$('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails",
					slideshow: false,
					before: function(){
						for (var i = 1; i<=4; i++) {
							callPlayer('video-'+i,'pauseVideo');
						}


					}
				});

                /*$('#instagram_wall').instagramLite({
                    clientID: 'dd33442b9c334365a10d3393df4a3fdd',
                    username: 'steenband',
                    limit: 1,
                    list: false,
                    urls: true,
                    error: function(errorCode, errorMessage) {

                        console.log('There was an error');

                        if(errorCode && errorMessage) {

                            alert(errorCode +': '+ errorMessage);

                        }

                    },
                    success: function() {
                        console.log('The request was successful!');
                    }
                });*/
			});
			//callPlayer('video-1', 'playVideo');
		</script>
		<!--div id="cd_box" class="content_box">
			<a href="http://steen.bigcartel.com/" target="_blank"><img src="assets/img/impuls_der_zeit.jpg"></a>
		</div-->

		<!--div id="last_news" class="last_news content_box">
			<img src="<?= ROOT_DIR?>/assets/img/wolf.jpg">
		</div>
	</div-->

<?php }