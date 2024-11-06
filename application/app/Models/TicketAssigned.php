<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAssigned extends Model
{
    use HasFactory;

    protected $table   = "ticket_assigned";

    protected $fillable = ['ticket_id','user_id'];
}
