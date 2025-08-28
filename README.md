# Route tracker

You can track your users navigation between APIs and web pages , duration time user intracting and use your pages and APIs.

<img width="1653" height="570" alt="image" src="https://github.com/user-attachments/assets/3925bed0-de54-41dd-99c7-e6141e15eb43" />


#### Installation

```
composer require mohammadmghi/route-tracker
```
 
#### 
```
php artisan migration
```
```
php artisan vendor:publish --tag=config
```
###
### Now you have a table inside you'r database called ```route_logs``` it has columns as following

```user_id```  it register user id if your user authenticated if not it store ```null```

```method``` This is method of your request it can be POST or GET, etc.

```route``` This is address of your project route you defined inside web.php and api.php

```ip_addess``` This is your user ip address

```previous_route``` This is the route that user before is visited for example if your frist to ```/home``` page and next to ```/plan``` it store ```/home page```

```duration``` This is duration that user interacted with your api

```session_id``` This is your user session id visited the route

### Dashbord
For open dashbord going to : ```https://yoursite/route-tracker/dashboard```
