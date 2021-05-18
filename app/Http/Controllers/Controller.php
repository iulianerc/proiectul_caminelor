<?php

namespace App\Http\Controllers;

use App\Http\Requests\LiveSearch\LiveSearchRequest;
use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Exception\NotFoundException;

/**
 *  @OA\Info(
 *     title="INN",
 *     version="1",
 *     x={
 *       "logo": {
 *          "url": "https://intranet.powerit.dev/web/image/website/1/logo/PowerIT?unique=bf692c8",
 *       },
 *     }
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function liveSearch(LiveSearchRequest $request): JsonResponse
    {
        if (!$this->repository instanceof Repository) {
            throw new NotFoundException("Repository {$this->repository} doesn't exists");
        }

        $data = $this->repository->liveSearch(
            $request->fields['text'],
            $request->filter,
            $request->fields,
            $request->route,
            $request->has
        );

        return ok(['items' => $data]);
    }
}
