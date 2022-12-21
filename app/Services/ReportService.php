<?php


namespace App\Services;

use App\Models\Report;

class ReportService
{

    public function update($data, $report)
    {
        $data = $this->uploadStuff($data);
        $report->update($data);
    }

    public function store($data)
    {
        $data = $this->uploadStuff($data);
        Report::create($data);
    }

    private function uploadStuff($data)
    {
        // Manage uploading photos
        $img1 = [];
        foreach ($data['img1'] as $img) {
            if (preg_match('/^data:image\/(\w+);base64,/', $img['file'])) {
                $path = upload_base64_image($img['file'], 'reports/img1/' . uniqid() . '-img1.');
                $img['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
            }
            $img1[] = $img;
        }
        $data['img1'] = $img1;

        $img2 = [];
        foreach ($data['img2'] as $img) {
            if (preg_match('/^data:image\/(\w+);base64,/', $img['file'])) {
                $path = upload_base64_image($img['file'], 'reports/img2/' . uniqid() . '-img2.');
                $img['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
            }
            $img2[] = $img;
        }
        $data['img2'] = $img2;

        $img3 = [];
        foreach ($data['img3'] as $img) {
            if (preg_match('/^data:image\/(\w+);base64,/', $img['file'])) {
                $path = upload_base64_image($img['file'], 'reports/img3/' . uniqid() . '-img3.');
                $img['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
            }
            $img3[] = $img;
        }
        $data['img3'] = $img3;

        $img4 = [];
        foreach ($data['img4'] as $img) {
            if (preg_match('/^data:image\/(\w+);base64,/', $img['file'])) {
                $path = upload_base64_image($img['file'], 'reports/img4/' . uniqid() . '-img4.');
                $img['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
            }
            $img4[] = $img;
        }
        $data['img4'] = $img4;

        return $data;
    }
}
