<?php

namespace App\Helpers;

class RequestHelper
{
    public static function getDatatableRequest()
    {
        return [
            'draw' => $_REQUEST['draw'] ?? '',
            'keyword' => $_REQUEST['search']['value'] ?? '',
            'start' => $_REQUEST['start'] ?? '',
            'length' => $_REQUEST['length'] ?? '',
            'order' => $_REQUEST['order'][0] ?? null,
        ];
    }
}
