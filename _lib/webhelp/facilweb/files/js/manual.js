    var lang = "en_us";
    var pageFrame, str_path_name, str_path, menu_tree, selected_node;
    var nav_lang = {pt_br:"Você está aqui: ", en_us:"You are here: ",es_es:"Usted está aquí: "}
    var obj_tag_name = "";

    function resizewindow(){
            vindice = document.getElementById('idindice');
            vbody = document.getElementById('idbody');
            //idindice.style.display = 'none';
            if(vindice.style.display == "none"){
                    vindice.style.display = 'block';
                    vbody.style.width = "75%";
            }
            else{
                    vindice.style.display = "none";
                    vbody.style.width = "99%";
            }

    }
        
    function nm_iframeRef( frameRef ) 
    {
        return frameRef.contentWindow ? frameRef.contentWindow.document : frameRef.contentDocument
    }

    function nm_create_nav_links(link_amigavel, file_path) {
            var AText = "";
            var nav_link = document.createElement('span');
            nav_link.setAttribute("class","hc-nav-link");

            if (typeof link_amigavel == 'undefined') 
            {
                    var AText = document.createTextNode("Home");
                    var href = window.location.href;
                    href = href.split('facilweb.htm');
                    nav_link.setAttribute("onclick","javascript:parent.window.location.replace('"+href[0]+"facilweb.htm');");
                    nav_link.setAttribute("target","_parent");
            } 
            else 
            {
                    var AText = document.createTextNode(link_amigavel);
                    var aux = file_path.split('_');
                    aux[1] = parseInt(aux[1]) + 1;
                    file_path = aux.join('_');
                    nav_link.setAttribute("onclick", "parent.nm_node_navigate('"+file_path+"');");
            }

            nav_link.appendChild(AText);

            return nav_link;
    }

    function nm_nav_prepend(tag_element) 
    {
            var lastParent_node = "";
            var aux_arr_ele = [];
            pageFrame = nm_iframeRef( document.getElementById('id_bodyContent') ).documentElement;
            if (typeof pageFrame.getElementsByTagName('body')[0] === 'undefined') 
            {
                    return false;
            } 
            else 
            {
                    if (typeof tag_element === 'undefined' || tag_element === '') {
                        var obj_h1 = pageFrame.getElementsByTagName('body')[0].firstChild;
                    } else if (typeof pageFrame.getElementsByTagName(tag_element) !== 'undefined' && pageFrame.getElementsByTagName(tag_element)[0].nextElementSibling != null) {
                        var obj_h1 = pageFrame.getElementsByTagName(tag_element)[0].nextElementSibling;
                    } else {
                        var obj_h1 = pageFrame.getElementsByTagName('body')[0].firstChild;
                    }
                    
                    var nav_div = document.createElement("div");
                    nav_div.setAttribute("class","hc-nav-bar");

                    //Adiciona o 1 elemento da navegação.
                    var hereYouAre = document.createElement('span');
                    var AText = document.createTextNode(nav_lang[manual_lang]);
                    hereYouAre.appendChild(AText);
                    nav_div.appendChild(hereYouAre);

                    //Quebra a URL amigavel e caminho relativo em um array.
                    var html_nav_links = str_path_name.replace(/\?item=/g, "").replace().replace(/-/g, " ");
                    html_nav_links = html_nav_links.split('/');
                    str_path = str_path.split('/');
                    //Monta a navegaçãodo ultimo nó ao primeiro
                    var node = menu_tree.get_node(selected_node);
                    aux_arr_ele.push(nm_create_nav_span(node.text));
                    for (var i = 0; i < node.parents.length; i++) 
                    {
                            var parent = menu_tree.get_node(node.parents[i]);
                            aux_arr_ele.push(nm_create_nav_span());
                            aux_arr_ele.push(nm_create_nav_links(parent.text, parent.id));
                    }
                    //adiciona os elementos
                    for (var i = aux_arr_ele.length - 1; i >= 0; i--) { nav_div.appendChild(aux_arr_ele[i]); }
                    if (obj_h1 != null) {
                        obj_h1.parentNode.insertBefore(nav_div, obj_h1);
                        return true;
                    } else {
                        return false;
                    }
            }
    }

    function nm_node_navigate(id_node) 
    {
            menu_tree.deselect_all();
            menu_tree.select_node(id_node);
    }
        
    function nm_create_nav_span(text) 
    {
            var span = document.createElement('span');

            if (typeof text === 'undefined') { var AText = document.createTextNode(' >> '); }
            else { var AText = document.createTextNode(text); }

            span.appendChild(AText);	
            return span;
    }
        
    function printpage(){
            var newurl = parent.document.getElementById('idbody');
            var janela_largura = screen.availWidth;
            var janela_altura = screen.availHeight;
            var setting = 'scrollbars=yes,status=no,toolbar=no,menubar=yes,width='+janela_largura;	 
            setting += ',height='+janela_altura+',left=20,top=10,resizable=no';
            window.open(newurl.src,'',setting);	
    }

    function changePage(page)
    {
            var folder = document.location.href.split('facilweb.htm')[0];
            window.history.pushState("Web Help", "Web Help", folder + 'facilweb.htm?item='+page);
            if(document.location.href.indexOf(folder + 'facilweb.htm?item='+page) < 0)
            {
                    document.location.href = folder + 'facilweb.htm?item='+page;
            }
    }

    function changeInternalPage(page)
    {
            page = page.replace(/(\.\.\/)+/g, "");
            if(page == 'home')
            {
                            $('#id_bodyContent').attr('src', document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/_home.htm');
            }
            else if($("a[data-rel='"+page+"']").length == 0)
            {
                    $.jstree.reference('#id_menu').open_all();
                    $('#id_bodyContent').attr('src',document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page);
                    window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page, "bodyContent");

                    $("a[data-rel='"+ page +"']").click();
                    var ids = $.jstree.reference('#id_menu').get_selected(true)[0].parents;
                    $.jstree.reference('#id_menu').close_all();
                    for(var i = ids.length -1; i>=0;i--)
                    {
                            if(ids[i] == '#') continue;
                            $('#'+ids[i] + ' > a').click();
                    }
                    $("a[data-rel='"+ page +"']").click();
            }
            else
            {
                    $("a[data-rel='"+ page +"']").click();
                    window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ page, "bodyContent");
            }

    }

    $(function () {
            $('#id_bodyContent').load(function(){

                    var iframe = $('#id_bodyContent').contents();

                    iframe.find("a").click(function(){
                            if($(this).attr('href').substr(0,1) != '#' && $(this).attr('href').substr(0,7) != 'http://' && $(this).attr('href').substr(0,8) != 'https://')
                            {
                                   changeInternalPage($(this).attr('href'));
                            }
                    });
            });
            var max_height = $('body').height() - ($('.hc_header_container').height() + 66);
            $('#search').css('max-height', max_height);
            $('#id_menu').css('max-height',(max_height-20));
    });