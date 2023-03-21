-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2023 a las 21:01:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `joseviveresbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `valor` decimal(11,2) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id`, `concepto`, `valor`, `id_metodo_pago`, `fecha`) VALUES
(8, 'abono ', '25.00', 1, '2023-03-16'),
(9, 'abono ', '25.00', 1, '2023-03-16'),
(10, 'abono 1', '20.00', 3, '2023-03-16'),
(11, 'abono 2', '3.00', 1, '2023-03-16'),
(12, 'abono 3', '30.00', 1, '2023-03-16'),
(13, 'abono 3', '30.00', 1, '2023-03-16'),
(14, 'abono ', '5.00', 1, '2023-03-16'),
(15, 'abono ', '5.00', 1, '2023-03-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_movimiento`
--

CREATE TABLE `abono_movimiento` (
  `id` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `id_abono` int(11) NOT NULL,
  `monto` decimal(11,2) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abono_movimiento`
--

INSERT INTO `abono_movimiento` (`id`, `id_movimiento`, `id_abono`, `monto`, `estado`) VALUES
(2, 197, 8, '25.00', 1),
(3, 197, 9, '25.00', 1),
(4, 198, 10, '20.00', 1),
(5, 199, 11, '3.00', 1),
(6, 199, 12, '30.00', 1),
(7, 199, 13, '63.00', 1),
(8, 200, 14, '5.00', 1),
(9, 200, 15, '5.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `fecha`, `accion`, `modulo`, `id_usuario`) VALUES
(49, '2022-10-04', 'Registro de nueva categoria : \"viveres\"', 'Categoria Productos', 1),
(50, '2022-10-04', 'Registro de nueva categoria : \"charcuteria\"', 'Categoria Productos', 1),
(51, '2022-10-04', 'Registro de nueva categoria : \"limpieza\"', 'Categoria Productos', 1),
(52, '2022-10-04', 'Registro de nueva categoria : \"Verduras\"', 'Categoria Productos', 1),
(53, '2022-10-04', 'Registro de nueva categoria : \"frutas\"', 'Categoria Productos', 1),
(54, '2022-10-04', 'Registro de nueva categoria : \"charcuteria\"', 'Categoria Productos', 1),
(55, '2022-10-04', 'Registro de nueva categoria : \"confiteria\"', 'Categoria Productos', 1),
(56, '2022-10-04', 'Registro de nueva categoria : \"bebidas\"', 'Categoria Productos', 1),
(57, '2022-10-04', 'Registro de nueva categoria : \"electronica\"', 'Categoria Productos', 1),
(58, '2022-10-04', 'Registro de nueva categoria : \"PESCADO\"', 'Categoria Productos', 1),
(59, '2022-10-04', 'Registro de nueva categoria : \"jugueteria\"', 'Categoria Productos', 1),
(60, '2022-10-04', 'Registro de nueva categoria : \"CARNES\"', 'Categoria Productos', 1),
(61, '2022-10-04', 'Registro de nueva categoria : \"POLLO\"', 'Categoria Productos', 1),
(62, '2022-10-04', 'Registro de nueva categoria : \"helados\"', 'Categoria Productos', 1),
(63, '2022-10-04', 'Registro de nueva categoria : \"sdfsdf\"', 'Categoria Productos', 1),
(64, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(65, '2022-10-04', 'Registro de nueva categoria : \"sdfsdf\"', 'Categoria Productos', 1),
(66, '2022-10-04', 'Registro de nueva categoria : \"sdfwe\"', 'Categoria Productos', 1),
(67, '2022-10-04', 'Registro de nueva categoria : \"sdfsdgf\"', 'Categoria Productos', 1),
(68, '2022-10-04', 'Registro de nueva categoria : \"jhbjh\"', 'Categoria Productos', 1),
(69, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(70, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(71, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(72, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(73, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(74, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(75, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(76, '2022-10-04', 'Registro de nueva categoria : \"sdfsf\"', 'Categoria Productos', 1),
(77, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"28.00\" y fue \"PAGADA\"', 'Balance', 1),
(78, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"59.00\" y fue \"PAGADA\"', 'Balance', 1),
(79, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"28.00\" y fue \"PAGADA\"', 'Balance', 1),
(80, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"PAGADA\"', 'Balance', 1),
(81, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P', 'Balance', 1),
(82, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"13.00\" y fue \"PAGADA\"', 'Balance', 1),
(83, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"1.00\" y fue \"PAGADA\"', 'Balance', 1),
(84, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"12.00\" y fue \"PAGADA\"', 'Balance', 1),
(85, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA', 'Balance', 1),
(86, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"4.00\" y fue \"A ', 'Balance', 1),
(87, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P', 'Balance', 1),
(88, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA', 'Balance', 1),
(89, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"3.00\" y fue \"PA', 'Balance', 1),
(90, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"5.00\" y fue \"PAGADA\"', 'Balance', 1),
(91, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"P', 'Balance', 1),
(92, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"3.00\" y fue \"PA', 'Balance', 1),
(93, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA', 'Balance', 1),
(94, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA', 'Balance', 1),
(95, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA', 'Balance', 1),
(96, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P', 'Balance', 1),
(97, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"71.30\" y fue \"pagada\"', 'Balance', 1),
(98, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"100.00\" y fue \"pagada\"', 'Balance', 1),
(99, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"100.00\" y fue \"pagada\"', 'Balance', 1),
(100, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"PAGADA\"', 'Balance', 1),
(101, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"PAGADA\"', 'Balance', 1),
(102, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"122.00\" y fue \"', 'Balance', 1),
(103, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"10.00\" y fue \"A CREDITO\"', 'Balance', 1),
(104, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"A CREDITO\"', 'Balance', 1),
(105, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"A CREDITO\"', 'Balance', 1),
(106, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADA\"', 'Balance', 1),
(107, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADA\"', 'Balance', 1),
(108, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADA\"', 'Balance', 1),
(109, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADO\"', 'Balance', 1),
(110, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"A CREDITO\"', 'Balance', 1),
(111, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"PAGADA\"', 'Balance', 1),
(112, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADO\"', 'Balance', 1),
(113, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADO\"', 'Balance', 1),
(114, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"23.00\" y fue \"PAGADO\"', 'Balance', 1),
(115, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"MERCADEO Y PUBLICIDAD\" por \"10.00\" y fue \"A CREDITO', 'Balance', 1),
(116, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"50.00\" y fue \"P', 'Balance', 1),
(117, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"50.00\" y fue \"P', 'Balance', 1),
(118, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.66\" y fue \"PAGADO\"', 'Balance', 1),
(119, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"30.00\" y fue \"PAGADO\"', 'Balance', 1),
(120, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"MUEBLES, EQUIPOS Y MAQUINARÍA\" por \"30.00\" y fue \"P', 'Balance', 1),
(121, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA', 'Balance', 1),
(122, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"6.20\" y fue \"A CREDITO\"', 'Balance', 1),
(123, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"8.00\" y fue \"PAGADO\"', 'Balance', 1),
(124, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"10.00\" y fue \"A CREDITO\"', 'Balance', 1),
(125, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"23.00\" y fue \"A CREDITO\"', 'Balance', 1),
(126, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(127, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"8.00\" y fue \"PAGADA\"', 'Balance', 1),
(128, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA', 'Balance', 1),
(129, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"A', 'Balance', 1),
(130, '2022-10-04', 'Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"23.00\" y fue \"A CREDITO\"', 'Balance', 1),
(131, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"DISTRIBUIDORA \"', 'Personas', 1),
(132, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"LOS PALAZUELOS\"', 'Personas', 1),
(133, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"SANTIAGO\"', 'Personas', 1),
(134, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"ARIANNA\"', 'Personas', 1),
(135, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"MARIANA\"', 'Personas', 1),
(136, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"JOSE\"', 'Personas', 1),
(137, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"MARIA\"', 'Personas', 1),
(138, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"ARIANNA\"', 'Personas', 1),
(139, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"mariana\"', 'Personas', 1),
(140, '2022-10-04', 'Nuevo Registro del : \"cliente\" =>  \"JOSEF\"', 'Personas', 1),
(141, '2022-10-04', 'Nuevo Registro del : \"cliente\" =>  \"JOSE DAZA\"', 'Personas', 1),
(142, '2022-10-04', 'Nuevo Registro del : \"proveedor\" =>  \"JOSE FERNANDO\"', 'Personas', 1),
(143, '2022-10-04', 'Nuevo Registro del : \"cliente\" =>  \"JUAN\"', 'Personas', 1),
(144, '2022-10-04', 'Nuevo Registro del : \"cliente\" =>  \"ROSA\"', 'Personas', 1),
(145, '2022-10-04', 'Nuevo Registro del : \"cliente\" =>  \"paola colmenarez\"', 'Personas', 1),
(146, '2022-10-04', 'Registro de un nuevo Producto : \"harina\"', 'Productos', 1),
(147, '2022-10-04', 'Registro de un nuevo Producto : \"arroz mary\"', 'Productos', 1),
(148, '2022-10-04', 'Registro de un nuevo Producto : \"azucar montalban\"', 'Productos', 1),
(149, '2022-10-04', 'Registro de un nuevo Producto : \"caraotas\"', 'Productos', 1),
(150, '2022-10-04', 'Registro de un nuevo Producto : \"mortadela\"', 'Productos', 1),
(151, '2022-10-04', 'Registro de un nuevo Producto : \"refresco\"', 'Productos', 1),
(152, '2022-10-04', 'Registro de un nuevo Producto : \"queso\"', 'Productos', 1),
(153, '2022-10-04', 'Registro de un nuevo Producto : \"harina de trigo\"', 'Productos', 1),
(154, '2022-10-04', 'Registro de un nuevo Producto : \"mayonesa\"', 'Productos', 1),
(155, '2022-10-04', 'Registro de un nuevo Producto : \"kepchut\"', 'Productos', 1),
(156, '2022-10-04', 'Registro de un nuevo Producto : \"MEDUSA\"', 'Productos', 1),
(157, '2022-10-04', 'Registro de un nuevo Producto : \"FAROS\"', 'Productos', 1),
(158, '2022-10-04', 'Registro de un nuevo Producto : \"sadfsdf\"', 'Productos', 1),
(159, '2022-10-04', 'Registro de un nuevo Producto : \"juhiu\"', 'Productos', 1),
(160, '2022-10-04', 'Registro de un nuevo Producto : \"jhkjhkj\"', 'Productos', 1),
(161, '2022-10-04', 'Registro de un nuevo Producto : \"asd\"', 'Productos', 1),
(162, '2022-10-04', 'Registro de un nuevo Producto : \"wqeqwe\"', 'Productos', 1),
(163, '2022-10-04', 'Registro de un nuevo Producto : \"frutas\"', 'Productos', 1),
(164, '2022-10-04', 'Registro de un nuevo Producto : \"mantequilla\"', 'Productos', 1),
(165, '2022-10-04', 'Registro de un nuevo Producto : \"computadora\"', 'Productos', 1),
(166, '2022-10-04', 'Registro de un nuevo Producto : \"salsa\"', 'Productos', 1),
(167, '2022-10-04', 'Registro de un nuevo Producto : \"aceite\"', 'Productos', 1),
(168, '2022-10-04', 'Registro de un nuevo rol : \"vendedor\"', 'Roles', 1),
(169, '2022-10-04', 'Registro de un nuevo rol : \"gerente\"', 'Roles', 1),
(170, '2022-10-04', 'Registro de un nuevo rol : \"superusuario\"', 'Roles', 1),
(171, '2022-10-04', 'Registro de un nuevo usuario : \"ariann\"', 'Usuarios', 1),
(172, '2022-10-04', 'Registro de un nuevo usuario : \"PAOLSA\"', 'Usuarios', 1),
(173, '2022-10-04', 'Registro de un nuevo usuario : \"arianna\"', 'Usuarios', 1),
(174, '2022-10-04', 'Registro de un nuevo usuario : \"paola\"', 'Usuarios', 1),
(248, '2022-10-10', 'El usuario : \"SUPERUSUARIO\" fue modificado', 'Usuarios', 3),
(249, '2022-10-10', 'El usuario : \"SUPERUSUARIO\" fue modificado', 'Usuarios', 3),
(250, '2022-10-10', 'El usuario : \"ARIANNA\" fue modificado', 'Usuarios', 3),
(251, '2022-10-11', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.75\" y fue \"PAGADA\"', 'Balance', 1),
(252, '2022-10-11', 'EL producto: \"refresco\" fue modificado', 'Productos', 1),
(253, '2022-10-11', 'EL producto: \"harina\" fue modificado', 'Productos', 1),
(254, '2022-10-11', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA', 'Balance', 1),
(255, '2022-10-13', 'Nuevo Registro del : \"cliente\" =>  \"Orlando Guedez\"', 'Personas', 1),
(256, '2022-10-13', 'Nuevo Registro del : \"cliente\" =>  \"Cristiano Ronaldo\"', 'Personas', 1),
(257, '2022-10-13', 'Nuevo Registro del : \"proveedor\" =>  \"Leonel Messi\"', 'Personas', 1),
(258, '2022-10-13', 'Nuevo Registro del : \"proveedor\" =>  \"Pablo Lopez\"', 'Personas', 1),
(259, '2022-10-13', 'Registro de nueva categoria : \"Verduras\"', 'Categoria Productos', 1),
(260, '2022-10-13', 'Registro de nueva categoria : \"viveres\"', 'Categoria Productos', 1),
(261, '2022-10-13', 'Registro de nueva categoria : \"Carnes\"', 'Categoria Productos', 1),
(262, '2022-10-13', 'Modificacion de la categoria : \"Viveres\"', 'Categoria Productos', 1),
(263, '2022-10-13', 'Registro de nueva categoria : \"Viiveres\"', 'Categoria Productos', 1),
(264, '2022-10-13', 'Modificacion de la categoria : \"Viveres\"', 'Categoria Productos', 1),
(265, '2022-10-13', 'Modificacion de la categoria : \"Viveres\"', 'Categoria Productos', 1),
(266, '2022-10-13', 'Registro de un nuevo Producto : \"Harina Pan\"', 'Productos', 1),
(267, '2022-10-13', 'Registro de un nuevo Producto : \"Azucar Morena\"', 'Productos', 1),
(268, '2022-10-13', 'Registro de un nuevo Producto : \"Aceite Coamo\"', 'Productos', 1),
(269, '2022-10-13', 'EL producto: \"Aceite Coamo\" fue modificado', 'Productos', 1),
(270, '2022-10-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"19.00\" y fue \"PAGADA\"', 'Balance', 1),
(271, '2022-10-13', 'EL producto: \"Harina Pan\" fue modificado', 'Productos', 1),
(272, '2022-10-13', 'EL producto: \"Azucar Morena\" fue modificado', 'Productos', 1),
(273, '2022-10-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"A CREDITO\"', 'Balance', 1),
(274, '2022-10-13', 'EL producto: \"Aceite Coamo\" fue modificado', 'Productos', 1),
(275, '2022-10-13', 'Registro de nuevo movimiento en el balance por: \"TRANSPORTES, DOMICILIOS, LOGISTICA\" por \"20.00\" y f', 'Balance', 1),
(276, '2022-10-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"60.00\" y fue \"P', 'Balance', 1),
(277, '2022-10-18', 'Registro de un nuevo Producto : \"HARINA\"', 'Productos', 1),
(278, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(279, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(280, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(281, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"46.00\" y fue \"PAGADA\"', 'Balance', 1),
(282, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(283, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(284, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(285, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"18.40\" y fue \"PAGADA\"', 'Balance', 1),
(286, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(287, '2022-10-18', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(288, '2022-10-18', 'Modificacion de la categoria : \"Verdura\"', 'Categoria Productos', 1),
(289, '2022-10-18', 'Registro de nueva categoria : \"limpieza\"', 'Categoria Productos', 1),
(290, '2022-10-18', 'EL producto: \"HARINA\" fue modificado', 'Productos', 1),
(291, '2022-10-19', 'Modificacion de la categoria : \"limpieza\"', 'Categoria Productos', 1),
(292, '2022-10-19', 'Registro de un nuevo rol : \"encargado\"', 'Roles', 1),
(293, '2022-10-19', 'El rol : \"encargado\" fue modificado', 'Roles', 1),
(294, '2022-10-19', 'Registro de un nuevo rol : \"aASDasa\"', 'Roles', 1),
(295, '2022-10-19', 'El rol : \"aASDasa\" fue modificado', 'Roles', 1),
(296, '2022-10-19', 'Registro de un nuevo rol : \"werwer\"', 'Roles', 1),
(297, '2022-10-19', 'El rol : \"werwer\" fue modificado', 'Roles', 1),
(298, '2022-10-19', 'Registro de un nuevo rol : \"sdfsdf\"', 'Roles', 1),
(299, '2022-10-19', 'El rol : \"sdfsdf\" fue modificado', 'Roles', 1),
(300, '2022-10-19', 'Registro de un nuevo rol : \"eqwsadas\"', 'Roles', 1),
(301, '2022-10-19', 'El rol : \"eqwsadas\" fue modificado', 'Roles', 1),
(302, '2022-10-19', 'Registro de un nuevo Producto : \"huevos\"', 'Productos', 1),
(303, '2022-10-19', 'Registro de un nuevo Producto : \"jugos \"', 'Productos', 1),
(304, '2022-10-19', 'EL producto: \"jugo naranja\" fue modificado', 'Productos', 1),
(305, '2022-10-19', 'EL producto: \"jugo naranja\" fue modificado', 'Productos', 1),
(306, '2022-10-19', 'EL producto: \"jugo naranja\" fue modificado', 'Productos', 1),
(307, '2022-10-19', 'Registro de un nuevo Producto : \"FAROS\"', 'Productos', 1),
(308, '2022-10-19', 'EL producto: \"FAROS\" fue modificado', 'Productos', 1),
(309, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"A CREDITO\"', 'Balance', 1),
(310, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA', 'Balance', 1),
(311, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ', 'Balance', 1),
(312, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ', 'Balance', 1),
(313, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(314, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ', 'Balance', 1),
(315, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA', 'Balance', 1),
(316, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA', 'Balance', 1),
(317, '2022-10-21', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA', 'Balance', 1),
(318, '2022-10-23', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"20.00\" y fue \"PAGADA\"', 'Balance', 1),
(319, '2022-10-23', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"120.00\" y fue \"PAGADA\"', 'Balance', 1),
(320, '2022-10-23', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"140.00\" y fue \"PAGADA\"', 'Balance', 1),
(321, '2022-10-23', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.00\" y fue \"PAGADA\"', 'Balance', 1),
(322, '2022-10-24', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.50\" y fue \"PAGADA\"', 'Balance', 1),
(323, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"72.00\" y fue \"P', 'Balance', 1),
(324, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA', 'Balance', 1),
(325, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(326, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PA', 'Balance', 1),
(327, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PA', 'Balance', 1),
(328, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"144.00\" y fue \"', 'Balance', 1),
(329, '2022-10-25', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P', 'Balance', 1),
(330, '2022-10-26', 'Registro de un nuevo rol : \"encargado\"', 'Roles', 1),
(331, '0000-00-00', 'Se registro un cliente con el numero de documento : 75558994', 'Modulo Clientes', 1),
(332, '0000-00-00', 'Se registro un cliente con el numero de documento : 10226548', 'Modulo Clientes', 1),
(333, '0000-00-00', 'Se registro un cliente con el numero de documento ', 'Modulo Clientes', 1),
(334, '0000-00-00', 'Se registro un cliente con el numero de documento 27695845 ', 'Modulo Clientes', 1),
(335, '0000-00-00', 'Se registro un cliente  96180088 ', 'Modulo Clientes', 1),
(336, '0000-00-00', 'Se registro un nuevo cliente con numero de documento 27629584 ', 'Modulo Clientes', 1),
(337, '0000-00-00', 'Se registro un nuevo cliente con numero de documento 27629586 ', 'Modulo Clientes', 1),
(338, '0000-00-00', 'Se registro un nuevo cliente con numero de documento 9618001 ', 'Modulo Clientes', 1),
(339, '0000-00-00', 'hola', 'pao', 1),
(340, '0000-00-00', 'Se registro un nuevo cliente con numero de documento 96180012 ', 'Modulo Clientes', 1),
(341, '0000-00-00', 'hola', 'pao', 1),
(342, '2023-02-12', 'Se registro un nuevo cliente con numero de documento 95180031 ', 'Modulo Clientes', 1),
(343, '2023-02-12', 'Se registro un nuevo cliente con numero de documento 27629574 ', 'Modulo Clientes', 1),
(344, '2023-02-12', 'Se registro un nuevo cliente con numero de documento 96180088 ', 'Modulo Clientes', 1),
(345, '2023-02-12', 'Se registro un nuevo cliente con numero de documento 96180070 ', 'Modulo Clientes', 1),
(346, '2023-02-12', 'Se modificó un cliente con numero de documento 27695845 ', 'Modulo Clientes', 1),
(347, '2023-02-12', 'Se eliminó un cliente ', 'Modulo Clientes', 1),
(348, '2023-02-13', 'Modificacion de la categoria : \"Verduras\"', 'Categoria Productos', 1),
(349, '2023-02-12', 'Se registro una nueva categoria \"Verduras\" ', 'Modulo Categorias', 1),
(350, '2023-02-13', 'Registro de nueva categoria : \"charcuteria\"', 'Categoria Productos', 1),
(351, '2023-02-12', 'Se registro una nueva categoria: charcuteria ', 'Modulo Categorias', 1),
(352, '2023-02-13', 'Registro de nueva categoria : \"adsdfsdfds\"', 'Categoria Productos', 1),
(353, '2023-02-12', 'Se registro una nueva categoria: adsdfsdfds ', 'Categorias Productos', 1),
(354, '2023-02-13', 'Modificacion de la categoria : \"adsdfsdfds\"', 'Categoria Productos', 1),
(355, '2023-02-12', 'Se eliminó una categoria con el id: 38 ', 'Categorias Productos', 1),
(356, '2023-02-12', 'Modificacion de la categoria a: \"charcuterias\" ', 'Categorias Productos', 1),
(357, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"PAGADA\"', 'Balance', 1),
(358, '2023-02-12', 'Se registro un nuevo Gasto con concepto de: compra viveres ', 'Gastos', 1),
(359, '2023-02-12', 'Se elimino el Gasto con id: 125 ', 'Gastos', 1),
(360, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"12.00\" y fue \"PAGADA\"', 'Balance', 1),
(361, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"60.00\" y fue \"PAGADA\"', 'Balance', 1),
(362, '2023-02-12', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 1),
(363, '2023-02-13', 'Se realizo un respaldo de la BASE DE DATOS ', 'Mantenimiento', 1),
(364, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"19.00\" y fue \"PAGADA\"', 'Balance', 1),
(365, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"A CREDITO\"', 'Balance', 1),
(366, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"TRANSPORTES, DOMICILIOS, LOGISTICA\" por \"20.00\" y fue \"PAGADA\"', 'Balance', 1),
(367, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"60.00\" y fue \"PAGADA\"', 'Balance', 1),
(368, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(369, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(370, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(371, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"46.00\" y fue \"PAGADA\"', 'Balance', 1),
(372, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(373, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(374, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"', 'Balance', 1),
(375, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"18.40\" y fue \"PAGADA\"', 'Balance', 1),
(376, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(377, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"', 'Balance', 1),
(378, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"A CREDITO\"', 'Balance', 1),
(379, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PAGADA\"', 'Balance', 1),
(380, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(381, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(382, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(383, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(384, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PAGADA\"', 'Balance', 1),
(385, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PAGADA\"', 'Balance', 1),
(386, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PAGADA\"', 'Balance', 1),
(387, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"20.00\" y fue \"PAGADA\"', 'Balance', 1),
(388, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"120.00\" y fue \"PAGADA\"', 'Balance', 1),
(389, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"140.00\" y fue \"PAGADA\"', 'Balance', 1),
(390, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.00\" y fue \"PAGADA\"', 'Balance', 1),
(391, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.50\" y fue \"PAGADA\"', 'Balance', 1),
(392, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"72.00\" y fue \"PAGADA\"', 'Balance', 1),
(393, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PAGADA\"', 'Balance', 1),
(394, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"', 'Balance', 1),
(395, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PAGADA\"', 'Balance', 1),
(396, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PAGADA\"', 'Balance', 1),
(397, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"144.00\" y fue \"PAGADA\"', 'Balance', 1),
(398, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"PAGADA\"', 'Balance', 1),
(399, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"PAGADA\"', 'Balance', 1),
(400, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"12.00\" y fue \"PAGADA\"', 'Balance', 1),
(401, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"60.00\" y fue \"PAGADA\"', 'Balance', 1),
(402, '2023-02-13', 'Registro de un nuevo Producto : \"HARINA\"', 'Productos', 1),
(403, '2023-02-13', 'Registro de un nuevo Producto : \"huevos\"', 'Productos', 1),
(404, '2023-02-13', 'Registro de un nuevo Producto : \"jugo naranja\"', 'Productos', 1),
(405, '2023-02-13', 'Registro de un nuevo Producto : \"FAROS\"', 'Productos', 1),
(406, '2023-02-13', 'Registro de un nuevo rol : \"vendedor\"', 'Roles', 1),
(407, '2023-02-13', 'Registro de un nuevo rol : \"superusuario\"', 'Roles', 1),
(408, '2023-02-13', 'Registro de un nuevo rol : \"aASDasa\"', 'Roles', 1),
(409, '2023-02-13', 'Registro de un nuevo rol : \"werwer\"', 'Roles', 1),
(410, '2023-02-13', 'Registro de un nuevo rol : \"sdfsdf\"', 'Roles', 1),
(411, '2023-02-13', 'Registro de un nuevo rol : \"eqwsadas\"', 'Roles', 1),
(412, '2023-02-13', 'Registro de un nuevo rol : \"encargado\"', 'Roles', 1),
(413, '2023-02-13', 'Registro de un nuevo usuario : \"SUPERUSUARIO\"', 'Usuarios', 1),
(414, '2023-02-13', 'Registro de un nuevo usuario : \"ARIANNA\"', 'Usuarios', 1),
(415, '2023-02-13', 'Registro de un nuevo usuario : \"FABIANA\"', 'Usuarios', 1),
(416, '2023-02-13', 'Se realizo una restauración de la BASE DE DATOS ', 'Mantenimiento', 1),
(417, '2023-02-13', 'Se registro una nueva marca: DOÑA EMILIA ', 'Marcas', 1),
(418, '2023-02-13', 'Se modificó una marca: DOÑA EMILIAS ', 'Marcas', 1),
(419, '2023-02-13', 'Se eliminó una marca con el id4 ', 'Marcas', 1),
(420, '2023-02-13', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(421, '2023-02-13', 'Se modificó una presentación ', 'Presentaciones', 1),
(422, '2023-02-13', 'Se eliminó una presentación con el id 7 ', 'Presentaciones', 1),
(423, '2023-02-13', 'Registro de un nuevo Producto : \"foros de luz\"', 'Productos', 1),
(424, '2023-02-13', 'Se registro un nuevo producto foros de luz ', 'Productos', 1),
(425, '2023-02-13', 'EL producto: \"foro de luz\" fue modificado', 'Productos', 1),
(426, '2023-02-13', 'Se modificó un producto foro de luz ', 'Productos', 1),
(427, '2023-02-13', 'EL producto: \"foro de luz\" fue modificado', 'Productos', 1),
(428, '2023-02-13', 'EL producto: \"jugo naranja\" fue modificado', 'Productos', 1),
(429, '2023-02-13', 'Registro de un nuevo Producto : \"arboles\"', 'Productos', 1),
(430, '2023-02-13', 'Se registro un nuevo producto arboles ', 'Productos', 1),
(431, '2023-02-13', 'EL producto: \"arboles\" fue modificado', 'Productos', 1),
(432, '2023-02-13', 'Se registro un nuevo producto paola ', 'Productos', 1),
(433, '2023-02-13', 'Se eliminó un producto con el id: 35 ', 'Productos', 1),
(434, '2023-02-13', 'Se registro un nuevo proveedor jinfer miranda ', 'Proveedores', 1),
(435, '2023-02-13', 'Se modificó un proveedor jinfe miranda ', 'Proveedores', 1),
(436, '2023-02-13', 'Se eliminó un proveedor con el id: 2 ', 'Proveedores', 1),
(437, '2023-02-13', 'Registro de un nuevo rol : \"administrador\"', 'Roles', 1),
(438, '2023-02-13', 'Se registro un nuevo rol administrador ', 'Seguridad', 1),
(439, '2023-02-13', 'El rol : \"administrado\" fue modificado', 'Roles', 1),
(440, '2023-02-13', 'Se modificó un rRol administrado ', 'Seguridad', 1),
(441, '2023-02-13', 'El rol : \"administrado\" fue modificado', 'Roles', 1),
(442, '2023-02-13', 'Se eliminó un Rol con el id: 13 ', 'Seguridad', 1),
(443, '2023-02-13', 'Registro de un nuevo usuario : \"DANIELA\"', 'Usuarios', 1),
(444, '2023-02-13', 'Se registro un nuevo Usuario DANIELA ', 'Usuarios', 1),
(445, '2023-02-13', 'Se modificó un Usuario DANIELAs ', 'Usuarios', 1),
(446, '2023-02-13', 'Se eliminó un Usuario con el id: 19 ', 'Usuarios', 1),
(447, '2023-02-13', 'Registro de nuevo movimiento en el balance por: \"VENTA\" por \"45.00\" y fue \"PAGADA\"', 'Balance', 1),
(448, '2023-02-13', 'Se registro una nueva Venta ', 'Ingresos', 1),
(449, '2023-02-13', 'Se eliminó una venta con el id: 130 ', 'Ingresos', 1),
(450, '2023-03-06', 'Se eliminó un Rol con el id: 1 ', 'Seguridad', 3),
(451, '2023-03-07', 'Se eliminó un Rol con el id: 1 ', 'Seguridad', 1),
(452, '2023-03-07', 'Se eliminó un Rol con el id: 1 ', 'Seguridad', 1),
(453, '2023-03-07', 'Se modificó un Rol paola ', 'Seguridad', 1),
(454, '2023-03-07', 'Se modificó un Rol paolas ', 'Seguridad', 1),
(455, '2023-03-07', 'Se modificó un Rol paola ', 'Seguridad', 1),
(456, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(457, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(458, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(459, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(460, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(461, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(462, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(463, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(464, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(465, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(466, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(467, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(468, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(469, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(470, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(471, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(472, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(473, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(474, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(475, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(476, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(477, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(478, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(479, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(480, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(481, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(482, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(483, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(484, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(485, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(486, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(487, '2023-03-09', 'Se registro una nueva Venta ', 'Ingresos', 3),
(488, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(489, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(490, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(491, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(492, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(493, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(494, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(495, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(496, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(497, '2023-03-10', 'Se registro una nueva Venta ', 'Ingresos', 3),
(498, '2023-03-09', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 3),
(499, '2023-03-10', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 3),
(500, '2023-03-10', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 3),
(501, '2023-03-09', 'Se registro un nuevo ingreso de productos con numero de factura: 000010 ', 'Ingresos', 3),
(502, '2023-03-10', 'Se registro un nuevo ingreso de productos con numero de factura: 000010 ', 'Ingresos', 3),
(503, '2023-03-10', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 3),
(504, '2023-03-09', 'Se registro un nuevo ingreso de productos con numero de factura: 122210 ', 'Ingresos', 3),
(505, '2023-03-10', 'Se registro un nuevo ingreso de productos con numero de factura: 00008 ', 'Ingresos', 3),
(506, '2023-03-09', 'Se registro un nuevo ingreso de productos con numero de factura: 000080 ', 'Ingresos', 3),
(507, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(508, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(509, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(510, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(511, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(512, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(513, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(514, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(515, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(516, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 1 ', 'Deudas', 1),
(517, '2023-03-16', 'Se registro una nueva marca: PAN POLAR ', 'Marcas', 1),
(518, '2023-03-16', 'Se registro una nueva marca: MAZEITE ', 'Marcas', 1),
(519, '2023-03-16', 'Se registro una nueva marca: DOÑA EMILIA ', 'Marcas', 1),
(520, '2023-03-16', 'Se registro una nueva marca: YUQUERY ', 'Marcas', 1),
(521, '2023-03-16', 'Se registro una nueva marca: MONTALBAN ', 'Marcas', 1),
(522, '2023-03-16', 'Se registro una nueva marca: MONTALBAN ', 'Marcas', 1),
(523, '2023-03-16', 'Se registro una nueva marca: MAVESA ', 'Marcas', 1),
(524, '2023-03-16', 'Se registro una nueva marca: ALIVE ', 'Marcas', 1),
(525, '2023-03-16', 'Se registro una nueva marca: MINALBA ', 'Marcas', 1),
(526, '2023-03-16', 'Se registro una nueva marca: MINALBA ', 'Marcas', 1),
(527, '2023-03-16', 'Se registro una nueva marca: MINALBA ', 'Marcas', 1),
(528, '2023-03-16', 'Se registro una nueva marca: EBENECER ', 'Marcas', 1),
(529, '2023-03-16', 'Se registro una nueva marca: EBENECER ', 'Marcas', 1),
(530, '2023-03-16', 'Se registro una nueva marca: VATEL ', 'Marcas', 1),
(531, '2023-03-16', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(532, '2023-03-16', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(533, '2023-03-16', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(534, '2023-03-16', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(535, '2023-03-16', 'Se registro una nueva presentación ', 'Presentaciones', 1),
(536, '2023-03-16', 'Se registro una nueva categoria: ASEO PERSONAL ', 'Categorias Productos', 1),
(537, '2023-03-16', 'Se registro una nueva categoria: CHARCUTERIA ', 'Categorias Productos', 1),
(538, '2023-03-16', 'Se registro una nueva categoria: CHARCUTERIA ', 'Categorias Productos', 1),
(539, '2023-03-16', 'Se registro un nuevo producto HARINA PAN ', 'Productos', 1),
(540, '2023-03-16', 'Se registro un nuevo producto ACEITE MAZEITE ', 'Productos', 1),
(541, '2023-03-16', 'Se registro un nuevo producto ACEITE MAZEITE ', 'Productos', 1),
(542, '2023-03-16', 'Se registro un nuevo ingreso de productos con numero de factura: 00001 ', 'Ingresos', 1),
(543, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(544, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(545, '2023-03-16', 'Se registro un nuevo Gasto con concepto de: compra aceite por el monto de 320 y fue A CREDITO', 'Gastos', 1),
(546, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 17 ', 'Deudas', 1),
(547, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 17 ', 'Deudas', 1),
(548, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 1 ', 'Deudas', 1),
(549, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(550, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 2 ', 'Deudas', 1),
(551, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 2 ', 'Deudas', 1),
(552, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 2 ', 'Deudas', 1),
(553, '2023-03-16', 'Se registro una nueva Venta ', 'Ingresos', 1),
(554, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 2 ', 'Deudas', 1),
(555, '2023-03-16', 'Se registro un nuevo abono a la cuenta con id= 2 ', 'Deudas', 1),
(556, '2023-03-16', 'Se modificó un Rol ENCARGADO ', 'Seguridad', 1),
(557, '2023-03-16', 'Se modificó un Usuario ARIANNA ', 'Usuarios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_producto`
--

CREATE TABLE `cat_producto` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cat_producto`
--

INSERT INTO `cat_producto` (`id`, `categoria`, `estado`) VALUES
(32, 'Verduras', '1'),
(33, 'Viveres', '1'),
(34, 'Carnes', '1'),
(40, 'limpieza', '1'),
(41, 'ASEO PERSONAL', '1'),
(42, 'CHARCUTERIA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nro_doc` int(11) NOT NULL,
  `tipo_doc` varchar(25) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `nro_doc`, `tipo_doc`, `telefono`, `estado`) VALUES
(1, 'daniela antonia', 27629581, 'CI', '04147483641', 1),
(2, 'Arianna Colmenarez', 566488978, 'CI', '04147483642', 1),
(3, 'fernando miranda', 10776355, 'CI', '04265515445', 1),
(4, 'maria jose', 75558994, 'CI', '02456651415', 1),
(5, 'jose manuel', 10226548, 'CI', '56445645655', 1),
(6, 'mauricio gamba', 96180031, 'CI', '02415488755', 1),
(7, 'paola jose', 96180044, 'CI', '04147483647', 1),
(8, 'jose becerra', 27695845, 'CI', '20221664411', 1),
(10, 'paola colmenarez', 27629584, 'CI', '04147483642', 1),
(11, 'arianna paola', 27629586, 'CI', '04147483621', 1),
(14, 'Daniela VELIZ', 96180012, 'CI', '04147483611', 1),
(15, 'paola altagracia', 9618456, 'CI', '04147483456', 1),
(17, 'arianna paola', 27629574, 'CI', '04147483609', 1),
(18, 'jinfer miranda', 96180070, 'CI', '04147483647', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_movimiento`
--

CREATE TABLE `concepto_movimiento` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `concepto_movimiento`
--

INSERT INTO `concepto_movimiento` (`id`, `categoria`, `estado`) VALUES
(1, 'VENTA', '1'),
(2, 'SERVICIOS PÚBLICOS', '1'),
(3, 'COMPRA DE PRODUCTOS E INSUMOS', '1'),
(4, 'ARRIENDO', '1'),
(5, 'NÓMINA', '1'),
(6, 'GASTOS ADMINISTRATIVOS', '1'),
(7, 'MERCADEO Y PUBLICIDAD', '1'),
(8, 'TRANSPORTES, DOMICILIOS, LOGISTICA', '1'),
(9, 'MANTENIMIENTO Y REPARACIONES', '1'),
(10, 'MUEBLES, EQUIPOS Y MAQUINARÍA', '1'),
(11, 'OTROS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_movimientos`
--

CREATE TABLE `detalles_movimientos` (
  `id` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_movimientos` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_movimientos`
--

INSERT INTO `detalles_movimientos` (`id`, `precio`, `cantidad`, `estado`, `id_movimientos`, `id_producto`) VALUES
(130, '25.00', 1, '1', 196, 36),
(131, '38.00', 1, '1', 197, 37),
(132, '25.00', 1, '1', 197, 36),
(133, '25.00', 1, '1', 199, 36),
(134, '38.00', 1, '1', 199, 37),
(135, '25.00', 1, '1', 200, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_detalles`
--

CREATE TABLE `ingreso_detalles` (
  `id` int(11) NOT NULL,
  `precio_venta` float(11,2) NOT NULL,
  `precio_costo` float(11,2) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_detalles`
--

INSERT INTO `ingreso_detalles` (`id`, `precio_venta`, `precio_costo`, `cantidad`, `id_producto`, `estado`, `id_ingreso`) VALUES
(17, 25.00, 20.00, 16.00, 36, 2, 18),
(18, 38.00, 32.00, 4.00, 37, 2, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_productos`
--

CREATE TABLE `ingreso_productos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nro_factura` varchar(20) NOT NULL,
  `fecha_factura` date NOT NULL,
  `estado_factura` varchar(25) NOT NULL,
  `total_factura` float(11,2) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_productos`
--

INSERT INTO `ingreso_productos` (`id`, `fecha`, `nro_factura`, `fecha_factura`, `estado_factura`, `total_factura`, `id_proveedor`, `id_metodo_pago`, `estado`) VALUES
(18, '2023-03-16', '00001', '2023-03-16', 'PAGADA', 784.00, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id`, `nombre`, `estado`) VALUES
(1, 'JUANA', 1),
(6, 'PAN POLAR', 1),
(7, 'MAZEITE', 1),
(8, 'DOÑA EMILIA', 1),
(9, 'YUQUERY', 1),
(10, 'MONTALBAN', 1),
(11, 'MAVESA', 1),
(12, 'ALIVE', 1),
(13, 'MINALBA', 1),
(14, 'EBENECER', 1),
(15, 'VATEL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id`, `nombre`) VALUES
(1, 'EFECTIVO'),
(2, 'TARJETA'),
(3, 'TRANSFERENCIA'),
(4, 'DOLARES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado_movimiento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_concepto_movimiento` int(11) NOT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `nombre`, `total`, `fecha`, `hora`, `estado_movimiento`, `estado`, `id_concepto_movimiento`, `id_metodo_pago`, `id_proveedor`, `id_cliente`, `id_usuario`) VALUES
(195, 'compra de productos', '784.00', '2023-03-16', '13:16:00', 'PAGADA', '1', 3, 4, 1, NULL, 1),
(196, '', '25.00', '2023-03-16', '13:22:00', 'PAGADA', '1', 1, 1, NULL, NULL, 1),
(197, '', '63.00', '2023-03-16', '13:23:00', 'A CREDITO', '0', 1, 1, NULL, 17, 1),
(198, 'compra aceite', '320.00', '2023-03-16', '13:23:00', 'A CREDITO', '1', 3, 2, 1, NULL, 1),
(199, '', '63.00', '2023-03-16', '14:19:00', 'PAGADO', '1', 1, 1, NULL, 2, 1),
(200, '', '25.00', '2023-03-16', '14:27:00', 'A CREDITO', '1', 1, 1, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `titulo`, `mensaje`, `estado`, `created_at`) VALUES
(18, 'daniela tiene una dueda atrasada', 'la deuda es del 2022-10-21 por 9.20 bs', 0, '2022-10-21 19:03:41'),
(19, 'ARIANNA tiene una dueda atrasada', 'la deuda es del 2022-10-01 por 5.00 bs', 0, '2022-10-21 19:03:42'),
(20, 'ARIANNA tiene una dueda atrasada', 'la deuda es del 2022-10-01 por 5.00 bs', 0, '2022-10-21 19:03:42'),
(21, 'ARIANNA tiene una dueda atrasada', 'la deuda es del 2022-10-13 por 5.00 bs', 0, '2022-10-21 19:03:43'),
(22, 'daniela tiene una dueda atrasada', 'la deuda es del 2022-10-21 por 9.20 bs', 0, '2022-10-21 19:03:36'),
(23, ' Tienes una dueda atrasada conARIANNA', 'la deuda es del 2022-10-01 por 5.00 bs', 0, '2022-10-21 19:03:39'),
(24, ' Tienes una dueda atrasada conARIANNA', 'la deuda es del 2022-10-01 por 5.00 bs', 0, '2022-10-21 19:03:40'),
(25, ' Tienes una dueda atrasada conARIANNA', 'la deuda es del 2022-10-13 por 5.00 bs', 0, '2022-10-21 19:03:41'),
(26, ' Tienes una dueda atrasada con ARIANNA', 'la deuda es del 2023-03-16 por 320.00 bs', 1, '2023-03-16 18:45:15'),
(27, 'Arianna Colmenarez tiene una dueda atrasada', 'la deuda es del 2023-03-16 por 25.00 bs', 1, '2023-03-16 18:45:15'),
(28, ' Tienes una dueda atrasada con ARIANNA', 'la deuda es del 2023-03-16 por 320.00 bs', 1, '2023-03-16 18:46:23'),
(29, 'Arianna Colmenarez tiene una dueda atrasada', 'la deuda es del 2023-03-16 por 25.00 bs', 1, '2023-03-16 18:46:23'),
(30, ' Tienes un producto que se esta agotando', 'ACEITE MAZEITEMAZEITE Este producto se esta agotando tienes solo 4.00 en stock', 1, '2023-03-16 18:46:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `estado`) VALUES
(1, 'Consultar Ventas', '1'),
(2, 'Modificar Balance', '1'),
(3, 'Crear Ventas', '1'),
(4, 'Anular Ventas', '1'),
(5, 'Consultar Inventario', '1'),
(6, 'Modificar Inventario', ''),
(7, 'Crear Inventario', '1'),
(8, 'Eliminar Inventario', '1'),
(9, 'Consultar Deudas', '1'),
(10, 'Abonar Deudas', '1'),
(12, 'Eliminar Deudas', '1'),
(13, 'Consultar Proveedores', '1'),
(14, 'Modificar Proveedores', '1'),
(15, 'Crear Proveedores', '1'),
(16, 'Eliminar Proveedores', '1'),
(17, 'Consultar Clientes', '1'),
(18, 'Modificar Clientes', '1'),
(19, 'Crear Clientes', '1'),
(20, 'Eliminar Clientes', '1'),
(21, 'Consultar Usuarios', '1'),
(22, 'Modificar Usuarios', '1'),
(23, 'Crear Usuarios', ''),
(24, 'Eliminar Usuarios', '1'),
(25, 'Estadisticas Ventas', '1'),
(26, 'Consultar Reportes Balance', '1'),
(27, 'Consultar Reportes Inventario', '1'),
(28, 'Consultar Reportes Deudas', '1'),
(29, 'Crear Respaldo Base Datos', '1'),
(30, 'Modificar Base Datos', '1'),
(31, 'Consultar Roles', '1'),
(32, 'Modificar Roles', '1'),
(33, 'Crear Roles', '1'),
(34, 'Eliminar Roles', '1'),
(35, 'Crear Permisos', '1'),
(36, 'Consultar Reportes Bitacora', '1'),
(37, 'Consultar Gastos', '1'),
(38, 'Registrar Gastos', '1'),
(39, 'Eliminar Gastos', '1'),
(40, 'Consultar Ingresos', '1'),
(41, 'Crear Ingresos', '1'),
(42, 'Anular Ingresos', '1'),
(43, 'Consultar Productos', '1'),
(44, 'Crear Productos', '1'),
(45, 'Modificar Productos', '1'),
(46, 'Eliminar Productos', '1'),
(47, 'Consultar Categorias', '1'),
(48, 'Modificar Categorias', '1'),
(49, 'Eliminar Categorias', '1'),
(50, 'Crear Categorias', '1'),
(51, 'Consultar Presentaciones', '1'),
(52, 'Modificar Presentaciones', '1'),
(53, 'Crear Presentaciones', '1'),
(54, 'Eliminar Presentaciones', '1'),
(55, 'Consultar Marcas', '1'),
(56, 'Modificar Marcas', '1'),
(57, 'Crear Marcas', '1'),
(58, 'Eliminar Marcas', '1'),
(59, 'Estadisticas Gastos', '1'),
(60, 'Estadisticas Vendidos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion_producto`
--

CREATE TABLE `presentacion_producto` (
  `id` int(11) NOT NULL,
  `volumen` int(11) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `unidades` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presentacion_producto`
--

INSERT INTO `presentacion_producto` (`id`, `volumen`, `unidad_medida`, `unidades`, `estado`) VALUES
(1, 1, 'KG', 1, 1),
(3, 500, 'ML', 1, 1),
(5, 1, 'UNIDAD', 30, 1),
(6, 250, 'ML', 1, 1),
(9, 100, 'metros', 1, 1),
(10, 1, 'L', 1, 1),
(11, 1, 'L', 12, 1),
(12, 1, 'G', 1, 1),
(13, 20, 'L', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `url_img` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_presentacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `url_img`, `estado`, `id_categoria`, `id_marca`, `id_presentacion`) VALUES
(36, 'HARINA PAN', '', 'assets/images/productos/100343473.jpg', '1', 33, 6, 1),
(37, 'ACEITE MAZEITE', '', 'assets/images/productos/0002514_aceite-de-maiz-mazeite-1-l_450.jpeg', '1', 33, 7, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nro_doc` int(11) NOT NULL,
  `tipo_doc` varchar(25) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nro_doc`, `tipo_doc`, `contacto`, `direccion`, `estado`) VALUES
(1, 'ARIANNA', 27629581, 'CI', '04267346011', '', 1),
(3, 'ANGELs', 27629588, 'CI', '0245211254', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'ENCARGADO', 'Se encarga de manejar el sistema', '1'),
(3, 'superusuario', 'tiene todos los permisos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `id_rol`, `id_permiso`) VALUES
(342, 3, 21),
(343, 3, 22),
(344, 3, 23),
(345, 3, 24),
(346, 3, 5),
(347, 3, 1),
(348, 3, 3),
(349, 3, 4),
(350, 3, 37),
(351, 3, 38),
(352, 3, 39),
(353, 3, 40),
(354, 3, 41),
(355, 3, 42),
(356, 3, 43),
(357, 3, 45),
(358, 3, 44),
(359, 3, 46),
(360, 3, 47),
(361, 3, 48),
(362, 3, 50),
(363, 3, 49),
(364, 3, 51),
(365, 3, 52),
(366, 3, 53),
(367, 3, 54),
(368, 3, 55),
(369, 3, 56),
(370, 3, 57),
(371, 3, 58),
(372, 3, 9),
(373, 3, 10),
(374, 3, 12),
(375, 3, 17),
(376, 3, 18),
(377, 3, 19),
(378, 3, 20),
(379, 3, 13),
(380, 3, 14),
(381, 3, 15),
(382, 3, 16),
(383, 3, 25),
(384, 3, 59),
(385, 3, 60),
(386, 3, 27),
(387, 3, 26),
(388, 3, 28),
(389, 3, 36),
(390, 3, 29),
(391, 3, 30),
(392, 3, 31),
(393, 3, 32),
(394, 3, 33),
(395, 3, 34),
(396, 3, 35),
(400, 1, 5),
(401, 1, 1),
(402, 1, 3),
(403, 1, 4),
(404, 1, 37),
(405, 1, 38),
(406, 1, 39),
(407, 1, 40),
(408, 1, 41),
(409, 1, 42),
(410, 1, 43),
(411, 1, 45),
(412, 1, 44),
(413, 1, 46),
(414, 1, 47),
(415, 1, 48),
(416, 1, 50),
(417, 1, 49),
(418, 1, 51),
(419, 1, 52),
(420, 1, 53),
(421, 1, 54),
(422, 1, 55),
(423, 1, 56),
(424, 1, 57),
(425, 1, 58),
(426, 1, 9),
(427, 1, 10),
(428, 1, 12),
(429, 1, 17),
(430, 1, 18),
(431, 1, 19),
(432, 1, 20),
(433, 1, 13),
(434, 1, 14),
(435, 1, 15),
(436, 1, 16),
(437, 1, 25),
(438, 1, 59),
(439, 1, 60),
(440, 1, 27),
(441, 1, 26),
(442, 1, 28),
(443, 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `clave`, `estado`, `id_rol`) VALUES
(1, 'SUPERUSUARIO', 'ezcolmenarjose@gmail.com', 'MEVZS280RDNOR3Y2VlpEdHRlbDk0Zz09', '1', 3),
(3, 'ARIANNA', 'aripaocol@gmail.com', 'OVNRMjlzWkNQamp4SHVpSzNwYW5lZz09', '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `abono_movimiento`
--
ALTER TABLE `abono_movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_movimiento` (`id_movimiento`),
  ADD KEY `id_abono` (`id_abono`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cat_producto`
--
ALTER TABLE `cat_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concepto_movimiento`
--
ALTER TABLE `concepto_movimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_movimientos`
--
ALTER TABLE `detalles_movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_movimientos` (`id_movimientos`) USING BTREE;

--
-- Indices de la tabla `ingreso_detalles`
--
ALTER TABLE `ingreso_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ingreso` (`id_ingreso`);

--
-- Indices de la tabla `ingreso_productos`
--
ALTER TABLE `ingreso_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`),
  ADD KEY `id_persona` (`id_proveedor`),
  ADD KEY `id_concepto_movimiento` (`id_concepto_movimiento`) USING BTREE,
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentacion_producto`
--
ALTER TABLE `presentacion_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `abono_movimiento`
--
ALTER TABLE `abono_movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT de la tabla `cat_producto`
--
ALTER TABLE `cat_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `concepto_movimiento`
--
ALTER TABLE `concepto_movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalles_movimientos`
--
ALTER TABLE `detalles_movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `ingreso_detalles`
--
ALTER TABLE `ingreso_detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ingreso_productos`
--
ALTER TABLE `ingreso_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `presentacion_producto`
--
ALTER TABLE `presentacion_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `abonos_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `abono_movimiento`
--
ALTER TABLE `abono_movimiento`
  ADD CONSTRAINT `abono_movimiento_ibfk_1` FOREIGN KEY (`id_movimiento`) REFERENCES `movimientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abono_movimiento_ibfk_2` FOREIGN KEY (`id_abono`) REFERENCES `abonos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_movimientos`
--
ALTER TABLE `detalles_movimientos`
  ADD CONSTRAINT `detalles_movimientos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_movimientos_ibfk_2` FOREIGN KEY (`id_movimientos`) REFERENCES `movimientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_detalles`
--
ALTER TABLE `ingreso_detalles`
  ADD CONSTRAINT `ingreso_detalles_ibfk_1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_detalles_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_productos`
--
ALTER TABLE `ingreso_productos`
  ADD CONSTRAINT `ingreso_productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_productos_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_concepto_movimiento`) REFERENCES `concepto_movimiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `cat_producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion_producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca_producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
