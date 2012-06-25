<?php

class About_Controller extends Base_Controller
{
        public $restful=true;

public function get_index()
        {
                //echo "this is the index page of account";
                return View::make('pages.about');
        }

}

?>
