<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="../../style/livro/pesquisar_livro.css">
    <script src="../../script/letras.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <form method="POST">
            <div class="pesquisar">
                <h1>Pesquisar Livro</h1>
                <input type="text" name="txttitulo" maxlength="20" placeholder="Título do Livro" required onkeypress = "return letras(window.event.keyCode)">
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
                    $l->setTitulo($txttitulo.'%'); //o .'%' serve para busca aproximada, ou seja começa com uma determinada letra
                    $bd_livro=$l->pesquisar_livro(); //chamada de método com retorno
            ?>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>ISBN</th>
                    <th>Idioma</th>
                    <th>Páginas</th>
                </tr>
            <?php
                foreach($bd_livro as $livro_mostrar)
                {
                    echo "<tr>";
                    echo "<td>" . $livro_mostrar[0] . "</td>";
                    echo "<td>" . $livro_mostrar[1] . "</td>";
                    echo "<td>" . $livro_mostrar[2] . "</td>";
                    echo "<td>" . $livro_mostrar[3] . "</td>";
                    echo "<td>" . $livro_mostrar[4] . "</td>";
                    echo "<td>" . $livro_mostrar[5] . "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <?php
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