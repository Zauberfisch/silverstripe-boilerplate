<?php

if (!Director::isDev()) {
	// turn FirePHP off when not in dev mode
	FB::setEnabled(false);
}
FB::info('SilverStripe in DEV');