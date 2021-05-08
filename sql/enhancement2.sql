INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment) VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 1, 'I am the real Ironman');


UPDATE clients SET clientLevel = 3;

UPDATE inventory set invDescription = REPLACE(invDescription, 'small', 'spacious');

stumped....

DELETE FROM inventory WHERE invMAKE ='Jeep';