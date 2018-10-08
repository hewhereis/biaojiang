<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class InvoiceModel extends Model
{
	protected $name = 'invoice';
   /**
    * 发票列表
    */
   public function invoice_liebiao($map, $Nowpage, $limits){
   	  $field = 'id,order_number,price,service_name,invoice_type,shibiehao,opening_account,opening_bank,company_address,company_xiangxi,invoice_title,company_phone,company_img,taxpayer_img';
		return $this->field($field)->where($map)->where('status',0)->page($Nowpage, $limits)->order('id desc')->select();
   }
   /**
    * 发票退票
    */
   public function invoice_tui($map, $Nowpage, $limits){
   	  $field = 'id,order_number,reason,express,express_number,remark';
   	  return Db::name('invoice_tui')->field($field)->where($map)->where('status',0)->page($Nowpage, $limits)->order('id desc')->select();
   }
}