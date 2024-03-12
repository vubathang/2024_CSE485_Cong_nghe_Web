<?php

// Support to search
$colSearch = [
    [
        'id' => '0',
        'colName' => 'departmentName',
        'displayName' => 'Tên cơ quan',
        'tableName' => 'departments'
    ],
    [
        'id' => '1',
        'colName' => 'fullName',
        'displayName' => 'Tên nhân viên',
        'tableName' => 'employees'
    ],
    [
        'id' => '2',
        'colName' => 'address',
        'displayName' => 'Địa chỉ',
        'tableName' => 'employees'
    ],
    [
        'id' => '3',
        'colName' => 'phone',
        'displayName' => 'Số điện thoại',
        'tableName' => 'employees'
    ],
];


// Data for special feature of web
$specialFeatures = [
    [
        'id' => '1',
        'title' => 'Tra Cứu Hiệu Quả và Chính Xác',
        'content' => 'Hệ thống tìm kiếm thông minh của chúng tôi không chỉ giúp bạn tra cứu một cách nhanh chóng mà còn đảm bảo sự chính xác cao. Với công nghệ tiên tiến, bạn có thể dễ dàng lấy được thông tin chi tiết về đơn vị và nhân viên, mang lại trải nghiệm tra cứu hiệu quả và chất lượng.'
    ],
    [
        'id' => '2',
        'title' => 'Tìm Kiếm Nâng Cao với Bộ Lọc Linh Hoạt',
        'content' => 'Sử dụng các bộ lọc và tùy chọn tìm kiếm nâng cao, hệ thống của chúng tôi đáp ứng mọi nhu cầu thông tin của bạn. Dù bạn tìm kiếm theo đơn vị, chức danh, hay tên, công cụ tìm kiếm linh hoạt sẽ giúp bạn thu được kết quả chính xác và đáp ứng đầy đủ yêu cầu.'
    ],
    [
        'id' => '3',
        'title' => 'Khám Phá Danh Bạ Nổi Bật',
        'content' => 'Đặt chân vào thế giới của các giáo viên xuất sắc, các phòng ban tích cực và những cá nhân nổi bật tại Đại Học Thủy Lợi thông qua Danh Bạ Nổi Bật của chúng tôi. Khám phá họ và tìm hiểu về những đóng góp quan trọng mà họ mang lại cho cộng đồng học thuật của trường.'
    ],
    [
        'id' => '4',
        'title' => 'Tin Tức và Sự Kiện Nổi Bật',
        'content' => 'Đồng hành cùng chúng tôi trong hành trình của kiến thức và sự đổi mới. Cập nhật với Tin Tức và Sự Kiện mới nhất về hoạt động, dự án nghiên cứu, và những sự kiện đặc sắc tại Đại Học Thủy Lợi. Bạn sẽ luôn là người đầu tiên biết về những điều mới nhất tại trường.'
    ],
];  

// Support to render news & events (db don't have)
$events = [
    [
        'id' => 1,
        'title' => 'Lễ Kỷ niệm 50 năm ngày thành lập Trường Đại học Thủy lợi',
        'content' => 'Sự kiện này là một dịp quan trọng để cộng đồng Trường Đại học Thủy lợi cùng nhau kỷ niệm và tưởng nhớ những cống hiến của các thế hệ cán bộ, giảng viên và sinh viên. Buổi lễ được tổ chức long trọng với sự tham gia của các cựu sinh viên nổi tiếng và đại diện lãnh đạo các cấp.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ],
    [
        'id' => 2,
        'title' => 'Giảng viên Trường ĐH Thủy lợi đoạt giải Nobel Vật lý',
        'content' => 'Giáo sư Nguyễn Văn A, giảng viên khoa Vật lý, đã được trao giải Nobel Vật lý năm nay vì đóng góp xuất sắc trong lĩnh vực nghiên cứu vật lý lý thú và ứng dụng công nghệ mới trong giảng dạy. Thành công này là niềm tự hào của cả Trường và cộng đồng sinh viên.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ],
    [
        'id' => 3,
        'title' => 'Khám phá mới về nước biển ở cảng Cửa Lò',
        'content' => 'Nhóm nghiên cứu của Trường Đại học Thủy lợi đã phát hiện một loại san hô hiếm có tại khu vực cảng Cửa Lò. Sự kiện này đánh dấu bước tiến quan trọng trong nghiên cứu và bảo tồn động, thực vật biển ở Việt Nam. Công trình nghiên cứu của đội ngũ giáo sư và sinh viên đã được công bố trên các tạp chí quốc tế.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ]
];

$news = [
    [
        'id' => 1,
        'title' => 'Học bổng "Tương lai sáng tạo" cho sinh viên xuất sắc',
        'content' => 'Trường Đại học Thủy lợi vừa công bố kết quả tuyển chọn học bổng "Tương lai sáng tạo" cho sinh viên năm học mới. Các sinh viên xuất sắc đã nhận được học bổng và có cơ hội tham gia các dự án nghiên cứu và phát triển công nghệ mới tại Trường.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ],
    [
        'id' => 2,
        'title' => 'Đội tuyển thể dục dụng cụ giành huy chương vàng tại giải quốc tế',
        'content' => 'Đội tuyển thể dục dụng cụ của Trường Đại học Thủy lợi vừa đoạt huy chương vàng tại Giải thể dục dụng cụ quốc tế. Đây là thành tích ấn tượng của đội tuyển, đồng thời là niềm tự hào của toàn bộ cộng đồng Trường.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ],
    [
        'id' => 3,
        'title' => 'Công bố quyết định mới về học phí và hỗ trợ sinh viên nghèo',
        'content' => 'Trường Đại học Thủy lợi thông báo về quyết định mới về chính sách học phí và hỗ trợ sinh viên nghèo. Điều này nhằm mục đích tạo điều kiện thuận lợi hơn cho sinh viên trong việc theo học và phát triển bản thân.',
        'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYscfUBUbqwGd_DHVhG-ZjCOD7MUpxp4uhNe7toUg4ug&s'
    ]
];