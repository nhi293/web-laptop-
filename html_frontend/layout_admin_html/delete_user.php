<?php
include '../../html_backend/userClass.php';
$userClass = new userClass();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $result = $userClass->delete_user($id);
    
    if ($result) {
        
        header('Location: quanlyuser.php?message=Xóa thành công');
        exit(); 
    } else {
        
        header('Location: quanlyuser.php?message=Lỗi khi xóa người dùng');
        exit(); 
    }
}
?>
