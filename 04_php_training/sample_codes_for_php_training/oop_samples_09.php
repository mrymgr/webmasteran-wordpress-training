<?php

namespace My\msn;

#Sample of namespaces
class MsnClass {
}

function msnfunction() {
}
const MSNCONST = 1;

$a = new MsnClass;
$c = new \my\msn\MsnClass;
// see "Global Space" section
$a = strlen( 'hi' );
// see "Using namespaces: fallback to global function/constant" section
$d = namespace\MSNCONST;
// see "namespace operator and __NAMESPACE__ constant" section
$d = __NAMESPACE__ . '\MSNCONST';
echo constant( $d ); // see "Namespaces and dynamic language features" section
