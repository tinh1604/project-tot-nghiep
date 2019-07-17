-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 06:18 PM
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
-- Table structure for table `doansang`
--

CREATE TABLE IF NOT EXISTS `doansang` (
`STT` int(3) NOT NULL,
  `Ten sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ten tieng Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(10) NOT NULL,
  `Mieu ta` text COLLATE utf8_unicode_ci NOT NULL,
  `Thoi gian tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doansang`
--

INSERT INTO `doansang` (`STT`, `Ten sp`, `Ten tieng Anh`, `Gia`, `Mieu ta`, `Thoi gian tao`) VALUES
(1, 'Bánh canh cua', 'Tapioca noodle soup with crab meat and pork', 60000, 'Sợi bánh canh làm từ bột năng hoặc bột gạo, to hơn sợi bún ngoài Bắc, màu trắng hơi trong trong, ăn dai hơn bún. Nước dùng bánh canh Quán Ăn Ngon cũng thường có dạng sền sệt, ngòn ngọt ninh từ thịt, cua ghẹ hải sản và một số phụ liệu khác, chứ không nhan nhát nhạt như nước dùng bún phở.\r\nCó khá nhiều loại bánh canh như bánh canh tôm, thịt lợn nhưng "ám ảnh" nhất vẫn là bánh canh cua. Con cua to, luộc chín, màu đỏ cam bắt mắt, cả cái càng chắc thịt ngự trên bát bánh canh nóng hổi, ăn kèm với thịt chân giò và chút ớt xanh, chanh tươi', '2019-07-17 15:40:04'),
(2, 'Bánh cuốn nhân tôm', 'Steamed rice pancake with shrimp and minced pork', 60000, 'Bánh cuốn nhân tôm là một trong những món bánh được rất nhiều người yêu thích bởi hương vị thơm ngon, dễ ăn, ăn nhiều mà không hề cảm thấy chán.', '2019-07-17 15:41:48'),
(3, 'Bò kho bánh mỳ', 'Braised beef bread', 55000, 'Thịt bò là món ăn bổ dưỡng với nhiều cách chế biến khác nhau trong đó có món bò kho bánh mì. Đây là món rất dễ ăn lại giàu dưỡng chất là một lựa chọn rất tuyệt vời cho bạn vào những dịp cuối tuần.', '2019-07-17 15:47:55'),
(4, 'Bún bò Huế', 'Beef noodle soup with pig leg in Hue style', 60000, 'Một tô bún bò đạt tiêu chuẩn gồm có: bún, thịt bắp bò, giò heo, rau thơm, sa tế, mắm ruốc,…Điều đặc biệt của món ăn này là nước lèo phải được nấu trong một nồi tròn bằng nhôm được gò bởi bàn tay khéo léo của người thợ.', '2019-07-17 15:48:41'),
(5, 'Bún bò Nam Bộ', 'Southern style sautéed beef with rice noodles', 60000, 'Bún bò Nam bộ, nghe cái tên cũng đủ biết nguồn gốc xuất xứ. Bún này còn được gọi là bún xào vì món bún này không giống như những loại bún nước khác mà là bún khô, là sự kết hợp giữa bún, rau sống, giá, thịt bò xào, đậu phộng rang, cà rốt đu đủ thái sợi, hành phi thơm,…sau đó thêm nước mắm ớt chua cay vào trộn đều.', '2019-07-17 15:49:36'),
(6, 'Bún dọc mùng chân giò', 'Pork-legs rice noodle soup with Vietnamese taro', 45000, 'Móng ninh mềm ngọt, hương thơm nhè nhẹ kèm chút hăng của hành cọng sắt mỏng, nước dùng trong, vị chua thanh mát.', '2019-07-17 15:50:22'),
(7, 'Bún mắm', 'Rice noodle soup with fermented fish, seafood and roasted pork', 55000, 'Bún mắm vốn được biến tấu của mắm kho, một trong những món ăn đặc trưng của miền Tây sông nước. Nước lèo của bún mắm được nấu từ cá linh hay cá sặc, vì vậy mà món ăn có mùi vị mằn mặn nồng đặc biệt nhưng không dễ thưởng thức với một vài người. Thành phần chính gồm cá linh, bông súng, tôm, mực,…và quan trọng nhất là rau đắng, thứ rau đặc biệt phổ biến ở miền Tây sông nước.', '2019-07-17 15:51:03'),
(8, 'Bún măng gà', 'Chicken & dry bamboo shoot rice noodle - soup or dipping sauce', 50000, 'Bún măng gà là món ăn ngon phù hợp với ngày hè oi bức. Vị ngọt của gà và măng khô hòa quyện với nhau làm cho món ăn trở nên hấp dẫn hơn.', '2019-07-17 15:51:47'),
(9, 'Bún nem nướng', 'Grilled pork balls served with rice noodles & fresh herbs', 60000, 'Là món ăn phổ biến ở các tỉnh miền Trung Việt Nam. Và tùy theo vùng miền mà nem nướng có cách làm, cách ăn cũng khác nhau. Bún ăn kèm nem nướng thơm, mỡ hành, rắc đậu phộng rang giã nhỏ, chan nước mắm dưa góp chua ngọt trộn đều.', '2019-07-17 15:52:33'),
(10, 'Bún ốc', 'Snail noodle soup or dipping sauce', 50000, 'Ốc nhồi lựa con loại to, nước dùng trong, màu đỏ nhạt của cà chua, thơm mùi ốc và hành phi, giấm bỗng, vị chua dịu. Món ăn kèm rau sống, tương ớt, mắm tôm.', '2019-07-17 15:53:42'),
(11, 'Bún riêu cua', 'Fresh water crab with rice noodle soup', 50000, 'Gạch cua đồng giã tay, nước dùng trong màu đỏ nhạt, thơm mùi giấm bỗng, đậm mùi cua, vị vừa, chua dịu. Món ăn kèm rau sống, tương ớt, một chút mắm tôm (để riêng tùy khẩu vị).', '2019-07-17 15:54:39'),
(12, 'Bún Thái', 'Thai noodles', 60000, 'Bún Thái là món ăn có nguồn gốc từ Thái Lan nhưng lại được nhiều bạn trẻ Việt Nam ưa chuộng vì có vị chua cua, cay cay cùng với mùi thơm đặc trưng dễ chịu.', '2019-07-17 15:55:15'),
(13, '\r\nHủ tiếu Nam Vang khô', 'Cambodia style rice vermicelli with pork,shrimp,pork-liver & quail egg (mixed)', 65000, 'Cũng là các nguyên liệu giống như một bát Hủ tiếu Nam Vang chan nước lèo, hủ tiếu Nam Vang khô để nguyên các nguyên liệu vô bát và bên cạnh đặt một bát nước dùng riêng cho người nào không thích chan nước. Khi ăn trộn đều. Thi thoảng hơi ngán có thể nhấp một vài thìa nước dùng để sẵn ngoài bát riêng có thả vài lát hành lá.', '2019-07-17 15:56:10'),
(14, 'Hủ tiếu Nam Vang', 'Cambodia style rice vermicelli soup with pork, shrimp, pork-liver & quail egg', 65000, 'Hủ tiếu Nam Vang, món ăn này có nguyên liệu chính là lòng heo cùng các phụ liệu khác là hủ tíu khô, nước lèo hầm từ xương heo, tôm, thịt, trứng cút, thịt heo băm,…', '2019-07-17 15:57:05'),
(15, 'Miến măng gà', 'Chicken & dry bamboo shoot vermicelli - soup or mixed', 55000, 'Măng có thể kết hợp vói nhiều loại thịt như thịt chân giò, thịt vịt, thịt gà để cho ra những món ăn ngon. Trong số đó phải kể đến món miến măng gà. Tô miến gà với đầy đủ sắc màu, ngập tràn hương vị. Nhờ bổ trợ cho nhau, miếng thịt gà như đỡ ngậy hơn, và miếng măng khô thì lại đậm đà hơn.\r\nMiến măng gà ngon là miến có nước lèo trong và ngọt thanh, gồm có thịt gà ta thái miếng, hành chẻ, miến và thành phần chính là măng khô. Măng khô ngon phải có độ giòn nhất định. Ăn kèm với rau thơm, lát chanh và một chút tương ớt.', '2019-07-17 15:57:57'),
(16, 'Mì xá xíu', 'Chinese noodles', 60000, 'Thịt xá xíu đậm đà, ngọt thơm ăn kèm cùng mì trứng dai dai, trộn thêm ít xà lách mát giòn khiến món mì xá xíu trở nên rất lạ miệng và hấp dẫn. Mì xá xíu sẽ là bữa ăn ‘đổi gió’ ngon miệng, chất lượng cho gia đình nhỏ của bạn', '2019-07-17 15:58:34'),
(17, 'Mì vằn thắn', 'Chinese noodles', 60000, 'Vằn thắn (hay hoành thánh, sủi cảo) là một món ăn có nguồn gốc từ Quảng Đông, Trung Quốc. Vằn thắn được làm từ thịt, hải sản và rau băm nhỏ, gói lại bằng vỏ bột mì, đem hấp chín lên. Sau khi hấp, miếng vằn thắn chín, vỏ bột chín trong nhìn thấy cả nhân bên trong, rất quyến rũ.\r\nMỳ vằn thắn ngon nhất là ăn vào mùa Đông trời lành lạnh. Ngồi yên vị trong nhà, húp nước soup ngọt lừ, ăn miếng vằn thắn, thịt xá xíu ngon ngọt thấy người khỏe khoắn hẳn, yêu đời hơn bao nhiêu.', '2019-07-17 16:00:52'),
(18, 'Phở gà', 'Chicken PHO noodle-soup or mixed', 50000, 'Nước phở trong, gà ta thịt ngọt, thơm mùi gà và lá chanh. Ăn kèm tương ớt và tương đen, hai loại gia vị làm tang thêm hương vị đậm đà của món phở này. Một tô phở không thể thiếu rau quế, húng lìu, ngò om, vài lát chanh tươi và ớt. Người miền Nam còn ăn phở với giá trụng chín và sa tế ớt.', '2019-07-17 16:01:26'),
(19, 'Mỳ Ý sốt bò băm', 'Spaghetti', 65000, 'Mì Ý sốt bò băm hay còn gọi là Spaghetti là món ăn ngon và phổ biến, dùng kèm với hỗn hợp sốt cà chua và thịt bò bằm có nguồn gốc từ Italia. Đây là món ăn bổ dưỡng và nhiều năng lượng mà bạn có thể dùng vào buổi sáng.', '2019-07-17 16:02:17'),
(20, 'Phở bò chín', 'PHO noodle soup with well-done beef', 50000, 'Phở là món ăn truyền thống từ xa xưa của Việt Nam và cũng được xem là một món ăn đại diện cho nền ẩm thực Việt Nam thời hiện đại.', '2019-07-17 16:03:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doansang`
--
ALTER TABLE `doansang`
 ADD PRIMARY KEY (`STT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doansang`
--
ALTER TABLE `doansang`
MODIFY `STT` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
