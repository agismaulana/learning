-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2020 pada 16.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accessmenu`
--

CREATE TABLE `accessmenu` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `accessmenu`
--

INSERT INTO `accessmenu` (`id`, `level_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 1, 3),
(4, 1, 4),
(6, 2, 2),
(7, 2, 3),
(8, 3, 2),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kelas` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `title`, `isi`, `kelas`, `user_id`, `waktu`) VALUES
(5, 'Tema 1', '<p>Mengenal Lingkungan Sekitar Rumah</p>\r\n', 1, 2, '2020-07-31'),
(6, 'Matematika', '<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n\r\n<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n\r\n<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n\r\n<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n\r\n<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n\r\n<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptates&nbsp;qui&nbsp;sapiente,&nbsp;repellat&nbsp;iste&nbsp;rerum&nbsp;dolor&nbsp;modi?&nbsp;Doloribus&nbsp;exercitationem&nbsp;ipsum&nbsp;accusamus&nbsp;deserunt&nbsp;esse&nbsp;tenetur&nbsp;ipsa&nbsp;maxime&nbsp;perspiciatis&nbsp;quos&nbsp;illum!&nbsp;Non,&nbsp;quisquam!</p>\r\n', 4, 2, '2020-08-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Siswa'),
(3, 'Guru'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `nama`, `url`, `icon`, `is_active`, `menu_id`) VALUES
(8, 'User', 'user', 'fa fa-fw fa-user', 1, 1),
(9, 'Level', 'level', 'fa fa-fw fa-key', 1, 1),
(10, 'Menu', 'menu', 'fa fa-fw fa-folder', 1, 4),
(11, 'Sub Menu', 'subMenu', 'fa fa-fw fa-folder-open', 1, 4),
(12, 'Mata Pelajaran', 'mapel', 'fa fa-fw fa-book', 1, 3),
(14, 'Pelajaran', 'pelajaran', 'fa fa-fw fa-book-open', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `mapel_id`, `user_id`, `image`, `isi`) VALUES
(1, 6, 5, 'Join.png', '<p>pelajaran</p>\r\n'),
(2, 5, 2, 'Join.png', '<p>buku Murah</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nisn`, `nama`, `kelas`, `alamat`, `password`, `level_id`, `active`) VALUES
(2, 1234, 'Admin', 0, 'Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1),
(5, 1234321, 'agis', 4, 'Depok', '6078f605a50b270478dabd3aa1f538c11c8108eb', 3, 0),
(6, 655452315, 'Ferry.S.Pd', 4, 'Depok', '6078f605a50b270478dabd3aa1f538c11c8108eb', 2, 0),
(7, 5645615, 'Ningsih S.Pd', 1, 'Tangerang', '6078f605a50b270478dabd3aa1f538c11c8108eb', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accessmenu`
--
ALTER TABLE `accessmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `accessmenu`
--
ALTER TABLE `accessmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
