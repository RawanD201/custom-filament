<?php

return [

    'app.name' => 'Apsoft',
    'dashboard' => 'Dashboard',
    'nav' => [
        'group' => [
            'buy' => 'Buy',
            'sell' => 'Sell',
            'management' => 'Management',
            'settings' => 'Settings',
            'expenses' => 'Expenses',
            'loans' => 'Loan Reports',
            'report' => 'Reports',
        ],

        'user_menu' => [
            'lock_screen' => 'Lock Screen',
            'settings' => 'Settings',
        ],
        'dashboard' => 'Dashboard',
    ],

    'users' => [
        'list' => 'Users',
        'create' => 'New User',
        'edit' => 'Edit User',
    ],

    'type' => [
        'waiting' => 'Waiting',
        'approve' => 'Approve',
    ],

    'notify' => [
        'activate' => 'User account has been activated',
        'deactivate' => 'User account has been deactivated',
    ],

    "expense" => [
        "type" => [
            "public" => "Public",
            "private" => "Private",
            "shared" => "Shared",
        ]
    ],


    'customer' => [
        'type' =>
        [
            'sell' => 'Sell',
            'buy' => 'Buy',
            'sell_and_buy' => 'Sell and Buy',
        ],
        'payment' => [
            'cash' => 'Cash',
            'loan' => 'Loan',
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
            'heading' => 'APsoft Company',
            'subheading' => 'For Technology and Consultation',
        ],
        'footer' => [
            'address' => 'Location: Sulaimani - Kirkuk Street/Sulaimani - Pak City 46001 As Sulaymaniyah, Iraq',
            'tel' => 'Phone Number: 07700790009 - 0773 058 6670',
            'email' => 'Email: contact@ap-soft.tech',
        ],
        'invoice' => [
            'invoice_id' => 'Invoice Number',
            "customer" => "Customer Name",
            "price" => "Price",
            "type" => "Invoice Type",
            "comment" => "Comment",
            "installments" => "Total Installments",
            "date" => "Buy Date",
            "total" => "Total",
            "discount" => "Discount",
            "after_discount" => "After Discount",
            "upfront_payment" => "Upfront Payment",
            "loan_after_payment" => "Loan After Payment",
            "total_old_loan" => "Total Old Loan",
            "total_loan" => "Total Loan",
            "printer_person" => "Printed By",
            "printer_date" => "Printed Date",
            "dollar_to_dinar" => "Total Invoice in Dinar",
            "daily_dollar" => "Daily Dollar Rate",
            "pays" => "Total Pays",
            "recives" => "Total Recives",
            "buyLoans" => "Total Buy Loans",
            "sellLoans" => "Total Sell Loans",
        ],
        "contract" => [
            "owner" => "Fist side: Ali Hama Amin Mohammed Saeed, New Authorized Manager of Construction/Primary Works",
            "other_side" => "The second side:",
            "location" => "Location:",
            "phone" => "Phone Number:",
            "type" => "Type of work:",
            "contract_title" => "Both sides have agreed on the following points:",
        ],
    ],

];
