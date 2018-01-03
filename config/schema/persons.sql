-- personsテーブル生成時初期SQL

CREATE TABLE `persons` (
    `id` int(11) NOT NULL auto_increment,
    `name` text NOT NULL,
    `age` int(11) ,
    `mail` text,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
