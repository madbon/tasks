<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'request' => [
        //     'enableCsrfValidation' => false,
        // ],
    ],
    'modules' => [
        'user' => [
            'class' => 'niksko12\user\Module',
            'enableUnconfirmedLogin'=> true,
            'enableConfirmation' => false,
            'enableFlashMessages'=> false,
            'admins' => ['dilg_@markbon', 'dilg_@akesandiego','markbon'],
            'generalApp'=>true,
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20','192.168.83.*'] // adjust this to your needs
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'rbac' => [
            'class' => 'niksko12\rbac\Module',
        ],
        'auditlogs' => [
            'class' => 'niksko12\auditlogs\Module',
        ],
        'cms' => [
            'class' => 'common\modules\cms\Module',
        ],
        'task' => [
            'class' => 'common\modules\task\Module',
        ],
        'file' => [
            'class' => 'file\FileModule',
            'webDir' => 'files',
            'tempPath' => '@common/uploads/temp',
            'storePath' => '@common/uploads/store',
            'rules' => [
                'maxFiles' => 99,
                'maxSize' => 1024 * 1024 * 4
            ],
        ],
        'admin' => [
            'class' => 'common\modules\admin\Module',
        ],
        'report' => [
            'class' => 'common\modules\report\Module',
        ],
        'upload' => [
            'class' => 'common\modules\upload\Module',
        ],
        'utility' => [
                'class' => 'c006\utility\migration\Module',
        ],
        'ddm' => [
            'class' => 'akesandiego\ddm\Module',
			'intranet_url' => 'https://intranet.dilg.gov.ph'
        ],
        'monitoring' => [
            'class' => 'akesandiego\monitoring\Module',
        ]
    ],

];
