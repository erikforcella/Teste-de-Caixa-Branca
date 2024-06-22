<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Autoria</title>
    <link rel="stylesheet" href="../../style/autoria/listar_autoria.css">
</head>
    <body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <?php
            include_once 'autoria.php';
            $a = new autoria();
            $aut_bd=$a->listar_autoria();
        ?>
        <table>
            <tr>
                <th>Código do Autor</th>
                <th>Código do Livro</th>
                <th>Data de Lançamento</th>
                <th>Editora</th>
            </tr>
            <?php
                foreach($aut_bd as $aut_mostrar) 
                {
                    echo "<tr>";
                    echo "<td>" . $aut_mostrar[0] . "</td>";
                    echo "<td>" . $aut_mostrar[1] . "</td>";
                    echo "<td>" . $aut_mostrar[2] . "</td>";
                    echo "<td>" . $aut_mostrar[3] . "</td>";
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