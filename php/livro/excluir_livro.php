<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livro</title>
    <link rel="stylesheet" href="../../style/livro/excluir_livro.css">
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
            <h1>Excluir Livro</h1>
            <input type="text" name="txtid" maxlength="5" placeholder="ID do Livro" required onkeypress="return numeros(window.event.keyCode)">
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
                include_once 'livro.php';
                $l = new livro();
                $l->setCod($txtid);
                echo "<h3>" . $l->exclusao() . "<h3>"; //chamada de método - o $l é o parâmetro enviado
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