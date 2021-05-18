<?php


namespace App\Http\Resources\Notification;


use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationResourceCollection extends ResourceCollection
{
    public function __construct($resource, string $resourceClass = NotificationResource::class)
    {
        $this->collects = $resourceClass;
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        $page = $request->page['number'] ?? 1;
        $perPage = $request->per_page['size'] ?? 15;
        $paginator = $this->getPaginator($page, $perPage, $this->collection, $request);

        return [
            'data'      => $this->collection->forPage($page, $perPage),
            'paginator' => $paginator,
        ];

    }

    private function getPaginator($page, $perPage, $collection, $request): array
    {

        $items = $this->collection->count();
        $pages = $items < $perPage ? 1 : ceil($items / $perPage);

        return [
            'current_page' => (int)$page,
            'pages'        => $pages,
            'next_page'    => $page < $pages ? $page + 1 : $pages,
            'prev_page'    => $page > 1 ? $page - 1 : 1,
        ];
    }
}
