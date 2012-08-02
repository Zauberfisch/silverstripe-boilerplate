<?php
/**
 * This filter selects content that has a relation to another Table
 * normally you could do this with a checkbox searchfield
 * but if you have e.g. 5 foreignkeys you can make a dropdownlist for filtering 
 */
class HasRelationFilter extends SearchFilter {
	
	/**
	 * @return $query
	 */
	public function apply(SQLQuery $query) {
		
        $query = $this->applyRelation($query);
		
        if ($this->value) {
            return $query->where(sprintf(
                "%s.%s > 0",
                $this->getDbName(),
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
    function getDbName() {
        return $this->model;
    }
}
?>