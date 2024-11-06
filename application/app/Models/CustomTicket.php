<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTicket extends Model
{
    use HasFactory;

    protected $table   = "ctickets";
    protected $with    = ['status','loadType','goods'];
    protected $guarded = [];
    

    public function status()
    {
        return $this->belongsTo('App\Models\CTicketStatus', 'ticket_status_id', 'id');
    }

    public function loadType()
    {
        return $this->belongsTo('App\Models\CTicketLoadType', 'ticket_loadtype_id', 'id');
    }

    public function goods()
    {
        return $this->hasMany('App\Models\CTicketGood', 'ticket_id', 'id');
    }

    public function setpickupRemarksAttribute($value)
    {   
       
        $this->attributes['pickupRemarks'] = json_encode($value);
    }

    public function setdeliveryRemarksAttribute($value)
    {
        $this->attributes['deliveryRemarks'] = json_encode($value);
    }

    public function setOriginAttribute($value)
    {
        $this->attributes['origin'] = json_encode($value);
    }

    public function setDestinationAttribute($value)
    {
        $this->attributes['destination'] = json_encode($value);
    }

    public function setAssignedAttribute($value)
    {
        $this->attributes['assigned'] = json_encode($value);
    }

    public function getPickupRemarksAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getDeliveryRemarksAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getOriginAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getDestinationAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getAssignedAttribute($value)
    {
        return json_decode($value, true);    
    }


    
    public function assignedUsers()
    {
        // Get the assigned user IDs (an array)
        $assignedIds = $this->assigned ?? [];
        // Fetch users based on the assigned user IDs
        return User::whereIn('id', $assignedIds)->get();
    }

    
}

