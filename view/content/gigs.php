<?php

function getGigs() {
    $gi = new GigInterface();
    $gigs = $gi->getRows(['join' => 'venues on venues.id = gigs.venue_id']);
    ?>
    <script type="text/javascript">
        console.debug(<?= json_encode($gigs); ?>)
        var venueCollection = new EntityCollection(<?= json_encode($gigs->data); ?>,Gig);
        $('#admin_content').append(venueCollection.render());
    </script>
<?php

}
