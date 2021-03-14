SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `images` (`id`, `location`) VALUES
(1, 'images/215.png');
CREATE TABLE `notes` (
  `id` int(10) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL COMMENT '1000-10-10',
  `time` time NOT NULL COMMENT '123:12:12',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `notes` (`id`, `dt`, `date`, `time`, `text`, `title`, `user`) VALUES
(24, '2021-03-10 18:17:30', '2021-03-10', '18:17:30', 'you can delete me', 'It works', 'admin');






INSERT INTO `notes` (`id`, `dt`, `date`, `time`, `text`, `title`, `user`) VALUES
(44, '2021-03-14 13:17:35', '2021-03-14', '13:17:35', ' * asd', '* asd', 'admin');

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




INSERT INTO `profiles` (`id`, `login`, `password`, `image`) VALUES
(22, 'admin', '$2y$10$DDts7rVzFstL5k38Q4tAOe85JhI6mA0.Y/smf.wLCFxWYEmnqIN2C', NULL);


ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);


ALTER TABLE `notes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;



INSERT INTO `profiles` (`id`, `login`, `password`, `image`) VALUES
(22, 'admin', '$2y$10$DDts7rVzFstL5k38Q4tAOe85JhI6mA0.Y/smf.wLCFxWYEmnqIN2C', NULL),
(23, 'Vlad', '$2y$10$GNLW.Lrx.YNaC6Z7K5ZyIOxkcU44mdjaASsQOULeKfGjxlM/DhTK6', NULL),
(24, 'qwe', '$2y$10$ar/RGDBYEl5argIFtpVIBenV3hurBVrpLTI30KnffjWtDr20TqvPK', NULL);
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
ALTER TABLE `notes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
>>>>>>> 2679e898fce15554b629dfec65ce8941cf75f9ba
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;
