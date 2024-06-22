<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar autoria</title>
    <link rel="stylesheet" href="../../style/autoria/cadastrar_autoria.css">
    <script src="../../script/numeros.js"></script>
    <script src="../../script/letras.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html">
                <input type="button" value="<=">
            </a>
        </div>
    </nav>
    <main>
        <form method="POST">
            <div class="cadastrar">
                <h1>Cadastrar Autoria</h1>
                <input name="txtcodautor" type="text"  maxlength="20" placeholder="Código do autor" required onkeypress = "return numeros(window.event.keyCode)">
                <input name="txtcodlivro" type="text"  maxlength="20" placeholder="Código do livro" required onkeypress = "return numeros(window.event.keyCode)">
                <input name="txtdata" type="date" placeholder="Data de lançamento" required>
                <input name="txteditora" type="text" maxlength="20" placeholder="Editora" required onkeypress = "return letras(window.event.keyCode)">
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
                    include_once 'autoria.php';
                    $autoria_bd=new autoria();
                    $autoria_bd->setCodAutor($txtcodautor);
                    $autoria_bd->setCodLivro($txtcodlivro);
                    $autoria_bd->setData($txtdata);
                    $autoria_bd->setEditora($txteditora);
                    echo  "<h3>" . $autoria_bd->salvar() . "</h3>";
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