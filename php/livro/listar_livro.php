<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livro</title>
    <link rel="stylesheet" href="../../style/livro/listar_livro.css">
</head>
    <body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <?php
            include_once 'livro.php';
            $livro = new livro();
            $livro_linha=$livro->listar_livro();
        ?>
        <table>
            <tr>
                <th>Cod_Livro</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>ISBN</th>
                <th>Idioma</th>
                <th>Qtde Págs</th>
            </tr>
            <?php
                foreach($livro_linha as $livro_coluna) 
                {
                    echo "<tr>";
                    echo "<td>" . $livro_coluna[0] . "</td>";
                    echo "<td>" . $livro_coluna[1] . "</td>";
                    echo "<td>" . $livro_coluna[2] . "</td>";
                    echo "<td>" . $livro_coluna[3] . "</td>";
                    echo "<td>" . $livro_coluna[4] . "</td>";
                    echo "<td>" . $livro_coluna[5] . "</td>";
                    echo "</td>";
                }
            ?>
        </table>
    </main>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
    </body>
</html>