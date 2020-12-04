<?php


namespace App\Entity\Enum;


abstract  class AilleurEnum
{
	const MAISON    = "maison";
	const CHAMBRE = "chambre";

	/** @var array user friendly named type */
	protected static $typeName = [
		self::MAISON    => "Maison de vacances",
		self::CHAMBRE => "Chambre d'hôtes"
	];
	/**
	 * @param  string $typeShortName
	 * @return string
	 */
	public static function getTypeName($typeShortName)
	{
		if (!isset(static::$typeName[$typeShortName])) {
			return "Unknown type ($typeShortName)";
		}
		return static::$typeName[$typeShortName];
	}
	/**
	 * @return array<string>
	 */
	public static function getAvailableTypeNames()
	{
		return static::$typeName;
	}
	/**
	 * @return array<string>
	 */
	public static function getAvailableTypes()
	{
		return [
			self::MAISON,
			self::CHAMBRE
		];
	}
}