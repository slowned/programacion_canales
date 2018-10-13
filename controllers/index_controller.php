<?php
class IndexController extends BaseController
{
  public function index($request)
  {
    return $this->render('home/index');
  }
}

?>
