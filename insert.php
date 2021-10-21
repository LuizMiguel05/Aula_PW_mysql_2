<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();

    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES(:nome)');
    $comando->execute([':nome' => $_POST['nome']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Gênero</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        
        <!-- Estilo para usar rodapé na pagina, não tem haver com o código principal do professor -->
        <style>
           
           footer{
               
                Font-family: cursive;
                position: absolute;
                bottom:0px;
                Width: 100%;
                text-align: center; 
                background-color:slategrey;
        

           }

        </style>

    </head>
        <body>
        <main class="container">
            <h1>Novo Gênero</h1>
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Gênero</label>
                    <input class="form-control" type="text" required name="nome" />
                </div>
                <br />
                <a class="btn btn-secondary" href="index.php">Voltar</a>
                <button class="btn btn-success" type="submit">Salvar</button>
            </form>
        </main>
        
        <footer> <!-- A tag footer para usar rodapé na pagina, não tem haver com o código principal do professor -->
            <h4>Desenvolvido por Luiz Miguel Souza Alves (2021)</h4>
        </footer>
        
    </body>
</html>