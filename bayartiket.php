<?php
if (!isset($_POST["jam"]) || !isset($_POST["studio"]) || !isset($_POST["kursi"])) {
?>
    <script>
        alert("Silahkan Input Data");
        window.location.href = `${history.go(-1)}`
    </script>
<?php
};

$form = (object)[
    "id_jadwal" => $_POST["id_jadwal"],
    "id_film" => $_POST["id_film"],
    "id_user" => $_POST["id_user"],
    "jam" => $_POST["jam"],
    "studio" => $_POST["studio"],
    "kursi" => $_POST["kursi"]
];

require_once("./koneksi/db-konek.php");

$que = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_jadwal='$form->id_jadwal' AND id_film='$form->id_film' AND id_studio='$form->studio' AND id_jadwal='$form->id_jadwal'");
while ($row = mysqli_fetch_object($que)) {
    if ($row->seat === $form->kursi) {
        echo '<script>alert("silahkan pilih seat lain");window.location.href = `${history.go(-1)}`</script>';

        return mysqli_error($koneksi);
    }
};

$query = mysqli_query($koneksi, "INSERT INTO pemesanan (id_user, id_film, id_jadwal, seat, id_jam, id_studio, `status`) VALUES ('$form->id_user', '$form->id_film', '$form->id_jadwal','$form->kursi','$form->jam', '$form->studio', 'unpaid')");
if ($query) {
?>
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Berhasil</h2>
        </div>
        <div class="row gy-4 text-center" data-aos="fade-up" data-aos-delay="100">
            <p> Terimakasih melakukan pemesanan tiket. Silahkan melakukan pembayaran
                ke Rekening BNI kami</p>
            <div class="">
                <div class="">
                    <a href="#">
                        <img class="media-object" src="./public/images/bni.png" style="width:100px; height:auto;" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <p>Atas Nama : DMovie<br>
                        Nomor Rek. : 0361245243</p>
                </div>
            </div>
            <div class="col-6 mx-auto">
                <a class="btn btn-dark text-center" href="./profile/">Konfirmasi Pembayaran</a>
            </div>
        </div>
    </div>
<?php
}
