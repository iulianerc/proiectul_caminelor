<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\Status\StatusRepository;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    protected StatusRepository $repository;

    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTyped(string $type): JsonResponse
    {
        return ok($this->repository->getStatusList($type, ['id AS value', 'name AS text', 'color']));
    }
}
