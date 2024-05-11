-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para quarentena_db
CREATE DATABASE IF NOT EXISTS `quarentena_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `quarentena_db`;

-- Copiando estrutura para tabela quarentena_db.ingressos
CREATE TABLE IF NOT EXISTS `ingressos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_completo` text DEFAULT NULL,
  `data_de_ingresso` date NOT NULL,
  `whatsapp` text NOT NULL,
  `cep` text DEFAULT NULL,
  `logradouro` text DEFAULT NULL,
  `complemento` text DEFAULT NULL,
  `bairro` text DEFAULT NULL,
  `localidade` text DEFAULT NULL,
  `uf` text DEFAULT NULL,
  `codigo_rastreio` text DEFAULT NULL,
  `detalhe_envio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela quarentena_db.ingressos: ~14 rows (aproximadamente)
INSERT INTO `ingressos` (`id`, `nome_completo`, `data_de_ingresso`, `whatsapp`, `cep`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `codigo_rastreio`, `detalhe_envio`, `created_at`, `updated_at`) VALUES
	(4, 'Arthur Rodrigo do Carmo Ferreira', '2024-03-21', '8294209818', '57038230', 'Avenida Brigadeiro Eduardo Gomes', '325, Edifício Walter Vianna, apt 1003 Ref: Rua do hotel ritz suítes', 'Cruz das Almas', 'Maceió', 'AL', 'JN954498518BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(5, 'Marcelo Santos De Freitas', '2024-03-20', '71988574671', '41200100', 'Rua Jardim Oliveira', 'Em frente a Igreja Batista', 'Engomadeira', 'Salvador', 'BA', 'JN954498495BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(6, 'Caique Oliveira Requena', '2024-03-17', '11993390058', '02530000', 'Rua Galiléia', 'Casa 2 - Paralela a Av Casa Verde', 'Casa Verde Média', 'São Paulo', 'SP', 'JN954498481BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(7, 'Raul Golinelli', '2024-03-27', '14996284354', '17360446', 'Rua Senador Lacerda Franco', 'número 1155', 'Vila Catarina', 'Torrinha', 'SP', NULL, NULL, NULL, NULL),
	(8, 'Felipe Poppi da Silva', '2024-03-17', '11932709944', '01221000', 'Rua Amaral Gurgel', 'Hotel Grants quarto 422', 'Vila Buarque', 'São Paulo', 'SP', 'JN048362803BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(9, 'Maria de Souza Coelho', '2024-03-19', '71996849261', '40155000', 'Rua Nita Costa', 'Numero 485, sobe a ladeira da padaria apipao vira 2a direita', 'Jardim Apipema', 'Salvador', 'BA', 'JN954498504BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(10, 'Rafael Soares Lopes', '2024-02-23', '55997048028', '98796730', 'Rodovia RS-162', 'Numero 1888, saida para Guarani', 'Auxiliadora', 'Santa Rosa', 'RS', 'JN954498478BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(11, 'Indira Vasconcelos dos Santos', '2024-04-10', '71993242981', '40050450', 'Rua Professor Américo Simas', '101, acima da loja magazine', 'Nazaré', 'Salvador', 'BA', 'JN954498549BR', 'Objeto entregue ao destinatário', NULL, NULL),
	(14, 'Daisy Maria Barreto de Oliveira', '2024-04-25', '71981044828', '41760035', 'Rua Doutor Augusto Lopes Pontes', '455, Ap 303', 'Costa Azul', 'Salvador', 'BA', 'JN954498597BR', 'Objeto entregue ao destinatário', NULL, '2024-05-04 18:34:12'),
	(15, 'Emmanuel Cavalcante da Silva', '2024-04-21', '7996079006', '48180000', 'Rua Honório Borges', '26 ', 'Centro', 'Entre Rios', 'BA', 'JN954498610BR', 'Objeto entregue ao destinatário', NULL, '2024-05-04 18:34:19'),
	(16, 'Jairo de Oliveira Silva', '2024-04-21', '9884697048', '65274000', 'Rua Santa Rita', '13, próximo a Assembleia de Deus', 'Bairro Novo', 'Nova Olinda do Maranhão', 'MA', 'JN954498606BR', 'Objeto postado', NULL, '2024-05-04 18:34:42'),
	(17, 'Rafael Santos Lima', '2024-04-26', '73988326021', '45600445', 'Rua São José', '234, 1º Andar, proximo a igreja adventista e mundo do pallet', 'Mangabinha', 'Itabuna', 'BA', 'JN954498583BR', 'Objeto postado', '2024-05-02 13:39:09', '2024-05-04 20:01:13'),
	(18, 'Evelin Balbino do Nascimento', '2024-04-26', '7199217872', '42829710', 'Rodovia BA-099', 'Lote 01, Quadra 09. Ao lado do Posto F5', 'Arembepe (Abrantes)', 'Camaçari', 'BA', 'JN954498637BR', 'Objeto postado', '2024-05-04 18:38:56', '2024-05-04 18:47:55'),
	(20, 'Nasser Santos Boeri', '2024-04-30', '7181873007', '44470000', 'Estrada de Cacha Prego', 'Condominio Ponta da Ilha, 3ª etapa, 12', 'Cacha Prego', 'Vera Cruz', 'BA', 'JN954498623BR', 'Objeto postado', '2024-05-04 18:46:28', '2024-05-04 19:50:24');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
