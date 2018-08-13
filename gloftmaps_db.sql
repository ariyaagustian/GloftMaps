-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 11:47 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gloftmaps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'ariyaagustian@gmail.com', 1534150814);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_dinas` int(11) NOT NULL,
  `kelembagaan` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `wilayah` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `pimpinan` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `jarak` float NOT NULL,
  `telepon` text CHARACTER SET latin1,
  `fax` text CHARACTER SET latin1,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`id_dinas`, `kelembagaan`, `wilayah`, `pimpinan`, `alamat`, `latitude`, `longitude`, `jarak`, `telepon`, `fax`, `status`) VALUES
(1, 'Badan Kepegawaian, Pendidikan dan Pelatihan 1', 'Kota Bandung', 'dr. H. Gunadi Sukma Bhinekas, M.kes', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.9131977', '107.60900859999992', 0, '(022) 4206190', '(022) 4206190', 0),
(2, 'Dinas Kebakaran dan Penanggulangan Bencana', 'Kota Bandung', 'Entol Akhmad Ferdi Ligaswara, S.H. MH.', 'Jl. Sukabumi No.17, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916824', '107.63410799999997', 0, '022-7207113', '-', 0),
(3, 'Dinas Kebudayaan dan Pariwisata', 'Kota Bandung', 'Dra.Dewi Kaniasari,MA.', 'Jl. Jendral Ahmad Yani No.227, Kacapiring, Sumur Bandung, Kota Bandung, Jawa Barat 40113, Indonesia', '-6.9169168', '107.62759260000007', 0, '(022)7271724', '-', 0),
(4, 'Dinas Kependudukan dan Pencatatan Sipil', 'Kota Bandung', 'Dra. Popong Warliati Nuraeni, M.MPd', 'Jl. Ambon No.1, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9087768', '107.61384980000003', 0, '(022) 4209891', '-', 0),
(5, 'Rumah Sakit Khusus Ibu dan Anak', 'Kota Bandung', 'dr. Taat Tagore Diah R. , MKKK', 'Jl. Astanaanyar No.224, Nyengseret, Astanaanyar, Kota Bandung, Jawa Barat 40242, Indonesia', '-6.9292601', '107.60046020000004', 0, '-', '-', 0),
(6, 'Sekretariat Daerah', 'Provinsi Jawa Barat', 'H. IWA KARNIWA SE.Ak.,MM', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-423248', '022-4203450', 0),
(7, 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'Provinsi Jawa Barat', 'Ir. H. KOESMAYADIE TATANG PADMADINATA', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-423248', '022-4203450', 0),
(8, 'Biro Pemerintahan dan Kerjasama', 'Provinsi Jawa Barat', 'PLT Dr. Ir. H. MOHAMMAD TAUFIQ BUDI SANTOSO M.Soc.Sc.', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231161', '-', 0),
(9, 'Biro Hukum dan Hak Asasi Manusia', 'Provinsi Jawa Barat', 'J. J. Budi Prastio, H. S.H., M.H.', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231385', '-', 0),
(10, 'Biro Pelayanan dan Pengembangan Sosial', 'Provinsi Jawa Barat', 'Drs. H. DADY ISKANDAR M.M', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231193', '-', 0),
(11, 'Biro Sarana Perekonomian, Investasi, dan Badan Usaha Milik Daerah', 'Provinsi Jawa Barat', 'Drs. H. MOHAMAD ARIFIN SOEDJAYANA M.M', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231481', '-', 0),
(12, 'Biro Produksi dan Industri', 'Provinsi Jawa Barat', 'PLT Ir. POPPY SOPHIA BAKUR M.EP', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231129', '-', 0),
(13, 'Biro Pengendalian Pembangunan', 'Provinsi Jawa Barat', ' Ir. EPI KUSTIAWAN MP.', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4231417', '-', 0),
(14, 'Asisten Administrasi', 'Provinsi Jawa Barat', 'Dr. H. MUHAMAD SOLIHIN M.Si', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-423248', '022-4203450', 0),
(15, 'Biro Organisasi', 'Provinsi Jawa Barat', 'Dra. NANIN HAYANI ADAM M.Si', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4236250', '-', 0),
(16, 'Biro Hubungan Masyarakat dan Protokol', 'Provinsi Jawa Barat', 'Drs. SONNY SAMSU ADISUDARMA, M.Si', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4232779', '022-4231193', 0),
(17, 'Biro Umum', 'Provinsi Jawa Barat', 'H. RIADI, SKM.,MPH', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9024812', '107.61880999999994', 0, '022-4234259', '-', 0),
(18, 'Sekretaris Dewan Perwakilan Rakyat Daerah', 'Provinsi Jawa Barat', 'Drs.H DAUD ACHMAD', 'Jl. Diponegoro No.27, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.8998703', '107.61754740000003', 0, '022-87831045', '022-87831049', 0),
(19, 'Inspektorat', 'Provinsi Jawa Barat', 'Dr. H. MUHAMAD SOLIHIN M.Si', 'Jl. Surapati No.4, Sadang Serang, Coblong, Kota Bandung, Jawa Barat 40133, Indonesia', '-6.8992216', '107.6201834', 0, '022-4237174', '022- 4231567', 0),
(20, 'Dinas Pendidikan', 'Provinsi Jawa Barat', 'Dr. Ir. H. AHMAD HADADI M.Si', 'Jalan Doktor Rajiman No.6, Pasir Kaliki, Cicendo, Pasir Kaliki, Cicendo, Kota Bandung, Jawa Barat 40171, Indonesia', '-6.904501199999999', '107.60000289999994', 0, '022-4264881', '022-4264813', 0),
(21, 'Dinas Kesehatan', 'Provinsi Jawa Barat', 'dr. H. DODO SUHENDAR MM', 'Jl. Pasteur No.25, Pasir Kaliki, Cicendo, Kota Bandung, Jawa Barat 40171, Indonesia', '-6.900577599999998', '107.60071519999997', 0, '022-4236721', '022-4266583', 0),
(22, 'Dinas Bina Marga dan Penataan Ruang', 'Provinsi Jawa Barat', 'Dr. Ir. Drs. H M. GUNTORO MM', 'Jl. Asia Afrika No.79-81, Braga, Lengkong, Kota Bandung, Jawa Barat 40261, Indonesia', '-6.9215629', '107.61105450000002', 0, '022-4231634', '-', 0),
(23, 'Dinas Sumber Daya Air', 'Provinsi Jawa Barat', 'NANA NASUHA DJUHRI, SP', 'Jl. Braga No.137, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40111, Indonesia', '-6.9142119', '107.60868670000002', 0, '022-4233931', '-', 0),
(24, ' Dinas Perumahan dan Permukiman', 'Provinsi Jawa Barat', 'Ir. BAMBANG RIANTO MSc', 'Jl. Kawaluyaan Indah Raya No.4, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.933872999999998', '107.66214660000003', 0, '022-7319782', '-', 0),
(25, 'Satuan Polisi Pamong Praja', 'Provinsi Jawa Barat', 'Dr. H. ENDJANG NAFFANDY, Drs.,M.Si', 'Jl. Banda No.28, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9077609', '107.61745180000003', 0, '022-4236219', '-', 0),
(26, 'Dinas Sosial', 'Provinsi Jawa Barat', 'Drs. H. ARIFIN HARUN KERTASAPUTRA', 'Jl. Jend. H. Amir Machmud No.331, Cibabat, Cimahi Tengah, Kota Cimahi, Jawa Barat 40522, Indonesia', '-6.886312999999999', '107.553766', 0, '022-6643149', '022-6645535', 0),
(27, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, dan Keluarga Berencana', 'Provinsi Jawa Barat', 'Ir. POPPY SOPHIA BAKUR M.EP', 'Jl. Soekarno Hatta No.458, Batununggal, Bandung Kidul, Kota Bandung, Jawa Barat 40266, Indonesia', '-6.9499456', '107.6234476', 0, '022-7513580', '022-7513581', 0),
(28, 'Dinas Lingkungan Hidup Provinsi Jawabarat', 'Provinsi Jawa Barat', 'Dr.Ir ANANG SUDARNA M.Sc.,Ph.D', 'Jl. Naripan No.25, Braga, Sumur Bandung, Kota Bandung, Jawa Barat 40111, Indonesia', '-6.9196981', '107.6109669', 0, '022-4204871', '-', 0),
(30, 'Dinas Perhubungan', 'Provinsi Jawa Barat', 'Dr. H. DEDI TAUFIK KUROHMAN M.Si', 'Jalan Sukabumi No.1, Kacapiring, Batununggal, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.917877000000001', '107.63231339999993', 0, '022-7272258', '-', 0),
(31, 'Dinas Komunikasi dan Informatika', 'Provinsi Jawa Barat', 'Dr. HENING WIDIATMOKO MA', 'Jalan Taman Sari No.55, Lebak Siliwangi, Coblong, Lb. Siliwangi, Coblong, Kota Bandung, Jawa Barat 40132, Indonesia', '-6.8963953', '107.60920110000006', 0, '022-2502898', '022-2511505', 0),
(32, 'Dinas Koperasi dan Usaha Kecil', 'Provinsi Jawa Barat', 'Dr. H. DUDI SUDRADJAT ABDURACHIM MT.', 'Jl. Soekarno Hatta No.705, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.939299800000001', '107.66089179999994', 0, '022-7302775', '-', 0),
(33, 'Dinas Pemuda dan Olahraga', 'Provinsi Jawa Barat', 'Dr. H. YUDHA MUNAJAT SAPUTRA M.Ed', 'Jalan Pacuan Kuda No.140, Sukamiskin, Arcamanik, Sukamiskin, Arcamanik, Kota Bandung, Jawa Barat 40293, Indonesia', '-6.911080799999999', '107.67527330000007', 0, '022-4209691', '022-4209690', 0),
(34, 'Dinas Perpustakaan dan Kearsipan Daerah', 'Provinsi Jawa Barat', 'Dr. Ir. H. MOHAMMAD TAUFIQ BUDI SANTOSO M.Soc.Sc.', 'Jl. Kawaluyaan Indah II No.4, Jatisari, Buahbatu, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.934584399999999', '107.66319659999999', 0, '022-7320048', '022-7320049', 0),
(35, 'Dinas Tenaga Kerja dan Transmigrasi', 'Provinsi Jawa Barat', 'Dr. Ir. FERRY SOFWAN ARIF M.Si.', 'Jalan Soekarno Hatta No.532, Sekejati, Buahbatu, Sekejati, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.9445091', '107.64641039999992', 0, '022-7564327', '022-7564327', 0),
(36, 'Dinas Ketahanan Pangan dan Peternakan', 'Provinsi Jawa Barat', 'Dr. Ir. Hj. DEWI SARTIKA M.Si.', 'Jl. Ir. H.Djuanda No.358, Dago, Coblong, Kota Bandung, Jawa Barat 40135, Indonesia', '-6.876364700000001', '107.61854719999997', 0, '022-2501151', '022-2513842', 0),
(37, 'Dinas Pariwisata dan Kebudayaan', 'Provinsi Jawa Barat', 'Hj. IDA HERNIDA SH., M.Si', 'Jl. R.E. Martadinata No.209, Cihapit, Bandung Wetan, Kota Bandung, Jawa Barat 40114, Indonesia', '-6.913393699999999', '107.62928379999994', 0, '022-7273209', '-', 0),
(38, 'Dinas Kelautan dan Perikanan', 'Provinsi Jawa Barat', 'Ir. H JAFAR ISMAIL MM', 'Jalan Wastu Kencana No. 17, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.911758', '107.608967', 0, '022-4203471 ', ' 022-4232541', 0),
(39, 'Dinas Tanaman Pangan dan Holtikultura', 'Provinsi Jawa Barat', 'Ir. . HENDY JATNIKA, MM', 'Jl. Surapati No.71, Sadang Serang, Coblong, Kota Bandung, Jawa Barat 40133, Indonesia', '-6.8989458', '107.6228294', 0, '022-2503884', '022-2500713', 0),
(40, 'Dinas Perkebunan Provinsi Jawabarat', 'Provinsi Jawa Barat', 'H. ARIEF SANTOSA SE, MSc', 'Jl. Surapati No.67, Sadang Serang, Coblong, Kota Bandung, Jawa Barat 40133, Indonesia', '-6.898865100000001', '107.62181510000005', 0, '022-2038966', '-', 0),
(41, 'Dinas Kehutanan', 'Provinsi Jawa Barat', 'Ir. BUDI SUSATIJO', 'Jl. Soekarno Hatta No.751, Cisaranten Endah, Bandung, Kota Bandung, Jawa Barat 40292, Indonesia', '-6.9379642', '107.67202099999997', 0, '022-7304031', '022-7304031', 0),
(42, 'Dinas Energi dan Sumber Daya Mineral', 'Provinsi Jawa Barat', 'Ir. EDDY ISKANDAR MUDA NASUTION, Dipl.SE.,MT', 'Jl. Raya Cirebon - Bandung Jl. Soekarno Hatta No.576, Sekejati, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.942110999999999', '107.65467009999998', 0, '022-7506967', '022-7562048', 0),
(43, 'Dinas Perindustrian dan Perdagangan', 'Provinsi Jawa Barat', 'Drs. H. MOHAMAD ARIFIN SOEDJAYANA M.M', 'Jl. Asia Afrika No.146, Paledang, Lengkong, Kota Bandung, Jawa Barat 40261, Indonesia', '-6.922291100000001', '107.61446249999995', 0, '022-4230897', '-', 0),
(44, 'Dinas Kependudukan dan Pencatatan Sipil', 'Provinsi Jawa Barat', 'Dr.H. ABAS BASARI M.Si', 'Jl. Ciumbuleuit No.2, Cipaganti, Coblong, Kota Bandung, Jawa Barat 40132, Indonesia', '-6.884580700000001', '107.60514349999994', 0, '-', '-', 0),
(45, 'Badan Perencanaan Pembangunan Daerah', 'Provinsi Jawa Barat', 'Ir. H. YERRY YANUAR MM', 'Jl. Insinyur H. Djuanda No.287, Dago, Coblong, Kota Bandung, Jawa Barat 40135, Indonesia', '-6.878222999999999', '107.61635000000001', 0, '022-2516061', '22-2510731', 0),
(46, 'Badan Kepegawaian Daerah', 'Provinsi Jawa Barat', 'Ir.H. SUMARWAN HADISOEMARTO', 'Tengah, Jl. Ternate No.2, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9079744', '107.61473209999997', 0, '022-4235026', '022-4235026', 0),
(47, 'Badan Penelitian dan Pengembangan Daerah', 'Provinsi Jawa Barat', 'LUKMAN SHALAHUDDIN, Dr. M.Sc. Ir', 'Jalan Citarum No. 8, Citarum, Bandung Wetan, Cihapit, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9052861', '107.622072', 0, '022-7272919', '022-7272919', 0),
(48, 'Badan Pengelolaan Keuangan dan Aset Daerah', 'Provinsi Jawa Barat', 'Dra. Hj. NURDIALIS M. M. Si.', 'Jl. Diponegoro No.22, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.901280299999999', '107.61874319999993', 0, '022-4205561', '-', 0),
(49, 'Badan Pendapatan Daerah', 'Provinsi Jawa Barat', 'H. DADANG SUHARTO S.H., MM.', 'Jl. Soekarno Hatta No.528, Sekejati, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.946301799999999', '107.64270859999999', 0, '022-7566197', '022-7564880', 0),
(50, 'Badan Penghubung', 'Provinsi Jawa Barat', 'Dr. Wawan Suwandi S.Pd.,M.Pd', 'Jl. Pembangunan II No.3-5, RT.9/RW.2, Petojo Utara, Jakarta Pusat, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10130, Indonesia', '-6.162631999999999', '106.81811399999992', 0, '021-6342265', '021-6337065', 0),
(51, 'Badan Kesatuan Bangsa dan Politik', 'Provinsi Jawa Barat', 'R. RUDDY GANDAKUSUMAH S.H., M.H', 'Jl. W.R. Supratman No.44, Sukamaju, Cibeunying Kidul, Kota Bandung, Jawa Barat 40121, Indonesia', '-6.9097944', '107.63236119999999', 0, '022-7206174', '022-7106286', 0),
(52, ' Badan Penanggulangan Bencana Daerah', 'Provinsi Jawa Barat', 'Dr. Ir. H. DICKY SAROMI, M.Sc.', 'Jl. Soekarno Hatta No.629, Sukapura, Kiaracondong, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.9428666', '107.6479127', 0, '022-7313267', '022-7313267', 0),
(57, 'Badan kepegawaian dan Pengembangan Sumber Daya Manusia', 'Kabupaten Bandung Barat', 'Drs. AGUS MAOLANA, MM', 'Jl. Padalarang - Cisarua KM. 2, Desa Mekarsari, Ngamprah, Mekarsari, Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40561, Indonesia', '-6.840921000000002', '107.51224360000003', 0, '-', '-', 0),
(58, 'Asisten Administrasi Umum dan Kepegawaian', 'Kota Bandung', 'Dr. Hj. Evi Syaefini Shaleha, M.Pd', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4206190', '-', 0),
(59, 'Asisten Pemerintahan dan Kesra', 'Kota Bandung', 'Dra. Kamalia Purbani, MT', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4206485', '022-4221042', 0),
(60, 'Asisten Perekonomian dan Pembangunan', 'Kota Bandung', 'Ir. H. Iming A, M.Si. MH.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4234539', '022-4234539', 0),
(61, 'Badan Kepegawaian, Pendidikan dan Pelatihan', 'Kota Bandung', 'dr. H. Gunadi Sukma Bhinekas, M.kes', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4206190', '022-4206190', 0),
(62, 'Badan Kesatuan Bangsa dan Politik', 'Kota Bandung', 'Drs. Hikmat Ginanjar, M.Si.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4230393', '022-4230097', 0),
(63, 'Badan Pengelolaan Keuangan dan Aset', 'Kota Bandung', 'Drs. H. Dadang Supriatna, MSi.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4204445', '022-4222318', 0),
(64, 'Badan Pengelolaan Pendapatan Daerah', 'Kota Bandung', 'Drs.H. EMA SUMARNA, M.Si', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4235052', '022-4234956', 0),
(65, 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan', 'Kota Bandung', 'Hery Antasari,ST., M.Dev.Plg', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4222316', '-', 0),
(66, 'Bagian Hukum', 'Kota Bandung', 'Bambang Suhari, SH.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4208591', '-', 0),
(67, 'Bagian Humas', 'Kota Bandung', 'Yayan Ahmad Brilyana, S.Sos,', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '-', '-', 0),
(68, 'Bagian Kesejahteraan Rakyat dan Kemasyarakatan', 'Kota Bandung', 'H. Tatang Muhtar, S.Sos. MSi.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-423489', '022-4234889', 0),
(69, 'Bagian Layanan Pengadaan Barang dan Jasa', 'Kota Bandung', 'Drs.Dharmawan', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '-', '-', 0),
(70, 'Bagian Organisasi dan Pemberdayaan Aparatur Daerah', 'Kota Bandung', 'Medi Mahendra, AP, S.Sos, MSi.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4234635', '022-4234635', 0),
(71, 'Bagian Pemerintahan', 'Kota Bandung', 'Drs. H.Anton Sugiana Agustus, M.Si.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4237331', '-', 0),
(72, 'Bagian Perekenonomian', 'Kota Bandung', 'Hj. Lusi Lesminingwati, SE, MM.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4235180', '022-4235180', 0),
(73, 'Bagian Program Desain dan Kwalitas Pembangunan', 'Kota Bandung', 'RIZKI KUSRULYADI,ST. MM.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4203407', '-', 0),
(74, 'Bagian TU dan Kepegawaian', 'Kota Bandung', 'H. Drs. Andri Darusman, M.Si.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4219423', '-', 0),
(75, 'Bagian Umum', 'Kota Bandung', 'Ir. H. DADANG DARMAWAN, M.Si.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-4207184', '-', 0),
(76, 'Dinas Kebakaran dan Penanggulangan Bencana', 'Kota Bandung', 'Entol Akhmad Ferdi Ligaswara, S.H. MH.', 'Jl. Sukabumi No.17, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916824', '107.63410799999997', 0, '022-7207113', '022-7216333', 0),
(77, 'Dinas Kebudayaan dan Pariwisata', 'Kota Bandung', 'Dra.Dewi Kaniasari,MA.', 'JL. Ahmad Yani No.227, Babakan Surabaya, Kiaracondong, Cihapit, Bandung, Kota Bandung, Jawa Barat 40281, Indonesia', '-6.913522200000001', '107.63365780000004', 0, '022-7271724', '022-7210768', 0),
(78, 'Dinas Kependudukan dan Pencatatan Sipil', 'Kota Bandung', 'Dra. Popong Warliati Nuraeni, M.MPd', 'Jl. Ambon No.1, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9087768', '107.61384980000003', 0, '022-4209891', '022-4218695', 0),
(79, 'Dinas Kesehatan', 'Kota Bandung', 'dr. Hj. Rita Verita Sri Hasniarty, MM. MH.Kes.', 'Jalan Citarum No.34, RW.12, Cihapit, Bandung Wetan, Cihapit, Bandung Wetan, Kota Bandung, Jawa Barat 40116, Indonesia', '-6.901495499999999', '107.62570019999998', 0, '-', '-', 0),
(80, 'Dinas Komunikasi dan Informatika', 'Kota Bandung', 'dr. Ahyani Raksanagara, M.Kes.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.9110765', '107.60931359999995', 0, '022-4222398', '022-4222398', 0),
(81, 'Dinas Koperasi,Usaha Mikro Kecil dan Menengah', 'Kota Bandung', 'Drs. Priana Wirasaputra MM.', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.912966000000001', '107.60960299999999', 0, '022-7308358', '-', 0),
(82, 'Dinas Lingkungan Hidup dan Kebersihan', 'Kota Bandung', 'Mohamad Salman Fauzi, S.Ip, M.Si', 'Jalan Sadang Tengah no 4-6, Sekeloa, Coblong, Sekeloa, Coblong, Kota Bandung, Jawa Barat 40133, Indonesia', '-6.8906766', '107.62533150000002', 0, '022-2514327', '022-2514327', 0),
(83, 'Dinas Pangan dan Pertanian', 'Kota Bandung', 'Ir. Hj. Elly Wasliah', 'Jl. Arjuna No.45, Husen Sastranegara, Cicendo, Kota Bandung, Jawa Barat 40174, Indonesia', '-6.912118899999999', '107.58924009999998', 0, '022-6015102', '022-6015975', 0),
(84, 'Dinas Pekerjaan Umum', 'Kota Bandung', 'Ir. Arif Prasetya S, MM.', 'Jl. Cianjur No.34, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916380999999999', '107.63352899999995', 0, '022-7278853', '022-7278805', 0),
(85, 'Dinas Pemberdayaan Perempuan, Perlindungan anak dan Pemberdayaan Masyarakat', 'Kota Bandung', 'H Dedi Supandi, S.STP. MSi.', 'Jl. Maskumambang No.4, Turangga, Lengkong, Kota Bandung, Jawa Barat 40264, Indonesia', '-6.934186', '107.62653669999997', 0, '022-7305023', '-', 0),
(86, 'Dinas Pemuda dan Olah Raga', 'Kota Bandung', 'H. Dodi Ridwansyah, S.Sos, M.Si', 'Jl. Tamansari No.76, Lb. Siliwangi, Coblong, Kota Bandung, Jawa Barat 40132, Indonesia', '-6.896288299999999', '107.60984170000006', 0, '022-2501316', '-', 0),
(87, 'Dinas Penanaman Modal dan PTSP', 'Kota Bandung', 'Drs. Arief Syaifudin, SH.', 'Jalan Cianjur No.34, Kacapiring, Batununggal, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916435000000001', '107.63366500000006', 0, '022-7217663', '022-7217487', 0),
(88, 'Dinas Penataan Ruang', 'Kota Bandung', 'H. Iskandar Zulkarnain, ST, MM', 'Jl. Cianjur No.34, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40195, Indonesia', '-6.9165014', '107.63355079999997', 0, '022-7217451', '022-7217451', 0),
(89, 'Dinas Pendidikan', 'Kota Bandung', 'Dr. H. Elih Sudiapermana, M.Pd', 'Jl. Jendral Ahmad Yani No.237, Merdeka, Batununggal, Kota Bandung, Jawa Barat 40113, Indonesia', '-6.9159821', '107.62897539999994', 0, '022-7106568', '022-7106568', 0),
(90, 'Dinas Pengendalian Penduduk dan KB', 'Kota Bandung', 'Drs. Eddy Marwoto, M.Si', 'Jl. Maskumambang No.4, Turangga, Lengkong, Kota Bandung, Jawa Barat 40264, Indonesia', '-6.934186', '107.62653669999997', 0, '022-7305023', '-', 0),
(91, 'Dinas Perdagangan Dan Perindustrian', 'Kota Bandung', 'Eric Mohamad Atthauriq, SH', 'Jl. Kawaluyaan, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.937801100000001', '107.66365799999994', 0, '022-7308358', '022-7308358', 0),
(92, 'Dinas Perhubungan', 'Kota Bandung', 'Ir. Didi Ruswandi MT.', 'Jl. Soekarno Hatta No.205, Situsaeur, Bojongloa Kidul, Kota Bandung, Jawa Barat 40233, Indonesia', '-6.946217700000001', '107.59347530000002', 0, '022-5220768', '022-5220769', 0),
(93, 'Dinas Perpustakaan dan Kearsipan', 'Kota Bandung', 'Dr. H. A. Maryun Sastrakusumah, MH.', 'Jl. Seram No.2, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9083127', '107.61386859999993', 0, '022-4231921', '022-4231921', 0),
(94, 'Dinas Perumahan dan Kawasan Pemukiman, Pertanahan dan Pertamanan', 'Kota Bandung', 'Ir. H. Arif Prasetya S, MM', 'Jl. Ambon No.1, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9087768', '107.61384980000003', 0, '022-4231921', '-', 0),
(95, 'Dinas Sosial dan Penanggulangan Kemiskinan', 'Kota Bandung', 'Dr. Tono Rusdiantono Hendroyono M.Si.', 'Jl. Cipamokolan No.109, Cipamokolan, Rancasari, Kota Bandung, Jawa Barat 40292, Indonesia', '-6.9483488', '107.67613919999997', 0, '022-2013139', '022-2013139', 0),
(96, 'Dinas Tenaga Kerja', 'Kota Bandung', 'Dr. Asep Cucu Cahyadi,M.Si', 'Jl. R.A.A. Marta Negara No.4, Turangga, Lengkong, Kota Bandung, Jawa Barat 40264, Indonesia', '-6.9332804', '107.62652819999994', 0, '022-7311330', '-', 0),
(97, 'INSPEKTORAT', 'Kota Bandung', 'Koswara. SE. MM. CFrA', 'Jl. Tera No.20, Braga, Sumur Bandung, Kota Bandung, Jawa Barat 40111, Indonesia', '-6.915561100000001', '107.61192340000002', 0, '022-4241862', '022-4241862', 0),
(98, 'Rumah Sakit Khusus Gigi dan Mulut Kota Bandung', 'Kota Bandung', 'drg. Rabaah Puspita Paramita MM', 'Jalan Laks. Laut RE. Martadinata No. 45, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.906162799999999', '107.61410810000007', 0, '022-4234058', '022-4234058', 0),
(99, 'Rumah Sakit Khusus Ibu dan Anak', 'Kota Bandung', 'dr. Taat Tagore Diah Rangkuti, MKKK', 'Jl. Astanaanyar No.224, Nyengseret, Astanaanyar, Kota Bandung, Jawa Barat 40242, Indonesia', '-6.9292601', '107.60046020000004', 0, '022-5201139', '022-5201139', 0),
(100, 'Rumah Sakit Umum Daerah Kota Bandung', 'Kota Bandung', 'dr.EXSENVENNY LALOPUA,M.Kes.', 'Ujung Berung, Cinambo, Jl. Rumah Sakit No.22, Pakemitan, Cinambo, Kota Bandung, Jawa Barat 45474, Indonesia', '-6.915741799999998', '107.69902589999992', 0, '022-7811794', '022-7809581', 0),
(101, 'Satuan Polisi Pamong Praja', 'Kota Bandung', 'H. Dadang Iriana, SH, M.Si.', 'Jl. R.A.A. Marta Negara No.4, Turangga, Lengkong, Kota Bandung, Jawa Barat 40264, Indonesia', '-6.933090300000001', '107.62605310000004', 0, '022-7300292', '-', 0),
(102, 'Sekretariat Dewan Perwakilan Rakyat Kota Bandung', 'Kota Bandung', 'Drs. Kelly Solihin, MSi.', 'Jl. Sukabumi No.30, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916825600000001', '107.63485279999998', 0, '022-87243095', '022-87243095', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE `tbl_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ss9l64h7ej59b6dg6tlv05pd1rdid3j1', '::1', 1533657768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333635373736383b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(512) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1533661304, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '::1', NULL, '$2y$08$kzDOqL2cOJ3XdFC5jx1Fduz5OrGA6Xi9w5GIVzF.LkJjt4rYVcc9C', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, 1533662161, 1533662170, 1, 'admin', 'admin', NULL, '08989239'),
(5, '::1', NULL, '$2y$08$ut.uckm1ect9ZZrVOhsLXu0z/Lq2Q/1YBkMSpmU3nYmDELV/EuWlC', NULL, 'ariyaagustian@gmail.com', NULL, NULL, NULL, NULL, 1533662519, 1534148503, 1, 'Ariya', 'Agustian', NULL, '082191987858'),
(6, '::1', NULL, '$2y$08$Mlu/HBAot5MpCvnECYjn6O9HZF8msXZv41sb0ftQwuHdXtmXja0QS', NULL, 'member@email.com', NULL, NULL, NULL, NULL, 1533662660, 1533662675, 1, 'member', 'member', NULL, '023889'),
(7, '::1', NULL, '$2y$08$G/aXMaFYDw.X8sdU00wgduGyjXq9OFO.4JFYXlNjnJFwS1ks7lVN.', NULL, 'admin@email.com', NULL, NULL, NULL, NULL, 1533662726, 1533662733, 1, 'admin', 'admin', NULL, '023889');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 3, 2),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
