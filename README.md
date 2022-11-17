# Newwaapi PHP Lib

This is PHP library for [newwaapi](https://github.com/yama24/newwaapi)

This version of library related to [newwaapi latest release](https://github.com/yama24/newwaapi/releases/latest)


## Installation

Install with composer

```bash
  composer require yama/newwaapi-php-lib
```
## Usage/Examples

```php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Yama\NewwaapiPhpLib\Newwaapi;

$wa = new Newwaapi("http://localhost:8000/");
```

for information of connection 

```php
echo $wa->info();
 ```

for send message to contact

```php
echo $wa->sendMessage('6281292267204', 'example message');
 ```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `number` | `string` | **Required**. 6281292267204 |
| `message` | `string` | **Required**. example message |


for send message to group 

```php
echo $wa->sendGroupMessage('628986182128-1627374981@g.us', 'example group message');
 ```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `string` | **Required**. 628986182128-1627374981@g.us |
| `message` | `string` | **Required**. example group message |

for send media to contact or group

```php
echo $wa->sendMedia('6281292267204', 'example media caption', "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/479px-WhatsApp.svg.png", '');
 ```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `numberOrGroupId` | `string` | **Required**. 6281292267204 (you can use a number or group id) |
| `file` | `string` | **Required**. (you can fill it with base64 url data / url) |
| `caption` | `string` | example media caption (you can fill with empty string) |
| `name` | `string` | example document file name (work for document file, you can fill with empty string) |

for check the number is registered on WhatsApp or not 

```php
echo $wa->isRegistered('6281292267204');
 ```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `number` | `string` | **Required**. 6281292267204 |


for get the list of groups 

```php
echo $wa->getGroups();
 ```

for get the list of config

```php
echo $wa->getConfig();
 ```


## Please check this out

 - [Newwaapi](https://github.com/yama24/newwaapi)
 - [Data URLs format](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URLs)
