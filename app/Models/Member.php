<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory;

    protected $table = "members";

    protected $fillable = [
        'fname', 'lname', 'join_date', 'address', 'phoneNo', 'email'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function loan(): HasOne
    {
        return $this->hasOne(Loan::class);
    }

    public function getFullNameAttribute(): String
    {
        return "{$this->fname} {$this->lname}";
    }
}
