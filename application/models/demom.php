<?php


class demom extends CI_Model {

public function insert($data)
{

$this->db->insert('demo',$data);


}
}