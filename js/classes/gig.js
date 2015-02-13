/**
 * Created by rmahr1 on 08.02.15.
 */
function Gig(row) {
    this.init('GigInterface',row);

    this.render = function() {
        return $('<div/>', {
            id: 'gig-'+this.row.id,
            text: this.row.date+' - '+this.row.city+' - '+this.row.venuename
        });
    };

    this.renderFrontend = function() {
        return this.render();
    };
}

Gig.inheritsFrom(BaseEntity);