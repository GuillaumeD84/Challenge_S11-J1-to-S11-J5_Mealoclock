<!DOCTYPE html>
<html>

  <head>
    <title>MealOclock - <?= $title ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS du site -->
    <link rel="stylesheet" href="<?= $BASE_PATH; ?>/public/style.css">
  </head>

  <body>
    <!-- $this->insert('partials/nav', ['trololo' => 'voilà voilà']); -->
    <?=$this->insert('partials/header')?>

    <main class="container-fluid">
      <?=$this->section('content')?>
    </main>

    <?=$this->insert('partials/footer')?>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Script Google Map API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2vpvNI0DP4yWAxqJQrthsJQxV3U4qsiQ&libraries=places"></script>

    <!-- Script Geocomplete -->
    <script type="text/javascript" src="<?= $BASE_PATH; ?>/public/jquery.geocomplete.min.js"></script>

    <!-- Script du site -->
    <script type="text/javascript" src="<?= $BASE_PATH; ?>/public/script.js"></script>
  </body>

</html>
