<?php namespace Gc7\Divers\Tips;

class Tips {

	const STYLE_CADRE = 'cadreOrange';
	
	
	public static function div()
	{
?>
<div class="cadreOrange">
<h2>Opérateur de décomposition</h2>
		<?php
		$arr = function ( ...$n ) {
			$nb = func_num_args();
			var_dump( 'Params', $n );

			return $nb;
		};

		$values       = range( 3, 5 );
		$autresParams = [ range( 1, 3 ), [ 'Class' => self::class, 'Fonction en cours' => __FUNCTION__ . '()' ], 'Fin' ];

		echo 'Nbre de params: ' . $arr( 'Début', array_merge( [ 1, 2 ], $values ), ...$autresParams ).'</div>';

		
	}
	
	public static function sum( $array, $max )
	{   //For Reference, use:  "&$array"
		$sum = 0;
		for ( $i = 0; $i < 2; $i ++ ) {
			//$array[$i]++;        //Uncomment this line to modify the array within the function.
			$sum += $array[ $i ];
		}

		return ( $sum );
	}
	
	public static function testChronoSum()
	{
		
		$max  = 1E7;                  //10 M data points.
		$data = range( 0, $max, 1 );
		var_dump( count( $data ) );
		$start = microtime( TRUE );
		for ( $x = 0; $x < 100; $x ++ ) {
			$sum = self::sum( $data, $max );
		}
		$end = microtime( TRUE );
		echo "Time: " . ( $end - $start ) . " s\n";
	}

	public static function generatorFibonacci( $nbr )
	{
		?>
		<div class="cadreOrange">
			<h5>Generator pour générer <em>(Les <?= $nbr ?> premières valeurs)</em> de la suite de Fibonacci
			</h5>

			<?php
			foreach ( self::getFibo( $nbr ) as $v ) {
				echo $v . str_repeat( ' &nbsp;', 2 );
				}
			?>
		</div>
		<?php
	}
	
	public static function getFibo( $nbr )
	{
		$un = 0;
		yield 0;
		$deux = 1;
		yield 1;

		for ( $i = $un, $nbr -= 3; $i <= $nbr; $i ++ ) {
			$suivant = $un + $deux;

			$un   = $deux;
			$deux = $suivant;

			yield $suivant;
		}

		echo '<hr><p>Méthode "métier": <strong>' . __FUNCTION__ . '()</strong>, appelée depuis la méthode <strong>
' . debug_backtrace()[ 1 ][ 'function' ] . '()</strong>
dans la classe<strong>' . __CLASS__ . '</strong></p>';
	}


	public static function simpleGenerator( $start, $fin )
	{
		$generator = self::forI( $start, $fin );

		echo '<div class="' . self::STYLE_CADRE . '">';
		var_dump( $generator );

		echo '<table class="gc7Table">';
		echo '<tr><td colspan="2">Lecture du générateur<br>Basé sur une boucle</td></tr>';
		echo '<tr><td>Key</td><td>Value</td></tr>';
		foreach ( $generator as $k => $v ) {
			echo '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
		}
		echo '</table></div>';
		//echo '<br>&nbsp;';
	}

	public static function forI( $start, $limit, $step = 1 )
	{
		for ( $i = $start; $i <= $limit; $i += $step ) {
			//echo $i. ' ';
			yield $i;
		}
	}

	public static function showTips()
	{
		$t = chr( 9 );

		$emmet = htmlspecialchars( 'ul>li.maClasse$*2> 	<ul>
{Sujet$} + TAB:		  <li class=\"maClasse1\">Sujet1</li>
			  <li class=\"maClasse2\">Sujet2</li>
			</ul>' );

		echo "<pre>
<b>Code</b>{$t}{$t}{$t}<b>Résultat</b>{$t}{$t}<b>Situation</b>\n

ALT + 125:{$t}{$t}}{$t}{$t}{$t}Édition
ALT + 128:{$t}{$t}&euro;{$t}{$t}{$t}   \"

chr(9):{$t}{$t}{$t}'{$t}'{$t}{$t}PHP (Dans bloc &lt;PRE&gt;)

{$emmet}

li.classCss:nth-child(-n+3) { // Select les der à compter du second }
</pre>";

 }
}
