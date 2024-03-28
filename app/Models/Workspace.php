<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $table = 'workspaces';

    protected $fillable = ['name', 'ownerId', 'code'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
