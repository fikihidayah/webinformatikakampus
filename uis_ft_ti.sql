-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2022 at 03:01 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uis_ft_ti`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `bg_color`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Berita Pilihan', 'berita-pilihan', 'bg-warning text-white', NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(2, 'Berita', 'berita', 'bg-primary text-white', NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(3, 'Artikel', 'artikel', 'bg-danger text-white', NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(4, 'Lowongan', 'lowongan', 'bg-success text-white', NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_selamatdatang_setting`
--

CREATE TABLE `home_selamatdatang_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_embed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_selamatdatang_setting`
--

INSERT INTO `home_selamatdatang_setting` (`id`, `id_embed`, `isi`) VALUES
(1, 'pWXIt2yXF-I', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum mollitia a eum corrupti veniam exercitationem reiciendis voluptates vero incidunt, molestiae ullam tenetur laborum eius et, adipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat, nesciunt, voluptatibus perferendis modi porro');

-- --------------------------------------------------------

--
-- Table structure for table `home_slide_setting`
--

CREATE TABLE `home_slide_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_slide_setting`
--

INSERT INTO `home_slide_setting` (`id`, `image`) VALUES
(1, '1.jpeg'),
(2, '2.jpeg'),
(3, '3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `home_testimoni_setting`
--

CREATE TABLE `home_testimoni_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_testi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_testimoni_setting`
--

INSERT INTO `home_testimoni_setting` (`id`, `nama`, `isi_testi`, `kerja`, `image`) VALUES
(1, 'Fulan', 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat, nesciunt', 'Web Programmer', 'man.png'),
(2, 'Fulana', 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque, nesciunt', 'SEO PT Impian', 'man2.png'),
(3, 'Fulani', 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat', 'SEO PT Impian', 'woman.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_03_09_134424_create_roles_table', 1),
(2, '2022_03_10_031438_create_users_table', 1),
(3, '2022_03_13_041523_create_settings_table', 1),
(4, '2022_03_14_022413_create_home_slide_setting', 1),
(5, '2022_03_14_022607_create_home_selamatdatang_setting', 1),
(6, '2022_03_14_022807_create_home_testimoni_setting', 1),
(7, '2022_03_16_031136_create_other_settings_table', 1),
(8, '2022_03_16_035242_create_news_table', 1),
(9, '2022_03_16_040828_create_category_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_thumb` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_thumb_square` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `publised_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `views` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `image_thumb`, `image_thumb_square`, `description`, `slug`, `body`, `publised_at`, `user_id`, `is_published`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Natus et suscipit ea.', 'https://via.placeholder.com/1183x304.png/001111?text=tech+est', 'https://via.placeholder.com/300x200.png/004477?text=debitis', 'https://via.placeholder.com/80x80.png/005500?text=mollitia', 'Tenetur excepturi consequatur pariatur commodi sed similique.', 'libero-et-dicta', '<p>Eum qui vitae dolorem veritatis exercitationem qui fuga. Eligendi officia laborum numquam repellat ut. Quasi distinctio et corporis deleniti ipsa dolor nesciunt. Pariatur ex explicabo quia.</p><p>Repudiandae vitae explicabo aut dolor voluptatem quam expedita. Tempora ut officia ratione recusandae perferendis. Omnis voluptatem eum exercitationem laboriosam.</p><p>Non quis quia est possimus perspiciatis quasi dolor. Ea dolores error nulla iusto beatae consequuntur. Qui omnis est rem illum ut debitis.</p><p>A rerum ipsa sunt et iure dolor dignissimos ut. Non maiores consequatur perferendis cupiditate qui vel incidunt. Sunt animi et quia praesentium.</p><p>Veritatis dolor reprehenderit quam velit et quisquam perferendis. Voluptatibus qui aspernatur excepturi et ut occaecati optio. Voluptatem consequatur et debitis quo. Ducimus blanditiis quis omnis velit numquam et.</p><p>Ipsam placeat commodi rem et fuga. Quis est et ut accusantium.</p><p>Voluptatum non odio numquam. Commodi nobis et quia facere facilis.</p><p>Commodi vitae voluptates assumenda modi voluptatem rerum et cumque. Ducimus nobis eum illo nostrum. Nisi eos sit mollitia sequi tempore aliquam enim.</p><p>Veniam et qui omnis. Atque quia sapiente rerum in. Eius ut et est dignissimos.</p><p>Deleniti inventore et et sed. Aut qui et assumenda voluptatum eveniet nesciunt aspernatur. Sunt assumenda voluptates nisi assumenda quia voluptates dolorem.</p><p>Cum dolores vitae dolores accusantium doloribus. Corrupti dolorum accusamus maiores sint dolor iusto. Sit nobis laboriosam eos deserunt modi aut impedit. Unde exercitationem eum officia ullam est ut praesentium.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(2, 'Minus adipisci sint.', 'https://via.placeholder.com/1048x387.png/0066cc?text=tech+non', 'https://via.placeholder.com/300x200.png/00ff66?text=doloremque', 'https://via.placeholder.com/80x80.png/003377?text=minima', 'Velit nihil nihil eum molestiae corrupti consectetur voluptatem quod rem alias sit provident animi.', 'vitae-veritatis', '<p>Beatae eaque reiciendis voluptatem nihil. Non perspiciatis error esse id nihil harum quaerat ut. Consequatur aperiam voluptates est aliquid accusamus. Tenetur qui officia voluptatem ipsa saepe accusamus.</p><p>Laboriosam beatae placeat vel accusantium ipsam. Placeat assumenda totam consequatur et est dignissimos aut omnis. Commodi asperiores voluptatum corporis. Iste et qui voluptatem praesentium rem architecto amet.</p><p>Qui sunt sunt laborum. Omnis error facilis et omnis. Voluptatibus totam perspiciatis similique et sit inventore deleniti.</p><p>Aut error aut omnis optio temporibus aut. Autem eveniet omnis sapiente. Ut occaecati cum exercitationem aut.</p><p>Dolor quos recusandae inventore aut aut voluptatem accusamus. Fugiat tenetur et est optio neque eum odio. Sit et aut qui aspernatur laboriosam. Aut enim magnam ut voluptas eum velit repellendus.</p><p>Quia aperiam eos non sed consequatur incidunt. Tempore expedita dolorum sed. Aliquam voluptatem iste sunt est.</p><p>Ut ut illo aut autem et. Voluptatem tempore rem accusamus fugit mollitia deleniti quis. Neque nulla est tempore dolores ipsam aut sint aliquam.</p><p>Totam est dicta praesentium consequatur id in. Neque nam qui cumque ea nobis tempora voluptatem repellat. Sunt perferendis et saepe.</p><p>Vel corporis sit cumque consectetur. Quo soluta aut consequuntur quibusdam sapiente consequatur.</p><p>Quo optio magnam nisi. Sint recusandae ut culpa iste.</p><p>Suscipit fugit quia fuga nostrum. Quia optio voluptate iure est suscipit. Et mollitia laborum voluptatem quasi.</p><p>Non laboriosam voluptatem molestiae quia harum cumque. Consequatur natus aut quidem est et. Adipisci rerum ipsam et veritatis.</p><p>Aut quis ut maxime enim qui quod. Repellat est possimus placeat aut animi. Sunt voluptatibus blanditiis officiis velit odio officiis.</p>', NULL, 1, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(3, 'Magnam et eos facilis.', 'https://via.placeholder.com/952x310.png/00ffdd?text=tech+alias', 'https://via.placeholder.com/300x200.png/003377?text=omnis', 'https://via.placeholder.com/80x80.png/003333?text=dolores', 'Pariatur laudantium eveniet magnam vel omnis at.', 'quo-sunt-sit', '<p>Porro nulla tenetur itaque dolore tenetur et ipsum quia. Qui officia eos et reprehenderit ut ut nobis. Possimus natus eius reiciendis est cumque impedit.</p><p>Necessitatibus ea perspiciatis doloremque. Corrupti similique ex impedit est at. Eius enim rerum velit blanditiis. Quas ab iste et alias qui et.</p><p>Eum quo rem non distinctio totam. Autem consequatur est ullam odio maxime iste qui. Dicta deleniti perferendis exercitationem quam mollitia laudantium eligendi.</p><p>Cupiditate tenetur voluptates ut voluptatem aut ex eligendi. Pariatur aspernatur quia omnis non velit unde.</p><p>Iure et voluptates officiis quia. Et corporis consequatur quod maiores ut. Voluptatibus deleniti rerum molestiae. Nesciunt est voluptas et ut.</p><p>Veritatis qui odit veritatis voluptatibus quibusdam. Sit rerum consequatur libero nesciunt neque ut. Eos aut reprehenderit aperiam eos laboriosam.</p><p>Tempora explicabo voluptate sequi eos deserunt. Illo non hic fugiat. Molestias similique eos adipisci mollitia quas aut. Perspiciatis occaecati et sit odit et reiciendis. Blanditiis quam unde fugiat facere pariatur unde dolores dolor.</p><p>Cumque tempore nostrum beatae est rem odit. Ut debitis eveniet quia sit labore. Voluptatem est accusamus architecto dolore adipisci maiores aut rem. Qui aliquid molestiae sit sunt.</p><p>Fugit dignissimos saepe qui nam officiis. A blanditiis nulla fugiat odio perspiciatis doloremque ut. Eum nesciunt illum cumque dicta quis. Ipsum nesciunt voluptatibus dolor eum consequatur mollitia animi.</p>', NULL, 1, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(4, 'Iusto accusamus consequatur tempore.', 'https://via.placeholder.com/1014x349.png/006633?text=tech+et', 'https://via.placeholder.com/300x200.png/003366?text=rem', 'https://via.placeholder.com/80x80.png/0033aa?text=veniam', 'Aut totam sed ut cumque totam totam ad.', 'ducimus-quis-consequatur', '<p>Sit at reprehenderit reiciendis. Praesentium sed molestiae ipsum qui dolores quis pariatur. Fugiat sed quaerat facilis vel exercitationem unde.</p><p>Quae maiores quo voluptatem et optio illo fugiat voluptas. Exercitationem vel aut hic asperiores et. Voluptatem error voluptates soluta non ex velit.</p><p>Laborum alias sapiente fugiat laudantium sit. Iure atque minus recusandae occaecati fugiat et magni. Illo ipsam minima quo et excepturi inventore. Repellendus sit consectetur dolorum quia earum aut.</p><p>Molestias eligendi quaerat error id. Atque incidunt facere odit amet.</p><p>Modi eius sed repellat et nemo dolorum iure. Neque et id non assumenda. Esse culpa et consequatur provident. Molestiae doloribus sint eum magni voluptas.</p><p>Quasi quibusdam inventore et quibusdam. Ea ea ipsam ratione et ipsam praesentium. Voluptatem et est unde omnis velit corporis fugit rerum.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(5, 'Quibusdam nesciunt similique ut quidem.', 'https://via.placeholder.com/875x388.png/0077bb?text=tech+tempora', 'https://via.placeholder.com/300x200.png/002244?text=quis', 'https://via.placeholder.com/80x80.png/008888?text=sequi', 'Eaque at et sed at nihil quia consectetur.', 'sit-ut-quia-quo', '<p>Maxime quia harum optio qui sunt accusamus optio. Et harum earum quibusdam. Dignissimos porro sit commodi totam voluptatem aut. Perferendis voluptatem officiis dolorum sed nostrum molestiae.</p><p>Ratione officia ea aut et et. Ea aut impedit voluptatem earum reprehenderit magni ad cupiditate. Vel et illum et voluptas possimus placeat.</p><p>Ut dolor atque et saepe quo recusandae. Et mollitia nesciunt et laborum. Maiores quia voluptatem repudiandae eligendi ea repudiandae velit qui.</p><p>Eos accusamus quisquam facilis placeat. Culpa quam labore expedita. Nam debitis ex rem.</p><p>Dolorum quia nihil sint est amet. Soluta maiores deserunt necessitatibus dolores voluptas qui id. Ex impedit inventore ratione ut.</p><p>Eum dolores veniam molestiae et voluptatem. Non fuga ab unde ipsa et porro. Est aliquid rerum nisi nisi voluptas culpa magni accusamus. Amet enim quos eligendi autem dolores. Reiciendis sit quis non odio eum autem non sint.</p><p>Ipsam delectus et accusamus velit corporis architecto dolor ducimus. At qui qui omnis quam vero. Quam accusamus est dolores et autem sed error voluptatum.</p><p>Modi assumenda veritatis sint. Earum aut impedit temporibus maiores dignissimos. Quia est voluptate quae in quasi sit nostrum modi. Labore tenetur veritatis non.</p><p>Repellendus et minus placeat doloribus aut et. Labore et nesciunt aut delectus. Ipsam qui molestiae exercitationem. Dolores placeat iusto sint illum ducimus voluptate accusamus.</p><p>Quia ea incidunt alias nemo qui iste. Aut quasi qui veniam perferendis error sunt. Autem dolore et porro dolorum omnis. Eos qui dolorem et consequatur magnam est laborum.</p><p>Non consectetur sit deserunt illum suscipit sunt nulla. Molestiae non qui veritatis. Non qui minima non a dolor. Vel nihil ipsam maxime necessitatibus libero reiciendis repellendus velit.</p><p>Consequatur sint facere aut accusamus laboriosam esse. Dignissimos expedita iusto voluptatibus. Voluptatem odio assumenda rerum eveniet eum. Sed quia quia nobis natus.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(6, 'Iste sed pariatur.', 'https://via.placeholder.com/911x320.png/0022cc?text=tech+doloremque', 'https://via.placeholder.com/300x200.png/000099?text=asperiores', 'https://via.placeholder.com/80x80.png/00cc00?text=pariatur', 'Repellendus ut eveniet rem dolores voluptatibus illum.', 'in-officiis', '<p>Quo et non incidunt consectetur laboriosam. Quasi alias vero et quo. Est ea velit cumque dignissimos a soluta quisquam. Eligendi aliquid possimus id commodi possimus.</p><p>Ullam voluptates qui minus nemo doloribus. Cumque aperiam earum itaque ut eligendi sequi sint.</p><p>Voluptatem temporibus sit sed quia beatae deleniti quia deleniti. Omnis sed dolores consequuntur ex aspernatur facilis. Consectetur debitis aut perferendis quaerat omnis at.</p><p>Iure non omnis voluptatem sint. Modi molestias placeat quia voluptate. Ex est ullam odit distinctio. Eligendi adipisci illo ut voluptatum. Rem architecto odio non dignissimos nostrum.</p><p>Est accusantium odit et consequatur. Delectus sit placeat a et voluptatem omnis. Reiciendis aut omnis qui molestiae.</p><p>Nobis et magni quis repellat ea adipisci officia et. Aliquid provident fugiat maiores provident. Vitae autem ipsa id quod. Debitis sed voluptatibus dolorem magni ullam ut.</p><p>Non quisquam libero dolorum atque explicabo optio. Facilis et magni ullam esse. Magnam accusantium et commodi qui quam atque explicabo. Veritatis est quis debitis dolorem minus dolores voluptatem.</p><p>Voluptatem officiis aut accusamus sed molestiae. Consequatur in voluptas laborum dolor.</p><p>Voluptatem officia adipisci expedita rem quaerat. Porro nulla velit quia hic id nobis voluptatem. Non vero laudantium eius at enim nihil ipsum. Illum dolores dolores eos non numquam est doloribus.</p>', NULL, 1, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(7, 'Non itaque eligendi.', 'https://via.placeholder.com/1009x389.png/002299?text=tech+rem', 'https://via.placeholder.com/300x200.png/004400?text=dignissimos', 'https://via.placeholder.com/80x80.png/00cc77?text=est', 'Corrupti est iure possimus repellendus est ratione et sed quibusdam in ipsum.', 'quibusdam-et-nesciunt-quidem', '<p>Maiores et labore non nulla. Magni et amet ut. Et temporibus libero eius molestiae qui laudantium.</p><p>Ea fugiat et neque est beatae corrupti. Perspiciatis consequatur neque omnis itaque. Commodi optio nihil sint optio.</p><p>Et ullam incidunt optio corporis quia nam quia. Eum omnis repellendus aut et illum occaecati. Ratione vitae harum dolor saepe. Molestias reiciendis totam quod facilis necessitatibus excepturi cupiditate.</p><p>Temporibus possimus quaerat deserunt voluptatem veniam. Laborum consequatur quae omnis deleniti dolorum. Nulla ut officia deleniti quo deserunt. Alias amet iste ut similique sequi sequi nihil quia.</p><p>Possimus consequatur minima consequuntur aut velit. Laboriosam quidem ratione nihil illo odio corporis. Quis libero dolor facilis est quas ut occaecati. A harum adipisci accusantium labore quia corporis dignissimos.</p><p>Harum dolores aut ullam aliquam et. Quis tenetur quia quibusdam accusantium architecto aut. Ut ipsa totam labore cum ut. Nostrum sed nesciunt nam nihil expedita quo officia.</p><p>Veritatis minima expedita quasi sunt maxime est. Id minus illum incidunt id harum ullam. Labore omnis animi quia veniam ut. Commodi aut deserunt aut inventore qui tempora eius facilis.</p><p>Mollitia occaecati vero labore enim facere corrupti. Fuga inventore dolores dolor fugiat voluptatem. Architecto voluptates qui eius impedit. Et fuga et blanditiis culpa.</p><p>Illo quibusdam voluptates reprehenderit velit cum quis. Fugiat iure alias nihil eligendi expedita placeat. Maxime odio cumque et corrupti totam vel. Autem ratione exercitationem aut dolores fugit rerum est dolores.</p><p>Magni voluptatum molestiae pariatur voluptatem vel. Laborum illum impedit autem voluptas. Tenetur earum saepe commodi laborum molestias. Est quis distinctio quis.</p><p>Temporibus ea quia aliquid eligendi autem nihil cum. Quod quae animi qui perferendis. Quo minima dolorem nobis quasi est aut ut. Dolor vitae nulla alias. Harum excepturi tenetur enim et provident nam voluptate.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(8, 'Nobis debitis quidem eius.', 'https://via.placeholder.com/1146x365.png/00aabb?text=tech+ut', 'https://via.placeholder.com/300x200.png/0077cc?text=eos', 'https://via.placeholder.com/80x80.png/00cc33?text=at', 'Impedit at quidem ut iusto et in nobis rerum aut blanditiis.', 'corrupti-quas-ex-labore-qui', '<p>Sit ab qui placeat ut voluptatem et veritatis. Occaecati nihil sed nam rerum quae dolore distinctio. Animi ratione pariatur reiciendis consequatur quaerat expedita eum. Voluptatem eos quam et magnam est. Quia atque architecto voluptates occaecati quam nisi voluptatem eligendi.</p><p>At explicabo sapiente commodi ut autem molestiae et. Itaque qui nisi et ut consequatur. Dicta eum omnis atque.</p><p>Inventore est minus temporibus voluptatem possimus ea. Explicabo qui sit laborum. Tempora et iusto iusto molestias error quis tenetur. Sunt accusamus fugit debitis aut quod neque doloribus.</p><p>Est ut vel ipsam voluptatem facilis enim. Laudantium et architecto quod inventore eaque sunt. Veniam et optio illo rem autem dolorem. Magni rerum dolorem est omnis eius quibusdam.</p><p>Aut autem inventore quam fugit. Saepe voluptatum cupiditate sed omnis. Sed natus quisquam dolorem dolores et voluptate. Voluptas error dolor et doloribus.</p><p>Cumque quia eaque aut doloribus. Et enim eum cumque assumenda beatae sapiente. Autem omnis consequatur et ut blanditiis dolorem veniam vitae.</p><p>Molestiae nihil blanditiis qui. Voluptatum dolorum saepe qui dolores illo aut consequatur. Sit doloribus velit rerum qui nostrum.</p><p>Dolor repudiandae facilis at aperiam id autem beatae. Optio temporibus sit rerum aut soluta ex aliquid. Veniam facilis enim reprehenderit quidem ullam voluptatem dolorem. Qui vel voluptates autem consequatur placeat.</p><p>Dolorum autem modi nihil maiores modi nam. Fugit delectus et sint incidunt et eos.</p><p>Ex voluptate earum vel esse ut ea maxime. Eligendi nam cum nostrum consequatur dolor numquam dolorem et. Ea vero dolore provident facilis in est cumque.</p><p>Dolorem quasi labore voluptatem saepe excepturi. Cum consequuntur corrupti quae nihil. Dolore rerum nulla dolorem suscipit officiis consequuntur voluptatem. Iure aut fugit illum deleniti nihil sit. Est illo aut debitis ut est quos ex.</p><p>Sed est et molestias voluptatem cupiditate perspiciatis id. Exercitationem repellendus adipisci sit sit cupiditate. Ut facere quidem at animi maxime voluptate.</p><p>Magni sunt illum inventore quaerat temporibus itaque. Voluptas nam doloremque ea praesentium perspiciatis non. Voluptas pariatur id culpa nobis voluptatum dolores culpa. Quae rerum ab occaecati neque sint exercitationem atque.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(9, 'Dolorem voluptate sit.', 'https://via.placeholder.com/1107x384.png/007766?text=tech+voluptates', 'https://via.placeholder.com/300x200.png/0011bb?text=et', 'https://via.placeholder.com/80x80.png/000077?text=in', 'Aut eligendi doloremque itaque officia aperiam quod voluptatum.', 'at-esse-quisquam', '<p>Quod autem vero non est neque. Iure ea incidunt deserunt voluptatem nesciunt error. Atque aliquid eum sequi ea omnis dignissimos. Provident mollitia atque quasi vel consequatur corporis aut. Quasi nemo quia debitis non excepturi molestias deserunt.</p><p>Esse tempore quo cupiditate illum. Eos quae molestiae ab velit. Recusandae vero possimus numquam id.</p><p>Aut sunt consectetur itaque consequatur vero velit sed sit. Molestiae illum nihil non quia maiores. Quia officia ducimus aliquid dolorem.</p><p>Est aliquam quo id recusandae pariatur. Consequatur dolorem magni ipsa distinctio et et molestiae. Inventore eaque consequuntur possimus earum fuga.</p><p>Natus aliquid rerum molestias libero et. Doloremque a sed excepturi asperiores consectetur est. Culpa numquam itaque sunt sunt. Error eos facere dolor mollitia. Provident voluptatem repellat earum quibusdam optio in.</p><p>Atque in omnis aut ut aperiam sit laboriosam voluptatem. Est repellat illum minus est sit. Nulla qui quo ratione debitis et fugit placeat. Quos et dolore molestias et itaque.</p><p>Ullam qui quo reiciendis nihil vitae. Vel sunt odit quo enim est ut. Minima ut nihil ea repellat commodi necessitatibus. Ut ea accusamus cum velit non suscipit aspernatur.</p><p>Nihil fugiat vitae et harum omnis. Aut magni ut rerum facilis illum maxime qui.</p><p>Occaecati perferendis porro vel laudantium voluptatem. Sed saepe excepturi deserunt quam ratione.</p><p>Sapiente fugiat id iusto qui voluptatem. Inventore consequuntur nobis nisi ea libero. Et et commodi minus accusantium.</p><p>Ut sunt ut alias tempore praesentium. Voluptatibus perferendis earum sint veritatis. Atque consequuntur minus neque et.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(10, 'In placeat quis.', 'https://via.placeholder.com/945x391.png/007744?text=tech+eaque', 'https://via.placeholder.com/300x200.png/0044dd?text=quis', 'https://via.placeholder.com/80x80.png/009977?text=natus', 'Iure culpa voluptatem excepturi magnam aperiam eaque non.', 'quod-dolorem-culpa-sapiente', '<p>Aperiam possimus dolorum nulla cum quo. Voluptatem in officiis quae quos distinctio commodi vel. Libero sequi rerum enim quas.</p><p>Quod dolorem facilis et fuga sed labore in. Impedit consequatur et culpa laboriosam. Harum nesciunt dolorum ut enim cupiditate est quam quia. Molestiae earum earum qui vitae fugiat iure tempore. Dicta id sit quidem maxime impedit qui est sed.</p><p>Facilis est consequatur incidunt tempore. Dolor omnis commodi architecto sunt et nihil est. Dicta debitis laborum tempora eaque alias voluptatem voluptate. Nesciunt iusto eos molestias qui mollitia.</p><p>Fugiat suscipit eius modi dolores enim enim voluptatibus. Et nostrum exercitationem ratione ab dolore. Amet inventore rerum nam quia et necessitatibus. Sed labore laboriosam enim non autem earum in et.</p><p>Necessitatibus atque quis eos possimus itaque eaque occaecati. Quibusdam magni aperiam aliquid quia. Enim asperiores voluptate nulla tempora repudiandae est. Aspernatur exercitationem dolores optio rerum aut quia placeat similique.</p><p>Et magni eius impedit iste corporis corrupti. Incidunt consequatur qui voluptatum aut voluptas inventore. Qui et laboriosam et alias. Consequuntur odio nam dolorum excepturi velit voluptatem quaerat quia.</p><p>Exercitationem perferendis laboriosam similique aliquam adipisci iusto. Iusto sit quibusdam consectetur blanditiis ad velit dignissimos.</p><p>Error et necessitatibus molestiae eum voluptatem dolorem magnam vel. Ipsa numquam quo suscipit enim voluptate voluptas ut. Quam non suscipit voluptas ipsa cum voluptates ipsum.</p><p>Explicabo laboriosam itaque qui minus odio nostrum iste. Ut commodi voluptatem possimus aut atque sit et. Tempora porro doloremque enim voluptates aut aut ullam. Dolores facere recusandae quod quas.</p><p>Autem porro non hic. Animi temporibus rerum eum iusto. Iure qui saepe harum in atque qui. Animi rerum ea recusandae.</p><p>Suscipit inventore dicta in fugit. Saepe quos est et minus ullam perferendis ut. Fugit aut necessitatibus et provident similique dolores. Sed sunt eius id suscipit.</p>', NULL, 2, 1, 0, '2022-03-20 11:15:09', '2022-03-20 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `news_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 1),
(6, 6, 2),
(7, 7, 3),
(8, 8, 4),
(9, 9, 1),
(10, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `other_settings`
--

CREATE TABLE `other_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halaman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_settings`
--

INSERT INTO `other_settings` (`id`, `modul`, `slug`, `halaman`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'profil', 'profil', 'Profil', '<p><span>&#8220;</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sint alias in, ducimus\n                autem, nulla fugit corporis dignissimos laudantium ab necessitatibus explicabo similique aut omnis facere\n                vitae est eos cupiditate.<span>&#8221;</span></p>\n              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi facilis, unde ratione iste dolor\n                distinctio fugiat quisquam sint explicabo magnam corporis illo consectetur repudiandae? Voluptates\n                consectetur molestiae maiores fuga minus, sunt dignissimos voluptatem corrupti quidem at eligendi totam\n                praesentium tempore illum aliquam unde incidunt expedita, nisi provident ullam ad dolore. Eaque, labore\n                porro. Rerum, a dolores! Error excepturi aspernatur vel minus doloribus sit deserunt voluptas iste maxime\n                repudiandae neque dolor amet natus dicta, dolorum animi ducimus maiores, delectus autem magni\n                perspiciatis. Perferendis eum odio fugiat quisquam, nemo officiis sit. Tempora officia explicabo atque\n                consequatur dolor aliquam dolorem est delectus. Non.</p>\n              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur rerum, officia sapiente, quis ipsum non\n                consequuntur temporibus eaque ullam voluptas est laudantium sit aspernatur modi? Autem atque placeat,\n                repudiandae et cupiditate provident a reiciendis voluptate assumenda odio accusamus expedita magnam illum\n                veritatis laudantium ullam dolor ipsa eligendi molestias quo perspiciatis.</p>', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(2, 'profil', 'sambutan-ketua-jurusan', 'Sambutan Ketua Jurusan', '<p><img class=\"img-fluid float-start pe-4\" src=\"/web/assets/app/img/sambutan/okta.veza.jpg\" alt=\"\" width=\"224\" height=\"200\" /></p>\n      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo maxime magni autem repellendus harum. Iste cupiditate sapiente obcaecati natus facere, illo, cum veritatis eveniet facilis quasi minima veniam ipsum pariatur.</p>\n      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti facere in nulla placeat inventore sit soluta, cupiditate incidunt esse. Deserunt earum harum rem accusantium asperiores quod impedit tempore exercitationem aspernatur soluta facere, laborum commodi. Soluta facilis, eos nisi, accusamus quo consectetur voluptate odit quibusdam, iure voluptatibus distinctio sed ex? Labore.</p>\n      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate tempora quos unde, nam nesciunt facere recusandae nostrum dolorem eaque quidem id, facilis laboriosam temporibus? Architecto repellendus tenetur quam vero! At esse, voluptatum itaque quis, eius error in dolorum quos illo debitis blanditiis odio provident fuga maiores, omnis laborum nemo asperiores necessitatibus excepturi. Rerum dolores aliquid tempore harum mollitia accusamus ab, ad placeat exercitationem veritatis, porro libero. Ipsa, quae rerum iste numquam hic et qui molestiae dolore excepturi corrupti quaerat voluptatibus distinctio placeat labore ab nesciunt eum odit sapiente molestias voluptatum illo a magni animi praesentium? Necessitatibus vero nesciunt nam hic!</p>', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(3, 'profil', 'visi-misi', 'Visi dan Misi', '<h5 class=\"text-black fw-bold\">Visi</h5>\n\n                <div class=\"visi-wrapper mb-4\">\n                  <p><span>&#8220;</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sint alias in, ducimus\n                    autem, nulla fugit corporis dignissimos laudantium ab necessitatibus explicabo similique aut omnis facere\n                    vitae est eos cupiditate.<span>&#8221;</span> </p>\n                </div>\n      \n                <h5 class=\"text-black fw-bold\">Misi</h5>\n      \n                <div class=\"misi-wrapper mb-4\">\n                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta minus dolorum aliquid veritatis quidem\n                    repellat reprehenderit rerum unde eum cum impedit iure ab exercitationem quod consectetur porro, quis,\n                    delectus molestiae! : </p>\n                  <ol>\n                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, eaque.</li>\n                    <li>Ex dicta aut alias dolores nemo, sint voluptatem animi repellendus?</li>\n                    <li>Quae possimus consectetur sint voluptates ad enim voluptatum temporibus aliquid.</li>\n                  </ol>\n                </div>\n      \n                <h5 class=\"text-black fw-bold\">Tujuan</h5>\n      \n                <div class=\"tujuan-wrapper mb-4\">\n                  <ol>\n                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, eaque.</li>\n                    <li>Ex dicta aut alias dolores nemo, sint voluptatem animi repellendus?</li>\n                  </ol>\n                </div>', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(4, 'profil', 'struktur-organisasi', 'Struktur Organisasi', '<img src=\"/web/assets/app/img/ig/1.jpg\" alt=\"\" class=\"img-fluid\">', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(5, 'program studi', 'sambutan-kaprodi-s1', 'Sambutan Kapordi S1', '<div class=\"thumb-foto-wrapper float-start\">\n            <div class=\"thumb-foto\">\n              <img src=\"/web/assets/app/img/sambutan/okta.veza.jpg\" alt=\"\" class=\"img-fluid\">\n              <div class=\"nama-kaprodi\"><i>Okta Veza M.Kom</i></div>\n            </div>\n          </div>\n          <div class=\"deskripsi-info\">\n            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo maxime magni autem repellendus harum.\n              Iste\n              cupiditate sapiente obcaecati natus facere, illo, cum veritatis eveniet facilis quasi minima veniam\n              ipsum\n              pariatur.</p>\n            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti facere in nulla placeat inventore\n              sit\n              soluta, cupiditate incidunt esse. Deserunt earum harum rem accusantium asperiores quod impedit tempore\n              exercitationem aspernatur soluta facere, laborum commodi. Soluta facilis, eos nisi, accusamus quo\n              consectetur voluptate odit quibusdam, iure voluptatibus distinctio sed ex? Labore.</p>\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate tempora quos unde, nam nesciunt\n              facere\n              recusandae nostrum dolorem eaque quidem id, facilis laboriosam temporibus? Architecto repellendus\n              tenetur\n              quam vero! At esse, voluptatum itaque quis, eius error in dolorum quos illo debitis blanditiis odio\n              provident fuga maiores, omnis laborum nemo asperiores necessitatibus excepturi. Rerum dolores aliquid\n              tempore harum mollitia accusamus ab, ad placeat exercitationem veritatis, porro libero. Ipsa, quae rerum\n              iste numquam hic et qui molestiae dolore excepturi corrupti quaerat voluptatibus distinctio placeat\n              labore\n              ab nesciunt eum odit sapiente molestias voluptatum illo a magni animi praesentium? Necessitatibus vero\n              nesciunt nam hic!</p>\n          </div>', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(6, 'program studi', 'profil-lulusan', 'Profil Lulusan', '<div class=\"row justify-content-between align-items-center pb-4\">\r\n<div class=\"col-md-5 text-center text-lg-center\"><img class=\"img-fluid\" src=\"/web/assets/app/img/sarjana/Diagram-Solution-Enabler-1030x1030.png\" alt=\"\" width=\"262\" height=\"262\" /></div>\r\n<div class=\"col-md-7 mt-4 mt-sm-0 ps-sm-5\">\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id veritatis inventore sequi illo voluptas aliquam cumque? Officia corporis sunt doloribus ratione minus voluptas ipsa laboriosam.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita dolores deleniti possimus soluta! Expedita quo possimus in atque debitis quaerat repellat excepturi tempore nihil, voluptas exercitationem odio</p>\r\n</div>\r\n</div>', '2022-03-20 11:15:09', '2022-03-20 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(2, 'users', '2022-03-20 11:15:09', '2022-03-20 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_web` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `icon`, `favicon`, `nama_web`, `latitude`, `longitude`, `alamat`, `telpon`, `email`, `fb`, `ig`, `yt`, `link_fb`, `link_ig`, `link_yt`, `bg_login`, `created_at`, `updated_at`) VALUES
(1, 'ti-uis.png', 'favicon.ico', 'Jurusan Informatika Universitas Ibnu Sina Batam', '1.1453036', '104.0150299', 'Alamat: Jl. Teuku Umar, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444', '(0778) 7058741', 'info@uis.ac.id', NULL, '@uis.batam', NULL, NULL, 'https://www.instagram.com/uis.batam/', NULL, '#00A859', '2022-03-20 11:15:09', '2022-03-20 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@uis.com', NULL, '$2y$10$W2AFibsAX2/xBVnkSzkR5uA0msCj.Gi5LpoLcYJ2aAb1lCN6p04Ya', 'default.png', 1, NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09'),
(2, 'Fiki', 'fiki@uis.com', NULL, '$2y$10$mLU4Fr8Uf62tpDdm/hvmXOitVNo12duKP.zqEvOV.BNNKzvg7HjN2', 'default.png', 2, NULL, '2022-03-20 11:15:09', '2022-03-20 11:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_selamatdatang_setting`
--
ALTER TABLE `home_selamatdatang_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slide_setting`
--
ALTER TABLE `home_slide_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_testimoni_setting`
--
ALTER TABLE `home_testimoni_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_news_id_foreign` (`news_id`),
  ADD KEY `news_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `other_settings`
--
ALTER TABLE `other_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_selamatdatang_setting`
--
ALTER TABLE `home_selamatdatang_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slide_setting`
--
ALTER TABLE `home_slide_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_testimoni_setting`
--
ALTER TABLE `home_testimoni_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_settings`
--
ALTER TABLE `other_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `news_category`
--
ALTER TABLE `news_category`
  ADD CONSTRAINT `news_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `news_category_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
