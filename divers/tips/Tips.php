<?php namespace Gc7\Divers\Tips;

class Tips {

	const STYLE_CADRE = 'cadreOrange';
	
	
	public static function div()
	{

		$arr = function ( ...$n ) {
			$nb = func_num_args();
			var_dump($n);
			return $n;
		};

		var_dump( $arr(1,2) );


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
</pre>";

	}
}
