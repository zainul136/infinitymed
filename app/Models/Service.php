<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image'];

    public function question(): HasMany
    {
       return $this->hasMany(Question::class,);
    }
    public function weightLoss(): HasMany
    {
       return $this->hasMany(WeightLoss::class,);
    }
    public function products(): HasMany
    {
       return $this->hasMany(Product::class,);
    }

}
