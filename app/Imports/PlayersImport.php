<?php
namespace App\Imports;

use App\Models\HasilClustering;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlayersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (isset($row['pubg_id']) && !empty($row['pubg_id'])) {
            return new HasilClustering([
                'pubg_id' => $row['pubg_id'],
                'name' => $row['name'],
                'kd' => $row['kd'],
                'win_ratio' => $row['win_ratio'],
                'accuracy' => $row['accuracy'],
                'headshot_rate' => $row['headshot_rate'],
                'cluster_status' => $row['cluster_status'],
            ]);
        }
        // Jika pubg_id tidak ada atau kosong, abaikan baris
        return null;
    }
}
