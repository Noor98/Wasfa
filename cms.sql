-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 05:52 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `status`, `isdelete`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'نور سليم أبو حصيرة', 'noor@gmail.com', 1, 0, 1, 0, 1, NULL, '2019-11-08 18:58:45'),
(5, 'لميس', 'lamees@gmail.com', 1, 0, 1, 1, 1, '2019-11-08 18:55:57', '2021-07-25 09:48:50'),
(6, 'محمد', 'moh@gmail.com', 1, 0, 3, 1, NULL, '2019-11-08 18:56:58', '2019-11-08 18:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_link`
--

CREATE TABLE `admin_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_link`
--

INSERT INTO `admin_link` (`id`, `admin_id`, `link_id`, `created_at`, `updated_at`) VALUES
(12, 2, 1, '2018-08-03 21:00:00', NULL),
(13, 2, 4, '2018-08-03 21:00:00', NULL),
(14, 2, 5, '2018-08-03 21:00:00', NULL),
(15, 2, 6, '2018-08-03 21:00:00', NULL),
(16, 2, 7, '2018-08-03 21:00:00', NULL),
(17, 2, 8, '2018-08-03 21:00:00', NULL),
(86, 1, 1, '2020-02-07 22:00:00', NULL),
(87, 1, 2, '2020-02-07 22:00:00', NULL),
(88, 1, 3, '2020-02-07 22:00:00', NULL),
(89, 1, 4, '2020-02-07 22:00:00', NULL),
(90, 1, 5, '2020-02-07 22:00:00', NULL),
(91, 1, 9, '2020-02-07 22:00:00', NULL),
(92, 1, 10, '2020-02-07 22:00:00', NULL),
(93, 1, 11, '2020-02-07 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowcomment` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `summary`, `details`, `publish_date`, `category_id`, `image`, `allowcomment`, `status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'جمبرى بالكريمة والكارى', 'المقادير\r\n\r\n250 x جرام جمبرى (وسط ومقشر)\r\n1 x معلقة صغيرة كارى أصفر\r\n1 x عدد بصلة مفرومة\r\n1 x رشة فلفل اسود مطحون (أو حسب الرغبة)\r\n1 x معلقة كبيرة زبدة\r\n1 x معلقة كبيرة زيت زيتون\r\n1 x رشة ملح (أو حسب الرغبة)\r\n1 x كوب كريمة لبّاني\r\n1 x معلقة كبيرة بقدونس طازج (مفروم)', 'الخطوات:\r\n\r\n1- في إناء على النار نذوب الزبدة مع معلقة زيت الزيتون.\r\n2- نشوح البصل مع رشة ملح حتى يذبل.\r\n3- نضيف الجمبري ونشوحه حتى يأخذ اللون الوردي.\r\n4- نضيف الكريمة والملح والفلفل والكاري ونقلب.\r\n5- ندع المزيج يغلي خمس دقائق، ثم نرفعه من على النار.\r\n6- يغرف فى طبق التقديم ويزين بالبقدونس المفروم ويقدم بالهنا والشفا.', '2019-11-07 00:00:00', 1, '0GIZVx7MODkalGMNOwcFo1zVlnnqaQ1uLnCx3EAs.jpeg', 1, 1, 0, 1, 1, '2019-11-08 18:12:35', '2019-12-12 09:36:40'),
(2, 'كفتة داود باشا بدبس الرمان', 'المقادير:\r\n\r\n2 x معلقة كبيرة دبس الرمان\r\n1 x عدد بصلة مفرومة\r\n1 x معلقة كبيرة زيت عباد شمس\r\n1 x عدد رغيف عيش فينو (منقوع فى ربع كوب لبن)\r\n1 x معلقة كبيرة زبدة\r\n1 x معلقة كبيرة صلصة طماطم\r\n1 x رشة بابريكا\r\n1 x معلقة كبيرة خل\r\n1 x رشة بصل (بودرة)\r\n1 x رشة جنزبيل\r\n1 x رشة بودرة ثوم\r\n1 x رشة بهارات لحمة\r\n1 x رشة جوزة الطيب\r\n1 x كوب عصير طماطم\r\n½ x كيلو لحمة مفرومة\r\n½ x معلقة صغيرة ملح (أو حسب الرغبة)\r\n½ x معلقة صغيرة فلفل اسود مطحون (أو حسب الرغبة)\r\n¼ x كوب دقيق', 'الخطوات:\r\n\r\n1- هنتبل اللحمه بالبصل والتوابل نضيف الفينو المنقوع بس اهم حاجه نصفيه كويس جدا من اللبن.\r\n2- هندخل اللحمه على الاقل ساعه فى التلاجه حتى تمسك نفسها شويه ومتفكش وبعد كده نضيف دبس الرمان و نسيبها 10 دقايق.\r\n3- ثم تشكل اللحم على هيئة كرات متوسطة الحجم ثم ينثر عليها القليل من الدقيق.\r\n4- ثم فى طاسة على النار نضع معلقة من الزبد ومعلقة من الزيت ونضيف كرات الكفتة ونقلب كى تتحمر.\r\n5- ثم نحضر الصوص فى وعاء نحمر الثوم مع معلقة من الزبد حتى يصبح لونة ذهبى اللون ثم نضيف معلقة من الخل.\r\n6- ثم نضيف عصير الطماطم والتوابل والصلصة ونتركها على النار حتى يسمك قوامها ثم نضيف الكفتة ونتركها خمس دقائق ثم ترفع من على النار تقدم مع أرز أبيض وسلطة بالهنا والشفا.', '2019-11-07 00:00:00', 2, 'pbxw2C4pN7tQgj9ZPAlCH8E4d5lbu1PZCVitHkxB.jpeg', 1, 1, 0, 1, 1, '2019-11-08 18:21:56', '2019-12-12 09:36:57'),
(3, 'تشيز كيك التوت', 'المقادير:\r\n\r\n2 x معلقة كبيرة زبدة (بدرجة حرارة الغرفة)\r\n1 x باكو بسكوت (سادة)\r\n1 x معلقة كبيرة جيلاتين بودر\r\n1 x علبة حليب مكثف (محلى)\r\n1 x علبة جبنة كريمي\r\n1 x كيس كريم شانتى\r\n1 x كوب صوص (التوت)', 'الخطوات:\r\n\r\n1- نحضر صينيه سهله الفتح او صينيه عاديه ونضع فيها بلاستيك راب.\r\n2- نطحن البسكوت في الكبه ونضيف له الزبده السائله حتي يصبح البسكوت مندي (مثل رمل البحر).\r\n3- نفرد البسكوت في الصينيه وندخلها الفريزر ثم نحضر طبقه الكريمه.\r\n4- نخلط اللبن المكثف المحلي مع الكريم شانتيه المحضر مسبقا مع الجبنه الكريمي ونقلب ثم نضيف ملعقه الجيلاتين المذوبه في قليل من الماء المغلي.\r\n5- نضع هذه الطبقه علي طبقه البسكوت ثم ندخلها الثلاجه لمده لا تقل عن 4 ساعات ثم نضع عليها صوص التوت وتقدم.', '2019-11-07 00:00:00', 6, 'AX0ADz7kcwGibHli6EWBvnM4wZShhhVBQPh6QbkY.jpeg', 1, 1, 0, 1, 1, '2019-11-08 18:24:23', '2019-12-12 09:37:12'),
(4, 'كيك التوت الأحمر', 'المقادير:\r\n\r\n600 x جرام توت (أحمر)\r\n2 x كوب دقيق\r\n2 x معلقة صغيرة باكينج بودر\r\n2 x معلقة كبيرة سكر بودرة\r\n1 ¼ x كوب سكر\r\n1 x كوب لبن كامل الدسم\r\n1 x كوب كريم شانتى\r\n1 x معلقة صغيرة فانيليا\r\n1 x عدد بيضة (طازجة)\r\n1 x رشة ملح\r\n1 x عدد قشر ليمون (مبشور)\r\n1 x معلقة كبيرة مربى\r\n½ x كوب زبدة (بدرجة حرارة الغرفة)', 'الخطوات:\r\n\r\n1- فى وعاء عميق نضع السكر والزبد ونخفق حتى يتجانسوا.\r\n2- ثم نضيف البيضة والفانيليا وبشر الليمون ونخفق جيدا.\r\n3- ثم نضيف اللبن ونخفق.\r\n4- فى وعاء اخر نخلط الدقيق والباكينج بودر ورشة الملح جيدا.\r\n5- ثم نضيف خليط الدقيق لخليط الزبد بالتدريج مع الخفق المستمر حتى نحصل على قوام متجانس.\r\n6- نحضر 2 صينية متساوية المقاس وتدهن بالزبد وتبطن بورق الزبد.\r\n7- ثم نوزع العجين على الصوانى.\r\n8- ثم نوزع نصف كمية التوت ويرش سكر البودرة على وجة الكيك.\r\n9- نضع الصوانى فى الفرن عند درجة حرارة 180 لمدة 20 دقيقة أو لحين أن تنضج.\r\n10- فى وعاء عميق نخلط الكريم شانتية مع المربى والنصف الاخر من التوت.\r\n11- يترك الكيك حتى يبرد تماما ثم نضع واحدة من الكيك فى طبق التقديم ثم يوزع فوقها الكريم شانتية مع التوت ثم نضع الكيك الاخرى فوقها وتقدم بالهناو الشفا.', '2019-11-07 00:00:00', 6, 'k9hOJmwDLJ2glNpUWkyUUx8lA7ppOhvVI4URUil2.jpeg', 1, 1, 0, 1, 1, '2019-11-08 18:26:38', '2019-12-12 09:37:31'),
(5, 'السمبوسك البرازيلي', 'المقادير:\r\n\r\n3 x كوب لبن كامل الدسم\r\n3 x كوب دقيق\r\n1 x كيلو لحمة مفرومة\r\n1 x كوب زيتون اسود (مقطع صغير)\r\n1 x معلقة صغيرة سكر\r\n1 x عدد بصلة (صغيرة)\r\n1 x معلقة كبيرة خل\r\n1 x معلقة كبيرة زيت ذرة\r\n1 x عدد بيضة\r\n1 x معلقة كبيرة زبدة\r\n1 x عدد فلفل أخضر حلو (مفروم)\r\n1 x معلقة صغيرة باكينج بودر\r\n1 x معلقة صغيرة ملح', 'الخطوات:\r\n\r\n1- نقوم بتحضير العجين نحضر وعاء عميق ونخلط فيه الدقيق والباكينج بودر والسكر والملح، ثم نقوم بعمل حفرة في الدقيق ونسكب فيها الحليب والبيض والزيت والزبدة ونخلط جيداً.\r\n2- نقوم بفرد العجين بالنشابه حتى تصبح رفيعة و نقطعها على هيئة دوائر.\r\n3- نقوم بتحضير الحشو نحضر طاسة ونضع الزيت ونضيف البصل ونقلب لمدة دقيقتين ثم نضيف اللحمة المفرومة ثم يغطى الخليط ويترك على نار هادئة حتى تستوي، ثم يضاف الفلفل المفروم والزيتون.\r\n4- نأخذ دائرة من العجين ونضع فيها جزء من الحشو ونغلقها على شكل هلال ونغلق الحروف بشوكة، ثم نجهز الطاسه للقلي، ونقلي السمبوسك ينشل على ورق ماص للمادة الدهنية ثم يقدم بالهنا والشفا.', '2019-11-07 00:00:00', 3, 'C8fQEswh0XFRN10uj4V3NHBluS5LZVtderOiXWx7.jpeg', 1, 1, 0, 1, 1, '2019-11-08 18:29:28', '2019-12-12 09:37:50'),
(6, 'بيتزا باللحمة المفرومة', 'المقادير:\r\n\r\n2 x معلقة كبيرة لبن بودرة\r\n2 x عدد فص ثوم (مفروم)\r\n1 x كوب زيت ذرة\r\n1 x كيلو لحمة مفرومة\r\n1 x كوب صلصة طماطم (حسب الرغبة)\r\n1 x كوب زيتون اسود (مقطع حلقات)\r\n1 x كوب جبنة شيدر (مبشورة)\r\n1 x كوب دقيق\r\n1 x عدد طماطم (مقطعة)\r\n1 x كوب ماء (حسب الحاجة)\r\n1 x معلقة كبيرة خميرة\r\n1 x معلقة صغيرة ملح (حسب الرغبة)\r\n1 x عدد فلفل أخضر حلو\r\n1 x معلقة صغيرة فلفل اسود مطحون\r\n1 x عدد بصلة مفرومة', 'الخطوات:\r\n\r\n1- نقوم بتذويب الخميرة والسكر في ماء دافيء، ثم نخلط الدقيق بالخميرة وقليل من الملح والزيت واللبن ونعجن جيداً بحيث تكون العجينة رخوة قليلاً، ونغطي العجينة ونتركها جانباً.\r\n2- نحضر طاسة ونضع قليل من الزيت ونضع اللحمة المفرومة ونضيف البصل والثوم وقليل من الملح والفلفل الإسود ونقلب قليلاً حتى تحمر ونضيف قليل من الصلصة والماء ثم نتركة يتشرب الخليط قليلاً.\r\n3- نحضر صينية وندهنها بالزيت، ثم نحضر العجينة ونفردها حتى تصبح متساوية ونضعها في الصينية ونضع فوقها خليط اللحمة المفرومة ونضيف الطماطم والفلفل والزيتون والجبنة الشيدر، ندخل الصينية الفرن لمدة 10 دقائق وتقدم.', '2019-11-07 00:00:00', 3, 'Gmcsu6tVdxGAVzSKYdY97VFsKBnC9aJkM4HMyPYV.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:32:57', '2019-11-08 18:32:57'),
(7, 'ستيك السلمون المشوى', 'المقادير:\r\n\r\n4 x معلقة كبيرة عصير ليمون\r\n3 x عدد فص ثوم مهروس\r\n2 x معلقة كبيرة صويا صوص\r\n2 x معلقة صغيرة بودرة ثوم\r\n2 x قطعة سالمون (ستيك)\r\n2 x معلقة صغيرة بصل (بودرة)\r\n1 x معلقة صغيرة سماق\r\n1 x معلقة صغيرة جنزبيل\r\n1 x معلقة صغيرة سكر بنى\r\n½ x معلقة صغيرة فلفل اسود مطحون (أو حسب الرغبة)\r\n½ x معلقة صغيرة ملح (أو حسب الرغبة)\r\n¼ x كوب عصير برتقال', 'الخطوات:\r\n\r\n1- فى وعاء عميق نضع جميع المكونات عدا السلمون ونخلطهم جيدا حتى يتجانسوا.\r\n2- نغمس قطع السلمون فى التتبيلة وتغطى ونتركها لمدة ساعتين فى الثلاجة.\r\n3- فى طاسة غير قابلة للإلتصاق أو جريل مدهونة بالزيت وساخنة نضع قطع السلمون وتترك مدة خمس دقائق ثم تقلب وتترك على الجانب الاخر مدة دقيقتين.\r\n4- تقدم ساخنة مع خضر مشوية بالهنا والشفا.', '2019-11-07 00:00:00', 1, 'GKW3grdzXqI6ftQUxuJTsT1HPnN4euB46YPVy6Rc.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:35:10', '2019-11-08 18:35:10'),
(8, 'ستيك اللحم المشوي', 'المقادير:\r\n\r\n2 x معلقة صغيرة ملح\r\n2 x معلقة كبيرة بقدونس طازج (مفروم)\r\n2 x عدد لحمة (ستيك)\r\n1 x معلقة كبيرة زبدة\r\n1 x معلقة صغيرة فلفل اسود مطحون\r\n1 x معلقة صغيرة جنزبيل\r\n1 x معلقة صغيرة زعتر', 'الخطوات:\r\n\r\n1- هنتبل اللحمة بالملح و الفلفل و الزعتر و الجنزبيل و نضعها على الشواية حتى تنضج .\r\n2- و بعد النضج هندهنها بالزبدة السايحة وتقدم في طبق مفروش بالبقدونس بألف هنا .', '2019-11-07 00:00:00', 2, '24fbGE6ZWDuEeshdFgFJS9cTURqPaeohZuqtGFit.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:39:02', '2019-11-08 18:39:02'),
(9, 'قطع الدجاج المقلية', 'المقادير:\r\n\r\n2 x عدد بيضة\r\n1 ½ x كوب بقسماط مطحون\r\n1 ½ x كوب دقيق\r\n1 x معلقة صغيرة بودرة ثوم\r\n1 x معلقة صغيرة بصل (بودر)\r\n1 x عدد دجاج (كاملة)\r\n½ x معلقة صغيرة زعتر مجفف\r\n½ x معلقة صغيرة ريحان', 'الخطوات:\r\n\r\n1- هنسلق الفرخة فى ماء لمدة 20 دقيقة.\r\n2- فى بولة هنضرب البيض كويس ونضيف عليه نصف معلقة ملح وربع معلقة فلفل اسود مطحون وبودرة الثوم وبودرة البصل وربع معلقة زعتر وربع معلقة ريحان ونقلب كويس.\r\n3- هنقطع الفرخة ل 8 أجزاء وهنغمرها فى الدقيق كويس وبعدين فى البيض وبعدين نحطها فى البقسماط وباستخدام معلقة نغطيها بالبقسماط كويس.\r\n4- هندخل الدجاج الثلاجة حوالى نصف ساعة علشان الخلطة تمسك كويس.\r\n5- هنقلى قطع الدجاج فى زيت غزير ساخن لحد ما تتحول للون الذهبى.. بالهنا والشفا.', '2019-11-07 00:00:00', 4, 'VE8rksEdbLBkM7Mjlgukzqi96VWKo6FebQDig13q.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:43:23', '2019-11-08 18:43:23'),
(10, 'صدور الدجاج مع صوص الليمون', 'المقادير:\r\n\r\n4 x معلقة كبيرة زبدة\r\n3 x معلقة كبيرة بصل (مفروم ناعم)\r\n2 x معلقة صغيرة نشا (مذوبة فى معلقتين من الماء)\r\n2 x معلقة كبيرة دبس الرمان\r\n1 x معلقة صغيرة ملح (أو حسب الرغبة)\r\n1 x معلقة صغيرة قشر ليمون\r\n½ x كوب عصير ليمون\r\n½ x معلقة صغيرة فلفل اسود مطحون (أو حسب الرغبة)\r\n½ x كيلو صدور دجاج مخلية\r\n½ x كوب الكبر\r\n½ x كوب حليب جوز الهند\r\n¼ x كوب خل', 'الخطوات:\r\n\r\n1- تغسل صدور الدجاج وتتبل بالملح والفلفل ودبس الرمان والخل وتغطى وتترك فى الثلاجة مدة ساعتين.\r\n2- تذوب الزبدة على النار ونضيف البصل ونقلب حتى يصفر لون.\r\n3- ثم نضيف عصير الليمون وحليب جوز الهند ومع التقليب المستمر.\r\n4- يتبل بالملح والفلفل الأسود ونضيف له النشا المذوبة ونقلب حتى يسمك الصوص.\r\n5- ثم نضيف الكابر ونقلب ثم يرفع من على النار.\r\n6- نضع الجريل على النار ونتركها حتى تسخن جيدا ثم نضيف قطع الدجاج وتشوى لمدة خمس دقائق على كل جانب.\r\n7- توضع قطع الدجاج فى طبق التقديم ويوزع فوقها صوص الليمون وتقدم بالهنا والشفا.', '2019-11-07 00:00:00', 4, 'g4S8qXGFDYU7NnJQ37VjDZ06iQP4gaAWoYxi9Py9.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:45:10', '2019-11-08 18:45:10'),
(11, 'السمان المشوي', 'المقادير:\r\n\r\n4 x عدد فص ثوم مهروس\r\n4 x عدد سمان (مغسول ومنظف جيدا)\r\n3 x معلقة كبيرة زبدة\r\n2 x عدد بصلة مفرومة\r\n1 x رشة جوزة الطيب (مبشورة)\r\n1 x معلقة صغيرة ملح\r\n1 x معلقة كبيرة عسل نحل\r\n1 x عدد عصير ليمون\r\n1 x معلقة صغيرة جنزبيل\r\n1 x معلقة صغيرة فلفل اسود مطحون\r\n1 x معلقة صغيرة قرفة', 'الخطوات:\r\n\r\n1- في وعاء تمزج جميع مقادير التتبيلة مع بعض , يدعك السمان جيدا بالتتبيلة المحضرة و ينقع من 4 ساعات لليلة كاملة\r\n2- قبل الشوي مباشرة يضاف مقدار 3 ملاعق كبيرة من الزبدة المذابة للتبيلة و يدعك السمان جيدا\r\n3- يشوى على نار هادئة ألى أن ينضج و يكتسب لونا ذهبيا.. بالهنا و الشفا', '2019-11-07 00:00:00', 4, 'rZQA3LZjruu8ONimPaKli3OsunMwdlmABQsukWuH.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:47:33', '2019-11-08 18:47:33'),
(12, 'عصير أفوكادو بالكاجو', 'المقادير:\r\n\r\n10 x عدد كاجو\r\n2 x معلقة كبيرة عسل نحل\r\n2 x معلقة كبيرة لبن بودرة\r\n1 ½ x كوب لبن كامل الدسم\r\n1 x عدد أفوكادو\r\n1 x رشة فانيليا', 'الخطوات:\r\n\r\n1- نقشر الافاكادو وتقطع.\r\n2- ثم نضع الافوكادو فى الخلاط مع باقى المكونات ونخلطهم جيدا لمدة دقيقتين حتى يتجانسوا.\r\n3- يصب فى أكواب التقديم ويقدم بارد بالهنا والشفا.', '2019-11-07 00:00:00', 5, '63oKKlkRdvgWxzfn6pjpdSFC8GD0zjB60NXFP6Qe.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:49:00', '2019-11-08 18:49:00'),
(13, 'قهوة مثلجة', 'المقادير:\r\n\r\n5 x مكعب ثلج\r\n2 x معلقة كبيرة قهوة (سريعة التحضير)\r\n2 x معلقة كبيرة سكر\r\n2 x قطرة فانيليا (سائلة)\r\n1 x كوب حليب كامل الدسم\r\n1 x رشة كاكاو (بودر)\r\n1 x معلقة صغيرة صوص الكراميل\r\n0.33 x كوب ماء (مغلى)\r\n0.33 x كوب حليب مركز', 'الخطوات:\r\n\r\n1- فى كوب كبير تذوب القوة والسكر ورشة الكاكاو فى الماء الساخن حتى تذوب تماما.\r\n2- نضيف مكعبات الثلج ونقلب جيدا لمدة دقيقة حتى يبرد الخليط.\r\n3- نضيف الحليب المركز والحليب كامل الدسم و الفانيليا ونقلب جيدا حتى تتجانس المكونات.\r\n4- فى خلاط يضرب الخليط مع بعض مكعبات الثلج ثم يصب فى أكواب التقديم ثم يزين الوجه بصوص الكراميل وتقدم.', '2019-11-07 00:00:00', 5, 'jlNI71s73rOLnf7DO6VjwEPKZ939etTwnGT9FjBI.jpeg', 1, 1, 0, 1, NULL, '2019-11-08 18:50:37', '2019-11-08 18:50:37'),
(14, 'AA', 'aaaaaaaa', 'aaaaaaaa', '2019-12-18 00:00:00', 3, '78799739_419972265624944_8719403220041990144_n.jpg', 1, 1, 1, 1, 1, '2019-12-18 12:01:06', '2019-12-18 12:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'المأكولات البحرية', 1, 0, 1, NULL, '2019-11-08 18:02:23', '2019-12-15 12:49:15'),
(2, 'اللحوم', 0, 0, 1, NULL, '2019-11-08 18:02:29', '2019-12-15 12:49:21'),
(3, 'المعجنات', 0, 0, 1, NULL, '2019-11-08 18:02:41', '2019-12-15 12:49:23'),
(4, 'الدجاج والطيور', 1, 0, 1, NULL, '2019-11-08 18:03:25', '2019-11-08 18:03:25'),
(5, 'المشروبات', 1, 0, 1, NULL, '2019-11-08 18:03:35', '2019-11-08 18:03:35'),
(6, 'الحلويات', 1, 0, 1, NULL, '2019-11-08 18:03:42', '2019-11-08 18:03:42'),
(7, 'سلطات', 1, 0, 1, NULL, '2019-11-08 18:05:01', '2019-11-08 18:05:01'),
(8, 'الخضراوات', 1, 0, 1, NULL, '2019-11-08 18:05:17', '2019-11-08 18:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `article_id`, `user_id`, `status`, `isdelete`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'شكرا على الوصفة الرائعة', 1, 1, 1, 0, NULL, '2019-11-08 19:36:36', '2019-11-08 19:36:36'),
(2, 'وصفة جميلة', 10, 2, 1, 0, NULL, '2019-11-08 19:37:23', '2019-11-08 19:37:23'),
(3, 'وصفة ممتازة', 2, 2, 1, 0, NULL, '2019-11-08 19:37:55', '2019-11-08 19:37:55'),
(4, 'عصير لذيذ *_^', 12, 3, 1, 0, NULL, '2019-11-08 19:38:51', '2019-11-08 19:38:51'),
(5, 'لذيذ', 12, 1, 1, 0, NULL, '2019-12-18 08:33:55', '2019-12-18 08:33:55'),
(6, 'nice', 11, 1, 1, 0, NULL, '2020-05-22 12:29:56', '2020-05-22 12:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `title`, `url`, `icon`, `parent_id`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'الوصفات', '#', 'fa fa-file', 0, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(2, 'تصنيفات الوصفات', '/admin/category', 'fa fa-list', 1, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(3, 'ادارة الوصفات', '/admin/article', 'fa fa-file', 1, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(4, 'اضافة وصفة جديدة', '/admin/article/create', 'fa fa-plus', 1, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(5, 'ادارة التعليقات', '/admin/comment', 'fa fa-comment', 1, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(9, 'المستخدمين', '#', 'fa fa-users', 0, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(10, 'ادارة المستخدمين', '/admin/admin', 'fa fa-list', 9, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05'),
(11, 'اضافة مستخدم جديد', '/admin/admin/create', 'fa fa-plus', 9, 1, '2018-07-28 13:43:05', '2018-07-28 13:43:05');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2018_07_22_133623_create_category_table', 1),
(13, '2018_07_22_133636_create_article_table', 1),
(14, '2018_07_22_133645_create_admin_table', 1),
(15, '2018_07_22_133654_create_comment_table', 1),
(16, '2018_07_22_133702_create_link_table', 1),
(17, '2018_07_22_133711_create_admin_link_table', 1),
(18, '2018_07_22_133738_create_slider_table', 1),
(19, '2018_07_29_125023_add_url_column_to_slider', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `summary`, `image`, `status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`, `url`) VALUES
(1, 'نور', '', 'eDNXbRr26WEO8b9yV2fWpXBAe7UB2fjfGyOWutdP.jpeg', 1, 1, 1, 1, '2019-10-31 12:18:35', '2019-11-01 17:32:06', NULL),
(2, 'first', '', 'NRWjCmbPuqNfELkinJAiXTL8g0g3CnenK9BlFa4Q.jpeg', 1, 0, 1, NULL, '2019-11-01 15:24:10', '2019-11-01 15:24:10', 'http://localhost/phpmyadmin/sql.php?server=1&db=cms&table=article&pos=0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'نور سليم أبو حصيرة', 'noor@gmail.com', '$2y$10$MUR53xUMCXJCDid2slov7.AN.II1V2oeGFzsSAyfvwm0XJ5hBMWvy', 'MGnSFZEPRQsH3oSpNEZIN9jDOg5XVdxCk3v672gy4SSaEiEQrg64XF7Iv6d8', NULL, '2019-11-08 18:58:45'),
(2, 'لميس روك', 'lamees@gmail.com', '$2y$10$H6my393LtGHx/XvTpCV4oeBq42tnwnAVV9UPNbeWlJwqS/EcrC.w.', 'P2yEspjWxk7V37ZUpLYdz0VPLikDluF7tqmgOQOLiqgLPt15qqilmQkquNl8', '2019-11-08 18:55:57', '2019-11-08 18:55:57'),
(3, 'محمد', 'moh@gmail.com', '$2y$10$moIVXRtz.thdvsWxOQYeo.ZHfCqecmhMNs1DDzk.5LMw56z6qurVq', 'b92d5i508Wjnt3wwfv3KF3eXP0ga7bBPlVEDVGAXX10fNfxVzdm09xzFM0Mz', '2019-11-08 18:56:58', '2019-11-08 18:56:58'),
(4, 'lamees', 'eslamsaleem2@gmail.com', '$2y$10$SSb9JIuBcLAWLI0xD0jdF.rp00MBwvRIpRJcrivTBp.9WW14k24ZS', '5lSZtegsPdHpY4LTrDvw9JExv1FXtpHUITYxgjitcMIAybGsfbrVvZkWu9YJ', '2019-12-18 08:32:45', '2019-12-18 08:32:45'),
(5, 'new', 'new@gmail.com', '$2y$10$US1AHISPWRJKWyugDNmO1.o8DHRXfpjDomiGatuC9A1TdfJMs34DW', NULL, '2021-07-25 10:32:49', '2021-07-25 10:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_link`
--
ALTER TABLE `admin_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_link`
--
ALTER TABLE `admin_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
