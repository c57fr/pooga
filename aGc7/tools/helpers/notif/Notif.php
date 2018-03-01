<?php
namespace Gc7\Helper;


/**
 * Class Notif
 * @package Gc7Ga
 */
class Notif {
	
	/**
	 * @param      $msg
	 * @param null $coul
	 *
	 * @return string
	 */
	public static function aff ( $msg, $coul = null ) {

		return '<div class="alert alert-' . ( $coul ?? 'success' ) . ' alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>' . $msg . '
</div>';
	}
}
