<?php
    require_once('../models/db.php');
    session_start();
    if (!isset($_SESSION['login_user'])) {
        header('location: login.php');
    }
 
    // print_r($rows);
    // $conn->delete(5, 'user');
    // $conn->insert('dat','dat','dat','dat');
    // $conn->update(10, "Dattd","123345","dat@gmail.com","098766543");
    // $row= $conn->findOne(10);
    // print_r($row);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Crud</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="col-md-12">
            <h3 class="alert alert-success mt-3">Danh sách sinh viên 
                <a href="../controllers/logout.php"><input class="btn btn-primary float-right" type="button" value="Logout"></a>
                <span class="float-right pr-3"><?php echo $_SESSION['login_user']?></span>
            </h3>
            <a class="btn btn-primary mb-3" href="add.php">Thêm sinh viên</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-inverse table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = $conn->fetchAll();
                            foreach ($users as $user) { 
                        ?>
                         <tr>
                            <td><?=$user["id"]?></td>
                            <td><?=$user["username"]?></td>
                            <td><?=$user["password"]?></td>
                            <td><?=$user["email"]?></td>
                            <td><?=$user["phone"]?></td>
                            <td>
                                <a class="btn btn-primary" href="../controllers/edit.php?id=<?=$user["id"]?>" role="button">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete user</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn muốn xóa chứ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a class="btn btn-warning text-white" href="../controllers/delete.php?id=<?=$user["id"]?>" role="button">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php       
                            }
                        ?>
                        
                    </tbody>
            </table>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>