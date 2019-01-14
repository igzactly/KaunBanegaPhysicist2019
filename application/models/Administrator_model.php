<?php
class Administrator_model extends CI_Model{
	public function __construct(){
        $this->load->database();
    }
public function Login($user,$pass)
    {
    	$sql = "select * from administrators  where admin_name=? and admin_password=? ";
        $query =  $this->db->query($sql,array($user,$pass));
        $row = $query->row();
        if (isset($row))
        {
            
            return true;
        }
        else
            return false;
    }
    public function get($id)
    {	
        $sql = "select admin_id,admin_name from administrators where admin_name=?";
        $query =  $this->db->query($sql,array($id));
        return $query->row();
    }
    public function getAll()
    {
       $query =  $this->db->query('select * from question_set order by set_id');
       return $query->result();
    }
    public function addset($name,$no_of_quest,$flag)
    {
      
        $sql = "insert into question_set(set_name,no_of_quest,flag) values(?,?,?)";
        return $this->db->query($sql, array($name,$no_of_quest,$flag));
    }
     public function getbyId($id)
    {
       $sql = "select * from question_set where set_id=?";
       $query =  $this->db->query($sql,array($id));
       return $query->row();
    }
    public function updateset($set_name,$no_of_quest,$set_id)
    {
      
        $sql = "update question_set set set_name=?, no_of_quest=? where set_id=?";
        return $this->db->query($sql, array($set_name,$no_of_quest,$set_id));
    }
    public function deleteset($idList)
    {
        $this->db->query("update question_data set flag=? where set_id IN? ",array(1,$idList));
        $sql = "update question_set set flag=? where set_id IN ?";
        return $this->db->query($sql, array(1,$idList));
    }
     public function restoreset($idList)
    {
        $this->db->query("update question_data set flag=? where set_id IN? ",array(0,$idList));
        $sql = "update question_set set flag=? where set_id IN ?";
      
      return $this->db->query($sql, array(0,$idList));
    }
      public function getAllQuestions()
    {
       $query =  $this->db->query('select * from question_data order by quest_id');
       return $query->result();
    }
     public function getAllFlipTheQuestion()
    {
       $query =  $this->db->query('select * from flipped_quest order by quest_id');
       return $query->result();
    }
   public function addQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$set,$flag)
    {
      
        $sql = "insert into question_data(quest_name,option_1,option_2,option_3,option_4,correct,score,flag) values(?,?,?,?,?,?,?,?)";
         $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$flag));
        return ($this->db->query("update question_data set set_id= (select set_id from question_set where set_name=?)",$set));
    }
    public function addFlipTheQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$flag){
        $sql = "insert into flipped_quest(quest_name,option_1,option_2,option_3,option_4,correct,score,flag) values(?,?,?,?,?,?,?,?)";
         return $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$flag));
        


    }
    public function getQuestionData($id)
    {
       $sql = "select * from question_data where quest_id=?";
       $query =  $this->db->query($sql,array($id));
       return $query->row();
    }
    public function updateQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$id)
    {
      
        $sql = "update question_data set quest_name=?,option_1=? ,option_2=?,option_3=?,option_4=?,correct=?,score=? where quest_id=?";
        return $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$id));
    }

    public function updateFlipTheQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$id)
    {
      
        $sql = "update flipped_quest set quest_name=?,option_1=? ,option_2=?,option_3=?,option_4=?,correct=?,score=? where quest_id=?";
        return $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$score,$id));
    }
    public function getAllTeam()
    {
       $query =  $this->db->query('select * from team_data order by score desc');
       return $query->result();
    }
    public function getAllSets(){
        $query =  $this->db->query('select set_name from question_set order by set_id');
       return $query->result();
        


    }

    public function getFlipedQuestionData($id)
    {
       $sql = "select * from flipped_quest where quest_id=?";
       $query =  $this->db->query($sql,array($id));
       return $query->row();
    }
    public function getAllMasterTableQuests(){
         $query =  $this->db->query('select * from master_table order by quest_id');
       return $query->result();

    }
    public function addMasterTableQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct){
        $sql = "insert into master_table(question,option_1,option_2,option_3,option_4,correct) values(?,?,?,?,?,?)";
         return $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct));
     }
     public function getMasterTableQuestionData($id){
         $sql = "select * from master_table where quest_id=?";
       $query =  $this->db->query($sql,array($id));
       return $query->row();

     }
     public function updateMasterTableQuestion($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$quest_id){
        $sql = "update master_table set question=?,option_1=? ,option_2=?,option_3=?,option_4=?,correct=? where quest_id=?";
        return $this->db->query($sql, array($quest_name,$option_1,$option_2,$option_3,$option_4,$correct,$quest_id));

     }
}
     
?>