#!/bin/bash
mysql -u root -p$1 -e "create database faholistore";
mysql -u root -p$1 -e "create user faholi@localhost identified by 'stimik_tb'";
mysql -u root -p$1 -e "grant all on faholistore.* to faholi@localhost with grant option";
mysql -u root -p$1 -e "flush privileges";
mysql faholistore -u faholi -pstimik_tb < db_structure.sql
