<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/tela_login.css">
    <script src="../script/letras.js"></script>
    <script src="../script/numeros.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="#"><h1>Sistema Autoria</h1></a>
        </div>
    </nav>
    <main>
        <form method="post">
            <div class="logar">
                <h1> Login de acesso</h1>
                <input type="text" name="txtnome" placeholder="Nome do Usuário" maxlength="20" required onkeypress = "return letras(window.event.keyCode)">
                <input type="password" name="txtsenha" placeholder="Senha do Usuário" maxlength="3" required onkeypress = "return numeros(window.event.keyCode)">
                <input type="submit" value="Confirmar" name="btnconsultar">
            </div>
        </form>
        <div class="php-msg">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnconsultar))
                {
                    include_once 'usuario.php';
                    $u = new Usuario();
                    $u -> setUsu($txtnome);
                    $u -> setSenha($txtsenha);
                    $pro_bd=$u->logar();

                    $existe = false;
                    foreach($pro_bd as $pro_mostrar)
                    {
                        $existe = true;
                        ?>
                            <?php echo "Bem vindo: " . $pro_mostrar[0] . "!"?>
                            <a href="../menu.html"><input type="submit" value="Acessar"></a>
                        <?php
                    }
                    if($existe==false)
                    {
                        header("location:../loginInvalido.html");
                    }
                }
            ?>
        </div>
    </main>
    <footer>
        <div class="rodape">
            <p>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</p>
        </div>
    </footer>
</body>
</html>