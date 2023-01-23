CREATE table admin (id int,name varchar (256),email varchar (256),password varchar (256));
CREATE table categories ( category_id int AUTO_INCREMENT PRIMARY KEY, category_name varchar (256) );
CREATE table authors (author_id int PRIMARY KEY , author_name varchar(256) );
CREATE table articles (article_id int PRIMARY KEY , article_title varchar(256), article_content varchar(256), article_category int , article_author int,
FOREIGN KEY (article_category) REFERENCES categories(category_id),
FOREIGN KEY (article_author) REFERENCES authors(author_id)
);