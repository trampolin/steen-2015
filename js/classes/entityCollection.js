/**
 * Created by rmahr1 on 08.02.15.
 */
function EntityCollection(rows,entitiyType) {
    this.rows = {};
    var that = this;

    $.each(rows, function(i, row) {
        that.rows['id_'+row.id] = new entitiyType(row);
    });

    this.render = function() {
        var div = $('<div/>', {
           class: 'entity_collection'
        });

        $.each(this.rows, function(i, entity) {
            $(div).append(entity.render());
        });

        return div;
    }
}