<?php

/*
 * Sample of trait composition
 * */

trait Reader {
	public function read( $source ) {
		echo sprintf( "Read from %s <br/>", $source );
	}
}

trait Writer {
	public function write( $destination ) {
		echo sprintf( "Write to %s <br/>", $destination );
	}
}

trait Copier {
	use Reader, Writer;

	public function copy( $source, $destination ) {
		$this->read( $source );
		$this->write( $destination );
	}
}

class FileUtil {
	use Copier;

	public function copyFile( $source, $destination ) {
		$this->copy( $source, $destination );
	}
}