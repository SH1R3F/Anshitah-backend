<?php


namespace App\Services;

use Mpdf\Mpdf;
use App\Models\Ziyara;
use Illuminate\Database\Eloquent\Collection;

class PDFService
{

    private $mpdf;

    public function __construct()
    {
        $this->mpdf = new Mpdf([
            'mode' => 'ar',
            'format' => 'A4-L',
            'margin_top' => 20,
            'fontDir' => [public_path('fonts/')],
            'fontdata' => [ // lowercase letters only in font key
                'almarai' => [ // must be lowercase and snake_case
                    'R'  => 'Almarai-Regular.ttf',    // regular font
                    'useOTL' => 0xFF, // Required to fix arabic characters
                    'useKashida' => 75, // Required to fix arabic characters
                ]
            ],
            'default_font' => 'almarai',
            'unAGlyphs' => true,
        ]);
        $this->mpdf->SetDirectionality('rtl');
        $this->mpdf->SetDisplayMode('fullpage');
    }


    public function exportVisits(Collection $visits)
    {
        $html = '<table data-table-theme="default zebra" style="margin: 0 auto; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;">';
        $html .= '<thead>
                    <tr>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">المشرف</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">المجال</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">الأحد</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">الإثنين</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">الثلاثاء</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">الأربعاء</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .5em; border: 1px solid lightgrey;">الخميس</th>
                    </tr>
                </thead>';
        $html .= '<tbody>';
        $x = 1;
        $visits->each(function ($visit) use (&$html, &$x) {
            $html .= "<tr " . ($x % 2 ? "" : "style='background: rgba(0,0,0,.05);'") . "> 
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->user->name}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->user->field}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->q1}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->q2}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->q3}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->q4}</td>
                        <td style='padding: .5em; border: 1px solid lightgrey;'>{$visit->q5}</td>
                    </tr>";
            $x++;
        });
        $html .= '</tbody>';
        $html .= '</table>';

        // Load a stylesheet
        $this->mpdf->WriteHTML($html);
        $path = 'app/public/print.pdf';
        $this->mpdf->Output(storage_path($path), \Mpdf\Output\Destination::FILE);
        return $path;
    }
}
