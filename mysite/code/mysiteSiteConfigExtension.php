<?php

/**
 * Extension to modify SiteConfig
 * @property SiteConfig owner
 */
class mysiteSiteConfigExtension extends DataExtension {
	private static $db = array();
	private static $has_one = array();
	private static $has_many = array();
	private static $many_many = array();
	private static $defaults = array();
	private static $belongs_many_many = array();
	private static $searchable_fields = array();
	private static $summary_fields = array();

	public function updateCMSFields(FieldList $fields) {
		$fields->removeByName('Theme');
		return $fields;
	}
}
