<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YourEntry extends Model
{
    // In app/Models/YourEntry.php
    protected $fillable = [
        'title',
        'description',
        // Other fields - migrated after
        'requestor',
        'assignee',
        'tags',
        'priority',
    ];
}
