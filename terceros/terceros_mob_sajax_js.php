
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
      scCenterElement(document.getElementById("id_debug_window"));
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
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"])
    {
      self.parent.calendar_reload();
      self.parent.tb_remove();
    }
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
        if ("geral_terceros_mob" == sTestField)
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
        sc_hide_terceros_mob_form();
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

  // ---------- Validate tipo
  function do_ajax_terceros_mob_validate_tipo()
  {
    var nomeCampo_tipo = "tipo";
    var var_tipo = scAjaxGetFieldSelect(nomeCampo_tipo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_tipo(var_tipo, var_script_case_init, do_ajax_terceros_mob_validate_tipo_cb);
  } // do_ajax_terceros_mob_validate_tipo

  function do_ajax_terceros_mob_validate_tipo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo";
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
  } // do_ajax_terceros_mob_validate_tipo_cb

  // ---------- Validate regimen
  function do_ajax_terceros_mob_validate_regimen()
  {
    var nomeCampo_regimen = "regimen";
    var var_regimen = scAjaxGetFieldSelect(nomeCampo_regimen);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_regimen(var_regimen, var_script_case_init, do_ajax_terceros_mob_validate_regimen_cb);
  } // do_ajax_terceros_mob_validate_regimen

  function do_ajax_terceros_mob_validate_regimen_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "regimen";
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
  } // do_ajax_terceros_mob_validate_regimen_cb

  // ---------- Validate tipo_documento
  function do_ajax_terceros_mob_validate_tipo_documento()
  {
    var nomeCampo_tipo_documento = "tipo_documento";
    var var_tipo_documento = scAjaxGetFieldSelect(nomeCampo_tipo_documento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_tipo_documento(var_tipo_documento, var_script_case_init, do_ajax_terceros_mob_validate_tipo_documento_cb);
  } // do_ajax_terceros_mob_validate_tipo_documento

  function do_ajax_terceros_mob_validate_tipo_documento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo_documento";
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
  } // do_ajax_terceros_mob_validate_tipo_documento_cb

  // ---------- Validate documento
  function do_ajax_terceros_mob_validate_documento()
  {
    var nomeCampo_documento = "documento";
    var var_documento = scAjaxGetFieldText(nomeCampo_documento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_documento(var_documento, var_script_case_init, do_ajax_terceros_mob_validate_documento_cb);
  } // do_ajax_terceros_mob_validate_documento

  function do_ajax_terceros_mob_validate_documento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "documento";
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
  } // do_ajax_terceros_mob_validate_documento_cb

  // ---------- Validate dv
  function do_ajax_terceros_mob_validate_dv()
  {
    var nomeCampo_dv = "dv";
    var var_dv = scAjaxGetFieldText(nomeCampo_dv);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_dv(var_dv, var_script_case_init, do_ajax_terceros_mob_validate_dv_cb);
  } // do_ajax_terceros_mob_validate_dv

  function do_ajax_terceros_mob_validate_dv_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dv";
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
  } // do_ajax_terceros_mob_validate_dv_cb

  // ---------- Validate imagenter
  function do_ajax_terceros_mob_validate_imagenter()
  {
    var nomeCampo_imagenter = "imagenter";
    var var_imagenter = scAjaxGetFieldText(nomeCampo_imagenter);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_imagenter(var_imagenter, var_script_case_init, do_ajax_terceros_mob_validate_imagenter_cb);
  } // do_ajax_terceros_mob_validate_imagenter

  function do_ajax_terceros_mob_validate_imagenter_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "imagenter";
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
  } // do_ajax_terceros_mob_validate_imagenter_cb

  // ---------- Validate codigo_tercero
  function do_ajax_terceros_mob_validate_codigo_tercero()
  {
    var nomeCampo_codigo_tercero = "codigo_tercero";
    var var_codigo_tercero = scAjaxGetFieldText(nomeCampo_codigo_tercero);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_codigo_tercero(var_codigo_tercero, var_script_case_init, do_ajax_terceros_mob_validate_codigo_tercero_cb);
  } // do_ajax_terceros_mob_validate_codigo_tercero

  function do_ajax_terceros_mob_validate_codigo_tercero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codigo_tercero";
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
  } // do_ajax_terceros_mob_validate_codigo_tercero_cb

  // ---------- Validate sexo
  function do_ajax_terceros_mob_validate_sexo()
  {
    var nomeCampo_sexo = "sexo";
    var var_sexo = scAjaxGetFieldSelect(nomeCampo_sexo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_sexo(var_sexo, var_script_case_init, do_ajax_terceros_mob_validate_sexo_cb);
  } // do_ajax_terceros_mob_validate_sexo

  function do_ajax_terceros_mob_validate_sexo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sexo";
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
  } // do_ajax_terceros_mob_validate_sexo_cb

  // ---------- Validate notificar
  function do_ajax_terceros_mob_validate_notificar()
  {
    var nomeCampo_notificar = "notificar";
    var var_notificar = scAjaxGetFieldCheckbox(nomeCampo_notificar, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_notificar(var_notificar, var_script_case_init, do_ajax_terceros_mob_validate_notificar_cb);
  } // do_ajax_terceros_mob_validate_notificar

  function do_ajax_terceros_mob_validate_notificar_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "notificar";
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
  } // do_ajax_terceros_mob_validate_notificar_cb

  // ---------- Validate nombre1
  function do_ajax_terceros_mob_validate_nombre1()
  {
    var nomeCampo_nombre1 = "nombre1";
    var var_nombre1 = scAjaxGetFieldText(nomeCampo_nombre1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_nombre1(var_nombre1, var_script_case_init, do_ajax_terceros_mob_validate_nombre1_cb);
  } // do_ajax_terceros_mob_validate_nombre1

  function do_ajax_terceros_mob_validate_nombre1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre1";
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
  } // do_ajax_terceros_mob_validate_nombre1_cb

  // ---------- Validate nombre2
  function do_ajax_terceros_mob_validate_nombre2()
  {
    var nomeCampo_nombre2 = "nombre2";
    var var_nombre2 = scAjaxGetFieldText(nomeCampo_nombre2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_nombre2(var_nombre2, var_script_case_init, do_ajax_terceros_mob_validate_nombre2_cb);
  } // do_ajax_terceros_mob_validate_nombre2

  function do_ajax_terceros_mob_validate_nombre2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre2";
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
  } // do_ajax_terceros_mob_validate_nombre2_cb

  // ---------- Validate apellido1
  function do_ajax_terceros_mob_validate_apellido1()
  {
    var nomeCampo_apellido1 = "apellido1";
    var var_apellido1 = scAjaxGetFieldText(nomeCampo_apellido1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_apellido1(var_apellido1, var_script_case_init, do_ajax_terceros_mob_validate_apellido1_cb);
  } // do_ajax_terceros_mob_validate_apellido1

  function do_ajax_terceros_mob_validate_apellido1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apellido1";
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
  } // do_ajax_terceros_mob_validate_apellido1_cb

  // ---------- Validate apellido2
  function do_ajax_terceros_mob_validate_apellido2()
  {
    var nomeCampo_apellido2 = "apellido2";
    var var_apellido2 = scAjaxGetFieldText(nomeCampo_apellido2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_apellido2(var_apellido2, var_script_case_init, do_ajax_terceros_mob_validate_apellido2_cb);
  } // do_ajax_terceros_mob_validate_apellido2

  function do_ajax_terceros_mob_validate_apellido2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apellido2";
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
  } // do_ajax_terceros_mob_validate_apellido2_cb

  // ---------- Validate tel_cel
  function do_ajax_terceros_mob_validate_tel_cel()
  {
    var nomeCampo_tel_cel = "tel_cel";
    var var_tel_cel = scAjaxGetFieldText(nomeCampo_tel_cel);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_tel_cel(var_tel_cel, var_script_case_init, do_ajax_terceros_mob_validate_tel_cel_cb);
  } // do_ajax_terceros_mob_validate_tel_cel

  function do_ajax_terceros_mob_validate_tel_cel_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tel_cel";
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
  } // do_ajax_terceros_mob_validate_tel_cel_cb

  // ---------- Validate urlmail
  function do_ajax_terceros_mob_validate_urlmail()
  {
    var nomeCampo_urlmail = "urlmail";
    var var_urlmail = scAjaxGetFieldText(nomeCampo_urlmail);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_urlmail(var_urlmail, var_script_case_init, do_ajax_terceros_mob_validate_urlmail_cb);
  } // do_ajax_terceros_mob_validate_urlmail

  function do_ajax_terceros_mob_validate_urlmail_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "urlmail";
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
  } // do_ajax_terceros_mob_validate_urlmail_cb

  // ---------- Validate idtercero
  function do_ajax_terceros_mob_validate_idtercero()
  {
    var nomeCampo_idtercero = "idtercero";
    var var_idtercero = scAjaxGetFieldHidden(nomeCampo_idtercero);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_idtercero(var_idtercero, var_script_case_init, do_ajax_terceros_mob_validate_idtercero_cb);
  } // do_ajax_terceros_mob_validate_idtercero

  function do_ajax_terceros_mob_validate_idtercero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idtercero";
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
  } // do_ajax_terceros_mob_validate_idtercero_cb

  // ---------- Validate r_social
  function do_ajax_terceros_mob_validate_r_social()
  {
    var nomeCampo_r_social = "r_social";
    var var_r_social = scAjaxGetFieldText(nomeCampo_r_social);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_r_social(var_r_social, var_script_case_init, do_ajax_terceros_mob_validate_r_social_cb);
  } // do_ajax_terceros_mob_validate_r_social

  function do_ajax_terceros_mob_validate_r_social_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "r_social";
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
  } // do_ajax_terceros_mob_validate_r_social_cb

  // ---------- Validate nombres
  function do_ajax_terceros_mob_validate_nombres()
  {
    var nomeCampo_nombres = "nombres";
    var var_nombres = scAjaxGetFieldHidden(nomeCampo_nombres);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_nombres(var_nombres, var_script_case_init, do_ajax_terceros_mob_validate_nombres_cb);
  } // do_ajax_terceros_mob_validate_nombres

  function do_ajax_terceros_mob_validate_nombres_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombres";
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
  } // do_ajax_terceros_mob_validate_nombres_cb

  // ---------- Validate nombre_comercil
  function do_ajax_terceros_mob_validate_nombre_comercil()
  {
    var nomeCampo_nombre_comercil = "nombre_comercil";
    var var_nombre_comercil = scAjaxGetFieldText(nomeCampo_nombre_comercil);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_nombre_comercil(var_nombre_comercil, var_script_case_init, do_ajax_terceros_mob_validate_nombre_comercil_cb);
  } // do_ajax_terceros_mob_validate_nombre_comercil

  function do_ajax_terceros_mob_validate_nombre_comercil_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_comercil";
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
  } // do_ajax_terceros_mob_validate_nombre_comercil_cb

  // ---------- Validate representante
  function do_ajax_terceros_mob_validate_representante()
  {
    var nomeCampo_representante = "representante";
    var var_representante = scAjaxGetFieldText(nomeCampo_representante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_representante(var_representante, var_script_case_init, do_ajax_terceros_mob_validate_representante_cb);
  } // do_ajax_terceros_mob_validate_representante

  function do_ajax_terceros_mob_validate_representante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "representante";
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
  } // do_ajax_terceros_mob_validate_representante_cb

  // ---------- Validate direccion
  function do_ajax_terceros_mob_validate_direccion()
  {
    var nomeCampo_direccion = "direccion";
    var var_direccion = scAjaxGetFieldText(nomeCampo_direccion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_direccion(var_direccion, var_script_case_init, do_ajax_terceros_mob_validate_direccion_cb);
  } // do_ajax_terceros_mob_validate_direccion

  function do_ajax_terceros_mob_validate_direccion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion";
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
  } // do_ajax_terceros_mob_validate_direccion_cb

  // ---------- Validate departamento
  function do_ajax_terceros_mob_validate_departamento()
  {
    var nomeCampo_departamento = "departamento";
    var var_departamento = scAjaxGetFieldSelect(nomeCampo_departamento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_departamento(var_departamento, var_script_case_init, do_ajax_terceros_mob_validate_departamento_cb);
  } // do_ajax_terceros_mob_validate_departamento

  function do_ajax_terceros_mob_validate_departamento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "departamento";
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
  } // do_ajax_terceros_mob_validate_departamento_cb

  // ---------- Validate idmuni
  function do_ajax_terceros_mob_validate_idmuni()
  {
    var nomeCampo_idmuni = "idmuni";
    var var_idmuni = scAjaxGetFieldSelect(nomeCampo_idmuni);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_idmuni(var_idmuni, var_script_case_init, do_ajax_terceros_mob_validate_idmuni_cb);
  } // do_ajax_terceros_mob_validate_idmuni

  function do_ajax_terceros_mob_validate_idmuni_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idmuni";
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
  } // do_ajax_terceros_mob_validate_idmuni_cb

  // ---------- Validate ciudad
  function do_ajax_terceros_mob_validate_ciudad()
  {
    var nomeCampo_ciudad = "ciudad";
    var var_ciudad = scAjaxGetFieldSelect(nomeCampo_ciudad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_ciudad(var_ciudad, var_script_case_init, do_ajax_terceros_mob_validate_ciudad_cb);
  } // do_ajax_terceros_mob_validate_ciudad

  function do_ajax_terceros_mob_validate_ciudad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ciudad";
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
  } // do_ajax_terceros_mob_validate_ciudad_cb

  // ---------- Validate codigo_postal
  function do_ajax_terceros_mob_validate_codigo_postal()
  {
    var nomeCampo_codigo_postal = "codigo_postal";
    var var_codigo_postal = scAjaxGetFieldSelect(nomeCampo_codigo_postal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_codigo_postal(var_codigo_postal, var_script_case_init, do_ajax_terceros_mob_validate_codigo_postal_cb);
  } // do_ajax_terceros_mob_validate_codigo_postal

  function do_ajax_terceros_mob_validate_codigo_postal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codigo_postal";
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
  } // do_ajax_terceros_mob_validate_codigo_postal_cb

  // ---------- Validate observaciones
  function do_ajax_terceros_mob_validate_observaciones()
  {
    var nomeCampo_observaciones = "observaciones";
    var var_observaciones = scAjaxGetFieldText(nomeCampo_observaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_observaciones(var_observaciones, var_script_case_init, do_ajax_terceros_mob_validate_observaciones_cb);
  } // do_ajax_terceros_mob_validate_observaciones

  function do_ajax_terceros_mob_validate_observaciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "observaciones";
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
  } // do_ajax_terceros_mob_validate_observaciones_cb

  // ---------- Validate lenguaje
  function do_ajax_terceros_mob_validate_lenguaje()
  {
    var nomeCampo_lenguaje = "lenguaje";
    var var_lenguaje = scAjaxGetFieldSelect(nomeCampo_lenguaje);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_lenguaje(var_lenguaje, var_script_case_init, do_ajax_terceros_mob_validate_lenguaje_cb);
  } // do_ajax_terceros_mob_validate_lenguaje

  function do_ajax_terceros_mob_validate_lenguaje_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "lenguaje";
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
  } // do_ajax_terceros_mob_validate_lenguaje_cb

  // ---------- Validate c_postal
  function do_ajax_terceros_mob_validate_c_postal()
  {
    var nomeCampo_c_postal = "c_postal";
    var var_c_postal = scAjaxGetFieldText(nomeCampo_c_postal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_c_postal(var_c_postal, var_script_case_init, do_ajax_terceros_mob_validate_c_postal_cb);
  } // do_ajax_terceros_mob_validate_c_postal

  function do_ajax_terceros_mob_validate_c_postal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c_postal";
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
  } // do_ajax_terceros_mob_validate_c_postal_cb

  // ---------- Validate correo_notificafe
  function do_ajax_terceros_mob_validate_correo_notificafe()
  {
    var nomeCampo_correo_notificafe = "correo_notificafe";
    var var_correo_notificafe = scAjaxGetFieldText(nomeCampo_correo_notificafe);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_correo_notificafe(var_correo_notificafe, var_script_case_init, do_ajax_terceros_mob_validate_correo_notificafe_cb);
  } // do_ajax_terceros_mob_validate_correo_notificafe

  function do_ajax_terceros_mob_validate_correo_notificafe_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_notificafe";
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
  } // do_ajax_terceros_mob_validate_correo_notificafe_cb

  // ---------- Validate celular_notificafe
  function do_ajax_terceros_mob_validate_celular_notificafe()
  {
    var nomeCampo_celular_notificafe = "celular_notificafe";
    var var_celular_notificafe = scAjaxGetFieldText(nomeCampo_celular_notificafe);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_celular_notificafe(var_celular_notificafe, var_script_case_init, do_ajax_terceros_mob_validate_celular_notificafe_cb);
  } // do_ajax_terceros_mob_validate_celular_notificafe

  function do_ajax_terceros_mob_validate_celular_notificafe_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular_notificafe";
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
  } // do_ajax_terceros_mob_validate_celular_notificafe_cb

  // ---------- Validate cliente
  function do_ajax_terceros_mob_validate_cliente()
  {
    var nomeCampo_cliente = "cliente";
    var var_cliente = scAjaxGetFieldCheckbox(nomeCampo_cliente, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_cliente(var_cliente, var_script_case_init, do_ajax_terceros_mob_validate_cliente_cb);
  } // do_ajax_terceros_mob_validate_cliente

  function do_ajax_terceros_mob_validate_cliente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cliente";
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
  } // do_ajax_terceros_mob_validate_cliente_cb

  // ---------- Validate proveedor
  function do_ajax_terceros_mob_validate_proveedor()
  {
    var nomeCampo_proveedor = "proveedor";
    var var_proveedor = scAjaxGetFieldCheckbox(nomeCampo_proveedor, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_proveedor(var_proveedor, var_script_case_init, do_ajax_terceros_mob_validate_proveedor_cb);
  } // do_ajax_terceros_mob_validate_proveedor

  function do_ajax_terceros_mob_validate_proveedor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "proveedor";
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
  } // do_ajax_terceros_mob_validate_proveedor_cb

  // ---------- Validate empleado
  function do_ajax_terceros_mob_validate_empleado()
  {
    var nomeCampo_empleado = "empleado";
    var var_empleado = scAjaxGetFieldCheckbox(nomeCampo_empleado, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_empleado(var_empleado, var_script_case_init, do_ajax_terceros_mob_validate_empleado_cb);
  } // do_ajax_terceros_mob_validate_empleado

  function do_ajax_terceros_mob_validate_empleado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "empleado";
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
  } // do_ajax_terceros_mob_validate_empleado_cb

  // ---------- Validate es_tecnico
  function do_ajax_terceros_mob_validate_es_tecnico()
  {
    var nomeCampo_es_tecnico = "es_tecnico";
    var var_es_tecnico = scAjaxGetFieldCheckbox(nomeCampo_es_tecnico, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_es_tecnico(var_es_tecnico, var_script_case_init, do_ajax_terceros_mob_validate_es_tecnico_cb);
  } // do_ajax_terceros_mob_validate_es_tecnico

  function do_ajax_terceros_mob_validate_es_tecnico_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "es_tecnico";
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
  } // do_ajax_terceros_mob_validate_es_tecnico_cb

  // ---------- Validate activo
  function do_ajax_terceros_mob_validate_activo()
  {
    var nomeCampo_activo = "activo";
    var var_activo = scAjaxGetFieldCheckbox(nomeCampo_activo, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_activo(var_activo, var_script_case_init, do_ajax_terceros_mob_validate_activo_cb);
  } // do_ajax_terceros_mob_validate_activo

  function do_ajax_terceros_mob_validate_activo_cb(sResp)
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
  } // do_ajax_terceros_mob_validate_activo_cb

  // ---------- Validate credito
  function do_ajax_terceros_mob_validate_credito()
  {
    var nomeCampo_credito = "credito";
    var var_credito = scAjaxGetFieldSelect(nomeCampo_credito);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_credito(var_credito, var_script_case_init, do_ajax_terceros_mob_validate_credito_cb);
  } // do_ajax_terceros_mob_validate_credito

  function do_ajax_terceros_mob_validate_credito_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "credito";
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
  } // do_ajax_terceros_mob_validate_credito_cb

  // ---------- Validate cupo
  function do_ajax_terceros_mob_validate_cupo()
  {
    var nomeCampo_cupo = "cupo";
    var var_cupo = scAjaxGetFieldText(nomeCampo_cupo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_cupo(var_cupo, var_script_case_init, do_ajax_terceros_mob_validate_cupo_cb);
  } // do_ajax_terceros_mob_validate_cupo

  function do_ajax_terceros_mob_validate_cupo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cupo";
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
  } // do_ajax_terceros_mob_validate_cupo_cb

  // ---------- Validate cupodis
  function do_ajax_terceros_mob_validate_cupodis()
  {
    var nomeCampo_cupodis = "cupodis";
    var var_cupodis = scAjaxGetFieldText(nomeCampo_cupodis);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_cupodis(var_cupodis, var_script_case_init, do_ajax_terceros_mob_validate_cupodis_cb);
  } // do_ajax_terceros_mob_validate_cupodis

  function do_ajax_terceros_mob_validate_cupodis_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cupodis";
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
  } // do_ajax_terceros_mob_validate_cupodis_cb

  // ---------- Validate dias_credito
  function do_ajax_terceros_mob_validate_dias_credito()
  {
    var nomeCampo_dias_credito = "dias_credito";
    var var_dias_credito = scAjaxGetFieldText(nomeCampo_dias_credito);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_dias_credito(var_dias_credito, var_script_case_init, do_ajax_terceros_mob_validate_dias_credito_cb);
  } // do_ajax_terceros_mob_validate_dias_credito

  function do_ajax_terceros_mob_validate_dias_credito_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dias_credito";
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
  } // do_ajax_terceros_mob_validate_dias_credito_cb

  // ---------- Validate dias_mora
  function do_ajax_terceros_mob_validate_dias_mora()
  {
    var nomeCampo_dias_mora = "dias_mora";
    var var_dias_mora = scAjaxGetFieldText(nomeCampo_dias_mora);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_dias_mora(var_dias_mora, var_script_case_init, do_ajax_terceros_mob_validate_dias_mora_cb);
  } // do_ajax_terceros_mob_validate_dias_mora

  function do_ajax_terceros_mob_validate_dias_mora_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dias_mora";
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
  } // do_ajax_terceros_mob_validate_dias_mora_cb

  // ---------- Validate efec_retencion
  function do_ajax_terceros_mob_validate_efec_retencion()
  {
    var nomeCampo_efec_retencion = "efec_retencion";
    var var_efec_retencion = scAjaxGetFieldSelect(nomeCampo_efec_retencion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_efec_retencion(var_efec_retencion, var_script_case_init, do_ajax_terceros_mob_validate_efec_retencion_cb);
  } // do_ajax_terceros_mob_validate_efec_retencion

  function do_ajax_terceros_mob_validate_efec_retencion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "efec_retencion";
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
  } // do_ajax_terceros_mob_validate_efec_retencion_cb

  // ---------- Validate listaprecios
  function do_ajax_terceros_mob_validate_listaprecios()
  {
    var nomeCampo_listaprecios = "listaprecios";
    var var_listaprecios = scAjaxGetFieldSelect(nomeCampo_listaprecios);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_listaprecios(var_listaprecios, var_script_case_init, do_ajax_terceros_mob_validate_listaprecios_cb);
  } // do_ajax_terceros_mob_validate_listaprecios

  function do_ajax_terceros_mob_validate_listaprecios_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "listaprecios";
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
  } // do_ajax_terceros_mob_validate_listaprecios_cb

  // ---------- Validate loatiende
  function do_ajax_terceros_mob_validate_loatiende()
  {
    var nomeCampo_loatiende = "loatiende";
    var var_loatiende = scAjaxGetFieldSelect(nomeCampo_loatiende);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_loatiende(var_loatiende, var_script_case_init, do_ajax_terceros_mob_validate_loatiende_cb);
  } // do_ajax_terceros_mob_validate_loatiende

  function do_ajax_terceros_mob_validate_loatiende_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "loatiende";
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
  } // do_ajax_terceros_mob_validate_loatiende_cb

  // ---------- Validate autorizado
  function do_ajax_terceros_mob_validate_autorizado()
  {
    var nomeCampo_autorizado = "autorizado";
    var var_autorizado = scAjaxGetFieldCheckbox(nomeCampo_autorizado, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_autorizado(var_autorizado, var_script_case_init, do_ajax_terceros_mob_validate_autorizado_cb);
  } // do_ajax_terceros_mob_validate_autorizado

  function do_ajax_terceros_mob_validate_autorizado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "autorizado";
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
  } // do_ajax_terceros_mob_validate_autorizado_cb

  // ---------- Validate relleno2
  function do_ajax_terceros_mob_validate_relleno2()
  {
    var nomeCampo_relleno2 = "relleno2";
    var var_relleno2 = scAjaxGetFieldHidden(nomeCampo_relleno2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_relleno2(var_relleno2, var_script_case_init, do_ajax_terceros_mob_validate_relleno2_cb);
  } // do_ajax_terceros_mob_validate_relleno2

  function do_ajax_terceros_mob_validate_relleno2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "relleno2";
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
  } // do_ajax_terceros_mob_validate_relleno2_cb

  // ---------- Validate nacimiento
  function do_ajax_terceros_mob_validate_nacimiento()
  {
    var nomeCampo_nacimiento = "nacimiento";
    var var_nacimiento = scAjaxGetFieldText(nomeCampo_nacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_nacimiento(var_nacimiento, var_script_case_init, do_ajax_terceros_mob_validate_nacimiento_cb);
  } // do_ajax_terceros_mob_validate_nacimiento

  function do_ajax_terceros_mob_validate_nacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nacimiento";
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
  } // do_ajax_terceros_mob_validate_nacimiento_cb

  // ---------- Validate detalle_tributario
  function do_ajax_terceros_mob_validate_detalle_tributario()
  {
    var nomeCampo_detalle_tributario = "detalle_tributario";
    var var_detalle_tributario = scAjaxGetFieldText(nomeCampo_detalle_tributario);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_detalle_tributario(var_detalle_tributario, var_script_case_init, do_ajax_terceros_mob_validate_detalle_tributario_cb);
  } // do_ajax_terceros_mob_validate_detalle_tributario

  function do_ajax_terceros_mob_validate_detalle_tributario_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "detalle_tributario";
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
  } // do_ajax_terceros_mob_validate_detalle_tributario_cb

  // ---------- Validate responsabilidad_fiscal
  function do_ajax_terceros_mob_validate_responsabilidad_fiscal()
  {
    var nomeCampo_responsabilidad_fiscal = "responsabilidad_fiscal";
    var var_responsabilidad_fiscal = scAjaxGetFieldText(nomeCampo_responsabilidad_fiscal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_responsabilidad_fiscal(var_responsabilidad_fiscal, var_script_case_init, do_ajax_terceros_mob_validate_responsabilidad_fiscal_cb);
  } // do_ajax_terceros_mob_validate_responsabilidad_fiscal

  function do_ajax_terceros_mob_validate_responsabilidad_fiscal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "responsabilidad_fiscal";
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
  } // do_ajax_terceros_mob_validate_responsabilidad_fiscal_cb

  // ---------- Validate ciiu
  function do_ajax_terceros_mob_validate_ciiu()
  {
    var nomeCampo_ciiu = "ciiu";
    var var_ciiu = scAjaxGetFieldText(nomeCampo_ciiu);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_ciiu(var_ciiu, var_script_case_init, do_ajax_terceros_mob_validate_ciiu_cb);
  } // do_ajax_terceros_mob_validate_ciiu

  function do_ajax_terceros_mob_validate_ciiu_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ciiu";
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
  } // do_ajax_terceros_mob_validate_ciiu_cb

  // ---------- Validate sucur_cliente
  function do_ajax_terceros_mob_validate_sucur_cliente()
  {
    var nomeCampo_sucur_cliente = "sucur_cliente";
    var var_sucur_cliente = scAjaxGetFieldCheckbox(nomeCampo_sucur_cliente, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_sucur_cliente(var_sucur_cliente, var_script_case_init, do_ajax_terceros_mob_validate_sucur_cliente_cb);
  } // do_ajax_terceros_mob_validate_sucur_cliente

  function do_ajax_terceros_mob_validate_sucur_cliente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sucur_cliente";
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
  } // do_ajax_terceros_mob_validate_sucur_cliente_cb

  // ---------- Validate sucursales
  function do_ajax_terceros_mob_validate_sucursales()
  {
    var nomeCampo_sucursales = "sucursales";
    var var_sucursales = scAjaxGetFieldText(nomeCampo_sucursales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_sucursales(var_sucursales, var_script_case_init, do_ajax_terceros_mob_validate_sucursales_cb);
  } // do_ajax_terceros_mob_validate_sucursales

  function do_ajax_terceros_mob_validate_sucursales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sucursales";
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
  } // do_ajax_terceros_mob_validate_sucursales_cb

  // ---------- Validate fechault
  function do_ajax_terceros_mob_validate_fechault()
  {
    var nomeCampo_fechault = "fechault";
    var var_fechault = scAjaxGetFieldText(nomeCampo_fechault);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_fechault(var_fechault, var_script_case_init, do_ajax_terceros_mob_validate_fechault_cb);
  } // do_ajax_terceros_mob_validate_fechault

  function do_ajax_terceros_mob_validate_fechault_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fechault";
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
  } // do_ajax_terceros_mob_validate_fechault_cb

  // ---------- Validate saldo
  function do_ajax_terceros_mob_validate_saldo()
  {
    var nomeCampo_saldo = "saldo";
    var var_saldo = scAjaxGetFieldText(nomeCampo_saldo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_saldo(var_saldo, var_script_case_init, do_ajax_terceros_mob_validate_saldo_cb);
  } // do_ajax_terceros_mob_validate_saldo

  function do_ajax_terceros_mob_validate_saldo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "saldo";
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
  } // do_ajax_terceros_mob_validate_saldo_cb

  // ---------- Validate afiliacion
  function do_ajax_terceros_mob_validate_afiliacion()
  {
    var nomeCampo_afiliacion = "afiliacion";
    var var_afiliacion = scAjaxGetFieldText(nomeCampo_afiliacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_afiliacion(var_afiliacion, var_script_case_init, do_ajax_terceros_mob_validate_afiliacion_cb);
  } // do_ajax_terceros_mob_validate_afiliacion

  function do_ajax_terceros_mob_validate_afiliacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "afiliacion";
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
  } // do_ajax_terceros_mob_validate_afiliacion_cb

  // ---------- Validate es_cajero
  function do_ajax_terceros_mob_validate_es_cajero()
  {
    var nomeCampo_es_cajero = "es_cajero";
    var var_es_cajero = scAjaxGetFieldCheckbox(nomeCampo_es_cajero, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_es_cajero(var_es_cajero, var_script_case_init, do_ajax_terceros_mob_validate_es_cajero_cb);
  } // do_ajax_terceros_mob_validate_es_cajero

  function do_ajax_terceros_mob_validate_es_cajero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "es_cajero";
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
  } // do_ajax_terceros_mob_validate_es_cajero_cb

  // ---------- Validate cupo_vendedor
  function do_ajax_terceros_mob_validate_cupo_vendedor()
  {
    var nomeCampo_cupo_vendedor = "cupo_vendedor";
    var var_cupo_vendedor = scAjaxGetFieldText(nomeCampo_cupo_vendedor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_cupo_vendedor(var_cupo_vendedor, var_script_case_init, do_ajax_terceros_mob_validate_cupo_vendedor_cb);
  } // do_ajax_terceros_mob_validate_cupo_vendedor

  function do_ajax_terceros_mob_validate_cupo_vendedor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cupo_vendedor";
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
  } // do_ajax_terceros_mob_validate_cupo_vendedor_cb

  // ---------- Validate autoretenedor
  function do_ajax_terceros_mob_validate_autoretenedor()
  {
    var nomeCampo_autoretenedor = "autoretenedor";
    var var_autoretenedor = scAjaxGetFieldSelect(nomeCampo_autoretenedor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_autoretenedor(var_autoretenedor, var_script_case_init, do_ajax_terceros_mob_validate_autoretenedor_cb);
  } // do_ajax_terceros_mob_validate_autoretenedor

  function do_ajax_terceros_mob_validate_autoretenedor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "autoretenedor";
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
  } // do_ajax_terceros_mob_validate_autoretenedor_cb

  // ---------- Validate creditoprov
  function do_ajax_terceros_mob_validate_creditoprov()
  {
    var nomeCampo_creditoprov = "creditoprov";
    var var_creditoprov = scAjaxGetFieldSelect(nomeCampo_creditoprov);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_creditoprov(var_creditoprov, var_script_case_init, do_ajax_terceros_mob_validate_creditoprov_cb);
  } // do_ajax_terceros_mob_validate_creditoprov

  function do_ajax_terceros_mob_validate_creditoprov_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "creditoprov";
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
  } // do_ajax_terceros_mob_validate_creditoprov_cb

  // ---------- Validate dias
  function do_ajax_terceros_mob_validate_dias()
  {
    var nomeCampo_dias = "dias";
    var var_dias = scAjaxGetFieldText(nomeCampo_dias);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_dias(var_dias, var_script_case_init, do_ajax_terceros_mob_validate_dias_cb);
  } // do_ajax_terceros_mob_validate_dias

  function do_ajax_terceros_mob_validate_dias_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dias";
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
  } // do_ajax_terceros_mob_validate_dias_cb

  // ---------- Validate url
  function do_ajax_terceros_mob_validate_url()
  {
    var nomeCampo_url = "url";
    var var_url = scAjaxGetFieldText(nomeCampo_url);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_url(var_url, var_script_case_init, do_ajax_terceros_mob_validate_url_cb);
  } // do_ajax_terceros_mob_validate_url

  function do_ajax_terceros_mob_validate_url_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "url";
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
  } // do_ajax_terceros_mob_validate_url_cb

  // ---------- Validate contacto
  function do_ajax_terceros_mob_validate_contacto()
  {
    var nomeCampo_contacto = "contacto";
    var var_contacto = scAjaxGetFieldText(nomeCampo_contacto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_contacto(var_contacto, var_script_case_init, do_ajax_terceros_mob_validate_contacto_cb);
  } // do_ajax_terceros_mob_validate_contacto

  function do_ajax_terceros_mob_validate_contacto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto";
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
  } // do_ajax_terceros_mob_validate_contacto_cb

  // ---------- Validate telefonos_prov
  function do_ajax_terceros_mob_validate_telefonos_prov()
  {
    var nomeCampo_telefonos_prov = "telefonos_prov";
    var var_telefonos_prov = scAjaxGetFieldText(nomeCampo_telefonos_prov);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_telefonos_prov(var_telefonos_prov, var_script_case_init, do_ajax_terceros_mob_validate_telefonos_prov_cb);
  } // do_ajax_terceros_mob_validate_telefonos_prov

  function do_ajax_terceros_mob_validate_telefonos_prov_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefonos_prov";
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
  } // do_ajax_terceros_mob_validate_telefonos_prov_cb

  // ---------- Validate email
  function do_ajax_terceros_mob_validate_email()
  {
    var nomeCampo_email = "email";
    var var_email = scAjaxGetFieldText(nomeCampo_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_email(var_email, var_script_case_init, do_ajax_terceros_mob_validate_email_cb);
  } // do_ajax_terceros_mob_validate_email

  function do_ajax_terceros_mob_validate_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "email";
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
  } // do_ajax_terceros_mob_validate_email_cb

  // ---------- Validate fechultcomp
  function do_ajax_terceros_mob_validate_fechultcomp()
  {
    var nomeCampo_fechultcomp = "fechultcomp";
    var var_fechultcomp = scAjaxGetFieldHidden(nomeCampo_fechultcomp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_fechultcomp(var_fechultcomp, var_script_case_init, do_ajax_terceros_mob_validate_fechultcomp_cb);
  } // do_ajax_terceros_mob_validate_fechultcomp

  function do_ajax_terceros_mob_validate_fechultcomp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fechultcomp";
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
  } // do_ajax_terceros_mob_validate_fechultcomp_cb

  // ---------- Validate saldoapagar
  function do_ajax_terceros_mob_validate_saldoapagar()
  {
    var nomeCampo_saldoapagar = "saldoapagar";
    var var_saldoapagar = scAjaxGetFieldHidden(nomeCampo_saldoapagar);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_saldoapagar(var_saldoapagar, var_script_case_init, do_ajax_terceros_mob_validate_saldoapagar_cb);
  } // do_ajax_terceros_mob_validate_saldoapagar

  function do_ajax_terceros_mob_validate_saldoapagar_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "saldoapagar";
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
  } // do_ajax_terceros_mob_validate_saldoapagar_cb

  // ---------- Validate codigo_ter
  function do_ajax_terceros_mob_validate_codigo_ter()
  {
    var nomeCampo_codigo_ter = "codigo_ter";
    var var_codigo_ter = scAjaxGetFieldText(nomeCampo_codigo_ter);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_codigo_ter(var_codigo_ter, var_script_case_init, do_ajax_terceros_mob_validate_codigo_ter_cb);
  } // do_ajax_terceros_mob_validate_codigo_ter

  function do_ajax_terceros_mob_validate_codigo_ter_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codigo_ter";
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
  } // do_ajax_terceros_mob_validate_codigo_ter_cb

  // ---------- Validate zona_clientes
  function do_ajax_terceros_mob_validate_zona_clientes()
  {
    var nomeCampo_zona_clientes = "zona_clientes";
    var var_zona_clientes = scAjaxGetFieldSelect(nomeCampo_zona_clientes);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_zona_clientes(var_zona_clientes, var_script_case_init, do_ajax_terceros_mob_validate_zona_clientes_cb);
  } // do_ajax_terceros_mob_validate_zona_clientes

  function do_ajax_terceros_mob_validate_zona_clientes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "zona_clientes";
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
  } // do_ajax_terceros_mob_validate_zona_clientes_cb

  // ---------- Validate clasificacion_clientes
  function do_ajax_terceros_mob_validate_clasificacion_clientes()
  {
    var nomeCampo_clasificacion_clientes = "clasificacion_clientes";
    var var_clasificacion_clientes = scAjaxGetFieldSelect(nomeCampo_clasificacion_clientes);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_clasificacion_clientes(var_clasificacion_clientes, var_script_case_init, do_ajax_terceros_mob_validate_clasificacion_clientes_cb);
  } // do_ajax_terceros_mob_validate_clasificacion_clientes

  function do_ajax_terceros_mob_validate_clasificacion_clientes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "clasificacion_clientes";
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
  } // do_ajax_terceros_mob_validate_clasificacion_clientes_cb

  // ---------- Validate puc_auxiliar_deudores
  function do_ajax_terceros_mob_validate_puc_auxiliar_deudores()
  {
  } // do_ajax_terceros_mob_validate_puc_auxiliar_deudores

  function do_ajax_terceros_mob_validate_puc_auxiliar_deudores_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_auxiliar_deudores";
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
  } // do_ajax_terceros_mob_validate_puc_auxiliar_deudores_cb

  // ---------- Validate puc_retefuente_ventas
  function do_ajax_terceros_mob_validate_puc_retefuente_ventas()
  {
  } // do_ajax_terceros_mob_validate_puc_retefuente_ventas

  function do_ajax_terceros_mob_validate_puc_retefuente_ventas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_retefuente_ventas";
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
  } // do_ajax_terceros_mob_validate_puc_retefuente_ventas_cb

  // ---------- Validate puc_retefuente_servicios_clie
  function do_ajax_terceros_mob_validate_puc_retefuente_servicios_clie()
  {
  } // do_ajax_terceros_mob_validate_puc_retefuente_servicios_clie

  function do_ajax_terceros_mob_validate_puc_retefuente_servicios_clie_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_retefuente_servicios_clie";
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
  } // do_ajax_terceros_mob_validate_puc_retefuente_servicios_clie_cb

  // ---------- Validate puc_auxiliar_proveedores
  function do_ajax_terceros_mob_validate_puc_auxiliar_proveedores()
  {
  } // do_ajax_terceros_mob_validate_puc_auxiliar_proveedores

  function do_ajax_terceros_mob_validate_puc_auxiliar_proveedores_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_auxiliar_proveedores";
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
  } // do_ajax_terceros_mob_validate_puc_auxiliar_proveedores_cb

  // ---------- Validate puc_retefuente_compras
  function do_ajax_terceros_mob_validate_puc_retefuente_compras()
  {
  } // do_ajax_terceros_mob_validate_puc_retefuente_compras

  function do_ajax_terceros_mob_validate_puc_retefuente_compras_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_retefuente_compras";
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
  } // do_ajax_terceros_mob_validate_puc_retefuente_compras_cb

  // ---------- Validate puc_retefuente_servicios_prov
  function do_ajax_terceros_mob_validate_puc_retefuente_servicios_prov()
  {
  } // do_ajax_terceros_mob_validate_puc_retefuente_servicios_prov

  function do_ajax_terceros_mob_validate_puc_retefuente_servicios_prov_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "puc_retefuente_servicios_prov";
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
  } // do_ajax_terceros_mob_validate_puc_retefuente_servicios_prov_cb

  // ---------- Validate archivos
  function do_ajax_terceros_mob_validate_archivos()
  {
    var nomeCampo_archivos = "archivos";
    var var_archivos = scAjaxGetFieldText(nomeCampo_archivos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_archivos(var_archivos, var_script_case_init, do_ajax_terceros_mob_validate_archivos_cb);
  } // do_ajax_terceros_mob_validate_archivos

  function do_ajax_terceros_mob_validate_archivos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "archivos";
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
  } // do_ajax_terceros_mob_validate_archivos_cb

  // ---------- Validate es_restaurante
  function do_ajax_terceros_mob_validate_es_restaurante()
  {
    var nomeCampo_es_restaurante = "es_restaurante";
    var var_es_restaurante = scAjaxGetFieldCheckbox(nomeCampo_es_restaurante, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_es_restaurante(var_es_restaurante, var_script_case_init, do_ajax_terceros_mob_validate_es_restaurante_cb);
  } // do_ajax_terceros_mob_validate_es_restaurante

  function do_ajax_terceros_mob_validate_es_restaurante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "es_restaurante";
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
  } // do_ajax_terceros_mob_validate_es_restaurante_cb

  // ---------- Validate porcentaje_propina_sugerida
  function do_ajax_terceros_mob_validate_porcentaje_propina_sugerida()
  {
    var nomeCampo_porcentaje_propina_sugerida = "porcentaje_propina_sugerida";
    var var_porcentaje_propina_sugerida = scAjaxGetFieldText(nomeCampo_porcentaje_propina_sugerida);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_terceros_mob_validate_porcentaje_propina_sugerida(var_porcentaje_propina_sugerida, var_script_case_init, do_ajax_terceros_mob_validate_porcentaje_propina_sugerida_cb);
  } // do_ajax_terceros_mob_validate_porcentaje_propina_sugerida

  function do_ajax_terceros_mob_validate_porcentaje_propina_sugerida_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcentaje_propina_sugerida";
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
  } // do_ajax_terceros_mob_validate_porcentaje_propina_sugerida_cb

  // ---------- Refresh departamento
  function do_ajax_terceros_mob_refresh_departamento()
  {
    var var_departamento = scAjaxGetFieldSelect("departamento");
    var var_nmgp_refresh_fields = "idmuni";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_refresh_departamento(var_departamento, var_nmgp_refresh_fields, var_script_case_init, do_ajax_terceros_mob_refresh_departamento_cb);
  } // do_ajax_terceros_mob_refresh_departamento

  function do_ajax_terceros_mob_refresh_departamento_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    scAjaxSetFields(false);
    scAjaxSetVariables();
    do_ajax_terceros_mob_refresh_idmuni();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_terceros_mob_refresh_departamento_cb

  // ---------- Refresh idmuni
  function do_ajax_terceros_mob_refresh_idmuni()
  {
    var var_idmuni = scAjaxGetFieldSelect("idmuni");
    var var_nmgp_refresh_fields = "ciudad_#fld#_codigo_postal";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_refresh_idmuni(var_idmuni, var_nmgp_refresh_fields, var_script_case_init, do_ajax_terceros_mob_refresh_idmuni_cb);
  } // do_ajax_terceros_mob_refresh_idmuni

  function do_ajax_terceros_mob_refresh_idmuni_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    scAjaxSetFields(false);
    scAjaxSetVariables();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_terceros_mob_refresh_idmuni_cb

  // ---------- Event onchange apellido1
  function do_ajax_terceros_mob_event_apellido1_onchange()
  {
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_apellido1 = scAjaxGetFieldText("apellido1");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_apellido1_onchange(var_nombre1, var_apellido1, var_script_case_init, do_ajax_terceros_mob_event_apellido1_onchange_cb);
  } // do_ajax_terceros_mob_event_apellido1_onchange

  function do_ajax_terceros_mob_event_apellido1_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "apellido1";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_apellido1_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_apellido1_onchange_cb
  function do_ajax_terceros_mob_event_apellido1_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_apellido1_onchange_cb_after_alert

  // ---------- Event onchange apellido2
  function do_ajax_terceros_mob_event_apellido2_onchange()
  {
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_apellido2 = scAjaxGetFieldText("apellido2");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_apellido2_onchange(var_nombre1, var_apellido2, var_script_case_init, do_ajax_terceros_mob_event_apellido2_onchange_cb);
  } // do_ajax_terceros_mob_event_apellido2_onchange

  function do_ajax_terceros_mob_event_apellido2_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "apellido2";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_apellido2_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_apellido2_onchange_cb
  function do_ajax_terceros_mob_event_apellido2_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_apellido2_onchange_cb_after_alert

  // ---------- Event onchange cliente
  function do_ajax_terceros_mob_event_cliente_onchange()
  {
    var var_idtercero = scAjaxGetFieldHidden("idtercero");
    var var_cliente = scAjaxGetFieldCheckbox("cliente", ";");
    var var_credito = scAjaxGetFieldSelect("credito");
    var var_cupodis = scAjaxGetFieldText("cupodis");
    var var_cupo = scAjaxGetFieldText("cupo");
    var var_efec_retencion = scAjaxGetFieldSelect("efec_retencion");
    var var_listaprecios = scAjaxGetFieldSelect("listaprecios");
    var var_loatiende = scAjaxGetFieldSelect("loatiende");
    var var_proveedor = scAjaxGetFieldCheckbox("proveedor", ";");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_cliente_onchange(var_idtercero, var_cliente, var_credito, var_cupodis, var_cupo, var_efec_retencion, var_listaprecios, var_loatiende, var_proveedor, var_script_case_init, do_ajax_terceros_mob_event_cliente_onchange_cb);
  } // do_ajax_terceros_mob_event_cliente_onchange

  function do_ajax_terceros_mob_event_cliente_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "cliente";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_cliente_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_cliente_onchange_cb
  function do_ajax_terceros_mob_event_cliente_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_cliente_onchange_cb_after_alert

  // ---------- Event onchange credito
  function do_ajax_terceros_mob_event_credito_onchange()
  {
    var var_credito = scAjaxGetFieldSelect("credito");
    var var_dias_credito = scAjaxGetFieldText("dias_credito");
    var var_dias_mora = scAjaxGetFieldText("dias_mora");
    var var_cupo = scAjaxGetFieldText("cupo");
    var var_cupodis = scAjaxGetFieldText("cupodis");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_credito_onchange(var_credito, var_dias_credito, var_dias_mora, var_cupo, var_cupodis, var_script_case_init, do_ajax_terceros_mob_event_credito_onchange_cb);
  } // do_ajax_terceros_mob_event_credito_onchange

  function do_ajax_terceros_mob_event_credito_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "credito";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_credito_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_credito_onchange_cb
  function do_ajax_terceros_mob_event_credito_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_credito_onchange_cb_after_alert

  // ---------- Event onchange creditoprov
  function do_ajax_terceros_mob_event_creditoprov_onchange()
  {
    var var_creditoprov = scAjaxGetFieldSelect("creditoprov");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_creditoprov_onchange(var_creditoprov, var_script_case_init, do_ajax_terceros_mob_event_creditoprov_onchange_cb);
  } // do_ajax_terceros_mob_event_creditoprov_onchange

  function do_ajax_terceros_mob_event_creditoprov_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "creditoprov";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_creditoprov_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_creditoprov_onchange_cb
  function do_ajax_terceros_mob_event_creditoprov_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_creditoprov_onchange_cb_after_alert

  // ---------- Event onchange cupo
  function do_ajax_terceros_mob_event_cupo_onchange()
  {
    var var_cupodis = scAjaxGetFieldText("cupodis");
    var var_cupo = scAjaxGetFieldText("cupo");
    var var_saldo = scAjaxGetFieldText("saldo");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_cupo_onchange(var_cupodis, var_cupo, var_saldo, var_script_case_init, do_ajax_terceros_mob_event_cupo_onchange_cb);
  } // do_ajax_terceros_mob_event_cupo_onchange

  function do_ajax_terceros_mob_event_cupo_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "cupo";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_cupo_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_cupo_onchange_cb
  function do_ajax_terceros_mob_event_cupo_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_cupo_onchange_cb_after_alert

  // ---------- Event onchange documento
  function do_ajax_terceros_mob_event_documento_onchange()
  {
    var var_tipo_documento = scAjaxGetFieldSelect("tipo_documento");
    var var_dv = scAjaxGetFieldText("dv");
    var var_documento = scAjaxGetFieldText("documento");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_documento_onchange(var_tipo_documento, var_dv, var_documento, var_script_case_init, do_ajax_terceros_mob_event_documento_onchange_cb);
  } // do_ajax_terceros_mob_event_documento_onchange

  function do_ajax_terceros_mob_event_documento_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "documento";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_documento_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_documento_onchange_cb
  function do_ajax_terceros_mob_event_documento_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_documento_onchange_cb_after_alert

  // ---------- Event onchange nombre1
  function do_ajax_terceros_mob_event_nombre1_onchange()
  {
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_nombre1_onchange(var_nombre1, var_script_case_init, do_ajax_terceros_mob_event_nombre1_onchange_cb);
  } // do_ajax_terceros_mob_event_nombre1_onchange

  function do_ajax_terceros_mob_event_nombre1_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombre1";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_nombre1_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_nombre1_onchange_cb
  function do_ajax_terceros_mob_event_nombre1_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_nombre1_onchange_cb_after_alert

  // ---------- Event onchange nombre2
  function do_ajax_terceros_mob_event_nombre2_onchange()
  {
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_nombre2 = scAjaxGetFieldText("nombre2");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_nombre2_onchange(var_nombre1, var_nombre2, var_script_case_init, do_ajax_terceros_mob_event_nombre2_onchange_cb);
  } // do_ajax_terceros_mob_event_nombre2_onchange

  function do_ajax_terceros_mob_event_nombre2_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombre2";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_nombre2_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_nombre2_onchange_cb
  function do_ajax_terceros_mob_event_nombre2_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_nombre2_onchange_cb_after_alert

  // ---------- Event onchange nombre_comercil
  function do_ajax_terceros_mob_event_nombre_comercil_onchange()
  {
    var var_tipo = scAjaxGetFieldSelect("tipo");
    var var_nombres = scAjaxGetFieldHidden("nombres");
    var var_nombre_comercil = scAjaxGetFieldText("nombre_comercil");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_nombre_comercil_onchange(var_tipo, var_nombres, var_nombre_comercil, var_script_case_init, do_ajax_terceros_mob_event_nombre_comercil_onchange_cb);
  } // do_ajax_terceros_mob_event_nombre_comercil_onchange

  function do_ajax_terceros_mob_event_nombre_comercil_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombre_comercil";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_nombre_comercil_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_nombre_comercil_onchange_cb
  function do_ajax_terceros_mob_event_nombre_comercil_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_nombre_comercil_onchange_cb_after_alert

  // ---------- Event onblur nombres
  function do_ajax_terceros_mob_event_nombres_onblur()
  {
    var var_nombres = scAjaxGetFieldHidden("nombres");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_nombres_onblur(var_nombres, var_script_case_init, do_ajax_terceros_mob_event_nombres_onblur_cb);
  } // do_ajax_terceros_mob_event_nombres_onblur

  function do_ajax_terceros_mob_event_nombres_onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombres";
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
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
    scAjaxAlert(do_ajax_terceros_mob_event_nombres_onblur_cb_after_alert);
  } // do_ajax_terceros_mob_event_nombres_onblur_cb
  function do_ajax_terceros_mob_event_nombres_onblur_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_nombres_onblur_cb_after_alert

  // ---------- Event onfocus nombres
  function do_ajax_terceros_mob_event_nombres_onfocus()
  {
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_nombres = scAjaxGetFieldHidden("nombres");
    var var_nombre2 = scAjaxGetFieldText("nombre2");
    var var_apellido1 = scAjaxGetFieldText("apellido1");
    var var_apellido2 = scAjaxGetFieldText("apellido2");
    var var_tipo = scAjaxGetFieldSelect("tipo");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_terceros_mob_event_nombres_onfocus(var_nombre1, var_nombres, var_nombre2, var_apellido1, var_apellido2, var_tipo, var_script_case_init, do_ajax_terceros_mob_event_nombres_onfocus_cb);
  } // do_ajax_terceros_mob_event_nombres_onfocus

  function do_ajax_terceros_mob_event_nombres_onfocus_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombres";
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
    scAjaxAlert(do_ajax_terceros_mob_event_nombres_onfocus_cb_after_alert);
  } // do_ajax_terceros_mob_event_nombres_onfocus_cb
  function do_ajax_terceros_mob_event_nombres_onfocus_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_nombres_onfocus_cb_after_alert

  // ---------- Event onchange proveedor
  function do_ajax_terceros_mob_event_proveedor_onchange()
  {
    var var_proveedor = scAjaxGetFieldCheckbox("proveedor", ";");
    var var_autoretenedor = scAjaxGetFieldSelect("autoretenedor");
    var var_creditoprov = scAjaxGetFieldSelect("creditoprov");
    var var_dias = scAjaxGetFieldText("dias");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_proveedor_onchange(var_proveedor, var_autoretenedor, var_creditoprov, var_dias, var_script_case_init, do_ajax_terceros_mob_event_proveedor_onchange_cb);
  } // do_ajax_terceros_mob_event_proveedor_onchange

  function do_ajax_terceros_mob_event_proveedor_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "proveedor";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_proveedor_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_proveedor_onchange_cb
  function do_ajax_terceros_mob_event_proveedor_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_proveedor_onchange_cb_after_alert

  // ---------- Event onchange r_social
  function do_ajax_terceros_mob_event_r_social_onchange()
  {
    var var_tipo = scAjaxGetFieldSelect("tipo");
    var var_r_social = scAjaxGetFieldText("r_social");
    var var_nombre2 = scAjaxGetFieldText("nombre2");
    var var_apellido2 = scAjaxGetFieldText("apellido2");
    var var_nombres = scAjaxGetFieldHidden("nombres");
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_apellido1 = scAjaxGetFieldText("apellido1");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_r_social_onchange(var_tipo, var_r_social, var_nombre2, var_apellido2, var_nombres, var_nombre1, var_apellido1, var_script_case_init, do_ajax_terceros_mob_event_r_social_onchange_cb);
  } // do_ajax_terceros_mob_event_r_social_onchange

  function do_ajax_terceros_mob_event_r_social_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "r_social";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_r_social_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_r_social_onchange_cb
  function do_ajax_terceros_mob_event_r_social_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_r_social_onchange_cb_after_alert

  // ---------- Event onchange regimen
  function do_ajax_terceros_mob_event_regimen_onchange()
  {
    var var_regimen = scAjaxGetFieldSelect("regimen");
    var var_tipo_documento = scAjaxGetFieldSelect("tipo_documento");
    var var_dv = scAjaxGetFieldText("dv");
    var var_documento = scAjaxGetFieldText("documento");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_regimen_onchange(var_regimen, var_tipo_documento, var_dv, var_documento, var_script_case_init, do_ajax_terceros_mob_event_regimen_onchange_cb);
  } // do_ajax_terceros_mob_event_regimen_onchange

  function do_ajax_terceros_mob_event_regimen_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "regimen";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_regimen_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_regimen_onchange_cb
  function do_ajax_terceros_mob_event_regimen_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_regimen_onchange_cb_after_alert

  // ---------- Event onchange sucur_cliente
  function do_ajax_terceros_mob_event_sucur_cliente_onchange()
  {
    var var_idtercero = scAjaxGetFieldHidden("idtercero");
    var var_sucur_cliente = scAjaxGetFieldCheckbox("sucur_cliente", ";");
    var var_idmuni = scAjaxGetFieldSelect("idmuni");
    var var_direccion = scAjaxGetFieldText("direccion");
    var var_tel_cel = scAjaxGetFieldText("tel_cel");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_sucur_cliente_onchange(var_idtercero, var_sucur_cliente, var_idmuni, var_direccion, var_tel_cel, var_script_case_init, do_ajax_terceros_mob_event_sucur_cliente_onchange_cb);
  } // do_ajax_terceros_mob_event_sucur_cliente_onchange

  function do_ajax_terceros_mob_event_sucur_cliente_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "sucur_cliente";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_sucur_cliente_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_sucur_cliente_onchange_cb
  function do_ajax_terceros_mob_event_sucur_cliente_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_sucur_cliente_onchange_cb_after_alert

  // ---------- Event onchange tipo_documento
  function do_ajax_terceros_mob_event_tipo_documento_onchange()
  {
    var var_tipo_documento = scAjaxGetFieldSelect("tipo_documento");
    var var_dv = scAjaxGetFieldText("dv");
    var var_documento = scAjaxGetFieldText("documento");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_tipo_documento_onchange(var_tipo_documento, var_dv, var_documento, var_script_case_init, do_ajax_terceros_mob_event_tipo_documento_onchange_cb);
  } // do_ajax_terceros_mob_event_tipo_documento_onchange

  function do_ajax_terceros_mob_event_tipo_documento_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "tipo_documento";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_tipo_documento_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_tipo_documento_onchange_cb
  function do_ajax_terceros_mob_event_tipo_documento_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_tipo_documento_onchange_cb_after_alert

  // ---------- Event onchange tipo
  function do_ajax_terceros_mob_event_tipo_onchange()
  {
    var var_tipo = scAjaxGetFieldSelect("tipo");
    var var_regimen = scAjaxGetFieldSelect("regimen");
    var var_efec_retencion = scAjaxGetFieldSelect("efec_retencion");
    var var_tipo_documento = scAjaxGetFieldSelect("tipo_documento");
    var var_nombre_comercil = scAjaxGetFieldText("nombre_comercil");
    var var_representante = scAjaxGetFieldText("representante");
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_apellido1 = scAjaxGetFieldText("apellido1");
    var var_nombre2 = scAjaxGetFieldText("nombre2");
    var var_apellido2 = scAjaxGetFieldText("apellido2");
    var var_r_social = scAjaxGetFieldText("r_social");
    var var_documento = scAjaxGetFieldText("documento");
    var var_dv = scAjaxGetFieldText("dv");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_terceros_mob_event_tipo_onchange(var_tipo, var_regimen, var_efec_retencion, var_tipo_documento, var_nombre_comercil, var_representante, var_nombre1, var_apellido1, var_nombre2, var_apellido2, var_r_social, var_documento, var_dv, var_script_case_init, do_ajax_terceros_mob_event_tipo_onchange_cb);
  } // do_ajax_terceros_mob_event_tipo_onchange

  function do_ajax_terceros_mob_event_tipo_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "tipo";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
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
    scAjaxAlert(do_ajax_terceros_mob_event_tipo_onchange_cb_after_alert);
  } // do_ajax_terceros_mob_event_tipo_onchange_cb
  function do_ajax_terceros_mob_event_tipo_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_terceros_mob_event_tipo_onchange_cb_after_alert
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
  function do_ajax_terceros_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_terceros_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_tipo = scAjaxGetFieldSelect("tipo");
    var var_regimen = scAjaxGetFieldSelect("regimen");
    var var_tipo_documento = scAjaxGetFieldSelect("tipo_documento");
    var var_documento = scAjaxGetFieldText("documento");
    var var_dv = scAjaxGetFieldText("dv");
    var var_imagenter = scAjaxGetFieldText("imagenter");
    var var_codigo_tercero = scAjaxGetFieldText("codigo_tercero");
    var var_sexo = scAjaxGetFieldSelect("sexo");
    var var_notificar = scAjaxGetFieldCheckbox("notificar", ";");
    var var_nombre1 = scAjaxGetFieldText("nombre1");
    var var_nombre2 = scAjaxGetFieldText("nombre2");
    var var_apellido1 = scAjaxGetFieldText("apellido1");
    var var_apellido2 = scAjaxGetFieldText("apellido2");
    var var_tel_cel = scAjaxGetFieldText("tel_cel");
    var var_urlmail = scAjaxGetFieldText("urlmail");
    var var_idtercero = scAjaxGetFieldHidden("idtercero");
    var var_r_social = scAjaxGetFieldText("r_social");
    var var_nombres = scAjaxGetFieldHidden("nombres");
    var var_nombre_comercil = scAjaxGetFieldText("nombre_comercil");
    var var_representante = scAjaxGetFieldText("representante");
    var var_direccion = scAjaxGetFieldText("direccion");
    var var_departamento = scAjaxGetFieldSelect("departamento");
    var var_idmuni = scAjaxGetFieldSelect("idmuni");
    var var_ciudad = scAjaxGetFieldSelect("ciudad");
    var var_codigo_postal = scAjaxGetFieldSelect("codigo_postal");
    var var_observaciones = scAjaxGetFieldText("observaciones");
    var var_lenguaje = scAjaxGetFieldSelect("lenguaje");
    var var_c_postal = "";
    var var_correo_notificafe = scAjaxGetFieldText("correo_notificafe");
    var var_celular_notificafe = scAjaxGetFieldText("celular_notificafe");
    var var_cliente = scAjaxGetFieldCheckbox("cliente", ";");
    var var_proveedor = scAjaxGetFieldCheckbox("proveedor", ";");
    var var_empleado = scAjaxGetFieldCheckbox("empleado", ";");
    var var_es_tecnico = scAjaxGetFieldCheckbox("es_tecnico", ";");
    var var_activo = scAjaxGetFieldCheckbox("activo", ";");
    var var_credito = scAjaxGetFieldSelect("credito");
    var var_cupo = scAjaxGetFieldText("cupo");
    var var_cupodis = scAjaxGetFieldText("cupodis");
    var var_dias_credito = scAjaxGetFieldText("dias_credito");
    var var_dias_mora = scAjaxGetFieldText("dias_mora");
    var var_efec_retencion = scAjaxGetFieldSelect("efec_retencion");
    var var_listaprecios = scAjaxGetFieldSelect("listaprecios");
    var var_loatiende = scAjaxGetFieldSelect("loatiende");
    var var_autorizado = scAjaxGetFieldCheckbox("autorizado", ";");
    var var_relleno2 = scAjaxGetFieldHidden("relleno2");
    var var_nacimiento = scAjaxGetFieldText("nacimiento");
    var var_detalle_tributario = "";
    var var_responsabilidad_fiscal = "";
    var var_ciiu = "";
    var var_sucur_cliente = scAjaxGetFieldCheckbox("sucur_cliente", ";");
    var var_sucursales = "";
    var var_fechault = scAjaxGetFieldText("fechault");
    var var_saldo = scAjaxGetFieldText("saldo");
    var var_afiliacion = scAjaxGetFieldText("afiliacion");
    var var_es_cajero = scAjaxGetFieldCheckbox("es_cajero", ";");
    var var_cupo_vendedor = scAjaxGetFieldText("cupo_vendedor");
    var var_autoretenedor = scAjaxGetFieldSelect("autoretenedor");
    var var_creditoprov = scAjaxGetFieldSelect("creditoprov");
    var var_dias = scAjaxGetFieldText("dias");
    var var_url = scAjaxGetFieldText("url");
    var var_contacto = scAjaxGetFieldText("contacto");
    var var_telefonos_prov = scAjaxGetFieldText("telefonos_prov");
    var var_email = scAjaxGetFieldText("email");
    var var_fechultcomp = scAjaxGetFieldHidden("fechultcomp");
    var var_saldoapagar = scAjaxGetFieldHidden("saldoapagar");
    var var_codigo_ter = scAjaxGetFieldText("codigo_ter");
    var var_zona_clientes = scAjaxGetFieldSelect("zona_clientes");
    var var_clasificacion_clientes = scAjaxGetFieldSelect("clasificacion_clientes");
    var var_puc_auxiliar_deudores = scAjaxGetFieldText("puc_auxiliar_deudores");
    var var_puc_retefuente_ventas = scAjaxGetFieldText("puc_retefuente_ventas");
    var var_puc_retefuente_servicios_clie = scAjaxGetFieldText("puc_retefuente_servicios_clie");
    var var_puc_auxiliar_proveedores = scAjaxGetFieldText("puc_auxiliar_proveedores");
    var var_puc_retefuente_compras = scAjaxGetFieldText("puc_retefuente_compras");
    var var_puc_retefuente_servicios_prov = scAjaxGetFieldText("puc_retefuente_servicios_prov");
    var var_es_restaurante = scAjaxGetFieldCheckbox("es_restaurante", ";");
    var var_porcentaje_propina_sugerida = scAjaxGetFieldText("porcentaje_propina_sugerida");
    var var_imagenter_ul_name = scAjaxSpecCharProtect(document.F1.imagenter_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_imagenter_ul_type = document.F1.imagenter_ul_type.value;
    var var_imagenter_limpa = document.F1.imagenter_limpa.checked ? "S" : "N";
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_terceros_mob_submit_form(var_tipo, var_regimen, var_tipo_documento, var_documento, var_dv, var_imagenter, var_codigo_tercero, var_sexo, var_notificar, var_nombre1, var_nombre2, var_apellido1, var_apellido2, var_tel_cel, var_urlmail, var_idtercero, var_r_social, var_nombres, var_nombre_comercil, var_representante, var_direccion, var_departamento, var_idmuni, var_ciudad, var_codigo_postal, var_observaciones, var_lenguaje, var_c_postal, var_correo_notificafe, var_celular_notificafe, var_cliente, var_proveedor, var_empleado, var_es_tecnico, var_activo, var_credito, var_cupo, var_cupodis, var_dias_credito, var_dias_mora, var_efec_retencion, var_listaprecios, var_loatiende, var_autorizado, var_relleno2, var_nacimiento, var_detalle_tributario, var_responsabilidad_fiscal, var_ciiu, var_sucur_cliente, var_sucursales, var_fechault, var_saldo, var_afiliacion, var_es_cajero, var_cupo_vendedor, var_autoretenedor, var_creditoprov, var_dias, var_url, var_contacto, var_telefonos_prov, var_email, var_fechultcomp, var_saldoapagar, var_codigo_ter, var_zona_clientes, var_clasificacion_clientes, var_puc_auxiliar_deudores, var_puc_retefuente_ventas, var_puc_retefuente_servicios_clie, var_puc_auxiliar_proveedores, var_puc_retefuente_compras, var_puc_retefuente_servicios_prov, var_es_restaurante, var_porcentaje_propina_sugerida, var_imagenter_ul_name, var_imagenter_ul_type, var_imagenter_limpa, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_terceros_mob_submit_form_cb);
  } // do_ajax_terceros_mob_submit_form

  function do_ajax_terceros_mob_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
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
      scAjaxHideErrorDisplay("tipo");
      scAjaxHideErrorDisplay("regimen");
      scAjaxHideErrorDisplay("tipo_documento");
      scAjaxHideErrorDisplay("documento");
      scAjaxHideErrorDisplay("dv");
      scAjaxHideErrorDisplay("imagenter");
      scAjaxHideErrorDisplay("codigo_tercero");
      scAjaxHideErrorDisplay("sexo");
      scAjaxHideErrorDisplay("notificar");
      scAjaxHideErrorDisplay("nombre1");
      scAjaxHideErrorDisplay("nombre2");
      scAjaxHideErrorDisplay("apellido1");
      scAjaxHideErrorDisplay("apellido2");
      scAjaxHideErrorDisplay("tel_cel");
      scAjaxHideErrorDisplay("urlmail");
      scAjaxHideErrorDisplay("idtercero");
      scAjaxHideErrorDisplay("r_social");
      scAjaxHideErrorDisplay("nombres");
      scAjaxHideErrorDisplay("nombre_comercil");
      scAjaxHideErrorDisplay("representante");
      scAjaxHideErrorDisplay("direccion");
      scAjaxHideErrorDisplay("departamento");
      scAjaxHideErrorDisplay("idmuni");
      scAjaxHideErrorDisplay("ciudad");
      scAjaxHideErrorDisplay("codigo_postal");
      scAjaxHideErrorDisplay("observaciones");
      scAjaxHideErrorDisplay("lenguaje");
      scAjaxHideErrorDisplay("c_postal");
      scAjaxHideErrorDisplay("correo_notificafe");
      scAjaxHideErrorDisplay("celular_notificafe");
      scAjaxHideErrorDisplay("cliente");
      scAjaxHideErrorDisplay("proveedor");
      scAjaxHideErrorDisplay("empleado");
      scAjaxHideErrorDisplay("es_tecnico");
      scAjaxHideErrorDisplay("activo");
      scAjaxHideErrorDisplay("credito");
      scAjaxHideErrorDisplay("cupo");
      scAjaxHideErrorDisplay("cupodis");
      scAjaxHideErrorDisplay("dias_credito");
      scAjaxHideErrorDisplay("dias_mora");
      scAjaxHideErrorDisplay("efec_retencion");
      scAjaxHideErrorDisplay("listaprecios");
      scAjaxHideErrorDisplay("loatiende");
      scAjaxHideErrorDisplay("autorizado");
      scAjaxHideErrorDisplay("relleno2");
      scAjaxHideErrorDisplay("nacimiento");
      scAjaxHideErrorDisplay("detalle_tributario");
      scAjaxHideErrorDisplay("responsabilidad_fiscal");
      scAjaxHideErrorDisplay("ciiu");
      scAjaxHideErrorDisplay("sucur_cliente");
      scAjaxHideErrorDisplay("sucursales");
      scAjaxHideErrorDisplay("fechault");
      scAjaxHideErrorDisplay("saldo");
      scAjaxHideErrorDisplay("afiliacion");
      scAjaxHideErrorDisplay("es_cajero");
      scAjaxHideErrorDisplay("cupo_vendedor");
      scAjaxHideErrorDisplay("autoretenedor");
      scAjaxHideErrorDisplay("creditoprov");
      scAjaxHideErrorDisplay("dias");
      scAjaxHideErrorDisplay("url");
      scAjaxHideErrorDisplay("contacto");
      scAjaxHideErrorDisplay("telefonos_prov");
      scAjaxHideErrorDisplay("email");
      scAjaxHideErrorDisplay("fechultcomp");
      scAjaxHideErrorDisplay("saldoapagar");
      scAjaxHideErrorDisplay("codigo_ter");
      scAjaxHideErrorDisplay("zona_clientes");
      scAjaxHideErrorDisplay("clasificacion_clientes");
      scAjaxHideErrorDisplay("puc_auxiliar_deudores");
      scAjaxHideErrorDisplay("puc_retefuente_ventas");
      scAjaxHideErrorDisplay("puc_retefuente_servicios_clie");
      scAjaxHideErrorDisplay("puc_auxiliar_proveedores");
      scAjaxHideErrorDisplay("puc_retefuente_compras");
      scAjaxHideErrorDisplay("puc_retefuente_servicios_prov");
      scAjaxHideErrorDisplay("archivos");
      scAjaxHideErrorDisplay("es_restaurante");
      scAjaxHideErrorDisplay("porcentaje_propina_sugerida");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['parent_widget']; ?>']");
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
      if (document.F1.imagenter_limpa && document.F1.imagenter_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldImage("imagenter", oImgTemp, "", "", "", "N");
      }
    document.F1.imagenter_ul_name.value = '';
    document.F1.imagenter_ul_type.value = '';
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_terceros_mob_submit_form_cb_after_alert);
  } // do_ajax_terceros_mob_submit_form_cb
  function do_ajax_terceros_mob_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_terceros_mob_submit_form_cb_after_alert

  var scStatusDetail = {};
  scStatusDetail["grid_gestor_archivos_tercero"] = "off";

  function do_ajax_terceros_mob_navigate_form()
  {
    perform_ajax_terceros_mob_navigate_form();
  }

  function perform_ajax_terceros_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("tipo");
    scAjaxHideErrorDisplay("regimen");
    scAjaxHideErrorDisplay("tipo_documento");
    scAjaxHideErrorDisplay("documento");
    scAjaxHideErrorDisplay("dv");
    scAjaxHideErrorDisplay("imagenter");
    scAjaxHideErrorDisplay("codigo_tercero");
    scAjaxHideErrorDisplay("sexo");
    scAjaxHideErrorDisplay("notificar");
    scAjaxHideErrorDisplay("nombre1");
    scAjaxHideErrorDisplay("nombre2");
    scAjaxHideErrorDisplay("apellido1");
    scAjaxHideErrorDisplay("apellido2");
    scAjaxHideErrorDisplay("tel_cel");
    scAjaxHideErrorDisplay("urlmail");
    scAjaxHideErrorDisplay("idtercero");
    scAjaxHideErrorDisplay("r_social");
    scAjaxHideErrorDisplay("nombres");
    scAjaxHideErrorDisplay("nombre_comercil");
    scAjaxHideErrorDisplay("representante");
    scAjaxHideErrorDisplay("direccion");
    scAjaxHideErrorDisplay("departamento");
    scAjaxHideErrorDisplay("idmuni");
    scAjaxHideErrorDisplay("ciudad");
    scAjaxHideErrorDisplay("codigo_postal");
    scAjaxHideErrorDisplay("observaciones");
    scAjaxHideErrorDisplay("lenguaje");
    scAjaxHideErrorDisplay("c_postal");
    scAjaxHideErrorDisplay("correo_notificafe");
    scAjaxHideErrorDisplay("celular_notificafe");
    scAjaxHideErrorDisplay("cliente");
    scAjaxHideErrorDisplay("proveedor");
    scAjaxHideErrorDisplay("empleado");
    scAjaxHideErrorDisplay("es_tecnico");
    scAjaxHideErrorDisplay("activo");
    scAjaxHideErrorDisplay("credito");
    scAjaxHideErrorDisplay("cupo");
    scAjaxHideErrorDisplay("cupodis");
    scAjaxHideErrorDisplay("dias_credito");
    scAjaxHideErrorDisplay("dias_mora");
    scAjaxHideErrorDisplay("efec_retencion");
    scAjaxHideErrorDisplay("listaprecios");
    scAjaxHideErrorDisplay("loatiende");
    scAjaxHideErrorDisplay("autorizado");
    scAjaxHideErrorDisplay("relleno2");
    scAjaxHideErrorDisplay("nacimiento");
    scAjaxHideErrorDisplay("detalle_tributario");
    scAjaxHideErrorDisplay("responsabilidad_fiscal");
    scAjaxHideErrorDisplay("ciiu");
    scAjaxHideErrorDisplay("sucur_cliente");
    scAjaxHideErrorDisplay("sucursales");
    scAjaxHideErrorDisplay("fechault");
    scAjaxHideErrorDisplay("saldo");
    scAjaxHideErrorDisplay("afiliacion");
    scAjaxHideErrorDisplay("es_cajero");
    scAjaxHideErrorDisplay("cupo_vendedor");
    scAjaxHideErrorDisplay("autoretenedor");
    scAjaxHideErrorDisplay("creditoprov");
    scAjaxHideErrorDisplay("dias");
    scAjaxHideErrorDisplay("url");
    scAjaxHideErrorDisplay("contacto");
    scAjaxHideErrorDisplay("telefonos_prov");
    scAjaxHideErrorDisplay("email");
    scAjaxHideErrorDisplay("fechultcomp");
    scAjaxHideErrorDisplay("saldoapagar");
    scAjaxHideErrorDisplay("codigo_ter");
    scAjaxHideErrorDisplay("zona_clientes");
    scAjaxHideErrorDisplay("clasificacion_clientes");
    scAjaxHideErrorDisplay("puc_auxiliar_deudores");
    scAjaxHideErrorDisplay("puc_retefuente_ventas");
    scAjaxHideErrorDisplay("puc_retefuente_servicios_clie");
    scAjaxHideErrorDisplay("puc_auxiliar_proveedores");
    scAjaxHideErrorDisplay("puc_retefuente_compras");
    scAjaxHideErrorDisplay("puc_retefuente_servicios_prov");
    scAjaxHideErrorDisplay("archivos");
    scAjaxHideErrorDisplay("es_restaurante");
    scAjaxHideErrorDisplay("porcentaje_propina_sugerida");
    var var_idtercero = document.F2.idtercero.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    scStatusDetail["grid_gestor_archivos_tercero"] = "on";
    x_ajax_terceros_mob_navigate_form(var_idtercero, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_terceros_mob_navigate_form_cb);
  } // do_ajax_terceros_mob_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_terceros_mob_navigate_form_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if ("ERROR" == oResp.result)
    {
        scAjaxShowErrorDisplay("table", oResp.errList[0].msgText);
        scAjaxProcOff();
        return;
    }
    else if (oResp["navSummary"].reg_tot == 0)
    {
       scAjax_displayEmptyForm();
    }
    scAjaxClearErrors()
    scResetFormChanges()
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    document.F2.idtercero.value = scAjaxGetKeyValue("idtercero");
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    if (scMasterDetailIframe && scMasterDetailIframe["nmsc_iframe_liga_grid_gestor_archivos_tercero"] && "nmsc_iframe_liga_grid_gestor_archivos_tercero" != scMasterDetailIframe["nmsc_iframe_liga_grid_gestor_archivos_tercero"]) {
        scMoveMasterDetail(scMasterDetailIframe["nmsc_iframe_liga_grid_gestor_archivos_tercero"]);
    }
    else {
        if (oResp["navSummary"].reg_tot != 0) {
            document.getElementById('nmsc_iframe_liga_grid_gestor_archivos_tercero').contentWindow.nm_move('apl_detalhe', true, '500');
        }
    }
    document.F1.imagenter_ul_name.value = '';
    document.F1.imagenter_ul_type.value = '';
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_terceros_mob_navigate_form_cb_after_alert);
  } // do_ajax_terceros_mob_navigate_form_cb
  function do_ajax_terceros_mob_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scFocusField('tipo_documento');

    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_terceros_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    scAjaxProcOff();
  } // do_ajax_terceros_mob_navigate_form_cb_after_alert
  function sc_hide_terceros_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_terceros_mob_form


  function do_ajax_terceros_mob_lkpedt_refresh_zona_clientes()
  {
    var var_zona_clientes = scAjaxGetFieldSelect("zona_clientes");
    var var_script_case_init = document.F1.script_case_init.value;
    var nmgp_refresh_fields = "zona_clientes";
    x_ajax_terceros_mob_lkpedt_refresh_zona_clientes(var_zona_clientes, nmgp_refresh_fields, var_script_case_init, do_ajax_terceros_mob_lkpedt_refresh_zona_clientes_cb);
  } // do_ajax_terceros_mob_lkpedt_refresh_zona_clientes

  function do_ajax_terceros_mob_lkpedt_refresh_zona_clientes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    scAjaxSetFields(false);
    scAjaxSetVariables();
  } // do_ajax_terceros_mob_lkpedt_refresh_zona_clientes_cb

  function do_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes()
  {
    var var_clasificacion_clientes = scAjaxGetFieldSelect("clasificacion_clientes");
    var var_script_case_init = document.F1.script_case_init.value;
    var nmgp_refresh_fields = "clasificacion_clientes";
    x_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes(var_clasificacion_clientes, nmgp_refresh_fields, var_script_case_init, do_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes_cb);
  } // do_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes

  function do_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    scAjaxSetFields(false);
    scAjaxSetVariables();
  } // do_ajax_terceros_mob_lkpedt_refresh_clasificacion_clientes_cb

  function scAjaxDetailStatus(sDetailApp)
  {
    if (scStatusDetail[sDetailApp])
    {
      scStatusDetail[sDetailApp] = "off";
      if (document.getElementById("nmsc_iframe_liga_" + sDetailApp)) {
        document.getElementById("nmsc_iframe_liga_" + sDetailApp).style.display = "";
      }
    }
    else
    {
      mobileSuffix = sDetailApp.slice(-4);
      if ("_mob" != mobileSuffix && scStatusDetail[sDetailApp + "_mob"])
      {
        scStatusDetail[sDetailApp + "_mob"] = "off";
        if (document.getElementById("nmsc_iframe_liga_" + sDetailApp + "_mob")) {
          document.getElementById("nmsc_iframe_liga_" + sDetailApp + "_mob").style.display = "";
        }
      }
    }
    if (scAjaxDetailProc())
    {
      scAjaxProcOff();
    }
  } // scAjaxDetailStatus

  function scAjaxDetailHeight(sDetailApp, iDetailHeight)
  {
    $("#nmsc_iframe_liga_" + sDetailApp).css("height", iDetailHeight + "px");
    $("#nmsc_iframe_liga_" + sDetailApp + "_mob").css("height", iDetailHeight + "px");
  } // scAjaxDetailHeight

  function scAjaxDetailProc()
  {
    if ("off" == scStatusDetail["grid_gestor_archivos_tercero"])
    {
      return true;
    }
    return false;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "tipo";
  ajax_field_list[1] = "regimen";
  ajax_field_list[2] = "tipo_documento";
  ajax_field_list[3] = "documento";
  ajax_field_list[4] = "dv";
  ajax_field_list[5] = "imagenter";
  ajax_field_list[6] = "codigo_tercero";
  ajax_field_list[7] = "sexo";
  ajax_field_list[8] = "notificar";
  ajax_field_list[9] = "nombre1";
  ajax_field_list[10] = "nombre2";
  ajax_field_list[11] = "apellido1";
  ajax_field_list[12] = "apellido2";
  ajax_field_list[13] = "tel_cel";
  ajax_field_list[14] = "urlmail";
  ajax_field_list[15] = "idtercero";
  ajax_field_list[16] = "r_social";
  ajax_field_list[17] = "nombres";
  ajax_field_list[18] = "nombre_comercil";
  ajax_field_list[19] = "representante";
  ajax_field_list[20] = "direccion";
  ajax_field_list[21] = "departamento";
  ajax_field_list[22] = "idmuni";
  ajax_field_list[23] = "ciudad";
  ajax_field_list[24] = "codigo_postal";
  ajax_field_list[25] = "observaciones";
  ajax_field_list[26] = "lenguaje";
  ajax_field_list[27] = "c_postal";
  ajax_field_list[28] = "correo_notificafe";
  ajax_field_list[29] = "celular_notificafe";
  ajax_field_list[30] = "cliente";
  ajax_field_list[31] = "proveedor";
  ajax_field_list[32] = "empleado";
  ajax_field_list[33] = "es_tecnico";
  ajax_field_list[34] = "activo";
  ajax_field_list[35] = "credito";
  ajax_field_list[36] = "cupo";
  ajax_field_list[37] = "cupodis";
  ajax_field_list[38] = "dias_credito";
  ajax_field_list[39] = "dias_mora";
  ajax_field_list[40] = "efec_retencion";
  ajax_field_list[41] = "listaprecios";
  ajax_field_list[42] = "loatiende";
  ajax_field_list[43] = "autorizado";
  ajax_field_list[44] = "relleno2";
  ajax_field_list[45] = "nacimiento";
  ajax_field_list[46] = "detalle_tributario";
  ajax_field_list[47] = "responsabilidad_fiscal";
  ajax_field_list[48] = "ciiu";
  ajax_field_list[49] = "sucur_cliente";
  ajax_field_list[50] = "sucursales";
  ajax_field_list[51] = "fechault";
  ajax_field_list[52] = "saldo";
  ajax_field_list[53] = "afiliacion";
  ajax_field_list[54] = "es_cajero";
  ajax_field_list[55] = "cupo_vendedor";
  ajax_field_list[56] = "autoretenedor";
  ajax_field_list[57] = "creditoprov";
  ajax_field_list[58] = "dias";
  ajax_field_list[59] = "url";
  ajax_field_list[60] = "contacto";
  ajax_field_list[61] = "telefonos_prov";
  ajax_field_list[62] = "email";
  ajax_field_list[63] = "fechultcomp";
  ajax_field_list[64] = "saldoapagar";
  ajax_field_list[65] = "codigo_ter";
  ajax_field_list[66] = "zona_clientes";
  ajax_field_list[67] = "clasificacion_clientes";
  ajax_field_list[68] = "puc_auxiliar_deudores";
  ajax_field_list[69] = "puc_retefuente_ventas";
  ajax_field_list[70] = "puc_retefuente_servicios_clie";
  ajax_field_list[71] = "puc_auxiliar_proveedores";
  ajax_field_list[72] = "puc_retefuente_compras";
  ajax_field_list[73] = "puc_retefuente_servicios_prov";
  ajax_field_list[74] = "archivos";
  ajax_field_list[75] = "es_restaurante";
  ajax_field_list[76] = "porcentaje_propina_sugerida";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";
  ajax_block_list[1] = "1";
  ajax_block_list[2] = "2";
  ajax_block_list[3] = "3";
  ajax_block_list[4] = "4";
  ajax_block_list[5] = "5";
  ajax_block_list[6] = "6";
  ajax_block_list[7] = "7";
  ajax_block_list[8] = "8";
  ajax_block_list[9] = "9";
  ajax_block_list[10] = "10";
  ajax_block_list[11] = "11";
  ajax_block_list[12] = "12";
  ajax_block_list[13] = "13";
  ajax_block_list[14] = "14";
  ajax_block_list[15] = "15";
  ajax_block_list[16] = "16";
  ajax_block_list[17] = "17";
  ajax_block_list[18] = "18";
  ajax_block_list[19] = "19";
  ajax_block_list[20] = "20";

  var ajax_error_list = {
    "tipo": {"label": "Tipo persona", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "regimen": {"label": "Régimen", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_documento": {"label": "Tipo Documento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "documento": {"label": "No Documento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dv": {"label": "DV", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "imagenter": {"label": "Foto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codigo_tercero": {"label": "Código Tercero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sexo": {"label": "Género", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "notificar": {"label": "Notificar **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre1": {"label": "Primer Nombre **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre2": {"label": "Otros Nombres", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apellido1": {"label": "Primer Apellido **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apellido2": {"label": "Segundo Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tel_cel": {"label": "Teléfono o celular", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "urlmail": {"label": "email **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idtercero": {"label": "Idtercero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "r_social": {"label": "Razón Social", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombres": {"label": "Nombres o Razón Social", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_comercil": {"label": "Nombre Comercial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "representante": {"label": "Representante Legal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion": {"label": "Dirección", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "departamento": {"label": "Departamento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idmuni": {"label": "Municipio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciudad": {"label": "Ciudad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codigo_postal": {"label": "Código Postal **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "observaciones": {"label": "Observaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "lenguaje": {"label": "Lenguaje **", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c_postal": {"label": "Buscar CP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_notificafe": {"label": "Correo Notificación", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular_notificafe": {"label": "Celular Notificación", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cliente": {"label": "Cliente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "proveedor": {"label": "Proveedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "empleado": {"label": "Empleado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "es_tecnico": {"label": "Técnico", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "activo": {"label": "Activo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "credito": {"label": "Credito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cupo": {"label": "Cupo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cupodis": {"label": "Cupo disponible", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dias_credito": {"label": "Dias Crédito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dias_mora": {"label": "Dias Mora", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "efec_retencion": {"label": "Practica Retención", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "listaprecios": {"label": "Aplica Lista de Precios", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "loatiende": {"label": "Vendedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "autorizado": {"label": "Autorizar Ventas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "relleno2": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nacimiento": {"label": "Cumpleaños", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "detalle_tributario": {"label": "DETALLE TRIBUTARIO", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "responsabilidad_fiscal": {"label": "RESPONSABILIDADES FISCALES", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciiu": {"label": "ACTIVIDAD ECONÓMICA (CIIU)", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sucur_cliente": {"label": "Sucursales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sucursales": {"label": "Ingresar/Editar", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fechault": {"label": "Fecha de última compra", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "saldo": {"label": "Saldo pendiente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "afiliacion": {"label": "Cliente desde", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "es_cajero": {"label": "Es Cajero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cupo_vendedor": {"label": "Cupo Vendedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "autoretenedor": {"label": "Autoretenedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "creditoprov": {"label": "Otorga Crédito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dias": {"label": "Días del crédito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "url": {"label": "Url", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto": {"label": "Persona de Contacto o vendedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefonos_prov": {"label": "Número de Tel.", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fechultcomp": {"label": "Última Compra", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "saldoapagar": {"label": "Saldo a pagar", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codigo_ter": {"label": "Código TNS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "zona_clientes": {"label": "Zona Tercero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "clasificacion_clientes": {"label": "Clasificacion Tercero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_auxiliar_deudores": {"label": "PUC Auxiliar Deudores", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_retefuente_ventas": {"label": "PUC Retefuente Ventas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_retefuente_servicios_clie": {"label": "PUC Retefuente Servicios Clie", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_auxiliar_proveedores": {"label": "PUC Auxiliar Proveedores", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_retefuente_compras": {"label": "PUC Retefuente Compras", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "puc_retefuente_servicios_prov": {"label": "PUC Retefuente Servicios Prov", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "archivos": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "es_restaurante": {"label": "Utilizar en Restaurante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcentaje_propina_sugerida": {"label": "% Propina Sugerida", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0",
    "1": "hidden_bloco_1",
    "2": "hidden_bloco_2",
    "3": "hidden_bloco_3",
    "4": "hidden_bloco_4",
    "5": "hidden_bloco_5",
    "6": "hidden_bloco_6",
    "7": "hidden_bloco_7",
    "8": "hidden_bloco_8",
    "9": "hidden_bloco_9",
    "10": "hidden_bloco_10",
    "11": "hidden_bloco_11",
    "12": "hidden_bloco_12",
    "13": "hidden_bloco_13",
    "14": "hidden_bloco_14",
    "15": "hidden_bloco_15",
    "16": "hidden_bloco_16",
    "17": "hidden_bloco_17",
    "18": "hidden_bloco_18",
    "19": "hidden_bloco_19",
    "20": "hidden_bloco_20"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": "",
    "hidden_bloco_1": "",
    "hidden_bloco_2": "",
    "hidden_bloco_3": "",
    "hidden_bloco_4": "",
    "hidden_bloco_5": "",
    "hidden_bloco_6": "",
    "hidden_bloco_7": "",
    "hidden_bloco_8": "",
    "hidden_bloco_9": "",
    "hidden_bloco_10": "",
    "hidden_bloco_11": "",
    "hidden_bloco_12": "",
    "hidden_bloco_13": "",
    "hidden_bloco_14": "",
    "hidden_bloco_15": "",
    "hidden_bloco_16": "",
    "hidden_bloco_17": "",
    "hidden_bloco_18": "",
    "hidden_bloco_19": "",
    "hidden_bloco_20": ""
  };

  var ajax_field_mult = {
    "tipo": new Array(),
    "regimen": new Array(),
    "tipo_documento": new Array(),
    "documento": new Array(),
    "dv": new Array(),
    "imagenter": new Array(),
    "codigo_tercero": new Array(),
    "sexo": new Array(),
    "notificar": new Array(),
    "nombre1": new Array(),
    "nombre2": new Array(),
    "apellido1": new Array(),
    "apellido2": new Array(),
    "tel_cel": new Array(),
    "urlmail": new Array(),
    "idtercero": new Array(),
    "r_social": new Array(),
    "nombres": new Array(),
    "nombre_comercil": new Array(),
    "representante": new Array(),
    "direccion": new Array(),
    "departamento": new Array(),
    "idmuni": new Array(),
    "ciudad": new Array(),
    "codigo_postal": new Array(),
    "observaciones": new Array(),
    "lenguaje": new Array(),
    "c_postal": new Array(),
    "correo_notificafe": new Array(),
    "celular_notificafe": new Array(),
    "cliente": new Array(),
    "proveedor": new Array(),
    "empleado": new Array(),
    "es_tecnico": new Array(),
    "activo": new Array(),
    "credito": new Array(),
    "cupo": new Array(),
    "cupodis": new Array(),
    "dias_credito": new Array(),
    "dias_mora": new Array(),
    "efec_retencion": new Array(),
    "listaprecios": new Array(),
    "loatiende": new Array(),
    "autorizado": new Array(),
    "relleno2": new Array(),
    "nacimiento": new Array(),
    "detalle_tributario": new Array(),
    "responsabilidad_fiscal": new Array(),
    "ciiu": new Array(),
    "sucur_cliente": new Array(),
    "sucursales": new Array(),
    "fechault": new Array(),
    "saldo": new Array(),
    "afiliacion": new Array(),
    "es_cajero": new Array(),
    "cupo_vendedor": new Array(),
    "autoretenedor": new Array(),
    "creditoprov": new Array(),
    "dias": new Array(),
    "url": new Array(),
    "contacto": new Array(),
    "telefonos_prov": new Array(),
    "email": new Array(),
    "fechultcomp": new Array(),
    "saldoapagar": new Array(),
    "codigo_ter": new Array(),
    "zona_clientes": new Array(),
    "clasificacion_clientes": new Array(),
    "puc_auxiliar_deudores": new Array(),
    "puc_retefuente_ventas": new Array(),
    "puc_retefuente_servicios_clie": new Array(),
    "puc_auxiliar_proveedores": new Array(),
    "puc_retefuente_compras": new Array(),
    "puc_retefuente_servicios_prov": new Array(),
    "archivos": new Array(),
    "es_restaurante": new Array(),
    "porcentaje_propina_sugerida": new Array()
  };
  ajax_field_mult["tipo"][1] = "tipo";
  ajax_field_mult["regimen"][1] = "regimen";
  ajax_field_mult["tipo_documento"][1] = "tipo_documento";
  ajax_field_mult["documento"][1] = "documento";
  ajax_field_mult["dv"][1] = "dv";
  ajax_field_mult["imagenter"][1] = "imagenter";
  ajax_field_mult["codigo_tercero"][1] = "codigo_tercero";
  ajax_field_mult["sexo"][1] = "sexo";
  ajax_field_mult["notificar"][1] = "notificar";
  ajax_field_mult["nombre1"][1] = "nombre1";
  ajax_field_mult["nombre2"][1] = "nombre2";
  ajax_field_mult["apellido1"][1] = "apellido1";
  ajax_field_mult["apellido2"][1] = "apellido2";
  ajax_field_mult["tel_cel"][1] = "tel_cel";
  ajax_field_mult["urlmail"][1] = "urlmail";
  ajax_field_mult["idtercero"][1] = "idtercero";
  ajax_field_mult["r_social"][1] = "r_social";
  ajax_field_mult["nombres"][1] = "nombres";
  ajax_field_mult["nombre_comercil"][1] = "nombre_comercil";
  ajax_field_mult["representante"][1] = "representante";
  ajax_field_mult["direccion"][1] = "direccion";
  ajax_field_mult["departamento"][1] = "departamento";
  ajax_field_mult["idmuni"][1] = "idmuni";
  ajax_field_mult["ciudad"][1] = "ciudad";
  ajax_field_mult["codigo_postal"][1] = "codigo_postal";
  ajax_field_mult["observaciones"][1] = "observaciones";
  ajax_field_mult["lenguaje"][1] = "lenguaje";
  ajax_field_mult["c_postal"][1] = "c_postal";
  ajax_field_mult["correo_notificafe"][1] = "correo_notificafe";
  ajax_field_mult["celular_notificafe"][1] = "celular_notificafe";
  ajax_field_mult["cliente"][1] = "cliente";
  ajax_field_mult["proveedor"][1] = "proveedor";
  ajax_field_mult["empleado"][1] = "empleado";
  ajax_field_mult["es_tecnico"][1] = "es_tecnico";
  ajax_field_mult["activo"][1] = "activo";
  ajax_field_mult["credito"][1] = "credito";
  ajax_field_mult["cupo"][1] = "cupo";
  ajax_field_mult["cupodis"][1] = "cupodis";
  ajax_field_mult["dias_credito"][1] = "dias_credito";
  ajax_field_mult["dias_mora"][1] = "dias_mora";
  ajax_field_mult["efec_retencion"][1] = "efec_retencion";
  ajax_field_mult["listaprecios"][1] = "listaprecios";
  ajax_field_mult["loatiende"][1] = "loatiende";
  ajax_field_mult["autorizado"][1] = "autorizado";
  ajax_field_mult["relleno2"][1] = "relleno2";
  ajax_field_mult["nacimiento"][1] = "nacimiento";
  ajax_field_mult["detalle_tributario"][1] = "detalle_tributario";
  ajax_field_mult["responsabilidad_fiscal"][1] = "responsabilidad_fiscal";
  ajax_field_mult["ciiu"][1] = "ciiu";
  ajax_field_mult["sucur_cliente"][1] = "sucur_cliente";
  ajax_field_mult["sucursales"][1] = "sucursales";
  ajax_field_mult["fechault"][1] = "fechault";
  ajax_field_mult["saldo"][1] = "saldo";
  ajax_field_mult["afiliacion"][1] = "afiliacion";
  ajax_field_mult["es_cajero"][1] = "es_cajero";
  ajax_field_mult["cupo_vendedor"][1] = "cupo_vendedor";
  ajax_field_mult["autoretenedor"][1] = "autoretenedor";
  ajax_field_mult["creditoprov"][1] = "creditoprov";
  ajax_field_mult["dias"][1] = "dias";
  ajax_field_mult["url"][1] = "url";
  ajax_field_mult["contacto"][1] = "contacto";
  ajax_field_mult["telefonos_prov"][1] = "telefonos_prov";
  ajax_field_mult["email"][1] = "email";
  ajax_field_mult["fechultcomp"][1] = "fechultcomp";
  ajax_field_mult["saldoapagar"][1] = "saldoapagar";
  ajax_field_mult["codigo_ter"][1] = "codigo_ter";
  ajax_field_mult["zona_clientes"][1] = "zona_clientes";
  ajax_field_mult["clasificacion_clientes"][1] = "clasificacion_clientes";
  ajax_field_mult["puc_auxiliar_deudores"][1] = "puc_auxiliar_deudores";
  ajax_field_mult["puc_retefuente_ventas"][1] = "puc_retefuente_ventas";
  ajax_field_mult["puc_retefuente_servicios_clie"][1] = "puc_retefuente_servicios_clie";
  ajax_field_mult["puc_auxiliar_proveedores"][1] = "puc_auxiliar_proveedores";
  ajax_field_mult["puc_retefuente_compras"][1] = "puc_retefuente_compras";
  ajax_field_mult["puc_retefuente_servicios_prov"][1] = "puc_retefuente_servicios_prov";
  ajax_field_mult["archivos"][1] = "archivos";
  ajax_field_mult["es_restaurante"][1] = "es_restaurante";
  ajax_field_mult["porcentaje_propina_sugerida"][1] = "porcentaje_propina_sugerida";

  var ajax_field_id = {
    "tipo": new Array("hidden_field_label_tipo", "hidden_field_data_tipo"),
    "regimen": new Array("hidden_field_label_regimen", "hidden_field_data_regimen"),
    "tipo_documento": new Array("hidden_field_label_tipo_documento", "hidden_field_data_tipo_documento"),
    "documento": new Array("hidden_field_label_documento", "hidden_field_data_documento"),
    "dv": new Array("hidden_field_label_dv", "hidden_field_data_dv"),
    "imagenter": new Array("hidden_field_label_imagenter", "hidden_field_data_imagenter"),
    "codigo_tercero": new Array("hidden_field_label_codigo_tercero", "hidden_field_data_codigo_tercero"),
    "sexo": new Array("hidden_field_label_sexo", "hidden_field_data_sexo"),
    "notificar": new Array("hidden_field_label_notificar", "hidden_field_data_notificar"),
    "nombre1": new Array("hidden_field_label_nombre1", "hidden_field_data_nombre1"),
    "nombre2": new Array("hidden_field_label_nombre2", "hidden_field_data_nombre2"),
    "apellido1": new Array("hidden_field_label_apellido1", "hidden_field_data_apellido1"),
    "apellido2": new Array("hidden_field_label_apellido2", "hidden_field_data_apellido2"),
    "tel_cel": new Array("hidden_field_label_tel_cel", "hidden_field_data_tel_cel"),
    "urlmail": new Array("hidden_field_label_urlmail", "hidden_field_data_urlmail"),
    "r_social": new Array("hidden_field_label_r_social", "hidden_field_data_r_social"),
    "nombres": new Array("hidden_field_label_nombres", "hidden_field_data_nombres"),
    "nombre_comercil": new Array("hidden_field_label_nombre_comercil", "hidden_field_data_nombre_comercil"),
    "representante": new Array("hidden_field_label_representante", "hidden_field_data_representante"),
    "direccion": new Array("hidden_field_label_direccion", "hidden_field_data_direccion"),
    "departamento": new Array("hidden_field_label_departamento", "hidden_field_data_departamento"),
    "idmuni": new Array("hidden_field_label_idmuni", "hidden_field_data_idmuni"),
    "ciudad": new Array("hidden_field_label_ciudad", "hidden_field_data_ciudad"),
    "codigo_postal": new Array("hidden_field_label_codigo_postal", "hidden_field_data_codigo_postal"),
    "observaciones": new Array("hidden_field_label_observaciones", "hidden_field_data_observaciones"),
    "lenguaje": new Array("hidden_field_label_lenguaje", "hidden_field_data_lenguaje"),
    "c_postal": new Array("hidden_field_label_c_postal", "hidden_field_data_c_postal"),
    "correo_notificafe": new Array("hidden_field_label_correo_notificafe", "hidden_field_data_correo_notificafe"),
    "celular_notificafe": new Array("hidden_field_label_celular_notificafe", "hidden_field_data_celular_notificafe"),
    "cliente": new Array("hidden_field_label_cliente", "hidden_field_data_cliente"),
    "proveedor": new Array("hidden_field_label_proveedor", "hidden_field_data_proveedor"),
    "empleado": new Array("hidden_field_label_empleado", "hidden_field_data_empleado"),
    "es_tecnico": new Array("hidden_field_label_es_tecnico", "hidden_field_data_es_tecnico"),
    "activo": new Array("hidden_field_label_activo", "hidden_field_data_activo"),
    "credito": new Array("hidden_field_label_credito", "hidden_field_data_credito"),
    "cupo": new Array("hidden_field_label_cupo", "hidden_field_data_cupo"),
    "cupodis": new Array("hidden_field_label_cupodis", "hidden_field_data_cupodis"),
    "dias_credito": new Array("hidden_field_label_dias_credito", "hidden_field_data_dias_credito"),
    "dias_mora": new Array("hidden_field_label_dias_mora", "hidden_field_data_dias_mora"),
    "efec_retencion": new Array("hidden_field_label_efec_retencion", "hidden_field_data_efec_retencion"),
    "listaprecios": new Array("hidden_field_label_listaprecios", "hidden_field_data_listaprecios"),
    "loatiende": new Array("hidden_field_label_loatiende", "hidden_field_data_loatiende"),
    "autorizado": new Array("hidden_field_label_autorizado", "hidden_field_data_autorizado"),
    "nacimiento": new Array("hidden_field_label_nacimiento", "hidden_field_data_nacimiento"),
    "detalle_tributario": new Array("hidden_field_label_detalle_tributario", "hidden_field_data_detalle_tributario"),
    "responsabilidad_fiscal": new Array("hidden_field_label_responsabilidad_fiscal", "hidden_field_data_responsabilidad_fiscal"),
    "ciiu": new Array("hidden_field_label_ciiu", "hidden_field_data_ciiu"),
    "sucur_cliente": new Array("hidden_field_label_sucur_cliente", "hidden_field_data_sucur_cliente"),
    "sucursales": new Array("hidden_field_label_sucursales", "hidden_field_data_sucursales"),
    "fechault": new Array("hidden_field_label_fechault", "hidden_field_data_fechault"),
    "saldo": new Array("hidden_field_label_saldo", "hidden_field_data_saldo"),
    "afiliacion": new Array("hidden_field_label_afiliacion", "hidden_field_data_afiliacion"),
    "es_cajero": new Array("hidden_field_label_es_cajero", "hidden_field_data_es_cajero"),
    "cupo_vendedor": new Array("hidden_field_label_cupo_vendedor", "hidden_field_data_cupo_vendedor"),
    "autoretenedor": new Array("hidden_field_label_autoretenedor", "hidden_field_data_autoretenedor"),
    "creditoprov": new Array("hidden_field_label_creditoprov", "hidden_field_data_creditoprov"),
    "dias": new Array("hidden_field_label_dias", "hidden_field_data_dias"),
    "url": new Array("hidden_field_label_url", "hidden_field_data_url"),
    "contacto": new Array("hidden_field_label_contacto", "hidden_field_data_contacto"),
    "telefonos_prov": new Array("hidden_field_label_telefonos_prov", "hidden_field_data_telefonos_prov"),
    "email": new Array("hidden_field_label_email", "hidden_field_data_email"),
    "fechultcomp": new Array("hidden_field_label_fechultcomp", "hidden_field_data_fechultcomp"),
    "saldoapagar": new Array("hidden_field_label_saldoapagar", "hidden_field_data_saldoapagar"),
    "codigo_ter": new Array("hidden_field_label_codigo_ter", "hidden_field_data_codigo_ter"),
    "zona_clientes": new Array("hidden_field_label_zona_clientes", "hidden_field_data_zona_clientes"),
    "clasificacion_clientes": new Array("hidden_field_label_clasificacion_clientes", "hidden_field_data_clasificacion_clientes"),
    "puc_auxiliar_deudores": new Array("hidden_field_label_puc_auxiliar_deudores", "hidden_field_data_puc_auxiliar_deudores"),
    "puc_retefuente_ventas": new Array("hidden_field_label_puc_retefuente_ventas", "hidden_field_data_puc_retefuente_ventas"),
    "puc_retefuente_servicios_clie": new Array("hidden_field_label_puc_retefuente_servicios_clie", "hidden_field_data_puc_retefuente_servicios_clie"),
    "puc_auxiliar_proveedores": new Array("hidden_field_label_puc_auxiliar_proveedores", "hidden_field_data_puc_auxiliar_proveedores"),
    "puc_retefuente_compras": new Array("hidden_field_label_puc_retefuente_compras", "hidden_field_data_puc_retefuente_compras"),
    "puc_retefuente_servicios_prov": new Array("hidden_field_label_puc_retefuente_servicios_prov", "hidden_field_data_puc_retefuente_servicios_prov"),
    "archivos": new Array("hidden_field_label_archivos", "hidden_field_data_archivos"),
    "es_restaurante": new Array("hidden_field_label_es_restaurante", "hidden_field_data_es_restaurante"),
    "porcentaje_propina_sugerida": new Array("hidden_field_label_porcentaje_propina_sugerida", "hidden_field_data_porcentaje_propina_sugerida")
  };

  var ajax_read_only = {
    "tipo": "off",
    "regimen": "off",
    "tipo_documento": "off",
    "documento": "off",
    "dv": "off",
    "imagenter": "off",
    "codigo_tercero": "off",
    "sexo": "off",
    "notificar": "off",
    "nombre1": "off",
    "nombre2": "off",
    "apellido1": "off",
    "apellido2": "off",
    "tel_cel": "off",
    "urlmail": "off",
    "idtercero": "on",
    "r_social": "off",
    "nombres": "off",
    "nombre_comercil": "off",
    "representante": "off",
    "direccion": "off",
    "departamento": "off",
    "idmuni": "off",
    "ciudad": "off",
    "codigo_postal": "off",
    "observaciones": "off",
    "lenguaje": "off",
    "c_postal": "off",
    "correo_notificafe": "off",
    "celular_notificafe": "off",
    "cliente": "off",
    "proveedor": "off",
    "empleado": "off",
    "es_tecnico": "off",
    "activo": "off",
    "credito": "off",
    "cupo": "off",
    "cupodis": "off",
    "dias_credito": "off",
    "dias_mora": "off",
    "efec_retencion": "off",
    "listaprecios": "off",
    "loatiende": "off",
    "autorizado": "off",
    "relleno2": "off",
    "nacimiento": "off",
    "detalle_tributario": "off",
    "responsabilidad_fiscal": "off",
    "ciiu": "off",
    "sucur_cliente": "off",
    "sucursales": "off",
    "fechault": "on",
    "saldo": "on",
    "afiliacion": "off",
    "es_cajero": "off",
    "cupo_vendedor": "off",
    "autoretenedor": "off",
    "creditoprov": "off",
    "dias": "off",
    "url": "off",
    "contacto": "off",
    "telefonos_prov": "off",
    "email": "off",
    "fechultcomp": "off",
    "saldoapagar": "off",
    "codigo_ter": "off",
    "zona_clientes": "off",
    "clasificacion_clientes": "off",
    "puc_auxiliar_deudores": "off",
    "puc_retefuente_ventas": "off",
    "puc_retefuente_servicios_clie": "off",
    "puc_auxiliar_proveedores": "off",
    "puc_retefuente_compras": "off",
    "puc_retefuente_servicios_prov": "off",
    "archivos": "off",
    "es_restaurante": "off",
    "porcentaje_propina_sugerida": "off"
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
    if ("tipo" == sIndex)
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
    if ("regimen" == sIndex)
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
    if ("tipo_documento" == sIndex)
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
    if ("documento" == sIndex)
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
    if ("dv" == sIndex)
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
    if ("imagenter" == sIndex)
    {
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
    if ("codigo_tercero" == sIndex)
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
    if ("sexo" == sIndex)
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
    if ("notificar" == sIndex)
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
    if ("nombre1" == sIndex)
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
    if ("nombre2" == sIndex)
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
    if ("apellido1" == sIndex)
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
    if ("apellido2" == sIndex)
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
    if ("tel_cel" == sIndex)
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
    if ("urlmail" == sIndex)
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
    if ("idtercero" == sIndex)
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
    if ("r_social" == sIndex)
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
    if ("nombres" == sIndex)
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
    if ("nombre_comercil" == sIndex)
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
    if ("representante" == sIndex)
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
    if ("direccion" == sIndex)
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
    if ("departamento" == sIndex)
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
    if ("idmuni" == sIndex)
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
    if ("ciudad" == sIndex)
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
    if ("codigo_postal" == sIndex)
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
    if ("observaciones" == sIndex)
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
    if ("lenguaje" == sIndex)
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
    if ("c_postal" == sIndex)
    {
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
    if ("correo_notificafe" == sIndex)
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
    if ("celular_notificafe" == sIndex)
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
    if ("cliente" == sIndex)
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
    if ("proveedor" == sIndex)
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
    if ("empleado" == sIndex)
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
    if ("es_tecnico" == sIndex)
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
    if ("activo" == sIndex)
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
    if ("credito" == sIndex)
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
    if ("cupo" == sIndex)
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
    if ("cupodis" == sIndex)
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
    if ("dias_credito" == sIndex)
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
    if ("dias_mora" == sIndex)
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
    if ("efec_retencion" == sIndex)
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
    if ("listaprecios" == sIndex)
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
    if ("loatiende" == sIndex)
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
    if ("autorizado" == sIndex)
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
    if ("relleno2" == sIndex)
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
    if ("nacimiento" == sIndex)
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
    if ("detalle_tributario" == sIndex)
    {
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
    if ("responsabilidad_fiscal" == sIndex)
    {
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
    if ("ciiu" == sIndex)
    {
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
    if ("sucur_cliente" == sIndex)
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
    if ("sucursales" == sIndex)
    {
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
    if ("fechault" == sIndex)
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
    if ("saldo" == sIndex)
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
    if ("afiliacion" == sIndex)
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
    if ("es_cajero" == sIndex)
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
    if ("cupo_vendedor" == sIndex)
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
    if ("autoretenedor" == sIndex)
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
    if ("creditoprov" == sIndex)
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
    if ("dias" == sIndex)
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
    if ("url" == sIndex)
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
    if ("contacto" == sIndex)
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
    if ("telefonos_prov" == sIndex)
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
    if ("email" == sIndex)
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
    if ("fechultcomp" == sIndex)
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
    if ("saldoapagar" == sIndex)
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
    if ("codigo_ter" == sIndex)
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
    if ("zona_clientes" == sIndex)
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
    if ("clasificacion_clientes" == sIndex)
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
    if ("puc_auxiliar_deudores" == sIndex)
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
    if ("puc_retefuente_ventas" == sIndex)
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
    if ("puc_retefuente_servicios_clie" == sIndex)
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
    if ("puc_auxiliar_proveedores" == sIndex)
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
    if ("puc_retefuente_compras" == sIndex)
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
    if ("puc_retefuente_servicios_prov" == sIndex)
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
    if ("archivos" == sIndex)
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
    if ("es_restaurante" == sIndex)
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
    if ("porcentaje_propina_sugerida" == sIndex)
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
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
