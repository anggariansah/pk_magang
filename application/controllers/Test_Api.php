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

			
			if($data_action == "deleteSidangMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteSidangMahasiswa";
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

			if($data_action == "deleteSidangPenguji")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteSidangPenguji";
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


			if($data_action == "tampilSinglePerusahaan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilSinglePerusahaan";
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
							<td>'.$row->nama.'</td>
							<td>'.$row->kelas.'</td>
							<td>'.$row->industri.'</td>
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



			if($data_action == "getDosen")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getDosen";
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
							<select id="dosen" name="dosen" class="custom-select" class="custom-select">
								<option value="'.$row->nip.'">'.$row->nama.'</option>
							</select>

								';
					}
				}
				else{
						$output .= '
						<select name="dosen" id="dosen" class="custom-select">
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

			if($data_action == "getSingleDosenMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilSingleDosenMahasiswa";
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

			if($data_action == "getSingleSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getSingleSidang";
				$form_data = array(
					'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);
				$output = '';

				$output .= '
				<div class="col-lg-3 col-6" id="data-jadwal">
					<div class="card" style="width: 40rem;">
					<input type="hidden" name="id" id="id" value="'.$this->input->post('id').'" />
					<div class="card-body">
						<h3 class="card-title"> <strong> Jadwal Sidang </strong></h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Tanggal		: '.$result->tanggal_sidang.'</li>
						<li class="list-group-item">Jam 		: '.$result->jam.'</li>
						<li class="list-group-item">Ruangan		: '.$result->ruangan.'</li>
					</ul>
					</div>
				</div>
					';
					
				echo $output;

			}

			if($data_action == "getSidangMahasiswa")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getSidangMahasiswa";
				$form_data = array(
					'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

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
								<td>'.$row->nama.'</td>
								<td>'.$row->kelas.'</td>
								<td>'.$row->industri.'</td>
								<td>
								<button type="button" name="delete" class="btn btn-sm btn-danger delete-mhs" id="'.$row->id.'">Delete</button>
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


			if($data_action == "getSidangPenguji")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/getSidangPenguji";
				$form_data = array(
					'id'  => $this->input->post('id')
				);

				$client = curl_init($api_url);
				
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

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
								<td>'.$row->nip.'</td>
								<td>'.$row->nama.'</td>
								<td>
								<button type="button" name="delete" class="btn btn-sm btn-danger delete-penguji" id="'.$row->id.'">Delete</button>
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


			if($data_action == "updateSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/updateSidang";
				$form_data = array(
					'tanggal_sidang'  => $this->input->post('tanggal_sidang'),
					'dosen' => $this->input->post('dosen'),
					'ruangan'   => $this->input->post('ruangan'),
					'mahasiswa'   => $this->input->post('mahasiswa')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;
			}

			if($data_action == "updatePerusahaan")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/updatePerusahaan";
				$form_data = array(
					'industri_id' => $this->input->post('industri_id'),
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

			if($data_action == "deleteDosenPembimbing")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteDosenPembimbing";
				$form_data = array(
					'nip' => $this->input->post('nip'),
					'id' =>  $this->input->post('id')
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



			#CRUD RIWAYAT
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
							<tr>
							<td>'.$row->judul.'</td>
							<td>'.$row->date.'</td>
							<td>'.$row->nim.'</td>
							<td>'.$row->nip.'</td>
							<td>'.$row->deskripsi.'</td>
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

			if($data_action == "tampilRiwayat")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/tampilRiwayatBimbingan";
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

			if($data_action == "insertRiwayat")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertRiwayat";

				$form_data = array(
					'judul'  => $this->input->post('judul'),
					'date'  => $this->input->post('date'),
					'nim'  => $this->input->post('nim'),
					'nip'  => $this->input->post('nip'),
					'deskripsi'  => $this->input->post('deskripsi')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
			}

			if($data_action == "updateRiwayat")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/updateRiwayat";
				$form_data = array(
					'judul'  => $this->input->post('judul'),
					'date'  => $this->input->post('date'),
					'nim'  => $this->input->post('nim'),
					'nip'  => $this->input->post('nip'),
					'deskripsi'  => $this->input->post('deskripsi'),
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

			if($data_action == "deleteRiwayat")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/deleteRiwayat";
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


			
			if($data_action == "insertPenguji")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertPenguji";

				$form_data = array(
					'dosen'  => $this->input->post('dosen'),
					'id_jadwal_dosen'  => $this->input->post('id_jadwal_dosen')
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

			if($data_action == "insertMahasiswaSidang")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertMahasiswaSidang";

				$form_data = array(
					'mahasiswa_nim'  => $this->input->post('mahasiswa_nim'),
					'id_jadwal_mhs'  => $this->input->post('id_jadwal_mhs')
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
								<td>'.$row->jam.'</td>
								<td>'.$row->ruangan.'</td>
								<td>
									<button type="button" name="detail" class="btn btn-sm btn-primary detail" id="'.$row->id.'">Detail</button>
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
				'waktu_sidang'  => $this->input->post('waktu_sidang'),
				'ruangan'  => $this->input->post('ruangan'),
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);

				echo $response;

			}

			if($data_action == "insertDosenPembimbing")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertDosenPembimbing";
				
				$form_data = array(
					'mahasiswa_nim'  => $this->input->post('mahasiswa_nim'),
					'dosen'  => $this->input->post('dosen')
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
									<button type="button" name="edit" class="btn btn-sm btn-primary edit" id="'.$row->industri_id.'">Edit</button>
									<button type="button" name="delete" class="btn btn-sm btn-danger delete" id="'.$row->industri_id.'">Delete</button>
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

			if($data_action == "insertPendaftaran")
			{
				$api_url = "http://localhost/pk_magang/pkl_api/insertPendaftaran";

				$form_data = array(
					'mahasiswa_nim' => $this->input->post('mahasiswa_nim'),
					'id_industri'  => $this->input->post('id_industri')
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
							<select id="id_industri" name="id_industri" class="custom-select">
								<option value="'.$row->industri_id.'">'.$row->nama_perusahaan.'</option>
							</select>

								';
					}
				}
				else{
						$output .= '
						<select name="id_industri" id="id_industri" class="custom-select">
							<option>No Data</option>
						</select>
						';
				}
					echo $output;
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

		}


	}

}

?>
