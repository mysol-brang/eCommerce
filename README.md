# eCommerce Shopping Project
> This project runs with Laravel Framework 8.13.0.
## Getting started
* required PHP version (>= 7.0.0 < 8)
* required Composer version ^2.4.4
## To Setup
```
# install dependencies
1. composer install
2. npm install

# create .env file and generate the application key
1. cp .env.example .env
2. php artisan key:generate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod
```
> * create ecomm database and import ecomm.sql dump file
> * So, you don't need to run php artisan migrate

# For SuperAdmin login
> * email: superadmin@gmail.com
> * password: password
# For Admin login 
> * email: admin@gmail.com
> * password: password
# For Editor login
> * email: tanaka@gmail.com
> * password: password
## .Env Setup
```
APP_NAME=MySol
APP_ENV= 
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eComm
DB_USERNAME=root
DB_PASSWORD=
```
Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.

## Licence

This software is licensed under the MySol Software Development license, quoted below.

Copyright 2023 MySol.Co.Ltd

Licensed under the MySol License, Version 1.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.mysol.com/licenses/LICENSE-1.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
