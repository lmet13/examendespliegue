CREATE TABLE `articulos` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double NOT NULL,
  `albaran` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `articulos` (`codigo`, `descripcion`, `precio`, `albaran`) VALUES
(1, 'Martillo ', 10.5, 'A001'),
(2, 'Clavos', 0.1, 'A002');


CREATE TABLE `clientes` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `clientes` (`dni`, `nombre`, `direccion`, `telefono`) VALUES
('22222222A', 'Elena', 'C/Empedrada', '2536542'),
('77777777A', 'Cristina', 'calle empedrada', '2536542');


CREATE TABLE `facturaview` (
`albaran` varchar(12)
,`factura` int(11)
,`fecha` varchar(15)
,`dni` varchar(9)
,`nombre` varchar(25)
,`descripcion` varchar(250)
,`total` double
);


CREATE TABLE `ventas` (
  `albaran` varchar(12) NOT NULL,
  `factura` int(11) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `ventas` (`albaran`, `factura`, `fecha`, `dni`, `total`) VALUES
('A001', 1, '10/03/2021', '77777777A', 10.5),
('A002', 2, '10/03/2021', '11111111A', 0.1);


DROP TABLE IF EXISTS `facturaview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facturaview`  AS SELECT `ventas`.`albaran` AS `albaran`, `ventas`.`factura` AS `factura`, `ventas`.`fecha` AS `fecha`, `ventas`.`dni` AS `dni`, `clientes`.`nombre` AS `nombre`, `articulos`.`descripcion` AS `descripcion`, `ventas`.`total` AS `total` FROM ((`ventas` join `clientes`) join `articulos`) WHERE `ventas`.`albaran` = `articulos`.`albaran` AND `ventas`.`dni` = `clientes`.`dni` ;


ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`);


ALTER TABLE `articulos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

