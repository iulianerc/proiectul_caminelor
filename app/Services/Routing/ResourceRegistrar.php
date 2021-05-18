<?php


namespace App\Services\Routing;


use Illuminate\Routing\Route;

class ResourceRegistrar extends \Illuminate\Routing\ResourceRegistrar
{
    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults
        = [
            'index',
            'show',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
            'filters',
            'liveSearch'
        ];

    protected array $routeNameMethods
        = [
            'index'      => 'index.get',
            'create'     => 'create.get',
            'filters'    => 'filters.get',
            'edit'       => 'edit.get',
            'show'       => 'show.get',
            'store'      => 'create.post',
            'update'     => 'edit.patch',
            'destroy'    => 'delete.delete',
            'liveSearch' => 'live_search',
        ];

    /**
     * Get the name for a given resource.
     *
     * @param string $resource
     * @param string $method
     * @param array  $options
     *
     * @return string
     */
    protected function getResourceRouteName($resource, $method, $options)
    {
        $name = $resource;

        // If the names array has been provided to us we will check for an entry in the
        // array first. We will also check for the specific method within this array
        // so the names may be specified on a more "granular" level using methods.
        if (isset($options['names'])) {
            if (is_string($options['names'])) {
                $name = $options['names'];
            } elseif (isset($options['names'][$method])) {
                return $options['names'][$method];
            }
        }

        // If a global prefix has been assigned to all names for this resource, we will
        // grab that so we can prepend it onto the name when we create this name for
        // the resource action. Otherwise we'll just use an empty string for here.
        $prefix = isset($options['as']) ? $options['as'] . '.' : '';

        if (isset($options['name_rewrite']) && $options['name_rewrite'] === true) {
            $method = ($this->routeNameMethods[$method] ?? $method);
        }

        return trim(sprintf('%s%s.%s', $prefix, $name, $method), '.');
    }

    /**
     * Add the store method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return Route
     */
    protected function addResourceFilters($name, $base, $controller, $options): Route
    {
        $uri = $this->getResourceUri($name) . '/filters';

        $action = $this->getResourceAction($name, $controller, 'filters', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the store method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return Route
     */
    protected function addResourceLiveSearch($name, $base, $controller, $options): Route
    {
        $uri = $this->getResourceUri($name) . '/live_search';

        $action = $this->getResourceAction($name, $controller, 'liveSearch', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the show method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceShow($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name) . '/{' . $base . '}/show';

        $action = $this->getResourceAction($name, $controller, 'show', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the destroy method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDestroy($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name);

        $action = $this->getResourceAction($name, $controller, 'destroy', $options);

        return $this->router->delete($uri, $action);
    }
}
