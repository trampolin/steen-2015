/**
 * Created by rmahr1 on 07.02.15.
 */
BaseEntity = {
    init : function(intf,row) {
        this.interface = intf;
        this.row = row;
    },

    save : function(aSuccess,aFail) {
        requestInterface(this.interface,'save',this.row,aSuccess,aFail);
    }

}