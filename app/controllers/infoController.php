<?php

class Info extends Controller
{
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