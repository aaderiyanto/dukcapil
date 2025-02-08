<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SerahTerimaModel extends CI_Model
{
    private $db3;

    public function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('db2', TRUE);
    }

    public function serahterimakode()
    {
        $bulan = date('n');
        $tahun = date('Y');

        // Konversi bulan ke angka Romawi
        $bulanRomawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];
        $bulanromawi = $bulanRomawi[$bulan];

        $this->db2->select('MAX(serah_terimas.KodeSt) as kode', FALSE);
        $this->db2->where('MONTH(TanggalDiterima)', $bulan);
        $this->db2->where('YEAR(TanggalDiterima)', $tahun);
        $this->db2->order_by('KodeSt', 'DESC');
        $this->db2->limit(1);
        $query = $this->db2->get('serah_terimas');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $urutan = (int) substr($data->kode, 0, 4); // Ambil 4 digit pertama untuk nomor urut
            $kode = $urutan + 1;
        } else {
            $kode = 1;
        }

        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = $batas . "/ST-DKH/" . $bulanromawi . "/" . $tahun;

        return $kodetampil;
    }
    function nextid($idfield, $tablename)
    {
        $this->db2->select("MAX(" . $idfield . ") AS latestId", FALSE);
        $query = $this->db2->get("$tablename");
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
        $this->db2->select("MAX(" . $sortfield . ") AS lastnum", FALSE);
        $this->db2->where("$section", $sectionval);
        $query = $this->db2->get("$table");
        $data = $query->row();
        $lastnum = intval($data->lastnum) + 1;
        return $lastnum;
    }
}
