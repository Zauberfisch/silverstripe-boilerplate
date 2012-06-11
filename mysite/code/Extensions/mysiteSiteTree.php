<?php

class mysiteSiteTree extends DataExtension {
    
    public function extraStatics() {
        return array(
            'db' => array(
                "EnableGoogleAnalytics" => "Enum('Yes, No, Inherit', 'Inherit')"
            ),
            'defaults' => array("EnableGoogleAnalytics" => "Inherit")
        );
    }
    
    public function updateSettingsFields(FieldList $fields) {
        
        $enableGoogleAnalyticsField = new OptionsetField("EnableGoogleAnalytics", _t('mysiteSiteTree.GoogleAnalyticsHeader', "Enable Google Analytics?"));
        
        $enableGoogleAnalyticsOptionsSource = array();
        $enableGoogleAnalyticsOptionsSource["Inherit"] = _t('SiteTree.INHERIT', "Inherit from parent page");
        $enableGoogleAnalyticsOptionsSource["Yes"] = _t('mysiteSiteTree.enableGoogleAnalyticsYes', "Yes");
        $enableGoogleAnalyticsOptionsSource["No"]  = _t('mysiteSiteTree.enableGoogleAnalyticsNo', "No");
        $enableGoogleAnalyticsField->setSource($enableGoogleAnalyticsOptionsSource);
        
        $fields->addFieldToTab('Root.Settings', $enableGoogleAnalyticsField, $insertBefore = null);
    }
    
    public function enableGoogleAnalytics() {
        
        // check for inherit
        if($this->owner->EnableGoogleAnalytics == 'Inherit') {
            if($this->owner->ParentID) {
                return $this->owner->Parent()->enableGoogleAnalytics();
            }
            else { 
                return $this->owner->getSiteConfig()->EnableGoogleAnalytics;                
            }
        }
        
        return $this->owner->EnableGoogleAnalytics;
    }
    
}