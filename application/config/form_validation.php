<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config = [

    'add_article_rules' => [
        [
        'field' => 'article_title',
        'label' => 'Article Title',
        'rules' => 'required'
        ],
        [
        'field' => 'article_body',
        'label' => 'Article Body',
        'rules' => 'required'
        ]
        ],
        'user_registration' => [
            [
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'required|alpha'
            ],
            [
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'required|alpha'
            ],
            [
                'field' => 'username',
                'label' => 'User Name',
                'rules' => 'required|alpha'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[10]'
            ]
        ]
        
    ];

?>