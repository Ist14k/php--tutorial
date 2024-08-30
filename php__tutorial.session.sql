DROP TABLE IF EXISTS notes;
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
CREATE TABLE notes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
INSERT INTO users (email, password)
VALUES ('ist14k.akash@gmail.com', 'password');
INSERT INTO notes (title, body, user_id)
VALUES ('Note 1', 'This is note 1', 1),
    ('Note 2', 'This is note 2', 1),
    ('Note 3', 'This is note 3', 1);