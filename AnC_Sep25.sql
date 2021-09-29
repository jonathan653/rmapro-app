
--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` varchar(7) NOT NULL,
  `company` varchar(30) NOT NULL,
  `clientPhone` int(30) NOT NULL,
  `clientEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `company`, `clientPhone`, `clientEmail`) VALUES
('Hch1234', 'Hermione Granger', 211111111, 'crookshanks@example.com'),
('rw12345', 'hogwrts', 2133333333, 'hogwarts@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `conditionNumber` varchar(4) NOT NULL,
  `consentNumber` varchar(12) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `conditionDate` date NOT NULL,
  `reminderDate` date NOT NULL,
  `conditionStatus` enum('open','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`conditionNumber`, `consentNumber`, `details`, `conditionDate`, `reminderDate`, `conditionStatus`) VALUES
('C1', 'ANX2341', 'Proposed pitch location must be moved t 500+ meters from any windows to avoid accidents with bludgers.', '2021-10-21', '2021-10-07', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `consent`
--

CREATE TABLE `consent` (
  `consentNumber` varchar(12) NOT NULL,
  `issueDate` date NOT NULL,
  `lapseDate` date NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `consentDoc` blob DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `clientId` varchar(7) NOT NULL,
  `jobNumber` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consent`
--

INSERT INTO `consent` (`consentNumber`, `issueDate`, `lapseDate`, `keywords`, `consentDoc`, `address`, `clientId`, `jobNumber`) VALUES
('ANX2341', '2021-09-08', '2025-09-08', 'quidditch, hedge maze, lake house', NULL, '15 witches terrace', 'Hch1234', '1234'),
('CN1234', '2020-12-03', '2025-12-03', 'potions, transfiguration, magic, witch', '', '15 witches terrace', 'Hch1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `jobNumber` varchar(4) NOT NULL,
  `consultantName` varchar(100) NOT NULL,
  `jobStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`jobNumber`, `consultantName`, `jobStatus`) VALUES
('1234', 'J Chua', ''),
('w123', 'J Chua', '');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`address`) VALUES
('15 witches terrace');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `consultantName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `consultantName`, `email`, `password`) VALUES
(1, 'jonathan', 'J Chua', 'jonathan.chua@postgrad.otago.ac.nz', '12345'),
(2, 'test', '', 'test@test.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'test2', '', 'test2@test.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'hermione', 'Hermione Granger', 'hg@example.com', '9c4c3e6ca167266a15df94a135df576a'),
(5, 'Harry', 'Harry Potter', 'HP@example.com', '657cd4a4013486afe5cee4620e8ab2a0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`conditionNumber`,`consentNumber`),
  ADD KEY `consentNumber` (`consentNumber`);

--
-- Indexes for table `consent`
--
ALTER TABLE `consent`
  ADD PRIMARY KEY (`consentNumber`),
  ADD KEY `address` (`address`),
  ADD KEY `clientId` (`clientId`,`jobNumber`),
  ADD KEY `jobNumber` (`jobNumber`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`jobNumber`),
  ADD KEY `consultantName` (`consultantName`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultantName` (`consultantName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conditions`
--
ALTER TABLE `conditions`
  ADD CONSTRAINT `FKconsentNumber` FOREIGN KEY (`consentNumber`) REFERENCES `consent` (`consentNumber`);

--
-- Constraints for table `consent`
--
ALTER TABLE `consent`
  ADD CONSTRAINT `FKaddress` FOREIGN KEY (`address`) REFERENCES `property` (`address`),
  ADD CONSTRAINT `FKclientId` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`),
  ADD CONSTRAINT `FKjobNumber` FOREIGN KEY (`jobNumber`) REFERENCES `job_details` (`jobNumber`);

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `FK_consultantName` FOREIGN KEY (`consultantName`) REFERENCES `users` (`consultantName`);
