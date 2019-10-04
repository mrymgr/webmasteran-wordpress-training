<?php

/*
 * Sample of Multiple trait in OOP
 * */

trait Preprocessor {
	function preprocess() {
		echo 'Preprocess...done' . '<br/>';
	}
}

trait Compiler {
	function compile() {
		echo 'Compile code... done' . '<br/>';
	}
}

trait Assembler {
	function createObjCode() {
		echo 'Create the object code files... done.' . '<br/>';
	}
}

trait Linker {
	function createExec() {
		echo 'Create the executable file...done' . '<br/>';
	}
}

class IDE {
	use Preprocessor, Compiler, Assembler, Linker;

	function run() {
		$this->preprocess();
		$this->compile();
		$this->createObjCode();
		$this->createExec();
		echo 'Execute Soosis Bandari...done' . '<br/>';
	}
}

$ide = new IDE();
$ide->run();
