<?php


namespace App\Entity\Enum;


abstract  class TourismeEnum
{
	const BALADE    = "balade";
	const CITE = "cite";
	const MUSEE = "musee";
	const MEMOIRE = "memoire";
	const TERROIR = "terroir";
	const DIVERS = "divers";


	/** @var array user friendly named type */
	protected static $typeName = [
		self::BALADE    => 'Balades',
		self::CITE => 'Cités',
		self::MUSEE    => 'Musées',
		self::MEMOIRE => 'Mémoires',
		self::TERROIR => 'Terroirs',
		self::DIVERS => 'Divers'
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
			self::BALADE,
			self::CITE,
			self::MUSEE,
			self::MEMOIRE,
			self::TERROIR,
			self::DIVERS
		];
	}
}