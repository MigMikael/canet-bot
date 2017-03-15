<?php

// Todo change this when commit to heroku

return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];

/*$url = parse_url(getenv("DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $host,
            'port' => 5432,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];*/

/*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => $host,
            'port' => 3306,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];*/
