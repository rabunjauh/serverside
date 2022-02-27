<?php
defined('BASEPATH') or exit('No direct script access allowed');

// class Serverside_model extends CI_Model
// {
//     var $table = 'tblfile_position';
//     var $column_order = array('idposition', 'positiondesc');
//     var $order = array('idposition', 'positiondesc');

//     private function _get_data_query()
//     {
//         $this->db->from($this->table);
//         if (isset($_POST['search']['value'])) {
//             $this->db->like('idposition', $_POST['search']['value']);
//             $this->db->or_like('positiondesc', $_POST['search']['value']);
//         }

//         if (isset($_POST['order'])) {
//             $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
//         } else {
//             $this->db->order_by('idposition', 'DESC');
//         }
//     }

//     public function getDataTable()
//     {
//         $this->_get_data_query();
//         $query = $this->db->get();
//         return $query->result();
//     }

//     public function count_filtered_data()
//     {
//         $this->db->_get_data_query();
//         $query = $this->db->get();
//         return $query->num_rows();
//     }

//     public function count_all_data()
//     {
//         $this->db->from($this->table);
//         return $this->db->count_all_results();
//     }
// }

class Serverside_model extends CI_Model
{
    var $table = 'tblmas_employee';
    var $column_order = array(null, 'employeeno', 'employeename');
    var $order = array(null, 'employeeno', 'employeename');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        if (isset($_POST['search']['value'])) {
            $this->db->like('employeeno', $_POST['search']['value']);
            $this->db->or_like('employeename', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            // var_dump($this->order[$_POST['order']['0']['column']]);
            // die;
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('employeeno', 'DESC');
        }
    }

    public function getDataTable()
    {
        $this->_get_data_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data()
    {
        $this->_get_data_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
