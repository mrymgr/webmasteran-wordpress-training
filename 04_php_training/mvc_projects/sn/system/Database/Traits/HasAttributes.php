<?php

namespace System\Database\Traits;

trait HasAttributes {

	private function registerAttribute( $object, string $attribute, $value ) {

		$this->inCastsAttributes( $attribute ) == true ? $object->$attribute = $this->castDecodeValue( $attribute , $value) : $object->$attribute = $value;

	}

	protected function arrayToAttribute( array $array , $object = null ) {

		if ( ! $object ) {
			$className = get_called_class();
			$object = new $className;
		}

		foreach ( $array as $attribute => $value) {
			if ( $this->inHiddenAttributes( $attribute )) {
				continue;
			}
			$this->registerAttribute( $object, $attribute, $value );
		}
		return $object;

	}

	protected function arrayToObjects( $array ) {

		$collection = [];
		foreach ( $array as $value ) {
			$object = $this->arrayToAttribute( $value );
			array_push( $object );
		}

		$this->collection = $collection;

	}

	private function inHiddenAttributes( $attribute ) {

		return in_array( $attribute, $this->hidden );

	}

	private function inCastsAttributes( $attribute ) {

		return in_array( $attribute, array_keys( $this->casts ));

	}

	private function castDecodeValue( $attributeKey , $value ) {

		if ( 'array' == $this->casts[$attributeKey] || 'object' == $this->casts[$attributeKey] ) {
			return unserialize( $value );
		}

		return $value;

	}

	private function castEncodeValue( $attributeKey, $value) {

		if ( 'array' == $this->casts[$attributeKey] || 'object' == $this->casts[$attributeKey] ) {
			return serialize( $value );
		}

		return $value;

	}

	private function arrayToCastEncodeValue( $values ) {

		$new_array = [];

		foreach ( $values as $attribute => $value ) {
			$this->inCastsAttributes( $attribute ) ? $new_array[$attribute] = $this->castEncodeValue($attribute, $value) : $new_array[$attribute] = $value;

		}

		return $new_array;

	}

}
