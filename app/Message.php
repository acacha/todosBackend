<?php

namespace Acacha\TodosBackend;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message.
 *
 * @package App
 */
class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message'
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
