<?php 
	$id = $_GET['id'];
	$conn = mysqli_connect("localhost","root","","demo");
	if ($conn ==true) {
		$query = "DELETE FROM nhacc WHERE id='".$id."'";
		$result = mysqli_query($conn,$query);
		if ($result) {
		 	echo "<script type='text/javascript'>";
		 	echo "alert('Xóa thành công');";
		 	echo "window.location.href='index.php';";
		 	echo"</script>";
		 } 
	}
 ?>
