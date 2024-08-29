DROP TABLE IF EXISTS notes;
DROP TABLE IF EXISTS users;
--
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
--
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
--
INSERT INTO users (email, password)
VALUES ('istiak@gmail.com', 'password');
--
INSERT INTO notes (title, body, user_id)
VALUES ('First Note', 'This is my first note', 1),
    ('Second Note', 'This is my second note', 1);