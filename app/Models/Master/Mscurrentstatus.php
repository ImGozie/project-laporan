<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class Mscurrentstatus extends Model
{
    protected $table = 'currentstatus as a';

    protected $allowedFields = [
        'status',
        'desc',
        'created_date',
        'updated_date'
    ];

    public function datatables()
    {
        return $this->db->table($this->table)
            ->select('a.id, a.status, a.desc, a.created_date, a.updated_date');
    }

    public function getTableConfig()
    {
        return [
            'searchable' => ['status', 'desc'],
            'orderBy' => ['id', 'status', 'desc', 'created_date', 'updated_date'],
        ];
    }

    public function getOne($id = '')
    {
        $x = $this->db->table($this->table);
        if ($id != '') $x->where('id', $id);
        return $x->get()->getRow();
    }

    public function store($data)
    {
        return $this->insert($data);
    }

    public function edit($id, $data)
    {
        $this->db->table($this->table)->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
