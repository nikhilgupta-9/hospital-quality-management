<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'site_settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'setting_key',
        'setting_value',
        'setting_group',
        'label',
    ];

    /**
     * Cache array of settings in memory
     */
    protected static ?array $cachedSettings = null;

    /**
     * Get all settings as key => value dictionary
     */
    public function getAllAsMap(): array
    {
        if (self::$cachedSettings !== null) {
            return self::$cachedSettings;
        }

        $records = $this->findAll();
        $map = [];
        foreach ($records as $r) {
            $map[$r['setting_key']] = $r['setting_value'];
        }

        self::$cachedSettings = $map;
        return $map;
    }

    /**
     * Get single setting value with fallback
     */
    public function getVal(string $key, ?string $default = null): ?string
    {
        $all = $this->getAllAsMap();
        return $all[$key] ?? $default;
    }

    /**
     * Update setting key value
     */
    public function setVal(string $key, ?string $value): bool
    {
        $existing = $this->where('setting_key', $key)->first();
        if ($existing) {
            $res = $this->update($existing['id'], ['setting_value' => $value]);
        } else {
            $res = $this->insert([
                'setting_key'   => $key,
                'setting_value' => $value,
                'setting_group' => 'contact',
                'label'         => ucfirst(str_replace('_', ' ', $key)),
            ]);
        }

        self::$cachedSettings = null; // bust cache
        return (bool)$res;
    }
}
