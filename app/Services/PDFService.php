<?php


namespace App\Services;

use Mpdf\Mpdf;
use App\Models\Ziyara;
use App\Models\ZiyaratMochrif;
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
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">المشرف</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">المجال</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">الأحد</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">الإثنين</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">الثلاثاء</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">الأربعاء</th>
                    <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em; border: 1px solid lightgrey;">الخميس</th>
                    </tr>
                </thead>';
        $html .= '<tbody>';
        $x = 1;
        $visits->each(function ($visit) use (&$html, &$x) {
            $html .= "<tr " . ($x % 2 ? "" : "style='background: rgba(0,0,0,.05);'") . "> 
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->user->name}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->user->field}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->q1}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->q2}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->q3}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->q4}</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>{$visit->q5}</td>
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

    public function exportVisit(ZiyaratMochrif $visit)
    {

        $html = "
        <table data-table-theme='default zebra' style='margin: 0 auto 15px; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;'>
            <tbody>
                <tr style='background: rgba(0,0,0,.05);'> 
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>المدرسة</td>
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>{$visit->school}</td>
                </tr>
                <tr> 
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>رائد النشاط</td>
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>{$visit->user->name}</td>
                </tr>
                <tr style='background: rgba(0,0,0,.05);'> 
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>التاريخ</td>
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>{$visit->date->format('d / m / Y')}</td>
                </tr>
            </tbody>
        </table>";

        $html .= '<table data-table-theme="default zebra" style="margin: 0 auto; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;">';
        $html .= '<thead>
                    <tr>
                        <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em 1em; border: 1px solid lightgrey;">العناصر</th>
                        <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em 1em; border: 1px solid lightgrey;">البيان</th>
                        <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em 1em; border: 1px solid lightgrey;">تم</th>
                    </tr>
                </thead>';
        $html .= '<tbody>';

        // متطلبات عمل رائد النشاط الأساسية	
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;' rowspan='3'>متطلبات عمل رائد النشاط الأساسية</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>بناء خطة النشاط و إعادتها</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q1)}</td>
                    </tr>";
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>تكوين مجلس النشاط الطلابي</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q2)}</td>
                    </tr>";
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q3)}</td>
                    </tr>";

        // الأداء الفني لرائد النشاط
        $html .= "<tr> 
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;' rowspan='3'>الأداء الفني لرائد النشاط</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>بناء خطة النشاط و إعادتها</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q4)}</td>
                    </tr>";
        $html .= "<tr> 
                        <td style='padding: .6em; border: 1px solid lightgrey;'>تكوين مجلس النشاط الطلابي</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q5)}</td>
                    </tr>";
        $html .= "<tr> 
                        <td style='padding: .6em; border: 1px solid lightgrey;'>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q6)}</td>
                    </tr>";

        // مراجعة مدير المدرسة	
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;' rowspan='3'>مراجعة مدير المدرسة</td>
                        <td style='padding: .6em; border: 1px solid lightgrey;'>بناء خطة النشاط و إعادتها</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q7)}</td>
                    </tr>";
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em; border: 1px solid lightgrey;'>تكوين مجلس النشاط الطلابي</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q8)}</td>
                    </tr>";
        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em; border: 1px solid lightgrey;'>حفط سجلات العمل و إعداد التقارير و نماذج العمل</td>
                        <td style='padding: .6em; border: 1px solid lightgrey; text-align: center;'>{$this->tickOrX($visit->q9)}</td>
                    </tr>";


        $html .= '</tbody>';
        $html .= '</table>';

        // Load a stylesheet
        $this->mpdf->WriteHTML($html);
        $path = 'app/public/print.pdf';
        $this->mpdf->Output(storage_path($path), \Mpdf\Output\Destination::FILE);
        return $path;
    }

    private function tickOrX($condition)
    {
        if ($condition) {
            return '<svg fill="#777777" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>';
        } else {
            return '<svg fill="#777777" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
        }
    }
}
