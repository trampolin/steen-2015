/**
 * Created by rmahr1 on 08.02.15.
 */
function Gig(row) {
    this.init('GigInterface',row);

    this.render = function() {
        var date = new XDate(this.row.date);

        return $('<div/>', {
            id: 'gig-'+this.row.id,
            class: 'entity-collection-entitiy',
            text: date.toString('dd.MM.yyyy')+' - '+this.row.city+' - '+this.row.venuename
        });
    };

    this.renderFrontend = function() {
        var date = new XDate(this.row.date);

        var text = '';

        if (this.row.link != null) {
            text = $('<a>', {
                text: date.toString('dd.MM.yyyy')+' - '+this.row.city+' - '+this.row.venuename,
                href: this.row.link,
                target: '_blank'
            });
        } else {
            text = date.toString('dd.MM.yyyy')+' - '+this.row.city+' - '+this.row.venuename;
        }

        var div = $('<div/>', {
            id: 'gig-'+this.row.id,
            class: 'entity-collection-entitiy'
        });

        $(div).append(text);

        return div;
    };
}

Gig.inheritsFrom(BaseEntity);