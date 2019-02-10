<?php

namespace App\Repositories;

use Maatwebsite\Excel\Facades\Excel;

trait ExcelTrait
{
    /**
     * Lưu file trên server
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function storeFile($path)
    {
        $file = Excel::load($path)->store('csv', storage_path('excel/imports'));
        return 'excel/imports/' . $file->filename . '.csv';
    }

    /**
     * Xóa file sau khi queue success
     * @param  [type] $pathFile [description]
     * @return [type]           [description]
     */
    public function removeFileImport($pathFile)
    {
        unlink(app()->storagePath($pathFile));
    }

    /**
     * Download file Excel mẫu
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function download($type)
    {
        if (in_array($type, $this->getExtension())) {
            $headerColums = $this->model->fields;
            Excel::create('Example', function($excel) use ($headerColums) {
                $excel->sheet('Sheet1', function($sheet) use ($headerColums) {
                    $sheet->appendRow($headerColums);
                });
            })->download($type);
        }
    }

    /**
     * Xuất file
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function export($type)
    {
        $fileName = ucwords($this->model->getTable()) . '_' . date('His_dmY');
        if (in_array($type, $this->getExtension())) {
            Excel::create($fileName, function($excel){
                $excel->sheet('Sheet1', function($sheet){
                    $sheet->fromModel($this->getAll());
                });
            })->store($type, storage_path('excel/exports'));
        }
    }

    /**
     * Lấy ra các định dạng phù hợp của file
     * @return [type] [description]
     */
    public function getExtension()
    {
        return $extension = [
            'xlsx',
            'xlsm',
            'xltx',
            'xltm',
            'xls',
            'xlt',
            'htm',
            'html',
            'csv',
            'txt'
        ];
    }
}
