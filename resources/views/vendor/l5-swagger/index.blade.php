<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('l5-swagger.api.title')}}</title>
    <style>
        [data-section-id="section/Authentication"], [data-item-id="section/Authentication"] {
            display: none;
        }

    </style>
</head>
<body>
<div id="redoc-container"></div>
<script src="//cdn.jsdelivr.net/npm/redoc@next/bundles/redoc.standalone.js"></script>
<script src="/js/tryConfig.js"></script>
<script src="/js/try.js"></script>
<script>
    initTry(`/docs/api-docs.json`)
</script>
</body>
</html>