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
 * fetch individual data by ID
 */
function find($table, $id)
{
    $data = connect()->query("SELECT * FROM $table WHERE id='$id'");
    return $data->fetch_object();
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
