<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="../../style/autor/pesquisar_alt2_autor.css">
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
            include_once 'autor.php';
            $a = new autor();
            $a->setCod($txtid);
            $autor_bd=$a->alterar_autor();
        ?>
        <form method="post">
            <div class="alterar">
                <h1>Alterar Autor</h1>
                <?php
                    $existe = false;
                    foreach($autor_bd as $autor_mostrar)
                    {
                    $existe = true;
                ?>
                    <?php echo "Código"?>
                    <input type="text" name="txtid" readonly maxlength="5" onkeypress = "return numeros(window.event.keyCode)" value='<?php echo $autor_mostrar[0]?>'>
                    <?php echo "Nome do Autor"?>
                    <input type="text" name="txtnome" required maxlength="20" onkeypress = "return letras(window.event.keyCode)" value='<?php echo $autor_mostrar[1]?>'>
                    <?php echo "Sobrenome do Autor "?>
                    <input type="text" name="txtsobrenome" required maxlength="20" onkeypress = "return letras(window.event.keyCode)" value='<?php echo $autor_mostrar[2]?>'>
                    <?php echo "Email"?>
                    <input type="email" name="txtemail" required maxlength="30" value='<?php echo $autor_mostrar[3]?>'>
                    <?php echo "Data de nascimento"?>
                    <input type="date" name="date" required value='<?php echo $autor_mostrar[4]?>'>
                    <input type="submit" value="Alterar" name="btnalterar">
                    <?php 
                    }
                    if($existe == false) 
                    {
                        header("location:pesquisar_alt2_inv_autor.php");
                    }
                ?>
            </div>
        </form>
    <div class="php-msg">
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnalterar))
            {
                include_once 'autor.php';
                $aut = new autor();
                $aut->setNome($txtnome);
                $aut->setSobrenome($txtsobrenome);
                $aut->setEmail($txtemail);
                $aut->setNasc($date);
                $aut->setCod($txtid);
                echo "<h3>" . $aut->alterar2_autor() . "</h3>";
                header("location:pesquisar_alt_autor.php");
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