<?php
class CustomFilter extends SearchFilter {
    
    function __construct($fullName, $value=false) {
        $this->fullName = $fullName;
        $this->name = $fullName;
        $this->value = $value;
    }
    
    public function apply(SQLQuery $query) {
        
        $query = $this->applyRelation($query);
        
        if ($this->value) {
            
            //fb::log($this->value,"this->value");
//            fb::log($this->name,"this->name");
//            fb::log($this->getDbName(),"this->getDbName()");
            
            return $query->where($this->name);     
        }
        
    }
    
    function getDbName() {
        return $this->model;
    }
    
    public function isEmpty() {
        return $this->getValue() == null || $this->getValue() == '';
    }
    
}
