<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        HeadingRowFormatter::default('none');

        return new Customer([
            'customer' => $row['customer'],
            'country'  => $row['country'],
            'order'    => $row['order'],
            'status'   => $row['status'],
            'group'    => $row['group'],
            'file'     => Customer::CSV
        ]);
    }
}
