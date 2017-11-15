-- 
-- Table structure for table `messages`
-- 

CREATE TABLE `messages` (
  `id` int(11) NOT NULL auto_increment,
  `reciever` varchar(25) NOT NULL default '',
  `sender` varchar(25) NOT NULL default '',
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `recieved` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `messages`
-- 