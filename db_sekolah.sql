-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` text NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama_guru`, `jk`, `alamat`, `no_telp`, `level`) VALUES
('12345678', '827ccb0eea8a706c4c34a16891f84e7b', 'Rahayu Sri', 'P', 'Jl. Pasar Baru', '083486745', 'Guru_Piket'),
('1501081001', '827ccb0eea8a706c4c34a16891f84e7b', 'Dila Prima Susanti', 'P', 'Jl. Kapalo Koto', '097', 'Wali_Kelas'),
('1501081002', '827ccb0eea8a706c4c34a16891f84e7b', 'Ahmad Fajrii', 'L', 'gaduiak', '0488458', 'Guru_BK'),
('1501081003', '827ccb0eea8a706c4c34a16891f84e7b', 'Sopi Sapriadi', 'L', 'lubeg', '0967856', 'Kepala_Sekolah'),
('20190101', '827ccb0eea8a706c4c34a16891f84e7b', 'Yudi Hariadi', 'L', 'Padang', '082170217766', 'Wali_Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE IF NOT EXISTS `jenis_pelanggaran` (
  `kode_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` text NOT NULL,
  `bobot` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_pelanggaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`kode_pelanggaran`, `jenis`, `bobot`) VALUES
(0, 'Berkelahi atau tawuran didalam dan di luar lingkungan sekolah', '100'),
(1, 'Terlambat Apel Pagi', '5'),
(2, 'Terlambat masuk pada pergantian jam pelajaran lebi', '5'),
(3, 'Berkuku panjang', '5'),
(4, 'Membuang sampah tidak pada tempatnya', '5'),
(5, 'Memakai cincin, gelang, kalung Bagi siswa laki-lak', '5'),
(6, 'Memakai kaos oblong di dalam baju seragam sekolah', '5'),
(7, 'Memakai sandal atau sepatu bukan warna hitam di li', '10'),
(8, 'Tidak memasang atribut(lokasi sekolah, lambang osi', '10'),
(9, 'Tidak berpakaian rapi atau baju keluar di dalam ar', '10'),
(10, 'Memakai pakaian penuh tulisan, coretan atau bergam', '10'),
(11, 'Memakai topi selain topi sekolah', '10'),
(12, 'Tidak memakai baju seragam sesuai dengan ketentuan', '10'),
(13, 'Rambut panjang, rambut diwarnai bagi siswa laki-la', '10'),
(14, 'Memakai celana ketat/pensil atau te5rlalu longgar ', '15'),
(15, 'Mekai baju lebih pendek atau ketat bagi siswa pere', '15'),
(16, 'Tidak mengikuti upacara bendera, apel pagi, dan up', '15'),
(17, 'Keluar lingkungan sekolah tanpa izin piket', '15'),
(18, 'Tidak belajar pada pelajaran tertentu (cabut/bolos', '15'),
(19, 'Tidak sekolah tanpa keterangan atau berita(alfa)', '15'),
(20, 'Membuat keterangan palsu atau surat palsu', '15'),
(21, 'Berada di lokasi parkir atau perkarangan sekitarny', '15'),
(22, 'Berkata kotor di lingkungan sekolah atau di luar l', '20'),
(23, 'Menggunakan HP(Handphone) pada prose Belajar menga', '20'),
(24, 'Merokok di dalam dan di luar lingkungan sekolah (b', '25'),
(25, 'Merusak fasilitas sekolah (yang bersangkutan mengg', '25'),
(26, 'Membawa senjata tajam ke sekolah kecuali pada kegi', '50'),
(27, 'Membawa buko porno,gambar maupun video porno', '50'),
(28, 'Mencuri di dalam maupun di luar lingkungan sekolah', '100'),
(30, 'Berbicara kasar atau kotor kepada pimpinan sekolah', '100'),
(31, 'Terlibat pergaulan bebas/amoral', '150'),
(32, 'Berjudi di dalam dan di luar lingkungan sekolah(be', '150'),
(33, 'Membawa minuman keras di dalam maupun di luar ling', '200'),
(34, 'Membawa,mengedarkan, dan mengkonsumsi narkoba', '200'),
(35, 'Melawan kepada pimpinan sekolah, guru, karyawan da', '250');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kode_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` text NOT NULL,
  PRIMARY KEY (`kode_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(2, 'Teknik Komputer Jaringan'),
(3, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` text NOT NULL,
  `wali_kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, 'TJK 1B', '1501081001'),
(2, 'TKJ 1C', '20190101');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_online`
--

CREATE TABLE IF NOT EXISTS `kelas_online` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `tingkatan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `mentor` varchar(100) NOT NULL,
  `jb_mentor` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kelas_online`
--

INSERT INTO `kelas_online` (`kelas_id`, `judul`, `kategori`, `gambar`, `tingkatan`, `deskripsi`, `fasilitas`, `mentor`, `jb_mentor`, `keterangan`, `biaya`) VALUES
(1, 'Investasi untuk Mahasiswa', 'Development', 'e534c5eaabb1b6b0246cb64b410bbe66.png', 'Pemula', 'Kenapa investasi bisa dibilang lebih baik dari menabung?\r\n\r\nMenurut Karaniya Dharmasaputra, CEO Bareksa.com, di era digital saat ini investasi lebih baik dibandingkan dengan menabung. Jika kita menyimpan uang dalam instrumen investasi seperti reksadana, bertahun-tahun kemudian bisa bertumbuh. Sedangkan, jika disimpan di bank lama-kelamaan habis terpotong biaya administrasi. Apalagi, sekarang investasi bisa mudah dilakukan hanya dengan handphone. Bahkan, dengan Rp 10.000 saja sudah bisa memulai investasi reksadana.\r\n\r\nDiprediksi kebutuhan di masa depan akan lebih ‘menggila’ dibanding saat ini. Sehingga, perlu memulai investasi agar hasil yang diperoleh tiga kali lipat lebih banyak. Masyarakat Indonesia juga perlu diberikan pengetahuan mengenai investasi sejak dini.\r\n\r\nSayangnya, 70 persen masyarakat Indonesia masih memilih untuk menabung. Selain itu, literasi keuangan Indonesia sangat rendah dan yang mengerti hanya sekitar 1,25 persen saja. Sedangkan, negara lain sudah mengetahui keuntungan yang didapat dari investasi lebih tinggi dibanding menabung. (source : www.kompas.com)\r\n\r\nOleh karena itu, sebagai salah satu upaya untuk meningkatkan kesadaran akan pentingnya investasi sejak dini, Luarsekolah dan DIKA ingin mengajak para pemuda Indonesia, khususnya para mahasiswa untuk ikut serta dalam webinar dengan tema “Investasi untuk Mahasiswa.” Bersama Anis Haerunisa (Research Fellow Direktorat Pasar Modal Syariah), kita akan membahas lebih lanjut tentang pengertian investasi, tipe-tipe investasi, gimana cara memulai investasi, dan masih banyak lagi.', 'Sertifikat, Konsultasi', 'Gema Fajar Ramadhan', 'Web Programmer', '1 Bulan, 7 Modul, Video, E-Book, Podcast', '300000'),
(3, 'Step by Step Menjadi Seorang Trainer Profesional', 'Development', '564ba899b87ce4910e9ec497b997d4c5.png', 'Pemula', 'Dunia public speaking itu luas. Nah, salah satu profesi yang bisa dijajaki dengan kemampuan public speaking salah satunya adalah trainer. Tapi, apakah cukup menjadi trainer hanya bermodalkan public speaking?\r\n\r\nSimak langkah-langkah menjadi trainer profesional yang langsung dibawakan oleh Kak Afif Luthfi, salah satu kreator di Luarsekolah yang juga seorang penulis buku "Maestro Public Speaking", Certified Trainer BNSP dan NLP Practitioner, NFNLP USA. Beliau akan sharing pengalamannya sebagai trainer yang sudah mengisi di berbagai perusahaan nasional dan multinasional.\r\n\r\n\r\nMungkin di antara kamu ada yg ingin tanya-tanya juga seputar tips presentasi dan menjadi pembicara? Kamu juga bisa diskusi langsung dengan narasumber. Jadi, jangan lewatkan webinar yang satu ini!', 'Sertifikat, Konsultasi', 'Agung Laksmana', 'Web Programmer', '1 Bulan, 7 Modul', '29000'),
(4, 'Panduan Praktis Menulis Fiksi', 'Development', '061f76111e829e63ba691289ef01e416.png', 'All Levels', 'Fiksi merupakan dunia sarat imaji; wadah buat kamu yang pengin berbagi cerita. Dari romance, misteri, fiksi ilmiah, hingga fantasi. Fiksi juga adalah salah satu genre tulisan populer dengan target pasar besar nan dinamis.\r\n\r\nDi kelas online penulisan fiksi bersama Luarsekolah, kamu bakal mempelajari banyak hal. Sebut saja pengenalan terhadap ranah fiksi, unsur yang membangun sebuah cerita, pengiriman naskah, hingga poin-poin dalam kontrak penerbitan yang tak boleh luput dari perhatian. Dengan mempelajari hal-hal dasar seputar menulis fiksi, kamu diharapkan mampu menyiapkan naskah yang layak dan meningkatkan peluang diterima penerbit.\r\n\r\nApa yang akan kamu pelajari di kelas Panduan Praktis Menulis Fiksi?\r\n\r\nMengenal Fiksi Dan Genre-Genrenya\r\n\r\nMengenal ragam tulisan dan genre fiksi bakal memudahkanmu menentukan jenis naskah yang hendak ditulis.\r\n\r\nMemahami Unsur Instrinsik\r\n\r\nMembangun karakter, plot, hingga adegan dengan baik akan menghasilkan kisah yang enak dibaca dan menarik atensi penerbit.\r\n\r\nMenyiapkan Dokumen Pendukung Naskah\r\n\r\nSelain naskah, ada dokumen penunjang seperti sinopsis yang tak kalah krusial untuk disiapkan.\r\n\r\nMempelajari Kontrak Penerbitan\r\n\r\nMencermati poin-poin penting dalam kontrak penerbitan membantu penulis mengurus royalti hingga hak terbitnya.', 'Sertifikat, Konsultasi', 'Putra Evans Pratama', 'Web Programmer', '1 Bulan, 12 Modul', 'Gratis'),
(5, 'Sukses Jualan Online di Marketplace', 'Business', '169d060ecde3d7a25bb92d82b545ad0e.png', 'Pemula', 'Deskripsi Kelas\r\n\r\nPada masa sekarang, berjualan tidak lagi harus memiliki toko dan membayar sewa. Alternatifnya adalah jualan online melalui marketplace yang ada dan sosial media. Namun, banyak penjual pemula belum mengerti betul tentang bagaimana memulai sebuah toko online atau mengelolanya. Bisa karena produknya belum matang atau tidak paham cara menggunakan iklan di toko online. Oleh karena itu, luar sekolah hadir memfasilitasi member untuk belajar bagaimana memulai dan menjalankan sebuah toko online.\r\n\r\nApa yang akan kamu pelajari di kelas Sukses Jualan Online di Marketplace?\r\nProses Berjualan Di Toko Online\r\n\r\nPada materi ini kamu akan dijelaskan seluruh proses berjualan sampai produkmu termuat di marketplace tersebut\r\n\r\nMenguatkan Value Produk Dan Marketing Online\r\n\r\nValue ini menjadi sebuah elemen penting yang harus dimunculkan pada produk dan marketingmu\r\n\r\nMemaksimalkan Semua Fitur Yang Tersedia\r\n\r\nPada materi ini kamu akan mengupas semua fitur yang tersedia supaya kamu bisa memaksimalkannya\r\n\r\nSilabus Kelas\r\nBab 1 : Memahami Prinsip Umum Jualan Online\r\nBab 2 : Memilih Marketplace yang Cocok\r\nBab 3 : Memasang Foto Produk yang Menarik\r\nBab 4 : Memaksimalkan Iklan\r\nBab 5 : Strategi Keyword untuk Iklan\r\nBab 6 : Service Oriented dalam Jualan Online\r\nBab 7 : Suka Duka Jualan Online sampai Jadi Starseller', 'Sertifikat, Konsultasi', 'Aditya Gusta', 'Web Programmer', '1 Bulan, 20 Modul', '29000'),
(7, 'Full-Stack Web Developer', 'Premium', 'kSw6pHIs4s2OBJlcr14KxnXFA0uCNWfdGVihHEsB.png', 'All Levels', 'Kelas BWAFWD adalah kelas Full-Stack Web Developer dan juga Web Designer yang di mana kita akan mempelajari UX design, UI design, Website Development dengan Bootstrap dan Laravel\r\n\r\nJika saat ini kamu sedang bingung untuk fokus kepada karir apa maka kelas ini cocok sekali karena kamu akan mempelajari banyak bidang.\r\n\r\nSetelah menyelesaikan kelas ini kamu dapat memilih apa yang akan kamu fokuskan sesuai dengan materi pada kelas BWAFWD.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam at, nihil doloremque eveniet sequi neque facere? Culpa labore alias reiciendis rerum, cumque in laboriosam molestias tempore temporibus aut qui beatae?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam at, nihil doloremque eveniet sequi neque facere? Culpa labore alias reiciendis rerum, cumque in laboriosam molestias tempore temporibus aut qui beatae?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam at, nihil doloremque eveniet sequi neque facere? Culpa labore alias reiciendis rerum, cumque in laboriosam molestias tempore temporibus aut qui beatae?', 'Sertifikat, Konsultasi', 'Gema Fajar Ramadhan', 'Web Programmer', 'Sistem Operasi, \r\nWin 7 8 10 / Mac OS / Linux,', '350000');

-- --------------------------------------------------------

--
-- Table structure for table `konseling`
--

CREATE TABLE IF NOT EXISTS `konseling` (
  `id_konseling` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `nis` varchar(40) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_konseling`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `konseling`
--

INSERT INTO `konseling` (`id_konseling`, `tgl`, `nis`, `catatan`) VALUES
(2, '2019-01-19', '002', 'Maasalah X');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_siswa`
--

CREATE TABLE IF NOT EXISTS `pelanggaran_siswa` (
  `id_plg_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pelanggaran` int(11) NOT NULL,
  `nis` varchar(40) NOT NULL,
  `tgl_pelanggaran` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_plg_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id_plg_siswa`, `kode_pelanggaran`, `nis`, `tgl_pelanggaran`, `keterangan`) VALUES
(4, 1, '002', '2019-01-20', 'Terlambat'),
(5, 3, '002', '2019-01-21', 'Kuku Panjang'),
(6, 11, '151321089', '2019-01-20', '-');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama_siswa`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `kode_kelas`, `kode_jurusan`) VALUES
('002', '827ccb0eea8a706c4c34a16891f84e7b', 'Windi Sri Rahayu', 'P', 'Sijunjung', '1997-02-15', 'Jln pasar baru', '08237839525', 1, 2),
('151321089', '827ccb0eea8a706c4c34a16891f84e7b', 'Robbi Saputra', 'L', 'Padang', '2002-12-01', 'Jl. asahan Timur No 21', '082170215567', 1, 2),
('151321090', '827ccb0eea8a706c4c34a16891f84e7b', 'Gebby Kurnia', 'L', 'Padang', '2002-12-12', 'Jl. Sudirman', '08137455677', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_diskon` int(15) NOT NULL,
  `harga_asli` int(15) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `ukuran` varchar(35) NOT NULL,
  `label` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga_diskon`, `harga_asli`, `warna`, `ukuran`, `label`, `bahan`, `stok`, `gambar`) VALUES
(13, 'Incognito', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '010519031542_HITAM.png'),
(14, 'Deadline', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cutton Combed 30s', 'Pre Order', '060519121854_hitam-d.jpg'),
(15, 'Tutup Tag', 1, 85000, 100000, 'HIjau', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '070519113318_hijau-min.jpg'),
(16, 'Framework Zend', 1, 85000, 100000, 'Maroon', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080519072548_maroon-min.jpg'),
(17, 'Framework Yii', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080519073739_hitam-min.jpg'),
(18, 'Framework Codeigniter', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080519081525_hitam-min.jpg'),
(19, 'Netizen', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819043618_hitam.jpg'),
(20, 'I Need Holiday', 1, 85000, 100000, 'Maroon Misty', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819044243_maroonmisty.jpg'),
(21, 'Developer', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819045439_hitam.jpg'),
(22, 'Instagram', 1, 85000, 100000, 'Putih', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819045932_abumudamisty.jpg'),
(23, 'GitHub', 1, 85000, 100000, 'Putih', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819051824_putih.jpg'),
(24, 'Anonymouse', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819052208_hitam.jpg'),
(25, 'Programmer 3', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819052208_hitam1.jpg'),
(26, 'Programmer', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819052208_hitam3.jpg'),
(27, 'Programmer 2', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819052208_hitam5.jpg'),
(28, 'Pascal', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '090519014017_HITAM.jpg'),
(29, 'Framework Laravel', 1, 85000, 100000, 'Merah', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '091019023235_cento-laravel.jpg'),
(30, 'GitHub 2', 1, 85000, 100000, 'Abu Abu', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '110719023019_abu_tua_misty.jpg'),
(31, 'Framework Laravel 2', 1, 85000, 100000, 'Merah', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '110919121035_01-MERAH-MAROON.jpg'),
(32, 'Vue.js', 1, 85000, 100000, 'Putih', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '110919125519_01-DEPAN.jpg'),
(33, 'Bacot', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '141019065004_01-Depan-Hitam.jpg'),
(34, 'Framework Codeigniter 2', 1, 85000, 100000, 'Maroon', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '180419083353_CI-MAROON.jpg'),
(35, 'Framework Yii 2', 1, 85000, 100000, 'Navy', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '190419010124_YII-NAVY.jpg'),
(36, 'Javascript', 1, 85000, 100000, 'Putih', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '190519044529_putih-min.jpg'),
(37, 'Flutter', 1, 85000, 100000, 'Biru Langit', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '220519102007_birulangit-min.jpg'),
(38, 'Custom Sablon', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cutton Cumbod 30s', 'Pre Order', '310719025104_HITAM.jpg'),
(39, 'Custom Sablon 2', 1, 85000, 1000000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '310719110125_HITAM.jpg'),
(40, 'I Dont Know What I Do', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '0808190522089_hitam.jpg'),
(41, 'Programmer 4', 1, 85000, 100000, 'Hitam', 'S, M, L, XL ', 'Diskon Terbaru Terbatas', 'Cotton Combed 30s', 'Pre Order', '080819052208_hitam2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kaos Polos'),
(2, 'Jacket Casual'),
(3, 'Polo Shirt'),
(4, 'Waist Bag'),
(5, 'Komputer & Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemateri`
--

CREATE TABLE IF NOT EXISTS `tb_pemateri` (
  `id_pemateri` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pemateri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_pemateri`
--

INSERT INTO `tb_pemateri` (`id_pemateri`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Gema Fajar Ramadhan', 'Web Programmer', 'avatar_16.jpg'),
(2, 'Agung Laksmana', 'Web Programmer', 'avatar_7.jpg'),
(3, 'Putra Evans Pratama', 'Web Programmer', 'avatar_10.jpg'),
(4, 'Aditya Gusta', 'Web Programmer', 'avatar_17.jpg');
