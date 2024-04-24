<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Game extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'sorting',
        'active',
        'credit_cost'
    ];

    public function creditLogs(): HasMany
    {
        return $this->hasMany(CreditLog::class);
    }

    public function getTimesPlayed()
    {
        return $this->creditLogs->count();
    }

    public function getThumbnail(){
        if(!$this->hasMedia('thumbnail')){
            return asset('imgs/image-placeholder.png');
        }else{
            return $this->getFirstMediaUrl('thumbnail');
        }
    }

    public function saveThumbnail($file){
        $this->clearMediaCollection('thumbnail');
        $this->addMedia($file)->toMediaCollection('thumbnail');

        return $this->getFirstMediaUrl('thumbnail');
    }
}
