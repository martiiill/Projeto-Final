<!DOCTYPE html>
<!--
Projeto Final :: VitiAl
Ana Martins @8130368 
P.Porto - ESTG
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>:: Página Inicial</title>
        <link rel="stylesheet" type="text/css" href="Application/CSS/styleIndex.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>
    <body>          
        <img id="fundo_verde" src="Application/Images/vinha.jpg" alt="fundo" width="100%" height="20%">
        <br/>
        <div class="header">
            <a href="Application/Public/about.php"><img id="question" src="Application/Images/question.png" alt="question"></a>
            <h1>VitiAl - Sistema de Previsão Vitivinícola</h1>
        </div>

        <?php
        if (filter_has_var(INPUT_GET, 'login')) {
            if (filter_input(INPUT_GET, 'login') === 'sucesso') {
                echo '<div style="color:green" id="alert">Utilizador registado com sucesso. Já pode entrar com a sua conta.</div>';
            } elseif (filter_input(INPUT_GET, 'login') === 'error') {
                echo '<div style="color:red" id="alertLogin">Erro no login. Tente outra vez.</div>';
            }
        }
        ?>

        <form id="login_form" action="Application/User/Validations/checkLogin.php" method="post" id="login">
            <label for="nome">
                <span>Utilizador: (*)</span>
                <input type="text" id="nome" name="nome" required/>
            </label>
            <br/>
            <label for="palavrapasse">
                <span>Palavra-Passe: (*)</span>
                <input type="password" id="palavrapasse" name="palavrapasse" required/>
            </label>
            <br/>
            <input type="submit" value="Entrar" value="Entrar">
        </form>

        <div class="registo">
            <p>Não tem conta?</p>
            <p><a href="Application/Public/registNewUser.php">Registar</a></p>         
        </div>

        <div class="footer">
            <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
        </div>
        <script src="Application/JS/fadeOutMessage.js"></script>
    </body>
</html>
