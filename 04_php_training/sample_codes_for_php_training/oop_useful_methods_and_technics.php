<?php

/*
 * get all declared classes when script is running
 * */
$classes = get_declared_classes();

/*
 * check if a class exists
 * */
foreach($class_names as $class_name) {
	if(class_exists($class_name)) {
		echo "{$class_name} is a declared class.<br />";
	} else {
		echo "{$class_name} is not a declared class.<br />";
	}
}

/*
 * get class of an object
 * */
echo get_class($student1) . "<br />";

/*
 * check instance of a specific class
 * */
$class_names = ['Product', 'Student', 'student'];
foreach($class_names as $class_name) {
	if(is_a($student1, $class_name)) {
		echo "student1 is a {$class_name}.<br />";
	} else {
		echo "student1 is not a {$class_name}.<br />";
	}
}

/*
 * get all of class properties
 * */
$class_vars = get_class_vars('Student');
/*
 * get all of object properties
 * */
$object_vars = get_object_vars($student1);

/*
 * check if property exist in a class
 * */
if(property_exists('Student', 'first_name')) {
	echo "Property first_name exists in Student class.<br />";
} else {
	echo "Property first_name does not exist in Student class.<br />";
}

/*
 * get class methods
 * */
$class_methods = get_class_methods('Student');

/*
 * check if method exist in a class
 * */
if(method_exists('Student', 'say_hello')) {
	echo "Method say_hello() exists in Student class.<br />";
} else {
	echo "Method say_hello() does not exist in Student class.<br />";
}

/*
 * get parent class of an object
 * */
echo get_parent_class($u) . '<br />';

/*
 * check if an object is inherited from a class
 * */
if(is_subclass_of($c, 'User')) {
	echo "Instance is a subclass of User.<br />";
}

/*
 * list all of parents for an object
 * */
$parents = class_parents($c);