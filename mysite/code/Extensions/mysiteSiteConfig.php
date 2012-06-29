<?php

class mysiteSiteConfig extends DataExtension {
    
    public function extraStatics() {
        return array(
            'db' => array(
                'EnableGoogleAnalytics' => 'Boolean',
                'GoogleAnalyticsKey' => 'Text'
            )
        );
    }
    
    public function updateCMSFields(FieldList $fields) {
        
        $fields->removeByName('Theme');
        
        $fields->addFieldToTab('Root.APIs', new CheckboxField('EnableGoogleAnalytics', _t('mysiteSiteConfig.EnableGoogleAnalytics', 'enable Google Analytics')), $insertBefore = null);
        $fields->addFieldToTab('Root.APIs', new TextareaField('GoogleAnalyticsKey', _t('mysiteSiteConfig.GoogleAnalyticsKey', 'Google Analytics key')), $insertBefore = null);
    }
    
}
