<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $sql=mysqli_query($connect,"SELECT * FROM tb_user WHERE email = '$Email' AND password = '$Password'");
        $data=mysqli_fetch_array($sql);
        if($data){
            ?>
            <script>
                alert("login berhasil");
                var nama_user = "<?php echo $data['username']; ?>";
                window.location.href = "kuebaru.php?del=" + nama_user;
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Akun tidak ada");
                window.location.href = "login.php";        
            </script>
            <?php
        }
    }else {
        header('Location: beli.php?status=gagal');
    }
?>