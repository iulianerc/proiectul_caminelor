<?php


namespace App\Traits\Validation;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait BasicValidator
 * @package App\Traits\Validation
 */
trait BasicValidator
{
    /**
     * @param  array  $data
     * @param  array  $rules
     * @return JsonResponse
     */
    protected function validateData(array $data, array $rules): JsonResponse
    {
        try {
            Validator::make($data, $rules)->validate();

            return response()->json(true);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors'  => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
