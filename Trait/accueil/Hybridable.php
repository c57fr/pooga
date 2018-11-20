<?php namespace Tuto\lesTraits;


trait Hybridable {

	use Electricable, Dieselable {
		Electricable::rouler insteadOf Dieselable;
		Electricable::rouler as roulerElectric;
		Dieselable::rouler as private roulerDiesel;
	}

}
