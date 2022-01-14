
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      //scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay_default(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
        document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
        document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
        if (null == bForce)
        {
            bForce = true;
        }
        if (bForce)
        {
            var $oField = $('#id_sc_field_' + sErrorId);
            if (0 < $oField.length)
            {
                scAjax_removeFieldErrorStyle($oField);
            }
        }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
        document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay_default

  function scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        scAjax_applyFieldErrorStyle($oField);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
  } // scAjaxShowErrorDisplay_default

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage_default()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage_default()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage_default({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: false, toastPos: ""});
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage_default(params) {
	var sTitle = params["title"],
		sMessage = params["message"],
		bModal = params["isModal"],
		iTimeout = params["timeout"],
		bButton = params["showButton"],
		sButton = params["buttonLabel"],
		iTop = params["topPos"],
		iLeft = params["leftPos"],
		iWidth = params["width"],
		iHeight = params["height"],
		sRedir = params["redirUrl"],
		sTarget = params["redirTarget"],
		sParam = params["redirParam"],
		bClose = params["showClose"],
		bBodyIcon = params["showBodyIcon"],
		bToast = params["isToast"],
		sToastPos = params["toastPos"];
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage_default

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "dismiss":
        scAjaxHideMessage();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"] && typeof self.parent.calendar_reload == "function")
    {
<?php
if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile']) {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
} else {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
}
?>
      return true;
    }
    return false;
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_configuraciones" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

	function scAjaxClearErrors() {
		var fieldName;

		for (fieldName in ajax_error_list) {
            if (null != ajax_error_list[fieldName]) {
                ajax_error_list[fieldName]["valid"] = new Array();
                ajax_error_list[fieldName]["onblur"] = new Array();
                ajax_error_list[fieldName]["onchange"] = new Array();
                ajax_error_list[fieldName]["onclick"] = new Array();
                ajax_error_list[fieldName]["onfocus"] = new Array();
            }
		}
	} // scAjaxClearErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
	  eval(sVarName + " = \"" + sVarValue + "\";");
	}
  } // scAjaxSetVariables

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
		var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
		var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }

      if (oResp["fldList"][iSetFields]["docReadonly"])
      {
        var sDocReadonly = oResp["fldList"][iSetFields]["docReadonly"];
      }
      else
      {
        var sDocReadonly = "";
      }

      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
	scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
	  var sliderObject = $("#sc-ui-slide-" + fieldName);
	  if (!sliderObject.length) {
		  return;
	  }
	  scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
	  setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
	scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
	if (bSelect2AC)
	{
		var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
		$("#id_ac_" + sFieldName).append(newOption);
		$("#id_sc_field_" + sFieldName).val(oFieldValues[0]["value"]);
	}
	else if (oFormField.hasClass("select2-hidden-accessible"))
	{
        $("#id_sc_field_" + sFieldName).select2("destroy");
		var select2Field = sFieldName;
		if ("" != thisRow) {
			select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
		}
        scJQSelect2Add(thisRow, select2Field);
	}
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
	var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
	if (!fieldOptions.length) {
		return;
	}
	for (var i = 0; i < fieldOptions.length; i++) {
		if ($(fieldOptions[i]).prop("checked")) {
			$(fieldOptions[i]).lcs_on();
		}
		else {
			$(fieldOptions[i]).lcs_off();
		}
	}
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    if ("undefined" == typeof oFieldValues[0]["label"]) {
      sFieldLabel = oFieldValues[0]["value"];
    } else {
      sFieldLabel = oFieldValues[0]["label"];
    }
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink && sDocReadonly == "S")
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
	  var jsonData = "" != oFieldValues[0]["value"]
	               ? JSON.parse(oFieldValues[0]["value"])
				   : { repeat: "1", endon: "E", endafter: "", endin: ""};
	  $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
	  $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
	  $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
	  $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
	  scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
	var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
	if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
	{
		scJQSignatureClear(sFieldName);
		return;
	}
	$("#id_sc_field_" + sFieldName).val(fieldValue);
	scJQSignatureRedraw(sFieldName);
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
	$("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
	if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
	}
	scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
	$("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
	return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
	  var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
	  for (i = 0; i < repeatInList.length; i++) {
		  repeatInValues.push($(repeatInList[i]).val());
	  }
	  jsonData = {
		  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
		  repeatin: repeatInValues.join(";"),
		  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
		  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
		  endin: $("#id_rinf_endin_" + sFieldName).val()
	  };
	  return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    var markChangedClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    if ("checkbox" == sHtmlType)
    {
        markChangedClass = "sc-ui-checkbox-" + sFieldName;
    }
    if ("radio" == sHtmlType)
    {
        markChangedClass = "sc-ui-radio-" + sFieldName;
    }
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        else
        {
            sClass = " class=\"";
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
		if (bSwitch)
		{
			sDivText += "<div class=\"sc ";
			if ("Checkbox" == sFieldType)
			{
				sDivText += "switch";
			}
			else
			{
				sDivText += "radio";
			}
			sDivText += "\">";
		}
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
		if (bSwitch)
		{
			sDivText += "<span></span>";
		}
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
		if (bSwitch)
		{
			sDivText += "</div>";
		}
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
    if ("" != markChangedClass)
    {
      $("." + markChangedClass).on("click", function() { scMarkFormAsChanged(); });
    }
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
	if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
	{
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
	  if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
	  {
		return;
	  }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
	}
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
	var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
		blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
	  //scCheckPagesWithoutBlock();
    }
	var fieldDisplay = {};
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
			if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
			  fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
			}
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        if ("sc_b_ini" == sBtnName || "sc_b_ret" == sBtnName || "sc_b_avc" == sBtnName || "sc_b_fim" == sBtnName)
        {
          scAjaxNavigateButtonDisplay(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        }
        else
        {
          aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
	for (var blockId in blockDisplay) {
		displayChange_block(blockId, blockDisplay[blockId]);
	}
	for (var fieldId in fieldDisplay) {
		displayChange_field(fieldId, "", fieldDisplay[fieldId]);
	}
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").show();
        }
        else
        {
          $('#' + sElement + "_dumb").hide();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField))
    {
      if (document.getElementById("id_label_" + sField).innerHTML != sLabel)
      {
        document.getElementById("id_label_" + sField).innerHTML = sLabel;
      }
    }
    else if (document.getElementById("hidden_field_label_" + sField) && document.getElementById("hidden_field_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("hidden_field_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_sc_dragdrop_" + sField))
    {
      document.getElementById("id_sc_dragdrop_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
	var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
	  has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
		console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
		console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert(callbackOk)
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      scJs_alert(oResp["ajaxAlert"]["message"], callbackOk, oResp["ajaxAlert"]["params"]);
    }
    else
    {
      callbackOk();
    }
  } // scAjaxAlert

	function scJs_alert_default(message, callbackOk) {
		alert(message);
		if (typeof callbackOk == "function") {
			callbackOk();
		}
	} // scJs_alert_default

	function scJs_confirm_default(message, callbackOk, callbackCancel) {
		if (confirm(message)) {
			callbackOk();
		}
		else {
			callbackCancel();
		}
	} // scJs_confirm_default

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "",
          bToast    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast"])        ? ("Y" == oResp["ajaxMessage"]["toast"])      : false,
          sToastPos = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast_pos"])    ? oResp["ajaxMessage"]["toast_pos"]           : "",
          sType     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["type"])         ? oResp["ajaxMessage"]["type"]                : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
		  var params = {
			  title: sTitle,
			  message: oResp["ajaxMessage"]["message"],
			  isModal: bModal,
			  timeout: iTimeout,
			  showButton: bButton,
			  buttonLabel: sButton,
			  topPos: iTop,
			  leftPos: iLeft,
			  width: iWidth,
			  height: iHeight,
			  redirUrl: sRedir,
			  redirTarget: sTarget,
			  redirParam: sParam,
			  showClose: bClose,
			  showBodyIcon: bBodyIcon,
			  isToast: bToast,
			  toastPos: sToastPos,
			  type: sType
		  };
        _scAjaxShowMessage(params);
      }
    }
  } // scAjaxMessage

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

	function scAjaxError_markList() {
	    if ('undefined' == typeof oResp.errList) {
	        return;
	    }
		var i, fieldName, fieldList = new Array();
		for (i = 0; i < oResp.errList.length; i++) {
			fieldName = oResp.errList[i]["fldName"];
			if (oResp.errList[i]["numLinha"]) {
				fieldName += oResp.errList[i]["numLinha"];
			}
            fieldList.push(fieldName);
		}
		scAjaxError_markFieldList(fieldList);
	} // scAjaxError_markList

	function scAjaxError_markFieldList(fieldList) {
		var i;
		for (i = 0; i < fieldList.length; i++) {
            scAjaxError_markField(fieldList[i]);
		}
	} // scAjaxError_markFieldList

	function scAjaxError_unmarkList() {
		var i;
		for (i = 0; i < ajax_field_list.length; i++) {
            scAjaxError_unmarkField(ajax_field_list[i]);
		}
	} // scAjaxError_unmarkList

	function scAjaxError_markField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_applyFieldErrorStyle($oField);
		}
	} // scAjaxError_markField

	function scAjaxError_unmarkField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_removeFieldErrorStyle($oField);
		}
	} // scAjaxError_unmarkField

	function scAjax_displayEmptyForm() {
        $("#sc-ui-empty-form").show();
        $(".sc-ui-page-tab-line").hide();
        $("#sc-id-required-row").hide();
        sc_hide_form_configuraciones_form();
	}

  function scAjax_applyFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.addClass(sc_css_status_pwd_text);
        fieldObj.parent().addClass(sc_css_status_pwd_box);
      } else {
        fieldObj.addClass(sc_css_status);
      }
  }

  function scAjax_removeFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.removeClass(sc_css_status_pwd_text);
        fieldObj.parent().removeClass(sc_css_status_pwd_box);
      } else {
        fieldObj.removeClass(sc_css_status);
      }
  }

  function scAjax_formReload() {
<?php
    if ($this->nmgp_opcao == 'novo') {
        echo "      nm_move('reload_novo');";
    } else {
        echo "      nm_move('igual');";
    }
?>
  }
  
  function scBtnDisabled()
  {
    var btnNameNav, hasNavButton = false;

    if (typeof oResp.btnDisabled != undefined) {
      for (var btnName in oResp.btnDisabled) {
        btnNameNav = btnName.substring(0, 9);

        if ("on" == oResp.btnDisabled[btnName]) {
          $("#" + btnName).addClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "on";
            hasNavButton = true;
          }
        } else {
          $("#" + btnName).removeClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "off";
            hasNavButton = true;
          }
        }
      }
    }

    if (hasNavButton) {
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scBtnLabel()
  {
    if (typeof oResp.btnLabel != undefined) {
      for (var btnName in oResp.btnLabel) {
        $("#" + btnName).find(".btn-label").html(oResp.btnLabel[btnName]);
      }
    }
  }

  var scFormHasChanged = false;

  function scMarkFormAsChanged() {
    scFormHasChanged = true;
  }

  function scResetFormChanges() {
    scFormHasChanged = false;
  }

  var isRunning_scFormClose_F5 = false;
  function scFormClose_F5(exitUrl) {
    if (isRunning_scFormClose_F5) {
      return;
    }
    isRunning_scFormClose_F5 = true;
    setTimeout(function() { isRunning_scFormClose_F5 = false; }, 3000);

    document.F5.action = exitUrl;
    document.F5.submit();

  }

  var isRunning_scFormClose_F6 = false;
  function scFormClose_F6(exitUrl) {
    if (isRunning_scFormClose_F6) {
      return;
    }
    isRunning_scFormClose_F6 = true;
    setTimeout(function() { isRunning_scFormClose_F6 = false; }, 3000);

    document.F6.action = exitUrl;
    document.F6.submit();

  }

  // ---------- Validate lineasporfactura
  function do_ajax_form_configuraciones_validate_lineasporfactura()
  {
    var nomeCampo_lineasporfactura = "lineasporfactura";
    var var_lineasporfactura = scAjaxGetFieldText(nomeCampo_lineasporfactura);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_lineasporfactura(var_lineasporfactura, var_script_case_init, do_ajax_form_configuraciones_validate_lineasporfactura_cb);
  } // do_ajax_form_configuraciones_validate_lineasporfactura

  function do_ajax_form_configuraciones_validate_lineasporfactura_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "lineasporfactura";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_lineasporfactura_cb

  // ---------- Validate consolidararticulos
  function do_ajax_form_configuraciones_validate_consolidararticulos()
  {
    var nomeCampo_consolidararticulos = "consolidararticulos";
    var var_consolidararticulos = scAjaxGetFieldSelect(nomeCampo_consolidararticulos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_consolidararticulos(var_consolidararticulos, var_script_case_init, do_ajax_form_configuraciones_validate_consolidararticulos_cb);
  } // do_ajax_form_configuraciones_validate_consolidararticulos

  function do_ajax_form_configuraciones_validate_consolidararticulos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "consolidararticulos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_consolidararticulos_cb

  // ---------- Validate serial
  function do_ajax_form_configuraciones_validate_serial()
  {
    var nomeCampo_serial = "serial";
    var var_serial = scAjaxGetFieldText(nomeCampo_serial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_serial(var_serial, var_script_case_init, do_ajax_form_configuraciones_validate_serial_cb);
  } // do_ajax_form_configuraciones_validate_serial

  function do_ajax_form_configuraciones_validate_serial_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "serial";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_serial_cb

  // ---------- Validate fecha
  function do_ajax_form_configuraciones_validate_fecha()
  {
    var nomeCampo_fecha = "fecha";
    var var_fecha = scAjaxGetFieldHidden(nomeCampo_fecha);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_fecha(var_fecha, var_script_case_init, do_ajax_form_configuraciones_validate_fecha_cb);
  } // do_ajax_form_configuraciones_validate_fecha

  function do_ajax_form_configuraciones_validate_fecha_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_fecha_cb

  // ---------- Validate activo
  function do_ajax_form_configuraciones_validate_activo()
  {
    var nomeCampo_activo = "activo";
    var var_activo = scAjaxGetFieldHidden(nomeCampo_activo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_activo(var_activo, var_script_case_init, do_ajax_form_configuraciones_validate_activo_cb);
  } // do_ajax_form_configuraciones_validate_activo

  function do_ajax_form_configuraciones_validate_activo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "activo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_activo_cb

  // ---------- Validate espaciado
  function do_ajax_form_configuraciones_validate_espaciado()
  {
    var nomeCampo_espaciado = "espaciado";
    var var_espaciado = scAjaxGetFieldText(nomeCampo_espaciado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_espaciado(var_espaciado, var_script_case_init, do_ajax_form_configuraciones_validate_espaciado_cb);
  } // do_ajax_form_configuraciones_validate_espaciado

  function do_ajax_form_configuraciones_validate_espaciado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "espaciado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_espaciado_cb

  // ---------- Validate caja_movil
  function do_ajax_form_configuraciones_validate_caja_movil()
  {
    var nomeCampo_caja_movil = "caja_movil";
    var var_caja_movil = scAjaxGetFieldCheckbox(nomeCampo_caja_movil, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_caja_movil(var_caja_movil, var_script_case_init, do_ajax_form_configuraciones_validate_caja_movil_cb);
  } // do_ajax_form_configuraciones_validate_caja_movil

  function do_ajax_form_configuraciones_validate_caja_movil_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "caja_movil";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_caja_movil_cb

  // ---------- Validate pago_automatico
  function do_ajax_form_configuraciones_validate_pago_automatico()
  {
    var nomeCampo_pago_automatico = "pago_automatico";
    var var_pago_automatico = scAjaxGetFieldCheckbox(nomeCampo_pago_automatico, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_pago_automatico(var_pago_automatico, var_script_case_init, do_ajax_form_configuraciones_validate_pago_automatico_cb);
  } // do_ajax_form_configuraciones_validate_pago_automatico

  function do_ajax_form_configuraciones_validate_pago_automatico_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pago_automatico";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_pago_automatico_cb

  // ---------- Validate dia_limite_pago
  function do_ajax_form_configuraciones_validate_dia_limite_pago()
  {
    var nomeCampo_dia_limite_pago = "dia_limite_pago";
    var var_dia_limite_pago = scAjaxGetFieldText(nomeCampo_dia_limite_pago);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_dia_limite_pago(var_dia_limite_pago, var_script_case_init, do_ajax_form_configuraciones_validate_dia_limite_pago_cb);
  } // do_ajax_form_configuraciones_validate_dia_limite_pago

  function do_ajax_form_configuraciones_validate_dia_limite_pago_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dia_limite_pago";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_dia_limite_pago_cb

  // ---------- Validate refresh_grid_doc
  function do_ajax_form_configuraciones_validate_refresh_grid_doc()
  {
    var nomeCampo_refresh_grid_doc = "refresh_grid_doc";
    var var_refresh_grid_doc = scAjaxGetFieldText(nomeCampo_refresh_grid_doc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_refresh_grid_doc(var_refresh_grid_doc, var_script_case_init, do_ajax_form_configuraciones_validate_refresh_grid_doc_cb);
  } // do_ajax_form_configuraciones_validate_refresh_grid_doc

  function do_ajax_form_configuraciones_validate_refresh_grid_doc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "refresh_grid_doc";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_refresh_grid_doc_cb

  // ---------- Validate desactivar_control_sesion
  function do_ajax_form_configuraciones_validate_desactivar_control_sesion()
  {
    var nomeCampo_desactivar_control_sesion = "desactivar_control_sesion";
    var var_desactivar_control_sesion = scAjaxGetFieldCheckbox(nomeCampo_desactivar_control_sesion, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_desactivar_control_sesion(var_desactivar_control_sesion, var_script_case_init, do_ajax_form_configuraciones_validate_desactivar_control_sesion_cb);
  } // do_ajax_form_configuraciones_validate_desactivar_control_sesion

  function do_ajax_form_configuraciones_validate_desactivar_control_sesion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desactivar_control_sesion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_desactivar_control_sesion_cb

  // ---------- Validate nombre_pc
  function do_ajax_form_configuraciones_validate_nombre_pc()
  {
    var nomeCampo_nombre_pc = "nombre_pc";
    var var_nombre_pc = scAjaxGetFieldText(nomeCampo_nombre_pc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_nombre_pc(var_nombre_pc, var_script_case_init, do_ajax_form_configuraciones_validate_nombre_pc_cb);
  } // do_ajax_form_configuraciones_validate_nombre_pc

  function do_ajax_form_configuraciones_validate_nombre_pc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_pc";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_nombre_pc_cb

  // ---------- Validate nombre_impre
  function do_ajax_form_configuraciones_validate_nombre_impre()
  {
    var nomeCampo_nombre_impre = "nombre_impre";
    var var_nombre_impre = scAjaxGetFieldText(nomeCampo_nombre_impre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_nombre_impre(var_nombre_impre, var_script_case_init, do_ajax_form_configuraciones_validate_nombre_impre_cb);
  } // do_ajax_form_configuraciones_validate_nombre_impre

  function do_ajax_form_configuraciones_validate_nombre_impre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_impre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_nombre_impre_cb

  // ---------- Validate essociedad
  function do_ajax_form_configuraciones_validate_essociedad()
  {
    var nomeCampo_essociedad = "essociedad";
    var var_essociedad = scAjaxGetFieldCheckbox(nomeCampo_essociedad, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_essociedad(var_essociedad, var_script_case_init, do_ajax_form_configuraciones_validate_essociedad_cb);
  } // do_ajax_form_configuraciones_validate_essociedad

  function do_ajax_form_configuraciones_validate_essociedad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "essociedad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_essociedad_cb

  // ---------- Validate grancontr
  function do_ajax_form_configuraciones_validate_grancontr()
  {
    var nomeCampo_grancontr = "grancontr";
    var var_grancontr = scAjaxGetFieldCheckbox(nomeCampo_grancontr, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_grancontr(var_grancontr, var_script_case_init, do_ajax_form_configuraciones_validate_grancontr_cb);
  } // do_ajax_form_configuraciones_validate_grancontr

  function do_ajax_form_configuraciones_validate_grancontr_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "grancontr";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_grancontr_cb

  // ---------- Validate idconfiguraciones
  function do_ajax_form_configuraciones_validate_idconfiguraciones()
  {
    var nomeCampo_idconfiguraciones = "idconfiguraciones";
    var var_idconfiguraciones = scAjaxGetFieldHidden(nomeCampo_idconfiguraciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_idconfiguraciones(var_idconfiguraciones, var_script_case_init, do_ajax_form_configuraciones_validate_idconfiguraciones_cb);
  } // do_ajax_form_configuraciones_validate_idconfiguraciones

  function do_ajax_form_configuraciones_validate_idconfiguraciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idconfiguraciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_idconfiguraciones_cb

  // ---------- Validate control_diasmora
  function do_ajax_form_configuraciones_validate_control_diasmora()
  {
    var nomeCampo_control_diasmora = "control_diasmora";
    var var_control_diasmora = scAjaxGetFieldCheckbox(nomeCampo_control_diasmora, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_control_diasmora(var_control_diasmora, var_script_case_init, do_ajax_form_configuraciones_validate_control_diasmora_cb);
  } // do_ajax_form_configuraciones_validate_control_diasmora

  function do_ajax_form_configuraciones_validate_control_diasmora_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "control_diasmora";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_control_diasmora_cb

  // ---------- Validate control_costo
  function do_ajax_form_configuraciones_validate_control_costo()
  {
    var nomeCampo_control_costo = "control_costo";
    var var_control_costo = scAjaxGetFieldCheckbox(nomeCampo_control_costo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_control_costo(var_control_costo, var_script_case_init, do_ajax_form_configuraciones_validate_control_costo_cb);
  } // do_ajax_form_configuraciones_validate_control_costo

  function do_ajax_form_configuraciones_validate_control_costo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "control_costo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_control_costo_cb

  // ---------- Validate modificainvpedido
  function do_ajax_form_configuraciones_validate_modificainvpedido()
  {
    var nomeCampo_modificainvpedido = "modificainvpedido";
    var var_modificainvpedido = scAjaxGetFieldCheckbox(nomeCampo_modificainvpedido, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_modificainvpedido(var_modificainvpedido, var_script_case_init, do_ajax_form_configuraciones_validate_modificainvpedido_cb);
  } // do_ajax_form_configuraciones_validate_modificainvpedido

  function do_ajax_form_configuraciones_validate_modificainvpedido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "modificainvpedido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_modificainvpedido_cb

  // ---------- Validate tipodoc_pordefecto_pos
  function do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos()
  {
    var nomeCampo_tipodoc_pordefecto_pos = "tipodoc_pordefecto_pos";
    var var_tipodoc_pordefecto_pos = scAjaxGetFieldSelect(nomeCampo_tipodoc_pordefecto_pos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos(var_tipodoc_pordefecto_pos, var_script_case_init, do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos_cb);
  } // do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos

  function do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipodoc_pordefecto_pos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos_cb

  // ---------- Validate ver_xml_fe
  function do_ajax_form_configuraciones_validate_ver_xml_fe()
  {
    var nomeCampo_ver_xml_fe = "ver_xml_fe";
    var var_ver_xml_fe = scAjaxGetFieldCheckbox(nomeCampo_ver_xml_fe, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_xml_fe(var_ver_xml_fe, var_script_case_init, do_ajax_form_configuraciones_validate_ver_xml_fe_cb);
  } // do_ajax_form_configuraciones_validate_ver_xml_fe

  function do_ajax_form_configuraciones_validate_ver_xml_fe_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_xml_fe";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_xml_fe_cb

  // ---------- Validate noborrar_tmp_enpos
  function do_ajax_form_configuraciones_validate_noborrar_tmp_enpos()
  {
    var nomeCampo_noborrar_tmp_enpos = "noborrar_tmp_enpos";
    var var_noborrar_tmp_enpos = scAjaxGetFieldCheckbox(nomeCampo_noborrar_tmp_enpos, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_noborrar_tmp_enpos(var_noborrar_tmp_enpos, var_script_case_init, do_ajax_form_configuraciones_validate_noborrar_tmp_enpos_cb);
  } // do_ajax_form_configuraciones_validate_noborrar_tmp_enpos

  function do_ajax_form_configuraciones_validate_noborrar_tmp_enpos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "noborrar_tmp_enpos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_noborrar_tmp_enpos_cb

  // ---------- Validate validar_correo_enlinea
  function do_ajax_form_configuraciones_validate_validar_correo_enlinea()
  {
    var nomeCampo_validar_correo_enlinea = "validar_correo_enlinea";
    var var_validar_correo_enlinea = scAjaxGetFieldCheckbox(nomeCampo_validar_correo_enlinea, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_validar_correo_enlinea(var_validar_correo_enlinea, var_script_case_init, do_ajax_form_configuraciones_validate_validar_correo_enlinea_cb);
  } // do_ajax_form_configuraciones_validate_validar_correo_enlinea

  function do_ajax_form_configuraciones_validate_validar_correo_enlinea_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "validar_correo_enlinea";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_validar_correo_enlinea_cb

  // ---------- Validate apertura_caja
  function do_ajax_form_configuraciones_validate_apertura_caja()
  {
    var nomeCampo_apertura_caja = "apertura_caja";
    var var_apertura_caja = scAjaxGetFieldCheckbox(nomeCampo_apertura_caja, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_apertura_caja(var_apertura_caja, var_script_case_init, do_ajax_form_configuraciones_validate_apertura_caja_cb);
  } // do_ajax_form_configuraciones_validate_apertura_caja

  function do_ajax_form_configuraciones_validate_apertura_caja_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apertura_caja";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_apertura_caja_cb

  // ---------- Validate activar_console_log
  function do_ajax_form_configuraciones_validate_activar_console_log()
  {
    var nomeCampo_activar_console_log = "activar_console_log";
    var var_activar_console_log = scAjaxGetFieldCheckbox(nomeCampo_activar_console_log, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_activar_console_log(var_activar_console_log, var_script_case_init, do_ajax_form_configuraciones_validate_activar_console_log_cb);
  } // do_ajax_form_configuraciones_validate_activar_console_log

  function do_ajax_form_configuraciones_validate_activar_console_log_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "activar_console_log";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_activar_console_log_cb

  // ---------- Validate codproducto_en_facventa
  function do_ajax_form_configuraciones_validate_codproducto_en_facventa()
  {
    var nomeCampo_codproducto_en_facventa = "codproducto_en_facventa";
    var var_codproducto_en_facventa = scAjaxGetFieldCheckbox(nomeCampo_codproducto_en_facventa, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_codproducto_en_facventa(var_codproducto_en_facventa, var_script_case_init, do_ajax_form_configuraciones_validate_codproducto_en_facventa_cb);
  } // do_ajax_form_configuraciones_validate_codproducto_en_facventa

  function do_ajax_form_configuraciones_validate_codproducto_en_facventa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codproducto_en_facventa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_codproducto_en_facventa_cb

  // ---------- Validate valor_propina_sugerida
  function do_ajax_form_configuraciones_validate_valor_propina_sugerida()
  {
    var nomeCampo_valor_propina_sugerida = "valor_propina_sugerida";
    var var_valor_propina_sugerida = scAjaxGetFieldText(nomeCampo_valor_propina_sugerida);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_valor_propina_sugerida(var_valor_propina_sugerida, var_script_case_init, do_ajax_form_configuraciones_validate_valor_propina_sugerida_cb);
  } // do_ajax_form_configuraciones_validate_valor_propina_sugerida

  function do_ajax_form_configuraciones_validate_valor_propina_sugerida_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valor_propina_sugerida";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_valor_propina_sugerida_cb

  // ---------- Validate columna_imprimir_ticket
  function do_ajax_form_configuraciones_validate_columna_imprimir_ticket()
  {
    var nomeCampo_columna_imprimir_ticket = "columna_imprimir_ticket";
    var var_columna_imprimir_ticket = scAjaxGetFieldCheckbox(nomeCampo_columna_imprimir_ticket, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_columna_imprimir_ticket(var_columna_imprimir_ticket, var_script_case_init, do_ajax_form_configuraciones_validate_columna_imprimir_ticket_cb);
  } // do_ajax_form_configuraciones_validate_columna_imprimir_ticket

  function do_ajax_form_configuraciones_validate_columna_imprimir_ticket_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "columna_imprimir_ticket";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_columna_imprimir_ticket_cb

  // ---------- Validate columna_imprimir_a4
  function do_ajax_form_configuraciones_validate_columna_imprimir_a4()
  {
    var nomeCampo_columna_imprimir_a4 = "columna_imprimir_a4";
    var var_columna_imprimir_a4 = scAjaxGetFieldCheckbox(nomeCampo_columna_imprimir_a4, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_columna_imprimir_a4(var_columna_imprimir_a4, var_script_case_init, do_ajax_form_configuraciones_validate_columna_imprimir_a4_cb);
  } // do_ajax_form_configuraciones_validate_columna_imprimir_a4

  function do_ajax_form_configuraciones_validate_columna_imprimir_a4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "columna_imprimir_a4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_columna_imprimir_a4_cb

  // ---------- Validate columna_whatsapp
  function do_ajax_form_configuraciones_validate_columna_whatsapp()
  {
    var nomeCampo_columna_whatsapp = "columna_whatsapp";
    var var_columna_whatsapp = scAjaxGetFieldCheckbox(nomeCampo_columna_whatsapp, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_columna_whatsapp(var_columna_whatsapp, var_script_case_init, do_ajax_form_configuraciones_validate_columna_whatsapp_cb);
  } // do_ajax_form_configuraciones_validate_columna_whatsapp

  function do_ajax_form_configuraciones_validate_columna_whatsapp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "columna_whatsapp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_columna_whatsapp_cb

  // ---------- Validate columna_npedido
  function do_ajax_form_configuraciones_validate_columna_npedido()
  {
    var nomeCampo_columna_npedido = "columna_npedido";
    var var_columna_npedido = scAjaxGetFieldCheckbox(nomeCampo_columna_npedido, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_columna_npedido(var_columna_npedido, var_script_case_init, do_ajax_form_configuraciones_validate_columna_npedido_cb);
  } // do_ajax_form_configuraciones_validate_columna_npedido

  function do_ajax_form_configuraciones_validate_columna_npedido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "columna_npedido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_columna_npedido_cb

  // ---------- Validate columna_reg_pdf_propio
  function do_ajax_form_configuraciones_validate_columna_reg_pdf_propio()
  {
    var nomeCampo_columna_reg_pdf_propio = "columna_reg_pdf_propio";
    var var_columna_reg_pdf_propio = scAjaxGetFieldCheckbox(nomeCampo_columna_reg_pdf_propio, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_columna_reg_pdf_propio(var_columna_reg_pdf_propio, var_script_case_init, do_ajax_form_configuraciones_validate_columna_reg_pdf_propio_cb);
  } // do_ajax_form_configuraciones_validate_columna_reg_pdf_propio

  function do_ajax_form_configuraciones_validate_columna_reg_pdf_propio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "columna_reg_pdf_propio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_columna_reg_pdf_propio_cb

  // ---------- Validate ver_busqueda_refinada
  function do_ajax_form_configuraciones_validate_ver_busqueda_refinada()
  {
    var nomeCampo_ver_busqueda_refinada = "ver_busqueda_refinada";
    var var_ver_busqueda_refinada = scAjaxGetFieldCheckbox(nomeCampo_ver_busqueda_refinada, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_busqueda_refinada(var_ver_busqueda_refinada, var_script_case_init, do_ajax_form_configuraciones_validate_ver_busqueda_refinada_cb);
  } // do_ajax_form_configuraciones_validate_ver_busqueda_refinada

  function do_ajax_form_configuraciones_validate_ver_busqueda_refinada_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_busqueda_refinada";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_busqueda_refinada_cb

  // ---------- Validate cal_valores_decimales
  function do_ajax_form_configuraciones_validate_cal_valores_decimales()
  {
    var nomeCampo_cal_valores_decimales = "cal_valores_decimales";
    var var_cal_valores_decimales = scAjaxGetFieldText(nomeCampo_cal_valores_decimales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_cal_valores_decimales(var_cal_valores_decimales, var_script_case_init, do_ajax_form_configuraciones_validate_cal_valores_decimales_cb);
  } // do_ajax_form_configuraciones_validate_cal_valores_decimales

  function do_ajax_form_configuraciones_validate_cal_valores_decimales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cal_valores_decimales";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_cal_valores_decimales_cb

  // ---------- Validate cal_cantidades_decimales
  function do_ajax_form_configuraciones_validate_cal_cantidades_decimales()
  {
    var nomeCampo_cal_cantidades_decimales = "cal_cantidades_decimales";
    var var_cal_cantidades_decimales = scAjaxGetFieldText(nomeCampo_cal_cantidades_decimales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_cal_cantidades_decimales(var_cal_cantidades_decimales, var_script_case_init, do_ajax_form_configuraciones_validate_cal_cantidades_decimales_cb);
  } // do_ajax_form_configuraciones_validate_cal_cantidades_decimales

  function do_ajax_form_configuraciones_validate_cal_cantidades_decimales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cal_cantidades_decimales";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_cal_cantidades_decimales_cb

  // ---------- Validate validar_codbarras
  function do_ajax_form_configuraciones_validate_validar_codbarras()
  {
    var nomeCampo_validar_codbarras = "validar_codbarras";
    var var_validar_codbarras = scAjaxGetFieldCheckbox(nomeCampo_validar_codbarras, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_validar_codbarras(var_validar_codbarras, var_script_case_init, do_ajax_form_configuraciones_validate_validar_codbarras_cb);
  } // do_ajax_form_configuraciones_validate_validar_codbarras

  function do_ajax_form_configuraciones_validate_validar_codbarras_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "validar_codbarras";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_validar_codbarras_cb

  // ---------- Validate ver_grupo
  function do_ajax_form_configuraciones_validate_ver_grupo()
  {
    var nomeCampo_ver_grupo = "ver_grupo";
    var var_ver_grupo = scAjaxGetFieldCheckbox(nomeCampo_ver_grupo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_grupo(var_ver_grupo, var_script_case_init, do_ajax_form_configuraciones_validate_ver_grupo_cb);
  } // do_ajax_form_configuraciones_validate_ver_grupo

  function do_ajax_form_configuraciones_validate_ver_grupo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_grupo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_grupo_cb

  // ---------- Validate ver_codigo
  function do_ajax_form_configuraciones_validate_ver_codigo()
  {
    var nomeCampo_ver_codigo = "ver_codigo";
    var var_ver_codigo = scAjaxGetFieldCheckbox(nomeCampo_ver_codigo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_codigo(var_ver_codigo, var_script_case_init, do_ajax_form_configuraciones_validate_ver_codigo_cb);
  } // do_ajax_form_configuraciones_validate_ver_codigo

  function do_ajax_form_configuraciones_validate_ver_codigo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_codigo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_codigo_cb

  // ---------- Validate ver_imagen
  function do_ajax_form_configuraciones_validate_ver_imagen()
  {
    var nomeCampo_ver_imagen = "ver_imagen";
    var var_ver_imagen = scAjaxGetFieldCheckbox(nomeCampo_ver_imagen, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_imagen(var_ver_imagen, var_script_case_init, do_ajax_form_configuraciones_validate_ver_imagen_cb);
  } // do_ajax_form_configuraciones_validate_ver_imagen

  function do_ajax_form_configuraciones_validate_ver_imagen_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_imagen";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_imagen_cb

  // ---------- Validate ver_existencia
  function do_ajax_form_configuraciones_validate_ver_existencia()
  {
    var nomeCampo_ver_existencia = "ver_existencia";
    var var_ver_existencia = scAjaxGetFieldCheckbox(nomeCampo_ver_existencia, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_existencia(var_ver_existencia, var_script_case_init, do_ajax_form_configuraciones_validate_ver_existencia_cb);
  } // do_ajax_form_configuraciones_validate_ver_existencia

  function do_ajax_form_configuraciones_validate_ver_existencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_existencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_existencia_cb

  // ---------- Validate ver_unidad
  function do_ajax_form_configuraciones_validate_ver_unidad()
  {
    var nomeCampo_ver_unidad = "ver_unidad";
    var var_ver_unidad = scAjaxGetFieldCheckbox(nomeCampo_ver_unidad, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_unidad(var_ver_unidad, var_script_case_init, do_ajax_form_configuraciones_validate_ver_unidad_cb);
  } // do_ajax_form_configuraciones_validate_ver_unidad

  function do_ajax_form_configuraciones_validate_ver_unidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_unidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_unidad_cb

  // ---------- Validate ver_precio
  function do_ajax_form_configuraciones_validate_ver_precio()
  {
    var nomeCampo_ver_precio = "ver_precio";
    var var_ver_precio = scAjaxGetFieldCheckbox(nomeCampo_ver_precio, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_precio(var_ver_precio, var_script_case_init, do_ajax_form_configuraciones_validate_ver_precio_cb);
  } // do_ajax_form_configuraciones_validate_ver_precio

  function do_ajax_form_configuraciones_validate_ver_precio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_precio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_precio_cb

  // ---------- Validate ver_impuesto
  function do_ajax_form_configuraciones_validate_ver_impuesto()
  {
    var nomeCampo_ver_impuesto = "ver_impuesto";
    var var_ver_impuesto = scAjaxGetFieldCheckbox(nomeCampo_ver_impuesto, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_impuesto(var_ver_impuesto, var_script_case_init, do_ajax_form_configuraciones_validate_ver_impuesto_cb);
  } // do_ajax_form_configuraciones_validate_ver_impuesto

  function do_ajax_form_configuraciones_validate_ver_impuesto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_impuesto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_impuesto_cb

  // ---------- Validate ver_stock
  function do_ajax_form_configuraciones_validate_ver_stock()
  {
    var nomeCampo_ver_stock = "ver_stock";
    var var_ver_stock = scAjaxGetFieldCheckbox(nomeCampo_ver_stock, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_stock(var_ver_stock, var_script_case_init, do_ajax_form_configuraciones_validate_ver_stock_cb);
  } // do_ajax_form_configuraciones_validate_ver_stock

  function do_ajax_form_configuraciones_validate_ver_stock_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_stock";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_stock_cb

  // ---------- Validate ver_ubicacion
  function do_ajax_form_configuraciones_validate_ver_ubicacion()
  {
    var nomeCampo_ver_ubicacion = "ver_ubicacion";
    var var_ver_ubicacion = scAjaxGetFieldCheckbox(nomeCampo_ver_ubicacion, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_ubicacion(var_ver_ubicacion, var_script_case_init, do_ajax_form_configuraciones_validate_ver_ubicacion_cb);
  } // do_ajax_form_configuraciones_validate_ver_ubicacion

  function do_ajax_form_configuraciones_validate_ver_ubicacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_ubicacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_ubicacion_cb

  // ---------- Validate ver_costo
  function do_ajax_form_configuraciones_validate_ver_costo()
  {
    var nomeCampo_ver_costo = "ver_costo";
    var var_ver_costo = scAjaxGetFieldCheckbox(nomeCampo_ver_costo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_costo(var_ver_costo, var_script_case_init, do_ajax_form_configuraciones_validate_ver_costo_cb);
  } // do_ajax_form_configuraciones_validate_ver_costo

  function do_ajax_form_configuraciones_validate_ver_costo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_costo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_costo_cb

  // ---------- Validate ver_proveedor
  function do_ajax_form_configuraciones_validate_ver_proveedor()
  {
    var nomeCampo_ver_proveedor = "ver_proveedor";
    var var_ver_proveedor = scAjaxGetFieldCheckbox(nomeCampo_ver_proveedor, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_proveedor(var_ver_proveedor, var_script_case_init, do_ajax_form_configuraciones_validate_ver_proveedor_cb);
  } // do_ajax_form_configuraciones_validate_ver_proveedor

  function do_ajax_form_configuraciones_validate_ver_proveedor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_proveedor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_proveedor_cb

  // ---------- Validate ver_combo
  function do_ajax_form_configuraciones_validate_ver_combo()
  {
    var nomeCampo_ver_combo = "ver_combo";
    var var_ver_combo = scAjaxGetFieldCheckbox(nomeCampo_ver_combo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_combo(var_ver_combo, var_script_case_init, do_ajax_form_configuraciones_validate_ver_combo_cb);
  } // do_ajax_form_configuraciones_validate_ver_combo

  function do_ajax_form_configuraciones_validate_ver_combo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_combo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_combo_cb

  // ---------- Validate ver_agregar_nota
  function do_ajax_form_configuraciones_validate_ver_agregar_nota()
  {
    var nomeCampo_ver_agregar_nota = "ver_agregar_nota";
    var var_ver_agregar_nota = scAjaxGetFieldCheckbox(nomeCampo_ver_agregar_nota, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_configuraciones_validate_ver_agregar_nota(var_ver_agregar_nota, var_script_case_init, do_ajax_form_configuraciones_validate_ver_agregar_nota_cb);
  } // do_ajax_form_configuraciones_validate_ver_agregar_nota

  function do_ajax_form_configuraciones_validate_ver_agregar_nota_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ver_agregar_nota";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_configuraciones_validate_ver_agregar_nota_cb

  // ---------- Event onclick apertura_caja
  function do_ajax_form_configuraciones_event_apertura_caja_onclick()
  {
    var var_apertura_caja = scAjaxGetFieldCheckbox("apertura_caja", ";");
    var var_idconfiguraciones = scAjaxGetFieldHidden("idconfiguraciones");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_configuraciones_event_apertura_caja_onclick(var_apertura_caja, var_idconfiguraciones, var_script_case_init, do_ajax_form_configuraciones_event_apertura_caja_onclick_cb);
  } // do_ajax_form_configuraciones_event_apertura_caja_onclick

  function do_ajax_form_configuraciones_event_apertura_caja_onclick_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "apertura_caja";
    scAjaxUpdateFieldErrors(sFieldValid, "onclick");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_configuraciones_event_apertura_caja_onclick_cb_after_alert);
  } // do_ajax_form_configuraciones_event_apertura_caja_onclick_cb
  function do_ajax_form_configuraciones_event_apertura_caja_onclick_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_configuraciones_event_apertura_caja_onclick_cb_after_alert

  // ---------- Event onclick serial
  function do_ajax_form_configuraciones_event_serial_onclick()
  {
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_configuraciones_event_serial_onclick(var_script_case_init, do_ajax_form_configuraciones_event_serial_onclick_cb);
  } // do_ajax_form_configuraciones_event_serial_onclick

  function do_ajax_form_configuraciones_event_serial_onclick_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "serial";
    scAjaxUpdateFieldErrors(sFieldValid, "onclick");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_configuraciones_event_serial_onclick_cb_after_alert);
  } // do_ajax_form_configuraciones_event_serial_onclick_cb
  function do_ajax_form_configuraciones_event_serial_onclick_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_configuraciones_event_serial_onclick_cb_after_alert

  // ---------- Event onfocus serial
  function do_ajax_form_configuraciones_event_serial_onfocus()
  {
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_configuraciones_event_serial_onfocus(var_script_case_init, do_ajax_form_configuraciones_event_serial_onfocus_cb);
  } // do_ajax_form_configuraciones_event_serial_onfocus

  function do_ajax_form_configuraciones_event_serial_onfocus_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    sFieldValid = "serial";
    scAjaxUpdateFieldErrors(sFieldValid, "onfocus");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_configuraciones_event_serial_onfocus_cb_after_alert);
  } // do_ajax_form_configuraciones_event_serial_onfocus_cb
  function do_ajax_form_configuraciones_event_serial_onfocus_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_configuraciones_event_serial_onfocus_cb_after_alert
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
	if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
		scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
	}
	else {
		scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg);
	}
} // scAjaxShowErrorDisplay

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
	if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
		scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
	}
	else {
		scAjaxHideErrorDisplay_toast(sErrorId, sErrorMsg);
	}
} // scAjaxHideErrorDisplay

function scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg) {
	params = {type: 'error'};
	scJs_alert_sweetalert(sErrorMsg, function() { scAjaxHideErrorDisplay(sErrorId, sErrorMsg); }, scJs_sweetalert_params(params));
} // scAjaxShowErrorDisplay_toast

function scAjaxHideErrorDisplay_toast(sErrorId, bForce) {
	if (document.getElementById("id_error_display_" + sErrorId + "_frame")) {
		if (null == bForce) {
			bForce = true;
		}
		if (bForce) {
			var $oField = $('#id_sc_field_' + sErrorId);
			if (0 < $oField.length) {
				$oField.removeClass(sc_css_status);
			}
		}
	}
} // scAjaxHideErrorDisplay_toast

function scAjaxShowMessage(messageType) {
	scAjaxShowMessage_toast(true, messageType);
} // scAjaxShowMessage_toast

function scAjaxHideMessage() {
} // scAjaxHideMessage_toast

function scAjaxShowMessage_toast(isToast, messageType) {
	if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"]) {
		return;
	}

	if (oResp["msgDisplay"]["toast"] || isToast) {
		_scAjaxShowMessageToast({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, toastPos: "", type: messageType});
	}
	else {
		scJs_alert(oResp["msgDisplay"]["msgText"], scForm_cancel, {});
	}
} // scAjaxShowMessage_toast

function _scAjaxShowMessageToast(params) {
	var sweetAlertParams = {toast: true, showConfirmButton: false};

	if ("" != params["type"]) {
		sweetAlertParams["type"] = params["type"];
	}

	if ("" != params["title"]) {
		sweetAlertParams["title"] = scAjaxSpecCharParser(params["title"]);
	}

	if ("" != params["toastPos"]) {
		sweetAlertParams["position"] = params["toastPos"];
	}

	if (null == sweetAlertParams["position"]) {
		sweetAlertParams["position"] = "top-end";
	}

	if (null == sweetAlertParams["timer"]) {
		sweetAlertParams["timer"] = 3000;
	}

	scJs_alert_sweetalert(scAjaxSpecCharParser(params["message"]), scForm_cancel, scJs_sweetalert_params(sweetAlertParams));
} // _scAjaxShowMessageToast

function _scAjaxShowMessage(params) {
	if (params["isToast"]) {
		_scAjaxShowMessageToast(params);
	}
	else {
		if ("" != params["redirUrl"] && "" != params["redirTarget"]) {
            document.form_ajax_redir_2.action = params["redirUrl"];
            document.form_ajax_redir_2.target = params["redirTarget"];
            document.form_ajax_redir_2.nmgp_parms.value = params["redirParams"];
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
			callbackOk = function() { document.form_ajax_redir_2.submit(); };
		}
		else if ("" != params["redirUrl"] && "" == params["redirTarget"]) {
            document.form_ajax_redir_1.action = params["redirUrl"];
            document.form_ajax_redir_1.nmgp_parms.value = params["redirParams"];
			callbackOk = function() { document.form_ajax_redir_1.submit(); };
		}
		else {
			callbackOk = scForm_cancel;
		}

		var alertParams = {title: params["title"]};
		if (0 < params["width"]) {
			alertParams["width"] = params["width"];
		}
		if (0 < params["timeout"]) {
			alertParams["timer"] = params["timeout"] * 1000;
		}
		if (!params["showButton"]) {
			alertParams["showConfirmButton"] = false;
		}
		if ("" != params["buttonLabel"]) {
			alertParams["confirmButtonText"] = params["buttonLabel"];
		}
		if ("" != params["type"]) {
			alertParams["type"] = params["type"];
		}

		scJs_alert_sweetalert(params["message"], callbackOk, scJs_sweetalert_params(alertParams));
	}
} // _scAjaxShowMessage

<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
	$confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
	$cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
	$confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
	$cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
	$confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
	$cancelButtonFAPos = 'text_right';
}
?>
function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "<br />");
	scJs_alert_sweetalert(message, callbackOk, scJs_sweetalert_params(params));
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
	scJs_confirm_sweetalert(message, callbackOk, callbackCancel);
} // scJs_confirm

function scJs_alert_sweetalert(message, callbackOk, params) {
	var sweetAlertConfig;

	if (null == params) {
		params = {};
	}

	params['html'] = message;

	sweetAlertConfig = params;

	Swal.fire(sweetAlertConfig).then(function (result) {
		if (result.value) {
			if (typeof callbackOk == "function") {
				callbackOk();
			}
		}
		else if (result.dismiss == Swal.DismissReason.timer || result.dismiss == Swal.DismissReason.close) {
			Swal.close();
            $(".swal2-container.swal2-shown").remove();
		}
        else {
            console.log(result.dismiss);
        }
	});
} // scJs_alert_sweetalert

function scJs_confirm_sweetalert(message, callbackOk, callbackCancel) {
	var sweetAlertConfig, params = {};

	params['html'] = message;
	params['type'] = 'question';
	params['showCancelButton'] = true;

	sweetAlertConfig = scJs_sweetalert_params(params);

	Swal.fire(sweetAlertConfig).then(function (result) {
		if (result.value) {
			callbackOk();
		}
		else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.esc) {
			callbackCancel();
		}
	});
} // scJs_confirm_sweetalert

function scJs_sweetalert_params(params) {
	var parName, confirmText, confirmFA, confirmPos, cancelText, cancelFA, cancelPos, sweetAlertConfig;

	sweetAlertConfig = {
		customClass: {
			popup: 'scSweetAlertPopup',
			header: 'scSweetAlertHeader',
			content: 'scSweetAlertMessage',
			confirmButton: '<?php echo $confirmButtonClass; ?>',
			cancelButton: '<?php echo $cancelButtonClass; ?>'
		}
	};

	confirmText = '<?php echo isset($this->arr_buttons['bsweetalert_ok']['value']) ? $this->arr_buttons['bsweetalert_ok']['value'] : $this->Ini->Nm_lang['lang_btns_cfrm'] ?>';
	confirmFA = '<?php echo $confirmButtonFA ?>';
	confirmPos = '<?php echo $confirmButtonFAPos ?>';
	cancelText = '<?php echo isset($this->arr_buttons['bsweetalert_cancel']['value']) ? $this->arr_buttons['bsweetalert_cancel']['value'] : $this->Ini->Nm_lang['lang_btns_cncl'] ?>';
	cancelFA = '<?php echo $cancelButtonFA ?>';
	cancelPos = '<?php echo $cancelButtonFAPos ?>';

	for (parName in params) {
		if ('confirmButtonText' == parName) {
			confirmText = params[parName];
		}
		else if ('confirmButtonFA' == parName) {
			confirmFA = params[parName];
		}
		else if ('confirmButtonFAPos' == parName) {
			confirmPos = params[parName];
		}
		else if ('cancelButtonText' == parName) {
			cancelText = params[parName];
		}
		else if ('cancelButtonFA' == parName) {
			cancelFA = params[parName];
		}
		else if ('cancelButtonFAPos' == parName) {
			cancelPos = params[parName];
		}
		else {
			sweetAlertConfig[parName] = params[parName];
		}
	}

	if ('' != confirmFA) {
		if ('text_right' == confirmPos) {
			confirmText = '<i class="fas ' + confirmFA + '"></i> ' + confirmText;
		}
		else {
			confirmText += ' <i class="fas ' + confirmFA + '"></i>';
		}
	}
	if ('' != cancelFA) {
		if ('text_right' == cancelPos) {
			cancelText = '<i class="fas ' + cancelFA + '"></i> ' + cancelText;
		}
		else {
			cancelText += ' <i class="fas ' + cancelFA + '"></i>';
		}
	}

	sweetAlertConfig['confirmButtonText'] = confirmText;
	sweetAlertConfig['cancelButtonText'] = cancelText;

	if (sweetAlertConfig['toast']) {
		sweetAlertConfig['showConfirmButton'] = false;
		sweetAlertConfig['showCancelButton'] = false;
		sweetAlertConfig['customClass']['popup'] = 'scToastPopup';
		sweetAlertConfig['customClass']['header'] = 'scToastHeader';
		sweetAlertConfig['customClass']['content'] = 'scToastMessage';
		if (null == sweetAlertConfig['timer']) {
			sweetAlertConfig['timer'] = 3000;
		}
		if (null == sweetAlertConfig["position"]) {
			sweetAlertConfig["position"] = "top-end";
		}
	}

	return sweetAlertConfig;
} // scJs_sweetalert_params

  // ---------- Form
  function do_ajax_form_configuraciones_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_configuraciones_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_lineasporfactura = scAjaxGetFieldText("lineasporfactura");
    var var_consolidararticulos = scAjaxGetFieldSelect("consolidararticulos");
    var var_serial = scAjaxGetFieldText("serial");
    var var_fecha = scAjaxGetFieldHidden("fecha");
    var var_activo = scAjaxGetFieldHidden("activo");
    var var_espaciado = scAjaxGetFieldText("espaciado");
    var var_caja_movil = scAjaxGetFieldCheckbox("caja_movil", ";");
    var var_pago_automatico = scAjaxGetFieldCheckbox("pago_automatico", ";");
    var var_dia_limite_pago = scAjaxGetFieldText("dia_limite_pago");
    var var_refresh_grid_doc = scAjaxGetFieldText("refresh_grid_doc");
    var var_desactivar_control_sesion = scAjaxGetFieldCheckbox("desactivar_control_sesion", ";");
    var var_nombre_pc = scAjaxGetFieldText("nombre_pc");
    var var_nombre_impre = scAjaxGetFieldText("nombre_impre");
    var var_essociedad = scAjaxGetFieldCheckbox("essociedad", ";");
    var var_grancontr = scAjaxGetFieldCheckbox("grancontr", ";");
    var var_idconfiguraciones = scAjaxGetFieldHidden("idconfiguraciones");
    var var_control_diasmora = scAjaxGetFieldCheckbox("control_diasmora", ";");
    var var_control_costo = scAjaxGetFieldCheckbox("control_costo", ";");
    var var_modificainvpedido = scAjaxGetFieldCheckbox("modificainvpedido", ";");
    var var_tipodoc_pordefecto_pos = scAjaxGetFieldSelect("tipodoc_pordefecto_pos");
    var var_ver_xml_fe = scAjaxGetFieldCheckbox("ver_xml_fe", ";");
    var var_noborrar_tmp_enpos = scAjaxGetFieldCheckbox("noborrar_tmp_enpos", ";");
    var var_validar_correo_enlinea = scAjaxGetFieldCheckbox("validar_correo_enlinea", ";");
    var var_apertura_caja = scAjaxGetFieldCheckbox("apertura_caja", ";");
    var var_activar_console_log = scAjaxGetFieldCheckbox("activar_console_log", ";");
    var var_codproducto_en_facventa = scAjaxGetFieldCheckbox("codproducto_en_facventa", ";");
    var var_valor_propina_sugerida = scAjaxGetFieldText("valor_propina_sugerida");
    var var_columna_imprimir_ticket = scAjaxGetFieldCheckbox("columna_imprimir_ticket", ";");
    var var_columna_imprimir_a4 = scAjaxGetFieldCheckbox("columna_imprimir_a4", ";");
    var var_columna_whatsapp = scAjaxGetFieldCheckbox("columna_whatsapp", ";");
    var var_columna_npedido = scAjaxGetFieldCheckbox("columna_npedido", ";");
    var var_columna_reg_pdf_propio = scAjaxGetFieldCheckbox("columna_reg_pdf_propio", ";");
    var var_ver_busqueda_refinada = scAjaxGetFieldCheckbox("ver_busqueda_refinada", ";");
    var var_cal_valores_decimales = scAjaxGetFieldText("cal_valores_decimales");
    var var_cal_cantidades_decimales = scAjaxGetFieldText("cal_cantidades_decimales");
    var var_validar_codbarras = scAjaxGetFieldCheckbox("validar_codbarras", ";");
    var var_ver_grupo = scAjaxGetFieldCheckbox("ver_grupo", ";");
    var var_ver_codigo = scAjaxGetFieldCheckbox("ver_codigo", ";");
    var var_ver_imagen = scAjaxGetFieldCheckbox("ver_imagen", ";");
    var var_ver_existencia = scAjaxGetFieldCheckbox("ver_existencia", ";");
    var var_ver_unidad = scAjaxGetFieldCheckbox("ver_unidad", ";");
    var var_ver_precio = scAjaxGetFieldCheckbox("ver_precio", ";");
    var var_ver_impuesto = scAjaxGetFieldCheckbox("ver_impuesto", ";");
    var var_ver_stock = scAjaxGetFieldCheckbox("ver_stock", ";");
    var var_ver_ubicacion = scAjaxGetFieldCheckbox("ver_ubicacion", ";");
    var var_ver_costo = scAjaxGetFieldCheckbox("ver_costo", ";");
    var var_ver_proveedor = scAjaxGetFieldCheckbox("ver_proveedor", ";");
    var var_ver_combo = scAjaxGetFieldCheckbox("ver_combo", ";");
    var var_ver_agregar_nota = scAjaxGetFieldCheckbox("ver_agregar_nota", ";");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_configuraciones_submit_form(var_lineasporfactura, var_consolidararticulos, var_serial, var_fecha, var_activo, var_espaciado, var_caja_movil, var_pago_automatico, var_dia_limite_pago, var_refresh_grid_doc, var_desactivar_control_sesion, var_nombre_pc, var_nombre_impre, var_essociedad, var_grancontr, var_idconfiguraciones, var_control_diasmora, var_control_costo, var_modificainvpedido, var_tipodoc_pordefecto_pos, var_ver_xml_fe, var_noborrar_tmp_enpos, var_validar_correo_enlinea, var_apertura_caja, var_activar_console_log, var_codproducto_en_facventa, var_valor_propina_sugerida, var_columna_imprimir_ticket, var_columna_imprimir_a4, var_columna_whatsapp, var_columna_npedido, var_columna_reg_pdf_propio, var_ver_busqueda_refinada, var_cal_valores_decimales, var_cal_cantidades_decimales, var_validar_codbarras, var_ver_grupo, var_ver_codigo, var_ver_imagen, var_ver_existencia, var_ver_unidad, var_ver_precio, var_ver_impuesto, var_ver_stock, var_ver_ubicacion, var_ver_costo, var_ver_proveedor, var_ver_combo, var_ver_agregar_nota, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_configuraciones_submit_form_cb);
  } // do_ajax_form_configuraciones_submit_form

  function do_ajax_form_configuraciones_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scResetFormChanges();
      scAjaxShowMessage("success");
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("lineasporfactura");
      scAjaxHideErrorDisplay("consolidararticulos");
      scAjaxHideErrorDisplay("serial");
      scAjaxHideErrorDisplay("fecha");
      scAjaxHideErrorDisplay("activo");
      scAjaxHideErrorDisplay("espaciado");
      scAjaxHideErrorDisplay("caja_movil");
      scAjaxHideErrorDisplay("pago_automatico");
      scAjaxHideErrorDisplay("dia_limite_pago");
      scAjaxHideErrorDisplay("refresh_grid_doc");
      scAjaxHideErrorDisplay("desactivar_control_sesion");
      scAjaxHideErrorDisplay("nombre_pc");
      scAjaxHideErrorDisplay("nombre_impre");
      scAjaxHideErrorDisplay("essociedad");
      scAjaxHideErrorDisplay("grancontr");
      scAjaxHideErrorDisplay("idconfiguraciones");
      scAjaxHideErrorDisplay("control_diasmora");
      scAjaxHideErrorDisplay("control_costo");
      scAjaxHideErrorDisplay("modificainvpedido");
      scAjaxHideErrorDisplay("tipodoc_pordefecto_pos");
      scAjaxHideErrorDisplay("ver_xml_fe");
      scAjaxHideErrorDisplay("noborrar_tmp_enpos");
      scAjaxHideErrorDisplay("validar_correo_enlinea");
      scAjaxHideErrorDisplay("apertura_caja");
      scAjaxHideErrorDisplay("activar_console_log");
      scAjaxHideErrorDisplay("codproducto_en_facventa");
      scAjaxHideErrorDisplay("valor_propina_sugerida");
      scAjaxHideErrorDisplay("columna_imprimir_ticket");
      scAjaxHideErrorDisplay("columna_imprimir_a4");
      scAjaxHideErrorDisplay("columna_whatsapp");
      scAjaxHideErrorDisplay("columna_npedido");
      scAjaxHideErrorDisplay("columna_reg_pdf_propio");
      scAjaxHideErrorDisplay("ver_busqueda_refinada");
      scAjaxHideErrorDisplay("cal_valores_decimales");
      scAjaxHideErrorDisplay("cal_cantidades_decimales");
      scAjaxHideErrorDisplay("validar_codbarras");
      scAjaxHideErrorDisplay("ver_grupo");
      scAjaxHideErrorDisplay("ver_codigo");
      scAjaxHideErrorDisplay("ver_imagen");
      scAjaxHideErrorDisplay("ver_existencia");
      scAjaxHideErrorDisplay("ver_unidad");
      scAjaxHideErrorDisplay("ver_precio");
      scAjaxHideErrorDisplay("ver_impuesto");
      scAjaxHideErrorDisplay("ver_stock");
      scAjaxHideErrorDisplay("ver_ubicacion");
      scAjaxHideErrorDisplay("ver_costo");
      scAjaxHideErrorDisplay("ver_proveedor");
      scAjaxHideErrorDisplay("ver_combo");
      scAjaxHideErrorDisplay("ver_agregar_nota");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['parent_widget']; ?>']");
      if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.nm_gp_move) {
        dbParentFrame[0].contentWindow.nm_gp_move("igual");
      }
<?php
}
?>
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_form_configuraciones_submit_form_cb_after_alert);
  } // do_ajax_form_configuraciones_submit_form_cb
  function do_ajax_form_configuraciones_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_configuraciones_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_configuraciones_navigate_form()
  {
    perform_ajax_form_configuraciones_navigate_form();
  }

  function perform_ajax_form_configuraciones_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("lineasporfactura");
    scAjaxHideErrorDisplay("consolidararticulos");
    scAjaxHideErrorDisplay("serial");
    scAjaxHideErrorDisplay("fecha");
    scAjaxHideErrorDisplay("activo");
    scAjaxHideErrorDisplay("espaciado");
    scAjaxHideErrorDisplay("caja_movil");
    scAjaxHideErrorDisplay("pago_automatico");
    scAjaxHideErrorDisplay("dia_limite_pago");
    scAjaxHideErrorDisplay("refresh_grid_doc");
    scAjaxHideErrorDisplay("desactivar_control_sesion");
    scAjaxHideErrorDisplay("nombre_pc");
    scAjaxHideErrorDisplay("nombre_impre");
    scAjaxHideErrorDisplay("essociedad");
    scAjaxHideErrorDisplay("grancontr");
    scAjaxHideErrorDisplay("idconfiguraciones");
    scAjaxHideErrorDisplay("control_diasmora");
    scAjaxHideErrorDisplay("control_costo");
    scAjaxHideErrorDisplay("modificainvpedido");
    scAjaxHideErrorDisplay("tipodoc_pordefecto_pos");
    scAjaxHideErrorDisplay("ver_xml_fe");
    scAjaxHideErrorDisplay("noborrar_tmp_enpos");
    scAjaxHideErrorDisplay("validar_correo_enlinea");
    scAjaxHideErrorDisplay("apertura_caja");
    scAjaxHideErrorDisplay("activar_console_log");
    scAjaxHideErrorDisplay("codproducto_en_facventa");
    scAjaxHideErrorDisplay("valor_propina_sugerida");
    scAjaxHideErrorDisplay("columna_imprimir_ticket");
    scAjaxHideErrorDisplay("columna_imprimir_a4");
    scAjaxHideErrorDisplay("columna_whatsapp");
    scAjaxHideErrorDisplay("columna_npedido");
    scAjaxHideErrorDisplay("columna_reg_pdf_propio");
    scAjaxHideErrorDisplay("ver_busqueda_refinada");
    scAjaxHideErrorDisplay("cal_valores_decimales");
    scAjaxHideErrorDisplay("cal_cantidades_decimales");
    scAjaxHideErrorDisplay("validar_codbarras");
    scAjaxHideErrorDisplay("ver_grupo");
    scAjaxHideErrorDisplay("ver_codigo");
    scAjaxHideErrorDisplay("ver_imagen");
    scAjaxHideErrorDisplay("ver_existencia");
    scAjaxHideErrorDisplay("ver_unidad");
    scAjaxHideErrorDisplay("ver_precio");
    scAjaxHideErrorDisplay("ver_impuesto");
    scAjaxHideErrorDisplay("ver_stock");
    scAjaxHideErrorDisplay("ver_ubicacion");
    scAjaxHideErrorDisplay("ver_costo");
    scAjaxHideErrorDisplay("ver_proveedor");
    scAjaxHideErrorDisplay("ver_combo");
    scAjaxHideErrorDisplay("ver_agregar_nota");
    var var_idconfiguraciones = document.F2.idconfiguraciones.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_configuraciones_navigate_form(var_idconfiguraciones, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_configuraciones_navigate_form_cb);
  } // do_ajax_form_configuraciones_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_configuraciones_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    scAjaxClearErrors()
    scResetFormChanges()
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    document.F2.idconfiguraciones.value = scAjaxGetKeyValue("idconfiguraciones");
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetDisplay(true);
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_form_configuraciones_navigate_form_cb_after_alert);
  } // do_ajax_form_configuraciones_navigate_form_cb
  function do_ajax_form_configuraciones_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_configuraciones_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_configuraciones_navigate_form_cb_after_alert
  function sc_hide_form_configuraciones_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_configuraciones_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "lineasporfactura";
  ajax_field_list[1] = "consolidararticulos";
  ajax_field_list[2] = "serial";
  ajax_field_list[3] = "fecha";
  ajax_field_list[4] = "activo";
  ajax_field_list[5] = "espaciado";
  ajax_field_list[6] = "caja_movil";
  ajax_field_list[7] = "pago_automatico";
  ajax_field_list[8] = "dia_limite_pago";
  ajax_field_list[9] = "refresh_grid_doc";
  ajax_field_list[10] = "desactivar_control_sesion";
  ajax_field_list[11] = "nombre_pc";
  ajax_field_list[12] = "nombre_impre";
  ajax_field_list[13] = "essociedad";
  ajax_field_list[14] = "grancontr";
  ajax_field_list[15] = "idconfiguraciones";
  ajax_field_list[16] = "control_diasmora";
  ajax_field_list[17] = "control_costo";
  ajax_field_list[18] = "modificainvpedido";
  ajax_field_list[19] = "tipodoc_pordefecto_pos";
  ajax_field_list[20] = "ver_xml_fe";
  ajax_field_list[21] = "noborrar_tmp_enpos";
  ajax_field_list[22] = "validar_correo_enlinea";
  ajax_field_list[23] = "apertura_caja";
  ajax_field_list[24] = "activar_console_log";
  ajax_field_list[25] = "codproducto_en_facventa";
  ajax_field_list[26] = "valor_propina_sugerida";
  ajax_field_list[27] = "columna_imprimir_ticket";
  ajax_field_list[28] = "columna_imprimir_a4";
  ajax_field_list[29] = "columna_whatsapp";
  ajax_field_list[30] = "columna_npedido";
  ajax_field_list[31] = "columna_reg_pdf_propio";
  ajax_field_list[32] = "ver_busqueda_refinada";
  ajax_field_list[33] = "cal_valores_decimales";
  ajax_field_list[34] = "cal_cantidades_decimales";
  ajax_field_list[35] = "validar_codbarras";
  ajax_field_list[36] = "ver_grupo";
  ajax_field_list[37] = "ver_codigo";
  ajax_field_list[38] = "ver_imagen";
  ajax_field_list[39] = "ver_existencia";
  ajax_field_list[40] = "ver_unidad";
  ajax_field_list[41] = "ver_precio";
  ajax_field_list[42] = "ver_impuesto";
  ajax_field_list[43] = "ver_stock";
  ajax_field_list[44] = "ver_ubicacion";
  ajax_field_list[45] = "ver_costo";
  ajax_field_list[46] = "ver_proveedor";
  ajax_field_list[47] = "ver_combo";
  ajax_field_list[48] = "ver_agregar_nota";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";
  ajax_block_list[1] = "1";
  ajax_block_list[2] = "2";
  ajax_block_list[3] = "3";
  ajax_block_list[4] = "4";

  var ajax_error_list = {
    "lineasporfactura": {"label": "LINEAS X FACTURA:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "consolidararticulos": {"label": "CONSOLIDAR ARTÍCULOS:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "serial": {"label": "SERIAL:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha": {"label": "FECHA INICIO:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "activo": {"label": "ACTIVO:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "espaciado": {"label": "ESPACIADO DETALLE FACTURA:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "caja_movil": {"label": "LLAMAR CAJA DESDE MÓVIL?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pago_automatico": {"label": "COMPROBANTE DE EGRESO AUTOMÁTICO EN COMPRAS?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dia_limite_pago": {"label": "DÍA LÍMITE DE PAGO", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "refresh_grid_doc": {"label": "ACTUALIZACIÓN COCINA SEGUNDOS:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desactivar_control_sesion": {"label": "DESACTIVAR EL CONTROL DE SESIÓN", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_pc": {"label": "NOMBRE PC DE RED:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_impre": {"label": "NOMBRE IMPRESORA DE RED:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "essociedad": {"label": "Responsable autoretención (Antiguo CREE):", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "grancontr": {"label": "Auto retenedor en la fuente:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idconfiguraciones": {"label": "Idconfiguraciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "control_diasmora": {"label": "CONTROL CARTERA CON DÍAS DE MORA?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "control_costo": {"label": "CONTROLAR VENTAS CON VALOR DEL COSTO?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "modificainvpedido": {"label": "MODIFICAR INVENTARIO DESDE PEDIDO?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipodoc_pordefecto_pos": {"label": "DOCUMENTO POR DEFECTO EN POS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_xml_fe": {"label": "Ver JSON FE", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "noborrar_tmp_enpos": {"label": "NO BORRAR TEMPORALES EN VENTA RÁPIDA", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "validar_correo_enlinea": {"label": "Validar Correo en Línea", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apertura_caja": {"label": "MANEJAR APERTURA Y CIERRE DE CAJA?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "activar_console_log": {"label": "ACTIVAR CONSOLE LOG?:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codproducto_en_facventa": {"label": "MOSTRAR CODPRODUCTO EN POS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valor_propina_sugerida": {"label": "PORCENTAJE PROPINA SUGERIDA (Restaurantes)", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "columna_imprimir_ticket": {"label": "Columna Imprimir Ticket", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "columna_imprimir_a4": {"label": "Columna Imprimir A4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "columna_whatsapp": {"label": "Columna Whatsapp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "columna_npedido": {"label": "Columna No Pedido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "columna_reg_pdf_propio": {"label": "Columna Regenerar PDF", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_busqueda_refinada": {"label": "Ver Búsqueda Refinada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cal_valores_decimales": {"label": "Calcular Valores con Decimales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cal_cantidades_decimales": {"label": "Calcular Cantidades con Decimales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "validar_codbarras": {"label": "Validar Codbarras", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_grupo": {"label": "Ver Grupo/Familia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_codigo": {"label": "Ver Código", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_imagen": {"label": "Ver Imagen", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_existencia": {"label": "Ver Existencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_unidad": {"label": "Ver Unidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_precio": {"label": "Ver Precio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_impuesto": {"label": "Ver Impuesto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_stock": {"label": "Ver Stock", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_ubicacion": {"label": "Ver Ubicación", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_costo": {"label": "Ver Costo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_proveedor": {"label": "Ver Proveedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_combo": {"label": "Ver Combo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ver_agregar_nota": {"label": "Ver Agregar Nota", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0",
    "1": "hidden_bloco_1",
    "2": "hidden_bloco_2",
    "3": "hidden_bloco_3",
    "4": "hidden_bloco_4"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": "",
    "hidden_bloco_1": "",
    "hidden_bloco_2": "",
    "hidden_bloco_3": "",
    "hidden_bloco_4": ""
  };

  var ajax_field_mult = {
    "lineasporfactura": new Array(),
    "consolidararticulos": new Array(),
    "serial": new Array(),
    "fecha": new Array(),
    "activo": new Array(),
    "espaciado": new Array(),
    "caja_movil": new Array(),
    "pago_automatico": new Array(),
    "dia_limite_pago": new Array(),
    "refresh_grid_doc": new Array(),
    "desactivar_control_sesion": new Array(),
    "nombre_pc": new Array(),
    "nombre_impre": new Array(),
    "essociedad": new Array(),
    "grancontr": new Array(),
    "idconfiguraciones": new Array(),
    "control_diasmora": new Array(),
    "control_costo": new Array(),
    "modificainvpedido": new Array(),
    "tipodoc_pordefecto_pos": new Array(),
    "ver_xml_fe": new Array(),
    "noborrar_tmp_enpos": new Array(),
    "validar_correo_enlinea": new Array(),
    "apertura_caja": new Array(),
    "activar_console_log": new Array(),
    "codproducto_en_facventa": new Array(),
    "valor_propina_sugerida": new Array(),
    "columna_imprimir_ticket": new Array(),
    "columna_imprimir_a4": new Array(),
    "columna_whatsapp": new Array(),
    "columna_npedido": new Array(),
    "columna_reg_pdf_propio": new Array(),
    "ver_busqueda_refinada": new Array(),
    "cal_valores_decimales": new Array(),
    "cal_cantidades_decimales": new Array(),
    "validar_codbarras": new Array(),
    "ver_grupo": new Array(),
    "ver_codigo": new Array(),
    "ver_imagen": new Array(),
    "ver_existencia": new Array(),
    "ver_unidad": new Array(),
    "ver_precio": new Array(),
    "ver_impuesto": new Array(),
    "ver_stock": new Array(),
    "ver_ubicacion": new Array(),
    "ver_costo": new Array(),
    "ver_proveedor": new Array(),
    "ver_combo": new Array(),
    "ver_agregar_nota": new Array()
  };
  ajax_field_mult["lineasporfactura"][1] = "lineasporfactura";
  ajax_field_mult["consolidararticulos"][1] = "consolidararticulos";
  ajax_field_mult["serial"][1] = "serial";
  ajax_field_mult["fecha"][1] = "fecha";
  ajax_field_mult["activo"][1] = "activo";
  ajax_field_mult["espaciado"][1] = "espaciado";
  ajax_field_mult["caja_movil"][1] = "caja_movil";
  ajax_field_mult["pago_automatico"][1] = "pago_automatico";
  ajax_field_mult["dia_limite_pago"][1] = "dia_limite_pago";
  ajax_field_mult["refresh_grid_doc"][1] = "refresh_grid_doc";
  ajax_field_mult["desactivar_control_sesion"][1] = "desactivar_control_sesion";
  ajax_field_mult["nombre_pc"][1] = "nombre_pc";
  ajax_field_mult["nombre_impre"][1] = "nombre_impre";
  ajax_field_mult["essociedad"][1] = "essociedad";
  ajax_field_mult["grancontr"][1] = "grancontr";
  ajax_field_mult["idconfiguraciones"][1] = "idconfiguraciones";
  ajax_field_mult["control_diasmora"][1] = "control_diasmora";
  ajax_field_mult["control_costo"][1] = "control_costo";
  ajax_field_mult["modificainvpedido"][1] = "modificainvpedido";
  ajax_field_mult["tipodoc_pordefecto_pos"][1] = "tipodoc_pordefecto_pos";
  ajax_field_mult["ver_xml_fe"][1] = "ver_xml_fe";
  ajax_field_mult["noborrar_tmp_enpos"][1] = "noborrar_tmp_enpos";
  ajax_field_mult["validar_correo_enlinea"][1] = "validar_correo_enlinea";
  ajax_field_mult["apertura_caja"][1] = "apertura_caja";
  ajax_field_mult["activar_console_log"][1] = "activar_console_log";
  ajax_field_mult["codproducto_en_facventa"][1] = "codproducto_en_facventa";
  ajax_field_mult["valor_propina_sugerida"][1] = "valor_propina_sugerida";
  ajax_field_mult["columna_imprimir_ticket"][1] = "columna_imprimir_ticket";
  ajax_field_mult["columna_imprimir_a4"][1] = "columna_imprimir_a4";
  ajax_field_mult["columna_whatsapp"][1] = "columna_whatsapp";
  ajax_field_mult["columna_npedido"][1] = "columna_npedido";
  ajax_field_mult["columna_reg_pdf_propio"][1] = "columna_reg_pdf_propio";
  ajax_field_mult["ver_busqueda_refinada"][1] = "ver_busqueda_refinada";
  ajax_field_mult["cal_valores_decimales"][1] = "cal_valores_decimales";
  ajax_field_mult["cal_cantidades_decimales"][1] = "cal_cantidades_decimales";
  ajax_field_mult["validar_codbarras"][1] = "validar_codbarras";
  ajax_field_mult["ver_grupo"][1] = "ver_grupo";
  ajax_field_mult["ver_codigo"][1] = "ver_codigo";
  ajax_field_mult["ver_imagen"][1] = "ver_imagen";
  ajax_field_mult["ver_existencia"][1] = "ver_existencia";
  ajax_field_mult["ver_unidad"][1] = "ver_unidad";
  ajax_field_mult["ver_precio"][1] = "ver_precio";
  ajax_field_mult["ver_impuesto"][1] = "ver_impuesto";
  ajax_field_mult["ver_stock"][1] = "ver_stock";
  ajax_field_mult["ver_ubicacion"][1] = "ver_ubicacion";
  ajax_field_mult["ver_costo"][1] = "ver_costo";
  ajax_field_mult["ver_proveedor"][1] = "ver_proveedor";
  ajax_field_mult["ver_combo"][1] = "ver_combo";
  ajax_field_mult["ver_agregar_nota"][1] = "ver_agregar_nota";

  var ajax_field_id = {
    "lineasporfactura": new Array("hidden_field_label_lineasporfactura", "hidden_field_data_lineasporfactura"),
    "consolidararticulos": new Array("hidden_field_label_consolidararticulos", "hidden_field_data_consolidararticulos"),
    "serial": new Array("hidden_field_label_serial", "hidden_field_data_serial"),
    "fecha": new Array("hidden_field_label_fecha", "hidden_field_data_fecha"),
    "activo": new Array("hidden_field_label_activo", "hidden_field_data_activo"),
    "espaciado": new Array("hidden_field_label_espaciado", "hidden_field_data_espaciado"),
    "caja_movil": new Array("hidden_field_label_caja_movil", "hidden_field_data_caja_movil"),
    "pago_automatico": new Array("hidden_field_label_pago_automatico", "hidden_field_data_pago_automatico"),
    "dia_limite_pago": new Array("hidden_field_label_dia_limite_pago", "hidden_field_data_dia_limite_pago"),
    "refresh_grid_doc": new Array("hidden_field_label_refresh_grid_doc", "hidden_field_data_refresh_grid_doc"),
    "desactivar_control_sesion": new Array("hidden_field_label_desactivar_control_sesion", "hidden_field_data_desactivar_control_sesion"),
    "nombre_pc": new Array("hidden_field_label_nombre_pc", "hidden_field_data_nombre_pc"),
    "nombre_impre": new Array("hidden_field_label_nombre_impre", "hidden_field_data_nombre_impre"),
    "essociedad": new Array("hidden_field_label_essociedad", "hidden_field_data_essociedad"),
    "grancontr": new Array("hidden_field_label_grancontr", "hidden_field_data_grancontr"),
    "control_diasmora": new Array("hidden_field_label_control_diasmora", "hidden_field_data_control_diasmora"),
    "control_costo": new Array("hidden_field_label_control_costo", "hidden_field_data_control_costo"),
    "modificainvpedido": new Array("hidden_field_label_modificainvpedido", "hidden_field_data_modificainvpedido"),
    "tipodoc_pordefecto_pos": new Array("hidden_field_label_tipodoc_pordefecto_pos", "hidden_field_data_tipodoc_pordefecto_pos"),
    "ver_xml_fe": new Array("hidden_field_label_ver_xml_fe", "hidden_field_data_ver_xml_fe"),
    "noborrar_tmp_enpos": new Array("hidden_field_label_noborrar_tmp_enpos", "hidden_field_data_noborrar_tmp_enpos"),
    "validar_correo_enlinea": new Array("hidden_field_label_validar_correo_enlinea", "hidden_field_data_validar_correo_enlinea"),
    "apertura_caja": new Array("hidden_field_label_apertura_caja", "hidden_field_data_apertura_caja"),
    "activar_console_log": new Array("hidden_field_label_activar_console_log", "hidden_field_data_activar_console_log"),
    "codproducto_en_facventa": new Array("hidden_field_label_codproducto_en_facventa", "hidden_field_data_codproducto_en_facventa"),
    "valor_propina_sugerida": new Array("hidden_field_label_valor_propina_sugerida", "hidden_field_data_valor_propina_sugerida"),
    "columna_imprimir_ticket": new Array("hidden_field_label_columna_imprimir_ticket", "hidden_field_data_columna_imprimir_ticket"),
    "columna_imprimir_a4": new Array("hidden_field_label_columna_imprimir_a4", "hidden_field_data_columna_imprimir_a4"),
    "columna_whatsapp": new Array("hidden_field_label_columna_whatsapp", "hidden_field_data_columna_whatsapp"),
    "columna_npedido": new Array("hidden_field_label_columna_npedido", "hidden_field_data_columna_npedido"),
    "columna_reg_pdf_propio": new Array("hidden_field_label_columna_reg_pdf_propio", "hidden_field_data_columna_reg_pdf_propio"),
    "ver_busqueda_refinada": new Array("hidden_field_label_ver_busqueda_refinada", "hidden_field_data_ver_busqueda_refinada"),
    "cal_valores_decimales": new Array("hidden_field_label_cal_valores_decimales", "hidden_field_data_cal_valores_decimales"),
    "cal_cantidades_decimales": new Array("hidden_field_label_cal_cantidades_decimales", "hidden_field_data_cal_cantidades_decimales"),
    "validar_codbarras": new Array("hidden_field_label_validar_codbarras", "hidden_field_data_validar_codbarras"),
    "ver_grupo": new Array("hidden_field_label_ver_grupo", "hidden_field_data_ver_grupo"),
    "ver_codigo": new Array("hidden_field_label_ver_codigo", "hidden_field_data_ver_codigo"),
    "ver_imagen": new Array("hidden_field_label_ver_imagen", "hidden_field_data_ver_imagen"),
    "ver_existencia": new Array("hidden_field_label_ver_existencia", "hidden_field_data_ver_existencia"),
    "ver_unidad": new Array("hidden_field_label_ver_unidad", "hidden_field_data_ver_unidad"),
    "ver_precio": new Array("hidden_field_label_ver_precio", "hidden_field_data_ver_precio"),
    "ver_impuesto": new Array("hidden_field_label_ver_impuesto", "hidden_field_data_ver_impuesto"),
    "ver_stock": new Array("hidden_field_label_ver_stock", "hidden_field_data_ver_stock"),
    "ver_ubicacion": new Array("hidden_field_label_ver_ubicacion", "hidden_field_data_ver_ubicacion"),
    "ver_costo": new Array("hidden_field_label_ver_costo", "hidden_field_data_ver_costo"),
    "ver_proveedor": new Array("hidden_field_label_ver_proveedor", "hidden_field_data_ver_proveedor"),
    "ver_combo": new Array("hidden_field_label_ver_combo", "hidden_field_data_ver_combo"),
    "ver_agregar_nota": new Array("hidden_field_label_ver_agregar_nota", "hidden_field_data_ver_agregar_nota")
  };

  var ajax_read_only = {
    "lineasporfactura": "off",
    "consolidararticulos": "off",
    "serial": "off",
    "fecha": "off",
    "activo": "off",
    "espaciado": "off",
    "caja_movil": "off",
    "pago_automatico": "off",
    "dia_limite_pago": "off",
    "refresh_grid_doc": "off",
    "desactivar_control_sesion": "off",
    "nombre_pc": "off",
    "nombre_impre": "off",
    "essociedad": "off",
    "grancontr": "off",
    "idconfiguraciones": "on",
    "control_diasmora": "off",
    "control_costo": "off",
    "modificainvpedido": "off",
    "tipodoc_pordefecto_pos": "off",
    "ver_xml_fe": "off",
    "noborrar_tmp_enpos": "off",
    "validar_correo_enlinea": "off",
    "apertura_caja": "off",
    "activar_console_log": "off",
    "codproducto_en_facventa": "off",
    "valor_propina_sugerida": "off",
    "columna_imprimir_ticket": "off",
    "columna_imprimir_a4": "off",
    "columna_whatsapp": "off",
    "columna_npedido": "off",
    "columna_reg_pdf_propio": "off",
    "ver_busqueda_refinada": "off",
    "cal_valores_decimales": "off",
    "cal_cantidades_decimales": "off",
    "validar_codbarras": "off",
    "ver_grupo": "off",
    "ver_codigo": "off",
    "ver_imagen": "off",
    "ver_existencia": "off",
    "ver_unidad": "off",
    "ver_precio": "off",
    "ver_impuesto": "off",
    "ver_stock": "off",
    "ver_ubicacion": "off",
    "ver_costo": "off",
    "ver_proveedor": "off",
    "ver_combo": "off",
    "ver_agregar_nota": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("lineasporfactura" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("consolidararticulos" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("serial" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("activo" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("espaciado" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("caja_movil" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pago_automatico" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dia_limite_pago" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("refresh_grid_doc" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("desactivar_control_sesion" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_pc" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_impre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("essociedad" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("grancontr" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("idconfiguraciones" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("control_diasmora" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("control_costo" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("modificainvpedido" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipodoc_pordefecto_pos" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_xml_fe" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("noborrar_tmp_enpos" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("validar_correo_enlinea" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("apertura_caja" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("activar_console_log" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("codproducto_en_facventa" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("valor_propina_sugerida" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("columna_imprimir_ticket" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("columna_imprimir_a4" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("columna_whatsapp" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("columna_npedido" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("columna_reg_pdf_propio" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_busqueda_refinada" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cal_valores_decimales" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cal_cantidades_decimales" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("validar_codbarras" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_grupo" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_codigo" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_imagen" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_existencia" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_unidad" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_precio" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_impuesto" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_stock" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_ubicacion" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_costo" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_proveedor" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_combo" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ver_agregar_nota" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
