

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` varchar(7) NOT NULL,
  `company` varchar(30) NOT NULL,
  `clientPhone` varchar(20) NOT NULL,
  `clientEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--


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
  `conditionStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conditions`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `jobNumber` varchar(4) NOT NULL,
  `jobStatus` varchar(10) NOT NULL,
  `consultantName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_details`
--


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
  ADD CONSTRAINT `FKclientId` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`),
  ADD CONSTRAINT `FKjobNumber` FOREIGN KEY (`jobNumber`) REFERENCES `job_details` (`jobNumber`);

