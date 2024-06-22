<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="../../style/livro/pesquisar_alt2_livro.css">
    <script src="../../script/letras_numeros.js"></script>
    <script src="../../script/letras.js"></script>
    <script src="../../script/numeros.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="txtisbn"]').inputmask('999-9-99-999999-9'); // Exemplo de máscara para ISBN no formato 978-1-43-920846-4
        });
    </script>
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
            include_once 'livro.php';
            $l = new livro();
            $l->setCod($txtid);
            $liv_bd=$l->alterar_livro();
        ?>
        <form method="post">
            <div class="alterar">
                <h1>Alterar Livro</h1>
                <?php
                    $existe = false;
                    foreach($liv_bd as $liv_mostrar)
                    {
                    $existe = true;
                ?>
                            <?php echo "Código"?>
                            <input type="text" name="txtid" onkeypress="return numeros(window.event.keyCode)" readonly value='<?php echo $liv_mostrar[0]?>'>
                            <?php echo "Título do Livro "?>
                            <input type="text" name="txttitulo" required onkeypress="return letras(window.event.keyCode)" value='<?php echo $liv_mostrar[1]?>'>
                            <?php echo "Categoria do Livro "?>
                            <input type="text" name="txtcategoria" required onkeypress="return letras(window.event.keyCode)" value='<?php echo $liv_mostrar[2]?>'>
                            <?php echo "ISBN"?>
                            <input type="text" name="txtisbn" required value='<?php echo $liv_mostrar[3]?>'>
                            <?php echo "Idioma"?>
                            <input type="text" name="txtidioma" required onkeypress="return letras(window.event.keyCode)" value='<?php echo $liv_mostrar[4]?>'>
                            <?php echo "Quant. de páginas"?>
                            <input type="text" name="txtqtde" required onkeypress="return numeros(window.event.keyCode)" value='<?php echo $liv_mostrar[5]?>'>
                            <input type="submit" value="Alterar" name="btnalterar">
                        <?php 
                    }
                    if($existe == false) 
                    {
                        header("location:pesquisar_alt2_inv_livro.php");
                    }
                ?>
            </div>    
        </form>
    </main>
    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnalterar)) 
        {
            include_once 'livro.php';
            $liv = new livro();
            $liv->setCod($txtid);
            $liv->setTitulo($txttitulo);
            $liv->setCategoria($txtcategoria);
            $liv->setIsbn($txtisbn);
            $liv->setIdioma($txtidioma);
            $liv->setQtdepag($txtqtde);

            echo "<h3>" . $liv->alterar2_livro() . "</h3>";
            header("location:pesquisar_alt_livro.php");
        }
    ?>
    <footer>
        <div class="rodape">
            <h4>Desenvolvido por: Érik Iitirou Forcella - 2º DS A</h4>
        </div>
    </footer>
</body>
</html>