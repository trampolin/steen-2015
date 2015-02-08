<?php

function getVenues() {
    $vi = new VenueInterface();
    $venues = $vi->getRows();
    ?>
        <script type="text/javascript">
            var venueCollection = new EntityCollection(<?= json_encode($venues->data); ?>,Venue);
            $('#admin_content').append(venueCollection.render());
        </script>
<?php

}
