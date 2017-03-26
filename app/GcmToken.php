<?php

namespace Acacha\TodosBackend;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GcmToken.
 *
 * @package Acacha\TodosBackend
 */
class GcmToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registration_id'
    ];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
