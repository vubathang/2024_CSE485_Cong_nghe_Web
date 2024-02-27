CREATE DATABASE TLU_Library;
USE TLU_Library;

CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    genre VARCHAR(255) NOT NULL,
    publication_date DATE NOT NULL,
    page_count INT NOT NULL
);

CREATE TABLE Authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    biography TEXT NOT NULL
);

CREATE TABLE Books_Authors (
    book_id INT NOT NULL,
    author_id INT NOT NULL,
    PRIMARY KEY (book_id, author_id),
    FOREIGN KEY (book_id) REFERENCES Books(id),
    FOREIGN KEY (author_id) REFERENCES Authors(id)
);

CREATE TABLE Reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    rating INT NOT NULL,
    review TEXT,
    FOREIGN KEY (book_id) REFERENCES Books(id)
);