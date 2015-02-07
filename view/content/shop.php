<?php function getShop() { ?>
	<a id="shop" name="shop"></a>
	<div class="content_box_container" id="shop_container">

		<script type="text/javascript">
			$.getJSON("http://api.bigcartel.com/steen/products.json", null, function(response) {

				$.each(response, function(i, item) {
					console.debug(item);

					var element = $('<div />', {
						class: 'bigcartel-product',
					});

					var title = $('<div />', {
						class: 'bigcartel-title'
					});

					$(title).append(item.name);

					var content = $('<div />', {
						class: 'bigcartel-content'
					});

					var link = $('<a />', {
						href: 'http://steen.bigcartel.com' + item.url,
						target: '_blank'
					});

					var image = $('<img />', {
						src: item.images[0].url,

						class: 'bigcartel-image'
					});

					$(link).append(image);
					$(content).append(link);
					$(element).append(title);
					$(element).append(content);

					$('#shop_container').append(element);
				});

			});
		</script>

	</div>
<?php }


function getBigcartelProducts() {
	//


	echo http_get("http://api.bigcartel.com/steen/products.json");
}