<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocalizationService
{
    public function __invoke(string $directory, string $file = null): JsonResponse
    {
        try {
            if ($file) {
                $localization = $this->getFromFile($directory, $file);
            } else {
                $localization = $this->getFromDirectory($directory);
            }

            if (!($localization && is_array($localization))) {
                throw new NotFoundHttpException(__('global/localization.not_found'));
            }
        } catch (NotFoundHttpException $exception) {
            return destroyed(['message' => $exception->getMessage()]);
        }

        return ok($localization);
    }

    private function getFromDirectory(string $directory): array
    {
        $localizationPath = App::langPath() . DIRECTORY_SEPARATOR . App::getLocale();
        $path = $localizationPath . DIRECTORY_SEPARATOR . $directory;
        if (!is_dir($path)) {
            throw new NotFoundHttpException(__('global/localization.not_found'));
        }
        $localization = [];
        foreach (scandir($path) as $fileName) {
            $path = sprintf(
                '%s%s%s%s%s',
                $localizationPath,
                DIRECTORY_SEPARATOR,
                $directory,
                DIRECTORY_SEPARATOR,
                $fileName
            );

            if (!is_file($path)) {
                continue;
            }

            $fileName = Str::before($fileName, '.php');
            $localization[$fileName] = __($directory . DIRECTORY_SEPARATOR . $fileName);
        }

        return $localization;
    }

    private function getFromFile(string $directory, string $file)
    {
        return __($directory . DIRECTORY_SEPARATOR . $file);
    }
}
