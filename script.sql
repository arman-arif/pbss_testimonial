create or replace table imported_csv_files
(
    id        int(10) auto_increment
        primary key,
    file_name varchar(255)                         not null,
    uploaded  datetime default current_timestamp() not null,
    imported  datetime                             null,
    data_info varchar(255)                         null,
    hash      varchar(100)                         not null
)
    charset = utf8mb4;

create or replace table student_info_for_testimonial
(
    tcert_id      int auto_increment
        primary key,
    stu_name      varchar(100) not null,
    father        varchar(100) not null,
    mother        varchar(100) not null,
    village       varchar(50)  not null,
    post_office   varchar(50)  not null,
    post_code     int(10)      not null,
    upazilla      varchar(50)  not null,
    district      varchar(50)  not null,
    exam_name     varchar(150) not null,
    borad_name    varchar(255) not null,
    exam_year     int(10)      not null,
    group_tread   varchar(100) not null,
    result        varchar(10)  not null,
    roll_no       int(10)      not null,
    exam_center   varchar(100) not null,
    reg_no        bigint(16)   not null,
    session       varchar(50)  not null,
    date_of_birth date         not null,
    last_printed  datetime     null
)
    charset = utf8mb4;

create or replace table temp_list_for_testimonial
(
    temp_id       int auto_increment
        primary key,
    stu_name      varchar(100) not null,
    father        varchar(100) not null,
    mother        varchar(100) not null,
    village       varchar(50)  not null,
    post_office   varchar(50)  not null,
    post_code     int(10)      not null,
    upazilla      varchar(50)  not null,
    district      varchar(50)  not null,
    exam_name     varchar(150) not null,
    borad_name    varchar(255) not null,
    exam_year     int(10)      not null,
    group_tread   varchar(100) not null,
    result        varchar(10)  not null,
    roll_no       int(10)      not null,
    exam_center   varchar(100) not null,
    reg_no        bigint(16)   not null,
    session       varchar(50)  not null,
    date_of_birth date         not null
)
    charset = utf8mb4;

create or replace table user_info
(
    id        int auto_increment
        primary key,
    username  varchar(255) null,
    fullname  varchar(255) null,
    email     varchar(100) null,
    passwd    varchar(255) null,
    user_role varchar(25)  null
)
    charset = utf8mb4;


