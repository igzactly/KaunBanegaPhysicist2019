<?php
class Game_model extends CI_Model{
	 public function __construct()
    {
            $this->load->database();
    }
     public function addTeam($player_1,$player_2,$player_3,$player_4,$class,$team,$college)
    {
        
       
        $sql = "insert into team_data(player_1,player_2,player_3,player_4,class,team_name,college) values(?,?,?,?,?,?,?)";
        return $this->db->query($sql, array($player_1,$player_2,$player_3,$player_4,$class,$team,$college));
    }
    public function getAllQuests($row){
    	$sql="select * from question_data where set_id = ?";
    	$result=$this->db->query($sql,array($this->session->userdata('set_id')));
    	$quest_data=$result->row($row);
    	return $quest_data;
    }
    public function update_score_to_table(){

    	$sql1="update team_data set score = ".$this->session->userdata('score')." where team_id=(select max(team_id) order by team_id desc limit 1) and team_name = "."'".$this->session->userdata("team_name")."'";
    	//$sql2="select score from team_data where team_id=(select max(team_id) order by team_id desc limit 1)";
    	//$this->db->query($sql1,array($score));
    	//$result=$result['score'];
        
    	//$result=$result->score;
    	//$score=$score+$result;
        //$team_name=$this->session->userdata('team_name');
        //$this->session->set_userdata('score',$score);	
    	return $this->db->query($sql1);


    }
    public function update_score(){
        $marks=$this->session->userdata('score');
        $marks=($marks+($this->session->userdata('question_number')*5));
        $this->session->set_userdata('score',$marks);
    }
    public function getFlippedQuest($row){
    	$sql="select * from question_data where set_id = ?";
    	$result=$this->db->query($sql,array($row));
    	$quest_data=$result->row($this->session->userdata('question_number'));
    	return $quest_data;

    }
}
?>