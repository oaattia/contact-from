# Create a contact form 
This is a contact form that help the user to send his question, it's uses mailGun for sending emails also saving the data to our database .

### Installation:
 ```bash
 composer install
```

also don't forget to add the `.env` file data 
### Requirements: 
- php7.0 or higher
- Mysql 5.7 or higher

### Description: 
The project contain the following structure
- src 
for the project src files 
- public 
for the public directory and we need to add the root directory in nginx or apache
 ```bash
 Apache
 DocumentRoot    /path/to/project/project/public/
 or for nginx:
 root    /path/to/project/public/
 ```

### Tests: 
