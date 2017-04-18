<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        
        // Load Models
        $this->load->model('Person');
//        $this->load->model('Telephone');
//        $this->load->model('Telephone_type');
        
        // Load Helpers
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
    }
    
    function index() {
        
        // Validation Rules
        $this->form_validation->set_rules('name', 'person name', 'required|min_length[10]');
        
        // hold error messages in div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        // check for validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $this->session->set_flashdata('item', 'form submitted successfully');
            Person::firstOrCreate(['name' => $this->input->post('name')]);
            redirect(current_url());
        }
    }
    
    function edit($id) {
        
        // Validation Rules
        $this->form_validation->set_rules('name', 'person name', 'required|min_length[10]');
        
        // hold error messages in div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        // check for validation
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = Person::where(['id' => $id])->first();
            $this->load->view('register', $data);
        } else {
            $this->session->set_flashdata('item', 'form submitted successfully');
            Person::updateOrCreate(['id' => $this->input->post('id')], ['name' => $this->input->post('name')]);
            redirect(current_url());
        }
    }
    
}