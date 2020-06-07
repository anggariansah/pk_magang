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
								<button type="button" name="edit" class="btn btn-sm btn-primary edit" id="'.$row->id.'" data-toggle="modal" data-target="#modal-edit">Edit</button>
								<button type="button" name="delete" class="btn btn-sm  btn-danger delete" id="'.$row->id.'">Delete</button></td>
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


			// if($data_action == "insertSidang")
			// {
			// 	$api_url = "http://localhost/pk_magang/pkl_api/insertSidang";
				
			// 	$form_data = array(
			// 	'tanggal_sidang'  => $this->input->post('tanggal_sidang'),
			// 	'dosen'  => $this->input->post('dosen'),
			// 	'ruangan'  => $this->input->post('ruangan'),
			// 	'mahasiswa'  => $this->input->post('mahasiswa')
			// 	);

			// 	$client = curl_init($api_url);
			// 	curl_setopt($client, CURLOPT_POST, true);
			// 	curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
			// 	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
			// 	$response = curl_exec($client);
			// 	curl_close($client);

			// 	echo $response;

			// }

			
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
							<tr>
								<td scope="col" width="5%">
									<div class="card" style="width: 18rem;">
									<div class="card-body">
									<h5 class="card-title"><b>'.$row->nama_perusahaan.'</b></h5>
									<p class="card-text">'.$row->alamat.'</p>
									<p class="card-text">'.$row->tlpn_hotline.'</p>
									<a href="#" class="btn btn-primary">Detail</a>
									</div>
									</div>        
									</div>	
								</td>
							<tr>

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

?>
