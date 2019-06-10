-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2019 a las 00:32:42
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps`
--

CREATE TABLE `apps` (
  `app_id` int(11) NOT NULL,
  `app_nombre` varchar(200) NOT NULL,
  `app_tipo` int(11) NOT NULL,
  `app_descripcion` text NOT NULL,
  `app_ruta` text NOT NULL,
  `app_imagen` text NOT NULL,
  `app_fecha_creacion` datetime NOT NULL,
  `app_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps`
--

INSERT INTO `apps` (`app_id`, `app_nombre`, `app_tipo`, `app_descripcion`, `app_ruta`, `app_imagen`, `app_fecha_creacion`, `app_activo`) VALUES
(8, 'Netflix 33', 1, 'Netflix: es el servicio l&iacute;der de suscripci&oacute;n para ver series y pel&iacute;culas desde tu dispositivo Android. La aplicaci&oacute;n de Netflix ofrece la mejor experiencia cuando quieras. Tu suscripci&oacute;n a Netflix te concede acceso ilimitado a pel&iacute;culas y series &ntilde;.\nVersi&oacute;n: 4.16-200147 release\nNivel de Manejo: Bajo\nInteracci&oacute;n: Control remoto o Mouse\n', 'apps/netflix_33/netflix_33.apk', 'apps/netflix_33/netflix_33.png', '2019-05-28 09:21:05', 1),
(9, 'Youtube Kids', 1, 'Youtube Kids: YouTube Kids es un producto de Google diseñado desde el principio teniendo en mente a las familias. La aplicación hace que los niños puedan encontrar contenido sobre los temas que les interesan, desde cualquier dispositivo Android.\nVersión: 3.61.1\nNivel de manejo: Bajo.\nInteracción: Control Remoto o Mouse.', 'apps/Youtube_Kids/Youtube_Kids.apk', 'apps/Youtube_Kids/Youtube_Kids.png', '2019-04-09 12:00:04', 1),
(10, 'AIDA64', 1, 'es una herramienta de diagnóstico del sistema que arroja de manera completa todos los datos del equipo\nVersión: 1.53\nNivel de manejo: Bajo.\nInteracción: control remoto o mouse.', 'apps/AIDA64/AIDA64.apk', 'apps/AIDA64/AIDA64.png', '2019-04-09 12:00:04', 1),
(11, 'CetusPlay', 1, 'es una aplicación que permite controlar tu Android tv de manera inalámbrica solo necesitamos conexión a wifi, tiene dos aplicaciones, una que se instala en la tv y otra que se instala en el teléfono móvil (descargar desde Google Store) que se va a usar como control.\nVersión: 4.6.8.1\nNivel de manejo: Medio.\nInteracción: Celular o Tablet (con acceso a wifi).\n', 'apps/CetusPlay/CetusPlay.apk', 'apps/CetusPlay/CetusPlay.png', '2019-01-08 11:46:01', 1),
(12, 'Crunchyroll', 1, 'es el mayor referente del anime y el manga, tiene más de 40 millones de usuarios registrados y más de un millón de suscriptores. Los fans conectan a través de sus bibliotecas de anime.\nVersión: 2.1.7.\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', 'apps/Crunchyroll/Crunchyroll.apk', 'apps/Crunchyroll/Crunchyroll.png', '2019-04-09 12:00:04', 1),
(13, 'Instagram', 1, 'es una aplicación que permite de forma simple capturar y compartir los mejores momentos. Sigue a tus amigos y familiares para saber qué están haciendo en todo momento.\nVersión: 75.0.0.23.99\nNivel de Manejo: Bajo.\nInteracción: Mouse o control remoto.', 'apps/Instagram/Instagram.apk', 'apps/Instagram/Instagram.png', '2019-04-09 12:00:04', 1),
(14, 'Facebook Lite', 1, 'es un cliente oficial de Facebook, que nos permitirá utilizar la popular red social a través de un cliente mucho más ligero y más preparado para terminales Android. Ahora es más rápido y sencillo que nunca mantenerse en contacto con tus amigos; comparte actualizaciones y fotos, interactúa con amigos y familiares.\nVersión: 126.0.0.7.99\nNivel de Manejo: Bajo.\nInteracción: Mouse, teclado o control remoto.', 'apps/Facebook_Lite/Facebook_Lite.apk', 'apps/Facebook_Lite/Facebook_Lite.png', '2019-04-09 12:01:04', 1),
(15, 'Messenger', 1, 'es la aplicación de mensajería oficial de Facebook, que nos permitirá entablar conversaciones de texto con todos nuestros amigos dentro de la popular red social; gracias a ella podremos enviar y recibir mensajes de texto.\nVersión: 196.0.0.29.99\nNivel de Manejo: Bajo.\nInteracción: Mouse, teclado o control remoto.', 'apps/Messenger/Messenger.apk', 'apps/Messenger/Messenger.png', '2019-01-08 12:13:01', 1),
(16, 'myTuner', 1, 'Si quieres escuchar la radio de una determinada ciudad, un país en concreto o simplemente quieres sintonizar tu emisora favorita, myTuner Radio es una aplicación con la que podrás conectarte a cualquier estación de más de ciento veinte países de todo el mundo\nVersión: 7.1.19\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', 'apps/myTuner/myTuner.apk', 'apps/myTuner/myTuner.png', '2019-04-09 12:01:04', 1),
(17, 'YouTube', 1, 'YouTube: es un sitio web para compartir vídeos subidos por los usuarios a través de Internet, es un servicio de alojamiento de vídeos. Presenta una variedad de clips de películas, programas de televisión y vídeos musicales, así como contenidos amateur como videoblogs y YouTube Gaming.\nVersión: 2.03.06\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', 'apps/YouTube/YouTube.apk', 'apps/YouTube/YouTube.png', '2019-01-08 13:44:01', 1),
(18, 'ES Explorador de Archivos', 1, 'es una cómoda herramienta para la gestión de archivos y aplicaciones, que cuenta con multitud de funciones adicionales\nVersión: 4.1.9.5.2\nNivel de Manejo: Medio.\nInteracción: Control remoto o Mouse.', 'apps/ES_Explorador_de_Archivos/ES_Explorador_de_Archivos.apk', 'apps/ES_Explorador_de_Archivos/ES_Explorador_de_Archivos.png', '2019-04-23 09:59:04', 1),
(19, 'Skype Lite', 1, 'es una aplicación rápida y ligera para dispositivos Android desarrollado para ayudar a las personas a comunicarse, al tiempo que ofrece gran rendimiento en condiciones críticas de red. Skype Lite combina todas las grandes características Skype que ya conoces con los nuevos especialmente diseñadas.\nVersión: 1.75.76.3\nNivel de manejo: Bajo.\nInteracción: Control remoto, control multimedia, mouse y teclado. Opcional (micrófono y cámara web)', 'apps/Skype_Lite/Skype_Lite.apk', 'apps/Skype_Lite/Skype_Lite.png', '2019-04-09 10:35:04', 1),
(20, 'Spotify', 1, 'es una aplicación multiplataforma empleada para la reproducción de música vía streaming por Internet a través de la combinación de servidores dedicados. Cuenta con un modelo de negocio Premium, y un servicio gratuito básico y con publicidad; pero con características adicionales, como una mejor calidad de audio, a través de una suscripción de pago.\nVersión: 8.4.84.874\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse, celular o Tablet.', 'apps/Spotify/Spotify.apk', 'apps/Spotify/Spotify.png', '2019-04-09 12:01:04', 1),
(21, 'VLC', 1, 'VLC Media Player es un reproductor multimedia, gratuito y multiplataforma, libre y de código abierto. Sus características más destacadas son: soporta un gran número de formatos de audio y vídeo sin necesidad de instalar códecs adicionales: MPEG-1, MPEG-2, MPEG-4, DivX, MP3,OGG, MOV, RAM, AVI, FLV, etc.\nVersión: 3.0.13\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', 'apps/VLC/VLC.apk', 'apps/VLC/VLC.png', '2019-04-09 12:01:04', 1),
(22, 'GOOGLE PLAY GAMES', 1, 'es la red social de videojuegos de Google, ofreciendo un punto de encuentro común para todos los videojuegos que utilizan sistema operativo Android. Gracias a Google Play Games los jugadores podrán descubrir nuevos videojuegos de su interés, podrán jugar con amigos más fácilmente, participar en partidas multijugador e incluso llevar un registro de los logros desbloqueados en cada juego.\nVersión: 5.14.7825\nNivel de manejo: Bajo.\nInteracción: control remoto, mouse y/o teclado.', 'apps/GOOGLE_PLAY_GAMES/GOOGLE_PLAY_GAMES.apk', 'apps/GOOGLE_PLAY_GAMES/GOOGLE_PLAY_GAMES.png', '2019-01-09 16:59:01', 1),
(23, 'SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES)', 1, 'es una aplicación del sistema de Android que nos permitirá tener el resto de aplicaciones de nuestro terminal siempre actualizadas, ya que se encargará de comprobar que todas las apps instaladas están en la última versión disponible. Mejora la experiencia general de uso del terminal, nos permitirán gestionar las aplicaciones de nuestra cuenta, es una aplicación realmente imprescindible mientras estemos utilizando un terminal con sistema operativo Android.\nVersión: 14.7.99\nNivel de manejo: Bajo.\nInteracción: ninguna o nada.', 'apps/SERVICIOS_DE_GOOGLE_PLAY_(GOOGLE_PLAY_SERVICES)/SERVICIOS_DE_GOOGLE_PLAY_(GOOGLE_PLAY_SERVICES).apk', 'apps/SERVICIOS_DE_GOOGLE_PLAY_(GOOGLE_PLAY_SERVICES)/SERVICIOS_DE_GOOGLE_PLAY_(GOOGLE_PLAY_SERVICES).png', '2019-01-09 17:23:01', 1),
(24, 'TOTAL COMMANDER', 1, 'Total Commander: es la versión para terminales Android del gestor de archivos para Windows del mismo nombre, que ofrece una serie de prestaciones similares a las de su versión para sistemas operativos de equipos de escritorio.\r\nVersión: 2.90\r\nNivel de manejo: Bajo.\r\nInteracción: Control remoto o mouse.', 'apps/TOTAL_COMMANDER/TOTAL_COMMANDER.apk', 'apps/TOTAL_COMMANDER/TOTAL_COMMANDER.png', '2019-01-10 08:51:01', 1),
(25, 'QUICKSUPPORT', 1, 'es una aplicación que, una vez instalada en nuestro dispositivo, nos permitirá gestionar todo su contenido desde la comodidad de un ordenador; conectarse remotamente con cualquier dispositivo Android y realizar asistencia técnica desde cualquier PC\nVersión: 14.1.83\nNivel de Manejo: Medio.\nInteracción: Control remoto o Mouse.', 'apps/QUICKSUPPORT/QUICKSUPPORT.apk', 'apps/QUICKSUPPORT/QUICKSUPPORT.jpg', '2019-01-10 09:07:01', 1),
(26, 'QUICKSUPPORT Add-On', 1, 'complemento de la aplicación QuickSupport para gestión remota desde un pc o cualquier dispositivo Android.\nVersión: 10.0.3086\nNivel de Manejo: Medio.\nInteracción: Ninguna o nada.', 'apps/QUICKSUPPORT_Add-On/QUICKSUPPORT_Add-On.apk', 'apps/QUICKSUPPORT_Add-On/QUICKSUPPORT_Add-On.png', '2019-01-10 09:11:01', 1),
(27, 'TWITCH', 1, 'Plataforma que ofrece un servicio de streaming de video en vivo propiedad de Amazon.com. Es decir, te permite retransmitir videojuegos en directo.\nVersión: 4.5.5\nNivel de manejo: Bajo.\nInteracción: Control remoto.', 'apps/TWITCH/TWITCH.apk', 'apps/TWITCH/TWITCH.png', '2019-04-09 12:01:04', 1),
(28, 'NETFLIX (ANDROID 5.1)', 1, 'es el servicio líder de suscripción para ver series y películas desde tu dispositivo Android. La aplicación de Netflix ofrece la mejor experiencia cuando quieras. Tu suscripción a Netflix te concede acceso ilimitado a películas y series.\nVersión: 4.16.3 build 15172\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', 'apps/NETFLIX_(ANDROID_5.1)/NETFLIX_(ANDROID_5.1).apk', 'apps/NETFLIX_(ANDROID_5.1)/NETFLIX_(ANDROID_5.1).jpg', '2019-01-11 14:57:01', 1),
(29, 'Microsoft Word', 1, 'es una aplicación que nos permitirá crear, modificar y por supuesto ver cualquier documento en formato Word. Todo ello desde la comodidad de nuestro terminal Android, y con una calidad de imagen perfecta.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.', 'apps/Microsoft_Word/Microsoft_Word.apk', 'apps/Microsoft_Word/Microsoft_Word.png', '2019-04-09 12:04:04', 1),
(30, 'Microsoft PowerPoint', 1, 'es la aplicación oficial para Android de uno de los programas más utilizados del mundo. Microsoft PowerPoint es una excelente herramienta para hacer presentaciones, que cuenta con todas las herramientas y prestaciones que podríamos desear.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.', 'apps/Microsoft_PowerPoint/Microsoft_PowerPoint.apk', 'apps/Microsoft_PowerPoint/Microsoft_PowerPoint.png', '2019-04-09 12:04:04', 1),
(31, 'Microsoft Excel', 1, 'es la aplicación oficial de Microsoft Excel para terminales Android, que nos permitirá visualizar, editar y crear hojas de cálculo desde nuestra TV con sistema operativo Android.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.\n', 'apps/Microsoft_Excel/Microsoft_Excel.apk', 'apps/Microsoft_Excel/Microsoft_Excel.png', '2019-04-09 12:04:04', 1),
(32, 'YOUTUBE v2.00.17', 1, 'es un sitio web para compartir vídeos subidos por los usuarios a través de Internet, es un servicio de alojamiento de vídeos. Presenta una variedad de clips de películas, programas de televisión y vídeos musicales, así como contenidos amateur como videoblogs y YouTube Gaming.\nVersión: 2.00.17;\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', 'apps/YOUTUBE_v2.00.17/YOUTUBE_v2.00.17.apk', 'apps/YOUTUBE_v2.00.17/YOUTUBE_v2.00.17.png', '2019-05-08 13:20:05', 1),
(33, 'AptoideTV', 1, 'Aptoide TV: Aptoide TV es la versión de la tienda que ofrece aplicaciones optimizadas para Smart TV y decodificadores tipo Android TV. La app ofrece un contenido similar distribuido de manera similar a la versión para dispositivos móviles.\nVersión: 5.0.2;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', 'apps/AptoideTV/AptoideTV.apk', 'apps/AptoideTV/AptoideTV.png', '2019-05-15 14:37:05', 1),
(34, 'VLC TV', 1, 'VLC: VLC media player es un reproductor y framework multimedia, libre y de código abierto desarrollado por el proyecto Video LAN. Es un programa multiplataforma, capaz de reproducir casi cualquier formato de vídeo sin necesidad de instalar códecs externos.\nVersión: 1.7.2;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', 'apps/VLC_TV/VLC_TV.apk', 'apps/VLC_TV/VLC_TV.png', '2019-04-12 09:32:04', 1),
(35, 'Claro Video', 1, 'CLARO VIDEO: Claro es una marca de servicios de comunicaciones latinoamericana, siendo Claro Video su plataforma de streaming. Este servicio de suscripción y alquiler en línea cuenta con más de 34.000 títulos entre películas, series, documentales, programas animados, y una parrilla de programación con varios canales en vivo.\nVersión:---;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', 'apps/Claro_Video/Claro_Video.apk', 'apps/Claro_Video/Claro_Video.png', '2019-04-12 09:45:04', 1),
(63, 'funca x2', 1, 'dsasadsdasdasadadssad', 'apps/funca_x2/funca_x2.apk', 'apps/funca_x2/funca_x2.png', '2019-06-05 17:35:51', 1),
(64, 'FUNCA X5', 1, 'dssdadsasad', 'apps/funca_x5/funca_x5.apk', 'apps/funca_x5/funca_x5.jpeg', '2019-06-05 17:37:06', 1),
(65, 'funca', 1, 'sdsaddsadsasdasad', 'apps/funca/funca.apk', 'apps/funca/funca.png', '2019-06-07 15:31:15', 1),
(66, 'funca x3', 1, 'sdsdasdasdasadasdasdsda &eacute;&eacute;&eacute;&eacute;&eacute;', 'apps/funca_x3/funca_x3.apk', 'apps/funca_x3/funca_x3.jpeg', '2019-06-10 09:38:30', 1),
(67, 'UYTUTYUUUUUUUUUUUUUUUTYUR', 1, 'TYUTYURRR', 'apps/uytutyuuuuuuuuuuuuuuutyur/uytutyuuuuuuuuuuuuuuutyur.apk', 'apps/uytutyuuuuuuuuuuuuuuutyur/uytutyuuuuuuuuuuuuuuutyur.jpg', '2019-06-10 16:55:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps_paises`
--

CREATE TABLE `apps_paises` (
  `ap_id` int(11) NOT NULL,
  `fk_p` int(11) NOT NULL,
  `fk_app` int(11) NOT NULL,
  `ap_fecha_creacion` datetime NOT NULL,
  `ap_activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apps_paises`
--

INSERT INTO `apps_paises` (`ap_id`, `fk_p`, `fk_app`, `ap_fecha_creacion`, `ap_activo`) VALUES
(1, 1, 63, '2019-06-05 17:35:51', 1),
(2, 2, 63, '2019-06-05 17:35:51', 1),
(3, 3, 63, '2019-06-05 17:35:51', 1),
(4, 4, 63, '2019-06-05 17:35:51', 1),
(5, 5, 63, '2019-06-05 17:35:51', 1),
(6, 6, 63, '2019-06-05 17:35:51', 1),
(7, 7, 63, '2019-06-05 17:35:51', 1),
(8, 8, 63, '2019-06-05 17:35:51', 1),
(9, 9, 63, '2019-06-05 17:35:52', 1),
(10, 1, 64, '2019-06-05 17:37:06', 1),
(11, 2, 64, '2019-06-05 17:37:06', 1),
(12, 4, 64, '2019-06-05 17:37:06', 1),
(13, 5, 64, '2019-06-05 17:37:06', 1),
(14, 1, 65, '2019-06-07 15:31:15', 1),
(15, 2, 65, '2019-06-07 15:31:15', 1),
(16, 4, 65, '2019-06-07 15:31:15', 1),
(17, 5, 65, '2019-06-07 15:31:15', 1),
(18, 1, 8, '2019-06-07 16:17:33', 1),
(19, 2, 8, '2019-06-07 16:17:33', 1),
(20, 4, 8, '2019-06-07 16:17:33', 1),
(21, 5, 8, '2019-06-07 16:17:33', 1),
(22, 7, 8, '2019-06-07 16:17:33', 1),
(23, 8, 8, '2019-06-10 09:25:03', 1),
(24, 1, 66, '2019-06-10 09:38:30', 1),
(25, 2, 66, '2019-06-10 09:38:30', 1),
(26, 3, 66, '2019-06-10 09:38:30', 1),
(27, 4, 66, '2019-06-10 09:38:30', 1),
(28, 5, 66, '2019-06-10 09:38:30', 1),
(29, 6, 66, '2019-06-10 09:38:31', 1),
(30, 1, 67, '2019-06-10 16:55:35', 1),
(31, 4, 67, '2019-06-10 16:55:35', 1),
(32, 7, 67, '2019-06-10 16:55:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps_referencias`
--

CREATE TABLE `apps_referencias` (
  `ar_id` int(11) NOT NULL,
  `fk_ref` int(11) NOT NULL,
  `fk_app` int(11) NOT NULL,
  `ar_fecha_creacion` datetime NOT NULL,
  `ar_activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps_referencias`
--

INSERT INTO `apps_referencias` (`ar_id`, `fk_ref`, `fk_app`, `ar_fecha_creacion`, `ar_activo`) VALUES
(1, 3, 63, '2019-06-05 17:35:52', 1),
(2, 5, 63, '2019-06-05 17:35:52', 1),
(3, 6, 63, '2019-06-05 17:35:52', 1),
(4, 7, 63, '2019-06-05 17:35:52', 1),
(5, 9, 63, '2019-06-05 17:35:52', 1),
(6, 10, 63, '2019-06-05 17:35:52', 1),
(7, 11, 63, '2019-06-05 17:35:52', 1),
(8, 12, 63, '2019-06-05 17:35:52', 1),
(9, 13, 63, '2019-06-05 17:35:52', 1),
(10, 14, 63, '2019-06-05 17:35:52', 1),
(11, 15, 63, '2019-06-05 17:35:52', 1),
(12, 16, 63, '2019-06-05 17:35:52', 1),
(13, 17, 63, '2019-06-05 17:35:52', 1),
(14, 18, 63, '2019-06-05 17:35:52', 1),
(15, 3, 64, '2019-06-05 17:37:06', 1),
(16, 5, 64, '2019-06-05 17:37:06', 1),
(17, 6, 64, '2019-06-05 17:37:06', 1),
(18, 7, 64, '2019-06-05 17:37:06', 1),
(19, 3, 65, '2019-06-07 15:31:15', 1),
(20, 5, 65, '2019-06-07 15:31:15', 1),
(21, 9, 65, '2019-06-07 15:31:15', 1),
(22, 3, 8, '2019-06-07 16:17:33', 1),
(23, 5, 8, '2019-06-07 16:17:33', 1),
(24, 6, 8, '2019-06-07 16:17:33', 1),
(25, 7, 8, '2019-06-07 16:17:33', 1),
(26, 9, 8, '2019-06-07 16:17:33', 1),
(27, 10, 8, '2019-06-07 16:17:33', 1),
(28, 12, 8, '2019-06-10 09:25:24', 1),
(29, 15, 8, '2019-06-10 09:27:04', 1),
(30, 3, 66, '2019-06-10 09:38:31', 1),
(31, 5, 66, '2019-06-10 09:38:31', 1),
(32, 6, 66, '2019-06-10 09:38:31', 1),
(33, 7, 66, '2019-06-10 09:38:31', 1),
(34, 9, 66, '2019-06-10 09:38:31', 1),
(35, 10, 66, '2019-06-10 09:38:31', 1),
(36, 3, 67, '2019-06-10 16:55:35', 1),
(37, 5, 67, '2019-06-10 16:55:35', 1),
(38, 7, 67, '2019-06-10 16:55:35', 1),
(39, 9, 67, '2019-06-10 16:55:35', 1),
(40, 11, 67, '2019-06-10 16:55:36', 1),
(41, 12, 67, '2019-06-10 16:55:36', 1),
(42, 18, 67, '2019-06-10 16:55:36', 1),
(43, 13, 8, '2019-06-10 17:20:01', 1),
(44, 18, 8, '2019-06-10 17:20:01', 1),
(45, 16, 8, '2019-06-10 17:20:21', 1),
(46, 14, 8, '2019-06-10 17:20:42', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `m_id` int(11) NOT NULL,
  `m_nombre` varchar(255) NOT NULL,
  `m_fecha_creacion` datetime DEFAULT NULL,
  `m_activa` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`m_id`, `m_nombre`, `m_fecha_creacion`, `m_activa`) VALUES
(1, 'HYUNDAI', '2019-05-29 09:27:55', 1),
(2, 'SIMPLY', '2019-05-29 09:27:59', 1),
(3, 'IBG', '2019-05-29 11:38:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `p_id` int(11) NOT NULL,
  `p_nombre` varchar(255) NOT NULL,
  `p_code` varchar(10) NOT NULL,
  `p_fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`p_id`, `p_nombre`, `p_code`, `p_fecha_creacion`) VALUES
(1, 'Colombia', 'CO', '2019-06-04 12:35:33'),
(2, 'México', 'MX', '2019-06-04 12:37:02'),
(3, 'Costa Rica', 'CR', '2019-06-04 12:37:02'),
(4, 'El Salvador', 'SV', '2019-06-04 12:37:39'),
(5, 'Guatemala', 'GT', '2019-06-04 12:38:24'),
(6, 'Honduras', 'HN', '2019-06-04 12:38:24'),
(7, 'Nicaragua', 'NI', '2019-06-04 12:39:48'),
(8, 'Perú', 'PE', '2019-06-04 12:41:39'),
(9, 'República dominicana', 'DO', '2019-06-05 07:40:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `ref_id` int(11) NOT NULL,
  `ref_nombre` varchar(200) NOT NULL,
  `ref_fecha_creacion` datetime NOT NULL,
  `ref_activo` int(11) NOT NULL,
  `fk_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `referencias`
--

INSERT INTO `referencias` (`ref_id`, `ref_nombre`, `ref_fecha_creacion`, `ref_activo`, `fk_marca`) VALUES
(3, 'HYLED3237iNTM', '2018-09-24 15:17:09', 1, 1),
(5, 'HYLED4313iNTM', '2018-09-26 11:51:09', 1, 1),
(6, 'HYLED483iNTM', '2018-09-26 11:51:09', 1, 1),
(7, 'SYLED393T2i', '2018-10-23 11:30:10', 1, 2),
(9, 'HYLED4019iNTM', '2019-01-08 09:13:01', 1, 1),
(10, 'IBG55UHD', '2019-01-11 14:53:01', 1, 3),
(11, 'HYLED5515iNT4K', '2019-02-26 09:18:02', 1, 1),
(12, 'HYLED5514IM4K', '2019-04-09 10:32:04', 1, 1),
(13, 'HYLED4916IM4K', '2019-04-09 10:33:04', 1, 1),
(14, 'HYLED3216iNTC', '2019-04-09 11:59:04', 1, 1),
(15, 'iBG326AN', '2019-04-23 09:59:04', 1, 3),
(16, 'HYLED6505iNT4K', '2019-05-08 13:20:05', 1, 1),
(17, 'HYLED3239iNTM', '2019-05-15 14:36:05', 1, 1),
(18, 'HYLED4317iNTM', '2019-05-15 14:36:05', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`);

--
-- Indices de la tabla `apps_paises`
--
ALTER TABLE `apps_paises`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indices de la tabla `apps_referencias`
--
ALTER TABLE `apps_referencias`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`m_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`p_id`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`ref_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `apps_paises`
--
ALTER TABLE `apps_paises`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `apps_referencias`
--
ALTER TABLE `apps_referencias`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
