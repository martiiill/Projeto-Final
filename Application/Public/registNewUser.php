<!DOCTYPE html>
<!--
Projeto Final :: VitiAl
Ana Martins @8130368 
P.Porto - ESTG
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../CSS/styleregistNewUser.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../JS/fadeOutMessage.js"></script>
    </head>
    <body>          
        <img id="fundo_verde" src="../Images/vinha.jpg" alt="fundo" width="100%" height="20%">
        <h1>VitiAl - Sistema de Previsão Vitivinícola</h1>
        <h2>Registo de novo Utilizador</h2>

        <section>
            <form method="post" action="Validations/validationRegisto.php" id="frmDemo">
                <label for="nome">Utilizador</label><br/>
                <input id="nome" required type="text" name="nome" placeholder="Nome de Utilizador" size="60"> *
                <br/><br/>             
                <label for="palavrapasse">Palavra-Passe</label><br/>
                <input id="palavrapasse" required type="password" name="palavrapasse" placeholder="Password" size="60"> *
                <br/><br/>
                <input type="reset" value="Limpar" id="resetbutton">
                <input type="submit" value="Concluir" id="sbutton">
            </form>             
        </section>

        <?php
        
        if (filter_has_var(INPUT_GET, 'login')) {
            if (filter_input(INPUT_GET, 'login') === 'insucesso') {
                echo '<div style="color:red" id="alert">Erro no registo. Tente outra vez.</div>';
            }
        }
        ?>
        <div class="footer">
            <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
        </div>
    </body>
</html>
