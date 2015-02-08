/**
 * Created by rmahr1 on 07.02.15.
 */
var debug = true;

function requestInterfaceCustomBlock(aInterface,aFunction,aData,aSuccess,aFail,aBlock,aUnblock) {
    var requestInterfaceFail = function(xhr,status,error) {
        showNotification(xhr.responseText,'bad');
    };
    var params = {
        intf: aInterface,
        func: aFunction,
        data: (aData == undefined ? null : aData)};

    if (aFail==undefined) {
        aFail = requestInterfaceFail;
    };

    $.ajax(
        {
            url: "./classes/requesthandler/requesthandler.php",
            data: JSON.stringify(params),
            dataType : "json",
            contentType: 'application/json; charset=UTF-8',
            type: "POST",
            beforeSend: aBlock,
            complete: aUnblock,
            success: aSuccess,
            error: aFail
        }
    )
}

function requestInterface(aInterface,aFunction,aData,aSuccess,aFail) {
    requestInterfaceCustomBlock(
        aInterface,
        aFunction,
        aData,
        aSuccess,
        aFail,
        function()
        {
            $.blockUI(
                {
                    css:
                    {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        'border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    },
                    overlayCSS:
                    {
                        backgroundColor: '#888'
                    },
                    message: null //$('#loading')
                });
        }
        ,
        function() { $.unblockUI(); }
    )
}