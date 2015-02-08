/**
 * Created by rmahr1 on 08.02.15.
 */
function Gig(row) {
    this.init('GigInterface',row);

    this.render = function() {
        return $('<p/>', {
            id: 'gig-'+this.row.id,
            text: this.row.date+' - '+this.row.city+' - '+this.row.venuename
        });
    };
}

Gig.inheritsFrom(BaseEntity);