<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\GejalaModel;
use App\Models\AkunModel;
use App\Controllers\BaseController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class Pages extends BaseController
{
    public function showHomePage()
    {
        // Cek autentikasi
        $role = $this->session->get('role');

        if ($role != 'admin') {
            $role = $this->session->get('role');

            if (!$this->session->has('idAkun')) {
                return redirect()->to('/home');
            }
            return view('home');
        } else {
            return redirect()->to('/unauthorized');
        }
    }

    public function showHistori()
    {
        // Cek autentikasi
        $role = $this->session->get('role');
        $userId = $this->session->get('idAkun');

        if ($role == 'admin') {
            if (!$this->session->has('idAkun')) {
                return redirect()->to('/histori');
            }
            $gejalaModel = new GejalaModel();
            $data['gejala'] = $gejalaModel->getGejalaWithAkun();
            // dd($data);
            return view('adminHistori', $data);
        } else {
            if (!$this->session->has('idAkun')) {
                return redirect()->to('/histori');
            }
            $gejalaModel = new GejalaModel();
            $data['gejala'] = $gejalaModel->getHistoriByUserId($userId);
            // dd($data);
            return view('histori', $data);
        }
        return redirect()->to('/unauthorized');
    }

    public function showKonsultasi()
    {
        // Cek autentikasi
        $role = $this->session->get('role');
        $userId = $this->session->get('idAkun');

        if ($role == 'admin') {
            if (!$this->session->has('idAkun')) {
                return redirect()->to('/konsultasi');
            }
        } else {
            if (!$this->session->has('idAkun')) {
                return redirect()->to('/konsultasi');
            }
            return view('konsultasi');
        }
        return redirect()->to('/unauthorized');
    }
    public function cekHasil()
    {
        $idLogin = $this->session->get('idAkun');
        // dd($this->request->getVar());
        $benjolan = $this->request->getPost('benjolan');
        $demam = $this->request->getPost('demam');
        $keringat = $this->request->getPost('keringat');
        $sakitTenggorokan = $this->request->getPost('sakitTenggorokan');
        $pilek = $this->request->getPost('pilek');
        $lelah = $this->request->getPost('lelah');
        $gatal = $this->request->getPost('gatal');
        $sesak = $this->request->getPost('sesak');
        $penurunanBerat = $this->request->getPost('penurunanBerat');


        // Set zona waktu untuk Indonesia
        $timezone = 'Asia/Jakarta';
        $format = 'd M Y H:i:s';
        $myTime = Time::now($timezone, 'id_ID');
        $formattedTime = $myTime->format($format);


        // TODO:Logika Pakaar
        if (
            $benjolan == 1 && $demam == 1 && $keringat == 1 && $sakitTenggorokan == 1 && $pilek == 1 && $lelah != 1 && $gatal != 1 && $sesak != 1
            && $penurunanBerat != 1
        ) {
            // dd("Kelenjar Getah Bening Terinfeksi");
            $this->session->setFlashdata('success', 'Anda Mengalami Kelenjar Getah Bening Terinfeksi');

            $hasil = 'Kelenjar Getah Bening Teinfeksi';
            $gejalaModel = new GejalaModel();
            $data = [
                'benjolan' => $benjolan,
                'demam' => $demam,
                'keringat' => $keringat,
                'sakitTenggorokan' => $sakitTenggorokan,
                'pilek' => $pilek,
                'lelah' => $lelah,
                'gatal' => $gatal,
                'sesak' => $sesak,
                'penurunanBerat' => $penurunanBerat,
                'id_pengguna' => $idLogin,
                'hasil' => $hasil,
                'timeCustom' => $formattedTime
            ];

            $gejalaModel->insert($data);


            return redirect()->back();
        }
        if (
            $benjolan == 1 && $demam == 1 && $keringat == 1 && $sakitTenggorokan != 1 && $pilek != 1 && $gatal == 1 && $sesak == 1
            && $penurunanBerat == 1
        ) {
            // dd("Kelenjar Getah Bening Kanker");
            $this->session->setFlashdata('success', 'Anda mengalami Kelenjar Getah Bening Kanker');
            $hasil = 'Kelenjar Getah Bening Kanker';
            $gejalaModel = new GejalaModel();
            $data = [
                'benjolan' => $benjolan,
                'demam' => $demam,
                'keringat' => $keringat,
                'sakitTenggorokan' => $sakitTenggorokan,
                'pilek' => $pilek,
                'lelah' => $lelah,
                'gatal' => $gatal,
                'sesak' => $sesak,
                'penurunanBerat' => $penurunanBerat,
                'id_pengguna' => $idLogin,
                'hasil' => $hasil,
                'timeCustom' => $formattedTime
            ];
            $gejalaModel->insert($data);
            return redirect()->back();
        } else {
            // dd("Penyakit anda bukan keduanya");
            $this->session->setFlashdata('success', 'Penyakit anda bukan keduanya, Silahkan konsultasi dengan RS pilihan kami');
            $hasil = 'Bukan Penyakit Kanker atau Infeksi Kelenjar Getah Bening';

            $gejalaModel = new GejalaModel();
            $data = [
                'benjolan' => $benjolan,
                'demam' => $demam,
                'keringat' => $keringat,
                'sakitTenggorokan' => $sakitTenggorokan,
                'pilek' => $pilek,
                'lelah' => $lelah,
                'gatal' => $gatal,
                'sesak' => $sesak,
                'penurunanBerat' => $penurunanBerat,
                'id_pengguna' => $idLogin,
                'hasil' => $hasil,
                'timeCustom' => $formattedTime
            ];

            $result = $gejalaModel->insert($data);
            return redirect()->back();
        }
    }

    // Menampilkan halaman home admin
    public function showHomeAdmin()
    {
        return view('adminHome');
    }

    // Menampilkan tabel semua akun terdaftar
    public function showDaftarAkun()
    {
        $role = $this->session->get('role');
        $userId = $this->session->get('idAkun');

        if ($role == 'admin') {
            if (!$this->session->has('idAkun')) {
                return redirect()->to('/akun');
            }
            $akunModel = new AkunModel();
            $data['akun'] = $akunModel->getAllAkun();
            // dd($data);
            return view('daftarAkun', $data);
        } else {
            return redirect()->to('/unauthorized');
        }
    }

    // Menampilkan halaman jika akun tidak memiliki akses
    public function showUnauthorizedPage()
    {
        return view('unauthorized');
    }
}
