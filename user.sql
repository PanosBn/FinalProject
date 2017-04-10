CREATE TABLE 'users'(
    'userid' varchar(10) NOT NULL AUTO_INCREMENT,
    'username' varchar(255) NOT NULL,
    'password' varchar(255) NOT NULL,
    'email' varchar(255) NOT NULL,
    'active' varchar(255) NOT NULL,
    'resetPassword' varchar(255) DEFAULT NULL,
    'resetPasswordComplete' varchar(255) DEFAULT 'No',
    PRIMARY KEY ('userid')

) ENGINE = MyISAM DEFAULT CHARSET =latin1;