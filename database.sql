-- Création de la table Author
CREATE TABLE Author (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    bio TEXT
);

-- Création de la table Publisher
CREATE TABLE Publisher (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Création de la table Book
CREATE TABLE Book (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    ISBN VARCHAR(20) NOT NULL,
    author_id INT,
    publisher_id INT,
    FOREIGN KEY (author_id) REFERENCES Author(id),
    FOREIGN KEY (publisher_id) REFERENCES Publisher(id)
);

-- Création de la table Client 
CREATE TABLE Client (
	id INT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	deposit INT
);

-- Création de la table Loan
CREATE TABLE Loan (
    id INT PRIMARY KEY,
    client_id INT,
    book_id INT,
    start_date DATE,
    end_date DATE,
    returned BOOLEAN,
    FOREIGN KEY (client_id) REFERENCES Client(id),
    FOREIGN KEY (book_id) REFERENCES Book(id)
);
