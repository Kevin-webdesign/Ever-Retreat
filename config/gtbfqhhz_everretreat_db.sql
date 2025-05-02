-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2025 at 12:39 AM
-- Server version: 10.11.11-MariaDB-cll-lve
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtbfqhhz_everretreat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stats_text_1` varchar(100) DEFAULT NULL,
  `stats_value_1` varchar(50) DEFAULT NULL,
  `stats_text_2` varchar(100) DEFAULT NULL,
  `stats_value_2` varchar(50) DEFAULT NULL,
  `stats_text_3` varchar(100) DEFAULT NULL,
  `stats_value_3` varchar(50) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_path_right` varchar(255) NOT NULL DEFAULT 'second.jpg',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `section_title`, `main_title`, `description`, `stats_text_1`, `stats_value_1`, `stats_text_2`, `stats_value_2`, `stats_text_3`, `stats_value_3`, `button_text`, `button_link`, `video_path`, `image_path`, `image_path_right`, `updated_at`) VALUES
(1, 'About us', 'Welcome to <span class=\"color-primary\">Everretreat</span>, The Best <br> Destination for Tranquility', 'There are two types of travelers: trend-seekers and those chasing the unexpected. Our accommodations offer the best of both - luxury and discovery.', 'Guests Served', '150k +', 'Villas & Resorts', '24', 'Years of Experience', '06 +', 'More About us', '../../General/views/aboutus.php', 'Ever-short-vid.mp4', 'first.jpg', 'second.jpg', '2025-05-02 22:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT 'Discover More',
  `button_link` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `title`, `description`, `image_path`, `button_text`, `button_link`, `display_order`, `is_active`) VALUES
(1, 'B&P Beach Villa', 'Welcome to our Master Suite, where time slows down and the elegance of simplicity flourishes. Our Master Suite accommodates up to two guests, featuring a luxurious jacuzzi with a stunning view of Lake Kivu. This 45-square-meter retreat offers a serene escape, complete with a king-sized pillow top bed and a bathroom with both a tub and shower. Indulge in our top-notch amenities, including a flat-screen TV with satellite channels, wireless internet, Elenis bath amenities, a hair dryer, and cozy bathrobe and slippers. Enjoy the convenience of a work desk and chair, 24-hour room service, and air conditioning. Experience unparalleled comfort and tranquility in our Master Suite.', 'firstb.png', 'Discover More', '#', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` int(11) NOT NULL,
  `bookingCode` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `adults` int(11) NOT NULL DEFAULT 1,
  `child` int(11) NOT NULL DEFAULT 0,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Pending','Confirmed','Cancelled','Completed') NOT NULL DEFAULT 'Pending',
  `date_received` timestamp NOT NULL DEFAULT current_timestamp(),
  `villa` varchar(100) NOT NULL DEFAULT 'Ever Retreat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `bookingCode`, `checkin`, `checkout`, `adults`, `child`, `names`, `email`, `phone`, `message`, `status`, `date_received`, `villa`) VALUES
(10, 'EVBN917825', '2025-03-26', '2025-03-28', 2, 1, 'ABAYO Remy', 'aba1remy@gmail.com', '0787254817', 'Test', 'Pending', '2025-03-26 04:32:41', 'Ever Retreat'),
(11, 'EVBN580071', '2025-04-01', '2025-04-01', 1, 0, 'TEST Test', 'aba1remy@gmail.com', '0787254817', 'Test me', 'Pending', '2025-03-26 05:19:57', 'Ever Retreat'),
(12, 'EVBN138308', '2025-04-01', '2025-04-01', 1, 2, 'TEST Test', 'aba1remy@gmail.com', '0787254817', 'Test me', 'Pending', '2025-03-26 05:20:17', 'Ever Retreat'),
(13, 'EVBN333075', '2025-04-02', '2025-04-02', 1, 0, 'test tes', 'aba1remy@gmail.com', '0787254817', 'hgfd', 'Pending', '2025-03-26 05:22:10', 'Ever Retreat'),
(14, 'EVBN223113', '2025-04-02', '2025-04-02', 1, 1, 'test tes', 'aba1remy@gmail.com', '0787254817', 'hgfd', 'Pending', '2025-03-26 05:22:32', 'Ever Retreat'),
(15, 'EVBN981941', '2025-04-02', '2025-04-02', 1, 1, 'test tes', 'aba1remy@gmail.com', '0787254817', 'hgfd', 'Pending', '2025-03-26 05:22:55', 'Ever Retreat'),
(16, 'EVBN102835', '2025-04-06', '2025-04-07', 2, 0, 'ABAYO Remy', 'abaremy1997@gmail.com', '+250787254817', 'I am Testing The Live hosted Website', 'Pending', '2025-04-01 20:39:02', 'Ever Retreat'),
(17, 'EVBN513105', '2025-04-10', '2025-04-10', 6, 4, 'iiiiiiii', 'chiefpianist5@gmail.com', '0788624690', 'website checkup', 'Pending', '2025-04-10 08:29:17', 'Ever Retreat'),
(18, 'EVBN611266', '2025-04-23', '2025-05-21', 7, 9, 'checkup', 'client@gmail.com', '0727770838', 'Do you have meting Room?', 'Pending', '2025-04-10 14:51:51', 'Ever Retreat'),
(19, 'EVBN636528', '2025-04-23', '2025-05-21', 7, 9, 'checkup', 'client@gmail.com', '0727770838', 'Do you have meting Room?', 'Pending', '2025-04-10 14:51:52', 'Ever Retreat'),
(20, 'EVBN695987', '2025-04-17', '2025-04-19', 5, 9, 'Ntawuhiganayo joseph', 'chiefpianist5@gmail.com', '0788624690', 'Is this real', 'Pending', '2025-04-11 07:11:05', 'Ever Retreat'),
(21, 'EVBN496022', '2025-04-17', '2025-04-19', 5, 9, 'Ntawuhiganayo joseph', 'chiefpianist5@gmail.com', '0788624690', 'Is this real', 'Pending', '2025-04-11 07:11:07', 'Ever Retreat'),
(22, 'EVBN695781', '2025-04-21', '2025-04-25', 25, 5, 'Checker', 'chiefpianist5@gmail.com', '0788624690', 'I need to checkup this booking ', 'Pending', '2025-04-14 04:28:45', 'Ever Retreat'),
(23, 'EVBN106041', '2025-04-16', '2025-04-18', 2, 2, 'GEN Kaliza', 'info.abaremy@gmail.com', '0788546361', 'Test 3 homepage', 'Pending', '2025-04-15 15:23:21', 'Ever Retreat'),
(24, 'EVBN626532', '2025-04-15', '2025-04-15', 1, 0, 'ANDY Darwin', 'remy.abayo@auca.ac.rw', '+250721053807', 'My Test again', 'Pending', '2025-04-15 15:25:34', 'Ever Retreat'),
(25, 'EVBN355066', '2025-04-15', '2025-04-16', 1, 0, 'Esther', 'umurutasateesther7@gmail.com', '(515) 778-5764', '', 'Pending', '2025-04-15 15:30:45', 'Ever Retreat'),
(26, 'EVBN657374', '2025-04-15', '2025-04-15', 1, 1, 'GEN Kaliza', 'info.abaremy@gmail.com', '250784286046', 'test ', 'Pending', '2025-04-15 18:31:12', 'Ever Retreat'),
(27, 'EVBN861000', '0000-00-00', '0000-00-00', 3, 1, 'Iradukunda Eric', 'chiefpianist5@gmail.com', '0788624690', 'I want To check', 'Pending', '2025-04-15 20:23:44', 'Ever Retreat'),
(28, 'EVBN840725', '2025-04-23', '2025-04-25', 25, 5, 'IT team', 'chiefpianist5@gmail.com', '0788624690', 'One to check ', 'Pending', '2025-04-15 21:00:03', 'Ever Retreat'),
(29, 'EVBN360887', '2025-04-25', '2025-05-26', 4, 3, 'checking', 'chiefpianist5@gmail.com', '0788624690', 'its about complete booking form as checking up', 'Pending', '2025-04-17 06:48:55', 'Ever Retreat'),
(30, 'EVBN562299', '2025-04-24', '2025-05-28', 3, 2, 'Iradukunda Eric', 'iradukundaericmbabazi@gmail.com', '0784806931', 'its about checking?\n', 'Pending', '2025-04-21 18:30:44', 'Ever Retreat'),
(31, 'EVBN332828', '0000-00-00', '0000-00-00', 5, 0, 'Gasasira Daniel', 'gasasiradaniel819@gmail.com', '0780851949', '', 'Pending', '2025-04-25 14:29:22', 'Ever Retreat'),
(32, 'EVBN303381', '2025-04-25', '2025-04-26', 1, 1, 'Test2 Remy', 'info.abaremy@gmail.com', '+250787254817', 'My test count', 'Pending', '2025-04-25 15:39:14', 'Ever Retreat'),
(33, 'EVBN706022', '2025-04-27', '2025-04-27', 1, 1, 'Test3 Remy', 'abaremy1997@gmail.com', '+250787254817', 'kjfhg', 'Pending', '2025-04-25 15:42:00', 'Ever Retreat'),
(34, 'EVBN207319', '2025-04-26', '2025-04-26', 3, 0, 'Test4 Remy', 'aba1remy@gmail.com', '+250787254817', 'My Test', 'Pending', '2025-04-25 15:43:24', 'Ever Retreat'),
(35, 'EVBN358131', '2025-04-27', '2025-04-29', 5, 2, 'MUGENI FAB TEST', 'mugeni@gmail.com', '0785720549', 'My another test', 'Pending', '2025-04-25 15:48:45', 'Ever Retreat'),
(36, 'EVBN123143', '0000-00-00', '0000-00-00', 1, 0, 'Nelly Uwase', 'uwasenelly005@gmail.com', '0787845366', '', 'Pending', '2025-04-25 23:34:55', 'Ever Retreat'),
(37, 'EVBN622888', '2025-05-08', '2025-05-11', 15, 0, 'Gaju', 'gajutona080707@gmail.com', '0788756015', '', 'Pending', '2025-04-27 19:10:01', 'Ever Retreat'),
(38, 'EVBN557856', '2025-10-17', '2025-10-19', 15, 0, 'Raissa Gaju', 'gajuraissad@gmail.com', '787012206', '', 'Pending', '2025-04-28 18:21:50', 'Ever Retreat'),
(39, 'EVBN101622', '2025-05-01', '2025-05-02', 4, 0, 'Karenzi Karake Test Online', 'info.abaremy@gmail.com', '0785720549', 'My Best Friend always want to make tests', 'Pending', '2025-04-28 19:13:06', 'Ever Retreat'),
(40, 'EVBN310904', '0000-00-00', '0000-00-00', 5, 0, 'Mushimiyimana Bruce', 'brucebilly18@gmail.com', '0790052587', '', 'Pending', '2025-04-28 21:52:33', 'Ever Retreat');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `display_order` int(11) DEFAULT 0,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image_path`, `category`, `is_featured`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sports Time', '', '1743431909_SHIR8932.jpg', 'Pool', 0, 220, 'Active', '2025-03-31 14:38:29', '2025-03-31 18:22:33'),
(2, 'Living Room', '', '1743432114_SHIR8648-Enhanced-NR.jpg', 'Rooms', 0, 441, 'Active', '2025-03-31 14:41:54', '2025-03-31 15:53:16'),
(3, 'Villa', '', '1743432345_SHIR9286.jpg', 'Exterior', 0, 112, 'Active', '2025-03-31 14:45:45', '2025-03-31 15:53:16'),
(5, 'Villa Night', '', '1743433123_SHIR8821-Enhanced-NR.jpg', 'Exterior', 0, 113, 'Active', '2025-03-31 14:58:43', '2025-03-31 15:53:16'),
(6, 'Aerial Sits', '', '1743433168_SHIR8961.jpg', 'Pool', 0, 225, 'Active', '2025-03-31 14:59:28', '2025-03-31 18:23:10'),
(7, 'Luxury Suite', 'Our premium luxury suite with ocean view', 'luxury_suite.jpg', 'Rooms', 0, 1, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(8, 'Infinity Pool', 'Stunning infinity pool overlooking the ocean', 'infinity_pool.jpg', 'Amenities', 0, 2, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(9, 'Beachfront View', 'Beautiful beachfront view from our resort', 'beachfront.jpg', 'Views', 0, 3, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(10, 'Gourmet Restaurant', 'Fine dining experience at our gourmet restaurant', 'restaurant.jpg', 'Dining', 0, 4, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(11, 'Spa Treatment', 'Relaxing spa treatment in our wellness center', 'spa.jpg', 'Exterior', 0, 5, 'active', '2025-03-31 15:09:10', '2025-03-31 19:16:25'),
(12, 'Garden Suite', 'Peaceful garden suite with private patio', '1743774305_garden_suite.jpg', 'Rooms', 0, 6, 'active', '2025-03-31 15:09:10', '2025-04-04 13:45:05'),
(13, 'Sunset View', 'Breathtaking sunset view from the resort', 'sunset.jpg', 'Views', 0, 7, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(14, 'Beachside Dining', 'Romantic beachside dining experience', '1743484879_SHIR9808-Enhanced-NR.jpg', 'Dining', 0, 8, 'active', '2025-03-31 15:09:10', '2025-04-01 05:21:19'),
(15, 'Yoga Deck', 'Morning yoga sessions on our ocean-view deck', 'yoga_deck.jpg', 'Wellness', 0, 9, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(16, 'Under the Stars', 'Under the Night Sky', 'tennis.jpg', 'Activities', 0, 10, 'active', '2025-03-31 15:09:10', '2025-03-31 18:19:41'),
(17, 'Executive Suite', 'Spacious executive suite with premium amenities', 'executive_suite.jpg', 'Rooms', 0, 11, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(18, 'Lobby', 'Our elegant and welcoming lobby', 'lobby.jpg', 'Common Areas', 0, 12, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(19, 'Pool Bar', 'Refreshing drinks at our swim-up pool bar', 'pool_bar.jpg', 'Amenities', 0, 13, 'active', '2025-03-31 15:09:10', '2025-03-31 15:09:10'),
(20, 'Pool View', 'Spectacular Pool view from select rooms', 'mountain_view.jpg', 'Views', 0, 14, 'active', '2025-03-31 15:09:10', '2025-03-31 18:20:44'),
(21, 'Breakfast ', 'Delicious breakfast buffet with local specialties', 'breakfast.jpg', 'Dining', 0, 15, 'active', '2025-03-31 15:09:10', '2025-03-31 18:14:37'),
(22, 'Always Swim', 'Fun activities for our guests at our Club', 'kids_club.jpg', 'Activities', 0, 16, 'active', '2025-03-31 15:09:10', '2025-03-31 18:21:45'),
(23, 'Pool', 'State-of-the-art swimming pool', 'fitness.jpg', 'Wellness', 0, 17, 'active', '2025-03-31 15:09:10', '2025-03-31 18:14:10'),
(24, 'Living Room', 'Professional living facilities', 'conference.jpg', 'Business', 0, 18, 'active', '2025-03-31 15:09:10', '2025-03-31 18:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_hero`
--

CREATE TABLE `homepage_hero` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_hero`
--

INSERT INTO `homepage_hero` (`id`, `title`, `subtitle`, `video_path`, `updated_at`) VALUES
(1, 'B&P Ever Retreat Villa', 'We provide luxurious villa building services, accommodations, and unforgettable<br> tourism experiences in serene rural areas.', 'hero_1745578060_Everretreatinvestment.mp4', '2025-04-25 10:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `full_description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_path2` text NOT NULL,
  `image_path3` text NOT NULL,
  `inspired_us` text NOT NULL,
  `love_about` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `title`, `tagline`, `description`, `full_description`, `image_path`, `image_path2`, `image_path3`, `inspired_us`, `love_about`, `link`, `display_order`, `is_active`) VALUES
(1, 'Kigali', 'The Heart of Modern Rwanda', 'The heart of modern Rwanda', 'Kigali pulses with Rwanda\'s dynamic transformation, where modernity meets culture.', 'Kigali offers a unique blend of artistic expression and cultural heritage. At Ever Retreat, you can immerse yourself in art camps, where local artists guide you through creating your own masterpiece inspired by Rwanda\'s vibrant culture.', 'location_1744311534_kigali1.jpg', 'kigali1.jpg', 'kigali2.jpg', 'For those who love photography, photography tours allow you to capture the essence of Kigali. Its dynamic streets, stunning landscapes, and colorful markets. If you\'re looking for something hands-on, craft workshops offer the chance to learn traditional Rwandan crafts, from weaving to pottery, making your travel experience even more memorable.', 'Kigali is a top destination in Africa known for its cleanliness, safety, and vibrant culture. Tourists love the Kigali Genocide Memorial for its deep historical significance, the city\'s stunning scenery, and its growing art and cafe culture. Visitors can explore craft markets, enjoy delicious local cuisine, and use Kigali as a gateway to Rwanda\'s wildlife adventures like gorilla trekking and safaris', '../../modules/General/views/location_kigali.php', 1, 1),
(2, 'Rubavu', 'The Serenity of Lake Kivu', 'The Serenity of Lake Kivu', 'Rubavu, offers an unmatched sense of the tranquility.', 'You can start by kayaking on Lake Kivu, where you\'ll glide across calm waters, surrounded by gorgeous mountain views perfect for some peaceful exploration. If you\'re up for something truly unforgettable.\r\n\r\nAnd for those who enjoy a good stroll, the nature walks around Lake Kivu are a must. Whether it\'s a relaxing walk by the lake or a more adventurous hike, you\'ll be surrounded by incredible landscapes and wildlife. It\'s the ultimate mix of adventure and tranquility', 'rubavu.jpg', 'rubavu1.jpg', 'rubavu2.jpg', 'Rubavu\'s breathtaking beauty, with its serene shores on Lake Kivu and surrounding mountains, has always inspired us. It\'s a place where nature and peace come together, offering both tranquility and adventure.', 'We love Rubavu for its natural charm whether it\'s kayaking on the sparkling waters, hiking through lush trails, or simply enjoying the sunset over the lake. It\'s a perfect balance of relaxation and adventure, making it an unforgettable destination', '../../modules/General/views/location_rubavu.php', 2, 1),
(3, 'Musanze', 'The Call of the Mountains', 'The Call of the Mountains', 'Musanze, surrounded by misty volcanic peaks, calls to adventurers and nature lovers alike.', 'Musanze, surrounded by misty volcanic peaks, calls to adventurers and nature lovers alike.\r\n\r\nTrek through dense forests to encounter Rwanda\'s majestic mountain gorillas, a truly awe inspiring experience that connects you with the wild. Musanze is more than a destination—it\'s an extraordinary adventure that leaves a lasting impact. Musanze: The Call of the Mountain', 'musanze.jpg', 'musanze1.jpg', 'musanze2.jpg', 'Musanze\'s misty volcanic peaks and lush landscapes inspire a sense of adventure and awe. The connection to nature and the opportunity to witness Rwanda\'s majestic mountain gorillas makes it a truly unique destination', 'We love Musanze for its thrilling mountain gorilla trekking experience, where every step brings you closer to one of the world\'s most endangered species. The breathtaking scenery, with its towering volcanic peaks and dense forests, offers the perfect backdrop for both adventure and reflection. It\'s a place where nature\'s wonders take center stage', '../../modules/General/views/location_musanze.php', 3, 1),
(4, 'Nyungwe', 'The Whisper of the Forest', 'The Soul of Tradition', 'Nyungwe Forest, a timeless sanctuary, offers breathtaking beauty and rich biodiversity.', 'Nyungwe Forest, a timeless sanctuary, offers breathtaking beauty and rich biodiversity. Walk along the suspended canopy bridge, surrounded by exotic bird songs and monkeys. Guided hikes reveal the forest\'s ecological importance, reminding you of nature\'s ancient wisdom and serenity. Nyungwe: The Whisper of the Forest', 'nyungwe.jpg', 'nyungwe1.jpg', 'nyungwe2.jpg', 'Nyungwe Forest, with its ancient trees and rich biodiversity, calls to those who seek the hidden stories of nature. The idea of walking through a forest that has stood for centuries, alive with the sounds of exotic birds and monkeys, inspired us to explore its depths.', 'We love Nyungwe for its timeless beauty and the sense of wonder it evokes. The suspended canopy walk above the forest floor gives you a bird\'s-eye view of this lush haven, while the guided hikes reveal not just stunning landscapes but also the forest\'s ecological importance. It\'s a place that feels like stepping into a living story, one where nature\'s wisdom is quietly whispered in every rustling leaf.', '../../modules/General/views/location_nyungwe.php', 4, 1),
(5, 'Nyanza', 'The Soul of Tradition', 'The Trail of Kings', 'Nyanza, Tradition thrives through cultural experiences.', 'Nyanza, we\'re immersed in a world where tradition is not just remembered, but experienced. Picture stepping into a traditional cooking class, where local chefs teach us the secrets behind Rwanda\'s cherished recipes. As we chop, stir, and cook, they share stories of family, community, and the rich history behind each dish', 'nyanza.jpg', 'nyanza1.jpg', 'nyanza2.jpg', 'We then find ourselves swept up in the rhythm of Intore dance performances. The drumming pulses through the air, and the dancers, dressed in vibrant attire, move with strength and grace, telling stories of Rwanda\'s royal past. We can feel the energy and history in every step', 'As we explore the Nyanza Royal Palace, we walk through the very grounds where Rwanda\'s kings once ruled. The sense of history is palpable, connecting us to a legacy that continues to shape the culture today. In Nyanza, every moment invites us to engage with Rwanda\'s past and present, allowing us to live and breathe the traditions that have shaped this remarkable place.\r\n', '../../modules/General/views/location_nyanza.php', 5, 1),
(6, 'Huye', 'The Wisdom of History', 'The Wisdom of the History', 'Huye is where history and innovation meet. Sit with local elders under ancient trees, hearing tales of Rwanda\'s journey through time.', 'Huye is where history and innovation meet. Sit with local elders under ancient trees, hearing tales of Rwanda\'s journey through time. Art and cultural camps celebrate creative traditions, preserving community spirit while inspiring the future. Huye is a place of reflection and progress, where the past shapes the promise of tomorrow Huye: The Wisdom of History', 'huye.jpg', 'huye1.jpg', 'huye2.jpg', 'Huye inspired us with its unique blend of history and modern innovation. While Nyanza speaks to the royal heritage and traditional customs, Huye invites us to reflect on the wisdom of the past while embracing the future. The mix of historical stories with the thriving intellectual and creative atmosphere in Huye gives it a distinct, forward-thinking energy', 'we love Huye for its perfect balance of the old and new. The elders share timeless stories beneath ancient trees, offering a connection to Rwanda\'s deep history, while the art and cultural camps spark creativity and innovation. Unlike Nyanza, where tradition is at the forefront, Huye feels like a place where the past and future come together, inspiring us to reflect, create, and grow', '../../modules/General/views/location_huye.php', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `is_starred` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `names`, `email`, `phone`, `subject`, `message`, `status`, `is_starred`, `created_at`) VALUES
(4, 'Marc Jabo', 'jabomarc@gmail.com', '+25078855246', 'Requesting Guidance', 'Hi,\nI need your help on making reservation on your site', 'Read', 1, '2025-03-31 10:31:26'),
(5, 'Shania Zalima', 'shania@gmail.rw', '+250649434510555', 'Verify my Request ', 'Thank you for providing this platform which enables us to reach out to you', 'Read', 1, '2025-03-31 19:34:19'),
(6, 'Iradukunda Eric', 'iradukundaericmbabazi@gmail.com', '0784806931', 'VILLA', 'hello villa', 'Read', 0, '2025-04-01 07:44:10'),
(7, 'checker', 'chiefpianist5@gmail.com', '0788624690', 'let checkup', 'checkup of message rich', 'Read', 0, '2025-04-11 08:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `premium_features`
--

CREATE TABLE `premium_features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '#',
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premium_features`
--

INSERT INTO `premium_features` (`id`, `title`, `link`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Elevate Your stay with Premium Features and Services', '../../General/views/accommodation.php', 'dsc_9633.jpg', '2025-04-03 14:52:00', '2025-04-03 19:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `price_settings`
--

CREATE TABLE `price_settings` (
  `cost` int(11) NOT NULL,
  `addition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_settings`
--

INSERT INTO `price_settings` (`cost`, `addition`) VALUES
(1200, 150);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` int(11) NOT NULL,
  `right_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `right_name`) VALUES
(12, 'create_account'),
(8, 'dashboard'),
(2, 'farmer_milk_report'),
(1, 'orders_approval'),
(11, 'orders_registration'),
(3, 'orders_reports'),
(4, 'set_prices'),
(6, 'users_assign_rights'),
(5, 'users_manage'),
(7, 'user_profile'),
(9, 'view_collection'),
(10, 'view_collection_reports');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE `role_rights` (
  `id` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `right_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `title`, `photo_path`, `content`, `display_order`, `is_active`, `created_at`) VALUES
(1, 'Natasha', 'Customer', 'testimonial_1744620795_Tourism and Hospitality manager.jpeg', 'Staying at Ever Retreat was an unforgettable experience. The attention to detail in the architecture, the serene environment, and the commitment to sustainability made it stand out from any other place I\'ve visited in Rwanda. It\'s not just a retreat; it\'s a movement towards responsible tourism. I left feeling refreshed and deeply inspired by the vision behind this place. Highly recommended for anyone looking to escape the ordinary!', 1, 1, '2025-04-01 07:13:34'),
(2, 'ERIC', 'Customer', 'testimonial_1744619827_IMG-20250316-WA0003.jpg', 'Ever Retreat is truly a hidden gem! From the moment I arrived, I felt an overwhelming sense of peace and connection with nature. The eco-friendly design is breathtaking, blending luxury with sustainability in a way I\'ve never experienced before. The staff were incredibly warm, and it was inspiring to see how the retreat empowers the local community. This is more than just a getawayâ€”it\'s a meaningful experience that leaves a lasting impact. I can\'t wait to return.', 2, 1, '2025-04-01 07:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_content`
--

CREATE TABLE `tourism_content` (
  `id` int(11) NOT NULL,
  `page_key` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `hero_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_content`
--

INSERT INTO `tourism_content` (`id`, `page_key`, `title`, `hero_image`, `created_at`, `updated_at`) VALUES
(1, 'adventure', 'Adventure', 'Hero_1745087640_6803ec989ad42.jpg', '2025-04-19 14:28:38', '2025-04-19 18:34:00'),
(2, 'craft', 'Community Empowering', 'craft6.jpg', '2025-04-19 14:28:38', '2025-04-19 14:28:38'),
(3, 'museum', 'Ever Retreat Museum', 'Hero_1745087870_6803ed7e4dc1b.jpeg', '2025-04-19 14:28:38', '2025-04-19 18:37:50'),
(4, 'why', 'Why investing in Ever Retreat', 'why.jpg', '2025-04-19 14:28:38', '2025-04-19 14:28:38'),
(5, 'how', 'How to invest in Ever Retreat', 'how.jpg', '2025-04-19 14:28:38', '2025-04-19 14:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_features`
--

CREATE TABLE `tourism_features` (
  `id` int(11) NOT NULL,
  `tourism_section_id` int(11) NOT NULL,
  `feature_text` varchar(255) NOT NULL,
  `feature_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_features`
--

INSERT INTO `tourism_features` (`id`, `tourism_section_id`, `feature_text`, `feature_order`, `created_at`, `updated_at`) VALUES
(17, 7, 'Ever Retreat Impact', 1, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(18, 7, 'Community', 2, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(19, 7, 'Investment', 3, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(20, 10, 'Equity investment', 1, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(21, 10, 'Debt Investment', 2, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(22, 10, 'Convertible investment', 3, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(23, 10, 'Strategic Partnership', 4, '2025-04-19 14:48:55', '2025-04-19 14:48:55'),
(24, 10, 'Grant of government funding', 5, '2025-04-19 14:48:55', '2025-04-19 14:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_sections`
--

CREATE TABLE `tourism_sections` (
  `id` int(11) NOT NULL,
  `tourism_content_id` int(11) NOT NULL,
  `section_order` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_sections`
--

INSERT INTO `tourism_sections` (`id`, `tourism_content_id`, `section_order`, `title`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sport & Adventure', 'Rwanda is a land where adventure and transformation walk hand in hand. From the misty trails of Volcanoes National Park to the peaceful shores of Lake Kivu, every experience immerses you in nature\'s beauty and cultural richness. But Rwanda\'s story goes beyond breathtaking view it\'s a nation on the move. The tourism and hospitality sectors are thriving, with world-class hotels, eco-lodges, and unique cultural experiences welcoming visitors from around the globe. Kigali, the heart of the nation, blends modern elegance with warm hospitality, positioning itself as a leading destination for both business and leisure.', 'adventure1.jpg', '2025-04-19 14:29:20', '2025-04-19 14:29:20'),
(2, 1, 2, NULL, 'Development is visible across the country through sustainable travel initiatives, community-based tourism, and infrastructure that connects people and places with ease. Rwanda\'s progress is rooted in vision and resilience, creating a future where tourism not only entertains but empowers. Here, every adventure supports growth, every stay builds connection, and every visit becomes part of something greater. Rwanda is not just a place to explore it\'s a place to believe in', 'adventure5.jpg', '2025-04-19 14:29:20', '2025-04-19 14:29:20'),
(3, 2, 1, 'Craft & Art', 'Embark on a journey where Rwanda\'s vibrant heritage comes alive through storytelling, artistry, and hands-on cultural experiences. Imagine yourself in Huye, gathered around with wise elders as they share age-old legends, or in Nyanza, mastering the art of traditional cuisine and moving to the rhythm of royal dances. In Rwanda, venture into the mist-shrouded forests for a breathtaking encounter with mountain gorillas, while in Rubavu, let the gentle strokes of your kayak glide you across the serene waters of Lake Kivu. Whether you\'re joining an art camp or exploring local traditions on a cultural tour, each moment offers a window into the soul of Rwanda where history, creativity, and the warmth of its people create memories that last a lifetime. Are you ready to craft your own Rwandan story? Let the adventure begin.', 'craft1.jpg', '2025-04-19 14:29:54', '2025-04-19 18:44:17'),
(4, 2, 2, NULL, 'Woven into the hills and whispered in the wind, Rwanda is a land where every path tells a story. Hear the rhythm of drums echoing through valleys, the laughter of children chasing sunlight, and the quiet wisdom of elders beneath ancient trees. From golden savannahs to mist-covered mountains, each step leads you deeper into a place where nature and culture dance in harmony. Share a meal prepared with love, learn a song passed down through generations, and feel the heartbeat of a nation rising with hope and pride. Rwanda is more than a destination it\'s a feeling, a connection, a memory waiting to be made.', 'craft.png', '2025-04-19 14:29:54', '2025-04-19 14:29:54'),
(5, 3, 1, 'Story telling', 'the adventure begins with stories that bring Rwanda\'s rich culture to life. Picture yourself in Huye, sitting with elders, hearing tales of the past, or in Nyanza, learning traditional cooking and dancing like royalty. In Musanze, trek through misty forests to encounter mountain gorillas, while in Rubavu, kayak on Lake Kivu\'s calm waters. Each experience, from art camps to cultural tours, offers a deep dive into Rwanda\'s heritage, blending history, adventure, and the warmth of local communities. Ready to create your own story? Let\'s begin!the adventure begins with stories that bring Rwanda\'s rich culture to life. Picture yourself in Huye, sitting with elders, hearing tales of the past, or in Nyanza, learning traditional cooking and dancing like royalty. In Musanze, trek through misty forests to encounter mountain gorillas, while in Rubavu, kayak on Lake Kivu\'s calm waters. Each experience, from art camps to cultural tours, offers a deep dive into Rwanda\'s heritage, blending history, adventure, and the warmth of local communities. Ready to create your own story? Let\'s begin!', 'SCTN_1745087947_6803edcb32364.png', '2025-04-19 14:30:22', '2025-04-19 18:39:07'),
(6, 3, 2, '', 'Rwanda is more than a destination it\'s a tapestry of stories, rhythms, colors, and connections. From the hands of skilled artisans to the voices of storytellers and the natural beauty that surrounds every village and valley, each experience invites you to see, feel, and belong. Whether you came for the art, the culture, or the adventure, you leave with something greater: a piece of Rwanda in your heart. Come discover it, live it, and let it inspire you. Rwanda awaits warm, welcoming, and unforgettable', 'SCTN_1745087968_6803ede0072ae.jpeg', '2025-04-19 14:30:22', '2025-04-19 18:39:28'),
(7, 4, 1, 'Why Invest in Ever Retreat', 'Investing is quickly becoming a real alternative investment. By purchasing Ever Retreat, you\'re investing in something tangible, sustainable and beautiful that provides income, personal enjoyment, and the opportunity for capital growth. Not to mention exclusive and luxurious long term growth in Bountiful tourism and hospitality.', 'kigali5.jpg', '2025-04-19 14:30:50', '2025-04-19 18:46:06'),
(8, 4, 2, 'Our key locations', 'including Musanze with its majestic mountain gorillas, Nyungwe filled with rich biodiversity, and Nyanza, the heart of Rwandan culture, are primed for eco-tourism development. These regions offer opportunities to build eco-lodges, create wellness retreats, and support local artisans and businesses', 'musanze3.jpg', '2025-04-19 14:30:50', '2025-04-19 14:30:50'),
(9, 4, 3, 'How can you get involved?', 'You can get involved by directly contributing to the development of new homes, becoming part of our investment program, or ensuring the continuity of our work through patronage. Join us in creating homes that offer a premium real estate investment experience a chance to be part of something bigger, enduring and meaningful. Whether your participation is long-term or short, make a move today.', 'everretreat5.jpg', '2025-04-19 14:30:50', '2025-04-19 18:48:38'),
(10, 5, 1, 'How to invest in Ever Retreat', 'You can get involved by directly contributing to the development of these areas, partnering with us to co-develop projects, or investing in green energy, conservation, and community initiatives. At Ever Retreat, your investment is more than just financial it\'s a chance to be part of something bigger, shaping the future of eco-tourism and sustainability in Rwanda. Ready to make a lasting impact?', 'everretreat4.jpg', '2025-04-19 14:31:18', '2025-04-19 14:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `startingDate` varchar(100) NOT NULL,
  `roleid` int(9) DEFAULT 3,
  `photo` varchar(1000) NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `phone`, `email`, `password`, `username`, `address`, `status`, `startingDate`, `roleid`, `photo`, `created_at`) VALUES
(13, 'Emmy', 'NSENGIMANA', '07877756483', 'emmynsengi2020@gmail.com', '$2y$10$e04TKyX.M2QOvnjXJf9atueV0Wqe6Ox8oyiSwlF4pn5d4m4GixXc6', 'emmy', 'Nyanza, Gasoro', 'Pending', '2020-07-19', 2, 'profile.png', '2025-01-30 21:24:16'),
(14, 'Nteziryayo', 'Martin', '07832524929', 'martin@gmail.com', '$2y$10$3QyjR0eV4riu9yB9NaVJDu0X0Mu9PPLQeXFRYSEiQ9Voq74JfWfLy', 'martin', 'Kigali', 'Pending', '2020-05-12', 3, 'profile.png', '2025-01-30 23:42:16'),
(24, 'Byiringiro', 'Eric', '212121212', 'iradukundaericmbabazi@gmail.com', '$2y$10$HfCu46qGA.2K7TM4PfrJ0OF8/qxFMXhfL6blnWWK91ZzvDFZ9sqEK', 'eric', 'gikondo', 'Active', '2020-07-19', 1, 'profile.png', '2025-02-15 20:06:47'),
(26, 'MUKWAYA', 'Remy', '0787254815', 'info.abaremy@gmail.com', '$2y$10$dDwC1keyqxAiu.B.04p7KuBfbT9iuFfXhE75tlLLezKjAFKgdhPS2', 'remy', 'Muhanga', 'Active', '2025-08-18', 2, 'profile.png', '2025-02-25 22:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roleid` int(11) NOT NULL,
  `role_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`roleid`, `role_name`) VALUES
(1, 'SUPER ADMIN'),
(2, 'ADMIN'),
(3, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_hero`
--
ALTER TABLE `homepage_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium_features`
--
ALTER TABLE `premium_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `right_name` (`right_name`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleid` (`roleid`),
  ADD KEY `right_id` (`right_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_content`
--
ALTER TABLE `tourism_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_key` (`page_key`);

--
-- Indexes for table `tourism_features`
--
ALTER TABLE `tourism_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourism_section_id` (`tourism_section_id`);

--
-- Indexes for table `tourism_sections`
--
ALTER TABLE `tourism_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourism_content_id` (`tourism_content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `role_fk` (`roleid`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `homepage_hero`
--
ALTER TABLE `homepage_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `premium_features`
--
ALTER TABLE `premium_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role_rights`
--
ALTER TABLE `role_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourism_content`
--
ALTER TABLE `tourism_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tourism_features`
--
ALTER TABLE `tourism_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tourism_sections`
--
ALTER TABLE `tourism_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD CONSTRAINT `role_rights_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `user_roles` (`roleid`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_rights_ibfk_2` FOREIGN KEY (`right_id`) REFERENCES `rights` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tourism_features`
--
ALTER TABLE `tourism_features`
  ADD CONSTRAINT `tourism_features_ibfk_1` FOREIGN KEY (`tourism_section_id`) REFERENCES `tourism_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tourism_sections`
--
ALTER TABLE `tourism_sections`
  ADD CONSTRAINT `tourism_sections_ibfk_1` FOREIGN KEY (`tourism_content_id`) REFERENCES `tourism_content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `user_roles` (`roleid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
