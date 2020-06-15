<?php

 --
-- Database: `image_gallery`
--
CREATE DATABASE IF NOT EXISTS `image_gallery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `image_gallery`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `image_title` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`, `image_title`, `date`) VALUES
(1, 'http://192.168.225.217/img/posts/Koala.jpg', 'Koala', '2020-06-13 03:24:09'),
(2, 'http://192.168.225.217/img/posts/Tulips.jpg', 'Tulips', '2020-06-13 03:27:05'),
(3, 'http://192.168.225.217/img/posts/jellyfish.jpg', 'Jelly fish', '2020-06-13 03:28:34'),
(4, 'http://192.168.225.217/img/posts/Desert.jpg', 'Desert', '2020-06-13 03:29:18'),
(5, 'http://192.168.225.217/img/posts/Hydrangeas.jpg', 'Hydrangeas', '2020-06-13 03:30:17'),
(6, 'http://192.168.225.217/img/posts/Lighthouse.jpg', 'Lighthouse', '2020-06-13 03:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);


?>