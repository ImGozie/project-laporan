<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class Msjurusan extends Model
{
    protected $table = 'jurusan as a';

    protected $allowedFields = [
        'majorname',
        'created_date',
        'updated_date'
    ];

    public function datatables()
    {
        return $this->db->table($this->table)
            ->select('a.id, a.majorname, a.created_date, a.updated_date');
    }

    public function getTableConfig()
    {
        return [
            'searchable' => ['majorname'],
            'orderBy' => ['id', 'majorname', 'created_date', 'updated_date'],
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

    public function getSelect($search, $limit = 15)
    {
        $query = $this->db->table($this->table)
            ->select('id, majorname');
        if (!empty($search)) {
            $query->like('lower(majorname)', strtolower($search));
        }
        return $query->limit($limit)->get()->getResultArray();
    }
}
