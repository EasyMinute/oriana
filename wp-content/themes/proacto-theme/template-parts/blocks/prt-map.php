<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$map = get_field('map');
?>

<section class="<?php echo  esc_attr($className)?> prt-map">
	<div class="container">
		<div class="prt-map__wrap">
			<div class="prt-map__text body-1">
				<?= $map['text'] ?>
			</div>
			<div class="prt-map__frame">
				<?php
				// Assuming you have the ACF Map field with the field name 'location'

				$location = $map['location'];

				if ($location) {
					// Get latitude and longitude from the ACF Map field
					$latitude = $location['lat'];
					$longitude = $location['lng'];

					// Output the map
					echo '<div id="map" style="width: 100%; height: 100%;"></div>';

					// JavaScript to initialize the map
					echo '<script>
			            function initMap() {
			                var location = { lat: ' . $latitude . ', lng: ' . $longitude . ' };
			                var map = new google.maps.Map(document.getElementById("map"), {
			                    zoom: 15,
			                    center: location
			                });
			                var marker = new google.maps.Marker({
			                    position: location,
			                    map: map
			                });
			            }
			        </script>';

					// Load the Google Maps API
					echo '<script async defer
			            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmVLjG2KWX4uozMPRRuF4q_n5H68IY5og&callback=initMap">
			          </script>';
				} else {
					echo 'Location not found.';
				}
				?>
			</div>
		</div>
	</div>
</section>