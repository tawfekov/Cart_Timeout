-- ----------------------------
-- Table structure for cart_timeout_quote_log
-- ----------------------------
DROP TABLE IF EXISTS `cart_timeout_quote_log`;
CREATE TABLE `cart_timeout_quote_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cart_timeout_quote_log
-- ----------------------------
