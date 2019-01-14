<?php
class Game extends CI_Controller{
	public function __construct(){
     parent::__construct();
     $this->load->model('game_model');
     $this->load->helper(array('path'));
     $this->load->helper('url');
     $this->load->library('session');
  }
  public function index(){
  	$this->load->view('templates/game/header');
  	$this->load->view('pages/game/intro/welcome');
  	$this->load->view('templates/game/footer');
  }
  public function addTeam(){
  	$response = array();
    $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->game_model->addTeam($data[0]->player_1,
            $data[0]->player_2,
            $data[0]->player_3,
            $data[0]->player_4,
            $data[0]->class,
            $data[0]->team,
            $data[0]->college)) {

             $response["status"] = true;
			$this->session->set_userdata('team_name', $data[0]->team);
			$this->session->set_userdata('set_id', $data[0]->set_id);
			$this->session->set_userdata('question_number',0);
      $this->session->set_userdata('marks',0);
			$this->session->set_userdata('score',0);
			$this->session->set_userdata('question_name','');
			$this->session->set_userdata('selected_option','');
      $this->session->set_userdata('correct','');
			
        }
        echo json_encode($response);
  }
  public function gameplay(){
  	$this->load->view('templates/game/header');
  	$this->load->view('pages/game/gameplay');
  	
  }
  public function getQuests(){
  	
  	
  	$response["status"] = true;
  	$response["team_name"]=$this->session->userdata('team_name');
  	$response["set_id"]=$this->session->userdata('set_id');
  	$postData = stripslashes($this->input->post('postdata'));
	$data = json_decode($postData);  
  	$response['quest_array']=$this->game_model->getAllQuests($this->session->userdata('question_number'));
  	//$quest_num=$this->session->userdata('question_number');
	//$quest_num++;
	$this->session->set_userdata('question_number',$this->session->userdata('question_number')+1);
	$response['quest_num']=$this->session->userdata('question_number');
	
  $this->session->set_userdata('marks',$response["quest_array"]->score);
  	echo json_encode($response);
    $this->session->set_userdata('correct',$response["quest_array"]->correct);

 
  }

  public function set_answer(){
    $response["status"]=true;
    $postData = stripslashes($this->input->post('postdata'));
    $answer=json_decode($postData);
    $this->session->set_userdata('selected_option',$answer[0]->selected_option);
    echo json_encode($response);
  }

  public function checkAnswer(){
    $response['isCorrect']=false;
    if($this->session->userdata('selected_option')==$this->session->userdata('correct')){
      $response['isCorrect']=true;
      $this->game_model->update_score();
    
    }
    
    echo json_encode($response);
  }
  public function gameover(){
    $this->game_model->update_score_to_table();
  	$this->session->sess_destroy();
  	$this->load->view('templates/game/header');
  	$this->load->view('pages/game/intro/welcome');
  	$this->load->view('templates/game/footer');

  }

  public function getFlippedQuest(){
  	    $response = array();
        $postData = stripslashes($this->input->post('postdata'));
        $rand_set=rand(1,4);
        //$data = json_decode($postData);  

        //$response["status"] = false;
        
        	$response["status"]=true;
        	$response["quest_array"]=$this->game_model->getFlippedQuest($rand_set);
            $this->session->set_userdata('question_number',$this->session->userdata('question_number')+1);
        echo json_encode($response);

  }
  



}

?>