-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 05:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengajuanbeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` text NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `jeniskelamin`, `email`, `nohp`, `alamat`, `role`, `password`, `foto`) VALUES
(2, 'Admin', 'Laki - Laki', 'admin@gmail.com', '08988387271', '-', 'Admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `statuspendaftaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`) VALUES
('C1', 'Pekerjaan Orang Tua'),
('C2', 'Kepemilikan Rumah'),
('C3', 'Penghasilan Orang Tua'),
('C4', 'Kepemilikan Kendaraan'),
('C5', 'Tanggungan'),
('C6', 'Indeks Prestasi'),
('C7', 'Nilai Ujian Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `kode_sub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_kriteria`
--

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID`, `ID1`, `ID2`, `nilai`) VALUES
(100, 'C1', 'C1', 1),
(101, 'C2', 'C1', 0.333333333),
(102, 'C2', 'C2', 1),
(103, 'C1', 'C2', 3),
(104, 'C3', 'C1', 0.333333333),
(105, 'C3', 'C2', 0.333333333),
(106, 'C3', 'C3', 1),
(107, 'C1', 'C3', 3),
(108, 'C2', 'C3', 3),
(109, 'C4', 'C1', 0.2),
(110, 'C4', 'C2', 0.333333333),
(111, 'C4', 'C3', 4),
(112, 'C4', 'C4', 1),
(113, 'C1', 'C4', 5),
(114, 'C2', 'C4', 3),
(115, 'C3', 'C4', 0.25),
(116, 'C5', 'C1', 0.142857142),
(117, 'C5', 'C2', 0.2),
(118, 'C5', 'C3', 0.333333333),
(119, 'C5', 'C4', 0.333333333),
(120, 'C5', 'C5', 1),
(121, 'C1', 'C5', 7),
(122, 'C2', 'C5', 5),
(123, 'C3', 'C5', 3),
(124, 'C4', 'C5', 3),
(125, 'C6', 'C1', 3),
(126, 'C6', 'C2', 1),
(127, 'C6', 'C3', 1),
(128, 'C6', 'C4', 1),
(129, 'C6', 'C5', 1),
(130, 'C6', 'C6', 1),
(131, 'C1', 'C6', 0.333333333),
(132, 'C2', 'C6', 1),
(133, 'C3', 'C6', 1),
(134, 'C4', 'C6', 1),
(135, 'C5', 'C6', 1),
(136, 'C7', 'C1', 1),
(137, 'C7', 'C2', 1),
(138, 'C7', 'C3', 1),
(139, 'C7', 'C4', 1),
(140, 'C7', 'C5', 1),
(141, 'C7', 'C6', 1),
(142, 'C7', 'C7', 1),
(143, 'C1', 'C7', 1),
(144, 'C2', 'C7', 1),
(145, 'C3', 'C7', 1),
(146, 'C4', 'C7', 1),
(147, 'C5', 'C7', 1),
(148, 'C6', 'C7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_sub`
--

CREATE TABLE `tb_rel_sub` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(255) DEFAULT NULL,
  `ID2` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_sub`
--

INSERT INTO `tb_rel_sub` (`ID`, `ID1`, `ID2`, `nilai`, `bobot`) VALUES
(751, 'KK2', 'JP3', 1, NULL),
(503, 'PK3', 'KR3', 1, NULL),
(502, 'PK2', 'KR3', 1, NULL),
(772, 'PK3', 'KK2', 1, NULL),
(750, 'KK2', 'JP2', 1, NULL),
(749, 'KK2', 'JP1', 1, NULL),
(530, 'KR2', 'JP2', 1, NULL),
(531, 'KR3', 'JP2', 1, NULL),
(486, 'PK3', 'KR2', 1, NULL),
(771, 'PK2', 'KK2', 1, NULL),
(748, 'KK2', 'JA3', 1, NULL),
(543, 'JP3', 'PK3', 1, NULL),
(528, 'JP1', 'JP2', 5, NULL),
(529, 'KR1', 'JP2', 1, NULL),
(499, 'KR1', 'KR3', 7, NULL),
(500, 'KR2', 'KR3', 7, NULL),
(501, 'PK1', 'KR3', 1, NULL),
(525, 'JP2', 'PK1', 1, NULL),
(526, 'JP2', 'PK2', 1, NULL),
(527, 'JP2', 'PK3', 1, NULL),
(441, 'PK1', 'PK2', 0.333333333, NULL),
(523, 'JP2', 'KR2', 1, NULL),
(524, 'JP2', 'KR3', 1, NULL),
(483, 'KR1', 'KR2', 5, NULL),
(484, 'PK1', 'KR2', 1, NULL),
(485, 'PK2', 'KR2', 1, NULL),
(747, 'KK2', 'JA2', 1, NULL),
(522, 'JP2', 'KR1', 1, NULL),
(746, 'KK2', 'JA1', 1, NULL),
(745, 'PK3', 'KK1', 1, NULL),
(458, 'PK2', 'PK3', 3, NULL),
(744, 'PK2', 'KK1', 1, NULL),
(519, 'PK3', 'JP1', 1, NULL),
(520, 'JP2', 'JP1', 0.2, NULL),
(521, 'JP2', 'JP2', 1, NULL),
(495, 'KR3', 'PK3', 1, NULL),
(743, 'PK1', 'KK1', 1, NULL),
(742, 'KR3', 'KK1', 1, NULL),
(741, 'KR2', 'KK1', 1, NULL),
(478, 'KR2', 'PK2', 1, NULL),
(479, 'KR2', 'PK3', 1, NULL),
(541, 'JP3', 'PK1', 1, NULL),
(542, 'JP3', 'PK2', 1, NULL),
(539, 'JP3', 'KR2', 1, NULL),
(540, 'JP3', 'KR3', 1, NULL),
(494, 'KR3', 'PK2', 1, NULL),
(517, 'PK1', 'JP1', 1, NULL),
(518, 'PK2', 'JP1', 1, NULL),
(457, 'PK1', 'PK3', 5, NULL),
(477, 'KR2', 'PK1', 1, NULL),
(516, 'KR3', 'JP1', 1, NULL),
(420, 'PK1', 'PK1', 1, NULL),
(740, 'KR1', 'KK1', 1, NULL),
(538, 'JP3', 'KR1', 1, NULL),
(475, 'KR2', 'KR1', 0.2, NULL),
(476, 'KR2', 'KR2', 1, NULL),
(739, 'JP3', 'KK1', 1, NULL),
(493, 'KR3', 'PK1', 1, NULL),
(547, 'KR2', 'JP3', 1, NULL),
(548, 'KR3', 'JP3', 1, NULL),
(549, 'PK1', 'JP3', 1, NULL),
(550, 'PK2', 'JP3', 1, NULL),
(551, 'PK3', 'JP3', 1, NULL),
(512, 'JP1', 'PK2', 1, NULL),
(513, 'JP1', 'PK3', 1, NULL),
(514, 'KR1', 'JP1', 1, NULL),
(515, 'KR2', 'JP1', 1, NULL),
(434, 'PK2', 'PK2', 1, NULL),
(738, 'JP2', 'KK1', 1, NULL),
(537, 'JP3', 'JP3', 1, NULL),
(490, 'KR3', 'KR1', 0.142857142, NULL),
(491, 'KR3', 'KR2', 0.142857142, NULL),
(492, 'KR3', 'KR3', 1, NULL),
(536, 'JP3', 'JP2', 0.333333333, NULL),
(469, 'PK1', 'KR1', 1, NULL),
(470, 'PK2', 'KR1', 1, NULL),
(471, 'PK3', 'KR1', 1, NULL),
(511, 'JP1', 'PK1', 1, NULL),
(450, 'PK3', 'PK3', 1, NULL),
(449, 'PK3', 'PK2', 0.333333333, NULL),
(770, 'PK1', 'KK2', 1, NULL),
(737, 'JP1', 'KK1', 1, NULL),
(448, 'PK3', 'PK1', 0.2, NULL),
(465, 'KR1', 'PK3', 1, NULL),
(546, 'KR1', 'JP3', 1, NULL),
(509, 'JP1', 'KR2', 1, NULL),
(510, 'JP1', 'KR3', 1, NULL),
(464, 'KR1', 'PK2', 1, NULL),
(736, 'JA3', 'KK1', 1, NULL),
(735, 'JA2', 'KK1', 1, NULL),
(508, 'JP1', 'KR1', 1, NULL),
(433, 'PK2', 'PK1', 3, NULL),
(507, 'JP1', 'JP1', 1, NULL),
(535, 'JP3', 'JP1', 0.125, NULL),
(534, 'PK3', 'JP2', 1, NULL),
(545, 'JP2', 'JP3', 3, NULL),
(463, 'KR1', 'PK1', 1, NULL),
(734, 'JA1', 'KK1', 1, NULL),
(733, 'KK1', 'PK3', 1, NULL),
(533, 'PK2', 'JP2', 1, NULL),
(462, 'KR1', 'KR1', 1, NULL),
(544, 'JP1', 'JP3', 8, NULL),
(532, 'PK1', 'JP2', 1, NULL),
(769, 'KR3', 'KK2', 1, NULL),
(768, 'KR2', 'KK2', 1, NULL),
(767, 'KR1', 'KK2', 1, NULL),
(766, 'KK1', 'KK2', 0.5, NULL),
(765, 'JP3', 'KK2', 1, NULL),
(764, 'JP2', 'KK2', 1, NULL),
(763, 'JP1', 'KK2', 1, NULL),
(762, 'JA3', 'KK2', 1, NULL),
(761, 'JA2', 'KK2', 1, NULL),
(760, 'JA1', 'KK2', 1, NULL),
(759, 'KK2', 'PK3', 1, NULL),
(758, 'KK2', 'PK2', 1, NULL),
(757, 'KK2', 'PK1', 1, NULL),
(756, 'KK2', 'KR3', 1, NULL),
(755, 'KK2', 'KR2', 1, NULL),
(754, 'KK2', 'KR1', 1, NULL),
(753, 'KK2', 'KK2', 1, NULL),
(752, 'KK2', 'KK1', 2, NULL),
(794, 'KK1', 'KK3', 8, NULL),
(793, 'JP3', 'KK3', 1, NULL),
(792, 'JP2', 'KK3', 1, NULL),
(791, 'JP1', 'KK3', 1, NULL),
(790, 'JA3', 'KK3', 1, NULL),
(789, 'JA2', 'KK3', 1, NULL),
(788, 'JA1', 'KK3', 1, NULL),
(787, 'KK3', 'PK3', 1, NULL),
(786, 'KK3', 'PK2', 1, NULL),
(785, 'KK3', 'PK1', 1, NULL),
(784, 'KK3', 'KR3', 1, NULL),
(783, 'KK3', 'KR2', 1, NULL),
(782, 'KK3', 'KR1', 1, NULL),
(781, 'KK3', 'KK3', 1, NULL),
(780, 'KK3', 'KK2', 0.2, NULL),
(779, 'KK3', 'KK1', 0.125, NULL),
(778, 'KK3', 'JP3', 1, NULL),
(777, 'KK3', 'JP2', 1, NULL),
(776, 'KK3', 'JP1', 1, NULL),
(775, 'KK3', 'JA3', 1, NULL),
(774, 'KK3', 'JA2', 1, NULL),
(773, 'KK3', 'JA1', 1, NULL),
(615, 'JA1', 'JA1', 1, NULL),
(616, 'JA1', 'JP1', 1, NULL),
(617, 'JA1', 'JP2', 1, NULL),
(618, 'JA1', 'JP3', 1, NULL),
(619, 'JA1', 'KR1', 1, NULL),
(620, 'JA1', 'KR2', 1, NULL),
(621, 'JA1', 'KR3', 1, NULL),
(622, 'JA1', 'PK1', 1, NULL),
(623, 'JA1', 'PK2', 1, NULL),
(624, 'JA1', 'PK3', 1, NULL),
(732, 'KK1', 'PK2', 1, NULL),
(731, 'KK1', 'PK1', 1, NULL),
(628, 'JP1', 'JA1', 1, NULL),
(629, 'JP2', 'JA1', 1, NULL),
(630, 'JP3', 'JA1', 1, NULL),
(631, 'KR1', 'JA1', 1, NULL),
(632, 'KR2', 'JA1', 1, NULL),
(633, 'KR3', 'JA1', 1, NULL),
(634, 'PK1', 'JA1', 1, NULL),
(635, 'PK2', 'JA1', 1, NULL),
(636, 'PK3', 'JA1', 1, NULL),
(730, 'KK1', 'KR3', 1, NULL),
(729, 'KK1', 'KR2', 1, NULL),
(640, 'JA2', 'JA1', 3, NULL),
(641, 'JA2', 'JA2', 1, NULL),
(642, 'JA2', 'JP1', 1, NULL),
(643, 'JA2', 'JP2', 1, NULL),
(644, 'JA2', 'JP3', 1, NULL),
(645, 'JA2', 'KR1', 1, NULL),
(646, 'JA2', 'KR2', 1, NULL),
(647, 'JA2', 'KR3', 1, NULL),
(648, 'JA2', 'PK1', 1, NULL),
(649, 'JA2', 'PK2', 1, NULL),
(650, 'JA2', 'PK3', 1, NULL),
(728, 'KK1', 'KR1', 1, NULL),
(727, 'KK1', 'KK1', 1, NULL),
(654, 'JA1', 'JA2', 0.333333333, NULL),
(655, 'JP1', 'JA2', 1, NULL),
(656, 'JP2', 'JA2', 1, NULL),
(657, 'JP3', 'JA2', 1, NULL),
(658, 'KR1', 'JA2', 1, NULL),
(659, 'KR2', 'JA2', 1, NULL),
(660, 'KR3', 'JA2', 1, NULL),
(661, 'PK1', 'JA2', 1, NULL),
(662, 'PK2', 'JA2', 1, NULL),
(663, 'PK3', 'JA2', 1, NULL),
(726, 'KK1', 'JP3', 1, NULL),
(725, 'KK1', 'JP2', 1, NULL),
(667, 'JA3', 'JA1', 0.2, NULL),
(668, 'JA3', 'JA2', 0.333333333, NULL),
(669, 'JA3', 'JA3', 1, NULL),
(670, 'JA3', 'JP1', 1, NULL),
(671, 'JA3', 'JP2', 1, NULL),
(672, 'JA3', 'JP3', 1, NULL),
(673, 'JA3', 'KR1', 1, NULL),
(674, 'JA3', 'KR2', 1, NULL),
(675, 'JA3', 'KR3', 1, NULL),
(676, 'JA3', 'PK1', 1, NULL),
(677, 'JA3', 'PK2', 1, NULL),
(678, 'JA3', 'PK3', 1, NULL),
(724, 'KK1', 'JP1', 1, NULL),
(723, 'KK1', 'JA3', 1, NULL),
(682, 'JA1', 'JA3', 5, NULL),
(683, 'JA2', 'JA3', 3, NULL),
(684, 'JP1', 'JA3', 1, NULL),
(685, 'JP2', 'JA3', 1, NULL),
(686, 'JP3', 'JA3', 1, NULL),
(687, 'KR1', 'JA3', 1, NULL),
(688, 'KR2', 'JA3', 1, NULL),
(689, 'KR3', 'JA3', 1, NULL),
(690, 'PK1', 'JA3', 1, NULL),
(691, 'PK2', 'JA3', 1, NULL),
(692, 'PK3', 'JA3', 1, NULL),
(722, 'KK1', 'JA2', 1, NULL),
(721, 'KK1', 'JA1', 1, NULL),
(795, 'KK2', 'KK3', 5, NULL),
(796, 'KR1', 'KK3', 1, NULL),
(797, 'KR2', 'KK3', 1, NULL),
(798, 'KR3', 'KK3', 1, NULL),
(799, 'PK1', 'KK3', 1, NULL),
(800, 'PK2', 'KK3', 1, NULL),
(801, 'PK3', 'KK3', 1, NULL),
(802, 'KK4', 'JA1', 1, NULL),
(803, 'KK4', 'JA2', 1, NULL),
(804, 'KK4', 'JA3', 1, NULL),
(805, 'KK4', 'JP1', 1, NULL),
(806, 'KK4', 'JP2', 1, NULL),
(807, 'KK4', 'JP3', 1, NULL),
(808, 'KK4', 'KK1', 0.111111111, NULL),
(809, 'KK4', 'KK2', 0.142857142, NULL),
(810, 'KK4', 'KK3', 0.25, NULL),
(811, 'KK4', 'KK4', 1, NULL),
(812, 'KK4', 'KR1', 1, NULL),
(813, 'KK4', 'KR2', 1, NULL),
(814, 'KK4', 'KR3', 1, NULL),
(815, 'KK4', 'PK1', 1, NULL),
(816, 'KK4', 'PK2', 1, NULL),
(817, 'KK4', 'PK3', 1, NULL),
(818, 'JA1', 'KK4', 1, NULL),
(819, 'JA2', 'KK4', 1, NULL),
(820, 'JA3', 'KK4', 1, NULL),
(821, 'JP1', 'KK4', 1, NULL),
(822, 'JP2', 'KK4', 1, NULL),
(823, 'JP3', 'KK4', 1, NULL),
(824, 'KK1', 'KK4', 9, NULL),
(825, 'KK2', 'KK4', 7, NULL),
(826, 'KK3', 'KK4', 4, NULL),
(827, 'KR1', 'KK4', 1, NULL),
(828, 'KR2', 'KK4', 1, NULL),
(829, 'KR3', 'KK4', 1, NULL),
(830, 'PK1', 'KK4', 1, NULL),
(831, 'PK2', 'KK4', 1, NULL),
(832, 'PK3', 'KK4', 1, NULL),
(833, 'IP1', 'IP1', 1, NULL),
(834, 'IP1', 'JA1', 1, NULL),
(835, 'IP1', 'JA2', 1, NULL),
(836, 'IP1', 'JA3', 1, NULL),
(837, 'IP1', 'JP1', 1, NULL),
(838, 'IP1', 'JP2', 1, NULL),
(839, 'IP1', 'JP3', 1, NULL),
(840, 'IP1', 'KK1', 1, NULL),
(841, 'IP1', 'KK2', 1, NULL),
(842, 'IP1', 'KK3', 1, NULL),
(843, 'IP1', 'KK4', 1, NULL),
(844, 'IP1', 'KR1', 1, NULL),
(845, 'IP1', 'KR2', 1, NULL),
(846, 'IP1', 'KR3', 1, NULL),
(847, 'IP1', 'PK1', 1, NULL),
(848, 'IP1', 'PK2', 1, NULL),
(849, 'IP1', 'PK3', 1, NULL),
(850, 'JA1', 'IP1', 1, NULL),
(851, 'JA2', 'IP1', 1, NULL),
(852, 'JA3', 'IP1', 1, NULL),
(853, 'JP1', 'IP1', 1, NULL),
(854, 'JP2', 'IP1', 1, NULL),
(855, 'JP3', 'IP1', 1, NULL),
(856, 'KK1', 'IP1', 1, NULL),
(857, 'KK2', 'IP1', 1, NULL),
(858, 'KK3', 'IP1', 1, NULL),
(859, 'KK4', 'IP1', 1, NULL),
(860, 'KR1', 'IP1', 1, NULL),
(861, 'KR2', 'IP1', 1, NULL),
(862, 'KR3', 'IP1', 1, NULL),
(863, 'PK1', 'IP1', 1, NULL),
(864, 'PK2', 'IP1', 1, NULL),
(865, 'PK3', 'IP1', 1, NULL),
(866, 'IP2', 'IP1', 0.2, NULL),
(867, 'IP2', 'IP2', 1, NULL),
(868, 'IP2', 'JA1', 1, NULL),
(869, 'IP2', 'JA2', 1, NULL),
(870, 'IP2', 'JA3', 1, NULL),
(871, 'IP2', 'JP1', 1, NULL),
(872, 'IP2', 'JP2', 1, NULL),
(873, 'IP2', 'JP3', 1, NULL),
(874, 'IP2', 'KK1', 1, NULL),
(875, 'IP2', 'KK2', 1, NULL),
(876, 'IP2', 'KK3', 1, NULL),
(877, 'IP2', 'KK4', 1, NULL),
(878, 'IP2', 'KR1', 1, NULL),
(879, 'IP2', 'KR2', 1, NULL),
(880, 'IP2', 'KR3', 1, NULL),
(881, 'IP2', 'PK1', 1, NULL),
(882, 'IP2', 'PK2', 1, NULL),
(883, 'IP2', 'PK3', 1, NULL),
(884, 'IP1', 'IP2', 5, NULL),
(885, 'JA1', 'IP2', 1, NULL),
(886, 'JA2', 'IP2', 1, NULL),
(887, 'JA3', 'IP2', 1, NULL),
(888, 'JP1', 'IP2', 1, NULL),
(889, 'JP2', 'IP2', 1, NULL),
(890, 'JP3', 'IP2', 1, NULL),
(891, 'KK1', 'IP2', 1, NULL),
(892, 'KK2', 'IP2', 1, NULL),
(893, 'KK3', 'IP2', 1, NULL),
(894, 'KK4', 'IP2', 1, NULL),
(895, 'KR1', 'IP2', 1, NULL),
(896, 'KR2', 'IP2', 1, NULL),
(897, 'KR3', 'IP2', 1, NULL),
(898, 'PK1', 'IP2', 1, NULL),
(899, 'PK2', 'IP2', 1, NULL),
(900, 'PK3', 'IP2', 1, NULL),
(901, 'IP3', 'IP1', 0.142857142, NULL),
(902, 'IP3', 'IP2', 0.2, NULL),
(903, 'IP3', 'IP3', 1, NULL),
(904, 'IP3', 'JA1', 1, NULL),
(905, 'IP3', 'JA2', 1, NULL),
(906, 'IP3', 'JA3', 1, NULL),
(907, 'IP3', 'JP1', 1, NULL),
(908, 'IP3', 'JP2', 1, NULL),
(909, 'IP3', 'JP3', 1, NULL),
(910, 'IP3', 'KK1', 1, NULL),
(911, 'IP3', 'KK2', 1, NULL),
(912, 'IP3', 'KK3', 1, NULL),
(913, 'IP3', 'KK4', 1, NULL),
(914, 'IP3', 'KR1', 1, NULL),
(915, 'IP3', 'KR2', 1, NULL),
(916, 'IP3', 'KR3', 1, NULL),
(917, 'IP3', 'PK1', 1, NULL),
(918, 'IP3', 'PK2', 1, NULL),
(919, 'IP3', 'PK3', 1, NULL),
(920, 'IP1', 'IP3', 7, NULL),
(921, 'IP2', 'IP3', 5, NULL),
(922, 'JA1', 'IP3', 1, NULL),
(923, 'JA2', 'IP3', 1, NULL),
(924, 'JA3', 'IP3', 1, NULL),
(925, 'JP1', 'IP3', 1, NULL),
(926, 'JP2', 'IP3', 1, NULL),
(927, 'JP3', 'IP3', 1, NULL),
(928, 'KK1', 'IP3', 1, NULL),
(929, 'KK2', 'IP3', 1, NULL),
(930, 'KK3', 'IP3', 1, NULL),
(931, 'KK4', 'IP3', 1, NULL),
(932, 'KR1', 'IP3', 1, NULL),
(933, 'KR2', 'IP3', 1, NULL),
(934, 'KR3', 'IP3', 1, NULL),
(935, 'PK1', 'IP3', 1, NULL),
(936, 'PK2', 'IP3', 1, NULL),
(937, 'PK3', 'IP3', 1, NULL),
(938, 'NU1', 'IP1', 1, NULL),
(939, 'NU1', 'IP2', 1, NULL),
(940, 'NU1', 'IP3', 1, NULL),
(941, 'NU1', 'JA1', 1, NULL),
(942, 'NU1', 'JA2', 1, NULL),
(943, 'NU1', 'JA3', 1, NULL),
(944, 'NU1', 'JP1', 1, NULL),
(945, 'NU1', 'JP2', 1, NULL),
(946, 'NU1', 'JP3', 1, NULL),
(947, 'NU1', 'KK1', 1, NULL),
(948, 'NU1', 'KK2', 1, NULL),
(949, 'NU1', 'KK3', 1, NULL),
(950, 'NU1', 'KK4', 1, NULL),
(951, 'NU1', 'KR1', 1, NULL),
(952, 'NU1', 'KR2', 1, NULL),
(953, 'NU1', 'KR3', 1, NULL),
(954, 'NU1', 'NU1', 1, NULL),
(955, 'NU1', 'PK1', 1, NULL),
(956, 'NU1', 'PK2', 1, NULL),
(957, 'NU1', 'PK3', 1, NULL),
(958, 'IP1', 'NU1', 1, NULL),
(959, 'IP2', 'NU1', 1, NULL),
(960, 'IP3', 'NU1', 1, NULL),
(961, 'JA1', 'NU1', 1, NULL),
(962, 'JA2', 'NU1', 1, NULL),
(963, 'JA3', 'NU1', 1, NULL),
(964, 'JP1', 'NU1', 1, NULL),
(965, 'JP2', 'NU1', 1, NULL),
(966, 'JP3', 'NU1', 1, NULL),
(967, 'KK1', 'NU1', 1, NULL),
(968, 'KK2', 'NU1', 1, NULL),
(969, 'KK3', 'NU1', 1, NULL),
(970, 'KK4', 'NU1', 1, NULL),
(971, 'KR1', 'NU1', 1, NULL),
(972, 'KR2', 'NU1', 1, NULL),
(973, 'KR3', 'NU1', 1, NULL),
(974, 'PK1', 'NU1', 1, NULL),
(975, 'PK2', 'NU1', 1, NULL),
(976, 'PK3', 'NU1', 1, NULL),
(977, 'NU2', 'IP1', 1, NULL),
(978, 'NU2', 'IP2', 1, NULL),
(979, 'NU2', 'IP3', 1, NULL),
(980, 'NU2', 'JA1', 1, NULL),
(981, 'NU2', 'JA2', 1, NULL),
(982, 'NU2', 'JA3', 1, NULL),
(983, 'NU2', 'JP1', 1, NULL),
(984, 'NU2', 'JP2', 1, NULL),
(985, 'NU2', 'JP3', 1, NULL),
(986, 'NU2', 'KK1', 1, NULL),
(987, 'NU2', 'KK2', 1, NULL),
(988, 'NU2', 'KK3', 1, NULL),
(989, 'NU2', 'KK4', 1, NULL),
(990, 'NU2', 'KR1', 1, NULL),
(991, 'NU2', 'KR2', 1, NULL),
(992, 'NU2', 'KR3', 1, NULL),
(993, 'NU2', 'NU1', 0.2, NULL),
(994, 'NU2', 'NU2', 1, NULL),
(995, 'NU2', 'PK1', 1, NULL),
(996, 'NU2', 'PK2', 1, NULL),
(997, 'NU2', 'PK3', 1, NULL),
(998, 'IP1', 'NU2', 1, NULL),
(999, 'IP2', 'NU2', 1, NULL),
(1000, 'IP3', 'NU2', 1, NULL),
(1001, 'JA1', 'NU2', 1, NULL),
(1002, 'JA2', 'NU2', 1, NULL),
(1003, 'JA3', 'NU2', 1, NULL),
(1004, 'JP1', 'NU2', 1, NULL),
(1005, 'JP2', 'NU2', 1, NULL),
(1006, 'JP3', 'NU2', 1, NULL),
(1007, 'KK1', 'NU2', 1, NULL),
(1008, 'KK2', 'NU2', 1, NULL),
(1009, 'KK3', 'NU2', 1, NULL),
(1010, 'KK4', 'NU2', 1, NULL),
(1011, 'KR1', 'NU2', 1, NULL),
(1012, 'KR2', 'NU2', 1, NULL),
(1013, 'KR3', 'NU2', 1, NULL),
(1014, 'NU1', 'NU2', 5, NULL),
(1015, 'PK1', 'NU2', 1, NULL),
(1016, 'PK2', 'NU2', 1, NULL),
(1017, 'PK3', 'NU2', 1, NULL),
(1018, 'NU3', 'IP1', 1, NULL),
(1019, 'NU3', 'IP2', 1, NULL),
(1020, 'NU3', 'IP3', 1, NULL),
(1021, 'NU3', 'JA1', 1, NULL),
(1022, 'NU3', 'JA2', 1, NULL),
(1023, 'NU3', 'JA3', 1, NULL),
(1024, 'NU3', 'JP1', 1, NULL),
(1025, 'NU3', 'JP2', 1, NULL),
(1026, 'NU3', 'JP3', 1, NULL),
(1027, 'NU3', 'KK1', 1, NULL),
(1028, 'NU3', 'KK2', 1, NULL),
(1029, 'NU3', 'KK3', 1, NULL),
(1030, 'NU3', 'KK4', 1, NULL),
(1031, 'NU3', 'KR1', 1, NULL),
(1032, 'NU3', 'KR2', 1, NULL),
(1033, 'NU3', 'KR3', 1, NULL),
(1034, 'NU3', 'NU1', 0.142857142, NULL),
(1035, 'NU3', 'NU2', 1, NULL),
(1036, 'NU3', 'NU3', 1, NULL),
(1037, 'NU3', 'PK1', 1, NULL),
(1038, 'NU3', 'PK2', 1, NULL),
(1039, 'NU3', 'PK3', 1, NULL),
(1040, 'IP1', 'NU3', 1, NULL),
(1041, 'IP2', 'NU3', 1, NULL),
(1042, 'IP3', 'NU3', 1, NULL),
(1043, 'JA1', 'NU3', 1, NULL),
(1044, 'JA2', 'NU3', 1, NULL),
(1045, 'JA3', 'NU3', 1, NULL),
(1046, 'JP1', 'NU3', 1, NULL),
(1047, 'JP2', 'NU3', 1, NULL),
(1048, 'JP3', 'NU3', 1, NULL),
(1049, 'KK1', 'NU3', 1, NULL),
(1050, 'KK2', 'NU3', 1, NULL),
(1051, 'KK3', 'NU3', 1, NULL),
(1052, 'KK4', 'NU3', 1, NULL),
(1053, 'KR1', 'NU3', 1, NULL),
(1054, 'KR2', 'NU3', 1, NULL),
(1055, 'KR3', 'NU3', 1, NULL),
(1056, 'NU1', 'NU3', 7, NULL),
(1057, 'NU2', 'NU3', 1, NULL),
(1058, 'PK1', 'NU3', 1, NULL),
(1059, 'PK2', 'NU3', 1, NULL),
(1060, 'PK3', 'NU3', 1, NULL),
(1061, 'JP4', 'IP1', 1, NULL),
(1062, 'JP4', 'IP2', 1, NULL),
(1063, 'JP4', 'IP3', 1, NULL),
(1064, 'JP4', 'JA1', 1, NULL),
(1065, 'JP4', 'JA2', 1, NULL),
(1066, 'JP4', 'JA3', 1, NULL),
(1067, 'JP4', 'JP1', 0.111111111, NULL),
(1068, 'JP4', 'JP2', 0.2, NULL),
(1069, 'JP4', 'JP3', 0.333333333, NULL),
(1070, 'JP4', 'JP4', 1, NULL),
(1071, 'JP4', 'KK1', 1, NULL),
(1072, 'JP4', 'KK2', 1, NULL),
(1073, 'JP4', 'KK3', 1, NULL),
(1074, 'JP4', 'KK4', 1, NULL),
(1075, 'JP4', 'KR1', 1, NULL),
(1076, 'JP4', 'KR2', 1, NULL),
(1077, 'JP4', 'KR3', 1, NULL),
(1078, 'JP4', 'NU1', 1, NULL),
(1079, 'JP4', 'NU2', 1, NULL),
(1080, 'JP4', 'NU3', 1, NULL),
(1081, 'JP4', 'PK1', 1, NULL),
(1082, 'JP4', 'PK2', 1, NULL),
(1083, 'JP4', 'PK3', 1, NULL),
(1084, 'IP1', 'JP4', 1, NULL),
(1085, 'IP2', 'JP4', 1, NULL),
(1086, 'IP3', 'JP4', 1, NULL),
(1087, 'JA1', 'JP4', 1, NULL),
(1088, 'JA2', 'JP4', 1, NULL),
(1089, 'JA3', 'JP4', 1, NULL),
(1090, 'JP1', 'JP4', 9, NULL),
(1091, 'JP2', 'JP4', 5, NULL),
(1092, 'JP3', 'JP4', 3, NULL),
(1093, 'KK1', 'JP4', 1, NULL),
(1094, 'KK2', 'JP4', 1, NULL),
(1095, 'KK3', 'JP4', 1, NULL),
(1096, 'KK4', 'JP4', 1, NULL),
(1097, 'KR1', 'JP4', 1, NULL),
(1098, 'KR2', 'JP4', 1, NULL),
(1099, 'KR3', 'JP4', 1, NULL),
(1100, 'NU1', 'JP4', 1, NULL),
(1101, 'NU2', 'JP4', 1, NULL),
(1102, 'NU3', 'JP4', 1, NULL),
(1103, 'PK1', 'JP4', 1, NULL),
(1104, 'PK2', 'JP4', 1, NULL),
(1105, 'PK3', 'JP4', 1, NULL),
(1106, 'KR4', 'IP1', 1, NULL),
(1107, 'KR4', 'IP2', 1, NULL),
(1108, 'KR4', 'IP3', 1, NULL),
(1109, 'KR4', 'JA1', 1, NULL),
(1110, 'KR4', 'JA2', 1, NULL),
(1111, 'KR4', 'JA3', 1, NULL),
(1112, 'KR4', 'JP1', 1, NULL),
(1113, 'KR4', 'JP2', 1, NULL),
(1114, 'KR4', 'JP3', 1, NULL),
(1115, 'KR4', 'JP4', 1, NULL),
(1116, 'KR4', 'KK1', 1, NULL),
(1117, 'KR4', 'KK2', 1, NULL),
(1118, 'KR4', 'KK3', 1, NULL),
(1119, 'KR4', 'KK4', 1, NULL),
(1120, 'KR4', 'KR1', 0.111111111, NULL),
(1121, 'KR4', 'KR2', 0.142857142, NULL),
(1122, 'KR4', 'KR3', 0.333333333, NULL),
(1123, 'KR4', 'KR4', 1, NULL),
(1124, 'KR4', 'NU1', 1, NULL),
(1125, 'KR4', 'NU2', 1, NULL),
(1126, 'KR4', 'NU3', 1, NULL),
(1127, 'KR4', 'PK1', 1, NULL),
(1128, 'KR4', 'PK2', 1, NULL),
(1129, 'KR4', 'PK3', 1, NULL),
(1130, 'IP1', 'KR4', 1, NULL),
(1131, 'IP2', 'KR4', 1, NULL),
(1132, 'IP3', 'KR4', 1, NULL),
(1133, 'JA1', 'KR4', 1, NULL),
(1134, 'JA2', 'KR4', 1, NULL),
(1135, 'JA3', 'KR4', 1, NULL),
(1136, 'JP1', 'KR4', 1, NULL),
(1137, 'JP2', 'KR4', 1, NULL),
(1138, 'JP3', 'KR4', 1, NULL),
(1139, 'JP4', 'KR4', 1, NULL),
(1140, 'KK1', 'KR4', 1, NULL),
(1141, 'KK2', 'KR4', 1, NULL),
(1142, 'KK3', 'KR4', 1, NULL),
(1143, 'KK4', 'KR4', 1, NULL),
(1144, 'KR1', 'KR4', 9, NULL),
(1145, 'KR2', 'KR4', 7, NULL),
(1146, 'KR3', 'KR4', 3, NULL),
(1147, 'NU1', 'KR4', 1, NULL),
(1148, 'NU2', 'KR4', 1, NULL),
(1149, 'NU3', 'KR4', 1, NULL),
(1150, 'PK1', 'KR4', 1, NULL),
(1151, 'PK2', 'KR4', 1, NULL),
(1152, 'PK3', 'KR4', 1, NULL),
(1153, 'PK4', 'IP1', 1, NULL),
(1154, 'PK4', 'IP2', 1, NULL),
(1155, 'PK4', 'IP3', 1, NULL),
(1156, 'PK4', 'JA1', 1, NULL),
(1157, 'PK4', 'JA2', 1, NULL),
(1158, 'PK4', 'JA3', 1, NULL),
(1159, 'PK4', 'JP1', 1, NULL),
(1160, 'PK4', 'JP2', 1, NULL),
(1161, 'PK4', 'JP3', 1, NULL),
(1162, 'PK4', 'JP4', 1, NULL),
(1163, 'PK4', 'KK1', 1, NULL),
(1164, 'PK4', 'KK2', 1, NULL),
(1165, 'PK4', 'KK3', 1, NULL),
(1166, 'PK4', 'KK4', 1, NULL),
(1167, 'PK4', 'KR1', 1, NULL),
(1168, 'PK4', 'KR2', 1, NULL),
(1169, 'PK4', 'KR3', 1, NULL),
(1170, 'PK4', 'KR4', 1, NULL),
(1171, 'PK4', 'NU1', 1, NULL),
(1172, 'PK4', 'NU2', 1, NULL),
(1173, 'PK4', 'NU3', 1, NULL),
(1174, 'PK4', 'PK1', 0.142857142, NULL),
(1175, 'PK4', 'PK2', 0.111111111, NULL),
(1176, 'PK4', 'PK3', 0.5, NULL),
(1177, 'PK4', 'PK4', 1, NULL),
(1178, 'IP1', 'PK4', 1, NULL),
(1179, 'IP2', 'PK4', 1, NULL),
(1180, 'IP3', 'PK4', 1, NULL),
(1181, 'JA1', 'PK4', 1, NULL),
(1182, 'JA2', 'PK4', 1, NULL),
(1183, 'JA3', 'PK4', 1, NULL),
(1184, 'JP1', 'PK4', 1, NULL),
(1185, 'JP2', 'PK4', 1, NULL),
(1186, 'JP3', 'PK4', 1, NULL),
(1187, 'JP4', 'PK4', 1, NULL),
(1188, 'KK1', 'PK4', 1, NULL),
(1189, 'KK2', 'PK4', 1, NULL),
(1190, 'KK3', 'PK4', 1, NULL),
(1191, 'KK4', 'PK4', 1, NULL),
(1192, 'KR1', 'PK4', 1, NULL),
(1193, 'KR2', 'PK4', 1, NULL),
(1194, 'KR3', 'PK4', 1, NULL),
(1195, 'KR4', 'PK4', 1, NULL),
(1196, 'NU1', 'PK4', 1, NULL),
(1197, 'NU2', 'PK4', 1, NULL),
(1198, 'NU3', 'PK4', 1, NULL),
(1199, 'PK1', 'PK4', 7, NULL),
(1200, 'PK2', 'PK4', 9, NULL),
(1201, 'PK3', 'PK4', 2, NULL),
(1202, 'JA4', 'IP1', 1, NULL),
(1203, 'JA4', 'IP2', 1, NULL),
(1204, 'JA4', 'IP3', 1, NULL),
(1205, 'JA4', 'JA1', 9, NULL),
(1206, 'JA4', 'JA2', 4, NULL),
(1207, 'JA4', 'JA3', 7, NULL),
(1208, 'JA4', 'JA4', 1, NULL),
(1209, 'JA4', 'JP1', 1, NULL),
(1210, 'JA4', 'JP2', 1, NULL),
(1211, 'JA4', 'JP3', 1, NULL),
(1212, 'JA4', 'JP4', 1, NULL),
(1213, 'JA4', 'KK1', 1, NULL),
(1214, 'JA4', 'KK2', 1, NULL),
(1215, 'JA4', 'KK3', 1, NULL),
(1216, 'JA4', 'KK4', 1, NULL),
(1217, 'JA4', 'KR1', 1, NULL),
(1218, 'JA4', 'KR2', 1, NULL),
(1219, 'JA4', 'KR3', 1, NULL),
(1220, 'JA4', 'KR4', 1, NULL),
(1221, 'JA4', 'NU1', 1, NULL),
(1222, 'JA4', 'NU2', 1, NULL),
(1223, 'JA4', 'NU3', 1, NULL),
(1224, 'JA4', 'PK1', 1, NULL),
(1225, 'JA4', 'PK2', 1, NULL),
(1226, 'JA4', 'PK3', 1, NULL),
(1227, 'JA4', 'PK4', 1, NULL),
(1228, 'IP1', 'JA4', 1, NULL),
(1229, 'IP2', 'JA4', 1, NULL),
(1230, 'IP3', 'JA4', 1, NULL),
(1231, 'JA1', 'JA4', 0.111111111, NULL),
(1232, 'JA2', 'JA4', 0.25, NULL),
(1233, 'JA3', 'JA4', 0.142857142, NULL),
(1234, 'JP1', 'JA4', 1, NULL),
(1235, 'JP2', 'JA4', 1, NULL),
(1236, 'JP3', 'JA4', 1, NULL),
(1237, 'JP4', 'JA4', 1, NULL),
(1238, 'KK1', 'JA4', 1, NULL),
(1239, 'KK2', 'JA4', 1, NULL),
(1240, 'KK3', 'JA4', 1, NULL),
(1241, 'KK4', 'JA4', 1, NULL),
(1242, 'KR1', 'JA4', 1, NULL),
(1243, 'KR2', 'JA4', 1, NULL),
(1244, 'KR3', 'JA4', 1, NULL),
(1245, 'KR4', 'JA4', 1, NULL),
(1246, 'NU1', 'JA4', 1, NULL),
(1247, 'NU2', 'JA4', 1, NULL),
(1248, 'NU3', 'JA4', 1, NULL),
(1249, 'PK1', 'JA4', 1, NULL),
(1250, 'PK2', 'JA4', 1, NULL),
(1251, 'PK3', 'JA4', 1, NULL),
(1252, 'PK4', 'JA4', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub`
--

CREATE TABLE `tb_sub` (
  `kode_sub` varchar(255) NOT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `nama_sub` varchar(255) DEFAULT NULL,
  `nilai_sub` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sub`
--

INSERT INTO `tb_sub` (`kode_sub`, `kode_kriteria`, `nama_sub`, `nilai_sub`) VALUES
('IP1', 'C6', 'Diatas 3,50', 0.69653133430131),
('IP2', 'C6', 'Diatas 3.00 s.d 3.50', 0.23161395916795),
('IP3', 'C6', 'Antara 2.75 s.d 3.00', 0.071854706530739),
('JA1', 'C5', 'Satu Orang', 0.13023993326486),
('JA2', 'C5', 'Dua Orang', 0.18936755714114),
('JA3', 'C5', 'Tiga Orang', 0.057865462847618),
('JA4', 'C5', 'Lebih dari Tiga Orang', 0.62252704674638),
('JP1', 'C3', 'Di Bawah 1.000.000/bln', 0.65256993071305),
('JP2', 'C3', 'Di Bawah 2.000.000/bln', 0.2033368089662),
('JP3', 'C3', 'Antara Rp.2.000.000 s.d kurang dari Rp.3.500.000', 0.096452193706758),
('JP4', 'C3', 'Di Atas Rp. 3.500.000', 0.047641066613998),
('KK1', 'C4', 'Tidak Memiliki Kendaraan', 0.3925764106185),
('KK2', 'C4', 'Punya Sepeda Angin', 0.46121798414427),
('KK3', 'C4', 'Punya Kendaraan Roda Dua', 0.10195134258737),
('KK4', 'C4', 'Punya Kendaraan Roda Empat', 0.044254262649853),
('KR1', 'C2', 'Numpang', 0.59743730275851),
('KR2', 'C2', 'Kontrak', 0.27579180837977),
('KR3', 'C2', 'Rumah Sendiri Semi Permanen', 0.084049484621989),
('KR4', 'C2', 'Rumah Sendiri Permanen', 0.042721404239723),
('NU1', 'C7', 'Rata rata di atas 7', 0.74558144786755),
('NU2', 'C7', 'Rata rata diatas 6 s.d 7', 0.1343014747587),
('NU3', 'C7', 'Rata rata kurang dan sampai 6', 0.12011707737375),
('PK1', 'C1', 'Pensiun', 0.32812499998499),
('PK2', 'C1', 'Pekerja Tidak Tetap / Buruh', 0.51069078956929),
('PK3', 'C1', 'Karyawan Swasta', 0.11101973681801),
('PK4', 'C1', 'Aparatur Sipil Negara', 0.050164473627702);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `asalsekolah` text NOT NULL,
  `perguruantinggi` text NOT NULL,
  `statuslulus` varchar(50) NOT NULL,
  `statusbantuanlain` varchar(50) NOT NULL,
  `strata` varchar(7) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `ipk` varchar(5) NOT NULL,
  `buktiipk` text NOT NULL,
  `scanrekening` text NOT NULL,
  `buktipembayaran` text NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kode_alternatif` (`kode_alternatif`);

--
-- Indexes for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_rel_sub`
--
ALTER TABLE `tb_rel_sub`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_sub`
--
ALTER TABLE `tb_sub`
  ADD PRIMARY KEY (`kode_sub`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tb_rel_sub`
--
ALTER TABLE `tb_rel_sub`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1253;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD CONSTRAINT `tb_alternatif_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
