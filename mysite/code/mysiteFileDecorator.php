<?php

class mysiteFileDecorator extends DataObjectDecorator {
	public function fileExists() {
		if ($this->owner->exists() && file_exists($this->owner->getFullPath()))
			return true;
		return false;
	}
}