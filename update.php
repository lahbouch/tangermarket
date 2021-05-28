<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
$conn = mysqli_connect("localhost","root","","mydata");

$id =$_GET['id'];

$quantitestock = "";
$prixunitaire="";
$result = mysqli_query($conn, "SELECT * FROM produit WHERE reference =$id");
while($row=mysqli_fetch_array($result)){


    $quantitestock=$row["quantite_stock"];
    $prixunitaire=$row["prix_unitaire"];
    

}


?>
<body style="background-image:url('stck.jpg');background-repeat:no-repeat;background-size:cover;">
<form style="width: 50%;" class="container p-5" action="" method="post">
  <h1 style="font-weight: bold;text-align:center;">Changer les données</h1><br><br>
  <div class="form-group"style="background-color:white; padding: 10px;border-radius:10px;">
    <label for="formGroupExampleInput2">quantite stock</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="quantite stock" name="quantite_stock" value="<?php echo  $quantitestock ?>">
    <br>
    <label for="formGroupExampleInput2">prix</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="prix" name="prix_unitaire" value="<?php echo  $prixunitaire ?>">
    <br>
    <div class="d-flex justify-content-center">
    <input type="submit" class="btn btn-success" name="update" value="update" >

    </div>
    <a href="dashbord.php" >Return</a>

  </div>
  
</form>
</body>

<?php
                    if(isset($_POST["update"])){
                        mysqli_query($conn,"UPDATE produit SET  quantite_stock='$_POST[quantite_stock]' , prix_unitaire='$_POST[prix_unitaire]'   WHERE reference=$id");
                      ?>  
                      <script type="text/javascript">
                window.location="dashbord.php";
                </script>
                  <?php
    
                      }
?>