<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "config.php";
    
    $sql = "DELETE FROM blog WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["id"]);
        
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
    if(empty(trim($_GET["id"]))){
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
    <title>CRUD Delete - Renato Filho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Deletar Postagem</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Você tem certeza que quer excluir a postagem?</p><br>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">Não</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>