<?php 
// including the database connection file
include_once("config.php");

// fetching data
$result = $dbConn->query("SELECT * FROM tasks");
?>

<html>
<head>  
    <title>Tasks</title>
</head>

<body>
    <h1>To-do tasks</h1>
<a href="add.html">Add New Task</a><br/><br/>

    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Task name</td>
        <td>Done</td>
        <td>Update</td>
    </tr>
    <?php   
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {        
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".($row['done'] === 1 ? "True" : "False")."</td>"; 
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
    }
    ?>
    </table>
</body>
</html>