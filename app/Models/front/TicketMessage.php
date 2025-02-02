<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ticket_id', 'message', 'file', 'sender_type'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
