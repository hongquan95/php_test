<?php

namespace App;

class Config
{
/**
     * Database host
     * @var string
     */
    const DB_HOST = '127.0.0.1';
    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'test1';
    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';
    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'root';
    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    const STATUS = [
        1 => 'Planning',
        2 => 'Doing',
        3 => 'Complete',
    ];
    const STATUS_LABEL = [
        1 => 'primary',
        2 => 'warning',
        3 => 'success',
    ];
}
