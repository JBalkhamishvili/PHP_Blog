<?php

namespace App\Lib;
/**
 * Class Response
 * @package App\Lib
 */
class Response
{
    private $status = 200;

    /**
     * @param int $code
     * @return $this
     */
    public function status(int $code)
    {
        $this->status = $code;
        return $this;
    }

    /**
     * @param array $data
     */
    public function toJSON($data = [])
    {
        http_response_code($this->status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}