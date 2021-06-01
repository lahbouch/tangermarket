

<?php
include 'addproduct.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MagasinStuck</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark   ">
  <a class="navbar-brand" href="dashbord.php">MagasinStuck</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashbord.php">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categorie.php" hidden>Categorie</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="http://localhost/mydata/index.php">
      <button class="btn btn-danger my-2 my-sm-0" type="submit">Déconnecter</button>
    </form>
  </div>
</nav>
<div class="col-12" >
   
    <form action="addproduct.php" method="POST" >
<div class="form-group p-3 d-flex flex-column flex-content-center">
<div class="d-flex justify-content-center m-3 font-weight-bold">
        Ajouter un produit
    </div>
    <input type="text" class="form-control mt-3" id="input1"  name="libelle" placeholder="libelle">
    <input type="text" class="form-control mt-3" id="input1"  name="reference" placeholder="reference">
    <input type="text" class="form-control mt-3" id="input2"  name="prix_unitaire" placeholder="prix unitaire">
    <input type="text" class="form-control mt-3" id="input3"  name="quantite_min" placeholder="quantite min">
    <input type="text" class="form-control mt-3" id="input3"  name="quantite_max" placeholder="quantite max">
    <input type="text" class="form-control mt-3" id="input4"  name="quantite_stock" placeholder="quantite stock">
    <input type="text" class="form-control mt-3" id="input5"  name="categorie" placeholder="categorie">

    <input type="submit" name="submitt" class="btn btn-success mt-3" value="Enregistre">

    </form>

   



  </div>
</div>

<div class="table-wrapper p-4" style="background-color:white;border-radius: 10px;padding:10px;">
<?php
 if(isset($_POST['search'])){
  $querystring = $_POST['search'];
  $sql = "SELECT * FROM produit WHERE libelle LIKE '%$querystring%'";
} else {
  echo "item not found";
}
?>
<form action="" method="POST">
<div class="input-group d-flex justify-content-center p-3">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" />
  </div>
  <button type="submit" class="btn btn-dark">
    <i class="fas fa-search"></i>
  </button>
</div>
</form>

            <div class="table-title">
                
            </div>
            <table class="table table-striped table-hover" id="myTable">
                <thead style="background-color:white;">
                    <tr>
                       
                        <th>reference</th>
                        <th>libelle</th>
                        <th>prix(DH)</th>
                        <th>quantite min(KG)</th>
                        <th>quantite max(KG)</th>
                        <th>
                        <!-- //DESC -->
                         <a href="?order=quantite_stock&&sort=DESC"> <i class="fas fa-arrow-up "></i></a>
                         &#160;
                         <!-- //ASC -->

                         <a href="?order=quantite_stock&&sort=ASC"><i class="fas fa-arrow-down "></i></a>
                         &#160;quantite en stock(KG)</a></th>
                        <th>categorie</th>
                        <th>Operations</th>
                        <th>Notification</th>
                        </tr>
                </thead>
                <?php

$conn = mysqli_connect("localhost","root","","mydata");
             

               if(isset($_GET['order'])){
                 $order = $_GET['order'];
               }else{
                 $order = 'quantite_stock';
               }

               if(isset($_GET['sort'])){
                 $sort = $_GET['sort']; 
                
                 

               } else{
                                  $sort = 'DESC';


                
               }
               
              $sql = "SELECT * FROM produit ORDER BY $order $sort   ";
              
              $result = $conn-> query($sql);
              if($result-> num_rows > 0  ){
               
                  while ($row = $result-> fetch_assoc()){
                      ?>
            <td ><?php echo $row["reference"] ?></td>
              <td ><?php echo $row["libelle"] ?></td>
              <td ><?php echo $row["prix_unitaire"] ?></td>
              <td ><?php echo $row["quantite_min"] ?></td>
              <td ><?php echo $row["quantite_max"] ?></td>
              


              <td ><?php echo $row["quantite_stock"] ?></td>
              
              <td ><a href="categorie.php?categorie=<?php echo $row["categorie"] ?>"><?php echo $row["categorie"] ?></a></td>
              <td>
              <a href="" class="edit" > <a name=""  class="btn btn-secondary" href='update.php?id=<?php echo$row["reference"]?>' role="button">Modifier</a>  </a>

              <a href="" class="delete" name="reference"> <a name=""  class="btn btn-danger" href='delete.php?id=<?php echo$row["reference"]?>' role="button">Supprimer</a> </a></td>
              <td><?php 
              if($row["quantite_stock"]<$row["quantite_min"]){
                echo "<h4><span class='badge badge-danger'>stock insuffisant</span></h1>";
              }
              ?></td>
              </tr>
              <?php
}
              } else {
                echo "<h1><span class='badge badge-info d-flex justify-content-center'  >  No data </span> <h1>";
              }
              
              
              ?>


            </table>
            <div class="clearfix">
        </div>
    </div>
    </body>
</html>






