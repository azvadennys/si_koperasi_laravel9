<?php

namespace App\Exports;

use App\Models\AnggotaModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Borders;

class SimpananExport implements FromView, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            '1'    => [
                'font' => [

                    'alignment' => Alignment::HORIZONTAL_CENTER,
                    'size' => 14

                ]
            ],

        ];
    }

    public function defaultStyles(Style $defaultStyle)
    {
        // Configure the default styles
        // return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);

        // Or return the styles array
        return [
            'font' => [
                'name' => 'Calibri',
                'size' => 11,

            ],
        ];
    }

    public function view(): View
    {
        $tahunsebelum = $this->id - 1;
        $tahun = $this->id;
        $index = AnggotaModel::with(['simpananpokok' => function ($query) use ($tahun) {
            $query->whereYear('tanggal', '=', $tahun);
        }, 'simpananwajib' => function ($query) use ($tahun) {
            $query->whereYear('tanggal', '=', $tahun);
        }, 'simpanankhusus' => function ($query) use ($tahun) {
            $query->whereYear('tanggal', '=', $tahun);
        }, 'pengambilan' => function ($query) use ($tahun) {
            $query->whereYear('tanggal', '=', $tahun);
        }])->orderby('nama', 'asc')->get();

        $indexsebelum = AnggotaModel::with(['simpananpokok' => function ($query) use ($tahunsebelum) {
            $query->whereYear('tanggal', '<=', $tahunsebelum);
        }, 'simpananwajib' => function ($query) use ($tahunsebelum) {
            $query->whereYear('tanggal', '<=', $tahunsebelum);
        }, 'simpanankhusus' => function ($query) use ($tahunsebelum) {
            $query->whereYear('tanggal', '<=', $tahunsebelum);
        }, 'pengambilan' => function ($query) use ($tahunsebelum) {
            $query->whereYear('tanggal', '<=', $tahunsebelum);
        }])->orderby('nama', 'asc')->get();

        // dd($indexsebelum);
        $data = [
            'akun' => $index,
            'tahun' => $this->id,
            'akunsebelum' => $indexsebelum,
        ];

        // dd($data['akun']);
        return view('admin.laporan.excelsimpanan', $data);
        // return view('admin.laporan.excelsimpanan', [
        //     'jabatan' => $jabatan
        // ]);
    }
}
