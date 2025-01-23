-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2023 a las 21:00:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anubisgaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `mensaje`, `respuesta`, `fecha`) VALUES
(1, 'Hola', 'Hola, ¿En que puedo ayudarte?', '2023-05-13 11:43:51'),
(3, 'Adiós', 'Hasta luego', '2023-05-13 11:43:51'),
(6, 'Como te llamas', 'Me llamo Thot el dios egipcio de la sabiduría', '2023-05-13 12:39:56'),
(7, 'estado', 'no me toques los huevos', '2023-05-14 16:22:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras_clave`
--

CREATE TABLE `palabras_clave` (
  `id` int(11) NOT NULL,
  `palabra_clave` text NOT NULL,
  `videojuego_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `palabras_clave`
--

INSERT INTO `palabras_clave` (`id`, `palabra_clave`, `videojuego_id`) VALUES
(25, 'Supervivencia', 1),
(26, 'Zombis', 1),
(27, 'Postapocalíptico', 1),
(29, 'Sigilo', 1),
(37, 'Coleccionismo', 2),
(38, 'Economía', 2),
(40, 'Personalización', 2),
(41, 'Artesanía', 2),
(42, 'Naturaleza', 2),
(45, 'Disparos', 3),
(46, 'Gore', 3),
(47, 'Demonios', 3),
(48, 'Sangre', 3),
(49, 'Combate rápido', 3),
(51, 'Plataformas', 3),
(52, 'Multijugador', 3),
(75, 'Distopía', 4),
(76, 'Futurismo', 4),
(80, 'Hacking', 4),
(86, 'Samuráis', 5),
(87, 'Honor', 5),
(88, 'Sigilo', 5),
(89, 'Espadas', 5),
(90, 'Combate', 5),
(92, 'Exploración', 5),
(96, 'Acción', 1),
(97, 'Aventura', 1),
(99, 'Historia', 1),
(100, 'Armas', 1),
(102, 'Mundo', 1),
(104, 'Armas', 3),
(106, 'Combate', 1),
(107, 'Simulación ', 2),
(108, 'vida', 2),
(109, 'Construcción ', 2),
(110, 'recursos ', 2),
(111, 'social ', 2),
(112, 'Multiplayer', 2),
(113, 'Acción ', 3),
(114, 'primera', 3),
(115, 'persona', 3),
(116, 'Campaña', 3),
(118, 'RPG', 4),
(119, 'ficción', 4),
(120, 'Personalización', 4),
(121, 'Mundo', 4),
(122, 'armas', 4),
(123, 'Combate', 4),
(124, 'Multijugador', 4),
(125, 'Acción', 5),
(126, 'aventura', 5),
(127, 'Japón', 5),
(128, 'Paisajes', 5),
(129, 'japonesa', 5),
(130, 'decisiones', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldos`
--

CREATE TABLE `saldos` (
  `id` int(11) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `saldos`
--

INSERT INTO `saldos` (`id`, `saldo`) VALUES
(1, 666.4),
(2, 2950),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetascredito`
--

CREATE TABLE `tarjetascredito` (
  `id` int(11) NOT NULL,
  `nombre_titular` text NOT NULL,
  `numero_tarjeta` text NOT NULL,
  `fecha_expiracion` text NOT NULL,
  `cvc` text NOT NULL,
  `saldo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetascredito`
--

INSERT INTO `tarjetascredito` (`id`, `nombre_titular`, `numero_tarjeta`, `fecha_expiracion`, `cvc`, `saldo_id`) VALUES
(2, 'Paco Jose', '2345678923456789', '01/25', '456', 1),
(3, 'Don Pedro', '3456789034567890', '06/24', '789', 2),
(4, 'prueba', '1', '1', '1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `coins` int(30) NOT NULL,
  `inventario` varchar(1500) DEFAULT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `coins`, `inventario`, `url`) VALUES
(17, 'Iván', '005566', 100, '♥Ghost of Tsushima♥Hades', 'img/perfiles/d118c9636c53cb70eeff205ce3c454c9.jpg'),
(18, 'KEK', '005566', 0, '', 'img/perfiles/luffy.jpg'),
(19, 'Kratos', '005566', 0, '', 'img/perfiles/aki.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `plataforma` varchar(255) NOT NULL,
  `desarrollador` varchar(255) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `calificacion_usuarios` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `titulo`, `genero`, `plataforma`, `desarrollador`, `fecha_lanzamiento`, `descripcion`, `precio`, `url`, `calificacion_usuarios`) VALUES
(1, 'The Last of Us Part II', 'Acción-Aventura', 'PS4', 'Naughty Dog', '2020-06-19', 'La continuación de la historia de Ellie y Joel en un mundo postapocalíptico.', '59.99', 'https://images3.alphacoders.com/106/thumb-1920-1065466.png', 4.3),
(2, 'Animal Crossing: New Horizons', 'Simulación', 'Nintendo Switch', 'Nintendo', '2020-03-20', 'Crea tu propia isla paradisíaca y vive una vida tranquila con nuevos amigos animales.', '59.99', 'https://images2.alphacoders.com/112/1128604.jpg', 3.9),
(3, 'Doom Eternal', 'Disparos en primera persona', 'PC, PS4, Xbox One, Nintendo Switch', 'id Software', '2020-03-20', 'Lucha contra hordas de demonios en una frenética acción en primera persona.', '49.99', 'https://images3.alphacoders.com/102/thumb-1920-1025036.jpg', 4.7),
(4, 'Cyberpunk 2077', 'RPG', 'PC, PS4, Xbox One', 'CD Projekt Red', '2020-12-10', 'Explora Night City en un futuro distópico y toma decisiones que afectan la historia del juego.', '59.99', 'https://picstatio.com/large/670e5a/game-keanu-reeves-cyberpunk-2077.jpg', 4.5),
(5, 'Ghost of Tsushima', 'Acción-Aventura', 'PS4', 'Sucker Punch Productions', '2020-07-17', 'Conviértete en un samurái y defiende la isla de Tsushima en el Japón feudal.', '59.99', 'https://images5.alphacoders.com/105/thumb-1920-1056682.png', 5),
(6, 'Hades', 'Roguelike', 'PC, Nintendo Switch', 'Supergiant Games', '2020-09-17', 'Lucha por escapar del inframundo en este juego de acción y aventura con elementos de roguelike.', '24.99', 'https://images4.alphacoders.com/111/thumb-1920-1113632.png', 4.8),
(7, 'Ori and the Will of the Wisps', 'Plataformas', 'PC, Xbox One', 'Moon Studios', '2020-03-11', 'Ayuda a Ori a enfrentarse a nuevos enemigos y desentrañar los misterios de su pasado en esta emocionante secuela.', '29.99', 'https://images7.alphacoders.com/927/thumb-1920-927772.jpg', 4.9),
(8, 'Resident Evil 3', 'Survival Horror', 'PC, PS4, Xbox One', 'Capcom', '2020-04-03', 'Vuelve a visitar Raccoon City en este remake del clásico Resident Evil 3: Nemesis.', '59.99', 'https://images2.alphacoders.com/105/thumb-1920-1057560.jpg', 4.9),
(9, 'Final Fantasy VII Remake', 'RPG', 'PS4', 'Square Enix', '2020-04-10', 'Vive el renacimiento de un clásico en este remake del legendario RPG Final Fantasy VII.', '59.99', 'https://images4.alphacoders.com/114/thumb-1920-1147178.jpg', 3.8),
(10, 'Genshin Impact', 'RPG, Acción-Aventura', 'PC, PS4, Nintendo Switch, Mobile', 'miHoYo', '2020-09-28', 'Explora el mundo abierto de Teyvat y desbloquea nuevos personajes en este juego gratuito.', '0.00', 'https://images2.alphacoders.com/106/1064544.jpg', 4.5),
(11, 'Fall Guys: Ultimate Knockout', 'Battle Royale, Casual', 'PC, PS4', 'Mediatonic', '2020-08-04', 'Compite contra otros jugadores en una serie de desafíos locos en este alocado juego de battle royale.', '19.99', 'https://images.alphacoders.com/109/thumb-1920-1099920.png', 3.3),
(12, 'Among Us', 'Party, Estrategia', 'PC, Nintendo Switch, Mobile', 'InnerSloth', '2018-06-15', 'Trabaja en equipo para completar tareas o traiciona a tus compañeros de tripulación en este juego de deducción social.', '4.99', 'https://images5.alphacoders.com/110/thumb-1920-1104367.jpg', 4.4),
(13, 'Call of Duty: Warzone', 'Battle Royale, Disparos en primera persona', 'PC, PS4, Xbox One', 'Infinity Ward, Raven Software', '2020-03-10', 'Entra en el campo de batalla con otros jugadores en este emocionante juego de battle royale.', '0.00', 'https://wallpapercave.com/wp/wp5857245.jpg', 4.7),
(14, 'Assassin\'s Creed Valhalla', 'Acción-RPG', 'PC, PS4, PS5, Xbox One, Xbox Series X/S', 'Ubisoft', '2020-11-10', 'Conviértete en un legendario guerrero vikingo y lidera a tu clan en la conquista de Inglaterra.', '59.99', 'https://twinfinite.net/wp-content/uploads/2020/11/thumb-1920-1077466.jpg?fit=1860%2C1080', 4.9),
(15, 'Valorant', 'Disparos en primera persona', 'PC', 'Riot Games', '2020-06-02', 'Enfrenta a otros jugadores en este juego de disparos en primera persona basado en equipos y habilidades.', '0.00', 'https://images.hdqwalls.com/download/valorant-4k-2020-dx-1920x1080.jpg', 4.3),
(16, 'Crusader Kings III', 'Estrategia, Gran Estrategia', 'PC', 'Paradox Interactive', '2020-09-01', 'Dirige una dinastía y expande tu reino a través de la guerra, la diplomacia y las intrigas en este juego de gran estrategia.', '49.99', 'https://images.alphacoders.com/122/1221514.jpg', 3.8),
(17, 'F1 2020', 'Carreras, Simulación', 'PC, PS4, Xbox One', 'Codemasters', '2020-07-10', 'Ponte al volante de un monoplaza de F1 y compite en el Campeonato Mundial en este realista juego de carreras.', '59.99', 'https://images6.alphacoders.com/112/thumb-1920-1120089.jpg', 4.5),
(18, 'NBA 2K21', 'Deportes, Simulación', 'PC, PS4, Xbox One, Nintendo Switch', 'Visual Concepts', '2020-09-04', 'Vive la emoción del baloncesto en este juego deportivo con gráficos realistas y modos de juego variados.', '59.99', 'https://wallpapers.com/images/hd/nba-2k21-ssds34dj5tr9ea8y.jpg', 5),
(19, 'Halo: The Master Chief Collection', 'Disparos en primera persona', 'PC, Xbox One', '343 Industries', '2014-11-11', 'Revive la épica saga de Halo con esta colección remasterizada de los juegos clásicos de la serie.', '39.99', 'https://i.pinimg.com/originals/6d/29/a8/6d29a88acb7294f66b4e35d195c9e0b0.jpg', 3),
(20, 'Microsoft Flight Simulator', 'Simulación', 'PC, Xbox Series X/S', 'Asobo Studio', '2020-08-18', 'Experimenta la emoción de volar aviones reales en este simulador de vuelo de próxima generación.', '59.99', 'https://images.hdqwalls.com/wallpapers/microsoft-flight-simulator-du.jpg', 3.9),
(21, 'Tony Hawk\'s Pro Skater 1', 'Deportes, Acción', 'PC, PS4, Xbox One', 'Vicarious Visions', '2020-09-04', 'Vuelve a vivir los clásicos juegos de skate con gráficos mejorados y nuevas características en esta remasterización.', '39.99', 'https://images8.alphacoders.com/107/thumb-1920-1079060.jpg', 2.8),
(22, 'Minecraft Dungeons', 'Acción-RPG', 'PC, PS4, Xbox One, Nintendo Switch', 'Mojang Studios', '2020-05-26', 'Explora mazmorras y lucha contra enemigos en este juego de rol y acción basado en el mundo de Minecraft.', '19.99', 'https://images.hdqwalls.com/wallpapers/minecraft-dungeons-ultimate-edition-4k-wh.jpg', 4),
(23, 'Phasmophobia', 'Horror, Cooperativo', 'PC', 'Kinetic Games', '2020-09-18', 'Investiga actividades paranormales en equipo en este juego cooperativo de terror.', '13.99', 'https://images4.alphacoders.com/111/thumb-1920-1114081.jpg', 3.8),
(24, 'Grounded', 'Supervivencia, Aventura', 'PC, Xbox One', 'Obsidian Entertainment', '2020-07-28', 'Sobrevive en un mundo de insectos gigantes y peligrosos en esta aventura de supervivencia en miniatura.', '29.99', 'https://images.alphacoders.com/121/thumb-1920-1213059.jpg', 4.6),
(25, 'Satisfactory', 'Simulación, Construcción', 'PC', 'Coffee Stain Studios', '2020-06-08', 'Construye y administra una fábrica en un mundo abierto y exótico en este juego de simulación y construcción.', '29.99', 'https://images7.alphacoders.com/108/thumb-1920-1083976.jpg', 4.2),
(26, 'Spelunky 2', 'Plataformas, Roguelike', 'PC, PS4', 'Mossmouth', '2020-09-15', 'Embárcate en una emocionante aventura en esta secuela del popular juego de plataformas y roguelike.', '19.99', 'https://images8.alphacoders.com/120/1207987.jpg', 3.5),
(27, 'Deep Rock Galactic', 'Acción, Cooperativo', 'PC, Xbox One', 'Ghost Ship Games', '2020-05-13', 'Únete a un equipo de enanos espaciales y explora cavernas llenas de enemigos y riquezas en este juego cooperativo de disparos.', '29.99', 'https://images.squarespace-cdn.com/content/v1/5925832e03596efb6d4b502a/1552467779220-JA9UTDVL8FF9IKFHOOMF/Wallpaper_Team_HD.jpg?format=2500w', 3.7),
(28, 'Carrion', 'Acción, Aventura', 'PC, Xbox One, Nintendo Switch', 'Phobia Game Studio', '2020-07-23', 'Controla a un monstruo amorfo y aterrador en este juego de acción y aventura en un mundo pixelado.', '19.99', 'https://images6.alphacoders.com/109/thumb-1920-1091043.png', 4.5),
(29, 'Risk of Rain 2', 'Roguelike, Disparos en tercera persona', 'PC, PS4, Xbox One, Nintendo Switch', 'Hopoo Games', '2020-08-11', 'Enfréntate a oleadas de enemigos en un mundo en constante evolución en este juego de disparos y roguelike en tercera persona.', '24.99', 'https://images6.alphacoders.com/120/thumb-1920-1202423.jpg', 5),
(30, 'Pillars of Eternity II: Deadfire', 'RPG', 'PS4, Xbox One, Nintendo Switch', 'Obsidian Entertainment', '2020-01-28', 'Explora un vasto mundo y vive una emocionante aventura en este clásico juego de rol isométrico.', '49.99', 'https://gameranx.com/wp-content/uploads/2020/01/Pillars-of-Eternity-II-Deadfire-4K-Wallapper.jpg', 4),
(31, 'Super Meat Boy Forever', 'Plataformas', 'PC, PS4, Xbox One, Nintendo Switch', 'Team Meat', '2020-12-23', 'Supera niveles difíciles y desafiantes en esta secuela del exitoso juego de plataformas Super Meat Boy.', '19.99', 'https://images5.alphacoders.com/928/thumb-1920-928031.jpg', 3.7),
(32, 'Wasteland 3', 'RPG', 'PC, PS4, Xbox One', 'inXile Entertainment', '2020-08-28', 'Lidera un equipo de Rangers del Desierto en este juego de rol táctico ambientado en un mundo postapocalíptico.', '59.99', 'https://images7.alphacoders.com/742/thumb-1920-742640.png', 5),
(33, 'Paper Mario: The Origami King', 'RPG, Aventura', 'Nintendo Switch', 'Intelligent Systems', '2020-07-17', 'Únete a Mario y sus nuevos amigos en una aventura para detener al malvado Rey Olly en este colorido juego de rol.', '59.99', 'https://wallpapercave.com/wp/wp6911415.jpg', 3.9),
(34, 'Desperados III', 'Estrategia, Táctica', 'PC, PS4, Xbox One', 'Mimimi Games', '2020-06-16', 'Controla a un grupo de personajes únicos en este juego de estrategia y táctica ambientado en el Salvaje Oeste.', '49.99', 'https://wallpapercave.com/wp/wp6502007.jpg', 3.6),
(35, 'Yakuza: Like a Dragon', 'RPG, Acción-Aventura', 'PC, PS4, Xbox One, Xbox Series X/S', 'Ryu Ga Gotoku Studio', '2020-11-10', 'Vive la vida del crimen organizado japonés en este nuevo capítulo de la serie Yakuza con un nuevo sistema de combate por turnos.', '59.99', 'https://sm.ign.com/ign_es/news/y/yakuza-lik/yakuza-like-a-dragon-producer-says-the-game-was-really-reall_ru3v.jpg', 4.8),
(36, 'Immortals Fenyx Rising', 'Acción-Aventura', 'PC, PS4, PS5, Xbox One, Xbox Series X/S, Nintendo Switch', 'Ubisoft', '2020-12-03', 'Explora un mundo abierto inspirado en la mitología griega y lucha contra monstruos épicos en este juego de acción y aventura.', '59.99', 'https://images8.alphacoders.com/110/thumb-1920-1100635.jpg', 5),
(37, 'Demon\'s Souls', 'RPG, Acción', 'PS5', 'Bluepoint Games', '2020-11-12', 'Revive la experiencia de un clásico en este remake del juego de rol y acción Demon\'s Souls para PlayStation 5.', '69.99', 'https://images2.alphacoders.com/111/1113054.jpg', 4.2),
(38, 'Marvel\'s Spider-Man: Miles Morales', 'Acción-Aventura', 'PS4, PS5', 'Insomniac Games', '2020-11-12', 'Asume el papel de Miles Morales en esta emocionante aventura de Spider-Man en Nueva York.', '49.99', 'https://images7.alphacoders.com/108/thumb-1920-1082482.jpg', 3.8),
(39, 'Little Nightmares II', 'Aventura, Horror', 'PC, PS4, Xbox One, Nintendo Switch', 'Tarsier Studios', '2021-02-11', 'Embárcate en una espeluznante aventura en un mundo oscuro y retorcido en esta emocionante secuela.', '29.99', 'https://images7.alphacoders.com/112/1125000.jpg', 3.9),
(40, 'Ghostrunner', 'Acción, Plataformas', 'PC, PS4, Xbox One, Nintendo Switch', 'One More Level, 3D Realms', '2020-10-27', 'Escala rascacielos y enfrenta a enemigos en un futuro cyberpunk en este juego de acción y plataformas en primera persona.', '29.99', 'https://images4.alphacoders.com/110/1103912.jpg', 4.1),
(41, 'Raji: An Ancient Epic', 'Acción-Aventura', 'PC, PS4, Xbox One, Nintendo Switch', 'Nodding Heads Games', '2020-10-15', 'Lucha contra demonios y salva a tu hermano en este juego de acción y aventura ambientado en la antigua India.', '24.99', 'https://images2.alphacoders.com/927/thumb-1920-927848.jpg', 4.5),
(42, 'Predator: Hunting Grounds', 'Multijugador, Disparos en primera persona', 'PC, PS4', 'IllFonic', '2020-04-24', 'Enfrenta a un equipo de soldados contra el icónico cazador extraterrestre en este emocionante juego multijugador.', '39.99', 'https://cdn.wallpapersafari.com/29/63/0CmWRF.jpg', 3.8),
(43, 'Hellpoint', 'RPG, Acción', 'PC, PS4, Xbox One, Nintendo Switch', 'Cradle Games', '2020-07-30', 'Explora una estación espacial infestada de monstruos en este oscuro juego de rol y acción.', '34.99', 'https://images4.alphacoders.com/123/1238297.jpg', 4.8),
(44, 'Crysis Remastered', 'Disparos en primera persona', 'PC, PS4, Xbox One, Nintendo Switch', 'Crytek', '2020-09-18', 'Vuelve a vivir la emocionante aventura de Crysis con gráficos mejorados en esta remasterización del clásico juego de disparos en primera persona.', '29.99', 'https://wallpapercave.com/wp/wp7480335.jpg', 4.2),
(45, 'SnowRunner', 'Simulación, Conducción', 'PC, PS4, Xbox One', 'Saber Interactive', '2020-04-28', 'Enfrenta desafiantes terrenos y condiciones climáticas extremas en este realista juego de simulación de conducción.', '39.99', 'https://wallpapercave.com/wp/wp5629101.jpg', 3.5),
(46, 'Deliver Us The Moon', 'Aventura, Ciencia Ficción', 'PC, PS4, Xbox One', 'KeokeN Interactive', '2020-04-24', 'Investiga la desaparición de una colonia lunar en este juego de aventuras y ciencia ficción en un futuro cercano.', '24.99', 'https://images6.alphacoders.com/124/1248295.jpg', 2.9),
(47, 'XCOM: Chimera Squad', 'Estrategia, Táctica', 'PC', 'Firaxis Games', '2020-04-24', 'Lidera un equipo de agentes especiales en una misión para mantener la paz en una ciudad futurista en este juego de estrategia y táctica.', '19.99', 'https://cdn.mos.cms.futurecdn.net/cyJ2U8UhbmsXVAgEukpcmj-1200-80.jpg', 3.8),
(48, 'Mafia: Definitive Edition', 'Acción-Aventura', 'PC, PS4, Xbox One', 'Hangar 13', '2020-09-25', 'Vuelve a vivir la historia de Tommy Angelo en este remake del clásico juego de acción y aventura en el mundo del crimen organizado.', '39.99', 'https://images8.alphacoders.com/107/thumb-1920-1078901.jpg', 5),
(49, 'Tony Hawk\'s Pro Skater 2', 'Deportes, Skateboarding', 'PC, PS4, Xbox One', 'Vicarious Visions', '2020-09-04', 'Revive los dos primeros juegos de Tony Hawk en esta remasterización que incluye gráficos mejorados y nuevas características.', '39.99', 'https://images.alphacoders.com/107/1079061.jpg', 3.6),
(50, 'Tell Me Why', 'Aventura, Narrativa', 'PC, Xbox One', 'Dontnod Entertainment', '2020-08-27', 'Descubre la verdad detrás de un oscuro pasado en este juego de aventuras y narrativa episódica.', '29.99', 'https://images.alphacoders.com/113/1136822.jpg', 4.5),
(51, 'Spiritfarer', 'Aventura, Gestión', 'PC, PS4, Xbox One, Nintendo Switch', 'Thunder Lotus Games', '2020-08-18', 'Ayuda a las almas de los difuntos a encontrar la paz en este hermoso juego de aventuras y gestión.', '29.99', 'https://images5.alphacoders.com/113/1134985.jpg', 4.6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `palabras_clave`
--
ALTER TABLE `palabras_clave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videojuego_id` (`videojuego_id`);

--
-- Indices de la tabla `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjetascredito`
--
ALTER TABLE `tarjetascredito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_tarjeta` (`numero_tarjeta`) USING HASH,
  ADD KEY `saldo_id` (`saldo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `palabras_clave`
--
ALTER TABLE `palabras_clave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `tarjetascredito`
--
ALTER TABLE `tarjetascredito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `palabras_clave`
--
ALTER TABLE `palabras_clave`
  ADD CONSTRAINT `palabras_clave_ibfk_1` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuegos` (`id`);

--
-- Filtros para la tabla `tarjetascredito`
--
ALTER TABLE `tarjetascredito`
  ADD CONSTRAINT `tarjetascredito_ibfk_1` FOREIGN KEY (`saldo_id`) REFERENCES `saldos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
