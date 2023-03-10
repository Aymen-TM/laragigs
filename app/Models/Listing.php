<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;
    //protected $fillable  = ["title","company","email","description","tags","website","location"];

    public function scopeFilter($query,array $filter){
        // if this is not fals than move on
        if($filter['tag'] ?? false){
         $query->where('tags','like','%' . request('tag') . '%');
        }
        if($filter['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')
            ->orWhere('description','like','%' . request('search') . '%')
            ->orWhere('tags','like','%' . request('search') . '%');
        }
    }

    //Relationship to user
    public function user(){
        return $this->BelongsTo(User::class,"user_id");
    }


}
