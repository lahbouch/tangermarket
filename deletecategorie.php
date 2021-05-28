<?php
$conn = mysqli_connect("localhost","root","","mydata");
$id =$_GET['id'];

mysqli_query($conn,"DELETE FROM produit  WHERE reference =$id");

?>
<script type="text/javascript">
window.location="categorie.php";
</script>