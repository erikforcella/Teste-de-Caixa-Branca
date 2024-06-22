<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar autor</title>
    <link rel="stylesheet" href="../../style/autor/cadastrar_autor.css">
    <script src="../../script/letras.js"></script>
    <script src="../../script/numeros.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>   
        <form method="POST" name="autor" onsubmit="return validateEmail()">
            <div class="cadastrar">
                <h1>Cadastrar Autor</h1>
                <input name="txtnome" type="text" maxlength="20" required placeholder="Nome do Autor" onkeypress="return letras(window.event.keyCode)">
                
                <input name="txtsobrenome" type="text" maxlength="20" required placeholder="Sobrenome do Autor" onkeypress="return letras(window.event.keyCode)">

                <input name="txtemail" type="email" maxlength="30" required placeholder="Email do Autor">
                <input name="txtnasc" type="date" required placeholder="Data de nascimento do Autor">
                <div>
                    <input name="btnenviar" type="submit" value="Cadastrar">
                    <input name="btnlimpar" type="reset" value="Limpar">
                </div>
            </div>
        </form>
        <div class="php-msg">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar)) {
                    include_once 'autor.php';
                    $autor_bd=new autor();
                    $autor_bd->setNome($txtnome);
                    $autor_bd->setSobrenome($txtsobrenome);
                    $autor_bd->setEmail($txtemail);
                    $autor_bd->setNasc($txtnasc);
                    echo  "<h3>" . $autor_bd->salvar() . "</h3>";
                }
            ?>
        </div>
    </main>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>
