<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir autor</title>
    <link rel="stylesheet" href="../../style/autor/excluir_autor.css">
    <script src="../../script/numeros.js"></script>
</head>
<body>
    <nav class="nav-bar">
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <form method="POST">
            <div class="excluir">
                <h1>Excluir Autor</h1>
                <input type="text" name="txtid" maxlength="5" onkeypress="return numeros(window.event.keyCode)" required placeholder="Id do Autor">
                <div>
                    <input type="submit" value="Enviar" name="btnenviar">
                    <input type="reset" value="Limpar" name="btnlimpar">
                </div>
            </div>
        </form>
        <div class="php-msg">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar))
                {
                    include_once 'autor.php';
                    $a = new autor();
                    $a->setCod($txtid);
                    echo "<h3>" . $a->exclusao() . "<h3>"; //chamada de método - o $a é o parâmetro enviado
                }
            ?>
        </div>
    </main>
    <footer class="footer-container">
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>