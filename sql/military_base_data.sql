/*Танки*/
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('Т34', 45, 45, 40);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('Тигр', 100, 80, 80);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('ИС', 120, 90, 60);
INSERT INTO military_base.tank (tank_name, tank_armor_lob, tank_armor_side, tank_armor_rear)VALUES ('КВ-1', 75, 75, 70);
/*Орудия*/
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Л-11', 68, 76);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Ф-34', 86, 76);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('ЗиС-4', 112, 57);

INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. 42 L/70', 75, 150);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. L/28', 105, 64);
INSERT INTO military_base.gun(gun_name, gun_caliber ,gun_penetratoin)VALUES ('Kw.K. 36 L/56', 88, 132);
/*Совсестивость*/
/*Т34*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,1);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,2);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (1,3);
/*Тигр*/
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,4);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,5);
INSERT INTO military_base.tank_gun(tank_id, gun_id) VALUES (2,5);