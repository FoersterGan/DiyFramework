<?php
/**
 * Created by PhpStorm.
 * User: quanjet
 * Date: 2018/6/19
 * Time: 18:29
 */
return array (
    'rootLogger' => array (
        'appenders' => array ('all','error' )
    ),
    'appenders' => array (
        'all' => array (
            'class' => 'LoggerAppenderDailyFile',
            'layout' => array (
                'class' => 'LoggerLayoutPattern',
                'params' => array (
                    'conversionPattern' => '%d{Y-m-d H:i:s.u} [%-5p] %F %C.%M:%L %m %n'
                )
            ),
            'params' => array (
                'datePattern' => 'Ymd',
                'file' => 'log/print_log/log_%s.log',
                'append' => true
            )
        ),
        'error' => array (
            'class' => 'LoggerAppenderDailyFile',
            'layout' => array (
                'class' => 'LoggerLayoutPattern',
                'params' => array (
                    'conversionPattern' => '%d{Y-m-d H:i:s.u} [%-5p] %F %C.%M:%L %m %n'
                )
            ),
            'params' => array (
                'datePattern' => 'Ymd',
                'file' => 'log/print_log/err_%s.log',
                'append' => true
            ),
            'filters' => array (
                array (
                    'class' => 'LoggerFilterLevelRange',
                    'params' => array (
                        'levelMin' => 'warn',
                        'levelMax' => 'fatal'
                    )
                )
            )
        )
    )
);

