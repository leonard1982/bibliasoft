
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
        if ("geral_form_cloud_empresas_mob" == sTestField)
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
        sc_hide_form_cloud_empresas_mob_form();
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
    nm_move('igual');
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

  // ---------- Validate id_empresa
  function do_ajax_form_cloud_empresas_mob_validate_id_empresa()
  {
    var nomeCampo_id_empresa = "id_empresa";
    var var_id_empresa = scAjaxGetFieldHidden(nomeCampo_id_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_id_empresa(var_id_empresa, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_id_empresa_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_id_empresa

  function do_ajax_form_cloud_empresas_mob_validate_id_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_empresa";
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
  } // do_ajax_form_cloud_empresas_mob_validate_id_empresa_cb

  // ---------- Validate ccnit
  function do_ajax_form_cloud_empresas_mob_validate_ccnit()
  {
    var nomeCampo_ccnit = "ccnit";
    var var_ccnit = scAjaxGetFieldText(nomeCampo_ccnit);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_ccnit(var_ccnit, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_ccnit_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_ccnit

  function do_ajax_form_cloud_empresas_mob_validate_ccnit_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ccnit";
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
  } // do_ajax_form_cloud_empresas_mob_validate_ccnit_cb

  // ---------- Validate nombre_razonsocial
  function do_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial()
  {
    var nomeCampo_nombre_razonsocial = "nombre_razonsocial";
    var var_nombre_razonsocial = scAjaxGetFieldText(nomeCampo_nombre_razonsocial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial(var_nombre_razonsocial, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial

  function do_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_razonsocial";
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
  } // do_ajax_form_cloud_empresas_mob_validate_nombre_razonsocial_cb

  // ---------- Validate serial
  function do_ajax_form_cloud_empresas_mob_validate_serial()
  {
    var nomeCampo_serial = "serial";
    var var_serial = scAjaxGetFieldText(nomeCampo_serial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_serial(var_serial, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_serial_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_serial

  function do_ajax_form_cloud_empresas_mob_validate_serial_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_serial_cb

  // ---------- Validate activo
  function do_ajax_form_cloud_empresas_mob_validate_activo()
  {
    var nomeCampo_activo = "activo";
    var var_activo = scAjaxGetFieldSelect(nomeCampo_activo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_activo(var_activo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_activo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_activo

  function do_ajax_form_cloud_empresas_mob_validate_activo_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_activo_cb

  // ---------- Validate nit
  function do_ajax_form_cloud_empresas_mob_validate_nit()
  {
    var nomeCampo_nit = "nit";
    var var_nit = scAjaxGetFieldText(nomeCampo_nit);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_nit(var_nit, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_nit_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_nit

  function do_ajax_form_cloud_empresas_mob_validate_nit_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nit";
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
  } // do_ajax_form_cloud_empresas_mob_validate_nit_cb

  // ---------- Validate razon_social
  function do_ajax_form_cloud_empresas_mob_validate_razon_social()
  {
    var nomeCampo_razon_social = "razon_social";
    var var_razon_social = scAjaxGetFieldText(nomeCampo_razon_social);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_razon_social(var_razon_social, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_razon_social_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_razon_social

  function do_ajax_form_cloud_empresas_mob_validate_razon_social_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "razon_social";
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
  } // do_ajax_form_cloud_empresas_mob_validate_razon_social_cb

  // ---------- Validate celular
  function do_ajax_form_cloud_empresas_mob_validate_celular()
  {
    var nomeCampo_celular = "celular";
    var var_celular = scAjaxGetFieldText(nomeCampo_celular);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_celular(var_celular, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_celular_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_celular

  function do_ajax_form_cloud_empresas_mob_validate_celular_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular";
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
  } // do_ajax_form_cloud_empresas_mob_validate_celular_cb

  // ---------- Validate correo
  function do_ajax_form_cloud_empresas_mob_validate_correo()
  {
    var nomeCampo_correo = "correo";
    var var_correo = scAjaxGetFieldText(nomeCampo_correo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_correo(var_correo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_correo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_correo

  function do_ajax_form_cloud_empresas_mob_validate_correo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_correo_cb

  // ---------- Validate codsucursal
  function do_ajax_form_cloud_empresas_mob_validate_codsucursal()
  {
    var nomeCampo_codsucursal = "codsucursal";
    var var_codsucursal = scAjaxGetFieldText(nomeCampo_codsucursal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_codsucursal(var_codsucursal, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_codsucursal_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_codsucursal

  function do_ajax_form_cloud_empresas_mob_validate_codsucursal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codsucursal";
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
  } // do_ajax_form_cloud_empresas_mob_validate_codsucursal_cb

  // ---------- Validate direccion
  function do_ajax_form_cloud_empresas_mob_validate_direccion()
  {
    var nomeCampo_direccion = "direccion";
    var var_direccion = scAjaxGetFieldText(nomeCampo_direccion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_direccion(var_direccion, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_direccion_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_direccion

  function do_ajax_form_cloud_empresas_mob_validate_direccion_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_direccion_cb

  // ---------- Validate ciudad
  function do_ajax_form_cloud_empresas_mob_validate_ciudad()
  {
    var nomeCampo_ciudad = "ciudad";
    var var_ciudad = scAjaxGetFieldText(nomeCampo_ciudad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_ciudad(var_ciudad, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_ciudad_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_ciudad

  function do_ajax_form_cloud_empresas_mob_validate_ciudad_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_ciudad_cb

  // ---------- Validate pagina_web
  function do_ajax_form_cloud_empresas_mob_validate_pagina_web()
  {
    var nomeCampo_pagina_web = "pagina_web";
    var var_pagina_web = scAjaxGetFieldText(nomeCampo_pagina_web);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_pagina_web(var_pagina_web, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_pagina_web_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_pagina_web

  function do_ajax_form_cloud_empresas_mob_validate_pagina_web_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pagina_web";
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
  } // do_ajax_form_cloud_empresas_mob_validate_pagina_web_cb

  // ---------- Validate actividad_principal
  function do_ajax_form_cloud_empresas_mob_validate_actividad_principal()
  {
    var nomeCampo_actividad_principal = "actividad_principal";
    var var_actividad_principal = scAjaxGetFieldText(nomeCampo_actividad_principal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_actividad_principal(var_actividad_principal, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_actividad_principal_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_actividad_principal

  function do_ajax_form_cloud_empresas_mob_validate_actividad_principal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "actividad_principal";
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
  } // do_ajax_form_cloud_empresas_mob_validate_actividad_principal_cb

  // ---------- Validate regimen
  function do_ajax_form_cloud_empresas_mob_validate_regimen()
  {
    var nomeCampo_regimen = "regimen";
    var var_regimen = scAjaxGetFieldSelect(nomeCampo_regimen);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_regimen(var_regimen, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_regimen_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_regimen

  function do_ajax_form_cloud_empresas_mob_validate_regimen_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_regimen_cb

  // ---------- Validate observaciones
  function do_ajax_form_cloud_empresas_mob_validate_observaciones()
  {
    var nomeCampo_observaciones = "observaciones";
    var var_observaciones = scAjaxGetFieldEditorHtml(nomeCampo_observaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_observaciones(var_observaciones, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_observaciones_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_observaciones

  function do_ajax_form_cloud_empresas_mob_validate_observaciones_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_observaciones_cb

  // ---------- Validate proveedor
  function do_ajax_form_cloud_empresas_mob_validate_proveedor()
  {
    var nomeCampo_proveedor = "proveedor";
    var var_proveedor = scAjaxGetFieldSelect(nomeCampo_proveedor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_proveedor(var_proveedor, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_proveedor_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_proveedor

  function do_ajax_form_cloud_empresas_mob_validate_proveedor_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_proveedor_cb

  // ---------- Validate modo
  function do_ajax_form_cloud_empresas_mob_validate_modo()
  {
    var nomeCampo_modo = "modo";
    var var_modo = scAjaxGetFieldSelect(nomeCampo_modo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_modo(var_modo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_modo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_modo

  function do_ajax_form_cloud_empresas_mob_validate_modo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "modo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_modo_cb

  // ---------- Validate enviar_dian
  function do_ajax_form_cloud_empresas_mob_validate_enviar_dian()
  {
    var nomeCampo_enviar_dian = "enviar_dian";
    var var_enviar_dian = scAjaxGetFieldSelect(nomeCampo_enviar_dian);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_enviar_dian(var_enviar_dian, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_enviar_dian_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_dian

  function do_ajax_form_cloud_empresas_mob_validate_enviar_dian_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enviar_dian";
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
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_dian_cb

  // ---------- Validate enviar_cliente
  function do_ajax_form_cloud_empresas_mob_validate_enviar_cliente()
  {
    var nomeCampo_enviar_cliente = "enviar_cliente";
    var var_enviar_cliente = scAjaxGetFieldSelect(nomeCampo_enviar_cliente);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_enviar_cliente(var_enviar_cliente, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_enviar_cliente_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_cliente

  function do_ajax_form_cloud_empresas_mob_validate_enviar_cliente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enviar_cliente";
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
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_cliente_cb

  // ---------- Validate servidor1
  function do_ajax_form_cloud_empresas_mob_validate_servidor1()
  {
    var nomeCampo_servidor1 = "servidor1";
    var var_servidor1 = scAjaxGetFieldText(nomeCampo_servidor1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor1(var_servidor1, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor1_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor1

  function do_ajax_form_cloud_empresas_mob_validate_servidor1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor1";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor1_cb

  // ---------- Validate servidor2
  function do_ajax_form_cloud_empresas_mob_validate_servidor2()
  {
    var nomeCampo_servidor2 = "servidor2";
    var var_servidor2 = scAjaxGetFieldText(nomeCampo_servidor2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor2(var_servidor2, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor2_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor2

  function do_ajax_form_cloud_empresas_mob_validate_servidor2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor2";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor2_cb

  // ---------- Validate servidor3
  function do_ajax_form_cloud_empresas_mob_validate_servidor3()
  {
    var nomeCampo_servidor3 = "servidor3";
    var var_servidor3 = scAjaxGetFieldText(nomeCampo_servidor3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor3(var_servidor3, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor3_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor3

  function do_ajax_form_cloud_empresas_mob_validate_servidor3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor3";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor3_cb

  // ---------- Validate tokenempresa
  function do_ajax_form_cloud_empresas_mob_validate_tokenempresa()
  {
    var nomeCampo_tokenempresa = "tokenempresa";
    var var_tokenempresa = scAjaxGetFieldText(nomeCampo_tokenempresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_tokenempresa(var_tokenempresa, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_tokenempresa_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_tokenempresa

  function do_ajax_form_cloud_empresas_mob_validate_tokenempresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tokenempresa";
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
  } // do_ajax_form_cloud_empresas_mob_validate_tokenempresa_cb

  // ---------- Validate tokenpassword
  function do_ajax_form_cloud_empresas_mob_validate_tokenpassword()
  {
    var nomeCampo_tokenpassword = "tokenpassword";
    var var_tokenpassword = scAjaxGetFieldText(nomeCampo_tokenpassword);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_tokenpassword(var_tokenpassword, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_tokenpassword_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_tokenpassword

  function do_ajax_form_cloud_empresas_mob_validate_tokenpassword_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tokenpassword";
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
  } // do_ajax_form_cloud_empresas_mob_validate_tokenpassword_cb

  // ---------- Validate servidor1_pruebas
  function do_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas()
  {
    var nomeCampo_servidor1_pruebas = "servidor1_pruebas";
    var var_servidor1_pruebas = scAjaxGetFieldText(nomeCampo_servidor1_pruebas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas(var_servidor1_pruebas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas

  function do_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor1_pruebas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor1_pruebas_cb

  // ---------- Validate servidor2_pruebas
  function do_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas()
  {
    var nomeCampo_servidor2_pruebas = "servidor2_pruebas";
    var var_servidor2_pruebas = scAjaxGetFieldText(nomeCampo_servidor2_pruebas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas(var_servidor2_pruebas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas

  function do_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor2_pruebas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor2_pruebas_cb

  // ---------- Validate servidor3_pruebas
  function do_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas()
  {
    var nomeCampo_servidor3_pruebas = "servidor3_pruebas";
    var var_servidor3_pruebas = scAjaxGetFieldText(nomeCampo_servidor3_pruebas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas(var_servidor3_pruebas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas

  function do_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor3_pruebas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor3_pruebas_cb

  // ---------- Validate token_pruebas
  function do_ajax_form_cloud_empresas_mob_validate_token_pruebas()
  {
    var nomeCampo_token_pruebas = "token_pruebas";
    var var_token_pruebas = scAjaxGetFieldText(nomeCampo_token_pruebas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_token_pruebas(var_token_pruebas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_token_pruebas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_token_pruebas

  function do_ajax_form_cloud_empresas_mob_validate_token_pruebas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "token_pruebas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_token_pruebas_cb

  // ---------- Validate password_pruebas
  function do_ajax_form_cloud_empresas_mob_validate_password_pruebas()
  {
    var nomeCampo_password_pruebas = "password_pruebas";
    var var_password_pruebas = scAjaxGetFieldText(nomeCampo_password_pruebas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_password_pruebas(var_password_pruebas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_password_pruebas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_password_pruebas

  function do_ajax_form_cloud_empresas_mob_validate_password_pruebas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "password_pruebas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_password_pruebas_cb

  // ---------- Validate enviar_documento_online
  function do_ajax_form_cloud_empresas_mob_validate_enviar_documento_online()
  {
    var nomeCampo_enviar_documento_online = "enviar_documento_online";
    var var_enviar_documento_online = scAjaxGetFieldCheckbox(nomeCampo_enviar_documento_online, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_enviar_documento_online(var_enviar_documento_online, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_enviar_documento_online_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_documento_online

  function do_ajax_form_cloud_empresas_mob_validate_enviar_documento_online_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enviar_documento_online";
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
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_documento_online_cb

  // ---------- Validate smtp_tipo
  function do_ajax_form_cloud_empresas_mob_validate_smtp_tipo()
  {
    var nomeCampo_smtp_tipo = "smtp_tipo";
    var var_smtp_tipo = scAjaxGetFieldSelect(nomeCampo_smtp_tipo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_smtp_tipo(var_smtp_tipo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_smtp_tipo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_tipo

  function do_ajax_form_cloud_empresas_mob_validate_smtp_tipo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "smtp_tipo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_tipo_cb

  // ---------- Validate smtp_servidor
  function do_ajax_form_cloud_empresas_mob_validate_smtp_servidor()
  {
    var nomeCampo_smtp_servidor = "smtp_servidor";
    var var_smtp_servidor = scAjaxGetFieldText(nomeCampo_smtp_servidor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_smtp_servidor(var_smtp_servidor, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_smtp_servidor_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_servidor

  function do_ajax_form_cloud_empresas_mob_validate_smtp_servidor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "smtp_servidor";
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
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_servidor_cb

  // ---------- Validate smtp_puerto
  function do_ajax_form_cloud_empresas_mob_validate_smtp_puerto()
  {
    var nomeCampo_smtp_puerto = "smtp_puerto";
    var var_smtp_puerto = scAjaxGetFieldText(nomeCampo_smtp_puerto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_smtp_puerto(var_smtp_puerto, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_smtp_puerto_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_puerto

  function do_ajax_form_cloud_empresas_mob_validate_smtp_puerto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "smtp_puerto";
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
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_puerto_cb

  // ---------- Validate smtp_usuario
  function do_ajax_form_cloud_empresas_mob_validate_smtp_usuario()
  {
    var nomeCampo_smtp_usuario = "smtp_usuario";
    var var_smtp_usuario = scAjaxGetFieldText(nomeCampo_smtp_usuario);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_smtp_usuario(var_smtp_usuario, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_smtp_usuario_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_usuario

  function do_ajax_form_cloud_empresas_mob_validate_smtp_usuario_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "smtp_usuario";
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
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_usuario_cb

  // ---------- Validate smtp_password
  function do_ajax_form_cloud_empresas_mob_validate_smtp_password()
  {
    var nomeCampo_smtp_password = "smtp_password";
    var var_smtp_password = scAjaxGetFieldText(nomeCampo_smtp_password);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_smtp_password(var_smtp_password, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_smtp_password_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_password

  function do_ajax_form_cloud_empresas_mob_validate_smtp_password_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "smtp_password";
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
  } // do_ajax_form_cloud_empresas_mob_validate_smtp_password_cb

  // ---------- Validate contacto_nombre
  function do_ajax_form_cloud_empresas_mob_validate_contacto_nombre()
  {
    var nomeCampo_contacto_nombre = "contacto_nombre";
    var var_contacto_nombre = scAjaxGetFieldText(nomeCampo_contacto_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_contacto_nombre(var_contacto_nombre, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_contacto_nombre_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_nombre

  function do_ajax_form_cloud_empresas_mob_validate_contacto_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto_nombre";
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
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_nombre_cb

  // ---------- Validate contacto_cargo
  function do_ajax_form_cloud_empresas_mob_validate_contacto_cargo()
  {
    var nomeCampo_contacto_cargo = "contacto_cargo";
    var var_contacto_cargo = scAjaxGetFieldText(nomeCampo_contacto_cargo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_contacto_cargo(var_contacto_cargo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_contacto_cargo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_cargo

  function do_ajax_form_cloud_empresas_mob_validate_contacto_cargo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto_cargo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_cargo_cb

  // ---------- Validate contacto_correo
  function do_ajax_form_cloud_empresas_mob_validate_contacto_correo()
  {
    var nomeCampo_contacto_correo = "contacto_correo";
    var var_contacto_correo = scAjaxGetFieldText(nomeCampo_contacto_correo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_contacto_correo(var_contacto_correo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_contacto_correo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_correo

  function do_ajax_form_cloud_empresas_mob_validate_contacto_correo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto_correo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_correo_cb

  // ---------- Validate contacto_celular
  function do_ajax_form_cloud_empresas_mob_validate_contacto_celular()
  {
    var nomeCampo_contacto_celular = "contacto_celular";
    var var_contacto_celular = scAjaxGetFieldText(nomeCampo_contacto_celular);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_contacto_celular(var_contacto_celular, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_contacto_celular_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_celular

  function do_ajax_form_cloud_empresas_mob_validate_contacto_celular_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto_celular";
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
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_celular_cb

  // ---------- Validate contacto_fijo
  function do_ajax_form_cloud_empresas_mob_validate_contacto_fijo()
  {
    var nomeCampo_contacto_fijo = "contacto_fijo";
    var var_contacto_fijo = scAjaxGetFieldText(nomeCampo_contacto_fijo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_contacto_fijo(var_contacto_fijo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_contacto_fijo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_fijo

  function do_ajax_form_cloud_empresas_mob_validate_contacto_fijo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contacto_fijo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_contacto_fijo_cb

  // ---------- Validate logo
  function do_ajax_form_cloud_empresas_mob_validate_logo()
  {
    var nomeCampo_logo = "logo";
    var var_logo = scAjaxGetFieldText(nomeCampo_logo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_logo(var_logo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_logo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_logo

  function do_ajax_form_cloud_empresas_mob_validate_logo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "logo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_logo_cb

  // ---------- Validate asunto
  function do_ajax_form_cloud_empresas_mob_validate_asunto()
  {
    var nomeCampo_asunto = "asunto";
    var var_asunto = scAjaxGetFieldText(nomeCampo_asunto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_asunto(var_asunto, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_asunto_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_asunto

  function do_ajax_form_cloud_empresas_mob_validate_asunto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "asunto";
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
  } // do_ajax_form_cloud_empresas_mob_validate_asunto_cb

  // ---------- Validate mensaje
  function do_ajax_form_cloud_empresas_mob_validate_mensaje()
  {
    var nomeCampo_mensaje = "mensaje";
    var var_mensaje = scAjaxGetFieldEditorHtml(nomeCampo_mensaje);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_mensaje(var_mensaje, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_mensaje_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_mensaje

  function do_ajax_form_cloud_empresas_mob_validate_mensaje_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "mensaje";
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
  } // do_ajax_form_cloud_empresas_mob_validate_mensaje_cb

  // ---------- Validate head_note
  function do_ajax_form_cloud_empresas_mob_validate_head_note()
  {
    var nomeCampo_head_note = "head_note";
    var var_head_note = scAjaxGetFieldText(nomeCampo_head_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_head_note(var_head_note, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_head_note_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_head_note

  function do_ajax_form_cloud_empresas_mob_validate_head_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "head_note";
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
  } // do_ajax_form_cloud_empresas_mob_validate_head_note_cb

  // ---------- Validate pie_pagina
  function do_ajax_form_cloud_empresas_mob_validate_pie_pagina()
  {
    var nomeCampo_pie_pagina = "pie_pagina";
    var var_pie_pagina = scAjaxGetFieldText(nomeCampo_pie_pagina);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_pie_pagina(var_pie_pagina, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_pie_pagina_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_pie_pagina

  function do_ajax_form_cloud_empresas_mob_validate_pie_pagina_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pie_pagina";
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
  } // do_ajax_form_cloud_empresas_mob_validate_pie_pagina_cb

  // ---------- Validate mensaje_nc
  function do_ajax_form_cloud_empresas_mob_validate_mensaje_nc()
  {
    var nomeCampo_mensaje_nc = "mensaje_nc";
    var var_mensaje_nc = scAjaxGetFieldEditorHtml(nomeCampo_mensaje_nc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_mensaje_nc(var_mensaje_nc, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_mensaje_nc_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_mensaje_nc

  function do_ajax_form_cloud_empresas_mob_validate_mensaje_nc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "mensaje_nc";
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
  } // do_ajax_form_cloud_empresas_mob_validate_mensaje_nc_cb

  // ---------- Validate pie_pagina_nc
  function do_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc()
  {
    var nomeCampo_pie_pagina_nc = "pie_pagina_nc";
    var var_pie_pagina_nc = scAjaxGetFieldEditorHtml(nomeCampo_pie_pagina_nc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc(var_pie_pagina_nc, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc

  function do_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pie_pagina_nc";
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
  } // do_ajax_form_cloud_empresas_mob_validate_pie_pagina_nc_cb

  // ---------- Validate servidor_facturas
  function do_ajax_form_cloud_empresas_mob_validate_servidor_facturas()
  {
    var nomeCampo_servidor_facturas = "servidor_facturas";
    var var_servidor_facturas = scAjaxGetFieldText(nomeCampo_servidor_facturas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor_facturas(var_servidor_facturas, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor_facturas_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor_facturas

  function do_ajax_form_cloud_empresas_mob_validate_servidor_facturas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor_facturas";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor_facturas_cb

  // ---------- Validate servidor_nc
  function do_ajax_form_cloud_empresas_mob_validate_servidor_nc()
  {
    var nomeCampo_servidor_nc = "servidor_nc";
    var var_servidor_nc = scAjaxGetFieldText(nomeCampo_servidor_nc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_servidor_nc(var_servidor_nc, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_servidor_nc_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_servidor_nc

  function do_ajax_form_cloud_empresas_mob_validate_servidor_nc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "servidor_nc";
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
  } // do_ajax_form_cloud_empresas_mob_validate_servidor_nc_cb

  // ---------- Validate correo_para_prueba
  function do_ajax_form_cloud_empresas_mob_validate_correo_para_prueba()
  {
    var nomeCampo_correo_para_prueba = "correo_para_prueba";
    var var_correo_para_prueba = scAjaxGetFieldText(nomeCampo_correo_para_prueba);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_correo_para_prueba(var_correo_para_prueba, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_correo_para_prueba_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_correo_para_prueba

  function do_ajax_form_cloud_empresas_mob_validate_correo_para_prueba_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_para_prueba";
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
  } // do_ajax_form_cloud_empresas_mob_validate_correo_para_prueba_cb

  // ---------- Validate correo_prueba
  function do_ajax_form_cloud_empresas_mob_validate_correo_prueba()
  {
    var nomeCampo_correo_prueba = "correo_prueba";
    var var_correo_prueba = scAjaxGetFieldText(nomeCampo_correo_prueba);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_correo_prueba(var_correo_prueba, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_correo_prueba_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_correo_prueba

  function do_ajax_form_cloud_empresas_mob_validate_correo_prueba_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_prueba";
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
  } // do_ajax_form_cloud_empresas_mob_validate_correo_prueba_cb

  // ---------- Validate enviar_datos_establecimiento
  function do_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento()
  {
    var nomeCampo_enviar_datos_establecimiento = "enviar_datos_establecimiento";
    var var_enviar_datos_establecimiento = scAjaxGetFieldCheckbox(nomeCampo_enviar_datos_establecimiento, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento(var_enviar_datos_establecimiento, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento

  function do_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enviar_datos_establecimiento";
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
  } // do_ajax_form_cloud_empresas_mob_validate_enviar_datos_establecimiento_cb

  // ---------- Validate nombre_pc_red
  function do_ajax_form_cloud_empresas_mob_validate_nombre_pc_red()
  {
    var nomeCampo_nombre_pc_red = "nombre_pc_red";
    var var_nombre_pc_red = scAjaxGetFieldText(nomeCampo_nombre_pc_red);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_nombre_pc_red(var_nombre_pc_red, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_nombre_pc_red_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_nombre_pc_red

  function do_ajax_form_cloud_empresas_mob_validate_nombre_pc_red_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_pc_red";
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
  } // do_ajax_form_cloud_empresas_mob_validate_nombre_pc_red_cb

  // ---------- Validate sumarimpuestosdeldetalle
  function do_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle()
  {
    var nomeCampo_sumarimpuestosdeldetalle = "sumarimpuestosdeldetalle";
    var var_sumarimpuestosdeldetalle = scAjaxGetFieldCheckbox(nomeCampo_sumarimpuestosdeldetalle, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle(var_sumarimpuestosdeldetalle, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle

  function do_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sumarimpuestosdeldetalle";
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
  } // do_ajax_form_cloud_empresas_mob_validate_sumarimpuestosdeldetalle_cb

  // ---------- Validate cantidaddecimales
  function do_ajax_form_cloud_empresas_mob_validate_cantidaddecimales()
  {
    var nomeCampo_cantidaddecimales = "cantidaddecimales";
    var var_cantidaddecimales = scAjaxGetFieldText(nomeCampo_cantidaddecimales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_cantidaddecimales(var_cantidaddecimales, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_cantidaddecimales_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_cantidaddecimales

  function do_ajax_form_cloud_empresas_mob_validate_cantidaddecimales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cantidaddecimales";
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
  } // do_ajax_form_cloud_empresas_mob_validate_cantidaddecimales_cb

  // ---------- Validate valortributounidad
  function do_ajax_form_cloud_empresas_mob_validate_valortributounidad()
  {
    var nomeCampo_valortributounidad = "valortributounidad";
    var var_valortributounidad = scAjaxGetFieldText(nomeCampo_valortributounidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_valortributounidad(var_valortributounidad, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_valortributounidad_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_valortributounidad

  function do_ajax_form_cloud_empresas_mob_validate_valortributounidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valortributounidad";
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
  } // do_ajax_form_cloud_empresas_mob_validate_valortributounidad_cb

  // ---------- Validate conf_auto_tercero
  function do_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero()
  {
    var nomeCampo_conf_auto_tercero = "conf_auto_tercero";
    var var_conf_auto_tercero = scAjaxGetFieldCheckbox(nomeCampo_conf_auto_tercero, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero(var_conf_auto_tercero, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero

  function do_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conf_auto_tercero";
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
  } // do_ajax_form_cloud_empresas_mob_validate_conf_auto_tercero_cb

  // ---------- Validate no_validar_mail
  function do_ajax_form_cloud_empresas_mob_validate_no_validar_mail()
  {
    var nomeCampo_no_validar_mail = "no_validar_mail";
    var var_no_validar_mail = scAjaxGetFieldCheckbox(nomeCampo_no_validar_mail, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_no_validar_mail(var_no_validar_mail, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_no_validar_mail_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_no_validar_mail

  function do_ajax_form_cloud_empresas_mob_validate_no_validar_mail_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no_validar_mail";
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
  } // do_ajax_form_cloud_empresas_mob_validate_no_validar_mail_cb

  // ---------- Validate email_alternativo
  function do_ajax_form_cloud_empresas_mob_validate_email_alternativo()
  {
    var nomeCampo_email_alternativo = "email_alternativo";
    var var_email_alternativo = scAjaxGetFieldText(nomeCampo_email_alternativo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_email_alternativo(var_email_alternativo, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_email_alternativo_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_email_alternativo

  function do_ajax_form_cloud_empresas_mob_validate_email_alternativo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "email_alternativo";
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
  } // do_ajax_form_cloud_empresas_mob_validate_email_alternativo_cb

  // ---------- Validate desviar_correo_a
  function do_ajax_form_cloud_empresas_mob_validate_desviar_correo_a()
  {
    var nomeCampo_desviar_correo_a = "desviar_correo_a";
    var var_desviar_correo_a = scAjaxGetFieldText(nomeCampo_desviar_correo_a);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_desviar_correo_a(var_desviar_correo_a, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_desviar_correo_a_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_desviar_correo_a

  function do_ajax_form_cloud_empresas_mob_validate_desviar_correo_a_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desviar_correo_a";
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
  } // do_ajax_form_cloud_empresas_mob_validate_desviar_correo_a_cb

  // ---------- Validate correo_copia
  function do_ajax_form_cloud_empresas_mob_validate_correo_copia()
  {
    var nomeCampo_correo_copia = "correo_copia";
    var var_correo_copia = scAjaxGetFieldText(nomeCampo_correo_copia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_correo_copia(var_correo_copia, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_correo_copia_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_correo_copia

  function do_ajax_form_cloud_empresas_mob_validate_correo_copia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_copia";
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
  } // do_ajax_form_cloud_empresas_mob_validate_correo_copia_cb

  // ---------- Validate informacion_adicional
  function do_ajax_form_cloud_empresas_mob_validate_informacion_adicional()
  {
    var nomeCampo_informacion_adicional = "informacion_adicional";
    var var_informacion_adicional = scAjaxGetFieldText(nomeCampo_informacion_adicional);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_informacion_adicional(var_informacion_adicional, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_informacion_adicional_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_informacion_adicional

  function do_ajax_form_cloud_empresas_mob_validate_informacion_adicional_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "informacion_adicional";
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
  } // do_ajax_form_cloud_empresas_mob_validate_informacion_adicional_cb

  // ---------- Validate tomar_municipio_tns
  function do_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns()
  {
    var nomeCampo_tomar_municipio_tns = "tomar_municipio_tns";
    var var_tomar_municipio_tns = scAjaxGetFieldCheckbox(nomeCampo_tomar_municipio_tns, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns(var_tomar_municipio_tns, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns

  function do_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tomar_municipio_tns";
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
  } // do_ajax_form_cloud_empresas_mob_validate_tomar_municipio_tns_cb

  // ---------- Validate validar_codcliente_tns
  function do_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns()
  {
    var nomeCampo_validar_codcliente_tns = "validar_codcliente_tns";
    var var_validar_codcliente_tns = scAjaxGetFieldCheckbox(nomeCampo_validar_codcliente_tns, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns(var_validar_codcliente_tns, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns

  function do_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "validar_codcliente_tns";
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
  } // do_ajax_form_cloud_empresas_mob_validate_validar_codcliente_tns_cb

  // ---------- Validate desactivar_xml_enlista
  function do_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista()
  {
    var nomeCampo_desactivar_xml_enlista = "desactivar_xml_enlista";
    var var_desactivar_xml_enlista = scAjaxGetFieldCheckbox(nomeCampo_desactivar_xml_enlista, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista(var_desactivar_xml_enlista, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista

  function do_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desactivar_xml_enlista";
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
  } // do_ajax_form_cloud_empresas_mob_validate_desactivar_xml_enlista_cb

  // ---------- Validate validar_correo_enlinea
  function do_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea()
  {
    var nomeCampo_validar_correo_enlinea = "validar_correo_enlinea";
    var var_validar_correo_enlinea = scAjaxGetFieldCheckbox(nomeCampo_validar_correo_enlinea, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea(var_validar_correo_enlinea, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea

  function do_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea_cb(sResp)
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
  } // do_ajax_form_cloud_empresas_mob_validate_validar_correo_enlinea_cb

  // ---------- Validate url_bouncer
  function do_ajax_form_cloud_empresas_mob_validate_url_bouncer()
  {
    var nomeCampo_url_bouncer = "url_bouncer";
    var var_url_bouncer = scAjaxGetFieldText(nomeCampo_url_bouncer);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_url_bouncer(var_url_bouncer, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_url_bouncer_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_url_bouncer

  function do_ajax_form_cloud_empresas_mob_validate_url_bouncer_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "url_bouncer";
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
  } // do_ajax_form_cloud_empresas_mob_validate_url_bouncer_cb

  // ---------- Validate apikey_bouncer
  function do_ajax_form_cloud_empresas_mob_validate_apikey_bouncer()
  {
    var nomeCampo_apikey_bouncer = "apikey_bouncer";
    var var_apikey_bouncer = scAjaxGetFieldText(nomeCampo_apikey_bouncer);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_apikey_bouncer(var_apikey_bouncer, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_apikey_bouncer_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_apikey_bouncer

  function do_ajax_form_cloud_empresas_mob_validate_apikey_bouncer_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apikey_bouncer";
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
  } // do_ajax_form_cloud_empresas_mob_validate_apikey_bouncer_cb

  // ---------- Validate tiempo_bouncer
  function do_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer()
  {
    var nomeCampo_tiempo_bouncer = "tiempo_bouncer";
    var var_tiempo_bouncer = scAjaxGetFieldText(nomeCampo_tiempo_bouncer);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer(var_tiempo_bouncer, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer

  function do_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tiempo_bouncer";
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
  } // do_ajax_form_cloud_empresas_mob_validate_tiempo_bouncer_cb

  // ---------- Validate url_validar_licencia
  function do_ajax_form_cloud_empresas_mob_validate_url_validar_licencia()
  {
    var nomeCampo_url_validar_licencia = "url_validar_licencia";
    var var_url_validar_licencia = scAjaxGetFieldText(nomeCampo_url_validar_licencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_cloud_empresas_mob_validate_url_validar_licencia(var_url_validar_licencia, var_script_case_init, do_ajax_form_cloud_empresas_mob_validate_url_validar_licencia_cb);
  } // do_ajax_form_cloud_empresas_mob_validate_url_validar_licencia

  function do_ajax_form_cloud_empresas_mob_validate_url_validar_licencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "url_validar_licencia";
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
  } // do_ajax_form_cloud_empresas_mob_validate_url_validar_licencia_cb
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
	scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
}

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
	scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
}

function scAjaxShowMessage(messageType) {
	scAjaxShowMessage_default();
}

function scAjaxHideMessage() {
	scAjaxHideMessage_default();
}

function _scAjaxShowMessage(params) {
	_scAjaxShowMessage_default(params);
} // _scAjaxShowMessage

function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "\n");
	scJs_alert_default(message, callbackOk);
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
	scJs_confirm_default(message, callbackOk, callbackCancel);
} // scJs_confirm

  // ---------- Form
  function do_ajax_form_cloud_empresas_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_cloud_empresas_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_id_empresa = scAjaxGetFieldHidden("id_empresa");
    var var_ccnit = scAjaxGetFieldText("ccnit");
    var var_nombre_razonsocial = scAjaxGetFieldText("nombre_razonsocial");
    var var_serial = scAjaxGetFieldText("serial");
    var var_activo = scAjaxGetFieldSelect("activo");
    var var_nit = scAjaxGetFieldText("nit");
    var var_razon_social = scAjaxGetFieldText("razon_social");
    var var_celular = scAjaxGetFieldText("celular");
    var var_correo = scAjaxGetFieldText("correo");
    var var_codsucursal = scAjaxGetFieldText("codsucursal");
    var var_direccion = scAjaxGetFieldText("direccion");
    var var_ciudad = scAjaxGetFieldText("ciudad");
    var var_pagina_web = scAjaxGetFieldText("pagina_web");
    var var_actividad_principal = scAjaxGetFieldText("actividad_principal");
    var var_regimen = scAjaxGetFieldSelect("regimen");
    var var_observaciones = scAjaxGetFieldEditorHtml("observaciones");
    var var_proveedor = scAjaxGetFieldSelect("proveedor");
    var var_modo = scAjaxGetFieldSelect("modo");
    var var_enviar_dian = scAjaxGetFieldSelect("enviar_dian");
    var var_enviar_cliente = scAjaxGetFieldSelect("enviar_cliente");
    var var_servidor1 = scAjaxGetFieldText("servidor1");
    var var_servidor2 = scAjaxGetFieldText("servidor2");
    var var_servidor3 = scAjaxGetFieldText("servidor3");
    var var_tokenempresa = scAjaxGetFieldText("tokenempresa");
    var var_tokenpassword = scAjaxGetFieldText("tokenpassword");
    var var_servidor1_pruebas = scAjaxGetFieldText("servidor1_pruebas");
    var var_servidor2_pruebas = scAjaxGetFieldText("servidor2_pruebas");
    var var_servidor3_pruebas = scAjaxGetFieldText("servidor3_pruebas");
    var var_token_pruebas = scAjaxGetFieldText("token_pruebas");
    var var_password_pruebas = scAjaxGetFieldText("password_pruebas");
    var var_enviar_documento_online = scAjaxGetFieldCheckbox("enviar_documento_online", ";");
    var var_smtp_tipo = scAjaxGetFieldSelect("smtp_tipo");
    var var_smtp_servidor = scAjaxGetFieldText("smtp_servidor");
    var var_smtp_puerto = scAjaxGetFieldText("smtp_puerto");
    var var_smtp_usuario = scAjaxGetFieldText("smtp_usuario");
    var var_smtp_password = scAjaxGetFieldText("smtp_password");
    var var_contacto_nombre = scAjaxGetFieldText("contacto_nombre");
    var var_contacto_cargo = scAjaxGetFieldText("contacto_cargo");
    var var_contacto_correo = scAjaxGetFieldText("contacto_correo");
    var var_contacto_celular = scAjaxGetFieldText("contacto_celular");
    var var_contacto_fijo = scAjaxGetFieldText("contacto_fijo");
    var var_logo = scAjaxGetFieldText("logo");
    var var_asunto = scAjaxGetFieldText("asunto");
    var var_mensaje = scAjaxGetFieldEditorHtml("mensaje");
    var var_head_note = scAjaxGetFieldText("head_note");
    var var_pie_pagina = scAjaxGetFieldText("pie_pagina");
    var var_mensaje_nc = scAjaxGetFieldEditorHtml("mensaje_nc");
    var var_pie_pagina_nc = scAjaxGetFieldEditorHtml("pie_pagina_nc");
    var var_servidor_facturas = scAjaxGetFieldText("servidor_facturas");
    var var_servidor_nc = scAjaxGetFieldText("servidor_nc");
    var var_correo_para_prueba = scAjaxGetFieldText("correo_para_prueba");
    var var_correo_prueba = "";
    var var_enviar_datos_establecimiento = scAjaxGetFieldCheckbox("enviar_datos_establecimiento", ";");
    var var_nombre_pc_red = scAjaxGetFieldText("nombre_pc_red");
    var var_sumarimpuestosdeldetalle = scAjaxGetFieldCheckbox("sumarimpuestosdeldetalle", ";");
    var var_cantidaddecimales = scAjaxGetFieldText("cantidaddecimales");
    var var_valortributounidad = scAjaxGetFieldText("valortributounidad");
    var var_conf_auto_tercero = scAjaxGetFieldCheckbox("conf_auto_tercero", ";");
    var var_no_validar_mail = scAjaxGetFieldCheckbox("no_validar_mail", ";");
    var var_email_alternativo = scAjaxGetFieldText("email_alternativo");
    var var_desviar_correo_a = scAjaxGetFieldText("desviar_correo_a");
    var var_correo_copia = scAjaxGetFieldText("correo_copia");
    var var_informacion_adicional = scAjaxGetFieldText("informacion_adicional");
    var var_tomar_municipio_tns = scAjaxGetFieldCheckbox("tomar_municipio_tns", ";");
    var var_validar_codcliente_tns = scAjaxGetFieldCheckbox("validar_codcliente_tns", ";");
    var var_desactivar_xml_enlista = scAjaxGetFieldCheckbox("desactivar_xml_enlista", ";");
    var var_validar_correo_enlinea = scAjaxGetFieldCheckbox("validar_correo_enlinea", ";");
    var var_url_bouncer = scAjaxGetFieldText("url_bouncer");
    var var_apikey_bouncer = scAjaxGetFieldText("apikey_bouncer");
    var var_tiempo_bouncer = scAjaxGetFieldText("tiempo_bouncer");
    var var_url_validar_licencia = scAjaxGetFieldText("url_validar_licencia");
    var var_logo_ul_name = scAjaxSpecCharProtect(document.F1.logo_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_logo_ul_type = document.F1.logo_ul_type.value;
    var var_logo_salva = scAjaxSpecCharProtect(document.F1.logo_salva.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_logo_limpa = document.F1.logo_limpa.checked ? "S" : "N";
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_cloud_empresas_mob_submit_form(var_id_empresa, var_ccnit, var_nombre_razonsocial, var_serial, var_activo, var_nit, var_razon_social, var_celular, var_correo, var_codsucursal, var_direccion, var_ciudad, var_pagina_web, var_actividad_principal, var_regimen, var_observaciones, var_proveedor, var_modo, var_enviar_dian, var_enviar_cliente, var_servidor1, var_servidor2, var_servidor3, var_tokenempresa, var_tokenpassword, var_servidor1_pruebas, var_servidor2_pruebas, var_servidor3_pruebas, var_token_pruebas, var_password_pruebas, var_enviar_documento_online, var_smtp_tipo, var_smtp_servidor, var_smtp_puerto, var_smtp_usuario, var_smtp_password, var_contacto_nombre, var_contacto_cargo, var_contacto_correo, var_contacto_celular, var_contacto_fijo, var_logo, var_asunto, var_mensaje, var_head_note, var_pie_pagina, var_mensaje_nc, var_pie_pagina_nc, var_servidor_facturas, var_servidor_nc, var_correo_para_prueba, var_correo_prueba, var_enviar_datos_establecimiento, var_nombre_pc_red, var_sumarimpuestosdeldetalle, var_cantidaddecimales, var_valortributounidad, var_conf_auto_tercero, var_no_validar_mail, var_email_alternativo, var_desviar_correo_a, var_correo_copia, var_informacion_adicional, var_tomar_municipio_tns, var_validar_codcliente_tns, var_desactivar_xml_enlista, var_validar_correo_enlinea, var_url_bouncer, var_apikey_bouncer, var_tiempo_bouncer, var_url_validar_licencia, var_logo_ul_name, var_logo_ul_type, var_logo_salva, var_logo_limpa, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_cloud_empresas_mob_submit_form_cb);
  } // do_ajax_form_cloud_empresas_mob_submit_form

  function do_ajax_form_cloud_empresas_mob_submit_form_cb(sResp)
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
      scAjaxHideErrorDisplay("id_empresa");
      scAjaxHideErrorDisplay("ccnit");
      scAjaxHideErrorDisplay("nombre_razonsocial");
      scAjaxHideErrorDisplay("serial");
      scAjaxHideErrorDisplay("activo");
      scAjaxHideErrorDisplay("nit");
      scAjaxHideErrorDisplay("razon_social");
      scAjaxHideErrorDisplay("celular");
      scAjaxHideErrorDisplay("correo");
      scAjaxHideErrorDisplay("codsucursal");
      scAjaxHideErrorDisplay("direccion");
      scAjaxHideErrorDisplay("ciudad");
      scAjaxHideErrorDisplay("pagina_web");
      scAjaxHideErrorDisplay("actividad_principal");
      scAjaxHideErrorDisplay("regimen");
      scAjaxHideErrorDisplay("observaciones");
      scAjaxHideErrorDisplay("proveedor");
      scAjaxHideErrorDisplay("modo");
      scAjaxHideErrorDisplay("enviar_dian");
      scAjaxHideErrorDisplay("enviar_cliente");
      scAjaxHideErrorDisplay("servidor1");
      scAjaxHideErrorDisplay("servidor2");
      scAjaxHideErrorDisplay("servidor3");
      scAjaxHideErrorDisplay("tokenempresa");
      scAjaxHideErrorDisplay("tokenpassword");
      scAjaxHideErrorDisplay("servidor1_pruebas");
      scAjaxHideErrorDisplay("servidor2_pruebas");
      scAjaxHideErrorDisplay("servidor3_pruebas");
      scAjaxHideErrorDisplay("token_pruebas");
      scAjaxHideErrorDisplay("password_pruebas");
      scAjaxHideErrorDisplay("enviar_documento_online");
      scAjaxHideErrorDisplay("smtp_tipo");
      scAjaxHideErrorDisplay("smtp_servidor");
      scAjaxHideErrorDisplay("smtp_puerto");
      scAjaxHideErrorDisplay("smtp_usuario");
      scAjaxHideErrorDisplay("smtp_password");
      scAjaxHideErrorDisplay("contacto_nombre");
      scAjaxHideErrorDisplay("contacto_cargo");
      scAjaxHideErrorDisplay("contacto_correo");
      scAjaxHideErrorDisplay("contacto_celular");
      scAjaxHideErrorDisplay("contacto_fijo");
      scAjaxHideErrorDisplay("logo");
      scAjaxHideErrorDisplay("asunto");
      scAjaxHideErrorDisplay("mensaje");
      scAjaxHideErrorDisplay("head_note");
      scAjaxHideErrorDisplay("pie_pagina");
      scAjaxHideErrorDisplay("mensaje_nc");
      scAjaxHideErrorDisplay("pie_pagina_nc");
      scAjaxHideErrorDisplay("servidor_facturas");
      scAjaxHideErrorDisplay("servidor_nc");
      scAjaxHideErrorDisplay("correo_para_prueba");
      scAjaxHideErrorDisplay("correo_prueba");
      scAjaxHideErrorDisplay("enviar_datos_establecimiento");
      scAjaxHideErrorDisplay("nombre_pc_red");
      scAjaxHideErrorDisplay("sumarimpuestosdeldetalle");
      scAjaxHideErrorDisplay("cantidaddecimales");
      scAjaxHideErrorDisplay("valortributounidad");
      scAjaxHideErrorDisplay("conf_auto_tercero");
      scAjaxHideErrorDisplay("no_validar_mail");
      scAjaxHideErrorDisplay("email_alternativo");
      scAjaxHideErrorDisplay("desviar_correo_a");
      scAjaxHideErrorDisplay("correo_copia");
      scAjaxHideErrorDisplay("informacion_adicional");
      scAjaxHideErrorDisplay("tomar_municipio_tns");
      scAjaxHideErrorDisplay("validar_codcliente_tns");
      scAjaxHideErrorDisplay("desactivar_xml_enlista");
      scAjaxHideErrorDisplay("validar_correo_enlinea");
      scAjaxHideErrorDisplay("url_bouncer");
      scAjaxHideErrorDisplay("apikey_bouncer");
      scAjaxHideErrorDisplay("tiempo_bouncer");
      scAjaxHideErrorDisplay("url_validar_licencia");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['parent_widget']; ?>']");
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
      if (document.F1.logo_limpa && document.F1.logo_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldImage("logo", oImgTemp, "", "", "", "N");
      }
    document.F1.logo_ul_name.value = '';
    document.F1.logo_ul_type.value = '';
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_form_cloud_empresas_mob_submit_form_cb_after_alert);
  } // do_ajax_form_cloud_empresas_mob_submit_form_cb
  function do_ajax_form_cloud_empresas_mob_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_cloud_empresas_mob_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_cloud_empresas_mob_navigate_form()
  {
    perform_ajax_form_cloud_empresas_mob_navigate_form();
  }

  function perform_ajax_form_cloud_empresas_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("id_empresa");
    scAjaxHideErrorDisplay("ccnit");
    scAjaxHideErrorDisplay("nombre_razonsocial");
    scAjaxHideErrorDisplay("serial");
    scAjaxHideErrorDisplay("activo");
    scAjaxHideErrorDisplay("nit");
    scAjaxHideErrorDisplay("razon_social");
    scAjaxHideErrorDisplay("celular");
    scAjaxHideErrorDisplay("correo");
    scAjaxHideErrorDisplay("codsucursal");
    scAjaxHideErrorDisplay("direccion");
    scAjaxHideErrorDisplay("ciudad");
    scAjaxHideErrorDisplay("pagina_web");
    scAjaxHideErrorDisplay("actividad_principal");
    scAjaxHideErrorDisplay("regimen");
    scAjaxHideErrorDisplay("observaciones");
    scAjaxHideErrorDisplay("proveedor");
    scAjaxHideErrorDisplay("modo");
    scAjaxHideErrorDisplay("enviar_dian");
    scAjaxHideErrorDisplay("enviar_cliente");
    scAjaxHideErrorDisplay("servidor1");
    scAjaxHideErrorDisplay("servidor2");
    scAjaxHideErrorDisplay("servidor3");
    scAjaxHideErrorDisplay("tokenempresa");
    scAjaxHideErrorDisplay("tokenpassword");
    scAjaxHideErrorDisplay("servidor1_pruebas");
    scAjaxHideErrorDisplay("servidor2_pruebas");
    scAjaxHideErrorDisplay("servidor3_pruebas");
    scAjaxHideErrorDisplay("token_pruebas");
    scAjaxHideErrorDisplay("password_pruebas");
    scAjaxHideErrorDisplay("enviar_documento_online");
    scAjaxHideErrorDisplay("smtp_tipo");
    scAjaxHideErrorDisplay("smtp_servidor");
    scAjaxHideErrorDisplay("smtp_puerto");
    scAjaxHideErrorDisplay("smtp_usuario");
    scAjaxHideErrorDisplay("smtp_password");
    scAjaxHideErrorDisplay("contacto_nombre");
    scAjaxHideErrorDisplay("contacto_cargo");
    scAjaxHideErrorDisplay("contacto_correo");
    scAjaxHideErrorDisplay("contacto_celular");
    scAjaxHideErrorDisplay("contacto_fijo");
    scAjaxHideErrorDisplay("logo");
    scAjaxHideErrorDisplay("asunto");
    scAjaxHideErrorDisplay("mensaje");
    scAjaxHideErrorDisplay("head_note");
    scAjaxHideErrorDisplay("pie_pagina");
    scAjaxHideErrorDisplay("mensaje_nc");
    scAjaxHideErrorDisplay("pie_pagina_nc");
    scAjaxHideErrorDisplay("servidor_facturas");
    scAjaxHideErrorDisplay("servidor_nc");
    scAjaxHideErrorDisplay("correo_para_prueba");
    scAjaxHideErrorDisplay("correo_prueba");
    scAjaxHideErrorDisplay("enviar_datos_establecimiento");
    scAjaxHideErrorDisplay("nombre_pc_red");
    scAjaxHideErrorDisplay("sumarimpuestosdeldetalle");
    scAjaxHideErrorDisplay("cantidaddecimales");
    scAjaxHideErrorDisplay("valortributounidad");
    scAjaxHideErrorDisplay("conf_auto_tercero");
    scAjaxHideErrorDisplay("no_validar_mail");
    scAjaxHideErrorDisplay("email_alternativo");
    scAjaxHideErrorDisplay("desviar_correo_a");
    scAjaxHideErrorDisplay("correo_copia");
    scAjaxHideErrorDisplay("informacion_adicional");
    scAjaxHideErrorDisplay("tomar_municipio_tns");
    scAjaxHideErrorDisplay("validar_codcliente_tns");
    scAjaxHideErrorDisplay("desactivar_xml_enlista");
    scAjaxHideErrorDisplay("validar_correo_enlinea");
    scAjaxHideErrorDisplay("url_bouncer");
    scAjaxHideErrorDisplay("apikey_bouncer");
    scAjaxHideErrorDisplay("tiempo_bouncer");
    scAjaxHideErrorDisplay("url_validar_licencia");
    var var_id_empresa = document.F2.id_empresa.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_cloud_empresas_mob_navigate_form(var_id_empresa, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_cloud_empresas_mob_navigate_form_cb);
  } // do_ajax_form_cloud_empresas_mob_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_cloud_empresas_mob_navigate_form_cb(sResp)
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
    document.F2.id_empresa.value = scAjaxGetKeyValue("id_empresa");
    scAjaxSetSummary();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    document.F1.logo_ul_name.value = '';
    document.F1.logo_ul_type.value = '';
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_form_cloud_empresas_mob_navigate_form_cb_after_alert);
  } // do_ajax_form_cloud_empresas_mob_navigate_form_cb
  function do_ajax_form_cloud_empresas_mob_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_cloud_empresas_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    SC_btn_grp_text();
  } // do_ajax_form_cloud_empresas_mob_navigate_form_cb_after_alert
  function sc_hide_form_cloud_empresas_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_cloud_empresas_mob_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "id_empresa";
  ajax_field_list[1] = "ccnit";
  ajax_field_list[2] = "nombre_razonsocial";
  ajax_field_list[3] = "serial";
  ajax_field_list[4] = "activo";
  ajax_field_list[5] = "nit";
  ajax_field_list[6] = "razon_social";
  ajax_field_list[7] = "celular";
  ajax_field_list[8] = "correo";
  ajax_field_list[9] = "codsucursal";
  ajax_field_list[10] = "direccion";
  ajax_field_list[11] = "ciudad";
  ajax_field_list[12] = "pagina_web";
  ajax_field_list[13] = "actividad_principal";
  ajax_field_list[14] = "regimen";
  ajax_field_list[15] = "observaciones";
  ajax_field_list[16] = "proveedor";
  ajax_field_list[17] = "modo";
  ajax_field_list[18] = "enviar_dian";
  ajax_field_list[19] = "enviar_cliente";
  ajax_field_list[20] = "servidor1";
  ajax_field_list[21] = "servidor2";
  ajax_field_list[22] = "servidor3";
  ajax_field_list[23] = "tokenempresa";
  ajax_field_list[24] = "tokenpassword";
  ajax_field_list[25] = "servidor1_pruebas";
  ajax_field_list[26] = "servidor2_pruebas";
  ajax_field_list[27] = "servidor3_pruebas";
  ajax_field_list[28] = "token_pruebas";
  ajax_field_list[29] = "password_pruebas";
  ajax_field_list[30] = "enviar_documento_online";
  ajax_field_list[31] = "smtp_tipo";
  ajax_field_list[32] = "smtp_servidor";
  ajax_field_list[33] = "smtp_puerto";
  ajax_field_list[34] = "smtp_usuario";
  ajax_field_list[35] = "smtp_password";
  ajax_field_list[36] = "contacto_nombre";
  ajax_field_list[37] = "contacto_cargo";
  ajax_field_list[38] = "contacto_correo";
  ajax_field_list[39] = "contacto_celular";
  ajax_field_list[40] = "contacto_fijo";
  ajax_field_list[41] = "logo";
  ajax_field_list[42] = "asunto";
  ajax_field_list[43] = "mensaje";
  ajax_field_list[44] = "head_note";
  ajax_field_list[45] = "pie_pagina";
  ajax_field_list[46] = "mensaje_nc";
  ajax_field_list[47] = "pie_pagina_nc";
  ajax_field_list[48] = "servidor_facturas";
  ajax_field_list[49] = "servidor_nc";
  ajax_field_list[50] = "correo_para_prueba";
  ajax_field_list[51] = "correo_prueba";
  ajax_field_list[52] = "enviar_datos_establecimiento";
  ajax_field_list[53] = "nombre_pc_red";
  ajax_field_list[54] = "sumarimpuestosdeldetalle";
  ajax_field_list[55] = "cantidaddecimales";
  ajax_field_list[56] = "valortributounidad";
  ajax_field_list[57] = "conf_auto_tercero";
  ajax_field_list[58] = "no_validar_mail";
  ajax_field_list[59] = "email_alternativo";
  ajax_field_list[60] = "desviar_correo_a";
  ajax_field_list[61] = "correo_copia";
  ajax_field_list[62] = "informacion_adicional";
  ajax_field_list[63] = "tomar_municipio_tns";
  ajax_field_list[64] = "validar_codcliente_tns";
  ajax_field_list[65] = "desactivar_xml_enlista";
  ajax_field_list[66] = "validar_correo_enlinea";
  ajax_field_list[67] = "url_bouncer";
  ajax_field_list[68] = "apikey_bouncer";
  ajax_field_list[69] = "tiempo_bouncer";
  ajax_field_list[70] = "url_validar_licencia";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";
  ajax_block_list[1] = "1";
  ajax_block_list[2] = "2";
  ajax_block_list[3] = "3";
  ajax_block_list[4] = "4";
  ajax_block_list[5] = "5";
  ajax_block_list[6] = "6";
  ajax_block_list[7] = "7";

  var ajax_error_list = {
    "id_empresa": {"label": "Id Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ccnit": {"label": "Código Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_razonsocial": {"label": "Nombre para mostrar", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "serial": {"label": "Serial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "activo": {"label": "Activo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nit": {"label": "CC/NIT", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "razon_social": {"label": "Nombre/Razón Social", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular": {"label": "Tel/Cel", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo": {"label": "Correo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codsucursal": {"label": "Codigo Establecimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion": {"label": "Direccion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciudad": {"label": "Ciudad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pagina_web": {"label": "Pagina Web", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "actividad_principal": {"label": "Actividad Principal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "regimen": {"label": "Regimen", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "observaciones": {"label": "Observaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "proveedor": {"label": "Proveedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "modo": {"label": "Modo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enviar_dian": {"label": "Enviar  a la DIAN", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enviar_cliente": {"label": "Enviar documento al cliente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor1": {"label": "Servidor 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor2": {"label": "Servidor 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor3": {"label": "Servidor 3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tokenempresa": {"label": "Token Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tokenpassword": {"label": "Token Password", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor1_pruebas": {"label": "Servidor 1 Pruebas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor2_pruebas": {"label": "Servidor 2 Pruebas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor3_pruebas": {"label": "Servidor 3 Pruebas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "token_pruebas": {"label": "Token Pruebas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "password_pruebas": {"label": "Password Pruebas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enviar_documento_online": {"label": "Enviar Documento Online", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "smtp_tipo": {"label": "Tipo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "smtp_servidor": {"label": "Servidor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "smtp_puerto": {"label": "Puerto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "smtp_usuario": {"label": "Usuario", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "smtp_password": {"label": "Contraseña", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto_nombre": {"label": "Nombre Contacto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto_cargo": {"label": "Cargo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto_correo": {"label": "Correo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto_celular": {"label": "Tel/Cel", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contacto_fijo": {"label": "Teléfono Fijo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "logo": {"label": "Logo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "asunto": {"label": "Asunto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "mensaje": {"label": "Mensaje correo factura", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "head_note": {"label": "Cabecera", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pie_pagina": {"label": "Pie página factura", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "mensaje_nc": {"label": "Mensaje NC", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pie_pagina_nc": {"label": "Pie página NC", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor_facturas": {"label": "Servidor Facturas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "servidor_nc": {"label": "Servidor Notas Crédito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_para_prueba": {"label": "Correo para Prueba", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_prueba": {"label": "Mandar correo de prueba", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enviar_datos_establecimiento": {"label": "Enviar Datos Establecimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_pc_red": {"label": "Nombre PC red", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sumarimpuestosdeldetalle": {"label": "Sumar impuestos del detalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cantidaddecimales": {"label": "Cantidad Decimales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valortributounidad": {"label": "Valor Tributo Unidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conf_auto_tercero": {"label": "Configuracion auto tercero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no_validar_mail": {"label": "Correo alternativo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email_alternativo": {"label": "Correo alternativo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desviar_correo_a": {"label": "Desviar correo a", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_copia": {"label": "Enviar copia a", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "informacion_adicional": {"label": "Información Adicional", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tomar_municipio_tns": {"label": "Tomar el municipio de TNS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "validar_codcliente_tns": {"label": "Validar Cliente en TNS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desactivar_xml_enlista": {"label": "Desactivar XML en lista", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "validar_correo_enlinea": {"label": "Validar Correo En Línea", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "url_bouncer": {"label": "URL Bouncer", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apikey_bouncer": {"label": "Apikey Bouncer", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tiempo_bouncer": {"label": "Tiempo Bouncer", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "url_validar_licencia": {"label": "Url Validar Licencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
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
    "7": "hidden_bloco_7"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": "",
    "hidden_bloco_1": "",
    "hidden_bloco_2": "",
    "hidden_bloco_3": "",
    "hidden_bloco_4": "",
    "hidden_bloco_5": "",
    "hidden_bloco_6": "",
    "hidden_bloco_7": ""
  };

  var ajax_field_mult = {
    "id_empresa": new Array(),
    "ccnit": new Array(),
    "nombre_razonsocial": new Array(),
    "serial": new Array(),
    "activo": new Array(),
    "nit": new Array(),
    "razon_social": new Array(),
    "celular": new Array(),
    "correo": new Array(),
    "codsucursal": new Array(),
    "direccion": new Array(),
    "ciudad": new Array(),
    "pagina_web": new Array(),
    "actividad_principal": new Array(),
    "regimen": new Array(),
    "observaciones": new Array(),
    "proveedor": new Array(),
    "modo": new Array(),
    "enviar_dian": new Array(),
    "enviar_cliente": new Array(),
    "servidor1": new Array(),
    "servidor2": new Array(),
    "servidor3": new Array(),
    "tokenempresa": new Array(),
    "tokenpassword": new Array(),
    "servidor1_pruebas": new Array(),
    "servidor2_pruebas": new Array(),
    "servidor3_pruebas": new Array(),
    "token_pruebas": new Array(),
    "password_pruebas": new Array(),
    "enviar_documento_online": new Array(),
    "smtp_tipo": new Array(),
    "smtp_servidor": new Array(),
    "smtp_puerto": new Array(),
    "smtp_usuario": new Array(),
    "smtp_password": new Array(),
    "contacto_nombre": new Array(),
    "contacto_cargo": new Array(),
    "contacto_correo": new Array(),
    "contacto_celular": new Array(),
    "contacto_fijo": new Array(),
    "logo": new Array(),
    "asunto": new Array(),
    "mensaje": new Array(),
    "head_note": new Array(),
    "pie_pagina": new Array(),
    "mensaje_nc": new Array(),
    "pie_pagina_nc": new Array(),
    "servidor_facturas": new Array(),
    "servidor_nc": new Array(),
    "correo_para_prueba": new Array(),
    "correo_prueba": new Array(),
    "enviar_datos_establecimiento": new Array(),
    "nombre_pc_red": new Array(),
    "sumarimpuestosdeldetalle": new Array(),
    "cantidaddecimales": new Array(),
    "valortributounidad": new Array(),
    "conf_auto_tercero": new Array(),
    "no_validar_mail": new Array(),
    "email_alternativo": new Array(),
    "desviar_correo_a": new Array(),
    "correo_copia": new Array(),
    "informacion_adicional": new Array(),
    "tomar_municipio_tns": new Array(),
    "validar_codcliente_tns": new Array(),
    "desactivar_xml_enlista": new Array(),
    "validar_correo_enlinea": new Array(),
    "url_bouncer": new Array(),
    "apikey_bouncer": new Array(),
    "tiempo_bouncer": new Array(),
    "url_validar_licencia": new Array()
  };
  ajax_field_mult["id_empresa"][1] = "id_empresa";
  ajax_field_mult["ccnit"][1] = "ccnit";
  ajax_field_mult["nombre_razonsocial"][1] = "nombre_razonsocial";
  ajax_field_mult["serial"][1] = "serial";
  ajax_field_mult["activo"][1] = "activo";
  ajax_field_mult["nit"][1] = "nit";
  ajax_field_mult["razon_social"][1] = "razon_social";
  ajax_field_mult["celular"][1] = "celular";
  ajax_field_mult["correo"][1] = "correo";
  ajax_field_mult["codsucursal"][1] = "codsucursal";
  ajax_field_mult["direccion"][1] = "direccion";
  ajax_field_mult["ciudad"][1] = "ciudad";
  ajax_field_mult["pagina_web"][1] = "pagina_web";
  ajax_field_mult["actividad_principal"][1] = "actividad_principal";
  ajax_field_mult["regimen"][1] = "regimen";
  ajax_field_mult["observaciones"][1] = "observaciones";
  ajax_field_mult["proveedor"][1] = "proveedor";
  ajax_field_mult["modo"][1] = "modo";
  ajax_field_mult["enviar_dian"][1] = "enviar_dian";
  ajax_field_mult["enviar_cliente"][1] = "enviar_cliente";
  ajax_field_mult["servidor1"][1] = "servidor1";
  ajax_field_mult["servidor2"][1] = "servidor2";
  ajax_field_mult["servidor3"][1] = "servidor3";
  ajax_field_mult["tokenempresa"][1] = "tokenempresa";
  ajax_field_mult["tokenpassword"][1] = "tokenpassword";
  ajax_field_mult["servidor1_pruebas"][1] = "servidor1_pruebas";
  ajax_field_mult["servidor2_pruebas"][1] = "servidor2_pruebas";
  ajax_field_mult["servidor3_pruebas"][1] = "servidor3_pruebas";
  ajax_field_mult["token_pruebas"][1] = "token_pruebas";
  ajax_field_mult["password_pruebas"][1] = "password_pruebas";
  ajax_field_mult["enviar_documento_online"][1] = "enviar_documento_online";
  ajax_field_mult["smtp_tipo"][1] = "smtp_tipo";
  ajax_field_mult["smtp_servidor"][1] = "smtp_servidor";
  ajax_field_mult["smtp_puerto"][1] = "smtp_puerto";
  ajax_field_mult["smtp_usuario"][1] = "smtp_usuario";
  ajax_field_mult["smtp_password"][1] = "smtp_password";
  ajax_field_mult["contacto_nombre"][1] = "contacto_nombre";
  ajax_field_mult["contacto_cargo"][1] = "contacto_cargo";
  ajax_field_mult["contacto_correo"][1] = "contacto_correo";
  ajax_field_mult["contacto_celular"][1] = "contacto_celular";
  ajax_field_mult["contacto_fijo"][1] = "contacto_fijo";
  ajax_field_mult["logo"][1] = "logo";
  ajax_field_mult["asunto"][1] = "asunto";
  ajax_field_mult["mensaje"][1] = "mensaje";
  ajax_field_mult["head_note"][1] = "head_note";
  ajax_field_mult["pie_pagina"][1] = "pie_pagina";
  ajax_field_mult["mensaje_nc"][1] = "mensaje_nc";
  ajax_field_mult["pie_pagina_nc"][1] = "pie_pagina_nc";
  ajax_field_mult["servidor_facturas"][1] = "servidor_facturas";
  ajax_field_mult["servidor_nc"][1] = "servidor_nc";
  ajax_field_mult["correo_para_prueba"][1] = "correo_para_prueba";
  ajax_field_mult["correo_prueba"][1] = "correo_prueba";
  ajax_field_mult["enviar_datos_establecimiento"][1] = "enviar_datos_establecimiento";
  ajax_field_mult["nombre_pc_red"][1] = "nombre_pc_red";
  ajax_field_mult["sumarimpuestosdeldetalle"][1] = "sumarimpuestosdeldetalle";
  ajax_field_mult["cantidaddecimales"][1] = "cantidaddecimales";
  ajax_field_mult["valortributounidad"][1] = "valortributounidad";
  ajax_field_mult["conf_auto_tercero"][1] = "conf_auto_tercero";
  ajax_field_mult["no_validar_mail"][1] = "no_validar_mail";
  ajax_field_mult["email_alternativo"][1] = "email_alternativo";
  ajax_field_mult["desviar_correo_a"][1] = "desviar_correo_a";
  ajax_field_mult["correo_copia"][1] = "correo_copia";
  ajax_field_mult["informacion_adicional"][1] = "informacion_adicional";
  ajax_field_mult["tomar_municipio_tns"][1] = "tomar_municipio_tns";
  ajax_field_mult["validar_codcliente_tns"][1] = "validar_codcliente_tns";
  ajax_field_mult["desactivar_xml_enlista"][1] = "desactivar_xml_enlista";
  ajax_field_mult["validar_correo_enlinea"][1] = "validar_correo_enlinea";
  ajax_field_mult["url_bouncer"][1] = "url_bouncer";
  ajax_field_mult["apikey_bouncer"][1] = "apikey_bouncer";
  ajax_field_mult["tiempo_bouncer"][1] = "tiempo_bouncer";
  ajax_field_mult["url_validar_licencia"][1] = "url_validar_licencia";

  var ajax_field_id = {
    "ccnit": new Array("hidden_field_label_ccnit", "hidden_field_data_ccnit"),
    "nombre_razonsocial": new Array("hidden_field_label_nombre_razonsocial", "hidden_field_data_nombre_razonsocial"),
    "serial": new Array("hidden_field_label_serial", "hidden_field_data_serial"),
    "activo": new Array("hidden_field_label_activo", "hidden_field_data_activo"),
    "nit": new Array("hidden_field_label_nit", "hidden_field_data_nit"),
    "razon_social": new Array("hidden_field_label_razon_social", "hidden_field_data_razon_social"),
    "celular": new Array("hidden_field_label_celular", "hidden_field_data_celular"),
    "correo": new Array("hidden_field_label_correo", "hidden_field_data_correo"),
    "codsucursal": new Array("hidden_field_label_codsucursal", "hidden_field_data_codsucursal"),
    "direccion": new Array("hidden_field_label_direccion", "hidden_field_data_direccion"),
    "ciudad": new Array("hidden_field_label_ciudad", "hidden_field_data_ciudad"),
    "pagina_web": new Array("hidden_field_label_pagina_web", "hidden_field_data_pagina_web"),
    "actividad_principal": new Array("hidden_field_label_actividad_principal", "hidden_field_data_actividad_principal"),
    "regimen": new Array("hidden_field_label_regimen", "hidden_field_data_regimen"),
    "observaciones": new Array("hidden_field_label_observaciones", "hidden_field_data_observaciones"),
    "proveedor": new Array("hidden_field_label_proveedor", "hidden_field_data_proveedor"),
    "modo": new Array("hidden_field_label_modo", "hidden_field_data_modo"),
    "enviar_dian": new Array("hidden_field_label_enviar_dian", "hidden_field_data_enviar_dian"),
    "enviar_cliente": new Array("hidden_field_label_enviar_cliente", "hidden_field_data_enviar_cliente"),
    "servidor1": new Array("hidden_field_label_servidor1", "hidden_field_data_servidor1"),
    "servidor2": new Array("hidden_field_label_servidor2", "hidden_field_data_servidor2"),
    "servidor3": new Array("hidden_field_label_servidor3", "hidden_field_data_servidor3"),
    "tokenempresa": new Array("hidden_field_label_tokenempresa", "hidden_field_data_tokenempresa"),
    "tokenpassword": new Array("hidden_field_label_tokenpassword", "hidden_field_data_tokenpassword"),
    "servidor1_pruebas": new Array("hidden_field_label_servidor1_pruebas", "hidden_field_data_servidor1_pruebas"),
    "servidor2_pruebas": new Array("hidden_field_label_servidor2_pruebas", "hidden_field_data_servidor2_pruebas"),
    "servidor3_pruebas": new Array("hidden_field_label_servidor3_pruebas", "hidden_field_data_servidor3_pruebas"),
    "token_pruebas": new Array("hidden_field_label_token_pruebas", "hidden_field_data_token_pruebas"),
    "password_pruebas": new Array("hidden_field_label_password_pruebas", "hidden_field_data_password_pruebas"),
    "enviar_documento_online": new Array("hidden_field_label_enviar_documento_online", "hidden_field_data_enviar_documento_online"),
    "smtp_tipo": new Array("hidden_field_label_smtp_tipo", "hidden_field_data_smtp_tipo"),
    "smtp_servidor": new Array("hidden_field_label_smtp_servidor", "hidden_field_data_smtp_servidor"),
    "smtp_puerto": new Array("hidden_field_label_smtp_puerto", "hidden_field_data_smtp_puerto"),
    "smtp_usuario": new Array("hidden_field_label_smtp_usuario", "hidden_field_data_smtp_usuario"),
    "smtp_password": new Array("hidden_field_label_smtp_password", "hidden_field_data_smtp_password"),
    "contacto_nombre": new Array("hidden_field_label_contacto_nombre", "hidden_field_data_contacto_nombre"),
    "contacto_cargo": new Array("hidden_field_label_contacto_cargo", "hidden_field_data_contacto_cargo"),
    "contacto_correo": new Array("hidden_field_label_contacto_correo", "hidden_field_data_contacto_correo"),
    "contacto_celular": new Array("hidden_field_label_contacto_celular", "hidden_field_data_contacto_celular"),
    "contacto_fijo": new Array("hidden_field_label_contacto_fijo", "hidden_field_data_contacto_fijo"),
    "logo": new Array("hidden_field_label_logo", "hidden_field_data_logo"),
    "asunto": new Array("hidden_field_label_asunto", "hidden_field_data_asunto"),
    "mensaje": new Array("hidden_field_label_mensaje", "hidden_field_data_mensaje"),
    "head_note": new Array("hidden_field_label_head_note", "hidden_field_data_head_note"),
    "pie_pagina": new Array("hidden_field_label_pie_pagina", "hidden_field_data_pie_pagina"),
    "mensaje_nc": new Array("hidden_field_label_mensaje_nc", "hidden_field_data_mensaje_nc"),
    "pie_pagina_nc": new Array("hidden_field_label_pie_pagina_nc", "hidden_field_data_pie_pagina_nc"),
    "servidor_facturas": new Array("hidden_field_label_servidor_facturas", "hidden_field_data_servidor_facturas"),
    "servidor_nc": new Array("hidden_field_label_servidor_nc", "hidden_field_data_servidor_nc"),
    "correo_para_prueba": new Array("hidden_field_label_correo_para_prueba", "hidden_field_data_correo_para_prueba"),
    "correo_prueba": new Array("hidden_field_label_correo_prueba", "hidden_field_data_correo_prueba"),
    "enviar_datos_establecimiento": new Array("hidden_field_label_enviar_datos_establecimiento", "hidden_field_data_enviar_datos_establecimiento"),
    "nombre_pc_red": new Array("hidden_field_label_nombre_pc_red", "hidden_field_data_nombre_pc_red"),
    "sumarimpuestosdeldetalle": new Array("hidden_field_label_sumarimpuestosdeldetalle", "hidden_field_data_sumarimpuestosdeldetalle"),
    "cantidaddecimales": new Array("hidden_field_label_cantidaddecimales", "hidden_field_data_cantidaddecimales"),
    "valortributounidad": new Array("hidden_field_label_valortributounidad", "hidden_field_data_valortributounidad"),
    "conf_auto_tercero": new Array("hidden_field_label_conf_auto_tercero", "hidden_field_data_conf_auto_tercero"),
    "no_validar_mail": new Array("hidden_field_label_no_validar_mail", "hidden_field_data_no_validar_mail"),
    "email_alternativo": new Array("hidden_field_label_email_alternativo", "hidden_field_data_email_alternativo"),
    "desviar_correo_a": new Array("hidden_field_label_desviar_correo_a", "hidden_field_data_desviar_correo_a"),
    "correo_copia": new Array("hidden_field_label_correo_copia", "hidden_field_data_correo_copia"),
    "informacion_adicional": new Array("hidden_field_label_informacion_adicional", "hidden_field_data_informacion_adicional"),
    "tomar_municipio_tns": new Array("hidden_field_label_tomar_municipio_tns", "hidden_field_data_tomar_municipio_tns"),
    "validar_codcliente_tns": new Array("hidden_field_label_validar_codcliente_tns", "hidden_field_data_validar_codcliente_tns"),
    "desactivar_xml_enlista": new Array("hidden_field_label_desactivar_xml_enlista", "hidden_field_data_desactivar_xml_enlista"),
    "validar_correo_enlinea": new Array("hidden_field_label_validar_correo_enlinea", "hidden_field_data_validar_correo_enlinea"),
    "url_bouncer": new Array("hidden_field_label_url_bouncer", "hidden_field_data_url_bouncer"),
    "apikey_bouncer": new Array("hidden_field_label_apikey_bouncer", "hidden_field_data_apikey_bouncer"),
    "tiempo_bouncer": new Array("hidden_field_label_tiempo_bouncer", "hidden_field_data_tiempo_bouncer")
  };

  var ajax_read_only = {
    "id_empresa": "on",
    "ccnit": "off",
    "nombre_razonsocial": "off",
    "serial": "off",
    "activo": "off",
    "nit": "off",
    "razon_social": "off",
    "celular": "off",
    "correo": "off",
    "codsucursal": "off",
    "direccion": "off",
    "ciudad": "off",
    "pagina_web": "off",
    "actividad_principal": "off",
    "regimen": "off",
    "observaciones": "off",
    "proveedor": "off",
    "modo": "off",
    "enviar_dian": "off",
    "enviar_cliente": "off",
    "servidor1": "off",
    "servidor2": "off",
    "servidor3": "off",
    "tokenempresa": "off",
    "tokenpassword": "off",
    "servidor1_pruebas": "off",
    "servidor2_pruebas": "off",
    "servidor3_pruebas": "off",
    "token_pruebas": "off",
    "password_pruebas": "off",
    "enviar_documento_online": "off",
    "smtp_tipo": "off",
    "smtp_servidor": "off",
    "smtp_puerto": "off",
    "smtp_usuario": "off",
    "smtp_password": "off",
    "contacto_nombre": "off",
    "contacto_cargo": "off",
    "contacto_correo": "off",
    "contacto_celular": "off",
    "contacto_fijo": "off",
    "logo": "off",
    "asunto": "off",
    "mensaje": "off",
    "head_note": "off",
    "pie_pagina": "off",
    "mensaje_nc": "off",
    "pie_pagina_nc": "off",
    "servidor_facturas": "off",
    "servidor_nc": "off",
    "correo_para_prueba": "off",
    "correo_prueba": "off",
    "enviar_datos_establecimiento": "off",
    "nombre_pc_red": "off",
    "sumarimpuestosdeldetalle": "off",
    "cantidaddecimales": "off",
    "valortributounidad": "off",
    "conf_auto_tercero": "off",
    "no_validar_mail": "off",
    "email_alternativo": "off",
    "desviar_correo_a": "off",
    "correo_copia": "off",
    "informacion_adicional": "off",
    "tomar_municipio_tns": "off",
    "validar_codcliente_tns": "off",
    "desactivar_xml_enlista": "off",
    "validar_correo_enlinea": "off",
    "url_bouncer": "off",
    "apikey_bouncer": "off",
    "tiempo_bouncer": "off",
    "url_validar_licencia": "off"
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
    if ("id_empresa" == sIndex)
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
    if ("ccnit" == sIndex)
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
    if ("nombre_razonsocial" == sIndex)
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
    if ("activo" == sIndex)
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
    if ("nit" == sIndex)
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
    if ("razon_social" == sIndex)
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
    if ("celular" == sIndex)
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
    if ("correo" == sIndex)
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
    if ("codsucursal" == sIndex)
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
    if ("ciudad" == sIndex)
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
    if ("pagina_web" == sIndex)
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
    if ("actividad_principal" == sIndex)
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
    if ("observaciones" == sIndex)
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
    if ("proveedor" == sIndex)
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
    if ("modo" == sIndex)
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
    if ("enviar_dian" == sIndex)
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
    if ("enviar_cliente" == sIndex)
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
    if ("servidor1" == sIndex)
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
    if ("servidor2" == sIndex)
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
    if ("servidor3" == sIndex)
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
    if ("tokenempresa" == sIndex)
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
    if ("tokenpassword" == sIndex)
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
    if ("servidor1_pruebas" == sIndex)
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
    if ("servidor2_pruebas" == sIndex)
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
    if ("servidor3_pruebas" == sIndex)
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
    if ("token_pruebas" == sIndex)
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
    if ("password_pruebas" == sIndex)
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
    if ("enviar_documento_online" == sIndex)
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
    if ("smtp_tipo" == sIndex)
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
    if ("smtp_servidor" == sIndex)
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
    if ("smtp_puerto" == sIndex)
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
    if ("smtp_usuario" == sIndex)
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
    if ("smtp_password" == sIndex)
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
    if ("contacto_nombre" == sIndex)
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
    if ("contacto_cargo" == sIndex)
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
    if ("contacto_correo" == sIndex)
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
    if ("contacto_celular" == sIndex)
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
    if ("contacto_fijo" == sIndex)
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
    if ("logo" == sIndex)
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
    if ("asunto" == sIndex)
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
    if ("mensaje" == sIndex)
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
    if ("head_note" == sIndex)
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
    if ("pie_pagina" == sIndex)
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
    if ("mensaje_nc" == sIndex)
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
    if ("pie_pagina_nc" == sIndex)
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
    if ("servidor_facturas" == sIndex)
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
    if ("servidor_nc" == sIndex)
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
    if ("correo_para_prueba" == sIndex)
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
    if ("correo_prueba" == sIndex)
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
    if ("enviar_datos_establecimiento" == sIndex)
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
    if ("nombre_pc_red" == sIndex)
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
    if ("sumarimpuestosdeldetalle" == sIndex)
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
    if ("cantidaddecimales" == sIndex)
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
    if ("valortributounidad" == sIndex)
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
    if ("conf_auto_tercero" == sIndex)
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
    if ("no_validar_mail" == sIndex)
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
    if ("email_alternativo" == sIndex)
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
    if ("desviar_correo_a" == sIndex)
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
    if ("correo_copia" == sIndex)
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
    if ("informacion_adicional" == sIndex)
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
    if ("tomar_municipio_tns" == sIndex)
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
    if ("validar_codcliente_tns" == sIndex)
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
    if ("desactivar_xml_enlista" == sIndex)
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
    if ("url_bouncer" == sIndex)
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
    if ("apikey_bouncer" == sIndex)
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
    if ("tiempo_bouncer" == sIndex)
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
    if ("url_validar_licencia" == sIndex)
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
