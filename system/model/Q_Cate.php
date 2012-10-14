<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Q_Cate extends Db_class
{
	protected $p_table_name = array('cate');
	
	public function select($cond_arr=array(), $limit = '', $field='*', $tb_name = 0,  $index = 0, $sort='', $fetch = 0)
	{
		return self::exec_select($cond_arr, $field, $tb_name,  $index, $limit, $sort, $fetch);
	}
	
	public function insert($insert_arr = array(), $tb_name = 0)
	{
		return self::exec_insert($insert_arr, $tb_name);
	}
	
	public function update($update_arr = array(), $cond_arr = array(), $tb_name = 0)
	{
		return self::exec_update($update_arr, $cond_arr, $tb_name);
	}
	
	public function del($cond_arr = array(), $tb_name = 0)
	{
		return self::exec_del($cond_arr, $tb_name);
	}
}
?>