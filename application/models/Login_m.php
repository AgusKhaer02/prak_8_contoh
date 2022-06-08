<?php

    class Login_m extends CI_Model
    {
		
        public $username;
        public $name;
        public $pass;
		public $email;
		public $level;


        public function construct()
        {
            parent::__construct();
        }


		// input kedua nilai username dan pass
		public function setUsernamePass($username,$pass)
		{
			$this->username = $username;
			$this->pass = $pass;
		}

		// melakukan cek login apakah sudah berhasil
        public function login_check()
        {

			// menggunakan count untuk menghitung jumlah data berdasarkan hasil fetching data pada database
			// jumlah sebagai alias dari COUNT(*)
			$this->db->select('COUNT(*) as Jumlah, username, name, email, level');
			$this->db->from('user');

			// menggunakan array assoc untuk where
			// jadi untuk sebelah kiri adalah nama kolom,
			// di sebelah kanan adalah nilainya yang mana ambil dari variabel yang sudah di deklarasikan pada baris utama di dalam class ini
			$this->db->where([
				"username" => $this->username,
				"password" => $this->pass,
			]);

			// langsung eksekusikan querynya
			$query = $this->db->get();

			// kemudian return hasil fetching data dengan row_array()
			$res = $query->row_array();

			// kemudian input 3 variabel lagi, name, email, dan level
			$this->name = $res['name'];
			$this->email = $res['email'];
			$this->level = $res['level'];
			
			// kemudian kondisikan nilai dari jumlah datanya, jika lebih dari 0 maka dianggap true
			// maksudnya sudah ada datanya
			if ($res['Jumlah'] > 0) {
				return true;
			}

			// sebaliknya jika tidak ada data maka return false, artinya tidak ada datanya
            return false;
        }
    }
