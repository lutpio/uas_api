<?php

namespace App\Models;

use App\Models\Resep;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategoris";
    protected $guarded = ["id"];

    public function resep(): HasMany
    {
        return $this->hasMany(Resep::class);
    }
}
