<?php


namespace App\Services;

use Mpdf\Mpdf;
use App\Models\Report;
use App\Models\Ziyara;
use App\Models\Evaluation;
use App\Models\MonthlyReport;
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

    public function exportMonthlyReport(MonthlyReport $report)
    {
        $html = "
        <table data-table-theme='default zebra' style='margin: 0 auto 15px; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;'>
            <tbody>
                <tr style='background: rgba(0,0,0,.05);'> 
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>المدرسة</td>
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>{$report->school}</td>
                </tr>

                <tr style='background: rgba(0,0,0,.05);'> 
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>تاريخ التقرير</td>
                    <td style='padding: .6em 1em; border: 1px solid lightgrey;'>{$report->report_date->format('d / m / Y')}</td>
                </tr>
            </tbody>
        </table>";

        $html .= '<table data-table-theme="default zebra" style="margin: 0 auto; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;">';
        $html .= '<thead>
                    <tr>
                        <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em 1em; border: 1px solid lightgrey;">البند</th>
                        <th style="color: #777; background: rgba(0,0,0,.1); padding: .6em 1em; border: 1px solid lightgrey;">العدد</th>
                    </tr>
                </thead>';
        $html .= '<tbody>';

        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الأنشطة المنفذة خارج المدارس</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q1}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الأنشطة المنفذة داخل المدارس</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q2}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب الذين اجتازوا اختبارات قياس التعرف على الموهوبين</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q3}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب المشاركين في برامج مؤسسة موهبة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q3}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب المشاركين في الأولمبياد العلمي</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q3}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب الذين حققوا مراكز متقدمة في النشاط</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q3}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد المعلمين الذين حققوا مراكز متقدمة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->q3}</td>
                    </tr>";

        $html .= '</tbody>';
        $html .= '</table>';

        // Load a stylesheet
        $this->mpdf->WriteHTML($html);
        $path = 'app/public/print.pdf';
        $this->mpdf->Output(storage_path($path), \Mpdf\Output\Destination::FILE);
        return $path;
    }

    public function exportReport(Report $report)
    {
        $html = '<table data-table-theme="default zebra" style="margin: 0 auto; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;">';
        $html .= '<tbody>';

        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>التاريخ</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->created_at->format('d / m / Y')}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>نتيجة التقييم</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$this->evaluate($report->evaluation)}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عنوان التقرير</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->name}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>رقم النشاط</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->number}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>المدرسة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->school}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>المجال</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->field}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>القيمة التربوية</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->value}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب المشاركين</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->mocharikin}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب المنظمين</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->monadimin}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>عدد الطلاب الجمهور</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->jomhor}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>إجمالي عدد المشاركين</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->total_mocharikin}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>أبرز ما تم تنفيذه من المدرسة للطلاب</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$this->done($report->executed)}</td>
                    </tr>";

        $html .= '</tbody>';
        $html .= '</table>';

        // Load a stylesheet
        $this->mpdf->WriteHTML($html);
        $path = 'app/public/print.pdf';
        $this->mpdf->Output(storage_path($path), \Mpdf\Output\Destination::FILE);
        return $path;
    }

    public function exportEvaluation(Report $report)
    {
        $html = '<table data-table-theme="default zebra" style="margin: 0 auto; color: #333; background: white; border: 1px solid grey; font-size: 12pt; border-collapse: collapse;">';
        $html .= '<tbody>';

        $html .= "<tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center; font-weight: bold;'>عنوان التقرير</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center; font-weight: bold;' colspan='2'>{$report->name}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>الفكرة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->idea}</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q1}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>القيمة التربوية</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->value}</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q2}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;' rowspan='3'>التخطيط</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>الالتزام بالتنفيذ حسب الخطة الزمنية المعتمدة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q3}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>رفع بيانات المشاركين على المنصة في الوقت المحدد</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q4}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>رفع تقرير النشاط خلال أسبوع من تاريخ التنفيذ</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q5}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;' rowspan='3'>جودة التنفيذ</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>حضور الطلاب والمشرف للدورات والمحاضرات</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q6}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>التقيد بتعليمات وشروط المسابقة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q7}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>توفر إعلانات تخص النشاط المنفذ</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q8}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>الفئة المستهدفة</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>تسجيل العدد المخصص لكل مدرسة (5طلاب)</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q9}</td>
                    </tr>
                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;'>مناسبة النشاط</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>مناسبة النشاط للمرحلة العمرية</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q10}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey;' rowspan='2'>النشر والتوثيق</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>توثيق النشاط ( صور + فيديو )</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q11}</td>
                    </tr>
                    <tr> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>النشر الإعلامي ( حسابات المدرسة والإدارة )</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; text-align: center;'>{$report->evaluation->q12}</td>
                    </tr>

                    <tr style='background: rgba(0,0,0,.05);'> 
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; font-weight: bold; text-align: center;' colspan='2'>المجموع</td>
                        <td style='padding: .6em 1em; border: 1px solid lightgrey; font-weight: bold; text-align: center;'>{$report->evaluation->total}</td>
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

    private function evaluate($evaluation)
    {
        if ($evaluation) {
            return $evaluation->total;
        } else {
            return 'لم يتم التقييم بعد';
        }
    }

    private function done($executed)
    {
        $str = '';
        foreach ($executed as $record) {
            $str .= $record['id'] . '- ' . $record['name'] . '<br/>';
        }
        return $str;
    }
}
