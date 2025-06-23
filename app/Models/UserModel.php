<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user_models';

    protected $fillable = ['nama', 'npm', 'kelas_id', 'foto'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}




