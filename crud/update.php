<?php
require_once "config.php";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $conteudo = $_POST["conteudo"];
    $tags = $_POST["tags"];

    $sql = "UPDATE blog SET titulo=?, conteudo=?, descricao=?, tags=? WHERE id=?";
        
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $conteudo, $descricao, $tags, $id);
        
        
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        } else{
            echo "Ops! Algo deu errado. Tente novamente";
        }
    }
        
    mysqli_stmt_close($stmt);

    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM blog WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $titulo = $row["titulo"];
                    $descricao = $row["descricao"];
                    $conteudo = $row["conteudo"];
                    $tags = $row["tags"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Ops! Algo deu errado. Tente novamente";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Edit - Renato Filho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Editar Postagem</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" name="descricao" class="form-control" value="<?php echo $descricao; ?>">
                        </div>
                        <div class="form-group">
                            <label>Conteúdo</label>
                            <textarea name="conteudo" class="form-control" rows="10"><?php echo $conteudo; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" name="tags" class="form-control" value="<?php echo $tags; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>