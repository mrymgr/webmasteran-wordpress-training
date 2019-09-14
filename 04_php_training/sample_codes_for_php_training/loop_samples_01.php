<style>
    .msn-table-for-loop {
        border: 1px solid green;
        border-collapse: collapse;
    }

    .msn-padding-5 {
        padding: 5px;
    }
</style>
<?php
/*Simple for loop example*/
for ( $i = 2000; $i <= 3000; $i += 100 ) {
	echo $i;
	echo '<br>';
}

echo '<hr>';

for ( $i = 2000; $i <= 3000; $i += 100 ) :
	echo $i;
	echo '<br>';
endfor;

echo '<hr>';

/*Define initial value outside for loop*/
$k = 1;
for ( ; $k <= 20; $k += 3 ) {
	echo $k . '<br>';
}

echo '<hr>';

/*Define decreasing value in for loop*/
for ( $l = 100; $l >= 1; $l -= 10 ) {
	echo $l . ' - ';
}

echo '<hr>';

/*Using Increasing value inside for declaration block */
for ( $j = 1; $j <= 10; ) {
	echo $j * 3 . '<br>';
	$j ++;
}

echo '<hr>';

$cars = [ 'BMW', 'Benz', 'Prido shasi kootah', 'Samand shasi boland' ];
/*Using for loop to show an array elements*/
for ( $loop_counter = 0; $loop_counter < count( $cars ); $loop_counter ++ ) {
	echo 'The name of this car is: ' . $cars[ $loop_counter ] . '<br>';
}


echo '<hr>';

/*Using foreach loop to show an array elements*/
foreach ( $cars as $car ) {
	echo 'The name of this car is: ' . $car . '<br>';
}

echo '<hr>';

/*Sample of range function to create an array*/
$msn_sample_array_with_range = range( 10, 40, 10 );
foreach ( $msn_sample_array_with_range as $value ) {
	echo $value . ' - ';
}
echo '<br>';
echo '<hr>';
foreach ( range( 1, 10, 3 ) as $value ) {
	echo $value . ' - ';
}

echo '<hr>';

$associative_array_cars = [
	'first'  => 'bmw',
	'second' => 'benz',
	'third'  => 'Prido shasi kootah',
	'forth'  => 'Samand shasi nesfe',
];
/*Sample of foreach loop on associative array*/
foreach ( $associative_array_cars as $key => $value ) {
	echo 'The ' . $key . ' car is: ' . $value . '<br>';
}

echo '<hr>';

/*Another syntax in foreach loop*/
foreach ( range( 20, 40, 5 ) as $item ):
	echo $item . ' - ';
endforeach;

echo '<hr>';

/*Sample of break in for loop*/
for ( $i = 1; $i <= 12; $i ++ ) {
	echo $i;
	if ( $i > 7 ) {
		break;
	}
	echo ' - ';
}

echo '<hr>';

/*Sample of continue in for loop*/
foreach ( range( 30, 50, 1 ) as $item ):
	if ( $item % 2 == 0 ) {
		continue;
	}
	echo $item . ' - ';
endforeach;

echo '<hr>';
/*Nested for loop*/
for ( $m = 1; $m <= 5; $m ++ ) {
	foreach ( range( 10, 100, 10 ) as $item ) {
		echo $m * $item;
		if ( $item == 100 ) {
			break;
		}
		echo ' - ';
	}
	echo '<br>';
}
echo '<br>';

/*Multiplication table with nested for */
echo '<table class="msn-table-for-loop">';
for ( $m = 1; $m <= 10; $m ++ ) {
	echo '<tr class="msn-table-for-loop">';
	for ( $n = 1; $n <= 10; $n ++ ) {
		echo '<td class="msn-table-for-loop msn-padding-5">';
		echo $m * $n;
		echo '</td>';
	}
	echo '</tr>';
}
echo '</table>';

echo '<hr>';

/*While simple example*/
$msn_simple_while = 0;
while ( $msn_simple_while < 100 ) {
	echo $msn_simple_while += 10;
	if ( $msn_simple_while >= 100 ) {
		break;
	}
	echo ' - ';
}

echo '<hr>';

$msn_another_while_syntax = 110;
while ( $msn_another_while_syntax >= 0 ) :
	echo $msn_another_while_syntax -= 10;
	if ( $msn_another_while_syntax <= 0 ) {
		break;
	}
	echo ' - ';
endwhile;

echo '<hr>';

/*Sample of using continue in while loop*/
$msn_using_continue_in_while_loop = 100;
while ( $msn_using_continue_in_while_loop > 0 ) {
	if ( $msn_using_continue_in_while_loop % 2 == 0 ) {
		$msn_using_continue_in_while_loop --;
		continue;
	} else {
		echo $msn_using_continue_in_while_loop;
		if ( $msn_using_continue_in_while_loop == 1 ) {
			break;
		} else {
			echo ' - ';
			$msn_using_continue_in_while_loop --;
		}
	}
}
echo '<hr>';

/*Sample of do while loop*/
$msn_simple_do_while = 1;
do {
	if ( $msn_simple_do_while % 2 == 1 ) {
		$msn_simple_do_while ++;
		continue;
	} else {
		echo $msn_simple_do_while;
		if ( $msn_simple_do_while < 98 ) {
			echo ' - ';
		}
		$msn_simple_do_while ++;
	}
} while ( $msn_simple_do_while < 100 );

echo '<hr>';
$products = [
	[
		'name'     => 'ghashogh',
		'price'    => '5000',
		'discount' => '30',
		'amount'   => '40',
	],
	[
		'name'     => 'changal',
		'price'    => '4000',
		'discount' => '40',
		'amount'   => '300',
	],
	[
		'name'     => 'boshghab',
		'price'    => '10000',
		'discount' => '5',
		'amount'   => '100',
	],
];
?>

<table class="msn-table-for-loop">
    <tr class="msn-table-for-loop msn-padding-5">
		<?php foreach ( $products[0] as $key => $value ): ?>
            <th class="msn-table-for-loop msn-padding-5">
                <b><?php echo $key ?></b>
            </th>
		<?php endforeach; ?>
    </tr>
	<?php foreach ( $products as $product ) : ?>
        <tr>
			<?php foreach ( $product as $key => $value ): ?>
                <td class="msn-table-for-loop msn-padding-5">
                    <b><?php echo $value ?></b>
                </td>
			<?php endforeach; ?>
        </tr>

	<?php endforeach; ?>

</table>

