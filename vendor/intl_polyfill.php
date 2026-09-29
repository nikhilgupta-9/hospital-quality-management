<?php

/**
 * Polyfill for missing PHP intl extension on XAMPP (Mac/Windows).
 * Ensures CodeIgniter 4 runs seamlessly without crashing on missing Locale or IntlDateFormatter.
 */

if (!class_exists('Locale', false)) {
    class Locale
    {
        public const DEFAULT_LOCALE = null;
        public const ACTUAL_LOCALE = 0;
        public const VALID_LOCALE = 1;

        private static string $defaultLocale = 'en';

        public static function getDefault(): string
        {
            return self::$defaultLocale;
        }

        public static function setDefault(string $locale): bool
        {
            self::$defaultLocale = $locale;
            return true;
        }

        public static function canonicalize(?string $locale): ?string
        {
            return $locale !== null ? str_replace('-', '_', $locale) : self::$defaultLocale;
        }

        public static function getPrimaryLanguage(string $locale): ?string
        {
            $parts = explode('_', str_replace('-', '_', $locale));
            return $parts[0] ?? null;
        }

        public static function getRegion(string $locale): ?string
        {
            $parts = explode('_', str_replace('-', '_', $locale));
            return $parts[1] ?? null;
        }

        public static function lookup(array $langtag, string $locale, bool $canonicalize = false, ?string $default = null): ?string
        {
            return $langtag[0] ?? $default;
        }

        public static function acceptFromHttp(string $header): string|false
        {
            return 'en';
        }
    }
}

if (!class_exists('IntlDateFormatter', false)) {
    class IntlDateFormatter
    {
        public const NONE = -1;
        public const FULL = 0;
        public const LONG = 1;
        public const MEDIUM = 2;
        public const SHORT = 3;
        public const TRADITIONAL = 0;
        public const GREGORIAN = 1;

        private string $locale;
        private int $dateType;
        private int $timeType;
        private ?string $pattern;

        public function __construct(
            ?string $locale = null,
            int $dateType = self::FULL,
            int $timeType = self::FULL,
            $timezone = null,
            $calendar = null,
            ?string $pattern = null
        ) {
            $this->locale = $locale ?? 'en';
            $this->dateType = $dateType;
            $this->timeType = $timeType;
            $this->pattern = $pattern;
        }

        public static function create(
            ?string $locale,
            int $dateType = self::FULL,
            int $timeType = self::FULL,
            $timezone = null,
            $calendar = null,
            ?string $pattern = null
        ): ?self {
            return new self($locale, $dateType, $timeType, $timezone, $calendar, $pattern);
        }

        public function format($value): string|false
        {
            if ($value instanceof \DateTimeInterface) {
                return $value->format('Y-m-d H:i:s');
            }
            if (is_numeric($value)) {
                return date('Y-m-d H:i:s', (int) $value);
            }
            return false;
        }

        public static function formatObject($object, $format = null, ?string $locale = null): string|false
        {
            if ($object instanceof \DateTimeInterface) {
                return $object->format('Y-m-d H:i:s');
            }
            return false;
        }
    }
}
