-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 19:51:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Base de datos: `dbemt3grp03`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nom_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nom_admin`) VALUES
('ivan19');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `admin_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `admin_productos` (
`Id` int(11)
,`Nombre` varchar(100)
,`Precio` decimal(10,0)
,`Imagen` varchar(250)
,`Tipo` varchar(100)
,`Descripcion` varchar(1000)
,`FechaAlta` timestamp
,`Administrador` varchar(100)
,`NombreUsuario` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_cart` int(11) NOT NULL,
  `nom_cli` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_cart`, `nom_cli`, `estado`) VALUES
(1, 'lucass', 0),
(18, 'lucass', 0),
(19, 'lucass', 0),
(20, 'lucass', 0),
(24, 'lucass', 0),
(25, 'jonacap', 0),
(26, 'jonacap', 0),
(28, 'FacuLens', 1),
(29, 'lucass', 0),
(30, 'lucass', 0),
(31, 'jonacap', 0),
(36, 'jonacap', 0),
(39, 'jonacap', 1),
(40, 'lucass', 1),
(44, 'Jbent', 0),
(45, 'Jbent', 0),
(46, 'PablitoCli', 1),
(48, 'Leonss23', 0),
(49, 'Leonss23', 0),
(50, 'Leonss23', 1),
(51, 'Jbent', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `carrito_activo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `carrito_activo` (
`Cliente` varchar(100)
,`Producto` varchar(100)
,`Cantidad` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nom_cli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nom_cli`) VALUES
('ChrissM'),
('dsds'),
('FacuLens'),
('Jbent'),
('jonacap'),
('Leonss23'),
('lucass'),
('PablitoCli');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `compras_cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `compras_cliente` (
`IdPed` int(11)
,`Fecha` timestamp
,`Cliente` varchar(100)
,`Producto` varchar(100)
,`Cantidad` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `compra_cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `compra_cliente` (
`IdPed` int(11)
,`Fecha` timestamp
,`Cliente` varchar(100)
,`Producto` varchar(100)
,`Cantidad` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nom_emp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nom_emp`) VALUES
('Jrodriguez'),
('pablito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta`
--

CREATE TABLE `esta` (
  `id_ped` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `esta`
--

INSERT INTO `esta` (`id_ped`, `id_cart`) VALUES
(1, 1),
(2, 18),
(9, 24),
(11, 26),
(14, 29),
(21, 31),
(22, 36),
(25, 39),
(26, 40),
(29, 44),
(30, 45),
(31, 46),
(33, 48),
(34, 49),
(35, 50),
(36, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiona`
--

CREATE TABLE `gestiona` (
  `nom_emp` varchar(100) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestiona`
--

INSERT INTO `gestiona` (`nom_emp`, `id_prod`) VALUES
('Pablito', 4),
('Pablito', 5),
('Pablito', 11),
('Pablito', 14),
('Pablito', 17),
('Pablito', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_ped` int(11) NOT NULL,
  `nom_cli` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_ped`, `nom_cli`, `estado`, `fecha`) VALUES
(1, 'lucass', 0, '2022-11-05 01:01:19'),
(2, 'lucass', 0, '2022-11-05 01:01:19'),
(4, 'lucass', 0, '2022-11-05 01:01:41'),
(5, 'lucass', 0, '2022-11-15 00:32:33'),
(8, 'dsds', 1, '2022-11-15 00:39:25'),
(9, 'lucass', 0, '2022-11-18 17:12:45'),
(10, 'jonacap', 0, '2022-11-18 17:21:59'),
(11, 'jonacap', 0, '2022-11-18 17:23:48'),
(13, 'FacuLens', 1, '2022-11-18 22:29:18'),
(14, 'lucass', 0, '2022-11-20 00:52:54'),
(15, 'lucass', 0, '2022-11-20 01:13:18'),
(21, 'jonacap', 0, '2022-11-20 01:39:35'),
(22, 'jonacap', 0, '2022-11-20 01:40:32'),
(25, 'jonacap', 1, '2022-11-20 01:46:19'),
(26, 'lucass', 1, '2022-11-20 22:28:14'),
(29, 'Jbent', 0, '2022-11-21 17:19:03'),
(30, 'Jbent', 0, '2022-11-21 17:21:52'),
(31, 'PablitoCli', 1, '2022-11-22 17:45:09'),
(33, 'Leonss23', 0, '2022-11-22 23:08:58'),
(34, 'Leonss23', 0, '2022-11-22 23:10:25'),
(35, 'Leonss23', 1, '2022-11-23 17:11:21'),
(36, 'Jbent', 1, '2022-11-23 17:18:14');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pedidos_cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pedidos_cliente` (
`Pedido` int(11)
,`Cliente` varchar(100)
,`Producto` varchar(100)
,`Cantidad` int(11)
,`Fecha` timestamp
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `fec_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `apellido`, `direccion`, `telefono`, `fec_nac`) VALUES
(17482953, 'Lucas', 'Rodriguez', 'Montevideo, Uruguay', '42729444', '1996-04-12'),
(23456789, 'Facundo', 'Lens', '', '092327539', '1992-02-12'),
(26931756, 'Martin', 'Lopez', '', '0962003', '2006-08-25'),
(36851963, 'Gimena', 'Viera', '', '09656225', '2001-03-20'),
(38409183, 'Javier', 'Bentancour', 'Castillos,Rocha', '092752367', '1991-04-03'),
(43175602, 'Pablo', 'Martinez', 'Cardona, Soriano, Uruguay', '42786742', '1997-02-20'),
(52151081, 'Pepe', 'Rodriguez', 'calle 18 entre r1 y r2', '94765653', '2002-05-11'),
(52520751, 'Jonathan', 'Rodriguez', '', '94259658', '1997-02-23'),
(53388243, 'Leonardo', 'Gatti', 'Bajopuente', '885984902', '1992-04-23'),
(53530751, 'Ivan', 'Martirena', 'Atlantida, Canelones, Uruguay', '91340338', '2003-09-29'),
(56568945, 'Chris', 'Mendez', '', '095369785', '1996-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `nom_admin` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `fec_alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre`, `precio`, `imagen`, `tipo`, `descripcion`, `nom_admin`, `stock`, `fec_alta`) VALUES
(4, 'Vino Blanco Frizzante NEW AGE 750 ml', '311', 'https://images-ti-vm1.tiendainglesa.com.uy/large/P080510-1.jpg?20210701173132,Vino-Blanco-Frizzante-NEW-AGE-750-ml-en-Tienda-Inglesa', 'blanco', 'Vino de color amarillo verdoso de tonalidad muy leve. Aromas frutales y florales de gran intensidad típico de las variedades que lo componen. La copa de New Age es una refrescante macedonia de frutos maduros y flores multicolores que nos recuerdan una mañana primaveral en la campiña. Equilibrada acidez, suave, dulce, chispeante y muy divertido.', 'ivan19', 12, '2022-09-30 00:44:22'),
(5, 'Vino Pinot Rose De Corte GARZÓN 750 ml', '502', 'https://images-ti-vm1.tiendainglesa.com.uy/large/P399638-1.jpg?20210915092422,Vino-Pinot-Rose-De-Corte-GARZ%C3%93N-750-ml-en-Tienda-Inglesa', 'rosado', 'Con un delicado y tenue color rosado piel de cebolla, nuestro Pinot Noir Rosé se caracteriza aromáticamente por su frescura y delicadeza, donde resaltan las notas a cereza y fresas. En boca es elegante, con marcada acidez y un final mineral que le permite expresar la autenticidad de nuestro terruño.', 'ivan19', 24, '2022-09-30 00:44:22'),
(6, 'Vino Roble Tempranillo', '338', 'https://images-ti-vm1.tiendainglesa.com.uy/large/P368732-1.jpg?20211127030012,Vino-Roble-Tempranillo-PATA-NEGRA-750-ml-en-Tienda-Inglesa', 'tinto', 'Aromas ahumados bien integrados con fruta varietal (frutas del bosque, bayas de color rojo y negro) y un fondo de vainilla propio de la buena crianza en barrica. En boca manifiesta buena estructura, es suave y redondo. Se muestra claramente frutal, persistente, largo y con un postgusto tostado. ', 'ivan19', 66, '2022-09-30 00:44:22'),
(10, 'Vino Tinto CONCHA Y TORO Carmenere Reservado 750 ml', '308', 'https://images-ti-vm1.tiendainglesa.com.uy/large/P140901-1.jpg?20210701173132,Vino-Tinto-CONCHA-Y-TORO-Carmenere-Reservado-750-ml-en-Tienda-Inglesa', 'tinto', 'Color Rojo rubí intenso con leves notas violetas.\r\nAroma Intenso aroma a ciruelas y especias.\r\nSabor Suave, redondo y con buen final.\r\nAcompaña Pastas, quesos, cordero y pollo a la parrilla.', 'ivan19', 31, '2022-10-04 00:09:57'),
(11, 'Vino Blanco DON PASCUAL Brut Blanc de Blancs 750 ml', '360', 'https://images-ti-vm1.tiendainglesa.com.uy/large/P079559-1.jpg?20210310195259,Vino-Blanco-DON-PASCUAL-Brut-Blanc-de-Blancs-750-ml-en-Tienda-Inglesa', 'blanco', 'Expresivo Sauvignon que fusiona los intensos aromas cítricos y tropicales del Sauvignon Blanc con el carácter y estructura del Sauvignon Gris.\r\nColor: Amarillo pálido con matices.\r\nNariz: Aromas fragantes de pomelo, guayaba y maracuyá.\r\nBoca: Maduro y cítrico, buena acidez con notas dulces verdes.', 'ivan19', 6, '2022-10-04 00:09:57'),
(12, 'Alma Negra Tinto', '2001', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/almanegra-tinto-alejandro-kuschnaroff-argentina-blend-domaine-mendoza-vino-vinos-del-mundo_148_900x.jpg?v=1545701208', 'tinto', 'De color rojo carmín, muy brillante. En nariz, es muy expresivo e intenso. Las frutillas, cerezas y membrillos son los aromas frutales que más se destacan, fundiéndose con notas de vainilla, madera tostada y sutiles notas a especias.', 'ivan19', 10, '2022-10-04 00:15:45'),
(13, 'AMALAYA MALBEC', '950', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/amalaya-tinto-argentina-blend-salta-thibault-delmotte-vino-vinos-del-mundo_863_800x.jpg?v=1545701212', 'tinto', 'Donde otros vieron un desierto nosotros vimos grandes vinos. Amalaya significa Esperanza por un Milagro en lengua indígena, el milagro se hace revelación desde las entrañas del Desierto de Cafayate de una forma mística y mágica para brindarnos sus vides de excelente calidad. El circulo holístico que es nuestro isologo refleja la fertilidad de la “pacha mana’ o madre tierra.', 'ivan19', 14, '2022-10-04 00:18:36'),
(14, 'ANDELUNA ELEVACIÓN RED BLEND', '1370', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/AndelunaElevacion-VDM_800x.jpg?v=1614165556', 'tinto', 'Se caracteriza por su color rojo intenso, matices bermellón y brillo profundo.\r\nEl complejo aromático es muy particular y amplio, notas herbales nativas del piedemonte andino, frutos rojos como arándanos, fresas y grosellas.', 'ivan19', 15, '2022-10-04 00:20:58'),
(15, 'PENFOLDS GRANGE', '76200', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/penfolds-grange-australia-blend-peter-gago-south-vino-tinto-vinos-del-mundo_669_800x.jpg?v=1545702335', 'tinto', ' Color negro opaco, con bordes rojo oscuro. En nariz es una erupción aromática, especias y mucha frambuesa fresca. Aparecen muy bien integrados los aromas de la barrica, respetando la fruta de la uva madura. Gran elegancia.', 'ivan19', 13, '2022-10-04 00:23:12'),
(16, 'LAGARDE GOES PINK ROSÉ', '980', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/lagardeGoesPink2018_800x.jpg?v=1546913461', 'rosado', 'Lagarde elabora su primer vino Rosado en 1989.\r\nA través de los años el aprendizaje nos permite elaborar el mejor rosé posible. La cosecha 2017 es la culminación de nuestra historia siendo un ejemplo de un vino puro, fresco balanceado perfecto para maridar con verano, amigos y el mar.', 'ivan19', 12, '2022-10-04 00:25:04'),
(17, 'MOUTON CADET ROSE', '1860', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/mouton-cadet-rose-barons-de-rothschild-lafite-blend-bordeaux-francia-pierre-lambert-bio-vino-vinos-del-mundo_651_800x.jpg?v=1545702328', 'rosado', 'Desde los inicios, la producción de Mouton Cadet se ha basado en las habilidades y la experiencia de los viticultores de Bordeaux para dar al vino su identidad única.', 'ivan19', 30, '2022-10-04 00:29:22'),
(18, 'SANTA JULIA SYRAH ROSE', '286', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/Santa-Rose-VDM_800x.jpg?v=1579571656', 'rosado', 'Familia Zuccardi es una bodega fundada en 1963 por el Ing. Alberto Zuccardi. En aquellos tiempos, el comenzó a plantar viñedos en Maipú (provincia de Mendoza), experimentando con un sistema de riego ideado por él en base a un método empleado en California. Cuarenta y cinco años después de iniciado este camino, son tres las generaciones reunidas en torno a la pasión por el vino.', 'ivan19', 20, '2022-10-04 00:34:02'),
(19, 'AMALAYA ROSÉ', '780', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/amalaya-rose-argentina-malbec-salta-thibault-delmotte-vino-vinos-del-mundo_583_800x.jpg?v=1545701211', 'rosado', 'Rosa salmón delicado y brillante. Ataque floral muy sutil con dejos de azahares que provienen del Torrontés y notas a cereza y frutilla, típicas del malbec.', 'ivan19', 25, '2022-10-04 00:35:23'),
(20, 'ADRIANNA VINEYARD WHITE BONES CHARDONNAY', '6210', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/2017_Bodegas_Catena_Zapata_White_Bones_Chardonnay_800x.jpg?v=1634758118', 'blanco', 'White Bones Chardonnay viene de una selecta hilera dentro del bloque 1 en el viñedo de Adrianna. El nombre refiere a los suelos debajo de estas hileras que está en capas con depósitos calcáreos y piedra caliza, así como huesos de animales fosilizados de un río qe solía pasar por la región', 'ivan19', 56, '2022-10-04 00:36:42'),
(21, 'ANDELUNA 1300 SAUVIGNON BLANC', '753', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/1300sauvblanc_800x.jpg?v=1652050988', 'blanco', 'Matiz plateado, peristente y complejo aroma donde se destacan notas de pomelo rosado y algunas hierbas aromáticas. Agradable y equilibrada acidez, refrescante notas cítricas y final mineral.', 'ivan19', 15, '2022-10-04 00:37:36'),
(22, 'CHILCAS SINGLE VINEYARD LATE HARVEST', '951', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/chilcas-single-vineyard-late-harvest-camilo-viani-chile-rapel-sauvignon-blanc-vino-blanco-vinos-del-mundo_416_800x.jpg?v=1545701267', 'blanco', 'Presenta un color amarillo intenso con matices brillantes y dorados. Con una gran intensidad aromática, deja al descubierto aromas a membrillo, papaya, piel de naranja, higos y damascos maduros, todo ello acompañado de elegantes notas cítricas y florales.', 'ivan19', 45, '2022-10-04 00:39:09'),
(23, 'SANTA JULIA CHARDONNAY 187ML', '214', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/SJChard187_800x.jpg?v=1655818767', 'blanco', 'Familia Zuccardi es una bodega fundada en 1963 por el Ing. Alberto Zuccardi. En aquellos tiempos, él comenzó a plantar viñedos en Maipu; (provincia de Mendoza), experimentando con un sistema de riego ideado por él en base a un método empleado en California. Cuarenta y cinco años después de iniciado este camino, son tres las generaciones reunidas en torno a la pasion por el vino.', 'ivan19', 200, '2022-10-04 00:40:25'),
(24, 'MIOLO CUVEE TRADITION ESPUMANTE BRUT', '1149', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/miolo-cuvee-tradition-espumante-brut-brasil-chardonnay-miguel-de-almeida-vinos-del-mundo_977_800x.jpg?v=1545702311', 'espumoso', 'Bodega: Miolo\r\nVariedad: Chardonnay\r\nPaís: Brasil\r\nCapacidad: 750 ml\r\nRegión: Vale Dos Vinhedos\r\nCosecha: N/V\r\nEnólogo: Miguel de Almeida', 'ivan19', 13, '2022-10-04 00:42:45'),
(25, 'ALMA NEGRA ESPUMANTE BRUT NATURE ROSE', '1969', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/almanegra-espumante-brut-nature-rose-alejandro-kuschnaroff-argentina-domaine-malbec-vinos-del-mundo_409_800x.jpg?v=1545701207', 'espumante', 'En nariz intensidad aromática, frutal y con notas a tostados. En boca es envolvente, con una acidez ligera que le brinda frescura. Su estructura es muy buena con taninos suaves y redondos y con un complejo y agradable final.', 'ivan19', 87, '2022-10-04 00:43:33'),
(26, 'VICENTIN ESPUMANTE ROSE', '854', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/vicentin-espumante-rose-argentina-malbec-mendoza-family-wines-vinos-del-mundo_255_800x.jpg?v=1579571682', 'espumoso', 'Somos una familia con visión de progreso y trabajo. Hace más de un siglo que construímos futuro, desde Argentina, nuestra tierra. Comenzamos la aventura en el año 2009 con el viaje desde el litoral, desde las plantaciones de algodón y girasol hasta el desierto salvaje, frente a la Cordillera de los Andes, donde buscamos los viñedos de los productores más antiguos de las zonas vitivinícolas de Mendoza para contar con la mejor prima materia, la de los mejores taninos y los mejores frutos.', 'ivan19', 20, '2022-10-04 00:44:25'),
(27, 'VIÑA EDEN ESPUMANTE MÉTODO CHAMPENOISE', '1350', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/vina-eden-espumoso-natural-brut-nature-blend-espumante-juan-pablo-fitipaldo-uruguay-valle-vinos-del-mundo_590_800x.jpg?v=1579571686', 'espumoso', 'Sobre las pedregosas sierras de Pueblo Edén se hallan nuestros viñedos, el carácter mineral de sus suelos y la influencia oceánica, generan las condiciones ideales para la creación y producción sustentable de vinos de estilo único.', 'ivan19', 55, '2022-10-04 00:45:08'),
(28, 'BIANCHI FAMIGLIA EXTRA BRUT', '1196', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/Bianchi-Famiglia-Extra-Brut_800x.jpg?v=1648648276', 'espumoso', 'La línea Famiglia, reconocida internacionalmente, nos acerca una gama de vinos complejos e intensos que logran expresar de manera inigualable, las particularidades propias de los viñedos que la familia Bianchi posee en San Rafael y el Valle de Uco. La línea se completa con dos espumantes elaborados bajo el tradicional método francés.', 'ivan19', 64, '2022-10-04 00:45:48'),
(29, 'FAMILIA DEICAS - BOTRYTIS NOBLE', '894', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/botrytis-noble-blend-familia-deicas-juanico-santiago-vino-licoroso-vinos-del-mundo_540_800x.jpg?v=1545701235', 'generoso', '\r\nCosecha Tardía elaborado a partir de racimos sobremadurados, que desarrollan Botrytis Cinerea, gran responsable de los famosos Sauternes y de los mejores Vinos Nobles del mundo.', 'ivan19', 984, '2022-10-04 00:48:45'),
(30, 'FAMILIA DEICAS LICOR DE TANNAT', '980', 'https://cdn.shopify.com/s/files/1/0042/8477/6517/products/licor-de-tannat-canelones-familia-deicas-santiago-uruguay-vino-licoroso-vinos-del-mundo_856_800x.jpg?v=1545702288', 'generoso', 'Color negro intenso. En nariz se presenta aroma de higos maduros, menta y chocolate. En boca se muestra muy amable con un notable equilibrio frutal, dulce y tánico. Ideal para acompañar postres, especialmente de chocolate, así como quesos o como licor de sobremesa', 'ivan19', 79, '2022-10-04 00:49:25');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `productos` (
`id_prod` int(11)
,`nombre` varchar(100)
,`precio` decimal(10,0)
,`imagen` varchar(250)
,`tipo` varchar(100)
,`descripcion` varchar(1000)
,`nom_admin` varchar(100)
,`stock` int(11)
,`fec_alta` timestamp
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productos_carrito`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `productos_carrito` (
`Cliente` varchar(100)
,`id_prod` int(11)
,`Nombre` varchar(100)
,`Imagen` varchar(250)
,`Cantidad` int(11)
,`Precio` decimal(20,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `prod_mvf`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `prod_mvf` (
`ProductoMasVendido` varchar(100)
,`Cantidad` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_producto`
--

CREATE TABLE `tiene_producto` (
  `id_cart` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiene_producto`
--

INSERT INTO `tiene_producto` (`id_cart`, `id_prod`, `cantidad`) VALUES
(1, 4, 6),
(1, 5, 3),
(1, 6, 2),
(18, 4, 2),
(19, 5, 3),
(19, 6, 2),
(19, 11, 1),
(20, 6, 1),
(20, 10, 1),
(24, 5, 2),
(25, 4, 3),
(25, 6, 1),
(25, 11, 1),
(26, 6, 1),
(26, 10, 1),
(28, 10, 1),
(29, 6, 2),
(30, 4, 1),
(30, 6, 5),
(31, 6, 1),
(31, 10, 1),
(36, 6, 2),
(39, 4, 9),
(39, 5, 1),
(39, 6, 1),
(40, 10, 2),
(44, 5, 2),
(44, 6, 3),
(45, 15, 1),
(45, 18, 1),
(48, 4, 1),
(48, 5, 1),
(49, 5, 1),
(49, 6, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `total` (
`precio_total` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nom_usr` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nom_usr`, `pass`, `tipo`, `ci`, `estado`) VALUES
('ChrissM', '123456', 3, 56568945, 0),
('dsds', '1212121', 3, 26931756, 1),
('FacuLens', '123456', 3, 23456789, 1),
('ivan19', 'Martirena', 1, 53530751, 1),
('Jbent', '123456', 3, 38409183, 1),
('jonacap', '52151081', 3, 52151081, 1),
('Jrodriguez', '12345', 2, 52520751, 1),
('Leonss23', 'Maicra626', 3, 53388243, 1),
('lucass', 'luquita', 3, 17482953, 1),
('pablito', 'pablo22', 2, 43175602, 1),
('PablitoCli', 'pablo23', 3, 43175602, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuarios` (
`nom_usr` varchar(100)
,`pass` varchar(100)
,`tipo` int(11)
,`ci` int(11)
,`estado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `admin_productos`
--
DROP TABLE IF EXISTS `admin_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `admin_productos`  AS SELECT `producto`.`id_prod` AS `Id`, `producto`.`nombre` AS `Nombre`, `producto`.`precio` AS `Precio`, `producto`.`imagen` AS `Imagen`, `producto`.`tipo` AS `Tipo`, `producto`.`descripcion` AS `Descripcion`, `producto`.`fec_alta` AS `FechaAlta`, `persona`.`nombre` AS `Administrador`, `producto`.`nom_admin` AS `NombreUsuario` FROM ((`producto` join `usuario` on(`producto`.`nom_admin` = `usuario`.`nom_usr`)) join `persona` on(`usuario`.`ci` = `persona`.`ci`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `carrito_activo`
--
DROP TABLE IF EXISTS `carrito_activo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `carrito_activo`  AS SELECT `carrito`.`nom_cli` AS `Cliente`, `producto`.`nombre` AS `Producto`, `tiene_producto`.`cantidad` AS `Cantidad` FROM ((`carrito` join `tiene_producto` on(`carrito`.`id_cart` = `tiene_producto`.`id_cart`)) join `producto` on(`tiene_producto`.`id_prod` = `producto`.`id_prod` and `carrito`.`estado` = 1))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `compras_cliente`
--
DROP TABLE IF EXISTS `compras_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `compras_cliente`  AS SELECT `pedido`.`id_ped` AS `IdPed`, `pedido`.`fecha` AS `Fecha`, `persona`.`nombre` AS `Cliente`, `producto`.`nombre` AS `Producto`, `tiene_producto`.`cantidad` AS `Cantidad` FROM ((((((`pedido` join `esta` on(`pedido`.`id_ped` = `esta`.`id_ped`)) join `carrito` on(`esta`.`id_cart` = `carrito`.`id_cart`)) join `tiene_producto` on(`carrito`.`id_cart` = `tiene_producto`.`id_cart`)) join `producto` on(`tiene_producto`.`id_prod` = `producto`.`id_prod`)) join `usuario` on(`carrito`.`nom_cli` = `usuario`.`nom_usr`)) join `persona` on(`usuario`.`ci` = `persona`.`ci`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `compra_cliente`
--
DROP TABLE IF EXISTS `compra_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `compra_cliente`  AS SELECT `pedido`.`id_ped` AS `IdPed`, `pedido`.`fecha` AS `Fecha`, `persona`.`nombre` AS `Cliente`, `producto`.`nombre` AS `Producto`, `tiene_producto`.`cantidad` AS `Cantidad` FROM ((((((`pedido` join `esta` on(`pedido`.`id_ped` = `esta`.`id_ped`)) join `carrito` on(`esta`.`id_cart` = `carrito`.`id_cart`)) join `tiene_producto` on(`carrito`.`id_cart` = `tiene_producto`.`id_cart`)) join `usuario` on(`carrito`.`nom_cli` = `usuario`.`nom_usr`)) join `producto` on(`tiene_producto`.`id_prod` = `producto`.`id_prod`)) join `persona` on(`usuario`.`ci` = `persona`.`ci`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pedidos_cliente`
--
DROP TABLE IF EXISTS `pedidos_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `pedidos_cliente`  AS SELECT `pedido`.`id_ped` AS `Pedido`, `carrito`.`nom_cli` AS `Cliente`, `producto`.`nombre` AS `Producto`, `tiene_producto`.`cantidad` AS `Cantidad`, `pedido`.`fecha` AS `Fecha` FROM ((((`producto` join `tiene_producto` on(`producto`.`id_prod` = `tiene_producto`.`id_prod`)) join `carrito` on(`tiene_producto`.`id_cart` = `carrito`.`id_cart` and `carrito`.`estado` = 0)) join `esta` on(`carrito`.`id_cart` = `esta`.`id_cart`)) join `pedido` on(`esta`.`id_ped` = `pedido`.`id_ped` and `pedido`.`estado` = 0))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `productos`
--
DROP TABLE IF EXISTS `productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `productos`  AS SELECT `producto`.`id_prod` AS `id_prod`, `producto`.`nombre` AS `nombre`, `producto`.`precio` AS `precio`, `producto`.`imagen` AS `imagen`, `producto`.`tipo` AS `tipo`, `producto`.`descripcion` AS `descripcion`, `producto`.`nom_admin` AS `nom_admin`, `producto`.`stock` AS `stock`, `producto`.`fec_alta` AS `fec_alta` FROM `producto`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `productos_carrito`
--
DROP TABLE IF EXISTS `productos_carrito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `productos_carrito`  AS SELECT `carrito`.`nom_cli` AS `Cliente`, `producto`.`id_prod` AS `id_prod`, `producto`.`nombre` AS `Nombre`, `producto`.`imagen` AS `Imagen`, `tiene_producto`.`cantidad` AS `Cantidad`, `producto`.`precio`* `tiene_producto`.`cantidad` AS `Precio` FROM ((`carrito` join `tiene_producto` on(`carrito`.`id_cart` = `tiene_producto`.`id_cart`)) join `producto` on(`tiene_producto`.`id_prod` = `producto`.`id_prod` and `carrito`.`estado` = 1))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `prod_mvf`
--
DROP TABLE IF EXISTS `prod_mvf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `prod_mvf`  AS SELECT `primera`.`ProductoMasVendido` AS `ProductoMasVendido`, max(`primera`.`Sum`) AS `Cantidad` FROM (select `producto`.`nombre` AS `ProductoMasVendido`,sum(distinct `tiene_producto`.`cantidad`) AS `Sum`,`pedido`.`fecha` AS `fecha` from (((`producto` join `tiene_producto` on(`producto`.`id_prod` = `tiene_producto`.`id_prod`)) join `esta` on(`tiene_producto`.`id_cart` = `esta`.`id_cart`)) join `pedido` on(`esta`.`id_ped` = `pedido`.`id_ped`)) group by `producto`.`nombre`) AS `primera`;

-- --------------------------------------------------------

--
-- Estructura para la vista `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS SELECT sum(distinct `productos_carrito`.`Precio`) AS `precio_total` FROM `productos_carrito`;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`equipo03`@`localhost` SQL SECURITY DEFINER VIEW `usuarios`  AS SELECT `usuario`.`nom_usr` AS `nom_usr`, `usuario`.`pass` AS `pass`, `usuario`.`tipo` AS `tipo`, `usuario`.`ci` AS `ci`, `usuario`.`estado` AS `estado` FROM `usuario`;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`nom_admin`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `nom_cli` (`nom_cli`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nom_cli`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`nom_emp`);

--
-- Indices de la tabla `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indices de la tabla `gestiona`
--
ALTER TABLE `gestiona`
  ADD PRIMARY KEY (`nom_emp`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `nom_cli` (`nom_cli`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `nom_admin` (`nom_admin`) USING BTREE;

--
-- Indices de la tabla `tiene_producto`
--
ALTER TABLE `tiene_producto`
  ADD PRIMARY KEY (`id_cart`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nom_usr`),
  ADD KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_3` FOREIGN KEY (`nom_admin`) REFERENCES `usuario` (`nom_usr`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`nom_cli`) REFERENCES `cliente` (`nom_cli`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`nom_cli`) REFERENCES `usuario` (`nom_usr`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`nom_emp`) REFERENCES `usuario` (`nom_usr`);

--
-- Filtros para la tabla `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `esta_ibfk_1` FOREIGN KEY (`id_ped`) REFERENCES `pedido` (`id_ped`),
  ADD CONSTRAINT `esta_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `carrito` (`id_cart`);

--
-- Filtros para la tabla `gestiona`
--
ALTER TABLE `gestiona`
  ADD CONSTRAINT `gestiona_ibfk_1` FOREIGN KEY (`nom_emp`) REFERENCES `empleado` (`nom_emp`),
  ADD CONSTRAINT `gestiona_ibfk_4` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`nom_cli`) REFERENCES `cliente` (`nom_cli`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`nom_admin`) REFERENCES `administrador` (`nom_admin`);

--
-- Filtros para la tabla `tiene_producto`
--
ALTER TABLE `tiene_producto`
  ADD CONSTRAINT `tiene_producto_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `tiene_producto_ibfk_3` FOREIGN KEY (`id_cart`) REFERENCES `carrito` (`id_cart`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);
COMMIT;
