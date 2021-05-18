<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Resources\Employee\EmployeeEditResource;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Employee\EmployeeResourceCollection;
use App\Models\Employee\Employee;
use App\Repositories\Employee\EmployeeRepository;
use App\Traits\Validation\BasicValidator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Merax\Helpers\Helper;
use Throwable;

class EmployeeController extends Controller
{
    use BasicValidator;

    public EmployeeRepository $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new EmployeeResourceCollection(
            $this->repository->get(),
            EmployeeResource::class,
            'id'
        ));
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        $signature = $request->file('signature');
        $employee = $this->repository->create($request->all(), $signature);
        return created($employee);
    }

    public function edit(Employee $employee): JsonResponse
    {
        return ok(new EmployeeEditResource($employee));
    }

    public function update(EmployeeRequest $request, Employee $employee): JsonResponse
    {
        Helper::checkConcurrentRequests($employee);
        $employee = $this->repository->update($request->all(), $employee, $request->signature);

        return updated($employee);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            $employee = Employee::find($request->id ?? 0);
            $this->repository->delete($employee);

            return destroyed();
        } catch (Throwable $throwable) {
            failed_dependency(__('validation.status_codes.failed_dependency'));
        }
    }
}
