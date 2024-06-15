<?php

namespace App\Imports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DisbursementImport implements ToModel, WithHeadingRow
{
    protected $userId;
    protected $fileName;

    public function __construct($userId, $fileName)
    {
        $this->userId = $userId;
        $this->fileName = $fileName;
    }

    public function model(array $row)
    {
        return new ExcelData([
            'user_id' => $this->userId,
            'file_name' => $this->fileName,
            'scheme_code' => $row['scheme_code'] ?? null,
            'scheme_name' => $row['scheme_name'] ?? null,
            'central_state_scheme' => $row['central_state_scheme'] ?? null,
            'fin_year' => $row['fin_year'] ?? null,
            'state_disbursement' => $row['state_disbursement'] ?? null,
            'central_disbursement' => $row['central_disbursement'] ?? null,
            'total_disbursement' => $row['total_disbursement'] ?? null,
        ]);
    }
}
