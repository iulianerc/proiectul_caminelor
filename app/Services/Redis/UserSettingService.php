<?php


namespace App\Services\Redis;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Exception\NotFoundException;
use TypeError;

class UserSettingService
{
    public function all(): JsonResponse
    {
        return ok(user()->settings()->all());
    }

    public function get(string $key): JsonResponse
    {
        return ok(user()->settings()->get($key));
    }

    public function getMultiple(Request $request): JsonResponse
    {
        if (!$request->has('keys')) {
            throw new NotFoundException("Required parameter 'keys' not found");
        }

        if (!is_array($request->keys)) {
            throw new TypeError("Required parameter 'keys' must be an array");
        }

        return ok(user()->settings()->getMultiple($request->keys));
    }

    public function apply(Request $request): JsonResponse
    {
        user()->settings()->apply($request->post());
        return created();
    }

    public function set(Request $request): JsonResponse
    {
        if (!$request->has('key')) {
            throw new NotFoundException("Required parameter 'key' not found");
        }

        if (!$request->has('value')) {
            throw new NotFoundException("Required parameter 'value' not found");
        }

        if (!is_string($request->key)) {
            throw new TypeError("Required parameter 'key' must be a string");
        }

        user()->settings()->set($request->key, $request->value);
        return updated();
    }

    public function setMultiple(Request $request): JsonResponse
    {
        user()->settings()->setMultiple($request->post());
        return updated();
    }

    public function delete(string $key): JsonResponse
    {
        user()->settings()->delete($key);
        return destroyed();
    }

    public function deleteMultiple(Request $request): JsonResponse
    {
        if (!$request->has('keys')) {
            throw new NotFoundException("Required parameter 'keys' not found");
        }

        if (!is_array($request->keys)) {
            throw new TypeError("Required parameter 'keys' must be an array");
        }

        user()->settings()->deleteMultiple($request->keys);
        return destroyed();
    }

    public function clear(): JsonResponse
    {
        user()->settings()->clear();
        return destroyed();
    }
}