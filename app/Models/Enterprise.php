<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Marche;

class Enterprise extends Model
{
    use HasFactory;
    protected $table = 'enterprises';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'marche',
        'number',
        'numberref',
        'numberastr'
    ];
    /**
     * Get all of the marches for the Enterprise
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marches(): HasMany
    {
        return $this->hasMany(Marche::class);
    }

    /**
     * The works that belong to the Enterprise
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function works(): BelongsToMany
    {
        return $this->belongsToMany(Work::class);
    }
}
