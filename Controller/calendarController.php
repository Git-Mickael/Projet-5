<?php 
require_once 'View/view.php';

class CalendarController{
    
    public function __construct() {
        
    }
    public function reservation(){
        $view = new AllView("Reservation");
        $view->generate(array());
    }
}