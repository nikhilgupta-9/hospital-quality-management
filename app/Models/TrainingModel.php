<?php

namespace App\Models;

use CodeIgniter\Model;

class TrainingModel extends Model
{
    protected $table            = 'trainings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'title', 'type', 'scheduled_date', 'trainer_name'
    ];

    public function getWithAttendanceStats(int $hospitalId)
    {
        return $this->select('trainings.*, COUNT(ta.id) AS total_enrolled, SUM(CASE WHEN ta.attended = 1 THEN 1 ELSE 0 END) AS total_attended, AVG(ta.score) AS average_score')
            ->join('training_attendance ta', 'ta.training_id = trainings.id', 'left')
            ->where('trainings.hospital_id', $hospitalId)
            ->groupBy('trainings.id')
            ->orderBy('trainings.scheduled_date', 'DESC')
            ->findAll();
    }
}
