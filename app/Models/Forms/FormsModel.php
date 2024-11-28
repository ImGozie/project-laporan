<?php

namespace App\Models\Forms;

use CodeIgniter\Model;

class FormsModel extends Model
{
    protected $table = 'submittedform as a';

    protected $allowedFields = [
        'nis',
        'fullname',
        'graduationyear',
        'majorid',
        'phonenumb',
        'socialmedia',
        'currentstatusid',
        'jobinfoid',
        'currentjobfrom',
        'submit_by',
        'submit_date',
    ];

    public function datatables()
    {
        return $this->db->table($this->table)
            ->select('a.*, b.majorname, c.status, d.info, u.username, u.email')
            ->join('jurusan as b', 'b.id = a.majorid')
            ->join('currentstatus as c', 'c.id = a.currentstatusid')
            ->join('jobinfo as d', 'd.id = a.jobinfoid')
            ->join('users as u', 'u.userid = a.submit_by');
    }

    public function getTableConfig()
    {
        return [
            'searchable' => ['nis', 'fullname'],
            'orderBy' => [
                'id',
                'nis',
                'fullname',
                'graduationyear',
                'majorid',
                'phonenumb',
                'socialmedia',
                'currentstatusid',
                'jobinfoid',
                'currentjobfrom',
                'submit_by',
                'submit_date',
            ],
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
