-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 00:26:02
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
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` longtext NOT NULL,
  `ruta` longtext NOT NULL,
  `apk` longtext NOT NULL,
  `imagen` longtext NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps`
--

INSERT INTO `apps` (`id`, `nombre`, `descripcion`, `ruta`, `apk`, `imagen`, `fecha_creacion`) VALUES
(8, 'Netflix', 'Netflix: es el servicio líder de suscripción para ver series y películas desde tu dispositivo Android. La aplicación de Netflix ofrece la mejor experiencia cuando quieras. Tu suscripción a Netflix te concede acceso ilimitado a películas y series.\nVersión: 4.16-200147 release\nNivel de Manejo: Bajo\nInteracción: Control remoto o Mouse\n', '/_upload/apps/Netflix', '/_upload/apps/Netflix/Netflix.apk', '/_upload/apps/Netflix/Netflix.jpg', '2019-05-28 09:21:05'),
(9, 'Youtube Kids', 'Youtube Kids: YouTube Kids es un producto de Google diseñado desde el principio teniendo en mente a las familias. La aplicación hace que los niños puedan encontrar contenido sobre los temas que les interesan, desde cualquier dispositivo Android.\nVersión: 3.61.1\nNivel de manejo: Bajo.\nInteracción: Control Remoto o Mouse.', '/_upload/apps/Youtube Kids', '/_upload/apps/Youtube Kids/Youtube Kids.apk', '/_upload/apps/Youtube Kids/Youtube Kids.png', '2019-04-09 12:00:04'),
(10, 'AIDA64', 'es una herramienta de diagnóstico del sistema que arroja de manera completa todos los datos del equipo\nVersión: 1.53\nNivel de manejo: Bajo.\nInteracción: control remoto o mouse.', '/_upload/apps/AIDA64', '/_upload/apps/AIDA64/AIDA64.apk', '/_upload/apps/AIDA64/AIDA64.png', '2019-04-09 12:00:04'),
(11, 'CetusPlay', 'es una aplicación que permite controlar tu Android tv de manera inalámbrica solo necesitamos conexión a wifi, tiene dos aplicaciones, una que se instala en la tv y otra que se instala en el teléfono móvil (descargar desde Google Store) que se va a usar como control.\nVersión: 4.6.8.1\nNivel de manejo: Medio.\nInteracción: Celular o Tablet (con acceso a wifi).\n', '/_upload/apps/CetusPlay', '/_upload/apps/CetusPlay/CetusPlay.apk', '/_upload/apps/CetusPlay/CetusPlay.png', '2019-01-08 11:46:01'),
(12, 'Crunchyroll', 'es el mayor referente del anime y el manga, tiene más de 40 millones de usuarios registrados y más de un millón de suscriptores. Los fans conectan a través de sus bibliotecas de anime.\nVersión: 2.1.7.\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', '/_upload/apps/Crunchyroll', '/_upload/apps/Crunchyroll/Crunchyroll.apk', '/_upload/apps/Crunchyroll/Crunchyroll.png', '2019-04-09 12:00:04'),
(13, 'Instagram', 'es una aplicación que permite de forma simple capturar y compartir los mejores momentos. Sigue a tus amigos y familiares para saber qué están haciendo en todo momento.\nVersión: 75.0.0.23.99\nNivel de Manejo: Bajo.\nInteracción: Mouse o control remoto.', '/_upload/apps/Instagram', '/_upload/apps/Instagram/Instagram.apk', '/_upload/apps/Instagram/Instagram.png', '2019-04-09 12:00:04'),
(14, 'Facebook Lite', 'es un cliente oficial de Facebook, que nos permitirá utilizar la popular red social a través de un cliente mucho más ligero y más preparado para terminales Android. Ahora es más rápido y sencillo que nunca mantenerse en contacto con tus amigos; comparte actualizaciones y fotos, interactúa con amigos y familiares.\nVersión: 126.0.0.7.99\nNivel de Manejo: Bajo.\nInteracción: Mouse, teclado o control remoto.', '/_upload/apps/Facebook Lite', '/_upload/apps/Facebook Lite/Facebook Lite.apk', '/_upload/apps/Facebook Lite/Facebook Lite.png', '2019-04-09 12:01:04'),
(15, 'Messenger', 'es la aplicación de mensajería oficial de Facebook, que nos permitirá entablar conversaciones de texto con todos nuestros amigos dentro de la popular red social; gracias a ella podremos enviar y recibir mensajes de texto.\nVersión: 196.0.0.29.99\nNivel de Manejo: Bajo.\nInteracción: Mouse, teclado o control remoto.', '/_upload/apps/Messenger', '/_upload/apps/Messenger/Messenger.apk', '/_upload/apps/Messenger/Messenger.png', '2019-01-08 12:13:01'),
(16, 'myTuner', 'Si quieres escuchar la radio de una determinada ciudad, un país en concreto o simplemente quieres sintonizar tu emisora favorita, myTuner Radio es una aplicación con la que podrás conectarte a cualquier estación de más de ciento veinte países de todo el mundo\nVersión: 7.1.19\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', '/_upload/apps/myTuner', '/_upload/apps/myTuner/myTuner.apk', '/_upload/apps/myTuner/myTuner.png', '2019-04-09 12:01:04'),
(17, 'YouTube', 'YouTube: es un sitio web para compartir vídeos subidos por los usuarios a través de Internet, es un servicio de alojamiento de vídeos. Presenta una variedad de clips de películas, programas de televisión y vídeos musicales, así como contenidos amateur como videoblogs y YouTube Gaming.\nVersión: 2.03.06\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', '/_upload/apps/YouTube', '/_upload/apps/YouTube/YouTube.apk', '/_upload/apps/YouTube/YouTube.png', '2019-01-08 13:44:01'),
(18, 'ES Explorador de Archivos', 'es una cómoda herramienta para la gestión de archivos y aplicaciones, que cuenta con multitud de funciones adicionales\nVersión: 4.1.9.5.2\nNivel de Manejo: Medio.\nInteracción: Control remoto o Mouse.', '/_upload/apps/ES Explorador de Archivos', '/_upload/apps/ES Explorador de Archivos/ES Explorador de Archivos.apk', '/_upload/apps/ES Explorador de Archivos/ES Explorador de Archivos.png', '2019-04-23 09:59:04'),
(19, 'Skype Lite', 'es una aplicación rápida y ligera para dispositivos Android desarrollado para ayudar a las personas a comunicarse, al tiempo que ofrece gran rendimiento en condiciones críticas de red. Skype Lite combina todas las grandes características Skype que ya conoces con los nuevos especialmente diseñadas.\nVersión: 1.75.76.3\nNivel de manejo: Bajo.\nInteracción: Control remoto, control multimedia, mouse y teclado. Opcional (micrófono y cámara web)', '/_upload/apps/Skype Lite', '/_upload/apps/Skype Lite/Skype Lite.apk', '/_upload/apps/Skype Lite/Skype Lite.png', '2019-04-09 10:35:04'),
(20, 'Spotify', 'es una aplicación multiplataforma empleada para la reproducción de música vía streaming por Internet a través de la combinación de servidores dedicados. Cuenta con un modelo de negocio Premium, y un servicio gratuito básico y con publicidad; pero con características adicionales, como una mejor calidad de audio, a través de una suscripción de pago.\nVersión: 8.4.84.874\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse, celular o Tablet.', '/_upload/apps/Spotify', '/_upload/apps/Spotify/Spotify.apk', '/_upload/apps/Spotify/Spotify.png', '2019-04-09 12:01:04'),
(21, 'VLC', 'VLC Media Player es un reproductor multimedia, gratuito y multiplataforma, libre y de código abierto. Sus características más destacadas son: soporta un gran número de formatos de audio y vídeo sin necesidad de instalar códecs adicionales: MPEG-1, MPEG-2, MPEG-4, DivX, MP3,OGG, MOV, RAM, AVI, FLV, etc.\nVersión: 3.0.13\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', '/_upload/apps/VLC', '/_upload/apps/VLC/VLC.apk', '/_upload/apps/VLC/VLC.png', '2019-04-09 12:01:04'),
(22, 'GOOGLE PLAY GAMES', 'es la red social de videojuegos de Google, ofreciendo un punto de encuentro común para todos los videojuegos que utilizan sistema operativo Android. Gracias a Google Play Games los jugadores podrán descubrir nuevos videojuegos de su interés, podrán jugar con amigos más fácilmente, participar en partidas multijugador e incluso llevar un registro de los logros desbloqueados en cada juego.\nVersión: 5.14.7825\nNivel de manejo: Bajo.\nInteracción: control remoto, mouse y/o teclado.', '/_upload/apps/GOOGLE PLAY GAMES', '/_upload/apps/GOOGLE PLAY GAMES/GOOGLE PLAY GAMES.apk', '/_upload/apps/GOOGLE PLAY GAMES/GOOGLE PLAY GAMES.png', '2019-01-09 16:59:01'),
(23, 'SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES)', 'es una aplicación del sistema de Android que nos permitirá tener el resto de aplicaciones de nuestro terminal siempre actualizadas, ya que se encargará de comprobar que todas las apps instaladas están en la última versión disponible. Mejora la experiencia general de uso del terminal, nos permitirán gestionar las aplicaciones de nuestra cuenta, es una aplicación realmente imprescindible mientras estemos utilizando un terminal con sistema operativo Android.\nVersión: 14.7.99\nNivel de manejo: Bajo.\nInteracción: ninguna o nada.', '/_upload/apps/SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES)', '/_upload/apps/SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES)/SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES).apk', '/_upload/apps/SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES)/SERVICIOS DE GOOGLE PLAY (GOOGLE PLAY SERVICES).png', '2019-01-09 17:23:01'),
(24, 'TOTAL COMMANDER', 'Total Commander: es la versión para terminales Android del gestor de archivos para Windows del mismo nombre, que ofrece una serie de prestaciones similares a las de su versión para sistemas operativos de equipos de escritorio.\r\nVersión: 2.90\r\nNivel de manejo: Bajo.\r\nInteracción: Control remoto o mouse.', '/_upload/apps/TOTAL COMMANDER', '/_upload/apps/TOTAL COMMANDER/TOTAL COMMANDER.apk', '/_upload/apps/TOTAL COMMANDER/TOTAL COMMANDER.png', '2019-01-10 08:51:01'),
(25, 'QUICKSUPPORT', 'es una aplicación que, una vez instalada en nuestro dispositivo, nos permitirá gestionar todo su contenido desde la comodidad de un ordenador; conectarse remotamente con cualquier dispositivo Android y realizar asistencia técnica desde cualquier PC\nVersión: 14.1.83\nNivel de Manejo: Medio.\nInteracción: Control remoto o Mouse.', '/_upload/apps/QUICKSUPPORT', '/_upload/apps/QUICKSUPPORT/QUICKSUPPORT.apk', '/_upload/apps/QUICKSUPPORT/QUICKSUPPORT.jpg', '2019-01-10 09:07:01'),
(26, 'QUICKSUPPORT Add-On', 'complemento de la aplicación QuickSupport para gestión remota desde un pc o cualquier dispositivo Android.\nVersión: 10.0.3086\nNivel de Manejo: Medio.\nInteracción: Ninguna o nada.', '/_upload/apps/QUICKSUPPORT Add-On', '/_upload/apps/QUICKSUPPORT Add-On/QUICKSUPPORT Add-On.apk', '/_upload/apps/QUICKSUPPORT Add-On/QUICKSUPPORT Add-On.png', '2019-01-10 09:11:01'),
(27, 'TWITCH', 'Plataforma que ofrece un servicio de streaming de video en vivo propiedad de Amazon.com. Es decir, te permite retransmitir videojuegos en directo.\nVersión: 4.5.5\nNivel de manejo: Bajo.\nInteracción: Control remoto.', '/_upload/apps/TWITCH', '/_upload/apps/TWITCH/TWITCH.apk', '/_upload/apps/TWITCH/TWITCH.png', '2019-04-09 12:01:04'),
(28, 'NETFLIX (ANDROID 5.1)', 'es el servicio líder de suscripción para ver series y películas desde tu dispositivo Android. La aplicación de Netflix ofrece la mejor experiencia cuando quieras. Tu suscripción a Netflix te concede acceso ilimitado a películas y series.\nVersión: 4.16.3 build 15172\nNivel de Manejo: Bajo.\nInteracción: Control remoto o Mouse.', '/_upload/apps/NETFLIX (ANDROID 5.1)', '/_upload/apps/NETFLIX (ANDROID 5.1)/NETFLIX (ANDROID 5.1).apk', '/_upload/apps/NETFLIX (ANDROID 5.1)/NETFLIX (ANDROID 5.1).jpg', '2019-01-11 14:57:01'),
(29, 'Microsoft Word', 'es una aplicación que nos permitirá crear, modificar y por supuesto ver cualquier documento en formato Word. Todo ello desde la comodidad de nuestro terminal Android, y con una calidad de imagen perfecta.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.', '/_upload/apps/Microsoft Word', '/_upload/apps/Microsoft Word/Microsoft Word.apk', '/_upload/apps/Microsoft Word/Microsoft Word.png', '2019-04-09 12:04:04'),
(30, 'Microsoft PowerPoint', 'es la aplicación oficial para Android de uno de los programas más utilizados del mundo. Microsoft PowerPoint es una excelente herramienta para hacer presentaciones, que cuenta con todas las herramientas y prestaciones que podríamos desear.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.', '/_upload/apps/Microsoft PowerPoint', '/_upload/apps/Microsoft PowerPoint/Microsoft PowerPoint.apk', '/_upload/apps/Microsoft PowerPoint/Microsoft PowerPoint.png', '2019-04-09 12:04:04'),
(31, 'Microsoft Excel', 'es la aplicación oficial de Microsoft Excel para terminales Android, que nos permitirá visualizar, editar y crear hojas de cálculo desde nuestra TV con sistema operativo Android.\nVersión: 160.0.11126.20063,\nNivel de Manejo: medio - alto\nInteracción: Mouse, teclado o control remoto.\n', '/_upload/apps/Microsoft Excel', '/_upload/apps/Microsoft Excel/Microsoft Excel.apk', '/_upload/apps/Microsoft Excel/Microsoft Excel.png', '2019-04-09 12:04:04'),
(32, 'YOUTUBE v2.00.17', 'es un sitio web para compartir vídeos subidos por los usuarios a través de Internet, es un servicio de alojamiento de vídeos. Presenta una variedad de clips de películas, programas de televisión y vídeos musicales, así como contenidos amateur como videoblogs y YouTube Gaming.\nVersión: 2.00.17;\nNivel de manejo: Bajo.\nInteracción: Control remoto o mouse.', '/_upload/apps/YOUTUBE v2.00.17', '/_upload/apps/YOUTUBE v2.00.17/YOUTUBE v2.00.17.apk', '/_upload/apps/YOUTUBE v2.00.17/YOUTUBE v2.00.17.png', '2019-05-08 13:20:05'),
(33, 'AptoideTV', 'Aptoide TV: Aptoide TV es la versión de la tienda que ofrece aplicaciones optimizadas para Smart TV y decodificadores tipo Android TV. La app ofrece un contenido similar distribuido de manera similar a la versión para dispositivos móviles.\nVersión: 5.0.2;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', '/_upload/apps/AptoideTV', '/_upload/apps/AptoideTV/AptoideTV.apk', '/_upload/apps/AptoideTV/AptoideTV.png', '2019-05-15 14:37:05'),
(34, 'VLC TV', 'VLC: VLC media player es un reproductor y framework multimedia, libre y de código abierto desarrollado por el proyecto Video LAN. Es un programa multiplataforma, capaz de reproducir casi cualquier formato de vídeo sin necesidad de instalar códecs externos.\nVersión: 1.7.2;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', '/_upload/apps/VLC TV', '/_upload/apps/VLC TV/VLC TV.apk', '/_upload/apps/VLC TV/VLC TV.png', '2019-04-12 09:32:04'),
(35, 'Claro Video', 'CLARO VIDEO: Claro es una marca de servicios de comunicaciones latinoamericana, siendo Claro Video su plataforma de streaming. Este servicio de suscripción y alquiler en línea cuenta con más de 34.000 títulos entre películas, series, documentales, programas animados, y una parrilla de programación con varios canales en vivo.\nVersión:---;\nNivel de manejo: Medio – Bajo\nInteracción: Control remoto, mouse.', '/_upload/apps/Claro Video', '/_upload/apps/Claro Video/Claro Video.apk', '/_upload/apps/Claro Video/Claro Video.png', '2019-04-12 09:45:04'),
(38, 'sw', 'sw de uso exclusivo para servicio técnico.\n\nCualquier inquietud comunicarse con 018000122466\nHYLED3237INTM1802007881-9030  KKADC1711203-1E\n\nlink; https://www.dropbox.com/s/6m7gwwpehch1gbq/K061_KDI32QT538LN_MSD628-P75VXV60-1GB-ISDB_panel-HV320WHB-N00-mirror_logo-HYUNDAI_20150713_release.rar?dl=0\n\n', '/_upload/apps/sw', '/_upload/apps/sw/sw.apk', '/_upload/apps/sw/sw.png', '2019-05-28 09:21:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps_referencias`
--

CREATE TABLE `apps_referencias` (
  `id_referencia` int(11) NOT NULL,
  `id_apps` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps_referencias`
--

INSERT INTO `apps_referencias` (`id_referencia`, `id_apps`, `fecha_creacion`) VALUES
(3, 11, '2019-01-08'),
(5, 11, '2019-01-08'),
(6, 11, '2019-01-08'),
(9, 11, '2019-01-08'),
(3, 15, '2019-01-08'),
(5, 15, '2019-01-08'),
(6, 15, '2019-01-08'),
(9, 15, '2019-01-08'),
(3, 17, '2019-01-08'),
(5, 17, '2019-01-08'),
(6, 17, '2019-01-08'),
(9, 17, '2019-01-08'),
(3, 22, '2019-01-09'),
(5, 22, '2019-01-09'),
(6, 22, '2019-01-09'),
(9, 22, '2019-01-09'),
(3, 23, '2019-01-09'),
(5, 23, '2019-01-09'),
(6, 23, '2019-01-09'),
(9, 23, '2019-01-09'),
(3, 24, '2019-01-10'),
(5, 24, '2019-01-10'),
(6, 24, '2019-01-10'),
(9, 24, '2019-01-10'),
(3, 25, '2019-01-10'),
(5, 25, '2019-01-10'),
(6, 25, '2019-01-10'),
(9, 25, '2019-01-10'),
(3, 26, '2019-01-10'),
(5, 26, '2019-01-10'),
(6, 26, '2019-01-10'),
(9, 26, '2019-01-10'),
(10, 28, '2019-01-11'),
(3, 19, '2019-04-09'),
(5, 19, '2019-04-09'),
(6, 19, '2019-04-09'),
(9, 19, '2019-04-09'),
(10, 19, '2019-04-09'),
(12, 19, '2019-04-09'),
(13, 19, '2019-04-09'),
(3, 9, '2019-04-09'),
(5, 9, '2019-04-09'),
(6, 9, '2019-04-09'),
(9, 9, '2019-04-09'),
(14, 9, '2019-04-09'),
(3, 10, '2019-04-09'),
(5, 10, '2019-04-09'),
(6, 10, '2019-04-09'),
(9, 10, '2019-04-09'),
(14, 10, '2019-04-09'),
(3, 12, '2019-04-09'),
(5, 12, '2019-04-09'),
(6, 12, '2019-04-09'),
(9, 12, '2019-04-09'),
(10, 12, '2019-04-09'),
(12, 12, '2019-04-09'),
(13, 12, '2019-04-09'),
(14, 12, '2019-04-09'),
(3, 13, '2019-04-09'),
(5, 13, '2019-04-09'),
(6, 13, '2019-04-09'),
(9, 13, '2019-04-09'),
(14, 13, '2019-04-09'),
(3, 14, '2019-04-09'),
(5, 14, '2019-04-09'),
(6, 14, '2019-04-09'),
(9, 14, '2019-04-09'),
(10, 14, '2019-04-09'),
(12, 14, '2019-04-09'),
(13, 14, '2019-04-09'),
(14, 14, '2019-04-09'),
(3, 16, '2019-04-09'),
(5, 16, '2019-04-09'),
(6, 16, '2019-04-09'),
(9, 16, '2019-04-09'),
(10, 16, '2019-04-09'),
(12, 16, '2019-04-09'),
(13, 16, '2019-04-09'),
(14, 16, '2019-04-09'),
(3, 20, '2019-04-09'),
(5, 20, '2019-04-09'),
(6, 20, '2019-04-09'),
(9, 20, '2019-04-09'),
(10, 20, '2019-04-09'),
(12, 20, '2019-04-09'),
(13, 20, '2019-04-09'),
(14, 20, '2019-04-09'),
(3, 21, '2019-04-09'),
(5, 21, '2019-04-09'),
(6, 21, '2019-04-09'),
(9, 21, '2019-04-09'),
(14, 21, '2019-04-09'),
(3, 27, '2019-04-09'),
(5, 27, '2019-04-09'),
(6, 27, '2019-04-09'),
(9, 27, '2019-04-09'),
(14, 27, '2019-04-09'),
(3, 29, '2019-04-09'),
(5, 29, '2019-04-09'),
(9, 29, '2019-04-09'),
(14, 29, '2019-04-09'),
(3, 30, '2019-04-09'),
(5, 30, '2019-04-09'),
(9, 30, '2019-04-09'),
(14, 30, '2019-04-09'),
(3, 31, '2019-04-09'),
(5, 31, '2019-04-09'),
(9, 31, '2019-04-09'),
(14, 31, '2019-04-09'),
(10, 34, '2019-04-12'),
(11, 34, '2019-04-12'),
(12, 34, '2019-04-12'),
(13, 34, '2019-04-12'),
(3, 35, '2019-04-12'),
(5, 35, '2019-04-12'),
(6, 35, '2019-04-12'),
(9, 35, '2019-04-12'),
(10, 35, '2019-04-12'),
(12, 35, '2019-04-12'),
(13, 35, '2019-04-12'),
(3, 18, '2019-04-23'),
(5, 18, '2019-04-23'),
(6, 18, '2019-04-23'),
(9, 18, '2019-04-23'),
(15, 18, '2019-04-23'),
(10, 32, '2019-05-08'),
(11, 32, '2019-05-08'),
(12, 32, '2019-05-08'),
(13, 32, '2019-05-08'),
(15, 32, '2019-05-08'),
(16, 32, '2019-05-08'),
(3, 33, '2019-05-15'),
(5, 33, '2019-05-15'),
(6, 33, '2019-05-15'),
(9, 33, '2019-05-15'),
(10, 33, '2019-05-15'),
(12, 33, '2019-05-15'),
(13, 33, '2019-05-15'),
(14, 33, '2019-05-15'),
(17, 33, '2019-05-15'),
(18, 33, '2019-05-15'),
(3, 8, '2019-05-28'),
(5, 8, '2019-05-28'),
(6, 8, '2019-05-28'),
(7, 8, '2019-05-28'),
(9, 8, '2019-05-28'),
(10, 8, '2019-05-28'),
(14, 8, '2019-05-28'),
(16, 8, '2019-05-28'),
(19, 8, '2019-05-28'),
(19, 38, '2019-05-28');

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
(18, 'HYLED4317iNTM', '2019-05-15 14:36:05', 1, 1),
(32, 'dsaasddsa', '2019-05-30 16:57:32', 1, 1),
(33, 'dsasadsad', '2019-05-30 17:00:04', 1, 2),
(34, 'dsasdsad', '2019-05-30 17:00:56', 1, 1),
(35, 'dsaadssdsasadsaads', '2019-05-30 17:05:44', 1, 2),
(36, 'dsdsadsa', '2019-05-30 17:06:42', 1, 1),
(37, 'dsadsadsa', '2019-05-30 17:06:50', 1, 1),
(38, 'sdsadsa', '2019-05-30 17:07:20', 1, 1),
(39, 'dsadsaads', '2019-05-30 17:10:21', 1, 1),
(40, 'sdadsasad', '2019-05-30 17:10:59', 1, 1),
(41, 'dsdasdsaads', '2019-05-30 17:11:27', 1, 1),
(42, 'dsadsasda', '2019-05-30 17:13:37', 1, 1),
(43, 'dsaadsdsasdsdasda', '2019-05-30 17:13:48', 1, 2),
(44, 'dsadsadsasda', '2019-05-30 17:14:10', 1, 1),
(45, 'dsasddsa', '2019-05-30 17:14:41', 1, 1),
(46, 'sdsadsaads', '2019-05-30 17:15:18', 1, 2),
(47, 'hyled', '2019-05-30 17:16:42', 1, 1),
(48, 'sddasdsasad', '2019-05-30 17:19:49', 1, 1),
(49, 'dssdasadsda', '2019-05-30 17:20:08', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`m_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
