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
  	//$this->load->view('templates/game/footer');
  }
  public function addTeam(){
    //$set_id=rand(1,4);
  	//$response = array();
    $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;


        if($this->game_model->addTeam($data[0]->team)) {
          $set_id=$data[0]->set_id;

      $response["status"] = true;
			$this->session->set_userdata('team_name', $data[0]->team);
			$this->session->set_userdata('set_id', $set_id);
			$this->session->set_userdata('question_number',0);
      		$this->session->set_userdata('marks',0);
			$this->session->set_userdata('score',0);
			$this->session->set_userdata('question_name','');
			$this->session->set_userdata('selected_option','');
      		$this->session->set_userdata('correct','');
      		$this->session->set_userdata('flipped',0);
      		$this->session->set_userdata('fiftyFifty',0);
      		$this->session->set_userdata('chaltaHai1Checked',0);
      		$this->session->set_userdata('chaltaHai2Checked',0);
      		$this->session->set_userdata('chaltaHai1',0);
      		$this->session->set_userdata('chaltaHai2',0);

			
        }
        echo json_encode($response);
  }
  public function gameplay(){
  	$this->load->view('templates/game/header');
  	$this->load->view('pages/game/gameplay');
  	
  }
  public function getQuests(){
	$postData = stripslashes($this->input->post('postdata'));
	$data = json_decode($postData);
	$response['quest_array']=$this->game_model->getAllQuests($this->session->userdata('question_number'));
	$this->session->set_userdata('question_number',$this->session->userdata('question_number')+1);
	$this->session->set_userdata('correct',$response["quest_array"]->correct);
	$this->session->set_userdata('marks',$response["quest_array"]->score);
	$this->session->set_userdata('chaltaHai1',0);
	$this->session->set_userdata('chaltaHai2',0);
	$response['quest_num']=$this->session->userdata('question_number');
	$response["status"] = true;
	$response["score"]=$this->session->userdata('score');
	echo json_encode($response);

  }

  public function set_answer(){
    $response['quest_num']=$this->session->userdata('question_number');
    $response['score']=$this->session->userdata('score');
    $response["status"]=true;
    $postData = stripslashes($this->input->post('postdata'));
    $answer=json_decode($postData);
    $this->session->set_userdata('selected_option',$answer[0]->selected_option);
    echo json_encode($response);
  }

  public function checkAnswer(){
  	$response['quest_num']=$this->session->userdata('question_number');
    $response['score']=$this->session->userdata('score');
    $response['isCorrect']=false;
    $response['chaltaHai1Checked']=false;
    $response['chaltaHai2Checked']=false;
    $response['chaltaHai1']=false;
    $response['chaltaHai2']=false;
    if($this->session->userdata('chaltaHai1Checked')==1){
    	$response['chaltaHai1Checked']=true;

    }
    if($this->session->userdata('chaltaHai2Checked')==1){
    	$response['chaltaHai2Checked']=true;

    }
    if($this->session->userdata('chaltaHai1')==1){
    	$response['chaltaHai1']=true;

    }
    if($this->session->userdata('chaltaHai2')==1){
    	$response['chaltaHai2']=true;

    }
    if($this->session->userdata('selected_option')==$this->session->userdata('correct')){
      $response['isCorrect']=true;
      $this->game_model->update_score();
    
    }
    
    echo json_encode($response);

    
  }
  public function gameover(){
    $this->game_model->update_score_to_table();
  	
  	$this->load->view('templates/game/header');
  	$this->load->view('pages/game/gameover');
  	$this->load->view('templates/game/footer');
    //$this->session->sess_destroy();
  }

  public function getFlippedQuest(){

  	    $response = array();
        $postData = stripslashes($this->input->post('postdata'));
        $rand_quest=rand(1,10);
        //$data = json_decode($postData);  

        //$response["status"] = false;
        
        	$response["status"]=true;
          
        	$response["quest_array"]=$this->game_model->getFlippedQuest($rand_quest);
          //$this->session->set_userdata('question_number',$this->session->userdata('question_number')+1);
          $this->session->set_userdata("flipped",1);
          $this->session->set_userdata('correct',$response["quest_array"]->correct);
          $response['quest_num']=$this->session->userdata('question_number');
          $response['score']=$this->session->userdata('score');
        echo json_encode($response);

  }
  public function fiftyFifty(){
    $response['quest_num']=$this->session->userdata('question_number');
    $response['score']=$this->session->userdata('score');
    $response["status"]=true;
    $this->session->set_userdata("fiftyFifty",1);
    $response['quest_num']=$this->session->userdata('question_number');
    $response['score']=$this->session->userdata('score');
    echo json_encode($response);


  }

  public function setchaltaHai1(){
  	$response["status"]=true;
    $this->session->set_userdata('chaltaHai1',1);
    $this->session->set_userdata('chaltaHai1Checked',1);
    echo json_encode($response);
    
    }
    public function setchaltaHai2(){
  	$response["status"]=true;
    $this->session->set_userdata('chaltaHai2',1);
    $this->session->set_userdata('chaltaHai2Checked',1);
    echo json_encode($response);
    
    }
    public function checkChaltaHai(){
  	$response["status"]=true;
    $restponse["chaltaHai1"]=false;
    $restponse["chaltaHai2"]=false;
    if($this->session->userdata('chaltaHai1')==1){
    	$restponse["chaltaHai1"]=true;

    }
    if($this->session->userdata('chaltaHai2')==1){
    	$response["chaltaHai2"]=true;

    }
    echo json_encode($response);
    
    }
    public function checkFiftyFifty(){
    	$response["status"]=true;
    	$response["fiftyFifty"]=false;
    	if($this->session->userdata('fiftyFifty')==1){
    		$response["fiftyFifty"]=true;
    	}
    	echo json_encode($response);
    }
    public function checkFlipTheQuestion(){
    	$response["status"]=true;
    	$response["flipped"]=false;
    	if($this->session->userdata('flipped')==1){
    		$response["flipped"]=true;
    	}
    	echo json_encode($response);
    }
    public function getQuestionNumber(){
    	$response["status"]=true;
    	$response["question_number"]=$this->session->userdata('question_number');
    	echo json_encode($response);
    }
   public function getChaltaHaiChecked(){
   	$response["status"]=true;
    $response["chaltaHai1Checked"]=false;
    $response["chaltaHai2Checked"]=false;
    if($this->session->userdata('chaltaHai1Checked')==1){
    	$response["chaltaHai1Checked"]=true;

    }
    if($this->session->userdata('chaltaHai2Checked')==1){
    	$response["chaltaHai2Checked"]=true;

    }
    echo json_encode($response);

   }
   public function checkLifeLines(){
   	$response["status"]=true;
   	$response["flipped"]=false;
   	$response["fiftyFifty"]=false;
   	$response["chaltaHai1"]=false;
   	$response["chaltaHai2"]=false;
   	$response["quest_num"]=$this->session->userdata('question_number');
   	if($this->session->userdata('flipped')==1){
   		$response["flipped"]=true;
   	}
   	if($this->session->userdata('fiftyFifty')==1){
   		$response["fiftyFifty"]=true;
   	}
   	if($this->session->userdata('chaltaHai1Checked')==1){
   		$response["chaltaHai1"]=true;
   	}
   	if($this->session->userdata('chaltaHai2Checked')==1){
   		$response["chaltaHai2"]=true;
   	}
   	echo json_encode($response);

   }
   public function congratulations(){
    $this->load->view("templates/game/header");
    $this->load->view("pages/game/congratulations");
   }
    public function checkFlipAnswer(){
		
  	$response['quest_num']=$this->session->userdata('question_number');
    $response['score']=$this->session->userdata('score');
    $response['isCorrect']=false;
    $response['chaltaHai1Checked']=false;
    $response['chaltaHai2Checked']=false;
    $response['chaltaHai1']=false;
    $response['chaltaHai2']=false;
    if($this->session->userdata('chaltaHai1Checked')==1){
    	$response['chaltaHai1Checked']=true;

    }
    if($this->session->userdata('chaltaHai2Checked')==1){
    	$response['chaltaHai2Checked']=true;

    }
    if($this->session->userdata('chaltaHai1')==1){
    	$response['chaltaHai1']=true;

    }
    if($this->session->userdata('chaltaHai2')==1){
    	$response['chaltaHai2']=true;

    }
    if($this->session->userdata('selected_option')==$this->session->userdata('correct')){
      $response['isCorrect']=true;
      
    
    }
    
    echo json_encode($response);

	}

}
  

?>