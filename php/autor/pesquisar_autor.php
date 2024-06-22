<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Autor</title>
    <link rel="stylesheet" href="../../style/autor/pesquisar_autor.css">
    <script src="../../script/letras.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <MAIN>
        <form method="post">
            <div class="pesquisar">
                <h1>Pesquisar Autor</h1>
                <input type="text" name="txtnome" maxlength="20" required onkeypress = "return letras(window.event.keyCode)" placeholder="Nome do Autor">
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
                include_once 'autor.php';
                $a = new autor();
                $a->setNome($txtnome.'%'); //o .'%' serve para busca aproximada, ou seja começa com uma determinada letra
                $bd_autor=$a->pesquisar_autor(); //chamada de método com retorno
                ?>
                <table>
                    <tr>
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                    </tr>
                    <?php
                    foreach($bd_autor as $pesquisar_autor)
                    {
                        echo "<tr>";
                        echo "<td>" . $pesquisar_autor[0] . "</td>";
                        echo "<td>" . $pesquisar_autor[1] . "</td>";
                        echo "<td>" . $pesquisar_autor[2] . "</td>";
                        echo "<td>" . $pesquisar_autor[3] . "</td>";
                        echo "<td>" . $pesquisar_autor[4] . "</td>";
                        echo "</tr>";
                    }
                ?>
                </table>
            <?php
                }
            ?>
        </div>
    </MAIN>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>