    $(function () {
        $( "#tabs" ).tabs();
        $('#id_menu').jstree({
                'plugins' : [ 'themes', 'html_data' ]
        }).on("select_node.jstree",function(e, data) {
                str_link        = '';
                str_link_real   = '';
                if(data.instance.is_leaf(data.node))
                {
                    var closedParents = data.node.parents;
                    for(var i=closedParents.length-1;i>=0;i--){
                            if(closedParents[i] == '#' || $('#'+closedParents[i]).hasClass("jstree-leaf") || $('#'+ closedParents[i]).hasClass("jstree-open") ) continue;
                            data.instance.toggle_node(closedParents[i]);
                    }
                    selected_node = data.node.id;
                    str_link      = data.node.a_attr.href;
                    str_link_real = $('#' + data.node.id + ' a ').attr('data-rel');
                    str_path_name = str_link;
                    str_path = str_link_real;
                }
                else
                {
                        data.instance.toggle_node(data.node);
                }

                //test link type
                if(str_link != '')
                {
                    if(str_link.substring(0, 11) == 'javascript:')
                    {
                        eval(str_link.substring(11));
                    }
                    else if(str_link != '#')
                    {
                        str_link = str_link_real;
                        var url_url = document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ str_link;
                        if(url_url != $('#id_bodyContent').attr('src'))
                        {
                            window.open(url_url, "bodyContent");
                            $('#id_bodyContent').attr('src', url_url);
                            changePage(str_link);
                        }
                    }
                }
        });
        
        var _url = top.document.location.href.split('facilweb.htm?item=');
        if(_url.length == 2 && _url[1] != '')
        {
                if(_url[1] == 'home')
                {
                        $('#id_bodyContent').attr('src', document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/_home.htm');
                }
                else if($("a[data-rel='"+_url[1]+"']").length == 0)
                {
                        $.jstree.reference('#id_menu').open_all();
                        $('#id_bodyContent').attr('src',document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ _url[1]);
                        window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ _url[1], "bodyContent");

                        $("a[data-rel='"+_url[1]+"']").click();
                        var ids = $.jstree.reference('#id_menu').get_selected(true)[0].parents;
                        $.jstree.reference('#id_menu').close_all();
                        for(var i = ids.length -1; i>=0;i--)
                        {
                                if(ids[i] == '#') continue;
                                $('#'+ids[i] + ' > a').click();

                        }
                        $("a[data-rel='"+_url[1]+"']").click();
                }
                else
                {
                        window.open(document.location.origin + (document.location.pathname).replace(/\\/g, "/").replace(/\/[^\/]*\/?$/, "") + '/'+ _url[1], "bodyContent");
                }
        }
    });