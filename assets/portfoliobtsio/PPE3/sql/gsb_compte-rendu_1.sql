-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Avril 2018 à 12:16
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_compte-rendu`
--

-- ---------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

CREATE TABLE `rapport_medicament` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(50) NOT NULL,
  `OFF_QTE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rapport_visite`
--

-- --------------------------------------------------------

--
-- Index pour la table `rapport_medicament`
--
ALTER TABLE `rapport_medicament`
  ADD PRIMARY KEY (`VIS_MATRICULE`,`RAP_NUM`),
  ADD KEY `VIS_MATRICULE` (`VIS_MATRICULE`);
