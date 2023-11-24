<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;
    protected $table = "reseps";    
    protected $guarded = ["id"];
    
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

}
