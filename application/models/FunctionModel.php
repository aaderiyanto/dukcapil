<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class FunctionModel extends CI_Model
{
    function nextid($idfield, $tablename)
    {
        $this->db->select("MAX(" . $idfield . ") AS latestId", FALSE);
        $query = $this->db->get("$tablename");
        $data = $query->row();
        $latestId = intval($data->latestId);
        $nowId = 1;
        if (!empty($latestId)) {
            $nowId = $latestId + 1;
        }
        return $nowId;
    }
    function nextsort($table, $section, $sectionval, $sortfield)
    {
        $this->db->select("MAX(" . $sortfield . ") AS lastnum", FALSE);
        $this->db->where("$section", $sectionval);
        $query = $this->db->get("$table");
        $data = $query->row();
        $lastnum = intval($data->lastnum) + 1;
        return $lastnum;
    }
}
