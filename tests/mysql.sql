DROP TABLE IF EXISTS `Category`;
CREATE TABLE `Category` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL,
  `parentId` int(11) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Category` (`id`, `name`, `parentId`)
VALUES
  (1, 'Root', 0),
  (2, 'Child 1', 1),
  (3, 'Child 2', 1),
  (4, 'SubChild 1', 3),
  (5, 'SubChild 2', 3),
  (6, 'SubChild 3', 3);
