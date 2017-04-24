-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 09:09 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobra`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `player_id` int(11) NOT NULL,
  `gamer_tag` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `current_room` varchar(5) NOT NULL DEFAULT 'rm_01',
  `hp` int(4) NOT NULL DEFAULT '100',
  `money` int(11) NOT NULL,
  `weapon` varchar(5) NOT NULL DEFAULT 'none',
  `head` varchar(5) NOT NULL DEFAULT 'none',
  `chest` varchar(5) NOT NULL DEFAULT 'none',
  `hands` varchar(5) NOT NULL DEFAULT 'none',
  `legs` varchar(5) NOT NULL DEFAULT 'none',
  `ci_array` varchar(20) NOT NULL DEFAULT '0,0,0,0,0,0,0,0',
  `pi_array` varchar(128) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `hi_array` varchar(32) NOT NULL DEFAULT '0,0',
  `rm_array` varchar(64) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `dracula` varchar(1) NOT NULL DEFAULT '0',
  `moves` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`player_id`, `gamer_tag`, `email`, `password`, `current_room`, `hp`, `money`, `weapon`, `head`, `chest`, `hands`, `legs`, `ci_array`, `pi_array`, `hi_array`, `rm_array`, `dracula`, `moves`) VALUES
(1, 'test', 'trip.soucie@tciwireless.com', '123', 'rm_01', 100, 0, 'none', 'none', 'none', 'none', 'none', '0,0,0,0,0,0,0,0', '10', '2', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0', '0'),
(2, 'Venom H3', 'venomh3@hotmail.com', '1234', 'rm_08', 100, 0, 'none', 'none', 'none', 'none', 'none', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0,0', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `cmd` varchar(1024) NOT NULL,
  `image` varchar(64) NOT NULL,
  `do` int(11) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `attk` varchar(16) NOT NULL,
  `dattk` varchar(16) NOT NULL,
  `def` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `cmd`, `image`, `do`, `hp`, `attk`, `dattk`, `def`) VALUES
('ci_01', 'Holy Water', 'A small glass vial in the shape of a cross containing holy water.', 'cmd', 'image', 0, '', '', '', ''),
('ci_02', 'Vial of Scales', 'A small glass vial containing blue scales.', 'cmd', 'image', 0, '', '', '', ''),
('ci_03', 'Red Silk Rose', 'A long silk red rose.', 'cmd', 'image', 0, '', '', '', ''),
('ci_04', 'Draculas Blood', 'Crimson red, flowy, and still luke warm. It smells metalic!  ', 'cmd', 'image', 0, '', '', '', ''),
('ci_05', 'Flask', 'A stainless steal flask with mirror finish.', 'cmd', 'image', 0, '', '', '', ''),
('ci_06', 'Black Gem', 'A black gem that fits perfectly in the palm of your hand.', 'cmd', 'image', 0, '', '', '', ''),
('ci_07', 'Mortar and Pestle', 'A stainless steel mortar and pestle with grey marble finish. ', 'cmd', 'image', 0, '', '', '', ''),
('hi_01', 'Cookie', 'Fresh, warm cookies that can recover your health.', 'cmd', 'image', 0, '20', '', '', ''),
('hi_02', 'Cheese and Crackers', 'Cheese and crackers. Finally some snacks.', 'cmd', 'image', 0, '', '', '', ''),
('it_11', 'Hint Token', 'Hint tokens. Very useful in providing clues to solving a puzzles.', 'cmd', 'image', 0, '', '', '', ''),
('it_12', 'Monster Coin', 'An antique monster coin. What a beauty.', 'cmd', 'image', 0, '5', '', '', ''),
('pi_01', 'Messenger Bag', 'A vintage messenger bag with a max capacity of 15 items.', 'cmd', 'image', 0, '', '', '', ''),
('pi_02', 'Spare Key', 'A spare key attached to a large gold key ring.', 'cmd', 'image', 0, '', '', '', ''),
('pi_03', 'Book', 'A hard cover book titled "The Cure to Transitioning". It is the missing book!', 'cmd', 'image', 0, '', '', '', ''),
('pi_04', 'Cleaver', 'A cleaver- SCREECH SCREECH SCREECH SCREECH SCREECH', 'cmd', 'image', 0, '', '2', '', ''),
('pi_05', 'Hook', 'Captain Backbeards hook.', 'cmd', 'image', 0, '', '4', '', ''),
('pi_06', 'Swiss Knife', 'A swiss knife used to cut the cheese', 'cmd', 'image', 0, '', '1', '', ''),
('pi_07', 'Newspaper', 'Large newspaper all rolled up together. Stories about defeating vampires are in the palm of your hand.', 'cmd', 'image', 0, '', '5', '', ''),
('pi_08', 'Extra-Long Wooden Stake', 'Some would just call it a "wooden-sword". Looks whos still fighting vampires!', 'cmd', 'image', 0, '', '2', '20', ''),
('pi_09', 'Garlic', 'A garlic so strong, its smell is making you tear up. A rather unusual weapon for fighting vampires!', 'cmd', 'image', 0, '', '2', '10', ''),
('pi_10', 'Crossbow', 'The highest quality crossbow youve ever seen. It was made by the werewolf merchant himself! The arrows are made of Extra-Long Wooden Stake.', 'cmd', 'image', 0, '', '8', '25', ''),
('pi_11', 'Leather Boots', 'Black leather boots that provides protection. Great for mosh pits.', 'cmd', 'image', 0, '', '', '', '2'),
('pi_12', 'Leather Jacket', 'A thick leather jacket that provides protection, complete with patches from asserted mosh pits', 'cmd', 'image', 0, '', '', '', '3'),
('pi_13', 'Scarf', 'A cosy winter scarf. It doesnt provide much protection, but it keeps the cold away.', 'cmd', 'image', 0, '', '', '', '1'),
('pi_14', 'Knight Helm', 'A sturdy, silver knight helm that provides protection', 'cmd', 'image', 0, '', '', '', '5'),
('pi_15', 'Bullet Proof Vest', 'A bullet proof vest perfect for a stroll in the bad part of town!', 'cmd', 'image', 0, '', '', '', '4'),
('pi_16', 'Red Hat', 'A red hat stainedeth with the blood of thy enemies', 'cmd', 'image', 0, '', '', '', '1'),
('pi_17', 'Gloves of the Pugilist', 'The gloves of the pugilist. Warm, waterproof, soft, unique, and it comes in a pair!', 'cmd', 'image', 0, '', '', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `monsters`
--

CREATE TABLE `monsters` (
  `monster_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `img` varchar(16) NOT NULL,
  `cmd` varchar(1024) NOT NULL,
  `hp` int(4) NOT NULL,
  `attack` int(4) NOT NULL,
  `item` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monsters`
--

INSERT INTO `monsters` (`monster_id`, `name`, `description`, `img`, `cmd`, `hp`, `attack`, `item`) VALUES
('mn_01', 'Crusty Box', 'It looks like a regular cardboard box painted like a treasure chest. In fact, it’s really a monster disguised as a cardboard box painted like a treasure chest. Watch out for its lid! Don’t get a papercut!', '', '', 10, 2, ''),
('mn_02', 'Swarm of Bats', 'Anyone else love fighting bats in video games? Me neither.', '', '', 15, 4, ''),
('mn_03', 'Skeleton', 'A skeleton who knew that, in order to be big and strong when it grew up, it needed to drink plenty of milk. All that calcium has finally paid off!', '', '', 15, 4, ''),
('mn_04', 'Boogeyman', 'One thing is for sure: he is not coming from your closet or from under your bed. To face your fears, you must not hide. Enjoys playing Cheese & Crackers.', '', '', 20, 6, 'hi_01'),
('mn_05', 'Zombie', 'That boy Carl just does not listen, does he?', '', '', 20, 6, ''),
('mn_06', 'Captain Backbear', 'Don’t let his clean-shaven face fool you. He has grown out the hair on his back and braided it! So majestic. It makes you weep in envy and cringe in horror. Shave and a haircut: two bits walk the plank!', '', '', 25, 8, 'pi_05'),
('mn_07', 'Floating Bedshee', 'A poltergeist that thinks it is a ghost.', '', '', 25, 8, 'pi_13'),
('mn_08', 'Frankenstein', 'He is the pedantic type who likes to correct people when they get his name wrong.', '', '', 35, 9, ''),
('mn_09', 'Count Dracula', 'this is a description of the first room', '', '', 100, 30, 'ci_04');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `secondary` varchar(4096) NOT NULL,
  `img` varchar(16) NOT NULL,
  `cmds` varchar(2048) NOT NULL,
  `doors` varchar(512) NOT NULL,
  `monster` varchar(5) NOT NULL,
  `item` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `description`, `secondary`, `img`, `cmds`, `doors`, `monster`, `item`) VALUES
('rm_01', 'Attic Bedroom', 'This room is covered in dust. You look at the bed you woke up on and shiver. It’s disgusting, covered in mold and filth. There is a vanity on the opposite wall with a missing mirror. The mirror itself lies shattered on the floor around the vanity.', 'This room is covered in dust. You look at the bed you woke up on and shiver. It’s disgusting, covered in mold and filth. There is a vanity on the opposite wall with a missing mirror. The mirror itself lies shattered on the floor around the vanity.', 'F4R1.png', 'cmd', 'room_id=''rm_02''', '', 'item_id=''pi_01'' OR item_id=''pi_02'''),
('rm_02', 'Attic Hallway', 'You walk down the hallway and notice the big hole in the wall to the outside. You assume you are in the attic based on the height.', 'You walk down the hallway and notice the big hole in the wall to the outside. You assume you are in the attic based on the height.', 'F4R2.png', 'cmd', 'room_id=''rm_01'' OR room_id=''rm_03''', '', ''),
('rm_03', 'Lounge', 'This room is really nice. Warm wood paneling covers the walls and chairs dot the floor space. Next to the chairs are little tables with ashtrays sitting upon them containing old ashes and cigar butts. There is a small beverage station on one wall with broken decanters and whisky glasses.', 'This room is really nice. Warm wood paneling covers the walls and chairs dot the floor space. Next to the chairs are little tables with ashtrays sitting upon them containing old ashes and cigar butts. There is a small beverage station on one wall with broken decanters and whisky glasses.', 'F4R3.png', 'cmd', 'room_id=''rm_07'' OR room_id=''rm_02''', 'mn_01', 'item_id=''ci_06'''),
('rm_04', 'F3 Bedroom', 'This bedroom is pretty small. A twin bed is up against the wall in the corner accompanied by a small nightstand with a small lamp atop it. There isn''t even a true closet, just a worn down dresser.', 'This bedroom is pretty small. A twin bed is up against the wall in the corner accompanied by a small nightstand with a small lamp atop it. There isn''t even a true closet, just a worn down dresser.', 'F3R1.png', 'cmd', 'room_id=''rm_05'' OR room_id=''rm_06', 'mn_03', 'item_id=''pi_03'''),
('rm_05', 'F3 Bathroom', 'A pretty typical bathroom. A toilet, a sink and a combination bathtub/shower are the only features in this rather standard room.', 'A pretty typical bathroom. A toilet, a sink and a combination bathtub/shower are the only features in this rather standard room.', 'F3R2.png', 'cmd', 'room_id=''rm_04''', 'mn_02', ''),
('rm_06', 'Library', 'This room is filled to the brim with books. They cover the shelves that basically make up the walls. There are so many books that piles and piles of them can be seen scattered across the floor and on the reading tables laying around. You skim the shelves and notice that whoever collected these books had eclectic taste. You find everything from Dr. Seuss to advanced particle physics and every subject in between.', 'This room is filled to the brim with books. They cover the shelves that basically make up the walls. There are so many books that piles and piles of them can be seen scattered across the floor and on the reading tables laying around. You skim the shelves and notice that whoever collected these books had eclectic taste. You find everything from Dr. Seuss to advanced particle physics and every subject in between.', 'F3R3.png', 'cmd', 'room_id=''rm_10'' OR room_id=''rm_07'' OR room_id=''rm_08'' OR room_id=''rm_04''', '', ''),
('rm_07', 'Study', 'A heavy wooden desk is the first thing you notice when you walk into this room. It has a small reading lamp and miscellaneous desk supplies scattered on top of it. Behind the desk is an oversized leather desk chair and behind that is a large window. The other two walls are more bookshelves filled with what seem to be the rare and collectable books.', 'A heavy wooden desk is the first thing you notice when you walk into this room. It has a small reading lamp and miscellaneous desk supplies scattered on top of it. Behind the desk is an oversized leather desk chair and behind that is a large window. The other two walls are more bookshelves filled with what seem to be the rare and collectable books.', 'F3R4.png', 'cmd', 'room_id=''rm_03'' OR room_id=''rm_06''', '', ''),
('rm_08', 'Conservatory', 'A giant glass window stands before you covering most of the walls. You notice an ornate telescope pointed out, through the window, towards the sky. On the tables in this room, star charts and astronomy books lay atop one another. The parts of the wall that are not window are more bookshelves filled with what you assume to be astronomy related texts.', 'A giant glass window stands before you covering most of the walls. You notice an ornate telescope pointed out, through the window, towards the sky. On the tables in this room, star charts and astronomy books lay atop one another. The parts of the wall that are not window are more bookshelves filled with what you assume to be astronomy related texts.', 'F3R5.png', 'cmd', 'room_id=''rm_06''', 'mn_04', 'item_id=''ci_02'''),
('rm_09', 'F2 Bathroom', 'Yup, its a bathroom. Just as standard as the last bathroom.', 'Yup, its a bathroom. Just as standard as the last bathroom.', 'F2R1.png', 'cmd', 'room_id=''rm_10''', '', ''),
('rm_10', 'F2 Bedroom', 'A king sized bed sits between two broken windows which let in the only available light in the room. The mattress is old and ratty, removing any urge to touch the bed, let alone sleep in it. Under each window is a side table. There doesn’t seem to be anything of interest in the closet other than the broken closet doors.', 'A king sized bed sits between two broken windows which let in the only available light in the room. The mattress is old and ratty, removing any urge to touch the bed, let alone sleep in it. Under each window is a side table. There doesn’t seem to be anything of interest in the closet other than the broken closet doors.', 'F2R2.png', 'cmd', 'room_id=''rm_12'' OR room_id=''rm_06'' OR room_id=''rm_09''', '', ''),
('rm_11', 'Gallery', 'This room is dripping with luxury, even in its dilapidated state. The walls are filled with artworks of all types. Pedestals holding sculptures and vases sit next to large statues, both traditional and abstract. Anything that can be looks to be gilded in gold. Despite the flashy decoration, one could admire the art in this room for hours.', 'This room is dripping with luxury, even in its dilapidated state. The walls are filled with artworks of all types. Pedestals holding sculptures and vases sit next to large statues, both traditional and abstract. Anything that can be looks to be gilded in gold. Despite the flashy decoration, one could admire the art in this room for hours.', 'F2R3.png', 'cmd', 'room_id=''rm_12''', '', ''),
('rm_12', 'F2 Hallway', 'This nondescript hallway looks over into the foyer below. Other than the grand staircase at its center, the only other interesting thing of note are the two glass door, leading into what seems to be an art gallery.', 'This nondescript hallway looks over into the foyer below. Other than the grand staircase at its center, the only other interesting thing of note are the two glass door, leading into what seems to be an art gallery.', 'F2R4.png', 'cmd', 'room_id=''rm_18'' OR room_id=''rm_14'' OR room_id=''rm_11'' OR room_id=''rm_10''', '', ''),
('rm_13', 'Werewolf Shop', 'This was unexpected. This room has a werewolf… and he wants to sell you stuff. He seems friendly enough. Maybe his stuff will be useful. Strangely, there is a shop counter in here as well. An oddly specific design choice.', 'This was unexpected. This room has a werewolf… and he wants to sell you stuff. He seems friendly enough. Maybe his stuff will be useful. Strangely, there is a shop counter in here as well. An oddly specific design choice.', 'F2R5.png', 'cmd', 'room_id=''rm_14''', '', 'item_id=''ci_07'' OR item_id=''pi_04'' OR item_id=''pi_06'' OR item_id=''pi_07'' OR item_id=''pi_10'' OR item_id=''pi_11'' OR item_id=''pi_12'' OR item_id=''pi_14'' OR item_id=''pi_15'' OR item_id=''pi_16'' OR item_id=''it_17'),
('rm_14', 'Laboratory', 'This mansion is just plain weird. This room is very obviously a laboratory. There are operating tables and beakers on flames holding bubbling liquids. There are even big switches on the walls that you are not sure do anything. It’s so stereotypically a laboratory, it''s almost comical.', 'This mansion is just plain weird. This room is very obviously a laboratory. There are operating tables and beakers on flames holding bubbling liquids. There are even big switches on the walls that you are not sure do anything. It’s so stereotypically a laboratory, it''s almost comical.', 'F2R6.png', 'cmd', 'room_id=''rm_13'' OR room_id=''rm_12''', 'mn_05', 'item_id=''ci_05'''),
('rm_15', 'Billiards Room', 'When you walk in, you immediately note this room as the Billiards room. The walls are covered in dark, wood paneling. A large pool table sits in one corner of the room, while a fairly well-stocked wet bar sits in the opposite corner, seemingly more clean than the rest of the room. The opposite wall bares a stone fireplace, crumbling in disrepair.', 'When you walk in, you immediately note this room as the Billiards room. The walls are covered in dark, wood paneling. A large pool table sits in one corner of the room, while a fairly well-stocked wet bar sits in the opposite corner, seemingly more clean than the rest of the room. The opposite wall bares a stone fireplace, crumbling in disrepair.', 'F1R1.png', 'cmd', 'room_id=''rm_17''', '', ''),
('rm_16', 'F1 Hallway', 'A simple hallway. It’s lit by one sconce, the others having burned out long ago. A set of stairs leading down to a lower floor is too the east.', 'A simple hallway. It’s lit by one sconce, the others having burned out long ago. A set of stairs leading down to a lower floor is too the east.', 'F1R2.png', 'cmd', 'room_id=''rm_24'' OR room_id=''rm_17''', '', ''),
('rm_17', 'Great Room', 'This room is huge. Chairs, sofas, and side tables are laid out around the room, facing each other in symmetrical patterns. An elegant fireplace adorns one wall, surrounded by even more furniture.', 'This room is huge. Chairs, sofas, and side tables are laid out around the room, facing each other in symmetrical patterns. An elegant fireplace adorns one wall, surrounded by even more furniture.', 'F1R3.png', 'cmd', 'room_id=''rm_16'' OR room_id=''rm_20'' OR room_id=''rm_18'' OR room_id=''rm_15''', '', 'item_id=''ci_03'''),
('rm_18', 'Foyer', 'You walk in and see the intricately designed front doors before you almost begging you to escape this hellish manor. Your eyes are drawn to a grand staircase that leads up to the second floor, giving the room an open, airy feel. A dilapidated gold chandelier hangs from the ceiling, just barely illuminating the room.', 'You walk in and see the intricately designed front doors before you almost begging you to escape this hellish manor. Your eyes are drawn to a grand staircase that leads up to the second floor, giving the room an open, airy feel. A dilapidated gold chandelier hangs from the ceiling, just barely illuminating the room.', 'F1R4.png', 'cmd', 'room_id=''rm_21'' OR room_id=''rm_12'' OR room_id=''rm_17''', 'mn_06', ''),
('rm_19', 'F1 Laundry Room', 'This room is filled with laundry bins that may or may not be filled with what you hope are linens. More linens lay in piles in the corners of the room. On the south wall, a sink sits next to shelves housing a few bottles of what you assume to be old laundry supplies. You see the laundry chute on the west wall.', 'This room is filled with laundry bins that may or may not be filled with what you hope are linens. More linens lay in piles in the corners of the room. On the south wall, a sink sits next to shelves housing a few bottles of what you assume to be old laundry supplies. You see the laundry chute on the west wall.', 'F1R5.png', 'cmd', 'room_id=''rm_26'' OR room_id=''rm_20''', '', ''),
('rm_20', 'Dining Room', 'A large dining table draws the eye to the center of the room. It is dressed up, covered in fine china and silverware. Empty candle holders and vases dot the center of the table. The south wall houses a long buffet with metal pans on top. You wonder if there could be any food left in the pans, then decide against checking for fear of what you might find.', 'A large dining table draws the eye to the center of the room. It is dressed up, covered in fine china and silverware. Empty candle holders and vases dot the center of the table. The south wall houses a long buffet with metal pans on top. You wonder if there could be any food left in the pans, then decide against checking for fear of what you might find.', 'F1R6.png', 'cmd', 'room_id=''rm_19'' OR room_id=''rm_17'' OR room_id=''rm_21''', 'mn_07', ''),
('rm_21', 'Kitchen', 'The door swings open and the first thing you see the kitchen. A large, broken fridge sits open in the corner. Cookware is scattered about the room collecting dust. Stagnant, dirty water fills the sink, giving the room a slightly rotten odor. It also seems to be one of the few rooms adequately lit as you can see everything decent enough.', 'The door swings open and the first thing you see the kitchen. A large, broken fridge sits open in the corner. Cookware is scattered about the room collecting dust. Stagnant, dirty water fills the sink, giving the room a slightly rotten odor. It also seems to be one of the few rooms adequately lit as you can see everything decent enough.', 'F1R7.png', 'cmd', 'room_id=''rm_18'' OR room_id=''rm_20''', '', 'item_id=''ci_01'' OR item_id=''hi_01'' OR item_id=''pi_09'''),
('rm_22', 'Wine Cellar', 'The room is cold and the heavy stench of iron hangs in the air. Though dimly lit, you see bottles of wine lining decrepit, wooden shelves along the walls. As you inspect more closely, you realize these are bottles of blood, not wine. Somehow it seems even more pretentious to collect bottles of blood as it were expensive wine.', 'The room is cold and the heavy stench of iron hangs in the air. Though dimly lit, you see bottles of wine lining decrepit, wooden shelves along the walls. As you inspect more closely, you realize these are bottles of blood, not wine. Somehow it seems even more pretentious to collect bottles of blood as it were expensive wine.', 'F0R1.png', 'cmd', 'room_id=''rm_24''', '', ''),
('rm_23', 'Crypt', 'The first thing you notice is the ornate, and fairly gaudy, coffin adorning the center of the room. Rows of candelabras are the only source of light, leaving the room drenched in shadow. Dust and cobwebs cake every surface giving the air a suffocating quality, although that could also be the thought of what lies inside that coffin.', 'The first thing you notice is the ornate, and fairly gaudy, coffin adorning the center of the room. Rows of candelabras are the only source of light, leaving the room drenched in shadow. Dust and cobwebs cake every surface giving the air a suffocating quality, although that could also be the thought of what lies inside that coffin.', 'F0R2.png', 'cmd', 'room_id=''rm_24''', 'mn_09', 'item_id=''ci_04'''),
('rm_24', 'Armory', 'You’re struck with the smell of rusted metal. You come to the conclusion that the smell is all of the rusted metal. Swords, shields, and armor are scattered about seemingly untouched for years, maybe even decades. On the west wall sits a large and imposing set of double doors. On the opposite wall, a set of stairs lead to the upper floor, though something seems off about them.', 'You’re struck with the smell of rusted metal. You come to the conclusion that the smell is all of the rusted metal. Swords, shields, and armor are scattered about seemingly untouched for years, maybe even decades. On the west wall sits a large and imposing set of double doors. On the opposite wall, a set of stairs lead to the upper floor, though something seems off about them.', 'F0R3.png', '', 'room_id=''rm_25'' OR room_id=''rm_16'' OR room_id=''rm_23'' OR room_id=''rm_22''', 'mn_08', ''),
('rm_25', 'Storage', 'There isn’t really anything special about this room. Mops, buckets, and brooms sit, very clearly unused, on basic metal shelving. This room is a bit disappointing in comparison to the rest of the mansion.', 'There isn’t really anything special about this room. Mops, buckets, and brooms sit, very clearly unused, on basic metal shelving. This room is a bit disappointing in comparison to the rest of the mansion.', 'F0R4.png', 'cmd', 'room_id=''rm_26'' OR room_id=''rm_24''', '', ''),
('rm_26', 'F0 Laundry Room', 'You see a pretty high-end washer and dryer along the adjacent wall surrounded by neatly folded, yet dust-covered linens and fabrics.', 'You see a pretty high-end washer and dryer along the adjacent wall surrounded by neatly folded, yet dust-covered linens and fabrics.', 'F0R5.png', 'cmd', 'room_id=''rm_25''', '', 'item_id=''pi_08''');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `monsters`
--
ALTER TABLE `monsters`
  ADD PRIMARY KEY (`monster_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
