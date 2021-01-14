<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * @param User $user
     * @return bool|null
     */
    public function isAuthor(User $user): ?bool{
        if(!empty($this->deleted_at)){
            return null;
        }

        return $this->users()->where('id', $user->id)->exists();
    }
}
