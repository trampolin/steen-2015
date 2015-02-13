/**
 * Created by rmahr1 on 07.02.15.
 */
function Venue(row) {
    this.init('VenueInterface',row);

    this.render = function() {
        return $('<p/>', {
            id: 'venue-'+this.row.id,
            text: this.row.venuename
        });
    };

    this.renderFrontend = function() {
        return this.render();
    };
}

Venue.inheritsFrom(BaseEntity);