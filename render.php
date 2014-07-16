<?php

  //include the inset rendering library
  require('lib/inset.php');

  //create a new inset
  $inset = new inset();

  //render the inset
  $rendered_inset = $inset->render('http://dynamic-insets.s3.amazonaws.com/example/inset.json');
  //output the inset
  echo $rendered_inset;
