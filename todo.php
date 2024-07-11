<!DOCTYPE html>
<html>

<head>
    <title>ToDo List</title>
</head>

<body>
    <div class="heading">
        <h2>ToDo List : </h2>
    </div>
    <form method="post" action="ToDoList.php">

        <input type="text" name="task">
        <button type="submit" name="submit">Add</button>
    </form>

    <table>


        <h3>Your Tasks : </h3>
        <tbody>
            <?php

            session_start();
            $toDoList = array();
            $input = "";
            if (!isset($_SESSION['toDoList'])) {
                $_SESSION['toDoList'] = array();
            }

            $toDoList = $_SESSION['toDoList'];
            if (isset($_POST['listItem']) && !empty($_POST['listItem'])) {
                $input = $_POST['listItem'];
                $toDoList[] = $input;

                $_SESSION['toDoList'] = $toDoList;
            }

            echo "<form method='POST'>
<input type='text' name='listItem'>
<button type='submit' >add</button>
</form>";

            print_r($toDoList);
            echo "<div>";
            echo "<ul>";
            if (count($toDoList) !== 0)
                for ($i = 0; $i < count($toDoList); $i++) {
                    echo "<li>$toDoList[$i]</li>";
                }
            echo "</ul>";
            echo "</div>";
            session_write_close();
            // header("Location:http://127.0.0.1/PHP%20tasks/super%20global%20var/index.php/listitem="); 
            ?>