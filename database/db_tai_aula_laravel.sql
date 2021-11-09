/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `curso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id`, `nome`, `abreviatura`, `data_inicio`, `data_fim`, `created_at`, `updated_at`) VALUES
	(1, 'Técnico em Informática', 'TECINFO', '2021-01-01', '2021-06-01', NULL, NULL),
	(2, 'Técnico em Mecanica', 'TECMEC', '2021-01-01', '2021-06-01', NULL, NULL),
	(3, 'Engenharia de Software', 'ENGSOFT', '2020-01-01', '2024-01-01', NULL, NULL);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` (`id`, `nome`, `carga_horaria`, `created_at`, `updated_at`) VALUES
	(1, 'Banco de Dados', 60, NULL, NULL),
	(2, 'Programação Mobile', 80, NULL, NULL),
	(3, 'Programação Web', 80, NULL, NULL);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `disciplina_turma` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `disciplina_id` bigint(20) unsigned DEFAULT NULL,
  `turma_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_turma_disciplina_id_foreign` (`disciplina_id`),
  KEY `disciplina_turma_turma_id_foreign` (`turma_id`),
  CONSTRAINT `disciplina_turma_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`),
  CONSTRAINT `disciplina_turma_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `disciplina_turma` DISABLE KEYS */;
INSERT INTO `disciplina_turma` (`id`, `disciplina_id`, `turma_id`, `created_at`, `updated_at`) VALUES
	(2, 1, 2, NULL, NULL),
	(3, 2, 2, NULL, NULL),
	(4, 3, 2, NULL, NULL),
	(5, 1, 7, NULL, NULL),
	(6, 2, 7, NULL, NULL);
/*!40000 ALTER TABLE `disciplina_turma` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_06_16_120036_create_turma_table', 1),
	(5, '2021_06_15_190356_create_alunos_table', 2),
	(6, '2021_07_28_120719_create_turma_categorias_table', 3),
	(7, '2021_07_28_121024_alter_turma', 3),
	(8, '2021_09_08_113324_alter_turma2', 4),
	(9, '2021_09_29_111747_create_cursos_table', 5),
	(10, '2021_09_29_111922_create_disciplinas_table', 5),
	(11, '2021_09_29_112222_alter_turma_curso_id', 5),
	(12, '2021_09_29_112333_create_disciplina_turma', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `turma` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `nome_arquivo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `turma_categoria_id` bigint(20) unsigned DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_turma_categoria_id_foreign` (`turma_categoria_id`),
  KEY `turma_curso_id_foreign` (`curso_id`),
  CONSTRAINT `turma_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`),
  CONSTRAINT `turma_turma_categoria_id_foreign` FOREIGN KEY (`turma_categoria_id`) REFERENCES `turma_categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` (`id`, `nome`, `codigo`, `descricao`, `created_at`, `nome_arquivo`, `updated_at`, `turma_categoria_id`, `curso_id`) VALUES
	(2, 'Informática 03', '03/', 'INF03', NULL, '20210908123217.jpg', '2021-09-08 12:32:17', 77, 1),
	(5, 'EngSoftware 03', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', NULL, '20210922122247.jpg', '2021-09-29 12:38:36', 77, 3),
	(7, 'Mecanica 01', '443663882', 'Dicta voluptatem qui ea praesentium. Nihil voluptatibus et veritatis quia blanditiis sunt eaque.', NULL, '', NULL, NULL, 2),
	(8, 'Saulo Rosa Galvão Jr.', '148259495', 'In vero atque labore officiis. Placeat dolorem cumque quo nulla rem.', NULL, '', NULL, NULL, 0),
	(9, 'Daniella Giovanna Flores', '51539460', 'Eius facere qui qui sit maxime.', NULL, '', NULL, NULL, 0),
	(10, 'Moisés Gilberto Souza Sobrinho', '685489783', 'Perspiciatis autem sapiente quis ipsa magnam.', NULL, '', NULL, NULL, 0),
	(11, 'Dr. Valentin Salazar da Rosa', '166952312', 'Ut quo neque suscipit autem doloremque.', NULL, '', NULL, NULL, 0),
	(12, 'Márcio Luiz Rezende Jr.', '691524386', 'Dolor explicabo omnis rem voluptatibus iste aut. Voluptas amet enim error eos et.', NULL, '', NULL, NULL, 0),
	(13, 'Christopher Lovato Delvalle', '234191209', 'Cumque atque eaque excepturi. Provident quisquam eos quisquam occaecati dolores quo.', NULL, '', NULL, NULL, 0),
	(14, 'Sr. Igor Inácio Beltrão Neto', '776140776', 'Fuga quisquam dicta error neque eius eaque quidem. Quis sit velit excepturi est.', NULL, '', NULL, NULL, 0),
	(15, 'Dr. Artur Barros Sobrinho', '775880785', 'Repellendus quaerat eius voluptatum tempora. Iste officia eos ut facere.', NULL, '20211028223041.png', '2021-10-28 22:30:41', 71, 0),
	(16, 'George Serna Zamana Sobrinho', '903154539', 'Quia aliquid eum quibusdam dolorem atque dicta sunt velit. Praesentium ducimus amet magnam ea.', NULL, '', NULL, NULL, 0),
	(17, 'Sr. Andres Feliciano Sobrinho', '794403598', 'Corrupti esse possimus incidunt ut libero minima adipisci dolorem.', NULL, '', NULL, NULL, 0),
	(18, 'Dr. David Augusto de Aguiar', '99808900', 'Et asperiores incidunt nostrum. Cupiditate mollitia reiciendis est cumque autem et impedit velit.', NULL, '', NULL, NULL, 0),
	(19, 'Srta. Micaela Constância Franco Jr.', '888958274', 'Corrupti cumque qui repellendus optio aut nesciunt. Molestiae fuga alias nesciunt qui.', NULL, '', NULL, NULL, 0),
	(20, 'Dr. Adriana Anita Balestero Sobrinho', '128433329', 'Dolorem et quod necessitatibus nulla dolores eum. Quod laborum ut et autem.', NULL, '', NULL, NULL, 0),
	(21, 'Nelson Lira', '330764301', 'Quo sunt quam non eum.', NULL, '', NULL, NULL, 0),
	(22, 'Gael Medina', '934362230', 'Qui beatae omnis dicta voluptate possimus soluta enim.', NULL, '', NULL, NULL, 0),
	(26, 'teste32', 'te3', 'test', '2021-07-28 12:26:55', '', '2021-07-28 12:26:55', NULL, 0),
	(27, 'Informática 09', 'INF09', 'teste9', '2021-07-28 12:27:41', '', '2021-07-28 13:35:54', 77, 0),
	(28, 'Informática 05', '05', 'teste', '2021-09-08 12:01:33', NULL, '2021-09-08 12:01:33', 71, 0),
	(31, 'Informática 05', '05', 'teste', '2021-09-08 12:09:40', '20210908120940.jpg', '2021-09-08 12:09:40', 71, 0),
	(32, 'Informática 05', '05/', 'INF05', '2021-09-08 12:26:01', '20210908122601.jpg', '2021-09-08 12:26:01', 77, 0),
	(33, 'Informática 05', '05/', 'INF05', '2021-09-08 12:29:17', '20210908122917.jpg', '2021-09-08 12:29:17', 77, 0),
	(34, 'Informática 03', '03/', 'INF03', '2021-09-08 12:32:17', '20210908123217.jpg', '2021-09-08 12:32:17', 77, 0),
	(35, 'Cezar Rodrigo Martines', '60/66-38*19', 'Veniam sunt suscipit quod possimus.', '2021-09-08 12:32:23', '20210908123223.jpg', '2021-09-08 12:32:23', 77, 0),
	(36, 'Iasmin Fidalgo Sobrinha', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-22 11:43:00', NULL, '2021-09-22 11:43:00', 71, 0),
	(37, 'Iasmin Fidalgo Sobrinho', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-22 11:43:16', NULL, '2021-09-22 11:43:16', 77, 0),
	(38, 'Informática 11', '2222222222222222', 'teste', '2021-09-22 12:16:33', '20210922121633.jpg', '2021-09-22 12:16:33', 72, 0),
	(39, 'Informática 22', '2222222222222222', 'teste', '2021-09-22 12:16:47', '20210922121647.jpg', '2021-09-22 12:16:47', 72, 0),
	(40, 'Informática 33', '2222222222222222', 'teste', '2021-09-22 12:17:58', '20210922121758.jpg', '2021-09-22 12:17:58', 72, 0),
	(41, 'Informática 44', '2222222222222222', 'teste', '2021-09-22 12:19:49', '20210922121949.jpg', '2021-09-22 12:19:49', 72, 0),
	(42, 'Informática 66', '2222222222222222', 'rwarw', '2021-09-22 12:22:03', '20210922122203.jpg', '2021-09-22 12:22:03', 72, 0),
	(43, 'Iasmin Fidalgo Sobrinho 1', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-22 12:22:19', '20210922122219.jpg', '2021-09-22 12:22:19', 77, 0),
	(44, 'Iasmin Fidalgo Sobrinho 2', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-22 12:22:47', '20210922122247.jpg', '2021-09-22 12:22:47', 77, 0),
	(45, 'Iasmin Fidalgo Sobrinho 2', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-22 12:24:13', NULL, '2021-09-22 12:24:13', 77, 0),
	(46, 'EngSoftware 03', '22/80-40*80', 'Optio sed iure illo debitis quo sed quisquam. Eum blanditiis natus quia iste.', '2021-09-29 12:38:36', NULL, '2021-09-29 12:38:36', 77, NULL),
	(47, 'Dr. Artur Barros Sobrinho', '775880785', 'Repellendus quaerat eius voluptatum tempora. Iste officia eos ut facere.', '2021-10-28 22:30:41', '20211028223041.png', '2021-10-28 22:30:41', 71, NULL);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `turma_categoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `turma_categoria` DISABLE KEYS */;
INSERT INTO `turma_categoria` (`id`, `nome`, `sigla`, `created_at`, `updated_at`) VALUES
	(71, 'Técnico', 'TEC', NULL, NULL),
	(72, 'Graduação', 'GRA', NULL, NULL),
	(73, 'Especialização', 'ESP', NULL, NULL),
	(74, 'Mestrado', 'MES', NULL, NULL),
	(75, 'Douturado', 'DR', NULL, NULL),
	(76, 'Pós-Douturado', 'PHD', NULL, NULL),
	(77, 'Profissionalizante', 'FIC', NULL, NULL);
/*!40000 ALTER TABLE `turma_categoria` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin@admin.com', NULL, '$2y$10$anhnFsIAjaMKtEu9bhoCDuY1fTEYqt8Eg8cPAyqSyTHERvDrfKtjm', NULL, '2021-08-04 11:32:00', '2021-08-04 11:32:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
