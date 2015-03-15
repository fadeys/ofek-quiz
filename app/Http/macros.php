<?php
Form::macro('ckeditor', function($name, $value = null, $options = []) {
	isset($options['id']) ? : $options['id'] = $name;
	return Form::textarea($name, $value, $options) . "<script>CKEDITOR.replace('{$options['id']}');</script>";
});
