function grid_dev_com_fecha_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_fecha" + seqRow).html();
}

function grid_dev_com_fecha_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_fecha" + seqRow).html(newValue);
}

function grid_dev_com_cantidad_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_cantidad" + seqRow).html();
}

function grid_dev_com_cantidad_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_cantidad" + seqRow).html(newValue);
}

function grid_dev_com_presentacion_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_presentacion" + seqRow).html();
}

function grid_dev_com_presentacion_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_presentacion" + seqRow).html(newValue);
}

function grid_dev_com_idpro_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_idpro" + seqRow).html();
}

function grid_dev_com_idpro_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_idpro" + seqRow).html(newValue);
}

function grid_dev_com_colores_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_colores" + seqRow).html();
}

function grid_dev_com_colores_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_colores" + seqRow).html(newValue);
}

function grid_dev_com_tallas_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tallas" + seqRow).html();
}

function grid_dev_com_tallas_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tallas" + seqRow).html(newValue);
}

function grid_dev_com_sabor_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_sabor" + seqRow).html();
}

function grid_dev_com_sabor_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_sabor" + seqRow).html(newValue);
}

function grid_dev_com_costo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_costo" + seqRow).html();
}

function grid_dev_com_costo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_costo" + seqRow).html(newValue);
}

function grid_dev_com_valorparcial_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_valorparcial" + seqRow).html();
}

function grid_dev_com_valorparcial_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_valorparcial" + seqRow).html(newValue);
}

function grid_dev_com_devo_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_devo" + seqRow).find("i").attr("src");
}

function grid_dev_com_devo_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_devo" + seqRow).find("img").attr("src", newValue);
}

function grid_dev_com_idinv_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_Hidden_idinv" + seqRow).html();
}

function grid_dev_com_idinv_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_idinv" + seqRow).html(newValue);
}
function grid_dev_com_idinv_Hidden_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_Hidden_idinv" + seqRow).html(newValue);
}

function grid_dev_com_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  var SC_tmp = "";
  if ("fecha" == field) {
    SC_tmp = grid_dev_com_fecha_getValue(seqRow);
  }
  if ("cantidad" == field) {
    SC_tmp = grid_dev_com_cantidad_getValue(seqRow);
  }
  if ("presentacion" == field) {
    SC_tmp = grid_dev_com_presentacion_getValue(seqRow);
  }
  if ("idpro" == field) {
    SC_tmp = grid_dev_com_idpro_getValue(seqRow);
  }
  if ("colores" == field) {
    SC_tmp = grid_dev_com_colores_getValue(seqRow);
  }
  if ("tallas" == field) {
    SC_tmp = grid_dev_com_tallas_getValue(seqRow);
  }
  if ("sabor" == field) {
    SC_tmp = grid_dev_com_sabor_getValue(seqRow);
  }
  if ("costo" == field) {
    SC_tmp = grid_dev_com_costo_getValue(seqRow);
  }
  if ("valorparcial" == field) {
    SC_tmp = grid_dev_com_valorparcial_getValue(seqRow);
  }
  if ("devo" == field) {
    SC_tmp = grid_dev_com_devo_getValue(seqRow);
  }
  if ("idinv" == field) {
    SC_tmp = grid_dev_com_idinv_getValue(seqRow);
  }
  if (typeof(SC_tmp) == 'undefined') {
      SC_tmp = "";
  }
  else {
      SC_tmp = SC_tmp.replace(/[+]/g, "__NM_PLUS__");
      while (SC_tmp.lastIndexOf("&amp;") != -1)
      {
         SC_tmp = SC_tmp.replace("&amp;" , "__NM_AMP__");
      }
      SC_tmp = SC_tmp.replace(/[&]/g, "__NM_AMP__");
      SC_tmp = SC_tmp.replace(/[%]/g, "__NM_PRC__");
  }
  return SC_tmp;
}

function grid_dev_com_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("fecha" == field) {
    grid_dev_com_fecha_setValue(newValue, seqRow);
  }
  if ("cantidad" == field) {
    grid_dev_com_cantidad_setValue(newValue, seqRow);
  }
  if ("presentacion" == field) {
    grid_dev_com_presentacion_setValue(newValue, seqRow);
  }
  if ("idpro" == field) {
    grid_dev_com_idpro_setValue(newValue, seqRow);
  }
  if ("colores" == field) {
    grid_dev_com_colores_setValue(newValue, seqRow);
  }
  if ("tallas" == field) {
    grid_dev_com_tallas_setValue(newValue, seqRow);
  }
  if ("sabor" == field) {
    grid_dev_com_sabor_setValue(newValue, seqRow);
  }
  if ("costo" == field) {
    grid_dev_com_costo_setValue(newValue, seqRow);
  }
  if ("valorparcial" == field) {
    grid_dev_com_valorparcial_setValue(newValue, seqRow);
  }
  if ("devo" == field) {
    grid_dev_com_devo_setValue(newValue, seqRow);
  }
  if ("idinv" == field) {
    grid_dev_com_idinv_setValue(newValue, seqRow);
  }
  if ("idinv_Hidden" == field) {
    grid_dev_com_idinv_Hidden_setValue(newValue, seqRow);
  }
}

function scJQAddEvents(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_devo" + seqRow).click(function () {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_event&nmgp_event=devo_onClick&script_case_init=" + document.F3.script_case_init.value + "&devo=" + grid_dev_com_getValue("devo", seqRow) + "&idinv=" + grid_dev_com_getValue("idinv", seqRow) + ""
     })
     .done(function(jsonReturn) {
        var i, fieldDisplay, oResp;
        Tst_integrid = jsonReturn.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonReturn);
            return;
        }
        eval("oResp = " + jsonReturn);
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            grid_dev_com_setValue(oResp["setValue"][i]["field"], oResp["setValue"][i]["value"], seqRow);
          }
        }
        if (oResp["fieldDisplay"]) {
          for (i = 0; i < oResp["fieldDisplay"].length; i++) {
            if ("off" == oResp["fieldDisplay"][i]["status"]) {
              $("#id_sc_field_" + oResp["fieldDisplay"][i]["field"] + seqRow).hide();
            }
            else {
              $("#id_sc_field_" + oResp["fieldDisplay"][i]["field"] + seqRow).show();
            }
          }
        }
        if (oResp["Refresh"]) {
           nm_gp_move('igual');
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
    });
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", "pointer"); })
    .addClass(($("#id_sc_field_devo" + seqRow).parent().hasClass("scGridFieldOddFont") ? "scGridFieldOddLink" : "scGridFieldEvenLink"));

}

function scSeqNormalize(seqRow) {
  var newSeqRow = seqRow.toString();
  if ("" == newSeqRow) {
    return "";
  }
  if ("_" != newSeqRow.substr(0, 1)) {
    return "_" + newSeqRow;
  }
  return newSeqRow;
}
  function nmAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null) {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"]) {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo) {
      if ("parent.parent" == oResp["redirInfo"]["target"]) {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"]) {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"]) {
        window.open(sAction, "_blank");
      }
      else {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo) {
        document.write(nmAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else {
      if (oResp["redirInfo"]["target"] == "modal") {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir) {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  }
var json_err_crtl    = 1;
var Id_Btn_selected  = new Array();
var Css_Btn_selected = new Array();
function ajax_navigate(opc, parm)
{
    var scrollNavigateReload = false, extraParams = "", iEvt, iStart = 0;
    for (ibtn = 0; ibtn < 0; ibtn++) {
        Css_Btn_selected[ibtn] = $("#" + Id_Btn_selected[ibtn]).attr('class');
    }
    nmAjaxProcOn();
    if (scrollNavigateReload) {
      extraParams += "&scrollNavigateReload=Y";
    }
    if (typeof parm !== "string") {
      parm = parm.toString();
    }
    parm = parm.replace(/[+]/g, "__NM_PLUS__");
    while (parm.lastIndexOf("&amp;") != -1)
    {
       parm = parm.replace("&amp;" , "__NM_AMP__");
    }
    parm = parm.replace(/[&]/g, "__NM_AMP__");
    parm = parm.replace(/[%]/g, "__NM_PRC__");
    parm_save = parm;
    return new Promise(function(resolve, reject) {$.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&script_case_init=" + document.F4.script_case_init.value + "&opc=" + opc  + "&parm=" + parm + extraParams
     })
     .fail(function(jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        if (json_err_crtl == 1) {
            json_err_crtl++;
            ajax_navigate(opc, parm);
        }
        else {
            nmAjaxProcOff();
            json_err_crtl = 1;
            alert (err);
        }
     })
     .done(function(jsonNavigate) {
        var i, oResp;
        json_err_crtl = 1;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        document.getElementById('nmsc_iframe_liga_A_grid_dev_com').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_dev_com').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_dev_com').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_dev_com').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_dev_com').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_dev_com').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_dev_com').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_dev_com').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_dev_com').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_dev_com').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_dev_com').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_dev_com').style.width  = '0px';
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setTitle"]) {
          for (i = 0; i < oResp["setTitle"].length; i++) {
            $("#" + oResp["setTitle"][i]["field"]).attr('title', oResp["setTitle"][i]["value"]);
          }
        }
        if (oResp["setArr"]) {
          for (i = 0; i < oResp["setArr"].length; i++) {
               eval (oResp["setArr"][i]["var"] + ' = new Array()');
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["fillArr"]) {
          for (i = 0; i < oResp["fillArr"].length; i++) {
               eval (oResp["fillArr"][i]["var"] + ' = {' + oResp["fillArr"][i]["value"] + '}');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
            if (document.getElementById(oResp["setDisplay"][i]["field"])) {
              document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
            }
          }
        }
        if (oResp["setVisibility"]) {
          for (i = 0; i < oResp["setVisibility"].length; i++) {
            if (document.getElementById(oResp["setVisibility"][i]["field"])) {
              document.getElementById(oResp["setVisibility"][i]["field"]).style.visibility = oResp["setVisibility"][i]["value"];
            }
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
            if (document.getElementById(oResp["setDisabled"][i]["field"])) {
              document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
            }
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
            if (document.getElementById(oResp["setClass"][i]["field"])) {
              document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
            }
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
            if (document.getElementById(oResp["setSrc"][i]["field"])) {
              document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
            }
          }
        }
        if (oResp["remove_Obj"]) {
          for (i = 0; i < oResp["remove_Obj"].length; i++) {
            if (document.getElementById(oResp["remove_Obj"][i])) {
              document.getElementById(oResp["remove_Obj"][i]).remove();
            }
          }
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["AlertJS"]) {
          for (i = 0; i < oResp["AlertJS"].length; i++) {
              jsAlertParams = oResp["AlertJSParam"][i] ? oResp["AlertJSParam"][i] : {};
              scJs_alert (oResp["AlertJS"][i], jsAlertParams);
          }
        }
        if (oResp["exec_JS"]) {
          for (i = 0; i < oResp["exec_JS"].length; i++) {
               eval (oResp["exec_JS"][i]["function"] + '("' + oResp["exec_JS"][i]["parm"] + '");');
          }
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
        if (!SC_Link_View)
        {
            if (Qsearch_ok)
            {
                scQuickSearchKeyUp('top', null);
            }
            SC_init_jquery(false);
            tb_init('a.thickbox, area.thickbox, input.thickbox');
        }
        for (ibtn = 0; ibtn < 0; ibtn++) {
             $("#" + Id_Btn_selected[ibtn]).attr('class', Css_Btn_selected[ibtn]);
        }
        nmAjaxProcOff();
        if (typeof(bootstrapMobile) === typeof(function(){})) bootstrapMobile();
        resolve();
    })});
}
function ajax_navigate_res(opc, parm)
{
    nmAjaxProcOn();
    parm_save = parm;
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&script_case_init=" + document.FRES.script_case_init.value + "&opc=" + opc  + "&parm=" + parm
     })
     .done(function(jsonNavigate) {
        var i, oResp;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setTitle"]) {
          for (i = 0; i < oResp["setTitle"].length; i++) {
            $("#" + oResp["setTitle"][i]["field"]).attr('title', oResp["setTitle"][i]["value"]);
          }
        }
        if (oResp["setArr"]) {
          for (i = 0; i < oResp["setArr"].length; i++) {
               eval (oResp["setArr"][i]["var"] + ' = new Array()');
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["fillArr"]) {
          for (i = 0; i < oResp["fillArr"].length; i++) {
               eval (oResp["fillArr"][i]["var"] + ' = {' + oResp["fillArr"][i]["value"] + '}');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
            if (document.getElementById(oResp["setDisplay"][i]["field"])) {
              document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
            }
          }
        }
        if (oResp["setVisibility"]) {
          for (i = 0; i < oResp["setVisibility"].length; i++) {
            if (document.getElementById(oResp["setVisibility"][i]["field"])) {
              document.getElementById(oResp["setVisibility"][i]["field"]).style.visibility = oResp["setVisibility"][i]["value"];
            }
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
            if (document.getElementById(oResp["setDisabled"][i]["field"])) {
              document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
            }
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
            if (document.getElementById(oResp["setClass"][i]["field"])) {
              document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
            }
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
            if (document.getElementById(oResp["setSrc"][i]["field"])) {
              document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
            }
          }
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["AlertJS"]) {
          for (i = 0; i < oResp["AlertJS"].length; i++) {
              jsAlertParams = oResp["AlertJSParam"][i] ? oResp["AlertJSParam"][i] : {};
              scJs_alert (oResp["AlertJS"][i], jsAlertParams);
          }
        }
        if (oResp["exec_JS"]) {
          for (i = 0; i < oResp["exec_JS"].length; i++) {
               eval (oResp["exec_JS"][i]["function"] + '("' + oResp["exec_JS"][i]["parm"] + '");');
          }
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
        nmAjaxProcOff();
        if (oResp["exec_script"]) {
          for (i = 0; i < oResp["exec_script"].length; i++) {
              eval (oResp["exec_script"][i]);
          }
        }
    });
}
function ajax_save_ancor(f_submit, ancor)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_save_ancor&script_case_init=" + document.F3.script_case_init.value + "&ancor_save=" + ancor
     })
     .done(function(jsonSaveAncor) {
        nmAjaxProcOff();
        eval ("document." + f_submit + ".submit()");
    });
}
var strPath         = '';
var strTitle        = '';
var showAjaxProcess = true;
function ajax_export(tp_export, parms, strCallback, showAjax)
{
    strPath  = '';
    strTitle  = '';
    showAjaxProcess = showAjax;
    if(showAjaxProcess)
    {
        nmAjaxProcOn();
    }
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_export&export_opc=" + tp_export + parms + "&script_case_init=" + document.F3.script_case_init.value,
      complete: strCallback,
     })
     .done(function(jsonFile) {
        var oResp;
        Tst_integrid = jsonFile.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonFile);
            return;
        }
        eval("oResp = " + jsonFile);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
        if (oResp["file_export"]) {
            strPath = oResp['file_export'];
            strTitle = oResp['title_export'];
        }
        if(showAjaxProcess)
        {
            nmAjaxProcOff();
        }
    });
}

