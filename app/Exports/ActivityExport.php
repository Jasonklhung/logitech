<?php

namespace App\Exports;

use App\Register;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActivityExport implements FromQuery ,WithHeadings
{
   use Exportable;

   public function search(int $id , string $start , string $end)
    {
        $this->id = $id;
        $this->start = $start;
        $this->end = $end;
        
        return $this;
    }

    public function query()
    {
        return Register::query()
        		->select('aRegister.rConsumer','aConsumer.cName','aConsumer.cGender','aConsumer.cBirthday','aConsumer.cMobile','aConsumer.cEmail',
        				'aZiparea.zCity','aZiparea.zArea','aConsumer.cAddress','aStore.sCity','aStore.sName','aRegister.rNetNumber','aRegister.rInvoiceNo','aRegister.rInvoiceImage','aProductList.pCategory','aProductList.pName','aRegister.rQuantity','aRegister.rCreateDateTime','aRegister.rank')
        		->leftjoin('aConsumer','aRegister.rConsumer','=','aConsumer.id')
                ->leftjoin('aStore','aStore.sId','=','aRegister.rStore')
        		->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
        		->leftjoin('aProductList','aProductList.pId','=','aRegister.rProduct')
        		->where('aRegister.rActivity',$this->id)
        		->whereBetween('aRegister.rCreateDateTime', [$this->start, $this->end]);
    }

    public function headings() :array
    {
        return [
            'id',
            '姓名',
            '性別',
            '生日',
            '手機',
            'Email',
            '縣市',
            '地區',
            '地址',
            '類別',
            '店家',
            '訂單編號',
            '發票號碼',
            '發票圖檔路徑',
            '商品類別',
            '商品名稱',
            '數量',
            '登錄時間',
            '登陸順序'
        ];
    }
}
