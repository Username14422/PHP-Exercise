select * from (select Author.id_author, count(Author.id_author) as count_of_book from Author
join Author_of_the_book on Author.id_author = Author_of_the_book.id_author
group by Author.id_author) as authors
where count_of_book < 6


