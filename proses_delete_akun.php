<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];

    // Delete related orders first
    $delete_orders_sql = "DELETE FROM `tb_order` WHERE `id_user` = '$id_user';";
    $delete_orders_query = mysqli_query($connect, $delete_orders_sql);

    // Proceed to delete the user if there were no errors deleting orders
    if($delete_orders_query){
        $delete_user_sql = "DELETE FROM `tb_user` WHERE `id_user` = '$id_user';";
        $delete_user_query = mysqli_query($connect, $delete_user_sql);
        if($delete_user_query){
            ?>
            <script>
                alert("Akun berhasil dihapus");
                window.location.href = "kuebaru.php";
            </script>
            <?php
        }else{
            echo "Akun gagal dihapus";
        }
    }else{
        echo "Gagal menghapus pesanan terkait";
    }
}else{
    header('Location: beli.php?status=gagal');
}
?>
