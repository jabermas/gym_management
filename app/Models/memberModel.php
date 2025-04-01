<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MemberModel extends Model
{

    protected $table = 'members';

    public function getMemberModel()
    {
        return DB::select('SELECT * FROM members');
    }

    public function updateMemberModel($id, $name, $date_of_joined, $email, $number, $plan, $price)
    {
        DB::update('UPDATE members SET name = ?, date_of_joined = ?, email = ?, contact = ?, plan = ?, price = ? WHERE id = ?', 
        [$name, $date_of_joined, $email, $number, $plan, $price, $id]);
    }

    public function deleteMemberModel($id)
    {
        DB::delete('DELETE FROM members WHERE id = ?', [$id]);
    }
}
