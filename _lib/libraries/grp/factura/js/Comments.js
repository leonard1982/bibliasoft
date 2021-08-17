//Permite obtener los comentarios por filtro de fecha
function GetCommentsFilter(objThis, FilterDays) {
    var strERPDocumentID = $(objThis).attr("ERPDocumentID");
    var hddData = jQuery("input[id$='hddDataAccountDocument" + strERPDocumentID + "']");
    hddData.val(FilterDays);
    var txtControl = jQuery("textarea[id$='txtAccountComments" + strERPDocumentID + "']");
    SaveAccountComment(txtControl, jQuery("span[id$='ltlComments" + strERPDocumentID + "']"), true, strERPDocumentID);

}

function SaveAccountCommentbutton(objThis) {
    var strERPDocumentID = $(objThis).attr("ERPDocumentID");
    var txtControl = jQuery("textarea[id$='txtAccountComments" + strERPDocumentID + "']");
    if (txtControl.val() != '') {
        SaveAccountComment(txtControl, jQuery("span[id$='ltlComments" + strERPDocumentID + "']"), false, strERPDocumentID);
    }
}




function SaveAccountComment(txtControl, LiteralControl, isFileterBind, strERPDocumentID) {
    var hddData = jQuery("input[id$='hddDataAccountDocument" + strERPDocumentID + "']");
    var isTaskCommercial = jQuery("input[id$='txtIsTaskCommercial']");
    

    var vFilterdays = hddData.val();
    var vDocumentDescription = hddData.attr("DocumentDescription");

    var blnClientView = hddData.attr("IsClientView");
    var sViewType = hddData.attr("ViewType");
    var sSysWorkflowType = hddData.attr("SysWorkflowType");
    var sComment = txtControl.val();
    sComment = jQuery.trim(sComment);
    var sUrlPath = "Components/ERP/CommentsHandler.ashx";
    if (blnClientView == "True") {
        sUrlPath = "../" + sUrlPath; 
    }
    //Si el texto es el de la mascara.
    if (sComment == txtControl.attr("textwatermark")) {
        sComment = '';
    }
    if ((sComment.length > 0) || isFileterBind) {

        var dataString = { SysWorkflowType: sSysWorkflowType, DocumentID: txtControl.attr("documentid"), RecordCode: txtControl.attr("contactcode"), CommentText: sComment, IsContact: blnClientView, DocumentDesc: txtControl.attr("documentdesc"), AccountCode: hddData.attr("AccountCode"), FilterDays: vFilterdays, DocumentDescription: vDocumentDescription, ViewType: sViewType };
        if (typeof blnButtonActionClick === 'undefined')
            blnButtonActionClick = 0;
        if (blnButtonActionClick == 1) { return false; }
        blnButtonActionClick = 1;
        jQuery.ajax({
            type: "POST",
            url: sUrlPath,
            data: dataString,
            cache: false,
            success: function (html) {
                var result = eval("(" + html + ")");
                if (result.success) {
                    if (LiteralControl) {
                        LiteralControl.html(result.msg);
                        txtControl.val('');

                        //if (blnClientView == 'True' && !isFileterBind) {
                        // showmessagecomment();                           
                        //}

                        if (!isFileterBind) {
                            if (isTaskCommercial.length > 0) {
                                //Si es tarea de seguimiento comercial, carga todas las acciones de las cotizaciones
                                if (isTaskCommercial.val() == '1') {
                                    var WorkflowInstanceID = jQuery("input[id$='txtWorkflowInstanceID']").val();
                                    reloadActionsBanner(WorkflowInstanceID);
                                }
                                else {
                                    ReloadActionsBanner();
                                }
                            }
                            else {
                                ReloadActionsBanner();
                            }
                        }
                    }
                    blnButtonActionClick = 0;
                } else {
                    alert(result.msg);
                }
            }
        });
    }

}



function ReloadActionsBanner() {
     var divContainer = jQuery("div[id$='_divContainerAction']");
     var hddData = jQuery("input[id$='hddDataAccountDocument" + divContainer.attr("ERPDocumentID") + "']");

    //Si encuentra los div
    if ( divContainer.length > 0) {
        var blnClientView = divContainer.attr("IsClientView");
       
        var dataString;
        var sUrlPath = "Components/Controls/ControlAjaxLoader.ashx?Control=13";
        if (blnClientView == "True") {
            sUrlPath = "../" + sUrlPath;
        }

        if (divContainer.attr("IsERPAccountBalance") == "True") {
            dataString = { AccountCode: divContainer.attr("AccountCode"), DaysFilter: -1, IsClientView: blnClientView };
        } else {
            var state = "0";
            var ancShowMore = jQuery("a[id$='ancShowMore']");
            dataString = { SysWorkflowType: hddData.attr("SysWorkflowType"), ERPDocumentID: divContainer.attr("ERPDocumentID"), IncludeAll: state, IsClientView: blnClientView };
        }

        jQuery.ajax({
            type: "POST",
            url: sUrlPath,
            data: dataString,
            cache: false,
            success: function (html) {
                divContainer.hide('slow');
                divContainer.html(html);
                divContainer.show('slow');
                if (divContainer.attr("IsERPAccountBalance") != "True") {
                    SetShowMore();
                }
            }
        });

    }
    
}

function SetShowMore() {
    
    var divContainer = jQuery("div[id$='_divContainerAction']");
    var state = "0";
    var blnClientView = divContainer.attr("IsClientView");
    var sUrlPath = "Components/ERP/InvoiceHandler.ashx";
    if (blnClientView == "True") {
        sUrlPath = "../" + sUrlPath; 
    }
    var dataString = { ActionType: 5, ERPDocumentID: divContainer.attr("ERPDocumentID") };
    jQuery.ajax({
        type: "POST",
        url: sUrlPath,
        data: dataString,
        cache: false,
        success: function (html) {
            var result = eval("(" + html + ")");
            var ancShowMore = jQuery("a[id$='ancShowMore']");

            if (result.countactions > 3) {
                ancShowMore.attr("state", "1");
                ancShowMore.attr("style", "visibility:visible");
                //ERPActionBannerlngSeeMore se define en \BPM.Web\Components\ERP\ERPActionBanner.ascx
                ancShowMore.html(ERPActionBannerlngSeeMore);
            }

        }
    });
}