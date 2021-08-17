var _commentsStatus = false;

jQuery(document).ready(function () {
	resizeTextArea();        
	if (hasCufe) {
		ReviewCurrentStatusAndXMLFiles(strDataEinvoice);
	}  
});

function resizeTextArea() {
	var maxWidth = 0;
	jQuery("td[tag$='commentTd']").each(function () {
		if (jQuery(this).width() > maxWidth) {
			maxWidth = jQuery(this).width();
		}
	});
	jQuery("textarea[id$='txtAccountComments']").css("width", maxWidth - 9);
}

function seeMoreFunction(oSource) {
	oSource.parentNode.innerHTML = oSource.getAttribute('fulltext');
}

function showDetail() {
	var divDetailPayment = jQuery("#divDetailPayment");
	CreateDialog('Detalle deuda', divDetailPayment.html());
	ShowDialog(600, 300);
}

function ReviewCurrentStatusAndXMLFiles(data) {
	$(tdDownloadXML).hide();
	jQuery.ajax({
		type: "GET",
		url: eSiigoGeneralAPIURL + "GetEntryXMLFilesCloud?data=" + data,
		cache: false,
		success: function (result) {
			if (result.Success) {
				UpdateViewFromEntryInfo(result);
			} else {
				UpdateVIewFromResponseModel(result);
			}
		}
	});
}

function UpdateViewFromEntryInfo(result) {
	$(btnAceptID).hide();
	$(btnRejectID).hide();        
	//Aprobado
	if (result.EntryState == 1) {
		$("#divEInvoiceMessage").html(strApproved);
		$("#divEInvoiceMessage").attr('style', 'font-size: 20px; text-align: center; color: green;');
		jQuery("#tdMoreOptions").hide();
	}
	else {
		//Rechazado
		if (result.EntryState == 2) {
			$("#divEInvoiceMessage").html(strRejected);
			$("#divEInvoiceMessage").attr('style', 'font-size: 20px; text-align: center; color: red;');
			jQuery("#tdMoreOptions").hide();
		}
		else {
			$("#divEInvoiceMessage").html("");
			$(btnAceptID).show();
			$(btnRejectID).show();
		}
	}
	 //UBL
	if (typeof result.EntryUBLPath !== 'undefined' && result.EntryUBLPath != null && result.EntryUBLPath != "") {
		$(tdDownloadXML).show();
		if (!result.EntryUBLPath.includes('data:application/xml;base64')) {
			setHrefFromUrl(result.EntryUBLPath, lnkDownloadUBL, 'UBL_' + result.EntryName + '.xml');                
		} else {
			setHrefFromB64(result.EntryUBLPath, lnkDownloadUBL, 'UBL_' + result.EntryName + '.xml');
		}
		
	} else {            
		$("#trUBL").hide();
	}
	//Dian Response
	if (typeof result.DianResponsePath !== 'undefined' && result.DianResponsePath != null && result.DianResponsePath != "") {
		$(tdDownloadXML).show();   
		setHrefFromB64(result.DianResponsePath, lnkDownDianResponse, 'DianResponse_' + result.EntryName + '.xml');
		
	} else {
		$("#trDianResponse").hide();
	}
	//Attached Document
	if (typeof result.AttachedDocumentPath !== 'undefined' && result.AttachedDocumentPath != null && result.AttachedDocumentPath != "") {
		$(tdDownloadXML).show();
		setHrefFromB64(result.AttachedDocumentPath, lnkDownAttached, 'AttachedDocument_' + result.EntryName + '.xml');
	} else {
		$("#trAttached").hide();
	}
}

function setHrefFromB64(strBase64, idElement, strFileName) {
	let strBase64Content = strBase64.replace("data:application/xml;base64,", "");           
	let blob = b64toBlob(strBase64Content);
	let strBlobUrl = URL.createObjectURL(blob);
	setHrefFromUrl(strBlobUrl, idElement, strFileName);
}

function setHrefFromUrl(strUrl, idElement, strFileName) {
	var xhr = new XMLHttpRequest;
	xhr.open('get', strUrl, true);   
	xhr.onreadystatechange = function(e) {
		if ( this.readyState == 4 && (this.status == 200 || this.status == 0)) {
			console.log(this, this.responseXML);
			var element = $(idElement);
			element.attr('href', 'data:application/xml;charset=utf-8,' + encodeURIComponent(new XMLSerializer().serializeToString(this.responseXML.documentElement)));
			element.attr('download', strFileName);
		}
	};
	xhr.send();  
}

function b64toBlob(b64Data, sliceSize) {
	  sliceSize = sliceSize || 512;

	  var byteCharacters = atob(b64Data);
	  var byteArrays = [];

	  for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
		var slice = byteCharacters.slice(offset, offset + sliceSize);

		var byteNumbers = new Array(slice.length);
		for (var i = 0; i < slice.length; i++) {
		  byteNumbers[i] = slice.charCodeAt(i);
		}

		var byteArray = new Uint8Array(byteNumbers);

		byteArrays.push(byteArray);
	  }

	  var blob = new Blob(byteArrays, {encoding:"UTF-8",type:"application/xml;charset=UTF-8 "});
	  return blob;
}

function UpdateVIewFromResponseModel(result) {
		if (result.Message != "") {
			jQuery("#tdMoreOptions").hide();
			$(btnAceptID).hide();
			$(btnRejectID).hide();
			$(tdDownloadXML).hide();
		}
		else {
			$("#divEInvoiceMessage").html("");
			$(btnAceptID).show();
			$(btnRejectID).show();
		}
}


function ProcessEntryExternal(data, status, event, entryID, token, fullname, contactID) {
	CancelEvent(event);
	var url = "ProcessEntryFromCloud?data=" + data;
	var refuseReason = localStorage.getItem("refuseReason");
	if (refuseReason != null && refuseReason != undefined && refuseReason != "") {
		url = url + "&refuseReason=" + refuseReason;
		localStorage.removeItem("refuseReason");
	}

	jQuery.ajax({
		type: "GET",
		url: eSiigoBillingURL + url,
		cache: false,
		success: function (result) {
			if (result.Success) {
				if (result.Message == 1) {
					jQuery("#divEInvoiceMessage").html(strApproved);
					$("#divEInvoiceMessage").attr('style', 'font-size: 20px; text-align: center; color: green;');
				}
				else {
					jQuery("#divEInvoiceMessage").html(strRejected);
					$("#divEInvoiceMessage").attr('style', 'font-size: 20px; text-align: center; color: red;');
				}
				if (refuseReason != null && refuseReason != undefined && refuseReason != "") {
					registerNotification(5, entryID, token, fullname, contactID);
				} else {
					registerNotification(4, entryID, token, fullname, contactID);
				}

				jQuery("#tdMoreOptions").hide();
				jQuery(btnAceptID).hide();
				jQuery(btnRejectID).hide();

			} else {
				if (result.Message != "") {
					$("#divEInvoiceMessage").html(result.Message);
					$("#divEInvoiceMessage").attr('style', 'font-size: 14px; text-align: center; color: red; padding:10px;');
				}
				else {
					$("#divEInvoiceMessage").html("");
				}   
				jQuery(btnAceptID).show();
				jQuery(btnRejectID).show();
			}
		}
	});
}

function GetUBLByDocName(data, event) {
	jQuery.ajax({
		type: "GET",
		url: eSiigoGeneralAPIURL + "GetUBLByDocNameCloud?data=" + data,
		cache: false,
		success: function (result) {
			if (result != false) {
				window.open(result.EntryUBLPath, '_blank');
			} 
		}
	});
}


function keyUpRefuse() {
	localStorage.setItem("refuseReason", $('#txtRefuse')[0].value);
}
 
function MessageRefuseReason(data, status, title, btnRefuse, btnCancel, entryID, token, fullname, contactID,refusetext) {
	var inputRefuseReason = '<div style="padding-bottom: 10px;"><input placeholder="' + refusetext + '" style="min-width: 250px; " id="txtRefuse" type="text" name="txtRefuse" maxlength="100" onkeyup="keyUpRefuse()"></div>';
	ShowMessageBox(title, inputRefuseReason, '', 70, "ProcessEntryExternal('"+data+"',"+status+",event,"+entryID+",'"+token+"','"+fullname+"',"+contactID+")",'',btnRefuse, btnCancel);
}

// Tener en cuenta la action que puede ser aceptar o rechazar factura de acuerdo
// al enumerador  ACEnum.ERPInvoiceStateEnum (AcceptInvoice, RejectInvoice)
function registerNotification(action, entryID, token, fullname, contactID) {
	var dataString = { Action: action, entryID: entryID, Token: token, Fullname: fullname, ContactID: contactID };
	jQuery.ajax({
		type: "POST",
		url: "ERPBillingHandler.ashx",
		data: dataString,
		cache: false,
		success: function (html) {
			var result = eval("(" + html + ")");
			console.log(result);
		}
	});
}


function printPDF() {
	var html = jQuery("div[id$='divContent']")[0].innerHTML;
	var styles = getStylesPrint(html);
	var wprint = window.open('div');
	wprint.document.write(styles);
	wprint.document.write(html);
	wprint.focus();  
	wprint.print();
	wprint.close();
}

function getStylesPrint(html) {
	var styles = '<style type="text/css"> @media print { ';
	styles += '     .invoice-container { height: initial !important; } ';
	styles += '     .invoice-box { height: inherit !important; } ';
	styles += '     .Numeric { width: inherit; } ';
	styles += '     .invoice-container-left { padding-right: 10px !important; } ';
	styles += '     .invoice-container-right { padding-right: 20px !important; } ';
	styles += '     .TotalContent { display: inline-table; } ';
	styles += '     .TableDocumentDetail { bottom: 0px !important; } ';

	if (html.includes("ribbon_empty.png")) {
		styles += '     .invoice-container-left>table>tbody>tr>td>div>img { opacity: 0;  } ';
		styles += '     .invoice-container-left>table>tbody>tr>td>div>img[alt="QrCode"] { opacity: 1;  } ';
		styles += '     .container-invoice>table>tbody>tr>td>div>img { opacity: 0; } ';
	}

	styles += ' } </style > ';

	return styles;
}

jQuery(document).ready(function () {
	resizeTextArea();


	$(".MultiTextBoxWatermarkExtender").click(function () {
		$(this).removeClass("MultiTextBoxWatermarkExtender");
		$(this).addClass("text-field-max");
	}).change(function () {
		if ($(this).val() == '') {
			$(this).addClass("MultiTextBoxWatermarkExtender");
			$(this).removeClass("text-field-max");
		}
	})

});

//Deshabilita los links de los autores, si la vista es del cliente
function disabledAnchor() {
	jQuery("div[id$='divComment']").find("a.aAuthor").click(function () { return false; }).attr("href", "#");
}

function resizeTextArea() {
	var maxWidth = 0;
	jQuery("td[tag$='commentTd']").each(function () {
		if (jQuery(this).width() > maxWidth) {
			maxWidth = jQuery(this).width();
		}
	});
	jQuery("textarea[id$='txtAccountComments']").css("width", "100%");
}

function showControl(jqcontrol) {
	jqcontrol.attr('showState', 'true');
	jqcontrol.slideToggle('slow');
}
function hideControl(jqcontrol) {
	jqcontrol.slideToggle('slow');
	jqcontrol.attr('showState', 'false');
}

function commentHandle(objThis) {
	var strERPDocumentID = $(objThis).attr("ERPDocumentID");
	var divComments = jQuery("div[id$='ctrComments" + strERPDocumentID + "_divComment']");
	var divCommentButton = jQuery("div[id$='divCommentButton" + strERPDocumentID + "']");
	var textShow = 'Enviar comentario';
	var textHide = 'Ocultar comentarios';
	Alert(1);
	if (divComments.attr('showState') == 'true') {
		hideControl(divComments);
		divCommentButton.text(textHide);
	}
	else {
		showControl(divComments);
		divCommentButton.text(textShow);
	}

}

function commentHandleTarget() {
	var divComments = jQuery("div[id$='ctl15_ucControlPane0_ctl00_CommentsControl_divComment']");
	var divCommentButton = jQuery("input[id$='ctl15_ucControlPane0_ctl00_btnComment']");
	var blnIsDiv = false;
	if (divCommentButton.length <= 0) {
		divCommentButton = jQuery("div[id$='ctl15_ucControlPane0_ctl00_btnComment']");
		blnIsDiv = true;
	}
	var textShow = 'Enviar comentario';
	var textHide = 'Ocultar comentarios';
	console.log(textShow)
	if (divComments.attr('showState') == 'true') {
		hideControl(divComments);
		if (blnIsDiv) {
			divCommentButton.text(textShow);
		} else {
			divCommentButton.val(textShow);
		}
	}
	else {
		showControl(divComments);
		if (blnIsDiv) {
			divCommentButton.text(textHide);
		} else {
			divCommentButton.val(textHide);
		}
		
	}

}

function showmessagecomment() {
	var divComments = jQuery("div[id$='ctl15_ucControlPane0_ctl00_CommentsControl_divComment']");
	ShowMessageBox(" ", divComments.attr("commentmessage"), "", 100, "", "", divComments.attr("commentmessageaccept"), "", "");
	resizeTextArea();
	var btnSendComment = jQuery("input[id$='btnSendComment']");
	btnSendComment.show();
}

$(document).ready(function () {
	setTimeout('resizedivInvoiceLocal()', 800);
});

function resizedivInvoiceLocal() {
	var divAccountDataInvoice = jQuery("div[id$='divAccountDataInvoice']");
	var divAttachInvoice = jQuery("div[id$='divAttachInvoice']");
	if (divAccountDataInvoice.length > 0 && divAttachInvoice.length > 0) {
		if (divAccountDataInvoice.height() > divAttachInvoice.height()) {
			divAttachInvoice.height(divAccountDataInvoice.height());
		} else {
			divAccountDataInvoice.height(divAttachInvoice.height());
		}
	}
}