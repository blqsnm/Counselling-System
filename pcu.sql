-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 04:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `belajar`
--

CREATE TABLE `belajar` (
  `matrix` varchar(8) NOT NULL,
  `auditori` int(2) NOT NULL,
  `visual` int(2) NOT NULL,
  `kinestetik` int(2) NOT NULL,
  `assessDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belajar`
--

INSERT INTO `belajar` (`matrix`, `auditori`, `visual`, `kinestetik`, `assessDate`) VALUES
('aa', 16, 17, 15, ''),
('AA224', 0, 0, 0, '23/06/2023'),
('aa43', 14, 17, 17, ''),
('nur', 12, 19, 14, '');

-- --------------------------------------------------------

--
-- Table structure for table `dass`
--

CREATE TABLE `dass` (
  `matrix` varchar(8) NOT NULL,
  `stress` int(2) NOT NULL,
  `anxiety` int(2) NOT NULL,
  `depression` int(2) NOT NULL,
  `assessDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dass`
--

INSERT INTO `dass` (`matrix`, `stress`, `anxiety`, `depression`, `assessDate`) VALUES
('aa', 6, 12, 12, ''),
('aa215', 21, 21, 21, ''),
('aa216', 17, 16, 18, ''),
('aa221', 9, 11, 10, ''),
('aa222', 14, 14, 14, ''),
('nur', 7, 9, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `personaliti`
--

CREATE TABLE `personaliti` (
  `matrix` varchar(8) NOT NULL,
  `skor` int(3) NOT NULL,
  `personaliti` varchar(100) NOT NULL,
  `assessDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personaliti`
--

INSERT INTO `personaliti` (`matrix`, `skor`, `personaliti`, `assessDate`) VALUES
('aa', 52, 'A Positif', ''),
('aa211', 63, 'A Positif', ''),
('aa21145', 51, 'A Positif', ''),
('nur', 37, 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `matrix` varchar(8) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`matrix`, `gender`, `telephone`, `email`) VALUES
('aa211', 'Female', '21214', 'we@gmail.com'),
('aa21145', 'Female', '980', 'we@gmail.nom'),
('aa212', 'Female', '21213', 'ew@gmail.coom'),
('aa213', 'Male', '21212', 'qw@gmail.com'),
('aa214', 'Male', '21211', 'wq@gmail.com'),
('aa215', 'Female', '21215', 'please@gmail.com'),
('aa216', 'Male', '21216', 'yay@gmail.com'),
('aa221', 'Female', '2222', 'fd@gmail.com'),
('aa222', 'Male', '2221', '21@gmail.com'),
('aa31', 'Male', '32', 're@gm.com'),
('aa43', 'Male', '43', '43@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `faculty` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `firstname`, `lastname`, `username`, `password`, `role`, `gender`, `telephone`, `faculty`, `email`) VALUES
('test', 'testfirst', 'testlast', 'AA123', '12', 'Student', '', '', '', ''),
('balqis', '', '', 'aa210143', 'hai', 'Student', 'Female', '0166145879', 'FKAAS', 'blqsnm11@gmail.com'),
('malin', '', '', 'aa210324', 'bye', 'Admin', 'Female', '0166145879', 'FKEE', 'blqsnm11@gmail.com'),
('umi huwaina binti ahmiruddin', 'w', 'w', 'aa211898', '12', 'Student', '', '', '', ''),
('muhammad mat bin mamat', '', '', 'AA224', '23', 'Student', 'Male', '014', 'FTK', 'mat@moto.com'),
('wan nurshafawati binti wan razali', '', '', 'aa232211', '123', 'Student', 'Female', '011', 'CeDS', 'aa212@uthm.my'),
('nur aziemah binti mohamad', 'd', 'd', 'd', 's', 'Admin', '', '', '', ''),
('wee', '', '', 'ew', '12', 'Student', 'Male', '1243', 'CeDS', 'we@wo.com'),
('admin', 'who', 'why', 'min', '1234', 'Admin', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belajar`
--
ALTER TABLE `belajar`
  ADD PRIMARY KEY (`matrix`),
  ADD KEY `matrix` (`matrix`);

--
-- Indexes for table `dass`
--
ALTER TABLE `dass`
  ADD PRIMARY KEY (`matrix`),
  ADD KEY `matrix` (`matrix`);

--
-- Indexes for table `personaliti`
--
ALTER TABLE `personaliti`
  ADD PRIMARY KEY (`matrix`),
  ADD KEY `matrix` (`matrix`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`matrix`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
