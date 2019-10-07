<?php
    function hr (){
        echo "<hr>";
    }
    function br (){
        echo "<br>";
    }
    /* Define Student Data in stdents Array */
$students=[
    $student1=[
        'Name'=>'Ali',
        'Family'=>'Mohammadi',
        'Math'=>18,
        'Physics'=>17,
        'History'=>13
    ],
    $student2=[
        'Name'=>'Jafar',
        'Family'=>'JafarZade',
        'Math'=>20,
        'Physics'=>20,
        'History'=>15
    ],
    $student3=[
        'Name'=>'Reza',
        'Family'=>'Ahmadi',
        'Math'=>16,
        'Physics'=>18.5,
        'History'=>19.75
    ],
    $student4=[
        'Name'=>'Sadeq',
        'Family'=>'AliMardani',
        'Math'=>16.25,
        'Physics'=>18,
        'History'=>20
    ],
    $student5=[
        'Name'=>'Mehrshad',
        'Family'=>'ValiZade',
        'Math'=>17,
        'Physics'=>15,
        'History'=>18
    ],
    $student6=[
        'Name'=>'Matin',
        'Family'=>'Alipoor',
        'Math'=>19,
        'Physics'=>12,
        'History'=>11
    ],
    $student7=[
        'Name'=>'Mohammad',
        'Family'=>'Samadi',
        'Math'=>19,
        'Physics'=>18.5,
        'History'=>19.75
    ],
    $student8=[
        'Name'=>'Faeze',
        'Family'=>'Mahmoudi',
        'Math'=>15,
        'Physics'=>15.25,
        'History'=>19
    ],
    $student9=[
        'Name'=>'Bita',
        'Family'=>'Mahmoudi',
        'Math'=>13,
        'Physics'=>19,
        'History'=>17.25
    ],
    $student10=[
        'Name'=>'Nasim',
        'Family'=>'Mozafari',
        'Math'=>19,
        'Physics'=>12.75,
        'History'=>16.5
    ]
    ];
        /* Sorting Array By Name in Ascending Order */
        function sortByName($first , $second ){
            $fname=$first['Name'];
            $sname=$second['Name'];
            if($fname==$sname) return 0;
            return ($fname < $sname ? -1 : 1);
        }
        /* Sorting students Array By Math Score in Descending Order */
        function sortByMathScore($a , $b){
            $num1=$a['Math'];
            $num2=$b['Math'];
            if($num1==$num2) return 0;
            return ($num1 < $num2 ? -1 : 1);
        }
        /* Sorting students Array By History Score in Ascending Order */
        function sortByHistoryScore($a, $b){
            $num1=$a['History'];
            $num2=$b['History'];
            if($num1==$num2) return 0;
            return($num1 > $num2 ? -1 : 1);
        }
        /*for($row=1;$row<=count($students);$row++){
            echo "Student {$row} : <br>";
            for($col=1;$col<=5;$col++)
            echo "{$students[$row][$col]}";
           
        }*/
        usort($students,"sortByName");
        usort($students,"sortByMathScore");
        usort($students,"sortByHistoryScore");




















        
        usort($students,"sortByName");
        
        
        usort($students,"sortByMathScore");
        

        usort($students,"sortByHistoryScore");
        
?>