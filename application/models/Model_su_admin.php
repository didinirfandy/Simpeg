<?php
    class model_su_admin extends CI_Model
{
    function show_ptg()
	{
		$hasil	=	$this->db->query("SELECT * FROM login_admin");

        return $hasil;
    }

    function insert($nama,$alamat,$tlp,$email,$username,$md5)
	{
        $data 	= 	array(
                'nama' 		=> 	$nama,
                'alamat' 	=> 	$alamat,
                'tlp' 		=> 	$tlp,
                'email' 	=> 	$email,
				'username' 	=> 	$username,
				'pass' 		=> 	$md5,
				'valid' 	=> 	1
			);

        $this->db->insert('login_admin', $data);

        return 1;

    }

    function delete($id,$valid)
	{
		if($valid == 1)
		{
			$data	=	array(
				'valid' 	=> 	0,
				'status'	=>	0
				);

			$this->db->where('id', $id);
			$this->db->update('login_admin',$data);

			return 1;
		}
		else
		{
			$data 	= 	array(
				'valid' 	=> 	1,
				'status' 	=> 	0
                );

			$this->db->where('id', $id);
			$this->db->update('login_admin',$data);

			return 1;
		}
	}

	function update($nama,$alamat,$tlp,$email,$username)
	{
		$data 	= 	array(
            'nama'		=>	$nama,
            'alamat'	=>	$alamat,
            'tlp' 		=> 	$tlp,
            'email' 	=> 	$email
        	);

		$this->db->where('username', $username);
		$this->db->update('login_admin',$data);

		return 1;
	}

    function tampil_ptg($level)
	{
		return $this->db->query("SELECT * FROM login_karyawan where level ='$level'");

	}
}
