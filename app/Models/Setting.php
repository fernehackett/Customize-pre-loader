<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'loader_id',
        'active',
        'background_hex',
        'loader_time',
        'script_tag_id',
    ];

    protected $casts= [
        'active' => 'boolean'
    ];

    public function loader()
    {
        return $this->belongsTo(Loader::class);
    }
}
