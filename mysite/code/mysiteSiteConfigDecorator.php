<?php

class mysiteSiteConfigDecorator extends DataObjectDecorator {
	public function extraStatics() {
		return array();
	}
	public function updateCMSFields(FieldSet &$fields) {
		$fields->removeByName('Theme');
	}
}
