silverstripe-zenautocompletefield
=================================

A basic autocomplete text field using jquery ui

Maintainer
------------

shea@silverstripe.com.au

Requirements
------------

SilverStripe 3.0

Usage
-------------

Using this field is just the same as a TextField, only with the additional requirement of calling the setSuggestions() method, to populate the autocomplete data.

$field = new ZenAutoCompleteField('FieldName', 'Field Name');

$field->setSuggestions(array(
	'suggestion one',
	'suggestion two',
	'suggestion three',
));

$fields->addFieldToTab('Root.Test', $field);

