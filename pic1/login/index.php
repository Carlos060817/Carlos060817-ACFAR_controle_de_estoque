<?php

require_once 'functions.php';
\Login\index();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css_login/tela_login.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>node_modules/fonts/css/fontawesome.css">
</head>
<body>
<div class="fundo">
    <table>
        <tr>
            <td class="celula">
                <div class="alinhamento_texto">
                    <h2 class="texto1">Muito obrigado por fazer parte<br> da ACFAR!!</h2>

                </div>
            </td>
        </tr>
    </table>
</div>

<div class="form">
    <div class="form">
        <table class='centralizar'>
            <form class="form-signin" action="" method="post">
                <div class="input">
                    <img src="https://cdn4.iconfinder.com/data/icons/forum-buttons-and-community-signs-1/794/profile-3-512.png"
                         class="logousuario">
                    <input class="form-control usuario" type="text" id="nome" placeholder="Usuario"
                           name="login['login']" required>
                    <input class="form-control senha" type="password" id="senha" placeholder="Senha"
                           name="login['senha']" required>
                </div>

                <div class="botao">
                    <div class="botao1">
                        <button class="btn btn-primary cadastro" type="submit">Conectar</button>
                    </div>
                    <div class="botao2">
                        <button class="btn btn-dark limpo" type="reset">Limpar</button>
                    </div>
                </div>
            </form>
        </table>
    </div>
</div>
</body>
</html>
