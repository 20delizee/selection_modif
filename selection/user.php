<?php 

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=selection;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<div class="container">
 
 <form method='post' action='download.php'>
  <input type='submit' value='Export' name='Export'>
 
  <table border='1' style='border-collapse:collapse;'>
    <tr>
     <th>ID</th>
     <th>Username</th>
     <th>Name</th>
     <th>Gender</th>
     <th>Email</th>
    </tr>
    <?php 
     $query = "SELECT * FROM utilisateur ORDER BY id asc";
     $result = mysqli_query($con,$query);
     $user_arr = array();
     while($row = mysqli_fetch_array($result)){
      $id = $row['id'];
      $identifiant = $row['identifiant'];
      $mdp = $row['mdp'];
      $type_de_compte = $row['type_de_compte'];
      
      $user_arr[] = array($id,$identifiant,$mdp,$type_de_compte);
   ?>
      <tr>
       <td><?php echo $id; ?></td>
       <td><?php echo $identifiant; ?></td>
       <td><?php echo $mdp; ?></td>
       <td><?php echo $type_de_compte; ?></td>
      </tr>
   <?php
    }
   ?>
   </table>
   <?php 
    $serialize_user_arr = serialize($user_arr);
   ?>
  <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
 </form>
</div>
