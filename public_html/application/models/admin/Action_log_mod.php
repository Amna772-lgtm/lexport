 <?php
class action_log_mod extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    //fetch books
    function get_action_log($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from action_log where role like '%$st%' ORDER BY create_date DESC limit " . $start*$limit . ", " . $limit."";
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