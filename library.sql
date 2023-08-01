CREATE database library;
use library;
CREATE TABLE `admin` (
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `books` (
  `bid` varchar(25) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `bauthor` varchar(25) NOT NULL,
  `Copies` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `issue` (
  `Sid` varchar(25) NOT NULL,
  `Bid` varchar(25) NOT NULL,
  `current_date` date NOT NULL,
  `Last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `issue_request` (
  `Sid` varchar(25) NOT NULL,
  `Bid` varchar(25) NOT NULL,
  `admin_response` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `recommend` (
  `bname` varchar(25) NOT NULL,
  `bauthor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `register` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `Id` varchar(25) NOT NULL,
  `Branch` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `renew_request` (
  `Sid` varchar(25) NOT NULL,
  `Bid` varchar(25) NOT NULL,
  `admin_response` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `return_request` (
  `Sid` varchar(25) NOT NULL,
  `Bid` varchar(25) NOT NULL,
  `admin_response` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);
  ALTER TABLE `issue`
  ADD PRIMARY KEY (`Sid`,`Bid`),
  ADD KEY `Bid` (`Bid`);
ALTER TABLE `issue_request`
  ADD PRIMARY KEY (`Sid`,`Bid`),
  ADD KEY `Bid` (`Bid`);
 ALTER TABLE `recommend`
  ADD PRIMARY KEY (`bname`,`bauthor`);
  ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);
  ALTER TABLE `renew_request`
  ADD PRIMARY KEY (`Sid`,`Bid`),
  ADD KEY `Bid` (`Bid`);
  ALTER TABLE `return_request`
  ADD PRIMARY KEY (`Sid`,`Bid`),
  ADD KEY `return_request_ibfk_2` (`Bid`);
  ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `register` (`Id`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`Bid`) REFERENCES `books` (`bid`);
  ALTER TABLE `issue_request`
  ADD CONSTRAINT `issue_request_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `register` (`Id`),
  ADD CONSTRAINT `issue_request_ibfk_2` FOREIGN KEY (`Bid`) REFERENCES `books` (`bid`);
ALTER TABLE `renew_request`
  ADD CONSTRAINT `renew_request_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `register` (`Id`),
  ADD CONSTRAINT `renew_request_ibfk_2` FOREIGN KEY (`Bid`) REFERENCES `books` (`bid`);
ALTER TABLE `return_request`
  ADD CONSTRAINT `return_request_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `register` (`Id`),
  ADD CONSTRAINT `return_request_ibfk_2` FOREIGN KEY (`Bid`) REFERENCES `books` (`bid`);
COMMIT;
INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin');