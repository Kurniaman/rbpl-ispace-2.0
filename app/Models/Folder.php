<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['folderNama', 'folderSemester', 'folderTotalFiles'];
}