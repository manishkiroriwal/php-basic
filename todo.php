<?php
$update = false;
$delete = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpdb";

$conn = mysqli_connect("$servername","$username","$password","$database");

if(!$conn){

}else{
    // echo "Connection was successful<br>";
}
if(isset($_GET['delete'])){
  $sn = $_GET['delete'];
  $sql = "DELETE FROM `notes` WHERE `sno.` = $sn";
  $result = mysqli_query($conn,$sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snEdit'])){
    $sn = $_POST['snEdit'];
    $title = $_POST["notetitle_edit"];
    $description = $_POST['desc_edit'];

    $sql = "UPDATE `notes` SET `title` = '$title' , `todo` ='$description' WHERE `notes`.`sno.` = $sn";
    $result = mysqli_query($conn,$sql);
    if($result){
      $update = true;
    }
  }
  else{
    $title = $_POST["notetitle"];
    $description = $_POST['desc'];

    $sql = "INSERT INTO `notes` (`sno.`, `title`, `todo`, `tstamp`) VALUES (NULL, '$title', '$description',current_timestamp());";
    $result = mysqli_query($conn,$sql);
  }
}
// $sql = "SELECT * FROM `notes`";
// $result = mysqli_query($conn,$sql);

// $num = mysqli_num_rows($result);
// echo $num;
// echo " records found in the database<br>";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PROJECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
  </head>
  <body>
    <!-- edit button -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
  Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodallabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">edit this note</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/phpfirst/todo.php" method="post">
        <input type="hidden" name ="snEdit" id ="snEdit">

  <div class="mb-3">
    <label for="notetitle" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="notetitle_edit" name="notetitle_edit" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Note Description</label>
    <textarea name="desc_edit" id="desc_edit" class="form-control" cols="30" rows="5"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Update Note</button>
</form>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">about</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="cont my-3">
<form action="/phpfirst/todo.php" method="post">
  <div class="mb-3">
    <label for="notetitle" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="notetitle" name="notetitle" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Note Description</label>
    <textarea name="desc" id="desc" class="form-control" cols="30" rows="5"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Add note</button>
</form>
</div>
<div class="backend my-4" >
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">SNo.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn,$sql);
        $sn=0;
        while($row = mysqli_fetch_assoc($result)){
            //echo var_dump($row);
            // echo $row['sno.'].". Title ".$row['title'] ." Desc is ".$row['todo'];
            $sn = $sn +1;
            echo "<tr>
            <th scope='row'>".$sn."</th>
            <td>".$row['title']."</td>
            <td>".$row['todo']."</td>
            <td><button class='edit btn btn-sm btn-primary' id=".$row['sno.'].">Edit</button>  <button class='delete btn btn-sm btn-primary' id=d".$row['sno.'].">Delete</button></td>
          </tr>";
        }
    ?>
    
  </tbody>
</table>
</div>
<hr>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="crossorigin="anonymous">
</script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit",);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                Description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title,Description);
                notetitle_edit.value = title;
                desc_edit.value = Description;
                snEdit.value = e.target.id;
                console.log(e.target.id);
                $('#editmodal').modal('toggle');
            })
        })
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit",);
                sn = e.target.id.substr(1,);

                
                if(confirm("Press a Button!")){
                  console.log("yes");
                  window.location =`/phpfirst/todo.php?delete=${sn}`;
                }
            })
        })
    </script>
  </body>
</html>
