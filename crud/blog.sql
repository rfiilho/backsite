SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `blog` (`id`, `titulo`, `slug`, `descricao`, `tags`, `conteudo`) VALUES
(1, 'Meu primeiro post', 'Meu-primeiro-post', 'Esse Ã© meu primeiro post', 'dev design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tincidunt augue interdum velit euismod in pellentesque massa placerat. Molestie a iaculis at erat pellentesque. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Et netus et malesuada fames ac. Nec feugiat in fermentum posuere urna nec. Sit amet dictum sit amet justo donec. Adipiscing tristique risus nec feugiat in fermentum. Sed turpis tincidunt id aliquet risus feugiat. Tempor nec feugiat nisl pretium fusce id velit ut tortor. Pellentesque habitant morbi tristique senectus. Platea dictumst quisque sagittis purus. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Pharetra pharetra massa massa ultricies mi quis. Quis viverra nibh cras pulvinar.');


ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);


ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
