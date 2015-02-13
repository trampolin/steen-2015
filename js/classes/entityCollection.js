/**
 * Created by rmahr1 on 08.02.15.
 */
function EntityCollection(rows,entitiyType,title) {
    this.rows = {};
    this.title = title;
    var that = this;

    $.each(rows, function(i, row) {
        that.rows['id_'+row.id] = new entitiyType(row);
    });

    this.render = function(frontend) {
        var div = $('<div/>', {
            class: 'entity_collection'
        });

        if (this.title) {
            $(div).append($('<div/>', {
                class: 'entity_collection_title',
                text: that.title
            }))
        }

        if (frontend) {
            $.each(this.rows, function(i, entity) {
                $(div).append(entity.renderFrontend());
            });
        } else {
            $.each(this.rows, function(i, entity) {
                $(div).append(entity.render());
            });
        }



        return div;
    }
}