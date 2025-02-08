<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdfall extends Dompdf
{
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    protected function ci()
    {
        return get_instance();
    }
    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->set_option('isRemoteEnabled', true);
        $this->load_html($html);
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        // $font = $this->getFontMetrics()->get_font("Arial", "bold");
        // $this->getCanvas()->page_text(40, 10, "Hal: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        // $this->get_canvas()->get_cpdf()->setEncryption('password', 'owner', array('copy', 'print'));
        $this->stream($this->filename, array("Attachment" => false));
    }
}
