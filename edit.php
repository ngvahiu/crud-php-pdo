<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
    $done = $_POST['done'] === '1' ? 1 : 0;
	
	// checking empty fields
	if(empty($name)) {	
		echo "<span style=\"color: red; \">Name field is empty.</span><br/>";	
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";	
        return;
	} else {	
		//updating the table
		$sql = "UPDATE tasks SET name=:name, done=:done WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':done', $done);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

if(!empty($id)) {
    //selecting data associated with this particular id
    $sql = "SELECT * FROM tasks WHERE id=:id";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':id' => $id));
    
    while($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $name = $row['name'];
        $done = $row['done'];
    }
}

?>
<html>
<head>	
	<title>Edit Task</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Done</td>
				<td>
                    <select name="done">
                        <option <?php if ($done === 0) echo "selected"; ?> value="0">False</option>
                        <option <?php if ($done === 1) echo "selected"; ?> value="1">True</option>
                    </select>
                </td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>