<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="./ajax/css/style.css" type="text/css" rel="stylesheet">
        <script src="./ajax/js/jquery-1.7.1.min.js"></script>
        <title>Programa .:FERRO:.</title>
        <script language="javascript">
            var cursor;
            if (document.all) {
                // Est� utilizando EXPLORER
                cursor='hand';
            } else {
                // Est� utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
            
            function verificar() {
                $.post('comprobar_acceso.php', $('#formulario').serialize(), function(msg) {
                    eval('var resp=' + msg);
                    if (resp.estado == 0) {
                        $("#fallo p").html(resp.tx).fadeIn(1000);
                        $('#usuario, #clave').val('');
                        $('#usuario').focus();
                    }
                    else {
                        $('#formulario').submit();
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="fallo"><p></p></div>
        <div id="container">
            <form action="inicial.php" method="post" name="formulario" id="formulario">
                <div class="login">LOGIN</div>
                <div class="username-text">Usuario:</div>
                <div class="password-text">Clave:</div>
                <div class="username-field">
                    <input type="text" name="usuario" value="" />
                </div>
                <div class="password-field">
                    <input type="password" name="clave" value="" />
                </div>
                <div class="forgot-usr-pwd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El programa est&aacute; optimizado para 1024x768</div>
                <input type="btenviar" name="enviar" onClick="javascript:verificar()" value="ENTRAR" onMouseOver="style.cursor=cursor">
            </form>
        </div>
    </body>
</html>
