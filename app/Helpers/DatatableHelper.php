<?php

namespace App\Helpers;

use CodeIgniter\Database\ConnectionInterface;

class DatatableHelper
{
    public static function getDatatablesAndTotal($builder, $config, $params)
    {
        $keyword = $params['keyword'];
        $start = $params['start'];
        $length = $params['length'];
        $order = $params['order'];

        // Searching
        if ($keyword) {
            $builder->groupStart();
            foreach ($config['searchable'] as $column) {
                $builder->orLike($column, $keyword);
            }
            $builder->groupEnd();
        }

        // Sorting
        if ($order && isset($order['column'], $order['dir'])) {
            $columns = $config['orderBy'];
            $builder->orderBy($columns[$order['column']], $order['dir']);
        }

        // Pagination
        if (!empty($start) || !empty($length)) {
            $builder->limit($length, $start);
        }

        // Eksekusi Query
        $data = $builder->get()->getResult();
        $total = $builder->countAllResults(false);

        return [
            'data' => $data,
            'total' => $total,
        ];
    }
}
