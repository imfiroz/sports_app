<?php
class Venuemodel extends CI_Model
{
	public function add_details(array $step1_data)
	{
			$this->db->insert('venue_details',$step1_data);
			return $this->db->insert_id();
	}
	public function update_details(array $step2_data)
	{
		$id = $step2_data['venue_id'];
		unset($step2_data['venue_id']);
		//print_r($step2_data); exit;
		$data = $this->db
						->where('id', $id)
						->update('venue_details', $step2_data);
		if($data) {return $id;}
	}
}