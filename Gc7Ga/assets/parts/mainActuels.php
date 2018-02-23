<?php
// TODO Transfo du menu contextuel des services en HTML pour lien direct sur la page correspondante

$allSces = $adm->getDossActuels();

$listing = '<ul class="list-group">';
$listing .= '<li
class="list-group-item d-flex justify-content-between align-items-center w70"><a href="/"
title="Blog">
Blog</li>';
foreach ( $allSces as $sce ) {
	//var_dump( $sce );

	$menu = '';
	foreach ( $sce->menu as $m ) {
		$menu .= ucfirst( $m ) . "\n";
	}
	$menu .= '';

	$titleBadge = ( $sce->nb - 1 ) ? 'Pages' : 'Page d\'accueil';

	$listing .= '<li class="list-group-item d-flex justify-content-between align-items-center w70"><a href="/?c=' . $sce->nom . '"
title="' . $menu . '">' . ucfirst( $sce->nom ) . '</a>
<span class="badge badge-primary badge-pill" title="' . $titleBadge . '">' . $sce->nb . '</span></li>';
}
$listing .= '</ul><span class="orange">NB: Ne pas effacer le dossier Gc7Ga, ni<br>ceux des dossiers des services listés ci-dessus
grisés</span><hr>';

echo '<h2>Dossiers actuels</h2>' . $listing;

//var_dump( $allSces );
