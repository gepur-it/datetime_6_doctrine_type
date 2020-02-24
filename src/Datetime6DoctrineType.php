<?php
declare(strict_types=1);


namespace GepurIt\Datetime6Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

/**
 * Class Datetime6DoctrineType
 * @package GepurIt\Datetime6Type
 */
class Datetime6DoctrineType extends Type
{
    const TYPE_NAME = 'datetime(6)';
    const DATETIME_6_FORMAT = 'Y-m-d H:i:s.u';

    /**
     * {@inheritdoc}
     * @throws ConversionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return $value;
        }


        if ($value instanceof \DateTimeInterface) {
            return $value->format(self::DATETIME_6_FORMAT);
        }

        throw ConversionException::conversionFailedInvalidType($value, $this->getName(), ['null', 'DateTime(6)']);
    }

    /**
     * {@inheritdoc}
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof \DateTimeInterface) {
            return $value;
        }

        $val = \DateTime::createFromFormat(self::DATETIME_6_FORMAT, $value);

        if (!$val) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), self::DATETIME_6_FORMAT);
        }

        return $val;
    }

    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array                                     $fieldDeclaration The field declaration.
     * @param AbstractPlatform $platform         The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'DATETIME(6)';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return self::TYPE_NAME;
    }

    /**
     * Gets the name of this type.
     *
     * @return string
     */
    public function getName()
    {
        return self::TYPE_NAME;
    }
}