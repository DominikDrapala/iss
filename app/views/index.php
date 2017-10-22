<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1><?= $model->getMsg() ?></h1>
<iframe src="//www.google.com/maps/embed/v1/place?q=<?= $model->getLat() ?>,<?= $model->getLng() ?>
      &zoom=4
      &key=AIzaSyAoH2cua3NEhzEO9z9ebLXkl-JAQLSPkGE" width="500" height="500">
</iframe>

    <script>

    </script>
</body>
</html>