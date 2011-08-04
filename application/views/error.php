<?=$this->load->view('header')?>
<h1><?=$error_title?></h1>
<p><?=$error_message?></p>
<p><?=anchor($this->session->userdata('medium'), 'Back')?></p>
<?=$this->load->view('footer')?>