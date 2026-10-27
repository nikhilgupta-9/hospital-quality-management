<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\ChapterScoreModel;

class ChapterMatrixController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected ChapterScoreModel $chapterModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->chapterModel  = new ChapterScoreModel();
    }

    protected function getActiveHospitalId(): int
    {
        $sessionHospitalId = (int) session()->get('hospital_id');
        if ($sessionHospitalId > 0) {
            return $sessionHospitalId;
        }

        $requestedId = (int) $this->request->getGet('hospital_id');
        if ($requestedId > 0 && has_role('super_admin')) {
            return $requestedId;
        }

        $firstHospital = $this->hospitalModel->first();
        return $firstHospital ? (int) $firstHospital['id'] : 1;
    }

    public function index()
    {
        $hospitalId = $this->getActiveHospitalId();
        $hospital   = $this->hospitalModel->find($hospitalId);
        $matrixData = $this->chapterModel->getMatrixForHospital($hospitalId);

        return $this->renderWithLayout('hospital_admin/chapter_matrix', [
            'hospital' => $hospital,
            'chapters' => $matrixData['chapters'],
            'summary'  => $matrixData['summary'],
        ], 'NABH 10-Chapter Compliance Matrix');
    }

    public function updateScore()
    {
        $hospitalId = $this->getActiveHospitalId();
        $chapterId  = (int) $this->request->getPost('chapter_id');

        $chapter = $this->chapterModel->where('id', $chapterId)
                                      ->where('hospital_id', $hospitalId)
                                      ->first();

        if (!$chapter) {
            return redirect()->to(site_url('hospital-admin/chapter-matrix'))->with('error', 'Chapter record not found.');
        }

        $compliant    = (int) $this->request->getPost('compliant_count');
        $partial      = (int) $this->request->getPost('partial_count');
        $nonCompliant = (int) $this->request->getPost('non_compliant_count');
        $total        = $compliant + $partial + $nonCompliant;

        if ($total <= 0) {
            $total = (int) $chapter['total_standards'];
        }

        // Scoring Formula: (Compliant*10 + Partial*5) / (Total*10) * 100
        $maxPoints   = $total * 10;
        $scoredPoints = ($compliant * 10) + ($partial * 5);
        $percentage   = $maxPoints > 0 ? round(($scoredPoints / $maxPoints) * 100, 2) : 0;

        $this->chapterModel->update($chapterId, [
            'total_standards'      => $total,
            'compliant_count'      => $compliant,
            'partial_count'        => $partial,
            'non_compliant_count'  => $nonCompliant,
            'readiness_percentage' => $percentage,
        ]);

        return redirect()->to(site_url('hospital-admin/chapter-matrix'))
                         ->with('message', "Chapter {$chapter['chapter_code']} compliance score updated to {$percentage}%.");
    }
}
