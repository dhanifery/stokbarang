<?php
session_start();

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_stockbarang");


// TAMBAH DATA BARANG
if (isset($_POST['add_barang'])) {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

  $insert_data = mysqli_query($conn,"insert into stock (nama_barang, deskripsi, stock) values('$nama_barang','$deskripsi','$stock')");
    if($insert_data){
        header('location:stock_barang.php');
    }else{
        echo 'gagal';
        header('location:stock_barang.php');
    }

}


// UPDATE STOCK BARANG 
if (isset($_POST['update_barang'])) {
    $id= $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];


    $update = mysqli_query($conn, "update stock set nama_barang='$nama_barang', deskripsi='$deskripsi' where id_barang='$id'");

    if ($update) {
        header('location:stock_barang.php');
    }else{
        header('location:stock_barang.php');
    }
}

// HAPUS DATA STOCK BARANG 
if (isset($_POST['hapus_barang'])) {
    $id= $_POST['id'];
    
    $hapus = mysqli_query($conn, "delete from stock where id_barang='$id'");

    if ($hapus) {
        header('location:stock_barang.php');
    }else{
        header('location:stock_barang.php');
    }
}


// TAMBAH DATA BARANG MASUK
if (isset($_POST['add_barang_masuk'])) {
    $id_barang = $_POST['id_barang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $cek_stock = mysqli_query($conn, "select * from stock where id_barang = '$id_barang'");
    $ambil_data = mysqli_fetch_array($cek_stock);

    $new_stock = $ambil_data['stock'];
    $new_stock_qty = $new_stock + $qty;

    $insert_data = mysqli_query($conn,"insert into barang_masuk (id_barang, keterangan, qty) values('$id_barang','$keterangan' ,'$qty')");
    $update_stock_masuk = mysqli_query($conn,"update stock set stock='$new_stock_qty' where id_barang='$id_barang'");

    if($insert_data && $update_stock_masuk){
        header('location:barang_masuk.php');
    }else{
        echo 'gagal';
        header('location:barang_masuk.php');
    }

}

// UPDATE STOCK BARANG MASUK 
if (isset($_POST['update_barang_masuk'])) {
    $id_masuk= $_POST['id_masuk'];
    $id_barang= $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];


    $cek_stock = mysqli_query($conn, "select * from stock where id_barang='$id_barang'");
    $stock = mysqli_fetch_array($cek_stock);
    $new_stock = $stock['stock'];

    $cek_qty = mysqli_query($conn, "select * from barang_masuk where id_masuk='$id_masuk'");
    $get_qty = mysqli_fetch_array($cek_qty);
    $new_qty = $get_qty['qty'];


    if($qty > $new_qty){
        $selisih = $qty - $new_qty;
        $tambah = $new_stock + $selisih;
        $tambah_stock = mysqli_query($conn, "update stock set stock='$tambah' where  id_barang='$id_barang'");
        $update = mysqli_query($conn, "update barang_masuk set qty='$qty', keterangan='$keterangan' where id_masuk='$id_masuk'");
        if ($tambah_stock && $update) {
            header('location:barang_masuk.php');
        }else {
            echo "gagal";
            header('location:barang_masuk.php');
        }
    }else {
        $selisih = $new_qty - $qty;
        $kurangi = $new_stock - $selisih;
        $kurangi_stock = mysqli_query($conn, "update stock set stock='$kurangi' where  id_barang='$id_barang'");
        $update = mysqli_query($conn, "update barang_masuk set qty='$qty', keterangan='$keterangan' where id_masuk='$id_masuk'");
        if ($kurangi_stock && $update) {
            header('location:barang_masuk.php');
        }else {
            echo "gagal";
            header('location:barang_masuk.php');
        }
    }
}


// HAPUS DATA STOCK BARANG MASUK
if (isset($_POST['hapus_barang_masuk'])) {
    $id_masuk= $_POST['id_masuk'];
    
    $hapus = mysqli_query($conn, "delete from barang_masuk where id_masuk='$id_masuk'");

    if ($hapus) {
        header('location:barang_masuk.php');
    }else{
        header('location:barang_masuk.php');
    }
}



// TAMBAH DATA BARANG KELUAR
if (isset($_POST['add_barang_keluar'])) {
    $id_barang = $_POST['id_barang'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cek_stock = mysqli_query($conn, "select * from stock where id_barang = '$id_barang'");
    $ambil_data = mysqli_fetch_array($cek_stock);

    $new_stock = $ambil_data['stock'];
    $new_stock_qty = $new_stock - $qty;

    $insert_data = mysqli_query($conn,"insert into barang_keluar (id_barang, penerima, qty) values('$id_barang','$penerima' ,'$qty')");
    $update_stock_keluar = mysqli_query($conn,"update stock set stock='$new_stock_qty' where id_barang='$id_barang'");

    if($insert_data && $update_stock_keluar){
        header('location:barang_keluar.php');
    }else{
        echo 'gagal';
        header('location:barang_keluar.php');
    }

}



// UPDATE STOCK BARANG KELUAR 
if (isset($_POST['update_barang_keluar'])) {
    $id_keluar= $_POST['id_keluar'];
    $id_barang= $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];


    $cek_stock = mysqli_query($conn, "select * from stock where id_barang='$id_barang'");
    $stock = mysqli_fetch_array($cek_stock);
    $new_stock = $stock['stock'];

    $cek_qty = mysqli_query($conn, "select * from barang_keluar where id_keluar='$id_keluar'");
    $get_qty = mysqli_fetch_array($cek_qty);
    $new_qty = $get_qty['qty'];


    if($qty < $new_qty){
        $selisih = $qty - $new_qty;
        $kurangi = $new_stock - $selisih;
        $kurangi_stock = mysqli_query($conn, "update stock set stock='$kurangi' where  id_barang='$id_barang'");
        $update = mysqli_query($conn, "update barang_keluar set qty='$qty', penerima='$penerima' where id_keluar='$id_keluar'");
        if ($kurangi_stock && $update) {
            header('location:barang_keluar.php');
        }else {
            echo "gagal";
            header('location:barang_keluar.php');
        }
    }
    else {
        $selisih = $new_qty - $qty;
        $kurangi = $new_stock + $selisih;
        $kurangi_stock = mysqli_query($conn, "update stock set stock='$kurangi' where  id_barang='$id_barang'");
        $update = mysqli_query($conn, "update barang_keluar set qty='$qty', penerima='$penerima' where id_keluar='$id_keluar'");
        if ($kurangi_stock && $update) {
            header('location:barang_keluar.php');
        }else {
            echo "gagal";
            header('location:barang_keluar.php');
        }
    }
}

// HAPUS DATA STOCK BARANG KELUAR
if (isset($_POST['hapus_barang_keluar'])) {
    $id_keluar= $_POST['id_keluar'];
    
    $hapus = mysqli_query($conn, "delete from barang_keluar where id_keluar='$id_keluar'");

    if ($hapus) {
        header('location:barang_keluar.php');
    }else{
        header('location:barang_keluar.php');
    }
}

?>