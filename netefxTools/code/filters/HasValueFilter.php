<?php
/**
 * Selects content that has a value OR on the other Hand is NULL
 */
class HasValueFilter extends SearchFilter {
	
	/**
	 * @return $query
	 */
	public function apply(SQLQuery $query) {
		
        $query = $this->applyRelation($query);
		
        if ($this->value) {
            return $query->where(sprintf(
                "%s IS NOT NULL",
                $this->getDbName()
            ));    
        }
        else {
            return $query->where(sprintf(
                "%s IS NULL",
                $this->getDbName()
            ));    
        }
        
	}
	
	public function isEmpty() {
        return $this->getValue() == null || $this->getValue() == '';
	}
}
?>