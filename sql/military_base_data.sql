/*Танки*/
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('Т34', 45, 45, 40);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('Тигр', 100, 80, 80);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('ИС', 120, 90, 60);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('КВ-1', 75, 75, 70);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('МС-1', 18, 16, 16);
/*Орудия*/
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Л-11', 68, 76);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Ф-34', 86, 76);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('ЗиС-4', 112, 57);

INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. 42 L/70', 75, 150);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. L/28', 105, 64);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. 36 L/56', 88, 132);

INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Д-5Т', 85, 120);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Д-5Т-85БМ', 85, 144);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Д-10Т', 100, 175);

INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('ЗиС-5', 76, 86);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('У-11', 122, 61);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('проект 413', 57, 112);

INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Б-3', 37, 40);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('ВЯ', 23, 30);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Гочкис', 37, 34);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('ТНШ', 20, 28);
/*Совсестивость*/
/*Т34*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,1);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,2);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,3);
/*Тигр*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,4);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,5);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,6);
/*Ис*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (3,7);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (3,8);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (3,9);
/*КВ-1*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (4,10);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (4,11);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (4,12);
/*МС-1*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (5,13);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (5,14);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (5,15);



