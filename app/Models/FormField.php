<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
    protected $fillable = [
        'form_id',
        'label',
        'name',
        'type',
        'placeholder',
        'help_text',
        'is_required',
        'options',
        'validation_rules',
        'order',
        'is_active',
        'settings',
    ];

    protected function casts(): array
    {
        return [
            'is_required' => 'boolean',
            'is_active' => 'boolean',
            'options' => 'array',
            'validation_rules' => 'array',
            'settings' => 'array',
        ];
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function getValidationRulesAttribute($value): array
    {
        $rules = json_decode($value, true) ?? [];

        if ($this->is_required) {
            $rules[] = 'required';
        }

        return $rules;
    }
}
