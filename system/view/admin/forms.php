﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$this->load_css('admin_style');
?>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-image:url(<?=IMG_PATH?>bg3.gif);  background-repeat:repeat-x;  padding-left:   2px; padding-right:  2px; padding-bottom: 2px; margin-top:5px;  border:#dfdfdf solid 1px;">
  <tr>
    <td align="center"><p class="pagetitle"><?=$title?></p></td>
  </tr>
</table>
<br />
<?
if(empty($type)){
	$append = '';	
}else{
	$append = array(
	array('form_code', $this->p_lang['code'], 'id'),
	array('form_review', $this->p_lang['review'], 'id')
	);	
}
$this->load_list($rs, 'forms', array('id', 'type'), $append);
echo '<br>';
echo page_bar($count, $this->p_num, '', 9, 'p')
?>
<br /><br />
<?
$this->load_php('admin/footer');
?>

</body>
</html>