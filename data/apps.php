<?php
return [
    [
        'git' => [
            'gitUrl' => 'git-url',
            'path' => 'path'
        ],
        'order' => 1,
        'containerName' => 'container-names',
        'serviceName' => 'services',
        'yaml' => [
            'db' => [
                'image' => 'mysql:5.7',
                'volumes' => [
                    './.data/db:/var/lib/mysql'
                ],
                'restart' => 'always',
                'environment' => [
                    'MYSQL_ROOT_PASSWORD' => 'wordpress',
                    'MYSQL_DATABASE' => 'wordpress',
                    'MYSQL_USER' => 'wordpress',
                    'MYSQL_PASSWORD' => 'wordpress'
                ],
            ],
            'wordpress' => [
                'depends_on' => [
                    'db'
                ],
                'image' => 'wordpress:latest',
                'links' => [
                    'db'
                ],
                'ports' => [
                    '8000:80'
                ],
                'restart' => 'always',
                'environment' => [
                    'WORDPRESS_DB_HOST' => 'db:3306',
                    'WORDPRESS_DB_PASSWORD' => "wordpress",
                ],
            ],
        ],
    ],
];