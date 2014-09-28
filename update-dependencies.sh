#!/bin/bash

composer update
cd mysite/
bower-installer
rm -rf bower_components/
