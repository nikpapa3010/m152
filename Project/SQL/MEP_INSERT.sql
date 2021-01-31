INSERT INTO Usertype (Usertype)
VALUES("Admin");
INSERT INTO Usertype (Usertype)
VALUES ("User");

INSERT INTO User (Username, Email, Password, UsertypeID, MailingList)
VALUES("Beep", "beepboop", "Boop", 1, 0);

INSERT INTO Artikel (Title, Text, Date, UserID)
VALUES("First", "Something to write about", NOW(), 1);
INSERT INTO Artikel (Title, Text, Date, UserID)
VALUES("Second", "Something else to write about", NOW(), 1);
INSERT INTO Artikel (Title, Text, Date, UserID)
VALUES("Third", "Yet more to write about", NOW(), 1);

INSERT INTO Video (VideoName, VideoDesc, Video)
VALUES("Verfallend | Sneak Peek Trailer", "First sneak peek at Verfallend, the upcoming game by the Miskatonic Explorer Proprietorship


Official Discord Server
https://discord.gg/tfCDGbw", "vySO9Q8oOSU");

INSERT INTO Projekt (Projektname, Synopsis, VideoID)
VALUES ("Verfallend", "A game about flying ships or something.",1);

CREATE VIEW v_Project AS
SELECT P.Projektname, P.Synopsis, V.VideoName, V.VideoDesc, V.Video FROM Projekt AS P
LEFT JOIN Video AS V ON V.VideoID = P.VideoID;

CREATE VIEW v_LatestArtikel AS
SELECT Artikel.Title, Artikel.Text, Artikel.Date, User.Username FROM Artikel 
INNER JOIN User ON User.UserID = Artikel.UserID
ORDER BY Date ASC LIMIT 1;

CREATE VIEW v_AllArtikel AS
SELECT Artikel.Title, Artikel.Text, Artikel.Date, User.Username FROM Artikel 
INNER JOIN User ON User.UserID = Artikel.UserID
ORDER BY Date ASC;

CREATE VIEW v_LastArtikel AS
SELECT Artikel.Title, Artikel.Text, Artikel.Date, User.Username FROM Artikel 
INNER JOIN User ON User.UserID = Artikel.UserID
ORDER BY Date ASC LIMIT 4 OFFSET 1;

SELECT * FROM v_LatestArtikel;
SELECT * FROM v_LastArtikel;
SELECT * FROM v_Project;
SELECT * FROM User;