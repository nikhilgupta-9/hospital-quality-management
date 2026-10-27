<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalProfileModel extends Model
{
    protected $table            = 'hospital_profiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'hospital_id',
        'rohini_id',
        'abdm_hip_id',
        'hospital_type',
        'nodal_officer_name',
        'nodal_officer_email',
        'nodal_officer_phone',
        'total_sanctioned_beds',
        'total_icu_beds',
        'specialties',
        'address_details',
    ];

    /**
     * Get or initialize hospital profile by hospital_id
     */
    public function getProfileByHospital(int $hospitalId): array
    {
        $profile = $this->where('hospital_id', $hospitalId)->first();
        if ($profile) {
            if (!empty($profile['specialties']) && is_string($profile['specialties'])) {
                $decoded = json_decode($profile['specialties'], true);
                $profile['specialties_list'] = is_array($decoded) ? $decoded : [];
            } else {
                $profile['specialties_list'] = [];
            }
            return $profile;
        }

        // Initialize default empty profile if not existing
        $default = [
            'hospital_id'           => $hospitalId,
            'rohini_id'             => '',
            'abdm_hip_id'           => '',
            'hospital_type'         => 'Multispeciality Hospital',
            'nodal_officer_name'    => '',
            'nodal_officer_email'   => '',
            'nodal_officer_phone'   => '',
            'total_sanctioned_beds' => 50,
            'total_icu_beds'        => 8,
            'specialties'           => json_encode(['General Medicine', 'General Surgery', 'Pediatrics']),
            'address_details'       => '',
        ];
        $id = $this->insert($default);
        $default['id'] = $id;
        $default['specialties_list'] = ['General Medicine', 'General Surgery', 'Pediatrics'];

        return $default;
    }
}
