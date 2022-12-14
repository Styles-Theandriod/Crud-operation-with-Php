<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Employee Details</h2>
                    <a href="create.php" class="btn btn-danger pull-right">Add New Employee</a>
                </div>
                <?php
                    require_once "config.php";
                    //Attempt to select query execution
                    $sql = "SELECT * FROM  employee_tbl";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result)> 0){
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Name</th>";
                            echo "<th>Address</th>";
                            echo "<th>Salary</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo"<tr>";
                                    echo"<td>" . $row['id'] . "</td>";
                                    echo"<td>" . $row['name'] . "</td>";
                                    echo"<td>" . $row['address'] . "</td>";
                                    echo"<td>" . $row['salary'] . "</td>";
                                    echo"<td>";
                                        echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="view Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                    echo"</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // free result set 
                            mysqli_free_result($result);
                        }else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    }else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    //close connection
                    mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>

<!-- remote or physical -->

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>