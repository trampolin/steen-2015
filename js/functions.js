/**
 * Created by rmahr1 on 07.02.15.
 */
function showNotification(aMessage,aTheme) {
    $.jGrowl(aMessage, {theme: aTheme});
}

function showDebugNotification(aMessage) {
    $.jGrowl(aMessage, {theme: 'debug'});
}

function checkResult(response) {
    if (response != undefined)
    {
        if (debug && response.debugInfo != null)
        {
            showDebugNotification(response.debugInfo);
        }
        return (response.result != undefined) && (response.result == "ok")
    }
    else
    {
        return false;
    }

}

function showMessageBox(html) {
    $("#messageboxcontainer").html(html);
    $("#messageboxcontainer").bPopup({follow: [false, false], opacity: 0.5});
}

Function.prototype.inheritsFrom = function( parentClassOrObject ){
    if ( parentClassOrObject.constructor == Function )
    {
        //Normal Inheritance
        this.prototype = new parentClassOrObject;
        this.prototype.constructor = this;
        this.prototype.parent = parentClassOrObject.prototype;
    }
    else
    {
        //Pure Virtual Inheritance
        this.prototype = parentClassOrObject;
        this.prototype.constructor = this;
        this.prototype.parent = parentClassOrObject;
    }
    return this;
}