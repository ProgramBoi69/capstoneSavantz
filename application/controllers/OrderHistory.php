<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderHistory extends CI_Controller {
	private $role="";
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('UserModel');
        $this->load->model('NotificationModel');
    } 
    public function index(){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $data['orders']=$this->OrderModel->getUserOrder($email);
      $this->load->view('orderhistory',$data);
	}
    public function payOrder(){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $receipt=$this->input->post("receipt");
      $this->OrderModel->generateReferenceNo($receipt);
      $this->NotificationModel->addUserNotification($email,$receipt);
      $this->load->view('payed');
    }
    public function cancelOrder(){
      $receipt=$this->input->post("receipt");
      $this->OrderModel->cancelOrder($receipt);
      header('location:'.base_url("OrderHistory/cancelled"));
    }
    public function pending(){
        $email=$this->UserModel->getUserEmail($_SESSION['username']);
        $data['orders']=$this->OrderModel->getUserOrderByPending($email);
        $this->load->view('orderhistory',$data);
    }
    public function completed(){
        $email=$this->UserModel->getUserEmail($_SESSION['username']);
        $data['orders']=$this->OrderModel->getUserOrderByCompleted($email);
        $this->load->view('orderhistory',$data);

    }
    public function cancelled(){
        $email=$this->UserModel->getUserEmail($_SESSION['username']);
        $data['orders']=$this->OrderModel->getUserOrderByCancelled($email);
        $this->load->view('orderhistory',$data);
    }
}