jQuery(document).ready(function () {

    var sNameImage = "LoadFile.png";
    var hdn = $("input[id$='hdnERPDocumentID']").val();
    var hddIsEnabledEdit = $("input[id$='hddIsEnabledEdit']").val();

    var hdnColor = $("input[id$='hdnClipBackground']").val();
    var ERPDocumentID = "";
    if (typeof hdn !== "undefined") {
        ERPDocumentID = hdn;
        if (typeof hdnColor !== "undefined") {
            if (hdnColor == 1) {
                sNameImage = "LoadFile.png";
            }
        }
    }
    var lngWorkflowInstanceID = "";


    if ($("input[id$='txtWorkflowInstanceID']").length > 0) {
        lngWorkflowInstanceID = $("input[id$='txtWorkflowInstanceID']").val();
    }

    var txtUrlDownload = jQuery('input[id$="hddUrlDownloadFile"]').val();
    var txtImageFile = jQuery('input[id$="txtImageFile"]');
    var hddImageList = jQuery('input[id$="hddImageList"]');
    var hdIsAccountant = jQuery('input[id$="hdIsAccountant"]').val() === "True";
    var _queueSizeLimit = Number(txtImageFile.attr("queueSizeLimit"));
    var FSItemsGuid = '';

    jQuery('input[id$="txtImageFile"]').change(function (e) {
        var txtImageFile = jQuery(e.target);
        var hddImageList = jQuery('input[id$="hddImageList"]');
        var arrImageList = hddImageList.val().split(',');
        if (jQuery(e.target).val() != '') {
            var maxFileSize = parseInt(txtImageFile.attr("sizeLimit")) * 1024;
            if (e.target.files[0].size < maxFileSize) {

                if ((arrImageList.length + 1) <= _queueSizeLimit || _queueSizeLimit == -1 ) {

                    var dataForm = new FormData();
                    dataForm.set(e.target.files[0].name, e.target.files[0], e.target.files[0].name);
                    dataForm.set('parentPath', txtImageFile.attr("parentPath"));
                    dataForm.set('ERPDocumentIDFileU', ERPDocumentID);
                    dataForm.set('WorkflowInstanceIDFileU', lngWorkflowInstanceID);
                    jQuery.ajax({
                        type: "POST",
                        url: "Components/Controls/FileUpload.ashx",
                        data: dataForm,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            var objResponse = eval('(' + response + ')');
                            if (objResponse && objResponse.success && FSItemsGuid != objResponse.FSItemsGuid) {
                                FSItemsGuid = objResponse.FSItemsGuid;
                                insertImage(FSItemsGuid, objResponse.filename);
                                resizedivInvoiceBind(true);
                                jQuery(e.target).val('');
                            } else {
                                if (!objResponse.success) {
                                    alert(objResponse.msg);
                                }
                            }
                        }
                    });

                }
                else {
                }
            }
            else {
                alert(strfileSizeError);
                return false;
            }
        }
    });

    if (_prefixPath != '') {
        jQuery("td[id$='tdUploads']").css('display', 'none');
        jQuery("td[id$='tdUploads']").css('visibility', 'hidden');
        jQuery("table[id$='tblEditImageListSection']").css('border', '#c7c7c7 1px solid');
        jQuery("table[id$='tblEditImageListSection']").css('background-color', '#e8e7e8');
    }

    //Validaciones para usuario contador
    if (hdIsAccountant) {
        jQuery("td[id$='tdUploads']").css('display', 'none');
        jQuery("td[id$='tdUploads']").css('visibility', 'hidden');

        jQuery("td[id$='tdTitle']").css('display', 'block');
        jQuery("td[id$='tdTitle']").css('visibility', 'visible');
    }
    else
        jQuery("tr[id$='trTitle']").remove();


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

    //Inserta el html de la imagen en la lista (tabla) : Modo Edicion
    function insertImage(FSItemsGuid, filename) {
        //se da formato al nombre de la imagen
        var strFileName = filename;
        var re = /(?:\.([^.]+))?$/;
        var strExtension = re.exec(filename)[1];
        var blnExntesion = false;
        if (strFileName.length > 25) {
            strFileName = strFileName.substr(0, 25) + '...';
        }
        strExtension = strExtension + "_16x16";
        for (i = 0; i < imgExtensions.length; i++) {
            if (strExtension == imgExtensions[i])
                blnExntesion = true;
        }
        //si no la encontro se coloca un por default
        if (!blnExntesion)
            strExtension = "Default_16x16";

        var urlDownload = '';
        var remove = ''
        if (hdIsAccountant) {
            urlDownload = '<a class="Baselink">' + strFileName + '</a>';
            remove = '';
        }
        else {
            urlDownload = '<a class="Baselink" href=' + txtUrlDownload + FSItemsGuid + '&DLStyle=DownLoad  onclick="blnFormIsDirtyValidate = false; document.location.href = this.href; blnFormIsDirtyValidate = true; return false;" >' + strFileName + '</a>';
            if (hddIsEnabledEdit == '1') {
                remove = '<div id="dvImageActions" style="display:inline; heigth=0px"><a style="cursor:pointer" class="image_remove"><img src="' + _prefixPath + 'images/DeleteIconSmall.gif" style="border:0;display:inline;"/></a></div>';
            }
        }

        //innerHTML de la fila a insertar
        var trHTML = '<tr id="trImageItem" FSItemsGuid="' + FSItemsGuid + '" style="heigth=0px">\
                        <td><img src="' + _prefixPath + 'images/Extensions/' + strExtension + '.png"></img><td>\
                        <td width="100%" class="Baselink">\
                            <div id="dvImageSection" style="display:inline; heigth=0px">\
                                ' + urlDownload + '' + remove +
                            '</div>' +
                        '</td>' +
                      '</tr>';
        //inserta la imagen cargada
        jQuery('table[id$="tblImageFiles"]').append(trHTML);
        //Actuliaza el input oculto con la lista de imagenes
        hddImageList.val(hddImageList.val() + ',' + FSItemsGuid);
        hddImageList.val(hddImageList.val().replace(/^\,+/g, '').replace(/\,+$/g, ''));
        //Acciones del cursor en el tr de la imagen
        var trImageItem = jQuery('tr[id$="trImageItem"]');
        //Por defecto Oculta el div de las acciones para la imagen
        trImageItem.find('#dvImageActions').hide();
        trImageItem.unbind("mouseover");
        trImageItem.unbind("mouseout");
        trImageItem.mouseover(function () {
            var oRow = jQuery(this)
            var color = "";
            oRow.find('#dvImageSection').css("background-color", "#e9e9e9");
            if (_prefixPath == '') {
                oRow.find('#dvImageActions').show();
            }

        });
        trImageItem.mouseout(function () {
            var oRow = jQuery(this)
            var color = "";

            if (_prefixPath == '') {
                if (ERPDocumentID == "") {
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
                oRow.find('#dvImageSection').css("background-color", color);
                oRow.find('#dvImageActions').hide();
            }
            else {
                oRow.find('#dvImageSection').css("background-color", "#e9e9e9");
            }

        });

        //Borrado de imagenes
        jQuery(".image_remove").unbind("click");
        jQuery(".image_remove").click(function () {
            var oRow = jQuery(this).parents("tr:first");
            oRow.fadeOut('fast');
            oRow.remove();
            var arrImageList = hddImageList.val().split(',');
            if (arrImageList.length > 0) {
                for (var i = 0; i < arrImageList.length; i++) {
                    if (oRow.attr("FSItemsGuid") == arrImageList[i]) {
                        //Se remueve el FSItemsGUID del Arreglo
                        arrImageList.splice(i, 1);
                        hddImageList.val(arrImageList.join(","));
                        if (ERPDocumentID != "") {
                            deleteDocument(oRow.attr("FSItemsGuid"));
                            resizedivInvoiceBind(false);
                        }
                        else {
                            if (lngWorkflowInstanceID != "") {
                                deleteDocumentFromWorkFlow(oRow.attr("FSItemsGuid"));
                                resizedivInvoiceBind(false);
                            }
                        }
                    }
                }
            }
        });
    }
    //Eliminando el documento
    function deleteDocumentFromWorkFlow(itemGUID) {
        var dataString = { ActionType: 8, WorkflowInstanceID: lngWorkflowInstanceID, itemGUID: itemGUID };
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

    //Eliminando el documento
    function deleteDocument(itemGUID) {
        var dataString = { ActionType: 4, ERPDocumentID: ERPDocumentID, itemGUID: itemGUID };
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
    //Establece los guids segun sea el orden que se definio
    function setFSItemsGuids() {
        hddImageList.val('');
        jQuery('table[id$="tblImageFiles"]').find("tr").each(function () {
            var oRow = jQuery(this);
            hddImageList.val(hddImageList.val() + ',' + oRow.attr("FSItemsGuid"));
            hddImageList.val(hddImageList.val().replace(/^\,+/g, '').replace(/\,+$/g, ''));
        });
    }
    //callback para la edicion de imagenes ya registradas
    txtImageFile.bind("loadImageCallBack", function (event, FSItemsGuid, fileName) {
        insertImage(FSItemsGuid, fileName);
    });

});


