-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2024 a las 02:05:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_plan_lectura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_items`
--

CREATE TABLE `evaluacion_items` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta1` text NOT NULL,
  `respuesta2` text NOT NULL,
  `respuesta3` text NOT NULL,
  `respuesta4` text NOT NULL,
  `respuesta_correcta` text NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluacion_items`
--

INSERT INTO `evaluacion_items` (`id`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `respuesta4`, `respuesta_correcta`, `id_item`) VALUES
(13, 'T_1_1', 'v', 'f', '', '', 'f', 18),
(14, 'T_1_2', 'v', 'f', '', '', 'f', 18),
(15, 'T_1_3', 'v', 'f', '', '', 'f', 18),
(16, 'T_2_1', 'V', 'F', '', '', 'V', 19),
(17, 'T_2_2', 'V', 'F', '', '', 'V', 19),
(18, 'T_2_3', 'V', 'F', '', '', 'V', 19),
(19, 'T_3_1', 'V', 'F', '', '', 'F', 20),
(20, 'T_3_2', 'V', 'F', '', '', 'F', 20),
(21, 'T_3_3', 'V', 'F', '', '', 'F', 20),
(22, 'T_4_1', 'V', 'F', '', '', 'V', 21),
(23, 'T_4_2', 'V', 'F', '', '', 'V', 21),
(24, 'T_4_3', 'V', 'F', '', '', 'V', 21),
(25, 'T_5_1', 'V', 'F', '', '', 'F', 22),
(26, 'T_5_2', 'V', 'F', '', '', 'F', 22),
(27, 'T_5_3', 'V', 'F', '', '', 'F', 22),
(28, 'T_6_1', 'V', 'F', '', '', 'V', 23),
(29, 'T_6_2', 'V', 'F', '', '', 'V', 23),
(30, 'T_6_3', 'V', 'F', '', '', 'V', 23),
(31, 'T_7_1', 'V', 'F', '', '', 'F', 24),
(32, 'T_7_2', 'V', 'F', '', '', 'F', 24),
(33, 'T_7_3', 'V', 'F', '', '', 'F', 24),
(34, 'T_8_1', 'V', 'F', '', '', 'V', 25),
(35, 'T_8_2', 'V', 'F', '', '', 'V', 25),
(36, 'T_8_3', 'V', 'F', '', '', 'V', 25),
(37, 'T_9_1', 'V', 'F', '', '', 'F', 26),
(38, 'T_9_2', 'V', 'F', '', '', 'F', 26),
(39, 'T_9_3', 'V', 'F', '', '', 'F', 26),
(40, 'T_10_1', 'V', 'F', '', '', 'V', 27),
(41, 'T_10_2', 'V', 'F', '', '', 'V', 27),
(42, 'T_10_3', 'V', 'F', '', '', 'V', 27),
(43, 'T_11_1', 'V', 'F', '', '', 'F', 28),
(44, 'T_11_2', 'V', 'F', '', '', 'F', 28),
(45, 'T_11_3', 'V', 'F', '', '', 'F', 28),
(46, 'T_12_1', 'V', 'F', '', '', 'V', 29),
(47, 'T_12_2', 'V', 'F', '', '', 'V', 29),
(48, 'T_12_3', 'V', 'F', '', '', 'V', 29),
(49, 'El narrador inicialmente tenía muchas expectativas sobre el viaje a la iglesia en Pittsburgh.', 'Verdadero', 'Falso', '', '', 'Falso', 30),
(50, 'Durante el servicio en la Primera Iglesia Presbiteriana, el narrador experimentó una profunda conexión espiritual y sintió la paz que sobrepasa todo entendimiento.', 'Verdadero', 'Falso', '', '', 'Verdadero', 30),
(51, 'Después de saludar al Espíritu Santo, el narrador no sintió ninguna presencia especial y no experimentó cambios en su vida espiritual.', 'Verdadero', 'Falso', '', '', 'Falso', 30),
(52, 'El narrador menciona que sentía que estaba en un sueño cuando tuvo la visión de Jesús.', 'Verdadero', 'Falso', '', '', 'Verdadero', 31),
(53, 'El narrador fue enseñado en sus clases de religión la \"oración del pecador\" antes de tener su experiencia espiritual.', 'Verdadero', 'Falso', '', '', 'Falso', 31),
(54, 'El encuentro del narrador con la atmósfera espiritual fue acompañado por la sensación de estar completamente limpio y puro después de invocar a Jesús.', 'Verdadero', 'Falso', '', '', 'Verdadero', 31),
(55, 'El autor afirmó que durante dos años, él y su padre apenas tuvieron comunicación y que su padre lo ignoraba por completo.', 'Verdadero', 'Falso', '', '', 'Verdadero', 32),
(56, 'El autor sintió que su encuentro con Jesús fue solo un sueño y no una experiencia real.', 'Verdadero', 'Falso', '', '', 'Falso', 32),
(57, 'El autor mencionó que oraba y estudiaba la Biblia durante horas, experimentando la presencia del Señor en su vida diaria.', 'Verdadero', 'Falso', '', '', 'Verdadero', 32),
(58, 'El autor menciona que la única comunicación que tuvo con su padre durante dos años fue sobre la iglesia.', 'Verdadero', 'Falso', '', '', 'Verdadero', 33),
(59, 'Según el autor, el Espíritu Santo le proporcionó poder y le guió durante su tiempo de oración y estudio bíblico.', 'Verdadero', 'Falso', '', '', 'Verdadero', 33),
(60, 'Ananías y Safira fueron recompensados por dar una porción del dinero de la venta de su propiedad.', 'Verdadero', 'Falso', '', '', 'Falso', 33),
(61, 'El autor afirma que el encuentro con el Espíritu Santo transformó su vida de manera drástica y le permitió tener una mejor relación con su padre.', 'Verdadero', 'Falso', '', '', 'Verdadero', 34),
(62, 'El libro indica que la voz del Espíritu Santo es una forma de comunicación que se considera tierna y amable, en comparación con la voz de Dios Padre.', 'Verdadero', 'Falso', '', '', 'Verdadero', 34),
(63, 'Según el autor, es posible recibir el poder del Espíritu Santo sin necesidad de oración ni comunión con Él.', 'Verdadero', 'Falso', '', '', 'Falso', 34),
(64, 'El Espíritu Santo puede ser afligido y atormentado por las acciones de los seres humanos.', 'Verdadero', 'Falso', '', '', 'Verdadero', 35),
(65, 'En el contexto de los textos, el Espíritu Santo es representado como un símbolo físico y no como una persona.', 'Verdadero', 'Falso', '', '', 'Falso', 35),
(66, 'La comunión del Espíritu Santo es vista como una presencia constante en la vida de los creyentes.', 'Verdadero', 'Falso', '', '', 'Verdadero', 35),
(67, 'El Espíritu Santo se puede apagar, lo que significa que puede cesar su actividad en la vida de los creyentes.', 'Verdadero', 'Falso', '', '', 'Verdadero', 36),
(68, 'Ser lleno del Espíritu Santo es una experiencia única y no se repite en la vida del creyente.', 'Verdadero', 'Falso', '', '', 'Falso', 36),
(69, 'La oración de acción de gracias es el último paso en el proceso de oración según el autor.', 'Verdadero', 'Falso', '', '', 'Verdadero', 36),
(70, 'La llegada del Espíritu Santo fue acompañada por un sonido como de un viento recio y lenguas de fuego.', 'Verdadero', 'Falso', '', '', 'Verdadero', 37),
(71, 'Los apóstoles experimentaron una llenura del Espíritu Santo solo una vez en su vida.', 'Verdadero', 'Falso', '', '', 'Falso', 37),
(72, 'El Espíritu Santo reveló a los discípulos que habría una gran hambre en el mundo durante el reinado de Claudio.', 'Verdadero', 'Falso', '', '', 'Verdadero', 37),
(73, 'El poder del Espíritu Santo se manifestó de manera espectacular en la llegada del Pentecostés, con un viento estruendoso y lenguas de fuego.', 'Verdadero', 'Falso', '', '', 'Verdadero', 38),
(74, 'Los apóstoles se sintieron incapaces de realizar milagros y no predicaron sobre la libertad de los demonios.', 'Verdadero', 'Falso', '', '', 'Falso', 38),
(75, 'Cristo dijo a sus discípulos que debían esperar en Jerusalén hasta recibir el poder del Espíritu Santo antes de comenzar su ministerio.', 'Verdadero', 'Falso', '', '', 'Verdadero', 38),
(76, 'Jesús advirtió que un espíritu maligno podría regresar a una persona si su vida está vacía.', 'Verdadero', 'Falso', '', '', 'Verdadero', 39),
(77, 'Todos los inconversos son influenciados por los demonios, según el capitulo.', 'Verdadero', 'Falso', '', '', 'Verdadero', 39),
(78, 'El Espíritu Santo es considerado un ayudador para los creyentes.', 'Verdadero', 'Falso', '', '', 'Verdadero', 39),
(79, 'Según el capitulo, la respuesta que buscas está al alcance de tu mano.', 'Verdadero', 'Falso', '', '', 'Verdadero', 39),
(80, 'Contristar al Espíritu Santo es un pecado que solo cometen los inconversos.', 'Verdadero', 'Falso', '', '', 'Falso', 40),
(81, 'El Espíritu Santo se aflige por el mundo y busca siervos que lleven el amor de Dios.', 'Verdadero', 'Falso', '', '', 'Verdadero', 40),
(82, 'Es imposible amar a Dios con todas nuestras fuerzas sin la ayuda del Espíritu Santo.', 'Verdadero', 'Falso', '', '', 'Verdadero', 40),
(83, 'El autor afirma que es imposible amar a Dios sin el amor sobrenatural que el Espíritu Santo proporciona.', 'Verdadero', 'Falso', '', '', 'Falso', 41),
(84, 'Se menciona que el Espíritu provoca inquietud en las personas en la presencia de Dios antes de ser salvadas', 'Verdadero', 'Falso', '', '', 'Verdadero', 41),
(85, 'El propósito principal del Espíritu Santo es guiar a las personas a un éxtasis celestial en la tierra.', 'Verdadero', 'Falso', '', '', 'Falso', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_sub_items`
--

CREATE TABLE `evaluacion_sub_items` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta1` text NOT NULL,
  `respuesta2` text NOT NULL,
  `respuesta3` text DEFAULT NULL,
  `respuesta4` text NOT NULL,
  `respuesta_correcta` text NOT NULL,
  `id_sub_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluacion_sub_items`
--

INSERT INTO `evaluacion_sub_items` (`id`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `respuesta4`, `respuesta_correcta`, `id_sub_item`) VALUES
(17, 'T_1_D_1', 'v', 'f', '', '', 'f', 31),
(18, 'T_1_D_2', 'v', 'f', '', '', 'f', 32),
(19, 'T_1_D_3', 'v', 'f', '', '', 'f', 33),
(20, 'T_1_D_4', 'v', 'f', '', '', 'f', 34),
(21, 'T_1_D_5', 'v', 'f', '', '', 'f', 35),
(22, 'T_2_D_1', 'v', 'f', '', '', 'v', 36),
(23, 'T_2_D_2', 'v', 'f', '', '', 'v', 37),
(24, 'T_2_D_3', 'v', 'f', '', '', 'v', 38),
(25, 'T_2_D_4', 'v', 'f', '', '', 'v', 39),
(26, 'T_2_D_5', 'v', 'f', '', '', 'v', 40),
(27, 'T_3_D_1', 'V', 'F', '', '', 'F', 41),
(28, 'T_3_D_2', 'V', 'F', '', '', 'F', 42),
(29, 'T_3_D_3', 'V', 'F', '', '', 'F', 43),
(30, 'T_3_D_4', 'V', 'F', '', '', 'F', 44),
(31, 'T_3_D_5', 'V', 'F', '', '', 'F', 45),
(32, 'T_4_D_1', 'V', 'F', '', '', 'V', 46),
(33, 'T_4_D_2', 'V', 'F', '', '', 'V', 47),
(34, 'T_4_D_3', 'V', 'F', '', '', 'V', 48),
(35, 'T_4_D_4', 'V', 'F', '', '', 'V', 49),
(36, 'T_4_D_5', 'V', 'F', '', '', 'V', 50),
(37, 'T_5_D_1', 'V', 'F', '', '', 'F', 51),
(38, 'T_5_D_2', 'V', 'F', '', '', 'F', 52),
(39, 'T_5_D_3', 'V', 'F', '', '', 'F', 53),
(40, 'T_5_D_4', 'V', 'F', '', '', 'F', 54),
(41, 'T_5_D_5', 'V', 'F|', '', '', 'F|', 55),
(42, 'T_6_D_1', 'V', 'F', '', '', 'V', 56),
(43, 'T_6_D_2', 'V', 'F', '', '', 'V', 57),
(44, 'T_6_D_3', 'V', 'F', '', '', 'V', 58),
(45, 'T_6_D_4', 'V', 'F', '', '', 'V', 59),
(46, 'T_6_D_5', 'V', 'F', '', '', 'V', 60),
(47, 'T_7_D_1', 'V', 'F', '', '', 'F', 61),
(48, 'T_7_D_2', 'V', 'F', '', '', 'F', 62),
(49, 'T_7_D_3', 'V', 'F', '', '', 'F', 63),
(50, 'T_7_D_3', 'V', 'F', '', '', 'F', 64),
(51, 'T_7_D_4', 'V', 'F', '', '', 'F', 65),
(52, 'T_8_D_1', 'V', 'F', '', '', 'V', 66),
(53, 'T_8_D_2', 'V', 'F', '', '', 'V', 67),
(54, 'T_8_D_3', 'V', 'F', '', '', 'V', 68),
(55, 'T_8_D_4', 'V', 'F', '', '', 'V', 69),
(56, 'T_8_D_5', 'V', 'F', '', '', 'V', 70),
(57, 'T_9_D_1', 'V', 'F', '', '', 'F', 71),
(58, 'T_9_D_2', 'V', 'F', '', '', 'F', 72),
(59, 'T_9_D_3', 'V', 'F', '', '', 'F', 73),
(60, 'T_9_D_4', 'V', 'F', '', '', 'F', 74),
(61, 'T_9_D_5', 'V', 'F', '', '', 'F', 75),
(62, 'T_10_D_1', 'V', 'F', '', '', 'V', 76),
(63, 'T_10_D_2', 'V', 'F', '', '', 'V', 77),
(64, 'T_10_D_3', 'V', 'F', '', '', 'V', 78),
(65, 'T_10_D_4', 'V', 'F', '', '', 'V', 79),
(66, 'T_10_D_5', 'V', 'F', '', '', 'V', 80),
(67, 'T_11_D_1', 'V', 'F', '', '', 'F', 81),
(68, 'T_11_D_2', 'V', 'F', '', '', 'F', 82),
(69, 'T_11_D_3', 'V', 'F', '', '', 'F', 83),
(70, 'T_11_D_4', 'V', 'F', '', '', 'F', 84),
(71, 'T_11_D_5', 'V', 'F', '', '', 'F', 85),
(72, 'T_12_D_1', 'V', 'F', '', '', 'V', 86),
(73, 'T_12_D_2', 'V', 'F', '', '', 'V', 87),
(74, 'T_12_D_3', 'V', 'F', '', '', 'V', 88),
(75, 'T_12_D_4', 'V', 'F', '', '', 'V', 89),
(76, 'T_12_D_5', 'V', 'F', '', '', 'V', 90),
(77, '¿Por qué el narrador y Jim tuvieron que levantarse a las cinco de la mañana en Pittsburgh?', 'Porque querían explorar la ciudad antes de la tormenta.', 'Porque tenían que hacer fila temprano para conseguir un asiento en la iglesia.', 'Porque iban a realizar una excursión por el centro de Pittsburgh.', 'Porque querían evitar el tráfico de la mañana.', 'Porque tenían que hacer fila temprano para conseguir un asiento en la iglesia.', 91),
(78, '¿Qué le ocurrió al narrador durante el servicio en la Primera Iglesia Presbiteriana de Pittsburgh?', 'Se sintió aburrido y no experimentó nada especial.', 'Tuvo una experiencia espiritual profunda y sintió la paz que sobrepasa todo entendimiento.', ' Se preocupó por los rumores de sanidades y no creyó en ellas.', 'Se emocionó solo por las historias de otras personas, pero no sintió nada personalmente', 'Tuvo una experiencia espiritual profunda y sintió la paz que sobrepasa todo entendimiento.', 92),
(79, '¿Cómo cambió la relación del narrador con el Espíritu Santo después de esa mañana especial?', 'Se sintió menos conectado con la Biblia y perdió interés en la oración.', 'Sintió la presencia del Espíritu Santo como un amigo cercano y experimentó una nueva dimensión en la lectura de la Biblia.', 'Comenzó a temer la presencia del Espíritu Santo y se alejó de la oración.', 'Experimentó solo un breve momento de paz y nunca volvió a sentir esa conexión espiritual.', 'Sintió la presencia del Espíritu Santo como un amigo cercano y experimentó una nueva dimensión en la lectura de la Biblia.', 93),
(80, ' ¿Qué aspecto de Jaffa se menciona como significativo en la vida del narrador durante su niñez?', 'Era una ciudad que había sido invadida y reconstruida varias veces a lo largo de la historia.', 'Era famosa por su industria de pescados y mariscos.', 'Era una ciudad conocida por su tecnología avanzada.', '', 'Era una ciudad que había sido invadida y reconstruida varias veces a lo largo de la historia.', 94),
(81, '¿Qué experiencia significativa tuvo el narrador cuando tenía once años?', 'Escuchó un sermón que cambió su vida.', 'Tuvo una visión de Jesús que dejó una impresión profunda en él.', 'Tuvo una visión de Jesús que dejó una impresión profunda en él.', '', 'Tuvo una visión de Jesús que dejó una impresión profunda en él.', 95),
(82, '¿Qué oración impactante repitió el narrador que tuvo un efecto transformador en su vida?', '\"Dios te salve, María.\"', '\"Señor Jesús, ven otra vez.\"', '\"Perdóname por mis pecados.\"', '\"Tienes que conocer a Jesús.\"', '\"Señor Jesús, ven otra vez.\"', 96),
(83, '¿Qué hizo el narrador durante la reunión que fue un paso importante en su fe?', 'Se quedó sentado y no participó.', 'Rechazó la invitación de Mery Watson.', 'Hizo una confesión pública de fe para recibir a Cristo.', '', 'Hizo una confesión pública de fe para recibir a Cristo.', 97),
(84, '¿Cuál fue la reacción del padre del autor cuando este le dijo que iba a desobedecerlo en cuanto a ir a la iglesia?', 'Se quedó petrificado y se encolerizó.', 'Se sintió orgulloso de su hijo.', 'No reaccionó y lo ignoró', '', 'Se quedó petrificado y se encolerizó.', 98),
(85, '¿Qué visión tuvo el autor que lo llevó a sentir la necesidad de predicar el evangelio?', 'Una visión de la gloria de Dios llenando su habitación.', 'Un ángel que le mostró un profundo valle lleno de fuego.', 'Un encuentro personal con Jesús en su alcoba.', '', 'Un ángel que le mostró un profundo valle lleno de fuego.', 99),
(86, '¿Cuál fue el evento que transformó drásticamente la vida del autor?', 'a) Un estudio bíblico sistemático.', 'b) La invitación al Espíritu Santo para que fuera su amigo personal.', 'c) La asistencia a una iglesia.', 'd) Un viaje misionero.', 'b) La invitación al Espíritu Santo para que fuera su amigo personal.', 100),
(87, '¿Qué experiencia tuvo el autor durante su estancia en la casa de una familia cristiana en Inglaterra?', 'a) Tuvo una conversación profunda con la señora de la casa.', 'b) Asistió a un servicio religioso en la iglesia local.', 'c) Estuvo absorto en el Espíritu, conversando con el Espíritu Santo.', '', 'c) Estuvo absorto en el Espíritu, conversando con el Espíritu Santo.', 101),
(88, '¿Cuál es la lección importante que el autor destaca sobre la relación entre el Espíritu Santo y Jesucristo?', 'a) La presencia del Espíritu Santo lleva a glorificar a uno mismo.', 'b) Conocer al Espíritu Santo significa glorificar a Jesús automáticamente.', 'c) El Espíritu Santo no tiene relación con la glorificación de Jesús.', 'd) La glorificación de Jesús depende de las acciones humanas.', 'b) Conocer al Espíritu Santo significa glorificar a Jesús automáticamente.', 102),
(89, '¿Qué cambios experimentó el autor en su vida después de su encuentro con el Espíritu Santo?', 'La Palabra de Dios se volvió más viva y la oración se convirtió en una conversación.', 'La ira de su padre se volvió menos intensa y más comprensiva.', 'Su relación con la Biblia se volvió menos importante.', '', 'La Palabra de Dios se volvió más viva y la oración se convirtió en una conversación.', 103),
(90, '¿cuál es el papel del Espíritu Santo en la comunicación de Dios hacia nosotros?', 'Solo habla en ocasiones especiales y no es parte de la adoración.', 'Es un ser menor y débil que actúa independientemente de Dios.', 'Es el vínculo que conecta el cielo con el corazón humano y transmite la voz de Dios.', '', 'Es el vínculo que conecta el cielo con el corazón humano y transmite la voz de Dios.', 104),
(91, 'La comunión del Espíritu Santo se refiere a la presencia, el compañerismo y el compartir mutuamente entre el Espíritu y los creyentes.', 'Verdadero', 'Falso', '', '', 'Verdadero', 105),
(92, '¿Cómo se describe la apariencia de Dios el Padre según el profeta Ezequiel?', 'A) Como una nube que flota en el espacio.', 'B) Como un hombre con aspecto humano.', 'C) Como una brillantez reflejada de piedras preciosas.', 'D) Como un ser nebuloso sin forma.', 'B) Como un hombre con aspecto humano.', 106),
(93, '¿Cómo se describe la representación del Espíritu Santo en el libro?', 'A) Como un ser físico que se puede ver y tocar.', 'B) Como un cordero que pasea en el cielo.', 'C) Como un símbolo, no como una forma física.', '', 'C) Como un símbolo, no como una forma física.', 107),
(94, '¿Qué significa \"apagar\" en el contexto del Espíritu Santo según el libro?', 'A) Detener el viento y las fuerzas de la naturaleza.', 'B) Hacer cesar la acción o la influencia del Espíritu Santo.', 'C) Aumentar la presencia del Espíritu Santo en la vida de una persona.', 'D) Fortalecer la comunicación con el Espíritu Santo.', 'B) Hacer cesar la acción o la influencia del Espíritu Santo.', 108),
(95, '¿cuál de las siguientes afirmaciones es cierta sobre ser lleno del Espíritu Santo?', 'a) Es una experiencia que ocurre solo una vez en la vida de un creyente.', 'b) Se asemeja a llenar un tanque de gasolina en un automóvil.', 'c) Es un proceso continuo y perpetuo en la vida del creyente.', 'd) Es solo una cuestión de cantar canciones de alabanza.', 'c) Es un proceso continuo y perpetuo en la vida del creyente.', 109),
(96, '¿cuál es la clave para recibir la llenura del Espíritu Santo?', 'a) Esforzarse intensamente en oración.', 'b) Aprender a nadar en el agua.', 'c) Rendirse y descansar en la presencia de Dios.', 'd) Rogar y implorar continuamente.', 'c) Rendirse y descansar en la presencia de Dios.', 110),
(97, '¿cuáles son los pasos que menciona el autor en el proceso de oración?', 'a) Oración, súplica, acción de gracias, y alabanza.', 'b) Meditación, contemplación, acción de gracias, y alabanza.', 'c) Petición, intercesión, agradecimiento, y alabanza.', 'd) Súplica, acción de gracias, oración, y meditación.', 'a) Oración, súplica, acción de gracias, y alabanza.', 111),
(98, '¿Qué fue lo que sucedió en el día de Pentecostés según el libro?', 'a) Un viento recio y lenguas de fuego llenaron la casa donde estaban reunidos.', 'b) Los discípulos se dispersaron por toda Judea y Samaria.', 'c) El Espíritu Santo no hizo una entrada espectacular.', '', 'a) Un viento recio y lenguas de fuego llenaron la casa donde estaban reunidos.', 112),
(99, '¿Cuál fue el resultado del ministerio de los apóstoles después de recibir el poder y la autoridad del Espíritu Santo?', 'a) El número de personas que confiaban en el Señor aumentó.', 'b) Los apóstoles se retiraron y dejaron de predicar.', 'c) No hubo ningún cambio en la vida de la comunidad.', '', 'a) El número de personas que confiaban en el Señor aumentó.', 113),
(100, ' ¿Qué hizo el Espíritu Santo en la comunidad de los discípulos en Antioquía?', 'a) Predijo una gran hambre que iba a afectar a Judea.', 'b) Enviaron a Bernabé y a Saulo para realizar un trabajo específico.', 'c) Les pidió que ignoraran las advertencias sobre el futuro.', '', 'b) Enviaron a Bernabé y a Saulo para realizar un trabajo específico.', 114),
(101, '¿qué se sugiere que le falta a la iglesia contemporánea en comparación con la iglesia primitiva?', 'a) Poder para predicar el evangelio.', 'b) Autoridad para expulsar demonios.', 'c) Conocimiento de la Escritura.', 'd) Recursos financieros.', 'b) Autoridad para expulsar demonios.', 115),
(102, '¿cuál es una de las funciones del Espíritu Santo mencionadas?', 'a) Solo hacer que las personas se sientan bien.', 'b) Actuar como un poder de creación.', 'c) Enseñar a las personas a ignorar sus problemas.', 'd) Proporcionar recursos materiales.', 'b) Actuar como un poder de creación.', 116),
(103, '¿qué rol desempeña el Espíritu Santo en relación con Cristo y los creyentes?', 'a) Es quien levantó a Jesús de los muertos y también dará vida a los creyentes.', 'b) Es un poder débil y no merece adoración.', 'c) Solo actúa cuando los discípulos lo invocan.', 'd) Su papel es secundario comparado con el de Cristo.', 'a) Es quien levantó a Jesús de los muertos y también dará vida a los creyentes.', 117),
(104, '¿Cuál es el efecto de pronunciar las palabras desde lo profundo del corazón al Espíritu Santo?', 'a) Te sentirás avergonzado.', 'b) Recibirás algo maravilloso.', 'c) Te enfrentarás a más problemas.', '', 'b) Recibirás algo maravilloso.', 118),
(105, '¿Cómo se describe la influencia de los demonios sobre los inconversos en el texto?', 'a) Son indiferentes a la influencia demoníaca.', 'b) Solo los cristianos pueden ser afectados.', 'c) Los demonios no tienen poder sobre nadie.', 'd) Son influenciados grandemente por los demonios.', 'd) Son influenciados grandemente por los demonios.', 119),
(106, '¿qué experimentó el autor al preguntarle al Espíritu Santo por qué estaba llorando?', 'a) Una carga por las almas perdidas.', 'b) Un alivio inmediato de su sufrimiento.', 'c) La comprensión de sus problemas personales.', 'd) Un deseo de retirarse de la vida espiritual.', 'a) Una carga por las almas perdidas.', 120),
(107, '¿qué significa \"contristar al Espíritu Santo\"?', 'a) Alegrar al Espíritu Santo.', 'b) Ofender o herir al Espíritu Santo al actuar de manera negativa.', 'c) Ignorar al Espíritu Santo por completo.', 'd) Alabar al Espíritu Santo de manera inadecuada.', 'b) Ofender o herir al Espíritu Santo al actuar de manera negativa.', 121),
(108, '¿cómo se puede recibir el amor sobrenatural de Dios?', 'a) A través de la fuerza de voluntad personal.', 'b) Al rendirse al Espíritu Santo y pedirle ayuda.', 'c) Mediante la práctica de buenas obras.', 'd) Al asistir a la iglesia regularmente.', 'b) Al rendirse al Espíritu Santo y pedirle ayuda.', 122),
(109, '¿Qué le dijo el Espíritu Santo al autor mientras viajaba en un taxi en Pittsburgh?', 'a) \"Debes quedarte en Toronto.\"', 'b) \"Establecerás un ministerio que conmoverá al mundo.\"', 'c) \"No te preocupes por el futuro.\"', 'd) \"Tu tiempo en la televisión ha terminado.\"', 'b) \"Establecerás un ministerio que conmoverá al mundo.\"', 123),
(110, '¿Cuál es el propósito principal del Espíritu Santo según el texto?', 'a) Convencer a las personas de sus pecados.', 'b) Realizar milagros en la tierra.', 'c) Proporcionar consuelo en momentos de tristeza.', 'd) Guiar a las personas a Cristo.', 'd) Guiar a las personas a Cristo.', 124),
(111, '¿Qué se debe hacer según el texto para comenzar una vida nueva en el Espíritu?', 'a) Asistir a una iglesia cada semana.', 'b)  Leer un libro sobre el Espíritu Santo.', 'c) Hacer una oración de confesión a Jesús.', 'd) Practicar la meditación diariamente.', 'c) Hacer una oración de confesión a Jesús.', 125);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(70) NOT NULL,
  `id_plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `item`, `id_plan`) VALUES
(18, 'Tema 1:', 12),
(19, 'Tema 2:', 12),
(20, 'Tema 3:', 12),
(21, 'Tema 4:', 12),
(22, 'Tema 5:', 12),
(23, 'Tema 6:', 12),
(24, 'Tema 7:', 12),
(25, 'Tema 8:', 12),
(26, 'Tema 9:', 12),
(27, 'Tema 10:', 12),
(28, 'Tema 11:', 12),
(29, 'Tema 12:', 12),
(30, '¿Puedo conocerte realmente?:', 13),
(31, 'Desde Jaffa hasta lo último de la tierra:', 13),
(32, 'Tradición, tradición:', 13),
(33, 'De persona a persona:', 13),
(34, '¿Qué voz escuchas tú?:', 13),
(35, 'Espíritu, alma y cuerpo:', 13),
(36, 'Viento para tu barco:', 13),
(37, 'Una entrada poderosa:', 13),
(38, 'Lugar para el Espíritu:', 13),
(39, 'Tan cerca como tu aliento:', 13),
(40, '¿Por qué estás llorando?:', 13),
(41, 'El cielo en la tierra:', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `imagen`, `nombre`, `autor`, `descripcion`) VALUES
(4, 'Imagenes/Libros/e4f3faacd8518ddbf6ca.jpg', 'Buenos días, Espíritu Santo', 'Benny Hinn', 'Cuando Buenos días, Espíritu Santo entró en escena, de inmediato alcanzó los primeros lugares de popularidad y ventas y redefinió el pensamiento del creyente acerca de su relación con el Espíritu Santo.\n\nEn Buenos días, Espíritu Santo el pastor Benny Hinn comparte los recursos y verdades que Dios le ha enseñado a través de los años. Comenzando con un dramático encuentro, este libro desvela el tránsito poco común de Hinn hacia un entendimiento de y compañerismo con el Espíritu Santo. Complementado con una guía de estudio para usar en forma personal o en grupo Buenos días, Espíritu Santo lo llevará a descubrir:\n\n* La forma de identificar la voz del Espíritu Santo\n* Los siete pasos para una vida de oración más efectiva\n* La fuente y propósito de la unción de Dios\n* La libertad del miedo al pecado \"imperdonable\"\n* El plan maestro de Dios para su vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `descripcion`, `cantidad_dias`, `id_libro`) VALUES
(12, 'Adquiriendo el Mejor Habito', 'La lectura no solo nos permite adquirir conocimiento, sino que también nos abre puertas a mundos imaginarios y fantásticos donde podemos dejarnos llevar por la creatividad y la imaginación. Desarrollar hábitos de lectura es fundamental para nuestro desarrollo personal, ya que nos ayuda a expandir nuestro vocabulario, mejorar nuestra capacidad de comprensión y análisis, y desarrollar habilidades de pensamiento crítico. Además, la lectura nos permite desconectar de la rutina diaria y sumergirnos en nuevas historias y experiencias.', 60, 4),
(13, 'Descubriendo la Magia de la Lectura', 'Embárcate en un viaje transformador con \"Buenos Días, Espíritu Santo\", un libro que no solo ilumina el camino hacia una relación más profunda con el Espíritu Santo, sino que también te invita a disfrutar del hábito de la lectura. Este libro, lleno de historias conmovedoras y enseñanzas inspiradoras, te mostrará cómo la fe puede tocar cada aspecto de tu vida.\n\nCada capítulo es una oportunidad para reflexionar, meditar y conectar con tu espiritualidad. Las páginas están repletas de momentos que despiertan la curiosidad y el deseo de explorar más, haciendo que la lectura sea un placer y no una obligación.\n\nAl sumergirte en esta obra, descubrirás que leer puede ser una experiencia emocionante y enriquecedora, capaz de transformar no solo tu día a día, sino también tu relación con Dios y contigo misma. ¡Así que, anímate a abrir este libro y dejar que su mensaje te inspire a disfrutar del poder de la lectura!', 35, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_users`
--

CREATE TABLE `planes_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes_users`
--

INSERT INTO `planes_users` (`id`, `id_user`, `id_plan`, `fecha_inicio`, `fecha_fin`) VALUES
(22, 30, 13, '2024-11-06', '2024-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id`, `nombre`, `descripcion`, `imagen`, `id_user`, `id_plan`) VALUES
(29, 'Jeremías 29:11', 'Mich, me alegro mucho de que ya hayas desbloqueado el primer premio. Eres una mujer muy juiciosa, con la capacidad de hacer cosas increíbles. Por favor, escríbeme para que vayamos por tu regalito, y felicidades por tu victoria, princesa.', 'Imagenes/Premios/4d46d5002c5ce07bb763.png', 30, 13),
(30, 'Salmo 46:5', 'Princesa, has desbloqueado el segundo obsequio. Permíteme felicitarte. Probablemente existan días en que no quieras leer, pero es en esos momentos cuando realmente hay que hacerlo. Lo difícil es tomar el libro e iniciar la primera página. Encárgate de lo difícil durante estos días y continúa leyendo, que los otros premios te esperan. Porfis, escríbeme para que vayamos por ese merecido desayuno.', 'Imagenes/Premios/3410786d06f1a433ef82.png', 30, 13),
(31, 'Proverbios 4:23', 'Mich, felicidades por este nuevo logro. Probablemente, a este punto ya empieces a disfrutar lo magnífico de la lectura y de verdad espero que lo estés disfrutando. Espero que Dios esté usando este libro para comunicarse contigo y que el Espíritu Santo esté feliz por el conocimiento que estás adquiriendo. Ya quiero que me cuentes más del libro, así que vamos a cenar ese delicioso sushi.', 'Imagenes/Premios/5d24f3ac2c02825b4d98.png', 30, 13),
(32, 'Cantares 4:7', 'Felicitaciones, princesa, desbloqueaste el cuarto premio. Nos vamos de manicure. Quiero decirte que hasta el día de hoy vas excelentemente bien; eres muy apasionada por lo que haces, y por favor, continúa así, que ya casi desbloqueas el quinto premio. Mientras tanto, por fa, escríbeme para que vayamos a redimir el bono del manicure.', 'Imagenes/Premios/fd4cd10d3f7665675cf2.png', 30, 13),
(33, 'Proverbios 31:10', 'Princesa, linda princesa. ¡Felicitaciones! Has desbloqueado el quinto premio, y solo me queda darte las gracias por sacar un pedacito de tiempo durante cada uno de los 35 días. Espero que inicies a leer otro libro y lo conviertas en algo totalmente cotidiano. Te quiero y sé que Dios, de una u otra forma, usó este libro para que aprendieras muchas cosas. Espero que pronto me lo puedas prestar para leerlo, jeje. Por fa, escoge los productos y escríbeme para redimir el bono.', 'Imagenes/Premios/a2c8c12bbb060339a86d.png', 30, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `puntajes` (
  `id` int(11) NOT NULL,
  `id_plan_user` int(11) NOT NULL,
  `id_evaluacion_sub_item` int(11) DEFAULT NULL,
  `id_evaluacion_item` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `respuesta` text DEFAULT NULL,
  `aprobo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntajes`
--

INSERT INTO `puntajes` (`id`, `id_plan_user`, `id_evaluacion_sub_item`, `id_evaluacion_item`, `fecha`, `respuesta`, `aprobo`) VALUES
(1537, 22, 77, NULL, '2024-11-06', NULL, 1),
(1538, 22, 78, NULL, '2024-11-07', NULL, 1),
(1539, 22, 79, NULL, '2024-11-08', NULL, 1),
(1540, 22, NULL, 49, '2024-11-09', NULL, 1),
(1541, 22, NULL, 50, '2024-11-09', NULL, 1),
(1542, 22, NULL, 51, '2024-11-09', NULL, 1),
(1543, 22, 80, NULL, '2024-11-09', NULL, 1),
(1544, 22, 81, NULL, '2024-11-10', NULL, 1),
(1545, 22, 82, NULL, '2024-11-11', NULL, 1),
(1546, 22, NULL, 52, '2024-11-12', NULL, 1),
(1547, 22, NULL, 53, '2024-11-12', NULL, 1),
(1548, 22, NULL, 54, '2024-11-12', NULL, 1),
(1549, 22, 83, NULL, '2024-11-12', NULL, 1),
(1550, 22, 84, NULL, '2024-11-13', NULL, 1),
(1551, 22, 85, NULL, '2024-11-14', NULL, 1),
(1552, 22, NULL, 55, '2024-11-15', NULL, 1),
(1553, 22, NULL, 56, '2024-11-15', NULL, 1),
(1554, 22, NULL, 57, '2024-11-15', NULL, 1),
(1555, 22, 86, NULL, '2024-11-15', NULL, 1),
(1556, 22, 87, NULL, '2024-11-16', NULL, 1),
(1557, 22, 88, NULL, '2024-11-17', NULL, 1),
(1558, 22, NULL, 58, '2024-11-18', NULL, 1),
(1559, 22, NULL, 59, '2024-11-18', NULL, 1),
(1560, 22, NULL, 60, '2024-11-18', NULL, 1),
(1561, 22, 89, NULL, '2024-11-18', NULL, 1),
(1562, 22, 90, NULL, '2024-11-19', NULL, 1),
(1563, 22, 91, NULL, '2024-11-20', NULL, 1),
(1564, 22, NULL, 61, '2024-11-21', NULL, 1),
(1565, 22, NULL, 62, '2024-11-21', NULL, 1),
(1566, 22, NULL, 63, '2024-11-21', NULL, 1),
(1567, 22, 92, NULL, '2024-11-21', NULL, 1),
(1568, 22, 93, NULL, '2024-11-22', NULL, 1),
(1569, 22, 94, NULL, '2024-11-23', NULL, 1),
(1570, 22, NULL, 64, '2024-11-24', NULL, 1),
(1571, 22, NULL, 65, '2024-11-24', NULL, 1),
(1572, 22, NULL, 66, '2024-11-24', NULL, 1),
(1573, 22, 95, NULL, '2024-11-24', NULL, 1),
(1574, 22, 96, NULL, '2024-11-25', NULL, 1),
(1575, 22, 97, NULL, '2024-11-26', NULL, 1),
(1576, 22, NULL, 67, '2024-11-27', NULL, 1),
(1577, 22, NULL, 68, '2024-11-27', NULL, 1),
(1578, 22, NULL, 69, '2024-11-27', NULL, 1),
(1579, 22, 98, NULL, '2024-11-27', NULL, 1),
(1580, 22, 99, NULL, '2024-11-28', NULL, 1),
(1581, 22, 100, NULL, '2024-11-29', NULL, 1),
(1582, 22, NULL, 70, '2024-11-30', NULL, 1),
(1583, 22, NULL, 71, '2024-11-30', NULL, 1),
(1584, 22, NULL, 72, '2024-11-30', NULL, 1),
(1585, 22, 101, NULL, '2024-11-30', NULL, 1),
(1586, 22, 102, NULL, '2024-12-01', NULL, 1),
(1587, 22, 103, NULL, '2024-12-02', NULL, 1),
(1588, 22, NULL, 73, '2024-12-03', NULL, 1),
(1589, 22, NULL, 74, '2024-12-03', NULL, 1),
(1590, 22, NULL, 75, '2024-12-03', NULL, 1),
(1591, 22, 104, NULL, '2024-12-03', NULL, 1),
(1592, 22, 105, NULL, '2024-12-04', NULL, 1),
(1593, 22, NULL, 76, '2024-12-05', NULL, 1),
(1594, 22, NULL, 77, '2024-12-05', NULL, 1),
(1595, 22, NULL, 78, '2024-12-05', NULL, 1),
(1596, 22, NULL, 79, '2024-12-05', NULL, 1),
(1597, 22, 106, NULL, '2024-12-05', NULL, 1),
(1598, 22, 107, NULL, '2024-12-06', NULL, 1),
(1599, 22, 108, NULL, '2024-12-07', NULL, 1),
(1600, 22, NULL, 80, '2024-12-08', NULL, 1),
(1601, 22, NULL, 81, '2024-12-08', NULL, 1),
(1602, 22, NULL, 82, '2024-12-08', NULL, 1),
(1603, 22, 109, NULL, '2024-12-08', NULL, 1),
(1604, 22, 110, NULL, '2024-12-09', NULL, 1),
(1605, 22, 111, NULL, '2024-12-10', NULL, 1),
(1606, 22, NULL, 83, '2024-12-11', NULL, 1),
(1607, 22, NULL, 84, '2024-12-11', NULL, 1),
(1608, 22, NULL, 85, '2024-12-11', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_items`
--

CREATE TABLE `sub_items` (
  `id` int(11) NOT NULL,
  `sub_item` varchar(70) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sub_items`
--

INSERT INTO `sub_items` (`id`, `sub_item`, `id_item`) VALUES
(31, 'Dia 1', 18),
(32, 'Dia 2', 18),
(33, 'Dia 3', 18),
(34, 'Dia 4', 18),
(35, 'Dia 5', 18),
(36, 'Dia 6', 19),
(37, 'Dia 7', 19),
(38, 'Dia 8', 19),
(39, 'Dia 9', 19),
(40, 'Dia 10', 19),
(41, 'Dia 11', 20),
(42, 'Dia 12', 20),
(43, 'Dia 13', 20),
(44, 'Dia 14', 20),
(45, 'Dia 15', 20),
(46, 'Dia 16', 21),
(47, 'Dia 17', 21),
(48, 'Dia 18', 21),
(49, 'Dia 19', 21),
(50, 'Dia 20', 21),
(51, 'Dia 21', 22),
(52, 'Dia 22', 22),
(53, 'Dia 23', 22),
(54, 'Dia 24', 22),
(55, 'Dia 25', 22),
(56, 'Dia 26', 23),
(57, 'Dia 27', 23),
(58, 'Dia 28', 23),
(59, 'Dia 29', 23),
(60, 'Dia 30', 23),
(61, 'Dia 31', 24),
(62, 'Dia 32', 24),
(63, 'Dia 33', 24),
(64, 'Dia 34', 24),
(65, 'Dia 35', 24),
(66, 'Dia 36', 25),
(67, 'Dia 37', 25),
(68, 'Dia 38', 25),
(69, 'Dia 39', 25),
(70, 'Dia 40', 25),
(71, 'Dia 41', 26),
(72, 'Dia 42', 26),
(73, 'Dia 43', 26),
(74, 'Dia 44', 26),
(75, 'Dia 45', 26),
(76, 'Dia 46', 27),
(77, 'Dia 47', 27),
(78, 'Dia 48', 27),
(79, 'Dia 49', 27),
(80, 'Dia 50', 27),
(81, 'Dia 51', 28),
(82, 'Dia 52', 28),
(83, 'Dia 53', 28),
(84, 'Dia 54', 28),
(85, 'Dia 55', 28),
(86, 'Dia 56', 29),
(87, 'Dia 57', 29),
(88, 'Dia 58', 29),
(89, 'Dia 59', 29),
(90, 'Dia 60', 29),
(91, 'Pag. 7 - 11', 30),
(92, 'Pag. 12 - 16', 30),
(93, 'Pag. 17 - 20', 30),
(94, 'Pag. 21 - 25 ', 31),
(95, 'Pag. 26 - 30', 31),
(96, 'Pag. 31 - 36', 31),
(97, 'Pag. 37 - 41', 32),
(98, 'Pag. 42 - 46', 32),
(99, 'Pag. 47 - 50', 32),
(100, 'Pag. 51 - 55', 33),
(101, 'Pag.  - 56 - 60', 33),
(102, 'Pag. 61 - 65', 33),
(103, 'Pag. 67 - 71', 34),
(104, 'Pag. 72 - 76', 34),
(105, 'Pag. 77 - 81', 34),
(106, 'Pag. 83 - 87', 35),
(107, 'Pag. 88 - 92', 35),
(108, 'Pag. 93 - 96', 35),
(109, 'Pag. 97 - 101', 36),
(110, 'Pag. 102 - 106', 36),
(111, 'Pag. 107 - 111', 36),
(112, 'Pag. 121 - 125', 37),
(113, 'Pag. 126 - 130', 37),
(114, 'Pag. 131 - 136', 37),
(115, 'Pag. 137 - 141', 38),
(116, 'Pag. 142 - 145', 38),
(117, 'Pag. 146 - 149', 38),
(118, 'Pag. 151 - 155', 39),
(119, 'Pag. 156 - 160', 39),
(120, 'Pag. 161 - 165', 40),
(121, 'Pag. 166 - 170', 40),
(122, 'Pag. 171 - 174', 40),
(123, 'Pag. 175 - 178', 41),
(124, 'Pag. 179 - 183', 41),
(125, 'Pag. 184 - 188', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `clave`) VALUES
(30, 'Mich', 'damimoba15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evaluacion_items`
--
ALTER TABLE `evaluacion_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plan` (`id_item`),
  ADD KEY `id_item` (`id_item`);

--
-- Indices de la tabla `evaluacion_sub_items`
--
ALTER TABLE `evaluacion_sub_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plan` (`id_sub_item`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `planes_users`
--
ALTER TABLE `planes_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plan_user` (`id_plan_user`),
  ADD KEY `id_evaluacion_sub_item` (`id_evaluacion_sub_item`,`id_evaluacion_item`),
  ADD KEY `id_evaluacion_item` (`id_evaluacion_item`);

--
-- Indices de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evaluacion_items`
--
ALTER TABLE `evaluacion_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `evaluacion_sub_items`
--
ALTER TABLE `evaluacion_sub_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planes_users`
--
ALTER TABLE `planes_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluacion_items`
--
ALTER TABLE `evaluacion_items`
  ADD CONSTRAINT `evaluacion_items_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_sub_items`
--
ALTER TABLE `evaluacion_sub_items`
  ADD CONSTRAINT `evaluacion_sub_items_ibfk_1` FOREIGN KEY (`id_sub_item`) REFERENCES `sub_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes_users`
--
ALTER TABLE `planes_users`
  ADD CONSTRAINT `planes_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planes_users_ibfk_2` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `premios`
--
ALTER TABLE `premios`
  ADD CONSTRAINT `premios_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `premios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD CONSTRAINT `puntajes_ibfk_4` FOREIGN KEY (`id_evaluacion_item`) REFERENCES `evaluacion_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntajes_ibfk_5` FOREIGN KEY (`id_evaluacion_sub_item`) REFERENCES `evaluacion_sub_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntajes_ibfk_6` FOREIGN KEY (`id_plan_user`) REFERENCES `planes_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD CONSTRAINT `sub_items_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
