create table user
(   user_id int(10) not NULL, 
    name varchar(100) not null, 
	email varchar(100) not NULL, 
	password varchar(100) not NULL,
    primary key (user_ID)
) ENGINE=INNODB;
create table post
(
    post_id int(10) not NULL,
    content varchar(1000),
    easiness decimal(2,0),
    loading decimal(2,0),
    usefulness decimal(2,0),
    serial_no char(4) not null,
    user_id int(10) not null,
    primary key (post_id),
    foreign key (user_id) references user (user_id)
)ENGINE=InnoDB;

alter TABLE post modify post_id int AUTO_INCREMENT;
