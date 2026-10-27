<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalLicenseModel extends Model
{
    protected $table            = 'hospital_licenses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'hospital_id',
        'license_category',
        'license_type',
        'title',
        'license_number',
        'issuing_authority',
        'issue_date',
        'expiry_date',
        'document_path',
        'remarks',
        'status',
    ];

    /**
     * Get all statutory licenses for a hospital with live Traffic Light calculations
     */
    public function getLicensesWithTrafficLight(int $hospitalId): array
    {
        $licenses = $this->where('hospital_id', $hospitalId)
                         ->orderBy('expiry_date', 'ASC')
                         ->findAll();

        $today = strtotime(date('Y-m-d'));
        $enriched = [];
        $counts = [
            'total'   => 0,
            'green'   => 0,
            'yellow'  => 0,
            'red'     => 0,
        ];

        foreach ($licenses as $lic) {
            $daysRemaining = null;
            $lightColor = 'green';
            $lightText = 'Safe';
            $badgeClass = 'bg-success';

            if (!empty($lic['expiry_date'])) {
                $expiryTime = strtotime($lic['expiry_date']);
                $diffDays = (int) floor(($expiryTime - $today) / 86400);
                $daysRemaining = $diffDays;

                if ($diffDays > 60) {
                    $lightColor = 'green';
                    $lightText = 'Safe (>60 Days)';
                    $badgeClass = 'bg-success';
                    $counts['green']++;
                } elseif ($diffDays >= 1) {
                    $lightColor = 'yellow';
                    $lightText = 'Warning (' . $diffDays . ' Days Left)';
                    $badgeClass = 'bg-warning text-dark';
                    $counts['yellow']++;
                } else {
                    $lightColor = 'red';
                    $lightText = $diffDays === 0 ? 'Expiring Today' : 'Expired (' . abs($diffDays) . ' Days Ago)';
                    $badgeClass = 'bg-danger text-white';
                    $counts['red']++;
                }
            } else {
                $lightColor = 'yellow';
                $lightText = 'Expiry Unspecified';
                $badgeClass = 'bg-secondary';
                $counts['yellow']++;
            }

            $lic['days_remaining'] = $daysRemaining;
            $lic['traffic_light']  = $lightColor;
            $lic['light_text']     = $lightText;
            $lic['badge_class']    = $badgeClass;

            $enriched[] = $lic;
            $counts['total']++;
        }

        return [
            'licenses' => $enriched,
            'counts'   => $counts,
        ];
    }
}
