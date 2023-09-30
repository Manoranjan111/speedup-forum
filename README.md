# speedup-forum Application by Manoranjan Kumar

## Introduction

Welcome to the README file for the Forum Web Application by Manoranjan Kumar. This document provides an overview of the code and its functionality.

## Project Description

This project is a web-based forum application built using PHP and Bootstrap. It allows users to view and interact with forum topics, and it includes features such as:

- Displaying a list of forum topics.
- Sorting topics by latest, new, unread, and bookmarks.
- Adding new topics (if logged in).
- Viewing topic details, including replies, views, and activity timestamps.

The code is designed to provide a user-friendly forum experience and includes a responsive, sticky navigation bar for easy navigation.

## Code Structure

The codebase is organized as follows:

- `index.php`: The main web page that displays the forum topics and includes the navigation bar.
- `partials/_header.php`: Header component for the website.
- `partials/_dbconnect.php`: PHP script for connecting to the database.
- `partials/_addTopicModal.php`: Modal for adding new forum topics.
- `partials/_footer.php`: Footer component (commented out).

## Screenshorts
  

<img width="960" alt="Screenshot 2023-09-30 124812" src="https://github.com/Manoranjan111/speedup-forum/assets/95931051/c32d7f5d-20a8-48f7-a6ce-aeec0b919198">


<img width="943" alt="Screenshot 2023-09-30 124850" src="https://github.com/Manoranjan111/speedup-forum/assets/95931051/aec9956e-f5c3-40d0-8ed9-369774a614fd">


<img width="956" alt="Screenshot 2023-09-30 124926" src="https://github.com/Manoranjan111/speedup-forum/assets/95931051/d14b57a5-9b4b-4371-b072-b0363d734ab1">


## Getting Started

To run this forum web application locally, follow these steps:

1. Set up a web server (e.g., Apache) and a database server (e.g., MySQL).
2. database schema: 
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `speedup_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ids` int(5) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `thread_id` int(5) NOT NULL,
  `comment_by` varchar(100) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(5) NOT NULL,
  `login_name` text NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_content`
--

CREATE TABLE `main_content` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `category_description` longtext NOT NULL,
  `replies` varchar(50) NOT NULL DEFAULT '1',
  `views` varchar(50) NOT NULL DEFAULT '1',
  `image` mediumblob NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `thread_title` varchar(100) NOT NULL,
  `thread_desc` varchar(255) NOT NULL,
  `thread_category_id` int(5) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


3. Configure the database connection settings in `partials/_dbconnect.php`.
4. Place the project files in the web server's document root directory.
5. Access the web application through your web server's URL.

## Usage

- Visit the web application URL to view the forum topics.
- Use the navigation tabs to filter topics by different criteria.
- If logged in, you can click the "Add Topic" button to create a new forum topic.
- Click on a topic to view its details.

## Customization

You can customize the appearance and behavior of the forum by modifying the CSS styles and adding new features to the PHP code. Feel free to tailor this code to your specific requirements.

## Contact Me

If you have any questions or need assistance with this forum web application, please feel free to reach out to me via email at [manoranjankumar8051@gmail.com](mailto:manoranjankumar8051@gmail.com).

Thank you for exploring the Forum Web Application by Manoranjan Kumar!

