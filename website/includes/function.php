<?php  
    // function to check duplicate
    function checkDuplicate($connection, $table, $column, $value){
        $query = "SELECT * FROM $table WHERE $column=?";
        $statement = mysqli_stmt_init($connection);
        $prepareStatement = mysqli_stmt_prepare($statement, $query);

        if($prepareStatement){
            mysqli_stmt_bind_param($statement, "s", $value);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            $rowCount = mysqli_num_rows($result);
            return $rowCount > 0;
        }
    }
?>