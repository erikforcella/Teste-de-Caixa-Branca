<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../../style/autor/listar_autor.css">
    <script src="../../script/blokletras.js"></script>
</head>
    <body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <?php
            include_once 'autor.php';
            $a = new autor();
            $autor_lin=$a->listar_autor();
        ?>
        <table>
            <tr>
                <th>Cod</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Nasc</th>
            </tr>
            <?php
                foreach($autor_lin as $autor_col) 
                {
                    echo "<tr>";
                    echo "<td>" . $autor_col[0] . "</td>";
                    echo "<td>" . $autor_col[1] . "</td>";
                    echo "<td>" . $autor_col[2] . "</td>";
                    echo "<td>" . $autor_col[3] . "</td>";
                    echo "<td>" . $autor_col[4] . "</td>";
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