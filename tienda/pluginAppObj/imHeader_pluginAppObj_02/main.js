function decode_html(encoded) {
    encoded = replaceAll("&amp;gt;", ">", encoded);
    encoded = replaceAll("&amp;lt;", "<", encoded);
    encoded = replaceAll("\\\'", "\'", encoded);
    encoded = replaceAll("&quot;", "\"", encoded);
    encoded = replaceAll("&lt;br /&gt;", "\n", encoded);
    encoded = replaceAll("&amp;", "&", encoded);
    encoded = replaceAll("\\\\", "\\", encoded);
    return encoded;
}

function replaceAll(find, replace, str) {
    return str.replace(new RegExp(find, 'g'), replace);
}

function fontAwesomeIcons_imHeader_pluginAppObj_02() {
    
    function getClassIcon(){   
        var fileName = ""; 
   
        switch("web_application_icons") {
            case "web_application_icons":
                fileName = "phone.png";
                break;
            case "accessibility_icons":
                 fileName = "";
                break;
            case "hand_icons":
                 fileName = ""; 
                break;
            case "transportation_icons":
                 fileName = ""; 
                break;
            case "gender_icons":
                 fileName = ""; 
                break;
            case "file_type_icons":
                 fileName = ""; 
                break;
            case "spinner_icons":
                 fileName = ""; 
                break;
            case "form_control_icons":
                 fileName = ""; 
                break;
            case "payment_icons":
                 fileName = ""; 
                break;
            case "chart_icons":
                 fileName = ""; 
                break;
            case "currency_icons":
                 fileName = ""; 
                break;
            case "text_editor_icons":
                 fileName = ""; 
                break;
            case "directional_icons":
                 fileName = ""; 
                break;
            case "video_player_icons":
                 fileName = ""; 
                break;
            case "brand_icons":
                 fileName = ""; 
                break;
            case "medical_icons":
                 fileName = ""; 
                break;
        }

        fileName = "fa fa-" + fileName.replace(".png",""); 
        return fileName;
    }
       
    $(document).ready(function(){
         
        var link = $(".imHeader_pluginAppObj_02_child");
        var icon = $("#imHeader_pluginAppObj_02_icon");
        $(icon).removeClass().addClass(getClassIcon());
        
        switch("none") {
            case "grow":
                $(link).addClass("grow");
                break;
            case "shrink":
                 $(link).addClass("shrink");
                break;
            case "shake":
                 $(link).addClass("shake");
                break;
            case "float":
                 $(link).addClass("float");
                break;
        }
    });
}