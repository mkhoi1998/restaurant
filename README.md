# Restaurant web

Language: `PHP`

This is a educational assignment for Web programming 181 course in Bach Khoa University.

## Set up

### Initiate

The project uses `xampp` to host. [Link](https://www.apachefriends.org/download.html)  
Copy the project to `xampp/htdocs/[project_name]`.  
Start `apache` and `mysql` in `xampp`.

### Database

Go to the `phpmyadmin` page and create a database name `restaurant`:
```
localhost/phpmyadmin
```
Then import `database.sql` from `./sql`. The project uses the default `phpmyadmin` config:
```
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'restaurant',
```
**Note:** you might change the database name in `phpmyadmin' and database config in `./application/config/database/php`.

The project can now be launched from:
```
localhost/[project_name]/home.html
```
The admin page:
```
localhost/[project_name]/admin.html
```
