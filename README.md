Restful test project
====================

Run application:
- clone project inside your virtual host root directory: git clone https://github.com/gnatyuk/rest.git .
- go to project directory and run command: composer install
- open /config/db.php and setup your database configurations
- run project migrations: ./yii migrate/up

==================================================================================
==================================================================================

User login (get access token):

```
POST /v1/users/login HTTP/1.1
Host: 127.0.0.1:8080
Cache-Control: no-cache
Postman-Token: 7fdaa428-9c5c-84b1-9512-1e3dd5393ccf
Content-Type: application/x-www-form-urlencoded

username=tester&password=tester
```

==================================================================================

All next requests must have user access token. Result without or bad token:

{"name":"Unauthorized","message":"You are requesting with an invalid credential.","code":0,"status":401,"type":"yii\\web\\UnauthorizedHttpException"}

==================================================================================

Get all categories:

GET /v1/categories HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP   <<< user access token
Cache-Control: no-cache
Postman-Token: 90be4079-f1d0-d91c-348e-a4bf12870d55

result example: [{"id":5,"title":"rock"},{"id":6,"title":"hard rock"}]

==================================================================================

Add new category:

POST /v1/categories HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: e59eec5e-838f-e279-8a2f-7880ed0410de
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="title"

indie
----WebKitFormBoundary7MA4YWxkTrZu0gW

result example: {"title":"indie","id":7}

==================================================================================

Show one category:

GET /v1/categories/7 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: b319f456-b239-6db6-193c-5df7f113e203

result example: {"id":7,"title":"indie"}

==================================================================================

Delete one category:

DELETE /v1/categories/6 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: cefbbf72-a7ed-2a81-b7a1-f8df1c56f56c
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

empty result. if was exception, result will be like: {"name":"Not Found","message":"Object not found: 6","code":0,"status":404,"type":"yii\\web\\NotFoundHttpException"}

==================================================================================

Update category title:

PUT /v1/categories/5 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 98e6d869-dd2e-d94d-a9ef-9a7aeb2c3f67
Content-Type: application/x-www-form-urlencoded

title=hard+rock

result example: {"id":5,"title":"hard rock"}

==================================================================================

Sort DESC by title:

GET /v1/categories?sort=-title HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 0f63e151-fb09-91da-8cbc-08e86a682b23

result example: [{"id":9,"title":"indie"},{"id":5,"title":"hard rock"},{"id":8,"title":"alternative"}]

Sort ASC by title:

GET /v1/categories?sort=title HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 64af56df-6985-cd0c-802f-269b1bdeb803

result example: [{"id":8,"title":"alternative"},{"id":5,"title":"hard rock"},{"id":9,"title":"indie"}]

==================================================================================
==================================================================================

Create product:

POST /v1/products HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: f23a0559-e4e2-2694-4a90-747d50392e8a
Content-Type: application/x-www-form-urlencoded

title=Nightwish&category_id=5

result example: {"title":"Nightwish","category_id":"5","id":1}

==================================================================================

Edit product category id:

PUT /v1/products/1 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 6938b869-1010-799c-ed73-9ade80b7833d
Content-Type: application/x-www-form-urlencoded

title=Nightwish&category_id=8

result example: {"title":"Nightwish","category_id":"8","id":1}

title:

PUT /v1/products/1 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: d0d80299-2d33-5ea1-bb9d-a57ec3c11075
Content-Type: application/x-www-form-urlencoded

title=Nightwish111&category_id=8

result example: {"id":1,"category_id":"8","title":"Nightwish111"}

==================================================================================

Get all products:

GET /v1/products HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: ea2dee1e-c550-e9e2-8164-315033f9788f

result example: [{"id":1,"category_id":8,"title":"Nightwish111"},{"id":2,"category_id":8,"title":"Nightwish"}]

==================================================================================

Delete product:

DELETE /v1/products/1 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: c6797d4a-4866-224c-9893-ca990db7265f
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

empty result.

==================================================================================

Get product details:

GET /v1/products/2 HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 182588b8-15b4-b0f5-0d3e-d5535f4e8234

result example: {"id":2,"category_id":8,"title":"Nightwish"}

==================================================================================

Get products by category:

GET /v1/categories/8/products HTTP/1.1
Host: 127.0.0.1:8080
Authorization: Bearer O1IToLcM5UHu_TwQ_l8R_b_04Xf0zHIP
Cache-Control: no-cache
Postman-Token: 54532df1-bac1-1191-65af-9007e8fbe579

result example: [{"id":2,"category_id":8,"title":"Nightwish"},{"id":3,"category_id":8,"title":"Epica"}]

==================================================================================
==================================================================================