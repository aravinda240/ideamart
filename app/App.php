<?php


namespace App;


use App\Category;
use App\Platform;
use App\User;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function platforms(){
        return $this->belongsToMany(Platform::class)->withPivot([
            'sms_subscription_url',
            'sms_default_sender_address',
            'sms_send_address_aliases',
            'sms_short_code',
            'sms_key_word',
            'subscription_url',
            'subscription_app_id',
            'subscription_password',
            'initial_message'
        ]);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
