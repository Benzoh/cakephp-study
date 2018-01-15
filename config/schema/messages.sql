CREATE TABLE `messages` (
    `id` INTEGER NOT NULL PRIMARY KEY auto_increment,
    `members_id` INTEGER NOT NULL,
    `title` TEXT NOT NULL,
    `comment` TEXT
)
