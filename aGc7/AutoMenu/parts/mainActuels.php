<?php
// TODO Transfo du menu contextuel des services en HTML pour lien direct sur la page correspondante

$allSces       = $adm->getDossActuels();
$appPrincipale = $adm->getAppPrincipale();
//var_dump( $allSces, $appPrincipale );
//echo $adm->json->apps[ 0 ]->chemin;

// Retrait menu Autofactory dans divers
//array_splice( $allSces[ 0 ]->menu, 1, 1 );
//$allSces[ 0 ]->nb --;

//var_dump($allSces);
$listing = '<ul class="list-group" id="dossiersActuels">';

$listing .= '<li
class="list-group-item d-flex justify-content-between align-items-center w70"><a href="/?c=' . $appPrincipale->chemin . '"
title="Aller à la page ' . ucfirst( $appPrincipale->nom ) . '">
' . ucfirst( $appPrincipale->nom ) . '</li>';

foreach ( $allSces as $sce ) {
	//var_dump( $sce );

	$menu = '';
	foreach ( $sce->menu as $m ) {
		$menu .= ucfirst( $m ) . "\n";
	}
	$menu .= '';

	$titleBadge = ( $sce->nb - 1 ) ? 'Pages' : 'Page d\'accueil';

	$listing .= '<li class="list-group-item d-flex justify-content-between align-items-center w70"><a href="/?c=' . $sce->chemin . '"
title="' . $menu . '">' . ucfirst( $sce->nom ) . '</a>'
	            . '<span class="badge badge-primary coulGc7 badge-pill" title="' . $titleBadge . '">' . $sce->nb . '</span>'
	            . '</li>';
}
//$listing .= '</ul><span class="orange">NB: Ne pas renommer directement les dossiers des services actifs. Utiliser cette inerface.</span><hr>';

echo '<h2>Dossiers actuels</h2>' . $listing . '<br>';

//var_dump( $allSces );
