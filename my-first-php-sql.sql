SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `files` (`id`, `location`, `file_name`) VALUES
(9, 'files/files/9.html', 'index1.html');
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `images` (`id`, `location`) VALUES
(221, 'files/images/221.png');
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
(53, '2021-03-21 16:26:51', '2021-03-21', '16:26:51', 'ypu can delete or change me !', 'It works!', 'admin');
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `profiles` (`id`, `login`, `password`) VALUES
(22, 'admin', '$2y$10$DDts7rVzFstL5k38Q4tAOe85JhI6mA0.Y/smf.wLCFxWYEmnqIN2C');
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
ALTER TABLE `notes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;
