INSERT INTO Books (title, author, description, genre, publication_date, page_count) VALUES
("The Lord of the Rings", "J.R.R. Tolkien", "An epic fantasy adventure...", "Fantasy", '1954-07-29', 1178),
("Pride and Prejudice", "Jane Austen", "A classic novel of love and society...", "Romance", '1813-01-28', 279),
("The Hitchhiker's Guide to the Galaxy", "Douglas Adams", "A humorous science fiction comedy...", "Science Fiction", '1979-10-12', 215),
("The Hobbit", "J.R.R. Tolkien", "A fantasy novel about Bilbo Baggins", "Fantasy", '1937-09-21', 310),
("1984", "George Orwell", "A dystopian novel about totalitarianism", "Dystopian", '1949-06-08', 328),
("To Kill a Mockingbird", "Harper Lee", "A novel about racial injustice", "Southern Gothic", '1960-07-11', 281);

INSERT INTO Authors (name, biography) VALUES
("J.R.R. Tolkien", "An English writer, poet, philologist, and academic"),
("George Orwell", "An English novelist, essayist, journalist and critic"),
("Harper Lee", "An American novelist widely known for To Kill a Mockingbird");

INSERT INTO Books_Authors (book_id, author_id) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO Reviews (book_id, rating, review) VALUES
(1, 5, "A fantastic journey with memorable characters"),
(2, 4, "A chilling depiction of a dystopian future"),
(3, 5, "A powerful exploration of racial injustice");