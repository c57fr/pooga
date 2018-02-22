<?php

$allSces = $adm->getScesActuels();


$listing = '<ul class="list-group">';
$listing .= '<li
class="list-group-item d-flex justify-content-between align-items-center w70"><a href="./?c=blog" title="Blog">
Blog</li>';
foreach ( $allSces as $sce ) {
	//var_dump( $sce );

	$menu = '';
	foreach ( $sce->menu as $m ) {
		$menu .= ucfirst( $m ) . "\n";
	}
	$menu .= '';


	$listing .= '<li class="list-group-item d-flex justify-content-between align-items-center w70"><a href="/?c='.$sce->nom.'"
title="'.$menu.'">' . ucfirst( $sce->nom ) . '</a>
<span class="badge badge-primary badge-pill">' . $sce->nb . '</span></li>';
}
$listing .= '</ul><span class="orange">NB: Ne pas effacer les dossiers des services grisés</span><hr>';

echo '<h2>Services actuels</h2>' . $listing;

//var_dump( $allSces );
