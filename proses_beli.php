<!-- INSERT INTO `tb_user` (`id_user`, `username`, `user_number`, `log_user`, `alamat`) VALUES (NULL, 'Nikko Yudha', '23232341', current_timestamp(), 'jl. Guardian Tales No. 12'); -->
<?php
    include 'koneksi.php';
    ?>
            <?php
                if(isset($_POST['submit'])){
                    $Nama = $_POST['nama'];
                    $Email = $_POST['email'];
                    $Alamat = $_POST['alamat'];
                    $Telp = $_POST['no_telp'];
                    $Jumlah_beli = $_POST['jumlah'];
                    $cake_name = $_POST['cake_name'];
                    $id_cake = $_POST['id_cake'];
                    
                    if(isset($_POST['id_order'])){
                        $id_order = $_POST['id_order'];
                        $Jumlah_order_awal = $_POST['order_jumlah'];
                    }

                    // Ambil data User
                    $sql_user=mysqli_query($connect,"SELECT * FROM tb_user WHERE username ='$Nama'");
                    if (!$sql_user) {
                        die("Error in user query: " . mysqli_error($connect));
                    }
                    $data_user=mysqli_fetch_array($sql_user);

                    if($data_user){
                        // Ambil data Cake
                        $sql_cake=mysqli_query($connect,"SELECT * FROM tb_cake WHERE id_cake ='$id_cake'");
                        if (!$sql_cake) {
                            die("Error in cake query: " . mysqli_error($connect));
                        }
                        $data_cake=mysqli_fetch_array($sql_cake);
                        
                        // JIKA UPDATE CART
                        if(isset($Jumlah_order_awal)){
                            if($data_cake){
                                // Update ke tb_order
                                    $sql_order = "UPDATE `tb_order` SET `jumlah` = '$Jumlah_beli' WHERE `tb_order`.`id_order` = '$id_order';";
                                    $query_order = mysqli_query($connect, $sql_order);
                                    if (!$query_order) {
                                        die("Error in order query: " . mysqli_error($connect));
                                    }
                                    if($query_order){
                                        //  Update jumlah cake dari jumlah awal ke jumlah yang telah diupdate
                                        if($Jumlah_order_awal < $Jumlah_beli){
                                            $Selisih_jumlah_beli = $Jumlah_beli- $Jumlah_order_awal;
                                            $jumlah_cake_baru = $data_cake['jumlah'] - $Selisih_jumlah_beli;

                                            $sql_update_cake = "UPDATE `tb_cake` SET `jumlah` = '$jumlah_cake_baru' WHERE `tb_cake`.`id_cake` = {$data_cake['id_cake']};";
                                            $query_update_cake = mysqli_query($connect, $sql_update_cake);
                                            if (!$query_update_cake) {
                                                die("Error in update query: " . mysqli_error($connect));
                                            }
                                        }
                                        elseif ($Jumlah_order_awal > $Jumlah_beli){
                                            $Selisih_jumlah_beli = $Jumlah_order_awal - $Jumlah_beli;
                                            $jumlah_cake_baru = $data_cake['jumlah'] + $Selisih_jumlah_beli;

                                            $sql_update_cake = "UPDATE `tb_cake` SET `jumlah` = '$jumlah_cake_baru' WHERE `tb_cake`.`id_cake` = {$data_cake['id_cake']};";
                                            $query_update_cake = mysqli_query($connect, $sql_update_cake);
                                            if (!$query_update_cake) {
                                                die("Error in update query: " . mysqli_error($connect));
                                            }
                                        }
                                        else {
                                            ?>
                                                <script>
                                                    var user_name = "<?php echo $Nama; ?>";
                                                    alert("Anda tidak melakukan update apapun");
                                                    window.location.href = "cart.php?del=" + user_name;
                                                </script>
                                            <?php
                                        }
                                        if($query_update_cake){
                                            ?>
                                                <script>
                                                    var user_name = "<?php echo $Nama; ?>"; 
                                                    alert("Update berhasil");
                                                    window.location.href = "cart.php?del=" + user_name;
                                                </script>
                                            <?php
                                        }
                                    }
                            }
                        }
                        else{
                            if($data_cake){
                            // Input ke tb_order
                                $sql_order = "INSERT INTO `tb_order` (`id_order`,`id_user`, `id_cake`, `jumlah`, `tanggal_pembelian`, `status`) VALUES (NULL, '{$data_user['id_user']}', '{$data_cake['id_cake']}','$Jumlah_beli', current_timestamp(), 'order')";
                                $query_order = mysqli_query($connect, $sql_order);
                                if (!$query_order) {
                                    die("Error in order query: " . mysqli_error($connect));
                                }
                                if($query_order){
                                    //  Update jumlah cake karena habis dibeli
                                    $jumlah_cake_baru = $data_cake['jumlah'] - $Jumlah_beli; #Pengurangan jumlah cake database terhadap jumlah beli
                                    $sql_update_cake = "UPDATE `tb_cake` SET `jumlah` = '$jumlah_cake_baru' WHERE `tb_cake`.`id_cake` = {$data_cake['id_cake']};";
                                    $query_update_cake = mysqli_query($connect, $sql_update_cake);
                                    if (!$query_update_cake) {
                                        die("Error in update query: " . mysqli_error($connect));
                                    }
                                    if($query_update_cake){
                                        ?>
                                            <script>
                                                var user_name = "<?php echo $Nama; ?>"; 
                                                alert("Pembelian berhasil");
                                                window.location.href = "kuebaru.php?del=" + user_name;
                                            </script>
                                        <?php
                                    }else{
                                        echo "GAGAL MAS :( ";
                                    }
                                }
                            }
                        }
                    }
                }else {
                    header('Location: beli.php?status=gagal');
                }
            ?>
