<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar para Alterar Livro</title>
    <link rel="stylesheet" href="../../style/livro/pesquisar_alt_livro.css">
    <script src="../../script/numeros.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <form action="pesquisar_alt2_livro.php" method="post">
            <div class="inserir">
                <h1>Pesquisar Livro</h1>
                <input type="text" name="txtid" maxlength ="5" placeholder="Código do Livro" required onkeypress="return numeros(window.event.keyCode)">
                <div>
                    <input type="submit" value="Consultar" name="btnenviar">
                    <input type="reset" value="limpar" name="btnlimpar">
                </div>
            </div>
        </form>
    </main>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>