CREATE TABLE IF NOT EXISTS `users` (
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `remember` VARCHAR(256),
    `forgot` VARCHAR(256),
    `created` INT,
    `updated` INT,
    `id` INTEGER PRIMARY KEY
);

-- Insert seed data
INSERT INTO `users`
(`name`, 'username', `password`, `remember`, `forgot`, `created`, `updated`)
VALUES
('Chris Cornutt', 'ccornutt', '$2y$10$7VGaKJ/D..upm0d3BNIwo.MWz1wGmyy9mjkkMNtUfsb4p/.WSrUUi', null, null, 1459694993, 1459694993);

INSERT INTO `users`
(`name`, 'username', `password`, `remember`, `forgot`, `created`, `updated`)
VALUES
('Eli White', 'eliw', '$2y$10$sZfRgLzsJeonIYrlDAOPleHA0scBBHoSyV6Ev8KWGGpogkX/vyYL.', null, null, 1459694993, 1459694993);

INSERT INTO `users`
(`name`, 'username', `password`, `remember`, `forgot`, `created`, `updated`)
VALUES
('Administrator', 'admin', '$2y$10$YnMqIbLtriIHEUNe/qqTa.UOkpGkR0Dw4CDnIHmw7hNtVzwCQb3..', null, null, 1459694993, 1459694993);

CREATE TABLE IF NOT EXISTS `posts` (
    `title` VARCHAR(100),
    `content` TEXT,
    `created` INT,
    `updated` INT,
    `id` INTEGER PRIMARY KEY
);

INSERT INTO `posts` (`title`, `content`,`created`, `updated`) VALUES ('this is a test', 'this is just some sample content', 1459694993, 1459694993);
