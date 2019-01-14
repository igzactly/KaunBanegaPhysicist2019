-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 12:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaun_banega_physicist`
--
CREATE DATABASE IF NOT EXISTS `kaun_banega_physicist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kaun_banega_physicist`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(4) NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Santosh', 'vesphysics');

-- --------------------------------------------------------

--
-- Table structure for table `flipped_quest`
--

CREATE TABLE `flipped_quest` (
  `quest_id` int(3) NOT NULL,
  `quest_name` text,
  `option_1` text,
  `option_2` text,
  `option_3` text,
  `option_4` text,
  `correct` text,
  `score` int(4) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flipped_quest`
--

INSERT INTO `flipped_quest` (`quest_id`, `quest_name`, `option_1`, `option_2`, `option_3`, `option_4`, `correct`, `score`, `flag`) VALUES
(1, 'Ultraviolet light lies in the range of', '10 – 300 nm', '10 – 400 nm', '100 – 300 n', '100 – 400 nm', '10 – 400 nm', 10, 0),
(2, 'Einstein got Nobel prize for', 'Photoelectric effect', 'Brownian Motion', 'Theory of relativity', 'Bose-Einstein statisticq', 'Photoelectric effect', 10, 0),
(3, 'Who is known to break the atom first?', 'Rutherford', 'Neils Bohr', 'J J Thomson', 'Schrodinger', 'J J Thomson', 10, 0),
(4, 'In an elastic collision ?', 'Both kinetic energy and momentum are conserved', 'Only momentum is conserved', 'Only kinetic energy is conserved', 'None of them is conserved', 'Both kinetic energy and momentum are conserved', 25, 0),
(5, 'If the Earth\'s mass increases by 100 %, the weight of an n  object on its  surface would be', 'Halved', 'Quadrapled', 'Doubled', 'No change', 'Doubled', 10, 0),
(6, 'Raman effect is based on __________ of light.', 'Polarisation', 'Scattering', 'Diffraction', 'Absorption', 'Scattering', 5, 0),
(7, 'Atomic spectra is an example of', 'Continuous spectra', 'Band spectra', 'Line spectra', 'Both a and b', 'Line spectra', 10, 0),
(8, 'Who had formulated theory of relativity prior to Einstein?', 'Archimedes', 'Kepler', 'Galileo', 'Aristotle', 'Galileo', 15, 0),
(9, 'As per Newtons law of gravitation, the gravitational force between two bodies is proportional to ___ power of mass of each body and ___ power of the distance  between them .', '1, -2', '1, 2', '2, 1', '2, -1', '1, -2', 10, 0),
(10, 'In quantum mechanics, |psi| squared represents   which of these?', 'negative density', 'eigen energy', 'probability density', 'wave-function', 'probability density', 25, 0),
(11, 'Which concept did Einstein banish from physics?', 'Photoelectric effect', 'The ether', 'Black body radiation', 'Electromagnetic induction', 'The ether', 30, 0),
(12, 'Which material has magnetic susceptibility equal to -1?', 'Metallic', 'Paramagnetic', 'Superconductor', 'Semiconductor', 'Superconductor', 35, 0),
(13, 'Planck\'s constant has the dimensions of', 'Energy', 'Force', 'Angular Momentum', 'Momentumn', 'Angular Momentum', 40, 0),
(14, 'The solution of the differential equation  (dy/dx)-y=0 is', 'y = x', 'y = e^x', 'y = -x', 'y = e^(-x)', 'y = e^x', 45, 0),
(15, 'It is impossible for waves to diffract when', 'The slit width is less than the wavelength', 'The slit width is greater than the wavelength', 'The slit width is equal the wavelength', 'The waves are longitudinal regardless of the slit width', 'The slit width is less than the wavelength', 40, 0),
(16, 'Who among these physicists have received the Nobel prize in Physics?', 'Homi Bhabha', 'G.N. Ramchandran', 'S.N. Bose', 'S. Chandrashekar', 'S. Chandrashekar', 5, 0),
(17, 'With increasing quantum number the energy difference between adjacent levels in atoms', 'Decreases', 'Increases', 'Remain constant', 'Becomes zero', 'Decreases', 10, 0),
(18, 'Einstein was awarded Nobel prize for his work in', 'Special theory of relativity', 'General theory of relativity', 'Photoelectric effect', 'Brownian motion', 'Photoelectric effect', 15, 0),
(19, 'Which of these is an ideal engine?', 'Otto engine', 'Diesel engine', 'Steam engine', 'Carnot engine', 'Carnot engine', 20, 0),
(20, 'How many Bravais lattices exist in three dimensions?', '7', '16', '10', '14', '14', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_data`
--

CREATE TABLE `question_data` (
  `quest_id` int(3) NOT NULL,
  `set_id` int(3) DEFAULT NULL,
  `quest_name` text,
  `option_1` text,
  `option_2` text,
  `option_3` text,
  `option_4` text,
  `correct` text,
  `score` int(4) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_data`
--

INSERT INTO `question_data` (`quest_id`, `set_id`, `quest_name`, `option_1`, `option_2`, `option_3`, `option_4`, `correct`, `score`, `flag`) VALUES
(1, 1, 'Ultraviolet light lies in the range of ', '10 – 300 nm', '10 – 400 nm', '100 – 300 n', '100 – 400 nm', '10 – 400 nm', 10, 0),
(2, 1, 'Einstein got Nobel prize for', 'Photoelectric effect', 'Brownian Motion', 'Theory of relativity', 'Bose-Einstein statistics', 'Photoelectric effect', 10, 0),
(3, 1, 'Who is known to break the atom first?', 'Rutherford', 'Neils Bohr', 'J J Thomson', 'Schrodinger', 'J J Thomson', 10, 0),
(4, 1, 'In an elastic collision', 'Both kinetic energy and momentum are conserved', 'Only momentum is conserved', 'Only kinetic energy is conserved', 'None of them is conserved', 'Both kinetic energy and momentum are conserved', 25, 0),
(5, 1, 'If the Earth\'s mass increases by 100 %, the weight of an n  object on its  surface would be', 'Halved', 'Quadrapled', 'Doubled', 'No change', 'Doubled', 10, 0),
(6, 1, 'Raman effect is based on __________ of light.', 'Polarisation', 'Scattering', 'Diffraction', 'Absorption', 'Scattering', 5, 0),
(7, 1, 'Atomic spectra is an example of', 'Continuous spectra', 'Band spectra', 'Line spectra', 'Both a and b', 'Line spectra', 10, 0),
(8, 1, 'Who had formulated theory of relativity prior to Einstein?', 'Archimedes', 'Kepler', 'Galileo', 'Aristotle', 'Galileo', 15, 0),
(9, 1, 'As per Newtons law of gravitation, the gravitational force between two bodies is proportional to ___ power of mass of each body and ___ power of the distance  between them .', '1, -2', '1, 2', '2, 1', '2, -1', '1, -2', 10, 0),
(10, 1, 'In quantum mechanics, |psi| squared represents   which of these?', 'negative density', 'eigen energy', 'probability density', 'wave-function', 'probability density', 25, 0),
(11, 1, 'Which concept did Einstein banish from physics?', 'Photoelectric effect', 'The ether', 'Black body radiation', 'Electromagnetic induction', 'The ether', 30, 0),
(12, 1, 'Which material has magnetic susceptibility equal to -1?', 'Metallic', 'Paramagnetic', 'Superconductor', 'Semiconductor', 'Superconductor', 35, 0),
(13, 1, 'Planck\'s constant has the dimensions of', 'Energy', 'Force', 'Angular Momentum', 'Momentumn', 'Angular Momentum', 40, 0),
(14, 1, 'The solution of the differential equation  (dy/dx)-y=0 is', 'y = x', 'y = e^x', 'y = -x', 'y = e^(-x)', 'y = e^x', 45, 0),
(15, 1, 'It is impossible for waves to diffract when', 'The slit width is less than the wavelength', 'The slit width is greater than the wavelength', 'The slit width is equal the wavelength', 'The waves are longitudinal regardless of the slit width', 'The slit width is less than the wavelength', 40, 0),
(16, 1, 'Who among these physicists have received the Nobel prize in Physics?', 'Homi Bhabha', 'G.N. Ramchandran', 'S.N. Bose', 'S. Chandrashekar', 'S. Chandrashekar', 5, 0),
(17, 1, 'With increasing quantum number the energy difference between adjacent levels in atoms', 'Decreases', 'Increases', 'Remain constant', 'Becomes zero', 'Decreases', 10, 0),
(18, 1, 'Einstein was awarded Nobel prize for his work in', 'Special theory of relativity', 'General theory of relativity', 'Photoelectric effect', 'Brownian motion', 'Photoelectric effect', 15, 0),
(19, 1, 'Which of these is an ideal engine?', 'Otto engine', 'Diesel engine', 'Steam engine', 'Carnot engine', 'Carnot engine', 20, 0),
(20, 1, 'How many Bravais lattices exist in three dimensions?', '7', '16', '10', '14', '14', 25, 0),
(21, 1, 'A monkey of mass 18 kg on earth is sent in a spaceship moving with a velocity 0.8c wrt earth. Its mass wrt an earth observer is', '18 kg', '30 kg', '10.8 kg', '6.48 kg', '30 kg', 30, 0),
(22, 1, 'The effective number of lattice points', '1', '4', '2', '8', '2', 35, 0),
(23, 1, 'The average binding energy per nucleon for a nucleus is', '8 KeV', '8 MeV', '80 KeV', '80 MeV', '8 MeV', 5, 0),
(24, 1, 'A boy travels 6 m towards east and turns north and travels distance 8 m. What is a distance of boy from starting point.', '14 m', '2 m', '48 m', '10 m', '10 m', 45, 0),
(25, 1, 'Which of the wave behavior is not possible for longitudinal waves?', 'Reflection', 'Polarisation', 'Diffraction', 'Refraction', 'Polarisation', 50, 0),
(26, 1, 'The concept of atom was put forward by', 'Kanada', 'Bhaskaracharya', 'Chanakya', 'Aryabhatta', 'Kanada', 5, 0),
(27, 1, 'An electron can never be found inside a nucleus this statement is according to', 'Bernoulli\'s equation', 'Bohr’s model of atom', 'Heisenberg uncertainty principle ', 'Both A and C', 'Heisenberg uncertainty principle', 10, 0),
(28, 1, 'When Einstein worked on his great papers in 1905, his profession was', 'Engineer', 'Doctor', 'Patent Officer', 'Professor', 'Patent Officer', 15, 0),
(29, 1, 'Young\'s modulus of elasticity Y is given by longitudinal stress/longitudinal strain within elastic limits. If the force exerted to stretch a steel bar is doubled, the value of Y', 'Increases', 'Cannot be determined', 'Decreases', 'Remains constant', 'Remains constant', 20, 0),
(30, 1, 'Which of these statements is not true about diffraction?', 'Sine of angle of diffraction is proportional to wavelength', 'There is a limit to number of diffraction orders', 'Diffraction orders have to be a whole number', 'Only electromagnetic waves can be diffracted', 'Only electromagnetic waves can be diffracted', 50, 0),
(31, 1, 'An electron is in 3P^2 state, then its principal quantum number n=......', '0', '1', '2', '3', '3', 25, 0),
(32, 1, 'A spaceship of rest length 100m is moving with a velocity  of 0.6c  w.r.t. earth. Its length wrt earth observer is', '100 m', '80 m', '125 m', '0', '80 m', 30, 0),
(33, 1, 'The discoverer of proton is', 'Thomson', 'Rutherford', 'Bohr', 'Chadwick', 'Rutherford', 5, 0),
(34, 1, 'The rest  mass of the photon is', 'Zero', 'Infinity', 'Depends on its wavelength', '1.6x10^(-24) kg', 'Zero', 10, 0),
(35, 1, 'Radiocarbon is produced in the atmosphere as a result of', 'collision between fast neutrons and nitrogen nuclei', 'Action of ultraviolet light from the sun on oxygen', 'Action of cosmic rays on carbon dioxide', 'Lightning discharge in atmosphere', 'collision between fast neutrons and nitrogen nuclei', 15, 0),
(36, 1, 'The viscosity of a fluid depends on its', 'Velocity of flow', 'Temperature', 'Density', 'Volume', 'Temperature', 20, 0),
(37, 1, 'Every elementary particle entity exhibits the properties of not only particles, but also waves is known as', 'The wave particle sigularity', 'The wave particle duality', 'The wave particle triality', 'The wave particle infinality', 'The wave particle duality', 25, 0),
(38, 1, 'Neel sleeps for 2 hours in  the train according to his friend Bill in the train which is moving with a speed 0.9c wrt platform. His other friend Sumit is on the platform  and according to him Neel slept for', '2 hours', '0.63 hours', '4.55 hours', '0.88 hours', '4.55 hours', 30, 0),
(39, 1, 'A Cooper Pair in superconductor is system of two electrons formed by electron -    ________ interaction', 'Photon', 'Phonon', 'Proton', 'Neutron', 'Phonon', 35, 0),
(40, 1, 'In which of the following nuclear process, does the element not change?', 'Alpha – decay', 'Beta decay', 'Gamma decay', 'Positron emmission', 'Gamma decay', 40, 0),
(46, 1, 'Question1', 'Option1', 'Option2', 'Option3', 'Option4', 'Option1', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE `question_set` (
  `set_id` int(3) NOT NULL,
  `set_name` char(1) DEFAULT NULL,
  `no_of_quest` int(4) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_set`
--

INSERT INTO `question_set` (`set_id`, `set_name`, `no_of_quest`, `flag`) VALUES
(1, 'A', 10, 0),
(2, 'B', 10, 0),
(3, 'C', 10, 0),
(4, 'D', 10, 0),
(9, 'E', 5, 0),
(10, 'F', 10, 0),
(11, 'G', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_data`
--

CREATE TABLE `team_data` (
  `team_name` varchar(30) DEFAULT NULL,
  `team_id` int(30) NOT NULL,
  `score` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_data`
--

INSERT INTO `team_data` (`team_name`, `team_id`, `score`) VALUES
('Sommerfield', 754, NULL),
('Debye', 753, NULL),
('Lande', 752, NULL),
('Born', 751, NULL),
('Sommerfield', 750, NULL),
('Born', 749, NULL),
('Debye', 748, NULL),
('Born', 747, NULL),
('Born', 746, NULL),
('Born', 745, NULL),
('Debye', 744, NULL),
('Lande', 743, NULL),
('Born', 742, NULL),
('Debye', 741, NULL),
('Lande', 740, NULL),
('Lande', 739, NULL),
('Born', 738, NULL),
('Born', 737, NULL),
('Born', 736, NULL),
('Born', 735, NULL),
('Lande', 734, NULL),
('Born', 733, NULL),
('Born', 732, NULL),
('Born', 731, NULL),
('Born', 730, NULL),
('Lande', 729, NULL),
('Born', 728, NULL),
('Born', 727, NULL),
('Born', 726, NULL),
('Born', 725, NULL),
('Debye', 724, NULL),
('Bohm', 723, NULL),
('Debye', 722, NULL),
('Bardeen', 721, NULL),
('Bardeen', 720, NULL),
('Bardeen', 719, NULL),
('Born', 718, NULL),
('Born', 717, NULL),
('Bohm', 716, NULL),
('Sommerfield', 715, NULL),
('Debye', 714, NULL),
('Lande', 713, NULL),
('Born', 712, NULL),
('Debye', 711, NULL),
('Lande', 710, NULL),
('Born', 709, NULL),
('Born', 708, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `flipped_quest`
--
ALTER TABLE `flipped_quest`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `question_data`
--
ALTER TABLE `question_data`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `question_set`
--
ALTER TABLE `question_set`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `team_data`
--
ALTER TABLE `team_data`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flipped_quest`
--
ALTER TABLE `flipped_quest`
  MODIFY `quest_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `question_data`
--
ALTER TABLE `question_data`
  MODIFY `quest_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `question_set`
--
ALTER TABLE `question_set`
  MODIFY `set_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_data`
--
ALTER TABLE `team_data`
  MODIFY `team_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=755;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
