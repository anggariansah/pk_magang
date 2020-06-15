<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller {

 function index()
 {
  $this->load->view('api_view');
 }

 function action(){
 
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			

			if($data_action == "deleteSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteSidang";
				$form_data = array(
				'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}

			if($data_action == "deleteMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteMahasiswa";
				$form_data = array(
				'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}


			if($data_action == "deletePerusahaan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deletePerusahaan";
				$form_data = array(
				'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}

			if($data_action == "Edit")
			{
				$api_url = "http://localhost/tutorial/codeigniter/api/update";
				$form_data = array(
				'first_name'  => $this->input->post('first_name'),
				'last_name'   => $this->input->post('last_name'),
				'id'    => $this->input->post('user_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;
			}

			if($data_action == "tampilNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilSingleNilai";
				$form_data = array(
					'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

		
		
			//PEMBIMBING

			//CRUD Dashboard

			if($data_action == "jumlahMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/jumlahMahasiswa";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);

				$output = '';

				$output .= '
				 <h3>'.count($result).'</h3>
				';

				echo $output;
			}

			if($data_action == "jumlahBimbingan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/jumlahBimbingan";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);

				$output = '';

				$output .= '
				 <h3>'.count($result).'</h3>
				';

				echo $output;
			}


			//CRUD Mahasiswa

			if($data_action == "getMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getMahasiswa";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<tr>
							<td>'.$row->nim.'</td>
							<td>'.$row->nama_mhs.'</td>
							<td>'.$row->kelas_kodeklas.'</td>
							<td>'.$row->tlp_bpk.'</td>
							<td>
							<button type="button" name="detail" class="btn btn-sm btn-primary detail" id="'.$row->nim.'">Detail</button>
							</td>
							</tr>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
			}

			if($data_action == "getNim")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getMahasiswa";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<select id="nim" name="nim" class="custom-select" class="custom-select">
								<option value="'.$row->nim.'">'.$row->nim.'</option>
							</select>

								';
						}
				}
				else{
						$output .= '
						<select name="nim" id="nim" class="custom-select">
							<option>No Data</option>
						</select>
						';
				}
					echo $output;
			}


			//CRUD Nilai
			
			if($data_action == "getNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getNilai";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<tr>
							<td>'.$row->nim.'</td>
							<td>'.$row->nama_mhs.'</td>
							<td>'.$row->nama_kelas.'</td>
							<td>'.$row->nilai.'</td>
							<td>
							<button type="button" name="edit" class="btn btn-sm btn-primary edit" id="'.$row->id.'">Edit</button>
							<button type="button" name="delete" class="btn btn-sm  btn-danger delete" id="'.$row->id.'">Delete</button>
							</td>
								</tr>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
			}

			if($data_action == "tampilNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilSingleNilai";
				$form_data = array(
					'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}


			if($data_action == "tampilDetailMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilDetailMahasiswa";
				$form_data = array(
					'nim'  => $this->input->post('nim')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

			if($data_action == "updateNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/updateNilai";
				$form_data = array(
					'nim'  => $this->input->post('nim'),
					'nilai' => $this->input->post('nilai'),
					'id'    => $this->input->post('user_id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;
			}

			if($data_action == "deleteNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteNilai";
				$form_data = array(
				'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}



			
			if($data_action == "getRiwayatBimbingan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getRiwayatBimbingan";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '

							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">'.$row->judul.'</h5>
								</div>
								<div class="card-body">
									<h6 class="card-title"><b>'.$row->nama.'</b></h6>
									<br>
									<hr>
									<p class="card-text">'.$row->deskripsi.'</p>
									<a href="#" class="btn btn-primary">Komentari</a>
								</div>
							</div>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
			}


			if($data_action == "insertNilai")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertNilai";

				$form_data = array(
				'nim'  => $this->input->post('nim'),
				'nilai'  => $this->input->post('nilai')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

			// PANITIA

			if($data_action == "getSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getSidang";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<tr>
								<td>'.$row->tanggal_sidang.'</td>
								<td>'.$row->dosen.'</td>
								<td>'.$row->ruangan.'</td>
								<td>'.$row->mahasiswa.'</td>
								<td>
									<button type="button" name="edit" class="btn btn-sm btn-primary edit" id="'.$row->id.'" data-toggle="modal" data-target="#modal-edit">Edit</button>
								<button type="button" name="delete" class="btn btn-sm  btn-danger delete" id="'.$row->id.'">Delete</button>
								</td>
							</tr>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
			}


			if($data_action == "insertSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertSidang";
				
				$form_data = array(
				'tanggal_sidang'  => $this->input->post('tanggal_sidang'),
				'dosen'  => $this->input->post('dosen'),
				'ruangan'  => $this->input->post('ruangan'),
				'mahasiswa'  => $this->input->post('mahasiswa')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

			if($data_action == "insertMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertMahasiswa";

				$form_data = array(
				'nama_mhs'  => $this->input->post('nama_mhs'),
				'kelas_kodeklas'  => $this->input->post('kelas_kodeklas'),
				'perusahaan'  => $this->input->post('perusahaan')				
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}


			if($data_action == "listmhs_dosen")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/mahasiswa_dosen";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<tr>
							<td>'.$row->id.'</td>
							<td>'.$row->dosen_pembimbing.'</td>
							<td>'.$row->nama_mhs.'</td>
							<td>'.$row->dosen_industri.'</td>
							<td>
							<a href="#" class="btn btn-sm btn-primary">Lihat</a>		
							</td>
							</tr>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
			}


			


			

		//Mahasiswa

		if($data_action == "getPerusahaan")
		{
				$api_url = "http://localhost/pk_magang/pkl_api/getPerusahaan";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '

							
						
								<td scope="col" width="5%">
									<div class="card" style="width: 18rem;">
									<div class="card-body">
									<h5 class="card-title"><b>'.$row->nama_perusahaan.'</b></h5>
									<p class="card-text">'.$row->alamat.'</p>
									<p class="card-text">'.$row->tlpn_hotline.'</p>
									<a href="#" class="btn btn-primary">Daftar</a>
									</div>
									</div>        
									</div>	
								</td>


								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
		}

		if($data_action == "getPerusahaanTabel")
		{
				$api_url = "http://localhost/pk_magang/pkl_api/getPerusahaan";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<tr>
								<td>'.$row->industri_id.'</td>
								<td>'.$row->nama_perusahaan.'</td>
								<td>'.$row->alamat.'</td>
								<td>'.$row->tlpn_hotline.'</td>
								<td>
									<a href="#" class="btn btn-sm btn-primary">Edit</a>
									<a href="#" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>

								';
						}
				}
				else{
						$output .= '
						<tr>
							<td colspan="4" align="center">No Data Found</td>
						</tr>
						';
				}
					echo $output;
		}

		if($data_action == "insertPerusahaan")
		{
				$api_url = "http://localhost/pk_magang/pkl_api/insertPerusahaan";

				$form_data = array(
					'nama_perusahaan' => $this->input->post('nama_perusahaan'),
					'alamat'  => $this->input->post('alamat'),
					'tlpn_hotline'  => $this->input->post('tlpn_hotline')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

		}

		if($data_action == "jumlahIndustri")
		{
				$api_url = "http://localhost/pk_magang/pkl_api/jumlahIndustri";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);

				$output = '';

				$output .= '
				 <h3>'.count($result).'</h3>
				';

				echo $output;
			}

			if($data_action == "getListPerusahaan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getPerusahaan";
				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
							$output .= '
							<select id="perusahaan" name="perusahaan" class="custom-select" class="custom-select">
								<option value="'.$row->industri_id.'">'.$row->nama_perusahaan.'</option>
							</select>

								';
						}
				}
				else{
						$output .= '
						<select name="perusahaan" id="perusahaan" class="custom-select">
							<option>No Data</option>
						</select>
						';
				}
					echo $output;
			}


			
		}

		


	}

}

?>
