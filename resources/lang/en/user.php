<?php

return [
    'user' => [
        'title' => [
            'title' => 'Users',
            'info' => 'User info',
            'list_of_users' => 'List of users',
            'confirm_disable' => 'Do you want to delete this user?',
        ],
        'options' => [
            'import' => 'Import',
            'export' => 'Export',
            'show' => 'Show',
            'update' => 'Update',
            'back' => 'Back',
            'enable' => 'Enable',
            'disable' => 'Disable',
        ],
        'fields' => [
            'id' => '#',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'company' => 'Company',
            'address' => 'Address',
            'phone' => 'Phone',
            'identification' => 'Identification',
            'role' => 'Role',
            'disabled_at' => 'Disabled At',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ],
    ],
    'role' => [
        'title' => [
            'title' => 'Roles',
            'name' => 'Name',
            'permission_list' => 'Permission List',
            'list_of_roles' => 'List of Roles',
        ],
        'options' => [
            'back' => 'Back',
            'import' => 'Import',
            'export' => 'Export',
            'create' => 'Create',
            'show' => 'Show',
            'update' => 'Update',
            'delete' => 'Delete',
        ],
        'fields' => [
            'id' => '#',
            'name' => 'Name',
        ],
    ],
];
