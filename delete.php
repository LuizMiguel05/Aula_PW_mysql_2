<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);
  
    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Remover Gênero</title>
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
            <h1>Remover Gênero</h1>
            <p>Tem certeza que deseja remover o gênero <?= $genero['nome'] ?> ?</p>
            
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
                <a class="btn btn-secondary" href="index.php">Voltar</a>
                <button class="btn btn-danger" type="submit">Excluir</button>
         
            </form>
        </main>  
        
        <footer> <!-- A tag footer para usar rodapé na pagina, não tem haver com o código principal do professor -->
            <h4>Desenvolvido por Luiz Miguel Souza Alves (2021)</h4>
        </footer>

    </body>
</html>