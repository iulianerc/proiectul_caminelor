<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use App\Repositories\Project\ProjectRepository;
use Illuminate\Http\JsonResponse;

class AppController extends Controller
{
    private const DEFAULT_LAYOUT = 'default';

    public function config(ProjectRepository $projectRepository): JsonResponse
    {
        $domain = Project::getOriginDomain(request()->headers->get('origin') ?? 'localhost');
        $project = $projectRepository->getProject($domain);
        return ok([
            'theme'   => $project->layout->path ?? self::DEFAULT_LAYOUT,
            'name'    => $project->name,
            'logo'    => $project->getLogoLinkAttribute(),
            'project' => [
                'domain' => $project->domain,
                'client' => $project->client
            ]
        ]);
    }

    public function test()
    {
    }

}
