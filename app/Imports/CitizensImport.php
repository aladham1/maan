<?php

namespace App\Imports;

use App\Citizen;
use App\CitizenProjects;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitizensImport implements ToCollection, WithHeadingRow
{
    public $data;
    protected $project_id;

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $problems = new Collection();
        foreach ($rows as $row) {
            $validator = Validator::make($row->toArray(), [
                'alasm_alaol' => 'required',
                'asm_alab' => 'required',
                'asm_aljd' => 'required',
                'asm_alaaael' => 'required',
                'rkm_alhoy' => 'required',
                'rkm_altoasl_1' => 'required',
                'almhafth' => 'required',
                'almntk' => 'required',
                'alaanoan' => 'required',
                'rkm_tlb_almshroaa' => 'required',

            ]);
            if (!$validator->fails() && $this->idCheck($row['rkm_alhoy']) == true && $this->mobileCheck($row['rkm_altoasl_1']) == true) {
                $isExists = Citizen::where("id_number", $row['rkm_alhoy'])->count();

                if (!$isExists) {
                    if ($row['rkm_altoasl_2'] == '-') {
                        $row['rkm_altoasl_2'] = '';
                    }
                    $citizen = Citizen::create([
                        'first_name' => $row['alasm_alaol'],
                        'father_name' => $row['asm_alab'],
                        'grandfather_name' => $row['asm_aljd'],
                        'last_name' => $row['asm_alaaael'],
                        'id_number' => $row['rkm_alhoy'],
                        'mobile' => $row['rkm_altoasl_1'],
                        'mobile2' => $row['rkm_altoasl_2'],
                        'governorate' => $row['almhafth'],
                        'city' => $row['almntk'],
                        'street' => $row['alaanoan']
                    ]);

                    if (request('project_id')) {
                        $CitizenProjects = CitizenProjects::create([
                            'citizen_id' => $citizen->id,
                            'project_id' => $this->project_id,
                            'project_request' => $row['rkm_tlb_almshroaa']

                        ]);

                    }
                } else {
                    if (request('project_id')) {
                        $citizen = Citizen::where("id_number", $row['rkm_alhoy'])->first();
                        $projectciz = CitizenProjects::where(['citizen_id' => $citizen->id, 'project_id' => $this->project_id])->count();
                        if (!$projectciz) {
                            $CitizenProjects = CitizenProjects::create([
                                'citizen_id' => $citizen->id,
                                'project_id' => $this->project_id,
                                'project_request' => $row['rkm_tlb_almshroaa']

                            ]);
                        }
                    }
                }
            } else {
                $first_name = 0; $father_name = 0; $grandfather_name = 0; $last_name = 0;
                $id_number = 0; $mobile = 0; $mobile2 = 0; $street = 0; $city = 0;
                $governorate = 0; $project_request = 0;

                if (empty($row['alasm_alaol']) ){
                    $first_name = 1;
                }
                if (empty($row['asm_alab']) ){
                    $father_name = 1;
                }
                if (empty($row['asm_aljd']) ){
                    $grandfather_name = 1;
                }
                if (empty($row['asm_alaaael']) ){
                    $last_name = 1;
                }
                if (empty($row['rkm_alhoy']) || $this->idCheck($row['rkm_alhoy']) == false){
                    $id_number = 1;
                }
                if (empty($row['rkm_altoasl_1']) || $this->mobileCheck($row['rkm_altoasl_1']) == false ){
                    $mobile = 1;
                }
                if ((!empty($row['rkm_altoasl_2']) || $row['rkm_altoasl_2'] == '-') && $this->mobileCheck($row['rkm_altoasl_2']) == false){
                    $mobile2 = 1;
                }
                if (empty($row['almhafth']) ){
                    $governorate = 1;
                }

                if (empty($row['almntk']) ){
                    $city = 1;
                }

                if (empty($row['alaanoan']) ){
                    $street = 1;
                }
                if (empty($row['rkm_tlb_almshroaa']) ){
                    $project_request = 1;
                }

                $problem = [
                    'first_name' => $row['alasm_alaol'],
                    'error_first_name' => $first_name,
                    'father_name' => $row['asm_alab'],
                    'error_father_name' => $father_name,
                    'grandfather_name' => $row['asm_aljd'],
                    'error_grandfather_name' => $grandfather_name,
                    'last_name' => $row['asm_alaaael'],
                    'error_last_name' => $last_name,
                    'id_number' => $row['rkm_alhoy'],
                    'error_id_number' => $id_number,
                    'mobile' => $row['rkm_altoasl_1'],
                    'error_mobile' => $mobile,
                    'mobile2' => $row['rkm_altoasl_2'],
                    'error_mobile2' => $mobile2,
                    'governorate' => $row['almhafth'],
                    'error_governorate' => $governorate,
                    'city' => $row['almntk'],
                    'error_city' => $city,
                    'street' => $row['alaanoan'],
                    'error_street' => $street,
                    'project_request' => $row['rkm_tlb_almshroaa'],
                    'error_project_request' => $project_request
                ];
                $problems->push((object)$problem);
            }
        }
        $this->data = $problems;
    }

    public function idCheck(int $id)
    {
        if (strlen($id) != 9 || !preg_match('/^[0-9]*$/', $id)) {
            return false;
        } else {
            // our ID calculation here
            // 123456789
            $Ldigit = $id % 10;

            $j1 = 1; // division
            $j2 = 10; // mod
            $arr = array();
            $arr2 = array();

            for ($i = 0; $i < 8; $i++) {
                $j1 = $j1 * 10;
                $j2 = $j2 * 10;

                $t1 = $id % $j2;
                $t2 = ($t1 / $j1) | 0;
                $arr[$i] = $t2;

            }

            $j = 7;

            for ($i = 0; $i < 8; $i++) {
                $arr2[$j] = $arr[$i];
                $j--;
            }

            $odd = 1;
            for ($i = 0; $i < 8; $i++) {
                if ($odd == 1) {
                    $arr2[$i] = $arr2[$i] * 1;
                    $odd = 2;
                } else {
                    $arr2[$i] = $arr2[$i] * 2;
                    $odd = 1;
                }

                if ($arr2[$i] > 9) // if elemenet  > 9
                {
                    $temp = str_split(strval($arr2[$i]));

                    $temp = (int)$temp[0] + (int)$temp[1];

                    $arr2[$i] = $temp;
                }

            }

            $sub = 0;

            for ($i = 0; $i < 8; $i++) {
                $sub += $arr2[$i];

            }
            $Valid = str_split(strval($sub));
            $Valid = $Valid[1];
            $Valid = 10 - $Valid;

            if ($Ldigit == $Valid) {
                return true;
            } else {
                return false;
            }

        }
    }

    public function mobileCheck(int $mobile)
    {
        if (strlen($mobile) != 9 || !preg_match('/^(59|56)[0-9-+]+$/', $mobile)) {
            return false;
        } else {
            return true;
        }

    }

    public function headingRow(): int
    {
        return 3;
    }
}
