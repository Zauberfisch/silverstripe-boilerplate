<?php
/**
 * 
 */
class LeftJoinFilter extends SearchFilter {
	
    /**
	 * @return $query
	 */
	protected $joinArray;
	
	function __construct($name, $value, $joinArray) {
		parent::__construct($name, $value);
		$this->joinArray = $joinArray;
	}
							
	public function apply(SQLQuery $query) {
		
        $query = $this->applyRelation($query);
		
        foreach ($this->joinArray as $join) {
        	$query = $query->leftJoin($join["table"], $join["onPredicate"]);
        }
        
        
        if ($this->value) {
            return $query->where(sprintf(
                "%s",
                $this->value
            ));    
        }        
        
	}
	
	public function isEmpty() {
        return $this->getValue() == null || $this->getValue() == '';
	}
    
    /**
     * inherited from Searchfilter->getDbName()
     * but here we only want the tablename
     */
  /*  function getDbName() {
        return $this->model;    
    }  */
    
    protected function addRelation($name) {
        //$this->addRelation("Companypaketbuchung");
//        $this->addRelation("Companypaketbuchung");
// $this->relation = array("Companypaketbuchung","Expertenpaketbuchung", "Softwarepaketbuchung", "Dienstleisterpaketbuchung");
//        parent::addRelation($this->relation);
        
        // $this->name = "";
    }
    
}
?>