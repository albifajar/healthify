<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

include '../config.php';
//// List containing the registered chat users:
$users = array();

$list_pasien = mysqli_query($koneksi, "SELECT * FROM pasien");
$list_pasien = mysqli_fetch_all($list_pasien, MYSQLI_ASSOC);
foreach ($list_pasien as $index => $row){
    $users[$index]['userRole'] = AJAX_CHAT_USER;
    $users[$index]['userName'] = $row['username'];
    $users[$index]['password'] = $row['password'];
    $users[$index]['channels'] = array(0,1);
}

$users = array_values($users);
