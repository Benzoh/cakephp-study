CREATE TABLE `messages` (
    `id` INTEGER NOT NULL PRIMARY KEY auto_increment,
    `members_id` INTEGER NOT NULL,
    `title` TEXT NOT NULL,
    `comment` TEXT
)

-- members_idが外部IDの働きをする。
-- 関連付けられるテーブルのIDを保管する。
-- 『テーブル名_id』で命名するのが一般的。
