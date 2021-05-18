<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\HtmlPage\HtmlPageRequest;
use App\Http\Resources\HtmlPage\HtmlPageResource;
use App\Http\Resources\MainResourceCollection;
use App\Models\HtmlPage\HtmlPage;
use App\Repositories\HtmlPage\HtmlPageRepository;
use App\Templates\HtmlPage\HtmlPageFilter;
use App\Templates\HtmlPage\HtmlPageForm;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;

class HtmlPageController extends Controller
{
    protected HtmlPageRepository $repository;

    public function __construct(HtmlPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(
            new MainResourceCollection(
                $this->repository->get(),
                HtmlPageResource::class,
                'id'
            )
        );
    }

    public function filters(HtmlPageFilter $filters): JsonResponse
    {
        $filters->schema()->applyPermissions();
        return ok($filters->build());
    }

    public function create(HtmlPageForm $form): JsonResponse
    {

        return ok($form->build());
    }

    public function store(HtmlPageRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $item = HtmlPage::create($attributes);

        return created($item);
    }

    public function edit(HtmlPage $htmlPage, HtmlPageForm $form): JsonResponse
    {

        $form->dataObject()->set($htmlPage);

        return ok($form->build());
    }

    public function update(HtmlPageRequest $request, HtmlPage $htmlPage): JsonResponse
    {
        Helper::checkConcurrentRequests($htmlPage);
        $attributes = $request->only($this->repository->getFillable());

        $htmlPage->update($attributes);

        return updated($htmlPage);
    }

    public function destroy(Request $request): ?JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->repository->deleteIn($request->id);
            DB::commit();
            return destroyed();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }

    public function page(string $alias)
    {
        return ok($this->repository->getPage($alias));
    }

}
