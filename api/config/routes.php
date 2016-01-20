<?php

return [
    [
    	'class' => 'yii\rest\UrlRule', 
    	'controller' => 'v1/user', 
    	'only' => ['login'],
    	'extraPatterns' => ['POST login' => 'login']
    ],
    [
        'class' => 'yii\rest\UrlRule', 'controller' => 'v1/category', 
        'tokens' => ['{id}' => '<id:\\w+>'], 
        'extraPatterns' => ['GET {id}/products' => 'products']
    ],
    [
    	'class' => 'yii\rest\UrlRule', 
    	'controller' => 'v1/product'
    ],
];