-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2021 a las 23:27:59
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbusuariocrud`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioListar` (`xflag` INT, `xcriterio` TEXT)  begin
	
	if xflag = 1 then 
	
		begin 
			
			declare xnomape varchar(100) default SPLIT_STRING(xcriterio,'*',1);
			declare xgener char(6) default SPLIT_STRING(xcriterio,'*',2);
			declare xstatus char(6) default SPLIT_STRING(xcriterio,'*',3);
		
			select 
				iduser,
				user,
				pwd,
				concat(name,' ',lastname) as fullname,
				name,
				lastname,
				birthdat,
				status,
				gener,
				data_register,
				data_update,
				id_user_register,
				id_user_update
			from 
				user 
			where if(xnomape = '', true, name like(CONCAT('%',xnomape,'%')) or lastname like(CONCAT('%',xnomape,'%')))
			and if(xgener = '_all_', true, gener = xgener)
			and if(xstatus = '_all_', true, status = xstatus);
			
			
		end;
	
	elseif  xflag =  2 then 
	
			select 
				iduser,
				user,
				pwd,
				concat(name,' ',lastname) as fullname,
				name,
				lastname,
				birthdat,
				status,
				gener,
				data_register,
				data_update,
				id_user_register,
				id_user_update
			from 
				user 
			where 
				iduser = xcriterio;
		
	
	end if;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioMantenimiento` (`xflag` INT, `xiduser` INT, `xname` VARCHAR(100), `xlastname` VARCHAR(100), `xuser` VARCHAR(20), `xpwd` VARCHAR(100), `xbirthdat` DATE, `xstatus` CHAR(1), `xgener` CHAR(1))  begin 
	
	declare xmsj varchar(10);

	if xflag = 1 then 
		
		insert into user(user, pwd, name,lastname, birthdat, status, gener, data_register, id_user_register)
		values(xuser, xpwd, xname, xlastname, xbirthdat, xstatus, xgener, now(), 1);
	
		set xmsj = 'MSG_01';
	
	elseif xflag = 2 then 
	
		update user set user = xuser, pwd = xpwd, name = xname, lastname = xlastname, birthdat = xbirthdat, status = xstatus,
		gener = xgener, data_update  = now(), id_user_update  = 1 where iduser = xiduser;
	
		set xmsj = 'MSG_02';
	
	elseif xflag = 3 then
	
		delete from user where iduser = xiduser;
	
		set xmsj = 'MSG_03';
	
	elseif xflag = 4 then
	
		update user set status = 1 where iduser  = xiduser;
	
		set xmsj = 'MSG_04';
	
	elseif xflag = 5 then 
	
		update user set status = 0 where iduser  = xiduser;
	
		set xmsj = 'MSG_05';
		
	end if;

	select xmsj as dato;
	
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `SPLIT_STRING` (`str` VARCHAR(255), `delim` VARCHAR(12), `pos` INT) RETURNS VARCHAR(255) CHARSET utf8 RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(str, delim, pos),
       CHAR_LENGTH(SUBSTRING_INDEX(str, delim, pos-1)) + 1),
       delim, '')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdat` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `gener` char(1) NOT NULL DEFAULT '1',
  `data_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_update` datetime DEFAULT NULL,
  `id_user_register` int(11) NOT NULL,
  `id_user_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `user`, `pwd`, `name`, `lastname`, `birthdat`, `status`, `gener`, `data_register`, `data_update`, `id_user_register`, `id_user_update`) VALUES
(1, 'lyanastark', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Lyanna', 'Stark', '1990-05-30', '1', '2', '2021-10-29 20:04:49', '2021-10-29 15:04:49', 1, 1),
(5, 'espadadelalba', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Arthur', 'Dayne', '2021-10-01', '0', '1', '2021-10-29 20:02:57', '2021-10-29 14:26:32', 1, 1),
(13, 'creganstark', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Cregan', 'Stark', '1980-06-20', '1', '1', '2021-10-29 17:50:02', NULL, 1, NULL),
(14, 'jaime.lannister', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Jaime', 'Lannister', '1990-08-17', '1', '1', '2021-10-29 20:13:22', NULL, 1, NULL),
(15, 'rhaneryatargaryen', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Rhaenyra', 'Targaryen', '1992-08-03', '1', '2', '2021-10-29 20:14:13', NULL, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
