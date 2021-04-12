<?php

namespace App\Controllers;

use App\Models\UsersModels;
use App\Models\KamarModels;
use App\Models\PesananModels;
use App\Models\KeranjangModels;

class Home extends BaseController
{
	// Home Page
	protected $UserModel, $JabatanModel, $KamarModel, $PesananModel, $KeranjangModel;
	protected $biaya_layanan;
	public function __construct()
	{
		$this->KamarModel = new KamarModels();
		$this->UserModel = new UsersModels();
		$this->PesananModel = new PesananModels();
		$this->KeranjangModel = new KeranjangModels();
		$this->form_validation = \Config\Services::validation();
		$this->biaya_layanan = 500000;
	}
	public function index()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Beranda",
			"id" => "1",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/index", $data);
	}
	public function about()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "About",
			"id" => "2",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/about", $data);
	}
	public function daftar_kamar()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Daftar Kamar",
			"id" => "3",
			"kamar" => $this->KamarModel->getAllKamar(),
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/room", $data);
	}
	public function kontak()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Kontak Kami",
			"id" => "4",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/contact", $data);
	}
	public function booking()
	{
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Booking Kamar",
			"id" => "5",
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		}
		return view("user/page/checkout", $data);
	}
	public function detail_kamar($id_kamar = null)
	{
		$cari = $this->KamarModel->getAllKamar($id_kamar);
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Detail Kamar",
			"id" => "6",
			"kamar" => $cari,
			"all" => $this->KamarModel->getAllKamar(),
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (!empty($this->request->getPost('submit'))) {
				if (!logged_in() && empty(user())) {
					return redirect()->to('/login');
				} else {
					// Ketentuan Status Bayar
					// 1. Keranjang
					// 2. Booking
					// 3. Dibayar
					if ($this->request->getPost('layanan') == 1) {
						$total = $cari[0]->harga_kamar + $this->biaya_layanan;
					} else {
						$total = $cari[0]->harga_kamar;
					}
					// Cek Total Pembayaran
					if (empty($cariPesanan) || $cariPesanan[0]->status_bayar == 3) {
						$save = $this->PesananModel->save([
							'id_user' => user()->id,
							'total_bayar' => $total,
							'status_bayar' => 1,
							'created_by' => user()->username,
						]);
						if ($save) {
							$getIdPesanan = $this->PesananModel->InsertID();
							$cekKamar = $this->KeranjangModel->cekKamarKeranjang(user()->id, $getIdPesanan, $id_kamar);
							if ($cekKamar == 0) {
								$saveKeranjang = $this->KeranjangModel->save([
									'id_kamar' => $id_kamar,
									'id_pesanan' => $getIdPesanan,
									'id_user' => user()->id,
									'layanan_kamar' => $this->request->getPost('layanan'),
									'sub_total' => $total,
								]);
								if ($saveKeranjang) {
									echo "Berhasil Ditambahkan Kekeranjang";
								} else {
									echo "Gagal Ditambahkan Kekeranjang";
								}
							} else {
								echo "Gagal Ditambahkan, Kamar Sudah Ada Di Keranjang";
							}
						} else {
							echo "500 - Internal Server Error";
						}
					} else {
						if (!empty($cariPesanan) && $cariPesanan[0]->status_bayar == 1) {
							$total_bayar = $cariPesanan[0]->total_bayar;
							$total_bayar = $total_bayar + $total;
							$cekKamar = $this->KeranjangModel->cekKamarKeranjang(user()->id, $cariPesanan[0]->id_pesanan, $id_kamar);
							if ($cekKamar == 0) {
								$updatePesanan =  $this->PesananModel->save([
									'id_pesanan' => $cariPesanan[0]->id_pesanan,
									'total_bayar' => $total_bayar,
								]);
								if ($updatePesanan) {
									$saveKeranjang = $this->KeranjangModel->save([
										'id_kamar' => $id_kamar,
										'id_pesanan' => $cariPesanan[0]->id_pesanan,
										'id_user' => user()->id,
										'layanan_kamar' => $this->request->getPost('layanan'),
										'sub_total' => $total,
									]);
									if ($saveKeranjang) {
										echo "Berhasil Ditambahkan Kekeranjang";
									} else {
										echo "Gagal Ditambahkan Kekeranjang";
									}
								}
							} else {
								echo "Gagal Ditambahkan, Kamar Sudah Ada Di Keranjang";
							}
						} else {
							echo "500 - Internal Server Error";
						}
					}
				}
			} else {
				return view("user/page/single-room", $data);
			}
		}
	}
	public function pengaturan($id_user = null)
	{
		$users = $this->UserModel->getUserRoleUser($id_user);
		if (logged_in()) {
			$cariPesanan = $this->PesananModel->getAllPesananWhere(user()->id);
		} else {
			$cariPesanan = array();
		}
		if (empty($cariPesanan)) {
			$keranjang = 0;
			$data_keranjang = array();
		} else {
			$keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan);
			$data_keranjang = $this->KeranjangModel->countKeranjang(user()->id, $cariPesanan[0]->id_pesanan, "count");
		}
		$data = [
			"title" => "Pengaturan Profil",
			"id" => "11",
			"users" => $users,
			'validation' => $this->form_validation,
			"keranjang" => $keranjang,
			"data_keranjang" => $data_keranjang,
		];
		if (logged_in() && !in_groups('user')) {
			return redirect()->to('/admin');
		} else {
			if (user_id() != $id_user && empty($users)) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {
				if (!empty($this->request->getPost('submit'))) {
					if ($users[0]->email == $this->request->getPost('email')) {
						$valid = 'required|valid_email|valid_emails';
					} else {
						$valid = 'required|valid_email|valid_emails|is_unique[users.email]';
					}
					if ($users[0]->username == $this->request->getPost('username')) {
						$username = 'required';
					} else {
						$username = 'required|is_unique[users.username]';
					}
					$formUbah = $this->validate([
						'username' => $username,
						'email' => $valid,
						'foto' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,png,jpg,jpeg]',

					]);
					if (!$formUbah) {
						return redirect()->to('/pengaturan-profil/' . $id_user)->withInput();
					} else {
						// Cek Apakah Akan Mengganti Password
						if (!empty($this->request->getPost('password') && !empty($this->request->getPost('re-password')))) {
							if ($this->request->getPost('password') == $this->request->getPost('re-password')) {
								$hashOptions = [
									'cost' => 10,
								];
								// Enkripsi password
								$password = password_hash(
									base64_encode(
										hash('sha384', $this->request->getPost('password'), true)
									),
									PASSWORD_BCRYPT,
									$hashOptions
								);
								$status = true;
							} else {
								echo "Password Tidak Sama";
							}
						} else {
							$password = $users[0]->password_hash;
							$status = false;
						}

						// Cek apakah TTL diubah atau tidak
						if (empty($this->request->getPost('ttl'))) {
							$ttl = null;
						} else {
							$ttl = $this->request->getPost('ttl');
						}

						// Cek Kondisi Apakah Gambar Kosong
						if ($this->request->getFile('foto')->getError() == 0) {
							$fotoProfil = $this->request->getFile('foto');
							$namaFoto = $fotoProfil->getRandomName();
							$fotoProfil->move('user_image', $namaFoto);
							// Cek apakah gambar didatabase masih kosong atau tidak, jika kosong maka jangan lakukan unlink
							if ($users[0]->foto != null) {
								if (unlink('user_image/' . $users[0]->foto)) {
									$unlink = true;
								} else {
									$unlink = false;
								}
							} else {
								$unlink = true;
							}

							// Cek apakah gambar lama berhasil dihapus?
							if ($unlink == true) {
								$updateUser = $this->UserModel->save([
									'id' => $id_user,
									'foto' => $namaFoto,
									'alamat' => $this->request->getPost('alamat'),
									'ttl' => $ttl,
									'email' => $this->request->getPost('email'),
									'username' => $this->request->getPost('username'),
									'password_hash' => $password,
								]);
								if ($updateUser) {
									if ($status == true) {
										return redirect()->to('/logout');
									} else {
										echo "Berhasil";
									}
								} else {
									echo "Problem";
								}
							} else {
								echo "Kesalahan Server";
							}
						} else {
							$updateUser = $this->UserModel->save([
								'id' => $id_user,
								'alamat' => $this->request->getPost('alamat'),
								'ttl' => $ttl,
								'email' => $this->request->getPost('email'),
								'username' => $this->request->getPost('username'),
								'password_hash' => $password,
							]);
							if ($updateUser) {
								if ($status == true) {
									return redirect()->to('/logout');
								} else {
									echo "Berhasil";
								}
							} else {
								echo "Problem";
							}
						}
					}
				} else {
					return view("user/page/pengaturan", $data);
				}
			}
		}
	}
}