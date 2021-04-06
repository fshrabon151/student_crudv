<?php

/**
 * Data create by create
 */
function create($sql)
{
    connect()->query($sql);
}

/**
 * To fetch all data
 */
function all($table, $order = 'DESC')
{
    return connect()->query("SELECT * FROM $table ORDER BY id $order");
}

/**
 * To fetch all data
 */
function allOutTrash($table, $columnName = 'trash', $trash_value = 'false', $order = 'DESC')
{
    return connect()->query("SELECT * FROM $table WHERE $columnName = '$trash_value' ORDER BY id $order");
}
/**
 * fetch individual data by ID
 */
function find($table, $id)
{
    $data = connect()->query("SELECT * FROM $table WHERE id='$id'");
    return $data->fetch_object();
}
/**
 * fetch individual data by ID
 */
function singleFind($table, $columnName, $id)
{
    return $data = connect()->query("SELECT * FROM $table WHERE $columnName='$id'");
}
/**
 * fetch Top data by ID
 */
function findTop($table, $number)
{
    return $data = connect()->query("SELECT * FROM $table LIMIT $number");
}


/**
 * Delete individual Data
 */

function delete($table, $id)
{
    connect()->query("DELETE FROM $table WHERE id='$id'");
}

/**
 * Validation function for error message
 */
function validate($msg, $type = 'danger')
{
    return "<p class=\"alert alert-$type\">$msg ! <button class=\"close\" data-dismiss=\"alert\">&times</button></p>";
}

/**
 * Search function
 */

function search($table, $column, $value)
{
    $sql = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
    return connect()->query($sql);
}
/**
 * Update function
 */
function update($sql)
{
    connect()->query($sql);
}

/**
 * Max function
 */
function maxValue($table, $currentName, $NewName)
{
    $max = connect()->query("SELECT MAX($currentName) AS $NewName FROM $table");
    $maxValue = $max->fetch_object();
    return $maxValue->$NewName;
}
/**
 * Min function
 */
function minValue($table, $currentName, $NewName)
{
    $min = connect()->query("SELECT MIN($currentName) AS $NewName FROM $table");
    $minValue = $min->fetch_object();
    return $minValue->$NewName;
}

/**
 * Count function
 */
function countValue($table, $currentName, $NewName)
{
    $count = connect()->query("SELECT COUNT($currentName) AS $NewName FROM $table");
    $countValue = $count->fetch_object();
    return $countValue->$NewName;
}

/**
 * Single dictinct column function
 */
function singleColumn($table, $columnName)
{
    return connect()->query("SELECT DISTINCT $columnName FROM $table");
}



/**
 * Data check function for duplicate data
 */
function dataCheck($table, $columnName, $value)
{
    $mail = connect()->query("SELECT $columnName FROM $table WHERE $columnName='$value'");
    if ($mail->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Old function for data recover
 */
function old($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}



/**
 * file upload function
 */
function move($file, $location = '/', array $type = ['jpg', 'png', 'gif', 'jpeg'])
{
    // file management 
    $file_name = $file['name'];
    $file_name_tmp = $file['tmp_name'];
    $file_arr = explode('.', $file_name);
    $file_ext = end($file_arr);
    $unique_name = md5(time() . rand()) . '.' . $file_ext;


    $msg = '';
    if (in_array($file_ext, $type) == false) {
        $msg = validate('Invalid file format');
    } else {
        // Upload file 
        move_uploaded_file($file_name_tmp, $location . $unique_name);
    }
    return [
        'unique_name'   => $unique_name,
        'err_msg'       => $msg
    ];
}
