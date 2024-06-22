<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alterar</title>
    <link rel="stylesheet" href="../../style/autoria/pesquisar_alt2_autoria.css">
    <script src="../../script/letras.js"></script>
    <script src="../../script/numeros.js"></script>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
        <?php
            $txtid=$_POST["txtid"];
            $txtid2=$_POST["txtid2"];
            include_once 'autoria.php';
            $a = new autoria();
            $a->setCodAutor($txtid);
            $a->setCodLivro($txtid2);
            $aut_bd=$a->alterar_autoria();
        ?>
        <form method="post">
            <div class="alterar">
                <h1>Alterar</h1>
            <?php
                $existe = false;
                foreach($aut_bd as $aut_mostrar)
                {
                    $existe = true;
            ?>
                <?php echo "Código autor"?>
                <input type="text" name="txtid" maxlength="5" readonly onkeypress = "return numeros(window.event.keyCode)" value='<?php echo $aut_mostrar[0]?>'>
                <?php echo "Código livro"?>
                <input type="text" name="txtid2" maxlength="5" readonly onkeypress = "return numeros(window.event.keyCode)" value='<?php echo $aut_mostrar[1]?>'>
                <?php echo "Data de lançamento";?>
                <input type="date" name="lanc" required value='<?php echo $aut_mostrar[2]?>'>
                <?php echo "Editora";?>
                <input type="text" name="txtedit" maxlength="20" required onkeypress = "return letras(window.event.keyCode)" value='<?php echo $aut_mostrar[3]?>'>
                <input type="submit" value="Alterar" name="btnalterar">
            <?php
                }
                if($existe == false)
                {
                    header("location:pesquisar_alt2_inv_autoria.php");
                }
            ?>
            </div>
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnalterar))
                {
                    include_once 'autoria.php';
                    $aut = new autoria();
                    $aut->setData($lanc);
                    $aut->setEditora($txtedit);
                    $aut->setCodAutor($txtid);
                    $aut->setCodLivro($txtid2);
                    echo "<h3>" . $aut->alterar2_autoria() . "</h3>";
                    header("location:pesquisar_alt_autoria.php");
                }
            ?>
        </form>
    </main>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>