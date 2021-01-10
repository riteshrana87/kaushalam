<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpInformation extends Model
{
    use HasFactory;

    protected $table = 'smtp_information';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name',
        'smtp_driver',
        'smtp_host',
        'smtp_port',
        'username',
        'smtp_password',
        'from_smtp_encryptionname',
        'from_email',
    ];

}
