-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla burgers.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `idcarrito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idcliente` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcarrito`),
  KEY `FK_carritos_clientes` (`fk_idcliente`),
  CONSTRAINT `FK_carritos_clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.carritos: ~0 rows (aproximadamente)
DELETE FROM `carritos`;

-- Volcando estructura para tabla burgers.carrito_productos
CREATE TABLE IF NOT EXISTS `carrito_productos` (
  `idcarrito_producto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) unsigned NOT NULL DEFAULT 0,
  `fk_idproducto` int(10) unsigned DEFAULT NULL,
  `fk_idcarrito` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcarrito_producto`),
  KEY `FK_carrito_productos_productos` (`fk_idproducto`),
  KEY `FK_carrito_productos_carritos` (`fk_idcarrito`),
  CONSTRAINT `FK_carrito_productos_carritos` FOREIGN KEY (`fk_idcarrito`) REFERENCES `carritos` (`idcarrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_carrito_productos_productos` FOREIGN KEY (`fk_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.carrito_productos: ~0 rows (aproximadamente)
DELETE FROM `carrito_productos`;

-- Volcando estructura para tabla burgers.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.categorias: ~0 rows (aproximadamente)
DELETE FROM `categorias`;

-- Volcando estructura para tabla burgers.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `cedula` int(10) unsigned NOT NULL,
  `celular` int(10) unsigned NOT NULL,
  `clave` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.clientes: ~0 rows (aproximadamente)
DELETE FROM `clientes`;

-- Volcando estructura para tabla burgers.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `idestados` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idestados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.estados: ~0 rows (aproximadamente)
DELETE FROM `estados`;

-- Volcando estructura para tabla burgers.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `total` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `fk_idsucursal` int(10) unsigned DEFAULT 0,
  `fk_idcliente` int(10) unsigned DEFAULT NULL,
  `fk_estado` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `FK__clientes` (`fk_idcliente`),
  KEY `FK_pedidos_estados` (`fk_estado`),
  KEY `FK_pedidos_sucursales` (`fk_idsucursal`),
  CONSTRAINT `FK__clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_estados` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`idestados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_sucursales` FOREIGN KEY (`fk_idsucursal`) REFERENCES `sucursales` (`idsucursales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.pedidos: ~0 rows (aproximadamente)
DELETE FROM `pedidos`;

-- Volcando estructura para tabla burgers.pedidos_productos
CREATE TABLE IF NOT EXISTS `pedidos_productos` (
  `idpedidoproducto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) unsigned NOT NULL DEFAULT 0,
  `precio_unitario` float NOT NULL DEFAULT 0,
  `total` float NOT NULL DEFAULT 0,
  `fk_idpedido` int(10) unsigned DEFAULT 0,
  `fk_idproduto` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`idpedidoproducto`),
  KEY `FK_pedidos_productos_productos` (`fk_idproduto`),
  CONSTRAINT `FK_pedidos_productos_productos` FOREIGN KEY (`fk_idproduto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.pedidos_productos: ~0 rows (aproximadamente)
DELETE FROM `pedidos_productos`;

-- Volcando estructura para tabla burgers.postulaciones
CREATE TABLE IF NOT EXISTS `postulaciones` (
  `idpostulacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `curriculo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idpostulacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.postulaciones: ~0 rows (aproximadamente)
DELETE FROM `postulaciones`;

-- Volcando estructura para tabla burgers.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT 0,
  `precio` float NOT NULL DEFAULT 0,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_idcategoria` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `FK_productos_categorias` (`fk_idcategoria`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`fk_idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.productos: ~0 rows (aproximadamente)
DELETE FROM `productos`;

-- Volcando estructura para tabla burgers.sistema_areas
CREATE TABLE IF NOT EXISTS `sistema_areas` (
  `idarea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ncarea` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descarea` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idarea`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_areas: ~1 rows (aproximadamente)
DELETE FROM `sistema_areas`;
INSERT INTO `sistema_areas` (`idarea`, `ncarea`, `descarea`, `activo`) VALUES
	(1, 'SISTEMAS', 'Sistemas', 1);

-- Volcando estructura para tabla burgers.sistema_familias
CREATE TABLE IF NOT EXISTS `sistema_familias` (
  `idfamilia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`idfamilia`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_familias: ~7 rows (aproximadamente)
DELETE FROM `sistema_familias`;
INSERT INTO `sistema_familias` (`idfamilia`, `nombre`, `descripcion`) VALUES
	(1, 'Administrador total', 'Administrador total'),
	(2, 'Cliente', 'Cliente'),
	(3, 'Administrador de la Empresa', 'Administrador de la Empresa'),
	(4, 'Administrativo', 'Administrador Parcial'),
	(5, 'Usuario', 'Usuario'),
	(9, 'Administrador', 'administrador total'),
	(10, 'admin', 'sdasd');

-- Volcando estructura para tabla burgers.sistema_menues
CREATE TABLE IF NOT EXISTS `sistema_menues` (
  `idmenu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_spanish_ci DEFAULT '',
  `orden` int(11) DEFAULT 0,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `id_padre` int(11) DEFAULT 0,
  `fk_idpatente` int(11) DEFAULT NULL,
  `css` varchar(255) COLLATE utf8_spanish_ci DEFAULT '0',
  `activo` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idmenu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_menues: ~19 rows (aproximadamente)
DELETE FROM `sistema_menues`;
INSERT INTO `sistema_menues` (`idmenu`, `url`, `orden`, `nombre`, `id_padre`, `fk_idpatente`, `css`, `activo`) VALUES
	(7, '', 100, 'Sistema', 0, NULL, 'fa fa-lock fa-fw', 1),
	(8, '/admin/grupos', 3, 'Áreas de trabajo', 7, NULL, '', 1),
	(9, '/admin/usuarios', 1, 'Usuarios', 7, NULL, 'fas fa-users', 1),
	(10, '/admin/permisos', 2, 'Permisos', 7, NULL, '', 1),
	(85, '/admin/sistema/menu', 1, 'Menú', 7, NULL, '', 1),
	(137, '/admin/patentes', 2, 'Patentes', 7, NULL, '', 1),
	(140, '/admin/cliente/nuevo', 2, 'Nuevo cliente', 168, NULL, '', 1),
	(158, '/admin', -1, 'Inicio', 0, NULL, 'fas fa-home', 1),
	(168, NULL, 1, 'Clientes', 0, NULL, 'fas fa-user', 1),
	(169, '/admin/clientes', 0, 'Listado de clientes', 168, NULL, '', 1),
	(198, '/admin/productos', 1, 'Listado de Productos', 200, NULL, 'fas fa-hamburger', 1),
	(200, '', 2, 'Productos', 0, NULL, 'fas fa-hamburger', 1),
	(201, '/admin/producto/nuevo', 2, 'Nuevo producto', 200, NULL, 'fas fa-hamburger', 1),
	(202, NULL, 3, 'Pedidos', 0, NULL, 'fas fa-shopping-cart', 1),
	(203, '/admin/pedidos', 1, 'Listado de pedidos', 202, NULL, NULL, 1),
	(204, NULL, 4, 'Postulaciones', 0, NULL, 'fas fa-user-plus', 1),
	(206, '/admin/postulaciones', 1, 'Listado de postulaciones', 204, NULL, NULL, 1),
	(208, NULL, 6, 'Sucursales', NULL, NULL, 'fas fa-store', 1),
	(209, '/admin/sucursales', 1, 'Listado de sucursales', 208, NULL, NULL, 1);

-- Volcando estructura para tabla burgers.sistema_menu_area
CREATE TABLE IF NOT EXISTS `sistema_menu_area` (
  `fk_idmenu` int(11) unsigned NOT NULL,
  `fk_idarea` int(11) unsigned NOT NULL,
  KEY `fk_idmenu` (`fk_idmenu`) USING BTREE,
  KEY `fk_idarea` (`fk_idarea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_menu_area: ~23 rows (aproximadamente)
DELETE FROM `sistema_menu_area`;
INSERT INTO `sistema_menu_area` (`fk_idmenu`, `fk_idarea`) VALUES
	(10, 1),
	(8, 1),
	(17, 1),
	(85, 1),
	(9, 1),
	(137, 1),
	(140, 1),
	(147, 1),
	(157, 1),
	(7, 1),
	(158, 1),
	(168, 1),
	(169, 1),
	(177, 1),
	(200, 1),
	(198, 1),
	(201, 1),
	(202, 1),
	(203, 1),
	(204, 1),
	(206, 1),
	(208, 1),
	(209, 1);

-- Volcando estructura para tabla burgers.sistema_patentes
CREATE TABLE IF NOT EXISTS `sistema_patentes` (
  `idpatente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `submodulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT '',
  `modulo` varchar(50) COLLATE utf8_spanish_ci DEFAULT '',
  `log_operacion` smallint(6) NOT NULL DEFAULT 0,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`idpatente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_patentes: ~67 rows (aproximadamente)
DELETE FROM `sistema_patentes`;
INSERT INTO `sistema_patentes` (`idpatente`, `tipo`, `submodulo`, `nombre`, `modulo`, `log_operacion`, `descripcion`) VALUES
	(1, 'CONSULTA', 'Permisos', 'PERMISOSCONSULTA', 'Sistema', 1, 'Consulta de permisos'),
	(2, 'ALTA', 'Permisos', 'PERMISOSALTA', 'Sistema', 1, 'Alta de familia'),
	(3, 'EDITAR', 'Permisos', 'PERMISOSMODIFICACION', 'Sistema', 1, 'Modificación de familia de permisos'),
	(4, 'BAJA', 'Permisos', 'PERMISOSBAJA', 'Sistema', 1, 'Baja de familia de permisos'),
	(5, 'BAJA', 'Grupo de usuarios', 'GRUPOBAJA', 'Sistema', 1, 'Baja de grupo de usuarios'),
	(6, 'CONSULTA', 'Grupo de usuarios', 'GRUPOCONSULTA', 'Sistema', 1, 'Consulta de grupo de usuarios'),
	(7, 'EDITAR', 'Grupo de usuarios', 'GRUPOMODIFICACION', 'Sistema', 1, 'Modificación de grupos de usuarios'),
	(8, 'ALTA', 'Grupo de usuarios', 'GRUPOALTA', 'Sistema', 1, 'Alta de grupos de usuarios'),
	(9, 'EDITAR', 'Usuario', 'USUARIOASIGNARGRUPO', 'Sistema', 1, 'Agrega grupos a un usuario'),
	(10, 'ALTA', 'Usuario', 'USUARIOALTA', 'Sistema', 1, 'Nuevo usuario'),
	(11, 'BAJA', 'Usuario', 'USUARIOELIMINAR', 'Sistema', 1, 'Eliminar usuario'),
	(12, 'EDITAR', 'Usuario', 'USUARIOMODIFICAR', 'Sistema', 1, 'Modificar usuario'),
	(13, 'EDITAR', 'Usuario', 'USUARIOAGREGARPERMISO', 'Sistema', 1, 'Agrega permisos dentro de la pantalla del usuario'),
	(14, 'BAJA', 'Usuario', 'USUARIOELIMINARPERMISO', 'Sistema', 1, 'Eliminar un permiso del usuario'),
	(15, 'CONSULTA', 'Usuario', 'USUARIOGRUPOGRILLA', 'Sistema', 1, 'Muestra la grilla de grupos de un usuario'),
	(16, 'EDITAR', 'Usuario', 'USUARIOGRUPOAGREGAR', 'Sistema', 1, 'Agrega un grupo para el usuario'),
	(17, 'BAJA', 'Usuario', 'USUARIOGRUPOELIMINAR', 'Sistema', 1, 'Elimina un grupo del usuario'),
	(18, 'EDITAR', 'Permisos', 'PERMISOSAGREGARPATENTE', 'Sistema', 1, 'Agrega patente a un permiso'),
	(19, 'BAJA', 'Permisos', 'PERMISOSELIMINARPATENTE', 'Sistema', 1, 'Elimina patente a un permiso'),
	(20, 'CONSULTA', 'Usuaurio', 'USUARIOCONSULTA', 'Sistema', 1, 'Consulta la lista de usuarios'),
	(30, 'EDITAR', 'Persona', 'PERSONAMODIFICACION', 'Panel de control ', 1, 'Modificar  una persona'),
	(31, 'ALTA', 'Persona', 'PERSONAALTA', 'Panel de control', 1, 'Agrega una nueva persona'),
	(32, 'CONSULTA', 'Persona', 'PERSONACONSULTA', 'Panel de control', 1, 'Listado de Personas'),
	(70, 'CONSULTA', 'Menu', 'MENUCONSULTA', 'Sistema', 1, 'Listado del menu del sistema'),
	(71, 'ALTA', 'Menu', 'MENUALTA', 'Sistema', 1, 'Agrega un nuevo elemento de menu'),
	(72, 'EDITAR', 'Menu', 'MENUMODIFICACION', 'Sistema', 1, 'Modifica un elemento de menu'),
	(73, 'BAJA', 'Menu', 'MENUELIMINAR', 'SIstema', 1, 'Elimina un elemento de menu'),
	(74, 'CONSULTA', 'Sistema', 'SIMULARALUMNO', 'Sistema', 1, 'Permite al administrador simular el login como alu'),
	(77, 'EDITAR', 'Tipo de cliente', 'TIPOCLIENTEMODIFICACIONES', 'Cliente', 1, 'Modificaciones tipo cliente'),
	(78, 'CONSULTA', 'Tipo de cliente', 'TIPOCLIENTECONSULTA', 'Cliente', 1, 'Consulta tipo de cliente'),
	(79, 'ALTA', 'Tipo de cliente', 'TIPOCLIENTEALTA', 'Cliente', 1, 'Altas de tipos de clientes'),
	(82, 'BAJA', 'Tipo de cliente', 'BAJATIPODECLIENTE', 'Cliente', 1, 'Bajas de tipos de clientes'),
	(91, 'ALTA', 'Nuevo cliente', 'CLIENTEALTA', 'Clientes', 0, 'Alta de nuevos clientes'),
	(92, 'EDITAR', 'Nuevo cliente', 'CLIENTEEDITAR', 'Clientes', 0, 'Editar clientes'),
	(93, 'BAJA', 'Nuevo cliente', 'CLIENTEELIMINAR', 'Clientes', 0, 'Eliminar clientes'),
	(94, 'CONSULTA', 'Listado de Clientes', 'CLIENTECONSULTA', 'Clientes', 0, 'Consulta de listado de clientes'),
	(99, 'ALTA', 'Productos', 'PRODUCTOSALTA', 'Productos', 1, 'Alta de productos'),
	(100, 'BAJA', 'Productos', 'PRODUCTOELIMINAR', 'Productos', 1, 'Baja de productos'),
	(101, 'EDITAR', 'Productos', 'PRODUCTOEDITAR', 'Productos', 1, 'Editar productos'),
	(102, 'CONSULTA', 'Productos', 'PRODUCTOCONSULTA', 'Productos', 1, 'Consulta de productos'),
	(143, 'CONSULTA', 'sucursales', 'SUCURSALCONSULTA', 'sucursales', 0, 'Consulta de sucursales'),
	(144, 'ALTA', 'sucursales', 'SUCURSALALTA', 'sucursales', 0, 'Alta de sucursales'),
	(145, 'BAJA', 'sucursales ', 'SUCURSALBAJA', 'sucursales', 0, 'baja de sucursales'),
	(148, 'EDITAR', 'sucursales', 'SUCURSALEDITAR', 'sucursales', 1, 'Modificacion de sucursal'),
	(153, 'CONSULTA', 'Inscripcion', 'INSCRIPCIONCONSULTA', 'Inscripcion', 1, 'Consulta de inscripciones'),
	(154, 'ALTA', 'Inscripcion', 'INSCRIPCIONALTA', 'Inscripcion', 1, 'Alta de inscripciones'),
	(155, 'EDITAR', 'Inscripcion', 'INSCRIPCIONMODIFICACION', 'Inscripcion', 1, 'Modificacion de inscripciones'),
	(158, 'BAJA', 'Permisos', 'INSCRIPCIONBAJA', 'Sistema', 1, 'Baja de inscripciones'),
	(176, 'ALTA', 'Patentes', 'PATENTESALTA', 'Patentes', 0, 'Registra nuevas patentes'),
	(177, 'BAJA', 'Patentes', 'PATENTESBAJA', 'Patentes', 0, 'Da de baja patentes'),
	(178, 'EDITAR', 'Patentes', 'PATENTESMODIFICACION', 'Patentes', 0, 'Modifica patentes existentes'),
	(179, 'CONSULTA', 'Patentes', 'PATENTESCONSULTA', 'Patentes', 0, 'Consulta patentes'),
	(181, 'CONSULTA', 'Pedido', 'PEDIDOCONSULTA', 'Pedido', 1, 'Permite listar los pedidos'),
	(184, 'Eliminar', 'Listar categorias', 'CATEGORIAELIMINAR', 'Categorias', 0, 'Elimina una categoria'),
	(185, 'CONSULTA', 'Listar consultas', 'CONSULTACONSULTA', 'Consultas', 1, 'Consultar las consultas'),
	(186, 'ALTA', 'Nueva consulta', 'CONSULTAALTA', 'Consultas', 1, 'Alta de categorias'),
	(187, 'BAJA', 'Listar consultas', 'CONSULTAELIMINAR', 'Consultas', 1, 'Elimina una consulta'),
	(188, 'EDITAR', 'Listar consultas', 'CONSULTAMODIFICACION', 'Consultas', 1, 'Modifica una consulta'),
	(209, 'ALTA', 'Patentes', 'PATENTEALTA', 'Patentes', 0, 'Permite ingresar una nueva patente'),
	(214, 'ALTA', 'Pedido', 'PEDIDOALTA', 'Pedido', 1, 'permite ingresar un nuevo pedido'),
	(215, 'EDITAR', 'Pedido', 'PEDIDOEDITAR', 'Pedido', 1, 'permite editar un pedido existente'),
	(216, 'BAJA', 'Pedido', 'PEDIDOBAJA', 'Pedido', 1, 'permite eliminar un pedido'),
	(221, 'ALTA', 'Postulacion', 'POSTULANTEALTA', 'Postulacion', 1, 'permite agregar un nuevo postulante'),
	(222, 'CONSULTA', 'Postulacion', 'POSTULANTECONSULTA', 'Postulacion', 1, 'permite modificar un nuevo postulante'),
	(223, 'EDITAR', 'Postulacion', 'POSTULANTEEDITAR', 'Postulacion', 1, 'permite modificar un nuevo postulante'),
	(224, 'BAJA', 'Postulacion', 'POSTULANTEBAJA', 'Postulacion', 1, 'permite dar de baja un postulante'),
	(225, 'CONSULTA', 'Pedido', 'PEDIDOVER', 'Pedido', 1, 'Permite ver por pedido');

-- Volcando estructura para tabla burgers.sistema_patente_familia
CREATE TABLE IF NOT EXISTS `sistema_patente_familia` (
  `fk_idpatente` int(11) unsigned NOT NULL,
  `fk_idfamilia` int(11) unsigned NOT NULL,
  KEY `fk_idpatente` (`fk_idpatente`) USING BTREE,
  KEY `fk_idfamilia` (`fk_idfamilia`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_patente_familia: ~100 rows (aproximadamente)
DELETE FROM `sistema_patente_familia`;
INSERT INTO `sistema_patente_familia` (`fk_idpatente`, `fk_idfamilia`) VALUES
	(10, 5),
	(12, 5),
	(10, 3),
	(12, 3),
	(128, 7),
	(129, 7),
	(130, 7),
	(131, 7),
	(10, 4),
	(11, 4),
	(12, 4),
	(20, 4),
	(1, 9),
	(2, 9),
	(3, 9),
	(4, 9),
	(5, 9),
	(6, 9),
	(7, 9),
	(8, 9),
	(9, 9),
	(10, 9),
	(11, 9),
	(12, 9),
	(13, 9),
	(14, 9),
	(15, 9),
	(16, 9),
	(17, 9),
	(18, 9),
	(19, 9),
	(20, 9),
	(176, 9),
	(177, 9),
	(178, 9),
	(179, 9),
	(209, 9),
	(18, 10),
	(19, 10),
	(176, 10),
	(177, 10),
	(178, 10),
	(179, 10),
	(209, 10),
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(91, 1),
	(92, 1),
	(93, 1),
	(94, 1),
	(99, 1),
	(100, 1),
	(101, 1),
	(102, 1),
	(143, 1),
	(144, 1),
	(145, 1),
	(148, 1),
	(153, 1),
	(154, 1),
	(155, 1),
	(158, 1),
	(176, 1),
	(177, 1),
	(178, 1),
	(179, 1),
	(181, 1),
	(185, 1),
	(209, 1),
	(210, 1),
	(211, 1),
	(214, 1),
	(215, 1),
	(216, 1),
	(221, 1),
	(222, 1),
	(223, 1),
	(224, 1),
	(225, 1);

-- Volcando estructura para tabla burgers.sistema_usuarios
CREATE TABLE IF NOT EXISTS `sistema_usuarios` (
  `idusuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ultimo_ingreso` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'current_timestamp()',
  `root` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `cantidad_bloqueo` int(11) DEFAULT NULL,
  `areapredeterminada` smallint(6) DEFAULT NULL,
  `activo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idusuario`) USING BTREE,
  UNIQUE KEY `usuario` (`usuario`) USING BTREE,
  UNIQUE KEY `email` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_usuarios: ~1 rows (aproximadamente)
DELETE FROM `sistema_usuarios`;
INSERT INTO `sistema_usuarios` (`idusuario`, `usuario`, `nombre`, `apellido`, `mail`, `clave`, `ultimo_ingreso`, `token`, `root`, `created_at`, `cantidad_bloqueo`, `areapredeterminada`, `activo`) VALUES
	(1, 'admin', 'Administrador', '', 'admin@correo.com', '$2y$10$FeFXjlupKImULPF.aVRNueCALrpj55n.fotONLQ1QY3YvlYTelRP2', '2021-10-28 21:51:43', 'current_timestamp()', 1, '2021-09-17 19:05:57', 0, 1, 1);

-- Volcando estructura para tabla burgers.sistema_usuario_familia
CREATE TABLE IF NOT EXISTS `sistema_usuario_familia` (
  `fk_idusuario` int(11) unsigned NOT NULL,
  `fk_idfamilia` int(11) unsigned NOT NULL,
  `fk_idarea` int(11) unsigned NOT NULL,
  KEY `fk_idusuario` (`fk_idusuario`) USING BTREE,
  KEY `fk_idfamilia` (`fk_idfamilia`) USING BTREE,
  KEY `fk_idarea` (`fk_idarea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_usuario_familia: ~1 rows (aproximadamente)
DELETE FROM `sistema_usuario_familia`;
INSERT INTO `sistema_usuario_familia` (`fk_idusuario`, `fk_idfamilia`, `fk_idarea`) VALUES
	(1, 1, 1);

-- Volcando estructura para tabla burgers.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `idsucursales` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `linkmap` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idsucursales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla burgers.sucursales: ~0 rows (aproximadamente)
DELETE FROM `sucursales`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
