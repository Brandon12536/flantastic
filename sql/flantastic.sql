
CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Hola', '¡Hola! ¡Bienvenido a nuestra tienda en línea FlanTastic! ¿En qué puedo ayudarte hoy?'),
(2, '¿Qué tipos de flanes venden?', 'Vendemos una amplia variedad de flanes, como flan de vainilla, flan de fresas y muchos otros más.'),
(3, '¿Puedo ver cómo se verá mi flan antes de comprarlo?', 'Sí, puedes ver una imagen del flan y su descripción antes de hacer la compra.'),
(4, '¿Cómo puedo hacer un pedido de flanes?', 'Puedes hacer un pedido en línea desde nuestra página web. Solo selecciona los flanes que deseas, agrégalos al carrito y procede al pago.'),
(5, '¿Tienen envío a domicilio para los flanes?', 'Sí, ofrecemos envío a domicilio para nuestros flanes a través de nuestro servicio de mensajería.'),
(6, '¿Cuánto tiempo tarda el envío de los flanes?', 'El tiempo de entrega de los flanes depende de la ubicación y el método de envío seleccionado. Por lo general, toma entre 5 a 25 días hábiles.'),
(7, '¿Cuáles son las opciones de pago para los flanes?', 'Aceptamos pagos con tarjeta de crédito, débito y transferencia bancaria. También puedes pagar con PayPal.'),
(8, '¿Puedo devolver un flan si no estoy satisfecho?', 'No, una vez se ha realizado la compra no se aceptan devoluciones.'),
(9, '¿Cómo puedo contactarlos si tengo alguna pregunta sobre los flanes?', 'Puedes contactarnos a través de nuestro correo electrónico de atención al cliente o por teléfono para cualquier consulta relacionada con los flanes.'),
(10, '¿Ofrecen descuentos o promociones en los flanes?', 'Sí, ofrecemos descuentos y promociones en ciertas fechas del año para nuestros deliciosos flanes.'),
(11, 'Gracias', '¡De nada! ¡Siempre estamos aquí para ayudarte con tus elecciones de flanes! ¿Hay algo más en lo que pueda asistirte?'),
(12, 'No', '¡Adiós! ¡Esperamos que disfrutes de nuestros exquisitos flanes! ¡Vuelve pronto a nuestra tienda en línea!');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Comentario` text NOT NULL,
  `Estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Flantastic4556%
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
ALTER TABLE `nombre_de_la_tabla`
ADD `stock` int(11) NOT NULL DEFAULT 0;

--
-- Volcado de datos para la tabla `productos`
--
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`, `stock`) 
VALUES (1, 'Flan de vainilla Flantastic', 'Descripción del flan', 25, 1, 1, 1, 12);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 1,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
