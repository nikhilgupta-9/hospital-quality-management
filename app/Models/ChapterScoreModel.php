<?php

namespace App\Models;

use CodeIgniter\Model;

class ChapterScoreModel extends Model
{
    protected $table            = 'chapter_scores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'hospital_id',
        'chapter_code',
        'chapter_name',
        'category',
        'total_standards',
        'compliant_count',
        'partial_count',
        'non_compliant_count',
        'readiness_percentage',
    ];

    /**
     * Get 10-Chapter Matrix for a hospital
     */
    public function getMatrixForHospital(int $hospitalId): array
    {
        $chapters = $this->where('hospital_id', $hospitalId)->findAll();
        
        $totalStandards = 0;
        $totalCompliant = 0;
        $totalPartial = 0;
        $totalNonCompliant = 0;
        $totalPercentage = 0;

        foreach ($chapters as $ch) {
            $totalStandards += (int) $ch['total_standards'];
            $totalCompliant += (int) $ch['compliant_count'];
            $totalPartial += (int) $ch['partial_count'];
            $totalNonCompliant += (int) $ch['non_compliant_count'];
            $totalPercentage += (float) $ch['readiness_percentage'];
        }

        $avgReadiness = count($chapters) > 0 ? round($totalPercentage / count($chapters), 1) : 0;

        return [
            'chapters'         => $chapters,
            'summary'          => [
                'total_chapters'      => count($chapters),
                'avg_readiness'       => $avgReadiness,
                'total_standards'     => $totalStandards,
                'total_compliant'     => $totalCompliant,
                'total_partial'       => $totalPartial,
                'total_non_compliant' => $totalNonCompliant,
            ],
        ];
    }
}
