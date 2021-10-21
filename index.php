 <<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Biblioteca</title>
       
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
       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>  
        <main class="container">
            <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach($generos as $g): ?>
                    <tr>
                        <td><?= $g['id'] ?></td>
                        <td><?= $g['nome'] ?></td>
                        <td>
                            <a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
                        </td>
                        </tr>
                <?php endforeach ?>
            </table>
        </main>
        
        <footer> <!-- A tag footer para usar rodapé na pagina, não tem haver com o código principal do professor -->
            <h4>Desenvolvido por Luiz Miguel Souza Alves (2021)</h4>
        </footer>

    </body>
</html>