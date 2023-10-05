<?php

return [

    'app.name' => 'شركة ئەی بی سوفت',
    'dashboard' => 'لوحة القيادة',
    'nav' => [
        'group' => [
            'buy' => 'شراء',
            'sell' => 'بيع',
            'management' => 'الإدارة',
            'settings' => 'الإعدادات',
            'expenses' => 'المصروفات',
            'loans' => 'تقارير القروض',
            'report' => 'التقارير',
        ],

        'user_menu' => [
            'lock_screen' => 'قفل الشاشة',
            'settings' => 'الإعدادات',
        ],
        'dashboard' => 'لوحة القيادة',
    ],

    'users' => [
        'list' => 'المستخدمين',
        'create' => 'مستخدم جديد',
        'edit' => 'تحرير المستخدم',
    ],

    'type' => [
        'waiting' => 'انتظار',
        'approve' => 'الموافقة',
    ],

    'notify' => [
        'activate' => 'لقد تم تفعيل حساب المستخدم',
        'deactivate' => 'تم إلغاء تنشيط حساب المستخدم',
    ],

    "expense" => [
        "type" => [
            "public" => "عام",
            "private" => "خاص",
            "shared" => "مشترك",
        ]
    ],



    'customer' => [
        'type' =>
        [
            'sell' => 'بيع',
            'buy' => 'شراء',
            'sell_and_buy' => 'بيع وشراء',
        ],
        'payment' => [
            'cash' => 'نقدي',
            'loan' => 'قرض',
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
            'heading' => 'شركة ئەی بی سوفت',
            'subheading' => 'للتكنولوجيا والاستشارات',
        ],
        'footer' => [
            'address' => 'عنوان:السليمانية - شارع كركوك - مدينة باك 46001 السليمانية، العراق',
            'tel' => 'رقم التليفون: 07700790009 - 0773 058 6670',
            'email' => 'بريد إلكتروني: contact@ap-soft.tech',
        ],
        'invoice' => [
            'invoice_id' => "رقم الفاتورة",
            "customer" => "العميل",
            "price" => "السعر",
            "type" => "نوع",
            "comment" => "ملاحظة",
            "installments" => "مجموع الدين",
            "date" => "تاريخ الشراء",
            "total" => "المجموع",
            "discount" => "الخصم",
            "after_discount" => "بعد الخصم",
            "upfront_payment" => "المبلغ المقدم",
            "loan_after_payment" => "المبلغ المتبقي",
            "total_old_loan" => "الدين القديم",
            "total_loan" => "مجموع القرض",
            "printer_person" => "شخص الطابعة",
            "printer_date" => "تاريخ الطابعة",
            "dollar_to_dinar" => "الدولار إلى الدينار",
            "daily_dollar" => "daily_dollar",
            "pays" => "مجموع يدفع",
            "recives" => "مجموع الواردة",
            "buyLoans" => "إجمالي قروض الشراء",
            "sellLoans" => "إجمالي بيع القروض",
        ],
        "contract" => [
            "owner" => "الطرف الأول: علي حمه أمين محمد سعيد مدير معتمد جديد للإنشاءات والأعمال الأولية",
            "other_side" => "الجانب الثاني:",
            "location" => "موقع:",
            "phone" => "رقم الهاتف:",
            "type" => "نوع العمل:",
            "contract_title" => "وقد اتفق الجانبان على النقاط التالية:",
        ],


    ],

];
