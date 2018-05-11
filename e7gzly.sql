/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : e7gzly

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-11 22:40:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ads`
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `position` tinyint(10) DEFAULT NULL COMMENT '"1" => "top", "2" => "right", "3" => "left", "4" => "middle", "5" => "inner"',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('2', '1', 'top ad', 'https://www.google.com.eg', '1', '1439-top-banner.jpg');
INSERT INTO `ads` VALUES ('3', '', 'right ad', 'https://www.google.com.eg', '2', '9569-side_banner.jpg');
INSERT INTO `ads` VALUES ('4', '', 'left ad', 'https://www.google.com.eg', '3', '5720-side_banner.jpg');
INSERT INTO `ads` VALUES ('5', 'middle ad', 'middle ad', 'https://www.google.com.eg', '4', '17-page-ads.jpg');
INSERT INTO `ads` VALUES ('6', 'bottom ad', 'bottom ad', 'https://www.google.com.eg', '5', '5917-bottom-ads.jpg');
INSERT INTO `ads` VALUES ('7', 'bottom ad', 'bottom ad', 'https://www.google.com.eg', '5', '7675-bottom-ads-2.jpg');

-- ----------------------------
-- Table structure for `advirtise_with_us`
-- ----------------------------
DROP TABLE IF EXISTS `advirtise_with_us`;
CREATE TABLE `advirtise_with_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advirtise_with_us
-- ----------------------------
INSERT INTO `advirtise_with_us` VALUES ('1', 'Ad title', '', 'https://www.google.com.eg/', 'marwa', 'm.ali@egprosolutions.com', '544542', '');
INSERT INTO `advirtise_with_us` VALUES ('2', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('3', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('4', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('5', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('6', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('7', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('8', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('9', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('10', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('11', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('12', null, '', '', '', '', '', '');
INSERT INTO `advirtise_with_us` VALUES ('13', null, 'للاال', 'http://192.168.1.200/yiiprojects/team-b/a7gezly/home/advirtiseWithUs', 'gfhfg', 'm.ali@egprosolutions.com', '87654', 'adv-2.jpg');
INSERT INTO `advirtise_with_us` VALUES ('14', null, 'للاال', 'http://192.168.1.200/yiiprojects/team-b/a7gezly/home/advirtiseWithUs', 'gfhfg', 'm.ali@egprosolutions.com', '87654', 'adv-2.jpg');
INSERT INTO `advirtise_with_us` VALUES ('15', null, 'fgffggf', 'http://192.168.1.200/yiiprojects/team-b/a7gezly/home/advirtiseWithUs', 'gfhfg', 'm.ali@egprosolutions.com', '87654', '');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `desc` text,
  `desc_ar` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('3', '1', ' نفسك تروح شرم الشيخ ومش عارف تعمل ايه عندنا هنوفر لك كل حاجة ', '', '', '8547-6323-2190-slider-image-1.jpg');
INSERT INTO `banner` VALUES ('4', '2', ' وادخل وشوف الرحلة اللى تناسبك واطلعها مع اصحابك ', '', '', '3591-4037-slider-image-2.jpg');
INSERT INTO `banner` VALUES ('5', '3', null, '', null, '8796-032284.jpg');
INSERT INTO `banner` VALUES ('6', '4', null, '', null, '5319-33623.jpg');

-- ----------------------------
-- Table structure for `bed_type`
-- ----------------------------
DROP TABLE IF EXISTS `bed_type`;
CREATE TABLE `bed_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bed_type
-- ----------------------------
INSERT INTO `bed_type` VALUES ('1', 'مزدوجة', 'مزدوجة');
INSERT INTO `bed_type` VALUES ('2', 'فردى + زوجى', 'فردى + زوجى');

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_way` tinyint(2) DEFAULT NULL COMMENT '"1" => "cash", "2" => "paypal"',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT '"1" => "completed", "2" => "canceled", "3" => "pending"',
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `total_persons` int(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `buyer_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`),
  KEY `user_id` (`user_id`),
  KEY `condition_id` (`total_price`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1', '105', null, null, null, '3', null, null, null, null, '2014-06-02 10:50:19', null, null, null);
INSERT INTO `booking` VALUES ('2', '105', null, null, null, '3', null, null, null, null, '2014-06-02 10:56:09', null, null, null);
INSERT INTO `booking` VALUES ('3', '105', null, '100', null, '3', null, null, null, null, '2014-06-02 10:58:02', null, null, null);
INSERT INTO `booking` VALUES ('4', '102', null, '110', '1', '3', 'mohab', 'mo@ctetravel.com', 'naser city', '01112222832', '2014-06-18 08:17:36', null, null, null);
INSERT INTO `booking` VALUES ('5', '102', null, '200', null, '3', null, null, null, null, '2014-07-07 10:55:15', null, null, null);
INSERT INTO `booking` VALUES ('6', '101', null, '100', null, '3', null, null, null, null, '2014-10-18 08:17:37', null, null, null);
INSERT INTO `booking` VALUES ('7', '101', null, '200', null, '3', null, null, null, null, '2014-11-02 09:30:25', null, null, null);
INSERT INTO `booking` VALUES ('8', '101', null, '230', null, '3', null, null, null, null, '2014-11-02 09:48:09', null, null, null);
INSERT INTO `booking` VALUES ('9', '101', null, '220', '2', '2', 'admin', 'admin@admin.com', 'dasda', '234', '2018-05-11 22:34:31', null, 'EC-9M714933B9924110G', '');

-- ----------------------------
-- Table structure for `booking_details`
-- ----------------------------
DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `bedType_id` int(11) DEFAULT NULL,
  `room_no` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_details
-- ----------------------------
INSERT INTO `booking_details` VALUES ('1', '3', '19', '42', '1', '1');
INSERT INTO `booking_details` VALUES ('2', '4', '18', '48', '1', '1');
INSERT INTO `booking_details` VALUES ('3', '8', '18', '54', '1', '1');
INSERT INTO `booking_details` VALUES ('4', '9', '18', '54', '1', '1');
INSERT INTO `booking_details` VALUES ('5', '9', '18', '55', '1', '1');

-- ----------------------------
-- Table structure for `car`
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `age` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `power` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `price_per_day` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `mileage` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `price_includes` text CHARACTER SET utf8,
  `price_excludes` text CHARACTER SET utf8,
  `driving_type` tinyint(4) DEFAULT NULL,
  `emission` int(11) DEFAULT NULL,
  `fuel` int(11) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `no_of_laggages` int(11) DEFAULT NULL,
  `transmission` tinyint(4) DEFAULT NULL,
  `no_of_doors` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_ibfk_3` (`emission`),
  KEY `car_ibfk_1` (`model_id`),
  KEY `car_ibfk_2` (`category_id`),
  KEY `car_ibfk_4` (`fuel`),
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `car_model` (`id`) ON DELETE SET NULL,
  CONSTRAINT `car_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `car_category` (`id`) ON DELETE SET NULL,
  CONSTRAINT `car_ibfk_3` FOREIGN KEY (`emission`) REFERENCES `car_emission` (`id`) ON DELETE SET NULL,
  CONSTRAINT `car_ibfk_4` FOREIGN KEY (`fuel`) REFERENCES `car_fueltype` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('4', 'شيفرولية', 'chevrolet', '', 'أقل عمر 23 سنة', '50 كيلو وات', '400', '2', '2', 'غير محدود', '', '', '2', '1', '1', '4', '3', '3', '4', '1');

-- ----------------------------
-- Table structure for `car_booking`
-- ----------------------------
DROP TABLE IF EXISTS `car_booking`;
CREATE TABLE `car_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `deliver_date` varchar(150) DEFAULT NULL,
  `delivery_time` varchar(100) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `passport` varchar(200) DEFAULT NULL,
  `driving_licence` varchar(200) DEFAULT NULL,
  `accomodation_licence` varchar(200) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `car_booking_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE,
  CONSTRAINT `car_booking_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `car_location` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_booking
-- ----------------------------

-- ----------------------------
-- Table structure for `car_category`
-- ----------------------------
DROP TABLE IF EXISTS `car_category`;
CREATE TABLE `car_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_category
-- ----------------------------
INSERT INTO `car_category` VALUES ('2', 'اﻷساسى', 'standard');
INSERT INTO `car_category` VALUES ('11', 'أقتصادى', 'economy');

-- ----------------------------
-- Table structure for `car_driver_booking`
-- ----------------------------
DROP TABLE IF EXISTS `car_driver_booking`;
CREATE TABLE `car_driver_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `picked_date` varchar(100) DEFAULT NULL,
  `picked_time` varchar(100) DEFAULT NULL,
  `with_return` tinyint(4) DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `return_date` varchar(100) DEFAULT NULL,
  `return_time` varchar(100) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  KEY `location_id` (`location_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `car_driver_booking_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE,
  CONSTRAINT `car_driver_booking_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `car_location` (`id`),
  CONSTRAINT `car_driver_booking_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_driver_booking
-- ----------------------------

-- ----------------------------
-- Table structure for `car_emission`
-- ----------------------------
DROP TABLE IF EXISTS `car_emission`;
CREATE TABLE `car_emission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_emission
-- ----------------------------
INSERT INTO `car_emission` VALUES ('1', 'لا يوجد');

-- ----------------------------
-- Table structure for `car_fueltype`
-- ----------------------------
DROP TABLE IF EXISTS `car_fueltype`;
CREATE TABLE `car_fueltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_fueltype
-- ----------------------------
INSERT INTO `car_fueltype` VALUES ('1', 'ديزل');

-- ----------------------------
-- Table structure for `car_location`
-- ----------------------------
DROP TABLE IF EXISTS `car_location`;
CREATE TABLE `car_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `car_location_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_location
-- ----------------------------
INSERT INTO `car_location` VALUES ('1', 'عين شمس', '63');

-- ----------------------------
-- Table structure for `car_model`
-- ----------------------------
DROP TABLE IF EXISTS `car_model`;
CREATE TABLE `car_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_model
-- ----------------------------
INSERT INTO `car_model` VALUES ('2', 'رونالد لوجن');
INSERT INTO `car_model` VALUES ('3', 'شيفرولية افيو 1.6');

-- ----------------------------
-- Table structure for `car_price`
-- ----------------------------
DROP TABLE IF EXISTS `car_price`;
CREATE TABLE `car_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `start_days` int(11) DEFAULT NULL,
  `end_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `car_price_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_price
-- ----------------------------
INSERT INTO `car_price` VALUES ('3', '4', '500', '1', '1');

-- ----------------------------
-- Table structure for `car_property`
-- ----------------------------
DROP TABLE IF EXISTS `car_property`;
CREATE TABLE `car_property` (
  `car_id` int(11) NOT NULL DEFAULT '0',
  `property_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`car_id`,`property_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `car_property_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `car_property_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car_property
-- ----------------------------

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'رحلات داخلية', 'رحلات داخلية', '5758-cats-ads.jpg', 'internal-trips');
INSERT INTO `categories` VALUES ('2', 'رحلات خارجية', 'رحلات خارجية', '7779-offer-slider-3.jpg', 'extelnal-trips');
INSERT INTO `categories` VALUES ('3', 'الحج والعمرة', 'الحج والعمرة', '1930-travel_13.jpg', 'al-gaj');
INSERT INTO `categories` VALUES ('4', 'رحلات اليوم الواحد', 'رحلات اليوم الواحد', '4266-slider-image-2.jpg', 'one-day-trips');
INSERT INTO `categories` VALUES ('5', 'رحلات شهر العسل', 'شهر العسل', '6830-offer-slider-1.jpg', 'hanymoon');
INSERT INTO `categories` VALUES ('6', 'تذاكر الطيران', 'تذاكر الطيران', '8169-travel_11.jpg', 'airline-tickets');
INSERT INTO `categories` VALUES ('7', 'احجزلى كار', 'احجزلى كار', '3478-car-details-1.jpg', 'car');

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'القاهرة', '63');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `trip_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', 'test comment ', 'nice trip', '105', '1', '22-5-2014');
INSERT INTO `comments` VALUES ('5', 'test comment 2', 'commmmmmmmmmmmmmmmmmmmmmmment', '105', '1', '2014-05-22 15:54:46');
INSERT INTO `comments` VALUES ('6', '', '', '105', '1', '2014-06-06 16:50:19');

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cost_country` int(10) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'US', 'United States', '8');
INSERT INTO `country` VALUES ('2', 'CA', 'Canada', '4');
INSERT INTO `country` VALUES ('3', 'AF', 'Afghanistan', '1000');
INSERT INTO `country` VALUES ('4', 'AL', 'Albania', '1000');
INSERT INTO `country` VALUES ('5', 'DZ', 'Algeria', '1000');
INSERT INTO `country` VALUES ('6', 'DS', 'American Samoa', '1000');
INSERT INTO `country` VALUES ('7', 'AD', 'Andorra', '1000');
INSERT INTO `country` VALUES ('8', 'AO', 'Angola', '1000');
INSERT INTO `country` VALUES ('9', 'AI', 'Anguilla', '1000');
INSERT INTO `country` VALUES ('10', 'AQ', 'Antarctica', '1000');
INSERT INTO `country` VALUES ('11', 'AG', 'Antigua and/or Barbuda', '1000');
INSERT INTO `country` VALUES ('12', 'AR', 'Argentina', '1000');
INSERT INTO `country` VALUES ('13', 'AM', 'Armenia', '1000');
INSERT INTO `country` VALUES ('14', 'AW', 'Aruba', '1000');
INSERT INTO `country` VALUES ('15', 'AU', 'Australia', '3');
INSERT INTO `country` VALUES ('16', 'AT', 'Austria', '1000');
INSERT INTO `country` VALUES ('17', 'AZ', 'Azerbaijan', '1000');
INSERT INTO `country` VALUES ('18', 'BS', 'Bahamas', '1000');
INSERT INTO `country` VALUES ('19', 'BH', 'Bahrain', '1000');
INSERT INTO `country` VALUES ('20', 'BD', 'Bangladesh', '1000');
INSERT INTO `country` VALUES ('21', 'BB', 'Barbados', '1000');
INSERT INTO `country` VALUES ('22', 'BY', 'Belarus', '1000');
INSERT INTO `country` VALUES ('23', 'BE', 'Belgium', '1000');
INSERT INTO `country` VALUES ('24', 'BZ', 'Belize', '1000');
INSERT INTO `country` VALUES ('25', 'BJ', 'Benin', '1000');
INSERT INTO `country` VALUES ('26', 'BM', 'Bermuda', '1000');
INSERT INTO `country` VALUES ('27', 'BT', 'Bhutan', '1000');
INSERT INTO `country` VALUES ('28', 'BO', 'Bolivia', '1000');
INSERT INTO `country` VALUES ('29', 'BA', 'Bosnia and Herzegovina', '1000');
INSERT INTO `country` VALUES ('30', 'BW', 'Botswana', '1000');
INSERT INTO `country` VALUES ('31', 'BV', 'Bouvet Island', '1000');
INSERT INTO `country` VALUES ('32', 'BR', 'Brazil', '1000');
INSERT INTO `country` VALUES ('33', 'IO', 'British lndian Ocean Territory', '1000');
INSERT INTO `country` VALUES ('34', 'BN', 'Brunei Darussalam', '1000');
INSERT INTO `country` VALUES ('35', 'BG', 'Bulgaria', '1000');
INSERT INTO `country` VALUES ('36', 'BF', 'Burkina Faso', '1000');
INSERT INTO `country` VALUES ('37', 'BI', 'Burundi', '1000');
INSERT INTO `country` VALUES ('38', 'KH', 'Cambodia', '1000');
INSERT INTO `country` VALUES ('39', 'CM', 'Cameroon', '1000');
INSERT INTO `country` VALUES ('40', 'CV', 'Cape Verde', '1000');
INSERT INTO `country` VALUES ('41', 'KY', 'Cayman Islands', '1000');
INSERT INTO `country` VALUES ('42', 'CF', 'Central African Republic', '1000');
INSERT INTO `country` VALUES ('43', 'TD', 'Chad', '1000');
INSERT INTO `country` VALUES ('44', 'CL', 'Chile', '1000');
INSERT INTO `country` VALUES ('45', 'CN', 'China', '1000');
INSERT INTO `country` VALUES ('46', 'CX', 'Christmas Island', '1000');
INSERT INTO `country` VALUES ('47', 'CC', 'Cocos (Keeling) Islands', '1000');
INSERT INTO `country` VALUES ('48', 'CO', 'Colombia', '1000');
INSERT INTO `country` VALUES ('49', 'KM', 'Comoros', '1000');
INSERT INTO `country` VALUES ('50', 'CG', 'Congo', '1000');
INSERT INTO `country` VALUES ('51', 'CK', 'Cook Islands', '1000');
INSERT INTO `country` VALUES ('52', 'CR', 'Costa Rica', '1000');
INSERT INTO `country` VALUES ('53', 'HR', 'Croatia (Hrvatska)', '1000');
INSERT INTO `country` VALUES ('54', 'CU', 'Cuba', '1000');
INSERT INTO `country` VALUES ('55', 'CY', 'Cyprus', '1000');
INSERT INTO `country` VALUES ('56', 'CZ', 'Czech Republic', '1000');
INSERT INTO `country` VALUES ('57', 'DK', 'Denmark', '1000');
INSERT INTO `country` VALUES ('58', 'DJ', 'Djibouti', '1000');
INSERT INTO `country` VALUES ('59', 'DM', 'Dominica', '1000');
INSERT INTO `country` VALUES ('60', 'DO', 'Dominican Republic', '1000');
INSERT INTO `country` VALUES ('61', 'TP', 'East Timor', '1000');
INSERT INTO `country` VALUES ('62', 'EC', 'Ecudaor', '1000');
INSERT INTO `country` VALUES ('63', 'EG', 'Egypt', '1000');
INSERT INTO `country` VALUES ('64', 'SV', 'El Salvador', '1000');
INSERT INTO `country` VALUES ('65', 'GQ', 'Equatorial Guinea', '1000');
INSERT INTO `country` VALUES ('66', 'ER', 'Eritrea', '1000');
INSERT INTO `country` VALUES ('67', 'EE', 'Estonia', '1000');
INSERT INTO `country` VALUES ('68', 'ET', 'Ethiopia', '1000');
INSERT INTO `country` VALUES ('69', 'FK', 'Falkland Islands (Malvinas)', '1000');
INSERT INTO `country` VALUES ('70', 'FO', 'Faroe Islands', '1000');
INSERT INTO `country` VALUES ('71', 'FJ', 'Fiji', '1000');
INSERT INTO `country` VALUES ('72', 'FI', 'Finland', '1000');
INSERT INTO `country` VALUES ('73', 'FR', 'France', '1000');
INSERT INTO `country` VALUES ('74', 'FX', 'France, Metropolitan', '1000');
INSERT INTO `country` VALUES ('75', 'GF', 'French Guiana', '1000');
INSERT INTO `country` VALUES ('76', 'PF', 'French Polynesia', '1000');
INSERT INTO `country` VALUES ('77', 'TF', 'French Southern Territories', '1000');
INSERT INTO `country` VALUES ('78', 'GA', 'Gabon', '1000');
INSERT INTO `country` VALUES ('79', 'GM', 'Gambia', '1000');
INSERT INTO `country` VALUES ('80', 'GE', 'Georgia', '1000');
INSERT INTO `country` VALUES ('81', 'DE', 'Germany', '1000');
INSERT INTO `country` VALUES ('82', 'GH', 'Ghana', '1000');
INSERT INTO `country` VALUES ('83', 'GI', 'Gibraltar', '1000');
INSERT INTO `country` VALUES ('84', 'GR', 'Greece', '1000');
INSERT INTO `country` VALUES ('85', 'GL', 'Greenland', '1000');
INSERT INTO `country` VALUES ('86', 'GD', 'Grenada', '1000');
INSERT INTO `country` VALUES ('87', 'GP', 'Guadeloupe', '1000');
INSERT INTO `country` VALUES ('88', 'GU', 'Guam', '1000');
INSERT INTO `country` VALUES ('89', 'GT', 'Guatemala', '1000');
INSERT INTO `country` VALUES ('90', 'GN', 'Guinea', '1000');
INSERT INTO `country` VALUES ('91', 'GW', 'Guinea-Bissau', '1000');
INSERT INTO `country` VALUES ('92', 'GY', 'Guyana', '1000');
INSERT INTO `country` VALUES ('93', 'HT', 'Haiti', '1000');
INSERT INTO `country` VALUES ('94', 'HM', 'Heard and Mc Donald Islands', '1000');
INSERT INTO `country` VALUES ('95', 'HN', 'Honduras', '1000');
INSERT INTO `country` VALUES ('96', 'HK', 'Hong Kong', '1000');
INSERT INTO `country` VALUES ('97', 'HU', 'Hungary', '1000');
INSERT INTO `country` VALUES ('98', 'IS', 'Iceland', '1000');
INSERT INTO `country` VALUES ('99', 'IN', 'India', '1000');
INSERT INTO `country` VALUES ('100', 'ID', 'Indonesia', '1000');
INSERT INTO `country` VALUES ('101', 'IR', 'Iran (Islamic Republic of)', '1000');
INSERT INTO `country` VALUES ('102', 'IQ', 'Iraq', '1000');
INSERT INTO `country` VALUES ('103', 'IE', 'Ireland', '1000');
INSERT INTO `country` VALUES ('104', 'IL', 'Israel', '1000');
INSERT INTO `country` VALUES ('105', 'IT', 'Italy', '1000');
INSERT INTO `country` VALUES ('106', 'CI', 'Ivory Coast', '1000');
INSERT INTO `country` VALUES ('107', 'JM', 'Jamaica', '1000');
INSERT INTO `country` VALUES ('108', 'JP', 'Japan', '1000');
INSERT INTO `country` VALUES ('109', 'JO', 'Jordan', '1000');
INSERT INTO `country` VALUES ('110', 'KZ', 'Kazakhstan', '1000');
INSERT INTO `country` VALUES ('111', 'KE', 'Kenya', '1000');
INSERT INTO `country` VALUES ('112', 'KI', 'Kiribati', '1000');
INSERT INTO `country` VALUES ('113', 'KP', 'Korea, Democratic People\'s Republic of', '1000');
INSERT INTO `country` VALUES ('114', 'KR', 'Korea, Republic of', '1000');
INSERT INTO `country` VALUES ('115', 'KW', 'Kuwait', '1000');
INSERT INTO `country` VALUES ('116', 'KG', 'Kyrgyzstan', '1000');
INSERT INTO `country` VALUES ('117', 'LA', 'Lao People\'s Democratic Republic', '1000');
INSERT INTO `country` VALUES ('118', 'LV', 'Latvia', '1000');
INSERT INTO `country` VALUES ('119', 'LB', 'Lebanon', '1000');
INSERT INTO `country` VALUES ('120', 'LS', 'Lesotho', '1000');
INSERT INTO `country` VALUES ('121', 'LR', 'Liberia', '1000');
INSERT INTO `country` VALUES ('122', 'LY', 'Libyan Arab Jamahiriya', '1000');
INSERT INTO `country` VALUES ('123', 'LI', 'Liechtenstein', '1000');
INSERT INTO `country` VALUES ('124', 'LT', 'Lithuania', '1000');
INSERT INTO `country` VALUES ('125', 'LU', 'Luxembourg', '1000');
INSERT INTO `country` VALUES ('126', 'MO', 'Macau', '1000');
INSERT INTO `country` VALUES ('127', 'MK', 'Macedonia', '1000');
INSERT INTO `country` VALUES ('128', 'MG', 'Madagascar', '1000');
INSERT INTO `country` VALUES ('129', 'MW', 'Malawi', '1000');
INSERT INTO `country` VALUES ('130', 'MY', 'Malaysia', '1000');
INSERT INTO `country` VALUES ('131', 'MV', 'Maldives', '1000');
INSERT INTO `country` VALUES ('132', 'ML', 'Mali', '1000');
INSERT INTO `country` VALUES ('133', 'MT', 'Malta', '1000');
INSERT INTO `country` VALUES ('134', 'MH', 'Marshall Islands', '1000');
INSERT INTO `country` VALUES ('135', 'MQ', 'Martinique', '1000');
INSERT INTO `country` VALUES ('136', 'MR', 'Mauritania', '1000');
INSERT INTO `country` VALUES ('137', 'MU', 'Mauritius', '1000');
INSERT INTO `country` VALUES ('138', 'TY', 'Mayotte', '1000');
INSERT INTO `country` VALUES ('139', 'MX', 'Mexico', '1000');
INSERT INTO `country` VALUES ('140', 'FM', 'Micronesia, Federated States of', '1000');
INSERT INTO `country` VALUES ('141', 'MD', 'Moldova, Republic of', '1000');
INSERT INTO `country` VALUES ('142', 'MC', 'Monaco', '1000');
INSERT INTO `country` VALUES ('143', 'MN', 'Mongolia', '1000');
INSERT INTO `country` VALUES ('144', 'MS', 'Montserrat', '1000');
INSERT INTO `country` VALUES ('145', 'MA', 'Morocco', '1000');
INSERT INTO `country` VALUES ('146', 'MZ', 'Mozambique', '1000');
INSERT INTO `country` VALUES ('147', 'MM', 'Myanmar', '1000');
INSERT INTO `country` VALUES ('148', 'NA', 'Namibia', '1000');
INSERT INTO `country` VALUES ('149', 'NR', 'Nauru', '1000');
INSERT INTO `country` VALUES ('150', 'NP', 'Nepal', '1000');
INSERT INTO `country` VALUES ('151', 'NL', 'Netherlands', '1000');
INSERT INTO `country` VALUES ('152', 'AN', 'Netherlands Antilles', '1000');
INSERT INTO `country` VALUES ('153', 'NC', 'New Caledonia', '1000');
INSERT INTO `country` VALUES ('154', 'NZ', 'New Zealand', '1000');
INSERT INTO `country` VALUES ('155', 'NI', 'Nicaragua', '1000');
INSERT INTO `country` VALUES ('156', 'NE', 'Niger', '1000');
INSERT INTO `country` VALUES ('157', 'NG', 'Nigeria', '1000');
INSERT INTO `country` VALUES ('158', 'NU', 'Niue', '1000');
INSERT INTO `country` VALUES ('159', 'NF', 'Norfork Island', '1000');
INSERT INTO `country` VALUES ('160', 'MP', 'Northern Mariana Islands', '1000');
INSERT INTO `country` VALUES ('161', 'NO', 'Norway', '1000');
INSERT INTO `country` VALUES ('162', 'OM', 'Oman', '1000');
INSERT INTO `country` VALUES ('163', 'PK', 'Pakistan', '1000');
INSERT INTO `country` VALUES ('164', 'PW', 'Palau', '1000');
INSERT INTO `country` VALUES ('165', 'PA', 'Panama', '1000');
INSERT INTO `country` VALUES ('166', 'PG', 'Papua New Guinea', '1000');
INSERT INTO `country` VALUES ('167', 'PY', 'Paraguay', '1000');
INSERT INTO `country` VALUES ('168', 'PE', 'Peru', '1000');
INSERT INTO `country` VALUES ('169', 'PH', 'Philippines', '1000');
INSERT INTO `country` VALUES ('170', 'PN', 'Pitcairn', '1000');
INSERT INTO `country` VALUES ('171', 'PL', 'Poland', '1000');
INSERT INTO `country` VALUES ('172', 'PT', 'Portugal', '1000');
INSERT INTO `country` VALUES ('173', 'PR', 'Puerto Rico', '1000');
INSERT INTO `country` VALUES ('174', 'QA', 'Qatar', '1000');
INSERT INTO `country` VALUES ('175', 'RE', 'Reunion', '1000');
INSERT INTO `country` VALUES ('176', 'RO', 'Romania', '1000');
INSERT INTO `country` VALUES ('177', 'RU', 'Russian Federation', '1000');
INSERT INTO `country` VALUES ('178', 'RW', 'Rwanda', '1000');
INSERT INTO `country` VALUES ('179', 'KN', 'Saint Kitts and Nevis', '1000');
INSERT INTO `country` VALUES ('180', 'LC', 'Saint Lucia', '1000');
INSERT INTO `country` VALUES ('181', 'VC', 'Saint Vincent and the Grenadines', '1000');
INSERT INTO `country` VALUES ('182', 'WS', 'Samoa', '1000');
INSERT INTO `country` VALUES ('183', 'SM', 'San Marino', '1000');
INSERT INTO `country` VALUES ('184', 'ST', 'Sao Tome and Principe', '1000');
INSERT INTO `country` VALUES ('185', 'SA', 'Saudi Arabia', '1000');
INSERT INTO `country` VALUES ('186', 'SN', 'Senegal', '1000');
INSERT INTO `country` VALUES ('187', 'SC', 'Seychelles', '1000');
INSERT INTO `country` VALUES ('188', 'SL', 'Sierra Leone', '1000');
INSERT INTO `country` VALUES ('189', 'SG', 'Singapore', '1000');
INSERT INTO `country` VALUES ('190', 'SK', 'Slovakia', '1000');
INSERT INTO `country` VALUES ('191', 'SI', 'Slovenia', '1000');
INSERT INTO `country` VALUES ('192', 'SB', 'Solomon Islands', '1000');
INSERT INTO `country` VALUES ('193', 'SO', 'Somalia', '1000');
INSERT INTO `country` VALUES ('194', 'ZA', 'South Africa', '1000');
INSERT INTO `country` VALUES ('195', 'GS', 'South Georgia South Sandwich Islands', '1000');
INSERT INTO `country` VALUES ('196', 'ES', 'Spain', '1000');
INSERT INTO `country` VALUES ('197', 'LK', 'Sri Lanka', '1000');
INSERT INTO `country` VALUES ('198', 'SH', 'St. Helena', '1000');
INSERT INTO `country` VALUES ('199', 'PM', 'St. Pierre and Miquelon', '1000');
INSERT INTO `country` VALUES ('201', 'SR', 'Suriname', '1000');
INSERT INTO `country` VALUES ('202', 'SJ', 'Svalbarn and Jan Mayen Islands', '1000');
INSERT INTO `country` VALUES ('203', 'SZ', 'Swaziland', '1000');
INSERT INTO `country` VALUES ('204', 'SE', 'Sweden', '1000');
INSERT INTO `country` VALUES ('205', 'CH', 'Switzerland', '1000');
INSERT INTO `country` VALUES ('206', 'SY', 'Syrian Arab Republic', '1000');
INSERT INTO `country` VALUES ('207', 'TW', 'Taiwan', '1000');
INSERT INTO `country` VALUES ('208', 'TJ', 'Tajikistan', '1000');
INSERT INTO `country` VALUES ('209', 'TZ', 'Tanzania, United Republic of', '1000');
INSERT INTO `country` VALUES ('210', 'TH', 'Thailand', '1000');
INSERT INTO `country` VALUES ('211', 'TG', 'Togo', '1000');
INSERT INTO `country` VALUES ('212', 'TK', 'Tokelau', '1000');
INSERT INTO `country` VALUES ('213', 'TO', 'Tonga', '1000');
INSERT INTO `country` VALUES ('214', 'TT', 'Trinidad and Tobago', '1000');
INSERT INTO `country` VALUES ('215', 'TN', 'Tunisia', '1000');
INSERT INTO `country` VALUES ('216', 'TR', 'Turkey', '1000');
INSERT INTO `country` VALUES ('217', 'TM', 'Turkmenistan', '1000');
INSERT INTO `country` VALUES ('218', 'TC', 'Turks and Caicos Islands', '1000');
INSERT INTO `country` VALUES ('219', 'TV', 'Tuvalu', '1000');
INSERT INTO `country` VALUES ('220', 'UG', 'Uganda', '1000');
INSERT INTO `country` VALUES ('221', 'UA', 'Ukraine', '1000');
INSERT INTO `country` VALUES ('222', 'AE', 'United Arab Emirates', '1000');
INSERT INTO `country` VALUES ('223', 'GB', 'United Kingdom', '2');
INSERT INTO `country` VALUES ('224', 'UM', 'United States minor outlying islands', '1000');
INSERT INTO `country` VALUES ('225', 'UY', 'Uruguay', '1000');
INSERT INTO `country` VALUES ('226', 'UZ', 'Uzbekistan', '1000');
INSERT INTO `country` VALUES ('227', 'VU', 'Vanuatu', '1000');
INSERT INTO `country` VALUES ('228', 'VA', 'Vatican City State', '1000');
INSERT INTO `country` VALUES ('229', 'VE', 'Venezuela', '1000');
INSERT INTO `country` VALUES ('230', 'VN', 'Vietnam', '1000');
INSERT INTO `country` VALUES ('231', 'VG', 'Virigan Islands (British)', '1000');
INSERT INTO `country` VALUES ('232', 'VI', 'Virgin Islands (U.S.)', '1000');
INSERT INTO `country` VALUES ('233', 'WF', 'Wallis and Futuna Islands', '1000');
INSERT INTO `country` VALUES ('234', 'EH', 'Western Sahara', '1000');
INSERT INTO `country` VALUES ('235', 'YE', 'Yemen', '1000');
INSERT INTO `country` VALUES ('236', 'YU', 'Yugoslavia', '1000');
INSERT INTO `country` VALUES ('237', 'ZR', 'Zaire', '1000');
INSERT INTO `country` VALUES ('238', 'ZM', 'Zambia', '1000');
INSERT INTO `country` VALUES ('239', 'ZW', 'Zimbabwe', '1000');

-- ----------------------------
-- Table structure for `days`
-- ----------------------------
DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of days
-- ----------------------------
INSERT INTO `days` VALUES ('1', '4 days', '4 ايام', null);
INSERT INTO `days` VALUES ('2', '5 day', '5ايام', null);
INSERT INTO `days` VALUES ('3', '10 day', '10 ايام', null);

-- ----------------------------
-- Table structure for `driver`
-- ----------------------------
DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of driver
-- ----------------------------
INSERT INTO `driver` VALUES ('1', 'john jozef', 'john@email.com', '01220246451', 'london, baris');

-- ----------------------------
-- Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versions_data` text COLLATE utf8_bin NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '1',
  `description` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=518 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('369', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('375', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('471', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('480', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('482', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('492', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('493', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('494', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('495', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('496', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('497', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('498', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('499', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('500', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('501', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('502', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('503', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('504', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('505', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('506', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('507', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('508', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('509', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('510', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('511', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('512', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('513', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('514', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('515', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('516', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');
INSERT INTO `gallery` VALUES ('517', 0x613A323A7B733A353A22736D616C6C223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3230303B693A313B4E3B7D7D733A363A226D656469756D223B613A313A7B733A363A22726573697A65223B613A323A7B693A303B693A3830303B693A313B4E3B7D7D7D, '1', '1');

-- ----------------------------
-- Table structure for `gallery_photo`
-- ----------------------------
DROP TABLE IF EXISTS `gallery_photo`;
CREATE TABLE `gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` text COLLATE utf8_bin,
  `file_name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_gallery_photo_gallery1` (`gallery_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of gallery_photo
-- ----------------------------
INSERT INTO `gallery_photo` VALUES ('1', '17', '1', 'test', 0x74657374, 'spotlight_featuredproduct901-199008.png');
INSERT INTO `gallery_photo` VALUES ('2', '17', '2', '', null, 'backup.png');
INSERT INTO `gallery_photo` VALUES ('3', '17', '3', '', null, 'glyphicons-halflings-white.png');
INSERT INTO `gallery_photo` VALUES ('4', '17', '4', '', null, 'clients.png');
INSERT INTO `gallery_photo` VALUES ('5', '17', '5', '', '', 'glyphicons-halflings.png');
INSERT INTO `gallery_photo` VALUES ('6', '17', '6', 'aa', 0x6161, 'phone.png');
INSERT INTO `gallery_photo` VALUES ('9', '17', '9', '', '', 'IMG_4099.jpeg');
INSERT INTO `gallery_photo` VALUES ('10', '30', '10', '', '', 'travel_2.jpg');
INSERT INTO `gallery_photo` VALUES ('12', '1', '12', '', '', 'travel_1.jpg');
INSERT INTO `gallery_photo` VALUES ('13', '67', '13', '', '', 'travel_1.jpg');
INSERT INTO `gallery_photo` VALUES ('14', '67', '14', '', '', 'travel_2.jpg');
INSERT INTO `gallery_photo` VALUES ('15', '163', '15', '', '', 'travel_1.jpg');
INSERT INTO `gallery_photo` VALUES ('16', '163', '16', '', '', 'travel_2.jpg');
INSERT INTO `gallery_photo` VALUES ('19', '375', '19', '', '', 'offer-slider-1.jpg');
INSERT INTO `gallery_photo` VALUES ('20', '369', '20', '', '', 'offer-slider-2.jpg');
INSERT INTO `gallery_photo` VALUES ('21', '472', '21', '', '', 'travel_2.jpg');
INSERT INTO `gallery_photo` VALUES ('22', '480', '22', '', '', 'item3.jpg');
INSERT INTO `gallery_photo` VALUES ('23', '482', '23', '', '', 'bottom-ads.jpg');
INSERT INTO `gallery_photo` VALUES ('24', '480', '24', '', null, 'travel_1.jpg');
INSERT INTO `gallery_photo` VALUES ('25', '480', '25', '', '', 'travel_2.jpg');
INSERT INTO `gallery_photo` VALUES ('26', '497', '26', '', '', 'offer-slider-1.jpg');
INSERT INTO `gallery_photo` VALUES ('27', '497', '27', '', '', 'offer-slider-3.jpg');
INSERT INTO `gallery_photo` VALUES ('28', '497', '28', '', '', 'travel_4.jpg');
INSERT INTO `gallery_photo` VALUES ('29', '375', '29', '', null, '2824512.jpg');
INSERT INTO `gallery_photo` VALUES ('30', '480', '30', '', '', '2824512.jpg');
INSERT INTO `gallery_photo` VALUES ('31', '482', '31', '', null, '33623.jpg');
INSERT INTO `gallery_photo` VALUES ('32', '482', '32', '', '', '1344332137s4520d.jpg');
INSERT INTO `gallery_photo` VALUES ('33', '482', '33', '', '', 'ain-sukhna.jpg');
INSERT INTO `gallery_photo` VALUES ('34', '507', '34', '', '', 'ain-sukhna.jpg');
INSERT INTO `gallery_photo` VALUES ('37', '507', '37', '', '', '899491d2-8840-4619-86c0-ce0d3bb1f82d.jpg');
INSERT INTO `gallery_photo` VALUES ('38', '507', '38', '', '', '6F7D81F5AD903FA285A0283F6AF3FC29.jpg');
INSERT INTO `gallery_photo` VALUES ('39', '504', '39', '', '', '21806_125_b.jpg');
INSERT INTO `gallery_photo` VALUES ('40', '504', '40', '', '', 'almosafr_58bde7eccf.jpg');
INSERT INTO `gallery_photo` VALUES ('41', '502', '41', '', '', 'SheratonSharm-MainBuildingGuestRoom.jpg');
INSERT INTO `gallery_photo` VALUES ('42', '502', '42', '', '', 'superior-sea-view-room.jpg');

-- ----------------------------
-- Table structure for `home_slider`
-- ----------------------------
DROP TABLE IF EXISTS `home_slider`;
CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_slider
-- ----------------------------
INSERT INTO `home_slider` VALUES ('2', 'للب', 'slider1', '6472-offer-slider-1.jpg');
INSERT INTO `home_slider` VALUES ('3', '', 'slider2', '916-offer-slider-2.jpg');
INSERT INTO `home_slider` VALUES ('4', '', 'slider3', '8304-offer-slider-3.jpg');
INSERT INTO `home_slider` VALUES ('5', '', 'slider4', '2889-offer-slider-4.jpg');
INSERT INTO `home_slider` VALUES ('6', '', 'slider1', '6254-offer-slider-1.jpg');
INSERT INTO `home_slider` VALUES ('7', '', 'slider2', '8428-offer-slider-2.jpg');
INSERT INTO `home_slider` VALUES ('8', '', 'slider3', '7618-offer-slider-3.jpg');
INSERT INTO `home_slider` VALUES ('9', '', 'slider4', '3860-offer-slider-4.jpg');

-- ----------------------------
-- Table structure for `hotels`
-- ----------------------------
DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar-delete` varchar(255) DEFAULT NULL,
  `desc` text,
  `desc_ar-delete` text,
  `image` varchar(255) DEFAULT NULL,
  `map` text,
  `video` varchar(255) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL DEFAULT '',
  `longitude` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `hotels_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- ----------------------------
-- Records of hotels
-- ----------------------------
INSERT INTO `hotels` VALUES ('1', 'ماريوت', 'ماريوت', '	التفاصيل\r\n', '<p>\r\n	التفاصيل</p>\r\n', '7850-offer-slider-2.jpg', 'https://maps.google.com.eg/maps?hl=en&amp;ie=UTF8&amp;ll=26.9061,30.876837&amp;spn=10.041659,21.643066&amp;t=m&amp;z=6&amp;output=embed', 'http://www.youtube.com/watch?v=B_fAntPLe5M', '2', '27.9158175', '34.329950499999995');
INSERT INTO `hotels` VALUES ('2', 'jona', 'جونة', '<p>\r\n	details</p>\r\n', '<p>\r\n	التفاصيل</p>\r\n', '7729-travel_2.jpg', 'https://maps.google.com.eg/maps?hl=en&amp;ie=UTF8&amp;ll=26.9061,30.876837&amp;spn=10.041659,21.643066&amp;t=m&amp;z=6&amp;output=embed', '', '1', '', '');
INSERT INTO `hotels` VALUES ('3', 'Dobi hotel', 'فندق دبى', '<p>\r\n	التفاصيل</p>\r\n', '<p>\r\n	التفاصيل</p>\r\n', '9973-travel_1.jpg', '', '', '1', '', '');

-- ----------------------------
-- Table structure for `hotels_level`
-- ----------------------------
DROP TABLE IF EXISTS `hotels_level`;
CREATE TABLE `hotels_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `stars` tinyint(7) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotels_level
-- ----------------------------
INSERT INTO `hotels_level` VALUES ('1', '5 Stars', 'خمس نجوم', '5', null);
INSERT INTO `hotels_level` VALUES ('2', '4 stars', 'اربع نجوم', '4', null);

-- ----------------------------
-- Table structure for `keyword`
-- ----------------------------
DROP TABLE IF EXISTS `keyword`;
CREATE TABLE `keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of keyword
-- ----------------------------
INSERT INTO `keyword` VALUES ('146', 'الصفحة الرئيسية');
INSERT INTO `keyword` VALUES ('147', 'كلمنا');
INSERT INTO `keyword` VALUES ('148', 'للاعلان معنا');
INSERT INTO `keyword` VALUES ('149', 'أرقامنا للاتصال');
INSERT INTO `keyword` VALUES ('150', 'خروج');
INSERT INTO `keyword` VALUES ('151', 'حسابك');
INSERT INTO `keyword` VALUES ('152', 'روابط تهمك');
INSERT INTO `keyword` VALUES ('153', 'انضم الى القائمة البريدية');
INSERT INTO `keyword` VALUES ('154', 'كن أول من يعلم');
INSERT INTO `keyword` VALUES ('155', 'احصل على عروضنا الأقل سعرا');
INSERT INTO `keyword` VALUES ('156', 'ارسل بياناتك');
INSERT INTO `keyword` VALUES ('157', 'تابعونا');
INSERT INTO `keyword` VALUES ('158', 'بيان الخصوصية فى فتح حسابك وكن أول من يعلم');
INSERT INTO `keyword` VALUES ('159', 'العودة لأعلى');
INSERT INTO `keyword` VALUES ('160', 'اختر المدينة');
INSERT INTO `keyword` VALUES ('161', 'مستوى الفندق');
INSERT INTO `keyword` VALUES ('162', 'عدد الايام');
INSERT INTO `keyword` VALUES ('163', ' الايام');
INSERT INTO `keyword` VALUES ('164', 'السعر');
INSERT INTO `keyword` VALUES ('165', 'استمتع بعروض احجز لى');
INSERT INTO `keyword` VALUES ('166', 'شوف التفاصيل');
INSERT INTO `keyword` VALUES ('167', 'اختر رحلتك');
INSERT INTO `keyword` VALUES ('168', 'أماكن على قائمة رحلاتنا');
INSERT INTO `keyword` VALUES ('169', 'اختر لغتك');
INSERT INTO `keyword` VALUES ('170', 'الرئيسية');
INSERT INTO `keyword` VALUES ('171', 'اتصل بنا');
INSERT INTO `keyword` VALUES ('172', 'الاسم');
INSERT INTO `keyword` VALUES ('173', 'البريد الالكترونى ');
INSERT INTO `keyword` VALUES ('174', 'الهاتف');
INSERT INTO `keyword` VALUES ('175', 'الموبايل');
INSERT INTO `keyword` VALUES ('176', 'العنوان');
INSERT INTO `keyword` VALUES ('177', 'الرسالة');
INSERT INTO `keyword` VALUES ('178', 'رمز التحقق');
INSERT INTO `keyword` VALUES ('179', 'ارسل');
INSERT INTO `keyword` VALUES ('180', 'اختر السعر');
INSERT INTO `keyword` VALUES ('181', 'ابحث فى رحلاتنا واختار رحلتك');
INSERT INTO `keyword` VALUES ('182', 'اعلن معنا');
INSERT INTO `keyword` VALUES ('183', 'الرابط');
INSERT INTO `keyword` VALUES ('184', 'الصورة');
INSERT INTO `keyword` VALUES ('185', 'موبايل');
INSERT INTO `keyword` VALUES ('186', 'هاتف');
INSERT INTO `keyword` VALUES ('187', 'فاكس');
INSERT INTO `keyword` VALUES ('188', 'الحساب الشخصي ');
INSERT INTO `keyword` VALUES ('189', 'بيانات الحساب');
INSERT INTO `keyword` VALUES ('190', 'حجوزاتي');
INSERT INTO `keyword` VALUES ('191', 'تعديل');
INSERT INTO `keyword` VALUES ('192', 'الاسم المستخدم الجديد');
INSERT INTO `keyword` VALUES ('193', 'من فضلك ادخل الاسم الجديد');
INSERT INTO `keyword` VALUES ('194', 'كلمه المرور الحالية');
INSERT INTO `keyword` VALUES ('195', 'من فضلك ادخل كلمه المرور الحالي');
INSERT INTO `keyword` VALUES ('196', 'حفظ');
INSERT INTO `keyword` VALUES ('197', 'البريد الالكتروني ');
INSERT INTO `keyword` VALUES ('198', 'البريد الالكتروني الجديد ');
INSERT INTO `keyword` VALUES ('199', 'من فضلك ادخل البريد الالكتروني الجديد');
INSERT INTO `keyword` VALUES ('200', 'من فضلك ادخل كلمه المرور الحاليه');
INSERT INTO `keyword` VALUES ('201', 'كلمه المرور');
INSERT INTO `keyword` VALUES ('202', 'كلمة المرور الجديدة ');
INSERT INTO `keyword` VALUES ('203', 'من فضلك ادخل كلمه المرور الجديدة');
INSERT INTO `keyword` VALUES ('204', 'التاريخ');
INSERT INTO `keyword` VALUES ('205', 'الرحلة');
INSERT INTO `keyword` VALUES ('206', 'اختر شكل العرض');
INSERT INTO `keyword` VALUES ('207', 'جنيه');
INSERT INTO `keyword` VALUES ('208', 'تعليق');
INSERT INTO `keyword` VALUES ('209', 'ابحث');
INSERT INTO `keyword` VALUES ('210', 'تفاصيل الرحلة');
INSERT INTO `keyword` VALUES ('211', 'سعر الرحلة');
INSERT INTO `keyword` VALUES ('212', 'برنامج الرحلة');
INSERT INTO `keyword` VALUES ('213', 'في الفترة من');
INSERT INTO `keyword` VALUES ('214', 'إلى');
INSERT INTO `keyword` VALUES ('215', 'نوع الغرفه');
INSERT INTO `keyword` VALUES ('216', 'الشروط');
INSERT INTO `keyword` VALUES ('217', 'عدد الأفراد');
INSERT INTO `keyword` VALUES ('218', 'عدد الغرف');
INSERT INTO `keyword` VALUES ('219', 'تفضيل السرير');
INSERT INTO `keyword` VALUES ('220', 'لا يوجد');
INSERT INTO `keyword` VALUES ('221', 'الأسعار للغرف');
INSERT INTO `keyword` VALUES ('222', ' يتضمن');
INSERT INTO `keyword` VALUES ('223', ' لا يتضمن');
INSERT INTO `keyword` VALUES ('224', ' احجز');
INSERT INTO `keyword` VALUES ('225', ' تأكيد فوري');
INSERT INTO `keyword` VALUES ('226', ' سفارى  رحلات المتعة');
INSERT INTO `keyword` VALUES ('227', 'معلومات تهمك');
INSERT INTO `keyword` VALUES ('228', 'التعليقات');
INSERT INTO `keyword` VALUES ('229', 'تسجيل الدخول اولا');
INSERT INTO `keyword` VALUES ('230', 'غرفة واحدة بسعر ');
INSERT INTO `keyword` VALUES ('231', 'احجز');
INSERT INTO `keyword` VALUES ('232', 'انت بالفعل حصلت علي افضل الاسعار');
INSERT INTO `keyword` VALUES ('233', 'تأكيد فوري');
INSERT INTO `keyword` VALUES ('234', 'غرفتين بسعر');
INSERT INTO `keyword` VALUES ('235', 'غرف بسعر');
INSERT INTO `keyword` VALUES ('236', 'اختر الغرفة اولا');
INSERT INTO `keyword` VALUES ('237', 'تسجيل الدخول');
INSERT INTO `keyword` VALUES ('238', 'فتح حسابك');
INSERT INTO `keyword` VALUES ('239', 'جنية');
INSERT INTO `keyword` VALUES ('240', 'شاهد الفيديو');
INSERT INTO `keyword` VALUES ('241', 'خريطة المكان');
INSERT INTO `keyword` VALUES ('242', 'عروض وتخفيضات');
INSERT INTO `keyword` VALUES ('243', 'لا توجد تعليقات');
INSERT INTO `keyword` VALUES ('244', 'مرحبا بكم فى موقع احجز لى');
INSERT INTO `keyword` VALUES ('245', 'أدخل عنوان بريدك الألكتروني');
INSERT INTO `keyword` VALUES ('247', 'اكتب بريديك هنا');
INSERT INTO `keyword` VALUES ('248', 'لا توجد خريطة للفندق الان ');
INSERT INTO `keyword` VALUES ('249', 'اترك تعليقك');
INSERT INTO `keyword` VALUES ('250', 'من فضلك ادخل اسم المستخدم');
INSERT INTO `keyword` VALUES ('251', 'من فضلك ادخل كلمة السر');
INSERT INTO `keyword` VALUES ('252', 'تذكرنى');
INSERT INTO `keyword` VALUES ('253', 'نسيت كلمة المرور');
INSERT INTO `keyword` VALUES ('254', 'سجل دخولك');
INSERT INTO `keyword` VALUES ('255', 'سجل دخولك عن طريق الفيس بوك');
INSERT INTO `keyword` VALUES ('256', 'فقط ادخل البريد الالكتروني الذي قمت بتسجيل حسابك به');
INSERT INTO `keyword` VALUES ('257', 'من فضلك ادخل البريد الالكتروني الخاص بك');
INSERT INTO `keyword` VALUES ('258', 'استعاده كلمه المرور');
INSERT INTO `keyword` VALUES ('259', 'الغاء');
INSERT INTO `keyword` VALUES ('260', 'فتح حساب');
INSERT INTO `keyword` VALUES ('261', 'من فضلك ادخل بريدك الالكتروني');
INSERT INTO `keyword` VALUES ('262', 'من فضلك ادخل تأكيد كلمة السر');
INSERT INTO `keyword` VALUES ('263', 'افتح حسابك');
INSERT INTO `keyword` VALUES ('264', 'اضف تعليق');
INSERT INTO `keyword` VALUES ('265', 'التعليق');
INSERT INTO `keyword` VALUES ('266', 'اضف تعلقيك');
INSERT INTO `keyword` VALUES ('267', 'عنوان');
INSERT INTO `keyword` VALUES ('268', 'من فضلك أدخل العنوان');
INSERT INTO `keyword` VALUES ('269', 'من فضلك أدخل التعليق');
INSERT INTO `keyword` VALUES ('270', 'هذا الاسم موجود .. من فضلك ادخل اسم اخر');
INSERT INTO `keyword` VALUES ('271', 'هذا البريد الالكترونى موجود .. من فضلك ادخل بريد اخر');
INSERT INTO `keyword` VALUES ('272', 'من فضلك أدخل الأسم');
INSERT INTO `keyword` VALUES ('273', 'من فضلك أدخل كلمة السر');
INSERT INTO `keyword` VALUES ('274', 'من فضلك أدخل البريد الأكترونى');
INSERT INTO `keyword` VALUES ('275', 'من فضلك أدخل البريد الأكترونى بشكل صحيح');
INSERT INTO `keyword` VALUES ('276', 'من فضلك اعد كتابة كلمة السر');
INSERT INTO `keyword` VALUES ('277', 'لابد من تطابق كلمة السر');
INSERT INTO `keyword` VALUES ('278', 'من فضلك ادخل رمز التحقق');
INSERT INTO `keyword` VALUES ('279', 'يرجى مراجعة');
INSERT INTO `keyword` VALUES ('280', 'استعادة كلمة السر');
INSERT INTO `keyword` VALUES ('281', 'من فضلك ادخل بريد الكترونى وسوف تصلك رسالة استعادة كلمة السر');
INSERT INTO `keyword` VALUES ('282', 'من فضلك أدخل الرسالة');
INSERT INTO `keyword` VALUES ('283', 'رقم الهاتف أرقام فقط');
INSERT INTO `keyword` VALUES ('284', 'رقم الموبايل  أرقام فقط');
INSERT INTO `keyword` VALUES ('285', 'رمز التحقق غير صحيح');
INSERT INTO `keyword` VALUES ('286', 'شكرا لك سوف تصلك الان رسالة التفعيل على بريد الالكترونى .');
INSERT INTO `keyword` VALUES ('287', 'هذا الرابط غير موجود');
INSERT INTO `keyword` VALUES ('288', 'شكراً لك , سوف تستقبل الرسائل على البريد ');
INSERT INTO `keyword` VALUES ('289', 'طرق الدفع  ');
INSERT INTO `keyword` VALUES ('290', 'المزيد');
INSERT INTO `keyword` VALUES ('291', 'نتائج البحث');
INSERT INTO `keyword` VALUES ('292', 'من فضلك ادخل الهاتف');
INSERT INTO `keyword` VALUES ('293', 'من فضلك ادخل الرابط');
INSERT INTO `keyword` VALUES ('294', 'من فضلك أدخل الرابط  بشكل صحيح');
INSERT INTO `keyword` VALUES ('295', 'اسم المستخدم');
INSERT INTO `keyword` VALUES ('296', 'طريقة الدفع');
INSERT INTO `keyword` VALUES ('297', 'يتم التحصيل مباشرة');
INSERT INTO `keyword` VALUES ('298', 'استكمال');
INSERT INTO `keyword` VALUES ('299', 'تم الحجز');
INSERT INTO `keyword` VALUES ('300', 'معلقة');
INSERT INTO `keyword` VALUES ('301', ' الغاء عملية الدفع');
INSERT INTO `keyword` VALUES ('302', 'تم الغاء عملية الدفع من العميل');

-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `location_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', 'شرم الشيخ', 'شرم الشيخ', '63', 'sharm-el-shakh', '3655-travel_3.jpg');
INSERT INTO `location` VALUES ('2', 'الغردقة', 'الغردقة', '63', 'hurghada', '6063-travel_2.jpg');
INSERT INTO `location` VALUES ('4', 'أسوان', 'الاقصر واسوان', '63', 'aswan', '7752-travel_1.jpg');
INSERT INTO `location` VALUES ('5', 'الجونة', 'الجونة', '63', 'jona', '5649-travel_4.jpg');
INSERT INTO `location` VALUES ('7', 'العين السخنة', 'العين السخنة', '63', 'al-sokhna', '6973-travel_8.jpg');
INSERT INTO `location` VALUES ('8', 'القاهرة', 'القاهرة', '63', 'cairo', '5101-travel_4.jpg');
INSERT INTO `location` VALUES ('9', 'اﻻسكندرية', 'اسكندرية', '63', 'alexandria', '4007-travel_5.jpg');
INSERT INTO `location` VALUES ('10', 'دبى', 'دبى', '222', 'dobi', '9026-offer-slider-1.jpg');

-- ----------------------------
-- Table structure for `newsletter`
-- ----------------------------
DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of newsletter
-- ----------------------------
INSERT INTO `newsletter` VALUES ('40', 'test@ukprosolutions.com');
INSERT INTO `newsletter` VALUES ('71', 'm.ali@egprosolutions.com');
INSERT INTO `newsletter` VALUES ('42', 'm.amer@ukprosolutions.com');

-- ----------------------------
-- Table structure for `newsletter_message`
-- ----------------------------
DROP TABLE IF EXISTS `newsletter_message`;
CREATE TABLE `newsletter_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_bin,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_sent` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `start_flag` tinyint(4) DEFAULT NULL,
  `end_flag` tinyint(4) DEFAULT NULL,
  `temp1` tinyint(4) DEFAULT NULL,
  `temp2` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of newsletter_message
-- ----------------------------
INSERT INTO `newsletter_message` VALUES ('6', 0x3C703E0D0A093C6120687265663D22687474703A2F2F3139322E3136382E312E3230302F70726F6A656374732F66696E616C776F726B2F7969695F74656D706C617465223E3C7370616E207374796C653D226261636B67726F756E642D636F6C6F723A236666303030303B223E74657374206E6577736C65747465722066726F6D206E6577205949492074656D706C617465203C2F7370616E3E3C2F613E3C2F703E0D0A3C703E0D0A09266E6273703B3C2F703E0D0A3C703E0D0A093C7374726F6E673E4C6F72656D20697073756D203C2F7374726F6E673E646F6C6F722073697420616D65742C20636F6E7365637465747565722061646970697363696E6720656C69742E204D616563656E6173206665756769617420636F6E736571756174206469616D2E204D616563656E6173206D657475732E20566976616D7573206469616D2070757275732C2063757273757320612C20636F6D6D6F646F206E6F6E2C20666163696C697369732076697461652C206E756C6C612E2041656E65613C656D3E3C753E6E2064696374756D206C6163696E696120746F72746F722E204E756E6320696163756C69732C206E696268206E6F6E3C2F753E3C2F656D3E20696163756C697320616C697175616D2C206F7263692066656C697320657569736D6F64206E657175652C20736564206F726E617265206D61737361206D6175726973207365642076656C69742E204E756C6C61207072657469756D206D692065742072697375732E204675736365206D6920706564652C2074656D706F722069642C206375727375732061632C20756C6C616D636F72706572206E65632C20656E696D2E2053656420746F72746F722E20437572616269747572206D6F6C65737469652E20447569732076656C69742061756775652C20636F6E64696D656E74756D2061742C20756C74726963657320613C2F703E0D0A3C703E0D0A09266E6273703B3C2F703E0D0A3C6872202F3E0D0A3C703E0D0A09266E6273703B3C2F703E0D0A3C703E0D0A09266E6273703B3C2F703E0D0A, 'Testing Daily Newsletter', '42,41,40', '2013-12-30 08:56:06', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('7', '', 'test', '71', '2014-06-08 06:29:59', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('8', 0x686467676767676B, 'test', '71', '2014-06-08 06:45:32', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('9', 0x686467676767676B, 'test', '71', '2014-06-08 06:48:28', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('10', 0x686467676767676B, 'test', '71', '2014-06-08 06:49:40', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('11', 0x6766646766, 'fgd', '71', '2014-06-08 06:56:33', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('12', 0x6766, 'gf', '71', '2014-06-08 08:19:19', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('13', 0x74657374, 'test', '71,40', '2014-06-08 08:21:41', null, null, null, null);
INSERT INTO `newsletter_message` VALUES ('14', 0x74657374, 'test', '71', '2014-06-08 08:24:44', null, null, null, null);

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `intro` text COLLATE utf8_bin,
  `intro_ar` text COLLATE utf8_bin,
  `details` text COLLATE utf8_bin,
  `details_ar` text COLLATE utf8_bin,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` text COLLATE utf8_bin,
  `meta_desc` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('4', 'من احجز لى', 'من احجز لى ؟', 'about-a7gezly', '', '', 0x3C703E0D0A09546865726520617265206D616E79207479706573206F6620746578747320617661696C61626C6520666F7220576F6F72696D204570736F6D2C2062757420746865206D616A6F726974792068617665206265656E206D6F64696669656420696E20736F6D652077617920627920696E74726F647563696E6720736F6D6520616E6563646F746573206F722072616E646F6D20776F72647320746F20746578742E20546865726520617265206D616E79207479706573206F6620746578747320617661696C61626C6520666F7220576F6F72696D204570736F6D2C2062757420746865206D616A6F726974792068617665206265656E206D6F64696669656420696E20736F6D652077617920627920696E74726F647563696E6720736F6D6520616E6563646F746573206F722072616E646F6D20776F72647320746F20746578742E20546865726520617265206D616E79207479706573206F6620746578747320617661696C61626C6520666F7220576F6F72696D204570736F6D2C2062757420746865206D616A6F726974792068617665206265656E206D6F64696669656420696E20736F6D652077617920627920696E74726F647563696E6720736F6D6520616E6563646F746573206F722072616E646F6D20776F72647320746F20746578743C2F703E0D0A, 0x3C703E0D0A09D987D986D8A7D984D98320D8A7D984D8B9D8AFD98AD8AF20D985D98620D8A7D984D8A3D986D988D8A7D8B920D8A7D984D985D8AAD988D981D8B1D8A920D984D986D8B5D988D8B520D984D988D8B1D98AD98520D8A5D98AD8A8D8B3D988D985D88C20D988D984D983D98620D8A7D984D8BAD8A7D984D8A8D98AD8A920D8AAD98520D8AAD8B9D8AFD98AD984D987D8A720D8A8D8B4D983D98420D985D8A720D8B9D8A8D8B120D8A5D8AFD8AED8A7D98420D8A8D8B9D8B620D8A7D984D986D988D8A7D8AFD8B120D8A3D98820D8A7D984D983D984D985D8A7D8AA20D8A7D984D8B9D8B4D988D8A7D8A6D98AD8A920D8A5D984D98920D8A7D984D986D8B52E20D987D986D8A7D984D98320D8A7D984D8B9D8AFD98AD8AF20D985D98620D8A7D984D8A3D986D988D8A7D8B920D8A7D984D985D8AAD988D981D8B1D8A920D984D986D8B5D988D8B520D984D988D8B1D98AD98520D8A5D98AD8A8D8B3D988D985D88C20D988D984D983D98620D8A7D984D8BAD8A7D984D8A8D98AD8A920D8AAD98520D8AAD8B9D8AFD98AD984D987D8A720D8A8D8B4D983D98420D985D8A720D8B9D8A8D8B120D8A5D8AFD8AED8A7D98420D8A8D8B9D8B620D8A7D984D986D988D8A7D8AFD8B120D8A3D98820D8A7D984D983D984D985D8A7D8AA20D8A7D984D8B9D8B4D988D8A7D8A6D98AD8A920D8A5D984D98920D8A7D984D986D8B52E20D987D986D8A7D984D98320D8A7D984D8B9D8AFD98AD8AF20D985D98620D8A7D984D8A3D986D988D8A7D8B920D8A7D984D985D8AAD988D981D8B1D8A920D984D986D8B5D988D8B520D984D988D8B1D98AD98520D8A5D98AD8A8D8B3D988D985D88C20D988D984D983D98620D8A7D984D8BAD8A7D984D8A8D98AD8A920D8AAD98520D8AAD8B9D8AFD98AD984D987D8A720D8A8D8B4D983D98420D985D8A720D8B9D8A8D8B120D8A5D8AFD8AED8A7D98420D8A8D8B9D8B620D8A7D984D986D988D8A7D8AFD8B120D8A3D98820D8A7D984D983D984D985D8A7D8AA20D8A7D984D8B9D8B4D988D8A7D8A6D98AD8A920D8A5D984D98920D8A7D984D986D8B53C2F703E0D0A, 'favicon.png', '', '1', '', '', '');
INSERT INTO `pages` VALUES ('9', '  كيف تصل إلى مقرنا', 'كيف تصل إلى مقرنا', 'find-us', '', '', '', '', '4045-item_h.jpg', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('10', ' لماذا احجز لى ؟', 'لماذا احجز لى ؟', 'why-a7gezly', '', '', '', '', '7331-favicon.png', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('11', 'اختيار اللغة', null, 'test-lang', '', null, '', null, '', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('15', 'باى بال', null, 'paypal', null, null, 0xD986D8A8D8B0D8A920D8B9D98620D8A7D984D8A8D8A7D98920D8A8D8A7D984, null, '3096-paypal.png', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('16', 'اتصل بنا', null, 'contact-us', null, null, 0xD986D8A8D8B0D8A920D8B9D98620D8A7D8AAD8B5D98420D8A8D986D8A7, null, '6674-contact.png', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('17', 'الدفع كاش', null, 'cash-on-delivery', null, null, 0xD986D8A8D8B0D8A920D8B9D98620D8A7D984D983D8A7D8B4, null, '9910-cash.jpg', '', '0', '', '', '');
INSERT INTO `pages` VALUES ('18', 'طلب اتصال', null, 'request-a-call-back', null, null, 0xD986D8A8D8B0D8A920D8B9D98620D983D988D98420D8A8D8A7D983, null, '6149-callback.png', '', '0', '', '', '');

-- ----------------------------
-- Table structure for `price_range`
-- ----------------------------
DROP TABLE IF EXISTS `price_range`;
CREATE TABLE `price_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of price_range
-- ----------------------------
INSERT INTO `price_range` VALUES ('1', '500-1000', '500-1000', null);
INSERT INTO `price_range` VALUES ('2', '100-500', '100-500', null);

-- ----------------------------
-- Table structure for `property`
-- ----------------------------
DROP TABLE IF EXISTS `property`;
CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of property
-- ----------------------------
INSERT INTO `property` VALUES ('25', 'مكيف', '2558-images.jpeg');

-- ----------------------------
-- Table structure for `room_bed_relation`
-- ----------------------------
DROP TABLE IF EXISTS `room_bed_relation`;
CREATE TABLE `room_bed_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(11) DEFAULT NULL,
  `bed_type_id` int(11) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  `temp2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_type_id` (`room_type_id`),
  KEY `bed_type_id` (`bed_type_id`),
  CONSTRAINT `room_bed_relation_ibfk_2` FOREIGN KEY (`bed_type_id`) REFERENCES `bed_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_bed_relation
-- ----------------------------
INSERT INTO `room_bed_relation` VALUES ('1', '3', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('18', '13', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('22', '15', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('23', '17', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('29', '20', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('30', '20', '2', null, null);
INSERT INTO `room_bed_relation` VALUES ('35', '18', '1', null, null);
INSERT INTO `room_bed_relation` VALUES ('36', '18', '2', null, null);

-- ----------------------------
-- Table structure for `room_codition_relation`
-- ----------------------------
DROP TABLE IF EXISTS `room_codition_relation`;
CREATE TABLE `room_codition_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(11) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  `temp2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_type_id` (`room_type_id`),
  KEY `condition_id` (`condition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_codition_relation
-- ----------------------------
INSERT INTO `room_codition_relation` VALUES ('28', '13', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('30', '15', '2', null, null);
INSERT INTO `room_codition_relation` VALUES ('31', '16', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('32', '17', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('46', '20', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('47', '20', '2', null, null);
INSERT INTO `room_codition_relation` VALUES ('52', '19', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('53', '19', '2', null, null);
INSERT INTO `room_codition_relation` VALUES ('54', '18', '1', null, null);
INSERT INTO `room_codition_relation` VALUES ('55', '18', '2', null, null);

-- ----------------------------
-- Table structure for `room_condition`
-- ----------------------------
DROP TABLE IF EXISTS `room_condition`;
CREATE TABLE `room_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` text,
  `condition_ar` text,
  `persons_no` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_condition
-- ----------------------------
INSERT INTO `room_condition` VALUES ('1', 'الدفع لاحقا', 'الدفع لاحقا', '3', '100.00');
INSERT INTO `room_condition` VALUES ('2', 'شامل الافطار', 'شامل الافطار', '1', '10.00');

-- ----------------------------
-- Table structure for `room_option`
-- ----------------------------
DROP TABLE IF EXISTS `room_option`;
CREATE TABLE `room_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `desc` text,
  `desc_ar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_option
-- ----------------------------
INSERT INTO `room_option` VALUES ('1', 'تليفزيون بشاشة مسطحة', 'شاشة عرض', '<p>\r\n	التفاصيل</p>\r\n', '');
INSERT INTO `room_option` VALUES ('2', 'مكيف هواء', 'مكيف هواء', '', '');
INSERT INTO `room_option` VALUES ('3', 'تقع امام البحر مباشرة ', 'تليفزيون بشاشة مسطحة', '', '');

-- ----------------------------
-- Table structure for `room_option_relation`
-- ----------------------------
DROP TABLE IF EXISTS `room_option_relation`;
CREATE TABLE `room_option_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(11) DEFAULT NULL,
  `room_option_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_option_relation
-- ----------------------------
INSERT INTO `room_option_relation` VALUES ('1', '5', '1');
INSERT INTO `room_option_relation` VALUES ('2', '11', '1');
INSERT INTO `room_option_relation` VALUES ('3', '12', '1');
INSERT INTO `room_option_relation` VALUES ('16', '13', '1');
INSERT INTO `room_option_relation` VALUES ('17', '17', '1');
INSERT INTO `room_option_relation` VALUES ('32', '20', '1');
INSERT INTO `room_option_relation` VALUES ('33', '20', '2');
INSERT INTO `room_option_relation` VALUES ('34', '20', '3');
INSERT INTO `room_option_relation` VALUES ('37', '19', '1');
INSERT INTO `room_option_relation` VALUES ('38', '18', '1');

-- ----------------------------
-- Table structure for `room_type`
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `max_person` int(10) DEFAULT NULL,
  `room_option_id` int(11) DEFAULT NULL,
  `min_person` int(10) DEFAULT NULL,
  `tax_included` varchar(255) DEFAULT NULL,
  `tax_excluded` varchar(255) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  `temp2` varchar(255) DEFAULT NULL,
  `temp3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_id` (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES ('18', 'غرفة مذدوجه (سريرين)', 'غرفة مذدوجه (سريرين)', '1', '44', '502', '5', null, '2', '33', '55', null, null, null);
INSERT INTO `room_type` VALUES ('19', 'غرفة ثلاثية', 'غرفة ثلاثية', '1', '35', '504', '3', null, '1', '10 ضربية', 'EUR 3 ضريبة المدينة للشخص الواحد لليلة الواحده', null, null, null);

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `press_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `blog_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `temp1` tinyint(4) DEFAULT NULL,
  `temp2` tinyint(4) DEFAULT NULL,
  `temp3` tinyint(4) DEFAULT NULL,
  `temp4` tinyint(4) DEFAULT NULL,
  `api_username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `api_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_fee` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypalextra_fee` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `site_commession` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_live` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'https://www.facebook.com/', 'http://www.youtube.com/', 'http://www.google.com', 'http://twitter.com/', 'http://pinterest.com', 'website@website.com', 'press@website.com', 'support@website.com ', 'blog@website.com ', 'website@website.com', '0', '0', '0', '0', 'ahmed.hany.fawzy-facilitator_api1.hotmail.com', 'AA86G2K284HDV3L2', 'ArcoIsSBiDf1YkCyrHH34-M8jKo3AhzsU7eWzVM9-3t50NlXZqMw6JiR', '', '', '', '152542866', '454557', '52542525', '', '0');

-- ----------------------------
-- Table structure for `translations`
-- ----------------------------
DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute` (`attribute`),
  KEY `table_name` (`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=43862 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translations
-- ----------------------------
INSERT INTO `translations` VALUES ('43538', 'pages', '11', 'title', 'en', 'test lang');
INSERT INTO `translations` VALUES ('43539', 'pages', '11', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43540', 'pages', '11', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43541', 'pages', '11', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43542', 'pages', '11', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43543', 'pages', '4', 'title', 'en', 'About A7gezly ?');
INSERT INTO `translations` VALUES ('43544', 'pages', '4', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43545', 'pages', '4', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43546', 'pages', '4', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43547', 'pages', '4', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43548', 'categories', '1', 'title', 'en', ' Internal trips');
INSERT INTO `translations` VALUES ('43549', 'location', '1', 'title', 'en', 'Sharm el shakh');
INSERT INTO `translations` VALUES ('43550', 'hotels', '1', 'title', 'en', 'mariott');
INSERT INTO `translations` VALUES ('43551', 'hotels', '1', 'desc', 'en', '	details\r\n');
INSERT INTO `translations` VALUES ('43552', 'hotels_level', '1', 'title', 'en', 'five stars');
INSERT INTO `translations` VALUES ('43556', 'room_type', '18', 'title', 'en', 'double room');
INSERT INTO `translations` VALUES ('43557', 'room_type', '18', 'tax_included', 'en', '');
INSERT INTO `translations` VALUES ('43558', 'room_type', '18', 'tax_excluded', 'en', '');
INSERT INTO `translations` VALUES ('43559', 'room_condition', '1', 'condition', 'en', 'pay later');
INSERT INTO `translations` VALUES ('43560', 'room_option', '1', 'title', 'en', 'lcd');
INSERT INTO `translations` VALUES ('43561', 'room_option', '1', 'desc', 'en', '<p>\r\n	details</p>\r\n');
INSERT INTO `translations` VALUES ('43562', 'bed_type', '1', 'title', 'en', 'Double');
INSERT INTO `translations` VALUES ('43563', 'price_range', '1', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43564', 'days', '1', 'title', 'en', '4 days');
INSERT INTO `translations` VALUES ('43565', 'trip', '101', 'title', 'en', 'test trip*');
INSERT INTO `translations` VALUES ('43566', 'trip', '101', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43567', 'trip', '101', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43568', 'trip', '101', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43569', 'ads', '2', 'title', 'en', '1');
INSERT INTO `translations` VALUES ('43570', 'banner', '3', 'title', 'en', '2');
INSERT INTO `translations` VALUES ('43571', 'banner', '3', 'desc', 'en', '');
INSERT INTO `translations` VALUES ('43572', 'home_slider', '2', 'title', 'en', 'gfdg');
INSERT INTO `translations` VALUES ('43573', 'categories', '2', 'title', 'en', 'Extelnal trips');
INSERT INTO `translations` VALUES ('43574', 'categories', '3', 'title', 'en', 'Al gaj');
INSERT INTO `translations` VALUES ('43575', 'categories', '4', 'title', 'en', 'One day trips');
INSERT INTO `translations` VALUES ('43576', 'categories', '5', 'title', 'en', 'Hanymoon ');
INSERT INTO `translations` VALUES ('43577', 'categories', '6', 'title', 'en', 'Airline tickets');
INSERT INTO `translations` VALUES ('43578', 'categories', '7', 'title', 'en', 'Car');
INSERT INTO `translations` VALUES ('43580', 'keyword', '146', 'title', 'en', 'Home');
INSERT INTO `translations` VALUES ('43581', 'keyword', '147', 'title', 'en', 'Contact us');
INSERT INTO `translations` VALUES ('43582', 'keyword', '148', 'title', 'en', 'Advertise with us');
INSERT INTO `translations` VALUES ('43583', 'keyword', '149', 'title', 'en', 'Our numbers');
INSERT INTO `translations` VALUES ('43584', 'keyword', '150', 'title', 'en', 'Logout');
INSERT INTO `translations` VALUES ('43585', 'keyword', '151', 'title', 'en', 'Your account');
INSERT INTO `translations` VALUES ('43586', 'keyword', '152', 'title', 'en', 'Important links');
INSERT INTO `translations` VALUES ('43587', 'keyword', '153', 'title', 'en', 'Subscribe in our newsletter');
INSERT INTO `translations` VALUES ('43588', 'keyword', '154', 'title', 'en', 'Be the first to know');
INSERT INTO `translations` VALUES ('43589', 'keyword', '155', 'title', 'en', 'Get our offers ');
INSERT INTO `translations` VALUES ('43590', 'keyword', '156', 'title', 'en', 'Send your data');
INSERT INTO `translations` VALUES ('43591', 'keyword', '157', 'title', 'en', 'Follow us');
INSERT INTO `translations` VALUES ('43592', 'keyword', '158', 'title', 'en', 'Privacy  in opening your account and be the first to know');
INSERT INTO `translations` VALUES ('43593', 'keyword', '159', 'title', 'en', 'Back to top');
INSERT INTO `translations` VALUES ('43594', 'keyword', '160', 'title', 'en', 'Choose city');
INSERT INTO `translations` VALUES ('43595', 'keyword', '161', 'title', 'en', 'Hotel level');
INSERT INTO `translations` VALUES ('43596', 'keyword', '162', 'title', 'en', 'Days no.');
INSERT INTO `translations` VALUES ('43597', 'keyword', '163', 'title', 'en', ' Days');
INSERT INTO `translations` VALUES ('43598', 'keyword', '164', 'title', 'en', 'Price');
INSERT INTO `translations` VALUES ('43599', 'keyword', '165', 'title', 'en', 'Enjoy with e7gzly offers');
INSERT INTO `translations` VALUES ('43600', 'keyword', '166', 'title', 'en', 'Show details');
INSERT INTO `translations` VALUES ('43601', 'keyword', '167', 'title', 'en', 'Choose your trip');
INSERT INTO `translations` VALUES ('43602', 'keyword', '168', 'title', 'en', 'Places on our trips list');
INSERT INTO `translations` VALUES ('43603', 'keyword', '169', 'title', 'en', 'Choose language');
INSERT INTO `translations` VALUES ('43604', 'keyword', '170', 'title', 'en', 'Home');
INSERT INTO `translations` VALUES ('43605', 'keyword', '171', 'title', 'en', 'Contact us');
INSERT INTO `translations` VALUES ('43606', 'keyword', '172', 'title', 'en', 'Name');
INSERT INTO `translations` VALUES ('43607', 'keyword', '173', 'title', 'en', 'E-mail');
INSERT INTO `translations` VALUES ('43608', 'keyword', '174', 'title', 'en', 'Phone');
INSERT INTO `translations` VALUES ('43609', 'keyword', '175', 'title', 'en', 'Mobile');
INSERT INTO `translations` VALUES ('43610', 'keyword', '176', 'title', 'en', 'Address');
INSERT INTO `translations` VALUES ('43611', 'keyword', '177', 'title', 'en', 'Message');
INSERT INTO `translations` VALUES ('43612', 'keyword', '178', 'title', 'en', 'Verification Code');
INSERT INTO `translations` VALUES ('43613', 'keyword', '179', 'title', 'en', 'Send');
INSERT INTO `translations` VALUES ('43614', 'keyword', '180', 'title', 'en', 'Choose price');
INSERT INTO `translations` VALUES ('43615', 'keyword', '181', 'title', 'en', 'Search our trips and choose your trip');
INSERT INTO `translations` VALUES ('43616', 'keyword', '182', 'title', 'en', 'Advertise with us');
INSERT INTO `translations` VALUES ('43617', 'keyword', '183', 'title', 'en', 'Link');
INSERT INTO `translations` VALUES ('43618', 'keyword', '184', 'title', 'en', 'Image');
INSERT INTO `translations` VALUES ('43619', 'keyword', '185', 'title', 'en', 'Mobile');
INSERT INTO `translations` VALUES ('43620', 'keyword', '186', 'title', 'en', 'Phone');
INSERT INTO `translations` VALUES ('43621', 'keyword', '187', 'title', 'en', 'Fax');
INSERT INTO `translations` VALUES ('43622', 'keyword', '188', 'title', 'en', 'Profile');
INSERT INTO `translations` VALUES ('43623', 'keyword', '189', 'title', 'en', 'Account info.');
INSERT INTO `translations` VALUES ('43624', 'keyword', '190', 'title', 'en', 'My bookings');
INSERT INTO `translations` VALUES ('43625', 'keyword', '191', 'title', 'en', 'Edit');
INSERT INTO `translations` VALUES ('43626', 'keyword', '192', 'title', 'en', 'New username');
INSERT INTO `translations` VALUES ('43627', 'keyword', '193', 'title', 'en', 'Please enter new username');
INSERT INTO `translations` VALUES ('43628', 'keyword', '194', 'title', 'en', 'Current password');
INSERT INTO `translations` VALUES ('43629', 'keyword', '195', 'title', 'en', 'Please enter your password');
INSERT INTO `translations` VALUES ('43630', 'keyword', '196', 'title', 'en', 'Save');
INSERT INTO `translations` VALUES ('43631', 'keyword', '197', 'title', 'en', 'E-mail');
INSERT INTO `translations` VALUES ('43632', 'keyword', '198', 'title', 'en', 'New e-mail');
INSERT INTO `translations` VALUES ('43633', 'keyword', '199', 'title', 'en', 'Please enter your new email');
INSERT INTO `translations` VALUES ('43634', 'keyword', '200', 'title', 'en', 'Please enter your password');
INSERT INTO `translations` VALUES ('43635', 'keyword', '201', 'title', 'en', 'Password');
INSERT INTO `translations` VALUES ('43636', 'keyword', '202', 'title', 'en', 'New password');
INSERT INTO `translations` VALUES ('43637', 'keyword', '203', 'title', 'en', 'Please enter your new password');
INSERT INTO `translations` VALUES ('43638', 'keyword', '204', 'title', 'en', 'Date');
INSERT INTO `translations` VALUES ('43639', 'keyword', '205', 'title', 'en', 'Trip');
INSERT INTO `translations` VALUES ('43640', 'keyword', '206', 'title', 'en', 'Choose view');
INSERT INTO `translations` VALUES ('43641', 'keyword', '207', 'title', 'en', 'L.E');
INSERT INTO `translations` VALUES ('43642', 'keyword', '208', 'title', 'en', 'تعليق_en');
INSERT INTO `translations` VALUES ('43643', 'keyword', '209', 'title', 'en', 'Search');
INSERT INTO `translations` VALUES ('43644', 'keyword', '210', 'title', 'en', 'Trip details');
INSERT INTO `translations` VALUES ('43645', 'keyword', '211', 'title', 'en', 'Trip price');
INSERT INTO `translations` VALUES ('43646', 'keyword', '212', 'title', 'en', 'Trip program');
INSERT INTO `translations` VALUES ('43647', 'keyword', '213', 'title', 'en', 'From');
INSERT INTO `translations` VALUES ('43648', 'keyword', '214', 'title', 'en', 'To');
INSERT INTO `translations` VALUES ('43649', 'keyword', '215', 'title', 'en', 'Room type');
INSERT INTO `translations` VALUES ('43650', 'keyword', '216', 'title', 'en', 'Conditions');
INSERT INTO `translations` VALUES ('43651', 'keyword', '217', 'title', 'en', 'Persons no.');
INSERT INTO `translations` VALUES ('43652', 'keyword', '218', 'title', 'en', 'Rooms no.');
INSERT INTO `translations` VALUES ('43653', 'keyword', '219', 'title', 'en', 'Preference bed');
INSERT INTO `translations` VALUES ('43654', 'keyword', '220', 'title', 'en', 'No found');
INSERT INTO `translations` VALUES ('43655', 'keyword', '221', 'title', 'en', 'Rooms prices');
INSERT INTO `translations` VALUES ('43656', 'keyword', '222', 'title', 'en', 'Include');
INSERT INTO `translations` VALUES ('43657', 'keyword', '223', 'title', 'en', 'Exclude');
INSERT INTO `translations` VALUES ('43658', 'keyword', '224', 'title', 'en', 'Book');
INSERT INTO `translations` VALUES ('43659', 'keyword', '225', 'title', 'en', 'Immediate confirmation');
INSERT INTO `translations` VALUES ('43660', 'keyword', '226', 'title', 'en', 'Safari trips');
INSERT INTO `translations` VALUES ('43661', 'keyword', '227', 'title', 'en', 'Important info');
INSERT INTO `translations` VALUES ('43662', 'keyword', '228', 'title', 'en', 'Comments');
INSERT INTO `translations` VALUES ('43663', 'keyword', '229', 'title', 'en', 'please login first');
INSERT INTO `translations` VALUES ('43664', 'keyword', '230', 'title', 'en', 'Price of one room');
INSERT INTO `translations` VALUES ('43665', 'keyword', '231', 'title', 'en', 'Book');
INSERT INTO `translations` VALUES ('43666', 'keyword', '232', 'title', 'en', 'You already got the best price');
INSERT INTO `translations` VALUES ('43667', 'keyword', '233', 'title', 'en', 'Immediate confirmation');
INSERT INTO `translations` VALUES ('43668', 'keyword', '234', 'title', 'en', 'Price of two rooms');
INSERT INTO `translations` VALUES ('43669', 'keyword', '235', 'title', 'en', 'Price of rooms');
INSERT INTO `translations` VALUES ('43670', 'keyword', '236', 'title', 'en', 'Please choose rooms first');
INSERT INTO `translations` VALUES ('43671', 'keyword', '237', 'title', 'en', 'Login');
INSERT INTO `translations` VALUES ('43672', 'keyword', '238', 'title', 'en', 'Registration');
INSERT INTO `translations` VALUES ('43673', 'keyword', '239', 'title', 'en', 'L.E');
INSERT INTO `translations` VALUES ('43674', 'keyword', '240', 'title', 'en', 'Watch video');
INSERT INTO `translations` VALUES ('43675', 'keyword', '241', 'title', 'en', 'Map');
INSERT INTO `translations` VALUES ('43676', 'keyword', '242', 'title', 'en', 'Offers');
INSERT INTO `translations` VALUES ('43677', 'pages', '9', 'title', 'en', 'Find Us');
INSERT INTO `translations` VALUES ('43678', 'pages', '9', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43679', 'pages', '9', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43680', 'pages', '9', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43681', 'pages', '9', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43682', 'pages', '10', 'title', 'en', 'Why A7gezly ?');
INSERT INTO `translations` VALUES ('43683', 'pages', '10', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43684', 'pages', '10', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43685', 'pages', '10', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43686', 'pages', '10', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43687', 'keyword', '146', 'title', 'en_us', 'Home');
INSERT INTO `translations` VALUES ('43688', 'categories', '1', 'title', 'en_us', 'internal trps');
INSERT INTO `translations` VALUES ('43689', 'keyword', '243', 'title', 'en', 'No comments');
INSERT INTO `translations` VALUES ('43690', 'keyword', '244', 'title', 'en', 'Welcome to e7gzly ');
INSERT INTO `translations` VALUES ('43691', 'keyword', '245', 'title', 'en', 'enter your email');
INSERT INTO `translations` VALUES ('43693', 'keyword', '247', 'title', 'en', 'enter your email');
INSERT INTO `translations` VALUES ('43694', 'location', '2', 'title', 'en', 'Hurghada');
INSERT INTO `translations` VALUES ('43695', 'location', '4', 'title', 'en', 'Aswan');
INSERT INTO `translations` VALUES ('43696', 'location', '5', 'title', 'en', 'Jona');
INSERT INTO `translations` VALUES ('43697', 'location', '7', 'title', 'en', 'Al sokhna');
INSERT INTO `translations` VALUES ('43698', 'location', '8', 'title', 'en', 'Cairo');
INSERT INTO `translations` VALUES ('43699', 'location', '9', 'title', 'en', 'Alexandria');
INSERT INTO `translations` VALUES ('43700', 'location', '10', 'title', 'en', 'Dobi');
INSERT INTO `translations` VALUES ('43701', 'keyword', '248', 'title', 'en', 'Map not found');
INSERT INTO `translations` VALUES ('43702', 'keyword', '249', 'title', 'en', 'leave your comment');
INSERT INTO `translations` VALUES ('43703', 'keyword', '250', 'title', 'en', 'please enter username');
INSERT INTO `translations` VALUES ('43704', 'keyword', '251', 'title', 'en', 'please enter password');
INSERT INTO `translations` VALUES ('43705', 'keyword', '252', 'title', 'en', 'Remember me');
INSERT INTO `translations` VALUES ('43706', 'keyword', '253', 'title', 'en', 'Foreget password');
INSERT INTO `translations` VALUES ('43707', 'keyword', '254', 'title', 'en', 'Login');
INSERT INTO `translations` VALUES ('43708', 'keyword', '255', 'title', 'en', 'Login by facebook');
INSERT INTO `translations` VALUES ('43709', 'keyword', '256', 'title', 'en', 'Please enter your email');
INSERT INTO `translations` VALUES ('43710', 'keyword', '257', 'title', 'en', 'Please enter your email');
INSERT INTO `translations` VALUES ('43711', 'keyword', '258', 'title', 'en', 'Reset password');
INSERT INTO `translations` VALUES ('43712', 'keyword', '259', 'title', 'en', 'Cancel');
INSERT INTO `translations` VALUES ('43713', 'keyword', '260', 'title', 'en', 'Registration');
INSERT INTO `translations` VALUES ('43714', 'keyword', '261', 'title', 'en', 'Enter your email');
INSERT INTO `translations` VALUES ('43715', 'keyword', '262', 'title', 'en', 'Re-type password');
INSERT INTO `translations` VALUES ('43716', 'keyword', '263', 'title', 'en', 'Register');
INSERT INTO `translations` VALUES ('43717', 'keyword', '264', 'title', 'en', 'Add comment');
INSERT INTO `translations` VALUES ('43718', 'keyword', '265', 'title', 'en', 'Comment');
INSERT INTO `translations` VALUES ('43719', 'keyword', '266', 'title', 'en', 'Add comment');
INSERT INTO `translations` VALUES ('43720', 'keyword', '267', 'title', 'en', 'Title');
INSERT INTO `translations` VALUES ('43721', 'keyword', '268', 'title', 'en', 'Please enter title');
INSERT INTO `translations` VALUES ('43722', 'keyword', '269', 'title', 'en', 'Please enter your comment');
INSERT INTO `translations` VALUES ('43723', 'keyword', '270', 'title', 'en', 'This name already exist .. please enter another one');
INSERT INTO `translations` VALUES ('43724', 'keyword', '271', 'title', 'en', 'This email already exist .. please enter another one');
INSERT INTO `translations` VALUES ('43725', 'keyword', '272', 'title', 'en', 'Please enter name');
INSERT INTO `translations` VALUES ('43726', 'keyword', '273', 'title', 'en', 'Please enter password');
INSERT INTO `translations` VALUES ('43727', 'keyword', '274', 'title', 'en', 'Please enter email');
INSERT INTO `translations` VALUES ('43728', 'keyword', '275', 'title', 'en', 'Please enter a valid email');
INSERT INTO `translations` VALUES ('43729', 'keyword', '276', 'title', 'en', 'Please re-type password');
INSERT INTO `translations` VALUES ('43730', 'keyword', '277', 'title', 'en', 'Password into two fields should be the same');
INSERT INTO `translations` VALUES ('43731', 'keyword', '278', 'title', 'en', 'Please enter verification code');
INSERT INTO `translations` VALUES ('43732', 'keyword', '279', 'title', 'en', 'Please fix');
INSERT INTO `translations` VALUES ('43733', 'keyword', '280', 'title', 'en', 'Reset password');
INSERT INTO `translations` VALUES ('43734', 'keyword', '281', 'title', 'en', 'من فضلك ادخل بريد الكترونى وسوف تصلك رسالة استعادة كلمة السر_en');
INSERT INTO `translations` VALUES ('43735', 'keyword', '282', 'title', 'en', 'Please enter message ');
INSERT INTO `translations` VALUES ('43736', 'keyword', '283', 'title', 'en', 'Phone should be only numbers');
INSERT INTO `translations` VALUES ('43737', 'keyword', '284', 'title', 'en', 'Mobile should be only numbers');
INSERT INTO `translations` VALUES ('43738', 'keyword', '285', 'title', 'en', 'Verification Code is wrong');
INSERT INTO `translations` VALUES ('43739', 'keyword', '286', 'title', 'en', 'Thank you .. we will send an activation link to your email');
INSERT INTO `translations` VALUES ('43740', 'keyword', '287', 'title', 'en', 'Sorry .. This link not found');
INSERT INTO `translations` VALUES ('43741', 'keyword', '288', 'title', 'en', 'Thank you .. you will recive our newsletters ');
INSERT INTO `translations` VALUES ('43759', 'keyword', '289', 'title', 'en', 'Payment way');
INSERT INTO `translations` VALUES ('43760', 'pages', '15', 'title', 'en', 'Paypal');
INSERT INTO `translations` VALUES ('43761', 'pages', '15', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43762', 'pages', '15', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43763', 'pages', '15', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43764', 'pages', '15', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43765', 'pages', '16', 'title', 'en', 'Contact us');
INSERT INTO `translations` VALUES ('43766', 'pages', '16', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43767', 'pages', '16', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43768', 'pages', '16', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43769', 'pages', '16', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43770', 'pages', '17', 'title', 'en', 'Cash on delivery');
INSERT INTO `translations` VALUES ('43771', 'pages', '17', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43772', 'pages', '17', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43773', 'pages', '17', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43774', 'pages', '17', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43775', 'pages', '18', 'title', 'en', 'Request a call back');
INSERT INTO `translations` VALUES ('43776', 'pages', '18', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43777', 'pages', '18', 'meta_author', 'en', '');
INSERT INTO `translations` VALUES ('43778', 'pages', '18', 'meta_keywords', 'en', '');
INSERT INTO `translations` VALUES ('43779', 'pages', '18', 'meta_desc', 'en', '');
INSERT INTO `translations` VALUES ('43780', 'keyword', '290', 'title', 'en', 'More info');
INSERT INTO `translations` VALUES ('43781', 'keyword', '291', 'title', 'en', 'نتائج البحث_en');
INSERT INTO `translations` VALUES ('43782', 'keyword', '292', 'title', 'en', 'من فضلك ادخل الهاتف_en');
INSERT INTO `translations` VALUES ('43783', 'keyword', '293', 'title', 'en', 'من فضلك ادخل الرابط_en');
INSERT INTO `translations` VALUES ('43784', 'keyword', '294', 'title', 'en', 'من فضلك أدخل الرابط  بشكل صحيح_en');
INSERT INTO `translations` VALUES ('43785', 'keyword', '295', 'title', 'en', 'اسم المستخدم_en');
INSERT INTO `translations` VALUES ('43786', 'keyword', '296', 'title', 'en', 'طريقة الدفع_en');
INSERT INTO `translations` VALUES ('43787', 'keyword', '297', 'title', 'en', 'يتم التحصيل مباشرة_en');
INSERT INTO `translations` VALUES ('43788', 'keyword', '298', 'title', 'en', 'استكمال_en');
INSERT INTO `translations` VALUES ('43789', 'keyword', '299', 'title', 'en', 'تم الحجز_en');
INSERT INTO `translations` VALUES ('43790', 'trip', '102', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43791', 'trip', '102', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43792', 'trip', '102', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43793', 'trip', '102', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43794', 'trip', '105', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43795', 'trip', '105', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43796', 'trip', '105', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43797', 'trip', '105', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43798', 'trip', '106', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43799', 'trip', '106', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43800', 'trip', '106', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43801', 'trip', '106', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43802', 'trip', '107', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43803', 'trip', '107', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43804', 'trip', '107', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43805', 'trip', '107', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43806', 'trip', '108', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43807', 'trip', '108', 'details', 'en', '');
INSERT INTO `translations` VALUES ('43808', 'trip', '108', 'import_info', 'en', '');
INSERT INTO `translations` VALUES ('43809', 'trip', '108', 'safari_details', 'en', '');
INSERT INTO `translations` VALUES ('43814', 'room_option', '3', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43815', 'room_option', '3', 'desc', 'en', '');
INSERT INTO `translations` VALUES ('43816', 'banner', '5', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43817', 'banner', '5', 'desc', 'en', '');
INSERT INTO `translations` VALUES ('43818', 'banner', '4', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43819', 'banner', '4', 'desc', 'en', '');
INSERT INTO `translations` VALUES ('43820', 'banner', '6', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43821', 'banner', '6', 'desc', 'en', '');
INSERT INTO `translations` VALUES ('43822', 'room_type', '19', 'title', 'en', '');
INSERT INTO `translations` VALUES ('43823', 'room_type', '19', 'tax_included', 'en', '');
INSERT INTO `translations` VALUES ('43824', 'room_type', '19', 'tax_excluded', 'en', '');
INSERT INTO `translations` VALUES ('43825', 'car_category', '2', 'title', 'en', 'Standard');
INSERT INTO `translations` VALUES ('43826', 'car_model', '2', 'title', 'en', 'RENAULT LOGAN 1.6');
INSERT INTO `translations` VALUES ('43828', 'car_fuelType', '1', 'title', 'en', 'Deisel');
INSERT INTO `translations` VALUES ('43830', 'city', '1', 'title', 'en', 'Cairo');
INSERT INTO `translations` VALUES ('43831', 'car_location', '1', 'title', 'en', 'Ein shams');
INSERT INTO `translations` VALUES ('43832', 'car', '3', 'title', 'en', 'Chevrolet');
INSERT INTO `translations` VALUES ('43833', 'car', '3', 'age', 'en', '50');
INSERT INTO `translations` VALUES ('43834', 'car', '3', 'power', 'en', '50 kw');
INSERT INTO `translations` VALUES ('43835', 'car', '3', 'mileage', 'en', 'Unlimited');
INSERT INTO `translations` VALUES ('43836', 'car', '3', 'price_includes', 'en', '');
INSERT INTO `translations` VALUES ('43837', 'car', '3', 'price_excludes', 'en', '');
INSERT INTO `translations` VALUES ('43838', 'keyword', '300', 'title', 'en', 'معلقة_en');
INSERT INTO `translations` VALUES ('43839', 'car_category', '3', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43841', 'car_category', '4', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43844', 'car_category', '5', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43845', 'car_category', '6', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43846', 'car_category', '7', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43847', 'car_category', '8', 'title', 'en', 'category 2');
INSERT INTO `translations` VALUES ('43848', 'car_category', '9', 'title', 'en', 'category2');
INSERT INTO `translations` VALUES ('43849', 'car_category', '10', 'title', 'en', 'category 2');
INSERT INTO `translations` VALUES ('43850', 'property', '25', 'title', 'en', 'Air condition');
INSERT INTO `translations` VALUES ('43851', 'car', '4', 'title', 'en', 'Chevrolet');
INSERT INTO `translations` VALUES ('43852', 'car', '4', 'age', 'en', 'Minimum Age 23 years');
INSERT INTO `translations` VALUES ('43853', 'car', '4', 'mileage', 'en', 'Unlimited');
INSERT INTO `translations` VALUES ('43854', 'car', '4', 'price_includes', 'en', '');
INSERT INTO `translations` VALUES ('43855', 'car', '4', 'price_excludes', 'en', '');
INSERT INTO `translations` VALUES ('43856', 'car', '4', 'power', 'en', '50 kw');
INSERT INTO `translations` VALUES ('43857', 'car_emission', '1', 'title', 'en', 'n/a');
INSERT INTO `translations` VALUES ('43858', 'car_category', '11', 'title', 'en', 'Economy');
INSERT INTO `translations` VALUES ('43859', 'car_model', '3', 'title', 'en', 'CHEVROLET AVEO 1.6');
INSERT INTO `translations` VALUES ('43860', 'keyword', '301', 'title', 'en', ' الغاء عملية الدفع_en');
INSERT INTO `translations` VALUES ('43861', 'keyword', '302', 'title', 'en', 'تم الغاء عملية الدفع من العميل_en');

-- ----------------------------
-- Table structure for `trip`
-- ----------------------------
DROP TABLE IF EXISTS `trip`;
CREATE TABLE `trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `details` text,
  `details_ar` text,
  `import_info` text,
  `import_info_ar` text,
  `safari_details` text,
  `safari_details_ar` text,
  `category_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `offerd` tinyint(2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_range_id` int(11) DEFAULT NULL,
  `days_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `temp2` varchar(255) DEFAULT NULL,
  `temp3` varchar(255) DEFAULT NULL,
  `temp4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `trip_ibfk_2` (`gallery_id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `location_id` (`location_id`),
  KEY `days_id` (`days_id`),
  KEY `price_range_id` (`price_range_id`),
  CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  CONSTRAINT `trip_ibfk_4` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `trip_ibfk_5` FOREIGN KEY (`days_id`) REFERENCES `days` (`id`),
  CONSTRAINT `trip_ibfk_6` FOREIGN KEY (`price_range_id`) REFERENCES `price_range` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip
-- ----------------------------
INSERT INTO `trip` VALUES ('101', 'أسوان', 'test trip*', '', '', '', '<p>\r\n	vcb</p>\r\n', '', '<p>\r\n	bvcbv</p>\r\n', '1', '369', '1', '4', '04/14/2014', '04/08/2014', '1', '150.00', '1', '1', 'n-a', null, null, null);
INSERT INTO `trip` VALUES ('102', 'شرم الشيخ ', 'test2', '', '', '', '', '', '', '1', '375', '1', '1', '08/22/2014', '08/25/2014', '1', '750.00', '1', '2', 'n-a', null, null, null);
INSERT INTO `trip` VALUES ('105', 'العين السخنة ', 'test28', '', '<h5 class=\"sub-title\">\r\n	تفاصيل البرنامج</h5>\r\n<h6 class=\"orange-sub-title\">\r\n	الأطفال</h6>\r\n<p>\r\n	الطفل الثاني من 06 حتي 11.99 تكلفته 50% من سعر الفرد في الغرفة المزدوجة &middot;أقصى عدد أطفال عدد 2 طفل في الغرفة المزدوجة. &middot;لسرير اضافي يتم اضافه 50 في الليلة</p>\r\n<h6 class=\"orange-sub-title\">\r\n	الأسعار لا تشمل</h6>\r\n<p>\r\n	الانتقالات من القاهرة شرم الشيخ والعكس عشاء ليلة الكريسماس(يوم 24/12/2013) للفرد200 جنيه</p>\r\n<p>\r\n	الانتقالات من القاهرة شرم الشيخ والعكس عشاء ليلة الكريسماس(يوم 24/12/2013) للفرد200 جنيه</p>\r\n<p>\r\n	عشاء ليلة الكريسماس(يوم 24/12/2013) للفرد200 جنيه</p>\r\n', '', '<h5 class=\"sub-title\">\r\n	تفاصيل البرنامج</h5>\r\n<h6 class=\"orange-sub-title\">\r\n	الأطفال</h6>\r\n<p>\r\n	الطفل الثاني من 06 حتي 11.99 تكلفته 50% من سعر الفرد في الغرفة المزدوجة &middot;أقصى عدد أطفال عدد 2 طفل في الغرفة المزدوجة. &middot;لسرير اضافي يتم اضافه 50 في الليلة</p>\r\n<h6 class=\"orange-sub-title\">\r\n	الأسعار لا تشمل</h6>\r\n<p>\r\n	الانتقالات من القاهرة شرم الشيخ والعكس عشاء ليلة الكريسماس(يوم 24/12/2013) للفرد200 جنيه</p>\r\n', '', '<h5 class=\"sub-title\">\r\n	تفاصيل البرنامج</h5>\r\n<h6 class=\"orange-sub-title\">\r\n	الأطفال</h6>\r\n<p>\r\n	الطفل الثاني من 06 حتي 11.99 تكلفته 50% من سعر الفرد في الغرفة المزدوجة &middot;أقصى عدد أطفال عدد 2 طفل في الغرفة المزدوجة. &middot;لسرير اضافي يتم اضافه 50 في الليلة</p>\r\n<h6 class=\"orange-sub-title\">\r\n	الأسعار لا تشمل</h6>\r\n<p>\r\n	الانتقالات من القاهرة شرم الشيخ والعكس عشاء ليلة الكريسماس(يوم 24/12/2013) للفرد200 جنيه</p>\r\n', '1', '480', '1', '7', '05/16/2014', '05/21/2014', '1', '650.00', '1', '1', '-', null, null, null);
INSERT INTO `trip` VALUES ('106', 'الغردقة', 'test29', '', '', '', '<p>\r\n	ghdfh</p>\r\n', '', '<p>\r\n	sdff</p>\r\n', '1', '482', '2', '2', '08/20/2014', '08/25/2014', '1', '450.00', '1', '2', 'n-a', null, null, null);
INSERT INTO `trip` VALUES ('107', 'Dubai trip', 'رحلة دبى', '<p>\r\n	details</p>\r\n', '<p>\r\n	&nbsp;التفاصيل</p>\r\n', '<p>\r\n	معلومات تهمك</p>\r\n', '<p>\r\n	معلومات تهمك</p>\r\n', '<p>\r\n	سفارى</p>\r\n', '<p>\r\n	سفارى</p>\r\n', '2', '497', '3', '10', '09/10/2014', '09/18/2014', '0', '1000.00', '1', '3', 'dubai-trip', null, null, null);
INSERT INTO `trip` VALUES ('108', 'الجونة', 'test 4', '', '', '', '<p>\r\n	fgdsfs</p>\r\n', '', '<p>\r\n	fdgdsgf</p>\r\n', '1', '507', '2', '5', '01/25/2014', '10/23/2014', '0', '600.00', '1', '2', 'n-a', null, null, null);

-- ----------------------------
-- Table structure for `trip_room_codition_relation`
-- ----------------------------
DROP TABLE IF EXISTS `trip_room_codition_relation`;
CREATE TABLE `trip_room_codition_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `temp1` varchar(255) DEFAULT NULL,
  `temp2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`),
  KEY `room_type_id` (`room_type_id`),
  KEY `condition_id` (`condition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip_room_codition_relation
-- ----------------------------
INSERT INTO `trip_room_codition_relation` VALUES ('156', '106', '16', '31', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('289', '108', '19', '42', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('290', '109', '19', '42', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('291', '109', '19', '45', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('292', '101', '18', '54', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('293', '101', '18', '55', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('294', '102', '19', '52', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('295', '102', '19', '53', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('296', '102', '18', '54', null, null);
INSERT INTO `trip_room_codition_relation` VALUES ('297', '102', '18', '55', null, null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(90) COLLATE utf8_bin DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `details` text COLLATE utf8_bin,
  `groups_id` int(11) DEFAULT NULL COMMENT '0 trainer  1  vendor   2 company  3 employee  4 stuff(EHR linked stuff)     6 Admin',
  `active` tinyint(1) DEFAULT '0',
  `pass_reset` tinyint(4) DEFAULT '0' COMMENT '1 requested reset password',
  `pass_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin@admin.com', 'GyAYtNO6XVtVbsnayx9ubQ==', 'admin', 'user', '7941-comment-avatar.jpg', 0x7468652073757065722061646D696E2075736572, '6', '1', '0', null, '2018-05-11 22:32:00', null);
INSERT INTO `user` VALUES ('4', 'tt', 'tset@rr.com', 'WJFqGqubvrh3CSENUajahA==', null, null, null, null, '1', '1', '0', null, '2014-06-02 09:06:18', null);
INSERT INTO `user` VALUES ('7', 'nbvc', 'hh@hh.jhhh', '+Pw517s48JS6VfeJGr6jzA==', null, null, null, null, '1', '0', '0', null, null, null);

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('1', 'Normal User');
INSERT INTO `user_groups` VALUES ('6', 'Admin');
