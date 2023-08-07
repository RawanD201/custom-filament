<?php

return [

    'components' => [
        'backup_destination_list' => [
            'table' => [
                'actions' => [
                    'download' => 'دابەزاندن',
                    'delete' => 'سڕینەوە',
                ],

                'fields' => [
                    'path' => 'بەستەر',
                    'disk' => 'شوێن',
                    'date' => 'بەروار',
                    'size' => 'قەبارە',
                ],

                'filters' => [
                    'disk' => 'شوێن',
                ],
            ],
        ],

        'backup_destination_status_list' => [
            'table' => [
                'fields' => [
                    'name' => 'ناو',
                    'disk' => 'شوێن',
                    'healthy' => 'جۆر',
                    'amount' => 'ژمارە',
                    'newest' => 'تازەترین',
                    'used_storage' => 'شوێنی بەکارهێنراو',
                ],
            ],
        ],
    ],

    'pages' => [
        'backups' => [
            'actions' => [
                'create_backup' => 'دروستکردنی باکئەپ',
            ],

            'heading' => 'باکئەپەکان',

            'messages' => [
                'backup_success' => 'باکئەپ بە سەرکەوتووی دروستکرا.',
            ],

            'modal' => [
                'buttons' => [
                    'only_db' => 'تەنها داتابەیس',
                    'only_files' => 'تەنها فایل',
                    'db_and_files' => 'فایل و داتابەیس',
                ],

                'label' => 'تکایە جۆرێک هەڵبژێرە',
            ],

            'navigation' => [
                'group' => 'Settings',
                'label' => 'باکئەپ',
            ],
        ],
    ],

];
