<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'support_tickets';
    protected $fillable = [
        'user_id',
        'sender_username',
        'receiver_username',
        'ticket_subject',
        'last_message',
        'last_time_message',
        'is_read',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
