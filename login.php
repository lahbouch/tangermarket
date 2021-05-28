<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'mydata';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
              Identifiant = '".$username."' and mot_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // Icorrecte input
        {
           $_SESSION['username'] = $username;
           echo "<script>
alert('Welcome $username ');
window.location.href='http://localhost/mydata/dashbord.php';
</script>";
        }
        else
        {
            echo "<script>
            alert('Your username or Password is INCORRECT');
            window.location.href='http://localhost/mydata/index.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
alert('Your username or Password is EMPTY');
window.location.href='http://localhost/mydata/index.php';
</script>";


        // empty input
    }
}

?>