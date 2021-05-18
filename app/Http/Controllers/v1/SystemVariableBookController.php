<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SystemVariableBook\SystemVariableBookRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\SystemVariableBook\SystemVariableBookResources;
use App\Models\SystemVariableBook\SystemVariableBook;
use App\Repositories\SystemVariableBook\SystemVariableBookRepository;
use Merax\Helpers\Helper;
use Throwable;
use Illuminate\Http\Request;

class SystemVariableBookController extends Controller
{
    protected SystemVariableBookRepository $repository;

    public function __construct(SystemVariableBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            SystemVariableBookResources::class,
            'id'
        ));
    }

    public function store(SystemVariableBookRequest $request)
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(SystemVariableBook::create($attributes));
    }

    public function edit(SystemVariableBook $systemVariableBook)
    {
        return ok(new SystemVariableBookResources($systemVariableBook));
    }

    public function update(SystemVariableBookRequest $request, SystemVariableBook $systemVariableBook)
    {
        Helper::checkConcurrentRequests($systemVariableBook);
        $attributes = $request->only($this->repository->getFillable());
        $systemVariableBook->update($attributes);

        return updated($systemVariableBook);
    }

    public function destroy(Request $request)
    {
        try {
            SystemVariableBook::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
