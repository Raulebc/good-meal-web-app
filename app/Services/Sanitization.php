<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Sanitization service is used to sanitize input of the requests.
 */
class Sanitization
{
    /**
     * Sanitize input.
     * - Remove fields that are not fillable
     * - Sanitize input
     * - Return sanitized input
     *
     * @param Model $model
     * @param array $fields
     * @return array
     */
    public static function sanitize(Model $model, array $fields)
    {
        $input = array_intersect_key($fields, array_flip($model->getFillable()));

        foreach ($fields as $field) {
            $input[$field] = htmlspecialchars($input[$field]);
        }

        return $input;
    }
}
