USE military_base;

CREATE TABLE gun (
  gun_id int(11) NOT NULL AUTO_INCREMENT,
  gun_name varchar(50) NOT NULL COMMENT 'Наименование',
  gun_caliber int(11) NOT NULL COMMENT 'Калибр орудия в мм',
  gun_penetratoin int(11) NOT NULL COMMENT 'Пробитие БС',
  PRIMARY KEY (gun_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Орудия, устанавливаемые на танки';

CREATE TABLE tank (
  tank_id int(11) NOT NULL AUTO_INCREMENT,
  tank_name varchar(50) NOT NULL,
  tank_armor_lob int(11) NOT NULL COMMENT 'Лобовая броня корпуса',
  tank_armor_side int(11) NOT NULL COMMENT 'Боковая броня корпуса',
  tank_armor_rear int(11) DEFAULT NULL COMMENT 'Задняя броня корпуса',
  PRIMARY KEY (tank_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE tank_gun (
  tank_id int(11) NOT NULL COMMENT 'Идентификатор танка',
  gun_id int(11) NOT NULL COMMENT 'Идентификатор орудия',
  id int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  CONSTRAINT FK_tank_gun_gun_gun_id FOREIGN KEY (gun_id)
  REFERENCES gun (gun_id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_tank_gun_tank_tank_id FOREIGN KEY (tank_id)
  REFERENCES tank (tank_id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Совместимость такнов и орудий';