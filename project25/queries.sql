-- Liệt kê tất cả các cuốn sách với tác giả của chúng:
SELECT Books.title, Authors.name
FROM Books JOIN Books_Authors ON Books.id = Books_Authors.book_id
           JOIN Authors ON Books_Authors.author_id = Authors.id;

-- Tìm sách theo tác giả cụ thể:
SELECT * FROM Books WHERE author = "J.R.R. Tolkien";

-- Nhận sách trong một thể loại cụ thể:
SELECT * FROM Books WHERE genre = "Science Fiction";

-- Đếm sách theo từng tác giả:
SELECT Authors.name, COUNT(*) AS book_count
FROM Books_Authors JOIN Authors ON Books_Authors.author_id = Authors.id
GROUP BY Authors.id;

-- Tìm kiếm sách theo từ khóa tiêu đề:
SELECT * FROM Books WHERE title LIKE "%Lord of the Rings%";

-- Tìm kiếm sách theo tiêu đề, tác giả hoặc thể loại bằng cách kết hợp từ khóa:
SELECT * FROM Books
WHERE title LIKE '%Rings%'
   OR author LIKE '%Adams%'
   OR genre LIKE '%Romance%';

-- Tìm sách có phạm vi ngày xuất bản cụ thể:
SELECT * FROM Books
WHERE YEAR(publication_date) >= 2020 AND YEAR(publication_date) <= 2023;

-- Kết hợp các bảng và truy xuất thông tin chi tiết về tác giả cho mỗi cuốn sách:
SELECT Books.title, Authors.name, Authors.biography
FROM Books JOIN Books_Authors ON Books.id = Books_Authors.book_id
           JOIN Authors ON Books_Authors.author_id = Authors.id;

-- Nhóm sách theo thể loại và đếm số lượng sách trong mỗi danh mục:
SELECT * SELECT genre, COUNT(*) AS book_count
FROM Books
GROUP BY genre;

-- Lấy danh sách sách có xếp hạng trung bình và số lượng xếp hạng:
SELECT Books.title, AVG(Reviews.rating) AS avg_rating, COUNT(Reviews.rating) AS rating_count
FROM Books LEFT JOIN Reviews ON Books.id = Reviews.book_id
GROUP BY Books.id;

-- Sử dụng truy vấn con để tìm sách có nhiều hơn một số trang nhất định:
SELECT * FROM Books
WHERE page_count > (SELECT AVG(page_count) FROM Books);

-- Sắp xếp sách theo ngày phát hành theo thứ tự giảm dần:
SELECT * FROM Books
ORDER BY publication_date DESC;

-- Sử dụng LIMIT và OFFSET để phân trang:
SELECT * FROM Books
LIMIT 10 OFFSET 20; --  Retrieve 10 books starting from the 21st record

-- Kết hợp nhiều điều kiện bằng toán tử AND/OR:
SELECT * FROM Books
WHERE genre = "Science Fiction" AND publication_date >= '2020-01-01';

-- Sử dụng biểu thức CASE để thao tác dữ liệu có điều kiện:
SELECT title, author,
CASE WHEN page_count > 500 THEN 'Long'
    WHEN page_count <= 200 THEN 'Short'
    ELSE 'Medium' END AS length_category
FROM Books;