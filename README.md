# PHP MVC TEST
https://github.com/hongquan95/php_test.git

## Required
- `git`
- `php`
- `composer`
- `mysql`
## Installing
- `git clone https://github.com/hongquan95/php_test.git test`
- `cd test/`
- `composer dump-autoload`
- `composer install`
- Run `mysql -uroot -p` to connect Mysql CLI  (Defaut mysql: `username: root, password:root`) open`App\Config` to see config.
- `create database test1;`
- `use test1`
- Run following sql to create tasks table:
```sql
CREATE TABLE `tasks` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
```
- After exit Mysql CLI, run `php -S localhost:6600` go to http://localhost:6600/ to see Demo
## Explanation
### Route:
- List tasks: `/tasks`
- Create new task: `/tasks/create`
- Edit a task: `/tasks/:id/edit`
- Delete a task: `/tasks/:id/delete`
- Show calendar: `/calendar`
- Api get list task by start date and end date: `/api/tasks?start=(YY-mm-dd)&end=(YY-mm-dd)`
## Missing
`PHPunit` 
