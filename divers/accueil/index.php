<h1>Accueil <?= ucfirst( \AutoMenu\AutoMenu::getAppName() ); ?></h1>
<h3>
	<ul>
		<li><a href="https://www.grafikart.fr/formations/programmation-objet-php/" target="_blank">La POO en PHP - Tuto de
				référence (GrafikArt)</a></li>
		<li><p><a href="https://github.com/c57fr/pooga/tree/ch14" target="_blank">Dépôt GitHub</a></p>
			<ul>
				<li><a href="https://github.com/c57fr/pooga/blob/ch14/README.md" target="_blank">Guide d'installation rapide</a>
				</li>
				<li><a href="https://github.com/c57fr/pooga/issues/new" target="_blank">Aide</a></li>
			</ul>
		</li>
	</ul>
</h3>
<br>
<?php
$encart = <<<'EOT'
<p id="encart">
	<span class="smaller">
		</span><span class="policeGc7 fdBlanc sz05"> Auto<span class="maj">M</span>enu</span>
EOT;
$encart .= '<span style="font-size: .65em;margin-left: 20px;">'.\Gc7\Helper\GC7Tip::uchr( 10160 ).'</span>';
$encart .= <<<'EOT'
	</span>
</p>
EOT;

echo $encart;
