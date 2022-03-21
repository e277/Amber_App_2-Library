<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\WithPagination;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'title', 'author', 'isbn', 'publication_date', 'amount_owned'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
