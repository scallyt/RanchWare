<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceOnUser extends Model
{
    use HasFactory;

    protected $table = 'workspace_on_user';
    protected $fillable = ['userId', 'workspaceId'];
    public $timestamps = true;
}
