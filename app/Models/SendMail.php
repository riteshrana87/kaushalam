<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;

    protected $table = 'send_mail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to_mail',
        'subject',
        'content',
    ];
}
