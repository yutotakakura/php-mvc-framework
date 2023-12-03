<?php
declare(strict_types=1);

namespace app\core;

class Responce
{
    /**
     * Set status code to http responce
     *
     * @param integer $code
     * @return void
     */
    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }
}