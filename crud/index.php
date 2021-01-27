<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dashboard - Renato Filho</title>
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
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Blog Dashboard</h2>
                        <a href="create.php" class="btn btn-primary pull-right">Adicionar Post</a>
                    </div>
                    <?php
                    require_once "config.php";
                    
                    $sql = "SELECT * FROM blog";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped table-condensed table-responsive'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Título</th>";
                                        echo "<th>Descrição</th>";
                                        echo "<th>Tags</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['titulo'] . "</td>";
                                        echo "<td>" . $row['descricao'] . "</td>";
                                        echo "<td>" . $row['tags'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Nenhum dado encontrado.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
</body>
</html>