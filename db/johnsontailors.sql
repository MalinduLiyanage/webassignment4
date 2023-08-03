DROP DATABASE IF EXISTS johnsontailors;
CREATE DATABASE johnsontailors;
USE johnsontailors;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `User_ID` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone` int(10) NOT NULL,
  PRIMARY KEY (`Phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS cart;
CREATE TABLE `cart` (
  `Phone` int(10) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Date` date DEFAULT NULL,
  `Price` int(7) NOT NULL,
  FOREIGN KEY (`Phone`) REFERENCES `users` (`Phone`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS contacts;
CREATE TABLE `contacts` (
  `Msg_ID` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS discount_users;
CREATE TABLE `discount_users` (
  `Phone` int(10) NOT NULL,
  `Discount_Status` varchar(5) DEFAULT 'True'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`User_ID`, `Name`, `Phone`) VALUES
('64ca75b3aabf8', 'Kasun Perera', 711234567),
('64ca7ae1bbdba', 'Malindu', 717278304),
('64ca775d638ce', 'Hansi Sankalpana', 721122365);

INSERT INTO `cart` (`Phone`, `Item_ID`, `Date`, `Price`) VALUES
(711234567, 'LoungeSuit', '2023-08-02', 15500),
(717278304, 'Cutaway', '2023-08-02', 11000),
(717278304, 'Tuxedo', '2023-08-02', 12000);

INSERT INTO `contacts` (`Msg_ID`, `Name`, `Phone`, `Message`) VALUES
('64ca7546a5e5e', 'Malindu', 717278304, 'Hello johnson');





