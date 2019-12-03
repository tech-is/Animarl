<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = [
    'prov-register' => [
        [
            'field' => 'prov-email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => '%s を入力してください',
                'valid_email' => '正しいアドレスを入力してください'
            ]
        ],
    ],
    'login' => [
        [
            'field' => 'login-email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => '%s を入力してください',
                'valid_email' => '正しいアドレスを入力してください'
            ]
        ],
        [
            'field' => 'login-password',
            'label' => 'パスワード',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '%sを入力してください',
            ]
        ],
    ],
    'forgot-password' => [
        [
            'field' => 'forgot-email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => '%sを入力してください',
                'valid_email' => '正しいアドレスを入力してください'
            ]
        ]
    ],
    'reset-password' => [
        [
            'field' => 'reset-password',
            'label' => 'パスワード',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'confirm-password',
            'label' => 'パスワード再確認',
            'rules' => 'required|matches[reset-password]|trim'
        ]
    ],
    'register' => [
        [
            'field' => 'shop_name',
            'label' => 'ユーザ名',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'shop_kana',
            'label' => 'フリガナ',
            'rules' => 'required|regex_match[/^[ァ-ヾ ]+$/u]|trim',
            'errors' => [
                'required' => '%sを入力してください',
                "regex_match" => "全角カタカナで入力してください。"
            ]
        ],
        [
            'field' => 'shop_email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => '%sを入力してください',
                'valid_email' => '正しいアドレスを入力してください'
            ]
        ],
        [
            'field' => 'shop_tel',
            'label' => '電話番号',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'shop_zip_code',
            'label' => '郵便番号',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'shop_address',
            'label' => '住所',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'shop_password',
            'label' => 'パスワード',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'shop_confirm_pass',
            'label' => 'パスワード再確認',
            'rules' => 'required|matches[shop_password]|trim'
        ]
    ],
    'staff' => [
        [
            'field' => 'staff_name',
            'label' => '名前',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'staff_tel',
            'label' => '電話',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'staff_email',
            'label' => 'メールアドレス',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'staff_color',
            'label' => 'カラーラベル',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'staff_remarks',
            'label' => '備考',
            'rules' => 'trim'
        ]
    ],
    'karte' => [
        [
            'field' => 'karute_title',
            'label' => 'カルテタイトル',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'karute_comment',
            'label' => 'カルテコメント',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'カナを入力してください'
            ]
        ]
    ],
    'total' => [
        [
            'field' => 'customer_name',
            'label' => '名前',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '名前を入力してください'
            ]
        ],
        [
            'field' => 'customer_kana',
            'label' => 'カナ',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'カナを入力してください'
            ]
        ],
        [
            'field' => 'customer_mail',
            'label' => 'メール',
            'rules' => 'required',
            'errors' => [
                'required' => 'メールを入力して下さい'
            ]
        ],
        [
            'field' => 'customer_tel',
            'label' => '電話',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '番号を入力してください'
            ]
        ],
        [
            'field' => 'customer_zip_adress',
            'label' => '郵便番号',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '郵便番号を入力してください'
            ]
        ],
        [
            'field' => 'customer_address',
            'label' => '住所',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '住所を入力してください'
            ]
        ],
        [
            'field' => 'customer_add_info',
            'label' => '追加情報',
            'rules' => 'trim',
        ],
        [
            'field' => 'pet_name',
            'label' => '名前',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '名前を入力してください'
            ]
        ],
        [
            'field' => 'pet_classification',
            'label' => '分類',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'pet_type',
            'label' => '種類',
            'rules' => 'required|trim',
            'errors' => [
                'required' => '種類入力してください'
            ]
        ],
        [
            'field' => 'pet_animal_gender',
            'label' => '性別',
            'rules' => 'required',
            'errors' => [
                'required' => '性別を選択してください'
            ]
        ],
        [
            'field' => 'pet_birthday',
            'label' => '生年月日',
            'rules' => 'trim',
            'errors' => [
                'required' => '入力してください'
            ]
        ],
        [
            'field' => 'pet_contraception',
            'label' => '避妊',
            'rules' => 'trim',
        ],
        [
            'field' => 'pet_body_height',
            'label' => '体高',
            'rules' => 'trim',
        ],
        [
            'field' => 'pet_body_weight',
            'label' => '体重',
            'rules' => 'trim',
        ],
        [
            'field' => 'pet_information',
            'label' => '備考',
            'rules' => 'trim',
        ]
    ]
];
