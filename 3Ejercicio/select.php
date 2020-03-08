  
<?php        

$conn = mysqli_connect( 'localhost', 'root', '', 'usuariostiendademoviles');
$sql =  "SELECT id,marca,modelo,precio FROM `stock`";
$moviles=mysqli_query($conn,$sql);