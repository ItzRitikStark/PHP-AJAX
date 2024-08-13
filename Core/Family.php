<?php
class Family{
    private $id, $first_name,$last_name,$hometown,$age,$job;
    public function __construct($id, $first_name,$last_name,$hometown,$age,$job){
   $this->id = $id;
   $this->first_name = $first_name;
   $this->last_name = $last_name;
   $this->hometown = $hometown;
   $this->age = $age;
   $this->job = $job;
  
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getfirst_name(){
        return $this->first_name;
    }
    public function setfirst_name($first_name){
        $this->first_name = $first_name;
    }
    public function getlast_name(){
        return $this->last_name;
    }
    public function setlast_name($last_name){
        $this->last_name = $last_name;
    }
    public function gethometown(){
        return $this->hometown;
    }
    public function sethometown($hometown){
        $this->hometown = $hometown;
    }
    public function getage(){
        return $this->age;
    }
    public function setage($age){
        $this->age = $age;
    }
    public function getjob(){
        return $this->job;
    }
    public function setjob($job){
        $this->job = $job;
    }
    
}   


?>