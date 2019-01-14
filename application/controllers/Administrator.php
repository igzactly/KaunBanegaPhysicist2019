<?php
class Administrator extends CI_Controller{
	public function __construct(){
     parent::__construct();
     $this->load->model('administrator_model');
     $this->load->helper(array('path'));
     $this->load->helper('url');
     $this->load->library('session');
  }

	public function index()
	{
		$this->load->view('templates/admin/admin_header');
		$this->load->view('pages/admin/login');
		$this->load->view('templates/admin/admin_footer');
	}
  public function questionset_page(){
    $this->load->view('templates/admin/adminheader');
    $this->load->view('pages/admin/questionset_data_page');

  }

	public function adminpage(){
		
		$this->load->view('templates/admin/adminheader');
		
    $this->load->view('pages/admin/mainpage');
		$this->load->view('templates/admin/admin_footer');

	}
  public function question_data_page(){
    $this->load->view('templates/admin/adminheader');
    $this->load->view('pages/admin/question_data_page');

  }
  public function flipped_quest_page(){
    $this->load->view('templates/admin/adminheader');
    $this->load->view('pages/admin/flipped_quest_page');

  }
  public function team_data_page(){
        $this->load->view('templates/admin/adminheader');
        $this->load->view('pages/admin/team_data_page');

    }
    public function masters_table_page(){
        $this->load->view('templates/admin/adminheader');
        $this->load->view('pages/admin/masters_table_page');

    }

	public function doLogin()
  {
      

        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);

       if($this->administrator_model->Login($data[0]->userId,$data[0]->pass))
        {
            $result = $this->administrator_model->get($data[0]->userId);
           

          

            $session_data = array(
                'id' => $result->admin_id,
                'name' => $result->admin_name,
                
            );

            // Add user data in session
            //$this->session->set_userdata('logged_in', $session_data);
            $this->session->set_userdata('logged_in',true);
            $response["status"] = true;
            $response["message"] = $session_data;
        }
        else
        {
            $response["status"] = false;
            $response["message"] = "Invalid Email ID or password";
        }
        echo json_encode($response);
    }
    public function logout(){
    	$this->session->unset_userdata('logged_in');
    	$response['status']=true;
        echo json_encode($response);
    }
    public function getAll(){
      $response = $this->administrator_model->getAll();
        echo json_encode($response);

    }
   


  public function addset(){
     $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->addset($data[0]->name,
            $data[0]->no_of_quest,0
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);

  }
  public function get()
    {
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        $response = $this->administrator_model->getbyId($data[0]->id);
        echo json_encode($response);
    }
     public function updateset(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->updateset($data[0]->set_name,
            $data[0]->no_of_quest,
            $data[0]->set_id
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);


    }
     public function deleteset()
    {
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->deleteset($data[0]->id)) {

             $response["status"] = true;
        }
        echo json_encode($response);
    }
    public function restoreset()
    {
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->restoreset($data[0]->id)) {

             $response["status"] = true;
        }
        echo json_encode($response);
    }
    public function getAllQuestions(){
      $response = $this->administrator_model->getAllQuestions();
        echo json_encode($response);

    }
     public function getAllFlipTheQuestion(){
      $response = $this->administrator_model->getAllFlipTheQuestion();
        echo json_encode($response);

    }
    public function addQuestion()
    {
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->addQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct,
            $data[0]->score,
            $data[0]->set,
            $data[0]->flag)) {

             $response["status"] = true;
        }
        echo json_encode($response);
    }
    public function addFlipTheQuestion(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->addFlipTheQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct,
            $data[0]->score,
            $data[0]->flag)) {

             $response["status"] = true;
        }
        echo json_encode($response);

    }
    public function getQuestionData(){
      $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        $response = $this->administrator_model->getQuestionData($data[0]->id);
        echo json_encode($response);

    }
    public function getFlipedQuestionData(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        $response = $this->administrator_model->getFlipedQuestionData($data[0]->id);
        echo json_encode($response);

    }
    public function updateQuestion(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->updateQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct,
            $data[0]->score,
            $data[0]->quest_id
            
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);


    }
    public function updateFlipTheQuestion(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->updateFlipTheQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct,
            $data[0]->score,
            $data[0]->quest_id
            
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);


    }

    public function getAllTeam(){
        $response = $this->administrator_model->getAllTeam();
        echo json_encode($response);

    }
    public function getAllSets(){
        $response = $this->administrator_model->getAllSets();
        echo json_encode($response);

    }
    public function getAllMasterTableQuests(){
        $response = $this->administrator_model->getAllMasterTableQuests();
        echo json_encode($response);


    }
    public function addMasterTableQuestion(){
         $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->addMasterTableQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);
        
    }
    public function getMasterTableQuestionData(){
        $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        $response = $this->administrator_model->getMasterTableQuestionData($data[0]->id);
        echo json_encode($response);

    }
    public function updateMasterTableQuestion(){
         $response = array();
        $postData = stripslashes($this->input->post('postdata'));

        $data = json_decode($postData);  

        $response["status"] = false;

        if($this->administrator_model->updateMasterTableQuestion($data[0]->quest_name,
            $data[0]->option_1,
            $data[0]->option_2,
            $data[0]->option_3,
            $data[0]->option_4,
            $data[0]->correct,
            $data[0]->quest_id
            
            )) {

             $response["status"] = true;
        }
        echo json_encode($response);

    }


}

    
 



?>