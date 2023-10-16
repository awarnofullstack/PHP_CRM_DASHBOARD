-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 05:43 PM
-- Server version: 5.7.39
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taassur_clinque`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `status`) VALUES
(1, 'Dynamic banner heading put by db.', 'dynamic content manage by admin stored in DB.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `logo` text NOT NULL,
  `banner` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `logo`, `banner`, `date`, `status`) VALUES
(4, 'yey4555', '', 'uploads/1652126918blog-detail.jpg', 'uploads/2022-August-16-09-00-1902022-June-18-10-03-000logo.png', '2022-05-10 01:38:38', 1),
(5, 'Blogs 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque provident deleniti culpa nisi dolore odio eveniet ratione molestias, sint incidunt.', 'uploads/1652127005blog-img.png', 'uploads/1652126918certification.png', '2022-05-10 01:38:38', 1),
(6, 'Blogs 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque provident deleniti culpa nisi dolore odio eveniet ratione molestias, sint incidunt.', 'uploads/1652127054dlee.png', 'uploads/1652126918certification.png', '2022-05-10 01:38:38', 1),
(7, 'Blogs 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque provident deleniti culpa nisi dolore odio eveniet ratione molestias, sint incidunt.', 'uploads/1652126918blog-detail.jpg', 'uploads/1652126918certification.png', '2022-05-10 01:38:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `logo` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `logo`, `link`) VALUES
(3, 'Cafe Beernation', 'uploads/2022-August-16-03-38-000Logo_Cafe.png', 'cafe-beernation.php'),
(4, 'Clinque', 'uploads/2022-August-16-03-38-480Logo_Clinque.png', '/'),
(5, 'Club 1000', 'uploads/2022-August-20-11-49-260IMG-20220817-WA0023.jpg', '1000cafe.php'),
(6, 'Rang Utsav', 'uploads/2022-August-19-08-05-110Logo_Rang.png', 'Rang-utsav.php');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `logo`) VALUES
(1, 'easy bites', 'uploads/2022-August-17-09-18-220bite1.jpg'),
(2, 'big bites', 'uploads/2022-August-20-09-14-490bite5.jpg'),
(3, 'signature bebides', 'uploads/2022-August-20-09-25-050drink2.jpg'),
(5, 'easy bites', 'uploads/2022-August-20-09-12-010bite2.jpg'),
(6, 'easy bites', 'uploads/2022-August-20-09-12-300bite3.jpg'),
(7, 'easy bites', 'uploads/2022-August-20-09-13-200bite4.jpg'),
(8, 'big bites', 'uploads/2022-August-20-09-15-220big-bite1.jpg'),
(9, 'big bites', 'uploads/2022-August-20-09-16-080big-bite2.jpg'),
(10, 'big bites', 'uploads/2022-August-20-09-16-220big-bite3.jpg'),
(11, 'big bites', 'uploads/2022-August-20-09-16-410bite6.jpg'),
(12, 'signature bebides', 'uploads/2022-August-20-09-24-250drink1.jpg'),
(13, 'signature bebides', 'uploads/2022-August-20-09-25-210drink3.jpg'),
(14, 'signature bebides', 'uploads/2022-August-20-09-25-340drink6.jpg'),
(15, 'casual drinks', 'uploads/2022-August-20-09-26-130drink4.jpg'),
(16, 'casual drinks', 'uploads/2022-August-20-09-26-290drink5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `type`, `name`) VALUES
(1, 'Paints & More', 'goods', 'class 2'),
(2, 'Cosmetics and Cleaning Substance', 'services', 'class 3');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `logo` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `status`) VALUES
(3, 'fb', 'uploads/1652129845Facebook.png', 1),
(4, 'amz', 'uploads/1652129859Amazon.png', 1),
(5, 'asus', 'uploads/1652129874Asus.png', 1),
(6, 'brand', 'uploads/1652129884Google.png', 1),
(7, 'lenevo', 'uploads/1652129971xiaomi.png', 1),
(8, 'xiaomi', 'uploads/1652129986lenovo.png', 1),
(9, 'amazone', 'uploads/1652130071Amazon.png', 1),
(10, 'netflix', 'uploads/1652130377Netfliz.png', 1),
(11, 'certificate', 'uploads/1652130454certification.png', 1),
(12, 'brand', 'uploads/1652132891Asus.png', 1),
(13, 'brand alt', 'uploads/1652132934samsung.png', 1),
(14, 'samsung', 'uploads/1652130560samsung.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `description`) VALUES
(10, 'aa', 'a@gmail.com', '1212121212', 'asa'),
(11, 'Joel McLellan', 'mclellanjoel69@gmail.com', '9831523806', 'Hello,\r\n \r\nHow are you? Hope you are fine.\r\n \r\nI have been checking your website quite often. It has seen that the main keywords are still not in top 10 rank. You know things of working; I mean the procedure of working has changed a lot.\r\n \r\nSo I would like to have opportunity to work for you and this time we will bring the keywords to the top 10 spot with guaranteed period.\r\n \r\nThere is no wondering that it is possible now cause, I have found out that there are few things need to be done for better performances (Some we Discuss ,in this email). Let me tell you some of them -\r\n \r\n1. Title Tag Optimization\r\n2. Meta Tag Optimization (Description, keyword and etc)\r\n3. Heading Tags Optimization\r\n4. Targeted keywords are not placed into tags\r\n5. Alt / Image tags Optimization\r\n6. Google Publisher is missing\r\n7. Custom 404 Page is missing\r\n8. The Products are not following Structured markup data\r\n9. Website Speed Development (Both Mobile and Desktop )\r\n10.Off –Page SEO work\r\n \r\nLots are pending……………..\r\n \r\nYou can see these are the things that need to be done properly to make the keywords others to get into the top 10 spot in Google Search & your sales Increase.\r\n \r\n \r\nSir/ Madam, please give us a chance to fix these errors and we will give you rank on these keywords.\r\n \r\nPlease let me know if you encounter any problems or if there is anything you need. If this email has reached you by mistake or if you do not wish to take advantage of this advertising opportunity, please accept my apology for any inconvenience caused and rest assured that you will not be contacted again.\r\n \r\nMany thanks for your time and consideration,\r\n \r\nLooking forward\r\n \r\nRegards\r\n\r\nJoel McLellan\r\n\r\nIf you did not wish to receive this, please reply with \"unsubscribe\" in the subject line.\r\n'),
(12, 'nishant', 'nishu12364@gmail.com', '7827430844', 'asdasda'),
(13, 'Shalini pandey', 'shalini2002pandey13@gmail.com', '9903918895', 'I wanted to inquire about reservations and also, if theres any upcoming event scheduled on 25th of september'),
(14, 'Ishank Verma ', 'ishuverma7979@gmail.com', '9711499995', 'Want to throw a quanti party '),
(15, 'Amit Verma', 'amitatiit@gmail.com', '8476604959', 'Looking for a quote for a birthday party on 28th Nov. 60-75 people '),
(16, 'Vishwajeet Kumar', 'vishdomm@gmail.com', '7979054151', 'I had a party at clinque last night and lost a Bluetooth headphone there it was costly. If it was found there then please contact me.'),
(17, 'Smita Khatri ', 'mesmitakhatri@gmail.com', '8882265800', 'I left my bag and there. I want it bag. Some important thing were in the bag.'),
(18, 'Vartika Chaudhary', 'vartika21chaudhary@gmail.com', '9555822393', 'looking for party place in garden galleria for 29th Dec with MG of 45 people. Please share your package details (with liquor)');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `banner` text NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `typeofevent` text NOT NULL,
  `eventschedule` text NOT NULL,
  `eventlocation` text NOT NULL,
  `shortdescription` text NOT NULL,
  `eventguide` text NOT NULL,
  `eventbanner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `typeofevent`, `eventschedule`, `eventlocation`, `shortdescription`, `eventguide`, `eventbanner`) VALUES
(9, 'So Rude Of Me', 'Stand up comedy', '10th August, Wednesday', 'A2-B, Gardens Galleria Mall, Sector 38A, Noida For Reservation: 8750970970; 8744077770', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui dicta minus molestiae vel beatae natus eveniet ratione temporibus aperiam harum alias officiis assumenda officia quibusdam deleniti eos cupiditate dolore doloribus!re recusandae. Rerum sed nulla eum vero expedita ex delectus voluptates rem at neque quos facere sequi unde optio aliquam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui dicta minus molestiae vel beatae natus eveniet ratione temporibus aperiam harum alias officiis assumenda officia quibusdam deleniti eos cupiditate dolore doloribus', 'uploads/2022-August-17-08-54-33010-aug-wed.png');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `active`, `date`) VALUES
(2, 'question one ?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident numquam magnam dicta illum consequatur id laudantium necessitatibus excepturi accusantium, in sit. Exercitationem repellendus deserunt nam? Et vitae ab voluptas sequi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident numquam magnam dicta illum consequatur id laudantium necessitatibus excepturi accusantium, in sit. Exercitationem repellendus deserunt nam? Et vitae ab voluptas sequi.', 1, '2022-05-10 00:56:03'),
(3, 'question 2 ?', 'kssndkfkklsdjfljsdlkfjasdfjasldkf', 1, '2022-05-10 01:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`) VALUES
(1, 'Hello, my name is Puneet Shrivastav', 'Ad dolore dignissimos asperiores dicta facere optio quod commodi nam tempore recusandae. Rerum sed nulla eum vero expedita ex delectus voluptates rem at neque quos facere sequi unde optio aliquam! rjrj');

-- --------------------------------------------------------

--
-- Table structure for table `franchise_table`
--

CREATE TABLE `franchise_table` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `femail` text NOT NULL,
  `fphone` text NOT NULL,
  `fbrand` text NOT NULL,
  `fbudget` text NOT NULL,
  `fbusinesslocation` text NOT NULL,
  `fdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchise_table`
--

INSERT INTO `franchise_table` (`id`, `fname`, `femail`, `fphone`, `fbrand`, `fbudget`, `fbusinesslocation`, `fdescription`) VALUES
(68, 'asa', 'asa@gmail.com', '1212121212', 'Cafe Beernation', '1 Crore to 2 Crore', '12', 'asas'),
(69, 'Nishant', 'Nishu123@gmail.com', '7503063585', 'Cafe Beernation', '1 Crore to 2 Crore', 'delhi', 'asdasdsd'),
(70, 'Shivam Shrivastava', 'shivamsrivastava7776@gmail.com', '1234567888', 'Clinque', '1 Crore to 2 Crore', 'hhgh', ''),
(71, 'priyanka ', 'priyanka.franchiseindia@gmail.com', '9999832431', 'Clinque', '1 Crore to 2 Crore', 'Delhi', 'Contact me ');

-- --------------------------------------------------------

--
-- Table structure for table `gimg`
--

CREATE TABLE `gimg` (
  `id` int(11) NOT NULL,
  `logo1` text COLLATE utf8_unicode_ci NOT NULL,
  `logo2` text COLLATE utf8_unicode_ci NOT NULL,
  `logo3` text COLLATE utf8_unicode_ci NOT NULL,
  `logo4` text COLLATE utf8_unicode_ci NOT NULL,
  `logo5` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gimg`
--

INSERT INTO `gimg` (`id`, `logo1`, `logo2`, `logo3`, `logo4`, `logo5`) VALUES
(3, 'uploads/2022-August-22-09-34-370image 3.png', 'uploads/2022-August-22-09-34-370image 2.png', 'uploads/2022-August-22-09-34-370image 1.png', 'uploads/2022-August-22-09-34-370image 4.png', 'uploads/2022-August-22-09-34-370image 5.png');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `description`, `date`, `status`) VALUES
(1, 'Get free search report for goods covered under class 2 for your brand name.', 'dynamic content manage by admin stored in DB.', '2022-05-09 18:06:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `dob` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `dob`, `phone`, `email`, `message`, `date`) VALUES
(3, 'abhi', '1999-03-04', '8767678776', '7678@mail.com', 'iuhkjhjkhkjh khkhkhjkhkj', '2022-05-10 04:42:05'),
(6, 'abhishek singh', '1998-03-29', '7232837223', 'abhishek@gmail.com', 'message testing', '2022-05-10 04:46:56'),
(7, 'vicky', '1999-08-20', '2392839823', 'vk83@gmail.com', 'testing message box', '2022-05-10 04:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `logo` text NOT NULL,
  `link` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `logo`, `link`, `content`) VALUES
(2, 'Noida gets a new party heaven', 'uploads/2022-August-16-03-02-060media01.png', 'media-detail.php', '..'),
(3, 'Launch Event of New Noida Lounge Clinque', 'uploads/2022-August-16-03-12-530media03.png', '.', '.'),
(4, 'Unwind yourself at Clinque', 'uploads/2022-August-16-03-13-420media02.png', '.', '.'),
(5, 'Noida gets a new party hub', 'uploads/2022-August-20-09-09-190media04.png', 'media-detail.php', 'Title Goes Here\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam nihil quibusdam voluptate harum velit qui expedita natus ullam nulla, quae voluptas architecto facere aliquam delectus commodi ad aspernatur dicta? Officia iusto obcaecati totam itaque tenetur? Quis quod quas corrupti debitis odit, autem vero at officia consequuntur. Eius labore, inventore error architecto animi, suscipit officiis cumque illo perspiciatis, quos dolor? Odit, facilis cumque, ut architecto harum quia voluptatibus, nam debitis eveniet voluptas dicta necessitatibus assumenda veritatis ex adipisci error saepe laudantium delectus maxime dolores velit natus porro! Vitae placeat dolorem corporis officiis animi soluta amet vel, quasi repudiandae error quos neque molestiae sed dolore laudantium doloribus, illum ut saepe magnam atque quae expedita explicabo quo inventore. Fugiat unde laborum pariatur quas? Rerum repellat alias ut reiciendis numquam voluptas ipsa ullam ipsam placeat officia magnam, cumque necessitatibus harum quas qui amet et nostrum natus quam? Culpa molestias reprehenderit magnam corrupti excepturi eligendi.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `logo`) VALUES
(2, 'menu', 'uploads/2022-August-26-08-42-050Food_Menu1.jpg'),
(3, 'menu', 'uploads/2022-August-26-08-42-130Food_Menu2.jpg'),
(4, 'menu', 'uploads/2022-August-26-08-42-260Food_Menu3.jpg'),
(5, 'menu', 'uploads/2022-August-26-08-42-350Food_Menu4.jpg'),
(6, 'menu', 'uploads/2022-August-26-08-43-030Food_Menu5.jpg'),
(7, 'menu', 'uploads/2022-August-26-08-43-300Food_Menu6.jpg'),
(8, 'menu', 'uploads/2022-August-26-08-43-420Food_Menu7.jpg'),
(9, 'menu', 'uploads/2022-August-26-08-43-530Food_Menu8.jpg'),
(10, 'bar menu', 'uploads/2022-August-26-08-44-560Bar_Menu1.jpg'),
(11, 'bar menu', 'uploads/2022-August-26-08-45-060Bar_Menu2.jpg'),
(12, 'bar menu', 'uploads/2022-August-26-08-45-130Bar_Menu3.jpg'),
(13, 'bar menu', 'uploads/2022-August-26-08-45-360Bar_Menu4.jpg'),
(14, 'bar menu', 'uploads/2022-August-26-08-45-480Bar_Menu5.jpg'),
(15, 'bar menu', 'uploads/2022-August-26-08-45-580Bar_Menu6.jpg'),
(16, 'bar menu', 'uploads/2022-August-26-08-46-070Bar_Menu7.jpg'),
(17, 'bar menu', 'uploads/2022-August-26-08-46-150Bar_Menu8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_table`
--

CREATE TABLE `reserve_table` (
  `id` int(11) NOT NULL,
  `customername` text NOT NULL,
  `customeremail` text NOT NULL,
  `customernumber` text NOT NULL,
  `customerdate` text NOT NULL,
  `customertime` text NOT NULL,
  `customerqty` text NOT NULL,
  `customeroutlet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_table`
--

INSERT INTO `reserve_table` (`id`, `customername`, `customeremail`, `customernumber`, `customerdate`, `customertime`, `customerqty`, `customeroutlet`) VALUES
(29, 'Nishant', 'nishu12364@gmail.com', '7503063585', '08-03-2022', '2:00 AM', '3', 'noida'),
(30, 'Priya Rastogi', 'r.priya@samsung.com', '9990809478', '09-06-2022', '12:30 PM', '6', 'noida'),
(31, 'Andrew Kallem', 'andrew.kallem@gmail.com', '9818879884', '11-05-2022', '6:30 PM', '2', 'noida'),
(32, 'Ayush Bhardwaj', 'mananshm90@gmail.com', '8171993737', '11-25-2022', '8:30 PM', '5', 'noida');

-- --------------------------------------------------------

--
-- Table structure for table `roadmap`
--

CREATE TABLE `roadmap` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `level_no` text NOT NULL,
  `sr_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roadmap`
--

INSERT INTO `roadmap` (`id`, `title`, `level_no`, `sr_no`) VALUES
(1, 'Brand Name Search', '1', '1'),
(2, 'Available', '2', '1'),
(4, 'Not Available', '2', '2'),
(5, 'Filling of Trademark', '3', '1'),
(6, 'Objected', '4', '1'),
(7, 'Reply Filling', '5', '1'),
(8, 'No Reply', '5', '2'),
(9, 'Hearing', '6', '1'),
(10, 'Accepted & Advertise', '7', '1'),
(11, 'Refuse', '7', '2'),
(12, 'Register', '8', '1'),
(13, 'Opposed', '8', '2'),
(14, 'Counter Statement', '9', '1'),
(15, 'No Reply', '9', '2'),
(16, 'Evidence Fillings (Rule 45,46,47)', '10', '1'),
(17, 'Abandoned', '10', '2'),
(18, 'Court Hearings', '11', '1'),
(19, 'Registered', '12', '1'),
(20, 'Refuse', '12', '2');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `steps` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `logo`, `steps`) VALUES
(5, 'uploads/2022-August-22-07-38-190Menu-Glance.png', '[\"Resplendent Repast\",\"Iconic Bites \",\"Classic Cocktails\",\"Clinque LIITS\",\"Single Malts\"]');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `content`) VALUES
(3, 'Food by Karan', 'I was in Noida, so decided to visit this newly opened bar &amp; lounge. It has beautiful and soothing ambience. Presentation of food and drinks was top notch. We ordered and it was yummy especially Italian dishes &amp; also the Indian main course. It’s one the place that would leave you awestruck by its beautiful decor. Do check it this place. Highly recommended by me.'),
(4, 'Harshita Sharma', 'I recently visited this amazing cafe with my friends. The ambience was huge and beautiful, food was so good and the service was quick. Everything was so good in taste. We ordered momos, pizza and some drinks. It was so fresh and delicious. Looking forward to visit again.'),
(5, 'Rinku Babbar', 'Noida has a gem in terms of fine dining. I visited this place recently. I instantly loved the vibe of this place. It has a beautiful ambience. The lights are just magical. The food served is nicely presented. The service is upto mark. The mock tails are superb. I had a great experience.'),
(6, 'Saloni Sandiliya', 'It&#039;s an awesome place for beverages and food. One can hangout with friends on weekends to enjoy delicacies. ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`) VALUES
(1, 'admin', 'admin1234', 1),
(2, 'admin2', 'admin1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `title`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchise_table`
--
ALTER TABLE `franchise_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gimg`
--
ALTER TABLE `gimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_table`
--
ALTER TABLE `reserve_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `franchise_table`
--
ALTER TABLE `franchise_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `gimg`
--
ALTER TABLE `gimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reserve_table`
--
ALTER TABLE `reserve_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roadmap`
--
ALTER TABLE `roadmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
