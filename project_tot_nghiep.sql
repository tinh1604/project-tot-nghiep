-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 05:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project tot nghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `doanchinh`
--

CREATE TABLE IF NOT EXISTS `doanchinh` (
`STT` int(10) NOT NULL,
  `Ten sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ten tieng Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(10) NOT NULL,
  `Mieu ta` text COLLATE utf8_unicode_ci NOT NULL,
  `Thoi gian tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Trang thai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doanchinh`
--

INSERT INTO `doanchinh` (`STT`, `Ten sp`, `Ten tieng Anh`, `Hinh anh`, `Gia`, `Mieu ta`, `Thoi gian tao`, `Trang thai`) VALUES
(1, 'Bít tết bò Mỹ', 'American beef steak', '', 350000, 'Bò bít tết là món ăn sang trọng, đặc trưng của món ăn là miếng thịt bò to, mềm, khi thái ra vẫn còn màu hồng chín tái, với hương vị thơm ngon, thịt ngọt chấm với sốt tỏi hoặc nấm... Khi ăn nhâm nhi cùng chút salad hay khoai tây chiên, cảm giác thật là tuyệt!', '2019-07-20 12:44:11', '0'),
(2, '\r\nBò nướng phô mai', 'Grilled beef with cheese', '', 280000, 'Hương vị thơm bùi từ phô mai kết hợp với vị ngọt từ thịt bò nóng hổi mang đến cho bạn cảm giác béo ngậy thơm ngon tan ngọt trên đầu lưỡi tận đến cổ họng với hương vị đầm đà khó quên. Món thịt bò nướng phô mai sẽ là lựa chọn tuyệt vời cho bạn.', '2019-07-20 12:43:55', '0'),
(3, 'Bò lúc lắc khoai tây chiên', 'Beef shakes fries potato', '', 125000, 'Đĩa bò lúc lắc với miếng thịt bò vuông vắn chín mềm thơm phức, cùng rau củ với màu sắc tươi mới và không thể thiếu khoai tây chiên vàng rụm, thơm lừng hẳn sẽ làm xiêu lòng rất nhiều quý khách.', '2019-07-19 03:40:28', '0'),
(4, 'Lẩu gà', 'Chicken hotpot', '', 380000, 'Gà ta tươi chặt, nước hầm xương heo trong, thơm mùi thuốc bắc và nấm hương, vị vừa ăn. Bún và rau ăn kèm gồm ngải cứu, các loại nấm, thân chuối thái rối.', '2019-07-19 03:41:16', '0'),
(5, 'Cua nướng', 'Steamed / Grilled Crab', '', 500000, 'Cua biển nướng giữ được vị ngọt nguyên thủy được chế biến khi đang tươi, món chấm kèm gia vị muối tiêu chanh ớt.', '2019-07-19 03:41:58', '0'),
(6, 'Cá thu nướng muối ớt', 'Grilled mackerel with chilli & salt', '', 150000, 'Cá thu ngọt thịt, đậm đà thấm vị từ gia vị ướp kỹ lưỡng và mùi ớt hơi hăng hăng cay, cá nướng thơm đậm mùi mằn mặn của biển sẽ là thức ăn đưa cơm những ngày hè nóng', '2019-07-19 03:43:04', '0'),
(7, 'Bò hầm đặc biệt', 'Special beef stew', '', 275000, 'Đã từng mê mẩn với những món ngon từ bò như bò sốt vang, bò nướng lá lốt, … thì bạn không thể bỏ qua món thịt bò hầm hấp dẫn được. Những miếng thịt mềm như tan vào miệng, lại thơm hương đậm vị, không còn là ăn mà là “thưởng thức”', '2019-07-19 03:43:43', '0'),
(8, 'Gà hấp lá chanh', 'Steamed chicken with shredded lemon leaves (half)', '', 320000, 'Gà ta hấp lá chanh mát, thịt vừa chín, thơm mùi lá chanh.', '2019-07-19 03:44:22', '0'),
(9, 'Gà rang muối', 'Fried chicken with salt (half)', '', 320000, 'Gà ta rang muối bám đều, vị vừa ăn thơm mùi đặc trưng của nguyên liệu và sả, lá chanh rang giòn. Chấm kèm muối tiêu chanh ớt.', '2019-07-19 03:45:03', '0'),
(10, 'Cánh gà chiên tỏi', 'Fried chicken with salt (half)', '', 90000, 'Cánh gà chiên thấm vị, thơm mùi tỏi, ánh màu vàng óng hấp dẫn. Món chấm kèm tương ớt xì dầu và dưa chuột thái lát ăn kèm.', '2019-07-19 03:45:40', '0'),
(11, 'Chim sẻ quay', 'Roasted sparrows', '', 90000, 'Chim sẻ quay cả con ánh màu vàng cánh gián, gia vị vừa vặn, là món ăn bổ dưỡng cho cả hai phái.', '2019-07-19 03:46:11', '0'),
(12, '\r\nCơm chiên hoàng bò', 'Roasted rice with beef', '', 150000, 'Thưởng thức món cơm chiên thịt bò nóng hổi, hấp dẫn vào buổi sáng ngày lạnh thật thích hợp. Đây là món ăn chứa nhiều chất dinh dưỡng và có hàm lượng calo cao. Thịt bò chứa nhiều chất sắt, protein và vitamin làm tăng khả năng miễn dịch và cung cấp thêm một số chất cần thiết cho cơ thể', '2019-07-19 03:46:42', '0'),
(13, 'Bò Mỹ Nướng', 'Special grilled beef', '', 145000, 'Thịt bò Mỹ nướng với màu nâu vàng, hương vị hấp dẫn và nhiều chất dinh dưỡng. Ăn với bánh mì nướng thật tuyệt.', '2019-07-19 03:47:26', '0'),
(14, 'Cua rang muối', 'Vietnamese salted crab', '', 500000, 'Cua rang muối vị mặn ngọt, thịt cua săn chắc, màu vàng cam bắt mắt, thịt cua ngọt, cộng với mùi thơm và cay nồng của muối rang làm nên nét đặc trưng của món ăn.', '2019-07-19 03:48:02', '0'),
(15, 'Lẩu Bông Miền Tây', 'Western hotpot', '', 420000, 'Khi ăn, thực khách chỉ việc thả hải sản vào nồi lẩu sôi sùng sục cho chín, nhúng một ít rau vừa đủ, gắp miếng bún và chan miếng nước lẩu nóng hổi là đã có thể thưởng thức trọn vẹn hương vị món lẩu bông Miền Tây, từ đó thực khách sẽ cảm nhận được đủ đa vị với vị ngọt thơm của hải sản, vị đăng đắng của bông điên điển, vị bùi bùi của so đũa, chua chua từ me, đến cái sần sật của rau nhút hay hít hà vị cay của ớt…', '2019-07-19 03:48:33', '0'),
(16, 'Lẩu cá chình', 'Lamprey hotpot', '', 575000, 'Cá chình phi lê, nước lẩu màu hồng nhạt, dậy vị thơm đặc trưng của riềng, sả, gia vị lẩu thái Tomyum, vị chua ngọt vừa ăn, hơi cay. Rau ăn kèm theo mùa.', '2019-07-19 03:49:01', '0'),
(17, 'Lẩu hải sản chua cay', 'Sour & spicy seafood hotpot', '', 420000, 'Hải sản nhúng lẩu gồm tôm sú loại 50 con/kg, mực ống phi lê, cá lóc thái miếng, ngao vàng. Nước hầm xương nấu lẩu lên thành phẩm có màu hồng nhạt, dậy vị thơm đặc trưng của riềng, sả, gia vị lẩu thái Tomyum chua dịu và hơi cay, vị vừa ăn. Bún và rau theo mùa ăn kèm (cải thảo, cải chíp, cải cúc…)', '2019-07-19 03:49:54', '0'),
(18, '\r\nLẩu riêu cua bắp bò', 'Sour & spicy seafood hotpot', '', 380000, 'Bắp bò loại lõi hoa tươi thái lát mỏng. Nước lẩu hầm xương có màu đỏ bắt mắt từ cà chua, màu vàng sáng từ hành khô phi thơm, nước lẩu dậy vị chua dịu, quyện mùi thơm lừng của giấm bỗng và cua đồng xay nhuyễn, và những miếng đậu chiên vàng thấm đẫm hương vị của nước lẩu. Rau ăn kèm gồm hoa chuối, bắp và thân rau muống thái rối, hành chẻ, bánh đa và bún rối.', '2019-07-19 03:50:25', '0'),
(19, '\r\nMực nướng muối ớt', 'Grilled cuttle-fish with chilli & salt', '', 255000, 'Mực một nắng nguyên con to, dày mình, nướng xém cạnh vàng sáng, không khô, mùi, đặc trưng vị vừa ăn.', '2019-07-19 03:50:55', '0'),
(20, 'Mực một nắng chiên giòn', 'Crispy fried half-dried cuttle-fish', '', 255000, 'Mực một nắng là mực ống được chọn tỉ mỉ từ miền trung, đem đi chiên giòn. Vị ngọt của mực kết hợp với bột chiên bùi và xốp, thêm vào một chút cay cay của tương ớt; bữa ăn đầy đặn bởi sự kết hợp khéo léo với những món hải sản được chế biến vừa miệng: gỏi cuốn tôm thịt, hàu nướng mỡ hành, cơm chiên hải sản. Và khi đã hài lòng bởi hít hà – chẳng ai từ chối một cốc chè sương sa hạt lựu ngọt mát…', '2019-07-19 03:51:24', '0'),
(21, 'Bò hầm đặc biệt', 'Special beef stew', '', 255000, 'Đã từng mê mẩn với những món ngon từ bò như bò sốt vang, bò nướng lá lốt, … thì bạn không thể bỏ qua món thịt bò hầm hấp dẫn được. Những miếng thịt mềm như tan vào miệng, lại thơm hương đậm vị, không còn là ăn mà là “thưởng thức”', '2019-07-19 03:54:14', '0'),
(22, 'Cá lóc kho tiêu', 'Snakehead fish warehouses', '', 250000, 'Cá lóc kho tiêu ngấm đều gia vị thơm ngon rất hấp dẫn, cá màu vàng nhìn rất ngon, ăn với cơm trắng thì còn gì tuyệt vời hơn.', '2019-07-19 03:54:54', '0'),
(23, 'Bún gạo xào tôm thịt', 'Stir-fried dry rice noodles with pork & shrimps', '', 130000, 'Bún gạo sợi săn xào thơm, tôm và thịt thăn chín tới, mùi thơm đặc trưng.', '2019-07-19 03:55:27', '0'),
(24, '\r\nCá diêu hồng hấp xì dầu', 'Steamed red tilapia with soy sauce', '', 255000, 'Cá điêu hồng thịt ngọt dễ ăn, hợp với thời tiết nóng. Thịt cá mát, mềm thơm, béo ngậy quyện vị ướp vừa của xì dầu và hương cay nồng ấm bụng của gừng tươi.', '2019-07-19 03:56:19', '0'),
(25, 'Chim câu quay', 'Roasted pigeon', '', 165000, 'Chim câu được lựa là con to vừa, được tẩm ướp cầu kỳ trước khi đem lên quay đều, chim quay chín tới, thơm mùi đặc trưng, mang sắc vàng óng tự nhiên. Thơm mùi lá chanh', '2019-07-19 03:56:58', '0'),
(26, 'Cơm lam gà nướng', 'Bamboo cooked rice served with grilled chicken', '', 150000, 'Cơm lam là đặc sản của các dân tộc thiểu số phía Bắc và Tây Nguyên. Người vùng cao trước kia khi đi rừng thường phải tìm ra cách chế biến, nấu cơm sao cho thật tiện lợi, thích nghi với hoàn cảnh.', '2019-07-19 03:57:27', '0'),
(27, 'Gỏi xoài hải sản', 'Green mango salad with seafood', '', 138000, 'Xoài ương bóp thấu chua ngọt với nước gỏi để át bớt vị chua gắt của xoài, tôm bóc nõn, mực hấp sơ, đậu phộng rang thơm rắc lên trên cùng hành khô phi thơm. Bánh phồng tôm ăn kèm', '2019-07-19 03:59:08', '0'),
(28, 'Lẩu cá lăng măng chua', 'Sour green catfish hotpot with fresh bamboo shoot', '', 400000, 'Thơm mùi đặc trưng của cá lăng, có vị hơi chua dịu từ măng củ, nước lẩu màu hồng nhạt từ cà chua. Bún và rau ăn kèm theo mùa.', '2019-07-19 03:59:37', '0'),
(29, 'Lẩu cua bể', 'Crab hotpot', '', 550000, 'Cua bể nguyên con loại 700gr, nước lẩu chua ngọt, vị hơi cay dịu, nổi bật mùi thơm của hải sản cua bể, bún và rau tươi ăn kèm gồm cải thảo, cải chip, cải cúc, thân hoa chuối thái rối, giá tươi…', '2019-07-19 04:00:12', '0'),
(30, 'Miến xào lươn', 'Stir-fried vermicelli with eels', '', 100000, 'Miến xào sợi săn, lươn thơm mùi đặc trưng, vị vừa ăn', '2019-07-19 04:00:43', '0'),
(31, 'Mỳ xào hải sản', 'Stir-fried egg noodles with seafood & vegetables', '', 125000, 'Mì trứng xào sợi săn không nát, gia vị vừa ăn, tôm mực của quả đậm vị ngọt đặc trưng, không tanh. Có xì dầu ăn kèm.', '2019-07-19 04:01:17', '0'),
(32, 'Pizza tươi', 'Fresh pizza', '', 145000, 'Nguyên liệu làm nên chiếc pizza Ý hoàn toàn tươi mới và chỉ sử dụng trong ngày, không trữ trong tủ lạnh như pizza thường. Đế bánh được làm từ bột mỳ, nhồi thủ công bằng tay, ủ với men trong tủ mát chỉ khoảng 2 tiếng', '2019-07-19 04:36:42', '0'),
(33, 'Sò huyết nướng', 'Grilled blood cockles', '', 125000, 'Sò huyết tươi đều con nướng chín tới, không khô, có mùi thơm đặc trưng, vị vừa ăn.', '2019-07-19 04:37:29', '0'),
(34, 'Cá lóc hấp', 'Steamed snakehead fish served with rice papers', '', 255000, 'Cá hấp còn giữ nguyên được vị ngon, ngọt của thịt cá cùng các loại rau sống, chuối chát, dưa chuột, khế chua cuốn kèm bánh tráng và chấm nước mắm pha thơm.', '2019-07-19 04:38:05', '0'),
(35, 'Cá lăng nướng muối ớt', 'Grilled green catfish with chilli & salt', '', 160000, 'Cá lăng có thịt săn chắc, có vị thơm ngon hơn các loại cá khác, khi nướng vẫn giữ được màu vàng đều, giữ được vị ngọt và không bị khô, thấm gia vị được gia giảm kỹ lưỡng.', '2019-07-19 04:38:45', '0'),
(37, 'Nui xào bò', 'Stir-fried maccaroni with minced beef and tomato', '', 105000, 'Mì nui giữ được sợi nguyên không nát, quyện sốt bò băm cà chua vừa vặn.', '2019-07-19 04:41:55', '0'),
(38, 'Sườn nướng', 'Grilled pork ribs served with lemongrass & chill', '', 125000, 'Sườn chọn miếng sườn non đem nướng chín tới vàng màu cánh gián, dậy mùi thơm đặc trưng của sả, ớt, vị vừa ăn. Cay dịu.', '2019-07-19 04:42:48', '0'),
(39, 'Sườn nướng xả ớt', 'Grilled pork ribs served with lemongrass & chilli', '', 140000, 'Sườn chọn miếng sườn non đem nướng chín tới vàng màu cánh gián, dậy mùi thơm đặc trưng của sả, ớt, vị vừa ăn. Cay dịu.', '2019-07-19 04:44:54', '0'),
(40, 'Tôm hấp cuốn bánh tráng', 'Steamed shrimp rolled with thick rice papers, vegetables & herbs', '', 205000, 'Tôm hấp cuốn bánh tráng gồm tôm sú cuốn kèm bánh tráng và đồ cuốn gồm rau sống, chuối chát, khế chua, dưa chuột và chút bún. Chấm kèm mắm nêm tang vị đậm đà.', '2019-07-19 04:45:24', '0'),
(41, 'Tôm hấp nước dừa', 'Steamed shrimp in coconut', '', 205000, 'Hương thơm từ nước dừa cùng vị ngọt thanh tiết ra từ thịt tôm khiến tôm ăn đằm vị hơn và cùi dừa non ngọt béo, khiến ai chỉ nhìn thôi cũng cồn cào vị giác.', '2019-07-19 04:45:55', '0'),
(42, '\r\nTôm càng xanh nướng', 'Grilled giant freshwater prawn', '', 195000, 'Tôm càng xanh nhập đường bay từ miền sông nước, nướng mọi đến khi có màu vàng trên than hồng, chấm muối tiêu chanh ớt dậy mùi thơm và vị đạm ngọt thơm từ hải sản nướng.', '2019-07-19 04:46:25', '0'),
(43, 'Cơm tấm bì thịt nướng', 'Brocken rice served with barber - cued pork and shredded pork skin', '', 65000, 'Cơm chín dẻo, tơi cơm. Bì thơm rắc thính vừa vặn gia vị. Thịt nướng thơm chín vàng xém cạnh vừa vị.', '2019-07-19 04:46:54', '0'),
(44, '\r\nThịt chưng trứng vịt muối', 'Meat with eggs', '', 150000, 'Vị mặn thơm ngầy ngậy của trứng muối kết hợp với hương vị đậm đà của thịt, một chút hành băm và gia vị sẽ khiến bữa cơm của bạn hấp dẫn và ngon miệng hơn bao giờ hết.', '2019-07-19 04:47:21', '0'),
(45, 'Cá chình nướng riềng mẻ', 'Grilled lamprey marinated with galingale', '', 575000, 'Món ngon lạ miệng với hương của riềng thơm mà cay dịu, vị không quá gắt, mẻ vị chua nhưng không đậm át vị thơm thịt từ cá. Hai hương vị hòa lẫn vào nhau làm món ăn thêm phần đặc sắc và không gây cảm giác ngán.', '2019-07-20 10:57:13', '0'),
(46, 'uyurtyretyer', 'ưertwert', 'ẻtwer', 205000, 'xvxvzxcv', '2019-07-20 10:58:28', ''),
(47, 'dfgdfgsdfgd', '', '', 0, '', '2019-07-20 14:55:04', ''),
(48, 'gfhfdgsds', 'kjgldsajlsadf', '156363468365240648_390616488224386_5105120508823732224_n.jpg', 333, 'gghdffgsdfg', '2019-07-20 14:58:03', ''),
(49, 'gfhfdgsds', 'kjgldsajlsadf', '156363477665240648_390616488224386_5105120508823732224_n.jpg', 333, 'gghdffgsdfg', '2019-07-20 14:59:36', ''),
(50, 'gfhfdgsds', 'kjgldsajlsadf', '156363482165240648_390616488224386_5105120508823732224_n.jpg', 333, 'gghdffgsdfg', '2019-07-20 15:00:22', ''),
(51, 'gfhfdgsds', 'kjgldsajlsadf', '156363482965240648_390616488224386_5105120508823732224_n.jpg', 333, 'gghdffgsdfg', '2019-07-20 15:00:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `doansang`
--

CREATE TABLE IF NOT EXISTS `doansang` (
`STT` int(3) NOT NULL,
  `Ten sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ten tieng Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(10) NOT NULL,
  `Mieu ta` text COLLATE utf8_unicode_ci NOT NULL,
  `Thoi gian tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Trang thai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doansang`
--

INSERT INTO `doansang` (`STT`, `Ten sp`, `Ten tieng Anh`, `Hinh anh`, `Gia`, `Mieu ta`, `Thoi gian tao`, `Trang thai`) VALUES
(1, 'Bánh canh cua', 'Tapioca noodle soup with crab meat and pork', '', 60000, 'Sợi bánh canh làm từ bột năng hoặc bột gạo, to hơn sợi bún ngoài Bắc, màu trắng hơi trong trong, ăn dai hơn bún. Nước dùng bánh canh Quán Ăn Ngon cũng thường có dạng sền sệt, ngòn ngọt ninh từ thịt, cua ghẹ hải sản và một số phụ liệu khác, chứ không nhan nhát nhạt như nước dùng bún phở.\r\nCó khá nhiều loại bánh canh như bánh canh tôm, thịt lợn nhưng "ám ảnh" nhất vẫn là bánh canh cua. Con cua to, luộc chín, màu đỏ cam bắt mắt, cả cái càng chắc thịt ngự trên bát bánh canh nóng hổi, ăn kèm với thịt chân giò và chút ớt xanh, chanh tươi', '2019-07-20 12:44:35', ''),
(2, 'Bánh cuốn nhân tôm', 'Steamed rice pancake with shrimp and minced pork', '', 60000, 'Bánh cuốn nhân tôm là một trong những món bánh được rất nhiều người yêu thích bởi hương vị thơm ngon, dễ ăn, ăn nhiều mà không hề cảm thấy chán.', '2019-07-17 15:41:48', ''),
(3, 'Bò kho bánh mỳ', 'Braised beef bread', '', 55000, 'Thịt bò là món ăn bổ dưỡng với nhiều cách chế biến khác nhau trong đó có món bò kho bánh mì. Đây là món rất dễ ăn lại giàu dưỡng chất là một lựa chọn rất tuyệt vời cho bạn vào những dịp cuối tuần.', '2019-07-17 15:47:55', ''),
(4, 'Bún bò Huế', 'Beef noodle soup with pig leg in Hue style', '', 60000, 'Một tô bún bò đạt tiêu chuẩn gồm có: bún, thịt bắp bò, giò heo, rau thơm, sa tế, mắm ruốc,…Điều đặc biệt của món ăn này là nước lèo phải được nấu trong một nồi tròn bằng nhôm được gò bởi bàn tay khéo léo của người thợ.', '2019-07-17 15:48:41', ''),
(5, 'Bún bò Nam Bộ', 'Southern style sautéed beef with rice noodles', '', 60000, 'Bún bò Nam bộ, nghe cái tên cũng đủ biết nguồn gốc xuất xứ. Bún này còn được gọi là bún xào vì món bún này không giống như những loại bún nước khác mà là bún khô, là sự kết hợp giữa bún, rau sống, giá, thịt bò xào, đậu phộng rang, cà rốt đu đủ thái sợi, hành phi thơm,…sau đó thêm nước mắm ớt chua cay vào trộn đều.', '2019-07-17 15:49:36', ''),
(6, 'Bún dọc mùng chân giò', 'Pork-legs rice noodle soup with Vietnamese taro', '', 45000, 'Móng ninh mềm ngọt, hương thơm nhè nhẹ kèm chút hăng của hành cọng sắt mỏng, nước dùng trong, vị chua thanh mát.', '2019-07-17 15:50:22', ''),
(7, 'Bún mắm', 'Rice noodle soup with fermented fish, seafood and roasted pork', '', 55000, 'Bún mắm vốn được biến tấu của mắm kho, một trong những món ăn đặc trưng của miền Tây sông nước. Nước lèo của bún mắm được nấu từ cá linh hay cá sặc, vì vậy mà món ăn có mùi vị mằn mặn nồng đặc biệt nhưng không dễ thưởng thức với một vài người. Thành phần chính gồm cá linh, bông súng, tôm, mực,…và quan trọng nhất là rau đắng, thứ rau đặc biệt phổ biến ở miền Tây sông nước.', '2019-07-17 15:51:03', ''),
(8, 'Bún măng gà', 'Chicken & dry bamboo shoot rice noodle - soup or dipping sauce', '', 50000, 'Bún măng gà là món ăn ngon phù hợp với ngày hè oi bức. Vị ngọt của gà và măng khô hòa quyện với nhau làm cho món ăn trở nên hấp dẫn hơn.', '2019-07-17 15:51:47', ''),
(9, 'Bún nem nướng', 'Grilled pork balls served with rice noodles & fresh herbs', '', 60000, 'Là món ăn phổ biến ở các tỉnh miền Trung Việt Nam. Và tùy theo vùng miền mà nem nướng có cách làm, cách ăn cũng khác nhau. Bún ăn kèm nem nướng thơm, mỡ hành, rắc đậu phộng rang giã nhỏ, chan nước mắm dưa góp chua ngọt trộn đều.', '2019-07-17 15:52:33', ''),
(10, 'Bún ốc', 'Snail noodle soup or dipping sauce', '', 50000, 'Ốc nhồi lựa con loại to, nước dùng trong, màu đỏ nhạt của cà chua, thơm mùi ốc và hành phi, giấm bỗng, vị chua dịu. Món ăn kèm rau sống, tương ớt, mắm tôm.', '2019-07-17 15:53:42', ''),
(11, 'Bún riêu cua', 'Fresh water crab with rice noodle soup', '', 50000, 'Gạch cua đồng giã tay, nước dùng trong màu đỏ nhạt, thơm mùi giấm bỗng, đậm mùi cua, vị vừa, chua dịu. Món ăn kèm rau sống, tương ớt, một chút mắm tôm (để riêng tùy khẩu vị).', '2019-07-17 15:54:39', ''),
(12, 'Bún Thái', 'Thai noodles', '', 60000, 'Bún Thái là món ăn có nguồn gốc từ Thái Lan nhưng lại được nhiều bạn trẻ Việt Nam ưa chuộng vì có vị chua cua, cay cay cùng với mùi thơm đặc trưng dễ chịu.', '2019-07-17 15:55:15', ''),
(13, '\r\nHủ tiếu Nam Vang khô', 'Cambodia style rice vermicelli with pork,shrimp,pork-liver & quail egg (mixed)', '', 65000, 'Cũng là các nguyên liệu giống như một bát Hủ tiếu Nam Vang chan nước lèo, hủ tiếu Nam Vang khô để nguyên các nguyên liệu vô bát và bên cạnh đặt một bát nước dùng riêng cho người nào không thích chan nước. Khi ăn trộn đều. Thi thoảng hơi ngán có thể nhấp một vài thìa nước dùng để sẵn ngoài bát riêng có thả vài lát hành lá.', '2019-07-17 15:56:10', ''),
(14, 'Hủ tiếu Nam Vang', 'Cambodia style rice vermicelli soup with pork, shrimp, pork-liver & quail egg', '', 65000, 'Hủ tiếu Nam Vang, món ăn này có nguyên liệu chính là lòng heo cùng các phụ liệu khác là hủ tíu khô, nước lèo hầm từ xương heo, tôm, thịt, trứng cút, thịt heo băm,…', '2019-07-17 15:57:05', ''),
(15, 'Miến măng gà', 'Chicken & dry bamboo shoot vermicelli - soup or mixed', '', 55000, 'Măng có thể kết hợp vói nhiều loại thịt như thịt chân giò, thịt vịt, thịt gà để cho ra những món ăn ngon. Trong số đó phải kể đến món miến măng gà. Tô miến gà với đầy đủ sắc màu, ngập tràn hương vị. Nhờ bổ trợ cho nhau, miếng thịt gà như đỡ ngậy hơn, và miếng măng khô thì lại đậm đà hơn.\r\nMiến măng gà ngon là miến có nước lèo trong và ngọt thanh, gồm có thịt gà ta thái miếng, hành chẻ, miến và thành phần chính là măng khô. Măng khô ngon phải có độ giòn nhất định. Ăn kèm với rau thơm, lát chanh và một chút tương ớt.', '2019-07-17 15:57:57', ''),
(16, 'Mì xá xíu', 'Chinese noodles', '', 60000, 'Thịt xá xíu đậm đà, ngọt thơm ăn kèm cùng mì trứng dai dai, trộn thêm ít xà lách mát giòn khiến món mì xá xíu trở nên rất lạ miệng và hấp dẫn. Mì xá xíu sẽ là bữa ăn ‘đổi gió’ ngon miệng, chất lượng cho gia đình nhỏ của bạn', '2019-07-17 15:58:34', ''),
(17, 'Mì vằn thắn', 'Chinese noodles', '', 60000, 'Vằn thắn (hay hoành thánh, sủi cảo) là một món ăn có nguồn gốc từ Quảng Đông, Trung Quốc. Vằn thắn được làm từ thịt, hải sản và rau băm nhỏ, gói lại bằng vỏ bột mì, đem hấp chín lên. Sau khi hấp, miếng vằn thắn chín, vỏ bột chín trong nhìn thấy cả nhân bên trong, rất quyến rũ.\r\nMỳ vằn thắn ngon nhất là ăn vào mùa Đông trời lành lạnh. Ngồi yên vị trong nhà, húp nước soup ngọt lừ, ăn miếng vằn thắn, thịt xá xíu ngon ngọt thấy người khỏe khoắn hẳn, yêu đời hơn bao nhiêu.', '2019-07-17 16:00:52', ''),
(18, 'Phở gà', 'Chicken PHO noodle-soup or mixed', '', 50000, 'Nước phở trong, gà ta thịt ngọt, thơm mùi gà và lá chanh. Ăn kèm tương ớt và tương đen, hai loại gia vị làm tang thêm hương vị đậm đà của món phở này. Một tô phở không thể thiếu rau quế, húng lìu, ngò om, vài lát chanh tươi và ớt. Người miền Nam còn ăn phở với giá trụng chín và sa tế ớt.', '2019-07-17 16:01:26', ''),
(19, 'Mỳ Ý sốt bò băm', 'Spaghetti', '', 65000, 'Mì Ý sốt bò băm hay còn gọi là Spaghetti là món ăn ngon và phổ biến, dùng kèm với hỗn hợp sốt cà chua và thịt bò bằm có nguồn gốc từ Italia. Đây là món ăn bổ dưỡng và nhiều năng lượng mà bạn có thể dùng vào buổi sáng.', '2019-07-17 16:02:17', ''),
(20, 'Phở bò chín', 'PHO noodle soup with well-done beef', '', 50000, 'Phở là món ăn truyền thống từ xa xưa của Việt Nam và cũng được xem là một món ăn đại diện cho nền ẩm thực Việt Nam thời hiện đại.', '2019-07-17 16:03:02', ''),
(24, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', '', 555, '<p>hfdhdgsdf<img alt="" src="/ckfinder/userfiles/images/65240648_390616488224386_5105120508823732224_n.jpg" style="height:150px; width:200px" /></p>\r\n', '2019-07-20 14:17:33', ''),
(25, 'bbbbbbb', 'bbbbbbbbbbbb', '', 555, '<p>bbbbbbbbbbbbbbbb<img alt="" src="/ckfinder/userfiles/images/65240648_390616488224386_5105120508823732224_n.jpg" style="float:right; height:100px; width:134px" /></p>\r\n', '2019-07-20 14:19:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `ruou`
--

CREATE TABLE IF NOT EXISTS `ruou` (
`STT` int(10) NOT NULL,
  `Ten sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ten tieng Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(10) NOT NULL,
  `Mieu ta` text COLLATE utf8_unicode_ci NOT NULL,
  `Thoi gian tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ruou`
--

INSERT INTO `ruou` (`STT`, `Ten sp`, `Ten tieng Anh`, `Hinh anh`, `Gia`, `Mieu ta`, `Thoi gian tao`, `Status`) VALUES
(1, 'Blue Margarita', 'Blue Margarita', '', 120000, 'Ly cocktail Blue Margarita có màu xanh của biển, thật phù hợp cho bữa tiệc đêm hè. Đơn giản nhưng ngon miệng, ly cocktail này sẽ mang đến cho bạn cảm giác thật mới mẻ.', '2019-07-19 05:02:20', ''),
(2, 'B52', 'B52', '', 150000, 'Loại cocktail này có tên gọi được bắt nguồn từ kiểu máy bay ném bom tầm xa B52. Hai nhà hàng nổi tiếng là Alice ở Malibu, thuộc nước Mỹ. Đây là một loại cocktail ngắn nhiều tầng bao gồm một phần rượu hương cà phê, một phần rượu Baileys Irish Cream và một phần rượu hương cam Le Grand Marnier. Kể từ khi ra đời năm 1977, B52 đã nhanh chóng nổi tiếng trên toàn thế giới và rất được lòng những ai thích thưởng thức những loại đồ uống có cảm giác mạnh.', '2019-07-19 05:02:56', ''),
(3, 'Margarita', 'Margarita', '', 120000, 'Margarita là một loại cocktail lừng danh thế giới và được giới sành rượu ví như một nàng thơ duyên dáng, có vẻ đẹp quyến rũ lòng người.\r\nMargarita là loại cocktail được sử dụng phổ biến. Loại cocktail này là sự kết hợp giữa rượu Tequila với Triple Sec hoặc Cointreau hay bất cứ loại rượu nào có hương cam nào khác cùng với nước chanh tươi.', '2019-07-19 05:03:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `thucuong`
--

CREATE TABLE IF NOT EXISTS `thucuong` (
`STT` int(10) NOT NULL,
  `Ten sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(10) NOT NULL,
  `Mieu ta` text COLLATE utf8_unicode_ci NOT NULL,
  `Thoi gian tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thucuong`
--

INSERT INTO `thucuong` (`STT`, `Ten sp`, `Hinh anh`, `Gia`, `Mieu ta`, `Thoi gian tao`, `Status`) VALUES
(1, 'Cà phê sô cô la', '', 50000, 'Một ly cà phê sô-cô-la thơm ngon sẽ giúp bạn khoan khoái suốt cả ngày hè nóng bức, đặc biệt là người bị huyết áp thấp.', '2019-07-19 04:52:58', ''),
(2, 'Cà phê vani đá xay', '', 50000, 'Dư vị nồng nàn của cà phê sánh đôi hoàn hảo với hương vani ngọt ngào như vòng tay âu yếm, đệm thêm một chút béo ngậy của sữa và kem tươi, tạo nên vi ngọt đậm mà hòa nhã.', '2019-07-19 04:53:23', ''),
(3, 'Capuchino', '', 60000, 'Cappuccino được gọi vui là thức uống "một-phần-ba" - 1/3 Espresso, 1/3 Sữa nóng, 1/3 Foam.', '2019-07-19 04:53:43', ''),
(4, 'Espresso', '', 60000, 'Một cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, chúng tôi xay tươi hạt cà phê cho mỗi lần pha.', '2019-07-19 04:54:03', ''),
(5, 'Cà phê đen', '', 40000, 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao là món quà tự thưởng tuyệt vời nhất cho những ai mê đắm tinh chất nguyên bản nhất của cà phê. Một tách cà phê trầm lắng, thi vị giữa dòng đời vồn vã.', '2019-07-19 04:54:26', ''),
(6, '\r\nCà phê sữa đá', '', 45000, 'Cà phê phin kết hợp cũng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.', '2019-07-19 04:54:54', ''),
(7, 'Victoria 01', '', 45000, 'Vị mứt cam xoài hòa trộn độc đáo với sữa chua, cho cảm giác chua ngọt rất sướng. Điểm nhấn là những mẩu bánh cookie giòn tan giúp sự thưởng thức thêm thú vị.', '2019-07-19 04:55:16', ''),
(8, 'Cam tươi', '', 40000, 'Nước cam chứa nhiều calci, do đó sẽ rất thích hợp cho những ai không thích sữa. Uống nước cam cũng giúp tăng cường calci cho răng và xương mạnh mẽ, chắc khỏe…', '2019-07-19 04:56:02', ''),
(9, 'Trà trái cây', '', 45000, 'Là thức uống "bắt vị" được lấy cảm hứng từ trái Vải - thức quả tròn đầy, quen thuộc trong cuộc sống người Việt - kết hợp cùng Trà ôlong làm từ những lá trà tươi hảo hạng.', '2019-07-19 04:56:25', ''),
(10, 'Kem ổi', '', 40000, 'Khi thưởng thức kem ổi bạn sẽ cảm nhận được hương thơm dìu dịu, thanh mát của những trái ổi vô cùng hấp dẫn. Hơn nữa trong ổi còn có rất nhiều vitamin C tốt cho làn da của các chị em, giúp da căng bóng, sáng mịn.', '2019-07-19 04:56:46', ''),
(11, 'Matcha đá xay', '', 50000, 'Sự hoà quyện mịn màng giữa vị đắng thanh của cà phê và vị đắng ngọt của chocolate, cùng vị béo của kem tươi và sữa tươi hòa quyện.', '2019-07-19 04:57:07', ''),
(12, 'Noel 01', '', 50000, 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích.', '2019-07-19 04:57:25', ''),
(13, 'Sô cô la đá xay', '', 50000, 'Vị đắng của cà phê kết hợp cùng vị cacao ngọt ngàocủa sô-cô-la, vị sữa tươi ngọt béo, đem đến trải nghiệm vị giác cực kỳ thú vị.', '2019-07-19 04:57:48', ''),
(14, 'Trà đào', '', 55000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này. Sản phẩm hiện có 2 phiên bản Nóng và Lạnh phù hợp cho mọi thời gian trong năm.', '2019-07-19 04:58:11', ''),
(15, 'Nole 04', '', 45000, 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích.', '2019-07-19 04:58:30', ''),
(16, 'Trà chanh', '', 40000, 'Trà chanh là thức uống được nhiều bạn trẻ yêu thích. Đặc biệt tại các vỉa hè của đường phố Hà Nội, trà chanh đã thực sự trở thành “mốt”. Trà chanh không những có tác dụng giải nhiệt mùa hè mà nó còn có nhiều tác dụng tốt cho sức khỏe.', '2019-07-19 04:58:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doanchinh`
--
ALTER TABLE `doanchinh`
 ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `doansang`
--
ALTER TABLE `doansang`
 ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `ruou`
--
ALTER TABLE `ruou`
 ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `thucuong`
--
ALTER TABLE `thucuong`
 ADD PRIMARY KEY (`STT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doanchinh`
--
ALTER TABLE `doanchinh`
MODIFY `STT` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `doansang`
--
ALTER TABLE `doansang`
MODIFY `STT` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ruou`
--
ALTER TABLE `ruou`
MODIFY `STT` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `thucuong`
--
ALTER TABLE `thucuong`
MODIFY `STT` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
