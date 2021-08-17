var lngWorkflowInstanceID = "";
var txtUrlFile = '';
var hddUrlList = '';
var hdIsAccountant = '';
var hddIsEnabledEdit ='';
var hdnColor ='';
var urlCode = '';
jQuery(document).ready(function () {
   

    if ($("input[id$='txtWorkflowInstanceID']").length > 0) {
        lngWorkflowInstanceID = $("input[id$='txtWorkflowInstanceID']").val();
    }
     lngWorkflowInstanceID = "";
     txtUrlFile = jQuery('input[id$="txtUrlFile"]');
     hddUrlList = jQuery('input[id$="hddUrlList"]');
     hdIsAccountant = jQuery('input[id$="hdIsAccountant"]').val() === "True";
     hddIsEnabledEdit = $("input[id$='hddIsEnabledEdit']").val();
     hdnColor = $("input[id$='hdnClipBackground']").val();
     urlCode = '';


    //Validaciones para usuario contador
    if (hdIsAccountant) {
        jQuery("td[id$='tdUploadsUrl']").css('display', 'none');
        jQuery("td[id$='tdUploadsUrl']").css('visibility', 'hidden');

        jQuery("td[id$='tdTitle']").css('display', 'block');
        jQuery("td[id$='tdTitle']").css('visibility', 'visible');
    }
    else
        jQuery("tr[id$='trTitle']").remove();



   

    //callback para la edicion de Urlnes ya registradas
    txtUrlFile.bind("loadUrlCallBack", function (event, urlCode, urlDescription, urlRef) {
        insertUrl(urlCode, urlDescription, urlRef);
    });

});

//Inserta el html de la Urln en la lista (tabla) : Modo Edicion
function insertUrl(urlCode, urlDescription, urlRef) {
    if (urlDescription == '') {
        urlDescription = urlRef;
    }

    var strExtension = "url_16x16";
    var urlDownload = '';
    var remove = ''
    if (hdIsAccountant) {
        urlDownload = '<a class="Baselink">' + urlDescription + '</a>';
        remove = '';
    }
    else {
        urlDownload = '<a class="Baselink" style="cursor: pointer" onclick="javascript:openUrl(\'' + urlRef + '\')">' + urlDescription + '</a>';
        if (hddIsEnabledEdit == '1') {
            remove = '<div id="dvUrlActions" style="display:inline; heigth=0px"><a style="cursor:pointer" class="url_remove"><img src="' + _prefixPath + 'Images/DeleteIconSmall.gif" style="border:0;display:inline;"/></a></div>';
        }
    }

    //innerHTML de la fila a insertar
    var trHTML = '<tr id="trUrlItem" urlCode="' + urlCode + '" style="heigth=0px">\
                        <td><img src="' + _prefixPath + 'Images/Extensions/' + strExtension + '.png"></img><td>\
                        <td width="100%" class="Baselink">\
                            <div id="dvUrlSection" style="display:inline; heigth=0px">\
                                ' + urlDownload + '' + remove +
                            '</div>' +
                        '</td>' +
                      '</tr>';
    //inserta la Urln cargada
    jQuery('table[id$="tblUrlFiles"]').append(trHTML);
    //Actuliaza el input oculto con la lista de Urlnes
    hddUrlList.val(hddUrlList.val() + ',' + urlCode);
    hddUrlList.val(hddUrlList.val().replace(/^\,+/g, '').replace(/\,+$/g, ''));
    //Acciones del cursor en el tr de la Urln
    var trUrlItem = jQuery('tr[id$="trUrlItem"]');
    //Por defecto Oculta el div de las acciones para la Urln
    trUrlItem.find('#dvUrlActions').hide();
    trUrlItem.unbind("mouseover");
    trUrlItem.unbind("mouseout");
    trUrlItem.mouseover(function () {
        var oRow = jQuery(this)
        var color = "";
        oRow.find('#dvUrlSection').css("background-color", "#e9e9e9");
        if (_prefixPath == '') {
            oRow.find('#dvUrlActions').show();
        }

    });
    trUrlItem.mouseout(function () {
        var oRow = jQuery(this)
        var color = "";

        if (_prefixPath == '') {
            if (lngWorkflowInstanceID == "") {
                color = "#ffffff"
            }
            else {
                color = "#ffffff";
                if (typeof hdnColor !== "undefined") {
                    if (hdnColor == 1) {
                        color = "#e9e9e9";
                    }
                }

            }
            oRow.find('#dvUrlSection').css("background-color", color);
            oRow.find('#dvUrlActions').hide();
        }
        else {
            oRow.find('#dvUrlSection').css("background-color", "#e9e9e9");
        }

    });

    //Borrado de Urlnes
    jQuery(".url_remove").unbind("click");
    jQuery(".url_remove").click(function () {
        var oRow = jQuery(this).parents("tr:first");
        oRow.fadeOut('fast');
        oRow.remove();
        lngWorkflowInstanceID = $("input[id$='txtWorkflowInstanceID']").val();
        var arrUrlList = hddUrlList.val().split(',');
        if (arrUrlList.length > 0) {
            for (var i = 0; i < arrUrlList.length; i++) {
                if (oRow.attr("urlCode") == arrUrlList[i]) {
                    //Se remueve el urlCode del Arreglo
                    arrUrlList.splice(i, 1);
                    hddUrlList.val(arrUrlList.join(","));
                    if (lngWorkflowInstanceID != "") {
                        deleteUrl(oRow.attr("urlCode"));
                        resizedivInvoiceBind(false);
                    }
                }
            }
        }
    });
}


function openUrl(strUrl) {
    //agregar http
    if (!/^(f|ht)tps?:\/\//i.test(strUrl)) {
        strUrl = "http://" + strUrl;
    }
    window.open(strUrl);
}



//Eliminando el URL
function deleteUrl(UrlCode) {
    var dataString = { ActionType: 7, WorkflowInstanceID: lngWorkflowInstanceID, UrlCode: UrlCode };
    $.ajax({
        type: "POST",
        url: "Components/ERP/InvoiceHandler.ashx",
        data: dataString,
        cache: false,
        success: function (html) {
            var result = eval("(" + html + ")");
            if (result.success) {
                //alert("Eliminado ok!");
            }
        }
    });
}



//Reestablece el tamaño de los DIV de vista de usuario
function resizedivInvoiceBind(blnAdd) {
    var divAccountDataInvoice = jQuery("div[id$='divAccountDataInvoice']");
    var divAttachInvoice = jQuery("div[id$='divAttachInvoice']");

    if (blnAdd) {
        divAttachInvoice.height(divAttachInvoice.height() + 20);
        divAccountDataInvoice.height(divAttachInvoice.height());
    } else {
        divAttachInvoice.height(divAttachInvoice.height() - 20);
        divAccountDataInvoice.height(divAttachInvoice.height());
    }
}