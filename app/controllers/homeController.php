<?php

class Home extends Controller
{
    public function index()
    {
        $DB = new Database();
        $data['title'] = 'Welcome to ' . WEBSITE_NAME;
        $this->view('home', $data);
    }

    public function faq()
    {
        $data['title'] = WEBSITE_NAME . ' FAQ';
        $this->view('faq', $data);
    }

    public function privacypolicy()
    {
        $data['title'] = WEBSITE_NAME . ' Privacy Policy';
        $this->view('privacy', $data);
    }


}