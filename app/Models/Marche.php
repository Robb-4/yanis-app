<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\models\Enterprise;

class Marche extends Model
{
    use HasFactory;
    protected $table = 'marches';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'enterprise_id',
        'numero',
        'datedebut',
        'datefin'
    ];

    /**
     * Get the enterprise that owns the Marche
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enterprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise::class);
    }
}
