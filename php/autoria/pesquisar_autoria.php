<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../../style/autoria/pesquisar_autoria.css">
    <script src="../../script/numeros.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <form method="post">
            <div class="pesquisar">
                <h1>Pesquisar Autoria</h1>
                <input type="text" name="txtcod" maxlength="5" required onkeypress = "return numeros(window.event.keyCode)" placeholder="Código do Autor">
                <div>
                    <input type="submit" value="Consultar" name="btnenviar">
                    <input type="reset" value="Limpar" name="btnlimpar">
                </div>
            </div>
        </form>
        <div class="php-msg">
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar))
            {
                include_once 'autoria.php';
                $a = new autoria();
                $a->setCodAutor($txtcod.'%'); //o .'%' serve para busca aproximada, ou seja começa com uma determinada letra
                $bd_autoria=$a->pesquisar_autoria(); //chamada de método com retorno
                ?>
                <table>
                    <tr>
                        <th>Código Autor</th>
                        <th>Código Livro</th>
                        <th>Data de Lançamento</th>
                        <th>Editora</th>
                    </tr>
                <?php
                    foreach($bd_autoria as $pesquisar_autoria)
                    {
                        echo "<tr>";
                        echo "<td>" . $pesquisar_autoria[0] . "</td>";
                        echo "<td>" . $pesquisar_autoria[1] . "</td>";
                        echo "<td>" . $pesquisar_autoria[2] . "</td>";
                        echo "<td>" . $pesquisar_autoria[3] . "</td>";
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