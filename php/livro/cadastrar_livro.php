<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="../../style/livro/cadastrar_livro.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="txtisbn"]').inputmask('999-9-99-999999-9'); // Exemplo de máscara para ISBN no formato 978-1-43-920846-4
        });
    </script>
    <script src="../../script/letras.js"></script>
    <script src="../../script/letras_numeros.js"></script>
    <script src="../../script/numeros.js"></script>    
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="../../menu.html"><input type="button" value="<="></a>
        </div>
    </nav>
    <main>
    <form method="POST" name="livro">
        <div class="cadastrar">
            <h1>Cadastrar Livro</h1>
            <input type="text" name="txttitulo" maxlength="20" placeholder="Título do Livro" required onkeypress = "return letras(window.event.keyCode)">
            <input type="text" name="txtcategoria" maxlength="20" placeholder="Categoria do Livro" required onkeypress = "return letras(window.event.keyCode)">
            <input type="text" name="txtisbn" placeholder="ISBN do Livro" required>
            <input type="text" name="txtidioma" maxlength="20" placeholder="Idioma do Livro" required onkeypress = "return letras(window.event.keyCode)">
            <input type="text" name="txtpag" maxlength="1000" placeholder="Páginas do Livro" required onkeypress = "return numeros(window.event.keyCode)">
            <div>
                <input type="submit" value="Cadastrar" name="btnenviar">
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
                $livro_bd=new livro();
                $livro_bd->setTitulo($txttitulo);
                $livro_bd->setCategoria($txtcategoria);
                $livro_bd->setIsbn($txtisbn);
                $livro_bd->setIdioma($txtidioma);
                $livro_bd->setQtdepag($txtpag);
                echo  "<h3>" . $livro_bd->salvar() . "</h3>";
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
