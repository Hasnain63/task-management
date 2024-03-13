<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'priority',
        'status',
        'user_id',
        'project_id',
        'assignUserId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function priortyOfTask(){
    $priorty=[
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High'
     ];
     return $priorty;

    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignUserId');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
