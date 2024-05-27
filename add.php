<html>
<head>
    <title>Add Task</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {   
    $name = $_POST['name'];
    $done = $_POST['done'] === '1' ? 1 : 0;
        
    // checking empty fields
    if(empty($name)) {
        echo "<font color='red'>Task name field is empty.</font><br/>";//link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        //insert data to database       
        $sql = "INSERT INTO tasks(name, done) VALUES(:name, :done)";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':name', $name);
        $query->bindparam(':done', $done);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
        
        //display success message
        echo "<font color='green'>New task added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>