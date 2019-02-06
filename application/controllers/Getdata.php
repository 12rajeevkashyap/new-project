<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Controller {

public function index()
{

 $this->load->view('pagination');


if (!(isset($_GET['pagenum']))) { 
 $pagenum = 1; 
} else {

$pagenum = intval($_GET['pagenum']); 		

}

$page_limit =  ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? intval($_GET["show"]) : 10;

  $this->load->model('insertdata');

   $data['value']=$this->insertdata->pagination();

   try {
  $stmt = $DB->prepare($sql);
  $stmt->execute();
  $tresults = $stmt->fetchAll();
} catch (Exception $ex) {
  echo($ex->getMessage());
}

   
    
$cnt = $tresults[0]["count"];

//Calculate the last page based on total number of rows and rows per page. 
$last = ceil($cnt/$page_limit); 

//this makes sure the page number isn't below one, or more than our maximum pages

if ($pagenum < 1) { 
$pagenum = 1; 
} elseif ($pagenum > $last)  { 
$pagenum = $last; 
}
$lower_limit = ($pagenum - 1) * $page_limit;


 $data['value1']=$this->insertdata->paginationc($lower_limit,$page_limit);


    

try {
  $stmt = $DB->prepare($sql2);
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo($ex->getMessage());
}
?>
<table class="bordered">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>AGE</th>
  </tr>
  <?php foreach ($results as $res) { ?>
  <tr>
    <td align="center"><?php echo $res['id'] ?></td>
    <td align="center"><?php echo $res['name'] ?></td>
    <td align="center"><?php echo $res['age'] ?></td>
  </tr>
    <?php 

}
?>


</table>
<div class="height30"></div>
<table width="50%" border="0" cellspacing="0" cellpadding="2"  align="center">
<tr>
<td valign="top" align="left">

<label> Rows Limit: 
<select name="show" onChange="changeDisplayRowCount(this.value);">
<option value="10" <?php if ($_GET["show"] == 10 || $_GET["show"] == "" ) { echo ' selected="selected"'; }  ?> >10</option>
<option value="20" <?php if ($_GET["show"] == 20) { echo ' selected="selected"'; }  ?> >20</option>
<option value="30" <?php if ($_GET["show"] == 30) { echo ' selected="selected"'; }  ?> >30</option>
</select>
</label>

</td>
<td valign="top" align="center" >

<?php
if ( ($pagenum-1) > 0) {
?>	
 <a href="javascript:void(0);" class="links" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo 1; ?>');">First</a>
<a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum-1; ?>');">Previous</a>
<?php
}
//Show page links
for($i=1; $i<=$last; $i++) {
	if ($i == $pagenum ) {
?>
	<a href="javascript:void(0);" class="selected" ><?php echo $i ?></a>
<?php
} else {  
?>
<a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a>
<?php 
}
} 
if ( ($pagenum+1) <= $last) {
?>
<a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum+1; ?>');" class="links">Next</a>
<?php } if ( ($pagenum) != $last) { ?>	
<a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $last; ?>');" class="links" >Last</a> 
<?php
} 
?>
</td>
<td align="right" valign="top">
Page <?php echo $pagenum; ?> of <?php echo $last; ?>
</td>
</tr>
</table>

<?php 

}
	
}
?>