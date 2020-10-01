<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=bloginfo('name');?></title>
    <link rel="stylesheet" href="<?=bloginfo('template_url')?>/css/font-awesome.min.css" crossorigin="anonymous">
  
     <link rel="stylesheet" href="<?=bloginfo('template_url')?>/css/bootstrap.min.css" crossorigin="anonymous">
  
  <link rel="stylesheet" href="<?=bloginfo('template_url');?>/css/bootstrap-themes.css">
</head>
<body>

<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary ht-tm-element">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#!">Navbar</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">

          <?=wp_nav_menu(array('theme_location' => 'parimary'));?>
            </li>
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
        </form>
      </div>
    </nav>
<!-- end Navbar  -->
<div class="container">

</div>
</body>
</html>