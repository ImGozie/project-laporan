<?php

namespace App\Helpers;

use CodeIgniter\Database\ConnectionInterface;

class DatatableHelper
{
    public static function getDatatablesAndTotal($table, $keyword = null, $start = 0, $length = 0, $order = null, $searchable = [], $orderBy = [] ) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        // search
        if ($keyword) {
            $spaceFilter = explode(' ', $keyword);
            foreach ($spaceFilter as $filter) {
                foreach ($searchable as $column) {
                    $builder = $builder->orLike($column, $filter);
                }
            }
        }
        // ordering
        if ($order && isset($order['column']) && isset($order['dir'])) {
            $columnIndex = $order['column'];
            $direction = $order['dir'];
            $builder->orderBy($orderBy[$columnIndex] ?? '', $direction);
        }
        // Pagination: limit dan offset
        if (!empty($start) || !empty($length)) {
            $builder = $builder->limit($length, $start);
        }
        $data = $builder->get()->getResult();
        $total = $builder->countAllResults();
        return [
            'data' => $data,
            'total' => $total
        ];
    }
}
