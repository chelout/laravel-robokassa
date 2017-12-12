<?php

return [
    /**
     * Тестовый режим
     */
    'test_mode' => env('ROBOKASSA_TEST_MODE', true),

    /**
     * Идентификатор магазина
     */
    'shop_id' => env('ROBOKASSA_SHOP_ID'),

    /**
     * Алгоритм расчёта хэша
     */
    'hash_algo' => env('ROBOKASSA_HASH_ALGO', 'md5'),

    /**
     * Параметры проведения тестовых платежей
     * Пароль #1
     */
    'test_password1' => env('ROBOKASSA_TEST_PASSWORD1', ''),

    /**
     * Параметры проведения тестовых платежей
     * Пароль #2
     */
    'test_password2' => env('ROBOKASSA_TEST_PASSWORD2', ''),

    /**
     * Пароль #1
     */
    'password1' => env('ROBOKASSA_PASSWORD1', ''),

    /**
     * Пароль #2
     */
    'password2' => env('ROBOKASSA_PASSWORD2', ''),

    /**
     * ResultURL
     */
    'result_url' => env('ROBOKASSA_RESULT_URL', ''),

    /**
     * SuccessURL
     */
    'success_url' => env('ROBOKASSA_SUCCESS_URL', ''),

    /**
     * FailURL
     */
    'fail_url' => env('ROBOKASSA_FAIL_URL', ''),
];
