-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Sep 2019 pada 17.36
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `idcustomer` int(11) NOT NULL,
  `namacustomer` varchar(50) DEFAULT NULL,
  `alamat` text,
  `Telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `PIC` varchar(50) DEFAULT NULL,
  `selesperson` varchar(50) DEFAULT NULL,
  `customerproduct` varchar(50) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`idcustomer`, `namacustomer`, `alamat`, `Telp`, `email`, `PIC`, `selesperson`, `customerproduct`, `time`, `ip`) VALUES
(1, 'MCD Grand Wisata', 'Grand Wisata. Tambun Selatan - Bekasi', '02188969696', 'MCD@mail.com', 'Agus Setiawan', 'Silvi', 'EDC', 1563012228, '::1'),
(2, 'ABC', 'Tam-Sel', '0215555', 'dayday@mail.com', 'Rita', 'Jaka', 'EDCData', 1561961330, '::1'),
(3, 'BANK Mandiri', 'Jakarta pusat', '0215564879', 'mandiri@mail.com', 'Rafli', 'Shinta', 'EDCData', 1561961335, '::1'),
(4, 'PLN1', 'Jakarta Pusat', '0216869633', 'PLN@yahoo.co.id', 'Agus', 'Dodi', 'Data', 1562498964, '::1'),
(5, 'Starbuck Coffee', 'Grand Wisata - Tambun', '022222222', 'ABC@mail.com', 'Nanda Hairul', 'Kiki Khoirunisa', 'EDC', 1562499011, '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_emails`
--

CREATE TABLE `log_emails` (
  `idemail` int(11) NOT NULL,
  `idticket` int(11) DEFAULT NULL,
  `emailto` varchar(255) DEFAULT NULL,
  `emailcc` varchar(255) DEFAULT NULL,
  `emailbcc` varchar(255) DEFAULT NULL,
  `emailsubject` varchar(255) DEFAULT NULL,
  `message` text,
  `emailstatus` varchar(50) DEFAULT NULL,
  `senddate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_emails`
--

INSERT INTO `log_emails` (`idemail`, `idticket`, `emailto`, `emailcc`, `emailbcc`, `emailsubject`, `message`, `emailstatus`, `senddate`) VALUES
(65, 33, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 33/SR/Aug/2019 has assigned to you', 'Dear Muhammad Denis, \r\n\r\nYou are currently assign for this ticket.\r\n\r\nPlease follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedit.php?id=33 \r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'Sent', 1565442510),
(66, 33, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 33/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time', 'Dear Assignee, \r\n\r\nWe remaind you that your ticket No: 33/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time.\r\n\r\nPlease give resolution for this ticket as soon as posible.\r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'SLA Remainder', 1565701710),
(67, 34, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 34/SR/Aug/2019 has assigned to you', 'Dear Muhammad Denis, \r\n\r\nYou are currently assign for this ticket.\r\n\r\nPlease follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedit.php?id=34 \r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'Sent', 1565443049),
(68, 34, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 34/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time', 'Dear Assignee, \r\n\r\nWe remaind you that your ticket No: 34/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time.\r\n\r\nPlease give resolution for this ticket as soon as posible.\r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'SLA Remainder', 1565529449),
(69, 35, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 35/SR/Aug/2019 has assigned to you', 'Dear Muhammad Denis, \r\n\r\nYou are currently assign for this ticket.\r\n\r\nPlease follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedit.php?id=35 \r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'Sent', 1565443052),
(70, 35, 'nurhuda090195@gmail.com', '', '', 'Ticket No: 35/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time', 'Dear Assignee, \r\n\r\nWe remaind you that your ticket No: 35/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time.\r\n\r\nPlease give resolution for this ticket as soon as posible.\r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'SLA Remainder', 1565529452),
(71, 36, 'nurhuda090195@gmail.com', 'joisandresky@gmail.com, ', '', 'Ticket No: 36/SR/Aug/2019 has assigned to you', 'Dear Muhammad Denis, \r\n\r\nYou are currently assign for this ticket.\r\n\r\nPlease follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedit.php?id=36 \r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'New', 1567008512),
(72, 36, 'nurhuda090195@gmail.com', 'joisandresky@gmail.com, ', '', 'Ticket No: 36/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time', 'Dear Assignee, \r\n\r\nWe remaind you that your ticket No: 36/SR/Aug/2019 has reached 75% of SLA Resolution Goal Time.\r\n\r\nPlease give resolution for this ticket as soon as posible.\r\n\r\nThank you. \r\n\r\nRegards, \r\n\r\nHelpdesk', 'SLA Remainder', 1567030112);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_tickets`
--

CREATE TABLE `log_tickets` (
  `id` int(11) DEFAULT NULL,
  `sla` varchar(10) DEFAULT NULL,
  `reporteddate` int(11) DEFAULT NULL,
  `reportedby` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `problemsummary` varchar(80) DEFAULT NULL,
  `problemdetail` text,
  `ticketstatus` varchar(20) DEFAULT NULL,
  `assignee` varchar(50) DEFAULT NULL,
  `assigneddate` int(11) DEFAULT NULL,
  `pendingby` varchar(50) DEFAULT NULL,
  `pendingdate` int(11) DEFAULT NULL,
  `resolution` text,
  `resolvedby` varchar(50) DEFAULT NULL,
  `resolveddate` int(11) DEFAULT NULL,
  `closedby` varchar(50) DEFAULT NULL,
  `closeddate` int(11) DEFAULT NULL,
  `changes` varchar(80) DEFAULT NULL,
  `changeby` int(11) DEFAULT NULL,
  `changedate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_tickets`
--

INSERT INTO `log_tickets` (`id`, `sla`, `reporteddate`, `reportedby`, `telp`, `email`, `problemsummary`, `problemdetail`, `ticketstatus`, `assignee`, `assigneddate`, `pendingby`, `pendingdate`, `resolution`, `resolvedby`, `resolveddate`, `closedby`, `closeddate`, `changes`, `changeby`, `changedate`) VALUES
(1, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', 'Pemasangan baru', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561811212),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561811938),
(1, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', 'Pemasangan baru', 'Resolved', '26', NULL, '', 0, 'Pemasangan sudah di lakukan.', 'dennis', 1561812078, '', 0, 'Change Status to Resolved.', 26, 1561812078),
(1, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', 'Pemasangan baru', 'Closed', '26', NULL, '', 0, 'Pemasangan sudah di lakukan.', 'dennis', 1561812078, 'dennis', 1561812096, 'Change Status to Closed.', 26, 1561812096),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Assigned', '26', NULL, '', 0, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', '', 0, '', 0, 'Re-assigned the ticket.', 26, 1561812148),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Resolved', '26', NULL, '', 0, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', 'dennis', 1561812169, '', 0, 'Change Status to Resolved.', 26, 1561812169),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Pending', '26', NULL, 'dennis', 1561812182, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', 'dennis', 1561812169, '', 0, 'Change Status to Pending.', 26, 1561812182),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Resolved', '26', NULL, 'dennis', 1561812182, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', 'dennis', 1561812199, '', 0, 'Change Status to Resolved.', 26, 1561812199),
(2, '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Closed', '26', NULL, 'dennis', 1561812182, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', 'dennis', 1561812199, 'dennis', 1561812208, 'Change Status to Closed.', 26, 1561812208),
(3, '2', 1561741200, 'Huday', '0215555', 'hudahuday75@gmail.com', 'Jaringan Putus', 'Tidak ada koneksi internet', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561814423),
(3, '2', 1561741200, 'Huday', '0215555', 'hudahuday75@gmail.com', 'Jaringan Putus', 'Tidak ada koneksi internet', 'Resolved', '26', NULL, '', 0, 'Ganti Kabel lan', 'dennis', 1561814480, '', 0, 'Change Status to Resolved.', 26, 1561814480),
(3, '2', 1561741200, 'Huday', '0215555', 'hudahuday75@gmail.com', 'Jaringan Putus', 'Tidak ada koneksi internet', 'Closed', '26', NULL, '', 0, 'Ganti Kabel lan', 'dennis', 1561814480, 'dennis', 1561814489, 'Change Status to Closed.', 26, 1561814489),
(4, '3', 1561741200, 'Agus Setiawan', '02188336449', 'helpdesk@mail.com', 'Jairngan Putus', 'tidak ada koneksi internet', 'Assigned', '1', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561814573),
(4, '3', 1561741200, 'Agus Setiawan', '02188336449', 'helpdesk@mail.com', 'Jairngan Putus', 'tidak ada koneksi internet', 'Resolved', '1', NULL, '', 0, 'Ganti Kabel lan', 'admin', 1561814593, '', 0, 'Change Status to Resolved.', 1, 1561814593),
(4, '3', 0, 'Agus Setiawan', '02188336449', 'helpdesk@mail.com', 'Jairngan Putus', NULL, 'Closed', '1', NULL, '', 0, 'Ganti Kabel lan', 'admin', 1561814593, 'admin', 1561814631, 'Change Status to Closed.', 1, 1561814631),
(5, '2', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'EDC EROR', 'EDC Tidak bisa di gunakan.', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561961376),
(5, '2', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'EDC EROR', 'EDC Tidak bisa di gunakan.', 'Assigned', '26', NULL, '', 0, 'Kabel Putus.\r\nPerbaikan atau Ganti Kabel.', '', 0, '', 0, 'Re-assigned the ticket.', 26, 1561961423),
(5, '2', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'EDC EROR', 'EDC Tidak bisa di gunakan.', 'Resolved', '26', NULL, '', 0, 'Kabel Putus.\r\nPerbaikan atau Ganti Kabel.', 'dennis', 1561961438, '', 0, 'Change Status to Resolved.', 26, 1561961438),
(5, '2', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'EDC EROR', 'EDC Tidak bisa di gunakan.', 'Closed', '26', NULL, '', 0, 'Kabel Putus.\r\nPerbaikan atau Ganti Kabel.', 'dennis', 1561961438, 'dennis', 1561961445, 'Change Status to Closed.', 26, 1561961445),
(6, '1', 1561914000, 'Adi', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', 'Pemasangan Baru', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 26, 1561961490),
(7, '2', 1561914000, 'Reno', '02188969696', 'helpdesk@mail.com', 'EDC EROR', 'EDC EROR', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 26, 1561961523),
(8, '1', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'Jaringan Eror', 'Internet tidak bisa di gunakan', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 26, 1561961558),
(6, '1', 0, 'Adi', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', NULL, 'Resolved', '26', NULL, '', 0, 'pasang', 'admin', 1561961799, '', 0, 'Change Status to Resolved.', 1, 1561961799),
(8, '1', 0, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'Jaringan Eror', NULL, 'Pending', '26', NULL, 'admin', 1561961833, 'Terjadi kesalahan pada provider indiehome', '', 0, '', 0, 'Change Status to Pending.', 1, 1561961833),
(6, '1', 0, 'Adi', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', NULL, 'Closed', '26', NULL, '', 0, 'pasang', 'admin', 1561961799, 'huda', 1561962318, 'Change Status to Closed.', 24, 1561962318),
(7, '2', 0, 'Reno', '02188969696', 'helpdesk@mail.com', 'EDC EROR', NULL, 'Resolved', '26', NULL, '', 0, 'Ganti baru', 'huda', 1561962335, '', 0, 'Change Status to Resolved.', 24, 1561962335),
(7, '2', -25200, 'Reno', '02188969696', 'helpdesk@mail.com', 'EDC EROR', 'EDC EROR', 'Closed', '26', NULL, '', 0, 'Ganti baru', 'huda', 1561962335, 'huda', 1561962349, 'Change Status to Closed.', 24, 1561962349),
(9, '1', 1561914000, 'AGUS', '081213490969', 'hudahuday75@gmail.com', 'Pemasangan baru', 'Pemasangan baru', 'Assigned', '24', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561963837),
(10, '1', 1561914000, 'Agus Setiawan', '02188336449', 'nurhuda090195@gmail.com', 'Jaringan Putus', 'Jaringan Putus', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561994786),
(11, '1', 1561914000, 'Agus Setiawan', '02188336449', 'nurhuda090195@gmail.com', 'Jaringan Putus', 'Jaringan Putus', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1561994936),
(12, '1', 1561914000, 'Omen (PIC)', '02188336449', 'mandiri@bank.net', 'Jairngan Putus', 'Tidak ada koneksi internet.', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1562000425),
(13, '2', 1562259600, 'Agus Setiawan', '02132123131', 'ABC@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Assigned', '27', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1562321988),
(13, '2', 1562259600, 'Agus Setiawan', '02132123131', 'ABC@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Resolved', '27', NULL, '', 0, 'Ganti Kabel EDC,karna kabel Edc Putus.', 'Amin', 1562322027, '', 0, 'Change Status to Resolved.', 27, 1562322027),
(13, '2', 1562259600, 'Agus Setiawan', '02132123131', 'ABC@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Resolved', '27', NULL, '', 0, 'Ganti Kabel EDC,karna kabel Edc Putus.', 'Amin', 1562322036, '', 0, 'Change Status to Resolved.', 27, 1562322036),
(13, '2', 1562259600, 'Agus Setiawan', '02132123131', 'ABC@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Closed', '27', NULL, '', 0, 'Ganti Kabel EDC,karna kabel Edc Putus.', 'Amin', 1562322036, 'Amin', 1562322047, 'Change Status to Closed.', 27, 1562322047),
(9, '1', 0, 'AGUS', '081213490969', 'hudahuday75@gmail.com', 'Pemasangan baru', NULL, 'Resolved', '24', NULL, '', 0, 'sudah di pasang', 'admin', 1562335126, '', 0, 'Change Status to Resolved.', 1, 1562335127),
(14, '1', 1562432400, 'AGUS', '081213490969', 'bank@mandiri.com', 'Pemasangan EDC baru', 'Pemasangan EDC baru', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1562499243),
(15, '1', 1562432400, 'Nanda Hairul', '123456', 'PLN@yahoo.co.id', 'Pemasangan Jaringan ', 'Pemasangan Jaringan', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1562499293),
(16, '1', 1562432400, 'Adi', '081213490969', 'PLN@yahoo.co.id', 'Pengetesan EDC', 'tes', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1562507913),
(15, '1', 1562432400, 'Nanda Hairul', '123456', 'PLN@yahoo.co.id', 'Pemasangan Jaringan ', 'Pemasangan Jaringan', 'Resolved', '26', NULL, '', 0, 'Kabel bermasalah,Ganti kabel lan yang baru.', 'dennis', 1562508902, '', 0, 'Change Status to Resolved.', 26, 1562508903),
(15, '1', 1562432400, 'Nanda Hairul', '123456', 'PLN@yahoo.co.id', 'Pemasangan Jaringan ', 'Pemasangan Jaringan', 'Assigned', '26', NULL, '', 0, 'Kabel bermasalah,Ganti kabel lan yang baru.', 'dennis', 1562508902, '', 0, 'Re-assigned the ticket.', 26, 1562509137),
(15, '1', 1562432400, 'Nanda Hairul', '123456', 'PLN@yahoo.co.id', 'Pemasangan Jaringan ', 'Pemasangan Jaringan', 'Resolved', '26', NULL, '', 0, 'Kabel bermasalah,Ganti kabel lan yang baru.', 'dennis', 1562509651, '', 0, 'Change Status to Resolved.', 26, 1562509651),
(15, '1', 1562432400, 'Nanda Hairul', '123456', 'PLN@yahoo.co.id', 'Pemasangan Jaringan ', 'Pemasangan Jaringan', 'Closed', '26', NULL, '', 0, 'Kabel bermasalah,Ganti kabel lan yang baru.', 'dennis', 1562509651, 'dennis', 1562511449, 'Change Status to Closed.', 26, 1562511449),
(14, '1', 1562432400, 'AGUS', '081213490969', 'bank@mandiri.com', 'Pemasangan EDC baru', 'Pemasangan EDC baru', 'Resolved', '26', NULL, '', 0, 'aaaabbcc', 'dennis', 1562945367, '', 0, 'Change Status to Resolved.', 26, 1562945367),
(14, '1', 1562432400, 'AGUS', '081213490969', 'bank@mandiri.com', 'Pemasangan EDC baru', 'Pemasangan EDC baru', 'Resolved', '26', NULL, '', 0, 'aaaabbcc', 'dennis', 1562945438, '', 0, 'Change Status to Resolved.', 26, 1562945438),
(17, '1', 1562950800, 'Bayu', '081213490969', 'MCD@mail.com', 'Pengetesan EDC', 'EDC BELUM DI TES', 'Assigned', '28', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1563010692),
(18, '3', 1562950800, 'AGUS', '081213490969', 'MCD@mail.com', 'Pengetesan EDC', 'aaa', 'Assigned', '28', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1563011005),
(19, '1', 1562950800, 'Adi', '02188969696', 'huday.cool@aaam.com', 'Pengetesan EDC', 'tes', 'Assigned', '28', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1563011086),
(20, '1', 1562950800, 'AGUS', '081213490969', 'MCD@mail.com', 'Pengetesan EDC', 'tes', 'Assigned', '28', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1563011219),
(21, '1', 1562950800, 'AGUS', '02188969696', 'MCD@mail.com', 'EDC EROR', 'oo', 'Assigned', '28', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 1, 1563011304),
(10, '1', 1562950800, 'Agus Setiawan', '02188969696', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 28, 1563012065),
(23, '1', 1562950800, 'Agus Setiawan', '081213490969', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 28, 1563012134),
(24, '3', 1562950800, 'Adi', '081213490969', 'ABC@mail.com', 'Pemasangan baru', 'new', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 28, 1563012335),
(25, '1', 1562950800, 'AGUS', '081213490969', 'mandiri@mail.com', 'EDC EROR', 'a', 'Assigned', '24', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 28, 1563012406),
(26, '1', 1562950800, 'Reno', '081213490969', 'starbuck@coffee.com', 'Jaringan Eror', 'eror', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 28, 1563012452),
(27, '2', 1562950800, 'Agus Setiawan', '081213490969', 'starbuck@coffee.com', 'Pengetesan EDC', 'tes', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563022358),
(24, '3', 0, 'Adi', '081213490969', 'ABC@mail.com', 'Pemasangan baru', NULL, 'Resolved', '29', NULL, '', 0, 'sudah selesai', 'huda', 1563022405, '', 0, 'Change Status to Resolved.', 24, 1563022405),
(24, '3', -25200, 'Adi', '081213490969', 'ABC@mail.com', 'Pemasangan baru', 'tes', 'Resolved', '29', NULL, '', 0, 'sudah selesai', 'Teknisi', 1563022510, '', 0, 'Change Status to Resolved.', 29, 1563022510),
(27, '2', 0, 'Agus Setiawan', '081213490969', 'starbuck@coffee.com', 'Pengetesan EDC', NULL, 'Resolved', '29', NULL, '', 0, 'sudah selesai', 'huda', 1563022641, '', 0, 'Change Status to Resolved.', 24, 1563022642),
(27, '2', 0, 'Agus Setiawan', '081213490969', 'starbuck@coffee.com', 'Pengetesan EDC', NULL, 'Resolved', '29', NULL, '', 0, 'sudah selesai', 'huda', 1563022683, '', 0, 'Change Status to Resolved.', 24, 1563022683),
(27, '2', -25200, 'Agus Setiawan', '081213490969', 'starbuck@coffee.com', 'Pengetesan EDC', 'tes', 'Closed', '29', NULL, '', 0, 'sudah selesai', 'huda', 1563022683, 'huda', 1563022707, 'Change Status to Closed.', 24, 1563022707),
(9, '1', 1562950800, 'AGUS', '081213490969', 'hudahuday75@gmail.com', 'Pemasangan baru', 'pasang baru', 'Closed', '24', NULL, '', 0, 'sudah di pasang', 'admin', 1562335126, 'huda', 1563022850, 'Change Status to Closed.', 24, 1563022851),
(28, '1', 1562950800, 'Adi', '081213490969', 'mandiri@mail.com', 'Pengetesan EDC', 'TES', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563025919),
(25, '1', 1562950800, 'AGUS', '081213490969', 'mandiri@mail.com', 'EDC EROR', 'a', 'Resolved', '24', NULL, '', 0, 'selesai', 'huda', 1563115417, '', 0, 'Change Status to Resolved.', 24, 1563115417),
(25, '1', 1562950800, 'AGUS', '081213490969', 'mandiri@mail.com', 'EDC EROR', 'a', 'Closed', '24', NULL, '', 0, 'selesai', 'huda', 1563115417, 'huda', 1563115428, 'Change Status to Closed.', 24, 1563115428),
(29, '1', 1563037200, 'Agus', '08131669955', 'MCD@mail.com', 'Fix update', 'Belom update ', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563116545),
(30, '1', 1563037200, 'Agus', '08131669955', 'starbuck@coffee.com', 'Fix update', 'update terus', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563117470),
(22, '1', 1562950800, 'Agus Setiawan', '02188969696', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Resolved', '29', NULL, '', 0, 'OK', 'huda', 1563117619, '', 0, 'Change Status to Resolved.', 24, 1563117620),
(22, '1', 1562950800, 'Agus Setiawan', '02188969696', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Closed', '29', NULL, '', 0, 'OK', 'huda', 1563117619, 'huda', 1563117635, 'Change Status to Closed.', 24, 1563117635),
(31, '1', 1563037200, 'Agus', '08131669955', 'Starbuck@coffee.com', 'Fix update', 'Update', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563118261),
(32, '1', 1563382800, 'Andi', '02188363636', 'Mandiri@bank.com', 'Kabel Putus', 'Kabel putus', 'Assigned', '29', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1563453366),
(33, '3', 1565370000, 'Sasha', '08131556980', 'bank@mandiri.net', 'Koneksi Internet Putus.', 'Koneksi Internet Putus.', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1565442510),
(34, '2', 1565370000, 'Dewi', '02188636398', 'Star@buck.com', 'EDC Eror', 'EDC Eror', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1565443049),
(35, '2', 1565370000, 'Dewi', '02188636398', 'Star@buck.com', 'EDC Eror', 'EDC Eror', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1565443053),
(36, '1', 1567011600, 'ALI', '08111123', 'bank@mandiri.com', 'Jaringan Putus.', 'Kabel rusak', 'Assigned', '26', 0, '', 0, '', '', 0, '', 0, 'Create New Ticket', 24, 1567008512),
(26, '1', 1562950800, 'Reno', '081213490969', 'starbuck@coffee.com', 'Jaringan Eror', 'eror', 'Resolved', '26', NULL, '', 0, 'ganti kabel jaringan', 'dennis', 1567064656, '', 0, 'Change Status to Resolved.', 26, 1567064656),
(26, '1', 1562950800, 'Reno', '081213490969', 'starbuck@coffee.com', 'Jaringan Eror', 'eror', 'Closed', '26', NULL, '', 0, 'ganti kabel jaringan', 'dennis', 1567064656, 'dennis', 1567064681, 'Change Status to Closed.', 26, 1567064681);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_users`
--

CREATE TABLE `log_users` (
  `iduser` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_users`
--

INSERT INTO `log_users` (`iduser`, `time`, `ip`, `browser`, `log`) VALUES
(1, 1561810793, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561810795, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561811987, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561811999, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561812004, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561812012, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561812025, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561812030, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561812290, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561812292, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561812478, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561812486, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561812550, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561812551, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561812801, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561812821, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561813410, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1561814434, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1561814440, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1561814502, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1561814503, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1561960524, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561960540, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561960544, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561960715, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561960720, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561960740, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561960746, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561960757, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561960761, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561961008, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561961009, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561961384, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561961389, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561961560, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561961562, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561962287, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1561962294, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1561962436, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561962439, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561962503, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561963169, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561963201, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561963207, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561963403, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561963404, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561988806, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561988826, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1561988831, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1561989319, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561989321, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561989324, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1561989328, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1561989335, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1561989345, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1561989470, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1561989604, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1561989608, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1561989909, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1561989910, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1561995423, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1561995429, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1561995439, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1561995444, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1561995455, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1561995460, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1561995545, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1562000238, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562057896, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562058778, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1562058987, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562061460, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1562061464, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1562063297, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1562063304, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1562068958, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1562068962, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562165222, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562165939, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1562165947, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1562166114, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(1, 1562166119, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562318506, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562321996, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(27, 1562321999, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(27, 1562322667, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562322668, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562326356, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562333821, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562335036, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562391687, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562396050, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562399763, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562400805, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562402066, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(1, 1562496847, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562500266, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562500300, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562500411, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1562500417, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1562500467, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1562500480, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1562500587, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562500589, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562502279, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1562502284, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1562502490, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562502492, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562508715, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1562508722, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1562513474, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562513475, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562562527, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562562571, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562563301, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562570767, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562570771, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562599628, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562743383, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562743404, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1562743408, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1562743441, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562743444, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562753708, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562944095, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1562945337, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(26, 1562945342, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(26, 1562945928, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(1, 1562945930, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1563009028, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(1, 1563011799, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1563011809, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1563011819, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(28, 1563011831, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(28, 1563022247, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(28, 1563022277, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1563022293, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1563022460, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(29, 1563022468, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(29, 1563022546, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1563022565, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1563112536, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563370278, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1563370298, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1563370313, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1563370416, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1563371162, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563372432, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563372434, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563373098, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563373100, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563373373, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563375618, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563375662, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563375674, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1563375679, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1563375695, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1563375706, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1563377490, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1563377494, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563377499, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563377593, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563379331, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563379532, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563379536, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563379892, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(28, 1563379896, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(28, 1563380155, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(26, 1563380160, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(26, 1563388627, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Logout Helpdesk System'),
(24, 1563388633, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.10', 'Login to Helpdesk System'),
(24, 1563401560, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563419881, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563453328, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563402546, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563508022, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563508104, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Logout Helpdesk System'),
(28, 1563508110, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(28, 1563508136, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Logout Helpdesk System'),
(26, 1563508139, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(26, 1563508158, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Logout Helpdesk System'),
(24, 1563508168, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563890743, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1563891520, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Logout Helpdesk System'),
(24, 1564052160, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Login to Helpdesk System'),
(24, 1564052828, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.14', 'Logout Helpdesk System'),
(24, 1564203418, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1564204118, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(29, 1564204123, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(29, 1564204182, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1564204189, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1564395489, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1565437194, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565681782, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565711821, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1565757208, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565758131, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565758561, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565758930, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565758999, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565759066, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565759110, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565759216, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565759256, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565759630, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565760321, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565760381, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565760398, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565760526, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565760685, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565760688, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565760727, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565760740, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565760940, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565761121, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565761305, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565761513, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565761725, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(28, 1565761729, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(28, 1565761814, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565761818, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762033, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565762122, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762149, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565762157, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762174, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565762180, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762254, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762264, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565762276, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762375, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565762688, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1565762762, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(28, 1565762766, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(28, 1565762872, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1565762874, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1565762900, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1565762902, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1566208143, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1566208198, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Logout Helpdesk System'),
(24, 1566208300, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1566403219, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1566403264, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(26, 1566403269, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(26, 1566403320, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1566403328, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1566407972, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Logout Helpdesk System'),
(24, 1566471695, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1566824300, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.10', 'Login to Helpdesk System'),
(24, 1566998154, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Login to Helpdesk System'),
(24, 1567007300, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Login to Helpdesk System'),
(24, 1567007370, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Logout Helpdesk System'),
(24, 1567008411, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Login to Helpdesk System'),
(24, 1567008525, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Logout Helpdesk System'),
(24, 1567008584, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Login to Helpdesk System'),
(26, 1567064611, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1567066785, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.13', 'Logout Helpdesk System'),
(24, 1567255631, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1567268285, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System'),
(24, 1567355648, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBro', 'Login to Helpdesk System');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsdate` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `detail` text NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdon` int(11) NOT NULL,
  `expired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `newsdate`, `title`, `detail`, `createdby`, `createdon`, `expired`) VALUES
(1, 1561741200, 'Selamat Datang di Aplikasi Helpdesk System', 'Selamat Datang di Aplikasi Helpdesk System', 'Nur Huda', 1565758004, 1569776400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `projectid` int(11) NOT NULL,
  `projectname` varchar(50) DEFAULT NULL,
  `idcustomer` varchar(10) DEFAULT NULL,
  `deliverybegin` int(11) DEFAULT NULL,
  `deliveryend` int(11) DEFAULT NULL,
  `installbegin` int(11) DEFAULT NULL,
  `installend` int(11) DEFAULT NULL,
  `uatbegin` int(11) DEFAULT NULL,
  `uatend` int(11) DEFAULT NULL,
  `billstartdate` int(11) DEFAULT NULL,
  `billduedate` int(11) DEFAULT NULL,
  `warrantyperiod` int(11) DEFAULT NULL,
  `contractstartdate` int(11) DEFAULT NULL,
  `contractperiod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`projectid`, `projectname`, `idcustomer`, `deliverybegin`, `deliveryend`, `installbegin`, `installend`, `uatbegin`, `uatend`, `billstartdate`, `billduedate`, `warrantyperiod`, `contractstartdate`, `contractperiod`) VALUES
(1, 'Pemasangan BARU ALL', '1', 1561827600, 1562864400, 1563123600, 1564333200, 1564506000, 1564938000, 1561827600, 1565542800, 2, 1561827600, 24),
(2, 'Pemasangan Baru', '2', 1561827600, 1561914000, 1561914000, 1562086800, 1562086800, 1562346000, 1561827600, 1562691600, 2, 1561827600, 12),
(3, NULL, '4', 1562518800, 1563037200, 1562518800, 1563037200, 1563123600, 1563642000, 1562518800, 1563037200, 2, 1562518800, 12),
(4, NULL, '5', 1562605200, 1563037200, 1562691600, 1563123600, 1563123600, 1563728400, 1562605200, 1564506000, 2, 1562605200, 12),
(5, 'Pemasangan EDC', '3', 1562518800, 1563037200, 1562518800, 1563037200, 1563123600, 1563728400, 1562518800, 1564506000, 2, 1562518800, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sla`
--

CREATE TABLE `sla` (
  `slaid` int(11) NOT NULL,
  `namasla` varchar(30) NOT NULL,
  `responsetime` int(11) NOT NULL,
  `resolutiontime` int(11) NOT NULL,
  `slawarning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sla`
--

INSERT INTO `sla` (`slaid`, `namasla`, `responsetime`, `resolutiontime`, `slawarning`) VALUES
(1, 'Critical', 1, 6, 4),
(2, 'High', 1, 24, 20),
(3, 'Medium', 1, 72, 50),
(4, 'Low', 1, 360, 270);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticketnumber` varchar(20) NOT NULL,
  `sla` varchar(10) NOT NULL,
  `idcustomer` varchar(10) NOT NULL,
  `reporteddate` int(11) NOT NULL,
  `reportedby` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `problemsummary` varchar(80) NOT NULL,
  `problemdetail` text NOT NULL,
  `ticketstatus` varchar(20) NOT NULL,
  `assignee` varchar(50) NOT NULL,
  `assigneddate` int(11) DEFAULT NULL,
  `pendingby` varchar(50) DEFAULT NULL,
  `pendingdate` int(11) DEFAULT NULL,
  `resolution` text,
  `resolvedby` varchar(50) DEFAULT NULL,
  `resolveddate` int(11) DEFAULT NULL,
  `closedby` varchar(50) DEFAULT NULL,
  `closeddate` int(11) DEFAULT NULL,
  `documentedby` int(11) NOT NULL,
  `documenteddate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `ticketnumber`, `sla`, `idcustomer`, `reporteddate`, `reportedby`, `telp`, `email`, `problemsummary`, `problemdetail`, `ticketstatus`, `assignee`, `assigneddate`, `pendingby`, `pendingdate`, `resolution`, `resolvedby`, `resolveddate`, `closedby`, `closeddate`, `documentedby`, `documenteddate`) VALUES
(2, '2/SR/Jun/2019', '1', '1', 1561741200, 'Agus Setiawan', '02188969696', 'helpdesk@mail.com', 'Pengetesan EDC', 'Pengetesan EDC', 'Closed', '26', NULL, 'dennis', 1561812182, 'EDC 123 sudah ok.\r\n456 masih eror karena kabel kurang.', 'dennis', 1561812199, 'dennis', 1561812208, 1, 1561811938),
(3, '3/SR/Jun/2019', '2', '2', 1561741200, 'Huday', '0215555', 'hudahuday75@gmail.com', 'Jaringan Putus', 'Tidak ada koneksi internet', 'Closed', '26', NULL, '', 0, 'Ganti Kabel lan', 'dennis', 1561814480, 'dennis', 1561814489, 1, 1561814423),
(4, '4/SR/Jun/2019', '3', '1', 0, 'Agus Setiawan', '02188336449', 'helpdesk@mail.com', 'Jairngan Putus', '', 'Closed', '1', NULL, '', 0, 'Ganti Kabel lan', 'admin', 1561814593, 'admin', 1561814631, 1, 1561814572),
(5, '5/SR/Jul/2019', '2', '3', 1561914000, 'Agus Setiawan', '081213490969', 'helpdesk@mail.com', 'EDC EROR', 'EDC Tidak bisa di gunakan.', 'Closed', '26', NULL, '', 0, 'Kabel Putus.\r\nPerbaikan atau Ganti Kabel.', 'dennis', 1561961438, 'dennis', 1561961445, 1, 1561961376),
(6, '6/SR/Jul/2019', '1', '2', 0, 'Adi', '02188969696', 'helpdesk@mail.com', 'Pemasangan baru', '', 'Closed', '26', NULL, '', 0, 'pasang', 'admin', 1561961799, 'huda', 1561962318, 26, 1561961490),
(9, '9/SR/Jul/2019', '1', '3', 1562950800, 'AGUS', '081213490969', 'hudahuday75@gmail.com', 'Pemasangan baru', 'pasang baru', 'Closed', '24', NULL, '', 0, 'sudah di pasang', 'admin', 1562335126, 'huda', 1563022850, 1, 1561963837),
(22, '10/SR/Jul/2019', '1', '1', 1562950800, 'Agus Setiawan', '02188969696', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Closed', '29', NULL, '', 0, 'OK', 'huda', 1563117619, 'huda', 1563117635, 28, 1563012065),
(23, '23/SR/Jul/2019', '1', '3', 1562950800, 'Agus Setiawan', '081213490969', 'MCD@mail.com', 'Pengetesan EDC', 'Tes', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1563012134),
(24, '24/SR/Jul/2019', '3', '2', -25200, 'Adi', '081213490969', 'ABC@mail.com', 'Pemasangan baru', 'tes', 'Resolved', '29', NULL, '', 0, 'sudah selesai', 'Teknisi', 1563022510, '', 0, 28, 1563012334),
(25, '25/SR/Jul/2019', '1', '3', 1562950800, 'AGUS', '081213490969', 'mandiri@mail.com', 'EDC EROR', 'a', 'Closed', '24', NULL, '', 0, 'selesai', 'huda', 1563115417, 'huda', 1563115428, 28, 1563012406),
(26, '26/SR/Jul/2019', '1', '5', 1562950800, 'Reno', '081213490969', 'starbuck@coffee.com', 'Jaringan Eror', 'eror', 'Closed', '26', NULL, '', 0, 'ganti kabel jaringan', 'dennis', 1567064656, 'dennis', 1567064681, 28, 1563012452),
(27, '27/SR/Jul/2019', '2', '5', -25200, 'Agus Setiawan', '081213490969', 'starbuck@coffee.com', 'Pengetesan EDC', 'tes', 'Closed', '29', NULL, '', 0, 'sudah selesai', 'huda', 1563022683, 'huda', 1563022707, 24, 1563022358),
(28, '28/SR/Jul/2019', '1', '3', 1562950800, 'Adi', '081213490969', 'mandiri@mail.com', 'Pengetesan EDC', 'TES', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1563025919),
(29, '29/SR/Jul/2019', '1', '1', 1563037200, 'Agus', '08131669955', 'MCD@mail.com', 'Fix update', 'Belom update ', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1563116545),
(30, '30/SR/Jul/2019', '1', '5', 1563037200, 'Agus', '08131669955', 'starbuck@coffee.com', 'Fix update', 'update terus', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1563117469),
(31, '31/SR/Jul/2019', '1', '5', 1563037200, 'Agus', '08131669955', 'Starbuck@coffee.com', 'Fix update', 'Update', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1563118261),
(32, '32/SR/Jul/2019', '1', '3', 1563382800, 'Andi', '02188363636', 'Mandiri@bank.com', 'Kabel Putus', 'Kabel putus', 'Assigned', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1563453365),
(33, '33/SR/Aug/2019', '3', '3', 1565370000, 'Sasha', '08131556980', 'bank@mandiri.net', 'Koneksi Internet Putus.', 'Koneksi Internet Putus.', 'Assigned', '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1565442510),
(34, '34/SR/Aug/2019', '2', '5', 1565370000, 'Dewi', '02188636398', 'Star@buck.com', 'EDC Eror', 'EDC Eror', 'Assigned', '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1565443049),
(35, '35/SR/Aug/2019', '2', '5', 1565370000, 'Dewi', '02188636398', 'Star@buck.com', 'EDC Eror', 'EDC Eror', 'Assigned', '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1565443052),
(36, '36/SR/Aug/2019', '1', '3', 1567011600, 'ALI', '08111123', 'bank@mandiri.com', 'Jaringan Putus.', 'Kabel rusak', 'Assigned', '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1567008512);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(25) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `Telp` varchar(15) NOT NULL,
  `email_code` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `fullname`, `email`, `Telp`, `email_code`, `time`, `confirmed`, `ip`) VALUES
(24, 'huda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', 'Nur Huda', 'hudahuday75@gmail.com', '08111111', '42876d3326705d29139de19c15ca2b60fa729933', 1565438002, 1, '::1'),
(26, 'dennis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Technical Support', 'Muhammad Denis', 'nurhuda090195@gmail.com', '08123112223', '92095278210fb46b0c94a29edc54da2ef6669817', 1562393397, 1, '::1'),
(28, 'Jois', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Manager', 'Jois', 'joisandresky@gmail.com', '02188969696', '3b28321ac2ecc7d3fe2dae119bd82a5a5d26192e', 1563379889, 1, '::1'),
(29, 'Teknisi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Technical Support', 'Technical Support', 'huda090195@gmail.com', '02188969696', 'c88b107f1f76f1ac3a82863db515645455c25649', 1563012022, 1, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `log_emails`
--
ALTER TABLE `log_emails`
  ADD PRIMARY KEY (`idemail`),
  ADD KEY `senddate` (`senddate`),
  ADD KEY `idticket` (`idticket`);

--
-- Indexes for table `log_tickets`
--
ALTER TABLE `log_tickets`
  ADD KEY `id` (`id`),
  ADD KEY `changedate` (`changedate`);

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD KEY `time` (`time`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`username`),
  ADD UNIQUE KEY `uemail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_emails`
--
ALTER TABLE `log_emails`
  MODIFY `idemail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
