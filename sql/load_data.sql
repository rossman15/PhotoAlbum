INSERT INTO Album (albumid, title, created, lastupdated, username, access) VALUES ('1', 'I love sports', '2014-09-10', '2014-09-11', 'sportslover', 'Public');

INSERT INTO Album (albumid, title, created, lastupdated, username, access) VALUES ('2', 'I love football', '2014-09-12', '2014-09-13', 'sportslover', 'Public');

INSERT INTO Album (albumid, title, created, lastupdated, username, access) VALUES ('3', 'Around The World', '2014-09-16', '2014-09-17', 'traveler', 'Public');

INSERT INTO Album (albumid, title, created, lastupdated, username, access) VALUES ('4', 'Cool Space Shots', '2014-09-16', '2014-09-17', 'spacejunkie', 'Private');

INSERT INTO Photo (picid, url, format, date) VALUES ('football_s1', 'static/pictures/football_s1.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('football_s2', 'static/pictures/football_s2.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('football_s3', 'static/pictures/football_s3.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('football_s4', 'static/pictures/football_s4.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('space_EagleNebula', 'static/pictures/space_EagleNebula.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('space_GalaxyCollision', 'static/pictures/space_GalaxyCollision.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('space_HelixNebula', 'static/pictures/space_HelixNebula.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('space_MilkyWay', 'static/pictures/space_MilkyWay.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('space_OrionNebula', 'static/pictures/space_OrionNebula.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s1', 'static/pictures/sports_s1.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s2', 'static/pictures/sports_s2.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s3', 'static/pictures/sports_s3.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s4', 'static/pictures/sports_s4.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s5', 'static/pictures/sports_s5.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s6', 'static/pictures/sports_s6.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s7', 'static/pictures/sports_s7.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('sports_s8', 'static/pictures/sports_s8.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_EiffelTower', 'static/pictures/world_EiffelTower.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_firenze', 'static/pictures/world_firenze.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_GreatWall', 'static/pictures/world_GreatWall.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Isfahan', 'static/pictures/world_Isfahan.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Istanbul', 'static/pictures/world_Istanbul.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Persepolis', 'static/pictures/world_Persepolis.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Reykjavik', 'static/pictures/world_Reykjavik.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Seoul', 'static/pictures/world_Seoul.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_Stonehenge', 'static/pictures/world_Stonehenge.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_TajMahal', 'static/pictures/world_TajMahal.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_TelAviv', 'static/pictures/world_TelAviv.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_tokyo', 'static/pictures/world_tokyo.jpg', 'jpg', '2014-09-17');

INSERT INTO Photo (picid, url, format, date) VALUES ('world_WashingtonDC', 'static/pictures/world_WashingtonDC.jpg', 'jpg', '2014-09-17');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('2', 'football_s1', 'What a catch!', '1');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('2', 'football_s2', 'Nice catch!', '2');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('2', 'football_s3', 'Great catch!', '3');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('2', 'football_s4', 'Terrific catch!', '4');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s1', 'Whoah', '1');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s2', 'Wow!', '2');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s3', 'Nice!', '3');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s4', 'Great!', '4');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s5', 'Tremendous!', '5');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s6', 'Amazing!', '6');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s7', 'Terrific!', '7');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('1', 'sports_s8', 'Stunning!', '8');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_EiffelTower', 'Gorgeous', '1');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_firenze', 'Beautiful', '2');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_GreatWall', 'Beaut', '3');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Isfahan', 'Top Notch', '4');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Istanbul', 'Hmmmmm', '5');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Persepolis', 'Hot', '6');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Reykjavik', 'Cold1', '7');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Seoul', 'Cold2', '8');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_Stonehenge', 'Cold3', '9');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_TajMahal', 'Cold4', '10');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_TelAviv', 'Cold5', '11');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_tokyo', 'Cold6', '12');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('3', 'world_WashingtonDC', 'Cold7', '13');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('4', 'space_EagleNebula', 'AAA', '1');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('4', 'space_GalaxyCollision', 'BBB', '2');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('4', 'space_HelixNebula', 'CCC', '3');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('4', 'space_MilkyWay', 'DDD', '4');

INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES ('4', 'space_OrionNebula', 'EEE', '5');

INSERT INTO AlbumAccess (albumid, username) VALUES (1, 'sportslover');

INSERT INTO AlbumAccess (albumid, username) VALUES (2, 'sportslover');

INSERT INTO AlbumAccess (albumid, username) VALUES (3, 'traveler');

INSERT INTO AlbumAccess (albumid, username) VALUES (4, 'spacejunkie');

INSERT INTO AlbumAccess (albumid, username) VALUES (4, 'traveler');
