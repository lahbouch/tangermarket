<?php
if(isset($_POST['submitt'])){
    require_once 'database.php';

          $libelle        = $_POST['libelle'];
          $reference = $_POST['reference'];
          $prixunitaire = $_POST['prix_unitaire'];
          $quantitemin = $_POST['quantite_min'];
          $quantitemax = $_POST['quantite_max'];
          $quantitestock = $_POST['quantite_stock'];
          $categorie = $_POST['categorie'];
        
        
        
            $reqAdd = "INSERT INTO produit(libelle,reference,prix_unitaire,quantite_min,quantite_max,quantite_stock,categorie) 
                VALUES ('$libelle','$reference','$prixunitaire','$quantitemin','$quantitemax','$quantitestock','$categorie')";
            $resultat = mysqli_query($conn, $reqAdd);
            if ($resultat) {
                header("location: dashbord.php");
                echo "the product has been added successfully";
            }
             else {
                echo "the product has been added unsuccessfully";
            }
          

        }

   


          
?>