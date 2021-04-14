<?php
header("Content-Type: text/plain; charset=utf-8");;
function fib($n) { 
	if ($n == 0 ) echo 0; 
	else {
		if ($n == 1 ) echo 0, "\n\n", 1; 		
		else { 
			$a = 0;
			echo $a, "\n\n";
			$b = 1;
			echo $b, "\n\n";
			for ($i = 2; $i <= $n; $i++) {
				echo $a+$b, "\n\n";
				$c = $b;
				$b = $a + $b;
				$a = $c; 
			} 
		} 
	}
}
fib(64);
?>