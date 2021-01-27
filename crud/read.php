<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";
    
    $sql = "SELECT * FROM blog WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
} else{
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Read - Renato Filho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1><?php echo $row["titulo"]; ?></h1>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <p class="form-control-static"><?php echo $row["descricao"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Conteúdo</label>
                        <p class="form-control-static"><?php echo $row["conteudo"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <p class="form-control-static"><?php echo $row["tags"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
</body>
</html>