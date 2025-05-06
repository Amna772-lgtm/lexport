 <?php
class action_log_mod extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    //fetch books
    function get_action_log($limit, $start, $st = NULL,$type)
    {
		
        if ($st == "NIL") $st = "";
		if($type == "mission"){
			$sql = "select * from action_log where role like '%$st%' AND (action_type = 'consultation_mission' OR action_type = 'visiting_mission' OR action_type = 'writing_mission' OR action_type = 'session_mission' OR action_type = 'general_mission') ORDER BY create_date DESC limit " . $start . ", " . $limit."";
		}
		if($type == "e-service"){
			$sql = "select * from action_log where role like '%$st%' AND action_type = '$type' ORDER BY create_date DESC limit " . $start . ", " . $limit."";
		}
		if($type == "emp"){
			$sql = "select * from action_log where role like '%$st%' AND role=2 ORDER BY create_date DESC limit " . $start . ", " . $limit."";
		}
		if($type == "clt"){
			$sql = "select * from action_log where role like '%$st%' AND role=3 ORDER BY create_date DESC limit " . $start . ", " . $limit."";
		}
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_books_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from action_log where role like '%$st%'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
?>