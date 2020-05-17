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

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/tutorial/codeigniter/api/delete";
				$form_data = array(
				'id'  => $this->input->post('user_id')
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

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/tutorial/codeigniter/api/fetch_single";
				$form_data = array(
				'id'  => $this->input->post('user_id')
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

			
		}
	}

}

?>
