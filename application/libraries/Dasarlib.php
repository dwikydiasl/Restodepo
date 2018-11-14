<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasarlib {

    // fungsi untuk mengembalikan random string sepanjang length-nya
    public function getRandomString($length) {
        settype($template, "string");
        //$template = "123456789abcdefghijklmnopqrstuvwxyz";
        $template = "1234567890";

        settype($length, "integer");
        settype($rndstring, "string");
        settype($a, "integer");
        settype($b, "integer");

        for ($a = 1; $a <= $length; $a++) {
            $b = rand(0, strlen($template) - 1);
            $rndstring .= $template[$b];
        }

        return $rndstring;
    }

    // fungsi untuk post http 
    function httpPostCurl($url, $params) {
        $postData = '';
        //create name value pairs seperated by &
        foreach ($params as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }

        rtrim($postData, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    // fungsi untuk get http 	
    function sendGet($url) {
        error_log('sendGeturl:' . $url);
        $ch = curl_init();
        error_log('curl init');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        error_log('curl before exec');
        $result = curl_exec($ch);
        error_log('curl after exec');
        curl_close($ch);
        error_log('sendGetresult:' . $result);
        return $result;
    }

    // fungsi untuk ubah tanggal, dari database format Y-m-d H:i:s menjadi d-m-Y H:i:s
    function ubahTanggalPanjang($tanggal) {
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, 8, 2);
        $jam = substr($tanggal, 11, 2);
        $menit = substr($tanggal, 14, 2);
        $detik = substr($tanggal, -2);
        $tg = "$hari-$bulan-$tahun $jam:$menit:$detik";
        return $tg;
    }

    function ubahTanggalPanjang2($tanggal) {
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, 8, 2);
        $jam = substr($tanggal, 11, 2);
        $menit = substr($tanggal, 14, 2);
        $detik = substr($tanggal, -2);
        if ($bulan == '01') {
            $bln = 'Jan';
        } elseif ($bulan == '02') {
            $bln = 'Feb';
        } elseif ($bulan == '03') {
            $bln = 'Mar';
        } elseif ($bulan == '04') {
            $bln = 'Apr';
        } elseif ($bulan == '05') {
            $bln = 'May';
        } elseif ($bulan == '06') {
            $bln = 'Jun';
        } elseif ($bulan == '07') {
            $bln = 'Jul';
        } elseif ($bulan == '08') {
            $bln = 'Aug';
        } elseif ($bulan == '09') {
            $bln = 'Sep';
        } elseif ($bulan == '10') {
            $bln = 'Oct';
        } elseif ($bulan == '11') {
            $bln = 'Nov';
        } else {
            $bln = 'Des';
        }
        // $tg = "$hari $bln $tahun $jam:$menit:$detik";
        $tg = "$hari $bln $tahun";
        return $tg;
    }

    function ubahTanggalPanjang3($tanggal) {
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, 8, 2);
        $jam = substr($tanggal, 11, 2);
        $menit = substr($tanggal, 14, 2);
        $detik = substr($tanggal, -2);
        if ($bulan == '01') {
            $bln = 'Jan';
        } elseif ($bulan == '02') {
            $bln = 'Feb';
        } elseif ($bulan == '03') {
            $bln = 'Mar';
        } elseif ($bulan == '04') {
            $bln = 'Apr';
        } elseif ($bulan == '05') {
            $bln = 'May';
        } elseif ($bulan == '06') {
            $bln = 'Jun';
        } elseif ($bulan == '07') {
            $bln = 'Jul';
        } elseif ($bulan == '08') {
            $bln = 'Aug';
        } elseif ($bulan == '09') {
            $bln = 'Sep';
        } elseif ($bulan == '10') {
            $bln = 'Oct';
        } elseif ($bulan == '11') {
            $bln = 'Nov';
        } else {
            $bln = 'Des';
        }
        // $tg = "$hari $bln $tahun $jam:$menit:$detik";
        $tg = "$hari $bln $tahun $jam:$menit";
        return $tg;
    }
    // ubah tanggal pendek, dari database format Y-m-d menjadi d-m-Y
    function ubahTanggalPendek($tanggal) {
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, -2);
        $tg = "$hari-$bulan-$tahun";
        return $tg;
    }

    function ubahTanggalPendek2($tanggal) {
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, -2);
        if ($bulan == '01') {
            $bln = 'Jan';
        } elseif ($bulan == '02') {
            $bln = 'Feb';
        } elseif ($bulan == '03') {
            $bln = 'Mar';
        } elseif ($bulan == '04') {
            $bln = 'Apr';
        } elseif ($bulan == '05') {
            $bln = 'Mei';
        } elseif ($bulan == '06') {
            $bln = 'Jun';
        } elseif ($bulan == '07') {
            $bln = 'Jul';
        } elseif ($bulan == '08') {
            $bln = 'Agt';
        } elseif ($bulan == '09') {
            $bln = 'Sep';
        } elseif ($bulan == '10') {
            $bln = 'Okt';
        } elseif ($bulan == '11') {
            $bln = 'Nov';
        } else {
            $bln = 'Des';
        }
        $tg = "$hari $bln $tahun";
        return $tg;
    }

    // ubah tanggal pendek, dari database format d-m-Y menjadi Y-m-d 
    function balikTanggalPendek($tanggal) {
        $tahun = substr($tanggal, -4);
        $bulan = substr($tanggal, 3, 2);
        $hari = substr($tanggal, 0, 2);
        $tg = "$tahun-$bulan-$hari";
        return $tg;
    }

    // fungsi tambah $days hari dari tanggal $date, format $date adalah Y-m-d
    function addDayswithdate($date, $days) {
        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    }

    // fungsi untuk cek password, apakah valid, dalam artian panjang 4-16 char, alphanumeric + beberapa special char
    function isValidPassword($pass) {
        if (preg_match('/^[0-9A-Za-z!@#$%]{4,16}$/', $pass)) {
            return true;
        } else {
            return false;
        }
    }

    // fungsi untuk cek username, apakah valid, dalam artian panjang 4-16 char, alphanumeric 
    function isValidUsername($username) {
        if (preg_match('/^[0-9A-Za-z@._]{4,16}$/', $username)) {
            return true;
        } else {
            return false;
        }
    }

    // fungsi untuk membuat permalink
    function buatPermalink($source) {
        // return false if $source is empty
        if (!$source) {
            return false;
        }

        // convert to lowercase
        $slug = strtolower($source);

        // replace special characters with acceptable alternatives
        $slug = str_replace('&amp;', 'and', $slug);

        // remove other special characters completely (e.g. percentages, apostrophes)
        $slug = preg_replace('/[%\'"``]/', '', $slug);

        // replace all other non-alphanumeric characters with a hyphen
        $slug = preg_replace('/[^a-zA-Z0-9-]/', '-', $slug);

        // replace multiple hyphens with one
        $slug = preg_replace("/[-]+/", "-", $slug);

        // remove un-needed hyphens from the start and end
        $slug = trim($slug, '-');

        return $slug;
    }

    function buatPermalinkNamaFile($source) {
        // return false if $source is empty
        if (!$source) {
            return false;
        }

        // convert to lowercase
        $slug = strtolower($source);

        // replace special characters with acceptable alternatives
        $slug = str_replace('&amp;', 'and', $slug);

        // remove other special characters completely (e.g. percentages, apostrophes)
        $slug = preg_replace('/[%\'"``]/', '', $slug);

        // replace all other non-alphanumeric characters with a hyphen
        $slug = preg_replace('/[^a-zA-Z0-9-]/', '_', $slug);

        // replace multiple hyphens with one
        $slug = preg_replace("/[_]+/", "_", $slug);

        // remove un-needed hyphens from the start and end
        $slug = trim($slug, '_');

        return $slug;
    }

    //fungsi untuk ambil IP client
    function ambilIPClient() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //to check ip is pass from proxy  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    // fungsi untuk memaksa browser download
    function forceDownload($file) {
        if ((isset($file)) && (file_exists($file))) {
            header("Content-length: " . filesize($file));
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            readfile("$file");
        } else {
            echo "No file selected";
        }
    }

    /* Resize image on the fly
     * @filename - path to the image 
     * @tmpname - temporary path to thumbnail 
     * @xmax - max width 
     * @ymax - max height 
     */

    function resizeImage($filename, $tmpname, $xmax, $ymax) {
        $ext = explode(".", $filename);
        $ext = $ext[count($ext) - 1];

        if ($ext == "jpg" || $ext == "jpeg")
            $im = imagecreatefromjpeg($tmpname);
        elseif ($ext == "png")
            $im = imagecreatefrompng($tmpname);
        elseif ($ext == "gif")
            $im = imagecreatefromgif($tmpname);

        $x = imagesx($im);
        $y = imagesy($im);

        if ($x <= $xmax && $y <= $ymax)
            return $im;

        if ($x >= $y) {
            $newx = $xmax;
            $newy = $newx * $y / $x;
        } else {
            $newy = $ymax;
            $newx = $x / $y * $newy;
        }

        $im2 = imagecreatetruecolor($newx, $newy);
        imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);
        return $im2;
    }

    // cek apakah boleh lihat menu ini
    public function apakahBolehMelakukan($namaarea, $namaaksi, $userid) {
        $CI = & get_instance();
        $CI->load->model('dasar_model');

        $boleh = false;

        // cari id areanya dulu
        $namatabel = "area_tugas";
        $namafield = "kode";
        $dearea = $CI->dasar_model->getDetailOnField($namatabel, $namafield, $namaarea);
        $idarea = $dearea['id'];

        $boleh = $CI->dasar_model->getpriv($namaaksi, $userid, $idarea);

        //var_dump($boleh);exit;

        return $boleh;
    }

    // untuk ngecek apakah checkbox ini dipilih/dicentang
    public function IsChecked($chkname, $value) {
        if (!empty($_POST[$chkname])) {
            foreach ($_POST[$chkname] as $chkval) {
                if ($chkval == $value) {
                    return true;
                }
            }
        }
        return false;
    }


	
	function cetak_tabel($hirarki){
		$return='';
		foreach($hirarki as $key=>$row){
			$id_pertanyaan='';
			$i=$this->row_excel+2;
			if (array_key_exists('nama', $row)) {
				$text=$row['nama'].'. '.$row['deskripsi'];
				$do=1;
			}else{
				$text=$row['question'];
				$do=0;
				$styleArray = array(
					'font'  => array(
						'bold'  => true,
						'color' => array('rgb' => 'FF0000')
					));
				$this->objPHPExcel->getActiveSheet()->getStyle('B' . $i)->applyFromArray($styleArray);
				$id_pertanyaan=$row['id_pertanyaan'].' - '.$row['jenis_jawaban'];
			}
			$no='';
			if(array_key_exists('parent_id', $row)){
				$no=@$row['parent_id']==0?$key+1:'';
			}
			$this->objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $i, @$no)
                        ->setCellValue('B' . $i, trim($text));
			if($id_pertanyaan!=''){
				foreach($row['answer'] as $key2=>$row2){
					$column=array_search($row2['id_peserta'],$this->peserta_id);
					$this->objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($this->column($column) . $i, @$row2['jawaban']);
				}
			}
			$this->row_excel++;
			
			if (array_key_exists('child', $row)){
				if(isset($row['child'])){
					if($do==1){
						$this->cetak_tabel($row['child']);
					}
				}
			}
		}
	}
	
	public function buat_tabel($hirarki,$return=''){
		foreach ($hirarki as $key=>$row){
			$no=@$row['parent_id']==0?$key:'';
			$text=array_key_exists('nama', $row)?$row['nama']:'';
			$return.='<tr>';
			$return.='<td>'.@$no.'</td>';
			$return.='<td>'.$text.'</td>';
			$return.='<td></td>';
			$return.='<td></td>';
			$return.='</tr>';
			if (array_key_exists('child', $row)){
				$return.=$this->buat_tabel($row['child'],$return);
			}
		}
		return $return;
	}
	
	function column($index){
		$array = array('A');
		$current = 'A';
		while ($current != 'XFD') {
			$array[] = ++$current;
		}
		$index=(int)$index-2;
		return $array[$index];
	}

    // send E-Mail
    
function send_email($data){
        $CI =& get_instance();
        $CI->load->library('email');
        /* $config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'cmsdesa1@gmail.com',
            'smtp_pass' => 'cmsdesa2017',
            'charset'   => 'utf-8',
            'mailtype'  => 'html',
            'wordwrap' => TRUE
        ); */
        
        $config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.postmarkapp.com',
            'smtp_port' => 2525,
            'smtp_user' => '7401dc5e-bba7-437e-a5cd-ae35eeef7255',
            'smtp_pass' => '7401dc5e-bba7-437e-a5cd-ae35eeef7255',
            'charset'   => 'utf-8',
            'mailtype'  => 'html',
            'wordwrap' => TRUE
        );

        $CI->email->initialize($config);
        $CI->email->set_newline("\r\n");
        $CI->email->to($data['email_tujuan']);
        $CI->email->from($data['email_pengirim']);
        $CI->email->subject($data['subjek']);
        $message = $CI->load->view('public/email/' . $data['template'], $data, TRUE);
        $CI->email->message($message);
        if($CI->email->send()){
            RETURN TRUE;
        } else {
            $CI->email->print_debugger();
            RETURN FALSE;
        }

    }


}

?>
