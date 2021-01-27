<?php
require_once "config.php";

function criarSlug($tituloString){
    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $tituloString);
    return $slug;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO blog (titulo, descricao, conteudo, slug, tags) VALUES (?, ?, ?, ?, ?)";
     
    $slug = criarSlug($_POST["titulo"]);
        
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $_POST["titulo"], $_POST["descricao"], $_POST["conteudo"], $slug, $_POST["tags"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        } else{
            echo "Ops! Algo deu errado. Tente novamente";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Create - Renato Filho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Criar Postagem</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Conteúdo</label>
                            <textarea name="conteudo" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" name="tags" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>