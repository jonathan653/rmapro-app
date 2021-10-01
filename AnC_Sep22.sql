

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

INSERT INTO `clients` (`clientId`, `company`, `clientPhone`, `clientEmail`) VALUES
('', '', '0', ''),
('01928', 'SHIFT INC', '21', 'shift@example.com'),
('200', 'Sky ', '22200200', 'sky@example.com'),
('212', 'The Simpsons', '22', 'simspons@simpsons.com'),
('33333', 'Homer Simpson', '33', 'homer@simpsons.com'),
('343', 'SHIFT INC', '22', 'shift1@example.com'),
('34556', 'SHIFTY INC', '21234556', 'shifty@example.com'),
('444', 'Shiftyyy', '224444444', 'shiftyyy@example.com'),
('478', 'Homer Simpson', '22478478', 'homer@simpsons.com'),
('565', 'Homer Simpson', '22565565', 'homer@simpsons.com'),
('567', 'SHIFT INC', '22567567', 'shift3@example.com'),
('600', 'That company', '22600600', 'thatcompany@example.com'),
('669', 'SHIFTYY INC', '22', 'shiftyy@example.com'),
('698', 'Homer Simpson', '22698698', 'homer@simpsons.com'),
('700', 'Homer Simpson', '22', 'homer@simpsons.com'),
('778', 'maggie@simpsons.com', '22778778', 'maggie@simpsons.com'),
('888', 'Bart Simpson', '22', 'bart@simpsons.com'),
('889', 'Bart Simpson', '22', 'bart@simpsons.com'),
('999', 'Lisa Simpson', '22', 'lisa@simpsons.com'),
('Hch1234', 'Hermione Granger', '211111111', 'crookshanks@example.com');

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

INSERT INTO `conditions` (`conditionNumber`, `consentNumber`, `details`, `conditionDate`, `reminderDate`, `conditionStatus`) VALUES
('1', '', 'Test summary 1', '0000-00-00', '2021-10-05', ''),
('1', '200', '1', '2021-10-15', '2021-10-11', '”active”'),
('2', '', 'Test summary 2', '2021-10-05', '2021-10-01', ''),
('201', '200', 'def', '2021-10-29', '2021-10-25', '”active”'),
('203', '200', '203', '2021-10-27', '2021-10-25', '”active”'),
('21', '212', 'blah', '2021-09-27', '2021-09-20', '”active”'),
('3', '', 'This condition says this and this and this and this', '2021-10-19', '2021-10-12', ''),
('34', '343', 'Test summary 1', '2021-10-11', '2021-10-07', '”active”'),
('44', '444', 'Test', '2021-09-28', '2021-09-27', '”active”'),
('5', '', 'This condition says this and this and this and this', '2021-11-29', '2021-11-08', ''),
('6', '', 'blah blah blah', '2021-10-07', '2021-10-04', ''),
('600', '600', 'Test summary 600', '2021-10-06', '2021-10-04', '”active”'),
('69', '669', 'This condition says this and this and this and this', '2021-08-19', '2021-08-16', '”active”'),
('7', '', 'blah blah', '2021-10-09', '2021-10-07', '”active”'),
('78', '778', 'blah blah', '2021-08-26', '2021-08-23', '”inactive”'),
('8', '888', 'whatever here', '2021-10-08', '2021-10-04', '”active”'),
('9', '999', 'summary here', '2021-10-07', '2021-10-06', '”active”'),
('99', '999', 'blah blah', '2021-10-08', '2021-10-07', '”active”');

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
('', '0000-00-00', '0000-00-00', '', '', '', '', ''),
('12345678', '2021-09-21', '2026-09-21', 'balcony extension', '', '', '', ''),
('200', '2021-10-15', '2026-10-15', 'test record ', 0x434f4d503337335f636f757273654f75746c696e652832292e706466, '200 Sky Avenue', '200', '200'),
('212', '2021-09-27', '2026-09-27', 'extension boundary', '', '212 Tee Tee Street', '212', '212'),
('234556', '2021-09-22', '2026-09-22', 'swimming pool', '', '', '', ''),
('3333', '2021-09-28', '2026-09-28', 'fencing', '', '', '', ''),
('343', '2021-09-23', '2026-09-23', 'uneven', '', '343 Here Ave', '343', '343'),
('444', '2021-09-28', '2026-09-28', 'extension', '', '444 Here Ave', '444', '444'),
('565', '0000-00-00', '0000-00-00', '', '', '', '565', ''),
('600', '2021-07-24', '2026-07-24', 'test fencing', '', '600 Over There Place', '600', '600'),
('669', '2021-07-08', '2026-07-08', 'extension', '', '669 Over There Road', '669', '669'),
('778', '2021-08-04', '2026-08-04', 'test pool', '', '778 Around Avenue', '778', '778'),
('888', '2021-09-29', '2026-09-29', 'balcony', '', '888 There Place', '888', '888'),
('999', '2021-09-30', '2026-09-30', 'extension', '', '', '', ''),
('CN1234', '2020-12-03', '2025-12-03', 'potions, transfiguration, magic, witch', '', '15 witches terrace', 'Hch1234', '1234');

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

INSERT INTO `job_details` (`jobNumber`, `jobStatus`, `consultantName`) VALUES
('', '”active”', '”conrad-anderson”'),
('0268', '”active”', '”conrad-anderson”'),
('1234', 'open', 'J Chua'),
('200', '”active”', '”conrad-anderson”'),
('212', '”active”', '”conrad-anderson”'),
('2543', '”active”', '”conrad-anderson”'),
('3333', '', ''),
('343', '”active”', '”conrad-anderson”'),
('4232', '”active”', '”conrad-anderson”'),
('444', '”active”', '”conrad-anderson”'),
('4444', '”active”', ''),
('5555', '”active”', '”conrad-anderson”'),
('600', '”active”', '”conrad-anderson”'),
('606', '”active”', '”conrad-anderson”'),
('669', '”active”', '”conrad-anderson”'),
('778', '”inactive”', '”don-anderson”'),
('888', '”active”', '”conrad-anderson”'),
('999', '”active”', '”conrad-anderson”');

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
(''),
('1234 Here Place, This Place'),
('15 witches terrace'),
('200 Sky Avenue'),
('212 Tee Tee Street'),
('22 Here Street, Anywhere'),
('2345 Here Place, This Place'),
('33 Here Street, Anywhere'),
('333 Here Drive, Somewhere'),
('343 Here Ave'),
('444 Here Ave'),
('45 George St'),
('600 Over There Place'),
('666 There Avenue'),
('669 Over There Road'),
('778 Around Avenue'),
('888 There Place'),
('999 Here Ave');

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
COMMIT;

