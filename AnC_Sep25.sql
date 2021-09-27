
--
-- Database: `AnC_Sep25`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` varchar(7) NOT NULL,
  `company` varchar(30) NOT NULL,
  `clientPhone` int(30) NOT NULL,
  `clientEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `consent`
--

CREATE TABLE `consent` (
  `consentNumber` varchar(12) NOT NULL,
  `issueDate` date NOT NULL,
  `lapseDate` date NOT NULL,
  `keywords` varchar(200),
  `consentDoc` blob,
  `address` varchar(300) NOT NULL,
  `clientId` varchar(7) NOT NULL,
  `jobNumber` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `jobNumber` varchar(4) NOT NULL,
  `jobStatus` enum('open','closed') NOT NULL,
  `consultantName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'jonathan', 'J chua', 'jonathan.chua@postgrad.otago.ac.nz', '12345'),
(2, 'test', '', 'test@test.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'test2', '', 'test2@test.com', '827ccb0eea8a706c4c34a16891f84e7b');

INSERT INTO `clients` (`clientId`, `company`, `clientPhone`, `clientEmail`) VALUES
(`Hch1`, `Hermione Granger`, `0211111111`, `crookshanks@example.com`);

INSERT INTO `job_details` (`jobNumber`, `jobStatus`, `consultantName`) VALUES
(`1234`, `open`, `J Chua`);

INSERT INTO `property` (`address`) VALUES
(`15 witches terrace`);

INSERT INTO `consent` (`consentNumber`, `issueDate`, `lapseDate`, `keywords`, `consentDoc`, `address`, `clientId`, `jobNumber`) VALUES
(`CN1234`, `12-03-2020`, `12-03-2025`, `potions, transfiguration, magic, witch`, ``, `15 witches terrace`, `Hch1`, `1234`);
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
