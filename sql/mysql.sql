CREATE DATABASE todolist;

USE todolist;

CREATE TABLE `task` 
(
  `task_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `task_details` varchar(1000) NOT NULL,
  `task_time` varchar(255) NOT NULL
)