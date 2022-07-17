<?php

namespace App\Imports;

use App\Citizen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
//use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
//use Maatwebsite\Excel\Concerns\SkipsFailures;
//use Maatwebsite\Excel\Concerns\SkipsOnError;
//use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class CitizenImport implements ToModel, WithValidation,WithHeadingRow
//,  SkipsOnError, SkipsOnFailure,
{
    use Importable;
//    ,SkipsErrors, SkipsFailures
    public function model(array $row)
    {

        return new Citizen([
            'first_name'  => $row[0],
            'father_name' => $row[1],
            'grandfather_name' => $row[2],
            'last_name' => $row[3],
            'id_number' => $row[4],
            'mobile' => $row[5],
            'mobile2' => $row[6],
            'governorate' => $row[7],
            'city' => $row[8],
            'street' => $row[9],
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => [
                'required',
            ],
            '1' => [
                'required',
            ],
            '2' => [
                'required',
            ],
            '3' => [
                'required',
            ],
            '4' => [
                'required',
            ],
            '5' => [
                'required',
            ],
            '7' => [
                'required',
            ],
            '8' => [
                'required',
            ],
            '9' => [
                'required',
            ],
        ];

    }

//    public function onError(Throwable $error)
//    {
//
//    }


    public function customValidationMessages()
    {
        return [
            '0.required' => 'الاسم غير مدخل، يرجى إدخال الاسم بالشكل الصحيح.',
            '1.required' => 'الاسم غير مدخل، يرجى إدخال الاسم بالشكل الصحيح.',
            '2.required' => 'الاسم غير مدخل، يرجى إدخال الاسم بالشكل الصحيح.',
            '3.required' => 'الاسم غير مدخل، يرجى إدخال الاسم بالشكل الصحيح.',
            '4.required' => 'رقم الهوية خطأ، يرجى إدخال رقم هوية صحيح.',
            '5.required' => 'رقم التواصل خطأ، يرجى إدخال رقم تواصل صحيح وفعال.',
            '7.required' => 'المحافظة غير مدخلة، يرجى اختيار المحافظة بالشكل الصحيح.',
            '8.required' => 'المنطقة غير مدخلة، يرجى إدخال اسم المنطقة بالشكل الصحيح.',
            '9.required' => 'العنوان غير مدخل، يرجى إدخال العنوان بالشكل الصحيح.',

        ];
    }

    public function headingRow(): int
    {
        return 3;
    }

}
