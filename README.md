# Create a contact form 
When a user can't find their answer on our FAQ pages, they should be able to send us their question.
Therefore we need to create a webpage with a form where a user can ask a question.
The question should be emailed to our customer support and saved in a database.

### Requirements
 
```bash
php 7.0 >
node 7.5 >
npm 4.1.2 
mysql 
```

### Installation:

 ```bash
 > composer install
 > npm install 
 > cp .env.example .env
 > cp migrations-db.php.example migrations-db.php
 > gulp styling 
 > gulp javascript
```
To run the app from the public directory directly 
 ```bash
 Apache
 DocumentRoot    /path/to/project/project/public/
 or for nginx:
 root    /path/to/project/public/
 ```

- You should fill data in `.env`  file so you can use MailGun .
- I'm using Slim framework for the backend, it's a microPHP framework and i used it because it's only a contact form i didn't want to use full framework with many components . 
- For the front-end css stuff i used [Bulma](bulma.io) framework, and for js i used ECMA6 with babel compiler , and for bundling both  ( js and css ) i used gulp .
 - For the database layer i used doctrine DBAL and doctrine migrations, so we need also to fill the database credentials in `migrations-db.php`.
 
### Tests:
 
 - Used for testing `phpunit/phpunit`  and `mockery/mockery` , also i didn't had enough time to fully cover all the other classes .
  
### Screenshots:

<center><img src="http://imgur.com/KsRQzA5.png" /></center>
<br/>

<center><img src="http://imgur.com/Gwkzpa5.png" /></center>
<br/>

<center><img src="http://imgur.com/xVw98Rm.png" /></center>
<br/>


<center><img src="http://imgur.com/tsOwZuL.png" /></center>
<br/>

