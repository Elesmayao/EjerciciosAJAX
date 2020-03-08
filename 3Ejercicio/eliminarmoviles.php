<?php        

$conn = mysqli_connect( 'localhost', 'root', '', 'usuariostiendademoviles');
$sql =  "DELETE FROM stock where id=".$_POST['id'];
$moviles=mysqli_query($conn,$sql);

echo json_encode($moviles);