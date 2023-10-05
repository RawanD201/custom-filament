<?php

return [

    'app.name' => 'کۆمپانیای ئەی پی سۆفت',
    'dashboard' => 'داشبۆرد',
    'nav' => [
        'group' => [
            'buy' => 'کڕین',
            'sell' => 'فرۆشتن',
            'management' => 'بەڕێوەبردن',
            'settings' => 'ڕێکخستنەکان',
            'expenses' => 'خەرجییەکان',
            'loans' => 'ڕاپۆرتی قەرز',
            'report' => 'ڕاپۆرتەکان',
        ],

        'user_menu' => [
            'lock_screen' => 'داخستنی شاشە',
            'settings' => 'ڕێکخستنی هەژمار'
        ],
        'dashboard' => 'داشبۆرد',
    ],

    'users' => [
        'list' => 'بەکارهێنەرەکان',
        'create' => 'دروستکردنی بەکارهێنەر',
        'edit' => 'بەکارهێنەر',
    ],

    'type' => [
        'waiting' => 'چاوەڕوانی',
        'approve' => 'پەسەندکراو',
    ],

    'notify' => [
        'activate' => 'هەژماری کارمەند چالاک کرا',
        'deactivate' => 'هەژماری کارمەند ناچالاک کرا',
    ],

    "expense" => [
        "type" => [
            "public" => "گشتی",
            "private" => "تایبەت",
            "shared" => "هاوبەش",
        ]
    ],

    'customer' => [
        'type' => [
            'sell' => 'فرۆشتن',
            'buy' => 'کڕین',
            'sell_and_buy' => 'کڕین و فرۆشتن',
        ],
        'payment' => [
            'cash' => 'نەقد',
            'loan' => 'قەرز',
        ],
    ],

    'modal' => [
        'timeoff_request' => [
            'approve' => [
                'title' => 'Approve Request',
                'body' => 'Are you sure you would like to approve the request? This decision is final and cannot be undone.',
                'confirm' => 'Confirm to Approve',
            ],
            'reject' => [
                'title' => 'Reject Request',
                'body' => 'Are you sure you would like to reject the request? This decision is final and cannot be undone.',
                'confirm' => 'Confirm to Reject',
            ],
            'forward' => [
                'title' => 'Forward Request',
                'body' => 'Are you sure you would like to forward the request? This decision is final and cannot be undone.',
                'confirm' => 'Confirm to Forward',
            ],
        ],
        'document' => [
            'confirm' => [
                'title' => 'Confirm Document',
                'body' => 'Are you sure you would like to confirm and process the document? This decision is final and cannot be undone.',
                'confirm' => 'Confirm',
            ],
        ],

    ],

    'notify' => [
        'approved' => ':Model has been approved. Sender has been notified!',
        'rejected' => ':Model has been rejected. Sender has been notified!',
        'forward' => ':Model has been forwarded. Sender has been notified!',
        'submit' => ':Model has been submitted',
        'add' => ':Model added successfully',
        'create' => ':Model created successfully',
        'edit' => ':Model updated successfully',
        'delete' => ':Model deleted successfully',
        'activate' => 'User account has been activated',
        'deactivate' => 'User account has been deactivated',
        'insufficient_permission' => [
            'title' => 'Insufficient Permissions',
            'body' => 'You don\'t have proper permissions to make this change! Please contact your supervisor.',
        ],
        'monthly_salary' => [
            'fail_generate_list' => 'Please fill date and branch fields.',
        ],
    ],
    'user_notification' => [
        'timeoff_request' => [
            'request_title' => ':user has submitted a new request!',
            'view_request' => 'View Request',

            'no_more_timeoff_title' => 'Maximum Timeoff request',
            'no_more_timeoff_body' => 'Unable to process timeoff request due to maximum Timeoff requests reached for this year.',

            'status' => [
                'approved' => 'Approved',
                'rejected' => 'Rejected',
                'forward' => 'Forwarded',
            ],
            'response_title' => 'Request **#:id** has been **:status**!',
            'response_body' => 'Your request has been **:status**. Click the _view response_ to check it out.',
            'view_response' => 'View Response',
        ],
        'monthly_salary' => [
            'title' => 'Monthly Salary List Review',
            'body' => 'Monthly salary review is forwarded to all :permissions!',
            'view' => 'View Monthly Salary List',
        ],
    ],

    'logs' => [
        'notify' => [
            'title' => 'Something went wrong!',
            'message' => 'An error has been occurred. Please inform your supervisor regarding this matter.',
        ],
    ],

    'errors' => [
        'back_to_home' => 'Click go back to home page',
        'default' => [
            'title' => 'Bad Request',
            'page_title' => 'Bad Request!',
            'description' => 'Something went wrong. If this occurs more than usual, plesae inform your supervisor regarding this issue.',
        ],
        '401' => [
            'title' => '401 Unauthorized',
            'page_title' => '401 Unauthorized Access!',
            'description' => 'Login with your credentials to access this page.',
        ],
        '403' => [
            'title' => '403 Forbidden',
            'page_title' => '403 Access is forbidden',
            'description' => 'You don\'t have proper permission to access this page.',
        ],
        '404' => [
            'title' => '404 Not Found',
            'page_title' => '404 Page Not Found!',
            'description' => 'The page you were trying to reach couldn\'t be found. Make sure you have entered a valid URL.',
        ],
        '500' => [
            'title' => '500 Server Error',
            'page_title' => '500 Internal Server Error!',
            'description' => 'The server couldn\'t be reached. Please contact your supervisor regarding this matter.',
        ],
        '503' => [
            'title' => '503 Maintenance',
            'page_title' => '503 Service is Under Maintenance!',
            'description' => 'Please wait until the maintenance is done.',
        ],
    ],


    'report' => [
        'header' => [
            'heading' => 'کۆمپانیای ئەی پی سۆفت',
            'subheading' => 'بۆ تەکنەلۆژیا و ڕاوێژکاری',
        ],
        'footer' => [
            'address' => 'ناونیشان: شەقامی سلێمانی -  کەرکوک ، پاک سیتی 46001  سلێمانی، عێرا ق ',
            'tel' => 'تەلەفۆن: 07700790009 - 0773 058 6670',
            'email' => 'ئیمەیڵ: contact@ap-soft.tech',
        ],
        'invoice' => [
            'invoice_id' => 'ژمارەی پسووڵە',
            "customer" => "خاوەن خساب",
            "price" => "نرخ",
            "type" => "جۆری پسووڵە",
            "comment" => "تێبینی",
            "installments" => "کۆی قەرز",
            "date" => "بەرواری کڕین",
            "total" => "کۆی گشتی",
            "discount" => "داشکاندن",
            "after_discount" => "کۆی گشتی پاش داشکاندن",
            "upfront_payment" => "بڕی دراو",
            "loan_after_payment" => "بڕی ماوە",
            "total_old_loan" => "قەرزی کۆن",
            "total_loan" => "کۆی قەرز",
            "printer_person" => "چاپکراوە لەلایەن",
            "printer_date" => "بەرواری چاپکردن",
            "dollar_to_dinar" => "کۆی پسووڵە بە دینار",
            "daily_dollar" => "نرخی دۆلار",
            "pays" => "کۆی گشتی پارەدان",
            "recives" => "کۆی گشتی پارەوەرگرتن",
            "buyLoans" => "کۆی گشتی قەرزی کڕین",
            "sellLoans" => "کۆی گشتی قەرزی فرۆشتن",
            "expenses" => "کۆی گشتی خەرجی",
        ],
        "contract" => [
            "owner" => "لایەنی یەکەم: علی حمەامین محمد سعید، بەڕێوەبەری ڕێگەپێدراوی نوێ کار بۆ کاری بیناسازی/سەرەتایی کارەکەی",
            "other_side" => "لایەنی دووەم:",
            "location" => "ناونیشان:",
            "phone" => "ژ. مۆبایل:",
            "type" => "جۆری کار:",
            "contract_title" => "هەردوولا ڕێککەوتوون لەسەر ئەم خاڵانەی خوارەوە:",
        ],
    ],

];
