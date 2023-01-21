-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2023 pada 12.34
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `durasi` varchar(50) DEFAULT NULL,
  `pemain` text DEFAULT NULL,
  `poster` text DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `kategory` enum('nowplaying','upcoming') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul`, `genre`, `durasi`, `pemain`, `poster`, `sinopsis`, `harga`, `kategory`) VALUES
(44, 'Black Panther: Wakanda Forever (IMAX 2D)', 'Action, Adventure, Drama', '161 Minutes', 'Letitia Wright, Lupita Nyong\'o, Tenoch Huerta, Angela Bassett, Martin Freeman, Danai Gurira, Michaela Coel, Dominique Thorne, Winston Duke, Richard Schiff, Mabel Cadena', 'https://media.21cineplex.com/webcontent/gallery/pictures/166573283259847_287x421.jpg', 'Rakyat Wakanda kali ini akan berjuang untuk melindungi negerinya dari campur tangan kekuatan dunia setelah kematian sang Raja T\'Challa.', '45000', 'nowplaying'),
(45, 'Uunchai', 'Drama', '170 Minutes', 'Amitabh Bachchan, Anupam Kher, Boman Irani, Sarika', 'https://media.21cineplex.com/webcontent/gallery/pictures/166729626247647_287x421.jpg', 'Memulai perjalanan yang akan terkenang selamanya dengan #Uunchai demi persahabatan seumur hidup! Dukung trio ini saat mereka meninggalkan kehidupan Delhi yang nyaman untuk melakukan perjalanan ke Everest Base Camp. Untuk apa? Karena Persahabatan adalah Satu-satunya Motivasi Mereka!', '45000', 'nowplaying'),
(46, 'Black Adam', 'Action, Fantasy, Sci-Fi', '125 Minutes', 'Dwayne Johnson, Viola Davis, Sarah Shahi, Pierce Brosnan, Noah Centineo, Aldis Hodge, Angel Rosario Jr., Joseph Gatt, Mohammed Amer, Quintessa Swindell', 'https://media.21cineplex.com/webcontent/gallery/pictures/166419185299497_287x421.jpg', 'Berkisah tentang sosok antihero yang mendapatkan kekuatan dari dewa mesir bernama Adam. Ia datang untuk menciptakan keadilan di dunia saat ini.', '45000', 'nowplaying'),
(47, 'Hhashsahhsash', 'action', '25 Menit', 'Dimas dan Pacarnya', '166573283259847_287x421.jpg', 'Berkisah tentang sosok antihero yang mendapatkan kekuatan dari dewa mesir bernama Adam. Ia datang untuk menciptakan keadilan di dunia saat ini.', '450000', 'upcoming'),
(48, 'Qorin', 'Horror', '25 Menit', 'Zulfa Maharani, Omar Daniel, Aghniny Haque, Dea Annisa, Naimma Aljufri, Yusuf Mahardika, Putri Ayudya, Cindy Nirmala, Alyssa Abidin, Pritt Timothy, Ridwan Roull', 'https://media.21cineplex.com/webcontent/gallery/pictures/166849056869806_287x421.jpg', 'Zahra Qurotun Aini adalah seorang siswi tingkat 3 Madrasah Aliyah atau setara SMA di asrama Rodiatul Jannah. Sudah hampir 6 tahun Zahra tinggal di asrama khusus putri, dan selalu menjadi siswi teladan yang memiliki segudang prestasi di sekolah. Zahra menjadi ambisius, dia rela menuruti apapun perintah Ustad Jaelani gurunya, demi mendapatkan nilai. Termasuk tugas untuk menjaga seorang siswi baru yang terkenal nakal bernama Yolanda, dan tugas untuk mengajak para siswi melakukan ritual Qorin. Sementara itu, Umi Hana, yang adalah istri Ustad Jaelani, menemukan keanehan-keanehan pada gelagat dan benda-benda yang disimpan oleh suaminya.', '25000', 'upcoming'),
(50, 'Sri Asih', 'Action, Sci-Fi', ' 135 Minutes', 'Pevita Pearce, Reza Rahadian, Christine Hakim, Jefri Nichol, Dimas Anggara, Surya Saputra, Jenny Zhang, Randy Pangalila', 'https://media.21cineplex.com/webcontent/gallery/pictures/16679753364232_287x421.jpg', 'Alana tidak mengerti mengapa dia selalu dikuasai oleh kemarahan. Tapi dia selalu berusaha untuk melawannya. Dia lahir saat letusan gunung berapi yang memisahkan dia dan orang tuanya. Dia kemudian diadopsi oleh seorang wanita kaya yang berusaha membantunya menjalani kehidupan normal. Tapi saat dewasa, Alana menemukan kebenaran tentang asalnya. Dia bukan manusia biasa. Dia bisa menjadi kebaikan untuk kehidupan. Atau menjadi kehancuran bila ia tidak dapat mengendalikan amarahnya.', '50000', 'nowplaying');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`) VALUES
(1, '2022-12-07'),
(5, '2022-12-02'),
(6, '2022-12-02'),
(11, '2022-12-04'),
(16, '2022-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`) VALUES
(1, '09:30:00'),
(2, '12:00:00'),
(3, '14:30:58'),
(7, '00:58:00'),
(8, '06:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `bukti_tf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `bukti_tf`) VALUES
(5, 21, 'Crêche - Santons - Enfant Jésus - Noël - Render_Tube - Gratuit - Le Monde des Gifs.png'),
(6, 23, 'Crêche - Santons - Enfant Jésus - Noël - Render_Tube - Gratuit - Le Monde des Gifs.png'),
(7, 20, 'resi-pengiriman.jpg'),
(8, 24, 'resi-pengiriman.jpg'),
(9, 25, '4043a0470a04f9a27c943ff2229385a5.jpg'),
(10, 26, 'resi-pengiriman.jpg'),
(11, 7, 'ucDimas.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `seat` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `status` enum('paid','unpaid','proccess') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_film`, `id_jadwal`, `seat`, `id_jam`, `id_studio`, `status`) VALUES
(7, 3, 44, 1, '18', 1, 7, 'paid'),
(20, 1, 44, 1, '16', 1, 7, 'paid'),
(21, 1, 45, 1, '16', 2, 7, 'paid'),
(23, 3, 44, 11, '17', 1, 7, 'paid'),
(24, 6, 44, 11, '1', 3, 7, 'paid'),
(25, 6, 44, 11, '10', 2, 7, 'paid'),
(26, 1, 46, 11, '16', 1, 7, 'paid'),
(27, 1, 50, 16, '10', 1, 11, 'unpaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(11) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `status` enum('active','unactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `seat`
--

INSERT INTO `seat` (`id_seat`, `no_seat`, `status`) VALUES
(1, 1, 'active'),
(2, 2, 'active'),
(3, 3, 'active'),
(4, 4, 'active'),
(5, 5, 'active'),
(6, 6, 'active'),
(7, 7, 'active'),
(8, 8, 'active'),
(9, 9, 'active'),
(10, 10, 'active'),
(11, 11, 'active'),
(12, 12, 'active'),
(13, 13, 'active'),
(14, 14, 'active'),
(15, 15, 'active'),
(16, 16, 'active'),
(17, 17, 'active'),
(18, 18, 'active'),
(19, 19, 'active'),
(20, 20, 'active'),
(21, 21, 'active'),
(22, 22, 'active'),
(23, 23, 'active'),
(24, 24, 'active'),
(25, 25, 'active'),
(26, 26, 'active'),
(27, 27, 'active'),
(28, 28, 'active'),
(29, 29, 'active'),
(30, 30, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `nm_studio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id_studio`, `nm_studio`) VALUES
(7, 'Studio I'),
(8, 'Studio II'),
(9, 'Studio III'),
(11, 'Studio XI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('super_admin','admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `role`) VALUES
(1, 'dimas', 'superadmin', '123123', 'super_admin'),
(2, 'dimas masokis', 'admin', '123123', 'admin'),
(3, 'halland dan messi dan ronaldo', 'halland', '123123', 'customer'),
(6, 'Lionel Messi', 'messi10', '123123', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`,`id_film`,`id_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indeks untuk tabel `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
